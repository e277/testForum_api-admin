<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="py-6">
        <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 bg-cover"
                style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')">
            </div>
            <div class="w-full p-8 lg:w-1/2">

                <p class="text-xl text-gray-600 text-center">Create an Account</p>

                <form action="{{ route('register.store') }}" method="post">
                    @csrf

                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                        <input
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="text" name="name" placeholder="Username..." value={{ old('name') }}>

                        @if ($errors->has('name'))
                            <span class="text-red-600">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                        <input
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="email" name="email" placeholder="Email..." value={{ old('email') }}>

                        @if ($errors->has('email'))
                            <span class="text-red-600">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Paasowrd</label>
                        <input
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="password" name="password" placeholder="********">

                        @if ($errors->has('password'))
                            <span class="text-red-600">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="mt-8">
                        <button
                            class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Register</button>
                    </div>
                </form>

                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 md:w-1/4"></span>
                    <a href="{{ route('login.index') }}" class="text-xs text-gray-500 uppercase">or login</a>
                    <span class="border-b w-1/5 md:w-1/4"></span>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
