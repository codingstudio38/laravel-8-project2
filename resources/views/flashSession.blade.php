<h1>Add New Member</h1>
@if(session('User_Name'))
    <h2>Data save for {{session('User_Name')}}, {{session('email')}}, {{session('pass')}} .</h2>
@else
    <h2>No Data saved..!!</h2>
@endif
<form action="datastore" method="POST">
    @csrf
    <input type="text" name="user" placeholder="Enter User Name"><br>
    <input type="password" name="password" placeholder="Enter Password"><br>
    <input type="email" name="email" placeholder="Enter Email ID"><br>
    <input type="submit" value="SET VALUE">
</form> 