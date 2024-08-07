<?php

namespace App\Http\Controllers;
use notifications;
use App\Models\User;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Bikesale;
use App\Models\Setting;
use App\Models\Smssent;
use App\Models\Bikeshop;
use App\Helpers\CommonFx;
use Illuminate\Support\Str;
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
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{

    public function index()
    {

      // dd(Setting::value('defaultuserpackage_id'));
      if (request()->ajax()) {
        return datatables()->of(Bikeshop::whereuser_id(Auth::id())->latest()->get())
          ->addColumn('action', function ($data) {
            $button = '<button title="Edit Division" id="editBtn" style="border:0; background: none; padding: 0 !important"   rid="' . $data->_id . '" class="btn-md"><i class="far fa-edit"></i></button>';
            $button .= '&nbsp;&nbsp;';
           $button .= '<button type="button" style="border:0; background: none; padding: 0 !important"  title="Delete"   id="deleteBtn" rid="' . $data->_id . '" class="btn-sm btn-warning"><i class="fas fa-trash"></i></button>';
            return $button;
          })
          ->addColumn('view', function($data){
            if($data->language=='en'){
           $button = '<a target="_blank" href="'.url('bikeshop/'.$data->slug).'" class="btn-sm" title="Click for View"><i class="fas fa-link"></i> '.$data->view.'</a>';
          return $button;
      }

      else {
          $button ='<a target="_blank" href="'.url('bikeshop/'.$data->slug).'" class="btn-sm" title="Click for View"><i class="fas fa-link"></i> '.$data->view.'</a>';
          return $button;
      }})
      ->addIndexColumn()
          ->rawColumns(['action','view'])
          ->make(true);
      }

      $breadcrumbs = [
        ['link' => "user/dashboard", 'name' => "Dashboard"],
    ];

      return view('user.shop.index')->with('breadcrumbs', $breadcrumbs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (empty(CommonFx::Bikeshop())){
        return view('user.shop.create');
      }
      else{
        
      }
       
    }


      public function show($id){
    $Bikeshop= Bikeshop::with('user.bikesale')->whereslug($id)->wherestatus('Active')->first();
	if($Bikeshop){
        $Allbikes=Bikesale::with('division','district','thana','bikebrand','user.package')->wherestatus('Active')->whereuser_id($Bikeshop->user_id)->latest()->paginate(20);
		return view('frontend.en.shop.show')->with('Bikeshopinfo',$Bikeshop)->with('Allbikes',$Allbikes);
	}
    }


}
