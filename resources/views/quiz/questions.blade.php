<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="container">
                <h1 class="mb-6">Quiz: {{ $subject->name }}</h1>
                <form action="{{ route('quiz.submit', ['subjectId' => $subject->id]) }}" method="post">
                    @csrf
                    @foreach ($questions as $question)
                        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                            <h2 class="text-xl font-semibold mb-4">{{ $question->question_text }}</h2>
                            <ul class="list-disc list-inside">
                                @foreach ($question->options as $option)
                                    <li class="mb-2">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="answers[{{ $question->id }}]"
                                                value="{{ $option->id }}">
                                            <span class="ml-2">{{ $option->option_text }}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                            @error("answers.{$question->id}.question_id")
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                            @error("answers.{$question->id}.option_id")
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                    @error('answers')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Submit') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
