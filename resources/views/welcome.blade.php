<!doctype html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Biomed</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>




    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" /> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />



    <link rel="stylesheet" href="{{ asset('vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
   
    
    <script src="{{ asset('vendor/js/helpers.js')}}"></script>
    <script src="{{ asset('js/config.js') }}"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</head>

<body class="antialiased">

    <main class="py-4">
        <div id="app">
        </div>
    </main>

</body>

</html>
<script src="{{ asset('/js/app.js') }}"></script>
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/js/menu.js') }}"></script>

<script type="text/javascript" src="{{URL::asset('vendor/js/menu.js')}}"></script>


<script src="{{ asset('vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/dashboards-analytics.js') }}"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuElement = document.querySelector('.menu'); // Adjust selector if necessary
            if (menuElement) {
                new Menu(menuElement, {
                    animate: true,
                    accordion: true,
                    closeChildren: true,
                });
            }
        });
    </script>
</body>
</html>