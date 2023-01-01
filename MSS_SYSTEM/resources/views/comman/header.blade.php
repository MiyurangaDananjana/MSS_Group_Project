<?php

    use App\Models\User;
    use App\Models\AccessLevels;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    $usersAccesslevels = DB::table('access_levels')
    ->select('Finanace_Module',
                 'purchasingModule',
                 'factoryModule',
                 'Reports')
    ->where('user_id', (int)Auth::user()->id)->first();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{Route::currentRoutename()}}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('Template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('Template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('Template/css/progress.css')}}" rel="stylesheet">
    <link href="{{asset('slider/slider.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fa fa-industry" aria-hidden="true"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lock Hood<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Modules
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Home</span>
                </a>
            </li>



            @if((int)Auth::user()->Position=="HR" || Auth::user()->Position=="toplevel")
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('hr_module') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>HR Module</span>
                </a>
            </li>
            @endif


            @if($usersAccesslevels->Finanace_Module==1 || Auth::user()->Position=="toplevel")
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('finance') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Finance Module</span>
                </a>
            </li>
            @endif



            @if($usersAccesslevels->purchasingModule==1 || Auth::user()->Position=="toplevel")
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('Inventory')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Inventory Module</span>
                </a>
            </li>
            @endif



            @if($usersAccesslevels->factoryModule==1 || Auth::user()->Position=="toplevel")
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('Task')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Task Module</span>
                </a>
            </li>
            @endif



            @if((int)Auth::user()->Position=="superviser" || Auth::user()->Position=="toplevel")
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kanban') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kanban Tool</span>
                </a>
            </li>
            @endif


            @if((int)Auth::user()->Position=="superviser" || Auth::user()->Position=="toplevel")
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reportAccess') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Report Access</span>
                </a>
            </li>
            @endif


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                    </ul>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle" src="https://img.icons8.com/color/512/name.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                </li>

                </ul>

                </nav>
                <!-- End of Topbar -->