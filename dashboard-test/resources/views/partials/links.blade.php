<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title> MarketPro - E-commerce HTML Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/pages/images/logo/favicon.png') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/pages/css/bootstrap.min.css') }}">
    <!-- select 2 -->
    <link rel="stylesheet" href="{{ asset('assets/pages/css/select2.min.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('assets/pages/css/slick.css') }}">
    <!-- Wow -->
    <link rel="stylesheet" href="{{ asset('assets/pages/css/jquery-ui.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/pages/css/main.css') }}">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->

    @include('partials.search')

    <script>
        document.addEventListener('click', function(e) {
        if (!document.getElementById('search-input').contains(e.target)) {
            document.getElementById('search-results').classList.add('d-none');
        }
    });
    </script>