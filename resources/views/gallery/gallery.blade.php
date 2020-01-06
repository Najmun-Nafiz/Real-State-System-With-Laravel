@include('partial.header')

<!-- =========================
 Gallery Page Header
============================== -->
<section class="header-banner">
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Gallery</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a class="active" href="#">Gallery</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery-main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="section-heading">Photo <span>Gallery</span></h1>
				<p>Real estate is "property consisting of land and the buildings on it, along with its natural resources such as crops, minerals or water; immovable property of this nature; an interest vested in this (also) an item of real property, (more generally) buildings or housing in general. Also: the business of real estate; the profession of buying, selling, or renting land, buildings, or housing 
				</p>
			</div><!-- end .col-md-12 -->
		</div><!-- end .row --> 
		<div class="row">
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
                                <a href="{{ route('property_details', $v_info -> id) }}"><h3>{{ $v_info -> name }}</h3></a></div>
                            </figcaption>           
                        </figure>
                    </div><!-- End .mix -->
                @endforeach

                </div>
            </div><!-- end .col-md-12 -->
        </div><!-- end .row --> 
    </div><!-- end .container -->
		</div><!-- end .row --> 
	</div><!-- end .container -->
</section>


@include('partial.footer')