function showDataTable(link, status) {
    var col = [];
    
    if (status == 7) {
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
                "orderable":false, 
                "class":"text-center" 
            },  
            {  
                "targets":4,
                "orderable":false, 
                "class":"text-center" 
            },  
            {  
                "targets":5,
                "class":"text-center" 
            },  
            {  
                "targets":6,  
                "class":"text-center" 
            }, 
            {  
                "targets":7,  
                "class":"text-center",
                "width": "50"
            },  
            {  
                "targets":8,  
                "width": "120"
            },  
            {  
                "width": "75",
                "targets":9
            },
            {  
                "width": "150",
                "targets":10
            },
            {  
                "width": "170",
                "targets":11
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
                "orderable":false, 
                "class":"text-center" 
            },  
            {  
                "targets":4,
                "orderable":false, 
                "class":"text-center" 
            },  
            {  
                "targets":5,  
                "class":"text-center" 
            }, 
            {  
                "targets":6,  
                "class":"text-center",
                "width": "50"
            },  
            {  
                "targets":7,  
                "width": "120"
            },  
            {  
                "width": "75",
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
    }
    

    $("#tbl_data_uin").DataTable({
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
    }).on('draw.dt', function () {
        fancy();
    });
}
