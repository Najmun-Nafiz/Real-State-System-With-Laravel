<?php

namespace App\Http\Controllers\Admin\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Agent;
use App\Admin\Agencontact;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

use App\Notifications\AgentContact;
use Illuminate\Support\Facades\Notification;

use Session;
Session_start();

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Agent::all();
        return view('admin.agent.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agent.create');
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
            'profession' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/agent')) {
                mkdir('uploads/agent',0777,true);
            }
            $image->move('uploads/agent',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $info = new Agent();
        $info->name = $request->name;
        $info->profession = $request->profession;
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->save();

        if($mama){
            Toastr::success('Agent Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Agent::find($id);
        return view('admin.agent.edit',compact('info'));
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
            'profession' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $info = Agent::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/agent')) {
                mkdir('uploads/agent',0777,true);
            }
            unlink('uploads/agent/'.$info->image);
            $image->move('uploads/agent',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        
        $info->name = $request->name;
        $info->profession = $request->profession;
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->content = $request->content;
        $info->status = false;
        $info->image = $imagename;
        $mama = $info->update();

        if($mama){
            Toastr::success('Agent Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.agent.index');
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }



    public function active(Request $request,$id)
    {
        

        $info = Agent::find($id);
        $info->status = true;
        $info->save();


        Toastr::success('Agent Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function unactive(Request $request,$id)
    {
        $info = Agent::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('Agent Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
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
        $info = Agent::find($id);

        if(file_exists('uploads/agent/'.$info->image)){
            unlink('uploads/agent/'.$info->image);
        }

        $info->delete();
        Toastr::success('Agent Is Deleted....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


    public function contact(Request $request)
    {
         $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

      

        $info = new Agencontact();
        $info->name = $request->name;
        $info->email = $request->email;
        $info->message = $request->message;
        $info->status = false; 
        $mama = $info->save();

        if($mama){
            Toastr::success('Your message Successfully sent..', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('successMsg','Agent Added Successfully.....');
        }
        else{
            Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


    public function message()
    {
        $info = Agencontact::all();
        return view('admin.agent.message',compact('info'));
    }


    public function reply($id)
    {
        $info = Agencontact::find($id);
        return view('admin.agent.answer',compact('info'));
    }


    public function answer(Request $request,$id)
    {
        
        $answer = $request -> answer;
        Session::put('answer',$answer);

        $info = Agencontact::find($id);
        $info->status = true;
        $info->save();


        Notification::route('mail',$info->email)
            ->notify(new AgentContact());

       Toastr::success('Message Reply Successfully Sent.....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


     public function agentdestroy($id)
    {
        $info = Agencontact::find($id);

        $info->delete();
        Toastr::success('Agencontact Is Deleted....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
