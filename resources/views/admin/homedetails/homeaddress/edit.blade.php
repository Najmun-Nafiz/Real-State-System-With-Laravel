
@extends('layouts.app')
@section('title','Header')

@push('css')
@endpush

@section('content')
<section class="content">
                <div class="content__inner">
                    <header class="content__title">
                        <h1>Form Elements</h1>
						@include('admin.message')
                        <div class="actions">
                            <a href="#" class="actions__item zwicon-cog"></a>
                            <a href="#" class="actions__item zwicon-refresh-double"></a>

                            <div class="dropdown actions__item">
                                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Refresh</a>
                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                    <a href="#" class="dropdown-item">Settings</a>
                                </div>
                            </div>
                        </div>
                    </header>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add-Property-Details</h4>
                            <div class="col-md-6">
                                
                            </div>
                            <h6 class="card-subtitle" style="margin-top: 10px;">You can easily add your project Home-Details-Address from fillup this field and also showing in the main page.</h6>

                            <form class="row" method="post" action="{{ route('admin.homeaddress.update',$info -> id) }}" enctype="multipart/form-data">

                                @csrf

                                <div class="col-md-10">


                                	<div class="form-group">
                                        <label style="font-size: 16px;">Address</label>
                                        <input type="text" class="form-control" placeholder="Address" name="address" value = "{{ $info -> address }}" required>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label>Select The Name</label>

                                        <select class="select2" data-minimum-results-for-search="-1" data-placeholder="Select a make" name="home_id" value = "{{ $info -> address }}">
                                        	<option value=""></option>
                                        	@foreach($infos as $v_info)
                                            	<option {{ $v_info -> id == $info -> home -> id ? 'selected' : '' }} value="{{ $v_info -> id }}">{{ $v_info -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Neighborhood</label>
                                        <input type="text" class="form-control" placeholder="Neighborhood" name="neighborhood" value = "{{ $info -> address }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">City</label>
                                        <input type="text" class="form-control" placeholder="City" name="city" value = "{{ $info -> address }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Postal_code</label>
                                        <input type="text" class="form-control" placeholder="Postal_code" name="postal_code" value = "{{ $info -> address }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Country</label>
                                        <input type="text" class="form-control" placeholder="Country" name="country" value = "{{ $info -> address }}" required>
                                    </div>
                                    

                                    <button class="col-md-5 btn btn-primary btn-block" type="submit" style="font-size: 17px;display: inline-block;" >Sublit</button>

                                    <a class="col-md-5 btn btn-primary btn-block" href="{{ route('admin.homeaddress.index') }}" style="background-color: red; color: #fff;border-color: #007bff;display: inline-block;font-size: 16.5px;margin-top: -2px; ">Back To Home</a>

                                </div>

                            </form>
                        </div>
                    </div>

                    
                </div>

                
            </section>
@endsection

@push('scripts')
@endpush


			
