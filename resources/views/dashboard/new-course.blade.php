<x-app-layout>
    <div class="pt-6 max-w-7xl h-[44rem] mx-auto sm:px-6 lg:px-8">
        <div class="h-full flex flex-col bg-gray-100 dark:bg-gray-800 overflow-hidden shadow rounded-lg">
            <header class="border-b-2 border-gray-300 dark:border-gray-900 p-4">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('New Course') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Create a new course with the form below.") }}
                </p>
            </header>
            <form method="post" action="{{ route('course.store') }}" class="flex flex-col grow gap-4 w-1/2 p-4">
                @csrf

                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <div class="grow">
                    <x-input-label for="description" :value="__('description')" />
                    <x-text-area id="description" name="description" type="description" class="mt-1 block w-full h-[90%]" required autocomplete="description" />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div>
                    <x-input-label for="fee" :value="__('Fee')" />
                    <x-text-input id="fee" name="fee" type="text" class="mt-1 block w-full" required autofocus autocomplete="fee" />
                    <x-input-error class="mt-2" :messages="$errors->get('fee')" />
                </div>

                <div class="flex items-center mt-2 gap-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
