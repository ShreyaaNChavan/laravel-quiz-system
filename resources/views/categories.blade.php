<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <x-navbar :name="$name"></x-navbar>

    @if(session('category'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="max-w-7xl mx-auto mt-6 px-6">

            <div class="bg-green-500 text-white px-5 py-3 rounded-lg shadow-md">
                {{ session('category') }}
            </div>

        </div>
    @endif


    <!-- Add Category Form -->
    <div class="flex justify-center pt-10">

        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">

            <h2 class="text-2xl text-center mb-6">
                Add Category
            </h2>

            <form action="/add-category" method="POST" class="space-y-4">

                @csrf

                <input type="text" name="category" placeholder="Enter category name"
                    class="w-full px-4 py-2 border rounded-xl">

                @error('category')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl">
                    Add
                </button>

            </form>

        </div>

    </div>


    <!-- Category Table -->

    <div class="max-w-6xl mx-auto mt-10">

        <h1 class="text-3xl text-blue-500 font-semibold mb-4">
            Category List
        </h1>

        <table class="w-full bg-white shadow rounded-lg overflow-hidden">

            <thead class="bg-gray-200">

                <tr>

                    <th class="text-left p-3">S. No</th>
                    <th class="text-left p-3">Name</th>
                    <th class="text-left p-3">Creator</th>
                    <th class="text-center p-3">Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($categories as $category)

                    <tr class="border-b even:bg-gray-100 hover:bg-gray-50">

                        <td class="p-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-3">
                            {{ $category->name }}
                        </td>

                        <td class="p-3">
                            {{ $category->creator }}
                        </td>

                        <td class="text-center p-3">

                            <form action="/category/delete/{{ $category->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <span class="material-icons">delete</span>
                                </button>
                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</body>

</html>