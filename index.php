<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3>Welcome</h3>
         <p> enter your detail and submit the form </p>
   <?php
   session_start();
   
   ?>

         <form action="welcome.php" method="POST">
           <label for="u_name">NAME:</label>
           <input type="text" placeholder="Enter your name"  name="name" id="u_name" class="name" autocomplete="off"><br>

           <pre> Gender </pre><label for="male">Male</label><input type="radio"  name="gen" id="male" value="male" class="gender">
           <label for="female">Female</label><input type="radio" name="gen"  id="female" value="female" class="gender"><br>
           

           <label for="email">Email : </label><input type="email" id="email" class="email" name="email" placeholder="Enter your email"  autocomplete="off"><br>
           

           <label for="dob"> DOB </label>
           <input type="date" value="DOB" name="dob" class="dob"     id="dob"><br>
           

           <label for="phone">Phone : </label><input type="phone" id="phone" class="phn" name="phone" placeholder="Enter your phone" id="phn"  autocomplete="off"><br>
         

           <label for="text">text for feedback :<br>
            <textarea id="feedback" cols="30" rows="2" placeholder="feedback" name="text" ></textarea>

            <button class="btn" id="submit" ">Submit</button>

           <input type="reset" value="Reset" class="reset">
        </form>
    </div>
<!-- ***********************************php**************************************** -->
  <?php
  
    if(isset($_POST['submit'])){
    $server="localhost";
    $username="root";   
    $password="";
    $con=mysqli_connect($server,$username,$password);

    if(!$con){
     die("connection to the  database is failed".mysqli_connect_error());
    }

     $name=$_POST['name'];
     $gender=$_POST['gen'];
     $email=$_POST['email'];
     $dob=$_POST['dob'];
     $phone=$_POST['phone'];
     $feedback=$_POST['text'];

     $sql="INSERT INTO `register_form`.`register_data` (`Name`, `Gender`, `Email`, `DOB`, `Phone`, `feedback`) VALUES ('$name', '$gender' , '$email',current_time(),'$phone','$feedback');";
     if($con->query($sql)==false){
         echo "error .$sql<br> $con->error";  
    }
    
     $con->close();
 }
?>
<!--**************************************php**close*************************************** -->
  <script src="script.js">
    </script>
</body>
</html>

