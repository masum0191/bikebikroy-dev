<?php

namespace App\Http\Controllers;
use App\Models\Area;
use App\Models\Thana;
use App\Models\Country;
use App\Models\Package;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Bikemodel;
use App\Models\Payby;
use App\Models\Payment;
use App\Models\Smstype;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class OnchangeController extends Controller
{
    public function index(){
        $division=Division::select('id','division')->orderBy('division','asc')->get();
        $district=District::select('id','district')->orderBy('district','asc')->get();
        $thana=Thana::select('id','thana')->orderBy('thana','asc')->get()->toArray();
        $area=Area::select('id','areaname')->orderBy('areaname','asc')->get()->toArray();
      
return response()->json([
  
  'district'=>$district,
  'than'=>$thana,
  'division'=>$division,
  'area'=>$area
]);
       
        }
      
      
       public function getbikebrand($id){
            return response()->json( Bikemodel::wherebikebrand_id($id)->orderBy('bikemodel','asc')->select('id','bikebrand_id','bikemodel')->get());

    
        }     
        public function getbikebrandsingle($id){
            return response()->json( Bikemodel::whereid($id)->orderBy('bikemodel','asc')->first());

    
        } 
        public function district($id){
    return response()->json( District::wheredivision_id($id)->orderBy('district','asc')->select('id','district')->get());

    
        }
         public function thana($id){
    return response()->json( Thana::wheredistrict_id($id)->orderBy('thana','asc')->select('id','thana')->get());

    
        }
        public function area($id){
            return response()->json(Area::wherethana_id($id)->orderBy('areaname','asc')->select('id','areaname')->get());
            
                } 
                public function smstype($id){
            return response()->json(Smstype::find($id));
        
            
                }
        
        public function package($id){
    return response()->json(Package::select('id','packageprice')->find($id));

    
        }     
        public function payment($id){
    return response()->json(Payment::select('id','note')->find($id));

    
        }
      
      
        public function adminpaybyinfo($id){
            return response()->json(Payby::select('id','description')->find($id));
        
            
                }
     
                public function customerinfo(Request $request){
                    $district=District::wheredivision_id($request->divisionid)->select('id','district')->get();
                      $thana=Thana::wheredistrict_id($request->districtid)->select('id','thana')->get()->toArray();
                      $area=Area::wherethana_id($request->thanaid)->select('id','areaname')->get()->toArray();
            return response()->json([
                
                'dis'=>$district,
                'than'=>$thana,
                'area'=>$area
            ]);
        
            
                }

}