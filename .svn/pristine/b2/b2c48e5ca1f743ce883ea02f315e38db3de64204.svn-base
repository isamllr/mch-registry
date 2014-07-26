<?php
//BindEvents Method @1-8F39D5F8
function BindEvents()
{
    global $test_testcode;
    global $medicationhospitalisation;
    global $recommendedmedicationhospitalisation;
    global $Delivery;
    global $hospitalisation;
    global $CCSEvents;
    $test_testcode->TestResultNormal->CCSEvents["BeforeShow"] = "test_testcode_TestResultNormal_BeforeShow";
    $test_testcode->CCSEvents["BeforeShow"] = "test_testcode_BeforeShow";
    $medicationhospitalisation->medication_medicationatco_TotalRecords->CCSEvents["BeforeShow"] = "medicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow";
    $medicationhospitalisation->CCSEvents["BeforeShow"] = "medicationhospitalisation_BeforeShow";
    $recommendedmedicationhospitalisation->medication_medicationatco_TotalRecords->CCSEvents["BeforeShow"] = "recommendedmedicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow";
    $recommendedmedicationhospitalisation->CCSEvents["BeforeShow"] = "recommendedmedicationhospitalisation_BeforeShow";
    $Delivery->CCSEvents["BeforeShow"] = "Delivery_BeforeShow";
    $hospitalisation->Button_Delete->CCSEvents["OnClick"] = "hospitalisation_Button_Delete_OnClick";
    $hospitalisation->Button_Cancel->CCSEvents["OnClick"] = "hospitalisation_Button_Cancel_OnClick";
    $hospitalisation->FacilityID->CCSEvents["BeforeShow"] = "hospitalisation_FacilityID_BeforeShow";
    $hospitalisation->Button_UpdateAddAdministeredMedication->CCSEvents["BeforeShow"] = "hospitalisation_Button_UpdateAddAdministeredMedication_BeforeShow";
    $hospitalisation->Button_UpdateAddAdministeredMedication->CCSEvents["OnClick"] = "hospitalisation_Button_UpdateAddAdministeredMedication_OnClick";
    $hospitalisation->Button_UpdateAddRecommendedFollowUpMedication->CCSEvents["BeforeShow"] = "hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_BeforeShow";
    $hospitalisation->Button_UpdateAddRecommendedFollowUpMedication->CCSEvents["OnClick"] = "hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_OnClick";
    $hospitalisation->hosppossibdiag->ds->CCSEvents["BeforeBuildSelect"] = "hospitalisation_hosppossibdiag_ds_BeforeBuildSelect";
    $hospitalisation->hospselectdiag->ds->CCSEvents["BeforeBuildSelect"] = "hospitalisation_hospselectdiag_ds_BeforeBuildSelect";
    $hospitalisation->Button_UpdateAddDelivery->CCSEvents["OnClick"] = "hospitalisation_Button_UpdateAddDelivery_OnClick";
    $hospitalisation->Button_UpdateAddDelivery->CCSEvents["BeforeShow"] = "hospitalisation_Button_UpdateAddDelivery_BeforeShow";
    $hospitalisation->Button_UpdateAddTest->CCSEvents["BeforeShow"] = "hospitalisation_Button_UpdateAddTest_BeforeShow";
    $hospitalisation->Button_UpdateAddTest->CCSEvents["OnClick"] = "hospitalisation_Button_UpdateAddTest_OnClick";
    $hospitalisation->Button_Update->CCSEvents["OnClick"] = "hospitalisation_Button_Update_OnClick";
    $hospitalisation->CurrentUser->CCSEvents["BeforeShow"] = "hospitalisation_CurrentUser_BeforeShow";
    $hospitalisation->SelectedReasonHospitalisation->ds->CCSEvents["BeforeBuildSelect"] = "hospitalisation_SelectedReasonHospitalisation_ds_BeforeBuildSelect";
    $hospitalisation->ReasonHospitalisation->ds->CCSEvents["BeforeBuildSelect"] = "hospitalisation_ReasonHospitalisation_ds_BeforeBuildSelect";
    $hospitalisation->Button_UpdateAddTests->CCSEvents["OnClick"] = "hospitalisation_Button_UpdateAddTests_OnClick";
    $hospitalisation->Button_UpdateAddTests->CCSEvents["BeforeShow"] = "hospitalisation_Button_UpdateAddTests_BeforeShow";
    $hospitalisation->pregnancyDateTemp->CCSEvents["BeforeShow"] = "hospitalisation_pregnancyDateTemp_BeforeShow";
    $hospitalisation->CCSEvents["BeforeDelete"] = "hospitalisation_BeforeDelete";
    $hospitalisation->CCSEvents["AfterInsert"] = "hospitalisation_AfterInsert";
    $hospitalisation->CCSEvents["AfterUpdate"] = "hospitalisation_AfterUpdate";
    $hospitalisation->CCSEvents["BeforeShow"] = "hospitalisation_BeforeShow";
}
//End BindEvents Method

//test_testcode_TestResultNormal_BeforeShow @60-D845C505
function test_testcode_TestResultNormal_BeforeShow(& $sender)
{
    $test_testcode_TestResultNormal_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $test_testcode; //Compatibility
//End test_testcode_TestResultNormal_BeforeShow

//Custom Code @350-2A29BDB7
// -------------------------
    global $CCSLocales;
		
	if($test_testcode->TestResultNormal->GetValue() == 0)
		$test_testcode->TestResultNormal->SetValue($CCSLocales->GetText("RNo"));
	else if($test_testcode->TestResultNormal->GetValue() == 1)
		$test_testcode->TestResultNormal->SetValue($CCSLocales->GetText("RYes"));
// -------------------------
//End Custom Code

//Close test_testcode_TestResultNormal_BeforeShow @60-FD5336A7
    return $test_testcode_TestResultNormal_BeforeShow;
}
//End Close test_testcode_TestResultNormal_BeforeShow

//test_testcode_BeforeShow @52-113A810F
function test_testcode_BeforeShow(& $sender)
{
    $test_testcode_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $test_testcode; //Compatibility
//End test_testcode_BeforeShow

//Custom Code @113-2A29BDB7
// -------------------------
    if($test_testcode->ds->RecordsCount < 1){
	  	$test_testcode->Visible = FALSE;
	}
	else{
		$test_testcode->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close test_testcode_BeforeShow @52-5F850D29
    return $test_testcode_BeforeShow;
}
//End Close test_testcode_BeforeShow

//medicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow @71-CAE96ED7
function medicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow(& $sender)
{
    $medicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $medicationhospitalisation; //Compatibility
//End medicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow

//Retrieve number of records @72-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close medicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow @71-D92D19CF
    return $medicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow;
}
//End Close medicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow

//medicationhospitalisation_BeforeShow @70-AC6AD2C1
function medicationhospitalisation_BeforeShow(& $sender)
{
    $medicationhospitalisation_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $medicationhospitalisation; //Compatibility
//End medicationhospitalisation_BeforeShow

//Custom Code @83-2A29BDB7
// -------------------------
	if($medicationhospitalisation->ds->RecordsCount < 1){
	  	$medicationhospitalisation->Visible = FALSE;
	}
	else{
		$medicationhospitalisation->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close medicationhospitalisation_BeforeShow @70-752EE1ED
    return $medicationhospitalisation_BeforeShow;
}
//End Close medicationhospitalisation_BeforeShow

//recommendedmedicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow @93-2DCC315A
function recommendedmedicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow(& $sender)
{
    $recommendedmedicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $recommendedmedicationhospitalisation; //Compatibility
//End recommendedmedicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow

//Retrieve number of records @94-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close recommendedmedicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow @93-07DF4E4F
    return $recommendedmedicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow;
}
//End Close recommendedmedicationhospitalisation_medication_medicationatco_TotalRecords_BeforeShow

//recommendedmedicationhospitalisation_BeforeShow @92-85065203
function recommendedmedicationhospitalisation_BeforeShow(& $sender)
{
    $recommendedmedicationhospitalisation_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $recommendedmedicationhospitalisation; //Compatibility
//End recommendedmedicationhospitalisation_BeforeShow

//Custom Code @105-2A29BDB7
// -------------------------
	if($recommendedmedicationhospitalisation->ds->RecordsCount < 1){
	  	$recommendedmedicationhospitalisation->Visible = FALSE;
	}
	else{
		$recommendedmedicationhospitalisation->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close recommendedmedicationhospitalisation_BeforeShow @92-2F2079A7
    return $recommendedmedicationhospitalisation_BeforeShow;
}
//End Close recommendedmedicationhospitalisation_BeforeShow

//Delivery_BeforeShow @288-F04CAB7B
function Delivery_BeforeShow(& $sender)
{
    $Delivery_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Delivery; //Compatibility
//End Delivery_BeforeShow

//Custom Code @302-2A29BDB7
// -------------------------
    if($Delivery->ds->RecordsCount < 1){
	  	$Delivery->Visible = FALSE;
	}
	else{
		$Delivery->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close Delivery_BeforeShow @288-F0ECAB34
    return $Delivery_BeforeShow;
}
//End Close Delivery_BeforeShow

//hospitalisation_Button_Delete_OnClick @6-35F91B0E
function hospitalisation_Button_Delete_OnClick(& $sender)
{
    $hospitalisation_Button_Delete_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_Delete_OnClick

//Custom Code @286-2A29BDB7
// -------------------------
    redirectUpdateDeleteCancel();
// -------------------------
//End Custom Code

//Close hospitalisation_Button_Delete_OnClick @6-E83ADE49
    return $hospitalisation_Button_Delete_OnClick;
}
//End Close hospitalisation_Button_Delete_OnClick

//hospitalisation_Button_Cancel_OnClick @8-04AD75DC
function hospitalisation_Button_Cancel_OnClick(& $sender)
{
    $hospitalisation_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_Cancel_OnClick

//Custom Code @287-2A29BDB7
// -------------------------
    redirectUpdateDeleteCancel();
// -------------------------
//End Custom Code

//Close hospitalisation_Button_Cancel_OnClick @8-32C4C739
    return $hospitalisation_Button_Cancel_OnClick;
}
//End Close hospitalisation_Button_Cancel_OnClick

//hospitalisation_FacilityID_BeforeShow @12-1A71E3E0
function hospitalisation_FacilityID_BeforeShow(& $sender)
{
    $hospitalisation_FacilityID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_FacilityID_BeforeShow

//Custom Code @352-2A29BDB7
// -------------------------
   if(CCGetFromGet("HospitalisationID", "") == "") // only if a new hospitalisation is being added
	{
		$LoginID = CCGetUserID();
		$registry_db = new clsDBregistry_db();
  		$Facility = CCDLookup("facilities.FacilityID", "((facilities INNER JOIN location ON facilities.FacilityID = location.FacilityID) INNER JOIN employees ON employees.LocationID = location.LocationID) INNER JOIN login ON login.LoginID = employees.LoginID", "login.LoginID = ".$LoginID, $registry_db);
		$registry_db->close();
		$hospitalisation->FacilityID->SetValue($Facility);
	}
// -------------------------
//End Custom Code

//Close hospitalisation_FacilityID_BeforeShow @12-BB50A1BE
    return $hospitalisation_FacilityID_BeforeShow;
}
//End Close hospitalisation_FacilityID_BeforeShow

//hospitalisation_Button_UpdateAddAdministeredMedication_BeforeShow @181-C5840AE7
function hospitalisation_Button_UpdateAddAdministeredMedication_BeforeShow(& $sender)
{
    $hospitalisation_Button_UpdateAddAdministeredMedication_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddAdministeredMedication_BeforeShow

//Custom Code @184-2A29BDB7
// -------------------------
    $hospitalisation->Button_UpdateAddAdministeredMedication->Visible = $hospitalisation->Button_Update->Visible;
// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddAdministeredMedication_BeforeShow @181-95B6468F
    return $hospitalisation_Button_UpdateAddAdministeredMedication_BeforeShow;
}
//End Close hospitalisation_Button_UpdateAddAdministeredMedication_BeforeShow

//hospitalisation_Button_UpdateAddAdministeredMedication_OnClick @181-90F88F58
function hospitalisation_Button_UpdateAddAdministeredMedication_OnClick(& $sender)
{
    $hospitalisation_Button_UpdateAddAdministeredMedication_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddAdministeredMedication_OnClick

//Custom Code @186-2A29BDB7
// -------------------------
    global $Redirect;

	$Redirect = "hospitalisationmedication_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&HospitalisationID=" . $_GET["HospitalisationID"] ; 

// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddAdministeredMedication_OnClick @181-004146D1
    return $hospitalisation_Button_UpdateAddAdministeredMedication_OnClick;
}
//End Close hospitalisation_Button_UpdateAddAdministeredMedication_OnClick

//hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_BeforeShow @182-04180EDB
function hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_BeforeShow(& $sender)
{
    $hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_BeforeShow

//Custom Code @185-2A29BDB7
// -------------------------
    $hospitalisation->Button_UpdateAddFollowUpMedication->Visible = $hospitalisation->Button_Update->Visible;
// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_BeforeShow @182-25E13285
    return $hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_BeforeShow;
}
//End Close hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_BeforeShow

//hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_OnClick @182-11C505C2
function hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_OnClick(& $sender)
{
    $hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_OnClick

//Custom Code @187-2A29BDB7
// -------------------------
    global $Redirect;
	$Redirect = "hospitalisationrecommedication_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&HospitalisationID=" . $_GET["HospitalisationID"] ; 

// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_OnClick @182-8526DC5D
    return $hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_OnClick;
}
//End Close hospitalisation_Button_UpdateAddRecommendedFollowUpMedication_OnClick

//hospitalisation_hosppossibdiag_ds_BeforeBuildSelect @222-7639AFD5
function hospitalisation_hosppossibdiag_ds_BeforeBuildSelect(& $sender)
{
    $hospitalisation_hosppossibdiag_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_hosppossibdiag_ds_BeforeBuildSelect

//Custom Code @240-2A29BDB7
// -------------------------
    global $hospitalisation;

    $registry_db = null;
	$pdiagnosis = "";
	
    //Select all projects of the currect user
    if (intval(CCGetFromGet("HospitalisationID",0)) > 0) {
  
      //Create a new database connection object
  	  $registry_db = new clsDBregistry_db();
      $registry_db->query("SELECT ICD10ID FROM hospitalisationdischargediagnosis WHERE HospitalisationID =".$registry_db->ToSQL(CCGetParam("HospitalisationID",0),ccsInteger));
      while($registry_db->next_record()) {
         if($pdiagnosis != "") $pdiagnosis .= ",";
         $pdiagnosis .= "'" . $registry_db->f("ICD10ID") . "'"; 
      }
  
      //Destroy the database connection  object
      $registry_db->close();
   }
  	if($hospitalisation->Reloaded->GetValue() == true) //If page has been reloaded
	{ 
		$pdiagnosis = $hospitalisation->LinkedDD_Hospitalisation->GetValue(); //Fill temporary values
	}

  //Modify the Where clause of the AvailableListBox List Box
  if($pdiagnosis != "") {
	 $hospitalisation->hosppossibdiag->ds->Where = "ICD10ID NOT IN (".$pdiagnosis.") AND (ICD10_class = 'other' OR ICD10_class = 'O')";
  }  
// -------------------------
//End Custom Code

//Close hospitalisation_hosppossibdiag_ds_BeforeBuildSelect @222-98AF3873
    return $hospitalisation_hosppossibdiag_ds_BeforeBuildSelect;
}
//End Close hospitalisation_hosppossibdiag_ds_BeforeBuildSelect

//hospitalisation_hospselectdiag_ds_BeforeBuildSelect @225-44BF3DF2
function hospitalisation_hospselectdiag_ds_BeforeBuildSelect(& $sender)
{
    $hospitalisation_hospselectdiag_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_hospselectdiag_ds_BeforeBuildSelect

//Custom Code @304-2A29BDB7
// -------------------------
  	if($hospitalisation->Reloaded->GetValue() == true) //If page has been reloaded
	{ 
		$hospitalisation->hospselectdiag->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, ' - ', DiseaseName) AS DiseaseIDName, icd10_all.* FROM icd10_all"; 
  	 	$hospitalisation->hospselectdiag->ds->Where = "(ICD10_class = 'O' OR ICD10_class = 'other') AND ICD10ID IN (".$hospitalisation->LinkedDD_Hospitalisation->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close hospitalisation_hospselectdiag_ds_BeforeBuildSelect @225-26013FCE
    return $hospitalisation_hospselectdiag_ds_BeforeBuildSelect;
}
//End Close hospitalisation_hospselectdiag_ds_BeforeBuildSelect

//hospitalisation_Button_UpdateAddDelivery_OnClick @271-74CF2D93
function hospitalisation_Button_UpdateAddDelivery_OnClick(& $sender)
{
    $hospitalisation_Button_UpdateAddDelivery_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddDelivery_OnClick

//Custom Code @272-2A29BDB7
// -------------------------
	global $Redirect;
	$Redirect = "delivery_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&HospitalisationID=" . $_GET["HospitalisationID"] ; 
// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddDelivery_OnClick @271-964A67CC
    return $hospitalisation_Button_UpdateAddDelivery_OnClick;
}
//End Close hospitalisation_Button_UpdateAddDelivery_OnClick

//hospitalisation_Button_UpdateAddDelivery_BeforeShow @271-CE9AE07A
function hospitalisation_Button_UpdateAddDelivery_BeforeShow(& $sender)
{
    $hospitalisation_Button_UpdateAddDelivery_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddDelivery_BeforeShow

//Custom Code @273-2A29BDB7
// -------------------------
   	  $hospitalisation->Button_UpdateAddDelivery->Visible = $hospitalisation->Button_Update->Visible;  
	  $registry_db = new clsDBregistry_db();
	  $sql = "SELECT * FROM delivery WHERE PregnancyID  =". $_GET["PregnancyID"];
      $registry_db->query($sql);
	  if($registry_db->next_record()) {
      	$hospitalisation->Button_UpdateAddDelivery->Visible = FALSE;
	  }
  
      //Destroy the database connection  object
      $registry_db->close();

// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddDelivery_BeforeShow @271-9A05BA51
    return $hospitalisation_Button_UpdateAddDelivery_BeforeShow;
}
//End Close hospitalisation_Button_UpdateAddDelivery_BeforeShow

//hospitalisation_Button_UpdateAddTest_BeforeShow @280-812A426F
function hospitalisation_Button_UpdateAddTest_BeforeShow(& $sender)
{
    $hospitalisation_Button_UpdateAddTest_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddTest_BeforeShow

//Custom Code @281-2A29BDB7
// -------------------------
    $registry_db = new clsDBregistry_db();
	
	if(CCDLookup("count(*)", "testhospitalisation", "HospitalisationID = ". $_GET["HospitalisationID"] , $registry_db) == 0)
		$hospitalisation->Button_UpdateAddTest->Visible = FALSE;

	$registry_db->close();
// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddTest_BeforeShow @280-4C945890
    return $hospitalisation_Button_UpdateAddTest_BeforeShow;
}
//End Close hospitalisation_Button_UpdateAddTest_BeforeShow

//hospitalisation_Button_UpdateAddTest_OnClick @280-818FD581
function hospitalisation_Button_UpdateAddTest_OnClick(& $sender)
{
    $hospitalisation_Button_UpdateAddTest_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddTest_OnClick

//Custom Code @282-2A29BDB7
// -------------------------
     global $Redirect;
	$Redirect = "testhospitalisation_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&HospitalisationID=" . $_GET["HospitalisationID"] ; 

// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddTest_OnClick @280-C9E4C1DE
    return $hospitalisation_Button_UpdateAddTest_OnClick;
}
//End Close hospitalisation_Button_UpdateAddTest_OnClick

function redirectUpdateDeleteCancel()
{
	$visitID = $_GET["VisitID"];

	global $Redirect;

	if (!empty($visitID))  //we only have to add the Hospitalisation ID to the visit if has Visit ID on the page parameters (it means it is a Visit Outcome)
		$Redirect = "visit_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"]  . "&VisitID=" . $visitID;	
	else
		$Redirect = "pregnancy_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"];	
}

//hospitalisation_Button_Update_OnClick @5-180C0BB8
function hospitalisation_Button_Update_OnClick(& $sender)
{
    $hospitalisation_Button_Update_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_Update_OnClick

//Custom Code @285-2A29BDB7
// -------------------------
    redirectUpdateDeleteCancel();
// -------------------------
//End Custom Code

//Close hospitalisation_Button_Update_OnClick @5-24702422
    return $hospitalisation_Button_Update_OnClick;
}
//End Close hospitalisation_Button_Update_OnClick

//hospitalisation_CurrentUser_BeforeShow @346-93C2F165
function hospitalisation_CurrentUser_BeforeShow(& $sender)
{
    $hospitalisation_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_CurrentUser_BeforeShow

//Custom Code @347-2A29BDB7
// -------------------------
	$hospitalisation->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close hospitalisation_CurrentUser_BeforeShow @346-5998151A
    return $hospitalisation_CurrentUser_BeforeShow;
}
//End Close hospitalisation_CurrentUser_BeforeShow

//DEL  // -------------------------
//DEL      global $hospitalisation;
//DEL  
//DEL      $registry_db = null;
//DEL  	$rsdiagnosis = "";
//DEL  	
//DEL      //Select all projects of the currect user
//DEL      if (intval(CCGetFromGet("HospitalisationID",0)) > 0) {
//DEL    
//DEL        //Create a new database connection object
//DEL    	  $registry_db = new clsDBregistry_db();
//DEL        $registry_db->query("SELECT ICD10ID FROM reasonhospitalisation WHERE HospitalisationID =".$registry_db->ToSQL(CCGetParam("HospitalisationID",0),ccsInteger));
//DEL        while($registry_db->next_record()) {
//DEL           if($rsdiagnosis != "") $rsdiagnosis .= ",";
//DEL           $rsdiagnosis .= "'" . $registry_db->f("ICD10ID") . "'"; 
//DEL        }
//DEL    
//DEL        //Destroy the database connection  object
//DEL        $registry_db->close();
//DEL     }
//DEL    	if($hospitalisation->Reloaded->GetValue() == true) //If page has been reloaded
//DEL  	{ 
//DEL  		$rsdiagnosis = $hospitalisation->LinkedDD_ReasonHospitalisation->GetValue(); //Fill temporary values
//DEL  	}
//DEL  
//DEL    //Modify the Where clause of the AvailableListBox List Box
//DEL    if($rsdiagnosis != "") {
//DEL  	 $hospitalisation->ReasonHospitalisation->ds->Where = "ICD10ID NOT IN (".$rsdiagnosis.") AND (ICD10_class = 'other' OR ICD10_class = 'O')";
//DEL    }
//DEL  // -------------------------

//hospitalisation_SelectedReasonHospitalisation_ds_BeforeBuildSelect @262-6CF9D39D
function hospitalisation_SelectedReasonHospitalisation_ds_BeforeBuildSelect(& $sender)
{
    $hospitalisation_SelectedReasonHospitalisation_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_SelectedReasonHospitalisation_ds_BeforeBuildSelect

//Custom Code @362-2A29BDB7
// -------------------------
  	if($hospitalisation->Reloaded->GetValue() == true) //If page has been reloaded
	{ 
		$hospitalisation->SelectedReasonHospitalisation->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, ' - ', DiseaseName) AS DiseaseIDName, icd10_all.* FROM icd10_all"; 
  	 	$hospitalisation->SelectedReasonHospitalisation->ds->Where = "(ICD10_class = 'O' OR ICD10_class = 'other') AND ICD10ID IN (".$hospitalisation->LinkedDD_ReasonHospitalisation->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close hospitalisation_SelectedReasonHospitalisation_ds_BeforeBuildSelect @262-B32F4E38
    return $hospitalisation_SelectedReasonHospitalisation_ds_BeforeBuildSelect;
}
//End Close hospitalisation_SelectedReasonHospitalisation_ds_BeforeBuildSelect

//hospitalisation_ReasonHospitalisation_ds_BeforeBuildSelect @228-66643EA3
function hospitalisation_ReasonHospitalisation_ds_BeforeBuildSelect(& $sender)
{
    $hospitalisation_ReasonHospitalisation_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_ReasonHospitalisation_ds_BeforeBuildSelect

//Custom Code @370-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close hospitalisation_ReasonHospitalisation_ds_BeforeBuildSelect @228-7450FFC6
    return $hospitalisation_ReasonHospitalisation_ds_BeforeBuildSelect;
}
//End Close hospitalisation_ReasonHospitalisation_ds_BeforeBuildSelect

//hospitalisation_Button_UpdateAddTests_OnClick @378-054A6152
function hospitalisation_Button_UpdateAddTests_OnClick(& $sender)
{
    $hospitalisation_Button_UpdateAddTests_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddTests_OnClick

//Custom Code @379-2A29BDB7
// -------------------------
	global $Redirect;
	$Redirect = "testhosplist_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&HospitalisationID=" . $_GET["HospitalisationID"]; 

	//create tests
	InsertTests();

// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddTests_OnClick @378-ED66AA3A
    return $hospitalisation_Button_UpdateAddTests_OnClick;
}
//End Close hospitalisation_Button_UpdateAddTests_OnClick

//hospitalisation_Button_UpdateAddTests_BeforeShow @378-96571478
function hospitalisation_Button_UpdateAddTests_BeforeShow(& $sender)
{
    $hospitalisation_Button_UpdateAddTests_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_Button_UpdateAddTests_BeforeShow

//Custom Code @380-2A29BDB7
// -------------------------
	$registry_db = new clsDBregistry_db();
	
	if(CCDLookup("count(*)", "testhospitalisation", "HospitalisationID = ". $_GET["HospitalisationID"] , $registry_db) > 0)
		$hospitalisation->Button_UpdateAddTests->Visible = FALSE;
	else
		$hospitalisation->Button_UpdateAddTests->Visible = $hospitalisation->Button_Update->Visible;

	$registry_db->close();
// -------------------------
//End Custom Code

//Close hospitalisation_Button_UpdateAddTests_BeforeShow @378-67C070A8
    return $hospitalisation_Button_UpdateAddTests_BeforeShow;
}
//End Close hospitalisation_Button_UpdateAddTests_BeforeShow

//hospitalisation_pregnancyDateTemp_BeforeShow @264-63A0FA34
function hospitalisation_pregnancyDateTemp_BeforeShow(& $sender)
{
    $hospitalisation_pregnancyDateTemp_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_pregnancyDateTemp_BeforeShow

//Custom Code @383-2A29BDB7
// -------------------------
	$registry_db = new clsDBregistry_db();
	$sql = "SELECT PregRegDate FROM pregnancy WHERE PregnancyID  =". $_GET["PregnancyID"];
	$registry_db->query($sql);
	if($registry_db->next_record())
	{
	
		$dateParts = explode("-",$registry_db->f("PregRegDate"));  
	 	$timestamp = mktime(0,0,0,$dateParts[1],$dateParts[2],$dateParts[0]); 
		$hospitalisation->pregnancyDateTemp->SetValue($timestamp);
 

	}
	$registry_db->close();

// -------------------------
//End Custom Code

//Close hospitalisation_pregnancyDateTemp_BeforeShow @264-C36AC622
    return $hospitalisation_pregnancyDateTemp_BeforeShow;
}
//End Close hospitalisation_pregnancyDateTemp_BeforeShow

//hospitalisation_BeforeDelete @3-29E5D5E1
function hospitalisation_BeforeDelete(& $sender)
{
    $hospitalisation_BeforeDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_BeforeDelete

//Custom Code @241-2A29BDB7
// -------------------------
    DiscDiagnModify("Delete");
	ReferralModify("Delete");
// -------------------------
//End Custom Code

//Close hospitalisation_BeforeDelete @3-260ACF09
    return $hospitalisation_BeforeDelete;
}
//End Close hospitalisation_BeforeDelete

//hospitalisation_AfterInsert @3-63F15B98
function hospitalisation_AfterInsert(& $sender)
{
    $hospitalisation_AfterInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_AfterInsert

//Custom Code @242-2A29BDB7
// -------------------------

    DiscDiagnModify("Insert");

	//global $Redirect;

	//open DB	
	$registry_db = new clsDBregistry_db();

	$LastInsKey = CCDLookup("max(HospitalisationID)", "hospitalisation", "", $registry_db);

	$visitID = $_GET["VisitID"];

	if (!empty($visitID))  //we only have to add the Hospitalisation ID to the visit if has Visit ID on the page parameters (it means it is a Visit Outcome)
	{
		$registry_db->query("UPDATE visit SET HospitalisationID = " . $registry_db->ToSQL($LastInsKey,ccsInteger) . " WHERE VisitID = " . $visitID . ";");
		//$Redirect = "hospitalisation_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"]  . "&VisitID=" . $visitID . "&HospitalisationID=" . $LastInsKey;	
	}
	
	if($hospitalisation->RecomDelivery3rdLevel->GetValue() == 1)
	{
		ReferralModify("Insert");
	}

	//else
		//$Redirect = "hospitalisation_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&HospitalisationID=" . $LastInsKey;		

  	$registry_db->close();	
// -------------------------
//End Custom Code

//Close hospitalisation_AfterInsert @3-9CBBEFF3
    return $hospitalisation_AfterInsert;
}
//End Close hospitalisation_AfterInsert

//hospitalisation_AfterUpdate @3-900FBA4D
function hospitalisation_AfterUpdate(& $sender)
{
    $hospitalisation_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_AfterUpdate

//Custom Code @243-2A29BDB7
// -------------------------
    DiscDiagnModify("Update");
	if($hospitalisation->RecomDelivery3rdLevel->GetValue() == 1)
{
	ReferralModify("Update");
} else // in case it is changed to smtg else
{
	ReferralModify("Delete");
}
// -------------------------
//End Custom Code

//DEL      echo 'xxxus';


//Close hospitalisation_AfterUpdate @3-53922E7C
    return $hospitalisation_AfterUpdate;
}
//End Close hospitalisation_AfterUpdate

//hospitalisation_BeforeShow @3-0460D556
function hospitalisation_BeforeShow(& $sender)
{
    $hospitalisation_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation; //Compatibility
//End hospitalisation_BeforeShow

//Custom Code @377-2A29BDB7
// -------------------------
	global $DBregistry_db;
  	$registry_db = new clsDBregistry_db();

	if($hospitalisation->RecomDelivery3rdLevel->GetValue() == 1)
	{
		//Create new database  object
		$WhereHospitalisationID = "HospitalisationID = ". $_GET["HospitalisationID"];
		$hospitalisation->IndicationID->SetValue(CCDLookup("IndicationID", "referralhosp", $WhereHospitalisationID , $registry_db));
		$hospitalisation->ReferralFacilityID->SetValue(CCDLookup("FacilityID", "referralhosp", $WhereHospitalisationID , $registry_db));
		$hospitalisation->DeptID->SetValue(CCDLookup("DeptID", "referralhosp", $WhereHospitalisationID , $registry_db));
	}
	else
	{
		$hospitalisation->IndicationID->SetValue(CCDLookup("max(IndicationID)", "refindication","", $registry_db));
		$hospitalisation->ReferralFacilityID->SetValue(CCDLookup("max(FacilityID)", "facilities", "" , $registry_db));
		$hospitalisation->DeptID->SetValue(CCDLookup("max(DeptID)", "department", "" , $registry_db));
	}
	$registry_db->close();


// -------------------------
//End Custom Code

//Close hospitalisation_BeforeShow @3-C36B31CD
    return $hospitalisation_BeforeShow;
}
//End Close hospitalisation_BeforeShow

//Page_BeforeInitialize @1-6205C050
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation_maint; //Compatibility
//End Page_BeforeInitialize

//Custom Code @381-2A29BDB7
// -------------------------
    //remove "not performed" tests
	
	$HospitalisationID = CCGetFromGet("HospitalisationID",0);
	if($HospitalisationID != 0)
	{
		$registry_db = new clsDBregistry_db();
		$registry_db->query("DELETE FROM testhospitalisation WHERE HospitalisationID = ".$registry_db->ToSQL($HospitalisationID,ccsInteger)." AND  TestResultNormal = ". $registry_db->ToSQL("-1",ccsInteger));
		$registry_db->close();
	}
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

//function DebugInsert(){
//	$registry_db = new clsDBregistry_db();
//  
//	$registry_db->close();
//}

function ReferralModify($Actions){ 
global $DBregistry_db;
global $hospitalisation;
  $registry_db = null;
  $VisitID = 0;
  $GetLastInsKey = 0;

  //Create new database  object
  $registry_db = new clsDBregistry_db();
  //Retrieve current data
  $HospitalisationID = CCGetFromGet("HospitalisationID",0);
  $IndicationID = $hospitalisation->IndicationID->GetValue();
  $ReferralFacilityID = $hospitalisation->ReferralFacilityID->GetValue();
  $DeptID = $hospitalisation->DeptID->GetValue();

  if($Actions == "Insert"){
	//Retrieve the last inserted key
	$GetLastInsKey = CCDLookup("max(HospitalisationID)", "hospitalisation", "", $registry_db);
   	//Insert New Referral
     $registry_db->query("INSERT INTO referralhosp (HospitalisationID, IndicationID, FacilityID, DeptID) VALUES (".$registry_db->ToSQL($GetLastInsKey,ccsInteger).", " .$registry_db->ToSQL($IndicationID,ccsInteger).", " .$registry_db->ToSQL($ReferralFacilityID,ccsInteger). ", " .$registry_db->ToSQL($DeptID,ccsInteger). " )");
  }
  if($HospitalisationID >0){
    if( ($Actions == "Delete") || ($Actions == "Update")) {
	   //Delete project patient links
	   $registry_db->query("DELETE FROM referralhosp WHERE HospitalisationID=".$registry_db->ToSQL($HospitalisationID,ccsInteger));
    } 
    if($Actions == "Update"){
     $registry_db->query("INSERT INTO referralhosp (HospitalisationID, IndicationID, FacilityID, DeptID) VALUES (".$registry_db->ToSQL($HospitalisationID,ccsInteger).", " .$registry_db->ToSQL($IndicationID,ccsInteger).", " .$registry_db->ToSQL($ReferralFacilityID,ccsInteger). ", " .$registry_db->ToSQL($DeptID,ccsInteger). " )");
	}
  }
  //Close and destroy the database connection object
  $registry_db->close();
}

function DiscDiagnModify($Actions){ 

  $registry_db = null;
  $HospitalisationID = 0;
  $ICD10ID = 0;
  $ICD10List_Hosp_Disc_Diag = array();
  $ICD10List_Reason_Hosp_Diag = array();
  $GetLastInsKey = 0;

  //Create new database  object
  $registry_db = new clsDBregistry_db();

  //Retrieve current patient
  $HospitalisationID = CCGetFromGet("HospitalisationID",0);
  $ICD10List_Hosp_Disc_Diag = split(",",trim(str_replace("'","",CCGetFromPost("LinkedDD_Hospitalisation"))));
  $ICD10List_Reason_Hosp_Diag = split(",",trim(str_replace("'","",CCGetFromPost("LinkedDD_ReasonHospitalisation"))));
  if($Actions == "Insert"){
	//Retrieve the last inserted key
	$GetLastInsKey = CCDLookup("max(HospitalisationID)", "hospitalisation", "", $registry_db);

   	//Insert New links
	reset($ICD10List_Hosp_Disc_Diag);
	while(list($key,$ICD10ID) = each($ICD10List_Hosp_Disc_Diag)) {
	     $registry_db->query("INSERT INTO hospitalisationdischargediagnosis (ICD10ID, HospitalisationID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
      }
	
		reset($ICD10List_Reason_Hosp_Diag);
	while(list($key,$ICD10ID) = each($ICD10List_Reason_Hosp_Diag)) {
	     $registry_db->query("INSERT INTO reasonhospitalisation (ICD10ID, HospitalisationID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
      }
  }
  if($HospitalisationID >0){
    if( ($Actions == "Delete") || ($Actions == "Update")) {
	   //Delete project patient links
	   $registry_db->query("DELETE FROM hospitalisationdischargediagnosis WHERE HospitalisationID=".$registry_db->ToSQL($HospitalisationID,ccsInteger));
	   $registry_db->query("DELETE FROM reasonhospitalisation WHERE HospitalisationID=".$registry_db->ToSQL($HospitalisationID,ccsInteger));
    } 
    if($Actions == "Update"){
       //Insert assigned patient
       reset($ICD10List_Hosp_Disc_Diag);
	   while(list($key,$ICD10ID) = each($ICD10List_Hosp_Disc_Diag)){
			$registry_db->query("INSERT INTO hospitalisationdischargediagnosis (ICD10ID, HospitalisationID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($HospitalisationID,ccsInteger).");");
       }
	 reset($ICD10List_Reason_Hosp_Diag);
	   while(list($key,$ICD10ID) = each($ICD10List_Reason_Hosp_Diag)){
			$registry_db->query("INSERT INTO reasonhospitalisation (ICD10ID, HospitalisationID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($HospitalisationID,ccsInteger).");");
       }
    }
  }

  //Close and destroy the database connection object
  $registry_db->close();
}

function InsertTests()
{
	//---
	// let's insert all the possible 15 tests 
	  
	// Retrieve current data
	$HospitalisationID = CCGetFromGet("HospitalisationID",0);
	$testArray = array();

	// open DB
	$registry_db = new clsDBregistry_db();

	// get all types of tests available in the DB
	$registry_db->query("SELECT TestCodeID FROM testcode");
    while($registry_db->next_record()) {
		array_push($testArray,$registry_db->f("TestCodeID"));
    }
	
	$nrArrayElements = count($testArray);
	$currentDate = date("Y-m-d");	
	// for each type of test
	for ($i = 0; $i <= $nrArrayElements ; $i++)
	{
 		// insert a new empty test for this hospitalisation
		$registry_db->query("INSERT INTO testhospitalisation (HospitalisationID, TestDate, TestCodeID, TestResultNormal) VALUES (".$registry_db->ToSQL($HospitalisationID,ccsInteger).", ".$registry_db->ToSQL($currentDate,ccsDate).", " .$registry_db->ToSQL($testArray[$i],ccsInteger). ", " . $registry_db->ToSQL("-1",ccsInteger) . " )");
	}
		
	//Close and destroy the database connection object
	$registry_db->close();
}
?>
