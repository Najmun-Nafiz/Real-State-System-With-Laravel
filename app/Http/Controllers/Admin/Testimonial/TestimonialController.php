<?php

namespace App\Http\Controllers\Admin\Testimonial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Testimonial;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Testimonial::all();
        return view('admin.testimonial.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'carrier' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/testimonial')) {
                mkdir('uploads/testimonial',0777,true);
            }
            $image->move('uploads/testimonial',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $info = new Testimonial();
        $info->name = $request->name;
        $info->carrier = $request->carrier;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->save();

        if($mama){
            Toastr::success('Testimonial Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Testimonial::find($id);
        return view('admin.testimonial.edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'carrier' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);


        $info = Testimonial::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/testimonial')) {
                mkdir('uploads/testimonial',0777,true);
            }
            unlink('uploads/testimonial/'.$info->image);
            $image->move('uploads/testimonial',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        
        $info->name = $request->name;
        $info->carrier = $request->carrier;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->update();

        if($mama){
            Toastr::success('Testimonial Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.testimonial.index');
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


     public function active(Request $request,$id)
    {
        

        $info = Testimonial::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('Testimonial Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = Testimonial::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('TestimonialIs Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Testimonial::find($id);

        if(file_exists('uploads/testimonial/'.$info->image)){
            unlink('uploads/testimonial/'.$info->image);
        }

        $info->delete();

        Toastr::success('TestimonialIs Deleted....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
