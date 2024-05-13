<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <ul class="text-xl text-black">
                <li>Nombre: {{ $medico->datos->nombre }}</li>
                <li>Correo: {{ $medico->user->email }}</li>
                <li>Especialidad: {{ $medico->especialidad->nombre }}</li>
                <li>Curp: {{ $medico->datos->curp }}</li>
                <li>Teléfono: {{ $medico->datos->telefono }}</li>
                <li>Calle: {{ $medico->datos->direccion->calle }}</li>
                <li>Número: {{ $medico->datos->direccion->numero }}</li>
                <li>Complemento: {{ $medico->datos->direccion->complemento }}</li>
                <li>Colonia: {{ $medico->datos->direccion->colonia }}</li>
                <li>Ciudad: {{ $medico->datos->direccion->ciudad }}</li>
                <li>Activo: {{ $medico->activo }}</li>
            </ul>
        </div>
    </div>
</div>


