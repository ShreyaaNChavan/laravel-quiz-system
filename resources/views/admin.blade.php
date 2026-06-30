<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-2xl font-bold text-blue-600">
                Quiz System
            </h1>

            <div class="flex items-center space-x-8">

                <a href="#" class="text-gray-700 hover:text-blue-600 transition">
                    Categories
                </a>

                <a href="#" class="text-gray-700 hover:text-blue-600 transition">
                    Quiz
                </a>

                <span class="text-gray-700 font-medium">
                    Welcome,
                    <span class="text-blue-600">{{ $name }}</span>
                </span>

                <a href="#" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    Logout
                </a>

            </div>

        </div>
    </nav>

    <!-- Dashboard -->
    <div class="max-w-7xl mx-auto mt-10 px-6">

        <div class="bg-white rounded-xl shadow-lg p-8">

            <h2 class="text-3xl font-bold text-gray-800 mb-3">
                Admin Dashboard
            </h2>

            <p class="text-gray-600">
                Welcome back,
                <span class="font-semibold text-blue-600">{{ $name }}</span>.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

                <div class="bg-blue-500 text-white rounded-xl p-6 shadow">
                    <h3 class="text-lg font-semibold">Categories</h3>
                    <p class="text-4xl mt-3">0</p>
                </div>

                <div class="bg-green-500 text-white rounded-xl p-6 shadow">
                    <h3 class="text-lg font-semibold">Quizzes</h3>
                    <p class="text-4xl mt-3">0</p>
                </div>

                <div class="bg-purple-500 text-white rounded-xl p-6 shadow">
                    <h3 class="text-lg font-semibold">Users</h3>
                    <p class="text-4xl mt-3">0</p>
                </div>

            </div>

        </div>

    </div>

</body>
</html>