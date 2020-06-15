
@extends('personas/form')
@section('titulo')
    <h4 class="container header text-center">Registro </h4>
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal"  method="post" action="{{ route('persona.store') }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"> Nombres(s)</i></span>
                                        <div >
                                            <input id="nombre" name="nombre" type="text"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"> Apellido Paterno</i></span>
                                        <div >
                                            <input  id="ap_paterno" name="ap_paterno" type="text"  class="form-control">
                                        </div>
                                    </div>
                                </div> 
                                <div class="col text-center" > 
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"> Apellido Materno</i></span>
                                        <div >
                                            <input id="ap_materno" name="ap_materno" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"> Nacionalidad</i></span>
                                        <div >
                                            <input id="nacionalidad" name="nacionalidad" type="text"  class="form-control">
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-camera-retro bigicon"></i></span>                            
                            <div class="col-md-8">
                                <input type="file" name="foto" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-outline-success btn-lg" >Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
                 