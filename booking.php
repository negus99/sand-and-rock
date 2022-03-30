<?php
include 'config.php';
error_reporting(0);
if($_POST['submit']){
  if(isset($_POST['submit'])){
      $name=($_POST['name']);
      $email=($_POST['email']);
      $phone=($_POST['phone']);
      $arrive=($_POST['arrive']);
      $depart=($_POST['depart']);
      $room=($_POST['room']);
      $bed=($_POST['bed']);
      $comments=($_POST['comments']);
      
      if($name==$name){
          $sql= "SELECT from booking where email='$email'";
          $result=mysqli_query($conn, $sql);
          if(mysqli_num_rows($result)>0){
              echo"<script> alert('Username Already Exist')</script>";
          }
          else {
          $sql= "INSERT INTO booking (name, email, phone, arrive, depart, room, bed, comments) VALUES('$name','$email','$phone','$arrive','$depart','$room','$bed','$comments')";
          $result=mysqli_query($conn, $sql);
          }
          if(!$result){
              echo"<script> alert('Somethig Went Wrong')</script>";
          }
          else{
              echo"<script> alert('Booked')</script>";
          }
      }
      else {
          echo"<script> alert('')</script>";
      }
  }
}
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking</title>
</head>
    <style>

body{
	text-align: center;
	font-family: 'Lato', 'sans-serif';
	font-weight: 400;
    background-image: url(room.jpg);
    background-position: center;
    background-size: cover;
}

h1{
    text-align: center;
    color: white;
    opacity: .8;
    font-size: 40px;
    font-weight: bold;
}
.form-group {  
    margin: auto;
    background-color: rgb(20, 80, 70);
    opacity: .8;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
  text-align: left;
}
h2{
    text-align: center;
    color: white;
    font-size: 32px;
}

.form-group label {
    text-align: left;
  margin: 5px 10px 5px 0;
  color: black;
  font-weight: bold;
}
label {
        display: inline-block;
        width: 150px;
        text-align: right;
      }
      input[type=text]{
        width: 100%;
        background: transparent;
        color: white;

      }

input[type=text], select {
  width: 100%;
  background: transparent;
  padding: 12px 20px;
  margin: 8px 0;
  color: white;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
textarea{
    width: 50%;
  height: 150px;
  background: transparent;
  color: black;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;

}

input[type=submit] {
  width: 100%;
  background-color: green;
  opacity: .8;
  color: black;
  font-size: 20px;
  font-weight: bold;
  padding: 14px 20px;
  margin: 8px 0;
  border: 2px;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>
    <h1>SAND & ROCK RESORT</h1>
    <form  action="" method="POST">
        <!--  General -->
        <div class="form-group">
          <h2 class="heading">Booking</h2>
            <label for="name">Name</label>
            <input type="text" id="name" class="floatLabel" name="name">
            <label for="name">Email</label>
            <input type="text" id="email" class="floatLabel" name="email">
            <label for="email">Phone</label>
            <input type="tel" id="phone" class="floatLabel" name="phone">
            <h2 class="heading">Details</h2>
            <label for="arrive" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Arrive</label>
            <input type="date" id="arrive" class="floatLabel" name="arrive" value="<?php echo date('Y-m-d'); ?>">
            <br>
            <label for="arrive" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Depart</label>
            <input type="date" id="depart" class="floatLabel" name="depart" value="<?php echo date('Y-m-d'); ?>" />
            <br>
            <label for="room">Room</label>
            <select name="room" id="room">
                <option value="deluxe" selected>With Bathroom</option>
                <option value="Zuri-zimmer">Without Bathroom</option>
            </select>
            <label for="bed">Bedding</label>
            <select name="bed" id="bed">
                <option value="single-bed">Zweibett</option>
            <option value="double-bed" selected>Doppelbett</option>
            </select>
            <label for="comments">Comments</label> 
            <br> 
            <textarea name="comments" class="floatLabel" id="comments"></textarea>
            <br>
           <input type="submit" value="Book" name="submit">

        </div> 
      </form>
</body>
</html>