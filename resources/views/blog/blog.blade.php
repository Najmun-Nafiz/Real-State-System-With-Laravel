@include('partial.header')

<!-- =========================
 Right Sidebar Blog Template
============================== -->
<section class="header-banner blog-banner">
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Blog Posts</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a class="active" href="#">Blog</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 blog-posts-area">
                <h2>Full Width Blog Template</h2>
                <div class="row blog-posts">

					@foreach($blogs as $v_info)
                    <div class="blog-single-post clearfix">
                        <div class="col-md-1 post-dates">
                            <span><i class="fa fa-calendar"></i> Aug</span>
                            <strong>27</strong>
                        </div>
                        <div class="col-md-3 post-thumbnails">
                            <a href="#">
                                <img style="height: 200px;width: 100%;" src="{{URL('uploads/blog/'.$v_info->image)}}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-8 single-post-content">
                            <h3 class="post-title">
                                <a href="{{ route('bolg_details', $v_info -> id) }}">{{ $v_info -> title }}</a>
                            </h3>
                            <p>{{ $v_info -> short_content }}</p>
                            <a href="{{ route('bolg_details', $v_info -> id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="center blog-pagination">
                    <ul class="list-unstyled list-inline">
                        <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#" class="active">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
            </div><!-- Blog Post Area Ends -->
        </div>
    </div>
</section><!-- Blog content ends -->

@include('partial.footer')