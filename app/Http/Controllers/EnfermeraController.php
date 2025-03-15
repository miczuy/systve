<?php

namespace App\Http\Controllers;

use App\Models\Enfermera;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class EnfermeraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enfermeras = Enfermera::whereHas('user', function ($query) {
            $query->where('status', true);
        })->get();

        return view('admin.enfermeras.index', compact('enfermeras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.enfermeras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|unique:enfermeras',
            'fecha_nacimiento' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);

    $usuario = new User();
    $usuario->name = $request->nombres;
    $usuario->email = $request->email;
    $usuario->password = Hash::make($request['password']);
    $usuario->save();

    $enfermera = new Enfermera();
    $enfermera->user_id = $usuario->id;
    $enfermera->nombres = $request->nombres;
    $enfermera->apellidos = $request->apellidos;
    $enfermera->cedula = $request->cedula;
    $enfermera->fecha_nacimiento = $request->fecha_nacimiento;
    $enfermera->celular = $request->celular;
    $enfermera->direccion = $request->direccion;
    $enfermera->save();

    $usuario->assignRole('enfermera');

        return redirect()->route('admin.enfermeras.index')
            ->with('mensaje',' Se registro a la enfermera')
            ->with('icono','success');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enfermera = Enfermera::with('user')->findOrFail($id);
        return view('admin.enfermeras.show', compact('enfermera'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $enfermera = Enfermera::with('user')->findOrFail($id);
        return view('admin.enfermeras.edit', compact('enfermera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $enfermera = Enfermera::find($id);

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|unique:enfermeras,cedula,'. $enfermera->id,
            'fecha_nacimiento' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'email' => 'required|max:250|unique:users,email,'. $enfermera->user->id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        $enfermera->nombres = $request->nombres;
        $enfermera->apellidos = $request->apellidos;
        $enfermera->cedula = $request->cedula;
        $enfermera->fecha_nacimiento = $request->fecha_nacimiento;
        $enfermera->celular = $request->celular;
        $enfermera->direccion = $request->direccion;
        $enfermera->save();

        $usuario = User::find($enfermera->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;

        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);

        }

        $usuario->save();
        return redirect()->route('admin.enfermeras.index')
            ->with('mensaje',' Se Actualizo a la enfermera')
            ->with('icono','success');


    }

    /**
     * Remove the specified resource from storage.
     */


    public function confirmDelete($id){
        $enfermera = Enfermera::with('user')->findOrFail($id);
        return view('admin.enfermeras.delete', compact('enfermera'));

    }


    public function destroy($id)
    {
        $enfermera = Enfermera::find($id);

        //eliminar el usuario asociado
        $user = $enfermera->user;
        $user->delete();

        //eliminar a la enfermera
        $enfermera->delete();


        return redirect()->route('admin.enfermeras.index')
            ->with('mensaje',' Se Elimino a la enfermera')
            ->with('icono','success');


    }
}
