$(document).ready(function () {
    $(document).on('click', '#delete', function(e){
        e.preventDefault();
        let link = $(this).attr('href');

        Swal.fire({
        title: 'Are you sure?',
        text: "Delete this data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })

    });
});

$('#table_id').DataTable();

// Confirm Status
$(document).ready(function () {
    $(document).on('click', '#confirm', function(e){
        e.preventDefault();
        let link = $(this).attr('href');

        Swal.fire({
        title: 'Are you sure to Confirm',
        text: "Once Confirm, You will not able to pending again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Confirm!'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
            'Confirm!',
            'Confirm Changes.',
            'success'
            )
        }
        })

    });
});

// processing


$(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to Processing?',
                    text: "Once Processing, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Processing!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Processing!',
                        'Processing Changes',
                        'success'
                      )
                    }
                  })


    });

  });

//picked


$(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to Picked?',
                    text: "Once Picked, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Picked!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Picked!',
                        'Picked Changes',
                        'success'
                      )
                    }
                  })


    });

  });

// shipped


$(function(){
    $(document).on('click','#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to shipped?',
                    text: "Once shipped, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, shipped!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'shipped!',
                        'shipped Changes',
                        'success'
                      )
                    }
                  })


    });

  });

  //delivered



$(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to delivered?',
                    text: "Once delivered, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delivered!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'delivered!',
                        'delivered Changes',
                        'success'
                      )
                    }
                  })


    });

});


$(function(){
    $(document).on('click','#cancel',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure to cancel?',
                    text: "Once cancel, You will not be able to pending again",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, cancel!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'cancel!',
                        'cancel Changes',
                        'success'
                      )
                    }
                  })


    });

});

var $disabledResults = $(".js-example-disabled-results");
$disabledResults.select2();


////////////////// Mina Investment Data Load By Yajra Table ///////////////////
investment_load_data();
function investment_load_data( from_date = '', to_date = '', business_id = '' ) {
    // alert(business_id);
    $('#investment').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        // rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: {
            url: '/add-main-investment',
            data: {from_date:from_date, to_date:to_date, business_id:business_id}
        },
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'business.name',
                name: 'business.name'
            },
            {
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, full, meta) {
                    let date = new Date(data);
                    return date.toLocaleDateString();
                }
            },
            {
                data: 'remark',
                name: 'remark'
            },
            {
                data: 'amount',
                name: 'amount'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
        drawCallback:function(data){
            let total = 0;
            data.aoData.map(data => {
                total = Number(total) + Number(data._aData.amount);
            });
            $('.total_investment').html(total);
        }
    });

}


//////////////////Daily Expense Data Load By Yajra Table ///////////////////
daily_expense_load_data();
function daily_expense_load_data( from_date = '', to_date = '', business_id = '' ) {
    // alert(business_id);
    $('#daily_expense').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        // rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: {
            url: '/add-dailey-expense',
            data: {from_date:from_date, to_date:to_date, business_id:business_id}
        },
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'business.name',
                name: 'business.name'
            },
            {
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, full, meta) {
                    let date = new Date(data);
                    return date.toLocaleDateString();
                }
            },
            {
                data: 'remark',
                name: 'remark'
            },
            {
                data: 'amount',
                name: 'amount'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
        drawCallback:function(data){
            let total = 0;
            data.aoData.map(data => {
                total = Number(total) + Number(data._aData.amount);
            });
            $('.total_daily_expense').html(total);
        }
    });

}




// Investment filter
$('#filter').click(function(e){
    e.preventDefault();
    let from_date = moment($('#from_data').val()).format('YYYY-MM-DD');
    let to_date =  moment($('#to_data').val()).format('YYYY-MM-DD');
    let business_id = $('#business_id').val();
    // alert(business_id);
    // alert(from_date + ' ' + to_date);

    if( business_id != null && business_id != ''){

        $('#investment').DataTable().destroy();
        $('#daily_expense').DataTable().destroy();
        investment_load_data(from_date, to_date, business_id);
        daily_expense_load_data(from_date, to_date, business_id);

        return false;
    }

    if(from_date != '' &&  to_date != '')
    {
        $('#investment').DataTable().destroy();
        $('#daily_expense').DataTable().destroy();
        investment_load_data(from_date, to_date);
        daily_expense_load_data(from_date, to_date);

    }


});

// Investment refresh
$('#refresh').click(function(){
    $('#from_data').val('');
    $('#to_data').val('');
    $('#investment').DataTable().destroy();
    investment_load_data();
});



//Investment Data Edit
$(document).on('click', '.edit_investment_data', function(e){
    e.preventDefault();
    let id = $(this).attr('edit_id');

    $.ajax({
        method:"GET",
        url: '/edit-main-investment/' + id,
        success: function(data){
            // console.log(data.business);

            $('.e_investment_name').html(data.business);
            $('.e_investment_remark').val(data.remark);
            $('.e_investment_amount').val(data.amount);
            $('.e_investment_id').val(data.id);


            $('.investment_edit').modal('show');

        }
    });

});

//Investment Data Edit
$(document).on('click', '.edit_investment_data', function(e){
    e.preventDefault();
    let id = $(this).attr('edit_id');

    $.ajax({
        method:"GET",
        url: '/edit-main-investment/' + id,
        success: function(data){
            // console.log(data.business);

            $('.e_investment_name').html(data.business);
            $('.e_investment_remark').val(data.remark);
            $('.e_investment_amount').val(data.amount);
            $('.e_investment_id').val(data.id);


            $('.investment_edit').modal('show');

        }
    });

});

//Daily Expense Data Edit
$(document).on('click', '.edit_daily_expense_data', function(e){
    e.preventDefault();
    let id = $(this).attr('edit_id');

    $.ajax({
        method:"GET",
        url: '/edit-dailey-expense/' + id,
        success: function(data){
            // console.log(data.business);

            $('.d_expense_name').html(data.business);
            $('.d_expense_remark').val(data.remark);
            $('.d_expense_amount').val(data.amount);
            $('.d_expense_id').val(data.id);


            $('.dialy_expense_edit').modal('show');

        }
    });

});


// Investment Data Update
$(document).on('submit', '#edit_investment_form', function(e){
    e.preventDefault();

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                "content"
            ),
        },
        method:"POST",
        url: '/update-main-investment',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(data){
            $('#edit_investment_form')[0].reset();
            $('.investment_edit').modal('hide');
            $('#investment').DataTable().ajax.reload();
        }
    });

});


// Daily Expense Data Update
$(document).on('submit', '#edit_dialy_expense_form', function(e){
    e.preventDefault();

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                "content"
            ),
        },
        method:"POST",
        url: '/update-dailey-expense',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(data){
            $('#edit_dialy_expense_form')[0].reset();
            $('.dialy_expense_edit').modal('hide');
            $('#daily_expense').DataTable().ajax.reload();
        }
    });

});

 // delete Investment form
 $(document).on('submit', '.investment_delete_form', function (e) {
    e.preventDefault();
    let id = $(this).attr('delete_id');
    // alert(id);

    Swal.fire({
        title: 'Are you sure?',
        text: "Delete this data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
                url: '/delete-main-investment',
                method: 'POST',
                data: { id: id },
                success: function (data) {

                    $('#investment').DataTable().ajax.reload();

                }
            });

            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
      })



});

 // delete Daily Expense form
 $(document).on('submit', '.daily_expense_delete_form', function (e) {
    e.preventDefault();
    let id = $(this).attr('delete_id');
    // alert(id);

    Swal.fire({
        title: 'Are you sure?',
        text: "Delete this data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
                url: '/delete-dailey-expense',
                method: 'POST',
                data: { id: id },
                success: function (data) {

                    $('#daily_expense').DataTable().ajax.reload();

                }
            });

            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
      })



});


$( function() {

    $( "#from_data" ).datepicker();
    $( "#to_data" ).datepicker();

} );
