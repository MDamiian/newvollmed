<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Medicos</h2>
        <div class="flex justify-center">
            <form method="POST" action="{{ route('medicos.store') }}">
                @csrf
                <x-validation-errors></x-validation-errors>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Sección 1: Datos de usuario -->
                    <div>
                        <label for="name" class="block">Nombre</label>
                        <input type="text" class="form-input w-full" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div>
                        <label for="email" class="block">Correo electrónico</label>
                        <input type="email" class="form-input w-full" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div>
                        <label for="password" class="block">Contraseña</label>
                        <input type="password" class="form-input w-full" id="password" name="password" required>
                    </div>
                </div>

                <!-- Sección 2: Datos de especialidad -->
                <div class="mt-4">
                    <label for="especialidad" class="block">Nombre de especialidad</label>
                    <select class="form-select w-full" id="especialidad" name="especialidad" required>
                        <option value="">Selecciona una especialidad</option>
                        <option value="1" {{ old('especialidad') == 1 ? 'selected' : '' }}>Cardiologia</option>
                        <option value="2" {{ old('especialidad') == 2 ? 'selected' : '' }}>Pediatria</option>
                        <option value="3" {{ old('especialidad') == 3 ? 'selected' : '' }}>Oftalmologia</option>
                    </select>
                </div>

                <!-- Sección 3: Datos de dirección -->
                <div class="mt-4">
                    <label for="calle" class="block">Calle</label>
                    <input type="text" class="form-input w-full" id="calle" name="calle" value="{{ old('calle') }}" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div>
                        <label for="numero" class="block">Número</label>
                        <input type="text" class="form-input w-full" id="numero" name="numero" value="{{ old('numero') }}" required>
                    </div>
                    <div>
                        <label for="complemento" class="block">Complemento</label>
                        <input type="text" class="form-input w-full" id="complemento" name="complemento" value="{{ old('complemento') }}">
                    </div>
                    <div>
                        <label for="colonia" class="block">Colonia</label>
                        <input type="text" class="form-input w-full" id="colonia" name="colonia" value="{{ old('colonia') }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="ciudad" class="block">Ciudad</label>
                        <input type="text" class="form-input w-full" id="ciudad" name="ciudad" value="{{ old('ciudad') }}" required>
                    </div>
                </div>

                <!-- Sección 4: Datos personales -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="curp" class="block">CURP</label>
                        <input type="text" class="form-input w-full" id="curp" name="curp" value="{{ old('curp') }}" required>
                    </div>
                    <div>
                        <label for="telefono" class="block">Teléfono</label>
                        <input type="tel" class="form-input w-full" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                    </div>
                </div>

                <!-- Botón de envío -->
                <x-button class="mt-4">
                    {{__('Enviar')}}
                </x-button>

                <x-secondary-button>
                    <a href="{{ route('administradores.index') }}">Cancelar</a>
                </x-secondary-button>
            </form>
        </div>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        Vollmed
    </div>
</div>