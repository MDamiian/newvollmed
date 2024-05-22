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
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div>
                                @can('update', $consulta)
                                    @livewire('actualizar-consulta', ['consulta' => $consulta])
                                @endcan
                                </div>
                                
                                <div>
                                    @livewire('show-consulta', ['consulta' => $consulta])
                                </div>
                                <div>
                                @can('delete', $consulta)
                                    @livewire('confirmacion-modal', ['consulta' => $consulta])
                                @endcan
                                </div>

                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-4">
                                @can('update', $consulta)
                                    <div>@if($consulta->path)
                                        <a href="{{ asset('storage/'.$consulta->path) }}" target="_blank" class="btn btn-sm btn-primary mt-2">Ver archivo</a>
                                        @endif
                                    </div>
                                @endcan
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