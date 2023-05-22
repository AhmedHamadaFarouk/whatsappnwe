@extends('admin.layouts.master')
@section('page-title')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> users</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">users</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('contact')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
{{--                <div class="card-header">--}}
{{--                    <button class="btn btn-success" data-toggle="modal" data-target="#createNewWhatsappId">اضافه رقم تعريفي جديد</button>--}}
{{--                </div>--}}
{{--                @include('admin.users.create')--}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريد الالكتروني</th>

                                <th>رقم العميل</th>

                                <th>العملبات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                               العمليات
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sendMessages{{$row->id}}"> ارسال رساله خاصه</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sendWelcomeMessages{{$row->id}}"> ارسال رساله ترحبيه</a>
                                                <a class="dropdown-item" href="#">  ايقاف الشات بوت</a>
                                                <a class="dropdown-item" href="#"> ارسال البوت</a>
                                                <a class="dropdown-item" href="#"> شاشه المحادثه</a>
                                                <a class="dropdown-item" href="#"> تعديل </a>
                                                <a class="dropdown-item" href="#"> حذف</a>

                                            </div>
                                        </div>
                                    </td>
                                    @include('admin.users.sendMessages')
                                    @include('admin.users.sendWelcomeMessages')
                                    @include('admin.users.edit')
                                    @include('admin.users.deleted')
                                </tr>
                            @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
