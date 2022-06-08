<?php
  session_start();
  $user=($_SESSION['sess_user']);
  $username=($_SESSION['sess_email']); 
              //get the image
            $image = "SELECT photo FROM users WHERE `users`.uName='$username'";  
            $resultI = query($image);
            $img = fetch_array($resultI);
                     $photoC ='
                          src="data:image/jpeg;base64,'.base64_encode($img['photo'] ).'"
                          
                         
                     ';
?>
<!-- 04 422 85 14 //06 961 23 52
06 686 02 23 -->  



        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="acceuil.php" class="site_title"><i class="fa fa-truck"></i> <span>UTRACK</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img <?php echo $photoC; ?> alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenu</span>
                <h2><?php echo "$user"; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Dashboard</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-dashboard"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="acceuil.php">Acceuil</a></li>                    
                    </ul>
                  </li>
                  <li><a><i class="fa fa-car"></i>Vehicules<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="vehicules_list.php">Liste</a></li>
                      <li><a href="vehicules_travails.php">Voyages</a></li>
                      <li><a href="vehicules_previsions.php">Previsions</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-group"></i>Chauffeurs<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chauffeurs.php">Liste</a></li>                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-road"></i>Carburants<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="transport_order.php">Ordre de Transport</a>
                      <li><a href="gasoil_list.php">Bon de gasoil</a></li>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i>Utilisateurs<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="users_list.php">Liste</a></li>
                    </ul>
                  </li>
                </ul>
              </div>           
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="index.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img <?php echo $photoC; ?> alt="">
                    <?php echo "$user"; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                    </li>
                    <li><a href="index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>       
          </div>
        </div>
      </div>
        <!-- /top navigation -->