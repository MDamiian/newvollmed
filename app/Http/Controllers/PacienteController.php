<?php

namespace App\Http\Controllers;

use App\Models\DatosPersonales;
use App\Models\Direccion;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        $pacientes = Paciente::with('datos', 'user')->get();
        return view('paciente.indexPaciente', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paciente.createPaciente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'calle' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'colonia' => 'required',
            'ciudad' => 'required',
            'curp' => 'required|unique:datos_personales,curp',
            'nss' => 'required|unique:pacientes,nss',
            'telefono' => 'required|unique:datos_personales,telefono',
        ]);

        $direccion = Direccion::create([
            'calle' => $request->calle,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
        ]);

        $datosPersonales = DatosPersonales::create([
            'nombre' => $request->nombre,
            'curp' => $request->curp,
            'telefono' => $request->telefono,
            'direccion_id' => $direccion->id,
        ]);

        $usuario = User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Paciente::create([
            'datos_id' => $datosPersonales->id,
            'usuario_id' => $usuario->id,
            'activo' => 1, //Agregar input de activo en front
            'nss' => $request->nss,
        ]);
        //medicos.index es temporal
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('medicos.index', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        // Actualiza los datos personales del médico
        $paciente->datos->update([
            'nombre' => $request->nombre,
            'curp' => $request->curp,
            'telefono' => $request->telefono,
        ]);

        // Actualiza la dirección del médico
        $paciente->datos->direccion->update([
            'calle' => $request->calle,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
        ]);

        // Actualiza otros campos del modelo paciente
        $paciente->update([
            'activo' => 1,
            'nss' => $request->nss,
        ]);

        // Actualiza el usuario del médico
        $paciente->user->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->user->delete();
        $paciente->datos->direccion->delete();
        $paciente->datos->delete();
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente');
    }
}
