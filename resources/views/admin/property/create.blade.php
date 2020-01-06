
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
                            <h4 class="card-title">Add-Property</h4>
                            <div class="col-md-6">
                                
                            </div>
                            <h6 class="card-subtitle" style="margin-top: 10px;">You can easily add your project property from fillup this field and also showing in the main page.</h6>

                            <form class="row" method="post" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="col-md-10">
                                    

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Dining Name</label>
                                        <input type="text" class="form-control" placeholder="dining_name" name="dining_name" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Drawing Name</label>
                                        <input type="text" class="form-control" placeholder="drawing_name" name="drawing_name" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Kitchen Name</label>
                                        <input type="text" class="form-control" placeholder="kitchen_name" name="kitchen_name" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Bed Name</label>
                                        <input type="text" class="form-control" placeholder="bed_name" name="bed_name" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label style="font-size: 16px;">Content</label>
                                        <textarea class="form-control" name="content" placeholder="Add-Content" cols="7" rows="5" required></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label style="font-size: 16px;">Select-Dining</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="dining" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Select-Kitchen</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="kitchen" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Select-Drawing</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="drawing" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Select-Bedroom</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="bed" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>


                                    <button class="col-md-5 btn btn-primary btn-block" type="submit" style="font-size: 17px;display: inline-block;" >Sublit</button>

                                    <a class="col-md-5 btn btn-primary btn-block" href="{{ route('admin.property.index') }}" style="background-color: red; color: #fff;border-color: #007bff;display: inline-block;font-size: 16.5px;margin-top: -2px; ">Back To Home</a>

                                </div>

                            </form>
                        </div>
                    </div>

                    
                </div>

                
            </section>
@endsection

@push('scripts')
@endpush