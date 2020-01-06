@include('partial.header')



<!-- =========================
Contact Us Page Header
============================== -->
<section class="header-banner">
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Contact Us</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a class="active" href="#">Contact Us</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================
Contact Details
============================== -->
<section class="contact-page-details">
    <div class="container">
        <div class="row">

            @foreach($contact_us as $v_info)
            <div class="col-md-4">
                <div class="contact-box clearfix">
                    <p class="col-sm-3"><i class="fa fa-map-marker fa-2x"></i></p>
                    <p class="col-sm-9">
                        <span class="contact-box-heading">Office Address</span>
                        <span>{{ $v_info -> address }}</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-box clearfix">
                    <p class="col-sm-3"><i class="fa fa-phone fa-2x"></i></p>
                    <p class="col-sm-9">
                        <span class="contact-box-heading">Phone Number</span>
                        <span>{{ $v_info -> local }}</span>
                        <span>{{ $v_info -> phone }}</span>
                        
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-box clearfix">
                    <p class="col-sm-3"><i class="fa fa-envelope fa-2x"></i></p>
                    <p class="col-sm-9">
                        <span class="contact-box-heading">Email Address</span>
                        <span>{{ $v_info -> email }}</span>
                        <span>{{ $v_info -> web_address }}</span>
                    </p>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

<!-- =========================
Contact Form
============================== -->
<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12 contact-form-holder">
                <h2>Say Hello! Don't be shy.</h2>
                
                <div id="contact">  
  

						<form method="post" action="contact_message" class="form-horizontal">
                            @csrf

							<div class="form-left col-sm-5">
								<input class="form-control" placeholder="Your Name" type="text" name="name" id="name" required>
								<input class="form-control" placeholder="Your Email" type="text" name="email" id="email" required>
								<input class="form-control" placeholder="Subject" type="text" name="subject" id="subject" required>
							</div>
							<div class="form-right col-sm-7">
								<textarea class="form-control" rows="3" placeholder="Type Your message" name="comments" id="comments" required ></textarea>
							</div>
							<div class="form-button col-sm-12">
                                                               
                                <input type="submit" class="btn btn-success" value="Send Message" name="submit">
							</div>


						</form>
				</div>
            </div>
        </div>
    </div>
</section>


@include('partial.footer')




