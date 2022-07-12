<h1>FILE UPLOAD</h1>

@if($Smsg)
 <h3 style="color: rgb(18, 194, 18)" >{{$Smsg}}</h3>
@endif



<form action="upload" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <input type="file" name="InputFile" required ><br>
    <br>
    <input type="submit" value="UPLOAD">
</form>  