<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Corposalud') }}</title>

    <link href="{{ asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="{{ asset('pages/css/themes/light.css') }}" rel="stylesheet" type="text/css" />
    <style>
      .icon-thumbnail{
        margin-right: 0px;
      }
      .page-sidebar .sidebar-menu .menu-items li > a {
          width: 80%;
      }
    </style>
  </head>
  <body class="fixed-header menu-pin">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="assets/img/logo.png" alt="logo" class="brand" data-src="{{ asset('assets/img/logo.png') }}" data-src-retina="{{ asset('assets/img/logo.png') }}" width="160" height="60">
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu mt-3">
        <!-- BEGIN SIDEBAR MENU ITEMS   class="open active">-->
        <ul class="menu-items">
          <li class="m-t-10">
            <a href="/departamentos" class="">
              <span class="title">Departamentos</span>
              <!-- <span class="details">12 New Updates</span>-->
            </a>
            <span class="icon-thumbnail"><i data-feather="shield"></i></span>
          </li>
          <li class="">
            <a href="/usuarios"><span class="title">Usuarios</span></a>
            <span class="icon-thumbnail"><i data-feather="users"></i></span>
          </li>
          <li class="">
            <a href="/usuarios"><span class="title">Documentos</span></a>
            <span class="icon-thumbnail"><i data-feather="file-text"></i></span>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE SIDEBAR TOGGLE -->
        <a href="#" class="btn-link toggle-sidebar d-lg-none  pg-icon btn-icon-link" data-toggle="sidebar">
      		menu</a>
        <!-- END MOBILE SIDEBAR TOGGLE -->
        <div class=""></div>
        <div class="d-flex align-items-center">
          <!-- START NOTIFICATION LIST -->
          <ul class="d-lg-inline-block d-none notification-list no-margin d-lg-inline-block b-grey b-l b-r no-style p-l-20 p-r-20">
            <li class="p-r-10 inline">
              <div class="dropdown">
                <a href="javascript:;" id="notification-center" class="header-icon btn-icon-link" data-toggle="dropdown">
                  <i class="pg-icon">world</i>
                  <span class="bubble"></span>
                </a>
                <!-- START Notification Dropdown -->
                <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                  <!-- START Notification -->
                  <div class="notification-panel">
                    <!-- START Notification Body-->
                    <div class="notification-body scrollable">
                      <!-- START Notification Item-->
                      <div class="notification-item unread clearfix">
                        <!-- START Notification Item-->
                        <div class="heading open">
                          <a href="#" class="text-complete pull-left d-flex align-items-center">
                            <i class="pg-icon m-r-10">map</i>
                            <span class="bold">Carrot Design</span>
                            <span class="fs-12 m-l-10">David Nester</span>
                          </a>
                          <div class="pull-right">
                            <div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                              <div><i class="pg-icon">chevron_down</i>
                              </div>
                            </div>
                            <span class=" time">few sec ago</span>
                          </div>
                          <div class="more-details">
                            <div class="more-details-inner">
                              <h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation <br>
																															distinguishes between <br>
																															A leader and a follower.”</h5>
                              <p class="small hint-text">
                                Commented on john Smiths wall.
                                <br> via pages framework.
                              </p>
                            </div>
                          </div>
                        </div>
                        <!-- END Notification Item-->
                        <!-- START Notification Item Right Side-->
                        <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                          <a href="#" class="mark"></a>
                        </div>
                        <!-- END Notification Item Right Side-->
                      </div>
                      <!-- START Notification Body-->
                      <!-- START Notification Item-->
                      <div class="notification-item  clearfix">
                        <div class="heading">
                          <a href="#" class="text-danger pull-left">
                            <i class="pg-icon m-r-10">alert_warning</i>
                            <span class="bold">98% Server Load</span>
                            <span class="fs-12 m-l-10">Take Action</span>
                          </a>
                          <span class="pull-right time">2 mins ago</span>
                        </div>
                        <!-- START Notification Item Right Side-->
                        <div class="option">
                          <a href="#" class="mark"></a>
                        </div>
                        <!-- END Notification Item Right Side-->
                      </div>
                      <!-- END Notification Item-->
                      <!-- START Notification Item-->
                      <div class="notification-item  clearfix">
                        <div class="heading">
                          <a href="#" class="text-warning pull-left">
                            <i class="pg-icon m-r-10">alert_warning</i>
                            <span class="bold">Warning Notification</span>
                            <span class="fs-12 m-l-10">Buy Now</span>
                          </a>
                          <span class="pull-right time">yesterday</span>
                        </div>
                        <!-- START Notification Item Right Side-->
                        <div class="option">
                          <a href="#" class="mark"></a>
                        </div>
                        <!-- END Notification Item Right Side-->
                      </div>
                      <!-- END Notification Item-->
                      <!-- START Notification Item-->
                      <div class="notification-item unread clearfix">
                        <div class="heading">
                          <div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
                            <img width="30" height="30" data-src-retina="{{ asset('assets/img/profiles/1x.jpg') }}" data-src="{{ asset('assets/img/profiles/1.jpg') }}" alt="" src="{{ asset('assets/img/profiles/1.jpg') }}">
                          </div>
                          <a href="#" class="text-complete pull-left">
                            <span class="bold">Revox Design Labs</span>
                            <span class="fs-12 m-l-10">Owners</span>
                          </a>
                          <span class="pull-right time">11:00pm</span>
                        </div>
                        <!-- START Notification Item Right Side-->
                        <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                          <a href="#" class="mark"></a>
                        </div>
                        <!-- END Notification Item Right Side-->
                      </div>
                      <!-- END Notification Item-->
                    </div>
                    <!-- END Notification Body-->
                    <!-- START Notification Footer-->
                    <div class="notification-footer text-center">
                      <a href="#" class="">Read all notifications</a>
                      <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                        <i class="pg-refresh_new"></i>
                      </a>
                    </div>
                    <!-- START Notification Footer-->
                  </div>
                  <!-- END Notification -->
                </div>
                <!-- END Notification Dropdown -->
              </div>
            </li>
            
          </ul>
          <!-- END NOTIFICATIONS LIST -->
          <!-- START User Info-->
          <div class="pull-left p-r-10 fs-14 d-lg-inline-block d-none m-l-20">
            <span class="semi-bold">Apellido</span> <span class="text-color">Nombre</span>
          </div>
          <div class="dropdown pull-right d-lg-block d-none">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown">
              <span class="thumbnail-wrapper d32 circular inline">
      					<img src="{{ asset('assets/img/avatar.png') }}" alt="" data-src="{{ asset('assets/img/avatar.png') }}"
      						data-src-retina="{{ asset('assets/img/avatar.png') }}" width="40" height="32">
      				</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
              <a href="#" class="dropdown-item"><span>Signed in as <br /><b>Nombre Apellido</b></span></a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">Perfil</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">Logout</a>
            </div>
          </div>
          <!-- END User Info-->
          
        </div>
      </div>
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">{{ $root }}</a></li>
                  <li class="breadcrumb-item active">{{ $page }}</li>
                </ol>
                <!-- END BREADCRUMB -->
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class=" container-fluid   container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            @yield('content')
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->

      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!--START QUICKVIEW -->
    <div id="quickview" class="quickview-wrapper" data-pages="quickview">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="">
          <a href="#quickview-notes" data-target="#quickview-notes" data-toggle="tab" role="tab">Notes</a>
        </li>
        <li>
          <a href="#quickview-alerts" data-target="#quickview-alerts" data-toggle="tab" role="tab">Alerts</a>
        </li>
        <li class="">
          <a class="active" href="#quickview-chat" data-toggle="tab" role="tab">Chat</a>
        </li>
      </ul>
      <a class="btn-icon-link invert quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview"><i class="pg-icon">close</i></a>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- BEGIN Notes !-->
        <div class="tab-pane no-padding" id="quickview-notes">
          <div class="view-port clearfix quickview-notes" id="note-views">
            <!-- BEGIN Note List !-->
            <div class="view list" id="quick-note-list">
              <div class="toolbar clearfix">
                <ul class="pull-right ">
                  <li>
                    <a href="#" class="delete-note-link"><i class="pg-icon">trash_alt</i></a>
                  </li>
                  <li>
                    <a href="#" class="new-note-link" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="pg-icon">add</i></a>
                  </li>
                </ul>
                <button aria-label="" class="btn-remove-notes btn btn-xs btn-block hide"><i class="pg-icon">close</i>Delete</button>
              </div>
              <ul>
                <!-- BEGIN Note Item !-->
                <li data-noteid="1" class="d-flex justify-space-between">
                  <div class="left">
                    <!-- BEGIN Note Action !-->
                    <div class="form-check warning no-margin">
                      <input id="qncheckbox1" type="checkbox" value="1">
                      <label for="qncheckbox1"></label>
                    </div>
                    <!-- END Note Action !-->
                    <!-- BEGIN Note Preview Text !-->
                    <p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    <!-- BEGIN Note Preview Text !-->
                  </div>
                  <!-- BEGIN Note Details !-->
                  <div class="d-flex right justify-content-end">
                    <!-- BEGIN Note Date !-->
                    <span class="date">12/12/20</span>
                    <a href="#" class="d-flex align-items-center" data-navigate="view" data-view-port="#note-views" data-view-animation="push">
                      <i class="pg-icon">chevron_right</i>
                    </a>
                    <!-- END Note Date !-->
                  </div>
                  <!-- END Note Details !-->
                </li>
                <!-- END Note List !-->
                <!-- BEGIN Note Item !-->
                <li data-noteid="2" class="d-flex justify-space-between">
                  <div class="left">
                    <!-- BEGIN Note Action !-->
                    <div class="form-check warning no-margin">
                      <input id="qncheckbox2" type="checkbox" value="1">
                      <label for="qncheckbox2"></label>
                    </div>
                    <!-- END Note Action !-->
                    <!-- BEGIN Note Preview Text !-->
                    <p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    <!-- BEGIN Note Preview Text !-->
                  </div>
                  <!-- BEGIN Note Details !-->
                  <div class="d-flex right justify-content-end">
                    <!-- BEGIN Note Date !-->
                    <span class="date">12/12/20</span>
                    <a href="#" class="d-flex align-items-center" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="pg-icon">chevron_right</i></a>
                    <!-- END Note Date !-->
                  </div>
                  <!-- END Note Details !-->
                </li>
                <!-- END Note List !-->
                <!-- BEGIN Note Item !-->
                <li data-noteid="2" class="d-flex justify-space-between">
                  <div class="left">
                    <!-- BEGIN Note Action !-->
                    <div class="form-check warning no-margin">
                      <input id="qncheckbox3" type="checkbox" value="1">
                      <label for="qncheckbox3"></label>
                    </div>
                    <!-- END Note Action !-->
                    <!-- BEGIN Note Preview Text !-->
                    <p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    <!-- BEGIN Note Preview Text !-->
                  </div>
                  <!-- BEGIN Note Details !-->
                  <div class="d-flex right justify-content-end">
                    <!-- BEGIN Note Date !-->
                    <span class="date">12/12/20</span>
                    <a href="#" class="d-flex align-items-center" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="pg-icon">chevron_right</i></a>
                    <!-- END Note Date !-->
                  </div>
                  <!-- END Note Details !-->
                </li>
                <!-- END Note List !-->
                <!-- BEGIN Note Item !-->
                <li data-noteid="3" class="d-flex justify-space-between">
                  <div class="left">
                    <!-- BEGIN Note Action !-->
                    <div class="form-check warning no-margin">
                      <input id="qncheckbox4" type="checkbox" value="1">
                      <label for="qncheckbox4"></label>
                    </div>
                    <!-- END Note Action !-->
                    <!-- BEGIN Note Preview Text !-->
                    <p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    <!-- BEGIN Note Preview Text !-->
                  </div>
                  <!-- BEGIN Note Details !-->
                  <div class="d-flex right justify-content-end">
                    <!-- BEGIN Note Date !-->
                    <span class="date">12/12/20</span>
                    <a href="#" class="d-flex align-items-center" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="pg-icon">chevron_right</i></a>
                    <!-- END Note Date !-->
                  </div>
                  <!-- END Note Details !-->
                </li>
                <!-- END Note List !-->
                <!-- BEGIN Note Item !-->
                <li data-noteid="4" class="d-flex justify-space-between">
                  <div class="left">
                    <!-- BEGIN Note Action !-->
                    <div class="form-check warning no-margin">
                      <input id="qncheckbox5" type="checkbox" value="1">
                      <label for="qncheckbox5"></label>
                    </div>
                    <!-- END Note Action !-->
                    <!-- BEGIN Note Preview Text !-->
                    <p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    <!-- BEGIN Note Preview Text !-->
                  </div>
                  <!-- BEGIN Note Details !-->
                  <div class="d-flex right justify-content-end">
                    <!-- BEGIN Note Date !-->
                    <span class="date">12/12/20</span>
                    <a href="#" class="d-flex align-items-center" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="pg-icon">chevron_right</i></a>
                    <!-- END Note Date !-->
                  </div>
                  <!-- END Note Details !-->
                </li>
                <!-- END Note List !-->
              </ul>
            </div>
            <!-- END Note List !-->
            <div class="view note" id="quick-note">
              <div>
                <ul class="toolbar">
                  <li><a href="#" class="close-note-link"><i class="pg-icon">chevron_left</i></a>
                  </li>
                  <li><a href="#" data-action="Bold" class="fs-12"><i class="pg-icon">format_bold</i></a>
                  </li>
                  <li><a href="#" data-action="Italic" class="fs-12"><i class="pg-icon">format_italics</i></a>
                  </li>
                  <li><a href="#" class="fs-12"><i class="pg-icon">link</i></a>
                  </li>
                </ul>
                <div class="body">
                  <div>
                    <div class="top">
                      <span>21st april 2020 2:13am</span>
                    </div>
                    <div class="content">
                      <div class="quick-note-editor full-width full-height js-input" contenteditable="true"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END Notes !-->
        <!-- BEGIN Alerts !-->
        <div class="tab-pane no-padding" id="quickview-alerts">
          <div class="view-port clearfix" id="alerts">
            <!-- BEGIN Alerts View !-->
            <div class="view bg-white">
              <!-- BEGIN View Header !-->
              <div class="navbar navbar-default navbar-sm">
                <div class="navbar-inner">
                  <!-- BEGIN Header Controler !-->
                  <a href="javascript:;" class="action p-l-10 link text-color" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                    <i class="pg-icon">more_horizontal</i>
                  </a>
                  <!-- END Header Controler !-->
                  <div class="view-heading">
                    Notications
                  </div>
                  <!-- BEGIN Header Controler !-->
                  <a href="#" class="action p-r-10 pull-right link text-color">
                    <i class="pg-icon">search</i>
                  </a>
                  <!-- END Header Controler !-->
                </div>
              </div>
              <!-- END View Header !-->
              <!-- BEGIN Alert List !-->
              <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
                <!-- BEGIN List Group !-->
                <div class="list-view-group-container">
                  <!-- BEGIN List Group Header!-->
                  <div class="list-view-group-header text-uppercase">
                    Calendar
                  </div>
                  <!-- END List Group Header!-->
                  <ul>
                    <!-- BEGIN List Group Item!-->
                    <li class="alert-list">
                      <!-- BEGIN Alert Item Set Animation using data-view-animation !-->
                      <a href="javascript:;" class="align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                        <p class="">
                          <span class="text-warning fs-10"><i class="pg-icon">circle_fill</i></span>
                        </p>
                        <p class="p-l-10 overflow-ellipsis fs-12">
                          <span class="text-color">David Nester Birthday</span>
                        </p>
                        <p class="p-r-10 ml-auto fs-12 text-right">
                          <span class="text-warning">Today <br></span>
                          <span class="text-color">All Day</span>
                        </p>
                      </a>
                      <!-- END Alert Item!-->
                      <!-- BEGIN List Group Item!-->
                    </li>
                    <!-- END List Group Item!-->
                    <!-- BEGIN List Group Item!-->
                    <li class="alert-list">
                      <!-- BEGIN Alert Item Set Animation using data-view-animation !-->
                      <a href="#" class="align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                        <p class="">
                          <span class="text-warning fs-10"><i class="pg-icon">circle_fill</i></span>
                        </p>
                        <p class="p-l-10 overflow-ellipsis fs-12">
                          <span class="text-color">Meeting at 2:30</span>
                        </p>
                        <p class="p-r-10 ml-auto fs-12 text-right">
                          <span class="text-warning">Today</span>
                        </p>
                      </a>
                      <!-- END Alert Item!-->
                    </li>
                    <!-- END List Group Item!-->
                  </ul>
                </div>
                <!-- END List Group !-->
                <div class="list-view-group-container">
                  <!-- BEGIN List Group Header!-->
                  <div class="list-view-group-header text-uppercase">
                    Social
                  </div>
                  <!-- END List Group Header!-->
                  <ul>
                    <!-- BEGIN List Group Item!-->
                    <li class="alert-list">
                      <!-- BEGIN Alert Item Set Animation using data-view-animation !-->
                      <a href="javascript:;" class="p-t-10 p-b-10 align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                        <p class="">
                          <span class="text-complete fs-10"><i class="pg-icon">circle_fill</i></span>
                        </p>
                        <p class="col overflow-ellipsis fs-12 p-l-10">
                          <span class="text-color link">Jame Smith commented on your status<br></span>
                          <span class="text-color">“Perfection Simplified - Company Revox"</span>
                        </p>
                      </a>
                      <!-- END Alert Item!-->
                    </li>
                    <!-- END List Group Item!-->
                    <!-- BEGIN List Group Item!-->
                    <li class="alert-list">
                      <!-- BEGIN Alert Item Set Animation using data-view-animation !-->
                      <a href="javascript:;" class="p-t-10 p-b-10 align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                        <p class="">
                          <span class="text-complete fs-10"><i class="pg-icon">circle_fill</i></span>
                        </p>
                        <p class="col overflow-ellipsis fs-12 p-l-10">
                          <span class="text-color link">Jame Smith commented on your status<br></span>
                          <span class="text-color">“Perfection Simplified - Company Revox"</span>
                        </p>
                      </a>
                      <!-- END Alert Item!-->
                    </li>
                    <!-- END List Group Item!-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <!-- BEGIN List Group Header!-->
                  <div class="list-view-group-header text-uppercase">
                    Sever Status
                  </div>
                  <!-- END List Group Header!-->
                  <ul>
                    <!-- BEGIN List Group Item!-->
                    <li class="alert-list">
                      <!-- BEGIN Alert Item Set Animation using data-view-animation !-->
                      <a href="#" class="p-t-10 p-b-10 align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                        <p class="">
                          <span class="text-danger fs-10"><i class="pg-icon">circle_fill</i></span>
                        </p>
                        <p class="col overflow-ellipsis fs-12 p-l-10">
                          <span class="text-color link">12:13AM GTM, 10230, ID:WR174s<br></span>
                          <span class="text-color">Server Load Exceeted. Take action</span>
                        </p>
                      </a>
                      <!-- END Alert Item!-->
                    </li>
                    <!-- END List Group Item!-->
                  </ul>
                </div>
              </div>
              <!-- END Alert List !-->
            </div>
            <!-- EEND Alerts View !-->
          </div>
        </div>
        <!-- END Alerts !-->
        <div class="tab-pane active no-padding" id="quickview-chat">
          <div class="view-port clearfix" id="chat">
            <div class="view bg-white">
              <!-- BEGIN View Header !-->
              <div class="navbar navbar-default">
                <div class="navbar-inner">
                  <!-- BEGIN Header Controler !-->
                  <a href="javascript:;" class="action p-l-10 link text-color" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                    <i class="pg-icon">add</i>
                  </a>
                  <!-- END Header Controler !-->
                  <div class="view-heading">
                    Chat List
                    <div class="fs-11">Show All</div>
                  </div>
                  <!-- BEGIN Header Controler !-->
                  <a href="#" class="action p-r-10 pull-right link text-color">
                    <i class="pg-icon">more_horizontal</i>
                  </a>
                  <!-- END Header Controler !-->
                </div>
              </div>
              <!-- END View Header !-->
              <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">
                    a</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/1x.jpg') }}" data-src="{{ asset('assets/img/profiles/1.jpg') }}" src="{{ asset('assets/img/profiles/1x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">ava flores</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">b</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/2x.jpg') }}" data-src="{{ asset('assets/img/profiles/2.jpg') }}" src="{{ asset('assets/img/profiles/2x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">bella mccoy</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/3x.jpg') }}" data-src="{{ asset('assets/img/profiles/3.jpg') }}" src="{{ asset('assets/img/profiles/3x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">bob stephens</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">c</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/4x.jpg') }}" data-src="{{ asset('assets/img/profiles/4.jpg') }}" src="{{ asset('assets/img/profiles/4x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">carole roberts</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/5x.jpg') }}" data-src="{{ asset('assets/img/profiles/5.jpg') }}" src="{{ asset('assets/img/profiles/5x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">christopher perez</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">d</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/6x.jpg') }}" data-src="{{ asset('assets/img/profiles/6.jpg') }}" src="{{ asset('assets/img/profiles/6x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">danielle fletcher</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/7x.jpg') }}" data-src="{{ asset('assets/img/profiles/7.jpg') }}" src="{{ asset('assets/img/profiles/7x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">david sutton</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">e</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/8x.jpg') }}" data-src="{{ asset('assets/img/profiles/8.jpg') }}" src="{{ asset('assets/img/profiles/8x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">earl hamilton</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/9x.jpg') }}" data-src="{{ asset('assets/img/profiles/9.jpg') }}" src="{{ asset('assets/img/profiles/9x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">elaine lawrence</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/1x.jpg') }}" data-src="{{ asset('assets/img/profiles/1.jpg') }}" src="{{ asset('assets/img/profiles/1x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">ellen grant</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/2x.jpg') }}" data-src="{{ asset('assets/img/profiles/2.jpg') }}" src="{{ asset('assets/img/profiles/2x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">erik taylor</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/3x.jpg') }}" data-src="{{ asset('assets/img/profiles/3.jpg') }}" src="{{ asset('assets/img/profiles/3x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">everett wagner</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">f</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/4x.jpg') }}" data-src="{{ asset('assets/img/profiles/4.jpg') }}" src="{{ asset('assets/img/profiles/4x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">freddie gomez</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">g</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/5x.jpg') }}" data-src="{{ asset('assets/img/profiles/5.jpg') }}" src="{{ asset('assets/img/profiles/5x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">glen jensen</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/6x.jpg') }}" data-src="{{ asset('assets/img/profiles/6.jpg') }}" src="{{ asset('assets/img/profiles/6x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">gwendolyn walker</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">j</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/7x.jpg') }}" data-src="{{ asset('assets/img/profiles/7.jpg') }}" src="{{ asset('assets/img/profiles/7x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">janet romero</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">k</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/8x.jpg') }}" data-src="{{ asset('assets/img/profiles/8.jpg') }}" src="{{ asset('assets/img/profiles/8x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">kim martinez</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">l</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/9x.jpg') }}" data-src="{{ asset('assets/img/profiles/9.jpg') }}" src="{{ asset('assets/img/profiles/9x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">lawrence white</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/1x.jpg') }}" data-src="{{ asset('assets/img/profiles/1.jpg') }}" src="{{ asset('assets/img/profiles/1x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">leroy bell</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/2x.jpg') }}" data-src="{{ asset('assets/img/profiles/2.jpg') }}" src="{{ asset('assets/img/profiles/2x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">letitia carr</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/3x.jpg') }}" data-src="{{ asset('assets/img/profiles/3.jpg') }}" src="{{ asset('assets/img/profiles/3x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">lucy castro</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">m</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/4x.jpg') }}" data-src="{{ asset('assets/img/profiles/4.jpg') }}" src="{{ asset('assets/img/profiles/4x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">mae hayes</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/5x.jpg') }}" data-src="{{ asset('assets/img/profiles/5.jpg') }}" src="{{ asset('assets/img/profiles/5x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">marilyn owens</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/6x.jpg') }}" data-src="{{ asset('assets/img/profiles/6.jpg') }}" src="{{ asset('assets/img/profiles/6x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">marlene cole</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/7x.jpg') }}" data-src="{{ asset('assets/img/profiles/7.jpg') }}" src="{{ asset('assets/img/profiles/7x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">marsha warren</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/8x.jpg') }}" data-src="{{ asset('assets/img/profiles/8.jpg') }}" src="{{ asset('assets/img/profiles/8x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">marsha dean</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/9x.jpg') }}" data-src="{{ asset('assets/img/profiles/9.jpg') }}" src="{{ asset('assets/img/profiles/9x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">mia diaz</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">n</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/1x.jpg') }}" data-src="{{ asset('assets/img/profiles/1.jpg') }}" src="{{ asset('assets/img/profiles/1x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">noah elliott</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">p</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/2x.jpg') }}" data-src="{{ asset('assets/img/profiles/2.jpg') }}" src="{{ asset('assets/img/profiles/2x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">phyllis hamilton</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">r</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/3x.jpg') }}" data-src="{{ asset('assets/img/profiles/3.jpg') }}" src="{{ asset('assets/img/profiles/3x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">raul rodriquez</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/4x.jpg') }}" data-src="{{ asset('assets/img/profiles/4.jpg') }}" src="{{ asset('assets/img/profiles/4x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">rhonda barnett</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/5x.jpg') }}" data-src="{{ asset('assets/img/profiles/5.jpg') }}" src="{{ asset('assets/img/profiles/5x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">roberta king</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">s</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/6x.jpg') }}" data-src="{{ asset('assets/img/profiles/6.jpg') }}" src="{{ asset('assets/img/profiles/6x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">scott armstrong</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/7x.jpg') }}" data-src="{{ asset('assets/img/profiles/7.jpg') }}" src="{{ asset('assets/img/profiles/7x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">sebastian austin</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/8x.jpg') }}" data-src="{{ asset('assets/img/profiles/8.jpg') }}" src="{{ asset('assets/img/profiles/8x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">sofia davis</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">t</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/9x.jpg') }}" data-src="{{ asset('assets/img/profiles/9.jpg') }}" src="{{ asset('assets/img/profiles/9x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">terrance young</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/1x.jpg') }}" data-src="{{ asset('assets/img/profiles/1.jpg') }}" src="{{ asset('assets/img/profiles/1x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">theodore woods</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/2x.jpg') }}" data-src="{{ asset('assets/img/profiles/2.jpg') }}" src="{{ asset('assets/img/profiles/2x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">todd wood</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/3x.jpg') }}" data-src="{{ asset('assets/img/profiles/3.jpg') }}" src="{{ asset('assets/img/profiles/3x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">tommy jenkins</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">w</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="{{ asset('assets/img/profiles/4x.jpg') }}" data-src="{{ asset('assets/img/profiles/4.jpg') }}" src="{{ asset('assets/img/profiles/4x.jpg') }}" class="col-top">
                        </span>
                        <p class="p-l-10 ">
                          <span class="text-color">wilma hicks</span>
                          <span class="block text-color hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
              </div>
            </div>
            <!-- BEGIN Conversation View  !-->
            <div class="view chat-view bg-white clearfix">
              <!-- BEGIN Header  !-->
              <div class="navbar navbar-default">
                <div class="navbar-inner">
                  <a href="javascript:;" class="link text-color action p-l-10 p-r-10" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                    <i class="pg-icon">chevron_left</i>
                  </a>
                  <div class="view-heading">
                    John Smith
                    <div class="fs-11 hint-text">Online</div>
                  </div>
                  <a href="#" class="link text-color action p-r-10 pull-right ">
                    <i class="pg-icon">more_horizontal</i>
                  </a>
                </div>
              </div>
              <!-- END Header  !-->
              <!-- BEGIN Conversation  !-->
              <div class="chat-inner" id="my-conversation">
                <!-- BEGIN From Me Message  !-->
                <div class="message clearfix">
                  <div class="chat-bubble from-me">
                    Hello there
                  </div>
                </div>
                <!-- END From Me Message  !-->
                <!-- BEGIN From Them Message  !-->
                <div class="message clearfix">
                  <div class="profile-img-wrapper m-t-5 inline">
                    <img class="col-top" width="30" height="30" src="{{ asset('assets/img/profiles/avatar_small.jpg') }}" alt="" data-src="{{ asset('assets/img/profiles/avatar_small.jpg') }}" data-src-retina="{{ asset('assets/img/profiles/avatar_small2x.jpg') }}">
                  </div>
                  <div class="chat-bubble from-them">
                    Hey
                  </div>
                </div>
                <!-- END From Them Message  !-->
                <!-- BEGIN From Me Message  !-->
                <div class="message clearfix">
                  <div class="chat-bubble from-me">
                    Did you check out Pages framework ?
                  </div>
                </div>
                <!-- END From Me Message  !-->
                <!-- BEGIN From Me Message  !-->
                <div class="message clearfix">
                  <div class="chat-bubble from-me">
                    Its an awesome chat
                  </div>
                </div>
                <!-- END From Me Message  !-->
                <!-- BEGIN From Them Message  !-->
                <div class="message clearfix">
                  <div class="profile-img-wrapper m-t-5 inline">
                    <img class="col-top" width="30" height="30" src="{{ asset('assets/img/profiles/avatar_small.jpg') }}" alt="" data-src="{{ asset('assets/img/profiles/avatar_small.jpg') }}" data-src-retina="{{ asset('assets/img/profiles/avatar_small2x.jpg') }}">
                  </div>
                  <div class="chat-bubble from-them">
                    Yea
                  </div>
                </div>
                <!-- END From Them Message  !-->
              </div>
              <!-- BEGIN Conversation  !-->
              <!-- BEGIN Chat Input  !-->
              <div class="b-t b-grey bg-white clearfix p-l-10 p-r-10">
                <div class="row">
                  <div class="col-1 p-t-15">
                    <a href="#" class="link text-color"><i class="pg-icon">add</i></a>
                  </div>
                  <div class="col-8 no-padding">
                    <label class="d-none">Reply</label>
                    <input type="text" class="form-control chat-input" data-chat-input="" data-chat-conversation="#my-conversation" placeholder="Say something">
                  </div>
                  <div class="col-2 link text-color m-l-10 m-t-15 p-l-10 b-l b-grey col-top">
                    <a href="#" class="link text-color"><i class="pg-icon">camera</i></a>
                  </div>
                </div>
              </div>
              <!-- END Chat Input  !-->
            </div>
            <!-- END Conversation View  !-->
          </div>
        </div>
      </div>
    </div >
    <!-- END QUICKVIEW-->

    <!-- BEGIN VENDOR JS -->
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/pace/pace.min.js" type="text/javascript') }}"></script>
    <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
    <script src="{{ asset('assets/plugins/liga.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script type="{{ asset('text/javascript" src="assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="{{ asset('text/javascript" src="assets/plugins/classie/classie.js') }}"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{ asset('pages/js/pages.js') }}"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>