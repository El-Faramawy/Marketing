<?php


namespace App\Http\Traits;
use App\Models\Notification;
use App\Models\PhoneToken;
use App\Models\Setting;
use App\Models\TrashActivity;
use App\Models\User;

trait ActivityTrait
{
    /*
       |--------------------------------------------------------------------------
       | send Firebase Notification
       |--------------------------------------------------------------------------
       |
       |this function take a 3 params
       |1- array of users Id , you want to sent
       |2-single id to get the name of sender
       |3-mess array to send
       |
       | Support: "ios ", "android"
       |
       */


    //****************************************************************************************

    public function AddActivity($trash_id, $activity, $time = null,$good='yes')
    {
        $data = [];
        $data['trash_id'] = $trash_id;
        $data['activity'] = $activity;
        $data['good'] = $good;
        $data['time'] = $time ?? date('Y-m-d H:i:s');

        TrashActivity::create($data);

    }

}
