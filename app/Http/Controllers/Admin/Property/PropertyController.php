<?php

namespace App\Http\Controllers\Admin\Property;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Property;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Property::all();
        return view('admin.property.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create');
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
            'dining_name' => 'required',
            'drawing_name' => 'required',
            'kitchen_name' => 'required',
            'bed_name' => 'required',
            'content' => 'required',
            'dining' => 'required|mimes:jpeg,jpg,png',
            'drawing' => 'required|mimes:jpeg,jpg,png',
            'kitchen' => 'required|mimes:jpeg,jpg,png',
            'bed' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('dining');
        $slug = str_slug($request->dining_name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/property_show')) {
                mkdir('uploads/property_show',0777,true);
            }
            $image->move('uploads/property_show',$imagename);
        }
        else{
            $imagename = 'default.png';
        }



        $drawing = $request->file('drawing');
        $slug = str_slug($request->drawing_name);
        if (isset($drawing)) {

            $currentDate = Carbon::now()->toDateString();
            $drawingname = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$drawing->getClientOriginalExtension();

            if (!file_exists('uploads/property_show')) {
                mkdir('uploads/property_show',0777,true);
            }
            $drawing->move('uploads/property_show',$drawingname);
        }
        else{
            $drawingname = 'default.png';
        }



        $kitchen = $request->file('kitchen');
        $slug = str_slug($request->kitchen_name);
        if (isset($kitchen)) {

            $currentDate = Carbon::now()->toDateString();
            $kitchenname = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$kitchen->getClientOriginalExtension();

            if (!file_exists('uploads/property_show')) {
                mkdir('uploads/property_show',0777,true);
            }
            $kitchen->move('uploads/property_show',$kitchenname);
        }
        else{
            $kitchenname = 'default.png';
        }



        $bed = $request->file('bed');
        $slug = str_slug($request->bed_name);
        if (isset($bed)) {

            $currentDate = Carbon::now()->toDateString();
            $bedname= $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$bed->getClientOriginalExtension();

            if (!file_exists('uploads/property_show')) {
                mkdir('uploads/property_show',0777,true);
            }
            $bed->move('uploads/property_show',$bedname);
        }
        else{
            $bedname= 'default.png';
        }



        $info = new Property();
        $info->dining_name = $request->dining_name;
        $info->drawing_name = $request->drawing_name;
        $info->kitchen_name = $request->kitchen_name;
        $info->bed_name = $request->bed_name;
        $info->content = $request->content;
        $info->status = false;
        $info->dining = $imagename;
        $info->drawing = $drawingname;
        $info->kitchen = $kitchenname;
        $info->bed = $bedname;
        $mama = $info->save();

        if($mama){
            Toastr::success('Property Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Property::find($id);
        return view('admin.property.edit',compact('info'));
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
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $info = Property::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/property')) {
                mkdir('uploads/property',0777,true);
            }
            unlink('uploads/property/'.$info->image);
            $image->move('uploads/property',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        
        $info->name = $request->name;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->update();

        if($mama){
            Toastr::success('Property Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.property.index');
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


    public function active(Request $request,$id)
    {
        

        $info = Property::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('Property Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = Property::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('Property Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Property::find($id);

        if(file_exists('uploads/property/'.$info->image)){
            unlink('uploads/property/'.$info->image);
        }

        $info->delete();
        Toastr::success('Property Is Deleted....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
