<?php

namespace App\Http\Controllers\Admin\Property_Deatails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\PropertyDetail;
use App\Admin\PropertyCategory;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class Property_DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = PropertyDetail::all();
        return view('admin.property_details.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prop_d_c = PropertyCategory::all();
        return view('admin.property_details.create',compact('prop_d_c'));
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
            'category_id' => 'required',
            'content' => 'required',
            'space' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/property_details')) {
                mkdir('uploads/property_details',0777,true);
            }
            $image->move('uploads/property_details',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $info = new PropertyDetail();
        $info->category_id = $request->category_id;
        $info->space = $request->space;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->save();

        if($mama){
            Toastr::success('Property-Dtails Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = PropertyDetail::find($id);
        $prop_d_c = PropertyCategory::all();
        return view('admin.property_details.edit',compact('info','prop_d_c'));
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
            'category_id' => 'required',
            'content' => 'required',
            'space' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $info = PropertyDetail::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/property_details')) {
                mkdir('uploads/property_details',0777,true);
            }
            unlink('uploads/property_details/'.$info->image);
            $image->move('uploads/property_details',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        
        $info->category_id = $request->category_id;
        $info->space = $request->space;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->update();

        if($mama){
            Toastr::success('Property-Dtails Updated Successfully.....', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.property_detail.index');
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


    public function active(Request $request,$id)
    {
        

        $info = PropertyDetail::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('PropertyDetail Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = PropertyDetail::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('PropertyDetail Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = PropertyDetail::find($id);

        if(file_exists('uploads/property_details/'.$info->image)){
            unlink('uploads/property_details/'.$info->image);
        }

        $info->delete();
        Toastr::success('PropertyDetail Is Deleted....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
