<?php

namespace App\Http\Controllers\Admin\Homecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\HouseCategory;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = HouseCategory::all();
        return view('admin.homecategory.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homecategory.create');
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

        

        $info = new HouseCategory();
        $info->name = $request->name;
        $info->status = false;
        $mama = $info->save();

        if($mama){
            Toastr::success('Property_Details_Cetegory Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = HouseCategory::find($id);
        return view('admin.homecategory.edit',compact('info'));
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

        

        $info = HouseCategory::find($id);
        $info->name = $request->name;
        $info->status = false;
        $mama = $info->update();

        if($mama){
            Toastr::success('Property_Details_Cetegory Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.homecategory.index');
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


    public function active(Request $request,$id)
    {
        

        $info = HouseCategory::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('Property_Details_Cetegory Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = HouseCategory::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

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
        $info = HouseCategory::find($id);

        if(file_exists('uploads/homecategory/'.$info->image)){
            unlink('uploads/homecategory/'.$info->image);
        }

        $info->delete();
        Toastr::success('Property_Details_Cetegory Deleted....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
