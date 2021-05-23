@extends('layouts.app')

@section('content')
<div class="container">



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(Auth::user()->hasRole('admin'))
                            <h4 class="Bienvenida">Bienvenido <b>{{ auth()->user()->name }}</b>  </h4>
                            <a class="editar_users" href="{{ route('editarUsers') }}"> <buttom>Editar usuarios</buttom></a>
                            <a class="perfil" href="{{ route('perfil') }}"> <buttom>Perfil de usuario</buttom></a>
                            <a class="subir_videos" href="{{ route('publicar') }}"> <buttom>subir videos</buttom></a>

                        @else
                            @if(Auth::user()->hasRole('editor'))
                                <h4 class="Bienvenida">Bienvenido <b>{{ auth()->user()->name }}</b>  </h4>
                                <a class="perfil" href="{{ route('perfil') }}"> <buttom>Perfil de usuario</buttom></a>


                                <a class="subir_videos" href="{{ route('publicar') }}"> <buttom>subir videos</buttom></a>

                            @else
                                <h4 class="Bienvenida">Bienvenido <b>{{ auth()->user()->name }}</b>  </h4>
                                <a class="perfil" href="{{ route('perfil') }}"> <buttom>Perfil de usuario</buttom></a>


                            @endif
                        @endif
                        @if(Auth::user()->hasRole('admin'))

                        <span>* Cambiar rol a editor</span>
                        <table style="width:100%">
                            <tr>
                                <th>Nombre</th>
                                <th>Gmail</th>
                                <th>Fecha Registro</th>
                                <th>Rol</th>
                                <th></th>
                                <th></th>
                            </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td><a href="{{route('viewuser',$user->id)}}" style="cursor: pointer;">{{ $user->name }}</a></td>

                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    @foreach ($user->roles as $role)

                                     {{ $role->name }}
                                    @endforeach
                                </td>
                              <td>
                                  <a href="{{route('delete',$user->id)}}" style="cursor: pointer;">Eliminar</a>
                              </td>
                            <td>
                                <a href="{{route('edit',$user->id)}}" style="cursor: pointer;">Editar*</a>
                            </td>
                                </tr>



                        @endforeach
                        </table>
                        </div>
    @else
        <h1>Solo administradores</h1>

@endif



                </div>
</div>
@endsection
