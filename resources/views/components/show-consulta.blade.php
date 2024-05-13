<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <ul class="text-xl text-black">
                <li>Paciente: {{ $consulta->paciente->datos->nombre }}</li>
                <li>Correo del paciente: {{ $consulta->paciente->user->email }}</li>
                <li>Médico: {{ $consulta->medico->datos->nombre }}</li>
                <li>Servicio: {{ $consulta->medico->especialidad->nombre }}</li>
                <li>Hora: {{ $consulta->fecha_hora }}</li>
            </ul>
        </div>
    </div>
</div>


