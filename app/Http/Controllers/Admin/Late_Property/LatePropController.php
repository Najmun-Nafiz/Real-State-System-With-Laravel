<?php

namespace App\Http\Controllers\Admin\Late_Property;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lateproperty;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class LatePropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Lateproperty::all();
        return view('admin.latest_property.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.latest_property.create');
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
            'cost' => 'required',
            'space' => 'required',
            'room' => 'required',
            'bath' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/latest_property')) {
                mkdir('uploads/latest_property',0777,true);
            }
            $image->move('uploads/latest_property',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $info = new Lateproperty();
        $info->name = $request->name;
        $info->address = $request->address;
        $info->cost = $request->cost;
        $info->space = $request->space;
        $info->room = $request->room;
        $info->bath = $request->bath;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->save();

        if($mama){
            //Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('successMsg','Lateproperty Added Successfully.....');
        }
        else{
            //Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('errorMsg','Ther have error....!!');
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
        $info = Lateproperty::find($id);
        return view('admin.latest_property.edit',compact('info'));
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
            'cost' => 'required',
            'space' => 'required',
            'room' => 'required',
            'bath' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $info = Lateproperty::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/latest_property')) {
                mkdir('uploads/latest_property',0777,true);
            }
            unlink('uploads/latest_property/'.$info->image);
            $image->move('uploads/latest_property',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        
        $info->name = $request->name;
        $info->address = $request->address;
        $info->cost = $request->cost;
        $info->space = $request->space;
        $info->room = $request->room;
        $info->bath = $request->bath;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->update();

        if($mama){
            //Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.late_property.index')->with('successMsg','Lateproperty Updated Successfully.....');
        }
        else{
            //Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('errorMsg','Ther have error....!!');
        }
    }


    public function active(Request $request,$id)
    {
        

        $info = Lateproperty::find($id);
        $info->status = true;
        $info->save();


        //Toastr::success('Property Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('successMsg','Lateproperty Activated Successfully.....');
    }


    public function unactive(Request $request,$id)
    {
        $info = Lateproperty::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        //Toastr::success('Property Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('errorMsg','Lateproperty Un-Activated Successfully.....');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Lateproperty::find($id);

        if(file_exists('uploads/latest_property/'.$info->image)){
            unlink('uploads/latest_property/'.$info->image);
        }

        $info->delete();
        return redirect()->back()->with('successMsg','Lateproperty Deleted  Successfully Wuth Directory Image....');
    }
}
