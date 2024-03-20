
$(document).ready(function() {

    var model = $("#model").text();
    var overlay = $(".overlay2");
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('#category').select2();
    
    $('#dataTable').DataTable({
        stateSave: true 
    });

    $(document).on('click', '.draft, .activate, .delete', function(e) {
        e.preventDefault();

        var ID = $(this).data('id');

        var types = $(this).data('type');

        let type = "";
        let text = "";

        if(types == 'Draft') {
            type = "draft";
            text = "You can revert it later";
        } else if(types == "Activate") {
            type = "activate";
            text = "You can revert it later";
        } else if(types == "Delete") {
            type = "delete";
            text = "You can't revert it later";
        }



Swal.fire({
    title: "Are you sure to " + types + " this",
    text: text,
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "YES",
}).then((result) => {
    if (result.isConfirmed) {
        overlay.removeClass('d-none');
        $.ajax({
            url: `/${model}/process`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken 
            },
            data: {
                action: type,
                id: ID,
            },
            success: function(data) {
                overlay.addClass('d-none');
                console.log(data);
                if (data.s == 1) {
                    Swal.fire('Success', data.m, 'success');
                        location.reload();
                    
                } else {
                    Swal.fire('Warning', data.m, 'warning');
                }
            },
            error: function(xhr, status, error) {
                overlay.addClass('d-none');
                Swal.fire('Error', xhr.responseText || error, 'error');
            }
        });
    }
});

    });

    $(document).on('click', '.edit', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

         $.ajax({
            url: `/${model}/process`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken 
            },
            data: {
                action: 'getcats',
                id: id,
            },
            success: function(data) {
                console.log(data);
                $("#name").val(data.name);
                $("#id").val(data.id);
                if(data.status == 1) {
                    $("#status").checked = true;
                } else {
                    $("#status").checked = false;
                }
            },
            error: function(xhr, status, error) {
                overlay.addClass('d-none');
                Swal.fire('Error', xhr.responseText || error, 'error');
            }
        });
    });




    
    $(document).on('submit', '#addform', function(e){
        e.preventDefault();

        
        var button = $("#submit");

        overlay.removeClass('d-none');

        var form = $(this);
        var formData = $(this).serialize();

        $.ajax({
            url: `/${model}/process`,
            method: 'POST',
            data: formData,

            success: function(data) {
                overlay.addClass('d-none');
                console.log(data);
                if(data.s === 1) {
                    Swal.fire('Success', data.m, 'success').then((result) => {
                    if(result.isConfirmed) {
                        location.reload();
                    }
                    });
                } else {
                    Swal.fire('Warning', data.m, 'warning');
                }
            },

            error: function(xhr, status, error) {
                overlay.addClass('d-none');
                Swal.fire('Error', xhr.responseText || error, 'error');
            }
        });
    });

    $(document).on('submit', '#editform', function(e){
        e.preventDefault();

        
        var button = $("#submit");

        overlay.removeClass('d-none');

        var form = $(this);
        var formData = $(this).serialize();

        $.ajax({
            url: `/${model}/process`,
            method: 'POST',
            data: formData,

            success: function(data) {
                overlay.addClass('d-none');
                console.log(data);
                if(data.s === 1) {
                    Swal.fire('Success', data.m, 'success').then((result) => {
                    if(result.isConfirmed) {
                        location.reload();
                    }
                    });
                } else {
                    Swal.fire('Warning', data.m, 'warning');
                }
            },

            error: function(xhr, status, error) {
                overlay.addClass('d-none');
                Swal.fire('Error', xhr.responseText || error, 'error');
            }
        });
    });

});