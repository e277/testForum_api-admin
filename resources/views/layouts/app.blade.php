<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <livewire:styles />

</head>

<body>

    <div class="min-h-screen flex">


        @include('layouts.sidebar')


        <div class="bg-indigo-50 flex-grow py-12 px-10">
            <div class="flex justify-between">
                <div>
                    <h4 class="text-sm font-bold text-indigo-600">Hi Admin,</h4>

                </div>
                <div>
                    <div class="flex items-center border rounded-lg bg-white w-max py-2 px-4 space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input class="outline-none" type="text" placeholder="Search" />
                    </div>
                </div>
            </div>

            <div>
                <div class="flex space-x-4">

                    <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                        <div>
                            <span class="text-sm font-semibold text-gray-400">Members</span>
                            <h1 class="text-2xl font-bold">{{ $memberCount }}</h1>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                        <div>
                            <span class="text-sm font-semibold text-gray-400">Testimonial</span>
                            <h1 class="text-2xl font-bold">{{ $testimonyCount }}</h1>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex mt-10 justify-center">

                    @yield('content')
                </div>

            </div>
        </div>
    </div>

    <livewire:scripts />

    @include('sweetalert::alert')

</body>

</html>
