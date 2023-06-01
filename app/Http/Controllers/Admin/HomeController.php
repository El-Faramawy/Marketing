<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addition;
use App\Models\Menu;
use App\Models\School;
use App\Models\Trash;
use App\Models\TrashActivity;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Offer;
use App\Models\OrderDetails;
use App\Models\Governorate;
use App\Models\Setting;
use App\Models\Target;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{

    public function index(Request $request){
//        $trashes = Trash::all();
//        $time_from = $request->time_from ? date('Y-m-d',strtotime($request->time_from)):date('Y-m-d',strtotime('-7 day'));
//        $time_to = $request->time_to ?date('Y-m-d' ,strtotime($request->time_to)):date('Y-m-d' );
//        $activity = $request->activity ??  '';
//
//        $admin_count = Admin::count();
//        $trash_count = Trash::count();
//        $good_trash_count = Trash::where('system_status','good')->count();
//        $fault_trash_count = Trash::where('system_status','fault')->count();
//
//        if ($request->ajax()) {
//            $trashes = $this->trashDate($request)->get();
//
//            return Datatables::of($trashes)
//                ->addColumn('status', function ($trash) {
//                    $trash_status = $this->trashStatus($trash->system_status);
//                    return '
//                            <div class="card-header pt-0  pb-0 border-bottom-0">
//                            <a  class="badge badge-' . $trash_status['color'] . ' text-white ">' . $trash_status['status'] . '</a>
//                            </div>
//							';
//                })
//                ->addColumn('details', function ($trash) {
//                    return '<div class="card-options pr-2">
//                                    <a class="btn btn-sm btn-primary text-white "  href="' . route("trash_details", $trash->id) . '"><i class="fa fa-shopping-cart mb-0"></i></a>
//                           </div>';
//                })
//                ->editColumn('last_update', function ($trash) {
//                    $activity = TrashActivity::where('trash_id', $trash->id)->latest()->first();
//                    return date('Y-m-d', strtotime($activity->time)).' &nbsp; ' . date('h:i A', strtotime($activity->time)) ;
//                })
//                ->editColumn('subscription', function ($trash) {
//                    return $trash->subscription == 1 ?__('Active'): __('Inactive') ;
//                })
//
//                ->editColumn('location', function ($trash) {
//                    if (!$trash->location)return '';
//                    $text = __('go to address');
//                    return $trash->location .
//                        '<br><a href= "https://maps.google.com/?q='.$trash->latitude.','.$trash->longitude.'" target="_blank">'.$text.'</a>' ?? '';
//                })
//                ->escapeColumns([])
//                ->make(true);
//        }
//
        return view('Admin.index');
//        return view('Admin.index',['created_from'=>date('Y-m-d'),'created_to'=>date('Y-m-d')],
//            compact('trashes','admin_count','trash_count','good_trash_count','fault_trash_count'
//            ,'time_from','time_to','activity'
//            )
//        );
    }

    //###################################################

}
