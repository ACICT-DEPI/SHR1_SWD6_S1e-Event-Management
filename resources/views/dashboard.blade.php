<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden space-x-6 flex shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-blue-500  p-6 rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold mb-2">Events</h2>
                        <p>{{$events}}</p>
                    </div>
                    
                    <div class="bg-blue-500  p-6 rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold mb-2">likedEvents</h2>
                        <p>{{$likedEvent}}</p>
                    </div>

                    <div class="bg-blue-500  p-6 rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold mb-2">AttendingEvents</h2>
                        <p>{{$attendingEvent}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
