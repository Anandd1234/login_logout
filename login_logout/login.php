<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--alert popup--><script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>login_page</title>
	<style>
	:root{
	--primary:hsla(348,97%,63%,0.65);
	--secondary:hsla(230,96%,62%,0.65);
	}
	body{
	background:url("mountain_nature_elegant_wallpaper_3f.jpg");
	background-size:cover;
	background-repeat:no-repeat;
	}
	.col-8
	{
	margin-top:60px;
background-image:linear-gradient(135deg, var(--primary), var(--secondary));
	}
   
	
	</style>
  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
	<div class="col-2"></div>
	<div class="col-8  ">
    <h3 style="color:white;">Donationn</h3>
<br> 	
<br> 	
<br> 	
<h1 align="center" style="color:blue;"> Sign in</h1><br>
<br>
<br>
<br>
<h6 align="center" style="color:white;">Hello Friends! sign in and  start Donating<br>Food Items and education</h6>
<br>
<br>
<br>
<form action="" method="post">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label text-white">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-sm " id="inputEmail3" name="email" required/>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-white">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control form-control-sm" id="inputPassword3" name="password" required/>
    </div>
  </div>
  
  
  <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
  <a href="sign_up.php" style="color:white;"> or sign up</a>
  
  
  <br>
  <br>
  <br>
</form>  	
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
		$email=$_POST['email'];
		$password=$_POST['password'];
		$email_search="select * from sign where email='$email'";
		$query=mysqli_query($conn,$email_search);
		$email_count=mysqli_num_rows($query);
		if($email_count)
		{
			$email_pass=mysqli_fetch_assoc($query);
			$db_pass=$email_pass['password'];
			$pass_decode=password_verify($password,$db_pass);
			if($pass_decode)
			{
				echo"login";
			  ?>
			  <script>
			 // window.location.href="https://www.facebook.com/anandsingh.anandsingh.1238292/";
			  swal({
				 icon: "success",
                 title: "Sweet!",
                 text: "logged in...",

                 });
                   var a;
		  a=setTimeout(fun,5000);
		  function fun()
		  {
			  window.location.href="";  <!--linking pages-->
			  
		  }
			  </script>
			  <?php
			}
			else
			{
				
				echo"not login";
				?>
               <script>
			  
			        swal({
				title:'Cannot logged in...',
				text:'password is not correct....',
  buttons: [true, "Do it!"],
});
			   </script>
				<?php
				
			}
		}
		else
	    {   
		echo"invalid email";
		?>
		<script>
            swal({
				title:'please enter valid email or',
				text:'please complete sign up',
  buttons: [true, "Do it!"],
});
        </script>
				
		
		<?php
	    }
	}
	
    }
    else
	{
		echo"not connected";
	}
	
	
	
	
	
	
	
	
	?>
	
	
	
	<div class="col-2"></div>
	
	</div>
	
	</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>