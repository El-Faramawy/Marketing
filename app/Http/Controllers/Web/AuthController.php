<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\City;
use App\Models\Price;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function sign_up(){
        if (auth()->check() ){
            return redirect('/');
        }
        $activities = Activity::all();
        $cities = City::all();
        $prices = Price::all();
        return view('Web.sign_up',compact('activities','cities','prices'));
    }
    //==========================================================
    public function store_user(Request $request){
        $valedator = Validator::make($request->all(), [
            'activity_id' => 'required',
            'phone' => 'required|unique:users,phone',
            'city_id' => 'required',
            'region_id' => 'required',
            'address' => 'required',
            'email' => 'required_with:verEmail|same:verEmail|unique:users,email',
            'verEmail' => 'required',
            'password' => 'required_with:verPassword|same:verPassword',
            'verPassword' => 'required',
            'price_id' => 'required',
            'card_number' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);
        $data = $request->except('verEmail','verPassword');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        auth()->login($user);
        $url = url('/');
        return response()->json(
            [
                'url' => $url,
                'success' => 'true',
                'message' =>  __('Signed up successfully')
            ]);
    }
    //==========================================================
    public function edit_profile(){
        if (!auth()->check() ){
            return redirect('/');
        }
        $activities = Activity::all();
        $cities = City::all();
        $prices = Price::all();
        $user = auth()->user();
        $regions = Region::where('city_id', $user->city_id)->get();
        return view('Web.edit_profile',compact('activities','cities','regions','prices','user'));
    }
    //==========================================================
    public function update_user(Request $request){
        $valedator = Validator::make($request->all(), [
            'activity_id' => 'required',
            'phone' => 'required|unique:users,phone,'.auth()->user()->id,
            'city_id' => 'required',
            'region_id' => 'required',
            'address' => 'required',
            'email' => 'required_with:verEmail|same:verEmail|unique:users,email,'.auth()->user()->id,
            'verEmail' => 'required',
//            'password' => 'required_with:verPassword|same:verPassword',
//            'verPassword' => 'required',
            'price_id' => 'required',
            'card_number' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        if (isset($request->password) && $request->password != null){
            $valedator = Validator::make($request->all(), [
                'password' => 'required_with:verPassword|same:verPassword',
                'verPassword' => 'required'
            ] );
            if ($valedator->fails())
                return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        }

        $data = $request->except('verEmail','verPassword');
        if (isset($request->password) && $request->password != '') {
            $data['password'] = Hash::make($request->password);
        }
        auth()->user()->update($data);

        $url = url('/');
        return response()->json(
            [
                'url' => $url,
                'success' => 'true',
                'message' =>  __('Updated successfully')
            ]);
    }
    //==========================================================
    public function login(){
        if (auth()->check() ){
            return redirect('/');
        }
        return view('Web.login');
    }
    //===================================================================
    public function user_login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }

        $credentials = ['email' => request('email'), 'password' => request('password'),'block' => 'no'];
        $user = User::where('email',$request->email)->count();
//        return $data;
        if ($user > 0){
            if (auth()->attempt($credentials)){
                $url = url('/');
                return response()->json(['message'=>'login successfully ','success'=>'true','url'=>$url]);
            }else{
                return response()->json(['messages'=>['invalid credentials register please '],'success'=>'false']);
            }
        }else{
            return response()->json(['messages'=>['invalid credentials register please '],'success'=>'false']);
        }
    }
    //===================================================================
    public function logout()
    {
        if (auth()->check()){
            auth()->logout();
        }
        return redirect('login');
    }
    //==========================================================
    public function get_city_regions(Request $request){
        $regions = Region::where('city_id', $request->city_id)->get();
        $data = '<option value="" selected disabled>اختر منطقة</option>';

        if ($regions){
            foreach($regions as $region){
                $data .=' <option value="'.$region->id.'">'.$region->name_en.'</option>';
            }
        }

        return response()->json($data);
    }
    //==========================================================
}
