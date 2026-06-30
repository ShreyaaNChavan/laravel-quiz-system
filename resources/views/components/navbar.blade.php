<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-2xl font-bold text-blue-600">
            Quiz System
        </h1>

        <div class="flex items-center space-x-8">

            <a href="/dashboard" class="text-gray-700 hover:text-blue-600 transition">
                Dashboard
            </a>

            <a href="/admin-categories" class="text-gray-700 hover:text-blue-600 transition">
                Categories
            </a>

            <a href="#" class="text-gray-700 hover:text-blue-600 transition">
                Quiz
            </a>

            <span class="text-gray-700 font-medium">
                Welcome,
                <span class="text-blue-600">{{ $name }}</span>
            </span>

            <a href="/admin-logout" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                Logout
            </a>

        </div>

    </div>
</nav>