<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user','guest','editor', 'admin']);
        $videos = Video::where('id_user', Auth::id())->get();


        return view('perfil')->with('videouser',$videos);
    }
    public function admin(){
        $users=User::orderby('created_at')
        ->with('roles')
            ->get();

      //  dd($users);
        return view('editarUsers')->with('users',$users);
    }
    public function viewuser($id){
        $users= User::find($id)
            ->where('users.id',$id)
            ->get();
//dd($users);
        $videos = Video::join('users', 'videos.id_user', '=', 'users.id')
            ->where('id_user', $id)
            ->get();
        return view('perfiluser')->with('users',$users)
            ->with('videouser',$videos);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::orderby('created_at')
            ->with('roles')
            ->get();
      User::find($id)
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('users.id', $id)
            ->update(['role_user.role_id'=> '4']);
        echo "<script type='text/javascript'>alert('Rol cambiado correctamente);</script>";
        //return view('userUpdate')->with('user', $user);
        return view('editarUsers')->with('users',$users);
    }
    public function delete($id)
    {
        $users=User::orderby('created_at')
        ->with('roles')
        ->get();
       User::find($id)
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('users.id',$id)
            ->delete();
        echo "<script type='text/javascript'>alert('Usuario eliminado correctamente');</script>";
        return view('editarUsers')->with('users',$users);
    }
}
