<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.getnajmul.com/theme/ecoreal/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 May 2019 01:46:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoReal - HTML5 Real Estate Template</title>

    <meta name="description" content="EcoReal - HTML5 Bootstrap Site Template">
    <meta name="keywords" content="real estate template, bootstrap real estate template, EcoReal">
    <meta name="author" content="Ecology Theme">
    




    <!-- FAV AND TOUCH ICONS -->
    <link rel="icon" href="{{asset('front/images/favicon.ico')}}">

    <!-- STYLESHEETS -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('front/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/magnific-popup.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('front/css/mlicons.css')}}" />
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.css')}}">


    <link rel="stylesheet" href="{{asset('front/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>
<body>


<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

<!-- =========================
    Header Section
============================== -->
<header>
    <div class="container">

        @foreach($header as $v_info)
        <div class="row header">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="logo">
                    <a href="#"><img style="width: 54px;" src="{{URL('uploads/header/'.$v_info->image)}}" alt="Logo"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 header-call clearfix">
                <p>
                    <i class="fa fa-phone pull-left"></i>
                    <span class="phone">{{ $v_info -> number }}</span><br/>
                    <span class="info" float="right" >{{ $v_info -> email }}</span>
                </p>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-4 header-place clearfix"> 
                <p>                
                    <i class="fa fa-home pull-left"></i>
                    <span class="address-title">777 Seventh Avenue</span><br/>
                    <span class="address-desc">{{ $v_info -> address }}</span>
                </p> 
            </div>
            <div class="col-md-3 col-lg-3 col-sm-4 header-social">
                <ul class="list-unstyled list-inline">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>

        @endforeach
    </div>
</header>

<!-- =========================
   Navigation Section
============================== -->
<nav class="navbar navbar-default" id="my-navbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                </div>
                <div class="collapse navbar-collapse main-nav" id="navbar-collapse">
                    <ul class="nav navbar-nav main-menu">
                        <li class="active"><a href="{{ route('welcome') }}">Home</a>
                        </li>
                        <li><a href="{{ route('about_us') }}">About-Us</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="#contact-agent">Appointment</a></li>
                        <li><a href="{{ route('contact_us') }}">Contact</a></li>
                    </ul>
                    <a href="#" id="appoinment" data-toggle="modal" data-target="#myModal" class="navbar-right">Schedule Visit</a>


                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Appointment Form</h4>
                          </div>
                          <div class="modal-body">
                            <div id="contact">  
                                <div id="message"></div>

                                    <span id="form_result"></span>
                                    <form method="post" action="{{ route('appoinment.store') }}" id="upload_form" class="form-horizontal">

                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="string " class="form-control" placeholder="Enter Phone" name="phone" id="phone" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Appontment Date" name="date" id="date" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="time" class="form-control" placeholder="Appontment Time" name="time" id="time" required>
                                        </div>

                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Enter Message" name="message" id="message"  required></textarea>
                                        </div>

                                        <input type="submit" name="action_button" id="action_button" class="btn btn-primary">

                                        <input type="submit" class="btn btn-danger" data-dismiss = "modal" value="Close" />
                                    </form>
                            </div>
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>
                      </div>
                    </div><!-- End Modal -->


                </div>
            </div>
        </div> 
    </div><!-- end conainer -->
</nav><!-- end navbar -->