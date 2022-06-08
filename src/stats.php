<?php 
//Get semi-remorque count
$sr=query("SELECT COUNT(vType) as semi FROM vehicules WHERE vType='SMR'");
$row=fetch($sr);
$semi=$row->semi;

//Get remorque count
$rem=query("SELECT COUNT(vType) as remo FROM vehicules WHERE vType='TRAC'");
$row1=fetch($rem);
$remo=$row1->remo;

//Get drivers count
$driv1=query("SELECT COUNT(cID) as drive FROM chauffeurs INNER JOIN `vehicules` 
      ON `chauffeurs`.vID=`vehicules`.vID");
$row2=fetch($driv1);
$drive=$row2->drive;

//Get active vehicules count
$act=query("SELECT COUNT(vStatus) as activ FROM vehicules WHERE vStatus='Actif'");
$row3=fetch($act);
$activ=$row3->activ;

//Get parking vehicules count
$park=query("SELECT COUNT(vStatus) as parki FROM vehicules WHERE vStatus='Parking'");
$row4=fetch($park);
$parki=$row4->parki;

//Get Garage vehicules count
$gara=query("SELECT COUNT(vStatus) as garag FROM vehicules WHERE vStatus='Garage'");
$row5=fetch($gara);
$garag=$row5->garag;
//Get Pane-route vehicules count
$panes=query("SELECT COUNT(vStatus) as paner FROM vehicules WHERE vStatus='Pane-route'");
$row6=fetch($panes);
$panes=$row6->paner;
?>