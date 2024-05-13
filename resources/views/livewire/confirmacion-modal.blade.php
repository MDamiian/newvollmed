<div>
    <x-danger-button class="ml-4" wire:click="set('open', true)">
        {{ __('Eliminar') }}
    </x-danger-button>

    <x-confirmation-modal wire:model="open">
        <x-slot name="title">
            {{__('¿Seguro que quieres realizar esta acción?')}}
        </x-slot>
        <x-slot name="content">
            {{__('Esta acción es permanente')}}
        </x-slot>
        <x-slot name="footer">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <x-button wire:click="set('open', false)" class="form-input w-full text-center">
                    {{__('Cancelar')}}
                </x-button>
                @if($medico)
                <form action="{{ route('medicos.destroy', $medico) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit" class="form-input w-full">
                        {{__('Aceptar')}}
                    </x-danger-button>
                </form>
                @endif

                @if($paciente)
                <form action="{{ route('pacientes.destroy', $paciente) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit" class="form-input w-full">
                        {{__('Aceptar')}}
                    </x-danger-button>
                </form>
                @endif

                @if($consulta)
                <form action="{{ route('consultas.destroy', $consulta) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit" class="form-input w-full">
                        {{__('Aceptar')}}
                    </x-danger-button>
                </form>
                @endif
            </div>
        </x-slot>
    </x-confirmation-modal>
</div>