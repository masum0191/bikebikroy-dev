<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Models\Bikesale;
use App\Models\Superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\CommonFx;
use Illuminate\Support\Str;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Notifications\Adminupdatenotification;
use Yajra\DataTables\Contracts\DataTable;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
  public function index(){
         if (request()->ajax()) {
        return datatables()->of(User::latest()->get())
          ->addColumn('action', function ($data) {
            $button = '<button title="Edit  User" id="editBtn" style="border:0; background: none; padding: 0 !important"   rid="' . $data->id . '" class="btn-md"><i class="far fa-edit"></i></button>';
            $button .= '&nbsp;&nbsp;';
           $button .= '<button type="button" style="border:0; background: none; padding: 0 !important"  title="Delete"   id="deleteBtn" rid="' . $data->id . '" class="btn-sm btn-warning"><i class="fas fa-trash"></i></button> <a href="/admin/user/ads/' . $data->id . '">adds</a>';
            return $button;
          })
          ->addColumn('status', function($data){
            if($data->status==0){
           $button = '<button type="button" rid="'.$data->id.'" class="btn-sm Approved" title="Click for Active"><i class="fas fa-ban"></i></button>';
          return $button;
      }
      
      else {
          $button = '<button type="button" rid="'.$data->id.'"   title="Click for Inactive" class=" btn-sm Draft Notapproved" ><i class="fas fa-check-square"></i> </button>';
          return $button;
      }})
      ->addIndexColumn()
          ->rawColumns(['action','status'])
          ->make(true);
      }

      $breadcrumbs = [
        ['link' => "admin/userlist", 'name' => "Userlist"],
    ];

      return view('admin.user.index')->with('breadcrumbs', $breadcrumbs);
    }
    public function create()
    {
     
       return view('admin.user.create');
    }

     public function store(Request $request, FlasherInterface $flasher){
//  dd($request->all());
      $this->validate($request,[
     'email' => 'required|email|unique:users',
     'salepost' => 'required|min:1|max:198',
     'phone' => 'required|max:30',
     'password' => 'required|min:6|max:30',
     'fullname' => 'required|min:6|max:30',
     'status' => 'required',
     'division_id' => 'required',
     'district_id' => 'required',
     'thana_id' => 'required',
     'area_id' => 'required',
     'photo' => 'mimes:jpeg,jpg,png,webp|required|max:5000'
    //  'retypepassword' => 'required|same:password',


      ]);
      if ($request->hasfile('photo')) {

        if (!is_dir(storage_path() . "/app/files/shares/uploads/" . date('Y/m/') . "thumbs/")) {
          mkdir(storage_path() .  "/app/files/shares/uploads/" . date('Y/m/') . "thumbs/", 0777, true);
        }

        // $ex = $request->imageone->extension();
        $rand = uniqid(CommonFx::make_slug(Str::limit(Auth::user()->fullname, 40)));
        $nameone = $rand . "." . 'webp';
        // $name = $rand . "." . $ex;

        $top = $request->photo->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $nameone);

        $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $nameone)->resize(35, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $nameone, 60);

      $userinfo = User::create([
        'admin_id'=>Auth::id(),
        'fullname'=>$request->fullname,
        'username'=>$request->fullname.$request->phone,
        'phone'=>$request->phone,
        'email'=>strtolower(trim($request->email)),
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
         'thana_id' => $request->thana_id,
          'area_id' => $request->area_id,
        'status'=>trim($request->status),
        'image'=>trim('not-found.jpg'),
        'password' =>Hash::make($request->password),
         'photo'=>$nameone,
        'path' =>date('Y/m'),
      ]);
    }
    if($userinfo){

      $flasher->addSuccess('User Create Successfully');
      return Redirect::to('admin/userlist'); 
    }
    else{
      $flasher->addErrors('User Create Fail');
      return Redirect::to('admin/createuser');
    }

   }
   public function edit($id)
   {
      $info=User::find($id);
      return response()->json($info);
   }



   public function update(Request $request,$id){

   
    $validator = Validator::make($request->all(),[
      'fullname' => 'required',
       'email' => 'required|email|unique:users,email,'.$id,
       'salepost' => 'required',
       'status' => 'required',
       ]);
       if ($validator->fails()) {
        return response()->json([
             'success' => false,
             'errors' => $validator->errors()->all()
         ]);
 } else {
      $list =  User::find($id);
      if($request->password==null){
        $pass=$list->password;}
        else{
          $pass=Hash::make($request->password);
        }
      $list->admin_id = Auth::id();
      $list->salepost = $request->salepost;
      $list->email = $request->email;
       $list->phone = $request->phone;
       $list->password = $pass;
  $list->status = $request->status;
   $list->update();
 return response()->json([
  'success' => true,

],201);
}
}

    public function destroy($id){

      $info=User::findOrFail($id)->delete();
     if($info){
      return response()->json([
        'success' => true,
      
      ],201);
     }
     else{
      return response()->json([
        'success' => false,
      
      ],404);
     }
      }
// ads create 
    public function adcreate($id){
       // dd($id);
       $user=Bikesale::where('user_id',$id)->get();
       //dd($user);
        if (request()->ajax()) {
        return datatables()->of($user)
          ->addColumn('action', function ($data) {
            $button = '<button title="Edit  Post" id="editBtn" style="border:0; background: none; padding: 0 !important"   rid="' . $data->id . '" class="btn-md"><i class="far fa-edit"></i></button>';
            $button .= '&nbsp;&nbsp;';
           $button .= '<button type="button" style="border:0; background: none; padding: 0 !important"  title="Delete"   id="deleteBtn" rid="' . $data->id . '" class="btn-sm btn-warning"><i class="fas fa-trash"></i></button>';
            return $button;
          })
          ->addColumn('view', function($data){
        
           $button = '<a target="_blank" href="'.url('admin/showbikesalepost/'.$data->slug).'" class="btn-sm" title="Click for View"><i class="fas fa-link"></i></a>';
          return $button;
      })
      ->addIndexColumn()
          ->rawColumns(['action','view'])
          ->make(true);
      }

      $breadcrumbs = [
        ['link' => "admin/bikesalelist", 'name' => "Bikesale"],
    ];
        return view('admin.bike.bikesels')->with('breadcrumbs', $breadcrumbs);
    }
}

