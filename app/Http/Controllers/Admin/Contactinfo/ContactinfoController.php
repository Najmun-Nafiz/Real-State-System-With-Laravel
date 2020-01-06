<?php

namespace App\Http\Controllers\Admin\Contactinfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Contactinfo;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class ContactinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Contactinfo::all();
        return view('admin.contactinfo.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contactinfo.create');
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
            'address' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'website' => 'required',

        ]);

        

        $info = new Contactinfo();
        $info->address = $request->address;
        $info->email = $request->email;
        $info->contact = $request->contact;
        $info->website = $request->website;
        $info->status = false; 
        $mama = $info->save();

        if($mama){
            Toastr::success('Contactinfo Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Contactinfo::find($id);
        return view('admin.contactinfo.edit',compact('info'));
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
            'address' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'website' => 'required',

        ]);

        

        $info = Contactinfo::find($id);
        $info->address = $request->address;
        $info->email = $request->email;
        $info->contact = $request->contact;
        $info->website = $request->website;
        $info->status = false; 
        $mama = $info->update();

        if($mama){
            //Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.contactinfo.index')->with('successMsg','Contactinfo Updated Successfully.....');
        }
        else{
            //Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('errorMsg','Ther have error....!!');
        }
    }

    public function active(Request $request,$id)
    {
        

        $info = Contactinfo::find($id);
        $info->status = true;
        $info->save();


        //Toastr::success('Slider Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('successMsg','Contactinfo Added Successfully.....');
    }


    public function unactive(Request $request,$id)
    {
        $info = Contactinfo::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

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
        $info = Contactinfo::find($id);


        $info->delete();
        return redirect()->back()->with('successMsg','Contactinfo Deleted  Successfully....');
    }
}
