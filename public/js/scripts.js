    $(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#ward_name').on('change', function () {
        let id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/getWardDetails/' + id,
            dataType: 'json',
            success: function (data) {
                $('#item_name').empty();
                $.each(data, function (key, value) {
                    $('#item_name').append('<option value="' + value + '">' + key + '</option>');
                });
            }
        });
    });

    $('#item_name').on('change', function () {
        var id = $(this).val();
        $.get({
            url: '/getTable/' + id,
            data: {
                id: id
            },
            success: function (data) {
                if (data != null) {

                    $('#item_details').html(data);
                }
            }
        });
    });

    // ISSUED LINENS TO WARDS
    $('#stock_name').on('change', function () {
        let id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/getStorage/' + id,
            dataType: 'json',
            success: function (data) {

                $('#storage_name').empty();
                $.each(data, function (key, value) {
                    $('#storage_name').append('<option value="' + value + '">' + key + '</option>');
                });
            }
        });
    });

    $('#storage_name').on('change', function () {
        var storage_id = $(this).val();
        $.get({
            type: 'GET',
            url: '/getToIssue/' + storage_id,
            dataType: 'json',
            success: function (data) {
                if (data != null) {
                    // console.log('dito pumasok');
                    $('#item_toIssue').empty();
                    $.each(data, function (key, value) {
                        $('#item_toIssue').append('<option value="' + value + '">' + key + '</option>');
                    });
                }

            }
        });
    });

    $('#item_toIssue').on('change', function () {
        var item_id = $(this).val();
        $.get({
            url: '/getToIssueDetails/' + item_id,
            data: {
                item_id: item_id
            },
            success: function (data) {
                if (data != null) {
                    $('#issued_item_details').html(data);
                }

            }
        });
    });

    // BUTTON EDIT
    $(document).on('click', '.btnEdit', function () {
        console.log('edit pressed');
        $(this).siblings('.item_qty').attr('disabled', false);
        $(this).attr('hidden', true);
        $(this).siblings('.item_id').attr('hidden', true);
        $(this).siblings('.ward_id').attr('hidden', true);
        $(this).siblings('.item_qty').attr('hidden', false);
        $(this).siblings('.btnSave').attr('hidden', false);
        $(this).siblings('.btnCancel').attr('hidden', false);
        // $(this).siblings().attr('hidden',false);
    });

    //BUTTON SAVE
    $(document).on('click', '.btnSave', function () {
        // console.log('save pressed');
        $item_name = $(this).parent().siblings('.name')[0].innerHTML;
        $item_unit = $(this).parent().siblings('.unit')[0].innerHTML;
        $item_price = $(this).parent().siblings('.price')[0].innerHTML;
        $item_id = $(this).siblings('.item_id').val();
        $item_qty = $(this).siblings('.item_qty').val();
        $ward_id = $(this).siblings('.ward_id').val();
        console.log($ward_id);
        if ($item_qty == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Please input quantity',
                showConfirmButton: false,
                timer: 1200
            });
            $(this).siblings('input').val();
        } else {
            $(this).siblings('.btnEdit').attr('hidden', false);
            $(this).attr('hidden', true);
            $(this).siblings('.btnCancel').attr('hidden', true);
            $(this).siblings('.item_id').attr('hidden', true);
            $(this).siblings('.ward_id').attr('hidden', true);
            $(this).siblings('.item_qty').attr('disabled', true);
            $.ajax({
                type: 'get',
                url: '/condemn',
                data: {
                    'unit': $item_unit,
                    'price': $item_price,
                    'item_qty': $item_qty,
                    'item_id': $item_id,
                    'id': $ward_id,
                },
                success: function (data) {
                    $('#ward_name').trigger('click');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Successfully updated!',
                        showConfirmButton: false,
                        timer: 1200
                    });
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

    // BUTTON CANCEL
    $(document).on('click', '.btnCancel', function () {
        console.log('cancel pressed');
        $(this).siblings('.item_qty').attr('disabled', true);
        $(this).attr('hidden', true);
        $(this).siblings('.item_id').attr('hidden', true);
        $(this).siblings('.ward_id').attr('hidden', true);
        $(this).siblings('.btnSave').attr('hidden', true);
        $(this).siblings('.btnEdit').attr('hidden', false);
    });

    // $('#ward_name2').on('change', function() {
    //     let id = $(this).val();
    //     console.log($('#ward_name2').val());
    //     $.ajax({
    //         type: 'GET',
    //         url: '/getDeductDetails/'+id,
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data);

    //         }
    //     });
    // });

    //<<!!-- EDIT FUNCTIONS FOR ISSUED LINENS TO WARDS --!!>>
    $(document).on('click', '.issue_btnEdit', function () {
        console.log('edit pressed');
        $(this).siblings('.issue_item_qty').attr('disabled', false);
        $(this).attr('hidden', true);
        $(this).siblings('.issue_item_id').attr('hidden', true);
        $(this).siblings('.issue_item_qty').attr('hidden', false);
        $(this).siblings('.issue_btnSave').attr('hidden', false);
        $(this).siblings('.issue_btnCancel').attr('hidden', false);
    });

    //BUTTON SAVE
    $(document).on('click', '.issue_btnSave', function () {
        $item_name = $(this).parent().siblings('.issue_name')[0].innerHTML;
        $item_unit = $(this).parent().siblings('.issue_unit')[0].innerHTML;
        $item_price = $(this).parent().siblings('.issue_price')[0].innerHTML;
        $item_id = $(this).siblings('.issue_item_id').val();
        $item_qty = $(this).siblings('.issue_item_qty').val();
        $ward_id = $('#ward_name').val();
        $stock_id = $('#stock_name').val();
        $storage_id = $('#storage_name').val();
        $item_id = $('#item_toIssue').val();

        if ($item_qty == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Please input quantity',
                showConfirmButton: false,
                timer: 1200
            });
            $(this).siblings('input').val();
        } else {
            $(this).siblings('.issue_btnEdit').attr('hidden', false);
            $(this).attr('hidden', true);
            $(this).siblings('.issue_btnCancel').attr('hidden', true);
            $(this).siblings('.issue_item_id').attr('hidden', true);
            $(this).siblings('.issue_item_qty').attr('disabled', true);
            $.ajax({
                type: 'get',
                url: '/UpIssuedWrdQty',
                data: {
                    'issue_name': $item_name,
                    'issue_unit': $item_unit,
                    'issue_price': $item_price,

                    //ITEM TO BE PASSED 
                    'ward_id': $ward_id,
                    'stockroom_id': $stock_id,
                    'storage_id': $storage_id,
                    'issue_item_qty': $item_qty,
                    'issue_item_id': $item_id,
                },
                beforeSend: function () {
                    Swal.fire({
                        title: '<div style="width: 7rem; height: 7rem;" class="spinner-border text-info" role="status"><span class="sr-only">Loading...</span></div>',
                        showConfirmButton: false,
                    });
                },
                success: function (data) {
                    $('#ward_name').trigger('click');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Successfully updated!',
                        showConfirmButton: false,
                        timer: 1200
                    });

                    location.reload();

                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

    // BUTTON CANCEL
    $(document).on('click', '.issue_btnCancel', function () {
        console.log('cancel pressed');
        $(this).siblings('.issue_item_qty').attr('disabled', true);
        $(this).attr('hidden', true);
        $(this).siblings('.issue_item_id').attr('hidden', true);
        $(this).siblings('.issue_btnSave').attr('hidden', true);
        $(this).siblings('.issue_btnEdit').attr('hidden', false);
    });

    ///////////////////////////////////////////////////////////////////////////////////////////////////////


    //ISSUE TO OFFICE
    $('#office_name').on('change', function () {
        console.log(this.value);
    });

    $('#room_name').on('change', function () {
        let id = $(this).val();
        console.log(id);
        $.ajax({
            type: 'GET',
            url: '/getStorageOffice/' + id,
            dataType: 'json',
            success: function (data) {

                $('#store_name').empty();
                $.each(data, function (key, value) {
                    $('#store_name').append('<option value="' + value + '">' + key + '</option>');
                });
            }
        });
    });

    $('#store_name').on('change', function () {
        var storage_id = $(this).val();
        $.get({
            type: 'GET',
            url: '/getToIssueOffice/' + storage_id,
            dataType: 'json',
            success: function (data) {
                if (data != null) {
                    // console.log('dito pumasok');
                    $('#item_name').empty();
                    $.each(data, function (key, value) {
                        $('#item_name').append('<option value="' + value + '">' + key + '</option>');
                    });
                }

            }
        });
    });

    $('#item_name').on('change', function () {
        var item_id = $(this).val();
        $.get({
            url: '/getToIssueOfficeDetails/' + item_id,
            data: {
                item_id: item_id
            },
            success: function (data) {
                if (data != null) {
                    $('#issued_to_office').html(data);
                }

            }
        });
    });

    $(document).on('click', '.issue_OfbtnEdit', function () {
        console.log('edit pressed');
        $(this).siblings('.issue_Ofitem_qty').attr('disabled', false);
        $(this).attr('hidden', true);
        $(this).siblings('.issue_Ofitem_id').attr('hidden', true);
        $(this).siblings('.issue_Ofitem_qty').attr('hidden', false);
        $(this).siblings('.issue_OfbtnSave').attr('hidden', false);
        $(this).siblings('.issue_OfbtnCancel').attr('hidden', false);
    });

    //BUTTON SAVE
    $(document).on('click', '.issue_OfbtnSave', function () {
        $item_name = $(this).parent().siblings('.issue_Ofname')[0].innerHTML;
        $item_unit = $(this).parent().siblings('.issue_Ofunit')[0].innerHTML;
        $item_price = $(this).parent().siblings('.issue_Ofprice')[0].innerHTML;
        $item_id = $(this).siblings('.issue_Ofitem_id').val();
        $item_qty = $(this).siblings('.issue_Ofitem_qty').val();
        $office_id = $('#office_name').val();
        $stock_id = $('#room_name').val();
        $storage_id = $('#store_name').val();
        $item_id = $('#item_name').val();

        if ($item_qty == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Please input quantity',
                showConfirmButton: false,
                timer: 1200
            });
            $(this).siblings('input').val();
        } else {
            $(this).siblings('.issue_btnEdit').attr('hidden', false);
            $(this).attr('hidden', true);
            $(this).siblings('.issue_btnCancel').attr('hidden', true);
            $(this).siblings('.issue_Ofitem_id').attr('hidden', true);
            $(this).siblings('.issue_Ofitem_qty').attr('disabled', true);
            $.ajax({
                type: 'get',
                url: '/UpIssuedOfficeQty',
                data: {
                    'issue_name': $item_name,
                    'issue_unit': $item_unit,
                    'issue_price': $item_price,

                    //ITEM TO BE PASSED 
                    'office_id': $office_id,
                    'stockroom_id': $stock_id,
                    'storage_id': $storage_id,
                    'issue_item_qty': $item_qty,
                    'issue_item_id': $item_id,
                },
                beforeSend: function () {
                    Swal.fire({
                        title: '<div style="width: 7rem; height: 7rem;" class="spinner-border text-info" role="status"><span class="sr-only">Loading...</span></div>',
                        showConfirmButton: false,
                    });
                },
                success: function (data) {
                    $('#ward_name').trigger('click');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Successfully updated!',
                        showConfirmButton: false,
                        timer: 1200
                    });

                    location.reload();

                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

    // BUTTON CANCEL
    $(document).on('click', '.issue_OfbtnCancel', function () {
        console.log('cancel pressed');
        $(this).siblings('.issue_Ofitem_qty').attr('disabled', true);
        $(this).attr('hidden', true);
        $(this).siblings('.issue_Ofitem_id').attr('hidden', true);
        $(this).siblings('.issue_OfbtnSave').attr('hidden', true);
        $(this).siblings('.issue_OfbtnEdit').attr('hidden', false);
    });

    /////////////////////////////////////////////////////////////////////////////////////////
    //END ISSUED TO OFFICE


    // LCS REPORTS
    $('#off_name').on('change', function () {
        let id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/getOffWard/' + id,
            dataType: 'json',
            success: function (data) {
                $('#sel_name').empty();
                $.each(data, function (key, value) {
                    $('#sel_name').append('<option value="' + value + '">' + key + '</option>');
                });
            }
        });
    });
    $('#sel_name').on('change', function () {
        console.log(this.value);
        var id = $(this).val();
        $.get({
            url: '/getAllDetails/' + id,
            data: {
                id: id
            },
            success: function (data) {
                if (data != null) {
                    $('#issued').html(data);
                }
            }
        });
    });

        // CONDEMN REPORTS
        $('#con_off_name').on('change', function () {
            let id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/getOffWard/' + id,
                dataType: 'json',
                success: function (data) {
                    $('#con_sel_name').empty();
                    $.each(data, function (key, value) {
                        $('#con_sel_name').append('<option value="' + value + '">' + key + '</option>');
                    });
                }
            });
        });
        $('#con_sel_name').on('change', function () {
            console.log(this.value);
            var id = $(this).val();
            $.get({
                url: '/getCondemnDetails/' + id,
                data: {
                    id: id
                },
                success: function (data) {
                    if (data != null) {
                        $('#condemn').html(data);
                    }
                }
            });
        });


        /////////////// CHANGE STATUS WARDMATS 
        $('.btnChange').on('click', function() {
            $change_id = $('#mat_id').val();
            console.log($change_id);
        });


});
