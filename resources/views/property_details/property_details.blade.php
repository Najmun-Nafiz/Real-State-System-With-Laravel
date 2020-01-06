@include('partial.header')

<!-- =========================
 Single Property Page Header
============================== -->
<section class="header-banner single-property-banner">
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Property Name</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a class="active" href="#">Property Name</a></li>
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
			@foreach($details as $key => $v_info)
			<div class="col-sm-8">
				<div class="property-name">
					<h2>{{ $v_info -> category -> name }} <span> For Sale</span> <span>Open House</span></h2>
					<p>{{ $v_info -> name }}</p>
				</div>
			</div>
			@endforeach
			<div class="col-sm-4">
				<div class="property-price">
					<h2>{{ $v_info -> rate }}</h2>
				</div>
			</div>
			
			<div class="col-sm-12">
				<div class="property-gallery">
					<img src="{{asset('uploads/homedetails/'.$v_info->image)}}" alt="" />
					<div class="property-agent">
						<div class="agent-media clearfix">
							<img src="{{asset('front/images/women-agent-2.jpg')}}" alt="" class="pull-left" />
							<ul>
							    <li>Contact Agent</li>
							    <li><i class="fa fa-user"></i> Brittany Watkins</li>
							    <li><i class="fa fa-phone"></i> 321 456 9874</li>
							    <li><a href="#">View My Listings</a></li>
							</ul>
						</div>
						<form action="#">
							<input type="text" placeholder="Your Name">
							<input type="text" placeholder="Phone">
							<input type="email" placeholder="Email">
							<textarea placeholder="Hello, I am interested in [Sigle Family Home]..."></textarea>
							<input type="submit" value="Request Info">
						</form>
					</div>
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
                
                <div class="property-location">
                   <h2 class="pd-title">Address</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            <ul>
                                <li><strong>Address:</strong> {{ $v_info -> address }}</li>
                                <li><strong>Country:</strong> {{ $v_info -> country }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <ul>
                                <li><strong>Zip/Postal Code:</strong> {{ $v_info -> postal_code }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <ul>
                                
                                <li><strong>City:</strong> {{ $v_info -> city }}</li>
                            </ul>
                        </div>
                    </div>
                </div><!-- End Property Location -->
                
                <div class="property-details-list">
                    <h2 class="pd-title">Details</h2>
                    <div class="alert alert-success">
                        <ul class="list-details">
                            <li><strong>Property ID:</strong> {{ $v_info -> property_id }}</li>
                            <li><strong>Price:</strong> {{ $v_info -> rate }}</li>
                            <li><strong>Property Size:</strong> {{ $v_info -> property_space }}</li>
                            <li><strong>Bedrooms:</strong> {{ $v_info -> bedroom }}</li>
                            <li><strong>Bathrooms:</strong> {{ $v_info -> bathroom }}</li>
                            <li><strong>Garage:</strong> {{ $v_info -> garaze }}</li>
                            <li><strong>Garage Size:</strong> {{ $v_info -> garaze_space }}</li>
                            <li><strong>Year Built:</strong> {{ $v_info -> year }}</li>
                        </ul>
                    </div>
                </div><!-- End Property details List -->

			</div><!-- End property details -->



			
			<aside class="col-sm-3">
			    <div class="sidebar-widget">
                    <h3 class="widget-title">Recent Properties</h3>
                    <div class="widget-content">
                        <div class="small-property-list">
						@foreach($lattest_property as $v_info)

                            <div class="small-property clearfix">
                                <div class="property-small-picture col-sm-12 col-md-4">
                                    <a href="#">
                                        <img src="{{asset('uploads/homedetails/'.$v_info->image)}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="property-small-content col-sm-12 col-md-8">
                                    <h4><a href="{{ route('property_details', $v_info -> id) }}">{{ $v_info -> name }}</a></h4>
                                    <p><span>{{ $v_info -> rate }}</p>
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