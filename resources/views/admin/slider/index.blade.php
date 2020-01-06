@extends('layouts.app')
@section('title','Header')
@push('css')
@endpush
@section('content')
<section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>Data Tables</h1>
            <div class="col-md-6" style="padding-bottom: 14px;">
                @include('admin.message')
            </div>
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
                <h4 class="card-title">Basic example</h4>
                <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6>
                <div class="table-responsive data-table">
                    <table id="data-table" class="table">
                        <thead>
                            <tr style="background-color: #9a6502;">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Space</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($info as $key=>$v_info)
                            <tr>
                                
                                <td style="color: yellow;font-weight: bold;background-color: #b19053;">{{ $key + 1 }}</td>
                                <td>{{$v_info -> name}}</td>
                                <td>{{$v_info -> space}}</td>
                                <td class="center">
                                    <img class="img-responsive img-thumbnail" src="{{URL('uploads/slider/'.$v_info->image)}}"  style = "height : 50px; width : 50px;border-radius: 50%" alt="">
                                </td>

                                <td>{{$v_info -> price}}</td>

                                <td>
                                    @if($v_info -> status == true)
                                    <span class="alert-success" style="color: black;font-weight: bold;padding: 5px;">Active</span>
                                    
                                    @else
                                    <span class="alert-danger" style="color: black;font-weight: bold;padding: 5px;">Un-Active</span>
                                    
                                    @endif
                                </td>
                                
                                <td>
                                    
                                    @if($v_info -> status == true)
                                    <a href="{{ route('admin.slider.unactive',$v_info->id) }}" style="background-color: #908f8f;padding: 4px 7px;margin-right: 5px; border-radius: 3px;">
                                        
                                        <i class="zwicon-close-circle" style="color: white;font-size: 18px;"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('admin.slider.active',$v_info->id) }}" style="background-color: green;padding: 4px 7px;margin-right: 5px; border-radius: 3px;margin-top: 5px;">
                                        
                                        <i class="zwicon-checkmark-circle" style="color: white;font-size: 18px;"></i>
                                    </a>
                                    @endif

                                    <a href="{{route('admin.slider.edit',$v_info->id)}}" class="btn btn-info btn-sm"><i class="zwicon-edit-square-feather" style="color: white;font-size: 18px;"></i></a>
                                    
                                    <a href="{{route('admin.slider.destroy',$v_info->id)}}" class="btn btn-danger btn-sm"><i class="zwicon-folder-delete" style="color: white;font-size: 18px;"></i></a>
                                </td>
                                
                            </tr>
                            @endforeach

                            <tr style="background-color: #9a6502;">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Space</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
@endpush