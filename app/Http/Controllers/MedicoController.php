<?php

namespace App\Http\Controllers;

use App\Models\DatosPersonales;
use App\Models\Direccion;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        $medicos = Medico::with('datos', 'user', 'especialidad')->get();
        return view('admin.indexMedico', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-medico-dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'curp' => 'required|unique:datos_personales,curp',
            'telefono' => 'required|unique:datos_personales,telefono',
            'calle' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'colonia' => 'required',
            'ciudad' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $direccion = Direccion::create([
            'calle' => $request->calle,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
        ]);

        $datosPersonales = DatosPersonales::create([
            'nombre' => $request->name,
            'curp' => $request->curp,
            'telefono' => $request->telefono,
            'direccion_id' => $direccion->id,
        ]);

        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Medico::create([
            'datos_id' => $datosPersonales->id,
            'usuario_id' => $usuario->id,
            'activo' => 1,
            'especialidad_id' => $request->especialidad,
        ]);

        return redirect()->route('administradores.index')->with('success', 'Médico creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        return view('admin.edit-medico-dashboard', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medico $medico): RedirectResponse
    {


        // Actualiza los datos personales del médico
        $medico->datos->update([
            'nombre' => $request->nombre,
            'curp' => $request->curp,
            'telefono' => $request->telefono,
        ]);

        // Actualiza la dirección del médico
        $medico->datos->direccion->update([
            'calle' => $request->calle,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
        ]);

        // Actualiza otros campos del modelo Medico
        $medico->update([
            'activo' => $request->activo,
            'especialidad_id' => $request->especialidad,
        ]);

        // Actualiza el usuario del médico
        $medico->user->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('administradores.index')->with('success', 'Médico actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        $medico->user->delete();
        $medico->datos->direccion->delete();
        $medico->datos->delete();
        $medico->delete();
        return redirect()->route('administradores.index')->with('success', 'Medico eliminado exitosamente');
    }
}
