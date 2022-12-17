@extends('comman.main') @section('incomeReport')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="card w-100">
            <div class="card-body">
                
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Added by
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Description
                            </th>

                            <th>
                                Added Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($expences as $expencesItem)
                        <tr>
                            <td>{{$expencesItem->excencesId}}</td>
                            <td>{{$expencesItem->name}}</td>
                            <td>{{$expencesItem->Amount}}</td>
                            <td>{{$expencesItem->Description}}</td>
                            <td>{{$expencesItem->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


   


    </div>
    <!-- /.container-fluid -->

    @endsection('incomeReport')