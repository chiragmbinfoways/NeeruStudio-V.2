<?php

namespace App\Http\Controllers\Jpanel\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerDetail;
use App\Models\imagesOrder;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderMeasurement;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::orderBy('id', 'DESC')->get();
        $hasPermission = hasPermission('order', 2);
        if ($hasPermission) {
            return view('jpanel.orders.index', ['order' => $order]);
        } else {
            abort(403);
        }
    }
    public function listProducts()
    {
        $products = OrderDetails::all();
        $allTasks = Task::orderBy('id', 'desc')->get();
        $users = User::where('isAdminUser', '1')->get();
        $hasPermission = hasPermission('measurement', 2);
        if (Auth::user()->isAdminUser == 2) {
            if ($hasPermission) {
                return view('jpanel.orders.allProductsList', ['products' => $products, 'users' => $users, 'myItem' => $allTasks]);
            } else {
                abort(403);
            }
        } else {
            $myItem = Task::where('user_id', Auth::id())->orderBy('id', 'desc')
                ->get();
            if ($hasPermission) {
                return view('jpanel.orders.productList', ['products' => $myItem, 'users' => $users]);
            } else {
                abort(403);
            }
        }
    }
    public function viewOrder($id)
    {
        $order = OrderDetails::where('order_id', '=', $id)->get();
        $users = User::where('isAdminUser', '1')->get();
        $hasPermission = hasPermission('order', 2);
        if ($hasPermission) {
            return view('jpanel.orders.viewOrder', ['order' => $order, 'users' => $users]);
        } else {
            abort(403);
        }
    }

    public function createOrder(Request $request)
    {
        $hasPermission = hasPermission('order', 1);
        if ($hasPermission) {
            $customers = DB::table('users')
                ->select('*')
                ->join('customersdetails as c', 'c.user_id', '=', 'users.id')
                ->get();
            $last_order = DB::table('order')
                ->orderBy('order_no', 'DESC')
                ->first();
            if ($last_order) {
                $last = $last_order->order_no + 1;
            } else {
                $last = '1001';
            }

            return view('jpanel.orders.createOrder', ['customers' => $customers, 'orderNo' => $last_order, 'last' => $last]);
        } else {
            abort(403);
        }
    }
    public function fetchDetailsOrder($id)
    {
        $customers = CustomerDetail::find($id);
        return response()->json($customers);
    }

    public function addOrder(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'dDate' => 'required',
            // 'orderByName' => 'required|not_in:Select Customer',
            // 'upload_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'advanceAmt' => 'required',
        ]);

        $order = new Order();
        $order->order_no = $request->orderNo;
        if ($request->orderByName == '') {
            $order->customer_id = $request->orderBynumber;
        } else {
            $order->customer_id = $request->orderByName;
        }
        $order->customer_name = $request->cName;
        $order->order_date = $request->oDate;
        $order->delivery_date = $request->dDate;
        $order->completed_date = $request->dDate;
        $order->total_amt = $request->grandTotal;
        $order->advance_amt = $request->advanceAmt;
        $order->comment = $request->termsAndConditions;
        $order->num_products = '3';
        $order->save();

        $itemName = $request->itemname;
        $price = $request->price;
        $quantity = $request->qty;
        $item_total = $request->item_total;

        for ($i = 0; $i < count($itemName); $i++) {

                $product = new OrderDetails();
                $product->order_id = $order->id;
                $product->product_name = $itemName[$i];
                $product->rate = $price[$i];
                $product->quantity = $quantity[$i];
                $product->item_total = $item_total[$i];
                $product->status = '0';
                $product->save();
                        // Order Measurement 
                $order = new OrderMeasurement();
                //Blowse
                $order->order_detail_id = $product->id;
                $order->b_shoulder = $request->b_shoulder;
                $order->b_length = $request->b_length;
                $order->b_chest = $request->b_chest;
                $order->b_waist = $request->b_waist;
                $order->b_chest_up = $request->b_chest_up;
                $order->b_Sleeves = $request->b_Sleeves;
                $order->b_mori = $request->b_mori;
                $order->b_mundo = $request->b_mundo;
                $order->b_magismory = $request->b_magismory;
                $order->b_front_neck = $request->b_front_neck;
                $order->b_back_neck = $request->b_back_neck;
                $order->b_other = $request->b_other;
                // Kurti/Anarkali/Gaun
                $order->k_shoulder = $request->k_shoulder;
                $order->k_length = $request->k_length;
                $order->k_chest = $request->k_chest;
                $order->k_waist = $request->k_waist;
                $order->k_chest_up = $request->k_chest_up;
                $order->k_Sleeves = $request->k_Sleeves;
                $order->k_mori = $request->k_mori;
                $order->k_mundo = $request->k_mundo;
                $order->k_magismory = $request->k_magismory;
                $order->k_front_neck = $request->k_front_neck;
                $order->k_back_neck = $request->k_back_neck;
                $order->k_full_length = $request->k_full_length;
                $order->k_kotho = $request->k_kotho;
                $order->k_other = $request->k_other;
                //Pant/Salwar/Plazo
                $order->p_length = $request->p_length;
                $order->p_mori = $request->p_mori;
                $order->p_nefo = $request->p_nefo;
                $order->p_seat = $request->p_seat;
                $order->p_thai = $request->p_thai;
                $order->p_knee = $request->p_knee;
                $order->p_other = $request->p_other;
                //petticoat
                $order->pe_length = $request->pe_length;
                $order->pe_nefo = $request->pe_nefo;
                $order->pe_seat = $request->pe_seat;
                $order->pe_gher = $request->pe_gher;
                $order->pe_typeof = $request->pe_typeof;
                $order->pe_other = $request->pe_other;
                //additional items 
                $order->remarks = $request->remarks;
                $order->huk = $request->huk;
                $order->pad = $request->pad;
                $order->sample = $request->sample;
                $order->design = $request->design;
                $order->save();
        }

        if ($order) {
            return redirect('jpanel/order')->with('success', 'Order  has been Placed successfully!');
        } else {
            return redirect('jpanel/order')->with('error', 'Something went wrong. Try again.');
        }
    }

    public function editOrder($id)
    {
        $order_id = Order::find($id);
        $pending = $order_id->total_amt - $order_id->advance_amt;
        $item = OrderDetails::all()->where('order_id', $id);
        $hasPermission = hasPermission('order', 3);
        if ($hasPermission) {
            return view('jpanel.orders.editOrder', ['order_id' => $order_id, 'pending' => $pending, 'item' => $item]);
        } else {
            abort(403);
        }
    }

    public function measurementOrder($id)
    {
        $hasPermission = hasPermission('measurement', 2);
        if ($hasPermission) {
            $ordercheck = OrderMeasurement::where('order_detail_id', $id)
                ->get()
                ->first();
            $measurementStatus = '';

            if ($ordercheck) {
                $measurementStatus = 'old';
            } else {
                $measurementStatus = 'new';
            }
            return view('jpanel.orders.measurementOrder', ['id' => $id, 'measurementStatus' => $measurementStatus, 'ordercheck' => $ordercheck]);
        } else {
            abort(403);
        }
    }

    public function measurementaddOrder(Request $request)
    {
        // dd($request->all());
        $order = new OrderMeasurement();
        //Blowse
        $order->order_detail_id = $request->order_detail_id;
        $order->b_shoulder = $request->b_shoulder;
        $order->b_length = $request->b_length;
        $order->b_chest = $request->b_chest;
        $order->b_waist = $request->b_waist;
        $order->b_chest_up = $request->b_chest_up;
        $order->b_Sleeves = $request->b_Sleeves;
        $order->b_mori = $request->b_mori;
        $order->b_mundo = $request->b_mundo;
        $order->b_magismory = $request->b_magismory;
        $order->b_front_neck = $request->b_front_neck;
        $order->b_back_neck = $request->b_back_neck;
        $order->b_other = $request->b_other;
        // Kurti/Anarkali/Gaun
        $order->k_shoulder = $request->k_shoulder;
        $order->k_length = $request->k_length;
        $order->k_chest = $request->k_chest;
        $order->k_waist = $request->k_waist;
        $order->k_chest_up = $request->k_chest_up;
        $order->k_Sleeves = $request->k_Sleeves;
        $order->k_mori = $request->k_mori;
        $order->k_mundo = $request->k_mundo;
        $order->k_magismory = $request->k_magismory;
        $order->k_front_neck = $request->k_front_neck;
        $order->k_back_neck = $request->k_back_neck;
        $order->k_full_length = $request->k_full_length;
        $order->k_kotho = $request->k_kotho;
        $order->k_other = $request->k_other;
        //Pant/Salwar/Plazo
        $order->p_length = $request->p_length;
        $order->p_mori = $request->p_mori;
        $order->p_nefo = $request->p_nefo;
        $order->p_seat = $request->p_seat;
        $order->p_thai = $request->p_thai;
        $order->p_knee = $request->p_knee;
        $order->p_other = $request->p_other;
        //petticoat
        $order->pe_length = $request->pe_length;
        $order->pe_nefo = $request->pe_nefo;
        $order->pe_seat = $request->pe_seat;
        $order->pe_gher = $request->pe_gher;
        $order->pe_typeof = $request->pe_typeof;
        $order->pe_other = $request->pe_other;
        //additional items 
        $order->remarks = $request->remarks;
        $order->huk = $request->huk;
        $order->pad = $request->pad;
        $order->sample = $request->sample;
        $order->design = $request->design;
        $order->save();
        if ($order) {
            return redirect('jpanel/order')->with('success', 'Measurement  has been taken successfully!');
        } else {
            return redirect('jpanel/order')->with('error', 'Something went wrong. Try again.');
        }
    }
    public function measurementupdateOrder(Request $request)
    {
        // dd($request->all());
        $order = OrderMeasurement::where('id', $request->orderDetailId)->update([
            //Blowse
            'b_shoulder' => $request->b_shoulder,
            'b_length' => $request->b_length,
            'b_chest' => $request->b_chest,
            'b_waist' => $request->b_waist,
            'b_chest_up' => $request->b_chest_up,
            'b_Sleeves' => $request->b_Sleeves,
            'b_mori' => $request->b_mori,
            'b_mundo' => $request->b_mundo,
            'b_magismory' => $request->b_magismory,
            'b_front_neck' => $request->b_front_neck,
            'b_back_neck' => $request->b_back_neck,
            'b_other' => $request->b_other,
            //Kurti/Anarkali/Gaun
            'k_shoulder' => $request->k_shoulder,
            'k_length' => $request->k_length,
            'k_chest' => $request->k_chest,
            'k_waist' => $request->k_waist,
            'k_chest_up' => $request->k_chest_up,
            'k_Sleeves' => $request->k_Sleeves,
            'k_mori' => $request->k_mori,
            'k_mundo' => $request->k_mundo,
            'k_magismory' => $request->k_magismory,
            'k_front_neck' => $request->k_front_neck,
            'k_back_neck' => $request->k_back_neck,
            'k_full_length' => $request->k_full_length,
            'k_kotho' => $request->k_kotho,
            'k_other' => $request->k_other,
             //Pant/Salwar/Plazo
             'p_length' => $request->p_length,
             'p_mori' => $request->p_mori,
             'p_nefo' => $request->p_nefo,
             'p_seat' => $request->p_seat,
             'p_thai' => $request->p_thai,
             'p_knee' => $request->p_knee,
             'p_other' => $request->p_other,
             //petticoat
             'pe_length' => $request->pe_length,
             'pe_nefo' => $request->pe_nefo,
             'pe_seat' => $request->pe_seat,
             'pe_gher' => $request->pe_gher,
             'pe_typeof' => $request->pe_typeof,
             'pe_other' => $request->pe_other,
             //additional items   
             'remarks' => $request->remarks,
             'huk' => $request->huk,
             'pad' => $request->pad,
             'sample' => $request->sample,
             'design' => $request->design,

        ]);
        if ($order) {
            return redirect('jpanel/order')->with('success', 'Measurement  has been updated successfully!');
        } else {
            return redirect('jpanel/order')->with('error', 'Something went wrong. Try again.');
        }
    }

    public function updateOrder(Request $request, $id)
    {
        $request->validate([
            'dDate' => 'required',
        ]);

        $order = Order::where('id', $id)->update([
            'order_date' => $request->oDate,
            'delivery_date' => $request->dDate,
            'total_amt' => $request->grandTotal,
            'advance_amt' => $request->advanceAmt,
            'comment' => $request->termsAndConditions,
        ]);
        // Order Data //

        for ($i = 0; $i < count($request->itemname); $i++) {
            $orderId = $request->item_id[$i];
            $item_id = $request->item_id;

            if ($orderId == null) {
                $datasave = [
                    'order_id' => $id,
                    'product_name' => $request->itemname[$i],
                    'rate' => $request->price[$i],
                    'quantity' => $request->qty[$i],
                    'item_total' => $request->item_total[$i],
                    'status' => '0',
                ];
                DB::table('order_details')->insert($datasave);
            } else {
                $order = OrderDetails::where('id', $item_id[$i])->update([
                    'product_name' => $request->itemname[$i],
                    'rate' => $request->price[$i],
                    'quantity' => $request->qty[$i],
                    'item_total' => $request->item_total[$i],
                    'status' => '0',
                ]);
            }
        }
        if ($order) {
            return redirect('jpanel/order/')->with('success', 'Order has been updated!');
        } else {
            return redirect('jpanel/order/')->with('error', 'Something went wrong. Try again.');
        }
    }

    public function orderStatusChange(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = $request->status;
        $order->save();
        return response()->json(['status' => 'success', 'message' => 'Status has been changed successfully!']);
    }
    public function orderdeliveryStatusChange(Request $request)
    {
        $order = Order::find($request->id);
        $order->delivery_status = $request->delivery_status;
        $order->save();
        return response()->json(['status' => 'success', 'message' => 'delivery has done  successfully!']);
    }
    public function ordertaskStatusChange(Request $request)
    {
            $task = Task::find($request->id);
            $task->status = $request->status;
            $task->save();
            return response()->json(['status' => 'success', 'message' => 'delivery has done  successfully!']);
    }

    public function itemStatusChange(Request $request)
    {
        $order = OrderDetails::find($request->id);
        $order->status = $request->status;
        $order->save();

        $isAvailable = Task::where('user_id', $request->user_id)
            ->where('order_detail_id', $request->id)
            ->get()
            ->first();

        if ($isAvailable) {
            return response()->json(['status' => 'success', 'message' => 'task assigned   successfully!']);
        } else {
            $task = new Task();
            $task->order_detail_id = $request->id;
            $task->user_id = $request->status;
            $task->save();
            return response()->json(['status' => 'success', 'message' => 'Status has been changed successfully!']);
        }
    }

    public function orderDelete(Request $request)
    {
        Order::find($request->id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Order has been deleted successfully!']);
    }

    public function productDelete($id)
    {
        $itemDelete = OrderDetails::where('id', '=', $id);
        if (!is_null($itemDelete)) {
            $itemDelete->delete();
        }
        return redirect()->back();
    }
    public function imageOrder($id)
    {
        $image = imagesOrder::where('order_detail_id', $id)->get();
        $order_detai_id = $id;
        $hasPermission = hasPermission('measurement', 2);
        if ($hasPermission) {
            return view('jpanel.orders.imagesOrder', ['image' => $image, 'order_detai_id' => $order_detai_id]);
        } else {
            abort(403);
        }
    }

    public function addImageOrder(Request $request)
    {
        $request->validate([
            // 'productImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('productImage')) {
            $orderImage = new imagesOrder();
            $file = $request->file('productImage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/images/order', $filename);
            $orderImage->image = $filename;
            $orderImage->order_detail_id = $request->orderId;
            $orderImage->save();
        }
        return redirect()->back();
    }

    public function imageDelete($id)
    {
        $itemDelete = imagesOrder::where('id', '=', $id);
        if (!is_null($itemDelete)) {
            $itemDelete->delete();
        }
        return redirect()->back();
    }

    public function fetchBlowseMeasurement(Request $request)
    {
        $orderdetails = OrderDetails::find($request->id);
        $order_id = $orderdetails->order_id;
        $products = OrderDetails::where('order_id', $order_id)->get();
        for ($a = 0; $a < count($products); $a++) {
            $product_id = $products[$a]->id;
            $data = OrderMeasurement::where('order_detail_id', $product_id)->get();
            // dd($data);
            if ($data == '') {
            } else {
                return response()->json($data);
            }
        }
    }
}
