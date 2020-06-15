
@extends('personas/form')
@section('titulo')
    <h4 class="container header text-center">Edición </h4>
@endsection

@section('contenido')

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
        <a  class="btn btn-outline-danger" href="{{ asset('persona')}}" >Regresar</a>
    </div>

    <form class="form-horizontal"  method="post" action="{{ route('persona.update', $per->id_persona) }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')
                    <fieldset>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"> Nombres(s)</i></span>
                                    <div >
                                        <input value="{{$per->nombre}}" id="nombre" name="nombre" type="text" placeholder="Nombre(s)" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"> Apellido Paterno</i></span>
                                    <div >
                                        <input value="{{$per->ap_paterno}}" id="ap_paterno" name="ap_paterno" type="text" placeholder="Apellido Paterno" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"> Apellido Materno</i></span>
                                    <div >
                                        <input value="{{$per->ap_materno}}" id="ap_materno" name="ap_materno" type="text" placeholder="Apellido Materno" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"> Nacionalidad</i></span>
                                    <div >
                                        <input value="{{$per->nacionalidad}}" id="nacionalidad" name="nacionalidad" type="text" placeholder="Nacionalidad" class="form-control">
                                    </div>
                                </div>
                            </div> 
                            <div class="col text-center" > 
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-camera-retro bigicon"></i></span>                            
                                    <div >
                                        <input type="file" name="foto" />
                                        <img src="{{ URL::to('/') }}/imagenes/{{ $per->foto }}" class="itemRe" alt="" width= "250px" height="300px"/>
                                        <input type="hidden" name="hidden_imagen" value="{{$per->foto}}"/>
                                    </div>
                                </div>  
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-outline-success btn-lg" >Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
@endsection

