<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Consultas</h2>
        <div class="flex justify-center">
            <table id="table-medicos" class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Paciente</th>
                        <th class="border border-gray-300 px-4 py-2">Médico</th>
                        <th class="border border-gray-300 px-4 py-2">Hora</th>
                        <th class="border border-gray-300 px-4 py-2">Correo del paciente</th>
                        <th class="border border-gray-300 px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultas as $consulta)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{$consulta->paciente->datos->nombre}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$consulta->medico->datos->nombre}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$consulta->fecha_hora}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$consulta->paciente->user->email}}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex flex-col items-center">
                                <div class="flex space-x-2">
                                    @livewire('actualizar-consulta', ['consulta' => $consulta])
                                    @livewire('show-consulta', ['consulta' => $consulta])
                                    @livewire('confirmacion-modal', ['consulta' => $consulta])
                                </div>
                                <div class="mt-4">
                                    @if($consulta->path)
                                    <a href="{{ asset('storage/'.$consulta->path) }}" target="_blank" class="btn btn-sm btn-primary mt-2">Ver archivo</a>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@unless(request()->routeIs('administradores.index'))
<x-footer />
@endunless