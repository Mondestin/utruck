
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head-contents.php");?>
  </head>

  <body class="nav-md" style>
    <div class="container body">
      <div class="main_container">

      <?php include("navigation.php");?>
        <!-- page content-->
        <div class="right_col main_display" role="main">
          <div class="">            
                <?php 
                   if (!empty($MSG)) {
                      echo $MSG;
                    } 
                ?>
                <br><br>  
                <?php echo $CONTENT;?>        
        <!-- /page content --> 
         </div>
        </div>
        <!-- footer content -->
       <?php include("footer.php") ;?>
        <!-- /footer content -->
   
    </div>
  </div>
      <?php include("scripts_links.php") ;?>
  </body>
</html>
<!-- <form class='form-horizontal form-label-left input_mask'>

                      <div class='col-md-6 col-sm-6 col-xs-12 form-group has-feedback'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess2' placeholder='First Name'>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>

                      <div class='col-md-6 col-sm-6 col-xs-12 form-group has-feedback'>
                        <input type='text' class='form-control' id='inputSuccess3' placeholder='Last Name''
                        <span class='fa fa-user form-control-feedback right' aria-hidden='true'></span>
                      </div>

                      <div class='col-md-6 col-sm-6 col-xs-12 form-group has-feedback'>
                        <input type='text' class='form-control has-feedback-left' id='inputSuccess4' placeholder='Email'>
                        <span class='fa fa-envelope form-control-feedback left' aria-hidden='true'></span>
                      </div>

                      <div class='col-md-6 col-sm-6 col-xs-12 form-group has-feedback'>
                        <input type='text' class='form-control' id='inputSuccess5' placeholder='Phone'>
                        <span class='fa fa-phone form-control-feedback right' aria-hidden='true'></span>
                      </div>
                      <div class='ln_solid'></div>
                      <div class='form-group'>
                        <div class='col-md-9 col-sm-9 col-xs-12 col-md-offset-3'>
                          <button type='button' class='btn btn-primary'>Cancel</button>
                          <button type='submit' class='btn btn-success'>Submit</button>
                        </div>
                      </div>
                    </form> -->