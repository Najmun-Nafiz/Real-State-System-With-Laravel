<?php

namespace App\Http\Controllers\Admin\Aboutus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Aboutus;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Aboutus::all();
        return view('admin.aboutus.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.create');
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
            'facebook' => 'required',
            'twitter' => 'required',
            'linkdin' => 'required',
            'github' => 'required',
            'content' => 'required',

        ]);

        

        $info = new Aboutus();
        $info->facebook = $request->facebook;
        $info->twitter = $request->twitter;
        $info->linkdin = $request->linkdin;
        $info->github = $request->github;
        $info->content = $request->content;
        $mama = $info->save();

        if($mama){
            //Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('successMsg','Aboutus Added Successfully.....');
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
        $info = Aboutus::find($id);
        return view('admin.aboutus.edit',compact('info'));
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
            'facebook' => 'required',
            'twitter' => 'required',
            'linkdin' => 'required',
            'github' => 'required',
            'content' => 'required',

        ]);

        

        $info = Aboutus::find($id);
        $info->facebook = $request->facebook;
        $info->twitter = $request->twitter;
        $info->linkdin = $request->linkdin;
        $info->github = $request->github;
        $info->content = $request->content;
        $mama = $info->update();

        if($mama){
            //Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.aboutus.index')->with('successMsg','Aboutus Updated Successfully.....');
        }
        else{
            //Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('errorMsg','Ther have error....!!');
        }
    }



    public function active(Request $request,$id)
    {
        

        $info = Aboutus::find($id);
        $info->status = true;
        $info->save();


        //Toastr::success('Slider Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('successMsg','Aboutus Added Successfully.....');
    }


    public function unactive(Request $request,$id)
    {
        $info = Aboutus::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        //Toastr::success('Slider Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('errorMsg','Ther have error....!!');
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


        $info->delete();
        return redirect()->back()->with('successMsg','About-Us Deleted  Successfully....');
    }
}
