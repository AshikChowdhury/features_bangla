$('#userTable').DataTable({
    responsive: true,
    "columnDefs": [{
<<<<<<< HEAD
        "targets": 0, // column or columns numbers
        "orderable": false,  // set orderable for selected columns
    }],
    "order": []
=======
        "targets": [0,5], // column or columns numbers
        "orderable": false,  // set orderable for selected columns
    }],
    "order": []
});

$('#catTable').DataTable({
    responsive: true,
    "columnDefs": [{
        "targets": [0], // column or columns numbers
        "orderable": false,  // set orderable for selected columns
    }],
    "order": []
>>>>>>> 4c500a76d2c47b46681ce5bc947f1004cb38d9f8
});