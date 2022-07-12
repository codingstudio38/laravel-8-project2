<h1>Query Builder View Page</h1>

<table border="1" width="70%">
    <thead>
    <tr>
        <th>Sl No</th>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>updated_at</th>
        <th>created_at</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>  
 <p style="display: none;">{{$i=1}}</p>       
@foreach ($dataCol as $item)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->updated_at}}</td>
        <td>{{$item->created_at}}</td>
        <td><a href='{{"editQB/".$item->id}}'>Edit</a>--<a href='{{"deleteQB/".$item->id}}'>Delete</a></td>
    </tr>
@endforeach
    </tbody> 
</table> 