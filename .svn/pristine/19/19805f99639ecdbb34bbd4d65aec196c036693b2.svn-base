<?php
//BindEvents Method @1-6EA3347D
function BindEvents()
{
    global $employees;
    global $login;
    $employees->CCSEvents["BeforeShow"] = "employees_BeforeShow";
    $employees->CCSEvents["BeforeInsert"] = "employees_BeforeInsert";
    $employees->CCSEvents["AfterUpdate"] = "employees_AfterUpdate";
    $employees->CCSEvents["AfterDelete"] = "employees_AfterDelete";
    $employees->CCSEvents["BeforeUpdate"] = "employees_BeforeUpdate";
    $login->Button_Update->CCSEvents["OnClick"] = "login_Button_Update_OnClick";
    $login->Button_Delete->CCSEvents["OnClick"] = "login_Button_Delete_OnClick";
    $login->Button_Cancel->CCSEvents["OnClick"] = "login_Button_Cancel_OnClick";
    $login->password->CCSEvents["OnValidate"] = "login_password_OnValidate";
    $login->CCSEvents["BeforeShow"] = "login_BeforeShow";
    $login->ds->CCSEvents["BeforeExecuteInsert"] = "login_ds_BeforeExecuteInsert";
    $login->ds->CCSEvents["BeforeExecuteUpdate"] = "login_ds_BeforeExecuteUpdate";
    $login->CCSEvents["AfterInsert"] = "login_AfterInsert";
}
//End BindEvents Method

//employees_BeforeShow @2-D99B63AD
function employees_BeforeShow(& $sender)
{
    $employees_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------

/*  	$myKey = $employees->EmployeeID->GetValue();	//if dataset is new, create UUID as Primary Key
  	if(empty($myKey))
  	{
  		$employees->EmployeeID->SetValue(uniqid());
  	}*/

	$loginURL = $_GET["LoginID"];
	if($loginURL == '0')
	{
		unset($_GET["LoginID"]);
		$newurl = remove_querystring_var($_SERVER['REQUEST_URI'],"LoginID");
		$host  = $_SERVER['HTTP_HOST'];
		header("Location: http://" . $host . $newurl);
	}
	
	if(empty($loginURL))
	{
		//hide employee details form
		$employees->Visible = FALSE;
	} else
	{
		$employees->Button_Delete->Visible = FALSE;
	}

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

//Close employees_BeforeShow @2-4F58CE32
    return $employees_BeforeShow;
}
//End Close employees_BeforeShow

//employees_BeforeInsert @2-D48FE6C1
function employees_BeforeInsert(& $sender)
{
    $employees_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_BeforeInsert

//Custom Code @55-2A29BDB7
// -------------------------
	if (!$employees->LoginID_employee->GetValue()) //If no login was created for user yet
	{
		$loginURL = $_GET["LoginID"];
		if(!$loginURL)
		{
			$employees->LoginID_employee->SetValue(0);
		}
		else
		{
			$employees->LoginID_employee->SetValue($loginURL);
		}
	}
	_update_locations($employees);
	
// -------------------------
//End Custom Code

//Close employees_BeforeInsert @2-CB21363B
    return $employees_BeforeInsert;
}
//End Close employees_BeforeInsert

//employees_AfterUpdate @2-C80A1821
function employees_AfterUpdate(& $sender)
{
    $employees_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_AfterUpdate

//Custom Code @56-2A29BDB7
// -------------------------
	_clean_locations();
// -------------------------
//End Custom Code

//Close employees_AfterUpdate @2-7E1CF20E
    return $employees_AfterUpdate;
}
//End Close employees_AfterUpdate

//employees_AfterDelete @2-27339C6C
function employees_AfterDelete(& $sender)
{
    $employees_AfterDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_AfterDelete

//Custom Code @57-2A29BDB7
// -------------------------
	_clean_locations();
// -------------------------
//End Custom Code

//Close employees_AfterDelete @2-E238547F
    return $employees_AfterDelete;
}
//End Close employees_AfterDelete

//employees_BeforeUpdate @2-0F136923
function employees_BeforeUpdate(& $sender)
{
    $employees_BeforeUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_BeforeUpdate

//Custom Code @116-2A29BDB7
// -------------------------
		$loginURL = $_GET["LoginID"];
		if(!$loginURL)
		{
			$employees->LoginID_employee->SetValue(0);
		}
		else
		{
			$employees->LoginID_employee->SetValue($loginURL);
		}

	_update_locations($employees);
// -------------------------
//End Custom Code

//Close employees_BeforeUpdate @2-0408F7B4
    return $employees_BeforeUpdate;
}
//End Close employees_BeforeUpdate

//login_Button_Update_OnClick @145-BF679A20
function login_Button_Update_OnClick(& $sender)
{
    $login_Button_Update_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_Button_Update_OnClick

//Custom Code @173-2A29BDB7
// -------------------------
    global $Redirect;
	$Redirect = "employees_list.php";
// -------------------------
//End Custom Code

//Close login_Button_Update_OnClick @145-50CB350D
    return $login_Button_Update_OnClick;
}
//End Close login_Button_Update_OnClick

//login_Button_Delete_OnClick @147-CFF8DE32
function login_Button_Delete_OnClick(& $sender)
{
    $login_Button_Delete_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_Button_Delete_OnClick

//Custom Code @171-2A29BDB7
// -------------------------
    global $Redirect;
	$Redirect = "employees_list.php";
// -------------------------
//End Custom Code

//Close login_Button_Delete_OnClick @147-9C81CF66
    return $login_Button_Delete_OnClick;
}
//End Close login_Button_Delete_OnClick

//login_Button_Cancel_OnClick @149-DB0415AE
function login_Button_Cancel_OnClick(& $sender)
{
    $login_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_Button_Cancel_OnClick

//Custom Code @172-2A29BDB7
// -------------------------
    global $Redirect;
	$Redirect = "employees_list.php";
// -------------------------
//End Custom Code

//Close login_Button_Cancel_OnClick @149-467FD616
    return $login_Button_Cancel_OnClick;
}
//End Close login_Button_Cancel_OnClick

//DEL  // -------------------------
//DEL  // -------------------------

//DEL  // -------------------------
//DEL  //$login->hidden_password->SetValue(md5($login->password->GetValue()));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL  
//DEL  $login->password->SetValue(md5($login->password->GetValue()));
//DEL  
//DEL  // -------------------------

//login_password_OnValidate @152-F4BA94DC
function login_password_OnValidate(& $sender)
{
    $login_password_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_password_OnValidate

//Reset Password Validation @153-399C7061
    if ($Container->EditMode && ($Container->password->GetValue() == "")) {
        $Component->Errors->Clear();
    }
//End Reset Password Validation

//Close login_password_OnValidate @152-BF7BDD29
    return $login_password_OnValidate;
}
//End Close login_password_OnValidate

//login_BeforeShow @141-47115E6D
function login_BeforeShow(& $sender)
{
    $login_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_BeforeShow

//Preserve Password @142-21743877
    if (!$Component->FormSubmitted) {
        $Component->password_Shadow->SetValue(CCEncryptString($Component->password->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE));
        $Component->password->SetValue("");
    }
//End Preserve Password

//Close login_BeforeShow @141-C8988BEE
    return $login_BeforeShow;
}
//End Close login_BeforeShow

//login_ds_BeforeExecuteInsert @141-BAFD296A
function login_ds_BeforeExecuteInsert(& $sender)
{
    $login_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_ds_BeforeExecuteInsert

//Encrypt Password @144-5A4F14C5
    $Component->DataSource->SQL = str_replace("'{password}'", "MD5(" . $Component->DataSource->ToSQL($Component->password->GetValue(), ccsText) . ")", $Component->DataSource->SQL);
//End Encrypt Password

//Close login_ds_BeforeExecuteInsert @141-6E787B7C
    return $login_ds_BeforeExecuteInsert;
}
//End Close login_ds_BeforeExecuteInsert

//login_ds_BeforeExecuteUpdate @141-5C3FBCE8
function login_ds_BeforeExecuteUpdate(& $sender)
{
    $login_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_ds_BeforeExecuteUpdate

//Encrypt Password @146-929DA193
    if ("" != $Component->password->GetValue()) {
        $Component->DataSource->SQL = str_replace("'{password}'", "MD5(" . $Component->DataSource->ToSQL($Component->password->GetValue(), ccsText) . ")", $Component->DataSource->SQL);
    } else {
        $Component->DataSource->SQL = str_replace("'{password}'", $Component->DataSource->ToSQL(CCDecryptString($Component->password_Shadow->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE), ccsText), $Component->DataSource->SQL);
    }
//End Encrypt Password

//Close login_ds_BeforeExecuteUpdate @141-A151BAF3
    return $login_ds_BeforeExecuteUpdate;
}
//End Close login_ds_BeforeExecuteUpdate

//login_AfterInsert @141-F934BAA7
function login_AfterInsert(& $sender)
{
    $login_AfterInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_AfterInsert

//Custom Code @169-2A29BDB7
// -------------------------
	global $Redirect;
	$Redirect = $Redirect . "&LoginID=" . mysql_insert_id();
// -------------------------
//End Custom Code

//Close login_AfterInsert @141-3ED76D3B
    return $login_AfterInsert;
}
//End Close login_AfterInsert
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

function remove_querystring_var($url, $key) 
{
	$url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
	$url = substr($url, 0, -1);
	return ($url);
}	
?>