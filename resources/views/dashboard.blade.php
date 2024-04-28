<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($subjectsAssign as $item)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $item->subject->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $item->result == null ? __('Status: ') : __('Marks: ') }} {{ $item->result == null ? 'Pending' : $item->result }}</p>
                        </div>
                        <div>
                            @if ($item->result == null)
                            <a href="{{ route('quiz.show', ['subjectId' => $item->subject->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Start') }}
                            </a>
                            @else
                            <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Done') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
