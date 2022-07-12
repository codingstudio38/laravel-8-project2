<style>
* {
  box-sizing: border-box;
}

input[type=text],input[type=email], input[type=password], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<h1>Edit Data ID- {{$Editdata['id']}}</h1> 
<h1>Hii.. {{ session()->get('user_name') }}  <a href="../Paginatlogout">Logout</a></h1>
<div class="container">
  <form action="/Update" method="POST" enctype="multipart/form-data" autocomplete="off"> 
       @csrf
    <div class="row">
      <div class="col-25">
        <label for="fname">Enter Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" value="{{$Editdata['name']}}" placeholder="Enter Name" required>
        <input type="hidden" name="UpdateId" value="{{$Editdata['id']}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email Id</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" value="{{$Editdata['email']}}" placeholder="Email Id" required>
      </div> 
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Address">Address</label>
      </div>
      <div class="col-75">
        <textarea id="Address" name="Address" value="{{$Editdata['address']}}" placeholder="Write" style="height:200px" required>{{$Editdata['address']}}</textarea>
      </div>
    </div> 
    <div class="row">
      <div class="col-25">
        <label for="Ephoto">Selet File - <img src="{{asset('storage/uploadFiles')."/".$Editdata['files']}}" style="width: 30px; height:30px;" ></label>
      </div>
      <div class="col-75">
        <input  type="file" id="Ephoto" name="Ephoto" >
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Update" name="Login">
    </div>
  </form>
</div>