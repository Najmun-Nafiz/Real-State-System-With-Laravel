
@extends('layouts.app')
@section('title','Contact-Info')

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
                            <h4 class="card-title">Add-Contact-Info</h4>
                            <div class="col-md-6">
                                @include('admin.message')
                            </div>
                            <h6 class="card-subtitle" style="margin-top: 10px;">You can easily add your project Contact-Info from fillup this field and also showing in the main page.</h6>

                            <form class="row" method="post" action="{{ route('admin.contactinfo.update', $info -> id) }}" enctype="multipart/form-data">

                                @csrf

                                <div class="col-md-10">
                                    

                                   

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Address</label>
                                        <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $info -> address }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Email</label>
                                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $info -> email }}" required>
                                    </div>


                                    <div class="form-group">
                                        <label style="font-size: 16px;">Contact</label>
                                        <input type="text" class="form-control" placeholder="Contact" name="contact" value="{{ $info -> contact }}" required>
                                    </div>


                                    <div class="form-group">
                                        <label style="font-size: 16px;">Website</label>
                                        <input type="text" class="form-control" placeholder="Website" name="website" value="{{ $info -> website }}" required>
                                    </div>



                                    <button class="col-md-5 btn btn-primary btn-block" type="submit" style="font-size: 17px;display: inline-block;" >Sublit</button>

                                    <a class="col-md-5 btn btn-primary btn-block" href="{{ route('admin.contactinfo.index') }}" style="background-color: red; color: #fff;border-color: #007bff;display: inline-block;font-size: 16.5px;margin-top: -2px; ">Back To Home</a>

                                </div>

                            </form>
                        </div>
                    </div>

                    
                </div>

                
            </section>
@endsection

@push('scripts')
@endpush