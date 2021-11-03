function showDataTable(link) {
    // var col = [];
    
    var col = [  
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
            "width": "75",
            "targets":6
        },
        {  
            "width": "150",
            "targets":7
        },
        {  
            "width": "170",
            "targets":8
        }
    ];
    

    $("#tbl_data_upl").DataTable({
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
