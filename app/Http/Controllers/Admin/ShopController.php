<?php
namespace App\Http\Controllers\Admin;
use notifications;
use App\Models\Bikesale;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Saveadd;
use App\Models\Setting;
use App\Models\Smssent;
use App\Models\Bikeshop;
use App\Helpers\CommonFx;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{

    public function index()
    {

      if (request()->ajax()) {
        return datatables()->of(Bikeshop::with('user')->latest()->get())
          ->addColumn('action', function ($data) {
            $button = '<a title="Edit Shop" id="editBtn" style="border:0; background: none; padding: 0 !important"   href="'.url('/admin/editbikeshop/'. $data->id).'" class="btn-md"><i class="far fa-edit"></i></a>';
            $button .= '&nbsp;&nbsp;';
           $button .= '<button type="button" style="border:0; background: none; padding: 0 !important"  title="Delete"   id="deleteBtn" rid="' . $data->_id . '" class="btn-sm btn-warning"><i class="fas fa-trash"></i></button>';
            return $button;
          })
          ->addColumn('view', function($data){
           $button = '<a target="_blank" href="'.url('admin/bikeshopdetails/'.$data->slug).'" class="btn-sm" title="Click for View"><i class="fas fa-link"></i></a>';
          return $button;
    
      })
      ->addIndexColumn()
          ->rawColumns(['action','view'])
          ->make(true);
      }

      $breadcrumbs = [
        ['link' => "admin/dashboard", 'name' => "Dashboard"],
    ];

      return view('admin.shop.index')->with('breadcrumbs', $breadcrumbs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Bikeshop=Bikeshop::find($id);
        return view('admin.shop.edit')->with('Bikeshop',$Bikeshop);
    }

    public function show($id){
      $Bikeshop= Bikeshop::with('user.bikesale')->whereslug($id)->first();
    if($Bikeshop){
          $Allbikes=Bikesale::with('division','district','thana','bikebrand','user.package')->wherestatus('Active')->whereuser_id($Bikeshop->user_id)->latest()->paginate(20);
      return view('frontend.en.shop.show')->with('Bikeshopinfo',$Bikeshop)->with('Allbikes',$Allbikes);
    }
      }
  
  

      public function update(Request $request,$id, FlasherInterface $flasher){

          $this->validate($request, [
              'shopname' => 'required|min:3|max:190',
              Rule::unique('bikeshops', 'shopname')->ignore($id, 'id'),
              'contactnumber' => 'required',
            //   'bikemodel_id' => 'required',
              'description' => 'required|min:1',
              'address' => 'required|min:1',
              ]);



              $customerinfo = Bikeshop::find($id)->update(array(
                  'shopname' => $request->shopname,
                  'slug' =>CommonFx::make_slug($request->shopname),
                  'admin_id' => Auth::id(),
                  'shopemail' => $request->shopemail,
                  'facebookshoplink' => $request->facebookshoplink,
                  'address' => $request->address,
                  'contactnumber' => $request->contactnumber,
                  'googleamplocaltion' => $request->googleamplocaltion,
                  'description' => $request->description,
                  'status' => $request->status,


                ));

                if($customerinfo){
                  $flasher->addSuccess('Shop Update  Successfully');
                  return Redirect::to('admin/bikeshoplist');
                }
                else{
                    $flasher->addErrors('Shop Update  Fail');
                  return Redirect::back();
                }

    }

    public function saveadd($id,FlasherInterface $flasher){
        $check = Saveadd::whereBikeshop_id($id)->whereuser_id(Auth::id())->first();
        //  dd($check);
          if ($check) {
              $flasher->addSuccess('You Allready Save This Add');
              return Redirect::back();


          }
          else {
            Saveadd::create([
                'user_id'=>Auth::id(),
                'Bikeshop_id'=>$id,
            ]);
            $flasher->addSuccess('Save This Add For You');
            return Redirect::back();
          }

    }


}
