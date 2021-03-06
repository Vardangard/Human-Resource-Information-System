@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Employee Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
        <li><a href="/profile">Personal</a></li>
        <li class="active">{{ $employee->firstname }} {{ $employee->lastname }}</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel" style="padding:20px">
        <div class="row">
            <div class="col-md-4">
                <div class="panel-body" >
                    <div class="well">
                    <img style="width:100%" src="/storage/avatars/{{$employee->avatar}}"/>
                    </div>
                    <h2>{{ $employee->firstname }} {{ $employee->lastname }}</h2>
                    <p><i class="fa fa-location-arrow"></i> {{ $employee->address }}</p>
                    <p><i class="fa fa-"></i> {{ $employee->position }}</p>
                </div>
            </div>
            <div class="col-md-8">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#personal">Personal Details</a></li>
                    <li><a data-toggle="tab" href="#employment">Employment Details</a></li>
                    <li><a data-toggle="tab" href="#document">Document</a></li>
                </ul>
                
                <div class="tab-content">
                    <div id="personal" class="tab-pane fade in active">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Personal Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Gender:</td>
                                        <td>{{ $employee->gender }}
                                    </tr>
                                    <tr>
                                        <td>Birthday:</td>
                                        <td>{{ $employee->birthday }}
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{ $employee->email }}
                                    </tr>
                                    <tr>
                                        <td>Mobile Number:</td>
                                        <td>{{ $employee->telephone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="employment" class="tab-pane fade">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Employment Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Campus:</td>
                                        @if($employee->campus_id == null)
                                            <td>Not Set</td>
                                        @else
                                            <td>{{ $employee->campus->name }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Department:</td>
                                        @if($employee->department_id == null)
                                            <td>Not Set</td>
                                        @else
                                            <td>{{ $employee->department->name }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Position:</td>
                                        <td>{{ $employee->position }}
                                    </tr>
                                    <tr>
                                        <td>Salary:</td>
                                        <td>{{ $employee->salary }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Joined:</td>
                                        <td>{{ $employee->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="document" class="tab-pane fade">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Documents</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CV:</td>
                                        <td>Download</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br/>
                
                <a class="btn btn-warning" href="/edit-profile">Edit</a>
            </div>
        </div>
    </div>
</div>

@endsection