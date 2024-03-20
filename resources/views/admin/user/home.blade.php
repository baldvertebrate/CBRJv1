@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User</h1>
@stop

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible auto-close">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List</h3>
            <div class="card-tools">
                <a href="#" class="btn btn-primary btn-sm">New User</a>
            </div>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="15%">ID</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th width="19%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    @php $i=1; @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            @php 
                            $person = App\Models\Person::where('id', '=', $user->employee->id)->first();
                            @endphp
                            {{$person->first_name}}
                            </td>
                        <td>{{$user -> email}}</td>
                        <td>@php 
                            $employee = App\Models\Employee::where('id', '=', $user->employee->id)->first();
                            @endphp
                            @if($employee->account_status ==1)
                            <p>Active</p>
                            @else
                            <p>Not Active</p>
                            @endif
                        </td>
                        <td>
                            <form method="post" action="#"> 
                                <a href="#" class="btn btn-warning btn-sm">Modify <span class="fas fa-edit"></span></a>
                                @csrf 
                                @method('delete')
                            <button type="submit" onclick="return confirm('This will delete the entry!\nAre you sure?')" class="btn btn-danger btn-sm">Delete <span class="fas fa-trash"></span></a>
                            </form>
                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
@stop

@section('footer')
    Copyright &copy; 2024. <strong>CBRJ Admin</strong>. All rights reserved.
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 5,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>
@stop