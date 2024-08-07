<?php
namespace App\Http\Controllers\User;
use App\Models\Bikesale;
use App\Models\Chat;
use App\Helpers\CommonFx;
use Illuminate\Support\Str;
use App\Models\Chatlist;
use App\Models\Bikesalechatdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $friends1 = Chatlist::whereuser_id(Auth::id())
         ->get();
    $friends2 = Chatlist::wherechatuser_id(Auth::id())->get();
    $Chatinfo = $friends1->merge($friends2)->unique();
    //  dd($Chatinfo);
        if(count($Chatinfo)){
            return view('user.chat.index')->with('Chatinfo',$Chatinfo);
        }
        else{
           return redirect()->back();
        }


    }
        public function privatechat($id)
    {
        $first = DB::table('chats')
                ->where('user_id',Auth::id())
                ->where('chatuser_id',$id);

            $allChats = DB::table('chats')
                ->where('chatuser_id',Auth::id())
                ->where('user_id',$id)
                ->union($first)
                ->orderBy('created_at','desc')
                ->limit(10)
                ->get();
        $allChats = $allChats->reverse()->values();
        // dd($allChats);
      $friends1 = Chatlist::whereuser_id(Auth::id())
         ->get();
    $friends2 = Chatlist::wherechatuser_id(Auth::id())->get();
    $Chatinfo = $friends1->merge($friends2)->unique();
    //  dd($Chatinfo);
        if(count($Chatinfo)){
            return view('user.chat.privatechat')->with('Chatinfo',$Chatinfo)->with('AllChats', $allChats);
        }
        else{
           return redirect()->back();
        }


    }
    

    public function singlebikesalechat($id)
    {
        
        $bikesaler=Bikesale::with('user')->select('user_id')->find($id);
        $friends1 = Chatlist::whereuser_id(Auth::id())->wherechatuser_id($bikesaler->user_id)
         ->get();
    $friends2 = Chatlist::whereuser_id($bikesaler->user_id)->wherechatuser_id(Auth::id())->get();
    $allFriends = $friends1->merge($friends2);
    $first = DB::table('chats')
                ->where('user_id',Auth::id())
                ->where('chatuser_id',$bikesaler->user_id);

            $Chatinfo = DB::table('chats')
                ->where('chatuser_id',Auth::id())
                ->where('user_id',$bikesaler->user_id)
                ->union($first)
                ->orderBy('created_at','desc')
                ->limit(10)
                ->get();
                $Chatinfo = $Chatinfo->reverse()->values();
                // dd($Chatinfo);
    
        if(count($allFriends)>0){
            return view('user.chat.singlechat')->with('Chatinfo',$Chatinfo)->with('Bikeinfo', $bikesaler);
        }
        else{
// dd([Auth::id(),@$bikesaler->user_id]);
            Chatlist::create([
                'user_id'=>Auth::id(),
                 'chatuser_id'=>@$bikesaler->user_id,
                'message'=>"This Chat Start For $bikesaler->title",
            ]);
            $first = DB::table('chats')
                ->where('user_id',Auth::id())
                ->where('chatuser_id',$bikesaler->user_id);

            $Chatinfo = DB::table('chats')
                ->where('chatuser_id',Auth::id())
                ->where('user_id',$bikesaler->user_id)
                ->union($first)
                ->orderBy('created_at','desc')
                ->limit(10)
                ->get();
                $Chatinfo = $Chatinfo->reverse()->values();
            return view('user.chat.singlechat')->with('Chatinfo',$Chatinfo)->with('Bikeinfo', $bikesaler);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bikesale  $bikesale
     * @return \Illuminate\Http\Response
     */
    public function chattext(Request $request)
    {

     $info= Chat::create([
            'user_id'=>Auth::id(),
            'chatuser_id'=>$request->chatuser_id,
            'message'=>$request->message,
            //  'userseen'=>1,
        ]);
        if($info){
            return  response()->json([
            'success'=>true
            ],201);
        }
        else{
            return  response()->json([
            'success'=>false
            ],404);
        }
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
    public function newindex()
    {
        $Chatinfo=Chat::where('user_id',Auth::id())->select('user_id','chatuser_id')->groupBy('chatuser_id')->latest()->get();

        if(count($Chatinfo)){
            //  dd($Chatinfo);
           return view('user.chat.newindex')->with('Chatinfo',$Chatinfo);
        }
        else{
           return redirect()->back();
        }
    }


    public function newsinglebikesalechat($id)
    {

      $bikesaler=Bikesale::select('user_id','title')->find($id);
        $Chatinfo=Chat::whereuser_id(Auth::id())->Where('chatuser_id',@$bikesaler->user_id)->get();
// dd($Chatinfo);
        if(count($Chatinfo)){

            return view('user.chat.newsinglechat')->with('Chatinfo',$Chatinfo);
        }
        else{
           Chat::create([
                'user_id'=>Auth::id(),
                 'chatuser_id'=>@$bikesaler->user_id,
                'message'=>"This Chat Start For $bikesaler->title",
            ]);

            Chat::create([
                'user_id'=>@$bikesaler->user_id,
                 'chatuser_id'=>Auth::id(),
                'message'=>"This Chat Start For $bikesaler->title",
            ]);

            $Chatinfo=Chat::whereuser_id(Auth::id())->get();
            return view('user.chat.newsinglechat')->with('Chatinfo',$Chatinfo);
        }

    }


    public function newtext(Request $request)
    {
        //  return response($request->all());
        $info= Chat::create([
            'user_id'=>Auth::id(),
            'chatuser_id'=>$request->id,
            'message'=>$request->message,
            'messageby'=>Auth::user()->fullname,
            'userseen'=>1,
        ]);
        if($info){
            return  response()->json([
            'success'=>true
            ],201);
        }
        else{
            return  response()->json([
            'success'=>false
            ],404);
        }
          }

          public function newuserchat($id)
          {
            $Chatinfo=Chat::whereuser_id(Auth::id())->select('user_id','chatuser_id')->groupBy('chatuser_id')->latest()->get();
              $Singlechats=Chat::whereuser_id(Auth::id())->orWhere('chatuser_id',$id)->get();

                return view('user.chat.newuserchat')->with('Chatinfo',$Chatinfo)->with('Singlechat',$Singlechats);

          }
}
