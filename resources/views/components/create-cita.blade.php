<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Citas</h2>
        <div class="flex justify-center">
            <form method="POST" action="{{ route('consultas.store') }}">
                @csrf
                <x-validation-errors></x-validation-errors>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="curp" class="block">CURP</label>
                        <input type="text" class="form-input w-full" id="curp" name="curp" value="{{ old('curp') }}" required>
                    </div>

                    <div>
                        <label for="email" class="block">Correo electrónico</label>
                        <input type="email" class="form-input w-full" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div>
                        <label for="especialidad" class="block">Nombre de especialidad</label>
                        <select class="form-select w-full" id="especialidad" name="especialidad" required>
                            <option value="">Selecciona una especialidad</option>
                            <option value="1" {{ old('especialidad') == 1 ? 'selected' : '' }}>Cardiologia</option>
                            <option value="2" {{ old('especialidad') == 2 ? 'selected' : '' }}>Pediatria</option>
                            <option value="3" {{ old('especialidad') == 3 ? 'selected' : '' }}>Oftalmologia</option>
                        </select>
                    </div>

                    <div>
                        <label for="fecha_hora" class="block">Fecha y hora de la consulta</label>
                        <input type="datetime-local" class="form-input w-full" id="fecha_hora" name="fecha_hora" required>
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