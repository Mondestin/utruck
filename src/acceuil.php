<?php include("config.php");?>
<?php include("stats.php");?>
<?php 
$CONTENT = "
<div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
  <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
    <div class='ui-pnotify-icon'>
      <span class='glyphicon glyphicon-ok'></span>
    </div>
    <h4 class='ui-pnotify-title'>Success</h4>
    <div class='ui-pnotify-text' aria-role='alert'>Vous ete maintenant connected
    </div>
  </div>
</div>
    <div class='col-md-4 col-sml-4'>
        <div class='row'>
              <div class='row'>
                <div class='tile-stats shadow'>
                  <div class='icon'><br><i class='fa fa-group'></i></div>
                  <div class='count'>0$drive</div>
                  <h3>CHAUFFEURS</h3>
                </div>
              </div>
              <div class='row'>
                <div class='tile-stats shadow'>
                  <div class='icon'><br><i class='fa fa-truck'></i></div>
                  <div class='count'>0$remo</div>
                  <h3>TRACTEURS</h3>
                </div>
              </div>
              <div class='row'>
                <div class='tile-stats shadow'>
                  <div class='icon'></div>
                  <div class='count'>0$semi</div>
                  <h3>SEMI-REMORQUES</h3>
                </div>
              </div>
              <div class='row'>
              <div class='tile-stats shadow'>
                <p align='center'>VEHICULES CONTROLE</p>
                 
                 <div class='row' style='margin: 15px;'>
                  <div class='col-md-6'><h3>Actif</h3></div>
                  <div class='col-md-6'><span class='badge bg-green pull-right'>0$activ</span></div>
                 </div>

                  <div class='row' style='margin: 15px;'>
                  <div class='col-md-6'><h3>Parking</h3></div>
                  <div class='col-md-6'><span class='badge bg-blue pull-right'>0$parki</span></div>
                 </div>

                  <div class='row' style='margin: 15px;'>
                  <div class='col-md-6'><h3>Garage</h3></div>
                  <div class='col-md-6'><span class='badge bg-orange pull-right'>0$garag</span></div>
                 </div>

                  <div class='row' style='margin: 15px;'>
                  <div class='col-md-6'><h3>Panne-route</h3></div>
                  <div class='col-md-6'><span class='badge bg-red pull-right'>
                  0$panes</span></div><br><br><br>
                 </div>

                </div>
              </div>
         </div>
        </div>

<div class='col-md-8'>
    
  <div class='col-md-12'>
    <div class='x_panel shadow raduis'>
      <div class='x_title'>
        <h2>Calendrier</h2>
        <ul class='nav navbar-right panel_toolbox'>      
        </ul>
        <div class='clearfix'></div>
      </div>
      <div class='x_content'>
        <div id='calendar'></div>
      </div>
    </div>
  
</div>
    </div>
";
include("home.php");
?>