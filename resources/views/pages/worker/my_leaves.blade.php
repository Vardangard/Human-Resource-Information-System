@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        My Leaves
    </h1>
    <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
        <li><a>Leave</a></li>
        <li class="active">My Leaves</li>
    </ol>               
</div>

<div id="page-inner">
    @if(count($leaves) > 0)
        <form method="POST">
                @csrf
                @method('DELETE')

        <div class="panel panel-primary">
            <div class="panel-heading">
                My Leaves
            </div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow-y: hidden">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-dark">
                            
                                @foreach($leaves->where('employee_id', '=', Auth::user()->employee->id) as $leave)
                                    <tr>
                                        <td>{{ $leave->created_at }}</td>
                                        @if($leave->type_id == null)
                                            <td>Type Was Removed</td>
                                        @else
                                            <td>{{ $leave->type->name }}</td>
                                        @endif 
                                        <td>{{ $leave->from }}</td>
                                        <td>{{ $leave->to }}</td>
                                        <td>{{ date('j', (strtotime($leave->to) - strtotime($leave->from))) }} Days</td>
                                        <td>{{ $leave->reason }}</td>
                                        
                                        @if($leave->from < date('Y-m-d'))
                                            <td style="background-color:grey">{{ $leave->status }}</td>
                                            <td>
                                               Old Record 
                                            </td>
                                        @elseif($leave->status == 'Approved')
                                            <td style="background-color:#5cb85c">{{ $leave->status }}</td>
                                            <td>
                                                <button class="btn btn-danger" formaction="{{ action('LeavesController@destroy', $leave->id) }}" type="submit">Delete Request</button> 
                                            </td>
                                        @elseif($leave->status == "Rejected")
                                            <td style="background-color:#d9534f">{{ $leave->status }}</td>
                                            <td>
                                                <button class="btn btn-danger" formaction="{{ action('LeavesController@destroy', $leave->id) }}" type="submit">Delete Request</button> 
                                            </td>
                                        @else
                                            <td>{{ $leave->status }}</td>
                                            <td>
                                                <button class="btn btn-danger" formaction="{{ action('LeavesController@destroy', $leave->id) }}" type="submit">Delete Request</button> 
                                            </td>
                                        @endif
                                        
                                    </tr>
                                @endforeach
                                
                            
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                    <div class="text-center">
                       
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="panel panel-primary" style="padding:20px;background-color:white">
                <p class="alert alert-warning" style="margin:0px;">No Leaves Found</p><br/>
                <a href="/leave-application" class="btn btn-success" >Request Leave</a>
            </div>
        @endif
</div>

@endsection