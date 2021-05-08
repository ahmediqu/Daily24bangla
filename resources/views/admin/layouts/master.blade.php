<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->
    <title> Devcity BD </title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/plugins/morris/morris.css') }}">
    <!--        For datatable -->
    <!-- DataTables -->
    <link href="{{ url('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ url('admin/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="{{ url('admin/assets/plugins/datatables/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{url('editor/summernote.css')}}" rel="stylesheet" type="text/css" />

    <!-- Advance form -->
    <!-- Plugins css-->
    <link href="{{ url('admin/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{ url('admin/assets/plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Switchery css -->
    <link href="{{ url('admin/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link href="{{ url('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- App CSS -->
    <link href="{{ url('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Modernizr js -->
    <script src="{{ url('admin/assets/js/modernizr.min.js') }}"></script>

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ url('admin/dashboard') }}" class="logo">
                <i class="zmdi zmdi-group-work icon-c-logo"></i>
                <span>News Portal</span></a>
        </div>

        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item">
                    <a href="{{ url('/') }}" target="_blank">Website</a>
                </li>


                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                       href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small>Welcome ! {{ Auth::user()->name }}</small></h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                        </a>


                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="zmdi zmdi-power"></i> <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="zmdi zmdi-menu"></i>
                    </button>
                </li>
                <li class="hidden-mobile app-search">
                    <form role="search" class="">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>

        </nav>

    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    <li class="text-muted menu-title">Navigation</li>

                    <li class="has_sub">
                        <a href="{{ url('admin/dashboard') }}" class="waves-effect"><span> Dashboard </span> </a>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i>
                            <span> Category </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('categories.create') }}">Add Category</a></li>
                            <li><a href="{{ route('categories.index') }}">List Category</a></li>

                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i>
                            <span> News </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('posts.create') }}">Add Posts</a></li>
                            <li><a href="{{ route('posts.index') }}">List of Posts</a></li>

                        </ul>
                    </li>


                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                @yield('admin-content')


            </div> <!-- container -->

        </div> <!-- content -->


    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    <!-- Right Sidebar -->
    <div class="side-bar right-bar">
        <div class="nicescroll">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a href="#home-2" class="nav-link active" data-toggle="tab" aria-expanded="false">
                        Activity
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#messages-2" class="nav-link" data-toggle="tab" aria-expanded="true">
                        Settings
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="home-2">
                    <div class="timeline-2">
                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">5 minutes ago</small>
                                <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong>
                                </p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">30 minutes ago</small>
                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus
                                        ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">59 minutes ago</small>
                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#"
                                                                                                    class="text-success">John
                                        Doe</a>.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus
                                        ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">1 hour ago</small>
                                <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">3 hours ago</small>
                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus
                                        ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">5 hours ago</small>
                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#"
                                                                                                    class="text-success">John
                                        Doe</a>.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus
                                        ut tincidunt euismod. "</em></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="messages-2">

                    <div class="row m-t-10">
                        <div class="col-8">
                            <h5 class="m-0">Notifications</h5>
                            <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                        </div>
                        <div class="col-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a"
                                   data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-10">
                        <div class="col-8">
                            <h5 class="m-0">API Access</h5>
                            <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                        </div>
                        <div class="col-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a"
                                   data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-10">
                        <div class="col-8">
                            <h5 class="m-0">Auto Updates</h5>
                            <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                        </div>
                        <div class="col-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a"
                                   data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-10">
                        <div class="col-8">
                            <h5 class="m-0">Online Status</h5>
                            <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                        </div>
                        <div class="col-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a"
                                   data-size="small"/>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end nicescroll -->
    </div>
    <!-- /Right-bar -->

    <footer class="footer">
        2016 - 2021 © Devcity BD.
    </footer>

</div>
<!-- END wrapper -->


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ url('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('admin/assets/js/detect.js') }}"></script>
<script src="{{ url('admin/assets/js/fastclick.js') }}"></script>
<script src="{{ url('admin/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ url('admin/assets/js/waves.js') }}"></script>
<script src="{{ url('admin/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ url('admin/assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ url('admin/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ url('admin/assets/plugins/switchery/switchery.min.js') }}"></script>

<!--Morris Chart-->
<script src="{{ url('admin/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ url('admin/assets/plugins/raphael/raphael.min.js') }}"></script>

<!-- Counter Up  -->
<script src="{{ url('admin/assets/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('admin/assets/plugins/counterup/jquery.counterup.js') }}"></script>

<!-- Page specific js -->
<script src="{{ url('admin/assets/pages/jquery.dashboard.js') }}"></script>

<!-- App js -->
<script src="{{ url('admin/assets/js/jquery.core.js') }}"></script>
<script src="{{ url('admin/assets/js/jquery.app.js') }}"></script>
<!-- Advance form -->
<script src="{{url('admin/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{url('admin/assets/plugins/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{url('admin/assets/plugins/jquery-quicksearch/jquery.quicksearch.js')}}"></script>
<script src="{{url('admin/assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{url('admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>

<!-- Autocomplete -->
<script src="{{url('admin/assets/plugins/autocomplete/jquery.mockjax.js')}}"></script>
<script src="{{url('admin/assets/plugins/autocomplete/jquery.autocomplete.min.js')}}"></script>
<script src="{{url('admin/assets/plugins/autocomplete/countries.js')}}"></script>
<script src="{{url('admin/assets/pages/jquery.autocomplete.init.js')}}"></script>

<script src="{{url('admin/assets/pages/jquery.formadvanced.init.js')}}"></script>
<!-- for datatable -->
<!-- Required datatable js -->
<script src="{{ url('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{ url('admin/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('admin/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ url('admin/assets/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{ url('admin/assets/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{ url('admin/assets/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{ url('admin/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{ url('admin/assets/plugins/datatables/buttons.print.min.js')}}"></script>

<!-- Key Tables -->
<script src="{{ url('admin/assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{ url('admin/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('admin/assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

<!-- Selection table -->
<script src="{{ url('admin/assets/plugins/datatables/dataTables.select.min.js')}}"></script>

<script src="{{url('editor/summernote.js')}}"></script>
<script>
    $(document).ready(function () {

        // Default Datatable
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });

        // Key Tables

        $('#key-table').DataTable({
            keys: true
        });

        // Responsive Datatable
        $('#responsive-datatable').DataTable();

        // Multi Selection Datatable
        $('#selection-datatable').DataTable({
            select: {
                style: 'multi'
            }
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
    $(document).ready(function () {
        $('.summernote').summernote();
    });
</script>
</body>
</html>
