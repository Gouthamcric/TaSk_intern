<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['id'])){
   
header('location: index.php?msg=kindly sign up first');
exit;
}

else
{ $now = time();
 if ($now > $_SESSION['expire']) {
    
            session_unset();
             session_destroy();
            echo "Your session has expired! <a href='index.php'>sign up here</a>";
        }
        else {
?>
<html>
    <head>
        <title></title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <link type='text/css' href='newcss.css' rel='stylesheet'>
    </head>
    <body>
             
               
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
                            <h5>welcome</h5>
                        </div>
                        <form method="post">
                        <div class="panel-body">
                      <input type="file" class="form-control" id="inputfile" placeholder="upload your .csv ">
                      <br>
                      <input type="button" class="btn btn-primary" id="sub" value="submit"/>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
        </div> 
        
             <footer>
            <div class="container">
                <center>
                    <p>Copyright © Goutham Natarajan. All Rights Reserved | Contact Us: +919340554408</p>
                </center>
            </div>
        </footer>

    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $( document ).ready(function() {

function insert_and_send(arr)
{ 
    $.ajax({
                     url:"insert_user.php",
                     method:"POST",
                     data:{arr:arr},
             
                     success:function(data)
                      {
                     
                      }
                     });
}
            $('#sub').click(function () {
             var n;
                var arr=[];
                var rdr = new FileReader();
                rdr.onload = function (e) {
                  
                  var therows = e.target.result.split("\n");
                  alert("please wait for some time!");
                  n=therows.length;
                  for (var row = 0; row < therows.length; row++ ) {
                    var newr = "";
                    var columns = therows[row].split(",");
                    var colcount=columns.length;
                    if(colcount!==2) {
                        alert("incorrect number of columns");
                    } else {                    
                        arr[0]=columns[0];
                        arr[1]=columns[1];
                      insert_and_send(arr)  
                    }
                                         
                  }
                   alert("successfully inserted "+n+" records into database and mail has been sent to respective user");
                }
                rdr.readAsText($("#inputfile")[0].files[0]);
                
            });
        });
    </script>

<?php }}?>
