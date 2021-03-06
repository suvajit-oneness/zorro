<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\Admin;
use App\Model\Driver;
use App\Model\Booking;
use App\Model\Customer;
use App\Model\PricingBracket;
use App\Model\RiderFee;
use App\Model\IncentiveBracket;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Validator;


class AdminLoginController extends Controller
{
    /**
     *Backend User Signup
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Validation\Validator,Exception $e,jsonArray
     */
    public function loginGet(Request $request){
        $statusCode=200;
        $response = [];
        
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            ], [
            'email.required' => 'Email is Required',
            'password.required' => 'Password is Required',
            ]
        );
        try{     
            $credential=['email'=>$request->email,'password'=>$request->password];          
            $checkAuth= auth()->guard('admin');      
            if($checkAuth->attempt($credential)==1){       
                $response=array(
                    'status'=>1,
                );
            }else{               
                $response=array(
                    'status'=>0,
                   'message'=>"Credential Missmatch."
                );  
            }  
        }catch(Exception $e){
            $response = array(
                'exception' => true,
                'exception_message' => $e->getMessage(),
            );
            $statusCode = 400;
        }finally{            
           return response()->json($response, $statusCode);  
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboardView(Request $request)
    {
        $customers = Customer::all();
        $drivers = Driver::all();
        $bookings = Booking::all()->count();
        $revenue = Booking::where('is_delivered', 1)->sum('price');
        $pb = PricingBracket::all();
        $rf = RiderFee::all();
        $ib = IncentiveBracket::all();
        return view('ui.dashboard', compact('drivers', 'bookings','revenue','customers','pb','rf','ib'));
    }
    
     /**
     * Go to  Business Profile.
     *
     * @return view
     */
    public function changePassword()
    {
        return view('/auth.passwords.change_password');
    }
       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_pass' => ['required', new MatchOldPassword],
            'new_pass' => ['required'],
            'conf_pass' => ['same:new_pass'],
        ]);
   
        $updatedpassdata = Admin::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_pass)]);
        // dd('Password change successfully.');
        return redirect()->route('admin.logout');
    }

    public function modalStore(Request $request) {
        //dd($request->all());
        if($request->modal_name == 'pb' || $request->modal_name == 'rf'){
            switch($request->modal_name){
                case 'pb':
                    $data = new PricingBracket;break;
                case 'rf':
                    $data = new RiderFee;break;
            }
            $data->lower = $request->lower;
            $data->upper = $request->upper;
            $data->cost = $request->cost;
        }elseif($request->modal_name == 'ib'){
            $data = new IncentiveBracket;
            $data->no_of_orders = $request->no_of_orders;
            $data->cost = $request->cost;
        }
        $data->save();
        return redirect()->route('admin.dashboard');
    }
    public function modalDelete($id, $modal_name) {
        if($modal_name == 'pb' || $modal_name == 'rf'){
            switch($modal_name){
                case 'pb':
                    $data = PricingBracket::find(decrypt($id));break;
                case 'rf':
                    $data = RiderFee::find(decrypt($id));break;
            }
        }elseif($modal_name == 'ib'){
            $data = IncentiveBracket::find(decrypt($id));
        }
        $data->delete();
        return redirect()->route('admin.dashboard');
    }
}
