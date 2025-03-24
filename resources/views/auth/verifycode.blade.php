<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-blue-600 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg text-center">
        <div class="flex justify-start">
          <a href="{{ route('forgotpassword') }}"><i class='bx bx-arrow-back text-gray-500 text-2xl font-bold'></i></a>
        </div>
        <h2 class="text-2xl font-bold text-black">Verify Code</h2> 
        <div class="mt-6">
            <form action="">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div class="relative">
                        <input type="text" class="block w-full p-3 border rounded" placeholder="Enter code">
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 mt-4">SUBMIT</button>
            </form>
        </div>
    </div>
</body>
</html>
