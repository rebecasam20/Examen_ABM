<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per = Persona::latest()->paginate(5);
        return view('personas/personas',compact('per'))
        ->with ('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'nacionalidad'=> 'required',
            'foto' => 'required|image|max:2048'
        ]);

        $imagen = $request->file('foto');
        $new_name=rand().'.'.$imagen->getClientOriginalExtension();
        $imagen ->move(public_path('imagenes'), $new_name);

        $form_tra=array(
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_paterno,
            'ap_materno' => $request->ap_materno,
            'nacionalidad' => $request->nacionalidad,
            'foto' => $new_name,
            
        );

        Persona::create($form_tra);
        return redirect('persona')->with('success','Datos agregados satisfactoriamente');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $per= Persona::findOrFail($id);
        return view('personas/edit', compact('per'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name=$request->hidden_imagen;
        $imagen=$request->file('foto');
        if($imagen != ''){
            $request->validate([
                'nombre' => 'required',
                'ap_paterno' => 'required',
                'ap_materno' => 'required',
                'nacionalidad' => 'required',
                'foto' => 'required' 
            ]);
            $image_name=rand().'.'.$imagen->getClientOriginalExtension();
            $imagen ->move(public_path('imagenes'), $image_name);
        }
        else{
            $request->validate([
                'nombre' => 'required',
                'ap_paterno' => 'required',
                'ap_materno' => 'required',
                'nacionalidad' => 'required'
            ]);
        }
    
        $form_tra=array(
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_paterno,
            'ap_materno' => $request->ap_materno,
            'nacionalidad' => $request->nacionalidad,
            'foto' => $image_name
        );

        Persona::Where('id_persona','=',$id)->update($form_tra);
        return redirect('persona')->with('success','Los cambios se han realizado correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $per= Persona::findOrFail($id);
        $per->delete();
        return redirect('persona')->with('success','El registro se ha eliminado');
    }
}
