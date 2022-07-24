<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <style>
        a {
            text-decoration: none !important;
        }

        .w-5 {
            width: 25px;
        }

        .h-5 {
            width: 25px;
        }

        .cursor-default {
            color: rgb(0, 0, 0);
        }

        input[type=text],
        input[type=email],
        input[type=password],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .Fcontainer {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            margin-bottom: 10px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }

        #multidataview input {
            padding: 5px;
            margin: 5px;
            text-align: center;
        }

    </style>
    <x-header comName="mainPage" />
    <div class="container">
        <br>
        <br>
        <br>


        <h1>DATA FETCH FROM DATABASE</h1>
        <h1>Import Excel</h1>
        <form action="xlimport" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <table align="center">
                <tr>
                    <td><label for="XLFile">Selet XL File</label></td>
                    <td><input type="file" id="XLFile" name="XLFile" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="IMPORT" name="IMPORT" style="width: 100%;"></td>
                </tr>
            </table>
        </form>
        <br>
        <br>
        <div class="Fcontainer">
            @if (session()->has('return_Inmsg'))
            <div class="alert alert-success show" role="alert" id="sxd">
                <strong>Status..</strong> {{ session()->get('return_Inmsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="{$('#sxd').fadeOut('slow');}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <h1>Add New</h1>
            <form action="InsertData" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Enter Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Email Id</label>
                    </div>
                    <div class="col-75">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Id" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject">Address</label>
                    </div>
                    <div class="col-75">
                        <textarea id="Address" class="form-control" name="Address" placeholder="Write" style="height:200px" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject">Selet File</label>
                    </div>
                    <div class="col-75">
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" class="form-control" value="UPLOAD" name="UPLOAD">
                </div>
            </form>

        </div>
        <form action="/UpdateMultiDataview" method="POST" autocomplete="off" id="multidataForm" style="display: none;">
            <h1 style="text-align: center;">Edit Data</h1>
            @csrf
            <div id="multidataview">

            </div>
            <input type="submit" class="btn btn-primary" value="UPDATE" name="UPDATE" style="width: 100%;">
        </form>
    </div>
    <br>
    <br>



    <div class="col-lg-12">
        <div class="alert alert-success show" role="alert" id="sxr1" style="display: none;">
            <strong>Status..</strong> <label id="msg_point_1" style="padding:0px;"></label>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="{$('#sxr1').fadeOut('slow');}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @if (session()->has('return_msg'))
        <div class="alert alert-success show" role="alert" id="sxr">
            <strong>Status..</strong> {{ session()->get('return_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="{$('#sxr').fadeOut('slow');}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
 
        <table border="1" width="100%" class="table table-striped table-dark">
            <thead>
                <tr>
                    <td colspan="5">
                        <a target="_blank" href='/createpdf'>Create Custom PDF</a>
                        <a target="_blank" href='/export-custom-xl'>Costom Excel</a>
                    </td>

                    <td colspan="1"><a href='/pdfexport'>Pdf Export</a></td>
                    <td colspan="1"><a href='/csvexport'>Csv Export</a></td>
                    <td colspan="1"><a href='/xlexport'>Excel Export</a></td>
                </tr>
                <tr>
                    <th>Sl No</th>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>address</th>
                    <th>Photo</th>
                    <th>Total Photo Upload</th>
                    <th>Action</th>
                    <th>
                        <div class="row" style="margin-right:0px; margin-left:0px;">
                            <div class="col-mg-2">
                                <input type="checkbox" name="editAll" id="Check_editAll">
                            </div>----
                            <div class="col-mg-2">
                                <input type="checkbox" name="deleteAll" id="Check_deleteAll">
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datacollection as $item)
                <tr id="Sd_{{ $item['id'] }}">
                    <td align="center">{{ $i++ }}</td>
                    <td align="center">{{ $item['id'] }}</td>
                    <td align="center">{{ $item['name'] }}</td>
                    <td align="center">{{ $item['email'] }}</td>
                    <td align="center">{{ $item['address'] }}</td>
                    <td align="center"><img src="storage/uploadFiles/{{ $item['files'] }}" style="width: 30px; height:30px;"></td>
                    <td align="center">{{ counter($item['id']) }}</td>
                    <td>
                        <div class="row">
                            <div class="col-mg-2">
                                <a href='{{ 'edit/' . $item['id'] }}' class="btn btn-danger" style="padding:2px;">Edit</a>
                            </div>
                            <div class="col-mg-2">
                                <a href='javascript:void(0)' onclick="deleteS({{ $item['id'] }})" class="btn btn-warning" style="padding:2px; margin-left:5px;">Delete</a>
                            </div>
                        </div>
                    </td>

                    <td align="center">
                        <div class="row" style="margin-right:0px; margin-left:0px;">
                            <div class="col-mg-2">
                                <input type="checkbox" name="editIds" id="editIds" class="editIds" value="{{ $item['id'] }}">
                            </div>----
                            <div class="col-mg-2">
                                <input type="checkbox" name="deleteIds" id="deleteIds" class="deleteIds" value="{{ $item['id'] }}">
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" align="center">{{ $datacollection->links('pager.pager1') }}</td>
                    <td>
                        <div class="row">
                            <div class="col-mg-2">
                                <a id="editAllselected" class="btn btn-danger" style="padding:2px;">Edit</a>
                            </div>
                            <div class="col-mg-2">
                                <a id="deleteAllselected" class="btn btn-warning" style="padding:2px; margin-left:5px;">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</body>

</html>


<script>
    // console.clear();
    //   let data=@json($datacollection);
    //   console.warn(data);
    function deleteS(val) {
        var isDelete = confirm("Are you sure ?");
        if (isDelete == true) {
            window.location.href = "delete/" + val;
        }
    }


    $(function(e) {

        setTimeout(() => {
            $("#sxr").fadeOut('slow');
            $("#sxd").fadeOut('slow');
            $("#sxr1").fadeOut('slow');
        }, 4000);


        $('#Check_deleteAll').on('click', function() {
            if ($('#Check_deleteAll:checked').length == $('#Check_deleteAll').length) {
                var isDelete = confirm("Are you sure ?");
                if (isDelete == true) {
                    $('.deleteIds').prop('checked', true);
                    $('#Check_editAll').prop('checked', false);
                    $('.editIds').prop('checked', false);
                } else {
                    $('#Check_deleteAll').prop('checked', false);
                    $('.deleteIds').prop('checked', false);
                }
            } else {
                $('.deleteIds').prop('checked', false);
            }
        });
        $('#Check_editAll').on('click', function() {
            if ($('#Check_editAll:checked').length == $('#Check_editAll').length) {
                var isDelete = confirm("Are you sure ?");
                if (isDelete == true) {
                    $('.editIds').prop('checked', true);
                    $('#Check_deleteAll').prop('checked', false);
                    $('.deleteIds').prop('checked', false);
                } else {
                    $('#Check_editAll').prop('checked', false);
                    $('.editIds').prop('checked', false);
                }
            } else {
                $('.editIds').prop('checked', false);
            }
        });

        $("#deleteAllselected").click(function(e) {
            e.preventDefault();
            var deleteIds = [];
            $("input:checkbox[name='deleteIds']:checked").each(function(i) {
                deleteIds.push($(this).val());
            });
            if (deleteIds.length == "0") {
                alert("No Records Selected..!!");
                return;
            } else {
                var isDelete = confirm("Do you really want to delete " + deleteIds.length +
                    " records ?");
                if (isDelete == true) {
                    $.ajax({
                        url: "{{ route('multidelete') }}"
                        , type: "DELETE"
                        , data: {
                            '_token': $("input[name=_token]").val()
                            , 'deleteIds': deleteIds
                        }
                        , success: function(response) {
                            $.each(deleteIds, function(key, val) {
                                $("#Sd_" + val).remove();
                            });
                            //console.log(response);
                            $("#sxr1").fadeIn('slow');
                            $("#msg_point_1").html(response.success);
                            setTimeout(() => {
                                $("#sxr1").fadeOut('slow');
                                $("#msg_point_1").html("");
                            }, 4000);
                            $('#Check_editAll').prop('checked', false);
                            $('.editIds').prop('checked', false);
                            $('#Check_deleteAll').prop('checked', false);
                            $('.deleteIds').prop('checked', false);
                        }
                    });
                } else {
                    $('#Check_deleteAll').prop('checked', false);
                    $('.deleteIds').prop('checked', false);
                    return;
                }
            }
        });

        $("#editAllselected").click(function(e) {
            e.preventDefault();
            var editIds = [];
            $("input:checkbox[name='editIds']:checked").each(function(i) {
                editIds.push($(this).val());
            });
            //console.log(editIds); return;
            if (editIds.length == "0") {
                alert("No Records Selected..!!");
                return;
            } else {
                var isDelete = confirm("Do you really want to edit " + editIds.length + " records ?");
                if (isDelete == true) {
                    $('#multidataview').html("");
                    $.ajax({
                        url: "{{ route('MultiDataview') }}"
                        , type: "POST"
                        , data: {
                            '_token': $("input[name=_token]").val()
                            , 'editIds': editIds
                        }
                        , success: function(response) {
                            response.forEach((i, key) => {
                                view = "";
                                view += `<div class="row" id="re_${i.id}">
<div class="col-sm-3">
<input type="text" value="${i.name}" placeholder="Full Name" class="form-control name" name="name[]" required id="name${i.id}">
<input type="hidden" value="${i.id}" class="form-control editids" name="editids[]" required id="editids${i.id}">
</div>
<div class="col-sm-3">
<input type="text" value="${i.email}" placeholder="Email Id" class="form-control email" name="email[]" required id="email${i.id}">
</div>
<div class="col-sm-3">
<input type="text" value="${i.address}" placeholder="Address" class="form-control address" name="address[]" required id="address${i.id}">
</div>
<div class="col-sm-3">
<input type="button" class="form-control btn btn-danger" onclick="removerow(${i.id})" value="Remove" id="btn_remove${i.id}">
</div>
</div>`;
                                //console.log(view);
                                $('#multidataview').append(view);
                            });
                            $("#multidataForm").css('display', 'block');
                            $('#Check_editAll').prop('checked', false);
                            $('.editIds').prop('checked', false);
                            $('#Check_deleteAll').prop('checked', false);
                            $('.deleteIds').prop('checked', false);
                        }
                    });
                } else {
                    $('#Check_editAll').prop('checked', false);
                    $('.editIds').prop('checked', false);
                    return;
                }
            }
        });

    });

    function removerow(val) {
        $("#re_" + val).remove();
        var count = $("#multidataview").children().length;
        if (count == "0") {
            $("#multidataForm").css('display', 'none');
        }
    }

</script>
