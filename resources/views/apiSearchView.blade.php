<h1>Search Results</h1>
<table border="1" width="70%">
    <thead>
    <tr>
        <th colspan="6"><input type="search" name="search" autocomplete="off" id="search" placeholder="Search Here" ><input type="button" name="btn-serch" onclick="getsearchData()" value="Search"></th>
    </tr>
    <tr>
        <th>Sl No</th>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>address</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>  
@foreach ($Searchdata as $item)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$item['id']}}</td>
        <td>{{$item['name']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['address']}}</td>
        <td><a href='{{"../viewEdit/".$item['id']}}'>Edit</a>--<a href='{{"../deleteUser/".$item['id']}}'>Delete</a></td>
    </tr>
@endforeach
    </tbody> 
    <tfoot>
        
    </tfoot> 
</table> 
<script>
function getsearchData(){
    let data = document.getElementById("search").value;
   if(!(data=="")){
       window.location.assign("http://127.0.0.1:8000/api/srearch/"+data);
   }
}
</script>