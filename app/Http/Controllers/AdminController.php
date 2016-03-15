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

class AdminController extends Controller
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        if(isset(Auth::user()->id)){
            $user = DB::table('users')->where('id', Auth::user()->id)->get();
            if($user[0]->role == '1'){
                $users = DB::table('users')->orderBy('id', 'desc')->take(10)->get();
                $files = DB::table('file')->orderBy('id', 'desc')->take(10)->get();
                return view('admin')->with('users',$users)->with('files', $files);
            }
            else{
                return view('auth/login');
            }
        }
        else{
            return view('auth/login');
        }
    }

    public function user()
    {
        if(isset(Auth::user()->id)){
            $user = DB::table('users')->where('id', Auth::user()->id)->get();
            if($user[0]->role == '1'){
                $users = DB::table('users')->paginate(5);
                return view('adminus')->with('users',$users);
            }
            else{
                return view('auth/login');
            }
        }
        else{
            return view('auth/login');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }
    public function showfileAdmin($id){
        if(isset(Auth::user()->id)){
            $user = DB::table('users')->where('id', Auth::user()->id)->get();
            if($user[0]->role == '1'){
                $file = DB::table('file')->where('id', $id)->get();
                return view('filesedit')->with('file', $file);
            }
            else{
                return view('auth/login');
            }
        }
        else{
            return view('auth/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function fileAdmin(Request $request, $id)
    {
       if(isset(Auth::user()->id)){
            $user = DB::table('users')->where('id', Auth::user()->id)->get();
            if($user[0]->role == '1'){
                $tes = DB::table('file')->where('id', $id)->get();
                DB::table('file')->where('id', $id)->update(['name' => $request->name]);
                $uti = DB::table('file')->where('id', $id)->get();
                rename('file/'.$uti[0]->id_users.'/'.$tes[0]->name, 'file/'.$uti[0]->id_users.'/'.$request->name);
                return redirect('/admin');
            }
            else{
                return view('auth/login');
            }
        }
        else{
            return view('auth/login');
        }
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
            if($user[0]->role == '1'){
                $files = DB::table('file')->where('id', $id)->delete();
                return redirect('/admin');
            }
        else{
                return view('auth/login');
            }
        }
        else{
            return view('auth/login');
        }
    }

    public function file(){
        if(isset(Auth::user()->id)){
            $user = DB::table('users')->where('id', Auth::user()->id)->get();
            if($user[0]->role == '1'){
                $files = DB::table('file')->paginate(5);
            return view('adminusers')->with('files', $files);
            }
        else{
                return view('auth/login');
            }
        }
        else{
            return view('auth/login');
        }
    }

    public function destroyuser($id)
    {
        if(isset(Auth::user()->id)){
            $user = DB::table('users')->where('id', Auth::user()->id)->get();
            if($user[0]->role == '1'){
                $users = DB::table('users')->where('id', $id)->delete();
                return redirect('/admin');
            }
       else{
                return view('auth/login');
            }
        }
        else{
            return view('auth/login');
        }
    }

    public function adminblock($id){
        if(isset(Auth::user()->id)){
            $user = DB::table('users')->where('id', Auth::user()->id)->get();
            if($user[0]->role == '1'){
            DB::table('users')->where('id', $id)->update(['role' => '2']);
            return redirect('/admin');
        }
        else{
                return view('auth/login');
            }
        }
        else{
            return view('auth/login');
        }
    }
    public function adminunblock($id){
        if(isset(Auth::user()->id)){
            $user = DB::table('users')->where('id', Auth::user()->id)->get();
            if($user[0]->role == '1'){
            DB::table('users')->where('id', $id)->update(['role' => '0']);
            return redirect('/admin');
        }
        else{
                return view('auth/login');
            }
        }
        else{
            return view('auth/login');
        }
    }
}
