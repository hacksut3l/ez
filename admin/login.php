<?php 
  session_start();

  if(!isset($_SESSION['admin_username']))
  {
    ob_start();
	
    include_once('include/header.php');
	
    $usernamemsg = '';
    $passwordmsg = '';
    $errormsg = '';
    
    if(isset($_POST['sumbit']))
    {
		/*
		if (isset($_POST['username']) and isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
			
			$result = mysql_query($query) or die(mysql_error());
			$count = mysql_num_rows($result);
			if ($count == 1){
				$_SESSION['admin_username'] = $username;
				header('Location:dashboard.php');
			}
		} */

		
      if($_POST['username'] == '' && $_POST['password'] == '')
      {
        $usernamemsg = 'The Username field is required.';
        $passwordmsg = 'The Password field is required.';
      }
      else if($_POST['username'] == '')
      {
        $usernamemsg = 'The Username field is required.';
      }
      else if($_POST['password'] == '')
      {
        $passwordmsg = 'The Password field is required.';
      }
	  
	  	if (isset($_POST['username']) and isset($_POST['password'])){
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
			
			$result = mysql_query($query) or die(mysql_error());
			$count = mysql_num_rows($result);
			if ($count == 1){
				$_SESSION['admin_username'] = $username;
				header('Location:dashboard.php');
			}else{
				$errormsg = 'Wrong username and password';
			}
		} 
		
      /*else
      {
	  
		
        $sql = "SELECT * FROM `admin` WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
        $sqlquery = mysqli_query($sql); 
        $rows = mysql_num_rows($sqlquery); 

        if($rows > 0)
        {
          $_SESSION['admin_username'] = $username;
          header('Location:dashboard.php');
        }
        else
        {
          $errormsg = 'Wrong username and password';
         
      }
        
      }*/
    }
?>
<div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Sign In</p>
            <div class="block-body">
            <?php
        if(isset($errormsg))
          echo "<span style='color:red;'>".$errormsg."</span>";
      ?>
                <form action="" method="POST">
                    <label>Username</label>
                    <input type="text" class="span12" name="username">
                    <?php
            if(isset($usernamemsg))
              echo "<span style='color:red;'>".$usernamemsg."</span>";
          ?>
                    <label>Password</label>
                    <input type="password" class="span12" name="password">
                    <?php
            if(isset($passwordmsg))
              echo "<span style='color:red;'>".$passwordmsg."</span>";
          ?>
                    <input type="submit" name="sumbit" value="Sign In" class="btn btn-primary pull-right"/>
                    <label class="remember-me"><input type="checkbox"> Remember me</label>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
       
        <!--<p><a href="">Forgot your password?</a></p>-->
    </div>
</div>

<?php
  }
  else
  {
    header('Location:dashboard.php');
  }
?>
