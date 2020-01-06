<?php

namespace App\Http\Controllers\Admin\Appoinment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Appoinment;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

use App\Notifications\AppoinmentConfirmed;
use Illuminate\Support\Facades\Notification;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Appoinment::all();
        return view('admin.appoinment.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'required',

        ]);

        

        $info = new Appoinment();
        $info->name = $request->name;
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->date = $request->date;
        $info->time = $request->time;
        $info->message = $request->message;
        $info->status = false; 
        $mama = $info->save();

        if($mama){
            Toastr::success('Appoinment Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        //
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
        //
    }


    public function confirm(Request $request,$id)
    {
        

        $info = Appoinment::find($id);
        $info->status = true;
        $info->save();


        Notification::route('mail',$info->email)
            ->notify(new AppoinmentConfirmed());

       Toastr::success('Reservation Is Confirmed.....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function notconfirm(Request $request,$id)
    {
        $info = Appoinment::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        // Toastr::success('Reservation Is Confirmed.....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('successMsg','Appointment Is Not Confirmed...');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
