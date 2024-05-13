<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Pacientes</h2>
        <div class="flex justify-center">
            <table id="table-medicos" class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Nombre</th>
                        <th class="border border-gray-300 px-4 py-2">Correo electrónico</th>
                        <th class="border border-gray-300 px-4 py-2">CURP</th>
                        <th class="border border-gray-300 px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{$paciente->id}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$paciente->datos->nombre}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$paciente->user->email}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$paciente->datos->curp}}</td>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center">
                            @livewire('actualizar-paciente', ['paciente' => $paciente])
                            @livewire('confirmacion-modal', ['paciente' => $paciente])
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        Vollmed
    </div>
</div>