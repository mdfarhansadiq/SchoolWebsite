<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('frontend/asset/img/favicon.png') }}" type="image/png" />
    <title>Admin Site</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('backend/adminend/asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/adminend/asset/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/adminend/asset/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/adminend/asset/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/adminend/asset/vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/adminend/asset/vendors/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/adminend/asset/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/adminend/asset/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/adminend/asset/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
    <link rel="stylesheet"
        href="https://cdn.ckeditor.com/ckeditor5-premium-features/43.1.0/ckeditor5-premium-features.css" />


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    @stack('css')


</head>

<body>

    @include('backend.partial.sidebarmenu')
    <div id="right-panel" class="right-panel">
        @include('backend.partial.header')

        @yield('content')

        @include('backend.partial.footer')

    </div>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{ asset('backend/adminend/asset/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/assets/js/main.js') }}"></script>


    <script src="{{ asset('backend/adminend/asset/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/assets/js/widgets.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('backend/adminend/asset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('backend/adminend/asset/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('backend/adminend/asset/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/adminend/asset/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

    {{-- <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.1.0/",
                "ckeditor5-premium-features": "https://cdn.ckeditor.com/ckeditor5-premium-features/43.1.0/ckeditor5-premium-features.js",
                "ckeditor5-premium-features/": "https://cdn.ckeditor.com/ckeditor5-premium-features/43.1.0/"
            }
        }
    </script>
    <script type="module" src="{{ URL::asset('backend/adminend/asset/vendors/ckeditor5.js') }}"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <script>
        document.querySelectorAll('.editor').forEach((textarea) => {
            ClassicEditor
                .create(textarea)
                .catch(error => {
                    console.error(error);
                });
        });
    </script>

    @stack('js')
</body>

</html>
