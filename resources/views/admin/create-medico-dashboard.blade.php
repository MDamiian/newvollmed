<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex justify-start items-center">
                <div>
                    {{ __('Agregar Médico') }}
                </div>
                <div class="flex items-center space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <!-- Navigation Links -->
                    <x-nav-link href="{{ route('medicos.create') }}" :active="request()->routeIs('medicos.create')">
                        {{ __('Agregar Médico') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('medicos.index') }}" :active="request()->routeIs('medicos.index')">
                        {{ __('Listado de médicos') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-create-medico />
            </div>
        </div>
    </div>
</x-app-layout>