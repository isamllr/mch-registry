<?php
//BindEvents Method @1-3EA43086
function BindEvents()
{
    global $employees;
    $employees->Button_Update->CCSEvents["OnClick"] = "employees_Button_Update_OnClick";
    $employees->Button_Delete->CCSEvents["OnClick"] = "employees_Button_Delete_OnClick";
    $employees->Button_Cancel->CCSEvents["OnClick"] = "employees_Button_Cancel_OnClick";
    $employees->CCSEvents["BeforeInsert"] = "employees_BeforeInsert";
    $employees->CCSEvents["BeforeUpdate"] = "employees_BeforeUpdate";
    $employees->CCSEvents["AfterUpdate"] = "employees_AfterUpdate";
    $employees->CCSEvents["BeforeShow"] = "employees_BeforeShow";
}
//End BindEvents Method

//employees_Button_Update_OnClick @41-16F11F8A
function employees_Button_Update_OnClick(& $sender)
{
    $employees_Button_Update_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_Button_Update_OnClick

//Custom Code @116-2A29BDB7
// -------------------------
  global $Redirect;
	$Redirect = "doctors_list.php";
// -------------------------
//End Custom Code

//Close employees_Button_Update_OnClick @41-CC240C1E
    return $employees_Button_Update_OnClick;
}
//End Close employees_Button_Update_OnClick

//employees_Button_Delete_OnClick @42-4C2A41B3
function employees_Button_Delete_OnClick(& $sender)
{
    $employees_Button_Delete_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_Button_Delete_OnClick

//Custom Code @118-2A29BDB7
// -------------------------
  global $Redirect;
	$Redirect = "doctors_list.php";
// -------------------------
//End Custom Code

//Close employees_Button_Delete_OnClick @42-006EF675
    return $employees_Button_Delete_OnClick;
}
//End Close employees_Button_Delete_OnClick

//employees_Button_Cancel_OnClick @43-15B39659
function employees_Button_Cancel_OnClick(& $sender)
{
    $employees_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_Button_Cancel_OnClick

//Custom Code @117-2A29BDB7
// -------------------------
 global $Redirect;
	$Redirect = "doctors_list.php";
//End Custom Code

//Close employees_Button_Cancel_OnClick @43-DA90EF05
    return $employees_Button_Cancel_OnClick;
}
//End Close employees_Button_Cancel_OnClick

//employees_BeforeInsert @39-D48FE6C1
function employees_BeforeInsert(& $sender)
{
    $employees_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_BeforeInsert

//Custom Code @125-2A29BDB7
// -------------------------
_update_locations($employees);
// -------------------------
//End Custom Code

//Close employees_BeforeInsert @39-CB21363B
    return $employees_BeforeInsert;
}
//End Close employees_BeforeInsert

//employees_BeforeUpdate @39-0F136923
function employees_BeforeUpdate(& $sender)
{
    $employees_BeforeUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_BeforeUpdate

//Custom Code @126-2A29BDB7
// -------------------------
_update_locations($employees);
// -------------------------
//End Custom Code

//Close employees_BeforeUpdate @39-0408F7B4
    return $employees_BeforeUpdate;
}
//End Close employees_BeforeUpdate

//employees_AfterUpdate @39-C80A1821
function employees_AfterUpdate(& $sender)
{
    $employees_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_AfterUpdate

//Custom Code @127-2A29BDB7
// -------------------------
_clean_locations();
// -------------------------
//End Custom Code

//Close employees_AfterUpdate @39-7E1CF20E
    return $employees_AfterUpdate;
}
//End Close employees_AfterUpdate

//employees_BeforeShow @39-D99B63AD
function employees_BeforeShow(& $sender)
{
    $employees_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_BeforeShow

//Custom Code @128-2A29BDB7
// -------------------------
 
  	$db = new clsDBregistry_db(); // My DB Connection
  	
  	$myKey = $employees->LocationID->GetValue();	//if dataset is new, create UUID as Primary Key
  
  	if(!empty($myKey))
  	{							//Try to fill record wirth stored location data
  		$db->query("SELECT FacilityID FROM location WHERE location.LocationID = \"" . $myKey . "\"");
  		if($db->next_record())
  			$employees->FacilityID->SetValue($db->f(0));
  		$db->query("SELECT DeptID FROM location WHERE location.LocationID = \"" . $myKey . "\"");
  		if($db->next_record())
  			$employees->DeptID->SetValue($db->f(0));
 	}
  	else
  	{							//assign new key
  		$employees->LocationID->SetValue(uniqid());
  	}
  	$db->close();
// -------------------------
//End Custom Code

//Close employees_BeforeShow @39-4F58CE32
    return $employees_BeforeShow;
}
//End Close employees_BeforeShow
function _update_locations($employees)
{
	$db = new clsDBregistry_db(); 	// My DB Connection
									//Check if location alreay exists
	$db->query("SELECT * FROM location WHERE location.FacilityID = " . $employees->FacilityID->GetValue() . " AND location.DeptID = " . $employees->DeptID->GetValue()); 

	if($db->next_record())
	{							//Set key value from existing location
		$employees->LocationID->SetValue($db->f(0));
	}
	else
	{
		$db->query("INSERT INTO location(LocationID,FacilityID,DeptID) VALUES ('". $employees->LocationID->GetValue() . "', '" . $employees->FacilityID->GetValue() . "', '" . $employees->DeptID->GetValue() . "')ON DUPLICATE KEY UPDATE LocationID = values(LocationID), FacilityID = values(FacilityID), DeptID = values(DeptID);");		
	}
	$db->close();
}

function _clean_locations()
{
	$db = new clsDBregistry_db(); 	// My DB Connection
	$db->query("DELETE FROM location WHERE NOT EXISTS (SELECT * FROM assets, employees WHERE assets.LocationID = location.LocationID OR employees.LocationID = location.LocationID)");
	$db->close();
}

?>
