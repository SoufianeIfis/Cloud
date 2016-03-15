<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Input;
use Auth;
use storage;
use DB;
use Mail;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(isset(Auth::user()->id)){
         $user = DB::table('users')->where('id', Auth::user()->id)->get();
         if($user[0]->role != '2'){
            $file = Input::file('file');
            $file->move('file/'.Auth::id(),$file->getClientOriginalName());
            DB::table('file')->insert(['name' => $file->getClientOriginalName(), 'mime' => $file->getClientMimeType(), 'id_users' => Auth::user()->id]);
        }
        else{
            return view('unblock');
        }
    }
    else{
        return view('auth/login');
    }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if(isset(Auth::user()->id)){
         $user = DB::table('users')->where('id', Auth::user()->id)->get();
         if($user[0]->role != '2'){
            if(isset(Auth::user()->id)){
                $file = DB::table('file')->where('id', $id)->get();
                return view('source')->with('file', $file);
            }
            else{
                return view('unblock');
            }
        }
        else{
            return view('auth/login');
        }
    }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */


    public function showEdit($id){
     if(isset(Auth::user()->id)){
         $user = DB::table('users')->where('id', Auth::user()->id)->get();
         if($user[0]->role != '2'){
            if(isset(Auth::user()->id)){
                $file = DB::table('file')->where('id', $id)->get();
                return view('filesedit')->with('file', $file);
            }
            else{
                return view('unblock');
            }
        }
        else{
            return view('auth/login');
        }
    }
}
public function edit(Request $request, $id)
{
 if(isset(Auth::user()->id)){
     $user = DB::table('users')->where('id', Auth::user()->id)->get();
     if($user[0]->role != '2'){
        if(isset(Auth::user()->id)){
            $tes = DB::table('file')->where('id', $id)->get();
            DB::table('file')->where('id', $id)->update(['name' => $request->name]);
            $uti = DB::table('file')->where('id', $id)->get();
            rename('file/'.$uti[0]->id_users.'/'.$tes[0]->name, 'file/'.$uti[0]->id_users.'/'.$request->name);
            return redirect('/mine');
        }
        else{
            return view('unblock');
        }
    }
    else{
        return view('auth/login');
    }
}
}

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
     if(isset(Auth::user()->id)){
         $user = DB::table('users')->where('id', Auth::user()->id)->get();
         if($user[0]->role != '2'){
            if(isset(Auth::user()->id)){
                $file = DB::table('file')->where('id', $id)->delete();
                return redirect('/mine');
            }
            else{
                return view('unblock');
            }
        }
        else{
            return view('auth/login');
        }
    }
}
public function mine(){
 if(isset(Auth::user()->id)){
     $user = DB::table('users')->where('id', Auth::user()->id)->get();
     if($user[0]->role != '2'){
        if(isset(Auth::user()->id)){
            $files = DB::table('file')->where('id_users', Auth::user()->id)->paginate(5);
            return view('mine')->with('files', $files);
        }
        else{
            return view('unblock');
        }
    }
    else{
        return view('auth/login');
    }
}
}
public function contact(Request $request){
        if(isset(Auth::user()->id))
        {
                Mail::send('emailcon',
                    array(
                        'name' => $request->get('name'),
                        'email' => $request->get('email'),
                        'user_message' => $request->get('message')
                        ), function($message)
                    {
                        $admin = DB::table('users')->where('role', '=', '1')->value('email');
                        $message->to($admin, 'Admin')->subject('A user sent you a mail !');
                    });
                return view('home');
            }
            else{
        return view('auth/login');
    }
        }

        public function contactview(){
        if(isset(Auth::user()->id))
        {
            return view('contact');
        }
        else{
        return view('auth/login');
    }
}
}
