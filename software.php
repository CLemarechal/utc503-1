<?php
require_once("include/datas.inc.php");
const DATA_LOCATION='datas/';
echo "----------------------Gestion des Licences logicielles--------------------------\n";



$employees=loadAndDump(DATA_LOCATION."employees.json");
$services=loadAndDump(DATA_LOCATION."services.json");
$softs=loadAndDump(DATA_LOCATION."softs.json");
$licenses=loadAndDump(DATA_LOCATION."licenses.json");


arrayDump(getEmployeesByService($employees,'compta'),'Liste des employés de la compta');


arrayDump(where($employees,"service","dsi"),'Liste DSI');
arrayDump(select($licenses,["name","count"]),'Nombre de licence');
arrayDump(selectWhere($licenses,['name'],['count',0]),'Soft avec 0 licence');


