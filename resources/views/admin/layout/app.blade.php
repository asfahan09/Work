<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Home | Mantis Bootstrap 5 Admin Template</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="{{ asset('admin/assets/fonts/tabler-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/fonts/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/fonts/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/fonts/material.css') }}">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style-preset.css') }}">
  @livewireStyles

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

  @include('admin.partial.navbar')
  @include('admin.partial.sidebar')
  @yield('content')
  @include('admin.partial.footer')



   @livewireScripts
  <!-- [Page Specific JS] start -->
  <script src="{{asset('admin/assets/js/plugins/apexcharts.min.js')}}"></script>
  <script src="{{ asset('admin/assets/js/pages/dashboard-default.js') }}"></script>
  <!-- [Page Specific JS] end -->
  <!-- Required Js -->

  <script src="{{ asset('admin/assets/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/feather.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/pcoded.js') }}"></script>
  <script src="{{ asset('admin/assets/js/fonts/custom-font.js') }}"></script>





  <script>
    layout_change('light');
  </script>




  <script>
    change_box_container('false');
  </script>



  <script>
    layout_rtl_change('false');
  </script>


  <script>
    preset_change("preset-1");
  </script>


  <script>
    font_change("Public-Sans");
  </script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<!-- [Body] end -->

</html>