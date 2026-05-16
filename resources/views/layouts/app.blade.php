<!DOCTYPE html>
<html>

<head>

    <title>Product Management</title>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand"
           href="{{ route('products.index') }}">

            Product Management

        </a>

        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">

                @auth

                    <li class="nav-item me-3 mt-2 text-white">

                        Welcome,
                        {{ auth()->user()->name }}

                    </li>

                    <li class="nav-item">

                        <form action="{{ route('logout') }}"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    class="btn btn-danger btn-sm">

                                Logout

                            </button>

                        </form>

                    </li>

                @else

                    <li class="nav-item me-2">

                        <a href="{{ route('login') }}"
                           class="btn btn-primary btn-sm">

                            Login

                        </a>

                    </li>

                    <li class="nav-item">

                        <a href="{{ route('register') }}"
                           class="btn btn-success btn-sm">

                            Register

                        </a>

                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<div class="container mt-4">

    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    {{-- Error Message --}}
    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    @yield('content')

</div>

</body>

</html>