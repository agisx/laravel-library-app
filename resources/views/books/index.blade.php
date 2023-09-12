<x-app-layout>
    <div class="py-12">
        <div class="mx-auto py-2 sm:rounded-lg bg-white dark:bg-gray-800 shadow-sm">
            <div class="mx-auto sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                <h2 class="m-6 text-xl font-semibold text-gray-900 dark:text-gray-100 text-center">Laravel Library App</h2>
                <table class="mx-auto text-gray-900 dark:text-gray-100">
                    <thead>
                        <tr class="font-bold">
                            <th
                                class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                #
                            </th>
                            <th
                                class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                Title
                            </th>
                            <th
                                class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                Author
                            </th>
                            <th
                                class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                Release Year
                            </th>
                            <th
                                class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                Released Copies
                            </th>
                            <th
                                class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                Available Copies
                            </th>
                            @auth
                                <th
                                    class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                    Actions
                                </th>
                            @endif
                        </tr>
                    </thead>

                    <tbody class="font-normal">
                        @foreach($books as $book)
                            {{-- No border --}}
                            @if ($loop->last)
                                
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-no-wrap border-gray-200">{{ $loop->index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-gray-200">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium leading-5">
                                            {{$book->title}}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-gray-200">
                                    <div class="text-sm leading-5">{{$book->author}}</div>
                                </td>

                                <td
                                    class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-gray-200">
                                    {{$book->year}}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-gray-200">
                                    @if($book->copies_in_circulation < 10)
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                {{$book->copies_in_circulation}}
                                            </span>
                                    @elseif($book->copies_in_circulation < 20)
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                                {{$book->copies_in_circulation}}
                                            </span>
                                    @else
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                {{$book->copies_in_circulation}}
                                            </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-gray-200">
                                    @if($book->availableCopies() < 10)
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                {{$book->availableCopies()}}
                                            </span>
                                    @elseif($book->availableCopies() < 20)
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                                {{$book->availableCopies()}}
                                            </span>
                                    @else
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                {{$book->availableCopies()}}
                                            </span>
                                    @endif
                                </td>
                                @auth
                                    <td
                                        class="px-6 py-4 text-sm leading-5 whitespace-no-wrap text-green-500">
                                    @if($book->canBeBorrowed())
                                        <a href="{{ route('loans.create', ['book' => $book->id]) }}">Borrow book</a>
                                    @else
                                        <p class="text-red-600">No copies available to borrow</p>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                            @else
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $loop->index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium leading-5">
                                                {{$book->title}}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5">{{$book->author}}</div>
                                    </td>

                                    <td
                                        class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-200">
                                        {{$book->year}}
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if($book->copies_in_circulation < 10)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                    {{$book->copies_in_circulation}}
                                                </span>
                                        @elseif($book->copies_in_circulation < 20)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                                    {{$book->copies_in_circulation}}
                                                </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                    {{$book->copies_in_circulation}}
                                                </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if($book->availableCopies() < 10)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                    {{$book->availableCopies()}}
                                                </span>
                                        @elseif($book->availableCopies() < 20)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                                    {{$book->availableCopies()}}
                                                </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                    {{$book->availableCopies()}}
                                                </span>
                                        @endif
                                    </td>
                                    @auth
                                        <td
                                            class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-200 text-green-500">
                                        @if($book->canBeBorrowed())
                                            <a href="{{ route('loans.create', ['book' => $book->id]) }}">Borrow book</a>
                                        @else
                                            <p class="text-red-600">No copies available to borrow</p>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>