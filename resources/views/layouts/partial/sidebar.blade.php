

<aside class="sidebar ">
                <div class="scrollbar">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="{{asset('back/demo/img/najmun.jpg')}}" alt="">
                            <div>
                                <div class="user__name">{{ Auth::user()->name }}</div>
                                <div class="user__email">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="dropdown-menu dropdown-menu--invert">
                            <a class="dropdown-item" href="#">View Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li class="navigation__active {{Request::is('admin/back*')? 'active':''}}"><a href=" {{ route('admin.back') }}"><i class="zwicon-home"></i> Home</a></li>

                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/header*')? 'active':''}}" href="#"><i class="zwicon-three-h"></i> Header</a>

                            <ul>
                                <li><a href="{{ route('admin.header.index') }}">All Header</a></li>
                                <li><a href="{{ route('admin.header.create') }}">Add Header</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/slider*')? 'active':''}}" href="#"><i class="zwicon-film-alt"></i> Slider</a>

                            <ul>
                                <li><a href="{{ route('admin.slider.index') }}">All Slider</a></li>
                                <li><a href="{{ route('admin.slider.create') }}">Add Slider</a></li>
                            </ul>
                        </li>


                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/appoinment*')? 'active':''}}" href="#"><i class="zwicon-desktop-2"></i> Appoinment</a>

                            <ul>
                                <li><a href="{{ route('admin.appoinment.index') }}">All Appoinment </a></li>

                            </ul>
                        </li>


                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/property*')? 'active':''}}" href="#"><i class="zwicon-three-v"></i> About Property</a>

                            <ul>
                                <li><a href="{{ route('admin.property.index') }}">All Property</a></li>
                                <li><a href="{{ route('admin.property.create') }}">Add Property</a></li>
                            </ul>
                        </li>


                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/property_details_cetegory*')? 'active':''}}" href="#"><i class="zwicon-shape-octagonal"></i> About Property Details Category</a>

                            <ul>
                                <li><a href="{{ route('admin.property_details_cetegory.index') }}">All Property Details Category</a></li>
                                <li><a href="{{ route('admin.property_details_cetegory.create') }}">Add Property Details Category</a></li>
                            </ul>
                        </li>

                        
                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/property_detail*')? 'active':''}}" href="#"><i class="zwicon-desktop-2"></i> About Property Details</a>

                            <ul>
                                <li><a href="{{ route('admin.property_detail.index') }}">All Property Details</a></li>
                                <li><a href="{{ route('admin.property_detail.create') }}">Add Property Details</a></li>
                            </ul>
                        </li>


                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/homecategory*')? 'active':''}}" href="#"><i class="zwicon-desktop-2"></i> Home Category</a>

                            <ul>
                                <li><a href="{{ route('admin.homecategory.index') }}">All Category</a></li>
                                <li><a href="{{ route('admin.homecategory.create') }}">Add Category</a></li>
                            </ul>
                        </li>



                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/homecategory*')? 'active':''}}" href="#"><i class="zwicon-stand-up"></i> Home Details</a>

                            <ul>

                                <li class="navigation__sub">
                                    <a class="{{Request::is('admin/homeaddress*')? 'active':''}}" href="#"><i class="zwicon-slider-circle-v" style="font-size: 20px;"></i> Home Address</a>

                                    <ul>
                                        <li><a href="{{ route('admin.homeaddress.index') }}">All Address</a></li>
                                        <li><a href="{{ route('admin.homeaddress.create') }}">Add Address</a></li>
                                        
                                    </ul>
                                </li>

                                <li><a href="{{ route('admin.homedetails.index') }}">All Details</a></li>
                                <li><a href="{{ route('admin.homedetails.create') }}">Add Details</a></li>
                                
                            </ul>
                        </li>


                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/late_property*')? 'active':''}}" href="#"><i class="zwicon-desktop-2"></i> Latest_Property</a>
 
                            <ul>
                                <li><a href="{{ route('admin.late_property.index') }}">All Latest_Property</a></li>
                                <li><a href="{{ route('admin.late_property.create') }}">Add Latest_Property</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a href="#"><i class="zwicon-note"></i> Agent</a>

                            <ul>
                                <li><a href="{{ route('admin.agent.index') }}">All Agent</a></li>
                                <li><a href="{{ route('admin.agent.create') }}">Add Agent</a></li>
                                <li><a href="{{ route('admin.agentcontact.message') }}"> Agent Contact</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a href="#"><i class="zwicon-cursor-square"></i> User Subscripton</a>

                            <ul>
                                <li><a href="{{ route('admin.users.index') }}">All Subscriber</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/blog*')? 'active':''}}" href="#"><i class="zwicon-desktop-2"></i> Blogs</a>
 
                            <ul>
                                <li><a href="{{ route('admin.blog.index') }}">All Blog</a></li>
                                <li><a href="{{ route('admin.blog.create') }}">Add Blog</a></li>
                            </ul>
                        </li>


                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/testimonial*')? 'active':''}}" href="#"><i class="zwicon-desktop-2"></i> Testimonial</a>
 
                            <ul>
                                <li><a href="{{ route('admin.testimonial.index') }}">All Testimonial</a></li>
                                <li><a href="{{ route('admin.testimonial.create') }}">Add Testimonial</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/about_us*')? 'active':''}}" href="#"><i class="zwicon-shape-octagonal"></i> About-Us</a>
 
                            <ul>
                                <li><a href="{{ route('admin.about_us.index') }}">All About-Us</a></li>
                                <li><a href="{{ route('admin.about_us.create') }}">Add About-Us</a></li>
                            </ul>
                        </li>


                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/contact_us*')? 'active':''}}" href="#"><i class="zwicon-three-h"></i> Contact-Us</a>

                            <ul>
                                <li><a href="{{ route('admin.contact_us.index') }}">All Contact_Us</a></li>
                                <li><a href="{{ route('admin.contact_us.create') }}">Add Contact_Us</a></li>
                            </ul>
                        </li>


                        <li class="navigation__sub">
                            <a class="{{Request::is('admin/homecategory*')? 'active':''}}" href="#"><i class="zwicon-stand-up"></i>  Footer</a>

                            <ul>

                                <li class="navigation__sub">
                                    <a class="{{Request::is('admin/aboutus*')? 'active':''}}" href="#"><i class="zwicon-slider-circle-v" style="font-size: 20px;"></i>  About-Us</a>

                                    <ul style="margin-left: 20px;">
                                        <li><a href="{{ route('admin.aboutus.index') }}">All About-Us</a></li>
                                        <li><a href="{{ route('admin.aboutus.create') }}">Add About-Us</a></li>
                                        
                                    </ul>
                                </li>


                                <li class="navigation__sub">
                                    <a class="{{Request::is('admin/lattesttwit*')? 'active':''}}" href="#"><i class="zwicon-slider-circle-v" style="font-size: 20px;"></i>  Latest-Twitts</a>

                                    <ul style="margin-left: 20px;">
                                        <li><a href="{{ route('admin.lattesttwit.index') }}">All Twitts</a></li>
                                        <li><a href="{{ route('admin.lattesttwit.create') }}">Add Twitts</a></li>
                                        
                                    </ul>
                                </li>


                                <li class="navigation__sub">
                                    <a class="{{Request::is('admin/homeaddress*')? 'active':''}}" href="#"><i class="zwicon-slider-circle-v" style="font-size: 20px;"></i>  Your-Blog</a>

                                    <ul style="margin-left: 20px;">
                                        <li><a href="{{ route('admin.homeaddress.index') }}">All Blog</a></li>
                                        <li><a href="{{ route('admin.homeaddress.create') }}">Add Blog</a></li>
                                        
                                    </ul>
                                </li>


                                <li class="navigation__sub">
                                    <a class="{{Request::is('admin/contactinfo*')? 'active':''}}" href="#"><i class="zwicon-slider-circle-v" style="font-size: 20px;"></i>  Contact-Info</a>

                                    <ul style="margin-left: 20px;">
                                        <li><a href="{{ route('admin.contactinfo.index') }}">All Contact-Info</a></li>
                                        <li><a href="{{ route('admin.contactinfo.create') }}">Add Contact-Info</a></li>
                                        
                                    </ul>
                                </li>

                                
                                
                            </ul>
                        </li>


                        
                    </ul>
                </div>




            <div class="themes">
                <div class="scrollbar">
                    <a href="#" class="themes__item active" data-sa-value="1"><img src="{{asset('back/resources/img/bg/1.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="2"><img src="{{asset('back/resources/img/bg/2.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="3"><img src="{{asset('back/resources/img/bg/3.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="4"><img src="{{asset('back/resources/img/bg/4.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="5"><img src="{{asset('back/resources/img/bg/5.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="6"><img src="{{asset('back/resources/img/bg/6.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="7"><img src="{{asset('back/resources/img/bg/7.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="8"><img src="{{asset('back/resources/img/bg/8.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="9"><img src="{{asset('back/resources/img/bg/9.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="10"><img src="{{asset('back/resources/img/bg/10.jpg')}}" alt=""></a>
                </div>
            </div>


</aside>