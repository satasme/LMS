<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LMS Question Paper</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <!--    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">-->
    <!-- Ionicons -->
    <!--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Tempusdominus Bbootstrap 4 -->
    <!--    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">-->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/plugin/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/plugin/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
          href="{{asset('sentura-css/sentura/plugin/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/plugin/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/plugin/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Main style -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/css/main_style.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed" id="container">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark navbar-secondary">


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <img src="dist/img/avatar5.png" alt="Avatar" style="width:45px;border-radius: 50%;">
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">

                            @foreach($exam as $examObj)

                            <div class="col-sm-4 paper-card">
<!--                                <a href="{{ route('student.mcq_question',['course_id'=>3,'course_test_id'=>2,'exam_id'=>2,'papercat_id'=>4]) }}">-->
                                <a href="{{ route('student.mcq_question')}}">
                                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                                        <div class="ribbon-wrapper ribbon-xl">
                                            <div class="ribbon bg-primary text-lg">
                                                COMPLETE
                                            </div>
                                        </div>
                                        {{$examObj['Exam_title']}} <br/>
                                        <small>
                                            {{$examObj['description']}}
                                        </small>
                                    </div>
                                </a>
                            </div>

                            @endforeach

<!--                            <div class="col-sm-4 paper-card">-->
<!--                                <div class="position-relative p-3 bg-gray" style="height: 180px">-->
<!--                                    <div class="ribbon-wrapper ribbon-xl">-->
<!--                                        <div class="ribbon bg-primary text-lg">-->
<!--                                            COMPLETE-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    PAPER B <br/>-->
<!--                                    <small>It is a long established fact that a reader will be distracted by the-->
<!--                                        readable content of a page when looking at its layout. </small>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-4 paper-card">-->
<!--                                <a href="mcq_question.html">-->
<!--                                    <div class="position-relative p-3 bg-gray" style="height: 180px">-->
<!--                                        <div class="ribbon-wrapper ribbon-xl">-->
<!--                                            <div class="ribbon bg-success text-lg">-->
<!--                                                NOW-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        PAPER C <br/>-->
<!--                                        <small>It is a long established fact that a reader will be distracted by the-->
<!--                                            readable content of a page when looking at its layout. </small>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                            </div>-->
                        </div>
<!--                        <div class="row mt-4">-->
<!--                            <div class="col-sm-4 paper-card">-->
<!--                                <div class="position-relative p-3 bg-gray" style="height: 180px">-->
<!--                                    <div class="ribbon-wrapper ribbon-xl">-->
<!--                                        <div class="ribbon bg-warning text-lg">-->
<!--                                            NEXT-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    PAPER D <br/>-->
<!--                                    <small>It is a long established fact that a reader will be distracted by the-->
<!--                                        readable content of a page when looking at its layout. </small>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-4 paper-card">-->
<!--                                <div class="position-relative p-3 bg-gray" style="height: 180px">-->
<!--                                    <div class="ribbon-wrapper ribbon-xl">-->
<!--                                        <div class="ribbon bg-warning text-lg">-->
<!--                                            NEXT-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    PAPER E <br/>-->
<!--                                    <small>It is a long established fact that a reader will be distracted by the-->
<!--                                        readable content of a page when looking at its layout. </small>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-4 paper-card">-->
<!--                                <div class="position-relative p-3 bg-gray" style="height: 180px">-->
<!--                                    <div class="ribbon-wrapper ribbon-xl">-->
<!--                                        <div class="ribbon bg-warning text-lg">-->
<!--                                            NEXT-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    PAPER F <br/>-->
<!--                                    <small>It is a long established fact that a reader will be distracted by the-->
<!--                                        readable content of a page when looking at its layout. </small>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


    <!-- /.content-wrapper -->
    <!--<footer class="main-footer" style="margin: 0">-->
    <!--<strong>Copyright &copy; 2020 <a href="https://senturatechnologies.com/">Sentura Technologies (pvt) ltd</a>.</strong>-->
    <!--All rights reserved.-->
    <!--<div class="float-right d-none d-sm-inline-block">-->
    <!--<b>Version</b> 1.0.0-->
    <!--</div>-->
    <!--</footer>-->
</div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!--sweetalert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="js/app.js"></script>
</body>
</html>
