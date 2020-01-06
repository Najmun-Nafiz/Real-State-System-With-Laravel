
@extends('layouts.app')
@section('title','Agent')

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
                            <h4 class="card-title">Answer Form</h4>
                            <div class="col-md-6">
                                
                            </div>
                            <h6 class="card-subtitle" style="margin-top: 10px;">User Message are included in bellow..</h6>

                            <div class="information" style="padding-left: 10px;padding-top: 50px;padding-bottom: 20px;">
								<b><strong style="font-size: 20px;color: orange;">Name : </strong>{{ $info -> name }}</b></br>
								<b><strong style="font-size: 20px;color: orange;">Email : </strong>{{ $info -> email }}</b></br>
								<p><strong style="font-size: 20px;color: orange;"><b>Message :</b> </strong>{{ $info -> message }}</p>
							</div>

                            <form class="row" method="post" action="{{ route('admin.agent.answer',$info -> id) }}" enctype="multipart/form-data">

                                @csrf

                                <div class="col-md-10">
                                    

                                    <div class="form-group">
                                        <label style="font-size: 16px;">Reply Answer</label>
                                       
                                        <textarea class="form-control" placeholder="Reply Answer Please.." name="answer" required></textarea>
                                    </div>


                                    <button class="col-md-5 btn btn-primary btn-block" type="submit" style="font-size: 17px;display: inline-block;" >Sublit</button>

                                    <a class="col-md-5 btn btn-primary btn-block" href="{{ route('admin.agentcontact.message') }}" style="background-color: red; color: #fff;border-color: #007bff;display: inline-block;font-size: 16.5px;margin-top: -2px; ">Back To Home</a>

                                </div>

                            </form>
                        </div>
                    </div>

                    
                </div>

                
            </section>
@endsection

@push('scripts')
@endpush