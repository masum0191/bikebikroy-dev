<?php

namespace App\Http\Controllers\User;
use notifications;
use App\Models\User;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Saveadd;
use App\Models\Setting;
use App\Models\Smssent;
use App\Models\Bikesale;
use Illuminate\Http\Request;
use App\Models\Medicineinformation;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardController extends Controller
{
 public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {

      // dd(Setting::value('defaultuserpackage_id'));
      if (request()->ajax()) {
        return datatables()->of(Bikesale::whereuser_id(Auth::id())->where('archive',0)->latest()->get())
          ->addColumn('action', function ($data) {
            $button = '<button title="Edit post" id="editBtn" style="border:0; background: none; padding: 0 !important"   class="btn-md"><a href="/user/bikesales/edit/'.$data->id .'"><i class="far fa-edit"></i></a></button> <button title="remove post" id="removeBtn" style="border:0; background: none; padding: 0 !important"   class="btn-md btn-denger"><a href="/user/bikesales/remove/'.$data->id .'">Remove</a></button>';
            $button .= '&nbsp;&nbsp;';
          
            return $button;
          })
          ->addColumn('view', function($data){
            if($data->status=='Active'){
           $button = '<a target="_blank" href="'.url('bikesale/'.$data->slug).'" class="btn-sm" title="Click for View"><i class="fas fa-link"></i></a>';
          return $button;
      }
      
      else {
          $button ='<i class="fas fa-link"></i>';
          return $button;
      }})
      ->addIndexColumn()
          ->rawColumns(['action','view'])
          ->make(true);
      }

      $breadcrumbs = [
        ['link' => "user/dashboard", 'name' => "Dashboard"],
    ];

      return view('user.dashboard')->with('breadcrumbs', $breadcrumbs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deletenotification()
    {
        $notification=auth()->user()->notifications()->delete();
        if($notification){
          //  $notification->destroy();
            return response()->json(['success'=>true],201);
        }
        else{
            return response()->json(['success'=>false],404);
        }
    }

    public function seennotification(){
        auth()->user()->unreadNotifications->markAsRead();
      return response()->json(['success'=>true],201);


    }
      public function addpostingview(){
   if(Auth::user()->username==null){
    return redirect()->intended('/user/profile');

   }
   else{
    return view('user.dashboard');
   }

    }

    public function saveadd($id,FlasherInterface $flasher){
        $check = Saveadd::wherebikesale_id($id)->whereuser_id(Auth::id())->first();
        //  dd($check);
          if ($check) {
              $flasher->addSuccess('You Allready Save This Add');
              return Redirect::back();


          } else {
            Saveadd::create([
                'user_id'=>Auth::id(),
                'bikesale_id'=>$id,
            ]);
            $flasher->addSuccess('Save This Add For You');
            return Redirect::back();
          }

    }
    


}