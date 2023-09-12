@php use Carbon\Carbon; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-900 dark:text-gray-100">Active Loans</h2>
    </x-slot>
    
    <div class="py-12">
        <div class="mx-auto sm:rounded-lg">
            <div class="mx-auto sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                @if (session()->has('status'))
                    <div
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-7/12  text-center mx-auto m-5"
                        role="alert">
                        <span class="block sm:inline">{{ session()->get('status') }}</span>
                    </div>
                @endif

                @if($loans->count() > 0)
                    <table class="mx-auto bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm sm:rounded-lg">
                        <thead>
                            <tr class="font-bold">
                                <th
                                    class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                    #
                                </th>
                                <th
                                    class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                    Book
                                </th>
                                <th
                                    class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                    Number Borrowed
                                </th>
                                <th
                                    class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                    Return date
                                </th>
                                <th
                                    class="px-6 py-3 text-xs leading-4 tracking-wider text-left">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="font-normal">
                            @foreach($loans as $loan)
                                {{-- No border --}}
                                @if ($loop->last)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-no-wrap border-gray-200">{{ $loop->index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-gray-200">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium leading-5">
                                                    {{$loan->book->title}}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-gray-200">
                                            <div class="text-sm leading-5">{{$loan->number_borrowed}}</div>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-gray-200">
                                            {{Carbon::parse($loan->return_date)->format('l jS F, Y')}}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-gray-200">
                                            <a href="{{ route('loans.terminate', ['loan' => $loan->id]) }}">Return book</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $loop->index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium leading-5">
                                                    {{$loan->book->title}}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5">{{$loan->number_borrowed}}</div>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-200">
                                            {{Carbon::parse($loan->return_date)->format('l jS F, Y')}}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('loans.terminate', ['loan' => $loan->id]) }}">Return book</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1 class="m-6 text-xl font-semibold text-center">You have no active loans</h1>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>