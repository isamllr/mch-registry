<?php

//BindEvents Method @1-DD2D575E
function BindEvents()
{
    global $s_TodayDate;
    global $s_CurrentUser;
    global $s_ActiveDatabase;
    global $s_Facilities;
    global $DatabaseVersion;
    global $refLast30Days;
    global $CCSEvents;
    $s_TodayDate->CCSEvents["BeforeShow"] = "s_TodayDate_BeforeShow";
    $s_CurrentUser->CCSEvents["BeforeShow"] = "s_CurrentUser_BeforeShow";
    $s_ActiveDatabase->CCSEvents["BeforeShow"] = "s_ActiveDatabase_BeforeShow";
    $s_Facilities->CCSEvents["BeforeShow"] = "s_Facilities_BeforeShow";
    $DatabaseVersion->CCSEvents["BeforeShow"] = "DatabaseVersion_BeforeShow";
    $refLast30Days->Detail->CCSEvents["BeforeShow"] = "refLast30Days_Detail_BeforeShow";
    $refLast30Days->CCSEvents["BeforeShow"] = "refLast30Days_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//s_TodayDate_BeforeShow @389-C1461C10
function s_TodayDate_BeforeShow(& $sender)
{
    $s_TodayDate_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $s_TodayDate; //Compatibility
//End s_TodayDate_BeforeShow

//Custom Code @391-2A29BDB7
// -------------------------
	$s_TodayDate->SetValue(time());
// -------------------------
//End Custom Code

//Close s_TodayDate_BeforeShow @389-93FB82D9
    return $s_TodayDate_BeforeShow;
}
//End Close s_TodayDate_BeforeShow

//s_CurrentUser_BeforeShow @392-16C8B370
function s_CurrentUser_BeforeShow(& $sender)
{
    $s_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $s_CurrentUser; //Compatibility
//End s_CurrentUser_BeforeShow

//Retrieve Value for Control @396-12751BE3
    $Container->s_CurrentUser->SetValue(CCGetSession("UserLogin"));
//End Retrieve Value for Control

//Close s_CurrentUser_BeforeShow @392-049A90A9
    return $s_CurrentUser_BeforeShow;
}
//End Close s_CurrentUser_BeforeShow

//s_ActiveDatabase_BeforeShow @394-A7CC23DB
function s_ActiveDatabase_BeforeShow(& $sender)
{
    $s_ActiveDatabase_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $s_ActiveDatabase; //Compatibility
//End s_ActiveDatabase_BeforeShow

//DLookup @397-09C51B54
    global $DBregistry_db;
    $Page = CCGetParentPage($sender);
    $ccs_result = CCDLookUp("DATABASE()", "", "", $Page->Connections["registry_db"]);
    $ccs_result = strval($ccs_result);
    $Container->s_ActiveDatabase->SetValue($ccs_result);
//End DLookup

//Close s_ActiveDatabase_BeforeShow @394-42B2817E
    return $s_ActiveDatabase_BeforeShow;
}
//End Close s_ActiveDatabase_BeforeShow

//s_Facilities_BeforeShow @404-660BD54F
function s_Facilities_BeforeShow(& $sender)
{
    $s_Facilities_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $s_Facilities; //Compatibility
//End s_Facilities_BeforeShow

//DLookup @405-887DBF91
// -------------------------
    global $DBregistry_db;
    $Page = CCGetParentPage($sender);
    $ccs_result = CCDLookUp("COUNT(*)", "facilities", "", $Page->Connections["registry_db"]);
    $ccs_result = strval($ccs_result);
    $Container->s_Facilities->SetValue($ccs_result);
// -------------------------
//End DLookup

//Close s_Facilities_BeforeShow @404-34C257D4
    return $s_Facilities_BeforeShow;
}
//End Close s_Facilities_BeforeShow

//DatabaseVersion_BeforeShow @473-5C947C93
function DatabaseVersion_BeforeShow(& $sender)
{
    $DatabaseVersion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $DatabaseVersion; //Compatibility
//End DatabaseVersion_BeforeShow

//Custom Code @474-2A29BDB7
// -------------------------
	$db = new clsDBregistry_db();
	$result = $db->query("SHOW TABLE STATUS");
	$myDate = mysql_fetch_row($result);
	$DatabaseVersion->SetValue($myDate[11]);
	$db->close();
// -------------------------
//End Custom Code

//Close DatabaseVersion_BeforeShow @473-6465DE69
    return $DatabaseVersion_BeforeShow;
}
//End Close DatabaseVersion_BeforeShow

//refLast30Days_Detail_BeforeShow @529-35B6AF43
function refLast30Days_Detail_BeforeShow(& $sender)
{
    $refLast30Days_Detail_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $refLast30Days; //Compatibility
//End refLast30Days_Detail_BeforeShow

//Custom Code @559-2A29BDB7
// -------------------------
 global $CCSLocales;

 	if($refLast30Days->TypeName->GetValue() == 'res:RefDelivery')
		$refLast30Days->TypeName->SetValue($CCSLocales->GetText("RefDelivery"));

// -------------------------
//End Custom Code

//Close refLast30Days_Detail_BeforeShow @529-6A9A3D03
    return $refLast30Days_Detail_BeforeShow;
}
//End Close refLast30Days_Detail_BeforeShow

//refLast30Days_BeforeShow @501-30110557
function refLast30Days_BeforeShow(& $sender)
{
    $refLast30Days_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $refLast30Days; //Compatibility
//End refLast30Days_BeforeShow

//Custom Code @556-2A29BDB7
// -------------------------
	if($refLast30Days->TotalRows < 1){
	  	$refLast30Days->Visible = FALSE;
	}
	else{
		$refLast30Days->Visible = TRUE;
	}
// -------------------------
//End Custom Code

//Close refLast30Days_BeforeShow @501-062346DB
    return $refLast30Days_BeforeShow;
}
//End Close refLast30Days_BeforeShow

//Page_OnInitializeView @1-BFADDFF5
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $dashboard; //Compatibility
//End Page_OnInitializeView

//Custom Code @478-2A29BDB7
// -------------------------
        //if($patientSearch->s_Facilities)
	//{
		// ## checking which facility is the user from
		$Facilities = "";
		$LoginID = CCGetUserID();
	
		$registry_db = new clsDBregistry_db();
	    $LocationID = CCDLookUp("LocationID", "employees", "LoginID = ".$LoginID, $registry_db);
		$MainFacilityID = CCDLookUp("FacilityID", "location", "LocationID = '".$LocationID."'", $registry_db);
	
		//  ***********TO BE FINISHED (WHERE facilityID IN (1,2,3) is not working) ***************
		
		// ##get the other facilities from employee_sec locations

		// get EmployeeID from LoginID (employees table)
/*		$EmployeeID = CCDLookUp("EmployeeID", "employees", "LoginID = ".$LoginID, $registry_db);

		// get locations from EmployeeID (employee_sec_location)
		$Locations="";
		$registry_db->query("SELECT LocationID FROM employee_sec_location WHERE EmployeeID =".$registry_db->ToSQL($EmployeeID,ccsInteger));
	  	if($registry_db->has_next_record())
		{
			$Locations = "('";
			while($registry_db->next_record())
			{
				$Locations .= $registry_db->f("LocationID");
				if($registry_db->has_next_record())
					$Locations .= "', '";
			}
			$Locations .= "')";
		}	

		// and then get all facilities that the locations refer to 
		$registry_db->query("SELECT FacilityID FROM location WHERE LocationID IN".$Locations." GROUP BY FacilityID");
	  	if($registry_db->has_next_record())
		{ 
			$Facilities = $MainFacilityID.", ";
			while($registry_db->next_record())
			{ 
				$Facilities .= $registry_db->f("FacilityID");
				if($registry_db->has_next_record())
					$Facilities .= ", ";
			}
		//	$Facilities .= ")";
		} else 									
*/			$Facilities = $MainFacilityID;

	//echo $Facilities;

		CCSetSession("s_Facilities", $Facilities);

		
		//$patientSearch->s_Facilities->SetValue($Facilities);
		
		$registry_db->close();	
	//}
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

?>
