<h1>httpmethodVIEW</h1>

<form action="FormSubmit" method="POST">
@csrf
{{method_field('PUT')}}
<input type="text" name="user" id="user" placeholder="Enter Username"><br>
<input type="password" name="password" id="password"placeholder="Enter Password"><br>
<button type="submit" >Submit</button><br>

</form>