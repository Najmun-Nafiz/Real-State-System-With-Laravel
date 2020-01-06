@include('partial.header')


<!-- =========================
About Us Page Header
============================== -->
<section class="header-banner about-banner-bg">
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h2>About-Us</h2>
                </div>
                <div class="col-md-6 col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a class="active" href="#">About Us</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="who-we-are">
    <div class="container-fluid padding-fix">
        <div class="row">
        	@foreach($about_us as $v_info)
            <div class="col-md-6 padding-fix who-we-are-left">
                <div class="who-we-are-content">
                    <span>Who We Are & What We Do</span>
                    <h2>Who We Are</h2>
                    <p>{{ $v_info -> content }}</a>
                </div>
            </div>
            <div class="col-md-6 padding-fix who-we-are-right"><img  src="{{URL('uploads/about_us/'.$v_info->image)}}" alt="" class="img-responsive"></div>
            @endforeach
        </div>
    </div>
</section>



@include('partial.footer')