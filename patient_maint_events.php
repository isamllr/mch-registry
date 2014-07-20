<?php
//BindEvents Method @1-F3BDF2E0
function BindEvents()
{
    global $pregnancy;
    global $patient;
    global $delivery;
    global $patient1;
    global $patientID;
    global $CCSEvents;
    $pregnancy->CCSEvents["BeforeShow"] = "pregnancy_BeforeShow";
    $patient->SelectedDiseases->ds->CCSEvents["BeforeBuildSelect"] = "patient_SelectedDiseases_ds_BeforeBuildSelect";
    $patient->ListofObstetricAnamnesis->ds->CCSEvents["BeforeBuildSelect"] = "patient_ListofObstetricAnamnesis_ds_BeforeBuildSelect";
    $patient->CurrentUser->CCSEvents["BeforeShow"] = "patient_CurrentUser_BeforeShow";
    $patient->DistrictID->CCSEvents["BeforeShow"] = "patient_DistrictID_BeforeShow";
    $patient->DistrictActualID->CCSEvents["BeforeShow"] = "patient_DistrictActualID_BeforeShow";
    $patient->ListofBadHabbits->ds->CCSEvents["BeforeBuildSelect"] = "patient_ListofBadHabbits_ds_BeforeBuildSelect";
    $patient->SelectedBadHabbits->ds->CCSEvents["BeforeBuildSelect"] = "patient_SelectedBadHabbits_ds_BeforeBuildSelect";
    $patient->Button_AddPreg->CCSEvents["BeforeShow"] = "patient_Button_AddPreg_BeforeShow";
    $patient->Button_AddPreg->CCSEvents["OnClick"] = "patient_Button_AddPreg_OnClick";
    $patient->CCSEvents["BeforeDelete"] = "patient_BeforeDelete";
    $patient->CCSEvents["AfterInsert"] = "patient_AfterInsert";
    $patient->CCSEvents["AfterUpdate"] = "patient_AfterUpdate";
    $patient->CCSEvents["BeforeInsert"] = "patient_BeforeInsert";
    $delivery->complications_delivery_de_TotalRecords->CCSEvents["BeforeShow"] = "delivery_complications_delivery_de_TotalRecords_BeforeShow";
    $delivery->CCSEvents["BeforeShow"] = "delivery_BeforeShow";
    $patient1->SelectedDiseases->ds->CCSEvents["BeforeBuildSelect"] = "patient1_SelectedDiseases_ds_BeforeBuildSelect";
    $patient1->CurrentUser->CCSEvents["BeforeShow"] = "patient1_CurrentUser_BeforeShow";
    $patient1->SelectedBadHabbits->ds->CCSEvents["BeforeBuildSelect"] = "patient1_SelectedBadHabbits_ds_BeforeBuildSelect";
    $patient1->Button_AddPreg->CCSEvents["BeforeShow"] = "patient1_Button_AddPreg_BeforeShow";
    $patient1->Button_AddPreg->CCSEvents["OnClick"] = "patient1_Button_AddPreg_OnClick";
    $patient1->CCSEvents["BeforeDelete"] = "patient1_BeforeDelete";
    $patient1->CCSEvents["AfterInsert"] = "patient1_AfterInsert";
    $patient1->CCSEvents["AfterUpdate"] = "patient1_AfterUpdate";
    $patientID->CCSEvents["BeforeShow"] = "patientID_BeforeShow";
}
//End BindEvents Method

//pregnancy_BeforeShow @69-80B15989
function pregnancy_BeforeShow(& $sender)
{
    $pregnancy_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancy; //Compatibility
//End pregnancy_BeforeShow

//Custom Code @370-2A29BDB7
// -------------------------
	if($pregnancy->ds->RecordsCount < 1) {
	  	$pregnancy->Visible = FALSE;
	}
	else{
		$pregnancy->Visible = TRUE;
	}// -------------------------
//End Custom Code

//Close pregnancy_BeforeShow @69-7F694BB1
    return $pregnancy_BeforeShow;
}
//End Close pregnancy_BeforeShow

//patient_SelectedDiseases_ds_BeforeBuildSelect @231-F256AE8A
function patient_SelectedDiseases_ds_BeforeBuildSelect(& $sender)
{
    $patient_SelectedDiseases_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_SelectedDiseases_ds_BeforeBuildSelect

//Custom Code @539-2A29BDB7
// -------------------------
  	if($patient->Reloaded->GetValue() == true) // If page has been reloaded...
	{
		$patient->SelectedDiseases->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, ' - ', DiseaseName) AS DiseaseIDName, icd10_all.* FROM icd10_all"; 
  	 	$patient->SelectedDiseases->ds->Where = "ICD10ID IN (".$patient->LinkedID_Allerg->GetValue().") AND RelevantAnamnesis = '1'";
	}
// -------------------------
//End Custom Code

//Close patient_SelectedDiseases_ds_BeforeBuildSelect @231-D1ED5910
    return $patient_SelectedDiseases_ds_BeforeBuildSelect;
}
//End Close patient_SelectedDiseases_ds_BeforeBuildSelect

//patient_ListofObstetricAnamnesis_ds_BeforeBuildSelect @228-BBF6E6C0
function patient_ListofObstetricAnamnesis_ds_BeforeBuildSelect(& $sender)
{
    $patient_ListofObstetricAnamnesis_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_ListofObstetricAnamnesis_ds_BeforeBuildSelect

//Custom Code @229-2A29BDB7
// -------------------------
	global $patient;

    $registry_db = null;
	$LinkedDisease = "";
	
    //Select all projects of the currect user
    if (intval(CCGetFromGet("PatientID",0)) > 0) {
  
      //Create a new database connection object
  	  $registry_db = new clsDBregistry_db();
      $registry_db->query("SELECT ICD10ID FROM obstetric_anamnesis WHERE PatientID =".$registry_db->ToSQL(CCGetParam("PatientID",0),ccsInteger));
      while($registry_db->next_record()) {
         if($LinkedDisease != "") $LinkedDisease .= ",";
            $LinkedDisease .= "'" . $registry_db->f("ICD10ID") . "'";
      }
  
      //Destroy the database connection  object
      $registry_db->close();
   }
  	if($patient->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$LinkedDisease = $patient->LinkedID_Allerg->GetValue(); //Fill temporary values
	}
  //Modify the Where clause of the AvailableListBox List Box
  if($LinkedDisease != "") {
	 $patient->ListofObstetricAnamnesis->ds->Where = "ICD10ID NOT IN (".$LinkedDisease.") AND RelevantAnamnesis = '1'";
  }  
// -------------------------
//End Custom Code

//Close patient_ListofObstetricAnamnesis_ds_BeforeBuildSelect @228-DA073B3D
    return $patient_ListofObstetricAnamnesis_ds_BeforeBuildSelect;
}
//End Close patient_ListofObstetricAnamnesis_ds_BeforeBuildSelect

//patient_CurrentUser_BeforeShow @302-3327542B
function patient_CurrentUser_BeforeShow(& $sender)
{
    $patient_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_CurrentUser_BeforeShow

//Custom Code @303-2A29BDB7
// -------------------------
	$patient->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close patient_CurrentUser_BeforeShow @302-7342480E
    return $patient_CurrentUser_BeforeShow;
}
//End Close patient_CurrentUser_BeforeShow

//patient_DistrictID_BeforeShow @57-77A126C2
function patient_DistrictID_BeforeShow(& $sender)
{
    $patient_DistrictID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_DistrictID_BeforeShow

//Close patient_DistrictID_BeforeShow @57-FE36E13B
    return $patient_DistrictID_BeforeShow;
}
//End Close patient_DistrictID_BeforeShow

//patient_DistrictActualID_BeforeShow @421-5E087294
function patient_DistrictActualID_BeforeShow(& $sender)
{
    $patient_DistrictActualID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_DistrictActualID_BeforeShow

//Close patient_DistrictActualID_BeforeShow @421-F5F75FAF
    return $patient_DistrictActualID_BeforeShow;
}
//End Close patient_DistrictActualID_BeforeShow

//patient_ListofBadHabbits_ds_BeforeBuildSelect @256-7044A460
function patient_ListofBadHabbits_ds_BeforeBuildSelect(& $sender)
{
    $patient_ListofBadHabbits_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_ListofBadHabbits_ds_BeforeBuildSelect

//Custom Code @257-2A29BDB7
// -------------------------
 $registry_db = null;
  	$LinkedBadHabbits = "";
      //Select all projects of the currect user
      if (intval(CCGetFromGet("PatientID",0)) > 0) {
    
        //Create a new database connection object
    	  $registry_db = new clsDBregistry_db();
        $registry_db->query("SELECT BadHabbitsTypeID FROM bad_habbits WHERE PatientID =".$registry_db->ToSQL(CCGetParam("PatientID",0),ccsInteger));
  	  while($registry_db->next_record()) {
           if($LinkedBadHabbits != "") $LinkedBadHabbits .= ",";
             $LinkedBadHabbits .= "'" . $registry_db->f("BadHabbitsTypeID") . "'";
        }
    
        //Destroy the database connection  object
        $registry_db->close();
     }
  	if($patient->Reloaded->GetValue() == true) // If page has been reloaded....
	{
		$LinkedBadHabbits = $patient->LinkedID_BadHabbits->GetValue(); //....Use the temprary values
	}
    //Modify the Where clause of the AvailableListBox List Box
    if($LinkedBadHabbits != "") {
  	 $patient->ListofBadHabbits->ds->Where = "BadHabbitsTypeID NOT IN (".$LinkedBadHabbits.")";
    }  
// -------------------------
//End Custom Code

//Close patient_ListofBadHabbits_ds_BeforeBuildSelect @256-A7C2F5F4
    return $patient_ListofBadHabbits_ds_BeforeBuildSelect;
}
//End Close patient_ListofBadHabbits_ds_BeforeBuildSelect

//patient_SelectedBadHabbits_ds_BeforeBuildSelect @262-94DD5423
function patient_SelectedBadHabbits_ds_BeforeBuildSelect(& $sender)
{
    $patient_SelectedBadHabbits_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_SelectedBadHabbits_ds_BeforeBuildSelect

//Custom Code @538-2A29BDB7
// -------------------------
  	if($patient->Reloaded->GetValue() == true)
	{
		$patient->SelectedBadHabbits->DataSource->SQL = "SELECT * FROM bad_habbitstype";
  	 	$patient->SelectedBadHabbits->ds->Where = "BadHabbitsTypeID IN (".$patient->LinkedID_BadHabbits->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close patient_SelectedBadHabbits_ds_BeforeBuildSelect @262-92FE617D
    return $patient_SelectedBadHabbits_ds_BeforeBuildSelect;
}
//End Close patient_SelectedBadHabbits_ds_BeforeBuildSelect

//patient_Button_AddPreg_BeforeShow @265-EA5AF2D9
function patient_Button_AddPreg_BeforeShow(& $sender)
{
    $patient_Button_AddPreg_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_Button_AddPreg_BeforeShow

//Custom Code @267-2A29BDB7
// -------------------------
$patient->Button_UpdateAddPreg->Visible = $patient->Button_Update->Visible;
// -------------------------
//End Custom Code

//Close patient_Button_AddPreg_BeforeShow @265-7B29C5B1
    return $patient_Button_AddPreg_BeforeShow;
}
//End Close patient_Button_AddPreg_BeforeShow

//patient_Button_AddPreg_OnClick @265-4D338A2C
function patient_Button_AddPreg_OnClick(& $sender)
{
    $patient_Button_AddPreg_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_Button_AddPreg_OnClick

//Custom Code @269-2A29BDB7
// -------------------------

global $Redirect;
$Redirect = "pregnancy_maint.php?PatientID=" . $_GET["PatientID"];

// -------------------------
//End Custom Code

//Close patient_Button_AddPreg_OnClick @265-AD06DC01
    return $patient_Button_AddPreg_OnClick;
}
//End Close patient_Button_AddPreg_OnClick

//patient_BeforeDelete @33-7D7BF8D8
function patient_BeforeDelete(& $sender)
{
    $patient_BeforeDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_BeforeDelete

//Custom Code @133-2A29BDB7
// -------------------------
DiseasesModify("Delete");
// -------------------------
//End Custom Code

//Close patient_BeforeDelete @33-B343FA9B
    return $patient_BeforeDelete;
}
//End Close patient_BeforeDelete

//patient_AfterInsert @33-3AEAF9E0
function patient_AfterInsert(& $sender)
{
    $patient_AfterInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_AfterInsert

//Custom Code @134-2A29BDB7
// -------------------------
DiseasesModify("Insert");
// -------------------------
//End Custom Code

//Close patient_AfterInsert @33-6AC4FF3B
    return $patient_AfterInsert;
}
//End Close patient_AfterInsert

//patient_AfterUpdate @33-33AC39F1
function patient_AfterUpdate(& $sender)
{
    $patient_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_AfterUpdate

//Custom Code @135-2A29BDB7
// -------------------------
DiseasesModify("Update");
// -------------------------
//End Custom Code

//Close patient_AfterUpdate @33-A5ED3EB4
    return $patient_AfterUpdate;
}
//End Close patient_AfterUpdate

//patient_BeforeInsert @33-D96F1E22
function patient_BeforeInsert(& $sender)
{
    $patient_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient; //Compatibility
//End patient_BeforeInsert

//Custom Code @767-2A29BDB7
// -------------------------
    // We need to get the FacilityID of the user
	$LoginID = CCGetUserID();
	
	$registry_db = new clsDBregistry_db();

    $LocationID = CCDLookUp("LocationID", "employees", "LoginID = ".$LoginID, $registry_db);
	$FacilityID = CCDLookUp("FacilityID", "location", "LocationID = '".$LocationID."'", $registry_db);

	$patient->FacilityID->SetValue($FacilityID);

	$registry_db->close();	
// -------------------------
//End Custom Code

//Close patient_BeforeInsert @33-E04E9D65
    return $patient_BeforeInsert;
}
//End Close patient_BeforeInsert

//delivery_complications_delivery_de_TotalRecords_BeforeShow @333-AF90E1CB
function delivery_complications_delivery_de_TotalRecords_BeforeShow(& $sender)
{
    $delivery_complications_delivery_de_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_complications_delivery_de_TotalRecords_BeforeShow

//Retrieve number of records @334-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close delivery_complications_delivery_de_TotalRecords_BeforeShow @333-29B22873
    return $delivery_complications_delivery_de_TotalRecords_BeforeShow;
}
//End Close delivery_complications_delivery_de_TotalRecords_BeforeShow

//delivery_BeforeShow @317-8E7EC567
function delivery_BeforeShow(& $sender)
{
    $delivery_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_BeforeShow

//Custom Code @355-2A29BDB7
// -------------------------
	if($delivery->ds->RecordsCount < 1) {
	  	$delivery->Visible = FALSE;
	}
	else{
		$delivery->Visible = TRUE;
	}// -------------------------
//End Custom Code

//Close delivery_BeforeShow @317-67248EEC
    return $delivery_BeforeShow;
}
//End Close delivery_BeforeShow

//patient1_SelectedDiseases_ds_BeforeBuildSelect @567-FA244CCF
function patient1_SelectedDiseases_ds_BeforeBuildSelect(& $sender)
{
    $patient1_SelectedDiseases_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient1; //Compatibility
//End patient1_SelectedDiseases_ds_BeforeBuildSelect

//Custom Code @568-2A29BDB7
// -------------------------
  	if($patient1->Reloaded->GetValue() == true) // If page has been reloaded...
	{
		$patient1->SelectedDiseases->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, ' - ', DiseaseName) AS DiseaseIDName, icd10_all.* FROM icd10_all"; 
  	 	$patient1->SelectedDiseases->ds->Where = "ICD10ID IN (".$patient1->LinkedID_Allerg->GetValue().") AND RelevantAnamnesis = '1'";
	}
// -------------------------
//End Custom Code

//Close patient1_SelectedDiseases_ds_BeforeBuildSelect @567-B9DE2164
    return $patient1_SelectedDiseases_ds_BeforeBuildSelect;
}
//End Close patient1_SelectedDiseases_ds_BeforeBuildSelect

//DEL  // -------------------------
//DEL  	global $patient1;
//DEL  
//DEL      $registry_db = null;
//DEL  	$LinkedDisease = "";
//DEL  	
//DEL      //Select all projects of the currect user
//DEL      if (intval(CCGetFromGet("PatientID",0)) > 0) {
//DEL    
//DEL        //Create a new database connection object
//DEL    	  $registry_db = new clsDBregistry_db();
//DEL        $registry_db->query("SELECT ICD10ID FROM obstetric_anamnesis WHERE PatientID =".$registry_db->ToSQL(CCGetParam("PatientID",0),ccsInteger));
//DEL        while($registry_db->next_record()) {
//DEL           if($LinkedDisease != "") $LinkedDisease .= ",";
//DEL              $LinkedDisease .= "'" . $registry_db->f("ICD10ID") . "'";
//DEL        }
//DEL    
//DEL        //Destroy the database connection  object
//DEL        $registry_db->close();
//DEL     }
//DEL    	if($patient1->Reloaded->GetValue() == true) //If page has been reloaded
//DEL  	{
//DEL  		$LinkedDisease = $patient1->LinkedID_Allerg->GetValue(); //Fill temporary values
//DEL  	}
//DEL    //Modify the Where clause of the AvailableListBox List Box
//DEL    if($LinkedDisease != "") {
//DEL  	 $patient1->ListofObstetricAnamnesis->ds->Where = "ICD10ID NOT IN (".$LinkedDisease.") AND RelevantAnamnesis = '1'";
//DEL    }  
//DEL  // -------------------------

//patient1_CurrentUser_BeforeShow @589-014D0D95
function patient1_CurrentUser_BeforeShow(& $sender)
{
    $patient1_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient1; //Compatibility
//End patient1_CurrentUser_BeforeShow

//Custom Code @590-2A29BDB7
// -------------------------
	$patient1->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close patient1_CurrentUser_BeforeShow @589-2B570837
    return $patient1_CurrentUser_BeforeShow;
}
//End Close patient1_CurrentUser_BeforeShow

//DEL  // -------------------------
//DEL   $registry_db = null;
//DEL    	$LinkedBadHabbits = "";
//DEL        //Select all projects of the currect user
//DEL        if (intval(CCGetFromGet("PatientID",0)) > 0) {
//DEL      
//DEL          //Create a new database connection object
//DEL      	  $registry_db = new clsDBregistry_db();
//DEL          $registry_db->query("SELECT BadHabbitsTypeID FROM bad_habbits WHERE PatientID =".$registry_db->ToSQL(CCGetParam("PatientID",0),ccsInteger));
//DEL    	  while($registry_db->next_record()) {
//DEL             if($LinkedBadHabbits != "") $LinkedBadHabbits .= ",";
//DEL               $LinkedBadHabbits .= "'" . $registry_db->f("BadHabbitsTypeID") . "'";
//DEL          }
//DEL      
//DEL          //Destroy the database connection  object
//DEL          $registry_db->close();
//DEL       }
//DEL    	if($patient1->Reloaded->GetValue() == true) // If page has been reloaded....
//DEL  	{
//DEL  		$LinkedBadHabbits = $patient1->LinkedID_BadHabbits->GetValue(); //....Use the temprary values
//DEL  	}
//DEL      //Modify the Where clause of the AvailableListBox List Box
//DEL      if($LinkedBadHabbits != "") {
//DEL    	 $patient1->ListofBadHabbits->ds->Where = "BadHabbitsTypeID NOT IN (".$LinkedBadHabbits.")";
//DEL      }  
//DEL  // -------------------------

//patient1_SelectedBadHabbits_ds_BeforeBuildSelect @627-8ADBE8F8
function patient1_SelectedBadHabbits_ds_BeforeBuildSelect(& $sender)
{
    $patient1_SelectedBadHabbits_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient1; //Compatibility
//End patient1_SelectedBadHabbits_ds_BeforeBuildSelect

//Custom Code @628-2A29BDB7
// -------------------------
  	if($patient1->Reloaded->GetValue() == true)
	{
		$patient1->SelectedBadHabbits->DataSource->SQL = "SELECT * FROM bad_habbitstype";
  	 	$patient1->SelectedBadHabbits->ds->Where = "BadHabbitsTypeID IN (".$patient1->LinkedID_BadHabbits->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close patient1_SelectedBadHabbits_ds_BeforeBuildSelect @627-87734CB2
    return $patient1_SelectedBadHabbits_ds_BeforeBuildSelect;
}
//End Close patient1_SelectedBadHabbits_ds_BeforeBuildSelect

//patient1_Button_AddPreg_BeforeShow @635-2B290E79
function patient1_Button_AddPreg_BeforeShow(& $sender)
{
    $patient1_Button_AddPreg_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient1; //Compatibility
//End patient1_Button_AddPreg_BeforeShow

//Custom Code @636-2A29BDB7
// -------------------------
$patient1->Button_UpdateAddPreg->Visible = $patient1->Button_Update->Visible;
// -------------------------
//End Custom Code

//Close patient1_Button_AddPreg_BeforeShow @635-CD37B018
    return $patient1_Button_AddPreg_BeforeShow;
}
//End Close patient1_Button_AddPreg_BeforeShow

//patient1_Button_AddPreg_OnClick @635-862792D2
function patient1_Button_AddPreg_OnClick(& $sender)
{
    $patient1_Button_AddPreg_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient1; //Compatibility
//End patient1_Button_AddPreg_OnClick

//Custom Code @637-2A29BDB7
// -------------------------

global $Redirect;
$Redirect = "pregnancy_maint.php?PatientID=" . $_GET["PatientID"];

// -------------------------
//End Custom Code

//Close patient1_Button_AddPreg_OnClick @635-F5139C38
    return $patient1_Button_AddPreg_OnClick;
}
//End Close patient1_Button_AddPreg_OnClick

//patient1_BeforeDelete @551-2F630A7F
function patient1_BeforeDelete(& $sender)
{
    $patient1_BeforeDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient1; //Compatibility
//End patient1_BeforeDelete

//Custom Code @641-2A29BDB7
// -------------------------
DiseasesModify("Delete");
// -------------------------
//End Custom Code

//Close patient1_BeforeDelete @551-75486F8D
    return $patient1_BeforeDelete;
}
//End Close patient1_BeforeDelete

//patient1_AfterInsert @551-49734348
function patient1_AfterInsert(& $sender)
{
    $patient1_AfterInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient1; //Compatibility
//End patient1_AfterInsert

//Custom Code @642-2A29BDB7
// -------------------------
DiseasesModify("Insert");
// -------------------------
//End Custom Code

//Close patient1_AfterInsert @551-6D885B01
    return $patient1_AfterInsert;
}
//End Close patient1_AfterInsert

//patient1_AfterUpdate @551-3E373C6E
function patient1_AfterUpdate(& $sender)
{
    $patient1_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient1; //Compatibility
//End patient1_AfterUpdate

//Custom Code @643-2A29BDB7
// -------------------------
DiseasesModify("Update");
// -------------------------
//End Custom Code

//Close patient1_AfterUpdate @551-A2A19A8E
    return $patient1_AfterUpdate;
}
//End Close patient1_AfterUpdate

//patientID_BeforeShow @770-CAB82578
function patientID_BeforeShow(& $sender)
{
    $patientID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patientID; //Compatibility
//End patientID_BeforeShow

//Custom Code @776-2A29BDB7
// -------------------------
    if(CCGetFromGet("PatientID", "") == "")
		$patientID->Visible = FALSE;
// -------------------------
//End Custom Code

//Close patientID_BeforeShow @770-8468EE25
    return $patientID_BeforeShow;
}
//End Close patientID_BeforeShow

//Page_BeforeInitialize @1-EE26EA38
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient_maint; //Compatibility
//End Page_BeforeInitialize

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

function DiseasesModify($Actions){ 
global $DBregistry_db;

  $registry_db = null;
  $PatientID = 0;
  $ICD10ID = 0;
  $List_BadHabbits = array();
  $ICD10List_Allerg = array();
  $GetLastInsKey = 0;

  //Create new database  object
  $registry_db = new clsDBregistry_db();
  
  //Retrieve current patient
  $PatientID = CCGetFromGet("PatientID",0);
  $List_BadHabbits = split(",",trim(CCGetFromPost("LinkedID_BadHabbits","")));
  $ICD10List_Allerg = split(",",trim(str_replace("'","",CCGetFromPost("LinkedID_Allerg"))));

  if($Actions == "Insert"){
	//Retrieve the last inserted key
	$GetLastInsKey = CCDLookup("max(PatientID)", "patient", "", $registry_db);
   	//Insert New links
	reset($List_BadHabbits);
	while(list($key,$BadHabbitsID) = each($List_BadHabbits)) {
		 $registry_db->query("INSERT INTO bad_habbits (BadHabbitsTypeID, PatientID) VALUES (".$registry_db->ToSQL($BadHabbitsID,ccsText)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
    }
	reset($ICD10List_Allerg);
	while(list($key,$ICD10ID) = each($ICD10List_Allerg)) {
	     $registry_db->query("INSERT INTO obstetric_anamnesis (ICD10ID, PatientID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
    }
  }
  if($PatientID >0){
    if( ($Actions == "Delete") || ($Actions == "Update")) {
	   //Delete project patient links
	   $registry_db->query("DELETE FROM bad_habbits WHERE PatientID=".$registry_db->ToSQL($PatientID,ccsInteger));
	   $registry_db->query("DELETE FROM obstetric_anamnesis WHERE PatientID=".$registry_db->ToSQL($PatientID,ccsInteger));
    } 
    if($Actions == "Update"){
       //Insert assigned patient
       reset($List_BadHabbits);
	   while(list($key,$BadHabbitsID) = each($List_BadHabbits)){
			$registry_db->query("INSERT INTO bad_habbits (BadHabbitsTypeID, PatientID) VALUES (".$registry_db->ToSQL($BadHabbitsID,ccsInteger)." ,".$registry_db->ToSQL($PatientID,ccsInteger).");");
	   }
       reset($ICD10List_Allerg);
       while(list($key,$ICD10ID) = each($ICD10List_Allerg)){
            $registry_db->query("INSERT INTO obstetric_anamnesis (ICD10ID, PatientID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($PatientID,ccsInteger).");");
       }
    }
  }
  //Close and destroy the database connection object
  $registry_db->close();
  
}

?>
