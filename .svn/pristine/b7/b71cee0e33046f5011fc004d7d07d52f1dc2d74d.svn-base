<?php
//BindEvents Method @1-235EDAE6
function BindEvents()
{
    global $pregnancy;
    global $Visits;
    global $delivery;
    global $newborn;
    global $department_facilities_hos;
    global $CCSEvents;
    $pregnancy->Button_Cancel->CCSEvents["OnClick"] = "pregnancy_Button_Cancel_OnClick";
    $pregnancy->PregRegDate->CCSEvents["BeforeShow"] = "pregnancy_PregRegDate_BeforeShow";
    $pregnancy->Button_UpdateAddVisit->CCSEvents["OnClick"] = "pregnancy_Button_UpdateAddVisit_OnClick";
    $pregnancy->Button_UpdateAddVisit->CCSEvents["BeforeShow"] = "pregnancy_Button_UpdateAddVisit_BeforeShow";
    $pregnancy->CurrentUser->CCSEvents["BeforeShow"] = "pregnancy_CurrentUser_BeforeShow";
    $pregnancy->EmployeeID->CCSEvents["BeforeShow"] = "pregnancy_EmployeeID_BeforeShow";
    $pregnancy->Button_UpdateAddDelivery->CCSEvents["OnClick"] = "pregnancy_Button_UpdateAddDelivery_OnClick";
    $pregnancy->Button_UpdateAddDelivery->CCSEvents["BeforeShow"] = "pregnancy_Button_UpdateAddDelivery_BeforeShow";
    $pregnancy->Facility->CCSEvents["BeforeShow"] = "pregnancy_Facility_BeforeShow";
    $pregnancy->Button_UpdateAddHospitalisation->CCSEvents["OnClick"] = "pregnancy_Button_UpdateAddHospitalisation_OnClick";
    $pregnancy->Button_UpdateAddHospitalisation->CCSEvents["BeforeShow"] = "pregnancy_Button_UpdateAddHospitalisation_BeforeShow";
    $pregnancy->CCSEvents["AfterInsert"] = "pregnancy_AfterInsert";
    $pregnancy->CCSEvents["AfterUpdate"] = "pregnancy_AfterUpdate";
    $Visits->facilities_visit_visitout_TotalRecords->CCSEvents["BeforeShow"] = "Visits_facilities_visit_visitout_TotalRecords_BeforeShow";
    $Visits->CCSEvents["BeforeShowRow"] = "Visits_BeforeShowRow";
    $Visits->CCSEvents["BeforeShow"] = "Visits_BeforeShow";
    $delivery->CCSEvents["BeforeShow"] = "delivery_BeforeShow";
    $newborn->newborn_TotalRecords->CCSEvents["BeforeShow"] = "newborn_newborn_TotalRecords_BeforeShow";
    $newborn->Sex->CCSEvents["BeforeShow"] = "newborn_Sex_BeforeShow";
    $newborn->CCSEvents["BeforeShow"] = "newborn_BeforeShow";
    $department_facilities_hos->department_facilities_hos_TotalRecords->CCSEvents["BeforeShow"] = "department_facilities_hos_department_facilities_hos_TotalRecords_BeforeShow";
    $department_facilities_hos->CCSEvents["BeforeShow"] = "department_facilities_hos_BeforeShow";
}
//End BindEvents Method

//pregnancy_Button_Cancel_OnClick @8-21C6C9D8
function pregnancy_Button_Cancel_OnClick(& $sender)
{
    $pregnancy_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_Button_Cancel_OnClick

//Custom Code @379-2A29BDB7
// -------------------------
    if(CCUserInGroups(CCGetGroupID(), "1;2"))
	{
		global $Redirect;
		$Redirect = "patient_maint_district.php?PatientID=" . $_GET["PatientID"]; 
	}
// -------------------------
//End Custom Code

//Close pregnancy_Button_Cancel_OnClick @8-8838F932
    return $pregnancy_Button_Cancel_OnClick;
}
//End Close pregnancy_Button_Cancel_OnClick

//pregnancy_PregRegDate_BeforeShow @11-8D128A5B
function pregnancy_PregRegDate_BeforeShow(& $sender)
{
    $pregnancy_PregRegDate_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_PregRegDate_BeforeShow

//Custom Code @190-2A29BDB7
// -------------------------
if ($pregnancy->PregRegDate->GetValue() == "")
{
	$registry_db = new clsDBregistry_db();
	$sql = "SELECT Patient_RegDate FROM patient WHERE PatientID  =". $_GET["PatientID"];
	$registry_db->query($sql);
	if($registry_db->next_record())
	{
		$dateParts = explode("-",$registry_db->f("Patient_RegDate"));  
	 	$timestamp = mktime(0,0,0,$dateParts[1],$dateParts[2],$dateParts[0]);  
 		$pregnancy->PregRegDate->SetValue($timestamp);  
	}
	$registry_db->close();
}
// -------------------------
//End Custom Code

//Close pregnancy_PregRegDate_BeforeShow @11-EFEF43FC
    return $pregnancy_PregRegDate_BeforeShow;
}
//End Close pregnancy_PregRegDate_BeforeShow

//pregnancy_Button_UpdateAddVisit_OnClick @51-6E9DA712
function pregnancy_Button_UpdateAddVisit_OnClick(& $sender)
{
    $pregnancy_Button_UpdateAddVisit_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_Button_UpdateAddVisit_OnClick

//Custom Code @133-2A29BDB7
// -------------------------
global $Redirect;
$Redirect = "visit_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"];
// -------------------------
//End Custom Code

//Close pregnancy_Button_UpdateAddVisit_OnClick @51-49887899
    return $pregnancy_Button_UpdateAddVisit_OnClick;
}
//End Close pregnancy_Button_UpdateAddVisit_OnClick

//pregnancy_Button_UpdateAddVisit_BeforeShow @51-9F1BA246
function pregnancy_Button_UpdateAddVisit_BeforeShow(& $sender)
{
    $pregnancy_Button_UpdateAddVisit_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_Button_UpdateAddVisit_BeforeShow

//Custom Code @134-2A29BDB7
// -------------------------
$pregnancy->Button_UpdateAddVisit->Visible = $pregnancy->Button_Update->Visible;
// -------------------------
//End Custom Code

//Close pregnancy_Button_UpdateAddVisit_BeforeShow @51-4842FBD7
    return $pregnancy_Button_UpdateAddVisit_BeforeShow;
}
//End Close pregnancy_Button_UpdateAddVisit_BeforeShow

//pregnancy_CurrentUser_BeforeShow @83-BD73BE1F
function pregnancy_CurrentUser_BeforeShow(& $sender)
{
    $pregnancy_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_CurrentUser_BeforeShow

//Custom Code @84-2A29BDB7
// -------------------------
	$pregnancy->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close pregnancy_CurrentUser_BeforeShow @83-CEF030AC
    return $pregnancy_CurrentUser_BeforeShow;
}
//End Close pregnancy_CurrentUser_BeforeShow

//pregnancy_EmployeeID_BeforeShow @120-BEB7827A
function pregnancy_EmployeeID_BeforeShow(& $sender)
{
    $pregnancy_EmployeeID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_EmployeeID_BeforeShow

//Close pregnancy_EmployeeID_BeforeShow @120-D5DC3641
    return $pregnancy_EmployeeID_BeforeShow;
}
//End Close pregnancy_EmployeeID_BeforeShow

//pregnancy_Button_UpdateAddDelivery_OnClick @148-72536294
function pregnancy_Button_UpdateAddDelivery_OnClick(& $sender)
{
    $pregnancy_Button_UpdateAddDelivery_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_Button_UpdateAddDelivery_OnClick

//Custom Code @149-2A29BDB7
// -------------------------
global $Redirect;
$Redirect = "delivery_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"];
// -------------------------
//End Custom Code

//Close pregnancy_Button_UpdateAddDelivery_OnClick @148-F4A5A8E2
    return $pregnancy_Button_UpdateAddDelivery_OnClick;
}
//End Close pregnancy_Button_UpdateAddDelivery_OnClick

//pregnancy_Button_UpdateAddDelivery_BeforeShow @148-69C20FD4
function pregnancy_Button_UpdateAddDelivery_BeforeShow(& $sender)
{
    $pregnancy_Button_UpdateAddDelivery_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_Button_UpdateAddDelivery_BeforeShow

//Custom Code @150-2A29BDB7
// -------------------------
   	  $pregnancy->Button_UpdateAddDelivery->Visible = $pregnancy->Button_Update->Visible;  
	  $registry_db = new clsDBregistry_db();
	  $sql = "SELECT * FROM delivery WHERE PregnancyID  =". $_GET["PregnancyID"];
      $registry_db->query($sql);
	  if($registry_db->next_record()) {
      	$pregnancy->Button_UpdateAddDelivery->Visible = FALSE;
	  }
  
      //Destroy the database connection  object
      $registry_db->close();

// -------------------------
//End Custom Code

//Close pregnancy_Button_UpdateAddDelivery_BeforeShow @148-D401E5B1
    return $pregnancy_Button_UpdateAddDelivery_BeforeShow;
}
//End Close pregnancy_Button_UpdateAddDelivery_BeforeShow

//pregnancy_Facility_BeforeShow @197-6657C4C6
function pregnancy_Facility_BeforeShow(& $sender)
{
    $pregnancy_Facility_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_Facility_BeforeShow

//Custom Code @358-2A29BDB7
// -------------------------
   if(CCGetFromGet("PregnancyID", "") == "") // only if it is a new visit being added
	{
		$LoginID = CCGetUserID();
		$registry_db = new clsDBregistry_db();
  		$Facility = CCDLookup("facilities.FacilityID", "((facilities INNER JOIN location ON facilities.FacilityID = location.FacilityID) INNER JOIN employees ON employees.LocationID = location.LocationID) INNER JOIN login ON login.LoginID = employees.LoginID", "login.LoginID = ".$LoginID, $registry_db);
		$registry_db->close();
		$pregnancy->Facility->SetValue($Facility);
	}
// -------------------------
//End Custom Code

//Close pregnancy_Facility_BeforeShow @197-95868EB9
    return $pregnancy_Facility_BeforeShow;
}
//End Close pregnancy_Facility_BeforeShow

//pregnancy_Button_UpdateAddHospitalisation_OnClick @251-29AA84EB
function pregnancy_Button_UpdateAddHospitalisation_OnClick(& $sender)
{
    $pregnancy_Button_UpdateAddHospitalisation_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_Button_UpdateAddHospitalisation_OnClick

//Custom Code @252-2A29BDB7
// -------------------------
global $Redirect;
$Redirect = "hospitalisation_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"];
// -------------------------
//End Custom Code

//Close pregnancy_Button_UpdateAddHospitalisation_OnClick @251-ADC6CA16
    return $pregnancy_Button_UpdateAddHospitalisation_OnClick;
}
//End Close pregnancy_Button_UpdateAddHospitalisation_OnClick

//pregnancy_Button_UpdateAddHospitalisation_BeforeShow @251-77EF4DCE
function pregnancy_Button_UpdateAddHospitalisation_BeforeShow(& $sender)
{
    $pregnancy_Button_UpdateAddHospitalisation_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_Button_UpdateAddHospitalisation_BeforeShow

//Custom Code @253-2A29BDB7
// -------------------------
   	  $pregnancy->Button_UpdateAddHospitalisation->Visible = $pregnancy->Button_Update->Visible;  
// -------------------------
//End Custom Code

//Close pregnancy_Button_UpdateAddHospitalisation_BeforeShow @251-E5BC0723
    return $pregnancy_Button_UpdateAddHospitalisation_BeforeShow;
}
//End Close pregnancy_Button_UpdateAddHospitalisation_BeforeShow

//pregnancy_AfterInsert @3-720BBB7A
function pregnancy_AfterInsert(& $sender)
{
    $pregnancy_AfterInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_AfterInsert

//Custom Code @201-2A29BDB7
// -------------------------
    global $DBregistry_db;
    $Page = CCGetParentPage($sender);
    $ccs_result = CCDLookUp("LAST_INSERT_ID()", pregnancy, "", $Page->Connections["registry_db"]);
    $PregnancyID = $ccs_result;
	
	global $Redirect;
	$Redirect = "visit_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $PregnancyID;
// -------------------------
//End Custom Code

//Close pregnancy_AfterInsert @3-C5B4D09E
    return $pregnancy_AfterInsert;
}
//End Close pregnancy_AfterInsert

//pregnancy_AfterUpdate @3-EAB41890
function pregnancy_AfterUpdate(& $sender)
{
    $pregnancy_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_AfterUpdate

//Custom Code @343-2A29BDB7
// -------------------------
	
	// get pregnancy ID
	$pregnancyID = CCGetFromGet("PregnancyID", "");

	// get pregnancy type
	$pregnancytype = $pregnancy->PregnancyTypeID->GetValue();

	// according to type, update delivery outcomes
	
	switch ($pregnancytype) 
	{
	    case 1:
	        $sql = "UPDATE delivery SET PregnancyOutcome2ID = -1, PregnancyOutcome3ID = -1, PregnancyOutcome4ID = '-' WHERE PregnancyID = ".$pregnancyID."";
	        break;
	    case 2:
	        $sql = "UPDATE delivery SET PregnancyOutcome3ID = -1, PregnancyOutcome4ID = '-' WHERE PregnancyID = ".$pregnancyID;
	        break;
	    case 3:
	        $sql = "UPDATE delivery SET PregnancyOutcome4ID = '-' WHERE PregnancyID = ".$pregnancyID;
	        break;
	}
	$registry_db = new clsDBregistry_db();
	$registry_db->query($sql);
    $registry_db->close();

// -------------------------
//End Custom Code

//Close pregnancy_AfterUpdate @3-0A9D1111
    return $pregnancy_AfterUpdate;
}
//End Close pregnancy_AfterUpdate

//Visits_facilities_visit_visitout_TotalRecords_BeforeShow @69-27045247
function Visits_facilities_visit_visitout_TotalRecords_BeforeShow(& $sender)
{
    $Visits_facilities_visit_visitout_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Visits; //Compatibility
//End Visits_facilities_visit_visitout_TotalRecords_BeforeShow

//Retrieve number of records @70-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close Visits_facilities_visit_visitout_TotalRecords_BeforeShow @69-27B3DC4A
    return $Visits_facilities_visit_visitout_TotalRecords_BeforeShow;
}
//End Close Visits_facilities_visit_visitout_TotalRecords_BeforeShow

//Visits_BeforeShowRow @56-97044407
function Visits_BeforeShowRow(& $sender)
{
    $Visits_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Visits; //Compatibility
//End Visits_BeforeShowRow

//Set Row Style @75-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close Visits_BeforeShowRow @56-21FFC773
    return $Visits_BeforeShowRow;
}
//End Close Visits_BeforeShowRow

//Visits_BeforeShow @56-16F10817
function Visits_BeforeShow(& $sender)
{
    $Visits_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Visits; //Compatibility
//End Visits_BeforeShow

//Custom Code @156-2A29BDB7
// -------------------------

// Remove Visits and tests that were created but not correctly stored or finalized.
	 //NOT NEEDED ANYMORE 
/*	  $registry_db = new clsDBregistry_db();
	  $sql1 = "DELETE FROM test WHERE VisitID IN (SELECT VisitID FROM visit WHERE ISNULL(VisitOutcomeID))";
 	  $sql2 = "DELETE FROM visit WHERE ISNULL(VisitOutcomeID)";
	  $registry_db->query($sql1);
      $registry_db->query($sql2);
      $registry_db->close(); 
	  */

	if($Visits->ds->RecordsCount < 1){
	  	$Visits->Visible = FALSE;
	}
	else{
		$Visits->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close Visits_BeforeShow @56-D1629644
    return $Visits_BeforeShow;
}
//End Close Visits_BeforeShow

//delivery_BeforeShow @159-8E7EC567
function delivery_BeforeShow(& $sender)
{
    $delivery_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_BeforeShow

//Custom Code @177-2A29BDB7
// -------------------------
	if($delivery->ds->RecordsCount < 1) {
	  	$delivery->Visible = FALSE;
	}
	else{
		$delivery->Visible = TRUE;
	}
	// -------------------------
//End Custom Code

//Close delivery_BeforeShow @159-67248EEC
    return $delivery_BeforeShow;
}
//End Close delivery_BeforeShow

//newborn_newborn_TotalRecords_BeforeShow @204-78EFFAAF
function newborn_newborn_TotalRecords_BeforeShow(& $sender)
{
    $newborn_newborn_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_newborn_TotalRecords_BeforeShow

//Retrieve number of records @205-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close newborn_newborn_TotalRecords_BeforeShow @204-84F19644
    return $newborn_newborn_TotalRecords_BeforeShow;
}
//End Close newborn_newborn_TotalRecords_BeforeShow

//newborn_Sex_BeforeShow @337-DAD8388A
function newborn_Sex_BeforeShow(& $sender)
{
    $newborn_Sex_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_Sex_BeforeShow

//Custom Code @338-2A29BDB7
// -------------------------
    // male/female symbols
	global $CCSLocales;
		
	if($newborn->Sex->GetValue() == 0)
		$newborn->Sex->SetValue($CCSLocales->GetText("Woman"));
	else if($newborn->Sex->GetValue() == 1)
		$newborn->Sex->SetValue($CCSLocales->GetText("Man"));
// -------------------------
//End Custom Code

//Close newborn_Sex_BeforeShow @337-94690439
    return $newborn_Sex_BeforeShow;
}
//End Close newborn_Sex_BeforeShow

//newborn_BeforeShow @203-E9C38B67
function newborn_BeforeShow(& $sender)
{
    $newborn_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_BeforeShow

//Custom Code @250-2A29BDB7
// -------------------------
 	if($newborn->ds->RecordsCount < 1) {
	  	$newborn->Visible = FALSE;
	}
	else{
		$newborn->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close newborn_BeforeShow @203-0BA6ECB0
    return $newborn_BeforeShow;
}
//End Close newborn_BeforeShow

//department_facilities_hos_department_facilities_hos_TotalRecords_BeforeShow @272-7D481199
function department_facilities_hos_department_facilities_hos_TotalRecords_BeforeShow(& $sender)
{
    $department_facilities_hos_department_facilities_hos_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $department_facilities_hos; //Compatibility
//End department_facilities_hos_department_facilities_hos_TotalRecords_BeforeShow

//Retrieve number of records @273-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close department_facilities_hos_department_facilities_hos_TotalRecords_BeforeShow @272-6F55DEC2
    return $department_facilities_hos_department_facilities_hos_TotalRecords_BeforeShow;
}
//End Close department_facilities_hos_department_facilities_hos_TotalRecords_BeforeShow

//department_facilities_hos_BeforeShow @254-008C818B
function department_facilities_hos_BeforeShow(& $sender)
{
    $department_facilities_hos_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $department_facilities_hos; //Compatibility
//End department_facilities_hos_BeforeShow

//Custom Code @288-2A29BDB7
// -------------------------
    if($department_facilities_hos->ds->RecordsCount < 1){
	  	$department_facilities_hos->Visible = FALSE;
	}
	else{
		$department_facilities_hos->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close department_facilities_hos_BeforeShow @254-38638F85
    return $department_facilities_hos_BeforeShow;
}
//End Close department_facilities_hos_BeforeShow

//Page_BeforeInitialize @1-530C3962
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy_maint; //Compatibility
//End Page_BeforeInitialize

//Custom Code @380-2A29BDB7
// -------------------------
    $paId = CCGetParam("PatientID",0);
	$prId = CCGetParam("PregnancyID",0);

	if(CCGetSession("GroupID")==3) // if facility user
	{
		if($prId!=0) // if pregnancy ID parameter is on URL 
		{		
			// getting the respectivepatient ID for the pregnancy ID
			$db = new clsDBregistry_db();
		    $SQL = "SELECT PatientID FROM pregnancy WHERE PregnancyID = " . $db->ToSQL($prId, ccsInteger); 
			$db->query($SQL);
		
			// if pregnancy and patient do not correspond the user gets logged out
			if($db->next_record())
		  	{	
				if($db->f(0) != $paId) 
					CCLogoutUser();
			}
		} 
		if ($paId!=0) //if  patient ID is on URL (which then includes as well adding a pregnancy, besides editin oneg)
		{
			if(!canSeePatient($paId))
				CCLogoutUser();	
		} 
	}
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize
?>
