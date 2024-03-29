
$(document).ready(function () {
    // Ajax Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Sweet Alert
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        let link = $(this).attr('href');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                }
            });
    });

    // Image Drag and Drop
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });

});
// Add Product Page
// Depended Select Option
function dependedSelect(onChangeSelect, url, displaySelect, columnClass) {
    $(onChangeSelect).on("change", function () {
        let id = $(onChangeSelect + ' option:selected').val();
        // Hide child category when change category
        if (onChangeSelect == "select[name='category']") {
            $("select[name='child_category']").empty();
            $('.child_category').fadeOut();
        }
        if (id) {
            $.ajax({
                type: "GET",
                url: url + id,
                dataType: "json",
                success: function (data) {
                    if (data != '') {
                        $(displaySelect).empty();
                        $(displaySelect).append('<option value=""> Select...</option >');
                        $(columnClass).fadeIn();
                        $.each(data, function (index, value) {
                            $(displaySelect).append(`<option value='${index}'>${value}</option>`);
                        });
                    } else {
                        $(displaySelect).empty();
                        $(columnClass).fadeOut();
                    }
                }
            });
        } else {
            // hide and empty
            $(displaySelect).empty();
            $(columnClass).fadeOut();
        }
    });
}


$('[name=banner_subTitle]').tagify({
    duplicates: false,
    maxItems: 5,
});


var editor = new FroalaEditor('#editor-textarea', {
    heightMin: 400,
    heightMax: 250
});



// Store and Update with Ajax Custom Method
function ajaxStoreAndUpdate(method, url, data, formParentClass, formId, toastrMsg) {
    $.ajax({
        type: method,
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == 'success') {
                $('.error_msg').html('');
                $(formParentClass).load(location.href + ' ' + formId);
                toastr.success(toastrMsg);
            }
        }, error: function (err) {
            let error = err.responseJSON;
            toastr.error('May be some fileds are required.');
            $('.error_msg').html('');
            $.each(error.errors, function (index, value) {
                $('.error_msg').append(`<li class='text-danger'>${value}</li>`);
            });
        }
    });
}

// Delete with Ajax Custom Method
function ajaxDeleteWithToastr(method, url, data, toastrMsg) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    success: function (response) {
                        if (response.status == 'success') {
                            $('.table').load(location.href + ' .table');
                            toastr.success(toastrMsg);
                        }
                    }
                });
            }
        });
}
