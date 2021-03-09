@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('admin') )


                            <div>Sube tu video aqui</div><br>
                            <form method="POST" action="{{ route('createvideo') }}" enctype="multipart/form-data">
                                @csrf
                                <label>Nombre del video</label>
                                <input type="text" name="title" >
                                <label>Descripcion</label>
                                <input type="text" name="descripcion">
                                <label>Elije un video</label>
                                <input type="file" name="url" id="url"><br><br>
                                <input type="submit" name="subir" value="publicar">
                            </form>
                        @else

                            <div>No puedes subir videos</div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
