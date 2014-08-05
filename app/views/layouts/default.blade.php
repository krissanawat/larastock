<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8" />
        <title>
            @section('title')
             Popsport Stock Manager
            @show
        </title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         


        <!-- bootstrap -->
        <link href="{{ asset('assets/css/bootstrap/bootstrap.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/bootstrap/bootstrap-overrides.css') }}" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap-timepicker.min.css')}}" type="text/css" media="screen" />


        <!-- libraries -->
        <link href="{{ asset('assets/css/lib/uniform.default.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/lib/select2.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('assets/css/lib/bootstrap.datepicker.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('assets/css/lib/font-awesome.css') }}" type="text/css" rel="stylesheet" />
        <link href="{{ asset('assets/css/bootstrap.icon-large.css') }}" type="text/css" rel="stylesheet" />
        <link href="{{ asset('assets/css/colorpicker.css') }}" type="text/css" rel="stylesheet" />
        <link href="{{ asset('assets/css/ladda.min.css') }}" type="text/css" rel="stylesheet" />
        <!-- global styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/compiled/layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/compiled/elements.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/compiled/icons.css') }}">


        <!-- this page specific styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/compiled/index.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{ asset('assets/css/compiled/user-list.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{ asset('assets/css/compiled/user-profile.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{ asset('assets/css/compiled/form-showcase.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery.dataTables.css') }}" type="text/css" media="screen" />

        {{ HTML::style('assets/css/chosen.min.css')}}
        {{ HTML::style('assets/css/bootstrap-spinner.css')}}


    </script>
    <!-- open sans font -->
    <!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'> -->

    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @section('styles')
    <style>

        h3 {
            padding: 10px;
        }
        .modal {
            position: fixed;
            right: o;
            top: 40px;
        }

        .input-group[class*="col-"] {
            padding-right: 15px;
            padding-left: 15px;
        }	
        a.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
    @stop

</head>

<body>
    <!-- navbar -->
<center><h1>ระบบจัดการสต๊อก ร้านป็อบสปอร์ต</h1></center>

    <!-- navbar -->
    <header class="navbar nac-inverse" role="banner">

        <div class="navbar nac-inverse ">
            <div class="navbar-inner ">
                <div class="navbar-header">

                </div>

                <ul class="nav navbar-nav nac-inverse pull-right hidden-xs">

                    @if(Sentry::check()) 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                            ยินดีต้อนรับ,{{ Sentry::getUser()->first_name }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">


                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="icon-off"></i>
                                    ออกจากระบบ
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif               

                </ul>

            </div>
        </div>
    </header>
    <!-- end navbar -->

        <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">

            <li{{ (Request::is('unit/*') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ route('unit') }}">
                    <i class="icon-large icon-truck"></i>
                    <span>กำหนดหน่วยนับ</span>
                    <i class="icon-large icon-truck"></i>
                </a>

               
            </li>
      <li{{ (Request::is('fixstock/*') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ route('fixstock') }}">
                    <i class="icon-large icon-cargo"></i>
                    <span>กำหนดหน่วยนับ</span>
                    <i class="icon-large icon-cargo"></i>
                </a>

               
            </li>
     <li{{ (Request::is('user/*') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ route('user') }}">
                    <i class="icon-large icon-user"></i>
                    <span>จัดการพนักงาน</span>
                </a>

               
            </li>
            

        </ul>
    </div>
    <!-- end sidebar -->



    <!-- main container -->
    <div class="content">

       



        <div id="pad-wrapper">


            <!-- Notifications -->
            @include('layouts.notifications')

            <!-- Content -->
            @yield('content')

        </div>
        <div class="modal fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"></h4></div>
                    <div class="modal-body">
                        กรุณายืนยันการลบครับ
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        <a class="btn btn-danger" id="dataConfirmOK">ตกลง</a>
                    </div>
                </div>
            </div>
        </div>
    
</div>



<!-- end main container -->
<script src="{{ asset('assets/js/jquery-1.10.2.min.js') }}"></script>
<!-- scripts -->
<script src="{{ asset('assets/js/moment-with-lang.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/spin.js') }}"></script>
<script src="{{ asset('assets/js/ladda.js') }}"></script>

<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.uniform.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.datetimepicker.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.datetimepicker.th.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('assets/js/inputmask.js') }}"></script>
<script src="{{ asset('assets/js/tinymce.min.js') }}"></script>
{{ HTML::script('assets/js/chosen.jquery.min.js')}}
{{ HTML::script('assets/js/jquery.spinner.js')}}
<script type="text/javascript">


        $(document).ready(function() {

        tinymce.init({
        selector: ".tinymce",
                menubar : false
        });
        $('.chosen-select').chosen();
        function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}
        @yield('specific_script')
      
        $('.time-picker').datetimepicker({
        icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
        pickDate: false,
        language:'th'
        });
        $('#example').dataTable({
"sPaginationType": "full_numbers",
        "iDisplayLength": 10,
        "aLengthMenu": [[10, - 1],
            [10, "All"]]
});
        $('#nosorting').dataTable({
        "sPaginationType": "full_numbers",
        "fnSort": [1, 'asc'],
        "aoColumns": [
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false }
        ],
        "iDisplayLength": 10,
        "aLengthMenu": [
                [10, - 1],
                [10, "All"]
        ]});
        // add uniform plugin styles to html elements
        $("input:checkbox, input:radio").uniform();
        // datepicker plugin
        $('.datepicker').datetimepicker({
            icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    },
              pickTime: false,
               language:'th'
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
            });
        // select2 plugin for select elements
      
            
       
});

</script>






</body>
</html>
