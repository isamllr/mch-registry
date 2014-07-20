<?php
//BindEvents Method @1-1D8BEF1A
function BindEvents()
{
    global $patients1;
    global $patients;
    global $CCSEvents;
    $patients1->ds->CCSEvents["BeforeExecuteSelect"] = "patients1_ds_BeforeExecuteSelect";
    $patients->ds->CCSEvents["BeforeExecuteSelect"] = "patients_ds_BeforeExecuteSelect";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//patients1_ds_BeforeExecuteSelect @177-8C1E3801
function patients1_ds_BeforeExecuteSelect(& $sender)
{
    $patients1_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patients1; //Compatibility
//End patients1_ds_BeforeExecuteSelect

//Custom Code @294-2A29BDB7
// -------------------------
	$oldSQL=$patients1->DataSource->SQL;  
	$myCountSQL="SELECT COUNT(*) FROM (".$oldSQL.") AS CountTable";  
	$patients1->DataSource->CountSQL=$myCountSQL;
// -------------------------
//End Custom Code

//Close patients1_ds_BeforeExecuteSelect @177-62AD196B
    return $patients1_ds_BeforeExecuteSelect;
}
//End Close patients1_ds_BeforeExecuteSelect

//patients_ds_BeforeExecuteSelect @110-896F94B8
function patients_ds_BeforeExecuteSelect(& $sender)
{
    $patients_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patients; //Compatibility
//End patients_ds_BeforeExecuteSelect

//Custom Code @293-2A29BDB7
// -------------------------
    $oldSQL=$patients->DataSource->SQL;  
    $myCountSQL="SELECT COUNT(*) FROM (".$oldSQL.") AS CountTable";  
    $patients->DataSource->CountSQL=$myCountSQL;  
// -------------------------
//End Custom Code

//Close patients_ds_BeforeExecuteSelect @110-93DB35F8
    return $patients_ds_BeforeExecuteSelect;
}
//End Close patients_ds_BeforeExecuteSelect

//Page_OnInitializeView @1-92060152
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient_list; //Compatibility
//End Page_OnInitializeView

//Custom Code @150-2A29BDB7
// -------------------------
global $topmenu;
global $patientSearch;
global $patients;

	$ExportFileName = "PatientListExport.xls";
 	if (CCGetFromGet("export") == "1") {
		//Hide the ToExcelLink Link and all the rest
		$patients->ToExcelLink->Visible = false;
        $patients->ImageLink1->Visible = false;
		$topmenu->Visible = false;
		$patientSearch->Visible = false;
			
		//Set Content type to Excel
        header("Content-Type: application/vnd.ms-excel");
        //Fix IE 5.0-5.5 bug with Content-Disposition=attachment
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.5;") || 
            strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.0;")) {
	  		header("Content-Disposition: filename=" . $ExportFileName);
		} else {
	  		header("Content-Disposition: attachment; filename=" . $ExportFileName);
		}
	}
// -------------------------
//End Custom Code




//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
