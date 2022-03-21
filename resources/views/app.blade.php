<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>AdminLTE</title>
    <!-- Favicon icon -->
    <!--link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png"-->
    <!-- Pignose Calender -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
 <!-- <link href="{{asset('assets/vuetify/vuetify.css')}}" rel="stylesheet" />
       <link href="{{asset('assets/vuetify/vuetify_icons.min.css')}}" rel="stylesheet"> -->
<style type="text/css"> 
.botao-primary {
  background-color: #007bff !important;
  color: white !important;
}
.botao-danger {
  background-color: #dc3545 !important;
  color: white !important;
}
.botao-default-danger:hover {
  background-color: #dc3545 !important;
  color: white !important;
}
.botao-default-primary:hover {
  background-color: #007bff !important;
  color: white !important;
}
</style>
</head>

<body >

   @inertia

   <script type="text/javascript">
  const base_url=window.origin;
  window.Laravel = {!! json_encode([
   'csrfToken' => csrf_token()
  ])
  !!};

  
</script>
   <script src="{{ mix('/js/app.js') }}" defer></script>
   <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

 
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->
<!-- <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>

<script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>  -->
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!--script src="{{asset('assets/admin/dist/js/demo.js')}}"></script-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script> -->
</body>

</html>