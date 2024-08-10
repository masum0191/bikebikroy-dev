<?php

namespace App\Http\Controllers;
use App\Models\Bikesale;
use App\Models\Division;
use Jorenvh\Share\Share;
use App\Models\Bikebrand;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;

class BikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function bikesalesearch(Request $request)
    {
        $brandtype="All Brands";
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle('Bikebikory');
        SEOTools::setDescription('Buy and Sale Your Bike');
        JsonLd::setType('WebSite');
        $Allbikes=Bikesale::with('district','thana','bikebrand','bikemodel','user.package')->wherestatus('Active')->where('title', 'like', '%' . $request->keyword . '%')->wherebikebrand_id($request->brand)->wheredistrict_id($request->district)->latest()->paginate(20);
        $Bikeslider=Bikesale::wherestatus('Active')->take(6)->get();
        // dd($Bikeslider);
        $Bikebrad=Bikebrand::with('bikesale')->wherestatus(1)->get();
        $Divisionalbike=Division::with('bikesale')->get();
       return view('frontend.en.bikesale.index',compact('Bikebrad','Allbikes','Bikeslider','Divisionalbike','brandtype'));
    }

public function type($type)
    {
        if($type=='low'){
        $brandtype="All Brands";
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle('Bikebikory');
        SEOTools::setDescription('Buy and Sale Your Bike');
        JsonLd::setType('WebSite');
        $Allbikes=Bikesale::with('district','thana','bikebrand','bikemodel','user.package')->wherestatus('Active')->wherearchive(0)->orderBy('price','ASC')->paginate(20);
        $Bikeslider=Bikesale::wherestatus('Active')->take(6)->get();
        $Bikebrad=Bikebrand::with('bikesale')->wherestatus(1)->get();
        $Divisionalbike=Division::with('bikesale')->get();
        }else{
        $brandtype="All Brands";
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle('Bikebikory');
        SEOTools::setDescription('Buy and Sale Your Bike');
        JsonLd::setType('WebSite');
        $Allbikes=Bikesale::with('district','thana','bikebrand','bikemodel','user.package')->wherestatus('Active')->wherearchive(0)->orderBy('price','DESC')->paginate(20);
        $Bikeslider=Bikesale::wherestatus('Active')->take(6)->get();
        $Bikebrad=Bikebrand::with('bikesale')->wherestatus(1)->get();
        $Divisionalbike=Division::with('bikesale')->get();
        }
       return view('frontend.en.bikesale.index',compact('Bikebrad','Allbikes','Bikeslider','Divisionalbike','brandtype','type'));
    }
    public function allbikeindex()
    {
        $brandtype="Top Brands";
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle('Bikebikory');
        SEOTools::setDescription('Buy and Sale Your Bike');
        JsonLd::setType('WebSite');
        $Allbikes=Bikesale::with('district','thana','bikebrand','bikemodel','user.package')->wherestatus('Active')->wherearchive(0)->orderBy('pub_date','DESC')->paginate(20);
        $Bikeslider=Bikesale::wherestatus('Active')->take(6)->get();
        $Bikebrad=Bikebrand::with('bikesale')->wherestatus(1)->wherehome(1)->get();
        $Divisionalbike=Division::with('bikesale')->get();
       return view('frontend.en.bikesale.index',compact('Bikebrad','Allbikes','Bikeslider','Divisionalbike','brandtype'));
    }

    public function bikesaleshow($id)
    {

        $Bike=Bikesale::with('division','district','thana','bikebrand','user.package','user.bikeshop')->wherestatus('Active')->wherearchive(0)->latest()->whereslug($id)->first();
        if($Bike){
        $Bikeslider=Bikesale::wherestatus('Active')->take(6)->get();
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle($Bike->title);
        SEOTools::setDescription($Bike->metadescription);
         OpenGraph::addImage(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone));
        JsonLd::setType('proudct');
        $Similarbike=Bikesale::with('division','district','thana','bikebrand')->where('slug','!=',$id)->take(12)->get();
        $Divisionalbike=Division::with('bikesale')->get();
       return view('frontend.en.bikesale.show',compact('Similarbike','Bike','Bikeslider','Divisionalbike'));
        }
        else{
            abort(404);
        }
    }



    public function bikesalebybrnad($id)
    {
        $Bikebradinfo=Bikebrand::whereslug($id)->first();
       if($Bikebradinfo){
        $Allbikes=Bikesale::with('division','district','thana','bikebrand','user.package')->wherestatus('Active')->wherearchive(0)->wherebikebrand_id($Bikebradinfo->id)->latest()->paginate(20);
       $Bikeslider=Bikesale::wherestatus('Active')->take(6)->get();
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle(@$Bikebradinfo->Bikebrad);
        SEOTools::setDescription(@$Bikebradinfo->metadescription);
        JsonLd::setType('proudct');
        $Similarbike=Bikesale::with('division','district','thana','bikebrand')->where('bikebrand_id','!=',$Bikebradinfo->bikebrand_id)->take(12)->get();
        $Bikebrad=Bikebrand::with('bikesale')->wherestatus(1)->get();
        $Divisionalbike=Division::with('bikesale')->get();
       return view('frontend.en.bikesale.index',compact('Similarbike','Allbikes','Bikeslider','Divisionalbike','Bikebrad'));
    }else{
        return back();
    }
    }

    public function bikesalebydivison($id)
    {
        $Bikedivisioninfo=Division::whereslug($id)->first();
        if($Bikedivisioninfo){
        $Allbikes=Bikesale::with('division','district','thana','bikebrand','user.package')->wherestatus('Active')->wherearchive(0)->wheredivision_id($Bikedivisioninfo->id)->latest()->paginate(20);
       $Bikeslider=Bikesale::wherestatus('Active')->take(6)->get();
        SEOMeta::setRobots('index, follow');
        SEOTools::setTitle(@$Bikedivisioninfo->Bikebrad);
        SEOTools::setDescription(@$Bikedivisioninfo->metadescription);
        JsonLd::setType('proudct');
        $Similarbike=Bikesale::with('division','district','thana','bikebrand')->take(12)->get();
        $Bikebrad=Bikebrand::with('bikesale')->wherestatus(1)->get();
        $Divisionalbike=Division::with('bikesale')->get();
       return view('frontend.en.bikesale.index',compact('Similarbike','Allbikes','Bikeslider','Divisionalbike','Bikebrad'));
    }else{
        return back();
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bikesale  $bikesale
     * @return \Illuminate\Http\Response
     */
    public function show(Bikesale $bikesale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bikesale  $bikesale
     * @return \Illuminate\Http\Response
     */
    public function edit(Bikesale $bikesale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bikesale  $bikesale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bikesale $bikesale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bikesale  $bikesale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bikesale $bikesale)
    {
        //
    }
}