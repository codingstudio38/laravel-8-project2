<h1>HTTP/API REQUEST USER LIST</h1>

<table border="1" width="70%">
    <thead>
    <tr>
        <th>id</th>
        <th>email</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>avatar</th>
    </tr>
    </thead>
    <tbody>
@foreach ($collection as $item)
     <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['first_name']}}</td>
        <td>{{$item['last_name']}}</td>
        <td><img src="{{$item['avatar']}}" alt="" style="width:30px; height:30px;"></td>
    </tr>
@endforeach


    </tbody>
</table> 