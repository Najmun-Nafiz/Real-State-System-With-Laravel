<?php

namespace App\Http\Controllers\Admin\Contact_Us;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin\Contact_Us;
use App\Admin\Contact_Message;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class Contact_UsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Contact_Us::all();
        return view('admin.contact_us.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_us.create');
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
            'phone' => 'required',
            'local' => 'required',
            'web_address' => 'required',
            'content' => 'required',

        ]);

        
        $info = new Contact_Us();
        $info->address = $request->address;
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->local = $request->local;
        $info->web_address = $request->web_address;
        $info->content = $request->content;
        $info->status = false; 
        $mama = $info->save();

        if($mama){
            Toastr::success('Contact_Us Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Contact_Us::find($id);
        return view('admin.contact_us.edit',compact('info'));
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
            'phone' => 'required',
            'local' => 'required',
            'web_address' => 'required',
            'content' => 'required',

        ]);

        $info = Contact_Us::find($id);
        $info->address = $request->address;
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->local = $request->local;
        $info->web_address = $request->web_address;
        $info->content = $request->content;
        $info->status = false; 
        $mama = $info->update();

        if($mama){
            Toastr::success('Contact_Us Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }



    public function active(Request $request,$id)
    {
        

        $info = Contact_Us::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('Contact_Us Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = Contact_Us::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('Contact_Us Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Contact_Us::find($id);

        $info->delete();
        return redirect()->back()->with('successMsg','Contact_Us Deleted  Successfully....');
    }


    public function contact_message(Request $request)
    {

       
        $info = new Contact_Message();
        $info->name = $request->name;
        $info->email = $request->email;
        $info->subject = $request->subject;
        $info->comments = $request->comments;
        $info->status = false; 
        $info->save();

        Toastr::success('Contact_Message Is Successfully Sent....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();



    }
}
