<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user','guest','editor', 'admin']);
        return view('video{id}');
    }


    protected function createvideo(Request $request)
    {

       // $url = Storage::url($request['url']);
        $url = $request->file('url')->store('public');
        Video::create([
            'title' => $request['title'],
            'descripcion' => $request['descripcion'],
            'url' => $url,
            'id_user'=> Auth::id(),
        ]);
        echo "<script type='text/javascript'>alert('Video subido correctamente');</script>";
        return view('publicar');


    }

    protected function edit(int $id
    )
    {       $note= Video::find($id);
        return view('editarvideo{id}',['note'=>$note]);


    }
    protected function update(Request $request)

    {
        DB::table('videos')->where('id',$request['id'])->update([
            'title' => $request['title'],
            'descripcion' => $request['descripcion']
        ]);
        echo "<script type='text/javascript'>alert('Video editado correctamente');</script>";
        return view('publicar');

    }
    protected function buscar(Request $request)
    {
        $videos=Video::join('users', 'videos.id_user', '=', 'users.id')
            ->select('videos.*', 'users.name')
            -> where('videos.title',$request->input('buscar')
            )->get();
        return view('buscar')->with('videos',$videos);

    }
    protected function  view(){
        $users=User::select('name','users.id')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', '4')
            ->orwhere('role_user.role_id', '1')
            ->get();
        $videos=Video::orderby('fechaSubida')
            ->join('users', 'videos.id_user', '=', 'users.id')
            ->select('videos.*', 'users.name')
            ->get();
      // dd($users);
        return view('home')->with('videos',$videos)
        ->with('users',$users);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function destroy($id)
    {

         Video::find($id)
            ->where('videos.id',$id)
            ->delete();
        echo "<script type='text/javascript'>alert('Video eliminado correctamente');</script>";
        return view('publicar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id)
        ->join('users', 'videos.id_user', '=', 'users.id')
          ->select('videos.*', 'users.name')
            ->where('videos.id',$id)
          ->get();

        $videos=Video::orderby('fechaSubida')
            ->join('users', 'videos.id_user', '=', 'users.id')
            ->select('videos.*', 'users.name')
            ->get();
        return view('video{id}')->with('videos',$video)
            ->with('videos2',$videos);
    }



}
