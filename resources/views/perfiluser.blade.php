@extends('layouts.app')

@section('content')
<div class="container">



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @foreach ($users as $user)
                        <h1 class="Perfil de">Perfil de <b>{{ $user->name }}</b>  </h1>
                        <p>Gmail <b>{{ $user->email }}</b></p>
                        <p>id usuario <b>{{ $user->id }}</b></p>
                        <p>En YVW desde: <b>{{ $user->created_at }}</b></p>

                        <div class="contenerdor_videos">
                            <h1 class="tus_videos">Videos de <b>{{ $user->name }}</b></h1>
                            @if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('admin') )
                                <a class="subir_videos" href="{{ route('publicar') }}"> <buttom>subir videos</buttom></a>
                                @if (count($videouser) >= 1)
                                    @foreach ($videouser as $video)
                                        <div class="video_block">
                                            <video width="400"  height="240" controls>
                                                <source src="{{asset('storage/'.$video->url)}}" type="video/mp4">
                                            </video>

                                            <a href="{{route('video.id',$video->id)}}"><h1>{{ $video->title }}</h1></a>
                                            <p>{{ $video->descripcion }}</p>
                                            <!-- <p>//$video->id_user->user()->name </p>-->
                                            <p>{{ $video->fechaSubida }}</p>
                                            @if(Auth::user()->hasRole('admin') )
                                            <a href="{{route('destroy',$video->id)}}" style="cursor: pointer;">Eliminar(aun no funciona)</a>
                                                @endif
                                        </div>

                                    @endforeach
                                @else
                                    <p class="error_no_videos">Ningun video publicado</p>
                                @endif
                            @else
                                <p class="error_no_videos">Ningun video publicado, pidele a n administrador para que tengas el rol editor</p>
                            @endif

                        </div>

                        @endforeach






                </div>
</div>
@endsection
