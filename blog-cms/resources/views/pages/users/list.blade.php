@extends('layouts.master')


@section('css')
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection


@section('content')

<h2 class="mb-3">Post List</h2>

<div class="card card-default p-4">
    <div class="card-header">
   
        <h3 class="card-title">List</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <table id="example" class="table table-striped custom-table mb-5" style="width:100%"></table>
    </div>
</div>







@endsection


@section('scripts')

<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>""
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>




<script>
    $(document).ready(function() {

        

        var userListTable = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            // "bInfo": false,
            //"ordering": false,
            "lengthChange": false,
            "ajax": {
                "url": "{{url('user_management/list_users')}}",
                "type": "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                }
            },
            "columns": [
                {
                    "title":"First Name",
                    "data": "first_name"
                },
                {
                    "title":"Last Name",
                    "data": "last_name",
                },
                {
                    "title":"Email",
                    "data": "email",
                },
                {
                    "title":" Record Date",
                    "data": "created_at"
                },
                {
                    "title":" Update Date",
                    "data": "updated_at"
                },
                {
                    "title":"User Status",
                    "bSortable":false,
                    "data": "user_status",
                    "render": function ( data, type, row ) {
                        return renderStatusButton(data);
                    }
                },
                {
                    "title":"Role",
                    "bSortable":false,
                    "data": "role",
                    "render": function (data, type, row ) {
                        let roles ="";
                        if(data){
                          
                            data.forEach((element) => {
                                roles+=element.name;
                            });
                        }
                        
                        
                        return roles;
                    }

                },
                {
                    "title":"Edit",
                    "bSortable":false,
                    "data": "id",
                    "render": function ( data, type, row ) {
                        if(row.user_status == 1){
                            var id = row.id;
                            return renderEditButton(data,id);
                        }
                        return ""
                    }
                },
                {
                    "title":"Delete/Restore",
                    "bSortable":false,
                    "data": "user_status",
                    "render": function ( data, type, row ) {
                        var id = row.id;
                        return renderDeleteButton(data,id);
                    }
                }
               
                // { "data": "photos",render: function ( data, type, row ) {

                //      var str = "";
                //     for (var key in data) {
                //         if (data.hasOwnProperty(key)) {
                //             str+= renderImages(data[key])
                //         }
                //     }
                //     return str
                //     }
                // }
            ]
        });


        function renderDeleteButton(status,id){
            var button = "";
            if(status == 1)  
                button = `<button type="button" class="btn btn-danger btn-sm shadow delete_button" data-id="delete_${id}">Delete</button>`;
            else
                button = `<button type="button" class="btn btn-warning  btn-sm shadow delete_button" data-id="undo_${id}">Restore</button>`;
            
            return button;
        }

        function renderStatusButton(status){
            var button = "";
            if(status == 1)  
                button = `<span class="badge badge-success">Active</span>`;
            else
                button = `<span class="badge badge-danger">Passive</span>`;
            
            return button;
        }


        function renderImage(src){
            var image = `<img src="${src}" class="img-fluid rounded float-left" alt="Responsive image">`;
            return image;
        }

        function renderEditButton(id){
            var button = `<a type="button" href="{{url('user_management/edit/${id}')}}" class="btn btn-primary btn-sm shadow delete_button">Edit</a>`;
            return button;
        }


        $(document).on("click",".delete_button",function() {
            var data_id = $(this).attr("data-id")
            var id = data_id.split('_')[1]
            var job = data_id.split('_')[0]
            deleteUser(id,job);
        });

        function deleteUser(id,job){
            if(job.length > 0 && id > 0){
                $.ajax({
                    url: "{{url('user_management/delete_user')}}",
                    method: 'post',
                    data: {
                        id,
                        job: (job === "delete") ? 0 : 1,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(result){
                        var data = JSON.parse(result);
                        if(data.success){
                            userListTable.ajax.reload();
                        }
                        else{
                            alert("there is an error")
                        }
                    }
                });
            }
            else {
                alert("Something wrong")
            }
        }






    });
</script>
@endsection