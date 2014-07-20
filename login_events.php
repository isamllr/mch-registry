<?php
//BindEvents Method @1-D3D688BC
function BindEvents()
{
    global $Login;
    global $TimeoutMsg;
    $Login->Button_DoLogin->CCSEvents["OnClick"] = "Login_Button_DoLogin_OnClick";
    $Login->CCSEvents["BeforeUpdate"] = "Login_BeforeUpdate";
    $TimeoutMsg->CCSEvents["BeforeShow"] = "TimeoutMsg_BeforeShow";
}
//End BindEvents Method

//Login_Button_DoLogin_OnClick @3-1454CF55
function Login_Button_DoLogin_OnClick(& $sender)
{
    $Login_Button_DoLogin_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Login; //Compatibility
//End Login_Button_DoLogin_OnClick

//Login @4-DE10C29C
    global $CCSLocales;
    global $Redirect;
    if ( !CCLoginUser( $Container->login->Value, $Container->password->Value)) {
        $Container->Errors->addError($CCSLocales->GetText("CCS_LoginError"));
        $Container->password->SetValue("");
        $Login_Button_DoLogin_OnClick = 0;
    } else {
        global $Redirect;
        $Redirect = CCGetParam("ret_link", $Redirect);
        $Login_Button_DoLogin_OnClick = 1;
    }
//End Login

//Custom Code @14-2A29BDB7
// -------------------------
global $Redirect;
global $Login;

$user = $Login->login->GetText();				//Retrieve username

$db = new clsDBregistry_db();	

$locale = CCDLookup("locale", "login", "username = '" . $user . "'" , $db);
	
if ($locale != NULL)
	$Redirect .= "?locale=" . $locale;

$db->close();	

	// -------------------------
//End Custom Code

//Close Login_Button_DoLogin_OnClick @3-0EB5DCFE
    return $Login_Button_DoLogin_OnClick;
}
//End Close Login_Button_DoLogin_OnClick

//Login_BeforeUpdate @2-5F4506EF
function Login_BeforeUpdate(& $sender)
{
    $Login_BeforeUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Login; //Compatibility
//End Login_BeforeUpdate

//Custom Code @11-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Login_BeforeUpdate @2-35CF1F73
    return $Login_BeforeUpdate;
}
//End Close Login_BeforeUpdate

//TimeoutMsg_BeforeShow @12-BFE175A8
function TimeoutMsg_BeforeShow(& $sender)
{
    $TimeoutMsg_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TimeoutMsg; //Compatibility
//End TimeoutMsg_BeforeShow

//Custom Code @13-2A29BDB7
// -------------------------
    if(CCGetSession('TimeoutMsg') == 1)
		$TimeoutMsg->Visible = TRUE;
	else
		$TimeoutMsg->Visible = FALSE;
// -------------------------
//End Custom Code

//Close TimeoutMsg_BeforeShow @12-17EB80C0
    return $TimeoutMsg_BeforeShow;
}
//End Close TimeoutMsg_BeforeShow

//DEL  // -------------------------
//DEL      echo CCGetSession('TimeoutMsg');
//DEL  // -------------------------



function remove_remarks($sql){
    $sql = preg_replace('/\n{2,}/', "\n", preg_replace('/^[-].*$/m', "\n", $sql));
    $sql = preg_replace('/\n{2,}/', "\n", preg_replace('/^#.*$/m', "\n", $sql));
    return $sql;
}

function split_sql_file($sql, $delimiter){
    $sql = str_replace("\r" , '', $sql);
    $data = preg_split('/' . preg_quote($delimiter, '/') . '$/m', $sql);
    $data = array_map('trim', $data);
    // The empty case
    $end_data = end($data);
    if (empty($end_data))
    {
        unset($data[key($data)]);
    }
    return $data;
}  
?>
