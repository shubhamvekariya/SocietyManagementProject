@extends('layouts.app')
@section('title');
All Rules
@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Rules</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Society</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Rules</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Rules</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#" class="dropdown-item">Config option 1</a>
                    </li>
                    <li><a href="#" class="dropdown-item">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>

<div class="ibox-content">

    <div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
    <th>id</th>
    <th>Rule Description</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody>
    @foreach ($rule_data as $rule)
    <tr class="gradeX">
        <td>{{$rule['id']}}</td>
        <td>{{$rule['description']}}</td> 
        
        <td><a href="society/rule/edit/{$rule['id']}}" class="btn btn-primary">Edit</a></td>
        <td><a href="society/rule/edit/{$rule['id']}}" class="btn btn-danger">Delete</a></td>               
    </tr>
@endforeach
</tbody>
 </table>
  </div>
</div>
@endsection
