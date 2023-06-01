<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Activity::latest()->get();
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
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Activity.index');
    }


    ################ Add Activity #################
    public function create()
    {
        return view('Admin.Activity.parts.create')->render();
    }

    public function store(Request $request)
    {
        $valedator = Validator::make($request->all(), [
            'name_en' => 'required',
            'name_fr' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);
        $data = $request->all();
        Activity::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' =>  __('Added successfully')
            ]);
    }
    ###############################################


    ################ Edit Activity #################
    public function edit(Activity $activity)
    {
        return view('Admin.Activity.parts.edit', compact('activity'));

    }
    ################ update Activity #################
    public function update(Request $request, Activity $activity)
    {
        $valedator = Validator::make($request->all(), [
            'name_en' => 'required',
            'name_fr' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $activity->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => __('modified successfully')
            ]);
    }
    ###############################################

    ################ Delete Activity #################
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }
    ################ Delete Activity #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Activity::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }

}
