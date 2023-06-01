<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Region::with('city')->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($item) {
                    $action = '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $item->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $item->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>';
                    return $action;
                })->addColumn('checkbox' , function ($item){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$item->id.'">';
                })->editColumn('city' , function ($item){
                    return $item->city?$item->city->name_en:'';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Region.index');
    }


    ################ Add Region #################
    public function create()
    {
        $cites = City::all();
        return view('Admin.Region.parts.create',compact('cites'))->render();
    }

    public function store(Request $request)
    {
        $valedator = Validator::make($request->all(), [
            'city_id' => 'required',
            'name_en' => 'required',
            'name_fr' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);
        $data = $request->all();
        Region::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' =>  __('Added successfully')
            ]);
    }
    ###############################################


    ################ Edit Region #################
    public function edit(Region $region)
    {
        $cites = City::all();
        return view('Admin.Region.parts.edit', compact('cites','region'));
    }
    ################ update Price #################
    public function update(Request $request, Region $region)
    {
        $valedator = Validator::make($request->all(), [
            'city_id' => 'required',
            'name_en' => 'required',
            'name_fr' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $region->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => __('modified successfully')
            ]);
    }
    ###############################################

    ################ Delete Region #################
    public function destroy(Region $region)
    {
        $region->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }
    ################ Delete Region #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Region::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }

}
