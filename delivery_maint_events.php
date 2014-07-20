<?php
//BindEvents Method @1-B9EEA797
function BindEvents()
{
    global $delivery;
    global $newborn;
    global $CCSEvents;
    $delivery->Button_Update->CCSEvents["OnClick"] = "delivery_Button_Update_OnClick";
    $delivery->Button_Delete->CCSEvents["OnClick"] = "delivery_Button_Delete_OnClick";
    $delivery->Button_Cancel->CCSEvents["OnClick"] = "delivery_Button_Cancel_OnClick";
    $delivery->FacilityID->CCSEvents["BeforeShow"] = "delivery_FacilityID_BeforeShow";
    $delivery->CurrentUser->CCSEvents["BeforeShow"] = "delivery_CurrentUser_BeforeShow";
    $delivery->EmployeeID->CCSEvents["BeforeShow"] = "delivery_EmployeeID_BeforeShow";
    $delivery->ListofProcedures->ds->CCSEvents["BeforeBuildSelect"] = "delivery_ListofProcedures_ds_BeforeBuildSelect";
    $delivery->SelectedProcedures->ds->CCSEvents["BeforeBuildSelect"] = "delivery_SelectedProcedures_ds_BeforeBuildSelect";
    $delivery->ListofAnesthesia->ds->CCSEvents["BeforeBuildSelect"] = "delivery_ListofAnesthesia_ds_BeforeBuildSelect";
    $delivery->SelectedAnesthesia->ds->CCSEvents["BeforeBuildSelect"] = "delivery_SelectedAnesthesia_ds_BeforeBuildSelect";
    $delivery->ListofComplications->ds->CCSEvents["BeforeBuildSelect"] = "delivery_ListofComplications_ds_BeforeBuildSelect";
    $delivery->SelectedComplications->ds->CCSEvents["BeforeBuildSelect"] = "delivery_SelectedComplications_ds_BeforeBuildSelect";
    $delivery->ListofPComplications->ds->CCSEvents["BeforeBuildSelect"] = "delivery_ListofPComplications_ds_BeforeBuildSelect";
    $delivery->SelectedPComplications->ds->CCSEvents["BeforeExecuteSelect"] = "delivery_SelectedPComplications_ds_BeforeExecuteSelect";
    $delivery->ButtonUpdateAddNewBorn->CCSEvents["BeforeShow"] = "delivery_ButtonUpdateAddNewBorn_BeforeShow";
    $delivery->ButtonUpdateAddNewBorn->CCSEvents["OnClick"] = "delivery_ButtonUpdateAddNewBorn_OnClick";
    $delivery->NrChildren->CCSEvents["BeforeShow"] = "delivery_NrChildren_BeforeShow";
    $delivery->CCSEvents["BeforeDelete"] = "delivery_BeforeDelete";
    $delivery->CCSEvents["AfterInsert"] = "delivery_AfterInsert";
    $delivery->CCSEvents["AfterUpdate"] = "delivery_AfterUpdate";
    $newborn->newborn_TotalRecords->CCSEvents["BeforeShow"] = "newborn_newborn_TotalRecords_BeforeShow";
    $newborn->Sex->CCSEvents["BeforeShow"] = "newborn_Sex_BeforeShow";
    $newborn->CCSEvents["BeforeShow"] = "newborn_BeforeShow";
}
//End BindEvents Method


function redirectUpdateDeleteCancel()
{
	$hospitalisationID = $_GET["HospitalisationID"];

	global $Redirect;

	if (!empty($hospitalisationID))  //we only have to add the Hospitalisation ID to the visit if has Visit ID on the page parameters (it means it is a Visit Outcome)
		$Redirect = "hospitalisation_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"]  . "&HospitalisationID=" . $hospitalisationID;	
	else
		$Redirect = "pregnancy_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"];	
}

//delivery_Button_Update_OnClick @237-6A13E07D
function delivery_Button_Update_OnClick(& $sender)
{
    $delivery_Button_Update_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_Button_Update_OnClick

//Custom Code @392-2A29BDB7
// -------------------------
    redirectUpdateDeleteCancel();
// -------------------------
//End Custom Code

//Close delivery_Button_Update_OnClick @237-33B38121
    return $delivery_Button_Update_OnClick;
}
//End Close delivery_Button_Update_OnClick

//delivery_Button_Delete_OnClick @238-25EBC5B7
function delivery_Button_Delete_OnClick(& $sender)
{
    $delivery_Button_Delete_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_Button_Delete_OnClick

//Custom Code @393-2A29BDB7
// -------------------------
    redirectUpdateDeleteCancel();
// -------------------------
//End Custom Code

//Close delivery_Button_Delete_OnClick @238-FFF97B4A
    return $delivery_Button_Delete_OnClick;
}
//End Close delivery_Button_Delete_OnClick

//delivery_Button_Cancel_OnClick @8-AD4B3554
function delivery_Button_Cancel_OnClick(& $sender)
{
    $delivery_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_Button_Cancel_OnClick

//Custom Code @394-2A29BDB7
// -------------------------
    redirectUpdateDeleteCancel();
// -------------------------
//End Custom Code

//Close delivery_Button_Cancel_OnClick @8-2507623A
    return $delivery_Button_Cancel_OnClick;
}
//End Close delivery_Button_Cancel_OnClick

//delivery_FacilityID_BeforeShow @11-99D9B724
function delivery_FacilityID_BeforeShow(& $sender)
{
    $delivery_FacilityID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_FacilityID_BeforeShow

//Custom Code @471-2A29BDB7
// -------------------------
   if(CCGetFromGet("DeliveryID", "") == "") // only if it is a new visit being added
	{
		$LoginID = CCGetUserID();
		$registry_db = new clsDBregistry_db();
  		$Facility = CCDLookup("facilities.FacilityID", "((facilities INNER JOIN location ON facilities.FacilityID = location.FacilityID) INNER JOIN employees ON employees.LocationID = location.LocationID) INNER JOIN login ON login.LoginID = employees.LoginID", "login.LoginID = ".$LoginID, $registry_db);
		$registry_db->close();
		$delivery->FacilityID->SetValue($Facility);
	}
// -------------------------
//End Custom Code

//Close delivery_FacilityID_BeforeShow @11-AC9304BD
    return $delivery_FacilityID_BeforeShow;
}
//End Close delivery_FacilityID_BeforeShow

//delivery_CurrentUser_BeforeShow @22-5F1C2A07
function delivery_CurrentUser_BeforeShow(& $sender)
{
    $delivery_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_CurrentUser_BeforeShow

//Custom Code @23-2A29BDB7
// -------------------------
	$delivery->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close delivery_CurrentUser_BeforeShow @22-C0868705
    return $delivery_CurrentUser_BeforeShow;
}
//End Close delivery_CurrentUser_BeforeShow

//delivery_EmployeeID_BeforeShow @30-50840861
function delivery_EmployeeID_BeforeShow(& $sender)
{
    $delivery_EmployeeID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_EmployeeID_BeforeShow

//Close delivery_EmployeeID_BeforeShow @30-78E3AD49
    return $delivery_EmployeeID_BeforeShow;
}
//End Close delivery_EmployeeID_BeforeShow

//delivery_ListofProcedures_ds_BeforeBuildSelect @59-F5114D9D
function delivery_ListofProcedures_ds_BeforeBuildSelect(& $sender)
{
    $delivery_ListofProcedures_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_ListofProcedures_ds_BeforeBuildSelect

//Custom Code @60-2A29BDB7
// -------------------------
    $registry_db = null;
  	$LinkedProcedures = "";
  	
      //Select all projects of the currect user
      if (intval(CCGetFromGet("DeliveryID",0)) > 0) {
    
        //Create a new database connection object
    	  $registry_db = new clsDBregistry_db();
        $registry_db->query("SELECT ProcedureTypeID FROM procedures WHERE DeliveryID =".$registry_db->ToSQL(CCGetParam("DeliveryID",0),ccsInteger));
  	  while($registry_db->next_record()) {
           if($LinkedProcedures != "") $LinkedProcedures .= ",";
              $LinkedProcedures .= "'" . $registry_db->f("ProcedureTypeID") . "'";
        }
    
        //Destroy the database connection  object
        $registry_db->close();
     }

   	if($delivery->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$LinkedProcedures = $delivery->LinkedID_Procedures->GetValue(); //Fill temporary values
	}
  
    //Modify the Where clause of the AvailableListBox List Box
    if($LinkedProcedures != "") {
  	 $delivery->ListofProcedures->ds->Where = "ProcedureTypeID NOT IN (".$LinkedProcedures.")";
    }  
// -------------------------
//End Custom Code

//Close delivery_ListofProcedures_ds_BeforeBuildSelect @59-84F57F25
    return $delivery_ListofProcedures_ds_BeforeBuildSelect;
}
//End Close delivery_ListofProcedures_ds_BeforeBuildSelect

//delivery_SelectedProcedures_ds_BeforeBuildSelect @68-68F50D7A
function delivery_SelectedProcedures_ds_BeforeBuildSelect(& $sender)
{
    $delivery_SelectedProcedures_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_SelectedProcedures_ds_BeforeBuildSelect

//Custom Code @400-2A29BDB7
// -------------------------
  	if($delivery->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$delivery->SelectedProcedures->DataSource->SQL = "SELECT *, CONCAT(ProcedureTypeID, ' - ', ProcedureName) AS ProcedureIDName FROM proceduretype"; 
  	 	$delivery->SelectedProcedures->ds->Where = "ProcedureTypeID IN (".$delivery->LinkedID_Procedures->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close delivery_SelectedProcedures_ds_BeforeBuildSelect @68-366ABC8F
    return $delivery_SelectedProcedures_ds_BeforeBuildSelect;
}
//End Close delivery_SelectedProcedures_ds_BeforeBuildSelect

//delivery_ListofAnesthesia_ds_BeforeBuildSelect @256-C696C642
function delivery_ListofAnesthesia_ds_BeforeBuildSelect(& $sender)
{
    $delivery_ListofAnesthesia_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_ListofAnesthesia_ds_BeforeBuildSelect

//Custom Code @257-2A29BDB7
// -------------------------
 $registry_db = null;
  	$LinkedAnesthesia = "";
  	
      //Select all projects of the currect user
      if (intval(CCGetFromGet("DeliveryID",0)) > 0) {
    
        //Create a new database connection object
    	  $registry_db = new clsDBregistry_db();
        $registry_db->query("SELECT AnesthesiaTypeID FROM anesthesia WHERE DeliveryID =".$registry_db->ToSQL(CCGetParam("DeliveryID",0),ccsInteger));
  	  while($registry_db->next_record()) {
           if($LinkedAnesthesia != "") $LinkedAnesthesia .= ",";
              $LinkedAnesthesia .= "'" . $registry_db->f("AnesthesiaTypeID") . "'";
        }
    
        //Destroy the database connection  object
        $registry_db->close();
     }
   	if($delivery->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$LinkedAnesthesia = $delivery->LinkedID_Anesthesia->GetValue(); //Fill temporary values
	}
  
    //Modify the Where clause of the AvailableListBox List Box
    if($LinkedAnesthesia != "") {
  	 $delivery->ListofAnesthesia->ds->Where = "AnesthesiaTypeID NOT IN (".$LinkedAnesthesia.")";
    }  
// -------------------------
//End Custom Code

//Close delivery_ListofAnesthesia_ds_BeforeBuildSelect @256-D82F28DA
    return $delivery_ListofAnesthesia_ds_BeforeBuildSelect;
}
//End Close delivery_ListofAnesthesia_ds_BeforeBuildSelect

//delivery_SelectedAnesthesia_ds_BeforeBuildSelect @262-9C33C7EE
function delivery_SelectedAnesthesia_ds_BeforeBuildSelect(& $sender)
{
    $delivery_SelectedAnesthesia_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_SelectedAnesthesia_ds_BeforeBuildSelect

//Custom Code @397-2A29BDB7
// -------------------------
  	if($delivery->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$delivery->SelectedAnesthesia->DataSource->SQL = "SELECT * FROM anesthesiatype "; 
  	 	$delivery->SelectedAnesthesia->ds->Where = "AnesthesiaTypeID IN (".$delivery->LinkedID_Anesthesia->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close delivery_SelectedAnesthesia_ds_BeforeBuildSelect @262-6AB0EB70
    return $delivery_SelectedAnesthesia_ds_BeforeBuildSelect;
}
//End Close delivery_SelectedAnesthesia_ds_BeforeBuildSelect

//delivery_ListofComplications_ds_BeforeBuildSelect @42-A63656F8
function delivery_ListofComplications_ds_BeforeBuildSelect(& $sender)
{
    $delivery_ListofComplications_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_ListofComplications_ds_BeforeBuildSelect

//Custom Code @43-2A29BDB7
// -------------------------
    $registry_db = null;
  	$LinkedComplications = "";
  	
      //Select all projects of the currect user
      if (intval(CCGetFromGet("DeliveryID",0)) > 0) {
    
        //Create a new database connection object
    	  $registry_db = new clsDBregistry_db();
        $registry_db->query("SELECT ICD10ID FROM complications WHERE DeliveryID =".$registry_db->ToSQL(CCGetParam("DeliveryID",0),ccsInteger));
		while($registry_db->next_record()) {
           if($LinkedComplications != "") $LinkedComplications .= ",";
              $LinkedComplications .= "'" . $registry_db->f("ICD10ID") . "'";
        }
    
        //Destroy the database connection  object
        $registry_db->close();
     }
   	if($delivery->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$LinkedComplications = $delivery->LinkedID_Comp->GetValue(); //Fill temporary values
	}
 
    //Modify the Where clause of the AvailableListBox List Box
    if($LinkedComplications != "") {
  	 $delivery->ListofComplications->ds->Where = "ICD10ID NOT IN (".$LinkedComplications.") AND ICD10_class = 'O'";
	}  
// -------------------------
//End Custom Code

//Close delivery_ListofComplications_ds_BeforeBuildSelect @42-EDB5669B
    return $delivery_ListofComplications_ds_BeforeBuildSelect;
}
//End Close delivery_ListofComplications_ds_BeforeBuildSelect

//delivery_SelectedComplications_ds_BeforeBuildSelect @52-E9742970
function delivery_SelectedComplications_ds_BeforeBuildSelect(& $sender)
{
    $delivery_SelectedComplications_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_SelectedComplications_ds_BeforeBuildSelect

//Custom Code @398-2A29BDB7
// -------------------------
  	if($delivery->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$delivery->SelectedComplications->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, ' - ', DiseaseName) AS DiseaseIDName, icd10_all.* FROM icd10_all"; 
  	 	$delivery->SelectedComplications->ds->Where = "ICD10ID IN (".$delivery->LinkedID_Comp->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close delivery_SelectedComplications_ds_BeforeBuildSelect @52-B93DB4C7
    return $delivery_SelectedComplications_ds_BeforeBuildSelect;
}
//End Close delivery_SelectedComplications_ds_BeforeBuildSelect

//delivery_ListofPComplications_ds_BeforeBuildSelect @335-6665983E
function delivery_ListofPComplications_ds_BeforeBuildSelect(& $sender)
{
    $delivery_ListofPComplications_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_ListofPComplications_ds_BeforeBuildSelect

//Custom Code @336-2A29BDB7
// -------------------------
    $registry_db = null;
  	$LinkedPComplications = "";
  	
      //Select all projects of the currect user
      if (intval(CCGetFromGet("DeliveryID",0)) > 0) {
    
        //Create a new database connection object
    	  $registry_db = new clsDBregistry_db();
        $registry_db->query("SELECT ICD10ID FROM pcomplications WHERE DeliveryID =".$registry_db->ToSQL(CCGetParam("DeliveryID",0),ccsInteger));
		while($registry_db->next_record()) {
           if($LinkedPComplications != "") $LinkedPComplications .= ",";
              $LinkedPComplications .= "'" . $registry_db->f("ICD10ID") . "'";
        }
    
        //Destroy the database connection  object
        $registry_db->close();
     }

   	if($delivery->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$LinkedPComplications = $delivery->LinkedID_PComp->GetValue(); //Fill temporary values
	}
  
    //Modify the Where clause of the AvailableListBox List Box
    if($LinkedPComplications != "") {
  	 $delivery->ListofPComplications->ds->Where = "ICD10ID NOT IN (".$LinkedPComplications.") AND ICD10_class = 'O'";
	}  
// -------------------------
//End Custom Code

//Close delivery_ListofPComplications_ds_BeforeBuildSelect @335-B4C4D88A
    return $delivery_ListofPComplications_ds_BeforeBuildSelect;
}
//End Close delivery_ListofPComplications_ds_BeforeBuildSelect

//delivery_SelectedPComplications_ds_BeforeExecuteSelect @345-51ED47FD
function delivery_SelectedPComplications_ds_BeforeExecuteSelect(& $sender)
{
    $delivery_SelectedPComplications_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_SelectedPComplications_ds_BeforeExecuteSelect

//Custom Code @396-2A29BDB7
// -------------------------
  	if($delivery->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$delivery->SelectedPComplications->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, ' - ', DiseaseName) AS DiseaseIDName, icd10_all.* FROM icd10_all"; 
  	 	$delivery->SelectedPComplications->ds->Where = "ICD10ID IN (".$delivery->LinkedID_PComp->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close delivery_SelectedPComplications_ds_BeforeExecuteSelect @345-D80F1E37
    return $delivery_SelectedPComplications_ds_BeforeExecuteSelect;
}
//End Close delivery_SelectedPComplications_ds_BeforeExecuteSelect

//delivery_ButtonUpdateAddNewBorn_BeforeShow @152-16F00D7F
function delivery_ButtonUpdateAddNewBorn_BeforeShow(& $sender)
{
    $delivery_ButtonUpdateAddNewBorn_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_ButtonUpdateAddNewBorn_BeforeShow

//Custom Code @153-2A29BDB7
// -------------------------
$delivery->Button_UpdateAddNewBorn->Visible = $delivery->Button_Update->Visible;
// -------------------------
//End Custom Code

//Close delivery_ButtonUpdateAddNewBorn_BeforeShow @152-9FA728DD
    return $delivery_ButtonUpdateAddNewBorn_BeforeShow;
}
//End Close delivery_ButtonUpdateAddNewBorn_BeforeShow

//delivery_ButtonUpdateAddNewBorn_OnClick @152-D676900F
function delivery_ButtonUpdateAddNewBorn_OnClick(& $sender)
{
    $delivery_ButtonUpdateAddNewBorn_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_ButtonUpdateAddNewBorn_OnClick

//Custom Code @154-2A29BDB7
// -------------------------
	global $Redirect;
	$Redirect = "newborn_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"] . "&DeliveryID=" . $_GET["DeliveryID"];
// -------------------------
//End Custom Code

//Close delivery_ButtonUpdateAddNewBorn_OnClick @152-1F8E36EF
    return $delivery_ButtonUpdateAddNewBorn_OnClick;
}
//End Close delivery_ButtonUpdateAddNewBorn_OnClick

//DEL  // -------------------------
//DEL  // -------------------------

//delivery_NrChildren_BeforeShow @447-8C3B93F4
function delivery_NrChildren_BeforeShow(& $sender)
{
    $delivery_NrChildren_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_NrChildren_BeforeShow

//Custom Code @448-2A29BDB7
// -------------------------
    $registry_db = new clsDBregistry_db();
	$delivery->NrChildren->SetValue(CCDLookUp("PregnancyTypeID", "pregnancy", "PregnancyID = ".CCGetFromGet("PregnancyID",0), $registry_db));
	$registry_db->close();
// -------------------------
//End Custom Code

//Close delivery_NrChildren_BeforeShow @447-8B93D5A0
    return $delivery_NrChildren_BeforeShow;
}
//End Close delivery_NrChildren_BeforeShow

//delivery_BeforeDelete @234-9FDC1AC3
function delivery_BeforeDelete(& $sender)
{
    $delivery_BeforeDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_BeforeDelete

//Custom Code @249-2A29BDB7
// -------------------------
ListsModify("Delete");
// -------------------------
//End Custom Code

//Close delivery_BeforeDelete @234-F14BD0B8
    return $delivery_BeforeDelete;
}
//End Close delivery_BeforeDelete

//delivery_AfterInsert @234-FEA801B7
function delivery_AfterInsert(& $sender)
{
    $delivery_AfterInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_AfterInsert

//Custom Code @250-2A29BDB7
// -------------------------
ListsModify("Insert");
// -------------------------
//End Custom Code

//Close delivery_AfterInsert @234-D076B012
    return $delivery_AfterInsert;
}
//End Close delivery_AfterInsert

//delivery_AfterUpdate @234-89EC7E91
function delivery_AfterUpdate(& $sender)
{
    $delivery_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_AfterUpdate

//Custom Code @251-2A29BDB7
// -------------------------
ListsModify("Update");
// -------------------------
//End Custom Code

//Close delivery_AfterUpdate @234-1F5F719D
    return $delivery_AfterUpdate;
}
//End Close delivery_AfterUpdate

//newborn_newborn_TotalRecords_BeforeShow @373-78EFFAAF
function newborn_newborn_TotalRecords_BeforeShow(& $sender)
{
    $newborn_newborn_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_newborn_TotalRecords_BeforeShow

//Retrieve number of records @374-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close newborn_newborn_TotalRecords_BeforeShow @373-84F19644
    return $newborn_newborn_TotalRecords_BeforeShow;
}
//End Close newborn_newborn_TotalRecords_BeforeShow

//newborn_Sex_BeforeShow @379-DAD8388A
function newborn_Sex_BeforeShow(& $sender)
{
    $newborn_Sex_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_Sex_BeforeShow

//Custom Code @435-2A29BDB7
// -------------------------
	// male/female symbols
	global $CCSLocales;
		
	if($newborn->Sex->GetValue() == 0)
		$newborn->Sex->SetValue($CCSLocales->GetText("Woman"));
	else if($newborn->Sex->GetValue() == 1)
		$newborn->Sex->SetValue($CCSLocales->GetText("Man"));
// -------------------------
//End Custom Code

//Close newborn_Sex_BeforeShow @379-94690439
    return $newborn_Sex_BeforeShow;
}
//End Close newborn_Sex_BeforeShow

//newborn_BeforeShow @357-E9C38B67
function newborn_BeforeShow(& $sender)
{
    $newborn_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_BeforeShow

//Custom Code @391-2A29BDB7
// -------------------------
	if($newborn->ds->RecordsCount < 1) {
	  	$newborn->Visible = FALSE;
	}
	else{
		$newborn->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close newborn_BeforeShow @357-0BA6ECB0
    return $newborn_BeforeShow;
}
//End Close newborn_BeforeShow

//Page_BeforeInitialize @1-8E8BB7BB
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_maint; //Compatibility
//End Page_BeforeInitialize

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

// ÐŸÑÐ¾Ð±ÑƒÑ  Ð²Ð¸Ð¿ÑÐ°Ð²Ð¸Ñ‚Ð¸
function ListsModify($Actions){ 
global $DBregistry_db;

  $registry_db = null;
  $PatientID = 0;
  $ICD10ID = 0;
  $ProceduresID = 0;
  $AnesthesiaID = 0;
  $ICD10List_Comp = array();
  $ICD10List_PComp = array();
  $ListProcedures = array();
  $ListAnesthesia = array();
  $GetLastInsKey = 0;

  //Create new database  object
  $registry_db = new clsDBregistry_db();
  
  //Retrieve current patient
  $DeliveryID = CCGetFromGet("DeliveryID",0);
  $ICD10List_Comp = split(",",trim(str_replace("'","",CCGetFromPost("LinkedID_Comp"))));
  $ICD10List_PComp = split(",",trim(str_replace("'","",CCGetFromPost("LinkedID_PComp"))));
  $ListProcedures = split(",",trim(str_replace("'","",CCGetFromPost("LinkedID_Procedures"))));
  $ListAnesthesia = split(",",trim(CCGetFromPost("LinkedID_Anesthesia","")));

  if($Actions == "Insert"){
	//Retrieve the last inserted key
	$GetLastInsKey = CCDLookup("max(DeliveryID)", "delivery", "", $registry_db);
   	//Insert New links
	reset($ICD10List_Comp);
	while(list($key,$ICD10ID) = each($ICD10List_Comp)) {
		 $registry_db->query("INSERT INTO complications (ICD10ID, DeliveryID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
	}
    reset($ICD10List_PComp);
	while(list($key,$ICD10ID) = each($ICD10List_PComp)) {
		 $registry_db->query("INSERT INTO pcomplications (ICD10ID, DeliveryID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
	}
	reset($ListProcedures);
	while(list($key,$ProceduresID) = each($ListProcedures)) {
	     $registry_db->query("INSERT INTO procedures (ProcedureTypeID, DeliveryID) VALUES (".$registry_db->ToSQL($ProceduresID,ccsInteger)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
    }
	reset($ListAnesthesia);
	while(list($key,$AnesthesiaID) = each($ListAnesthesia)) {
	     $registry_db->query("INSERT INTO anesthesia (AnesthesiaTypeID, DeliveryID) VALUES (".$registry_db->ToSQL($AnesthesiaID,ccsInteger)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
    }
  }
  if($DeliveryID >0){
    if( ($Actions == "Delete") || ($Actions == "Update")) {
	   //Delete project patient links
	   $registry_db->query("DELETE FROM complications WHERE DeliveryID=".$registry_db->ToSQL($DeliveryID,ccsInteger));
	   $registry_db->query("DELETE FROM pcomplications WHERE DeliveryID=".$registry_db->ToSQL($DeliveryID,ccsInteger));
	   $registry_db->query("DELETE FROM procedures WHERE DeliveryID=".$registry_db->ToSQL($DeliveryID,ccsInteger));
	   $registry_db->query("DELETE FROM anesthesia WHERE DeliveryID=".$registry_db->ToSQL($DeliveryID,ccsInteger));
    } 
    if($Actions == "Update"){
       //Insert assigned patient
       reset($ICD10List_Comp);
	   while(list($key,$ICD10ID) = each($ICD10List_Comp)){
			$registry_db->query("INSERT INTO complications (ICD10ID, DeliveryID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($DeliveryID,ccsInteger).");");
       }
        reset($ICD10List_PComp);
	   while(list($key,$ICD10ID) = each($ICD10List_PComp)){
			$registry_db->query("INSERT INTO pcomplications (ICD10ID, DeliveryID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($DeliveryID,ccsInteger).");");
       }

       reset($ListProcedures);
       while(list($key,$ProceduresID) = each($ListProcedures)){
            $registry_db->query("INSERT INTO procedures (ProcedureTypeID, DeliveryID) VALUES (".$registry_db->ToSQL($ProceduresID,ccsText)." ,".$registry_db->ToSQL($DeliveryID,ccsInteger).");");
       }
	          reset($ListAnesthesia);
       while(list($key,$AnesthesiaID) = each($ListAnesthesia)){
            $registry_db->query("INSERT INTO anesthesia (AnesthesiaTypeID, DeliveryID) VALUES (".$registry_db->ToSQL($AnesthesiaID,ccsInteger)." ,".$registry_db->ToSQL($DeliveryID,ccsInteger).");");
       }
    }
  }
  //Close and destroy the database connection object
  $registry_db->close();
}
?>