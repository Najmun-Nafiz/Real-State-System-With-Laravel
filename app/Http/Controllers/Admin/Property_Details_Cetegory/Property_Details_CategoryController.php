<?php

namespace App\Http\Controllers\Admin\Property_Details_Cetegory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\PropertyCategory;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class Property_Details_CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = PropertyCategory::all();
        return view('admin.property_details_cetegory.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property_details_cetegory.create');
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
        ]);

        

        $info = new PropertyCategory();
        $info->name = $request->name;
        $info->status = false;
        $mama = $info->save();

        if($mama){
            Toastr::success('Property_Details_Cetegory Added Successfully.....', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = PropertyCategory::find($id);
        return view('admin.property_details_cetegory.edit',compact('info'));
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
        ]);

        

        $info = PropertyCategory::find($id);
        $info->name = $request->name;
        $info->status = false;
        $mama = $info->update();

        if($mama){
            Toastr::success('Property_Details_Cetegory Updated Successfully.....', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.property_details_cetegory.index');
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }



    public function active(Request $request,$id)
    {
        

        $info = PropertyCategory::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('Property_Details_Cetegory Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = PropertyCategory::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('Property_Details_Cetegory Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = PropertyCategory::find($id);

        if(file_exists('uploads/property_details_cetegory/'.$info->image)){
            unlink('uploads/property_details_cetegory/'.$info->image);
        }

        $info->delete();
        Toastr::success('Property_Details_Cetegory Is Deleted....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

  
}
