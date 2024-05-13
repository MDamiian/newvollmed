<div>
    <x-button wire:click="set('open', true)">
        {{__('Actualizar')}}
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">Actualizar paciente</x-slot>
        <x-slot name="content">
            <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Sección 1: Datos de usuario -->
                    <div>
                        <label for="name" class="block">Nombre</label>
                        <input type="text" class="form-input w-full" id="name" name="nombre" value="{{ old('nombre', $paciente->datos->nombre) }}" required>
                    </div>
                    <div>
                        <label for="email" class="block">Correo electrónico</label>
                        <input type="email" class="form-input w-full" id="email" name="email" value="{{ old('email', $paciente->user->email) }}" required>
                    </div>
                    <div>
                        <label for="password" class="block">Contraseña</label>
                        <input type="password" class="form-input w-full" id="password" name="password">
                    </div>
                </div>

                <!-- Sección 2: Datos de dirección -->
                <div class="mt-4">
                    <label for="calle" class="block">Calle</label>
                    <input type="text" class="form-input w-full" id="calle" name="calle" value="{{ old('calle', $paciente->datos->direccion->calle) }}" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div>
                        <label for="numero" class="block">Número</label>
                        <input type="text" class="form-input w-full" id="numero" name="numero" value="{{ old('numero', $paciente->datos->direccion->numero) }}" required>
                    </div>
                    <div>
                        <label for="complemento" class="block">Complemento</label>
                        <input type="text" class="form-input w-full" id="complemento" name="complemento" value="{{ old('complemento', $paciente->datos->direccion->complemento) }}">
                    </div>
                    <div>
                        <label for="colonia" class="block">Colonia</label>
                        <input type="text" class="form-input w-full" id="colonia" name="colonia" value="{{ old('colonia', $paciente->datos->direccion->colonia) }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="ciudad" class="block">Ciudad</label>
                        <input type="text" class="form-input w-full" id="ciudad" name="ciudad" value="{{ old('ciudad', $paciente->datos->direccion->ciudad) }}" required>
                    </div>
                </div>

                <!-- Sección 3: Datos personales -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="curp" class="block">CURP</label>
                        <input type="text" class="form-input w-full" id="curp" name="curp" value="{{ old('curp', $paciente->datos->curp) }}" required>
                    </div>
                    <div>
                        <label for="nss" class="block">NSS</label>
                        <input type="text" class="form-input w-full" id="nss" name="nss" value="{{ old('nss', $paciente->nss) }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="telefono" class="block">Teléfono</label>
                        <input type="tel" class="form-input w-full" id="telefono" name="telefono" value="{{ old('telefono', $paciente->datos->telefono) }}" required>
                    </div>
                </div>

                <x-button class="mt-4">
                    {{__('Actualizar')}}
                </x-button>

                <x-secondary-button wire:click="set('open', false)">
                    {{__('Cancelar')}}
                </x-secondary-button>
            </form>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>