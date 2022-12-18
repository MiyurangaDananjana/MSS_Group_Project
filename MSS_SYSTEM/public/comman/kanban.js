$(document).ready(function() {

    var cards = ``

    $.ajax({
        url: "/MSS/MSS_System/public/kanban-cards",
        type: "GET",
        success: function(data) {

            setTimeout(function() {
                $("#canbankCarsList").html("");
                for (let i = 0; i < data.length; i++) {

                    cards = ``
                    cards = `<div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-left">
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                Task : ${data[i]['TaskId']}
                                            </div>
                                            <div class="col-md-6 text-right">
                                              
                                              
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="card-body">
    
                                        <div class="shadow" style="padding:20px;">
                                            <br/>
                                            <h1 class="fscaretValue${data[i]['TaskId']}">${data[i]['Progress']}%</h1>
                                            <br/>
                                            <br/>
                                            <div class="">
                                                <div id="unranged-value${data[i]['TaskId']}" style="width: 100%; margin: 0px"></div>
                                            </div>
                                            <!-- END -->
    
                                            <br/>
                                            <button class="btn btn-success btn-block btn-sm viewTaskDescription" data-value="${data[i]['TaskDescription']}">Description</button>
                                            <hr>
                                            <br/>
                                           
                                        </div>
                                            
                                    <div class="card-footer">
                                    
                                        <b class="text-info">Created Date : ${data[i]['created_at']} </b>
                                        <br/>
                                        <b class="text-danger">Dead Line &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ${data[i]['Deadline']}</b>
                                    </div>
    
                                </div>
                            </div>`

                    $("#canbankCarsList").append(cards);

                    $(`#unranged-value${data[i]['TaskId']}`).freshslider({
                        step: 1,
                        value: data[i]['Progress'],
                        onchange: function(low) {
                            $(`.fscaretValue${data[i]['TaskId']}`).text(low + '%');
                            forChangeProgress(low, data[i]['TaskId'])
                        }
                    });

                }
            }, 2000);


        },
        error: function(data) {
            console.log(data)
        }
    });

    var timer;

    function forChangeProgress(val, taskID) {
        clearTimeout(timer);
        timer = setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: '/MSS/MSS_System/public/save-progress',
                data: { 'val': val, 'taskID': taskID },
                success: function(data) {

                }
            });
        }, 1000);
    }
});