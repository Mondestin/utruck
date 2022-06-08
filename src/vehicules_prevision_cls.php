<?php 
class Functions
{

    public static function vehicules()
    {  
     //init
   	 $list = "";
     $chauffeurs="";
     //get drivers list 
     $chau=query("SELECT * FROM `chauffeurs`");
     while ($names = fetch($chau)) {
        $chauf=$names->cSurname;
        $vehiid=$names->vID;
        $chauffeurs.="<option value='$vehiid'>$chauf</option>";
     }

     //get the previsions list 
     $rst=query("SELECT * FROM `previsions` INNER JOIN chauffeurs WHERE `previsions`.vID=`chauffeurs`.vID");

     while ($row = fetch($rst)) {
        $id=$row->id;
       	$chaf=$row->cSurname;
		    $chan=$row->chantier;
		    $camion=$row->canion;
        $kms=$row->kms;
        $dateA=$row->dateA;
        $dateR=$row->dateR;
        $obj=$row->objectif;
        $comment=$row->comments;
       	    $list .= "       
                        <tr>
                            <td>$id</td>
                            <td>$chaf</td>
                            <td>$camion</td>
                            <td>$chan</td> 
                            <td>$kms</td>
                            <td>$dateA</td>
                            <td>$obj</td>
                            <td>$comment</td>
                            <td style='width: 8%;'>                                                        
                              <a href='?Demand=Delete&pID=$row->id' class='btn btn-danger btn-xs'><i class='fa fa-trash-o' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='Effacer'></i></a>
                            </td>                                       
                        </tr>
            ";
            
       }  
    	return  "
        <br><br>
      <div class='row bg-white raduis'>
       <h2 class='display_text'>Prevision par vehicule</h2>
        </div> 
           <div class='row shadow prevision-form'>

             <div class='row titre raduis bg-blue' style='margin-right:0px; margin-left:0px;'>
              <h4 align='center'> Creer une prevision </h4>
             </div>               
                     <form class='form-horizontal form-label-left input_mask validate ' data-parsley-validate='' method='post'accept-charset='utf-8' novalidate=''>

                     <div class='col-md-10'>
                        <div class='col-md-3 col-sm-6 col-xs-12 has-feedback s-pad'><label>Chauffeur</label>
                         <select class='form-control has-feedback-left' name='chauffeur' required='required'>
                            $chauffeurs
                          </select>
                        <span class='fa fa-user form-control-feedback left' aria-hidden='true'></span>
                       </div>
                     <div class='col-md-3 col-sm-6 col-xs-12 has-feedback s-pad'><label>Route</label>
                        <select class='form-control has-feedback-left' name='route' required='required'>
                            <option value='Brazzaville/4j'>Brazzaville-4j</option>
                            <option value='Dolisie/2j'>Dolisie-2j</option>
                            <option value='Oyo/5j'>Oyo-5j</option>
                            <option value='Mila-Mila/3j'>Mila-Mila-3j</option>
                            <option value='Lembama/5j'>Lembama-5j</option>
                            <option value='Omoy/5j'>Omoy-5j</option>
                            <option value='Kelle/7j'>Kelle-7j</option>
                            <option value='Ngombe/7j'>Ngombe-7j</option>
                          </select>
                        <span class='fa fa-road form-control-feedback left' aria-hidden='true'></span>
                       </div>
                    <div class='col-md-3 col-sm-6 col-xs-12 has-feedback s-pad'><label>KMS</label>
                        <input type='text' class='form-control has-feedback-left' placeholder='KMS a parcourir' required='required' name='kms'>
                        <span class='fa fa-dashboard form-control-feedback left' aria-hidden='true'></span>
                       </div>
                    <div class='col-md-3 col-sm-6 col-xs-12 has-feedback s-pad'><label>Date</label>
                        <input type='text' id='myDatepicker2' class='form-control has-feedback-left' placeholder='Date de depart' required='required' name='dateA'>
                        <span class='fa fa-calendar form-control-feedback left' aria-hidden='true'></span>
                       </div>
                    </div>
                  <div class='col-md-2 form-prev pull-right'>                
                          <button type='submit' class='btn btn-primary'>Sauvegarder</button>
                    </div>
                    </form> 
                 
              </div>
           <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Tous</h2>                 
                  <div class='clearfix'></div>                 
                  </div>
                  <div class='x_content'>
                    <div id='datatable-responsive_wrapper' class='dataTables_wrapper form-inline dt-bootstrap no-footer'>                     
                    <table id='datatable-responsive' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width=''>
                      <thead>
                        <tr>
                          <th>#No</th>
                          <th>Chauffeur</th>
                          <th>Route</th>                         
                          <th>Camion</th>                       
                          <th>A-Kms</th>
                          <th>Date_A</th>                         
                          <th>Objectif</th>
                          <th>Comment</th>
                          <th>options</th>
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
    public static function delete($pID)
    {
        //init
        //process
        $delt=query("DELETE FROM `previsions` WHERE `id`='$pID'");
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

}