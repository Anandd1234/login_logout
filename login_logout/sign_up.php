<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--alert popup--><script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" >

    <title>Sign_up</title>
	<style>
	:root{
	--primary:hsla(348,97%,63%,0.65);
	--secondary:hsla(230,96%,62%,0.65);
	}
	#col-66
	{
	
	background:linear-gradient(135deg, var(--primary), var(--secondary)),url("R (3).jfif");
	height:840px;
	background-size:cover; 
	
	 //opacity: 0.5;
	
	}
	#h11{
	text-align:center;
	padding:100px;
	}
	#h66{
	text-align:center;
	padding:30px;
	}
	#hh66
	{
	text-align:center;
	}
	.padding{
	color:white;
	//margin-right:170px;
	padding:110px;
	font-size:30px;
	}
	.icon{
	color:white;
	font-size:40px;
	}
	.col-8{
	padding:120px;
	}
	
	</style>
  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
	<div class="col-6 " id="col-66"><h1 style="color:white;"  id="h11">Sign Up</h1>                           <!--one size is completed in sign up page-->
	<h6 style="color:white;" id="h66"> Donationn helps needy  when</h1>
		<p><h6 style="color:white;" id="hh66">you have an account</h6></p>
	<h6 align="center" style="color:white; padding:40px;">Get Yourself Once</h6>
	<h5 class="padding" style:"text-><i class="bi bi-diamond icon "></i>Donation</h5>

	
	</div>
	<div class="col-6  bg-warning">                               <!--part2 of sign up page--> 
	<form   action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
	 <div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="username" name="username" required>
  </div>
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="email" name="email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="password"   name="password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" required>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" placeholder="city" name="city" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="selectt">
        <option selected>Choose...</option>
        <option>BIHAR</option>
        <option>UP</option>
        <option>MADHYA PRADESH</option>
        <option>JHARKHAND</option>
        <option>ORRISA</option>
        <option>NAGALAND</option>
        <option>CHHATISGARH</option>
        <option>KERLA</option>
        <option>RAJSTHAN</option>
        <option>PUNJAB</option>
        <option>BENGAL</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" placeholder="zip" name="zip">
    </div>
  </div>
      <INPUT TYPE="CHECKBOX">By signing up <i style="color:green;"> I agree with Terms and Conditions</i> </INPUT>
	 <br><br>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Sign Up</button> 
</form>
	<p style="color:black ">or  <a href="login.php"><i style="color:red;">Log in</i></a></p>
	
	
	
	
	
	</div>
	
	</div>
	</div>



<?php
$server='localhost';
$user='root';
$pass='';
$db='signup';
$conn=mysqli_connect($server,$user,$pass,$db);
if($conn)
{
	echo "connected";
	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$selectt=$_POST['selectt'];
		$zip=$_POST['zip'];
		$pass=password_hash($password,PASSWORD_BCRYPT);
        $token=bin2hex(random_bytes(15));
	$email_query="select * from sign where email='$email'";
	$query=mysqli_query($conn,$email_query);
	$email_count=mysqli_num_rows($query);
	if($email_count>0)
	{
		echo "enter the valid email";
		?>
		<script>
		swal({
         title: "The email already exists!",
        });
		</script>
		<?php
	}
	else
	{
	
		$insertquery="INSERT into sign(username,email,password,address,city,selectt,zip,token)values('$username','$email','$pass','$address','$city','$selectt','$zip','$token')";
$res=mysqli_query($conn,$insertquery);
if($res)
{
	echo "inserted";
	$to=$email;
    $subject="Thank You";
    $message="Thank You for Sign up in my website";
    $header="From:anandsinghara012@gmail.com";
    if(mail($to,$subject,$message,$header))
	{
		echo "send";
		?>
		    <script>
			swal({
         icon: "success",
		 title:"thank you for sign up we will send mail soon...."
          });
		  var a;
		  a=setTimeout(fun,5000);
		  function fun()
		  {
			  window.location.href="login.php";
		  }
			</script>
		<?php
	}
	else{
		echo"not send";
		?>
		<script>
			swal({
         icon: "success",
		 title:"sorry we cannot send mail write now...."
          });
		  </script>
		  <?php
	}

}
else
{
	echo"not inserted";
	?>
	<script>
			swal({
         icon: "success",
		 title:"thank you for sign up we will send mail soon...."
          });
		  </script>
	<?php
	
}
	}
 }
}
else
{
	echo"not connected";
}





/*$to='$email';
$subject="Thank You";
$message="Thank You for Sign up in my website";
$header="From:anandsinghara012@gmail.com";
    mail($to,$subject,$message,$header);
*/









?>



















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	
  </body>
</html>