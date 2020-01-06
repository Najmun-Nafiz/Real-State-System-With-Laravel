<!-- =========================
FOOTER
============================== -->
<footer class="footer">
    <div class="footer-overlay">
        <div class="container">
            <div class="row subscribe">
                <form  method="post" action="{{ route('admin.users.store') }}"> 
                    @csrf
                    <div class="col-md-5 newsletter"> 
                        <span>Subscribe to our newsletter</span> 
                    </div><!-- end .col-md-5 -->
                    <div class="col-md-5 subscribe-email">
                        <input type="email" placeholder="Email Address" id="mc-email" name="email" required>
                    </div><!-- end .col-md-5 -->
                    <div class="col-md-2">
                        <?php
                            $info = DB::table('usersubscribes')->get();
                        ?>
                        @foreach($info as $v_info)
                        @if($v_info -> status == false)
                        <input type="submit" value="Subscribe"> 
                        @else
                        <input type="submit" value="Subscribed"> 
                        @endif
                        @endforeach

                    </div><!-- end .col-md-2 -->
                </form>             
            </div><!-- end .row -->
            
            <div class="footer-middle">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget about-us">
                                <h3>About us</h3>
                                <p>Proin sed accumsan justo Morbi nec convallis dui in rhoncus sem Duis nec ipsum sagittis mattis turpis quis, luctus urna Fusce gravida dictum lectus ut interdum.</p>
                            </div><!-- end .about-us -->
                            <div class="social-widget-links">  
                                <ul class="list-unstyled list-inline">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul> 
                            </div>
                        </div><!-- end .col-md-3 -->
                        
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget twitter-widget">
                                <h3>Latest Tweets</h3>
                                <p class="clearfix">
                                    <span class="twittes-icon pull-left"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></span>
                                    <span class="twittes">Proin sed accumsan justo Morbi nec convallis dui in <a href="#">http://yourtwitternamehere/ourtwitternamehere</a> 1 hours ago</span>
                                </p>
                                <p class="clearfix">
                                    <span class="twittes-icon pull-left"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                                    </span><span class="twittes">Proin sed accumsan justo Morbi nec convallis dui in <a href="#">http://yourtwitternamehere/ourtwitternamehere</a> 1 hours ago</span>
                                </p>
                            </div><!-- end .about-us -->
                        </div><!-- end .col-md-3 -->
                        
                        <div class="col-md-3  col-sm-6">

                            
                            <div class="footer-widget latest-news">

                                <h3>Your Blog</h3>
                                @foreach($blog as $v_info)

                                <p class="pic1"><img style="height: 100px;width: 35%;" src="{{asset('uploads/blog/'.$v_info->image)}}"  alt="" class="img-responsive pull-left" /> <a href="#">{{ $v_info -> title }}</a> <span>{{ $v_info -> created_at }}</span></p>

                                @endforeach

                            </div><!-- end .about-us -->
                            

                        </div><!-- end .col-md-3 -->
                        
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget contact-info">
                                <h3>Contact Info</h3>
                                @foreach($agent as $v_info)
                                <div class="contact-info">
                                    <p class="clearfix">
                                        <span class="contact-icon pull-left"><i class="fa fa-map-marker fa-2x"></i></span>
                                        <span class="contact-details">Uttara, Dhaka, Bangladesh</span>
                                        
                                    </p>
                                    <p class="clearfix">
                                        <span class="contact-icon pull-left"><i class="fa fa-envelope fa-2x"></i></span>
                                        <span class="contact-details">{{ $v_info -> email }}</span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="contact-icon pull-left"><i class="fa fa-phone fa-2x"></i></span>
                                        <span class="contact-details">{{ $v_info -> phone }}</span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="contact-icon pull-left"><i class="fa fa-globe fa-2x"></i></span>
                                        <span class="contact-details">www.yourwebsite.com</span>
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
            </div><!-- end .footer-middle -->
        </div>
        
        <section class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 copy-right">
                        <p>Copyright &copy; 2017 <a href="http://ecologytheme.com/">Ecology Theme</a> All rights reserved</p>
                    </div><!-- end .col-md-6 -->
                    
                    <div class="col-md-6 col-sm-6 payment">
                        <ul class="list-unstyled list-inline">
                            <li><span>We Accept:</span></li>
                            <li><i class="fa fa-cc-paypal" aria-hidden="true"></i></li>
                            <li><i class="fa fa-cc-stripe" aria-hidden="true"></i></li>
                            <li><i class="fa fa-cc-visa" aria-hidden="true"></i></li>
                            <li><i class="fa fa-cc-mastercard" aria-hidden="true"></i></li>
                        </ul>
                    </div><!-- end .col-md-6 -->
                </div><!-- end .row -->
            </div><!-- end .containter -->
        </section>
    </div>
</footer><!-- /END FOOTER SECTION -->




    <!-- =========================
        SCRIPTS 
    ============================== -->


    <script src="{{asset('front/js/jquery.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.mixitup.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
    <script src="{{asset('front/js/owl.carousel.js')}}"></script>

    <script src="{{asset('front/js/wow.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.ajaxchimp.js')}}"></script>
    <script src="{{asset('front/js/jquery.magnific-popup.js')}}"></script>

    <script src="{{asset('front/js/bootstrap-datetimepicker.min.js')}}"></script> 


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
    {!! Toastr::message() !!}

    <script>
        $(function(){
            $('#datetimepicker1').datetimepicker({
                format: "dd mm yyyy - hh:mm P",
                showMeridian: true,
                autoclose: true,
                todayBtn: true
            });
        })
    </script>


</body>
</html>