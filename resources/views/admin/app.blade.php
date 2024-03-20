<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') | Hospital </title>
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <link rel="stylesheet" href="/css/flexboxgrid.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

    <header id="main-header">
        <div class="container">
            <div class="row end-sm end-md end-lg center-xs middle-xs middle-sm middle-md middle-lg">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <h1> <span class="pt"> Pharmacy</span>MS</h1>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <nav id="navbar">
                        <ul>
                            <li> <a class="current" href="/">Home</a></li>
                            <li> <a href="/category">Category</a></li>
                            <li> <a href="/doctors">Doctors</a></li>
                            <li> <a href="/patience">Patience</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </header>
        <div id="" class="overlay2 d-none">
            <div class="spinner-border text-primary" role="status">
                <span class="shu-loader"></span>
            </div>
        </div>



    @yield('content')

    <section id="company" class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <h4>Contact Us</h4>
                <ul>
                    <li><i class="fa fa-phone"></i> +2348140419490</li>
                    <li><i class="fa fa-envelope"></i> support@apptheme.com</li>
                    <li><i class="fa fa-map"></i> Keffi Nassarawa state</li>
                </ul>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <h4>About Us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit minima ipsum, atque ratione magnam molestiae illo? Eligendi excepturi aut rerum quia velit illo libero itaque neque, placeat, delectus nesciunt tempora!</p>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="/category">Category</a></li>
                        <li><a href="/product">Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->
<section id="main-footer">
    <div class="container">
        <div class="row center-xs center-sm center-md center-lg">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p> Copyright &copy; 2024 | PharmacyMS Develope by Shuraih Usman : Laravel v11.0.7 (PHP v8.2.12)</p>
            </div>
        </div>
    </div>
    </section>

    <script src="/js/jquery-3.6.4.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/sweetalert.js"></script>
    <script src="/vendor/DataTables/datatables.min.js"></script>
    <script src="/js/app.js"></script>
    
</body>
</html>