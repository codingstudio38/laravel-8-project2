<h1>login form</h1>
@if(session()->has('message'))
<h2 style="color: rgb(248, 13, 4);">{{ session()->get('message') }}</h2> 
@endif

<form action="PaginatLoginCon" method="POST">
@csrf
<input type="text" name="username" placeholder="username" ><br>
<input type="password" name="password" placeholder="password" ><br>
<input type="submit" name="submit" value="submit"><br>
</form>   