@extends('personas/form')

@section('titulo')
    <h4 class="container header text-center" >Historial de Personas </h4>
@endsection

@section('contenido')
    @if ($message = Session ::get('success'))
        <div class="alert alert-success">
            <p> {{$message}} </p>
        </div>
    @endif 
    @if($errors -> any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="text-align: right;">
        <a  class="btn btn-outline-success" href="{{route('persona.create')}}">Registrar Nuevo</a>
    </div><br>
    <div>
        <table class="table table-bordered table-striped table-hover" style="background-color:#D2E9EA;" >
            <tr class="text-lg-center" >
                <th width="20%">Foto</th>
                <th width="10%">Nombre </th>
                <th width="15%">Apellido Paterno </th>
                <th width="15%">Apellido Materno</th>
                <th width="20%">Nacionalidad</th>
                <th width="10%">Opciones</th>
            </tr>
            @foreach ($per as $persona)
                <tr class="text-center" style="font-weight: 600;">
                    <td> 
                        <img class="img-thumbnail" src="{{URL::to('/')}}/imagenes/{{$persona->foto}}" alt=""  width= "150px" height="150px" />
                    </td>
                    <td>{{$persona->nombre}}</td>          
                    <td>{{$persona->ap_paterno}}</td>
                    <td>{{$persona->ap_materno}}</td>
                    <td>{{$persona->nacionalidad}}</td>
                    <td>
                        <a class="btn" href="{{route('persona.edit', $persona->id_persona)}}" style= "color: #287DC4;font-weight: 700"> Editar </a>
                        <form method="post" action="{{route('persona.destroy', $persona->id_persona)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style= "color: #D83F36;font-weight: 700">Eliminar</button>
                        </form>
                    </td>
                </tr> 
            @endforeach
            
        </table>
        {!! $per->links()!!}
    </div>
@endsection

