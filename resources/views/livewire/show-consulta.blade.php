<div>
    <x-button class="ml-4" wire:click="set('open', true)">
        {{__('Ver')}}
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">Consulta: {{ $consulta->id }}</x-slot>
        <x-slot name="content">
            <x-show-consulta :consulta="$consulta" />
            <x-secondary-button wire:click="set('open', false)">
                {{__('Volver')}}
            </x-secondary-button>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>