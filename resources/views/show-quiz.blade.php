<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quiz MCQs</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <x-navbar :name="$name" />

    <div class="max-w-6xl mx-auto mt-10 px-6">

        <!-- Header -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">

            <div class="flex justify-between items-center">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $quizName }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Total MCQs:
                        <span class="font-semibold text-blue-600">
                            {{ count($mcqs) }}
                        </span>
                    </p>
                </div>

                <a href="/add-quiz"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg transition">
                    ← Back
                </a>

            </div>

        </div>

        <!-- MCQ Table -->

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">

            <table class="w-full">

                <thead class="bg-blue-500 text-white">

                    <tr>

                        <th class="p-4 text-left w-24">
                            ID
                        </th>

                        <th class="p-4 text-left">
                            Question
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($mcqs as $mcq)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="p-4 font-semibold text-gray-700">
                                {{ $mcq->id }}
                            </td>

                            <td class="p-4 text-gray-700">
                                {{ $mcq->question }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="2" class="text-center p-10 text-gray-500">

                                No MCQs Found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>