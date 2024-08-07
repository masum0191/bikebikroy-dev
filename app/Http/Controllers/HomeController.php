<?php

namespace App\Http\Controllers;
use App\Models\Disease;
use App\Models\Medicine;
use App\Models\Blog;
use App\Models\User;
use App\Models\Bikesale;
use App\Models\Bikebrand;
use App\Models\Division;
use App\Models\Procategory;
use Illuminate\Http\Request;
use App\Helpers\CommonFx;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Jorenvh\Share\Share;
use Flasher\Prime\FlasherInterface;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;
class HomeController extends Controller
{

// magicad
public function magicad($key,$brandname){
  
    $k="01d3eafd9fb565419fba52e1e14a7d5a";
    if($k==$key){
        $Bikebrand=Bikebrand::where('slug', $brandname)->first();
        if($Bikebrand){
        $magicbike=Bikesale::where('bikebrand_id',$Bikebrand->id)->select('id','title','price')->take(3)->get();
        return response()->json(["status" => "success", "code" => 200
        , "data" => compact('magicbike')
       ]);
        }
        else{
        $magicbike=Bikesale::inRandomOrder()->select('id','title','price')->take(3)->get();
        return response()->json(["status" => "success", "code" => 200
        , "data" => compact('magicbike')
       ]);  
        }
    }
    else{
        return response()->json(["status" => "error", "code" => 201,"massege"=>"Something went wrong! Your key is wrong",]);
    }
}

    public function index(){
      SEOMeta::setRobots('index, follow');
      SEOTools::setTitle('BikeBikroy - Best Motorcycle Marketplace in Bangladesh');
      SEOTools::setDescription('Find Your best 2nd hand, new motorcycle deals, accessories, and gears across Bangladesh. Buy or sell in every motorcycle category');
      JsonLd::setType('WebSite');
      $Bikebrad=Bikebrand::with('bikesale')->wherehome(1)->orderBy('sequence','ASC')->wherestatus(1)->limit(30)->get();
      $recentbike=Bikesale::with('division','district','thana','bikebrand')->where('home_ad',1)->where('section',1)->take(4)->inRandomOrder()->get();
      //dd($recentbike);
      $recentsports=Bikesale::with('division','district','thana','bikebrand')->orderBy('id','DESC')->where('biketype','Motorcycle')->where('home_ad',1)->where('section',2)->take(4)->get();
      $recentscooters =Bikesale::with('division','district','thana','bikebrand')->orderBy('id','DESC')->where('biketype','Scooters')->where('home_ad',1)->where('section',3)->take(4)->get();
     return view('welcome',compact('Bikebrad','recentbike','recentscooters','recentsports'));


}
public function contactus()
{
    SEOMeta::setRobots('index, follow');
    SEOTools::setTitle('Contact US || Bikebikroy');
    SEOTools::setDescription('Bikebikroy is the Best online bikebikroy Company in Bangladesh');
    JsonLd::setType('ListItem');
    OpenGraph::addProperty('type', 'listitem');
    SEOTools::opengraph()->setUrl('https://www.bikebikroy.com/contact-us');
    OpenGraph::addImage(url('storage/app/files/shares/backend/sdfohibd-english-sitelogo.png'), ['height' => 200, 'width' => 200]);
    SEOTools::jsonLd()->addImage(url('storage/app/files/shares/backend/sohibdsfd-english-sitelogo.png'));
    return view('frontend.contact');
}
  public function disclaimer()
{
    SEOMeta::setRobots('index, follow');
    SEOTools::setTitle('Disclaimer  || Bikebikroy');
    SEOTools::setDescription('Bikebikroy is the Best online bikebikroy Company in Bangladesh');
    JsonLd::setType('ListItem');
    OpenGraph::addProperty('type', 'listitem');
    SEOTools::opengraph()->setUrl('https://www.bikebikroy.com/disclaimer');
    OpenGraph::addImage(url('storage/app/files/shares/backend/not_found.webp'), ['height' => 200, 'width' => 200]);
    return view('frontend.disclaimer');
} 
     public function privacypolicy()
{
    SEOMeta::setRobots('index, follow');
    SEOTools::setTitle('Privacy Policy  || Bikebikroy');
    SEOTools::setDescription('Bikebikroy is the Best online bikebikroy Company in Bangladesh');
    JsonLd::setType('ListItem');
    OpenGraph::addProperty('type', 'listitem');
    SEOTools::opengraph()->setUrl('https://www.bikebikroy.com/privacypolicy');
    OpenGraph::addImage(url('storage/app/files/shares/backend/sohisdfbd-english-sitelogo.png'));
    SEOTools::jsonLd()->addImage(url('storage/app/files/shares/backend/sohibd-english-sitelogo.png'), ['height' => 200, 'width' => 200]);
    return view('frontend.privacypolicy');
} 

public function advertisement()
{
    SEOMeta::setRobots('index, follow');
    SEOTools::setTitle('Advertisement On Bikebikroy  || Bikebikroy');
    SEOTools::setDescription('Bikebikroy is the Best online bikebikroy Company in Bangladesh');
    JsonLd::setType('ListItem');
    OpenGraph::addProperty('type', 'listitem');
    SEOTools::opengraph()->setUrl('https://www.bikebikroy.com/advertisement-on-dsfds');
    OpenGraph::addImage(url('storage/app/files/shares/backend/sohibd-english-sitelogo.png'), ['height' => 200, 'width' => 200]);
    SEOTools::jsonLd()->addImage(url('storage/app/files/shares/backend/sohibsdfd-english-sitelogo.png'));
    return view('frontend.advertisement');
} 
  public function termsandcondition()
{
    SEOMeta::setRobots('index, follow');
    SEOTools::setTitle('Terms And Condition || Bikebikroy');
    SEOTools::setDescription('Bikebikroy is the Best online bikebikroy Company in Bangladesh');
    JsonLd::setType('ListItem');
    OpenGraph::addProperty('type', 'listitem');
    SEOTools::opengraph()->setUrl('https://www.bikebikroy.com/terms-and-conditions');
    OpenGraph::addImage(url('storage/app/files/shares/backend/ssdfohibd-english-sitelogo.png'), ['height' => 200, 'width' => 200]);
    SEOTools::jsonLd()->addImage(url('storage/app/files/shares/backend/sohibd-english-sitelogo.png'));
    return view('frontend.termsandcondition');
}

    public function allbrand(){
      SEOMeta::setRobots('index, follow');
      SEOTools::setTitle('Bikebikory');
      SEOTools::setDescription('Buy and Sale Your Bike');
      JsonLd::setType('WebSite');
      $Bikebradtop=Bikebrand::with('bikesale')->wherehome(1)->orderBy('sequence','ASC')->wherestatus(1)->limit(30)->get();
      $Bikebrad=Bikebrand::with('bikesale')->wherestatus(1)->get();
     return view('frontend.en.brand.index',compact('Bikebrad','Bikebradtop'));


}


    public function findbike(Request $request){
        // dd($request->keyword);
        // $Allbikes=Bikesale::with('district','thana','bikebrand','bikemodel','user.package')->wherestatus('Active')->where('title', 'like', '%' . $request->keyword . '%')->orwhere('description', 'like', '%' . $request->keyword . '%')->latest()->paginate(20);
       SEOMeta::setRobots('index, follow');
        SEOTools::setTitle('Bikebikory');
        SEOTools::setDescription('Buy and Sale Your Bike');
        JsonLd::setType('WebSite');
        $Allbikes=Bikesale::with('district','thana','bikebrand','bikemodel','user.package')->wherestatus('Active')->where('title', 'like', '%' . $request->keyword . '%')->latest()->paginate(20);
        $Bikeslider=Bikesale::wherestatus('Active')->take(6)->get();
        // dd($Bikeslider);
        $Bikebrad=Bikebrand::with('bikesale')->wherestatus(1)->get();
        $Divisionalbike=Division::with('bikesale')->get();
       return view('frontend.en.search.show',compact('Bikebrad','Allbikes','Bikeslider','Divisionalbike'));


}
// quickads
public function quickads(){ 
    return view('user.bikesale.quickad');
}


public function quickadstore(Request $request, FlasherInterface $flasher)
{
   $user = User::where('phone', $request->phonenumber)->first();
 
    //dd($user);
    if (!$user) {
        $user1 = User::create([
            'fullname' => 'Guest_user' . mt_rand(10000, 99999),
            'email' => "Guest_email" . mt_rand(10000, 99999) . "@gmail.com",
            'salepost' => 10,
            'phone' => $request->phonenumber,
            'status' => 1
        ]);
//dd($user1);
 	Auth::login($user1, true);
//return back();
$waterMarkUrl = storage_path('/app/files/shares/backend/watermark.png');
    $path = storage_path('/app/files/shares/uploads/' . date('Y/m'));
    $thumbsPath = $path . '/thumbs';

    if (!is_dir($thumbsPath)) {
        mkdir($thumbsPath, 0777, true);
    }

    $imageFiles = ['imageone', 'imagetwo', 'imagethree', 'imagefour'];
    $imageNames = [];

    foreach ($imageFiles as $imageFile) {
        if ($request->hasFile($imageFile)) {
            $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
            $imageName = $rand . '.webp';
            $image = Image::make($request->file($imageFile)->move($path, $imageName));
            $image->insert($waterMarkUrl, 'bottom-right', 5, 5);
            $image->save();

            $resizedImage = Image::make($path . '/' . $imageName)->resize(35, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizedImage->save($thumbsPath . '/' . $imageName, 60);

            $imageNames[$imageFile] = $imageName;
        } else {
            $imageNames[$imageFile] = 'not-found.webp';
        }
    }

    $slug = CommonFx::bnslug(CommonFx::make_slug($request->title . '-in-year-' . date('Y') . '-for-sale-' . $request->cc . 'cc-bike'));
    $bikeSaleData = [
        'title' => $request->title,
        'slug' => $slug,
        'user_id' => $user1->id,
        'bikebrand_id' => $request->bikebrand_id,
        'bikemodel_id' => $request->bikemodel_id,
        'price' => $request->price,
        'negotiable' => $request->negotiable ? true : false,
        'phonenumber' => $request->phonenumber,
        'photoone' => $imageNames['imageone'],
        'phototwo' => $imageNames['imagetwo'],
        'photothree' => $imageNames['imagethree'],
        'photofour' => $imageNames['imagefour'],
        'status' => 'Pending',
        'path' => date('Y/m'),
    ];

    Bikesale::create($bikeSaleData);

    //Auth::login($user);

    $flasher->addSuccess('Quick Post Created Successfully');
    return back();
    }else{
   Auth::login($user);
    $waterMarkUrl = storage_path('/app/files/shares/backend/watermark.png');
    $path = storage_path('/app/files/shares/uploads/' . date('Y/m'));
    $thumbsPath = $path . '/thumbs';

    if (!is_dir($thumbsPath)) {
        mkdir($thumbsPath, 0777, true);
    }

    $imageFiles = ['imageone', 'imagetwo', 'imagethree', 'imagefour'];
    $imageNames = [];

    foreach ($imageFiles as $imageFile) {
        if ($request->hasFile($imageFile)) {
            $rand = uniqid(CommonFx::make_slug(Str::limit($request->title, 40)));
            $imageName = $rand . '.webp';
            $image = Image::make($request->file($imageFile)->move($path, $imageName));
            $image->insert($waterMarkUrl, 'bottom-right', 5, 5);
            $image->save();

            $resizedImage = Image::make($path . '/' . $imageName)->resize(35, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizedImage->save($thumbsPath . '/' . $imageName, 60);

            $imageNames[$imageFile] = $imageName;
        } else {
            $imageNames[$imageFile] = 'not-found.webp';
        }
    }

    $slug = CommonFx::bnslug(CommonFx::make_slug($request->title . '-in-year-' . date('Y') . '-for-sale-' . $request->cc . 'cc-bike'));
    $bikeSaleData = [
        'title' => $request->title,
        'slug' => $slug,
        'user_id' => $user->id,
        'bikebrand_id' => $request->bikebrand_id,
        'bikemodel_id' => $request->bikemodel_id,
        'price' => $request->price,
        'negotiable' => $request->negotiable ? true : false,
        'phonenumber' => $request->phonenumber,
        'photoone' => $imageNames['imageone'],
        'phototwo' => $imageNames['imagetwo'],
        'photothree' => $imageNames['imagethree'],
        'photofour' => $imageNames['imagefour'],
        'status' => 'Pending',
        'path' => date('Y/m'),
    ];

    Bikesale::create($bikeSaleData);

    //Auth::login($user);

    $flasher->addSuccess('Quick Post Created Successfully');
    return back();
}
}


    public function procategory($id){
        $info=Procategory::whereslug($id)->first();
        //dd($info);
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle(@$info->metatitle);
        SEOTools::setDescription(@$info->metadescription);
        JsonLd::setType(@$info->keyword);
        
       
        //$bid=json_decode($info->bikename);
        //$brid=json_decode($info->queryinfo);
       // $bike= Bikesale::whereIn('id',$bid)->paginate(10);
       // $brand= Bikebrand::whereIn('id',$brid)->paginate(10);
        return view('frontend.en.procategory.index',compact('info'));
    }
    public function home(){

        $disease= Cache::get('disease', function () {
          return Disease::wherestatus(1)->latest()->take(8)->get();

        });
        $medicine= Cache::get('medicine', function () {
          return Medicine::wherestatus(1)->latest()->take(200)->get();

          });
                 $medicineinfo= Cache::get('medicineinformation', function () {
          return Medicineinformation::wherestatus(1)->latest()->take(20)->select('title','slug','photo','metadescription','status')->get();

          });
         $blogs= Cache::get('bloginfo', function () {
          return Blog::wherestatus(1)->latest()->take(20)->select('title','slug','photo','metadescription','status')->get();

          });

        return response()->json([

            'disease'=>$disease,
            'medicine'=>$medicine,
            'medicineinformation'=>$medicineinfo,
              'blogs'=>$blogs,

            ],200);
}


}