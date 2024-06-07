<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', config('app.name'))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.1.2/dist/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery (required by Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('css')
    <script>
        window.APP = < ? php echo json_encode([
            'currency_symbol' => config('settings.currency_symbol'), 'warning_quantity' => config(
                'settings.warning_quantity')
        ]) ? >
    </script>
    <style>
        .form-control {
            border-radius: 0px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('content-header')</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            @yield('content-actions')
                        </div><!-- /.col -->
                    </div>
                </div><!-- /.container-fluid -->
            </section <!-- Main content -->
            <section class="content">
                @include('layouts.partials.alert.success')
                @include('layouts.partials.alert.error')
                @yield('content')
            </section>

        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div <!-- ./wrapper -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('select2-4.1.0-beta.0/dist/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({});
        });
    </script>
    <script>
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: "Are you sure?"
                    // , text: "You won't be able to revert this!"
                    ,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "OK!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.delete-button').on('click', function(e) {
                var transactionId = $(this).data('transaction-id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#deleteForm' + transactionId).submit();
                    }
                });
            });
        });
    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'green',
            customClass: {
                popup: "colored-toast {{ config('app.dark_mode') == 1 ? 'dark-colored-toast' : '' }}"
            },
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
        });

        @if (Session::get('success'))
            Toast.fire({
                icon: 'success',
                title: `{{ Session::get('success') }}`,
                // message: ,
            });
        @endif
        @if (Session::get('error'))
            Toast.fire({
                icon: 'error',
                title: `{{ Session::get('error') }}`,
                // message: ,
            });
        @endif
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dashboardSwitch = document.getElementById('checked_all');
            var userSwitches = document.querySelectorAll('.custom-control-input');

            dashboardSwitch.addEventListener('change', function() {
                var dashboardState = this.checked;
                userSwitches.forEach(function(switchElement) {
                    switchElement.checked = dashboardState;
                });
            });
        });
    </script>
    @yield('js')
</body>

</html>
