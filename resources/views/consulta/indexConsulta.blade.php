<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex justify-start items-center">
                <div>
                    {{ __('Citas') }}
                </div>
                <div class="flex items-center space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <!-- Navigation Links -->
                    <x-nav-link href="{{ route('consultas.create') }}" :active="request()->routeIs('consultas.create')">
                        {{ __('Agendar Consulta') }}
                    </x-nav-link>

                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-index-consultas :consultas="$consultas" />
            </div>
        </div>
    </div>
</x-app-layout>