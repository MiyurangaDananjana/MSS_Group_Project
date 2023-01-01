@extends('comman.main') @section('inventoryControle')

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
                <br/> @endif @if(Session::has('error'))
                <div class="row">
                    <div class="alert-danger btn-block p-3 text-center">
                        {{Session::get('error')}}
                    </div>
                </div>
                <br/> @endif

                <br>

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
                                Description
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach($items as $key=>$item) @if($item->ReorderLevel>$item->Quantity)
                        <tr class="table-danger">
                            @else
                            <tr>
                                @endif
                                <form method="POST" action="{{route('controleInventory')}}">
                                    @csrf
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <input readonly type="text" required name="itemName" value="{{$item->Name}}" class="form-control btn-block">
                                        <input readonly type="hidden" required name="itemId" value="{{$item->itemId}}" class="form-control btn-block">
                                    </td>
                                    <td>
                                        <select readonly disabled required name="categoryId" class="form-control btn-block">
                                        @foreach($category as $key)
                                            @if($item->category_id==$key->categoriesId)
                                            <option selected value="{{$key->categoriesId}}">{{$key->Name}}</option>
                                            @else
                                            <option  value="{{$key->categoriesId}}">{{$key->Name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    </td>
                                    <td style="width: 110px;">
                                        <input type="number" style="width: 110px;" readonly required name="ItemPrice" value="{{$item->ItemPrice}}" class="form-control btn-block">
                                    </td>
                                    <td style="width: 110px;">
                                        <input type="number" style="width: 110px;" readonly required name="ReorderLevel" value="{{$item->ReorderLevel}}" class="form-control btn-block">
                                    </td>




                                    <td style="width: 110px;">
                                        <input type="number" style="width: 110px;" required name="Quantity" class="form-control btn-block" placeholder="{{$item->Quantity}}" value="">
                                        <input type="hidden" style="width: 110px;" required name="AvaliableQuantity" class="form-control btn-block" value="{{$item->Quantity}}">
                                    </td>



                                    <td>
                                        <input type="text" required name="description" class="form-control btn-block" value="">
                                    </td>
                                    <td style="display: flex;">
                                        <button type="submit" class="btn btn-warning btn-sm">update</button>
                                    </td>

                                </form>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->



    @endsection('inventoryControle')