@extends('comman.main') @section('usersList')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
    <div class="card">
    @if(Session::has('msg'))
                <div class="row">
                    <div class="alert-success btn-block p-3 text-center">
                        {{Session::get('msg')}}
                    </div>
                </div>
    <br/> @endif
    <table class="table w-100">
                    <thead>
                        <tr>
                            <th>
                                Employee Name
                            </th>
                            <th>
                                 Employee Address
                            </th>
                            <th>
                                 Employee Position
                            </th>
                            <th>
                                Employee Phone
                            </th>
                            <th>
                                Employee Email
                            </th>
                            <th>
                                Added Date
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->Address}}
                                </td>
                                <td>
                                    {{$user->Position}}
                                </td>
                                <td>
                                    {{$user->Phone}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->created_at}}
                                </td>
                                <td>
                                    <form method="POST" action="{{route('editUser')}}" style="display: flex;">
                                        @csrf
                                        <input type="hidden" required name="userId" value="{{$user->id}}" class="form-control btn-block">
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
    </div>
    </div>
    <!-- /.container-fluid -->




    @endsection('usersList')