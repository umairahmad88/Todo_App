<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            
        </h2>
    </x-slot>
@yield('styles')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger ml-3">Go back</a>
                <div class="p-6 text-gray-900">
                    <b>Your Todo title is: </b> {{ $todo->title }} <br>
                    <b>Your Todo description is: </b> {{ $todo->description }} <br>
            </div>
        </div>
    </div>
</x-app-layout>