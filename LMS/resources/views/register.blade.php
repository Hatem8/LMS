<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Evara Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/imgs/theme/favicon.svg">
    <!-- Template CSS -->
    <link href="admin/assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <main>
        <header class="main-header style-2 navbar">
            <div class="col-brand">
                <a href="index.html" class="brand-wrap">
                    <img src="admin/assets/imgs/theme/logo.svg" class="logo" alt="Evara Dashboard">
                </a>
            </div>
            <div class="col-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="#">
                            <i class="material-icons md-notifications animation-shake"></i>
                            <span class="badge rounded-pill">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                            <a class="dropdown-item text-brand" href="#"><img src="admin/assets/imgs/theme/flag-us.png" alt="English">English</a>
                            <a class="dropdown-item" href="#"><img src="admin/assets/imgs/theme/flag-fr.png" alt="Français">Français</a>
                            <a class="dropdown-item" href="#"><img src="admin/assets/imgs/theme/flag-jp.png" alt="Français">日本語</a>
                            <a class="dropdown-item" href="#"><img src="admin/assets/imgs/theme/flag-cn.png" alt="Français">中国人</a>
                        </div>
                    </li>

                </ul>
            </div>
        </header>
        <section class="content-main mt-80 mb-80">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Register</h4>
                    <form action = "{{route('register_user')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" name="email" placeholder="Email" type="text" value="{{ old("email") }}">
                            @error('email')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control" name="name" placeholder="name" type="text" value="{{ old("name") }}">
                            @error('name')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div> <!-- form-group// -->
                        <input class="hidden" name="role" value="student">
                        <div class="mb-3">
                            <input class="form-control" name="password" placeholder="Password" type="password">
                            @error('password')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control" name="confirmPassword" placeholder="Confirm Password" type="password">
                            @error('confirmPassword')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div> <!-- form-group// -->



                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100"> Register </button>
                        </div> <!-- form-group// -->
                    </form>

        </section>
        <footer class="main-footer text-center">
            <p class="font-xs">
                <script>
                document.write(new Date().getFullYear())
                </script> ©, Evara - HTML Ecommerce Template .
            </p>
            <p class="font-xs mb-30">All rights reserved</p>
        </footer>
    </main>
    <script src="admin/assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="admin/assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/js/vendors/jquery.fullscreen.min.js"></script>
    <!-- Main Script -->
    <script src="admin/assets/js/main.js" type="text/javascript"></script>
</body>

</html>
