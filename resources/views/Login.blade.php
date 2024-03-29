<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - PERPUSTAKAAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa; /* Set background color if needed */
        }

        .form-signin {
            max-width: 330px;
            padding: 2rem; /* Increase padding to move the form down */
        }
    </style>
</head>

<body>

    <div class="card mb-6">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://d21i32s81s58f.cloudfront.net/wp-content/uploads/2019/02/shutterstock_794015686-1.jpg" class="img-fluid rounded-start" alt="...">
          </div>

    <main class="form-signin">
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            
            <h1 class="h3 mb-3 fw-normal">Enter Your Data</h1>

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="floatingInput">ID</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
