<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Usersubscribe;
use App\Admin\Header;
use App\Admin\Slider;
use App\Admin\Property;
use App\Admin\PropertyCategory;
use App\Admin\PropertyDetail;
use App\Admin\HouseCategory;
use App\Admin\HouseDetail;
use App\Admin\Agent;
use App\Admin\Blog;
use App\Admin\Testimonial;
use App\Admin\Abot_Us;
use App\Admin\Contact_Us;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $info = Usersubscribe::all();
        return view('welcome',compact('info'));
    }

    public function welcome()
    {
        $slider = Slider::get()->where('status', true);
        $header = Header::get()->where('status', true);
        $property = Property::get()->where('status', true);

        $propertyCategory = PropertyCategory::get()->where('status', true);
        $propertyDetail = PropertyDetail::get()->where('status', true);

        $houseCategory = HouseCategory::get()->where('status', true);
        $houseDetail = HouseDetail::orderBy('id','asc')->limit(6)->get()->where('status', true);

        $lattest_property = HouseDetail::orderBy('id','desc')->limit(6)->get()->where('status', true);
        $testimonial = Testimonial::orderBy('id','desc')->limit(3)->get()->where('status', true);
        $blog = Blog::orderBy('id','desc')->limit(2)->get()->where('status', true);

        $agent = Agent::get()->where('status', true);
        $contact_us = Contact_Us::get()->where('status', true);        
        

        return view('welcome', compact('slider','header','property','propertyDetail','propertyCategory','houseCategory','houseDetail','lattest_property','agent','testimonial','blog'));    
    }

    public function about_us()
    {
        $about_us = Abot_Us::get()->where('status', true);
        $agent = Agent::get()->where('status', true);
        $blog = Blog::orderBy('id','desc')->limit(2)->get()->where('status', true);
        $header = Header::get()->where('status', true);
        return view('about_us.about_us', compact('header','agent','blog','about_us'));
    }


    public function property_details(Request $Request, $id)
    {
        $agent = Agent::get()->where('status', true);
        $header = Header::get()->where('status', true);
        $details = HouseDetail::get()->where('id', $id);
        $lattest_property = HouseDetail::orderBy('id','desc')->limit(3)->get()->where('status', true);
        $blog = Blog::orderBy('id','desc')->limit(2)->get()->where('status', true);
        
        return view('property_details.property_details', compact('details','header','lattest_property','blog','agent'));
    }


    public function blog()
    {
        $agent = Agent::get()->where('status', true);
        $blogs = Blog::orderBy('id','desc')->limit(5)->get()->where('status', true);
        $blog = Blog::orderBy('id','desc')->limit(2)->get()->where('status', true);
        $header = Header::get()->where('status', true);
        return view('blog.blog', compact('header','blogs','agent','blog'));
    }


    public function bolg_details(Request $Request, $id)
    {
        $header = Header::get()->where('status', true);
        $agent = Agent::get()->where('status', true);
        $bolg_details = Blog::get()->where('id', $id);
        $lattest_blog = Blog::orderBy('id','desc')->limit(3)->get()->where('status', true);
        $blog = Blog::orderBy('id','desc')->limit(2)->get()->where('status', true);
        return view('blog.bolg_details', compact('bolg_details','header','lattest_blog','blog','agent'));
    }

    public function gallery($value='')
    {
        $agent = Agent::get()->where('status', true);
        $blog = Blog::orderBy('id','desc')->limit(2)->get()->where('status', true);
        $header = Header::get()->where('status', true);

        $houseCategory = HouseCategory::get()->where('status', true);
        $houseDetail = HouseDetail::orderBy('id','asc')->limit(6)->get()->where('status', true);
        return view('gallery.gallery', compact('header','agent','blog','houseCategory','houseDetail'));
    }


    public function contact_us()
    {       
        $contact_us = Contact_Us::get()->where('status', true);
        $agent = Agent::get()->where('status', true);
        $blog = Blog::orderBy('id','desc')->limit(2)->get()->where('status', true);
        $header = Header::get()->where('status', true);
        return view('contact_us.contact_us', compact('header','agent','blog','contact_us'));
    }
}
