<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\ActivityTrait;
use App\Models\Trash;
use App\Models\TrashActivity;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Milon\Barcode\DNS2D;
use Yajra\DataTables\DataTables;
//use App\Http\Traits\GenerateBarcodeTrait;

class TrashController extends Controller
{
     use ActivityTrait;
//     use GenerateBarcodeTrait;

    public function trashStatus($trash_status)
    {
        if ($trash_status == 'good') {
            $status = __('Good');
            $color = 'success';
        }
        elseif ($trash_status == 'fault') {
            $status = __('Fault');
            $color = 'danger';
        }
        elseif ($trash_status == 'full') {
            $status = __('full 100%');
            $color = 'danger';
        }
        elseif ($trash_status == 'partially_full') {
            $status = __('partially full 70%');
            $color = 'warning';
        }
        elseif ($trash_status == 'Error') {
            $status = __('Error');
            $color = 'danger';
        } else {
            $status = __('system good');
            $color = 'success';
        }
//        $button ='<p class="mb-0"><span class="dot-label bg-'.$color.' mr-2"></span>'.$status.'</p>';

        return ['status' => $status, 'color' => $color];
    }

//#################################################################
    public function trashDate($request){
        $power = $request->power != null ? [$request->power] : [ '1', '0'];
        $power = $request->power == 'all' ? [ '1','0'] : $power;
        $trash_door = $request->trash_door != null ? [$request->trash_door] : [ '1', '0'];
        $trash_door = $request->trash_door == 'all' ? [ '1','0'] : $trash_door;
        $motor_over_load = $request->motor_over_load != null ? [$request->motor_over_load] : [ '1', '0'];
        $motor_over_load = $request->motor_over_load == 'all' ? [ '1','0'] : $motor_over_load;
        $system_status = $request->system_status != null ? [$request->system_status] : [ 'good', 'fault'];
        $system_status = $request->system_status == 'all' ? [ 'good','fault'] : $system_status;
        $trash_status = $request->trash_status != null ? [$request->trash_status] : [ 'Error','empty', 'full', 'partially_full'];
        $trash_status = $request->trash_status == 'all' ? [ 'Error','empty', 'full', 'partially_full'] : $trash_status;
        $tank_level = $request->tank_level != null ? [$request->tank_level] : [ 'empty', 'full', 'partially_full'];
        $tank_level = $request->tank_level == 'all' ? [ 'empty', 'full', 'partially_full'] : $tank_level;
        $sanitize_tank = $request->sanitize_tank != null ? [$request->sanitize_tank] : [ 'Error','empty', 'full', 'partially_full'];
        $sanitize_tank = $request->sanitize_tank == 'all' ? [ 'Error','empty', 'full', 'partially_full'] : $sanitize_tank;

//        return [$power,$trash_door,$motor_over_load,$trash_status,$tank_level,$sanitize_tank];
        $all_trashes = Trash::where(function ( $query)
        use ($power,$trash_door,$motor_over_load,$system_status,$trash_status,$tank_level,$sanitize_tank){
            $query->whereIn('power',$power)
                ->whereIn('trash_door',$trash_door)
                ->whereIn('motor_over_load',$motor_over_load)
                ->whereIn('system_status',$system_status)
                ->whereIn('trash_status',$trash_status)
//                ->whereIn('tank_level',$tank_level)
                ->whereIn('sanitize_tank',$sanitize_tank);
        })->orderBy('system_status','desc')->latest();
        return $all_trashes;
    }
//#################################################################
    public function index(Request $request )
    {

//        return DNS2D::getBarcodePNG('4445645656', 'QRCODE');

//        $trashes_count = $this->trashDate($request)->count();
        if ($request->system_status == 'good')
            $title = __('Good Trashes');
        else if ($request->system_status == 'fault')
            $title = __('Fault Trashes');
        else
            $title = __('Trashes');
//        return $this->trashDate($request)->get();
        if ($request->ajax()) {
            $trashes = $this->trashDate($request)->get();
//            $order_from = $request->order_from ? date('Y-m-d', strtotime($request->order_from)) : date('1970-1-1');
//            $order_to = $request->order_to ? date('Y-m-d', strtotime($request->order_to)) : date('Y-m-d', strtotime('+1 year'));

//            if ($request->has('power') && $request->has('power')!= null && $request->has('power')!= 'all'){
//                $trashes->where('power',$request->has('power'));
//            }
//            if ($request->has('trash_door') && $request->has('trash_door')!= null && $request->has('trash_door')!= 'all'){
//                $trashes->where('trash_door',$request->has('trash_door'));
//            }
//            if ($request->has('motor_over_load') && $request->has('motor_over_load')!= null && $request->has('motor_over_load')!= 'all'){
//                $trashes->where('motor_over_load',$request->has('motor_over_load'));
//            }
//            if ($request->has('system_status') && $request->has('system_status')!= null && $request->has('system_status')!= 'all'){
//                $trashes->where('system_status',$request->has('system_status'));
//            }
//            if ($request->has('trash_status') && $request->has('trash_status')!= null && $request->has('trash_status')!= 'all'){
//                $trashes->where('trash_status',$request->has('trash_status'));
//            }
//            if ($request->has('tank_level') && $request->has('tank_level')!= null && $request->has('tank_level')!= 'all'){
//                $trashes->where('tank_level',$request->has('tank_level'));
//            }
//            if ($request->has('sanitize_tank') && $request->has('sanitize_tank')!= null && $request->has('sanitize_tank')!= 'all'){
//                $trashes->where('sanitize_tank',$request->has('sanitize_tank'));
//            }
//            $trashes->get();
//            return $trashes;
            return Datatables::of($trashes)
                ->addColumn('action', function ($trash) {
                    $action = '';
                    if(in_array(41,admin()->user()->permission_ids)){
                        $action .= '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $trash->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>';
                    }
                    if (in_array(40, admin()->user()->permission_ids)) {
                        $action .= '
                            <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                                 data-id="' . $trash->id . '" ><i class="fa fa-trash-o text-white"></i>
                            </button>
                       ';
                    }
                    return $action;

                })
                ->addColumn('status', function ($trash) {
                    $trash_status = $this->trashStatus($trash->system_status);
                    return '
                            <div class="card-header pt-0  pb-0 border-bottom-0">
                            <a  class="badge badge-' . $trash_status['color'] . ' text-white ">' . $trash_status['status'] . '</a>
                            </div>
							';
                })
                ->addColumn('details', function ($trash) {
                    return '<div class="card-options pr-2">
                                    <a class="btn btn-sm btn-primary text-white "  href="' . route("trash_details", $trash->id) . '"><i class="fa fa-shopping-cart mb-0"></i></a>
                           </div>';
                })
                ->editColumn('last_update', function ($trash) {
                    $activity = TrashActivity::where('trash_id', $trash->id)->latest()->first();
                    return date('Y-m-d', strtotime($activity->time)).' &nbsp; ' . date('h:i A', strtotime($activity->time)) ;
                })
                ->editColumn('subscription', function ($trash) {
                    return $trash->subscription == 1 ?__('Active'): __('Inactive') ;
                })
                ->editColumn('barcode', function ($trash) {
                    return '';
//                        '   <div class="mb-3">'. DNS2D::getBarcodeHTML('4445645656', 'QRCODE') .'</div>
//        ' ;
                })

                ->editColumn('location', function ($trash) {
                    if (!$trash->location)return '';
                    $text = __('go to address');
                    return $trash->location .
                        '<br><a href= "https://maps.google.com/?q='.$trash->latitude.','.$trash->longitude.'" target="_blank">'.$text.'</a>' ?? '';
                })->addColumn('checkbox', function ($trash) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $trash->id . '">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Trash.index',['title'=>$title]);
    }

//#################################################################
    ################ Add Object #################
    public function create()
    {
        return view('Admin.Trash.parts.create')->render();
    }

    public function store(Request $request)
    {
//        $redColor = [255, 0, 0];

//                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
//                file_put_contents('barcode/barcode.png', $generator->getBarcode('081231723897', $generator::TYPE_CODE_128));

//        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
//        file_put_contents('barcode/barcode.jpg', $generator->getBarcode($request['code'], $generator::TYPE_CODE_128, 3, 50, $redColor));
//        return 1;

//        $content = $request->input('content', 'Hello World');
//        $imageBackEnd = new SvgImageBackEnd();
//// Set up the renderer style
//        $rendererStyle = new RendererStyle(400, 0, null);
//        // Set up the barcode writer and renderer
//        $writer = new Writer(new ImageRenderer($rendererStyle,$imageBackEnd));
//
//        // Generate the barcode as a PNG image
//        $pngData = $writer->writeString($content, 'png');
//
//        // Save the PNG image to disk
//        $filename = 'barcode.png';
//        $path = storage_path('app/public/'.$filename);
//        file_put_contents($path, $pngData);
//
//        // Return a response with the URL of the saved image
//        return response()->json([
//            'url' => asset('storage/'.$filename),
//        ]);

        $valedator = Validator::make($request->all(), [
            'device_name'=>'required',
            'code'=>'required|unique:trashes,code',
            'location'=>'required',
            'trash_status'=>'required',
//            'tank_level'=>'required',
            'sanitize_tank'=>'required',
//            'system_status'=>'required',
//            'power'=>'required',
//            'subscription'=>'required',
//            'trash_door'=>'required',
//            'motor_over_load'=>'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('system_status','power','subscription','trash_door','motor_over_load');
        $data['system_status']  = $request->system_status == 'on'?'good':'fault';
        $data['power']          = $request->power == 'on'?1:0;
        $data['subscription']   = $request->subscription == 'on'?1:0;
        $data['trash_door']     = $request->trash_door == 'on'?1:0;
        $data['motor_over_load'] = $request->motor_over_load == 'on'?1:0;
//        $data['barcode'] = \Storage::disk('public')->put('test.png',);

        $trash = Trash::create($data);

        $this->AddActivity($trash->id,'Trash Added ',date('Y-m-d H:i:s'));
        $this->AddActivity($trash->id,'System Status is '.$data['system_status'],date('Y-m-d H:i:s'),$request->system_status == 'on'?'yes':'no');
        $this->AddActivity($trash->id,'Main electrical power Condition '.($data['power'] == 1 ? 'on' : 'off'),date('Y-m-d H:i:s'),$request->power == 'on'?'yes':'no');
        $this->AddActivity($trash->id,'Subscription is '.($data['subscription'] == 1 ? 'active' : 'not active'),date('Y-m-d H:i:s'),$request->subscription == 'on'?'yes':'no');
        $this->AddActivity($trash->id,'Limit switch of the trash door '.($data['trash_door'] == 1 ? 'on' : 'off'),date('Y-m-d H:i:s'),$request->trash_door == 'on'?'no':'yes');
        $this->AddActivity($trash->id,'Motor over load '.($data['motor_over_load'] == 1 ? 'on' : 'off'),date('Y-m-d H:i:s'),$request->motor_over_load == 'on'?'no':'yes');

//        $this->AddActivity($trash->id,'Trash status is '.($data['trash_status'] ),date('Y-m-d H:i:s') );
//        $this->AddActivity($trash->id,'Tank level is '.($data['tank_level'] ),date('Y-m-d H:i:s') );
//        $this->AddActivity($trash->id,'Sanitizer level is '.($data['sanitize_tank'] ),date('Y-m-d H:i:s') );

        $this->AddActivity(
            $trash->id,'Trash level is '. $trash['trash_status'] , date('Y-m-d H:i:s'),
            $this->activityStatus($trash['trash_status'])
        );
//        $this->AddActivity(
//            $trash->id,'Tank level is '. $trash['tank_level'] , date('Y-m-d H:i:s'),
//            $this->activityStatus($trash['tank_level'])
//        );
        $this->AddActivity(
            $trash->id,'Sanitizer level is '. $trash['sanitize_tank'] , date('Y-m-d H:i:s'),
            $this->sanitizerActivityStatus($trash['sanitize_tank'])
        );
        $this->AddActivity(
            $trash->id, 'System status is '.$trash['system_status'] ,
            date('Y-m-d H:i:s'),
            $trash['system_status']=='good'?'yes':'no'
        );

        return response()->json(
            [
                'success' => 'true',
                'message' =>  __('Added successfully')
            ]);
    }
    ################ Edit Trash #################
    public function edit(Trash $trash)
    {
        return view('Admin.Trash.parts.edit', compact('trash'));
    }
    ###############################################
    ################ update offer #################
    public function update(Request $request, Trash $trash)
    {
        $valedator = Validator::make($request->all(), [
            'device_name'=>'required',
            'code'=>'required|unique:trashes,code,'.$trash->id,
            'location'=>'required',
            'trash_status'=>'required',
//            'tank_level'=>'required',
            'sanitize_tank'=>'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('system_status','power','subscription','trash_door','motor_over_load');
        $data['system_status']  = $request->system_status == 'on'?'good':'fault';
        $data['power']          = $request->power == 'on'?'1':'0';
        $data['subscription']   = $request->subscription == 'on'?'1':'0';
        $data['trash_door']     = $request->trash_door == 'on'?'1':'0';
        $data['motor_over_load'] = $request->motor_over_load == 'on'?'1':'0';


        if ($data['sanitize_tank'] != $trash['sanitize_tank']) {
            $this->AddActivity(
                $trash->id, 'Sanitizer level is ' . $data['sanitize_tank'],
                date('Y-m-d H:i:s'),
                $this->sanitizerActivityStatus($data['sanitize_tank'])
            );
        }
        if ($data['power'] != $trash['power']) {
            $this->AddActivity(
                $trash->id, 'Main electrical power Condition ' . ($data['power'] == 1 ? 'on' : 'off'),
                date('Y-m-d H:i:s'),
                $data['power'] == 1 ? 'yes' : 'no'
            );
        }
        if ($data['trash_door'] != $trash['trash_door']) {
            $this->AddActivity(
                $trash->id, 'Limit switch of the trash door ' . ($data['trash_door'] == 1 ? 'on' : 'off'),
                date('Y-m-d H:i:s'),
                $data['trash_door'] == 1 ? 'no' : 'yes'
            );
        }
        if ($data['motor_over_load'] != $trash['motor_over_load']) {
            $this->AddActivity(
                $trash->id, 'Motor over load ' . ($data['motor_over_load'] == 1 ? 'on' : 'off'),
                date('Y-m-d H:i:s'),
                $data['motor_over_load'] == 1 ? 'no' : 'yes'
            );
        }
        if ( $data['trash_status'] != $trash['trash_status']) {
            $this->AddActivity(
                $trash->id, 'Trash level is ' . $data['trash_status'],
                date('Y-m-d H:i:s'),
                $this->activityStatus($data['trash_status'])
            );
        }
        if ( $data['location'] != $trash['location'] ) {
            $this->AddActivity(
                $trash->id, 'Trash location changed ' ,
                date('Y-m-d H:i:s'),
                'between'
            );
        }

        $trash->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => __('modified successfully')
            ]);
    }
    ################ multiple Delete  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Trash::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }


    ################ Delete Trash #################
    public function destroy(Trash $trash)
    {
        $trash->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => __('Deleted successfully')
            ]);
    }

    ################ trash_details #################
    public function trash_details(Request $request,$id)
    {

        $time_from = $request->time_from ? date('Y-m-d',strtotime($request->time_from)):date('Y-m-d',strtotime('-7 day'));
        $time_to = $request->time_to ?date('Y-m-d' ,strtotime($request->time_to)):date('Y-m-d' );
        $activity = $request->activity ??  '';

        if ($request->activity && $request->activity !=null){
            $trash = Trash::with(['activities' => function ($query) use ($time_from, $time_to,$activity) {
                $query->whereBetween('time',[$time_from,$time_to])
                    ->where('activity','like','%'.$activity.'%')
                    ->orderBy('id', 'desc');
            }])->where('id', $id)->first();
        }else{
            $trash = Trash::with(['activities' => function ($query) use ($time_from, $time_to) {
                $query->whereBetween('time',[$time_from,$time_to])
                    ->orderBy('id', 'desc');
            }])->where('id', $id)->first();
        }
        $last_activity = TrashActivity::where('trash_id', $trash->id)->latest()->first();

        $activities = TrashActivity::whereBetween('time',[$time_from,$time_to])->get();
        $count = 0;
        foreach ($activities as $one_activity){
            if ($one_activity->good == 'no'){
                $count = $count + 1;
                $one_activity['count'] = $count;
            }else if ($one_activity->good == 'between'){
                $one_activity['count'] = $count ;
            }else{
                if ($count > 0){
                    $count = $count-1;
                    $one_activity['count'] = $count;
                }else{
                    $one_activity['count'] = $count;
                }
            }
        }

        return view('Admin.Trash.parts.details',
            compact('trash','time_from','time_to','activity','last_activity','activities'))->render();
    }

    ##############################################
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
//        elseif ($status == 'partially_full'){
//            $activity = 'between';
//        }
        return $activity;
    }
}
