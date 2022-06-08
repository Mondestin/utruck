<?php 
class Functions
{

    public static function vehicules_w($cherche="")
    {  
     //init
   	 $list = "";
     $listT = "";
     $chauffeurs = "";
     $gasoils_list = "";
     $search = "";
    //process
    //get gasoils list 
     $chau=query("SELECT * FROM `bon_gasoil`");
     while ($names = fetch($chau)) {      
        $gasoils_list .="<option value='$names->gNo'>$names->gNo</option>";
     }
  
   //get drivers list 
     $chau=query("SELECT * FROM `chauffeurs`");
     while ($names = fetch($chau)) {
        $chauf=$names->cSurname;
        $chaufid=$names->vID;
        $chauffeurs.="<option value='$chaufid'>$chauf</option>";
     }

#=====================================TERMINER=============================================
         //get the vehicules list 
     $rstT=query("SELECT * FROM `voyages` WHERE vStatus='Terminer' ORDER BY `voyages`.`voID` DESC");
     while ($rowT = fetch($rstT)) {
        $vIDsT=$rowT->vID;
        $gNosT=$rowT->gNo;
        $voIDT=$rowT->voID;
        //get voyage information to be display
         $rst_vT=query("SELECT * FROM `ordres_trans` INNER JOIN bon_gasoil 
         ON `ordres_trans`.otID=`bon_gasoil`.otID WHERE gNo='$gNosT'");
          while ($rowsT = fetch($rst_vT)) {
               $chargementT=$rowsT->chargement;
               $dechargementT=$rowsT->dechargement;
               $clientT=$rowsT->client;
               $obsT=$rowsT->obs;
               $dateDT=$rowsT->dateD;
               $dateRT=$rowsT->dateR;
               $marchandiseT=$rowsT->marchandise;
               $vPlaqueT=$rowsT->vID;

           //get drivers and vehicules information link to gNo 
         $infoT=query("SELECT * FROM `chauffeurs` INNER JOIN `vehicules` 
          ON `chauffeurs`.vID=`vehicules`.vID WHERE `chauffeurs`.vID='$vIDsT'");
         while ($infosT = fetch($infoT)) {
           $cIDT=$infosT->cID;
            $cSurnameT=$infosT->cSurname;
            $cNameT=$infosT->cName;
            $vTypeT=$infosT->vType;
            $vNT=$infosT->vName;
            $bgColorsT=$infosT->bgColor;
            $vStatusT=$infosT->vStatus;

              //get the image
            $imageT = "SELECT photo FROM chauffeurs WHERE `chauffeurs`.cID='$cIDT'";  
            $resultIT = query($imageT);
            $imgT = fetch_array($resultIT);
                     $photoCT ='
                          <img src="data:image/jpeg;base64,'.base64_encode($imgT['photo'] ).'" class="avatar">
                          
                         
                     ';    
    
               }
      }

            $listT .= "       
                          <tr class='shadow raduis'>
                            <td style='border-left: 5px solid #3498DB!important;'>$voIDT</td>
                            <td><h4>$vTypeT <br> [ $vPlaqueT ]  <br> $vNT
                            </h4>                           
                            <small>
                              
                            </small>
                             <br>
                            </td>
                            <td>
                              <div class='row travail shadow raduis' style='border: 1px solid #3498DB!important;'>
                                 <div class='row status bg-blue raduis'>     
                              </div>
                              <div class='row w-info'>
                              $photoCT
                                <h5 style='padding-left:18%;'> $cNameT $cSurnameT </h5>
                                 <h5 style='padding-left:18%;'> [ $dateDT au $dateRT ]</h5>
                              </div>                 
                            </div>
                          </td>
                          <td class='project_progress'>
                            <small>Marchandise:     $marchandiseT</small><br>
                            <small>Chargement:      $chargementT</small><br>
                            <small>Dechargement:    $dechargementT</small><br>
                            <small>Client:          $clientT</small><br>
                            <small>Gasoil No:       $gNosT</small><br>
                          </td>
                          <td>
                            <h5>$obsT</h5>
                          </td>
                          <td style='width: 8%;'>
                            <a href='?Action=Profile&vID=$rowT->vID' class='btn btn-info btn-xs' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='voir tout'><i class='fa fa-file'></i> </a>
                          </td>
                        </tr>

            ";
}

#================================ENCOURS==================================================   
    //get the vehicules list 
    $query="SELECT * FROM `voyages` WHERE vStatus='enCours' ORDER BY `voyages`.`voID` DESC";
     $rst=query($query);
     while ($row = fetch($rst)) {
        $vIDs=$row->vID;
       	$gNos=$row->gNo;
        $voID=$row->voID;
        //get voyage information to be display
         $rst_v=query("SELECT * FROM `ordres_trans` INNER JOIN bon_gasoil 
         ON `ordres_trans`.otID=`bon_gasoil`.otID WHERE gNo='$gNos'");
          while ($rows = fetch($rst_v)) {
               $chargement=$rows->chargement;
               $dechargement=$rows->dechargement;
               $client=$rows->client;
               $obs=$rows->obs;
               $dateD=$rows->dateD;
               $dateR=$rows->dateR;
               $marchandise=$rows->marchandise;
               $vPlaque=$rows->vID;
               //$noRemorque=$rows->noRemorque;

           //get drivers and vehicules information link to gNo 
         $info=query("SELECT * FROM `chauffeurs` INNER JOIN `vehicules` 
          ON `chauffeurs`.vID=`vehicules`.vID WHERE `chauffeurs`.vID='$vIDs'");
         while ($infos = fetch($info)) {
            $cID=$infos->cID;
            
            $cSurname=$infos->cSurname;
            $cName=$infos->cName;
            $vType=$infos->vType;
            $vN=$infos->vName;
            $bgColors=$infos->bgColor;
            $vStatus=$infos->vStatus;

            //get the image
            $image = "SELECT photo FROM chauffeurs WHERE `chauffeurs`.cID='$cID'";  
            $resultI = query($image);
            $img = fetch_array($resultI);
                     $photoC ='
                          <img src="data:image/jpeg;base64,'.base64_encode($img['photo'] ).'" class="avatar" style="height: 50px; width: 50px;">
                          
                         
                     ';         

            if ($vStatus=="Actif") {
              $color='#1ABB9C';
            }
            elseif ($vStatus=="Parking") {
              $color='lightblue';
            }
            elseif ($vStatus=="Garage") {
              $color='lightorange';
            }
            elseif ($vStatus=="Pane-route") {
              $color='#E74C3C';
            }
               }
      }

       	    $list .= "       
                          <tr class='raduis' style='border-left: 5px solid $color;' aria-sort='ascending'>
                            <td style='border-left: 5px solid $color;'>$voID</td>
                            <td><h4>$vType <br> [ $vPlaque ]  <br> $vN
                            </h4>                           
                            </td>
                            <td>
                              <div class='row travail shadow raduis' style='border: 1px solid $color!important;'>
                                 <div class='row status $bgColors raduis'>     
                              </div>
                              <div class='row w-info'>
                                $photoC
                                <h5>$cName $cSurname</h5>
                                    [ $dateD au $dateR ]
                              </div>                 
                            </div>
                          </td>
                          <td class='project_progress'>
                            <small>Marchandise:     $marchandise</small><br>
                            <small>Chargement:      $chargement</small><br>
                            <small>Dechargement:    $dechargement</small><br>
                            <small>Client:          $client</small><br>
                            <small>Gasoil No:       $gNos</small><br>
                          </td>
                          <td>
                            <h5>$obs</h5>
                          </td>
                          <td >
                            <a href='?Action=Profile&vID=$row->vID' class='btn btn-info btn-xs' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='voir tout'><i class='fa fa-file'></i> </a>
                            <a href='?Demand=Terminer&vID=$row->vID' class='btn btn-primary btn-xs'><i class='fa fa-mail-forward' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='Terminer'></i></a><br>
                            <small>
                              <div class='btn-group'>
                                    <button type='button' class='btn btn-default btn-sm $bgColors dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>$vStatus
                                        <span class='fa fa'></span>
                                    </button>
                                    <ul class='dropdown-menu dropdown-default pull-right' role='menu'>
                                       <li>
                                          <a href='?Demand=Chs&vID=$row->vID&cB=Actif'>
                                            <i class='entypo-trash'></i>
                                             ACT                        
                                          </a>
                                        </li>
                                        <li>
                                          <a href='?Demand=Chs&vID=$row->vID&cB=Pane-route'>
                                            <i class='entypo-trash'></i>
                                              PNR                       
                                         </a>
                                        </li>
                                    </ul>
                                </div>
                            </small>
                          </td>
                        </tr>

            ";
       } 
#=======================================================================================
    	return  "
      <br><br>
      <div class='row bg-white raduis'>
      <a href='' class='btn btn-primary pull-right add-btn' data-toggle='modal' data-target='.bs-example-modal-md'><i class='fa fa-plus-circle'></i>  Nouveau</a>
       <h2 class='display_text'>Liste des Voyages</h2>
        </div><br>
      
      <div class='row bg-blue raduis'>  
      <h5 class='display_text'>Avant de creer un voyage, vous devriez avoir un chauffeur disponible et un unique bon de gasoil.</h5>
        </div>  <hr>

  <div class='profile-env'>
  <header class='row'>
    <div class='col-md-12'>

    <ul class='nav nav-tabs' style='margin: 5px;'>
      <li class='active pull-left'>
      <a href='#tab1' data-toggle='tab' class='btn btn-default bg-green' aria-expanded='true' style='color: white;'>
          <span class='visible-xs'><i class='entypo-home'></i></span>
          <span class='hidden-xs'>En Cours</span>
        </a>
      </li>
      <li class=''>
        <a href='#tab2' data-toggle='tab' class='btn btn-default bg-blue' aria-expanded='false'>
          <span class='visible-xs'><i class='entypo-user'></i></span>
          <span class='hidden-xs'>Terminer</span>
        </a>
      </li>
    </ul>

    <div class='tab-content'>
      <div class='tab-pane active' id='tab1'>
            <div class='row'>
              <div class='col-md-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Voyages en Cours</h2>             
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>

                    <!-- start travail list -->
                    <table id='datatable-responsive' class='table table-striped projects'>
                      <thead>
                        <tr>
                          <th>#No</th>
                          <th>Camions</th>
                          <th>Voyages</th>
                          <th>Infos</th>
                          <th>Commentaire</th>
                          <th>Options</th>
                        </tr>
                      </thead>
                      <tbody>
                          $list                                 
                      </tbody>
                    </table>
                
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class='tab-pane' id='tab2'>
            <div class='row'>
              <div class='col-md-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Voyages Terminés</h2>             
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <!-- start travail list -->
                    <table id='datatable' class='table table-striped projects'>
                      <thead>
                        <tr>
                          <th style='width: 1%'>#No</th>
                          <th>Camions</th>
                          <th>Voyages</th>
                          <th>Infos</th>
                          <th>Commentaire</th>
                          <th>Options</th>
                        </tr>
                      </thead>
                      <tbody>
                        $listT                            
                      </tbody>
                    </table>
                
                  </div>
                </div>
              </div>
      </div>
    <br>
  </div>
  </header>
</div>
   
          <br>
                 <!-- Add Travail modal -->
              <div class='modal fade bs-example-modal-md' tabindex='-1' role='dialog' aria-hidden='true' style='display: none;'>
                    <div class='modal-dialog modal-md'>
                      <div class='modal-content'>

                        <div class='modal-header bg-blue raduis'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                          </button>
                          <h4 class='modal-title' id='myModalLabel2'>Nouveau Voyage</h4>
                        </div>

                   <div class='modal-body'>
                    <form class='form-horizontal form-label-left input_mask validate ' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate=''>

                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'>
                     <label>Chauffeur</label>
                       <select class='form-control has-feedback-left' name='chauffeur' required='required'>
                             $chauffeurs
                          </select>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback s-pad'><label>Bon gasoil No</label>
                        <select class='form-control has-feedback-left' name='gasoil' required='required'>
                            $gasoils_list 
                          </select>
                        <span class='fa fa-barcode form-control-feedback left' aria-hidden='true'></span>
                      </div>
                      <hr><br><br><br>
                     <div class='modal-footer'>
                          <button type='button' class='btn btn-default bg-red' data-dismiss='modal'>Fermer</button>
                          <button type='submit' class='btn btn-primary'>Sauvegarder</button>
                        </div>
                    </form> 
                   </div>

                      </div>
                    </div>
                  </div>
                  <!-- /modals -->
";
    }
    public static function delete($vID)
    {
      //init
        //process
        $delt=query("DELETE FROM `voyages` WHERE `vID`='$vID'");

        return "
            <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
              <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
                <div class='ui-pnotify-icon'>
                  <span class='glyphicon glyphicon-ok'></span>
                </div>
                <h4 class='ui-pnotify-title'>Success</h4>
                <div class='ui-pnotify-text' aria-role='alert'>Data effacer avec Success
                </div>
              </div>
            </div>";
    }
   //Change the status of the vehicules during a voyage 
  public static function Chs($vID,$cB)
    {

      //init
      //process
      if ($cB=="Actif") {
        $cBs="bg-green";
        $status="Actif";
      }
      elseif ($cB=="Pane-route") {
        $cBs="bg-red";
        $status="Pane-route";
      }
        $changeStatus=query("UPDATE `vehicules` SET `bgColor` = '$cBs', 
          `vStatus` = '$status'  WHERE `vehicules`.`vID` = '$vID'");

        return "
            <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
              <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
                <div class='ui-pnotify-icon'>
                  <span class='glyphicon glyphicon-ok'></span>
                </div>
                <h4 class='ui-pnotify-title'>Success</h4>
                <div class='ui-pnotify-text' aria-role='alert'>Le status a change avec Success
                </div>
              </div>
            </div>";
    }

  //get voyage profile/ all the information about the voyage
   public static function profile($vID)
    {
      //init
        //process
        //$delt=query("DELETE FROM `voyages` WHERE `vID`='$vID'");

        return "  Profile";
    }

   //Terminer le voyage 
  public static function term($vID)
    {

      //init
      //process
        $change=query("UPDATE `voyages` SET `vStatus` = 'Terminer' 
                       WHERE `voyages`.`vID` =$vID");

        return "
            <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
              <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
                <div class='ui-pnotify-icon'>
                  <span class='glyphicon glyphicon-ok'></span>
                </div>
                <h4 class='ui-pnotify-title'>Success</h4>
                <div class='ui-pnotify-text' aria-role='alert'>Le voyage a été terminé
                </div>
              </div>
            </div>";
    }
}