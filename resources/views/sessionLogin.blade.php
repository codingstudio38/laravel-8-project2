<h1>login form</h1>
<form action="LoginCon" method="POST">
@csrf
<input type="text" name="username" placeholder="username" ><br>
<input type="password" name="password" placeholder="password" ><br>
<input type="submit" name="submit" value="submit"><br>
</form>  