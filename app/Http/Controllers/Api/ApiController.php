<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ActivityTrait;
use App\Models\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    use ActivityTrait;

    public function change_main_power_source(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trash_code' => 'required|exists:trashes,code',
            'main_power_source' => 'required|in:1,0',
        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), '422');
        }

        $trash = Trash::where('code', $request->trash_code)->first();
        $trash->update(['power'=>$request->main_power_source]);

        $this->AddActivity(
            $trash->id,'Main electrical power Condition '.($trash['power'] == 1 ? 'on' : 'off'),
            date('Y-m-d H:i:s'),
            $trash['power'] == 1 ? 'yes' : 'no'
        );

        return apiResponse($trash);
    }
    //*************************************************************************
    public function change_door_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trash_code' => 'required|exists:trashes,code',
            'trash_door' => 'required|in:1,0',
        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), '422');
        }

        $trash = Trash::where('code', $request->trash_code)->first();
        $trash->update(['trash_door'=>$request->trash_door]);

        $this->AddActivity(
            $trash->id,'Limit switch of the trash door '.($trash['trash_door'] == 1 ? 'on' : 'off'),
            date('Y-m-d H:i:s'),
            $trash['trash_door'] == 1 ? 'yes' : 'no'
        );

        return apiResponse($trash);
    }
    //*************************************************************************
    public function change_overload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trash_code' => 'required|exists:trashes,code',
            'motor_over_load' => 'required|in:1,0',
        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), '422');
        }

        $trash = Trash::where('code', $request->trash_code)->first();
        $trash->update(['motor_over_load'=>$request->motor_over_load]);

        $this->AddActivity(
            $trash->id,'Motor over load '.($trash['motor_over_load'] == 1 ? 'on' : 'off'),
            date('Y-m-d H:i:s'),
            $trash['motor_over_load'] == 1 ? 'yes' : 'no'
        );

        return apiResponse($trash);
    }
    //*************************************************************************
    public function change_trash_level(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trash_code' => 'required|exists:trashes,code',
            'trash_level' => 'required|in:empty,full,partially_full',
        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), '422');
        }

        $trash = Trash::where('code', $request->trash_code)->first();
        $trash->update(['trash_status'=>$request->trash_level]);


        $this->AddActivity(
            $trash->id,'Trash level is '. $trash['trash_status'] ,
            date('Y-m-d H:i:s'),
            $this->activityStatus($trash['trash_status'])
        );

        return apiResponse($trash);
    }
    //*************************************************************************
    public function change_sanitizer_level(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trash_code' => 'required|exists:trashes,code',
            'sanitizer_level' => 'required|in:empty,full,partially_full',
        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), '422');
        }

        $trash = Trash::where('code', $request->trash_code)->first();
        $trash->update(['sanitize_tank'=>$request->sanitizer_level]);


        $this->AddActivity(
            $trash->id,'Sanitizer level is '. $trash['sanitize_tank'] ,
            date('Y-m-d H:i:s'),
            $this->activityStatus($trash['sanitize_tank'])
        );

        return apiResponse($trash);
    }
    //*************************************************************************

    public function update_trash(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trash_code' => 'required|exists:trashes,code',
            'sanitizer_level' => 'nullable|in:empty,full,partially_full,Error',
            'main_power_source' => 'nullable|in:1,0',
            'trash_door' => 'nullable|in:1,0',
            'motor_over_load' => 'nullable|in:1,0',
            'trash_level' => 'nullable|in:empty,full,partially_full,Error',

        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), '422');
        }

        $trash = Trash::where('code', $request->trash_code)->first();
        $data = $request->except('trash_code', 'main_power_source', 'trash_level', 'sanitizer_level');
        $data['power'] = $request->main_power_source;
        $data['trash_status'] = $request->trash_level;
        $data['sanitize_tank'] = $request->sanitizer_level;

        if ($request['sanitizer_level'] != $trash['sanitize_tank']) {
            $this->AddActivity(
                $trash->id, 'Sanitizer level is ' . $data['sanitize_tank'],
                date('Y-m-d H:i:s'),
                $this->sanitizerActivityStatus($data['sanitize_tank'])
            );
        }
        if ($request['main_power_source'] != $trash['power']) {
            $this->AddActivity(
                $trash->id, 'Main electrical power Condition ' . ($data['power'] == 1 ? 'on' : 'off'),
                date('Y-m-d H:i:s'),
                $data['power'] == 1 ? 'yes' : 'no'
            );
        }
        if ($request['trash_door'] != $trash['trash_door']) {
            $this->AddActivity(
                $trash->id, 'Limit switch of the trash door ' . ($data['trash_door'] == 1 ? 'on' : 'off'),
                date('Y-m-d H:i:s'),
                $data['trash_door'] == 1 ? 'no' : 'yes'
            );
        }
        if ($request['motor_over_load'] != $trash['motor_over_load']) {
            $this->AddActivity(
                $trash->id, 'Motor over load ' . ($data['motor_over_load'] == 1 ? 'on' : 'off'),
                date('Y-m-d H:i:s'),
                $data['motor_over_load'] == 1 ? 'no' : 'yes'
            );
        }
        if ($request['trash_level'] != $trash['trash_status']) {
            $this->AddActivity(
                $trash->id, 'Trash level is ' . $data['trash_status'],
                date('Y-m-d H:i:s'),
                $this->activityStatus($data['trash_status'])
            );
        }
        if ( ($request['latitude'] != $trash['latitude']) || ($request['longitude'] != $trash['longitude']) ) {
            $this->AddActivity(
                $trash->id, 'Trash location changed ' ,
                date('Y-m-d H:i:s'),
                'between'
            );
        }

        $trash->update($data);

        if ($trash['trash_status']!='empty' || $trash['sanitize_tank']!='full'
            || $trash['power']!=1 || $trash['trash_door']!=0 || $trash['motor_over_load']!=0 ){
            $trash->update(['system_status'=>'fault']);
        }else{
            $trash->update(['system_status'=>'good']);
        }
        $this->AddActivity(
            $trash->id, 'System status is '.$trash['system_status'] ,
            date('Y-m-d H:i:s'),
            $trash['system_status']=='good'?'yes':'no'
        );

        return apiResponse($trash);
    }
    //*************************************************************************

    public function activityStatus($status){
        $activity = 'yes';
        if ($status == 'full' || $status == 'Error') {
            $activity = 'no';
        }elseif ($status == 'partially_full'){
            $activity = 'between';
        }
        return $activity;
    }
    ##############################################
    public function sanitizerActivityStatus($status){
        if ($status == 'full') {
            $activity = 'yes';
        }else{
            $activity = 'no';
        }
        return $activity;
    }
}
