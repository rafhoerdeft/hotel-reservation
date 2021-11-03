function showDataTable(link, status) {
    var col = [];
    if (status == 5) {
        col = [  
            {  
                "width": "10",
                "targets":0,  
                "orderable":false,  
                "class":"text-center" 
            }, 
            {  
                "targets":1,  
                "orderable":false, 
                "class":"no-wrap text-right" 
            }, 
            {  
                "targets":2,
                "orderable":false, 
                "class":"text-center" 
            },  
            {  
                "targets":3,  
                "class":"text-center" 
            }, 
            {  
                "targets":4,  
                "class":"text-center" 
            }, 
            {  
                "targets":5,  
                "class":"text-center",
                "width": "50"
            },  
            {  
                "targets":6,  
                "width": "120"
            },  
            {  
                "width": "150",
                "targets":8
            },
            {  
                "width": "150",
                "targets":9
            },
            {  
                "width": "170",
                "targets":10
            }
        ];
    } else {
        col = [  
            {  
                "width": "10",
                "targets":0,  
                "orderable":false,  
                "class":"text-center" 
            }, 
            {  
                "targets":1,  
                "orderable":false, 
                "class":"no-wrap" 
            }, 
            {  
                "targets":2,
                "orderable":false, 
                "class":"text-center" 
            },  
            {  
                "targets":3,  
                "class":"text-center" 
            }, 
            {  
                "targets":4,  
                "class":"text-center",
                "width": "50"
            },  
            {  
                "targets":5,  
                "width": "120"
            },  
            {  
                "width": "150",
                "targets":7
            },
            {  
                "width": "150",
                "targets":8
            },
            {  
                "width": "170",
                "targets":9
            }
        ];
    }

    $("#tbl_data_rpb").DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "scrollX": true,
        "order":[],  
        "ajax":{  
            "url": link,  
            "type": "POST",
            "beforeSend": function () {
                $(".loading-page").show();
            },
            "complete": function () {
                $(".loading-page").hide();
            },
            // "dataSrc": function ( data ) {
            //     console.log( JSON.stringify(data));
            //  }
        },  
        "columnDefs": col,  
        "pageLength": 10
    });
}
