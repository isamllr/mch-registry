<?php
//BindEvents Method @1-ECB386FA
function BindEvents()
{
    global $recommendedmedicationhospitalisation;
    $recommendedmedicationhospitalisation->CurrentUser->CCSEvents["BeforeShow"] = "recommendedmedicationhospitalisation_CurrentUser_BeforeShow";
}
//End BindEvents Method

//recommendedmedicationhospitalisation_CurrentUser_BeforeShow @83-70B46946
function recommendedmedicationhospitalisation_CurrentUser_BeforeShow(& $sender)
{
    $recommendedmedicationhospitalisation_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $recommendedmedicationhospitalisation; //Compatibility
//End recommendedmedicationhospitalisation_CurrentUser_BeforeShow

//Custom Code @120-2A29BDB7
// -------------------------
	$recommendedmedicationhospitalisation->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close recommendedmedicationhospitalisation_CurrentUser_BeforeShow @83-4D2EE771
    return $recommendedmedicationhospitalisation_CurrentUser_BeforeShow;
}
//End Close recommendedmedicationhospitalisation_CurrentUser_BeforeShow


?>
