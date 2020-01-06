<?php

namespace App\Http\Controllers\Admin\Aboutus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin\Abot_Us;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class About_usController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Abot_Us::all();
        return view('admin.about_us.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_us.create');
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
            
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/about_us')) {
                mkdir('uploads/about_us',0777,true);
            }
            $image->move('uploads/about_us',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $info = new Abot_Us();
        
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->save();

        if($mama){
            Toastr::success('About_Us Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Abot_Us::find($id);
        return view('admin.about_us.edit',compact('info'));
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
            
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $info = new Abot_Us();

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/about_us')) {
                mkdir('uploads/about_us',0777,true);
            }
            unlink('uploads/about_us/'.$info->image);
            $image->move('uploads/about_us',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

       
        
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->save();

        if($mama){
            Toastr::success('About_Us Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }



    public function active(Request $request,$id)
    {
        

        $info = Abot_Us::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('About_Us Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = Abot_Us::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('About_Us Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Abot_Us::find($id);

        if(file_exists('uploads/about_us/'.$info->image)){
            unlink('uploads/about_us/'.$info->image);
        }

        $info->delete();
        Toastr::success('About_Us Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
