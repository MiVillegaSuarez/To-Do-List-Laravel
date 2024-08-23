<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard bajo el menu') }} --}}
            <a href="{{ route('dashboard') }}" class="btn"><i class="bi bi-card-list"></i> LISTA DE TAREAS</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }}
                    <p>aqui pues</p> --}}
                    
                    @include('sweetalert::alert')

                    @yield('content-list')
                    @yield('content-create')
                    @yield('content-update')

                    <form action="{{url('tokens/create')}}" method="POST">
                        @csrf
                        <input type="text" name="token_name" id="" placeholder="Nombre del token">
                        <input type="submit" value="Generar token">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



