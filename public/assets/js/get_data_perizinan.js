var protocol = window.location.protocol;
var host = window.location.hostname;

function showDataTable(link,status) {

    if (status=='diterima') {
        var cols = [  
            {  
                "width": "10",
                "targets":0,  
                "orderable":false,  
                "class":"text-center" 
            }, 
            {  
                "targets":1,  
                "class": 'no-wrap'
            },
            {  
                "targets":2,   
                "class":"text-center" 
            }, 
            {  
                "targets":3,  
                "class": 'no-wrap'
            },  
            {  
                "targets":4,  
                "class": 'no-wrap'
            },  
            {  
                "width": "150",
                "targets":5
            },
            {  
                "width": "150",
                "targets":6
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
                "width": "150",
                "targets":9
            }
        ];
    } else {
        var cols = [  
            {  
                "width": "10",
                "targets":0,  
                "orderable":false,  
                "class":"text-center" 
            }, 
            {  
                "targets":1,  
                "class": 'no-wrap'
            },
            {  
                "targets":2,   
                "class":"text-center" 
            }, 
            {  
                "targets":3,  
                "class": 'no-wrap'
            },  
            {  
                "targets":4,  
                "class": 'no-wrap'
            },  
            {  
                "width": "150",
                "targets":5
            },
            {  
                "width": "150",
                "targets":6
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
                "width": "150",
                "targets":9
            },
            {  
                "width": "200",
                "targets":10
            }
        ];
    }
    

    $("#dataperizinan").DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "scrollX": true,
        "order":[],  
        "ajax":{  
            "url": link,  
            "type": "POST"
        },  
        "columnDefs": cols,
        "pageLength": 10
    });
}
