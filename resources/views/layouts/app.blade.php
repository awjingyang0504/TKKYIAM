<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>{{ config('app.name', 'TKKYIAM') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        <!-- ======= Header ======= -->
        
        <!-- /.navbar -->

        <!-- Page Content $slot  -->
        <main>
            {{$slot}}
        </main>
        <!-- show pop form -->
        @livewireScripts
        <script>
            window.addEventListener('show_submit_proposalform', function(event) {
                $('#submit_proposalform').modal('show');
            });
            window.addEventListener('hide_submit_proposalform', event => {
                $('#submit_proposalform').modal('hide');
            });
            window.addEventListener('show_submit_finalproposalform', function(event) {
                $('#submit_finalproposalform').modal('show');
            });
            window.addEventListener('hide_submit_finalproposalform', event => {
                $('#submit_finalproposalform').modal('hide');
            });
            window.addEventListener('show_update_proposalform', function(event) {
                $('#update_proposalform').modal('show');
            });
            window.addEventListener('hide_update_proposalform', event => {
                $('#update_proposalform').modal('hide');
            });
            window.addEventListener('show_read_proposalform', function(event) {
                $('#read_proposalform').modal('show');
            });
            window.addEventListener('show_delete_proposalform', function(event) {
                $('#delete_proposalform').modal('show');
            });
            window.addEventListener('hide_delete_proposalform', function(event) {
                $('#delete_proposalform').modal('hide');
            });
        </script>
        <!-- Vendor JS Files -->
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('js/main02.js') }}"></script>
    </div>
</body>

</html>