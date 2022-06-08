<?php include("config.php");  session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTRACK</title>
      <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- MyCustom  Style -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
  </head>

  <body class="login">
  <!-- Content of the page -->
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form logins">
          <section class="login_content" style="padding-top: 0px!important;">
            <br><br>
              <a href="javascript:;" class="user-profile">
                    <img src="images/user.png" alt="" style=" width: 75px!important; height: 75px!important;">                   
               </a>      
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">  
              <h1>Bienvenu</h1>
              <div>
                <input type="text" class="form-control" name="user" placeholder="Utilisateur" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="pass" placeholder="Mot de Pass" required="" />
              </div>
              <div>
                <button class="btn btn-primary submit">Conneter</button>
              </div>
              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script type="text/javascript">   
            $(".msg-error").removeClass("ui-pnotify-fade-in").fadeOut(10000);     
    </script>

  </body>
</html>
<?php 
  if (isset($_SERVER["REQUEST_METHOD"]) == "POST") 
  {
    if(!empty($_POST["user"]) && !empty($_POST["pass"]))
    {   
      $user = clean($_POST["user"]);
      $pass = clean($_POST["pass"]);
       if (!filter_var($user, FILTER_VALIDATE_EMAIL)) 
       {
           echo "<!-- Error Alert Message -->
              <script>
                  alert('Utilisateur ou mot de pass est incorrect');
              </script>
          ";
       }
       else
       {
        $sql=query("SELECT * from users where uName='$user'");

        // Checking if the logins details are correct
         while($row=fetch($sql)){   
         $username=$row->uName;
         $password=$row->uPassword;
         $uname=$row->lname;
      
          if ($username==$user && $password==$pass) 
          {
              //save the time that the user has logged in
                 $loginTime=query("UPDATE `users` SET `lastLogin` = CURRENT_TIMESTAMP() WHERE `users`.`uName` = '$username'");

                $_SESSION['sess_user']=$uname;
                $_SESSION['sess_email']=$username; 
                //header("Refresh:5; url=register.php");
               print "<meta http-equiv=\"refresh\" content=\"0;URL=acceuil.php\">"; 
          }  

       }
    }  
 }
 }       
 ?>
