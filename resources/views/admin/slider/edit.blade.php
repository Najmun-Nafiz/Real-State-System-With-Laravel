
@extends('layouts.app')
@section('title','Header')

@push('css')
@endpush

@section('content')
<section class="content">
                <div class="content__inner">
                    <header class="content__title">
                        <h1>Form Elements</h1>

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
                            <h4 class="card-title">Update-Slider</h4>
                            <div class="col-md-6">
                                @include('admin.message')
                            </div>
                            <h6 class="card-subtitle" style="margin-top: 10px;">You can easily update your project slider's from fillup this field and also showing in the main page.</h6>

                            <form class="row" method="post" action="{{ route('admin.slider.update',$info -> id) }}" enctype="multipart/form-data">

                                @csrf

                                <div class="col-md-10">
                                    
                                    <div class="form-group">
                                        <label style="font-size: 16px;">Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $info -> name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Space</label>
                                        <input type="text" class="form-control" placeholder="Tota-Space" name="space" value="{{ $info -> space }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Bed-Room</label>
                                        <input type="text" class="form-control" placeholder="Bedroom" name="bed" value="{{ $info -> bed }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Bath-Room</label>
                                        <input type="text" class="form-control" placeholder="Bathroom" name="bath" value="{{ $info -> bath }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Garaze</label>
                                        <input type="text" class="form-control" placeholder="Garaze" name="garaze" value="{{ $info -> garaze }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Price</label>
                                        <input type="text" class="form-control" placeholder="Price" name="price" value="{{ $info -> price }}" required>
                                    </div>

									<div class="form-group">
                                        <label style="font-size: 16px;">Address-Please</label>
                                        <textarea class="form-control" name="address" placeholder="Address Please" cols="7" rows="5" required>{{ $info -> address }}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label style="font-size: 16px;">Add-Slider</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image" value="{{ $info -> image }}" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>


                                    <button class="col-md-5 btn btn-primary btn-block" type="submit" style="font-size: 17px;display: inline-block;" >Update-Info</button>

                                    <a class="col-md-5 btn btn-primary btn-block" href="{{ route('admin.slider.index') }}" style="background-color: red; color: #fff;border-color: #007bff;display: inline-block;font-size: 16.5px;margin-top: -2px; ">Back To Home</a>

                                </div>

                            </form>
                        </div>
                    </div>

                    
                </div>

                
            </section>
@endsection

@push('scripts')
@endpush