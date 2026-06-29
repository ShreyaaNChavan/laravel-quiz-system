<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">

        <h2 class="text-2xl text-center text-gray-800 mb-6">
            Admin Login
        </h2>

        <form action="" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="text-gray-600 mb-1 block">
                    Admin Name
                </label>

                <input type="text" id="name" name="name" placeholder="Enter Admin name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>

            <div>
                <label for="password" class="text-gray-600 mb-1 block">
                    Password
                </label>

                <input type="password" id="password" name="password" placeholder="Enter Admin password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white rounded-xl px-4 py-2 hover:bg-blue-600">
                Login
            </button>

        </form>

    </div>

</body>

</html>