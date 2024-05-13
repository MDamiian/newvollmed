<div>
    <x-button wire:click="set('open', true)">
        {{__('Ver')}}
    </x-button>
 
    <x-dialog-modal wire:model="open">
        <x-slot name="title">Paciente: {{ $paciente->id }}</x-slot>
        <x-slot name="content">
            <x-show-paciente :paciente="$paciente"/>
            <x-secondary-button wire:click="set('open', false)">
                {{__('Volver')}}
            </x-secondary-button>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>


