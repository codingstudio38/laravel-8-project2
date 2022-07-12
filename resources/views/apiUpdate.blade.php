<h1>Edit Details {{$Edata['id']}}</h1>

<form autocomplete="off" action="../update" method="post">
  @csrf  
    <input type="hidden" value="{{$Edata['id']}}" name="id">
Full Name : <input type="text" name="name" value="{{$Edata['name']}}" required ><br>
Email Id : <input type="email" name="email" value="{{$Edata['email']}}" required ><br>
Address : <input type="text" name="address" value="{{$Edata['address']}}" required ><br>
<input type="submit" name="UPDATE" value="UPDATE" >
</form>