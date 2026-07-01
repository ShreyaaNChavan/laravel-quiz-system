<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Categories</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <x-navbar :name="$name" />

    <!-- Success Message -->
    @if(session('category'))
        <div class="max-w-6xl mx-auto mt-6">
            <div class="bg-green-100 border-l-4 border-green-600 text-green-800 px-5 py-3 rounded-lg shadow">
                {{ session('category') }}
            </div>
        </div>
    @endif

    <div class="max-w-6xl mx-auto mt-8">

        <!-- Add Category Card -->

        <div class="bg-white rounded-xl shadow-lg p-8 mb-10">

            <h2 class="text-3xl font-bold text-gray-800 mb-6">
                Add Category
            </h2>

            <form action="/add-category" method="POST" class="space-y-4">

                @csrf

                <div>

                    <input type="text" name="category" placeholder="Enter Category Name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    @error('category')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-xl shadow transition">

                    Add Category

                </button>

            </form>

        </div>

        <!-- Category List -->

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">

            <div class="flex justify-between items-center px-6 py-5 border-b">

                <h2 class="text-2xl font-bold text-gray-800">
                    Category List
                </h2>

                <span class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm">
                    Total: {{ count($categories) }}
                </span>

            </div>

            <table class="w-full">

                <thead class="bg-blue-500 text-white">

                    <tr>

                        <th class="text-left p-4 w-20">
                            #
                        </th>

                        <th class="text-left p-4">
                            Category
                        </th>

                        <th class="text-left p-4">
                            Creator
                        </th>

                        <th class="text-center p-4">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="p-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4 font-medium">
                                {{ $category->name }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $category->creator }}
                            </td>

                            <td class="p-4">

                                <div class="flex justify-center gap-4">

                                    <!-- Delete -->

                                    <form action="/category/delete/{{ $category->id }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-red-500 hover:text-red-700 transition"
                                            title="Delete">

                                            <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960"
                                                width="22px" fill="currentColor">
                                                <path
                                                    d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336Z" />
                                            </svg>

                                        </button>

                                    </form>

                                    <!-- View Quizzes -->

                                    <a href="/quiz-list/{{ $category->id }}/{{ $category->name }}"
                                        class="text-blue-500 hover:text-blue-700 transition" title="View Quizzes">

                                        <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960"
                                            width="22px" fill="currentColor">
                                            <path
                                                d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z" />
                                        </svg>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center p-10 text-gray-500">

                                No Categories Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>