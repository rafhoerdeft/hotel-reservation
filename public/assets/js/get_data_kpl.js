function showDataTable(link, status) {
    var col = [];
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
            "class":"no-wrap text-center" 
        }, 
        {  
            "targets":2,  
            "class":"text-center",
            "width": "50"
        }, 
        {  
            "targets":3,
            "width": "125"

        }, 
        {  
            "targets":4,
            "width": "250"

        }, 
        {  
            "targets":5,
            "width": "50",
            "class":"text-center",
        },  
        {  
            "targets":6,
            "width": "200"
        }
    ];

    $("#tbl_data_kpl").DataTable({
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
