<?php

namespace App\Http\Controllers\Superadmin;
use App\Models\Area;
use App\Models\Thana;
use App\Helpers\CommonFx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class AreaController extends Controller
{
    public function index(){
     
      if (request()->ajax()) {
        return datatables()->of(Area::with('thana')->latest()->get())
          ->addColumn('action', function ($data) {
            $button = '<button title="Edit  Post" id="editBtn" style="border:0; background: none; padding: 0 !important"   rid="' . $data->id . '" class="btn-md"><i class="far fa-edit"></i></button>';
            $button .= '&nbsp;&nbsp;';
           $button .= '<button type="button" style="border:0; background: none; padding: 0 !important"  title="Delete"   id="deleteBtn" rid="' . $data->id . '" class="btn-sm btn-warning"><i class="fas fa-trash"></i></button>';
            return $button;
          })

          ->addIndexColumn()
          ->rawColumns(['action'])
          ->make(true);
      }
      $breadcrumbs = [
        ['link' => "superadmin/arealist", 'name' => "Arealist"],
    ];

      return view('superadmin.location.area')->with('breadcrumbs', $breadcrumbs);
    }
      
       public function create(){
     
      
        }
      
      
      public function store(Request $request){
        // return  response($request->all());
       
      $validator = Validator::make($request->all(), [
        'thana_id'=>'required',
          'areaname' => 'required',
          'bnareaname' => 'required',
         ]);
            if ($validator->fails()) {
   
   
             return response()->json([
                     'success' => false,
                 'errors' => $validator->errors()->all()
                 ]);
         } else {
   
   
       $div = new Area;
       $div->thana_id =trim($request->thana_id);
       $div->areaname = trim($request->areaname);
       $div->bnareaname = trim($request->bnareaname);
       $div->slug = CommonFx::make_slug($request->areaname);
        $div->save();
   
       if ($div->save()) {
             
       return response()->json(['success' => true]);
     } else {
    
   
         return response()->json(['success' => false]);
     }
   }
    
          
      }


      public function edit($id)
      {
        $info = Area::find($id);
    return response()->json($info);
      }
    
      


           public function update(Request $request,$id){
            $validator = Validator::make($request->all(), [
              'thana_id'=>'required',
                'areaname' => 'required',
                'bnareaname' => 'required',
               ]);
                  if ($validator->fails()) {
         
         
                   return response()->json([
                           'success' => false,
                       'errors' => $validator->errors()->all()
                       ]);
               } else {
         
         
             $div =Area::find($id);
             $div->thana_id =trim($request->thana_id);
             $div->areaname = trim($request->areaname);
             $div->bnareaname = trim($request->bnareaname);
             $div->slug = CommonFx::make_slug($request->areaname);
              $div->save();
         
             if ($div->save()) {
                   
             return response()->json(['success' => true]);
           } else {
          
         
               return response()->json(['success' => false]);
           }
         }
         }



         public function destroy($id){
          $area=Area::destroy($id);
          if($area){
                  
         return response()->json(['success' => true]);
          }
          else{
                  
         return response()->json(['success' => false]);
          }
           
       }

}
