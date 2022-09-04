@extends('admin.layout.app')
@section('title')
    Dashboard | Admin
@endsection

@section('main-content')
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>Bootstrap Styling Table</h4>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index-2.html">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Styling Table</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page-header end -->
        <!-- Page-body start -->
        <div class="page-body">
            <!-- Table header styling table start -->
            <div class="card">

                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-styling">
                            <thead>
                            <tr class="table-primary">
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @forelse($users as $key=>$user)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm"> Edit </a>
                                    <a href="#" class="btn btn-info btn-sm"> Details </a>
                                    <a href="#" class="btn btn-danger btn-sm"> <i class="icofont icofont-trash"></i>  Delete </a>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table header styling table end -->
        </div>
        <!-- Page-body end -->
    </div>
    @endsection