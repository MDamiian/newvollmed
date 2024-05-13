<div>
    <x-button wire:click="set('open', true)">
        {{__('Actualizar')}}
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">Actualizar consulta</x-slot>
        <x-slot name="content">
            <form action="{{ route('consultas.update', $consulta) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="fecha_hora" class="block">Fecha y hora de la consulta</label>
                        <input type="datetime-local" class="form-input w-full" id="fecha_hora" name="fecha_hora" value="{{ old('fecha_hora', $consulta->fecha_hora) }}" required>
                    </div>
                    <div>
                        <label for="file" class="block">Archivo</label>
                        <input type="file" class="form-input w-full mt-2" id="file" name="file">
                        @if($consulta->path)
                        <a href="{{ asset('storage/' . $consulta->path) }}" target="_blank">{{ $consulta->path }}</a>
                        @endif
                    </div>
                </div>

                <x-button class="mt-4">
                    {{ __('Actualizar') }}
                </x-button>
                <x-secondary-button>
                    <a href="{{ route('consultas.index') }}">Cancelar</a>
                </x-secondary-button>
            </form>


        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>