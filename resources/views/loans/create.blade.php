<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Borrow Book') }} "{{$book->title}}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg bg-white dark:bg-gray-800">
                <div class="p-6">
                    <form method="POST" action="{{ route('loans.store', ['book' => $book->id]) }}">
                        @csrf
                        <div class="mb-6 text-gray-900 dark:text-gray-100">
                            <label class="block">
                                <span>How many copies would you like to borrow?</span>
                                <input type="number" name="number_borrowed" class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                       placeholder="How many copies would you like to borrow?"
                                       value="{{old('number_borrowed')}}"/>
                            </label>
                            @error('number_borrowed')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6 text-gray-900 dark:text-gray-100">
                            <label class="block">
                                <span>Return date</span>
                                <input type="date" name="return_date" class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                       placeholder="" value="{{old('return_date')}}"/>
                            </label>
                            @error('return_date')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <x-primary-button type="submit">
                            Submit
                        </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>