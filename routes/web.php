<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/about_us', 'HomeController@about_us')->name('about_us');

Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/bolg_details/{id}', 'HomeController@bolg_details')->name('bolg_details');

Route::get('/gallery', 'HomeController@gallery')->name('gallery');

Route::post('/appoinment/store', 'Admin\Appoinment\AppoinmentController@store')->name('appoinment.store');

Route::post('/agent/contact', 'Admin\Agent\AgentController@contact')->name('agent.contact');

Route::get('/property_details/{id}', 'HomeController@property_details')->name('property_details');

Route::get('/contact_us', 'HomeController@contact_us')->name('contact_us');

Route::post('/contact_message', 'Admin\Contact_Us\Contact_UsController@contact_message')->name('contact_message');


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin','as' => 'admin.'], function(){

	Route::get('/', 'DashboardController@index');
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/dashboard', 'DashboardController@index')->name('back');


	//Header Controller Start Now................
	Route::resource('/header', 'Header\HeaderController');
	Route::get('/header/create', 'Header\HeaderController@create')->name('header.create');
	Route::post('/header/store', 'Header\HeaderController@store')->name('header.store');
	Route::get('/header/edit/{id}', 'Header\HeaderController@edit')->name('header.edit');

	Route::post('/header/update/{id}', 'Header\HeaderController@update')->name('header.update');
	Route::get('/header/delete/{id}', 'Header\HeaderController@destroy')->name('header.destroy');

	Route::get('/header/active/{id}', 'Header\HeaderController@active')->name('header.active');
	Route::get('/header/unactive/{id}', 'Header\HeaderController@unactive')->name('header.unactive');


	//Slider Controller Start Now................
	Route::resource('/slider', 'Slider\SliderController');
	Route::get('/slider/create', 'Slider\SliderController@create')->name('slider.create');
	Route::post('/slider/store', 'Slider\SliderController@store')->name('slider.store');
	Route::get('/slider/edit/{id}', 'Slider\SliderController@edit')->name('slider.edit');

	Route::post('/slider/update/{id}', 'Slider\SliderController@update')->name('slider.update');
	Route::get('/slider/delete/{id}', 'Slider\SliderController@destroy')->name('slider.destroy');

	Route::get('/slider/active/{id}', 'Slider\SliderController@active')->name('slider.active');
	Route::get('/slider/unactive/{id}', 'Slider\SliderController@unactive')->name('slider.unactive');


	//About-Property Controller Start Now................
	Route::resource('/property', 'Property\PropertyController');
	Route::get('/property/create', 'Property\PropertyController@create')->name('property.create');
	Route::post('/property/store', 'Property\PropertyController@store')->name('property.store');
	Route::get('/property/edit/{id}', 'Property\PropertyController@edit')->name('property.edit');

	Route::post('/property/update/{id}', 'Property\PropertyController@update')->name('property.update');
	Route::get('/property/delete/{id}', 'Property\PropertyController@destroy')->name('property.destroy');

	Route::get('/property/active/{id}', 'Property\PropertyController@active')->name('property.active');
	Route::get('/property/unactive/{id}', 'Property\PropertyController@unactive')->name('property.unactive');



	//About-Property_Details_Category Controller Start Now................
	Route::resource('/property_details_cetegory', 'Property_Details_Cetegory\Property_Details_CategoryController');
	Route::get('/property_details_cetegory/create', 'Property_Details_Cetegory\Property_Details_CategoryController@create')->name('property_details_cetegory.create');
	Route::post('/property_details_cetegory/store', 'Property_Details_Cetegory\Property_Details_CategoryController@store')->name('property_details_cetegory.store');
	Route::get('/property_details_cetegory/edit/{id}', 'Property_Details_Cetegory\Property_Details_CategoryController@edit')->name('property_details_cetegory.edit');

	Route::post('/property_details_cetegory/update/{id}', 'Property_Details_Cetegory\Property_Details_CategoryController@update')->name('property_details_cetegory.update');
	Route::get('/property_details_cetegory/delete/{id}', 'Property_Details_Cetegory\Property_Details_CategoryController@destroy')->name('property_details_cetegory.destroy');

	Route::get('/property_details_cetegory/active/{id}', 'Property_Details_Cetegory\Property_Details_CategoryController@active')->name('property_details_cetegory.active');
	Route::get('/property_details_cetegory/unactive/{id}', 'Property_Details_Cetegory\Property_Details_CategoryController@unactive')->name('property_details_cetegory.unactive');



	//About-Property_Details Controller Start Now................
	Route::resource('/property_detail', 'Property_Deatails\Property_DetailsController');
	Route::get('/property_detail/create', 'Property_Deatails\Property_DetailsController@create')->name('property_detail.create');
	Route::post('/property_detail/store', 'Property_Deatails\Property_DetailsController@store')->name('property_detail.store');
	Route::get('/property_detail/edit/{id}', 'Property_Deatails\Property_DetailsController@edit')->name('property_detail.edit');

	Route::post('/property_detail/update/{id}', 'Property_Deatails\Property_DetailsController@update')->name('property_detail.update');
	Route::get('/property_detail/delete/{id}', 'Property_Deatails\Property_DetailsController@destroy')->name('property_detail.destroy');

	Route::get('/property_detail/active/{id}', 'Property_Deatails\Property_DetailsController@active')->name('property_detail.active');
	Route::get('/property_detail/unactive/{id}', 'Property_Deatails\Property_DetailsController@unactive')->name('property_detail.unactive');



	//About-Home Category Controller Start Now................
	Route::resource('/homecategory', 'Homecategory\CategoryController');
	Route::get('/homecategory/create', 'Homecategory\CategoryController@create')->name('homecategory.create');
	Route::post('/homecategory/store', 'Homecategory\CategoryController@store')->name('homecategory.store');
	Route::get('/homecategory/edit/{id}', 'Homecategory\CategoryController@edit')->name('homecategory.edit');

	Route::post('/homecategory/update/{id}', 'Homecategory\CategoryController@update')->name('homecategory.update');
	Route::get('/homecategory/delete/{id}', 'Homecategory\CategoryController@destroy')->name('homecategory.destroy');

	Route::get('/homecategory/active/{id}', 'Homecategory\CategoryController@active')->name('homecategory.active');
	Route::get('/homecategory/unactive/{id}', 'Homecategory\CategoryController@unactive')->name('homecategory.unactive');



	//About-Home Details Controller Start Now................
	Route::resource('/homedetails', 'Homedetails\DetailsController');
	Route::get('/homedetails/create', 'Homedetails\DetailsController@create')->name('homedetails.create');
	Route::post('/homedetails/store', 'Homedetails\DetailsController@store')->name('homedetails.store');
	Route::get('/homedetails/edit/{id}', 'Homedetails\DetailsController@edit')->name('homedetails.edit');

	Route::post('/homedetails/update/{id}', 'Homedetails\DetailsController@update')->name('homedetails.update');
	Route::get('/homedetails/delete/{id}', 'Homedetails\DetailsController@destroy')->name('homedetails.destroy');

	Route::get('/homedetails/active/{id}', 'Homedetails\DetailsController@active')->name('homedetails.active');
	Route::get('/homedetails/unactive/{id}', 'Homedetails\DetailsController@unactive')->name('homedetails.unactive');


	//About-Home Address Controller Start Now................
	Route::resource('/homeaddress', 'Homedetails\Homeaddress\DetailsAddressController');
	Route::get('/homeaddress/create', 'Homedetails\Homeaddress\DetailsAddressController@create')->name('homeaddress.create');
	Route::post('/homeaddress/store', 'Homedetails\Homeaddress\DetailsAddressController@store')->name('homeaddress.store');
	Route::get('/homeaddress/edit/{id}', 'Homedetails\Homeaddress\DetailsAddressController@edit')->name('homeaddress.edit');

	Route::post('/homeaddress/update/{id}', 'Homedetails\Homeaddress\DetailsAddressController@update')->name('homeaddress.update');
	Route::get('/homeaddress/delete/{id}', 'Homedetails\Homeaddress\DetailsAddressController@destroy')->name('homeaddress.destroy');

	Route::get('/homeaddress/active/{id}', 'Homedetails\Homeaddress\DetailsAddressController@active')->name('homeaddress.active');
	Route::get('/homeaddress/unactive/{id}', 'Homedetails\Homeaddress\DetailsAddressController@unactive')->name('homeaddress.unactive');


	//About-Latest Property  Controller Start Now................
	Route::resource('/late_property', 'Late_Property\LatePropController');
	Route::get('/late_property/create', 'Late_Property\LatePropController@create')->name('late_property.create');
	Route::post('/late_property/store', 'Late_Property\LatePropController@store')->name('late_property.store');
	Route::get('/late_property/edit/{id}', 'Late_Property\LatePropController@edit')->name('late_property.edit');

	Route::post('/late_property/update/{id}', 'Late_Property\LatePropController@update')->name('late_property.update');
	Route::get('/late_property/delete/{id}', 'Late_Property\LatePropController@destroy')->name('late_property.destroy');

	Route::get('/late_property/active/{id}', 'Late_Property\LatePropController@active')->name('late_property.active');
	Route::get('/late_property/unactive/{id}', 'Late_Property\LatePropController@unactive')->name('late_property.unactive');


	//About-Latest Property  Controller Start Now................
	Route::resource('/agent', 'Agent\AgentController');
	Route::get('/agent/create', 'Agent\AgentController@create')->name('agent.create');
	Route::post('/agent/store', 'Agent\AgentController@store')->name('agent.store');
	Route::get('/agent/edit/{id}', 'Agent\AgentController@edit')->name('agent.edit');

	Route::post('/agent/update/{id}', 'Agent\AgentController@update')->name('agent.update');
	Route::get('/agent/delete/{id}', 'Agent\AgentController@destroy')->name('agent.destroy');

	Route::get('/agent/active/{id}', 'Agent\AgentController@active')->name('agent.active');
	Route::get('/agent/unactive/{id}', 'Agent\AgentController@unactive')->name('agent.unactive');


	
	Route::get('/agentcontact/message', 'Agent\AgentController@message')->name('agentcontact.message');

	Route::get('/agent/reply/{id}', 'Agent\AgentController@reply')->name('agent.reply');
	Route::post('/agent/answer/{id}', 'Agent\AgentController@answer')->name('agent.answer');

	Route::get('/agentcontact/delete/{id}', 'Agent\AgentController@agentdestroy')->name('agentcontact.destroy');



	//User-Subscribed  Controller Start Now................
	Route::resource('/users', 'Usersubscibe\UsersubscribeController');
	Route::get('/users/create', 'Usersubscibe\UsersubscribeController@subscribe')->name('users.subscribe');
	Route::post('/users/store', 'Usersubscibe\UsersubscribeController@store')->name('users.store');
	Route::get('/users/edit/{id}', 'Agent\AgentController@edit')->name('users.edit');

	Route::post('/users/update/{id}', 'Agent\AgentController@update')->name('users.update');
	Route::get('/users/delete/{id}', 'Agent\AgentController@destroy')->name('users.destroy');

	Route::get('/users/active/{id}', 'Agent\AgentController@active')->name('users.active');
	Route::get('/users/unactive/{id}', 'Agent\AgentController@unactive')->name('users.unactive');




	//About-Blog  Controller Start Now................
	Route::resource('/blog', 'Blog\BlogController');
	Route::get('/blog/create', 'Blog\BlogController@create')->name('blog.create');
	Route::post('/blog/store', 'Blog\BlogController@store')->name('blog.store');
	Route::get('/blog/edit/{id}', 'Blog\BlogController@edit')->name('blog.edit');

	Route::post('/blog/update/{id}', 'Blog\BlogController@update')->name('blog.update');
	Route::get('/blog/delete/{id}', 'Blog\BlogController@destroy')->name('blog.destroy');

	Route::get('/blog/active/{id}', 'Blog\BlogController@active')->name('blog.active');
	Route::get('/blog/unactive/{id}', 'Blog\BlogController@unactive')->name('blog.unactive');




	//About-Testimonial  Controller Start Now................
	Route::resource('/testimonial', 'Testimonial\TestimonialController');
	Route::get('/testimonial/create', 'Testimonial\TestimonialController@create')->name('testimonial.create');
	Route::post('/testimonial/store', 'Testimonial\TestimonialController@store')->name('testimonial.store');
	Route::get('/testimonial/edit/{id}', 'Testimonial\TestimonialController@edit')->name('testimonial.edit');

	Route::post('/testimonial/update/{id}', 'Testimonial\TestimonialController@update')->name('testimonial.update');
	Route::get('/testimonial/delete/{id}', 'Testimonial\TestimonialController@destroy')->name('testimonial.destroy');

	Route::get('/testimonial/active/{id}', 'Testimonial\TestimonialController@active')->name('testimonial.active');
	Route::get('/testimonial/unactive/{id}', 'Testimonial\TestimonialController@unactive')->name('testimonial.unactive');





	//About-Us  Controller Start Now................
	Route::resource('/about_us', 'Aboutus\About_usController');
	Route::get('/about_us/create', 'Aboutus\About_usController@create')->name('about_us.create');
	Route::post('/about_us/store', 'Aboutus\About_usController@store')->name('about_us.store');
	Route::get('/about_us/edit/{id}', 'Aboutus\About_usController@edit')->name('about_us.edit');

	Route::post('/about_us/update/{id}', 'Aboutus\About_usController@update')->name('about_us.update');
	Route::get('/about_us/delete/{id}', 'Aboutus\About_usController@destroy')->name('about_us.destroy');

	Route::get('/about_us/active/{id}', 'Aboutus\About_usController@active')->name('about_us.active');
	Route::get('/about_us/unactive/{id}', 'Aboutus\About_usController@unactive')->name('about_us.unactive');


	//About-Us  Controller Start Now................
	Route::resource('/aboutus', 'Aboutus\AboutusController');
	Route::get('/aboutus/create', 'Aboutus\AboutusController@create')->name('aboutus.create');
	Route::post('/aboutus/store', 'Aboutus\AboutusController@store')->name('aboutus.store');
	Route::get('/aboutus/edit/{id}', 'Aboutus\AboutusController@edit')->name('aboutus.edit');

	Route::post('/aboutus/update/{id}', 'Aboutus\AboutusController@update')->name('aboutus.update');
	Route::get('/aboutus/delete/{id}', 'Aboutus\AboutusController@destroy')->name('aboutus.destroy');

	Route::get('/aboutus/active/{id}', 'Aboutus\AboutusController@active')->name('aboutus.active');
	Route::get('/aboutus/unactive/{id}', 'Aboutus\AboutusController@unactive')->name('aboutus.unactive');



	//About-Lattesttwit  Controller Start Now................
	Route::resource('/lattesttwit', 'Lattesttwit\LattesttwitController');
	Route::get('/lattesttwit/create', 'Lattesttwit\LattesttwitController@create')->name('lattesttwit.create');
	Route::post('/lattesttwit/store', 'Lattesttwit\LattesttwitController@store')->name('lattesttwit.store');
	Route::get('/lattesttwit/edit/{id}', 'Lattesttwit\LattesttwitController@edit')->name('lattesttwit.edit');

	Route::post('/lattesttwit/update/{id}', 'Lattesttwit\LattesttwitController@update')->name('lattesttwit.update');
	Route::get('/lattesttwit/delete/{id}', 'Lattesttwit\LattesttwitController@destroy')->name('lattesttwit.destroy');

	Route::get('/lattesttwit/active/{id}', 'Lattesttwit\LattesttwitController@active')->name('lattesttwit.active');
	Route::get('/lattesttwit/unactive/{id}', 'Lattesttwit\LattesttwitController@unactive')->name('lattesttwit.unactive');




	//About-Contactinfo  Controller Start Now................
	Route::resource('/contactinfo', 'Contactinfo\ContactinfoController');
	Route::get('/contactinfo/create', 'Contactinfo\ContactinfoController@create')->name('contactinfo.create');
	Route::post('/contactinfo/store', 'Contactinfo\ContactinfoController@store')->name('contactinfo.store');
	Route::get('/contactinfo/edit/{id}', 'Contactinfo\ContactinfoController@edit')->name('contactinfo.edit');

	Route::post('/contactinfo/update/{id}', 'Contactinfo\ContactinfoController@update')->name('contactinfo.update');
	Route::get('/contactinfo/delete/{id}', 'Contactinfo\ContactinfoController@destroy')->name('contactinfo.destroy');

	Route::get('/contactinfo/active/{id}', 'Contactinfo\ContactinfoController@active')->name('contactinfo.active');
	Route::get('/contactinfo/unactive/{id}', 'Contactinfo\ContactinfoController@unactive')->name('contactinfo.unactive');


	//About-Appoinment Property  Controller Start Now................
	Route::resource('/appoinment', 'Appoinment\AppoinmentController');

	Route::post('/appoinment/store', 'Appoinment\AppoinmentController@store')->name('appoinment.store');
	Route::get('/appoinment/delete/{id}', 'ppoinment\AppoinmentController@destroy')->name('appoinment.destroy');

	Route::get('/appoinment/confirm/{id}', 'Appoinment\AppoinmentController@confirm')->name('appoinment.confirm');
	Route::get('/appoinment/notconfirm/{id}', 'Appoinment\AppoinmentController@notconfirm')->name('appoinment.notconfirm');



	//About-Blog  Controller Start Now................
	Route::resource('/contact_us', 'Contact_Us\Contact_UsController');
	Route::get('/contact_us/create', 'Contact_Us\Contact_UsController@create')->name('contact_us.create');
	Route::post('/contact_us/store', 'Contact_Us\Contact_UsController@store')->name('contact_us.store');
	Route::get('/contact_us/edit/{id}', 'Contact_Us\Contact_UsController@edit')->name('contact_us.edit');

	Route::post('/contact_us/update/{id}', 'Contact_Us\Contact_UsController@update')->name('contact_us.update');
	Route::get('/contact_us/delete/{id}', 'Contact_Us\Contact_UsController@destroy')->name('contact_us.destroy');

	Route::get('/contact_us/active/{id}', 'Contact_Us\Contact_UsController@active')->name('contact_us.active');
	Route::get('/contact_us/unactive/{id}', 'Contact_Us\Contact_UsController@unactive')->name('contact_us.unactive');


});
