$('#userTable').DataTable({
    responsive: true,
    "columnDefs": [{
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
});