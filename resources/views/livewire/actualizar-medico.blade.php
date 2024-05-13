<div>
    <x-button wire:click="set('open', true)">
        {{__('Actualizar')}}
    </x-button>
 
    <x-dialog-modal wire:model="open">
        <x-slot name="title">Actualizar médico</x-slot>
        <x-slot name="content">
            <form action="{{ route('medicos.update', $medico) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for=" nombre" class="block">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $medico->datos->nombre) }}" class="form-input w-full">
                    </div>
                    <div>
                        <label for="email" class="block">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $medico->user->email) }}" class="form-input w-full">
                    </div>

                    <div>
                        <label for="password" class="block">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-input w-full">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="especialidad" class="block">Especialidad</label>
                    <select class="form-select w-full" id="especialidad" name="especialidad" required>
                        <option value="">Selecciona una especialidad</option>
                        <option value="1" {{ old('especialidad', $medico->especialidad_id) == 1 ? 'selected' : '' }}>Cardiologia</option>
                        <option value="2" {{ old('especialidad', $medico->especialidad_id) == 2 ? 'selected' : '' }}>Pediatria</option>
                        <option value="3" {{ old('especialidad', $medico->especialidad_id) == 3 ? 'selected' : '' }}>Oftalmologia</option>
                    </select>
                </div>

                <div class="mt-4">
                    <label for="calle" class="block">Calle</label>
                    <input type="text" id="calle" name="calle" value="{{ old('calle', $medico->datos->direccion->calle) }}" class="form-input w-full">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div>
                        <label for="numero" class="block">Número</label>
                        <input type="text" id="numero" name="numero" value="{{ old('numero', $medico->datos->direccion->numero) }}" class="form-input w-full">
                    </div>
                    <div>
                        <label for="complemento" class="block">Complemento</label>
                        <input type="text" id="complemento" name="complemento" value="{{ old('complemento', $medico->datos->direccion->complemento) }}" class="form-input w-full">
                    </div>

                    <div>
                        <label for="colonia" class="block">Colonia</label>
                        <input type="text" id="colonia" name="colonia" value="{{ old('colonia', $medico->datos->direccion->colonia) }}" class="form-input w-full">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="ciudad" class="block">Ciudad</label>
                        <input type="text" id="ciudad" name="ciudad" value="{{ old('ciudad', $medico->datos->direccion->ciudad) }}" class="form-input w-full">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="activo" class="block">Activo</label>
                        <select id="activo" name="activo" class="form-select w-full" required>
                            <option value="1" {{ old('activo', $medico->activo) == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('activo', $medico->activo) == 0 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div>
                        <label for="curp" class="block">CURP</label>
                        <input type="text" id="curp" name="curp" value="{{ old('curp', $medico->datos->curp) }}" class="form-input w-full">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="telefono" class="block">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $medico->datos->telefono) }}" class="form-input w-full">
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