<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kasirku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">
    <link rel="icon" href="icon.ico" type="image/ico">

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- Font --}}
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- My CSS --}}
    <link rel="stylesheet" href="/css/employee.css">
</head>

<body>

    @include('components.employee.navbar')

    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mb-2 d-none d-md-block">
                <div class="card">
                    @include('components.employee.sidebar')
                </div>
            </div>
            <div class="col-md-9 mb-2">
                @yield('content')
            </div>
        </div><!-- end row -->
    </div> <!-- end container fluid -->

    <footer class="text-center mb-0 py-3">
        <p class="text-muted small mb-0">Copyright &copy; <?php echo date('Y'); ?> <a href="https://alfian-gading.com"
                style="text-decoration:none;">
                <b>Alfian Gading Saputra</b></a>. All Rights Reserved</p>
    </footer>

    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js"
        integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>

    {{-- Datatables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="/js/employee.js"></script>

</body>

</html>
