@extends('layouts.app')

@section('content')
    <div>

        <button
            class="mb-8 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button" data-modal-toggle="authentication-modal">
            Create Member
        </button>

        <div>
            @if (session()->has('message'))
                <div class="p-4 bg-green-500 text-green-900 rounded-lg mb-4">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        {{-- Modal --}}
        <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

        <div class="max-w-2xl mx-auto">

            <!-- Main modal -->
            <div id="authentication-modal" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-toggle="authentication-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>

                        {{-- Create Member Form --}}
                        <form method="post" action={{ route('members:store') }} enctype="multipart/form-data"
                            class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8">

                            @csrf

                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                Fill out form to create member
                            </h3>

                            <div>
                                <label for="fname" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                                    First Name
                                </label>
                                <input type="text" name='fname'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="first name">
                                @error('fname')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="lname" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                                    Last Name
                                </label>
                                <input type="text" name='lname'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="last name">
                                @error('lname')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="image" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                                    Upload profile pic
                                </label>
                                {{-- @if ($image)
                                    Photo Preview:
                                    <img src="{{ $image->temporaryUrl() }}">
                                @endif --}}

                                <input type="file" name='image'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                @error('image')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
        {{-- Members Table --}}
        <table class="min-w-full table-auto">
            <thead class="justify-between">
                <tr class="bg-indigo-600">
                    <th class="px-16 py-2">
                        <span class="text-indigo-50">First Name</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-indigo-50">Last Name</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-indigo-50">Image</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-indigo-50">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-gray-200">

                @foreach ($members as $member)
                    <tr class="bg-white border-4 border-gray-200 text-center">
                        <td>
                            <span class="text-center ml-2 font-semibold">{{ $member->fname }}</span>
                        </td>
                        <td>
                            <span class="text-center ml-2 font-semibold">{{ $member->lname }}</span>
                        </td>

                        <td class="px-16 py-2">
                            <span class="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h5" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M5 12l5 5l10 -10" />
                                </svg>
                            </span>
                        </td>
                        <td>
                            <div class="text-center ml-2 font-semibold">
                                <a href="{{ route('members:edit', $member->id) }}">
                                    <button>Edit</button>
                                </a>
                                |
                                <form class="inline" action="{{ route('members:destroy', $member) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

        {{-- Pagination --}}
        {{ $members->links() }}

    </div>
@endsection
