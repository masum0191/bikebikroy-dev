<?php

namespace App\Http\Controllers\Superadmin;
use App\Models\Country;
use App\Models\Division;
use App\Helpers\CommonFx;
use App\Models\Bikebrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Pagination\LengthAwarePaginator;

class BikebrandController extends Controller
{
    public function index(){
      if (request()->ajax()) {
        return datatables()->of(Bikebrand::latest()->get())
          ->addColumn('action', function ($data) {
            $button = '<button title="Edit Division" id="editBtn" style="border:0; background: none; padding: 0 !important"   rid="' . $data->id . '" class="btn-md"><i class="far fa-edit"></i></button>';
            $button .= '&nbsp;&nbsp;';
           $button .= '<button type="button" style="border:0; background: none; padding: 0 !important"  title="Delete"   id="deleteBtn" rid="' . $data->id . '" class="btn-sm btn-warning"><i class="fas fa-trash"></i></button>';
            return $button;
          })
           ->addColumn('home', function ($data) {
               if($data->home==1){
                  $button = '<button title="Update home brand" id="homebrandadd" style="border:0; padding: 0 !important" type="0"  rid="' . $data->id . '" class="btn-md btn btn-primary">Active</button>';  
               } else{
                    $button = '<button title="Update home brand" id="homebrandadd" style="border:0;  padding: 0 !important" type="1"  rid="' . $data->id . '" class="btn-md btn btn-danger">Inactive</button>';
               }
          
            return $button;
          })

      ->addIndexColumn()
          ->rawColumns(['action','home'])
          ->make(true);
      }
      $breadcrumbs = [
        ['link' => "superadmin/dashboard", 'name' => "Dashboard"], ['link' => "superadmin/bikebrandlist", 'name' => "Bikebrand"],
    ];

      return view('superadmin.bike.bikebrand')->with('breadcrumbs', $breadcrumbs);

                   }

                   public function store(Request $request)
                   {
                     $validator = Validator::make($request->all(), [
                      'bikebrand' => 'required|min:3|max:190|unique:bikebrands',
                      //'sequence' => 'unique:bikebrands,sequence',
                      //'sequence' => 'unique:bikebrands',
                       'bnbikebrand' => 'required',
                       'photo' => 'required',
                      ]);
                          if ($validator->fails()) {


                           return response()->json([
                                   'success' => false,


                                   'errors' => $validator->errors()->all()
                               ]);
                       } else {


                     $div = new Bikebrand();
                     $div->bikebrand = trim($request->bikebrand);
                     $div->sequence = $request->sequence;
                     $div->bnbikebrand = trim($request->bnbikebrand);
                     $div->slug = CommonFx::make_slug($request->bikebrand);
                     $div->photo = $request->photo;
                     if($request->sequence){
                        $div->home = 1;
                        }
                     $div->status = 1;
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
                     $info = Bikebrand::find($id);
                 return response()->json($info);
                   }

            public function homebrandadd($id , $type){
    
                $homebrandadd = Bikebrand::where('id',$id)->first();
                $homebrandadd->home=$type;
                $homebrandadd->save();
               if ($homebrandadd) {

                 return response()->json(['success' => true]);
               } else {


                   return response()->json(['success' => false]);
               }
}



           public function update(Request $request,$id){

           $validator = Validator::make($request->all(), [
            'bikebrand' => 'required|min:3|max:190|unique:bikebrands,bikebrand,'.$id,'id',
            'bikebrand' => 'required|min:3|max:190|unique:bikebrands,bikebrand,'.$id,'id',
             'bnbikebrand' => 'required',
            'sequence' => 'unique:bikebrands,sequence,'.$id,'id',
             'photo' => 'required',
            ]);
                if ($validator->fails()) {

                 return response()->json([
                         'success' => false,
            'errors' => $validator->errors()->all()
                     ]);
             } else {


           $div = Bikebrand::find($id);
          $div->bikebrand = trim($request->bikebrand);
           $div->bnbikebrand = trim($request->bnbikebrand);
           
           $div->slug = CommonFx::make_slug($request->bikebrand);
           $div->photo = $request->photo;
           if($request->sequence){
                $div->home = 1;
                $div->sequence = trim($request->sequence);
           }else{
               $div->sequence = " ";
           }
           $div->status = 1;
           $div->save();

           if ($div->save()) {

           return response()->json(['success' => true]);
         } else {


             return response()->json(['success' => false]);
         }
       }
             }


             public function destroy($id)
             {

               $divisioninfo = Bikebrand::findOrFail($id)->delete();
               if ($divisioninfo) {

                 return response()->json(['success' => true]);
               } else {


                   return response()->json(['success' => false]);
               }
             }

}