@extends('comman.main') @section('item')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="card w-100">
            <div class="card-body">

                @if(Session::has('msg'))
                <div class="row">
                    <div class="alert-success btn-block p-3 text-center">
                        {{Session::get('msg')}}
                    </div>
                </div>
                <br/> @endif



                <form method="POST" action="{{route('saveItem')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 text-info">
                            <b><a href="#" class="CategoryModal">Add Category</a></b>
                            <hr/>
                        </div>
                        <div class="col-md-6">
                            <lable>Category</lable>
                            <br/>

                            <select required name="categoryId" class="form-control btn-block">
                            @foreach($category as $item)
                                <option value="{{$item->categoriesId}}">{{$item->Name}}</option>
                            @endforeach
                            </select>

                        </div>
                        <div class="col-md-6">
                            <lable>Item Name</lable>
                            <br/>
                            <input type="text" required name="Name" class="form-control btn-block">
                        </div>
                        <div class="col-md-4">
                            <lable>Item Price</lable>
                            <br/>
                            <input type="number" required name="ItemPrice" class="form-control btn-block">
                        </div>
                        <div class="col-md-4">
                            <lable>Reorder Level</lable>
                            <br/>
                            <input type="number" required name="ReorderLevel" class="form-control btn-block">
                        </div>
                        <div class="col-md-4">
                            <lable>Quantity</lable>
                            <br/>
                            <input type="number" required name="Quantity" class="form-control btn-block">
                        </div>
                        <div class="col-md-4">
                            <lable style="visibility: hidden;">...</lable>
                            <br/>
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>

                <br>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Item
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Unit price
                            </th>
                            <th>
                                Reorder Level
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach($items as $key=>$item)
                        <tr>
                            <form method="POST" action="{{route('updateItem')}}">
                                @csrf
                                <td>{{$key+1}}</td>
                                <td>
                                    <input type="text" required name="itemName" value="{{$item->Name}}" class="form-control btn-block">
                                    <input type="hidden" required name="itemId" value="{{$item->itemId}}" class="form-control btn-block">
                                </td>
                                <td>
                                    <select required name="categoryId" class="form-control btn-block">
                                        @foreach($category as $key)
                                            @if($item->category_id==$key->categoriesId)
                                            <option selected value="{{$key->categoriesId}}">{{$key->Name}}</option>
                                            @else
                                            <option  value="{{$key->categoriesId}}">{{$key->Name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" required name="ItemPrice" value="{{$item->ItemPrice}}" class="form-control btn-block">
                                </td>
                                <td>
                                    <input type="number" required name="ReorderLevel" value="{{$item->ReorderLevel}}" class="form-control btn-block">
                                </td>
                                <td><input type="number" required name="Quantity" class="form-control btn-block" value="{{$item->Quantity}}">
                                </td>

                                <td style="display: flex;">
                                    <button type="submit" class="btn btn-warning btn-sm">update</button>
                            </form>
                            <form method="POST" action="{{route('deleteItem')}}" style="display: flex;">
                                @csrf
                                <input type="hidden" required name="itemId" value="{{$item->itemId}}" class="form-control btn-block">
                                <button type="submit" onclick="return confirm('Are you sure you want to do that?');" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="categoryModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('saveCategory')}}">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <lable>Category Name</lable>
                                    <br/>
                                    <input type="text" required name="categoryName" class="form-control btn-block">
                                </div>
                                <br/>
                                <div class="col-md-2 mt-2">
                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->



    @endsection('item')