<?php

namespace App\Http\Controllers\Admin\Header;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Header;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Header::all();
        return view('admin.header.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.header.create');
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
            'email' => 'required',
            'number' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/header')) {
                mkdir('uploads/header',0777,true);
            }
            $image->move('uploads/header',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $info = new Header();
        $info->email = $request->email;
        $info->number = $request->number;
        $info->address = $request->address;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->save();

        if($mama){
            Toastr::success('Header Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Header::find($id);
        return view('admin.header.edit',compact('info'));
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
            'email' => 'required',
            'number' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $info = Header::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/header')) {
                mkdir('uploads/header',0777,true);
            }
            unlink('uploads/header/'.$info->image);
            $image->move('uploads/header',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        
        $info->email = $request->email;
        $info->number = $request->number;
        $info->address = $request->address;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->update();

        if($mama){
            Toastr::success('Header Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.header.index');
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


    public function active(Request $request,$id)
    {
        

        $info = Header::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('Header Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = Header::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('Header Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Header::find($id);

        if(file_exists('uploads/header/'.$info->image)){
            unlink('uploads/header/'.$info->image);
        }

        $info->delete();
        Toastr::success('Header Delted Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
