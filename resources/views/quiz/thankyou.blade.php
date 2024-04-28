<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thank You') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="mb-4">Thank you for completing the quiz!</p>
                <p class="mb-4">Correct Answers: {{ $correctCount }}</p>
                <p class="mb-4">Wrong Answers: {{ $wrongCount }}</p>
                <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Back to Home') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
