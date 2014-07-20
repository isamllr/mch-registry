<?php
//BindEvents Method @1-CF2EE5AE
function BindEvents()
{
    global $medication;
    global $visit;
    global $department_facilities_hos;
    global $test_testcode1;
    global $CCSEvents;
    $medication->medication_medicationatco_TotalRecords->CCSEvents["BeforeShow"] = "medication_medication_medicationatco_TotalRecords_BeforeShow";
    $medication->CCSEvents["BeforeShow"] = "medication_BeforeShow";
    $visit->FacilityID->CCSEvents["BeforeShow"] = "visit_FacilityID_BeforeShow";
    $visit->ListofVisitDis->ds->CCSEvents["BeforeBuildSelect"] = "visit_ListofVisitDis_ds_BeforeBuildSelect";
    $visit->SelectedVisitDis->ds->CCSEvents["BeforeBuildSelect"] = "visit_SelectedVisitDis_ds_BeforeBuildSelect";
    $visit->Button_UpdateAddMedication->CCSEvents["OnClick"] = "visit_Button_UpdateAddMedication_OnClick";
    $visit->Button_UpdateAddMedication->CCSEvents["BeforeShow"] = "visit_Button_UpdateAddMedication_BeforeShow";
    $visit->Button_UpdateAddHospitalisation->CCSEvents["OnClick"] = "visit_Button_UpdateAddHospitalisation_OnClick";
    $visit->Button_UpdateAddHospitalisation->CCSEvents["BeforeShow"] = "visit_Button_UpdateAddHospitalisation_BeforeShow";
    $visit->CurrentUser->CCSEvents["BeforeShow"] = "visit_CurrentUser_BeforeShow";
    $visit->EmployeeID->CCSEvents["BeforeShow"] = "visit_EmployeeID_BeforeShow";
    $visit->Button_UpdateAddTests->CCSEvents["OnClick"] = "visit_Button_UpdateAddTests_OnClick";
    $visit->Button_UpdateAddTests->CCSEvents["BeforeShow"] = "visit_Button_UpdateAddTests_BeforeShow";
    $visit->Button_UpdateAddTest->CCSEvents["OnClick"] = "visit_Button_UpdateAddTest_OnClick";
    $visit->Button_UpdateAddTest->CCSEvents["BeforeShow"] = "visit_Button_UpdateAddTest_BeforeShow";
    $visit->CCSEvents["AfterInsert"] = "visit_AfterInsert";
    $visit->CCSEvents["AfterUpdate"] = "visit_AfterUpdate";
    $visit->CCSEvents["BeforeDelete"] = "visit_BeforeDelete";
    $visit->CCSEvents["BeforeShow"] = "visit_BeforeShow";
    $visit->ds->CCSEvents["BeforeExecuteUpdate"] = "visit_ds_BeforeExecuteUpdate";
    $department_facilities_hos->CCSEvents["BeforeShow"] = "department_facilities_hos_BeforeShow";
    $test_testcode1->TestResultNormal->CCSEvents["BeforeShow"] = "test_testcode1_TestResultNormal_BeforeShow";
    $test_testcode1->CCSEvents["BeforeShow"] = "test_testcode1_BeforeShow";
}
//End BindEvents Method

//medication_medication_medicationatco_TotalRecords_BeforeShow @276-CC9ABDA4
function medication_medication_medicationatco_TotalRecords_BeforeShow(& $sender)
{
    $medication_medication_medicationatco_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $medication; //Compatibility
//End medication_medication_medicationatco_TotalRecords_BeforeShow

//Retrieve number of records @277-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close medication_medication_medicationatco_TotalRecords_BeforeShow @276-4461122A
    return $medication_medication_medicationatco_TotalRecords_BeforeShow;
}
//End Close medication_medication_medicationatco_TotalRecords_BeforeShow

//medication_BeforeShow @270-C5E0C6E3
function medication_BeforeShow(& $sender)
{
    $medication_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $medication; //Compatibility
//End medication_BeforeShow

//Custom Code @307-2A29BDB7
// -------------------------
	if($medication->ds->RecordsCount < 1){
	  	$medication->Visible = FALSE;
	}
	else{
		$medication->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close medication_BeforeShow @270-AA47C48D
    return $medication_BeforeShow;
}
//End Close medication_BeforeShow

//visit_FacilityID_BeforeShow @65-2F354491
function visit_FacilityID_BeforeShow(& $sender)
{
    $visit_FacilityID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_FacilityID_BeforeShow

//Custom Code @589-2A29BDB7
// -------------------------
    if(CCGetFromGet("VisitID", "") == "") // only if it is a new visit being added
	{
		$LoginID = CCGetUserID();
		$registry_db = new clsDBregistry_db();
  		$Facility = CCDLookup("facilities.FacilityID", "((facilities INNER JOIN location ON facilities.FacilityID = location.FacilityID) INNER JOIN employees ON employees.LocationID = location.LocationID) INNER JOIN login ON login.LoginID = employees.LoginID", "login.LoginID = ".$LoginID, $registry_db);
		$registry_db->close();
		$visit->FacilityID->SetValue($Facility);
	}
// -------------------------
//End Custom Code

//Close visit_FacilityID_BeforeShow @65-FF0316A4
    return $visit_FacilityID_BeforeShow;
}
//End Close visit_FacilityID_BeforeShow

//visit_ListofVisitDis_ds_BeforeBuildSelect @94-618AB827
function visit_ListofVisitDis_ds_BeforeBuildSelect(& $sender)
{
    $visit_ListofVisitDis_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_ListofVisitDis_ds_BeforeBuildSelect

//Custom Code @95-2A29BDB7
// -------------------------
	global $visit;

    $registry_db = null;
	$LinkedDisease = "";
	
    //Select all projects of the currect user
    if (intval(CCGetFromGet("VisitID",0)) > 0) {
  
      //Create a new database connection object
  	  $registry_db = new clsDBregistry_db();
      $registry_db->query("SELECT ICD10ID FROM visitdisease WHERE VisitID =".$registry_db->ToSQL(CCGetParam("VisitID",0),ccsInteger));
      while($registry_db->next_record()) {
         if($LinkedDisease != "") $LinkedDisease .= ",";
            $LinkedDisease .= "'" . $registry_db->f("ICD10ID") . "'";
      }
  
      //Destroy the database connection  object
      $registry_db->close();
   }

  	if($visit->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$LinkedDisease = $visit->LinkedID_Visit->GetValue(); //Fill temporary values
	}

  //Modify the Where clause of the AvailableListBox List Box
  if($LinkedDisease != "") {
	 $visit->ListofVisitDis->ds->Where = "ICD10ID NOT IN (".$LinkedDisease.") AND RelevantVisitProb = '1'";
  }  
// -------------------------
//End Custom Code

//Close visit_ListofVisitDis_ds_BeforeBuildSelect @94-9D433DDB
    return $visit_ListofVisitDis_ds_BeforeBuildSelect;
}
//End Close visit_ListofVisitDis_ds_BeforeBuildSelect

//visit_SelectedVisitDis_ds_BeforeBuildSelect @100-E9C1EE8E
function visit_SelectedVisitDis_ds_BeforeBuildSelect(& $sender)
{
    $visit_SelectedVisitDis_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_SelectedVisitDis_ds_BeforeBuildSelect

//Custom Code @476-2A29BDB7
// -------------------------
  	if($visit->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$visit->SelectedVisitDis->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, ' - ', DiseaseName) AS DiseaseIDName, icd10_all.* FROM icd10_all"; 
  	 	$visit->SelectedVisitDis->ds->Where = "ICD10ID IN (".$visit->LinkedID_Visit->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close visit_SelectedVisitDis_ds_BeforeBuildSelect @100-40D24246
    return $visit_SelectedVisitDis_ds_BeforeBuildSelect;
}
//End Close visit_SelectedVisitDis_ds_BeforeBuildSelect

//visit_Button_UpdateAddMedication_OnClick @51-B09B9EE1
function visit_Button_UpdateAddMedication_OnClick(& $sender)
{
    $visit_Button_UpdateAddMedication_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_Button_UpdateAddMedication_OnClick

//Custom Code @133-2A29BDB7
// -------------------------
	global $Redirect;
	$Redirect = "medication_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&VisitID=" . $_GET["VisitID"]; 
// -------------------------
//End Custom Code

//Close visit_Button_UpdateAddMedication_OnClick @51-2C1D4A36
    return $visit_Button_UpdateAddMedication_OnClick;
}
//End Close visit_Button_UpdateAddMedication_OnClick

//visit_Button_UpdateAddMedication_BeforeShow @51-D03916DB
function visit_Button_UpdateAddMedication_BeforeShow(& $sender)
{
    $visit_Button_UpdateAddMedication_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_Button_UpdateAddMedication_BeforeShow

//Custom Code @285-2A29BDB7
// -------------------------
	$visit->Button_UpdateAddMedication->Visible = $visit->Button_Update->Visible;
// -------------------------
//End Custom Code

//Close visit_Button_UpdateAddMedication_BeforeShow @51-F773D255
    return $visit_Button_UpdateAddMedication_BeforeShow;
}
//End Close visit_Button_UpdateAddMedication_BeforeShow

//visit_Button_UpdateAddHospitalisation_OnClick @419-A3BCBCA3
function visit_Button_UpdateAddHospitalisation_OnClick(& $sender)
{
    $visit_Button_UpdateAddHospitalisation_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_Button_UpdateAddHospitalisation_OnClick

//Custom Code @420-2A29BDB7
// -------------------------
    global $Redirect;
	$Redirect = "hospitalisation_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&VisitID=" . $_GET["VisitID"]; 
// -------------------------
//End Custom Code

//Close visit_Button_UpdateAddHospitalisation_OnClick @419-D78DAC0B
    return $visit_Button_UpdateAddHospitalisation_OnClick;
}
//End Close visit_Button_UpdateAddHospitalisation_OnClick

//visit_Button_UpdateAddHospitalisation_BeforeShow @419-3A2857EA
function visit_Button_UpdateAddHospitalisation_BeforeShow(& $sender)
{
    $visit_Button_UpdateAddHospitalisation_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_Button_UpdateAddHospitalisation_BeforeShow

//Custom Code @421-2A29BDB7
// -------------------------
	$VisitID = $_GET["VisitID"];
	if(!empty($VisitID))
	{ 
		$registry_db = new clsDBregistry_db();
 		$Hosp = CCDLookup("HospitalisationID", "visit", "VisitID = ". $VisitID, $registry_db);
		$registry_db->close();

		if(!empty($Hosp))
			$visit->Button_UpdateAddHospitalisation->Visible = FALSE;
		else
			$visit->Button_UpdateAddHospitalisation->Visible = $visit->Button_Update->Visible;
	}
	else
		$visit->Button_UpdateAddHospitalisation->Visible = $visit->Button_Update->Visible;
// -------------------------
//End Custom Code

//Close visit_Button_UpdateAddHospitalisation_BeforeShow @419-23EB6343
    return $visit_Button_UpdateAddHospitalisation_BeforeShow;
}
//End Close visit_Button_UpdateAddHospitalisation_BeforeShow

//DEL  // -------------------------
//DEL      global $Redirect;
//DEL  	if(CCGetFromGet("VisitID", 0) == 0)
//DEL  		$Redirect = $Redirect = "visit_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&VisitID=" . $_GET["VisitID"]; 
//DEL  // -------------------------

//visit_CurrentUser_BeforeShow @83-F79E571C
function visit_CurrentUser_BeforeShow(& $sender)
{
    $visit_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_CurrentUser_BeforeShow

//Custom Code @170-2A29BDB7
// -------------------------
	$visit->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close visit_CurrentUser_BeforeShow @83-A4BEBFD7
    return $visit_CurrentUser_BeforeShow;
}
//End Close visit_CurrentUser_BeforeShow

//visit_EmployeeID_BeforeShow @176-844674A4
function visit_EmployeeID_BeforeShow(& $sender)
{
    $visit_EmployeeID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_EmployeeID_BeforeShow

//Close visit_EmployeeID_BeforeShow @176-2B73BF50
    return $visit_EmployeeID_BeforeShow;
}
//End Close visit_EmployeeID_BeforeShow

//visit_Button_UpdateAddTests_OnClick @547-F35FB5C4
function visit_Button_UpdateAddTests_OnClick(& $sender)
{
    $visit_Button_UpdateAddTests_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_Button_UpdateAddTests_OnClick

//Custom Code @548-2A29BDB7
// -------------------------
	global $Redirect;
	$Redirect = "testlist_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&VisitID=" . $_GET["VisitID"]; 

	//create tests
	InsertTests();

// -------------------------
//End Custom Code

//Close visit_Button_UpdateAddTests_OnClick @547-C2A67227
    return $visit_Button_UpdateAddTests_OnClick;
}
//End Close visit_Button_UpdateAddTests_OnClick

//visit_Button_UpdateAddTests_BeforeShow @547-93D4DA19
function visit_Button_UpdateAddTests_BeforeShow(& $sender)
{
    $visit_Button_UpdateAddTests_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_Button_UpdateAddTests_BeforeShow

//Custom Code @549-2A29BDB7
// -------------------------
	$registry_db = new clsDBregistry_db();
	
	if(CCDLookup("count(*)", "test", "VisitID = ". $_GET["VisitID"] , $registry_db) > 0)
		$visit->Button_UpdateAddTests->Visible = FALSE;
	else
		$visit->Button_UpdateAddTests->Visible = $visit->Button_Update->Visible;

	$registry_db->close();
// -------------------------
//End Custom Code

//Close visit_Button_UpdateAddTests_BeforeShow @547-A1BBCD03
    return $visit_Button_UpdateAddTests_BeforeShow;
}
//End Close visit_Button_UpdateAddTests_BeforeShow

//visit_Button_UpdateAddTest_OnClick @569-9DFA767D
function visit_Button_UpdateAddTest_OnClick(& $sender)
{
    $visit_Button_UpdateAddTest_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_Button_UpdateAddTest_OnClick

//Custom Code @570-2A29BDB7
// -------------------------
	global $Redirect;
	$Redirect = "Test_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&VisitID=" . $_GET["VisitID"]; 
// -------------------------
//End Custom Code

//Close visit_Button_UpdateAddTest_OnClick @569-66405BE2
    return $visit_Button_UpdateAddTest_OnClick;
}
//End Close visit_Button_UpdateAddTest_OnClick

//visit_Button_UpdateAddTest_BeforeShow @569-B25D6C58
function visit_Button_UpdateAddTest_BeforeShow(& $sender)
{
    $visit_Button_UpdateAddTest_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_Button_UpdateAddTest_BeforeShow

//Custom Code @571-2A29BDB7
// -------------------------
	$registry_db = new clsDBregistry_db();
	
	if(CCDLookup("count(*)", "test", "VisitID = ". $_GET["VisitID"] , $registry_db) == 0)
		$visit->Button_UpdateAddTest->Visible = FALSE;

	$registry_db->close();
// -------------------------
//End Custom Code

//Close visit_Button_UpdateAddTest_BeforeShow @569-3BF041AA
    return $visit_Button_UpdateAddTest_BeforeShow;
}
//End Close visit_Button_UpdateAddTest_BeforeShow

//visit_AfterInsert @55-368254E6
function visit_AfterInsert(& $sender)
{
    $visit_AfterInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_AfterInsert

//Custom Code @118-2A29BDB7
// -------------------------
	DiseasesModify("Insert");
	if($visit->VisitOutcomeID->GetValue() == 3)	//If vistit outcome is hospitalization
	{
		ReferralModify("Insert");
	}

//	global $Redirect;
//	$Redirect = "visit_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&VisitID=" . $VisitID;
		
// -------------------------
//End Custom Code

//Close visit_AfterInsert @55-19C8AD2B
    return $visit_AfterInsert;
}
//End Close visit_AfterInsert

//visit_AfterUpdate @55-9BC44198
function visit_AfterUpdate(& $sender)
{
    $visit_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_AfterUpdate

//Custom Code @119-2A29BDB7
// -------------------------

DiseasesModify("Update");

if($visit->VisitOutcomeID->GetValue() == 3)	//If vistit outcome is referral
{
	ReferralModify("Update");
} else // in case it is changed to smtg else
{
	ReferralModify("Delete");
}

// -------------------------
//End Custom Code

//Close visit_AfterUpdate @55-D6E16CA4
    return $visit_AfterUpdate;
}
//End Close visit_AfterUpdate

//visit_BeforeDelete @55-69FB7E2B
function visit_BeforeDelete(& $sender)
{
    $visit_BeforeDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_BeforeDelete

//Custom Code @120-2A29BDB7
// -------------------------
DiseasesModify("Delete");
ReferralModify("Delete");
// -------------------------
//End Custom Code

//Close visit_BeforeDelete @55-AE87E6AD
    return $visit_BeforeDelete;
}
//End Close visit_BeforeDelete

//visit_BeforeShow @55-572FA4C9
function visit_BeforeShow(& $sender)
{
    $visit_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_BeforeShow

//Custom Code @218-2A29BDB7
// -------------------------
	global $DBregistry_db;
  	$registry_db = new clsDBregistry_db();

	if($visit->VisitOutcomeID->GetValue() == 3)	//If vistit outcome was referral
	{
		//Create new database  object
		$WhereVisitID = "VisitID = ". $_GET["VisitID"];
		$visit->IndicationID->SetValue(CCDLookup("IndicationID", "referral", $WhereVisitID , $registry_db));
		$visit->ReferralTypeID->SetValue(CCDLookup("ReferralTypeID", "referral", $WhereVisitID , $registry_db));
		$visit->ReferralFacilityID->SetValue(CCDLookup("FacilityID", "referral", $WhereVisitID , $registry_db));
		$visit->DeptID->SetValue(CCDLookup("DeptID", "referral", $WhereVisitID , $registry_db));
	}
	else
	{
		$visit->IndicationID->SetValue(CCDLookup("max(IndicationID)", "refindication","", $registry_db));
		$visit->ReferralTypeID->SetValue(CCDLookup("max(ReferralTypeID)", "referraltype","", $registry_db));
		$visit->ReferralFacilityID->SetValue(CCDLookup("max(FacilityID)", "facilities", "" , $registry_db));
		$visit->DeptID->SetValue(CCDLookup("max(DeptID)", "department", "" , $registry_db));
	}
	$registry_db->close();
// -------------------------
//End Custom Code

//Close visit_BeforeShow @55-D519319F
    return $visit_BeforeShow;
}
//End Close visit_BeforeShow

//visit_ds_BeforeExecuteUpdate @55-E99A80D3
function visit_ds_BeforeExecuteUpdate(& $sender)
{
    $visit_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit; //Compatibility
//End visit_ds_BeforeExecuteUpdate

//Custom Code @462-2A29BDB7
// ------------------------- 
	
	// we have to delete the relevant hospitalisation if the outcome of the visit is not hospitalisation anymore
		
	$registry_db = new clsDBregistry_db();

	$OldVisitOutcomeID = CCDLookup("VisitOutcomeID", "visit", "VisitID = ". $_GET["VisitID"] , $registry_db);
	$HospitalisationID = CCDLookup("HospitalisationID", "visit", "VisitID = ". $_GET["VisitID"] , $registry_db);

	if($OldVisitOutcomeID == 2 && $visit->VisitOutcomeID->Value != 2 && !empty($HospitalisationID))
		$registry_db->query("DELETE FROM hospitalisation WHERE HospitalisationID = " . $HospitalisationID);

	$registry_db->close();	
// -------------------------
//End Custom Code

//Close visit_ds_BeforeExecuteUpdate @55-F7D29676
    return $visit_ds_BeforeExecuteUpdate;
}
//End Close visit_ds_BeforeExecuteUpdate

//DEL  // -------------------------
//DEL      if($visit->VisitType->GetValue() == 3)
//DEL  		$visit->EmployeeID->Required = false;
//DEL  // -------------------------

//department_facilities_hos_BeforeShow @254-008C818B
function department_facilities_hos_BeforeShow(& $sender)
{
    $department_facilities_hos_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $department_facilities_hos; //Compatibility
//End department_facilities_hos_BeforeShow

//Custom Code @438-2A29BDB7
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

//test_testcode1_TestResultNormal_BeforeShow @562-26541DEB
function test_testcode1_TestResultNormal_BeforeShow(& $sender)
{
    $test_testcode1_TestResultNormal_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $test_testcode1; //Compatibility
//End test_testcode1_TestResultNormal_BeforeShow

//Custom Code @573-2A29BDB7
// -------------------------
	global $CCSLocales;
    if($test_testcode1->TestResultNormal->GetValue() == -1)
		$test_testcode1->TestResultNormal->SetValue($CCSLocales->GetText("NotPerformed"));
	else if($test_testcode1->TestResultNormal->GetValue() == 0)
		$test_testcode1->TestResultNormal->SetValue($CCSLocales->GetText("RNo"));
	else if($test_testcode1->TestResultNormal->GetValue() == 1)
		$test_testcode1->TestResultNormal->SetValue($CCSLocales->GetText("RYes"));
// -------------------------
//End Custom Code

//Close test_testcode1_TestResultNormal_BeforeShow @562-E315E120
    return $test_testcode1_TestResultNormal_BeforeShow;
}
//End Close test_testcode1_TestResultNormal_BeforeShow

//test_testcode1_BeforeShow @551-98B4A6B4
function test_testcode1_BeforeShow(& $sender)
{
    $test_testcode1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $test_testcode1; //Compatibility
//End test_testcode1_BeforeShow

//Custom Code @567-2A29BDB7
// -------------------------
    $registry_db = new clsDBregistry_db();
	
	if(CCDLookup("count(*)", "test", "VisitID = ". $_GET["VisitID"] , $registry_db) == 0)
		$test_testcode1->Visible = FALSE;
	
	$registry_db->close();
// -------------------------
//End Custom Code

//Close test_testcode1_BeforeShow @551-75B95989
    return $test_testcode1_BeforeShow;
}
//End Close test_testcode1_BeforeShow

//Page_BeforeInitialize @1-AFA383AB
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit_maint; //Compatibility
//End Page_BeforeInitialize

//Custom Code @593-2A29BDB7
// -------------------------
   	//remove "not performed" tests
	
	$VisitID = CCGetFromGet("VisitID",0);
	if($VisitID != 0)
	{
		$registry_db = new clsDBregistry_db();
		$registry_db->query("DELETE FROM test WHERE VisitID = ".$registry_db->ToSQL($VisitID,ccsInteger)." AND  TestResultNormal = ". $registry_db->ToSQL("-1",ccsInteger));
		$registry_db->close();
	}
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize



function DiseasesModify($Actions){ 
global $DBregistry_db;

  $registry_db = null;
  $VisitID = 0;
  $ICD10ID = 0;
  $ICD10List_Visit_Dis = array();
  $GetLastInsKey = 0;

  //Create new database  object
  $registry_db = new clsDBregistry_db();
  
  //Retrieve current patient
  $VisitID = CCGetFromGet("VisitID",0);
  $ICD10List_Visit_Dis = split(",",trim(str_replace("'","",CCGetFromPost("LinkedID_Visit"))));

  if($Actions == "Insert"){
	//Retrieve the last inserted key
	$GetLastInsKey = CCDLookup("max(VisitID)", "visit", "", $registry_db);

   	//Insert New links
	reset($ICD10List_Visit_Dis);
	while(list($key,$ICD10ID) = each($ICD10List_Visit_Dis)) {
	     $registry_db->query("INSERT INTO visitdisease (ICD10ID, VisitID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
      }
  }
  if($VisitID >0){
    if( ($Actions == "Delete") || ($Actions == "Update")) {
	   //Delete project patient links
	   $registry_db->query("DELETE FROM visitdisease WHERE VisitID=".$registry_db->ToSQL($VisitID,ccsInteger));
    } 
    if($Actions == "Update"){
       //Insert assigned patient
       reset($ICD10List_Visit_Dis);
	   while(list($key,$ICD10ID) = each($ICD10List_Visit_Dis)){
			$registry_db->query("INSERT INTO visitdisease (ICD10ID, VisitID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($VisitID,ccsInteger).");");
       }
    }
  }

  //Close and destroy the database connection object
  $registry_db->close();
  
}
function ReferralModify($Actions){ 
global $DBregistry_db;
global $visit;
  $registry_db = null;
  $VisitID = 0;
  $GetLastInsKey = 0;

  //Create new database  object
  $registry_db = new clsDBregistry_db();
  //Retrieve current data
  $VisitID = CCGetFromGet("VisitID",0);
  $IndicationID = $visit->IndicationID->GetValue();
  $ReferralFacilityID = $visit->ReferralFacilityID->GetValue();
  $ReferralTypeID = $visit->ReferralTypeID->GetValue();
  $DeptID = $visit->DeptID->GetValue();

  if($Actions == "Insert"){
	//Retrieve the last inserted key
	$GetLastInsKey = CCDLookup("max(VisitID)", "visit", "", $registry_db);
   	//Insert New Referral
     $registry_db->query("INSERT INTO referral (VisitID, IndicationID, FacilityID, ReferralTypeID, DeptID) VALUES (".$registry_db->ToSQL($GetLastInsKey,ccsInteger).", " .$registry_db->ToSQL($IndicationID,ccsInteger).", " .$registry_db->ToSQL($ReferralFacilityID,ccsInteger). ", " .$registry_db->ToSQL($ReferralTypeID,ccsInteger). ", ".$registry_db->ToSQL($DeptID,ccsInteger). " )");
  }
  if($VisitID >0){
    if( ($Actions == "Delete") || ($Actions == "Update")) {
	   //Delete project patient links
	   $registry_db->query("DELETE FROM referral WHERE VisitID=".$registry_db->ToSQL($VisitID,ccsInteger));
    } 
    if($Actions == "Update"){
     $registry_db->query("INSERT INTO referral (VisitID, IndicationID, FacilityID, ReferralTypeID, DeptID) VALUES (".$registry_db->ToSQL($VisitID,ccsInteger).", " .$registry_db->ToSQL($IndicationID,ccsInteger).", " .$registry_db->ToSQL($ReferralFacilityID,ccsInteger).", " .$registry_db->ToSQL($ReferralTypeID,ccsInteger). ", " .$registry_db->ToSQL($DeptID,ccsInteger). " )");
	}
  }
  //Close and destroy the database connection object
  $registry_db->close();
}

function InsertTests()
{
	//---
	// let's insert all the possible 15 tests in case it is the first visit
	  
	// Retrieve current data
	$VisitID = CCGetFromGet("VisitID",0);
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
 		// insert a new empty test for this visit
		$registry_db->query("INSERT INTO test (VisitID, TestDate, TestCodeID, TestResultNormal) VALUES (".$registry_db->ToSQL($VisitID,ccsInteger).", ".$registry_db->ToSQL($currentDate,ccsDate).", " .$registry_db->ToSQL($testArray[$i],ccsInteger). ", " . $registry_db->ToSQL("-1",ccsInteger) . " )");
	}
		
	//Close and destroy the database connection object
	$registry_db->close();
}
?>
