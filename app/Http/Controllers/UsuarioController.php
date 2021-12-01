<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('verified');
    }
    public function index(){
        $roles = Role::all()->pluck('name', 'id');
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios', 'roles'));

    }

    public function create(){

        $roles = Role::all()->pluck('name', 'id');
        return view('usuarios.create', compact('roles'));

    }

    public function store( UserCreateRequest $request){

        $request->validate([
            'name' => 'required|min:3|max:10',
            'email' => 'required|email|unique:users',
            'password' =>'required',

        ]);

        $usuario = User::create($request->only('name','email')
        + [
            'password' => bcrypt($request->input('password')),
        ]);

        $roles = $request->input('roles', []);
        $usuario->syncRoles($roles);
        return redirect()->route('usuarios.index', $usuario->id)->with('success', 'Usuario creado correctamente');
        // return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(User $usuario){
        //$usuario = User::findOrFail($id);
        // load para cargar relaciones de uno a muchos o de muchos a muchos
        $usuario->load('roles');
        return view('usuarios.show', compact('usuario'));

    }

    public function edit(User $usuario){

        $roles = Role::all()->pluck('name', 'id');
        $usuario->load('roles');
        return view('usuarios.edit', compact('usuario', 'roles'));

    }

    public function update(UserEditRequest $request, User $usuario){

        // $usuario=User::findOrFail($id);
        $data = $request->only('name', 'email');
        $password=$request->input('password');
        if($password)
        $data['password'] = bcrypt($password);
        // if(trim($request->password)==''){
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }

        $usuario->update($data);

        $roles = $request->input('roles', []);
        $usuario->syncRoles($roles);

        return redirect()->route('usuarios.index', compact('roles'))->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $usuario){

        if (auth()->user()->id == $usuario->id) {
            return redirect()->route('usuarios.index')->with('success', 'No se puede eliminar a usted mismo ');
        }

        $usuario->delete();
        return back()->with('success', 'Eliminado correctamente');

    }
}
