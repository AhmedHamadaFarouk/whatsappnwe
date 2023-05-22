@extends('admin.layouts.master')
@section('page-title')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">Lists</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Lists</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('contact')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#createNewWhatsappId">اضافه اسم القالب</button>
                </div>
                @include('admin.lists.create')
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>

                                <th>رأس النص</th>
                                <th>نص النص</th>
                                <th>تذييل النص</th>
                                <th>اسم العميل</th>

                                <th>العملبات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>

                                    <td>{{$row->text_header}}</td>
                                    <td>{{$row->text_body}}</td>
                                    <td>{{$row->text_footer}}</td>
                                    <td>{{$row->client->name}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editWhatsappId{{$row->id}}"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletedWhatsappId{{$row->id}}"><i class="fa fa-trash"></i></button>
                                    </td>
                                    @include('admin.lists.edit')
                                    @include('admin.lists.deleted')
                                </tr>
                            @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
