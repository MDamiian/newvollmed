<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Medicos</h2>
        <div class="flex justify-center">
            <table id="table-medicos" class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Nombre</th>
                        <th class="border border-gray-300 px-4 py-2">Correo electrónico</th>
                        <th class="border border-gray-300 px-4 py-2">Especialidad</th>
                        <th class="border border-gray-300 px-4 py-2">Activo</th>
                        <th class="border border-gray-300 px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicos as $medico)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{$medico->id}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$medico->datos->nombre}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$medico->user->email}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$medico->especialidad->nombre}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$medico->activo ? 'Activo' : 'Inactivo'}}</td>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center">
                            @livewire('actualizar-medico', ['medico' => $medico])
                            @livewire('show-medico', ['medico' => $medico])
                            @livewire('confirmacion-modal', ['medico' => $medico])                            
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