<?php

namespace App\Http\Controllers;

use App\Mail\CitaCreada;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConsultaController extends Controller
{
    public $file;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::all();
        $consultas = Consulta::with('medico', 'paciente')->get();
        return view('consulta.indexConsulta', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consulta.createConsulta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar
        $request->validate([
            'curp' => 'required|string|exists:datos_personales,curp',
            'email' => 'required|email',
            'especialidad' => 'required',
            'fecha_hora' => 'required|date',
        ]);

        $paciente = Paciente::whereHas('datos', function ($query) use ($request) {
            $query->where('curp', $request->curp);
        })->first();

        //Justificable para traerse un medico con especialidad
        $medico = Medico::whereHas('especialidad', function ($query) use ($request) {
            $query->where('id', $request->especialidad);
        })->whereNotIn('id', function ($query) use ($request) {
            $query->select('medico_id')
                ->from('consultas')
                ->where('fecha_hora', '>=', $request->fecha_hora)
                ->where('fecha_hora', '<=', $request->fecha_hora);
        })->first();

        if ($medico) {
            Mail::to($request->email)->send(new CitaCreada(
                Consulta::create([
                    'medico_id' => $medico->id,
                    'paciente_id' => $paciente->id,
                    'fecha_hora' => $request->fecha_hora,
                ])
            ));

            return redirect()->route('consultas.index');
        } else {
            return redirect()->back()->with('error', 'No se encontró un médico disponible.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $consulta)
    {
        return view('consulta.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $consulta)
    {
        // if (! Gate::allows('editar-consulta', $consulta)) {
        //     abort(403);
        // }
        // Gate::authorize('editar-consulta', $consulta);
        $this->authorize('update', $consulta);


        return view('consulta.editConsulta', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        $this->authorize('update', $consulta);

        $request->validate([
            'fecha_hora' => 'required|date',
            'file' => 'file|mimes:pdf,doc,docx,jpg,png,jpeg|max:2048', // Validar el tipo y tamaño del archivo
        ]);

        if ($request->file) {
            $nombreArchivo = $request->file->getClientOriginalName();
            $rutaArchivo = $request->file->storeAs('public/archivos-citas', $nombreArchivo);
            // Guardar la ruta relativa del archivo en la base de datos
            $consulta->path = 'archivos-citas/' . $nombreArchivo;
        }

        // Actualizar otros campos de la consulta
        $consulta->fecha_hora = $request->fecha_hora;
        $consulta->save();

        return redirect()->route('consultas.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        $consulta->delete();
        return redirect()->route('consultas.index');
    }
}
