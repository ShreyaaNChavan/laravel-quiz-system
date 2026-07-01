<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quiz List</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <x-navbar :name="$name" />

    <div class="max-w-6xl mx-auto mt-10">

        <!-- Header Card -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">

            <div class="flex justify-between items-center">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $category }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Total Quizzes :
                        <span class="text-blue-600 font-semibold">
                            {{ count($quizData) }}
                        </span>
                    </p>

                </div>

                <a href="/admin-categories"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg transition">
                    ← Back
                </a>

            </div>

        </div>

        <!-- Quiz Table -->

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">

            <table class="w-full">

                <thead class="bg-blue-500 text-white">

                    <tr>

                        <th class="text-left p-4 w-24">
                            #
                        </th>

                        <th class="text-left p-4">
                            Quiz Name
                        </th>

                        <th class="text-center p-4 w-40">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($quizData as $item)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="p-4 font-semibold text-gray-700">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4 font-medium text-gray-700">
                                {{ $item->name }}
                            </td>

                            <td class="p-4">

                                <div class="flex justify-center">

                                    <a href="/show-quiz/{{ $item->id }}"
                                        class="text-blue-500 hover:text-blue-700 transition" title="View Quiz">

                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="currentColor">

                                            <path
                                                d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z" />

                                        </svg>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="text-center py-10 text-gray-500">

                                No quizzes available for this category.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>