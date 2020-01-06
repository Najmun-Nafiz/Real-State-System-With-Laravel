@include('partial.header')
    
<!-- =========================
   Intro Carousel
============================== -->
<section class="intro-carousel wow fadeIn">
    <div class="container-fluid padding-fix">
        <div id="intro-carousel-inner" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">


                @foreach($slider as $v_info)
                <div class="item active" style="height: 500px;">
                    <img src="{{URL('uploads/slider/'.$v_info->image)}}"/>
                    <div class="container bottom-intro">
                        <div class="row">
                            <div class="col-md-4 duplex fadincss" style="height: 200px;">
                                <span><a href="#">{{ $v_info -> name }}</a></span>
                                <span>{{ $v_info -> address }}</span>
                            </div>
                            <div class="col-md-3 bedrooms fadincss" style="height: 200px;">
                                <p><span class="room-inner-details">{{ $v_info -> space }}</span> Area Sq.Ft</p>
                                <p><span class="room-inner-details">{{ $v_info -> bed }}</span> Bedrooms</p>
                                <p><span class="room-inner-details">{{ $v_info -> bath }}</span> Bathrooms</p>
                                <p><span class="room-inner-details">{{ $v_info -> garaze }}</span> Garages</p>
                            </div>
                            <div class="col-md-3 price fadincss" style="height: 200px;">
                                <p>{{ $v_info -> price }}</p>
                            </div>
                            <div class="col-md-2 details fadincss" style="height: 200px;">
                                <a style="height: 200px;" href="#">View Details</a>
                            </div> 
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <a class="left carousel-control" href="#intro-carousel-inner" data-slide="prev"><span><i class="fa fa-angle-left"></i></span></a>
            <a class="right carousel-control" href="#intro-carousel-inner" data-slide="next"><span><i class="fa fa-angle-right"></i></span></a>
        </div>
    </div>
</section>

<!-- =========================
    About
============================== -->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="section-heading wow fadeInUp">About <span>Property</span></h1>
            <p class="wow fadeInUp">
                One of the most difficult rooms to design tends to be the bedroom, especially if it's small. So, here's what you need to know to arrange furniture. Perspective is a drawing technique that shows objects in all their 3-D ... You just need to know your terminology and where to place your lines.This kitchen essentials list has everything you need. ... Pick up this "steal of a deal" pot and relax knowing you purchased a high-quality item at a fantastic price.
            </p>
            </div>
        </div>
    </div>
</section>

<!-- =========================
   Property 
============================== -->

@foreach($property as $v_info)
<section class="property">
    <div class="container-fluid property">
        <div class="row">
            <div class="col-md-3 col-sm-6 padding-fix">
                <div class="drawing-room wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.2s">
                    <img style="width: 100%;height: 260px;" src="{{URL('uploads/property_show/'.$v_info->dining)}}" alt="" class="img-responsive">
                    <div class="property-bottom">
                        <p>Drawing Room</p>
                    </div>
                </div>
            </div><!-- end .col-md-3 -->
            <div class="col-md-3 col-sm-6 padding-fix">
                <div class="dining-room wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.3s">
                    <img style="width: 100%;height: 260px;" src="{{URL('uploads/property_show/'.$v_info->bed)}}" alt="" class="img-responsive">
                    <div class="property-bottom">
                        <p>Dining Room</p>
                    </div>
                </div>
            </div><!-- end .col-md-3 -->
            <div class="col-md-3 col-sm-6 padding-fix">
                <div class="bed-room wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.4s">
                    <img style="width: 100%;height: 260px;" src="{{URL('uploads/property_show/'.$v_info->drawing)}}" alt="" class="img-responsive">
                    <div class="property-bottom">
                        <p>Bed Room</p>
                    </div>
                </div>
            </div><!-- end .col-md-3 -->
            <div class="col-md-3 col-sm-6 padding-fix">
                <div class="kitchen-room wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.5s">
                    <img style="width: 100%;height: 260px;" src="{{URL('uploads/property_show/'.$v_info->kitchen)}}" alt="" class="img-responsive">
                    <div class="property-bottom">
                        <p>Kitchen Room</p>
                    </div>
                </div>
            </div><!-- end .col-md-3 -->
        </div>
    </div>
</section><!-- end property section -->

@endforeach

<!-- =========================



=========================
    Property Details
============================== -->
<section class="property-details">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
               <div class="property-detail">
                    <h2>Property Details</h2>


                    <div id="content">

                        <!-- Tabs Nav -->
                        <ul id="tabs" class="" data-tabs="tabs">
                            @foreach($propertyCategory as $key => $v_info)
                            <li ><a class="filter" href="#{{ $v_info -> id }}" data-toggle="tab">{{ $v_info -> name }}</a></li>
                            @endforeach
                        </ul>
                        
                        <!-- Tabs Content -->
                        <div id="my-tab-content" class="tab-content">

                             <div class="tab-pane active" id="1">
                                <p>Except here's the problem — many of those questions are just flat knowing a fact that often doesn't have to do with the job. Should I judge someone on their. 4 bedroom flat. ... Knowing much about Building tell me d necessary arrangements. · 2y · Godstime Nzube Very good, interested in building work because that is ...</p>
                            </div><!-- End tabe-pane -->

                            @foreach($propertyDetail as $key => $v_info)
                            <div class="tab-pane" id="{{ $v_info -> category -> id }}">
                                <p>{{ $v_info -> content }}</p>
                            </div><!-- End tabe-pane -->
                            @endforeach

                            
                        </div><!-- End Tab Content -->
                    </div>


                </div><!-- end .property-details -->    
            </div><!-- end .col-md-6 -->
            
            <div class="col-md-6 property-pic wow fadeInUp" data-wow-delay="0.4s">
                <img src="{{asset('front/images/property-details-pic.jpg')}}" class="img-responsive" alt="">

            </div><!-- end .col-md-6 -->
            
        </div><!-- end .row -->
    </div><!-- end .container-fluid -->
</section><!-- end .property-details section -->

<!-- =========================
    Photo Gallery
============================== -->
<section class="photo-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="0s">Photo <span>Gallery</span></h1>
                <p>
                    Real estate is "property consisting of land and the buildings on it, along with its natural resources such as crops, minerals or water; immovable property of this nature; an interest vested in this (also) an item of real property, (more generally) buildings or housing in general. Also: the business of real estate; the profession of buying, selling, or renting land, buildings, or housing
                </p>
            </div>
        </div>
    </div><!-- End Container -->
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="controls">
                        <button class="filter" data-filter="all">All</button>

                        @foreach($houseCategory as $v_info)
                        
                        <button class="filter" data-filter="#{{ $v_info -> id }}">{{ $v_info -> name }}</button>
                       
                        @endforeach

                </div>


                <div id="container-mix" class="container-mix grid-effect">

                @foreach($houseDetail as $v_info)
                    <div id="{{ $v_info -> category -> id }}" class="mix bathroom col-md-4 col-sm-6 padding-fix" data-myorder="2">
                        <figure class="effect-zoe">
                            <img style="height: 270px;width: 100%;" src="{{asset('uploads/homedetails/'.$v_info->image)}}" alt="img25"/>
                            <figcaption>
                                <div><a href="images/image2.png" class="preview-btn"><i class="fa fa-search"></i></a>
                                <a href="#"><h3>{{ $v_info -> name }}</h3></a></div>
                            </figcaption>           
                        </figure>
                    </div><!-- End .mix -->
                @endforeach

                </div>
            </div><!-- end .col-md-12 -->
        </div><!-- end .row --> 
    </div><!-- end .container -->
</section><!-- END .about --> 


<!-- =========================
   Latest Property
============================== -->
<section class="latest-property">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div class="property">
                    <h1 class="section-heading wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="0s">Latest <span>Properties</span></h1>
                    <p class="section-desc wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="0s">For find out the lattest property you can very easily access from here. Any kind of real state property here will be advertise.</p> 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Property List -->

<section class="property-lists">
    <div class="container">
        <div class="row">

            @foreach($lattest_property as $v_info)
            <div class="col-md-4 col-sm-6 wow fadeInUp">
                <div class="">
                    <img style="height: 240px;width: 100%;" src="{{asset('uploads/homedetails/'.$v_info->image)}}" alt="img25"/>
                </div><!-- end .latest-pic -->
                <div class="latest-pic-bottom">
                    <div class="pic-address">{{ $v_info -> address }} <span>{{ $v_info -> rate }}</span></div><!-- end .pic-address --> 
                    <div class="description-wrap">
                        <div class="pic-description">
                            <h3><a href="{{ route('property_details', $v_info -> id) }}">{{ $v_info -> name }}</a></h3>
                            <p>For Details knowing of this property please click on this property.
                        </div><!-- end .pic-description -->
                        <div class="pic-mesure">
                            <span><i class="fa fa-object-group"></i>{{ $v_info -> property_space }}</span>
                            <span><i class="fa fa-bed"></i>{{ $v_info -> bedroom }} Bedroom</span>
                            <span><i class="fa fa-retweet"></i> {{ $v_info -> bathroom }} Bathroom</span> 
                        </div><!-- end .pic-mesure -->
                    </div><!-- end .desctription-wrapper -->
                </div> <!-- end .latest-pic-bottom -->       
            </div><!-- end .col-md-4 -->
            @endforeach
            
        </div><!-- end .row -->  
    </div><!-- end .container --> 
</section>

<!-- =========================
    contract
============================== -->
<section class="contract-section" id="contact-agent">
    <div class="container">
        <div class="contract-border">
            <div class="contract">
                <div class="row">
                    <div class="col-md-4 col-sm-12 contract-left wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0s">
                        <h2>Contract Agent</h2>
                        <form action="{{ route('agent.contact') }}" method="post">
                            @csrf
                            <p><input type="text" placeholder="NAME" name="name"></p>
                            <p><input type="email" placeholder="E-mail" name="email"></p>
                            <p><textarea Placeholder="MASSAGE" name="message"></textarea></p>
                            <input class="submit" type="submit" value="SEND" name="submit">
                        </form>
                    </div><!-- end .col-md-4 -->

                    @foreach($agent as $v_info)
                    <div class="col-md-4 col-sm-6 wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.4s">
                        <div class="contract-right">

                            
                            <h2>{{ $v_info -> name }}</h2>
                            <h3>{{ $v_info -> profession }}</h3>
                            <p>{{ $v_info -> content }}</p>
                            <span>{{ $v_info ->phone }} <i class="fa fa-phone"></i></span>
                            <span>{{ $v_info -> email }} <i class="fa fa-envelope"></i></span>
                            <div class="contract-social header-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div><!-- end .contract-social -->
                           

                        </div>
                    </div><!-- end .col-md-5 -->
                    
                    <div class="col-md-4 contract-pic col-sm-6 wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.6s">
                        <img style="margin-top: 10%;" src="{{asset('uploads/agent/'.$v_info->image)}}" alt="" />
                    </div><!-- end .col-md-4 -->  

                     @endforeach
    
                </div><!-- end .row -->
            </div><!-- end .col-md-8 -->
        </div><!-- end .row -->
    </div><!-- end .container-fluid -->
</section>

<!-- =========================
    Sell Property
============================== -->
<section class="sell-property">
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
            
                <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="call-us">
                        <h3>Do you want ot sell your property</h3>
                        <span>Call us and list your property here</span>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 sell-contact wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    @foreach($agent as $v_info)
                    <span>{{ $v_info -> phone }}</span><a href="#">Just Contact us</a>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</section>



<!-- =========================
    Testimonials
============================== -->
<section class="testimonials"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div class="testimonials-title">
                    <h1 class="section-heading wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="0s">Testi<span>Monials</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid padding-fix">
    <div class="row">
        <div id="testimonial-carousel" class="testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">


             @foreach($testimonial as $v_info)
            <div class="col-md-4 width-fix">
                <div class="testimonial-comment">
                    <p>{{ $v_info -> content }}</p>
                </div>
                <div class="testimonial-author">
                    <img style="height: 100px;width: 100px;" src="{{asset('uploads/testimonial/'. $v_info -> image)}}" alt="" class="img-circle">
                    <p>
                        <span class="tauthor-name">{{ $v_info -> name }}</span>
                        <span class="tauthor-role">{{ $v_info -> carrier }}</span>
                    </p>
                </div>
            </div><!-- End .col-md-4 -->
            @endforeach

    </div>
</div>

@include('partial.footer')