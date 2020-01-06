<?php

namespace App\Http\Controllers\Admin\Slider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Slider;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Slider::all();
        return view('admin.slider.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'address' => 'required',
            'space' => 'required',
            'bed' => 'required',
            'bath' => 'required',
            'garaze' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/slider')) {
                mkdir('uploads/slider',0777,true);
            }
            $image->move('uploads/slider',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $info = new Slider();
        $info->name = $request->name;
        $info->address = $request->address;
        $info->space = $request->space;
        $info->bed = $request->bed;
        $info->bath = $request->bath;
        $info->garaze = $request->garaze;
        $info->price = $request->price;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->save();

        if($mama){
            Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Slider::find($id);
        return view('admin.slider.edit',compact('info'));
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
            'address' => 'required',
            'space' => 'required',
            'bed' => 'required',
            'bath' => 'required',
            'garaze' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $info = Slider::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/slider')) {
                mkdir('uploads/slider',0777,true);
            }
            unlink('uploads/slider/'.$info->image);
            $image->move('uploads/slider',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        
        $info->name = $request->name;
        $info->address = $request->address;
        $info->space = $request->space;
        $info->bed = $request->bed;
        $info->bath = $request->bath;
        $info->garaze = $request->garaze;
        $info->price = $request->price;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->update();

        if($mama){
            Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.slider.index');
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


    public function active(Request $request,$id)
    {
        

        $info = Slider::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('Slider Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = Slider::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('Slider Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Slider::find($id);

        if(file_exists('uploads/slider/'.$info->image)){
            unlink('uploads/slider/'.$info->image);
        }

        $info->delete();
        Toastr::success('Slider Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    
}
