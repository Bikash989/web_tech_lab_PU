<?php

require_once "config.php";
session_start();
//selecting database
mysqli_select_db($conn, 'webtechtest');

/* for flash message */
if(isset($_SESSION['error'])) {
  echo '<p style = "color:red">' .$_SESSION['error'] ."</p>";
  unset ($_SESSION['error']);
}
if(isset ($_SESSION['success'])){
  echo '<p style = "color:green">' .$_SESSION["success"] ."</p>";
  unset ($_SESSION['success']);
}

// post data will be set once user click submit button
if(isset($_POST['email']) && isset($_POST['message']) ){  //insert VALUES
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $pincode = $_POST['pincode'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $ps = $_POST['ps'];
  $email = $_POST['email'];
  $message = $_POST['message'];

 $query = "insert into complaintbox(fname,lname,gender,pincode,city,state,policestation,email,message) values ('" .$fname . "','" .$lname ."','" .$gender ."','" .$pincode ."','" .$city ."','" .$state ."','" .$ps ."','" .$email ."','" .$message ."');";
  $res = mysqli_query($conn, $query);
  if(!$res){
    $_SESSION['error'] = 'Error in query';
    header('Location: complaint.php');
    return;
  }
  $_SESSION['success'] = 'Thankyou for your response, we will take immediate action';
  header('Location: complaint.php');
  return;
}
?>

<!-- view -->
<html>
<head>
<style>
body{
  width: 700px;
  margin: 0 auto;
  margin-top: 20px;
}
h1{
  width: inherit;
  background: steelblue;
  color: white;
  padding: 5px;
  text-align: center;
}
  input[type="submit"]{
    height: 40px;
    width: 200px;
    background: steelblue;
    color: white;
    padding: 5px;
    margin-left: 200px;
    margin-top: 20px;
  }
</style>
</head>
<body>
  <h1>Add a new complaint</h1>
  <form method="post">
    <table>
      <tr><td>first name </td><td> <input type = "text" name = "fname" size="30"></td></tr>
      <tr><td>last name </td><td><input type = "text" name = "lname" size="30"></td></tr>
      <tr><td>Gender </td><td><input type = "radio" name = "gender" value="Male" selected> Male <input type = "radio" name = "gender" value="Female"> Female</td></tr>
      <tr><td>Email </td><td><input type = "email" name = "email" size="30"></td></tr>
      <tr><td>City</td>
        <td><select name = "city">
           <option value="siliguri" >Siliguri</option>
           <option value="salugara" selected>Salugara</option>
           <option value="kalijhora">Kalijhora</option>
           <option value="kalimpong">Kalimpong</option>
           <option value="Kurseong">Kurseong</option>
         </select>
       </td></tr>
       <tr><td>State</td>
         <td><select name = "state">
            <option value="West Bengal" >West Bengal</option>
            <option value="Sikkim" selected>Sikkim</option>
          </select>
        </td></tr>
       <tr><td>Police Station</td>
         <td><select name = "ps">
            <option value="siliguri" >Siliguri PS</option>
            <option value="salugara" selected>Bhaktinagar PS</option>
            <option value="kalijhora">Kalijhora PS</option>
            <option value="kalimpong">Kalimpong PS</option>
            <option value="Kurseong">Kurseong PS</option>
          </select>
        </td></tr>
    <tr><td>Pincode </td> <td>
      <select name = "pincode">
       <option value="734001" selected>734001</option>
       <option value="734008">734008</option>
       <option value="734005">734005</option>
       <option value="735002">735002</option>
       <option value="734004">734004</option>
     </select>
   </td></tr>
   <tr><td valign="top">Complaint Message </td><td> <textarea name="message" rows="5" cols="32"></textarea>
    </table>
  <input type="submit" value="Add Complaint">
  </form>
</body>
</html>
