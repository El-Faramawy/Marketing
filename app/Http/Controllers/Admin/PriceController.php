<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\PhotoTrait;
use App\Models\Price;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PriceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Price::latest()->get();
            return Datatables::of($sliders)
                ->addColumn('action', function ($admin) {
                        $action = '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $admin->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $admin->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>';
                        return $action;
                })->addColumn('checkbox' , function ($slider){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$slider->id.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Price.index');
    }


    ################ Add Price #################
    public function create()
    {
        return view('Admin.Price.parts.create')->render();
    }

    public function store(Request $request)
    {
        $valedator = Validator::make($request->all(), [
            'price' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);
        $data = $request->all();
        Price::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' =>  __('Added successfully')
            ]);
    }
    ###############################################


    ################ Edit Price #################
    public function edit(Price $price)
    {
        return view('Admin.Price.parts.edit', compact('price'));

    }
    ################ update Price #################
    public function update(Request $request, Price $price)
    {
        $valedator = Validator::make($request->all(), [
            'price' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $price->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => __('modified successfully')
            ]);
    }
    ###############################################

    ################ Delete Price #################
    public function destroy(Price $price)
    {
        $price->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }
    ################ Delete Slider #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Price::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }

}
