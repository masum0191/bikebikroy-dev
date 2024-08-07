<?php

namespace App\Http\Controllers\User;
use notifications;
use App\Models\User;
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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{
 public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {

      // dd(Setting::value('defaultuserpackage_id'));
      if (request()->ajax()) {
        return datatables()->of(Bikeshop::whereuser_id(Auth::id())->latest()->get())
          ->addColumn('action', function ($data) {
            $button = '<a title="Edit Shop" id="editBtn" style="border:0; background: none; padding: 0 !important" href="'.url('user/editbikeshop/'.$data->id).'"    class="btn-md"><i class="far fa-edit"></i></a>';
            return $button;
          })
          ->addColumn('view', function($data){
            if($data->status=='Active'){
           $button = '<a target="_blank" href="'.url('bikeshop/'.$data->slug).'" class="btn-sm" title="Click for View"><i class="fas fa-link"></i></a>';
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

      return view('user.shop.index')->with('breadcrumbs', $breadcrumbs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,FlasherInterface $flasher)
    { if (empty(CommonFx::Bikeshop())){
      return view('user.shop.create');
    }
    else{
         $flasher->addErrors('Please Use Another Account for Create Shop');
      return redirect()->back();
    }
       
    }


      public function store(Request $request, FlasherInterface $flasher){
  
          $this->validate($request, [
              'shopname' => 'required|min:3|max:190|unique:bikeshops',
              'contactnumber' => 'required',
            //   'bikemodel_id' => 'required',
              'description' => 'required|min:1',
              'address' => 'required|min:1',
             'profilephoto' => 'mimes:jpeg,jpg,png,webp|required|max:5000',
              'coverphoto' => 'mimes:jpeg,jpg,png,webp|required|max:10000',

            ]);




            if ($request->hasfile('profilephoto')) {

              if (!is_dir(storage_path() . "/app/files/shares/uploads/" . date('Y/m/') . "thumbs/")) {
                mkdir(storage_path() .  "/app/files/shares/uploads/" . date('Y/m/') . "thumbs/", 0777, true);
              }

              // $ex = $request->imageone->extension();
              $rand = uniqid(CommonFx::make_slug(Str::limit($request->shopname, 30)));
              $nameone = $rand . "." . 'webp';
             $top = $request->profilephoto->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $nameone);

              $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $nameone)->resize(35, null, function ($constraint) {
                $constraint->aspectRatio();
              });

              $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $nameone, 60);

              }
              if ($request->hasfile('coverphoto')) {

                  $rand = uniqid(CommonFx::make_slug(Str::limit($request->shopname, 40)));
                  $nametwo = $rand . "." . 'webp';
                  $top = $request->coverphoto->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $nametwo);

                  $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $nametwo)->resize(35, null, function ($constraint) {
                    $constraint->aspectRatio();
                  });

                  $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $nametwo, 60);

                  }
                  else{
                      $nametwo='not-found.webp';
                  }

              $customerinfo = Bikeshop::create(array(
                  'shopname' => $request->shopname,
                  'slug' =>CommonFx::make_slug($request->shopname),
                  'user_id' => Auth::id(),
                  'shopemail' => $request->shopemail,
                  'facebookshoplink' => $request->facebookshoplink,
                  'address' => $request->address,
                  'contactnumber' => $request->contactnumber,
                  'googleamplocaltion' => $request->googleamplocaltion,
                  'description' => $request->description,
                  'profilephoto' => $nameone,
                  'coverphoto' => $nametwo,
                   'status' => 'Pending',
                   'path' => date('Y/m'),

                ));

                if($customerinfo){
                  $flasher->addSuccess('Shop Create Application Successfully');
                  return Redirect::to('user/addshop');
                }
                else{
                    $flasher->addErrors('Shop Create Application Fail');
                  return Redirect::back();
                }

    }
    public function edit($id){
      $Shop=Bikeshop::whereuser_id(Auth::id())->find($id);
      return view('user.shop.edit')->with('Bikeshop',$Shop);
    }

    public function update(Request $request, FlasherInterface $flasher,$id){
  
      $this->validate($request, [
          'shopname' => 'required|min:3|max:190|unique:bikeshops,shopname,'.$id,
          'contactnumber' => 'required',
        //   'bikemodel_id' => 'required',
          'description' => 'required|min:1',
          'address' => 'required|min:1',
         
        ]);


       $image= Bikeshop::find($id);

        if ($request->hasfile('profilephoto')) {

      // $ex = $request->imageone->extension();
          $rand = uniqid(CommonFx::make_slug(Str::limit($request->shopname, 30)));
          $nameone = $rand . "." . 'webp';
         $top = $request->profilephoto->move(storage_path('/app/files/shares/uploads/' .  $image->path.'/'), $nameone);

          $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . $image->path.'/' . $nameone)->resize(35, null, function ($constraint) {
            $constraint->aspectRatio();
          });

          $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' .$image->path.'/' . 'thumbs/' . $nameone, 60);

          }
          else{
            $nameone= $image->profilephoto;
          }
          if ($request->hasfile('coverphoto')) {

              $rand = uniqid(CommonFx::make_slug(Str::limit($request->shopname, 40)));
              $nametwo = $rand . "." . 'webp';
              $top = $request->coverphoto->move(storage_path('/app/files/shares/uploads/' . $image->path.'/'), $nametwo);

              $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . $image->path.'/' . $nametwo)->resize(35, null, function ($constraint) {
                $constraint->aspectRatio();
              });

              $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . $image->path.'/' . 'thumbs/' . $nametwo, 60);

              }
              else{
                  $nametwo= $image->coverphoto;
              }

          $customerinfo = Bikeshop::find($id)->update(array(
              'shopname' => $request->shopname,
              'slug' =>CommonFx::make_slug($request->shopname),
              'user_id' => Auth::id(),
              'shopemail' => $request->shopemail,
              'facebookshoplink' => $request->facebookshoplink,
              'address' => $request->address,
              'contactnumber' => $request->contactnumber,
              'googleamplocaltion' => $request->googleamplocaltion,
              'description' => $request->description,
              'profilephoto' => $nameone,
              'coverphoto' => $nametwo,
               'status' => 'Pending',
            
            ));

            if($customerinfo){
              $flasher->addSuccess('Shop Update  Successfully');
              return Redirect::to('user/addshop');
            }
            else{
                $flasher->addErrors('Shop Update Application Fail');
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
