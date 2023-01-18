<?php

namespace App\Http\Controllers\Jpanel\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerDetail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class CustomerController extends Controller
{
    public function index()
    {
        $customers = CustomerDetail::orderBy('id', 'DESC')->get();
        $hasPermission = hasPermission('customers', 2);
        if ($hasPermission)
            return view('jpanel.customers.index',['customers'=>$customers]);
        else
            abort(403);
    }

    public function createCustomers(Request $request)
    {
        
        $hasPermission = hasPermission('customers', 1);
        if ($hasPermission)
            return view('jpanel.customers.createCustomers');
        else
            abort(403);
    }
    public function addCustomers(Request $request)
    {
        $request->validate([
            'customerfName' => 'required',
            'customerlName' => 'required',
            // 'username' => 'required|unique:users,username',
            // 'password' => 'required',
            'phone' => 'required|unique:users,phone',
            // 'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            // 'address1' => 'required',
            // 'address2' => 'required',
            // 'zipcode' => 'required', 
            

        ]);
        $user = new User;
        $user->name =$request->customerfName." ".$request->customerlName;
        $user->username = $request->email;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make('123456');
        $user->status = '1';
        $user->save();
        $customers = new CustomerDetail;
        $customers->customer_name = $request->customerfName." ".$request->customerlName;
        $customers->user_id = $user->id;
        $customers->number = $request->phone;
        $customers->email = $request->email;
        $customers->city = $request->city;
        $customers->state = $request->state;
        $customers->country = $request->country;
        $customers->address1 = $request->address1;
        $customers->address2 = $request->address2;
        $customers->zipcode = $request->zipcode;
        $customers->reference = $request->reference;
        $customers->save();
        if ($customers) {
            return redirect('jpanel/customers')->with('success', 'customer has been Add successfully!');
        } else {
            return redirect('jpanel/customers')->with('error', 'Something went wrong. Try again.');
        }
    }

    public function editCustomers($id)
    {
        $customers = CustomerDetail::find($id);
        $hasPermission = hasPermission('customers', 3);
        if ($hasPermission)
            return view('jpanel.customers.editCustomers', ['customers' => $customers]);
        else
            abort(403);
    }

    public function updateCustomers(Request $request, $id)
    {
        $request->validate([
            'customerfName' => 'required',
            'customerlName' => 'required',
            // 'username' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone,' .$request->user_id,
            // 'email' => 'required|email|unique:users,email,' .$request->user_id,
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            // 'address1' => 'required',
            // 'address2' => 'required',
            // 'zipcode' => 'required',
        ]);
           
        $user = User::where('id', $request->user_id)->update(['name' => $request->customerfName.' '.$request->customerlname, 'username' => $request->email, 'phone' => $request->phone, 'email' => $request->email]);
        $customers = CustomerDetail::where('id', $id)->update([
            'number' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'zipcode' => $request->zipcode,
            
        ]);
        if ($customers) {
            return redirect('jpanel/edit-customers/'.$request->id)->with('success', 'Customer has been updated!');
        } else {
            return redirect('jpanel/edit-customers/'.$request->id)->with('error', 'Something went wrong. Try again.');
        }
    }

    public function viewCustomers($id){
        $customers = CustomerDetail::find($id);
        $hasPermission = hasPermission('customers',2);
        if($hasPermission)
            return view('jpanel.customers.viewCustomers', ['customers'=>$customers]);
        else
            abort(403);
    }

    public function customersStatusChange(Request $request){
        $customers = User::find($request->customer_id);
        $customers->status = $request->status;
        $customers->save();
        return response()->json(['status'=>'success','message' => 'Status has been changed successfully!']);
    }

    public function customersDelete(Request $request){
        User::find($request->customer_id)->delete();
        return response()->json(['status'=>'success','message' => 'Customer has been deleted successfully!']);
    }
 
}
