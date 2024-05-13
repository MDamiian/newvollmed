<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <ul class="text-xl text-black">
                <li>Nombre: {{ $paciente->datos->nombre }}</li>
                <li>Correo: {{ $paciente->user->email }}</li>
                <li>Curp: {{ $paciente->datos->curp }}</li>
                <li>Teléfono: {{ $paciente->datos->telefono }}</li>
                <li>Calle: {{ $paciente->datos->direccion->calle }}</li>
                <li>Número: {{ $paciente->datos->direccion->numero }}</li>
                <li>Complemento: {{ $paciente->datos->direccion->complemento }}</li>
                <li>Colonia: {{ $paciente->datos->direccion->colonia }}</li>
                <li>Ciudad: {{ $paciente->datos->direccion->ciudad }}</li>
                <li>Activo: {{ $paciente->activo }}</li>
            </ul>
        </div>
    </div>
</div>


