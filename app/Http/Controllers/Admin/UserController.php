<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('price','activity','city','region')->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($item) {
                    $action = '
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $item->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>';
                    return $action;
                })->addColumn('price' , function ($item){
                    return $item->price?$item->price->price:'';
                })->addColumn('activity' , function ($item){
                    return $item->activity?$item->activity->name_en:'';
                })->addColumn('city' , function ($item){
                    return $item->city?$item->city->name_en:'';
                })->addColumn('region' , function ($item){
                    return $item->region?$item->region->name_en:'';
                })
                ->editColumn('block',function ($user){
                    $color = $user->block == "yes" ? "danger" :"dark";
                    $text = $user->block == "yes" ? "un block" :"block";
                    return '<a class="block text-center fw-3  text-' . $color . '" data-id="' . $user->id . '" data-text="' . $text . '" style="cursor: pointer"><i class="py-2 fw-3  fa fa-ban text-' . $color . '" ></i></a>';
                })
                ->addColumn('checkbox' , function ($item){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$item->id.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.User.index');
    }



    ################ Delete User #################
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }
    ################ Delete City #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        User::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }
    ################ block user #################
    public function block($id)
    {
        $user = User::where('id',$id)->first();
        $text = $user->block == "yes" ? "User un blocked successfully" :"User blocked successfully";
        $user->update(['block'=>$user->block=='yes'?'no':'yes']);

        return response()->json(
            [
                'code' => 200,
                'message' => $text
            ]);
    }
}
