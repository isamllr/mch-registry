<?php
//BindEvents Method @1-70AEDF60
function BindEvents()
{
    global $newborn;
    $newborn->Button_Update->CCSEvents["OnClick"] = "newborn_Button_Update_OnClick";
    $newborn->Button_Delete->CCSEvents["OnClick"] = "newborn_Button_Delete_OnClick";
    $newborn->Button_Cancel->CCSEvents["OnClick"] = "newborn_Button_Cancel_OnClick";
    $newborn->SelectedClinicalDiagnosis->ds->CCSEvents["BeforeBuildSelect"] = "newborn_SelectedClinicalDiagnosis_ds_BeforeBuildSelect";
    $newborn->ListofClinicalTests->ds->CCSEvents["BeforeBuildSelect"] = "newborn_ListofClinicalTests_ds_BeforeBuildSelect";
    $newborn->SelectedClinicalTests->ds->CCSEvents["BeforeBuildSelect"] = "newborn_SelectedClinicalTests_ds_BeforeBuildSelect";
    $newborn->ListofAnatomicPathology->ds->CCSEvents["BeforeBuildSelect"] = "newborn_ListofAnatomicPathology_ds_BeforeBuildSelect";
    $newborn->SelectedAnatomicPathology->ds->CCSEvents["BeforeBuildSelect"] = "newborn_SelectedAnatomicPathology_ds_BeforeBuildSelect";
    $newborn->CurrentUser->CCSEvents["BeforeShow"] = "newborn_CurrentUser_BeforeShow";
    $newborn->ListofClinicalDiagnosis->ds->CCSEvents["BeforeBuildSelect"] = "newborn_ListofClinicalDiagnosis_ds_BeforeBuildSelect";
    $newborn->NewBornN->CCSEvents["BeforeShow"] = "newborn_NewBornN_BeforeShow";
    $newborn->CCSEvents["AfterInsert"] = "newborn_AfterInsert";
    $newborn->CCSEvents["AfterUpdate"] = "newborn_AfterUpdate";
    $newborn->CCSEvents["BeforeSelect"] = "newborn_BeforeSelect";
}
//End BindEvents Method

//newborn_Button_Update_OnClick @5-0852FCDE
function newborn_Button_Update_OnClick(& $sender)
{
    $newborn_Button_Update_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_Button_Update_OnClick

//Custom Code @265-2A29BDB7
// -------------------------
    returnPage();
// -------------------------
//End Custom Code

//Close newborn_Button_Update_OnClick @5-5BE287B2
    return $newborn_Button_Update_OnClick;
}
//End Close newborn_Button_Update_OnClick

//newborn_Button_Delete_OnClick @6-F3364E6D
function newborn_Button_Delete_OnClick(& $sender)
{
    $newborn_Button_Delete_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_Button_Delete_OnClick

//Custom Code @266-2A29BDB7
// -------------------------
    returnPage();
// -------------------------
//End Custom Code

//Close newborn_Button_Delete_OnClick @6-97A87DD9
    return $newborn_Button_Delete_OnClick;
}
//End Close newborn_Button_Delete_OnClick

//newborn_Button_Cancel_OnClick @8-259EE54A
function newborn_Button_Cancel_OnClick(& $sender)
{
    $newborn_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_Button_Cancel_OnClick

//Custom Code @267-2A29BDB7
// -------------------------
    returnPage();
// -------------------------
//End Custom Code

//Close newborn_Button_Cancel_OnClick @8-4D5664A9
    return $newborn_Button_Cancel_OnClick;
}
//End Close newborn_Button_Cancel_OnClick

//newborn_SelectedClinicalDiagnosis_ds_BeforeBuildSelect @121-BB655CB8
function newborn_SelectedClinicalDiagnosis_ds_BeforeBuildSelect(& $sender)
{
    $newborn_SelectedClinicalDiagnosis_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_SelectedClinicalDiagnosis_ds_BeforeBuildSelect

//Custom Code @209-2A29BDB7
// -------------------------
  	if($newborn->Reloaded->GetValue() == true)
	{
		$newborn->SelectedClinicalDiagnosis->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, ' - ', DiseaseName) AS DiseaseIDName FROM icd10_all"; 
  	 	$newborn->SelectedClinicalDiagnosis->ds->Where = "ICD10ID IN (".$newborn->LinkedID_ClinicalDiagnosis->GetValue().") AND (ICD10_class = 'P' OR ICD10_class = 'Q')";
	}
// -------------------------
//End Custom Code

//Close newborn_SelectedClinicalDiagnosis_ds_BeforeBuildSelect @121-BD3BE602
    return $newborn_SelectedClinicalDiagnosis_ds_BeforeBuildSelect;
}
//End Close newborn_SelectedClinicalDiagnosis_ds_BeforeBuildSelect

//newborn_ListofClinicalTests_ds_BeforeBuildSelect @162-4D0B0B2C
function newborn_ListofClinicalTests_ds_BeforeBuildSelect(& $sender)
{
    $newborn_ListofClinicalTests_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_ListofClinicalTests_ds_BeforeBuildSelect

//Custom Code @163-2A29BDB7
// -------------------------
  $registry_db = null;
  	$LinkedClinicalTests = "";
  	
      //Select all projects of the currect user
      if (intval(CCGetFromGet("NewBornID",0)) > 0) {
    
        //Create a new database connection object
    	  $registry_db = new clsDBregistry_db();
        $registry_db->query("SELECT ClinicalTestsID FROM clinical WHERE NewBornID =".$registry_db->ToSQL(CCGetParam("NewBornID",0),ccsInteger));
  	  while($registry_db->next_record()) {
           if($LinkedClinicalTests != "") $LinkedClinicalTests .= ",";
              $LinkedClinicalTests .= "'" . $registry_db->f("ClinicalTestsID") . "'";
        }
    
        //Destroy the database connection  object
        $registry_db->close();
     }
  	if($newborn->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$LinkedClinicalTests = $newborn->LinkedID_ClinicalTests->GetValue(); //Fill temporary values
	}
  
    //Modify the Where clause of the AvailableListBox List Box
    if($LinkedClinicalTests != "") {
  	 $newborn->ListofClinicalTests->ds->Where = "ClinicalTestsID NOT IN (".$LinkedClinicalTests.")";
    }  
// -------------------------
//End Custom Code

//Close newborn_ListofClinicalTests_ds_BeforeBuildSelect @162-F8C95C73
    return $newborn_ListofClinicalTests_ds_BeforeBuildSelect;
}
//End Close newborn_ListofClinicalTests_ds_BeforeBuildSelect

//newborn_SelectedClinicalTests_ds_BeforeBuildSelect @172-CFBA27F9
function newborn_SelectedClinicalTests_ds_BeforeBuildSelect(& $sender)
{
    $newborn_SelectedClinicalTests_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_SelectedClinicalTests_ds_BeforeBuildSelect

//Custom Code @210-2A29BDB7
// -------------------------
  	if($newborn->Reloaded->GetValue() == true)
	{
		$newborn->SelectedClinicalTests->DataSource->SQL = "SELECT * FROM clinical_tests "; 
  	 	$newborn->SelectedClinicalTests->ds->Where = "ClinicalTestsID IN (".$newborn->LinkedID_ClinicalTests->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close newborn_SelectedClinicalTests_ds_BeforeBuildSelect @172-F083D304
    return $newborn_SelectedClinicalTests_ds_BeforeBuildSelect;
}
//End Close newborn_SelectedClinicalTests_ds_BeforeBuildSelect

//newborn_ListofAnatomicPathology_ds_BeforeBuildSelect @140-C7E4CD04
function newborn_ListofAnatomicPathology_ds_BeforeBuildSelect(& $sender)
{
    $newborn_ListofAnatomicPathology_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_ListofAnatomicPathology_ds_BeforeBuildSelect

//Custom Code @141-2A29BDB7
// -------------------------
    $registry_db = null;
  	$LinkedAnatomicPathology = "";
  	
      //Select all projects of the currect user
      if (intval(CCGetFromGet("NewBornID",0)) > 0) {
    
        //Create a new database connection object
    	  $registry_db = new clsDBregistry_db();
        $registry_db->query("SELECT ICD10ID FROM anatomic_path WHERE NewBornID =".$registry_db->ToSQL(CCGetParam("NewBornID",0),ccsInteger));
		while($registry_db->next_record()) {
           if($LinkedAnatomicPathology != "") $LinkedAnatomicPathology .= ",";
              $LinkedAnatomicPathology .= "'" . $registry_db->f("ICD10ID") . "'";
        }
    
        //Destroy the database connection  object
        $registry_db->close();
     }

  	if($newborn->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$LinkedAnatomicPathology = $newborn->LinkedID_AnatomicPathology->GetValue(); //Fill temporary values
	}

    //Modify the Where clause of the AvailableListBox List Box
    if($LinkedAnatomicPathology != "") {
  	 $newborn->ListofAnatomicPathology->ds->Where = "ICD10ID NOT IN (".$LinkedAnatomicPathology.") AND (ICD10_class = 'P' OR ICD10_class = 'Q')";
	}  
// -------------------------
//End Custom Code

//Close newborn_ListofAnatomicPathology_ds_BeforeBuildSelect @140-630F59F1
    return $newborn_ListofAnatomicPathology_ds_BeforeBuildSelect;
}
//End Close newborn_ListofAnatomicPathology_ds_BeforeBuildSelect

//newborn_SelectedAnatomicPathology_ds_BeforeBuildSelect @150-6EA4A448
function newborn_SelectedAnatomicPathology_ds_BeforeBuildSelect(& $sender)
{
    $newborn_SelectedAnatomicPathology_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_SelectedAnatomicPathology_ds_BeforeBuildSelect

//Custom Code @211-2A29BDB7
// -------------------------
  	if($newborn->Reloaded->GetValue() == true)
	{
		$newborn->SelectedAnatomicPathology->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, ' - ', DiseaseName) AS DiseaseIDName FROM icd10_all"; 
  	 	$newborn->SelectedAnatomicPathology->ds->Where = "ICD10ID IN (".$newborn->LinkedID_AnatomicPathology->GetValue().")";
	}
// -------------------------
//End Custom Code

//Close newborn_SelectedAnatomicPathology_ds_BeforeBuildSelect @150-7BC3B2D4
    return $newborn_SelectedAnatomicPathology_ds_BeforeBuildSelect;
}
//End Close newborn_SelectedAnatomicPathology_ds_BeforeBuildSelect

//newborn_CurrentUser_BeforeShow @83-BD7428AB
function newborn_CurrentUser_BeforeShow(& $sender)
{
    $newborn_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_CurrentUser_BeforeShow

//Custom Code @214-2A29BDB7
// -------------------------
	$newborn->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close newborn_CurrentUser_BeforeShow @83-A9E814FD
    return $newborn_CurrentUser_BeforeShow;
}
//End Close newborn_CurrentUser_BeforeShow

//newborn_ListofClinicalDiagnosis_ds_BeforeBuildSelect @115-F40E1FD8
function newborn_ListofClinicalDiagnosis_ds_BeforeBuildSelect(& $sender)
{
    $newborn_ListofClinicalDiagnosis_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_ListofClinicalDiagnosis_ds_BeforeBuildSelect

//Custom Code @116-2A29BDB7
// -------------------------
    $registry_db = null;
  	$LinkedClinicalDiagnosis = "";
  	
      //Select all projects of the currect user
      if (intval(CCGetFromGet("NewBornID",0)) > 0) {
    
        //Create a new database connection object
    	  $registry_db = new clsDBregistry_db();
        $registry_db->query("SELECT ICD10ID FROM clinical_diagn WHERE NewBornID =".$registry_db->ToSQL(CCGetParam("NewBornID",0),ccsInteger));
		while($registry_db->next_record()) {
           if($LinkedClinicalDiagnosis != "") $LinkedClinicalDiagnosis .= ",";
              $LinkedClinicalDiagnosis .= "'" . $registry_db->f("ICD10ID") . "'";
        }
        //Destroy the database connection  object
        $registry_db->close();
     }
  	if($newborn->Reloaded->GetValue() == true) //If page has been reloaded
	{
		$LinkedClinicalDiagnosis = $newborn->LinkedID_ClinicalDiagnosis->GetValue(); //Fill temporary values
	}
  
    //Modify the Where clause of the AvailableListBox List Box
    if($LinkedClinicalDiagnosis != "") {
  	 $newborn->ListofClinicalDiagnosis->ds->Where = "ICD10ID NOT IN (".$LinkedClinicalDiagnosis.") AND (ICD10_class = 'P' OR ICD10_class = 'Q')";
	}
// -------------------------
//End Custom Code

//Close newborn_ListofClinicalDiagnosis_ds_BeforeBuildSelect @115-A5F70D27
    return $newborn_ListofClinicalDiagnosis_ds_BeforeBuildSelect;
}
//End Close newborn_ListofClinicalDiagnosis_ds_BeforeBuildSelect

//newborn_NewBornN_BeforeShow @10-D0C9034A
function newborn_NewBornN_BeforeShow(& $sender)
{
    $newborn_NewBornN_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_NewBornN_BeforeShow

//Custom Code @272-2A29BDB7
// -------------------------
    $newbornID = CCGetFromGet("NewBornID",0);
	
	// by default, newborn should have the same number as delivery
	if($newbornID == 0)
	{
		$deliveryID = CCGetFromGet("DeliveryID",0);
		$registry_db = new clsDBregistry_db();
		$newborn->NewBornN->SetText(CCDLookup("NumberOfDelivery", "delivery", "DeliveryID = ".$deliveryID, $registry_db));
		$registry_db->close();
	}
// -------------------------
//End Custom Code

//Close newborn_NewBornN_BeforeShow @10-BB2789C9
    return $newborn_NewBornN_BeforeShow;
}
//End Close newborn_NewBornN_BeforeShow

//DEL  // ---------------------
//DEL  if($newborn->DiedType->GetValue() == NULL)
//DEL  	{
//DEL  		$newborn->DiedType->Visible=false;
//DEL  	}	
//DEL  // -------------------------

//newborn_AfterInsert @3-DFD7F99B
function newborn_AfterInsert(& $sender)
{
    $newborn_AfterInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_AfterInsert

//Custom Code @138-2A29BDB7
// -------------------------
ListsModify("Insert");
// -------------------------
//End Custom Code

//Close newborn_AfterInsert @3-B2C72FAF
    return $newborn_AfterInsert;
}
//End Close newborn_AfterInsert

//newborn_AfterUpdate @3-D691398A
function newborn_AfterUpdate(& $sender)
{
    $newborn_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_AfterUpdate

//Custom Code @139-2A29BDB7
// -------------------------
    ListsModify("Update");
// -------------------------
//End Custom Code

//Close newborn_AfterUpdate @3-7DEEEE20
    return $newborn_AfterUpdate;
}
//End Close newborn_AfterUpdate

//newborn_BeforeSelect @3-5BE4FA22
function newborn_BeforeSelect(& $sender)
{
    $newborn_BeforeSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newborn; //Compatibility
//End newborn_BeforeSelect

//Custom Code @259-2A29BDB7
// -------------------------
    // get Birthdate from delivery page
	$DeliveryID = CCGetFromGet(DeliveryID,"");
	$NewBornID = CCGetFromGet(NewBornID,"");
	if(strcmp($DeliveryID,"") != 0 && strcmp($NewBornID,"") == 0) // we need the delivery ID, but newborn ID should not be there as that is the case when creating a newborn record
	{
		$where = "DeliveryID = ".$DeliveryID;
		
		$registry_db = new clsDBregistry_db();
    	$ccs_result = CCDLookUp("DataDelivery", "delivery", $where, $registry_db);
		$registry_db->close();

    	$newborn->birthDateTemp->SetText($ccs_result);//CCFormatDate(CCParseDate($ccs_result, array("yyyy", "-", "mm", "-", "dd")), array("mm","/","dd","/","yyyy")));
	}

// -------------------------
//End Custom Code

//Close newborn_BeforeSelect @3-E2AD3045
    return $newborn_BeforeSelect;
}
//End Close newborn_BeforeSelect

function returnPage()
{
	global $Redirect;
	if(CCGetFromGet("DeliveryID",0) == 0) // if we do not have DeliveryID parameter, then we did not come from Delivery page, but from Pregnancy page and we need to go back there
		$Redirect = "pregnancy_maint.php?PatientID=" . $_GET["PatientID"] . "&PregnancyID=" . $_GET["PregnancyID"];
}

function ListsModify($Actions){ 
global $DBregistry_db;

  $registry_db = null;
  $PatientID = 0;
  $ICD10ID = 0;
  $ICD10List_ClinicalDiagnosis = array();
  $ICD10List_AnatomicPathology = array();
  $ICD10List_ClinicalTests = array();
  $GetLastInsKey = 0;

  //Create new database  object
  $registry_db = new clsDBregistry_db();
  
  //Retrieve current patient
  $NewBornID = CCGetFromGet("NewBornID",0);

  $ICD10List_ClinicalDiagnosis = split(",",trim(str_replace("'","",CCGetFromPost("LinkedID_ClinicalDiagnosis"))));
  $ICD10List_AnatomicPathology = split(",",trim(str_replace("'","",CCGetFromPost("LinkedID_AnatomicPathology"))));
  $ListClinicalTests = split(",",trim(str_replace("'","",CCGetFromPost("LinkedID_ClinicalTests"))));

  if($Actions == "Insert"){
	//Retrieve the last inserted key
	$GetLastInsKey = CCDLookup("max(NewBornID)", "newborn", "", $registry_db);
   	//Insert New links
	reset($ICD10List_ClinicalDiagnosis);
	while(list($key,$ICD10ID) = each($ICD10List_ClinicalDiagnosis)) {
		 $registry_db->query("INSERT INTO clinical_diagn (ICD10ID, NewBornID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
	}
 	reset($ICD10List_AnatomicPathology);
	while(list($key,$ICD10ID) = each($ICD10List_AnatomicPathology)) {
		 $registry_db->query("INSERT INTO anatomic_path (ICD10ID, NewBornID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
	}
reset($ListClinicalTests);
	while(list($key,$ClinicalTestsID) = each($ListClinicalTests)) {
	     $registry_db->query("INSERT INTO clinical (ClinicalTestsID, NewBornID) VALUES (".$registry_db->ToSQL($ClinicalTestsID,ccsInteger)." ,".$registry_db->ToSQL($GetLastInsKey,ccsInteger).")");
    }
  }
  if($NewBornID >0){
    if( ($Actions == "Delete") || ($Actions == "Update")) {
	   //Delete project patient links
	   $registry_db->query("DELETE FROM clinical_diagn WHERE NewBornID=".$registry_db->ToSQL($NewBornID,ccsInteger));
   	   $registry_db->query("DELETE FROM anatomic_path WHERE NewBornID=".$registry_db->ToSQL($NewBornID,ccsInteger));
       $registry_db->query("DELETE FROM clinical WHERE NewBornID=".$registry_db->ToSQL($NewBornID,ccsInteger));
    } 
    if($Actions == "Update"){
       //Insert assigned patient
       reset($ICD10List_ClinicalDiagnosis);
	   while(list($key,$ICD10ID) = each($ICD10List_ClinicalDiagnosis)){
			$registry_db->query("INSERT INTO clinical_diagn (ICD10ID, NewBornID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($NewBornID,ccsInteger).");");
       }
       reset($ICD10List_AnatomicPathology);
	   while(list($key,$ICD10ID) = each($ICD10List_AnatomicPathology)){
			$registry_db->query("INSERT INTO anatomic_path (ICD10ID, NewBornID) VALUES (".$registry_db->ToSQL($ICD10ID,ccsText)." ,".$registry_db->ToSQL($NewBornID,ccsInteger).");");
       }
       reset($ListClinicalTests);
       while(list($key,$ClinicalTestsID) = each($ListClinicalTests)){
            $registry_db->query("INSERT INTO clinical (ClinicalTestsID, NewBornID) VALUES (".$registry_db->ToSQL($ClinicalTestsID,ccsInteger)." ,".$registry_db->ToSQL($NewBornID,ccsInteger).");");
       }

    }
  }
  //Close and destroy the database connection object
  $registry_db->close();
}

?>
