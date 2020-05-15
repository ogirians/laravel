<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Business Owner Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/libs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/libsstyle.css') }}" rel="stylesheet">
    {{--<script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>--}}

     <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="/vendor/jquery/jquery.min.js"></script>

    @yield('styles')
 
<?php
$p = 0;
?>

<?
$i = 1;

?>

 <?
    $location = "Tritan";
 ?>



<script type="text/javascript">

function kualitas(angka) {
        if (angka >= 90 && angka <= 100 ) {
            var str = "A" ;
            var clr = str.fontcolor("green");
            return clr
        }

        if (angka >= 70 && angka <= 89 ) {
            var str = "B" ;
            var clr = str.fontcolor("#0066ff");
            return clr
        }

        if (angka >= 50  && angka <= 69 ) {
            var str = "C" ;
            var clr = str.fontcolor("#ffcc00");
            return clr
        }

        if (angka >= 30  && angka <= 49 ) {
             var str = "D" ;
            var clr = str.fontcolor("#ff3300");
            return clr;
        }

        if (angka >= 20  && angka <= 29 ) {
            var str = "D" ;
            var clr = str.fontcolor("#660000");
            return clr;
        }


        if (angka <= 19  ) {
            return "parah sih parah";
        }

    };
</script>

</head>



<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{url('/')}}" class="site_title"><i class="fa fa-briefcase"></i> <span>Lavina ERP</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{ Auth::user()->photo ? URL::asset(Auth::user()->photo->file) : URL::asset('/images/user.png') }}" alt="" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ Auth::user()->name }}</h2>
						<br>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>{{ Auth::user()->role->name }}</h3>
                        <ul class="nav side-menu">
                            @if (Auth::user()->role_id == '3' || Auth::user()->role_id == '4')
                            <li><a><i class="fa fa-opencart"></i> Sale <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('orders.index') }}">Orders</a></li>
                                </ul>
                            </li>
                            @endif
                            
							@if(Auth::user()->isBowner())
                            <li><a><i class="fa fa-hourglass-1"></i> Production <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.production.index') }}">All Productions</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-list"></i> Inventory <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.inventories.index') }}">All Inventories</a></li>
                                    <li><a href="{{ route('bowner.purchase.index') }}">Purchasing</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-bar-chart"></i> Charts <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.chart.index') }}">All Charts</a></li>
                                </ul>
                            </li>       
							
							<li><a><i class="fa fa-users"></i> Human Resource <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.humans.index') }}">All Employees</a></li>
                                    <li><a href="{{ route('bowner.humans.create') }}">Add Employee</a></li>
                                    <li><a href="{{ route('bowner.salaries.index') }}">Salary</a></li>
                                    <li><a href="{{ route('bowner.leaves.index') }}">Leave</a></li>
                                    <li><a href="http://localhost:8000/calculator/choice">Performance</a>
                                       
                                    </li>
                                </ul>
                            </li>               

							<li><a><i class="fa fa-phone-square"></i> Customer <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.customer.index') }}">All Customers</a></li>
                                    <li><a href="{{ route('bowner.customer.create') }}">Create Customer</a></li>
                                </ul>
                            </li>
							
							<li><a><i class="fa fa-truck"></i> Supplier <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.supplier.index') }}">All Suppliers</a></li>
                                    <li><a href="{{ route('bowner.supplier.create') }}">Add Suppliers</a></li>
                                </ul>
                            </li>	

                            <!--<li><a><i class="fa fa-opencart"></i> CHP <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('chp.index') }}">Cek</a></li>
                                </ul>
                            </li>-->	
                            @endif

                            @if (Auth::user()->role_id == '3' || Auth::user()->role_id == '4')
                            <li><a><i class="fa fa-opencart"></i> Sale <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('chp.index') }}">ek</a></li>
                                </ul>
                            </li>
                            @endif	

                            @if (Auth::user()->isManager())
                            <li><a><i class="fa fa-hourglass-1"></i> Production <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.production.index') }}">All Productions</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-list"></i> Inventory <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.inventories.index') }}">All Inventories</a></li>
                                    <li><a href="{{ route('bowner.purchase.index') }}">Purchasing</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-truck"></i> Supplier <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.supplier.index') }}">All Suppliers</a></li>
                                    <li><a href="{{ route('bowner.supplier.create') }}">Add Suppliers</a></li>
                                </ul>
                            </li> 
                            <li><a><i class="fa fa-phone-square"></i> Customer <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('bowner.customer.index') }}">All Customers</a></li>
                                    <li><a href="{{ route('bowner.customer.create') }}">Create Customer</a></li>
                                </ul>
                            </li>      
                            @endif

                            @if (Auth::user()->isHRD())
                            <li><a><i class="fa fa-users"></i> Human Resource <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('HRD.humans.index') }}">All Employees</a></li>
                                    <li><a href="{{ route('HRD.humans.create') }}">Add Employee</a></li>
                                    <li><a href="{{ route('HRD.leaves.index') }}">Leave</a>
                                    <!--<li><a href="{{ route('bowner.salaries.index') }}">Salary</a></li></li>-->
                                    <li><a href="/HRD/calculator/choice">Performance</a>    
                                    </li>
                                </ul>
                            </li>        
                            @endif

                            @if (Auth::user()->isOutlet()) 
                            <li><a><i class="fa fa-users"></i> Human Resource <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">                                 
                                    <li><a href="{{route('outlet.humans.show', Auth::user()->name)}}"">All Employees</a></li>
                                    <li><a href="{{ route('outlet.humans.create') }}">Add Employee</a></li>
                                    <li><a href="{{ route('outlet.leaves.index') }}">Resign</a>
                                    <li><a href="/outlet/choice/{{ Auth::user()->name }}">Performance</a>      
                                    </li>
                                </ul>
                            </li> 

                            @endif
                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{ Auth::user()->photo ? URL::asset(Auth::user()->photo->file) : URL::asset('/images/user.png') }}" alt="">{{ Auth::user()->name }}
                                <span class="fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <!--
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">100%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                -->
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                </li>
                            </ul>
                        </li>
                        <!--
                        <li role="presentation" class="dropdown">
                          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-green">0</span>
                          </a>
                          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <li>
                              <a>
                                <span class="image"><img src="{{Auth::user()->photo ? URL::asset(Auth::user()->photo->file) : URL::asset('/images/user.png')}}" alt="Profile Image" /></span>
                                <span>
                                  <span>{{Auth::user()->name}}</span>
                                  <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                  No Notification...
                                </span>
                              </a>
                            </li>
                          </ul>
                        </li>
                        -->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="min-height: auto">
            <div class="content">
                @yield('content')
            </div>

            <div class="bg-footer">
            </div>
        </div>
        <!-- /page content -->
        
        <!-- footer content -->
        <footer>
            <!--
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            -->
            <div class="clearfix"></div>

            {{-- @yield('footer') --}}

        </footer>
        <!-- /footer content -->
    </div>
</div>

<script src="{{ asset('js/libs.js') }}"></script>
@yield('scripts')
<script>


    $(document).ready(function(){
        //CKEDITOR.replace('body');

        // Initialize tooltip
        $('[data-toggle="tooltip"]').tooltip();

        $alert = $(".alert-message");

        if ($alert) {
            // Fade in alert when closing
            $alert.addClass("in");

            // Set auto fadein
            setTimeout(function(){
                $alert.fadeTo("slow", 0.1).slideUp("slow", function() {
                    $(this).remove();
                });
            }, 3000);
        }
    });
</script>




<!--<script src="code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->



<script src= "/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>




<script type="text/javascript">


 //fungsi untuk menampilkan kualitas

    


    //fungsi untuk mengecek hasil sebelum disimpan, untuk bagian STAFF

     function show(){   
        var knowledge  = parseInt($("#knowledge").val());
        var wspeed  = parseInt($("#wspeed").val());  
        var wsoul  = parseInt($("#wsoul").val()); 
        var wqual  = parseInt($("#wqual").val()); 
        var wpress  = parseInt($("#wpress").val());
        var rata2 = (knowledge * 15/100 ) + ( wspeed * 10/100 ) + ( wsoul * 10/100) + ( wqual * 10/100 ) + ( wpress * 5/100 );

        var teamwork = parseInt($("#teamwork").val());
        var communicate = parseInt($("#communicate").val());
        var responbility = parseInt($("#responbility").val());
        var learning = parseInt($("#learning").val());
        var dicipline = parseInt($("#dicipline").val());
        var initiative = parseInt($("#initiative").val());
        var creativity = parseInt($("#creativity").val());
        var honestly = parseInt($("#honestly").val());
        var obedience = parseInt($("#obedience").val());
        var loyalty = parseInt($("#loyalty").val());

        var rata22 =(teamwork * 5/100) + (communicate * 5/100) + (responbility * 5/100) + (learning * 5/100) + (dicipline * 5/100) + (initiative * 5/100) + (creativity * 5/100) + (honestly * 5/100) + (obedience * 5/100) + (loyalty * 5/100);
        
        
        var gtotal = rata2 + rata22;

        //bagian A
        var know = kualitas(knowledge);
        var speed = kualitas(wspeed);
        var soul = kualitas(wsoul);
        var qual = kualitas(wqual);
        var press = kualitas(wpress);


        //bagian B
        var team = kualitas(teamwork);
        var commu = kualitas(communicate);
        var resp = kualitas(responbility);
        var learn = kualitas(learning);
        var dicip = kualitas(dicipline);
        var init = kualitas(initiative);
        var creativ = kualitas(creativity);
        var hones = kualitas(honestly);
        var obed = kualitas(obedience);
        var loyal = kualitas(loyalty);
        var tkuali = kualitas(gtotal);



        document.getElementById("rata").innerHTML = rata2;
        document.getElementById("rata2").innerHTML = rata22;
        document.getElementById("gtotal").innerHTML = gtotal;

        document.getElementById("knowkuali").innerHTML = know;
        document.getElementById("speedkuali").innerHTML = speed;
        document.getElementById("soulkuali").innerHTML = soul;
        document.getElementById("qualkuali").innerHTML = qual;
        document.getElementById("presskuali").innerHTML = press;


         document.getElementById("teamkuali").innerHTML = team;
         document.getElementById("comukuali").innerHTML = commu;
         document.getElementById("respkuali").innerHTML = resp;
         document.getElementById("learnkuali").innerHTML = learn;
         document.getElementById("dicipkuali").innerHTML = dicip;
         document.getElementById("initkuali").innerHTML = init;
         document.getElementById("creativkuali").innerHTML = creativ;
         document.getElementById("honeskuali").innerHTML = hones;
         document.getElementById("obedkuali").innerHTML = obed;
         document.getElementById("loyalkuali").innerHTML = loyal;
         document.getElementById("tkualitas").innerHTML = tkuali;
      }; 
  </script>





</body>
</html>