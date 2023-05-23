<?php
include'connect.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];
  $sql="insert into `student`(name,email,mobile,password)
  values('$name','$email','$mobile','$password')";
  $result=mysqli_query($con,$sql);
if($result){
  header('location:display.php');
}
else{
  die(mysqli_error($con));
}
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <title>Crud operation</title>

  <!-- Form validation external links -->
  <link rel="stylesheet" href="https://cdn.educba.com/css/form-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> 

<!-- Function for Form Validation -->
  <script>
        function printError(elemId, hintMsg) {
            document.getElementById(elemId).innerHTML = hintMsg;
        }
        function validateForm() {
            var name = document.contactForm.name.value;
            var email = document.contactForm.email.value;
            var password = document.contactForm.password.value;
            var mobile = document.contactForm.mobile.value;
            var nameErr = emailErr = passwErr = mobileErr = true;
            if(name == "") {
                printError("nameErr", "*Please enter name");
            } else {
                var regex = /^[a-zA-Z\s]+$/;
                if(regex.test(name) === false) {
                    printError("nameErr", "Enter valid name");
                } else {
                    printError("nameErr", "");
                    nameErr = false;
                }
            }
            if(email == "") {
                printError("emailErr", "enter your email");
            } else {
                var regex = /^\S+@\S+\.\S+$/;
                if(regex.test(email) === false) {
                    printError("emailErr", "*Please enter a valid email");
                } else{
                    printError("emailErr", "");
                    emailErr=false;
                }
            }
            if(password == "") {
                printError("passwErr", "enter your password");
            } else {
// var regex=  /^[A-Za-z]\w{7,14}$/;
var regex = "^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\\S+$).{8,14}$";


if(regex.test(password)==false) 
{ 
printError("passwErr","*Wrong...! try another...");
}
else{
    printError("passwErr", "");
    passwErr=false;
}}
            if(mobile == "") {
                printError("mobileErr", "*Please enter mobile number");
            } else {
                var regex = /^[1-9]\d{9}$/;
                if(regex.test(mobile) === false) {
                    printError("mobileErr", "*Please enter a valid mobile number");
                } else{
                    printError("mobileErr", "");
                    mobileErr = false;
                }
            }

               if((nameErr || emailErr || mobileErr ||passwErr) == true) {
                return false;
            } 
          
        };
    </script>

</head>
<body>
  <div class="container my-5">

    <!-- Calling function for Form Validation using onsubmit event -->
    <form name="contactForm" method="POST" onsubmit="return validateForm()">

      <!-- an additional div tag inside every div tag to get values from input element and pass to the function -->
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" >
        <div class="error" id="nameErr"></div>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" >
        <div class="error" id="emailErr"></div>
      </div>
      <div class="form-group">
        <label>Mobile</label>
        <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off"  ><div class="error" id="mobileErr"></div>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" >
        <div class="error" id="passwErr"></div>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</body>
</html>