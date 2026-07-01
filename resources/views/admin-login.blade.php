<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

 
<body class="min-h-screen bg-linear-to-br from-blue-100 via-white to-indigo-100 flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        <!-- Login Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-blue-600 py-8 px-6 text-center">

                <div class="mx-auto w-16 h-16 rounded-full bg-white flex items-center justify-center shadow-lg">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8 text-blue-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5.121 17.804A9 9 0 1118.364 4.56M15 11a3 3 0 11-6 0 3 3 0 016 0zm-3 7a7 7 0 00-5.468 2.633"/>

                    </svg>

                </div>

                <h1 class="text-3xl font-bold text-white mt-4">
                    Admin Login
                </h1>

                <p class="text-blue-100 mt-2">
                    Welcome back! Please login to continue.
                </p>

            </div>

            <!-- Form -->
            <div class="p-8">

                @error('user')
                    <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl">
                        {{ $message }}
                    </div>
                @enderror

                <form action="/admin-login" method="POST" class="space-y-5">

                    @csrf

                    <!-- Username -->
                    <div>

                        <label for="name" class="block text-gray-700 font-medium mb-2">
                            Admin Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter Admin Name"
                            value="{{ old('name') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">

                        @error('name')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Password -->
                    <div>

                        <label for="password" class="block text-gray-700 font-medium mb-2">
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter Password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">

                        @error('password')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Login Button -->
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition duration-300">

                        Login

                    </button>

                </form>

            </div>

        </div>

        <!-- Footer -->
        <p class="text-center text-gray-500 text-sm mt-6">
            Quiz Management System • Admin Panel
        </p>

    </div>

</body>

</html>