<?php
namespace App\Http\Controllers\Admin;
use App\Models\Bikesale;
use App\Models\User;
use App\Models\Division;
use Jorenvh\Share\Share;
use App\Models\Bikebrand;
use App\Helpers\CommonFx;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
class BikesaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      if (request()->ajax()) {
        return datatables()->of(Bikesale::latest()->where('archive',0)->get())
          ->addColumn('action', function ($data) {
            $button = '<button title="Edit  Post" id="" style="border:0; background: none; padding: 0 !important"   rid="' . $data->id . '" class="btn-md"><a href="/admin/editbikesale/'.$data->id.'" class="btn btn-primary">
            <i class="far fa-edit"></i>
          </a></button>';
            $button .= '&nbsp;&nbsp;';
           $button .= '<button type="button" style="border:0; background: none; padding: 0 !important"  title="Ads archive"   id="deleteBtn" rid="' . $data->id . '" class="btn-sm btn-warning"><i class="fa fa-archive" aria-hidden="true"></i></button>';
            return $button;
          })
           ->addColumn('home', function($data){
            if($data->home_ad==null){
           $button = '<a  rid="' . $data->id . '" section="1"  class="btn-sm" id="active" title="Active"><i class="fa fa-ban"></i></a>';
            }else{
           $button = '<a   rid="' . $data->id . '" section="1"  class="btn-sm" id="inactive" title="Inactive"><i class="fas fa-heart" aria-hidden="true"></i>
</a>';
            }
           
          return $button;
      })
       ->addColumn('sections', function($data){
            if($data->section==1){
           $button = '<p class="text-success">Recent Bike</p>';
            }
            if($data->section==2){
           $button = '<p class="text-danger">Sports Bike</p>';
            }
             if($data->section==3){
           $button = '<p class="text-warning">Scooters Bike</p>';
            }
            if($data->section==0){
           $button = '<p class="text-primary">No Bike</p>';
            }
          return $button;
      })
          ->addColumn('view', function($data){
        
           $button = '<a target="_blank" href="'.url('admin/showbikesalepost/'.$data->slug).'" class="btn-sm" title="Click for View"><i class="fas fa-link"></i></a>';
          return $button;
      })
      ->addIndexColumn()
          ->rawColumns(['action','view','home','sections'])
          ->make(true);
      }

      $breadcrumbs = [
        ['link' => "admin/bikesalelist", 'name' => "Bikesale"],
    ];

      return view('admin.sale.bikesale')->with('breadcrumbs', $breadcrumbs);
    }
    public function recentsports()
    {
       // dd(Bikesale::latest()->where('archive',0)->where('biketype','Motorcycle')->get());

      if (request()->ajax()) {
        return datatables()->of(Bikesale::latest()->where('archive',0)->where('biketype','Motorcycle')->get())
          ->addColumn('action', function ($data) {
            $button = '<button title="Edit  Post" id="editBtn" style="border:0; background: none; padding: 0 !important"   rid="' . $data->id . '" class="btn-md"><i class="far fa-edit"></i></button>';
            $button .= '&nbsp;&nbsp;';
           $button .= '<button type="button" style="border:0; background: none; padding: 0 !important"  title="Ads archive"   id="deleteBtn" rid="' . $data->id . '" class="btn-sm btn-warning"><i class="fa fa-archive" aria-hidden="true"></i></button>';
            return $button;
          })
           ->addColumn('home', function($data){
            if($data->home_ad==null){
           $button = '<a  rid="' . $data->id . '" section="2"  class="btn-sm" id="active" title="Active"><i class="fa fa-ban"></i></a>';
            }else{
           $button = '<a   rid="' . $data->id . '"  section="2" class="btn-sm" id="inactive" title="Inactive"><i class="fas fa-heart" aria-hidden="true"></i>
</a>';
            }
           
          return $button;
      })
     ->addColumn('sections', function($data){
            if($data->section==1){
           $button = '<p class="text-success">Recent Bike</p>';
            }
            if($data->section==2){
           $button = '<p class="text-danger">Sports Bike</p>';
            }
             if($data->section==3){
           $button = '<p class="text-warning">Scooters Bike</p>';
            }
            if($data->section==0){
           $button = '<p class="text-primary">No Bike</p>';
            }
          return $button;
      })
          ->addColumn('view', function($data){
        
           $button = '<a target="_blank" href="'.url('admin/showbikesalepost/'.$data->slug).'" class="btn-sm" title="Click for View"><i class="fas fa-link"></i></a>';
          return $button;
      })
      ->addIndexColumn()
          ->rawColumns(['action','view','home','sections'])
          ->make(true);
      }

      $breadcrumbs = [
        ['link' => "admin/recentsports", 'name' => "Recent Sports Bike list"],
    ];

      return view('admin.sale.recentsports')->with('breadcrumbs', $breadcrumbs);
    }
    public function scooters()
    {
       // dd(Bikesale::latest()->where('archive',0)->where('biketype','Motorcycle')->get());

      if (request()->ajax()) {
        return datatables()->of(Bikesale::latest()->where('archive',0)->where('biketype','Scooters')->get())
          ->addColumn('action', function ($data) {
            $button = '<button title="Edit  Post" id="editBtn" style="border:0; background: none; padding: 0 !important"   rid="' . $data->id . '" class="btn-md"><i class="far fa-edit"></i></button>';
            $button .= '&nbsp;&nbsp;';
           $button .= '<button type="button" style="border:0; background: none; padding: 0 !important"  title="Ads archive"   id="deleteBtn" rid="' . $data->id . '" class="btn-sm btn-warning"><i class="fa fa-archive" aria-hidden="true"></i></button>';
            return $button;
          })
           ->addColumn('home', function($data){
            if($data->home_ad==null){
           $button = '<a  rid="' . $data->id . '" section="3"  class="btn-sm" id="active" title="Active"><i class="fa fa-ban"></i></a>';
            }else{
           $button = '<a   rid="' . $data->id . '" section="3"  class="btn-sm" id="inactive" title="Inactive"><i class="fas fa-heart" aria-hidden="true"></i>
</a>';
            }
           
          return $button;
      })
    ->addColumn('sections', function($data){
            if($data->section==1){
           $button = '<p class="text-success">Recent Bike</p>';
            }
            if($data->section==2){
           $button = '<p class="text-danger">Sports Bike</p>';
            }
             if($data->section==3){
           $button = '<p class="text-warning">Scooters Bike</p>';
            }
            if($data->section==0){
           $button = '<p class="text-primary">No Bike</p>';
            }
          return $button;
      })
          ->addColumn('view', function($data){
        
           $button = '<a target="_blank" href="'.url('admin/showbikesalepost/'.$data->slug).'" class="btn-sm" title="Click for View"><i class="fas fa-link"></i></a>';
          return $button;
      })
      ->addIndexColumn()
          ->rawColumns(['action','view','home','sections'])
          ->make(true);
      }

      $breadcrumbs = [
        ['link' => "admin/scooters", 'name' => "Recent Scooters Bike list"],
    ];

      return view('admin.sale.scooters')->with('breadcrumbs', $breadcrumbs);
    }
public function archivelist()
    {

      if (request()->ajax()) {
        return datatables()->of(Bikesale::latest()->where('archive',1)->get())
          ->addColumn('action', function ($data) {
            $button = '<button title="Post Restore" id="restotreBtn" style="border:0; background: none; padding: 0 !important"   rid="' . $data->id . '" class="btn-md"><i class="fa fa-trash-restore"></i></button>';
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
        ['link' => "admin/bikesalelist", 'name' => "archive-list"],
    ];

      return view('admin.sale.archivelist')->with('breadcrumbs', $breadcrumbs);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users=User::wherestatus(1)->select('id','fullname','phone')->get();
       return view('admin.sale.create',compact('users'));
    }

    public function store(Request $request, FlasherInterface $flasher)
    {
      //  dd($request->all());
        $this->validate($request, [
            'title' => 'required|min:3|max:190',
            'division_id' => 'required',
            'district_id' => 'required',
            'bikebrand_id' => 'required',
            'bikemodel_id' => 'required',
            'condition' => 'required|min:1|max:160',
           // 'edition' => 'required|min:1|max:198',
            'year' => 'required|min:1|max:198',
            'kilometerrun' => 'required|min:1|max:198',
            'cc' => 'required|min:1|max:198',
            'price' => 'required|min:1|max:198',
            'description' => 'required|min:1|max:500',
            'imageone' => 'mimes:jpeg,jpg,png,webp|required|max:5000',   
      
          ]);

      
          $waterMarkUrl = storage_path().'/app/files/shares/backend/watermark.png';


          if ($request->hasfile('imageone')) {
      
            if (!is_dir(storage_path() . "/app/files/shares/uploads/" . date('Y/m/') . "thumbs/")) {
              mkdir(storage_path() .  "/app/files/shares/uploads/" . date('Y/m/') . "thumbs/", 0777, true);
            }
      
            // $ex = $request->imageone->extension();
            $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
            $nameone = $rand . "." . 'webp';
            // $name = $rand . "." . $ex;
            $top=Image::make($request->imageone->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $nameone));
            $top->insert($waterMarkUrl, 'bottom-right', 5, 5);
            $top->save();
            $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $nameone)->resize(35, null, function ($constraint) {
              $constraint->aspectRatio();
            });
         
            $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $nameone, 60);
      
            }
            if ($request->hasfile('imagetwo')) {
      
                $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
                $nametwo = $rand . "." . 'webp';
                $top=Image::make($request->imagetwo->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $nametwo));
                $top->insert($waterMarkUrl, 'bottom-right', 5, 5);
                $top->save();
                $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $nametwo)->resize(35, null, function ($constraint) {
                  $constraint->aspectRatio();
                });
          
                $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $nametwo, 60);
          
                }
                else{
                    $nametwo='not-found.webp';
                }
                if ($request->hasfile('imagethree')) {
      
                    $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
                    $namethree = $rand . "." . 'webp';
                    $top=Image::make($request->imagethree->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $namethree));
                    $top->insert($waterMarkUrl, 'bottom-right', 5, 5);
                    $top->save();
                    $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $namethree)->resize(35, null, function ($constraint) {
                      $constraint->aspectRatio();
                    });
              
                    $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $namethree, 60);
              
                    }
                    else{
                        $namethree='not-found.webp';
                    }
                    if ($request->hasfile('imagefour')) {
      
                        $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
                        $namefour = $rand . "." . 'webp';
                        $top=Image::make($request->imagefour->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $namefour));
                        $top->insert($waterMarkUrl, 'bottom-right', 5, 5);
                        $top->save();
                        $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $namefour)->resize(35, null, function ($constraint) {
                          $constraint->aspectRatio();
                        });
                  
                        $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $namefour, 60);
                  
                        }
                        else{
                            $namefour='not-found.webp';
                        }
            $customerinfo = Bikesale::create(array(
                'title' => $request->title,
                'slug' =>CommonFx::bnslug(CommonFx::make_slug($request->title.'-in-year-'.date('Y').'-for-sale-'.$request->cc.'cc-bike')),
                'user_id' => $request->user_id,
                'admin_id' => Auth::id(),
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'thana_id' => $request->thana_id,
                'area_id' => $request->area_id,
                'condition' => $request->condition,
                'biketype' => $request->biketype,
                'bikebrand_id' => $request->bikebrand_id,
                'bikemodel_id' => $request->bikemodel_id,
                'edition' => $request->edition,
                'year' => $request->year,
                'manufacture' => $request->manufacture,
                'kilometerrun' => $request->kilometerrun,
                'cc' => $request->cc,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
                'description' => $request->description,
                'price' => $request->price,
                'negotiable' => $request->negotiable? true : false,
                'phonenumber' => $request->phonenumber,
                'photoone' => $nameone,
                'phototwo' => $nametwo,
                'photothree' => $namethree,
                'photofour' => $namefour,
                 'status' => $request->status,
                 'path' => date('Y/m'),
                
              ));
      
              if($customerinfo){
                $flasher->addSuccess('Post Create Successfully');
                return Redirect::to('admin/bikesalelist'); 
              }
              else{
                $flasher->addErrors('Post Create Fail');
                return Redirect::to('admin/createbikesale');
              }

    }
    public function show($id)
    {
      $Bike=Bikesale::with('division','district','thana','bikebrand','user.package')->latest()->whereslug($id)->first();
        $Bikeslider=Bikesale::wherestatus('Active')->take(6)->get();
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle($Bike->title);
        SEOTools::setDescription($Bike->metadescription);
        JsonLd::setType('proudct');
        $Similarbike=Bikesale::with('division','district','thana','bikebrand')->where('slug','!=',$id)->take(12)->get();
        $Divisionalbike=Division::with('bikesale')->get();
       return view('frontend.en.bikesale.show',compact('Similarbike','Bike','Bikeslider','Divisionalbike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bikesale  $bikesale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::wherestatus(1)->select('id','fullname','phone')->get();
        //select('status','id','phonenumber','screma','keyword','metadescription','title')
      $info = Bikesale::find($id);
     // dd($info);
      return view('admin.sale.edit',compact('info','users'));
       //return response()->json($info);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bikesale  $bikesale
     * @return \Illuminate\Http\Response
     */
        public function update($id,Request $request, FlasherInterface $flasher)
    {
       //dd($request->all());
        $this->validate($request, [
            'title' => 'required|min:3|max:190',
            'division_id' => 'required',
            'district_id' => 'required',
            'bikebrand_id' => 'required',
            //'bikemodel_id' => 'required',
            'condition' => 'required|min:1|max:160',
            //'edition' => 'required|min:1|max:198',
            'year' => 'required|min:1|max:198',
            'kilometerrun' => 'required|min:1|max:198',
            'cc' => 'required|min:1|max:198',
            'price' => 'required|min:1|max:198',
            'description' => 'required|min:1|max:500',
           // 'imageone' => 'mimes:jpeg,jpg,png,webp|required|max:5000',   
      
          ]);

            $customerinfo = Bikesale::find($id);
            //dd($customerinfo);
          $waterMarkUrl = storage_path().'/app/files/shares/backend/watermark.png';


          if ($request->hasfile('imageone')) {
      
            if (!is_dir(storage_path() . "/app/files/shares/uploads/" . date('Y/m/') . "thumbs/")) {
              mkdir(storage_path() .  "/app/files/shares/uploads/" . date('Y/m/') . "thumbs/", 0777, true);
            }
      
            // $ex = $request->imageone->extension();
            $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
            $nameone = $rand . "." . 'webp';
            // $name = $rand . "." . $ex;
            $top=Image::make($request->imageone->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $nameone));
            $top->insert($waterMarkUrl, 'bottom-right', 5, 5);
            $top->save();
            $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $nameone)->resize(70, null, function ($constraint) {
              $constraint->aspectRatio();
            });
         
            $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $nameone, 60);
            $path=date('Y/m');
      
            }else{
               $nameone= $customerinfo->photoone;
               $path=$customerinfo->path;
               
               
            } 
            if ($request->hasfile('imagetwo')) {
      
                $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
                $nametwo = $rand . "." . 'webp';
                $top=Image::make($request->imagetwo->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $nametwo));
                $top->insert($waterMarkUrl, 'bottom-right', 5, 5);
                $top->save();
                $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $nametwo)->resize(35, null, function ($constraint) {
                  $constraint->aspectRatio();
                });
          
                $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $nametwo, 60);
                $path=date('Y/m');
                }
                else{
                $path=$customerinfo->path;
                $nametwo= $customerinfo->phototwo;
                 }
                
                if ($request->hasfile('imagethree')) {
      
                    $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
                    $namethree = $rand . "." . 'webp';
                    $top=Image::make($request->imagethree->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $namethree));
                    $top->insert($waterMarkUrl, 'bottom-right', 5, 5);
                    $top->save();
                    $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $namethree)->resize(35, null, function ($constraint) {
                      $constraint->aspectRatio();
                    });
              
                    $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $namethree, 60);
                    $path=date('Y/m');
                    }
                    else{
                         $path=$customerinfo->path;
                        $namethree=$customerinfo->photothree;
                    }
                    if ($request->hasfile('imagefour')) {
      
                        $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
                        $namefour = $rand . "." . 'webp';
                        $top=Image::make($request->imagefour->move(storage_path('/app/files/shares/uploads/' . date('Y/m')), $namefour));
                        $top->insert($waterMarkUrl, 'bottom-right', 5, 5);
                        $top->save();
                        $resizedImage_thumbs = Image::make(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . $namefour)->resize(35, null, function ($constraint) {
                          $constraint->aspectRatio();
                        });
                  
                        $resizedImage_thumbs->save(storage_path() . '/app/files/shares/uploads/' . date('Y/m/') . 'thumbs/' . $namefour, 60);
                        $path=date('Y/m');
                        }
                        else{
                             $path=$customerinfo->path;
                            $namefour=$customerinfo->photofour;
                        }
               
                $updateResult = $customerinfo->update(array(
                'title' => $request->title,
                'slug' =>CommonFx::bnslug(CommonFx::make_slug($request->title.'-in-year-'.date('Y').'-for-sale-'.$request->cc.'cc-bike')),
                'user_id' => $request->user_id,
                'admin_id' => Auth::id(),
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'thana_id' => $request->thana_id,
                'area_id' => $request->area_id,
                'condition' => $request->condition,
                'biketype' => $request->biketype,
                'bikebrand_id' => $request->bikebrand_id,
                'bikemodel_id' => $request->bikemodel_id,
                'edition' => $request->edition,
                'year' => $request->year,
                'manufacture' => $request->manufacture,
                'kilometerrun' => $request->kilometerrun,
                'cc' => $request->cc,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
                'description' => $request->description,
                'price' => $request->price,
                'negotiable' => $request->negotiable? true : false,
                'phonenumber' => $request->phonenumber,
                //'photoone' => @$nameone ? @$nameone : $customerinfo->photoone,
                // 'photoone' => isset($nameone) ? $nameone : $customerinfo->photoone,
                // 'phototwo' => isset($nametwo) ? $nametwo : $customerinfo->phototwo,
                // 'photothree' => isset($namethree) ? $namethree : $customerinfo->photothree,
                // 'photofour' => isset($namefour) ? $namefour : $customerinfo->photofour,
              //'photoone' => isset($customerinfo->photoone) ? $nameone : null,

                'photoone' => @$nameone,
                'phototwo' => @$nametwo,
                'photothree' => @$namethree,
                'photofour' => @$namefour,
                 'status' => $request->status,
                 'path' => $path,
                
              ));
      
              if($customerinfo){
                $flasher->addSuccess('Post Update Successfully');
                //return Redirect::to('admin/bikesalelist'); 
                return back();
              }
              else{
                $flasher->addErrors('Post Create Fail');
                return Redirect::to('admin/createbikesale');
              }

    }
    public function updateold(Request $request,$id)
    {


      $validator = Validator::make($request->all(),[
          'title' => 'required',
          // 'metadescription' => 'required|email|unique:admins,email,'.$id,
          'metadescription' => 'required|min:3|max:160',
          'status' => 'required',
           ]);
           if ($validator->fails()) {
            return response()->json([
                 'success' => false,
                 'errors' => $validator->errors()->all()
             ]);
     } else {
          $list =  Bikesale::find($id);
          $list->admin_id = Auth::id();
          $list->admintype = $request->admintype;
          $list->title = $request->title;
          $list->phonenumber = $request->phonenumber;
          $list->manufacture = $request->manufacture;
          $list->year = $request->year;
          $list->metadescription = $request->metadescription;
          $list->status = $request->status;
          $list->keyword =$request->keyword;
          $list->screma =$request->screma;
          $list->update();
          return response()->json([
         'success' => true,
         ],201);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bikesale  $bikesale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $list =  Bikesale::find($id)->delete();
        return response()->json(['success' => true,],201);
    }
     
    public function home_active($id,$section){
        if($section==1){
        $list =  Bikesale::find($id);
        $list->home_ad  =1;
        $list->section  =1;
        $list->update();
        return response()->json(['success' => true,],201);
            
        }
        if($section==2){
        $list =  Bikesale::find($id);
        $list->home_ad  =1;
        $list->section  =2;
        $list->update();
        return response()->json(['success' => true,],201);
            
        }
        if($section==3){
        $list =  Bikesale::find($id);
        $list->home_ad  =1;
        $list->section  =3;
        $list->update();
        return response()->json(['success' => true,],201);
            
        }
    }
    public function home_inactive($id){
        $list =  Bikesale::find($id);
        $list->home_ad  =null;
        $list->section  =0;
        $list->update();
        return response()->json(['success' => true,],201);
    }
    
    public function archive($id){
        $list =  Bikesale::find($id);
        $list->archive  =1;
        $list->update();
        return response()->json(['success' => true,],201);
    }
    public function restore($id){
        $list =  Bikesale::find($id);
        $list->archive  =0;
        $list->update();
        return response()->json(['success' => true,],201);
    }
}