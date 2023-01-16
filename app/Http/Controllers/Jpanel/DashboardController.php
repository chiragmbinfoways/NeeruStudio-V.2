<?php

namespace App\Http\Controllers\Jpanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Module;
use App\Models\Language;
use App\Models\Order;
use App\Models\CustomerDetail;
class DashboardController extends Controller
{
    //
    public function index(){
        $totalOrder = Order::all()->count();
        $totalCustomers = CustomerDetail::all()->count();
        $grandtotal =  Order::sum('total_amt');
        $totalAmount = Order::where('status','0')->sum('total_amt');
        $advanceAmount = Order::where('status','0')->sum('advance_amt');
        $pending = Order::where('status','0')->get();
        $delivery = Order::orderBy('delivery_date', 'asc')->take(10)->get();
        $pendingAmount = $totalAmount -  $advanceAmount;
        return view('jpanel.dashboard',['totalOrder'=>$totalOrder,'totalCustomers'=>$totalCustomers,'totalAmount'=>$totalAmount,'pendingAmount'=>$pendingAmount , 'grandtotal'=>$grandtotal  , 'pending'=>$pending ,'delivery'=>$delivery ]);
    }
    public function adminSettings(){
        $totalModule = Module::all()->count();
        $totalRole = Role::all()->count();
        $totalUser = User::where('isAdminUser','1')->count();
        $totalLanguage = Language::all()->count();
        return view('jpanel.adminSettings',['totalModule'=>$totalModule,'totalLanguage'=>$totalLanguage,'totalRole'=>$totalRole,'totalUser'=>$totalUser]);
    }
    public function dashboard(){
       
    }
    
}
