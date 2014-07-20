<?php
//BindEvents Method @1-4AACF9C0
function BindEvents()
{
    global $login;
    global $employees;
    global $CCSEvents;
    $login->password->CCSEvents["OnValidate"] = "login_password_OnValidate";
    $login->CCSEvents["BeforeShow"] = "login_BeforeShow";
    $login->ds->CCSEvents["BeforeExecuteInsert"] = "login_ds_BeforeExecuteInsert";
    $login->ds->CCSEvents["BeforeExecuteUpdate"] = "login_ds_BeforeExecuteUpdate";
    $employees->CCSEvents["BeforeInsert"] = "employees_BeforeInsert";
    $employees->CCSEvents["AfterUpdate"] = "employees_AfterUpdate";
    $employees->CCSEvents["AfterDelete"] = "employees_AfterDelete";
}
//End BindEvents Method

//login_password_OnValidate @110-F4BA94DC
function login_password_OnValidate(& $sender)
{
    $login_password_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_password_OnValidate

//Reset Password Validation @111-399C7061
    if ($Container->EditMode && ($Container->password->GetValue() == "")) {
        $Component->Errors->Clear();
    }
//End Reset Password Validation

//Close login_password_OnValidate @110-BF7BDD29
    return $login_password_OnValidate;
}
//End Close login_password_OnValidate

//login_BeforeShow @103-47115E6D
function login_BeforeShow(& $sender)
{
    $login_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_BeforeShow

//Preserve Password @116-21743877
    if (!$Component->FormSubmitted) {
        $Component->password_Shadow->SetValue(CCEncryptString($Component->password->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE));
        $Component->password->SetValue("");
    }
//End Preserve Password

//Close login_BeforeShow @103-C8988BEE
    return $login_BeforeShow;
}
//End Close login_BeforeShow

//login_ds_BeforeExecuteInsert @103-BAFD296A
function login_ds_BeforeExecuteInsert(& $sender)
{
    $login_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_ds_BeforeExecuteInsert

//Encrypt Password @117-5A4F14C5
    $Component->DataSource->SQL = str_replace("'{password}'", "MD5(" . $Component->DataSource->ToSQL($Component->password->GetValue(), ccsText) . ")", $Component->DataSource->SQL);
//End Encrypt Password

//Close login_ds_BeforeExecuteInsert @103-6E787B7C
    return $login_ds_BeforeExecuteInsert;
}
//End Close login_ds_BeforeExecuteInsert

//login_ds_BeforeExecuteUpdate @103-5C3FBCE8
function login_ds_BeforeExecuteUpdate(& $sender)
{
    $login_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $login; //Compatibility
//End login_ds_BeforeExecuteUpdate

//Encrypt Password @118-929DA193
    if ("" != $Component->password->GetValue()) {
        $Component->DataSource->SQL = str_replace("'{password}'", "MD5(" . $Component->DataSource->ToSQL($Component->password->GetValue(), ccsText) . ")", $Component->DataSource->SQL);
    } else {
        $Component->DataSource->SQL = str_replace("'{password}'", $Component->DataSource->ToSQL(CCDecryptString($Component->password_Shadow->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE), ccsText), $Component->DataSource->SQL);
    }
//End Encrypt Password

//Close login_ds_BeforeExecuteUpdate @103-A151BAF3
    return $login_ds_BeforeExecuteUpdate;
}
//End Close login_ds_BeforeExecuteUpdate

//DEL  // -------------------------
//DEL   	$UserLogin = CCGetSession("UserLogin");
//DEL  	$db = new clsDBregistry_db(); 	// My DB Connection to Login Table
//DEL  										//Check for LoginID
//DEL  	$db->query("SELECT LoginID, GroupID FROM login WHERE login.username = '" . $UserLogin . "';");
//DEL  	if($db->next_record())
//DEL  	{
//DEL  		$LoginID = $db->f(0);
//DEL  		$GroupID = $db->f(1);
//DEL  	}
//DEL  	$db->close();
//DEL  
//DEL    	$db = new clsDBregistry_db(); // My DB Connection
//DEL    	$myKey = $employees->LocationID->GetValue();	//if dataset is new, create UUID as Primary Key
//DEL    	
//DEL  	$db->query("SELECT location.FacilityID FROM employees INNER JOIN location ON employees.LocationID = location.LocationID WHERE employees.LoginID = '" . $LoginID . "'");
//DEL  	if($db->next_record())
//DEL  		$FacilityIDUser = $db->f(0);		//Read Facility ID of logged user
//DEL  
//DEL    	if(!empty($myKey))
//DEL    	{							//Try to fill record wirth stored location data
//DEL    		$db->query("SELECT FacilityID FROM location WHERE location.LocationID = \"" . $myKey . "\"");
//DEL    		if($db->next_record())
//DEL  		{
//DEL    			$employees->FacilityID->SetValue($db->f(0));
//DEL    			$employees->Hidden_FacilityID->SetValue($db->f(0));
//DEL  			$FacilityIDEmployee = $db->f(0);
//DEL    		}
//DEL  		$db->query("SELECT DeptID FROM location WHERE location.LocationID = \"" . $myKey . "\"");
//DEL    		if($db->next_record())
//DEL    			$employees->DeptID->SetValue($db->f(0));
//DEL   	
//DEL  		if($GroupID != 1) //If user is not adminsitrator...
//DEL  		{
//DEL    			$FacilityNameEmployee = "";
//DEL  			$db->query("SELECT FacilityName FROM facilities WHERE FacilityID = '" . $FacilityIDEmployee . "'");
//DEL    			if($db->next_record())
//DEL  			{
//DEL  				$employees->FacilityName->SetValue(": " . $db->f(0));
//DEL  				$employees->FacilityID->Visible = FALSE;
//DEL  			}
//DEL  		}
//DEL  	}
//DEL    	else
//DEL    	{							//assign new key
//DEL    		$employees->LocationID->SetValue(uniqid());
//DEL  
//DEL  		if($GroupID < 3) //If user is not adminsitrator...
//DEL  		{
//DEL  			$db->query("SELECT FacilityName FROM facilities WHERE FacilityID = '" . $FacilityIDUser . "'");
//DEL    			if($db->next_record())
//DEL  			{
//DEL  				$employees->FacilityName->SetValue(": " . $db->f(0));
//DEL    				$employees->Hidden_FacilityID->SetValue($db->f(0));
//DEL    				$employees->FacilityID->SetValue($db->f(0));
//DEL  				$employees->FacilityID->Visible = FALSE;
//DEL  			}
//DEL  		}
//DEL    	}
//DEL    	$db->close();
//DEL  // -------------------------

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
		$LoginID = CCGetSession("LoginID");
		$employees->LoginID_employee->SetValue($LoginID);
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

//DEL  // -------------------------
//DEL  	_update_locations($employees);
//DEL  // -------------------------

//Page_BeforeInitialize @1-F7131EC6
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $myAccount; //Compatibility
//End Page_BeforeInitialize

//Custom Code @176-2A29BDB7
// -------------------------
set_login_id();
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize
/*
function _update_locations($employees)
{
	$db = new clsDBregistry_db(); 	// My DB Connection
									//Check if location alreay exists
	$db->query("SELECT * FROM location WHERE location.FacilityID = " . $employees->Hidden_FacilityID->GetValue() . " AND location.DeptID = " . $employees->DeptID->GetValue()); 

	if($db->next_record())
	{							//Set key value from existing location
		$employees->LocationID->SetValue($db->f(0));
	}
	else
	{
		$db->query("INSERT INTO location VALUES ('". $employees->LocationID->GetValue() . "', '" . $employees->Hidden_FacilityID->GetValue() . "', '" . $employees->DeptID->GetValue() . "')ON DUPLICATE KEY UPDATE LocationID = values(LocationID), FacilityID = values(FacilityID), DeptID = values(DeptID);");		
	}
	$db->close();
}
*/
function _clean_locations()
{
	$db = new clsDBregistry_db(); 	// My DB Connection
	$db->query("DELETE FROM location WHERE NOT EXISTS (SELECT * FROM employees WHERE employees.LocationID = location.LocationID)");
	$db->close();
}

function remove_querystring_var($url, $key) 
{
	$url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
	$url = substr($url, 0, -1);
	return ($url);
}

function set_login_id()
{
	$UserLogin = CCGetSession("UserLogin");
	$db = new clsDBregistry_db(); 	// My DB Connection
										//Check for LoginID
	$db->query("SELECT LoginID FROM login WHERE login.username = '" . $UserLogin . "';");
	if($db->next_record())
	{							//Set key value from existing location
		CCSetSession("LoginID", $db->f(0));
	}
	$db->close();
}

?>
