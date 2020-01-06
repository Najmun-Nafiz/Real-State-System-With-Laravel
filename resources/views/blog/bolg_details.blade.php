@include('partial.header')

<!-- =========================
 Single Property Page Header
============================== -->
<section class="header-banner single-property-banner">
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Blog Details</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a class="active" href="#">Blog Name</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================
 Single Property Content
============================== -->
<section class="single-property">
	<div class="container">
		<div class="row">
			@foreach($bolg_details as $key => $v_info)
			<div class="col-sm-8">
				<div class="property-name">
					<h2>{{ $v_info -> title }}</h2>
				</div>
			</div>
			

			
			<div class="col-sm-12">
				<div class="property-gallery">
					<img  src="{{asset('uploads/blog/'.$v_info->image)}}" alt="" />
					
					<div class="property-share">
					    <ul class="list-unstyled">
					        <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
					        <li><a href="#"><i class="fa fa-heart"></i></a></li>
					        <li><a href="#"><i class="fa fa-print"></i></a></li>
					    </ul>
					</div>
				</div>
			</div>
			
			<div class="col-sm-9 single-property-details">
                <div class="property-description">
                    <h2 class="pd-title">Description</h2>
                    <p>{{ $v_info -> content }}</p>
                </div><!-- End Property Description -->

			</div><!-- End property details -->

			@endforeach



			
			<aside class="col-sm-3">
			    <div class="sidebar-widget">
                    <h3 class="widget-title">Recent Properties</h3>
                    <div class="widget-content">
                        <div class="small-property-list">
						@foreach($lattest_blog as $v_info)

                            <div class="small-property clearfix">
                                <div class="property-small-picture col-sm-12 col-md-4">
                                    <a href="{{ route('bolg_details', $v_info -> id) }}">
                                        <img src="{{asset('uploads/blog/'.$v_info->image)}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="property-small-content col-sm-12 col-md-8">
                                    <p><a href="{{ route('bolg_details', $v_info -> id) }}">{{ $v_info -> title }}</a></p>
                                </div>
                            </div><!-- Small Property Ends -->

						@endforeach
                        </div>
                    </div><!-- Widget content Ends -->
                </div><!-- Sidebar Widget Ends -->
			</aside>
			

		</div>
	</div><!-- End container -->
</section>

@include('partial.footer')