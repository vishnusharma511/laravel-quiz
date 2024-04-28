<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-4">Already Completed Assessment</h1>
                <p class="text-gray-600 mb-6">Thank you for completing the assessment.</p>
                <a href="{{ route('dashboard') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                    {{ __('Back to Home') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
