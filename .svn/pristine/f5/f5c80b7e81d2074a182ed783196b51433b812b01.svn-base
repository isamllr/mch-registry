<?php
//BindEvents Method @1-CD515930
function BindEvents()
{
    global $medication;
    $medication->CurrentUser->CCSEvents["BeforeShow"] = "medication_CurrentUser_BeforeShow";
}
//End BindEvents Method

//medication_CurrentUser_BeforeShow @83-B22E35FC
function medication_CurrentUser_BeforeShow(& $sender)
{
    $medication_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $medication; //Compatibility
//End medication_CurrentUser_BeforeShow

//Custom Code @108-2A29BDB7
// -------------------------
	$medication->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close medication_CurrentUser_BeforeShow @83-34CEBD65
    return $medication_CurrentUser_BeforeShow;
}
//End Close medication_CurrentUser_BeforeShow


?>
