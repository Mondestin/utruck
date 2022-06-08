<?php 
class Functions
{

    public static function order()
    {  
     //init
   	 $list = "";

     //get the class list 
     $rst=query("SELECT * FROM `ordres_trans`");

     while ($row = fetch($rst)) {
        $id=$row->oID;
       	$otID=$row->otID;
		    $client=$row->client;
        $chargement=$row->chargement;
        $dechargement=$row->dechargement;
		    $marchandise=$row->marchandise;
        $type=$row->type;
        $quantity=$row->quantity;
        $refClient=$row->refClient;
        $dateD=$row->dateD;
        $dateR=$row->dateR;
        $noRemorque=$row->noRemorque;
        $motorBoy=$row->motorBoy;
        $gasoil=$row->gasoil;
        $obs=$row->obs;

       	    $list .= "       
                        <tr>
                            <td>$otID</td>
                            <td>$chargement</td>
                            <td>$dechargement</td>
                            <td>$marchandise</td> 
                            <td>$quantity L</td>
                            <td>$motorBoy</td>
                            <td>$dateD</td>
                            <td>$dateR</td>
                            <td style='width: 8%;'>
                              <a href='?Demand=Profile&oID=$row->otID' class='btn btn-primary btn-xs'><i class='fa fa-file'></i> </a>
                              <a href='?Demand=Edit&oID=$row->otID' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> </a>
                            </td>                              
                            
                        </tr>
            ";
       }  
    	return  "
    	 <br><br>
      <div class='row bg-white raduis'>
      <a href='?Demand=Newtransport' class='btn btn-primary pull-right add-btn'><i class='fa fa-plus-circle'></i>   Creer Nouveau</a>
      <h2 class='display_text'>Liste des ordres de transport</h2>
        </div>   
        <hr>
           <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tous</h2>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <div id='datatable-responsive_wrapper' class='dataTables_wrapper form-inline dt-bootstrap no-footer'>
                    <div class='row'>                 
                    </div>         
                    <table id='datatable-responsive' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width=''>
                      <thead>
                        <tr>
                          <th>No d'ordre</th>
                          <th>Chargement</th>
                          <th>Dechargement</th>
                          <th>Marchandise</th>
                          <th>Quantite</th>
                          <th>Motor Boy</th>
                          <th>Depart</th>
                          <th>Retour</th>
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
          <br>
";
    }
   
//===============================================
    public static function newtransport()
    {
       //init
       $list_trucks = "";
       $srm_list ="";
       //get the SMR list 
       $rst=query("SELECT * FROM `Vehicules` WHERE vType='RMQ'");
       while ($rows=fetch($rst)) {
        $srm_list .= "<option value='$rows->vPlaque'>$rows->vPlaque</option>";
       }     

        return "
        <br><br>        
      <div class='row bg-white raduis' style='margin-right:45px; margin-left:45px;'>  
      <h5 class='display_text'>Vous devriez avoir un RMQ disponible pour le success de cette operation ou veiller d'abord ajouter une RMQ</h5>
        </div>          
              <div class='row new-bon-form shadow raduis'>
                <div class='form-title bg-blue raduis'>
                 <h4>Nouveau ordre de transport</h4>
                </div>              
                   <form class='form-horizontal form-label-left input_mask validate form-pad' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate=''>
                  <div class='row border raduis'>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>No d'ordre</label>
                        <input type='phone' class='form-control has-feedback-left nbon-input' placeholder='No d ordre' required='required' name='noID'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>                
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Client</label>
                        <input type='phone' class='form-control has-feedback-left nbon-input' placeholder='Client' required='required' name='client'>
                        <span class='fa fa-user form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Chargement</label>
                        <input type='phone' class='form-control has-feedback-left nbon-input' placeholder='Chargement' required='required' name='chargement'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Dechargement</label>
                        <input type='phone' class='form-control has-feedback-left nbon-input' placeholder='Dechargement' required='required' name='dechargement'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'>
                      <label>Type</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' name='type' placeholder='Type' required='required'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Marchandise</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' placeholder='Marchandise' required='required' name='marchandise'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Quantite</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' placeholder='Quantite' required='required' name='quantite'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Reference du Client</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Reference du Client' required='required' name='ref_client'>
                        <span class='fa fa-user form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Date de depart</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='myDatepicker2' placeholder='Date de depart' required='required' name='dateD'>
                        <span class='fa fa-calendar form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>No Remorque(RMQ)</label>
                         <select class='form-control has-feedback-left nbon-input' name='remorque' required='required'>
                            $srm_list               
                           </select>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Motor Boy</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Motor Boy' required='required' name='motor_boy'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Date de retour a la base</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='myDatepicker3' placeholder='Date de retour a la base' required='required' name='dateR'>
                        <span class='fa fa-calendar form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <hr>                  
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Gasoil pour le Voyage</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Gasoil pour le Voyage' required='required' name='gasoil'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Observation</label>
                        <input type='textarea' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Observation' required='required' name='observation'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      
                  </div><br>
                      <div class='row pull-right'>
                      <a href='transport_order.php' class='btn btn-info'>Retour</a>
                          <button type='submit' class='btn btn-primary '>Sauvegarder</button>
                      </div>
                    </form> 
                   </div><br><br><br>
            ";
    }

//delete order from the db
  public static function delete($oID)
    {
        //init
        //process
        $delt=query("DELETE FROM `ordres_trans` WHERE `otID`='$oID'");
        return "
            <div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-fade-in msg-acceuil' aria-live='assertive' aria-role='alertdialog' style='width: 300px; right: 36px; top: 20px;'>
              <div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'>
                <div class='ui-pnotify-icon'>
                  <span class='glyphicon glyphicon-ok'></span>
                </div>
                <h4 class='ui-pnotify-title'>Success</h4>
                <div class='ui-pnotify-text' aria-role='alert'>Data effacer avec Success!!
                </div>
              </div>
            </div>";
    }

//edit info from the db
 public static function edit($oID)
    {
       //init    
       $list_trucksu = "";
       $srm_listu ="";

       //process
       //get the SMR list 
       $rst=query("SELECT * FROM `Vehicules` WHERE vType='RMQ'");
       while ($rows=fetch($rst)) {
        $srm_listu .= "<option value='$rows->vPlaque'>$rows->vPlaque</option>";
       }

        $getInfo=query("SELECT * FROM `ordres_trans` WHERE `otID`='$oID'");
        $row=fetch($getInfo);

        $otId =$row->otID;
        $client =$row->client; 
        $chargement =$row->chargement; 
        $dechargement =$row->dechargement; 
        $type =$row->type; 
        $marchandise =$row->marchandise; 
        $quantite =$row->quantity; 
        $ref_client =$row->refClient; 
        $remorque =$row->noRemorque;        
        $motor_boy =$row->motorBoy; 
        $gasoil =$row->gasoil;  
        $observation =$row->obs;    
        $dateD =$row->dateD;  
        $dateLivrer =$row->dateR; 
        return "
         <div class='row new-bon-form shadow raduis'>
                <div class='form-title bg-blue raduis'>
                 <h4>Modifier l'ordre de transport</h4>
                </div>              
                   <form action='update_order.php' class='form-horizontal form-label-left input_mask validate form-pad' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate=''>
                  <div class='row border raduis'>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>No d'ordre</label>
                        <input type='phone' class='form-control has-feedback-left nbon-input' placeholder='No d ordre' required='required' name='noIDu' value='$otId' readonly='readonly'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>                
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Client</label>
                        <input type='phone' class='form-control has-feedback-left nbon-input' placeholder='Client' required='required' name='clientu' value='$client'>
                        <span class='fa fa-user form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                     <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Chargement</label>
                        <input type='phone' class='form-control has-feedback-left nbon-input' placeholder='Chargement' required='required' name='chargementu' value='$chargement'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Dechargement</label>
                        <input type='phone' class='form-control has-feedback-left nbon-input' placeholder='Dechargement' required='required' name='dechargementu' value='$dechargement'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'>
                      <label>Type</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' name='typeu' placeholder='Type' required='required' value='$type'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Marchandise</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' placeholder='Marchandise' required='required' name='marchandiseu' value='$marchandise'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Quantite</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' placeholder='Quantite' required='required' name='quantiteu' value='$quantite'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Reference du Client</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Reference du Client' required='required' name='ref_clientu' value='$ref_client'>
                        <span class='fa fa-user form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Date de depart</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='myDatepicker2' placeholder='Date de depart' required='required' name='dateDu' value='$dateD'>
                        <span class='fa fa-calendar form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                       <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>No Remorque(RMQ)</label>
                         <select class='form-control has-feedback-left nbon-input' name='remorqueu' required='required' value='dfjgjg'>
                            $srm_listu               
                           </select>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Motor Boy</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Motor Boy' required='required' name='motor_boyu' value='$motor_boy'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Date de retour a la base</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='myDatepicker3' placeholder='Date de retour a la base' required='required' name='dateRu' value='$dateLivrer'>
                        <span class='fa fa-calendar form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <hr>                  
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Gasoil pour le Voyage</label>
                        <input type='text' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Gasoil pour le Voyage' required='required' name='gasoilu' value='$gasoil'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      <div class='col-md-6 col-sm-6 col-xs-12 has-feedback sbon-pad'> <label>Observation</label>
                        <input type='textarea' class='form-control has-feedback-left nbon-input' id='inputSuccess4' placeholder='Observation' required='required' name='observationu' value='$observation'>
                        <span class='fa fa-barcode form-control-feedback left nbon-adjust' aria-hidden='true'></span>
                      </div>
                      
                  </div><br>
                      <div class='row pull-right'>
                      <a href='transport_order.php' class='btn btn-info'>Retour</a>
                          <button type='submit' class='btn btn-primary '>Actualiser</button>
                      </div>
                    </form> 
                   </div><br><br><br>
            ";
    }

//profile order info
 public static function profile($oID)
    {
        //init
        //process
        //$delt=query("DELETE FROM `ordres_trans` WHERE `oID`='$oID'");
        return "profile
            ";
    }
}