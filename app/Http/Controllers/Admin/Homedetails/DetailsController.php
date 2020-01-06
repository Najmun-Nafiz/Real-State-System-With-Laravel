<?php

namespace App\Http\Controllers\Admin\Homedetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\HouseDetail;
use App\Admin\HouseCategory;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = HouseDetail::all();
        return view('admin.homedetails.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $home_category = HouseCategory::all();
        return view('admin.homedetails.create',compact('home_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/homedetails')) {
                mkdir('uploads/homedetails',0777,true);
            }
            $image->move('uploads/homedetails',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $info = new HouseDetail();
        $info->name = $request->name;
        $info->house_category_id = $request->house_category_id;
        $info->rate = $request->rate;
        $info->address = $request->address;
        $info->country = $request->country;
        $info->city = $request->city;
        $info->postal_code = $request->postal_code;
        $info->property_id = $request->property_id;
        $info->bedroom = $request->bedroom;
        $info->bathroom = $request->bathroom;
        $info->garaze_space = $request->garaze_space;
        $info->year = $request->year;
        $info->property_space = $request->property_space;
        $info->garaze = $request->garaze;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->save();

        if($mama){
            Toastr::success('Homedetail Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = HouseDetail::find($id);
        $infos = Homecategory::all();
        return view('admin.homedetails.edit',compact('info','infos'));
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


        $info = HouseDetail::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/homedetails')) {
                mkdir('uploads/homedetails',0777,true);
            }
            unlink('uploads/homedetails/'.$info->image);
            $image->move('uploads/homedetails',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        
        $info = new HouseDetail();
        $info->name = $request->name;
        $info->house_category_id = $request->house_category_id;
        $info->rate = $request->rate;
        $info->address = $request->address;
        $info->country = $request->country;
        $info->city = $request->city;
        $info->postal_code = $request->postal_code;
        $info->property_id = $request->property_id;
        $info->bedroom = $request->bedroom;
        $info->bathroom = $request->bathroom;
        $info->garaze_space = $request->garaze_space;
        $info->year = $request->year;
        $info->property_space = $request->property_space;
        $info->garaze = $request->garaze;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->update();

        if($mama){
            Toastr::success('Homedetail Updated Successfully.....', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.homedetails.index');
        }
        else{
           Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }



    //Active And Un-Active funtion Start Now.......

    public function active(Request $request,$id)
    {
        

        $info = HouseDetail::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('Homedetail Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = HouseDetail::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('Homedetail Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = HouseDetail::find($id);

        if(file_exists('uploads/homedetails/'.$info->image)){
            unlink('uploads/homedetails/'.$info->image);
        }

        $info->DELETE();
        Toastr::success('Homedetail Deleted Successfully Wuth Directory Image.....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
