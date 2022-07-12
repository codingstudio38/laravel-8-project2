<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <style>
       input[type=submit] {
  background-color: #04AA6D;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
#all_inputs input,select {
      padding: 5px;
      margin: 5px;
      text-align: center;
    }
   </style>
</head>
<body>
<x-header comName="Mprow"/> 
<div class="container">
  <br>
  <br> 
   <br> 
<h1>MULTIPLE PHOTOS</h1>
@if(session()->has('return_msgMulti'))
 <div class="alert alert-success show" role="alert"  id="sxr" >
  <strong>Status..</strong> {{ session()->get('return_msgMulti') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="{$('#sxr').fadeOut('slow');}">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
@endif
<form action="/uploadMultiFiles" method="POST" autocomplete="off" enctype="multipart/form-data"> 
       @csrf
<table width="100%" border="0" align="center">
        <tr>
          <td colspan="6">
            <b id="msgPoint"></b>
            <input type="button" onclick="generateInputs()" class="btn btn-info btn-block" value="ADD NEW" >
          </td>
        </tr>
        <tr>
          <td colspan="6" align="center">

            <div id="all_inputs" style="margin-top: 10px; margin-bottom:10px;">
            </div>

          </td>
        </tr>
        <tr>
           <td colspan="6"><input type="submit" class="btn btn-primary" value="UPLOAD" name="UPLOAD" style="width: 100%;"></td>
         </tr>
      </table>
       </form>
</div>
<br>
<br>
<div class="col-lg-12">
<table border="1" width="100%"  class="table table-striped table-dark">
    <thead>
    <tr>
        <th>Sl No</th>
        <th>Id</th>
        <th>ContentId</th>
        <th>Files</th>
        <th>Path</th>
        <th>user_name</th>
        <th>user_email</th>
        <th>user_address</th>
        <th>user_files</th>
        <th>
          <div class="row"  style="margin-right:0px; margin-left:0px;">
          <div class="col-mg-2">
          <input type="checkbox" name="editAll" id="Check_editAll">
          </div>----
          <div class="col-mg-2">
           <input type="checkbox" name="deleteAll" id="Check_deleteAll" >
          </div>
          </div>
        </th>
    </tr>
    </thead>
    <tbody>  
@foreach ($mdata as $item)
    <tr id="Sd_{{$item['mid']}}">
        <td align="center">{{$i++}}</td>
        <td align="center">{{$item['mid']}}</td>
        <td align="center">{{$item['contentid']}}</td>
        <td align="center"><img src="storage/multiuploadFiles/{{$item['files']}}" style="width: 30px; height:30px;" ></td>
        <td align="center">{{$item['path']}}</td>
        <td align="center">{{$item['user_name']}}</td>
        <td align="center">{{$item['user_email']}}</td>
        <td align="center">{{$item['user_address']}}</td>
        <td align="center"><img src="storage/uploadFiles/{{$item['user_files']}}" style="width: 30px; height:30px;" ></td>
        <td align="center">
         <div class="row"  style="margin-right:0px; margin-left:0px;">
          <div class="col-mg-2">
          <input type="checkbox" name="editIds" id="editIds" class="editIds" value="{{$item['mid']}}">
          </div>----
          <div class="col-mg-2">
          <input type="checkbox" name="deleteIds" id="deleteIds" class="deleteIds" value="{{$item['mid']}}">
          </div>
          </div>
        </td>
    </tr> 
@endforeach 
    </tbody> 
    <tfoot>
        <tr>
          <td colspan="9"></td>  
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

<script>
$(function(e){

 setTimeout(() => {
   $("#sxr").fadeOut('slow');
  }, 4000);


  $('#Check_deleteAll').on('click',function(){
        if($('#Check_deleteAll:checked').length == $('#Check_deleteAll').length){
          var isDelete = confirm("Are you sure ?");
          if (isDelete == true){
           $('.deleteIds').prop('checked',true);
           $('#Check_editAll').prop('checked',false);
           $('.editIds').prop('checked',false);
          } else {
            $('#Check_deleteAll').prop('checked',false);
            $('.deleteIds').prop('checked',false);
          }
        }else{
            $('.deleteIds').prop('checked',false);
        }
    });
    $('#Check_editAll').on('click',function(){
        if($('#Check_editAll:checked').length == $('#Check_editAll').length){
           var isDelete = confirm("Are you sure ?");
          if (isDelete == true){
           $('.editIds').prop('checked',true);
           $('#Check_deleteAll').prop('checked',false);
           $('.deleteIds').prop('checked',false);
          } else {
            $('#Check_editAll').prop('checked',false);
            $('.editIds').prop('checked',false);
          }
        }else{
            $('.editIds').prop('checked',false);
        }
    });

});




    function generateInputs() {
        var a = Math.floor(Math.random() * 999);
        var element1 = document.createElement('input');
        element1.type = "file";
        element1.className = "form-control photos";
        element1.name = "photos[]";
        element1.required = "true";
        element1.id = "photos_" + a;
        element1.onchange = function () {
          //alert(this.value);
          //alert(this.id);
        };

        var element2 = document.createElement("select");
        element2.className = "form-control contentid";
        element2.name = "contentid[]";
        element2.required = "true";
        element2.id = "contentid_" + a;
        element2.onchange = function () {
            //alert(this.value);
          //alert(this.id);
        }

        var optionAS = document.createElement("option");
        optionAS.value = "0";
        optionAS.text = "Select Id";
        element2.append(optionAS);
        $.ajax({
          type: "GET", 
          url: "/getSelectids",
          data:{'_token':$("input[name=_token]").val()},
              success: function (dataId) {
                  //console.log(dataId);return;
                    dataId.forEach((i, key) => {
                      var option = document.createElement("option");
                      option.value = i.id;
                      option.text = i.id;
                      element2.append(option);
                  });
              }
          });
     
 

        var element3 = document.createElement('input');
        element3.type = "button";
        element3.className = "form-control btn btn-danger";
        element3.value = "Remove";
        element3.id = element1.id + "," + element2.id;
        element3.onclick = function () {
          var btm_id = this.id;
          const myArr = btm_id.split(",");
          var type_R = myArr[1];
          var re_idvalue = type_R.split("_");
          var get_value = re_idvalue[1];
          $("#board_"+get_value).remove();
        };


        var div1 = document.createElement('div');
        div1.className = "col-sm-4";
        var div2 = document.createElement('div');
        div2.className = "col-sm-4";
        var div3 = document.createElement('div');
        div3.className = "col-sm-4";
        div1.appendChild(element1);
        div2.appendChild(element2);
        div3.appendChild(element3);
        var board = document.createElement('div');
        board.className = "row";
        board.id = "board_" + a;
        board.appendChild(div1);
        board.appendChild(div2);
        board.appendChild(div3);
        document.getElementById('all_inputs').appendChild(board);
        console.clear();
    }
</script>
</html>