<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between ">
            <div class="flex flex-col">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('All Courses') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Browse and sign up to Courses here') }}
                </p>
            </div>
            @if (Auth()->user()->role == 'staff')
                <a href="{{ route('course.new') }}" class="p-1 px-2 flex justify-center border rounded transition-colors duration-200 border-indigo-600 dark:hover:text-gray-100 hover:text-gray-100 dark:hover:bg-indigo-600 hover:bg-indigo-600 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <x-heroicon-o-plus class="w-8 h-8 m-auto" />
                </a> 
            @endif
        </div>
    </x-slot>

    <div class="pt-6 max-w-7xl h-[44rem] mx-auto sm:px-6 lg:px-8">
        <div class="h-full overflow-y-scroll grid grid-cols-3 gap-4 bg-gray-100 dark:bg-gray-800 overflow-hidden shadow rounded-lg p-4">
            @foreach ($courses as $course)
                <div class="w-full h-full flex flex-col border rounded shadow-lg bg-gray-200 dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                    <div class="m-2 grow">
                        <div class="text-2xl pb-2">{{ $course->title }}</div>
                        <div class="text-base">{{ $course->description }}</div>
                    </div>
                    <div class="flex flex-row justify-between rounded-b border-t bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-700 p-2">
                        <div class="my-auto">Fee: {{ $course->fee }}</div>
                        <form method="post" action="{{ route('course.enrol') }}">
                            @csrf
                            <input hidden type="hidden" name="course_id" autocomplete="off" value="{{ $course->id }}">
                            <button submit class="py-1 px-2 border rounded transition-colors duration-200 border-cyan-400 hover:text-gray-100 dark:hover:text-gray-900 dark:hover:bg-cyan-400 hover:bg-cyan-400  dark:bg-gray-800 ">Enrol</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
