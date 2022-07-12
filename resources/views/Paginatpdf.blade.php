<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1" width="100%"  class="table table-striped table-dark">
    <thead> 

    <tr>
        <th>Sl No</th>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>address</th>
        <th>Photo</th>
      
    </tr>
    </thead>
    <tbody>  
@foreach ($collection as $item)
    <tr>
        <td align="center">{{$i++}}</td>
        <td align="center">{{$item['id']}}</td>
        <td align="center">{{$item['name']}}</td>
        <td align="center">{{$item['email']}}</td>
        <td align="center">{{$item['address']}}</td>
        <td align="center"><img src="storage/uploadFiles/{{$item['files']}}" style="width: 30px; height:30px;" ></td>    
    </tr> 
@endforeach
    </tbody> 
    <tfoot>
       
    </tfoot>
</table>
</body>
</html>