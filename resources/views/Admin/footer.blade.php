    </div>
</div>
<!-- Scripts -->
<script src="{{ secure_asset('js/app.js') }}"></script>
{{-- dataTables --}}
<script src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
{{-- Select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- SweetAlert2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<script>
    $(".select2").select2();
    $('.dataTable').DataTable();


    function deleteConfirmation(id,model) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: `dashboard/${model}/${id}`,
                    data: {_token: CSRF_TOKEN,_method:'delete'},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === 200) {
                            setTimeout(function(){
                                location.reload();
                            },1000);
                            swal("Done!", "", "success");
                        } else {
                            swal("Error!", "Something went wrong, please try again later", "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }

    $('#employee-submit-form').submit(function(e){
        e.preventDefault();
        handleRequest('employee-submit-form','/employees','employee','Add');
    });

    $('#employee-edit-form').submit(function(e){
        e.preventDefault();
        var employee_id = $('#employee_id').val();
        handleRequest('employee-edit-form','/employees/'+employee_id,'employee','Edit');
    });

    $('#department-submit-form').submit(function(e){
        e.preventDefault();
        handleRequest('department-submit-form','/departments','department','Add');
    });

    $('#department-edit-form').submit(function(e){
        e.preventDefault();
        var department_id = $('#department_id').val();
        handleRequest('department-edit-form','/departments/'+department_id,'department','Edit');
    });

    // $('#department-edit-form').submit(function(e){
    //     e.preventDefault();
    //     var department_id = $('input[name="department_id"]').attr('value');
    //     handleRequest('department-edit-form','/departments/'+department_id,'Edit'); 
    // });

    function handleRequest(formName,url,errName,btnName){
        var form = $('#'+formName)[0];
        var formData = new FormData(form);

        $.ajax({
            type: "POST",
            url: url,
            processData: false,
            contentType: false,
            data: formData,
            beforeSend: function(){
                resetErrors(errName);
                handleButton(1,errName,btnName);
            },
            success: function (res) {
                handleButton(0,errName,btnName);
                if(res.success == 200){
                    setTimeout(function(){
                        location.href = window.location.origin +`/${errName}s`;
                    },1000);
                    swal("Done!", "", "success");
                }else{
                    $.each(res.errors, function (key, val) {
                        $("#"+ errName + "_" + key + "_err").text(val[0]);
                    });
                    swal("Error!", 'Please fiil up all the fields', "error");
                }
            },
            error: function (e) {
                handleButton(0,errName,btnName);
                swal("Error!", 'Something went wrong, please try again later', "error");
            }
        });
    }

    function resetErrors(name){
        var errors = document.getElementsByClassName(name);
        for (i = 0; i < errors.length; i++) {
            errors[i].innerHTML = "";
        }
    }
    
    function handleButton(type,model,name){
        if(type){
            $('#' + model + '-submit-btn').prop('disabled',true);
            $('#' + model + '-submit-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>');
        }else{
            $('#' + model + '-submit-btn').prop('disabled',false);
            $('#' + model + '-submit-btn').html(name);   
        }
    }
</script>
</body>
</html>