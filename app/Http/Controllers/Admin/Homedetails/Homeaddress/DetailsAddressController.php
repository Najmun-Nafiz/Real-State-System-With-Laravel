<?php

namespace App\Http\Controllers\Admin\Homedetails\Homeaddress;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Homeaddress;
use App\Admin\Homedetail;
use\Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class DetailsAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Homeaddress::all();
        return view('admin.homedetails.homeaddress.index',compact('info'));


        // $info = DB::table('homeaddresses')
        // ->join('homedetails','homeaddresses.home_id','=','homedetails.id')->get();
        // return view('admin.homedetails.homeaddress.create',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $home_detail = Homedetail::all();
        return view('admin.homedetails.homeaddress.create',compact('home_detail'));
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
            'home_id' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        

        $info = new Homeaddress();
        $info->address = $request->address;
        $info->home_id = $request->home_id;
        $info->neighborhood = $request->neighborhood;
        $info->city = $request->city;
        $info->postal_code = $request->postal_code;
        $info->country = $request->country;
        $info->status = false;
        $mama = $info->save();

        if($mama){
            //Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('successMsg','Homeaddress Added Successfully.....');
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
        $info = Homeaddress::find($id);
        $infos = Homedetail::get();
        return view('admin.homedetails.homeaddress.edit',compact('info','infos'));
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
            'home_id' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        

        $info = Homeaddress::find($id);
        $info->address = $request->address;
        $info->home_id = $request->home_id;
        $info->neighborhood = $request->neighborhood;
        $info->city = $request->city;
        $info->postal_code = $request->postal_code;
        $info->country = $request->country;
        $info->status = false;
        $mama = $info->update();

        if($mama){
            //Toastr::success('Slider Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.homeaddress.index')->with('successMsg','Homeaddress Added Successfully.....');
        }
        else{
            //Toastr::success('Something Error !!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('errorMsg','Ther have error....!!');
        }
    }



    //Active And Un-Active funtion Start Now.......

    public function active(Request $request,$id)
    {
        

        $info = Homeaddress::find($id);
        $info->status = true;
        $info->save();


        //Toastr::success('Homedetail Is Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('successMsg','Property Activated Successfully.....');
    }


    public function unactive(Request $request,$id)
    {
        $info = Homeaddress::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        //Toastr::success('Homedetail Is Un-Activated....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('errorMsg','Property Un-Activated Successfully.....');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Homeaddress::find($id);

        $info->DELETE();
        return redirect()->back()->with('successMsg','Homeaddress Deleted Successfully Wuth Directory Image....');
    }
}


    