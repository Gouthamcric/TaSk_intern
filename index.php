<?php
if(isset($_POST['email'])){
    session_start();
    $con= mysqli_connect("localhost", "root", "", "user")or die(mysqli_errno($con));

   
        $username=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $querry="select * from my_users";
        $res= mysqli_query($con, $querry)or die(mysqli_errno($con));
        $count= mysqli_num_rows($res);
      
        
        while($out= mysqli_fetch_array($res)or die(mysqli_errno($con)))
        {   
       //checks if user is already registered 
            if($email==$out['email'])
        {       header('location: index.php?msg=email already exist'); 
       
        }
     
        }
        $querry='insert into my_users(full_name,email,password,is_admin) values("'.$username.'","'.$email.'","'.$password.'",True)';
        $res= mysqli_query($con, $querry)or die(mysqli_errno($con));
        $_SESSION['id']= $email;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (100);  //expires after 100 seconds
        header('location: welcome.php?msg=successfully signed up');}
        
?>
<html>
    <head>
        <title></title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <link type='text/css' href='newcss.css' rel='stylesheet'>
    </head>
    <body class="background-img">
             
               
            <nav class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#stu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="login.php" class="navbar-brand">TaSk</a>
                    </div>
                    <div class="collapse navbar-collapse" id="stu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://www.linkedin.com/in/goutham-natarajan-777bb118a/"><span class="glyphicon glyphicon-user"></span> About Me</a></li>
              
                    </ul>
                        </div>
                    
                </div>
         
                
            </nav>
        <div class="container">
            <div class="row ">
             <div class="col-xs-4 col-xs-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h5>SIGN-UP</h5>
                        </div>
                     <form method="post">
                        <div class="panel-body">
                            <div>
					<label style="color: black">Full Name</label>
					<input type="text" class="form-control" name="name" placeholder="Full Name">
                            </div>
			    <div>
					<label style="color: black">Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="the username, the @ symbol, and the user's domain name">
			    </div>
			    <div>
					<label style="color: black">Password (6 or more characters)</label>
					<input type="password" name="password" class="form-control" placeholder="Password" required="true" pattern=".{6,}" title="6 character password">
			    </div>
                            <br>
                            <button class="btn btn-danger">Sign Up</button>
                            <?php if(isset($_GET['msg'])){ echo '<br><p style="color:red">*'.$_GET['msg'].'*</p>';} ?>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div> 
        <footer>
            <div class="container">
                <center>
                    <p>Copyright © Goutham Natarajan. All Rights Reserved | Contact Me: +919340554408</p>
                </center>
            </div>
        </footer>

    </body>