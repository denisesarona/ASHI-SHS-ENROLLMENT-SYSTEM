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
<body>
    <body class="bg-blue-500">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      @if (session('success'))
        <div class="alert alert-success" style="background-color: #28a745; color: white; border-color: #28a745;">
          {{ session('success') }}
        </div>
      @endif

      <section class="py-16  shadow-lg w-full flex items-center h-screen text-center">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-4xl font-bold text-white">ADMIN LOGIN</h2> 
            <div class="mt-6">
              <form action="">
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn w-100">Login</button>
                <div class="signup-link mt-3">
                    <p>Don't have an account? <a href="">Sign up here</a></p>
                </div>
            </form>
            </div>
        </div>
    </section>
</body>
</html>