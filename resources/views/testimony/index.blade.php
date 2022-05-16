@extends('layouts.app')

@section('content')
    <div>

        {{-- Testimony Table --}}
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
                        <span class="text-indigo-50">Testimony Title</span>
                    </th>

                    <th class="px-16 py-2">
                        <span class="text-indigo-50">Testimony Content</span>
                    </th>
                </tr>
            </thead>

            <tbody class="bg-gray-200">
                @foreach ($testimonies as $testimony)
                    <tr class="bg-white border-4 border-gray-200 text-center">
                        <td>
                            <span class="text-center ml-2 font-semibold">{{ $testimony->member->fname }}</span>
                        </td>
                        <td>
                            <span class="text-center ml-2 font-semibold">{{ $testimony->member->lname }}</span>
                        </td>
                        <td>
                            <span class="text-center ml-2 font-semibold">{{ $testimony->test_title }}</span>
                        </td>
                        <td>
                            <span class="text-center ml-2 font-semibold">{{ $testimony->test_body }}</span>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{-- Pagination --}}
        {{ $testimonies->links() }}

    </div>
@endsection
