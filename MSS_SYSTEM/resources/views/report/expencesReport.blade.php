<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.6/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
    <style>
        <?php include(public_path().'/Template/css/sb-admin-2.min.css');?>
    </style>
</head>

<body id="page-top">

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <div class="card w-100">
            <div class="card-body">
                <div class="text-center text-uppercase">
                    <h4>Expences Report</h4>
                    <h5>{{$dateStr}}  TO  {{$dateEnd}}</h5>
                </div>
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

                        @foreach($expences as $key =>  $expencesItem)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$expencesItem->name}}</td>
                            <td>$ {{number_format($expencesItem->Amount,2)}}</td>
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

    </body>

</html>