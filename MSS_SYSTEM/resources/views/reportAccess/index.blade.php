@extends('comman.main') @section('report')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="card shadow-sm p-3 mb-5 bg-white rounded reportAccessModal" data-id="expences">
                                        <div class="card-body text-center">
                                            <img src="https://img.icons8.com/color/512/growing-money--v2.png" alt="" style="width:100px;">
                                            <h1 class="text-primary">Income Report</h1>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="card shadow-sm p-3 mb-5 bg-white rounded  reportAccessModal" data-id="income">
                                        <div class="card-body text-center">
                                            <img src="https://img.icons8.com/external-flaticons-flat-flat-icons/512/external-expense-home-based-business-flaticons-flat-flat-icons-2.png" alt="" style="width:100px;">
                                            <h1 class="text-primary">Expense Report</h1>
                                        </div>
                                    </div>
                            </div>


                            <div class="col-md-6">
                                <div class="card shadow-sm p-3 mb-5 bg-white rounded reportAccessModalInventorySummery" data-id="expences">
                                    <div class="card-body text-center">
                                        <img src="https://img.icons8.com/fluency/512/warehouse-1.png" alt="" style="width:100px;">
                                        <h1 class="text-primary">Inventory summery</h1>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card shadow-sm p-3 mb-5 bg-white rounded reportAccessModalInventoryBehaviours" data-id="expences">
                                    <div class="card-body text-center">
                                        <img src="https://img.icons8.com/fluency/512/high-indicator-filter.png" alt="" style="width:100px;">
                                        <h1 class="text-primary">Inventory Behaviours</h1>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="reportModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="{{route('incomeExpencesReoprt')}}">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <lable>Start Date</lable>
                                    <br/>
                                    <input type="date" required name="strDate" class="form-control btn-block">
                                </div>
                                <div class="col-md-6 ">
                                    <lable>End Date</lable>
                                    <br/>
                                    <input type="date" required name="endDate" class="form-control btn-block">
                                    <input type="hidden" id="reportType" name="type" value="income" class="formcontrole">
                                </div>
                                <div class="col-md-12">
                                    <lable style="visibility: hidden;">...</lable>
                                    <br/>
                                    <button type="submit" class="btn btn-primary btn-block">Downlaod</button>
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


        <div id="inventorySummeryreportModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="{{route('incomeExpencesReoprt')}}">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <lable>Start Date</lable>
                                    <br/>
                                    <input type="date" required name="strDate" class="form-control btn-block">
                                </div>
                                <div class="col-md-6 ">
                                    <lable>End Date</lable>
                                    <br/>
                                    <input type="date" required name="endDate" class="form-control btn-block">
                                    <input type="hidden" id="reportType" name="type" value="income" class="formcontrole">
                                </div>
                                <div class="col-md-12">
                                    <lable style="visibility: hidden;">...</lable>
                                    <br/>
                                    <button type="submit" class="btn btn-primary btn-block">Downlaod</button>
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


        <div id="inventoryBehavioursreportModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="{{route('incomeExpencesReoprt')}}">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <lable>Start Date</lable>
                                    <br/>
                                    <input type="date" required name="strDate" class="form-control btn-block">
                                </div>
                                <div class="col-md-4 ">
                                    <lable>End Date</lable>
                                    <br/>
                                    <input type="date" required name="endDate" class="form-control btn-block">
                                    <input type="hidden" id="reportType" name="type" value="income" class="formcontrole">
                                </div>

                                <div class="col-md-4">
                                    <lable>Item</lable>
                                    <br/>
                                    <select required name="itemId" class="form-control btn-block">
                                        @foreach($items as $item)
                                            <option value="{{$item->itemId}}">{{$item->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <lable style="visibility: hidden;">...</lable>
                                    <br/>
                                    <button type="submit" class="btn btn-primary btn-block">Downlaod</button>
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




    @endsection('report')