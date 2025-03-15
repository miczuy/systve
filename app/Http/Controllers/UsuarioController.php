<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');

        $usuarios = User::when($search, function($query) use ($search) {
            return $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.usuarios.index', compact('usuarios'));
    }
    public function create (){

    return view('admin.usuarios.create');
}

    public function store (Request $request){
        //$datos = request()->all([]);
        //return response ()->json ( [$datos]);
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',


        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje',' Usuario creado')
            ->with('icono','success');
}

    public function toggleStatus($id)
    {
        $usuario = User::findOrFail($id);

        // Cambiar el estado actual
        $usuario->status = !$usuario->status;
        $usuario->save();

        // Redirigir con un mensaje
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', $usuario->status ? 'Usuario activado con éxito' : 'Usuario desactivado con éxito')
            ->with('icono', 'success');
    }


    public function show ($id){
    $usuario = User::findOrFail($id);
    return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit ($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));


    }


    public function update (Request $request, $id){
        $usuario = User::find($id);
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:users,email,'.$usuario->id,
            'password' => 'nullable|max:250|confirmed',
        ]);


        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);

        }

        $usuario->save();
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Se actualizo correctamente ')
            ->with('incono','success');


    }

    public function confirmDelete($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
}

    public function destroy($id) {
        $usuario = User::destroy($id);
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Se Eliminó Correctamente')
            ->with('icono', 'success');
    }


}
