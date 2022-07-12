<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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


        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }


        #all_inputs input,
        select {
            padding: 5px;
            margin: 5px;
            text-align: center;
        }

    </style>
    <x-header comName="Mrow" />
    <div class="container">
        <br>
        <br>
        <br>
        <h1>MULTIPLE ROW</h1>

        <form action="PaginationMrowInsert" method="POST" autocomplete="off">
            @csrf
            <table width="100%" border="0" align="center">
                <tr>
                    <td colspan="6">
                        <b id="msgPoint"></b>
                        <input type="button" onclick="generateInputs()" class="btn btn-info btn-block" value="ADD NEW">
                    </td>
                </tr>
                <tr>
                    <td colspan="6" align="center">

                        <div id="all_inputs" style="margin-top: 10px; margin-bottom:10px;">
                        </div>

                    </td>
                </tr>
                <tr>
                    <td colspan="6"><input type="submit" class="btn btn-primary" value="UPLOAD" name="UPLOAD"
                            style="width: 100%;"></td>
                </tr>
            </table>
        </form>
    </div>
    <br>


</body>

</html>


<script>
    function generateInputs() {
        var a = Math.floor(Math.random() * 999);
        var element1 = document.createElement('input');
        element1.type = "text";
        element1.placeholder = "Full Name";
        element1.className = "form-control name";
        element1.name = "name[]";
        element1.required = "true";
        element1.id = "name_" + a;
        element1.onchange = function() {
            //alert(this.value);
            //alert(this.id);
        };


        var element2 = document.createElement('input');
        element2.type = "email";
        element2.placeholder = "Email Id";
        element2.className = "form-control email";
        element2.name = "email[]";
        element2.required = "true";
        element2.id = "email_" + a;
        element2.onchange = function() {
            //alert(this.value);
            //alert(this.id);
        };


        var element3 = document.createElement('input');
        element3.type = "text";
        element3.placeholder = "Address";
        element3.className = "form-control address";
        element3.name = "address[]";
        element3.required = "true";
        element3.id = "address_" + a;
        element3.onchange = function() {
            //alert(this.value);
            //alert(this.id);
        };






        var element4 = document.createElement('input');
        element4.type = "button";
        element4.className = "form-control btn btn-danger";
        element4.value = "Remove";
        element4.id = element1.id + "," + element2.id + "," + element3.id;
        element4.onclick = function() {
            var btm_id = this.id;
            const myArr = btm_id.split(",");
            var type_R = myArr[1];
            var re_idvalue = type_R.split("_");
            var get_value = re_idvalue[1];
            $("#board_" + get_value).remove();
        };


        var div1 = document.createElement('div');
        div1.className = "col-sm-3";
        var div2 = document.createElement('div');
        div2.className = "col-sm-3";
        var div3 = document.createElement('div');
        div3.className = "col-sm-3";
        var div4 = document.createElement('div');
        div4.className = "col-sm-3";
        div1.appendChild(element1);
        div2.appendChild(element2);
        div3.appendChild(element3);
        div4.appendChild(element4);
        var board = document.createElement('div');
        board.className = "row";
        board.id = "board_" + a;
        board.appendChild(div1);
        board.appendChild(div2);
        board.appendChild(div3);
        board.appendChild(div4);
        document.getElementById('all_inputs').appendChild(board);
        console.clear();
    }
</script>
