<?php
require_once ('config.php');
//starting session
session_start();
mysqli_select_db($conn, 'webtechtest');
//display all the complaints
//
// if(!$_SESSION){
//   $_SESSION['error'] =  'Please login first';
//   header('Location: admin.php');
//   return;
// }
/* for flash message */
// if(isset ($_SESSION['success'])){
//   echo '<p style = "color:green">' .$_SESSION["success"] ."</p>";
//   unset ($_SESSION['success']);
// }
if(isset($_POST['delbutton']) && isset($_POST['user_id'])){
  $query = "delete from complaintbox where email = '".$_POST['user_id'] ."'";
  if(mysqli_query($conn,$query)){
     // $_SESSION['success'] = 'Record deleted';
    // header('Location: viewcomplaint.php');
    // return;
  }
}
//now we will list all the complaints
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">


  </head>
      <body>
        <h2>All Complaints</h2>
      <table>
        <tr><th>first name</th><th>last name</th><th>gender</th><th>pincode</th><th>city</th><th>state</th><th>policestation</th><th>email</th><th>message</th><th>Action</th></tr>
        <!-- <tr><td>Peter</td><td>Griffin</td></tr> -->
  <?php
     //read values from database and display here


       $query = "select * from complaintbox;";
       $result = mysqli_query($conn, $query);

         while($row = mysqli_fetch_assoc($result)){
           $user_id = $row['id'];
           echo "<tr><td valign='top'>".$row['fname'];
           echo "</td><td  valign='top'>".$row['lname'];
           echo "</td><td  valign='top'>".$row['gender'];
           echo "</td><td  valign='top'>".$row['pincode'];
           echo "</td><td  valign='top'>".$row['city'];
           echo "</td><td  valign='top'>".$row['state'];
           echo "</td><td  valign='top'>".$row['policestation'];
           echo "</td><td  valign='top'>".$row['email'];
           echo "</td><td  valign='top'>".$row['message'];
           echo "</td><td  valign='top'><form method='post'><input type='hidden' name = 'user_id' value = '" .$row['email'] ."'><input type='submit' name='delbutton' value = 'Delete'> </form></td>";
           echo "</td></tr>";
         }




   ?>

      </table>

  </body>
</html>
