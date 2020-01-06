
@extends('layouts.app')
@section('title','Property-Details')

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
                            <h6 class="card-subtitle" style="margin-top: 10px;">You can easily add your project Property-Details from fillup this field and also showing in the main page.</h6>

                            <form class="row" method="post" action="{{ route('admin.homedetails.store') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="col-md-10">


                                	<div class="form-group">
                                        <label style="font-size: 16px;">Name</label>
                                        <input type="text" class="form-control" placeholder="name" name="name" required>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label style="font-size: 15px;">Select Property Category</label>

                                        <select class="select2" data-minimum-results-for-search="-1" data-placeholder="Select a make" name="house_category_id">
                                        	<option value=""></option>
                                        	@foreach($home_category as $v_info)
                                            	<option value="{{ $v_info -> id }}">{{ $v_info -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Rate</label>
                                        <input type="text" class="form-control" placeholder="Rate" name="rate" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Address</label>
                                        <input type="text" class="form-control" placeholder="Address" name="address" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Country</label>
                                        <input type="text" class="form-control" placeholder="Country" name="country" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">City</label>
                                        <input type="text" class="form-control" placeholder="City" name="city" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Postal Code</label>
                                        <input type="text" class="form-control" placeholder="Postal Code" name="postal_code" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Property_id</label>
                                        <input type="text" class="form-control" placeholder="Property_id" name="property_id" required>
                                    </div>


                                    <div class="form-group">
                                        <label style="font-size: 16px;">Bedroom</label>
                                        <input type="text" class="form-control" placeholder="Bedroom" name="bedroom" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Bathroom</label>
                                        <input type="text" class="form-control" placeholder="Bathroom" name="bathroom" required>
                                    </div>


                                    <div class="form-group">
                                        <label style="font-size: 16px;">Garaze_space</label>
                                        <input type="text" class="form-control" placeholder="Garaze_space" name="garaze_space" required>
                                    </div>


                                    <div class="form-group">
                                        <label style="font-size: 16px;">Built Year</label>
                                        <input type="date" class="form-control" placeholder="Built Year" name="year" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Property_space</label>
                                        <input type="text" class="form-control" placeholder="Property_space" name="property_space" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Garaze</label>
                                        <input type="text" class="form-control" placeholder="Garaze" name="garaze" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label style="font-size: 16px;">Content</label>
                                        <textarea class="form-control" name="content" placeholder="Add-Content" cols="7" rows="5" required></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label style="font-size: 16px;">Select-Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>


                                    <button class="col-md-5 btn btn-primary btn-block" type="submit" style="font-size: 17px;display: inline-block;" >Sublit</button>

                                    <a class="col-md-5 btn btn-primary btn-block" href="{{ route('admin.homedetails.index') }}" style="background-color: red; color: #fff;border-color: #007bff;display: inline-block;font-size: 16.5px;margin-top: -2px; ">Back To Home</a>

                                </div>

                            </form>
                        </div>
                    </div>

                    
                </div>

                
            </section>
@endsection

@push('scripts')
@endpush

