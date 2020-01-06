<?php

namespace App\Http\Controllers\Admin\Lattesttwit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lattesttwit;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class LattesttwitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Lattesttwit::all();
        return view('admin.lattesttwit.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lattesttwit.create');
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
            'twitter' => 'required',
            'content' => 'required',

        ]);

        

        $info = new Lattesttwit();
        $info->twitter = $request->twitter;
        $info->content = $request->content;
        $info->status = false; 
        $mama = $info->save();

        if($mama){
            //Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('successMsg','Lattesttwit Added Successfully.....');
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
        $info = Lattesttwit::find($id);
        return view('admin.lattesttwit.edit',compact('info'));
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
            'twitter' => 'required',
            'content' => 'required',

        ]);

        

        $info = Lattesttwit::find($id);
        $info->twitter = $request->twitter;
        $info->content = $request->content;
        $info->status = false; 
        $mama = $info->update();

        if($mama){
            //Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.lattesttwit.index')->with('successMsg','Lattesttwit updated Successfully.....');
        }
        else{
            //Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('errorMsg','Ther have error....!!');
        }
    }


    public function active(Request $request,$id)
    {
        

        $info = Lattesttwit::find($id);
        $info->status = true;
        $info->save();


        //Toastr::success('Slider Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('successMsg','Lattesttwit Added Successfully.....');
    }


    public function unactive(Request $request,$id)
    {
        $info = Lattesttwit::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

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
        $info = Lattesttwit::find($id);


        $info->delete();
        return redirect()->back()->with('successMsg','Lattesttwit Deleted  Successfully....');
    }
}
