<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Consulta;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $medicos = Medico::get();
        $pacientes = Paciente::get();
        $consultas = Consulta::get();
        $medicos = Medico::with('user')->get();
        $pacientes = Paciente::with('user')->get();
        $consultas = Consulta::with('medico', 'paciente')->get();
        return view('admin.dashboard', ['medicos' => $medicos, 'pacientes' => $pacientes, 'consultas' => $consultas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/createAdmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:10'
        ]);

        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Administrador::create([
            'usuario_id' => $usuario->id,
        ]);

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrador $admin)
    {
        return view('admin.showAdmin', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrador $admin)
    {
        return view('admin.editAdmin', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrador $admin)
    {
        // Validar
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique',
            'password' => 'required|string|min:10',
        ]);

        $admin->update($request->all());

        return redirect()->route('admin.show', $admin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $admin)
    {
        $admin->delete();
        return redirect()->route('admin.create');
    }
}
