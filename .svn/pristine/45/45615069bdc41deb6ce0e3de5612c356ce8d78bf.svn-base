<?php
//BindEvents Method @1-C3603C8A
function BindEvents()
{
    global $medicationhospitalisation;
    global $CCSEvents;
    $medicationhospitalisation->CurrentUser->CCSEvents["BeforeShow"] = "medicationhospitalisation_CurrentUser_BeforeShow";
}
//End BindEvents Method

//medicationhospitalisation_CurrentUser_BeforeShow @115-087978F0
function medicationhospitalisation_CurrentUser_BeforeShow(& $sender)
{
    $medicationhospitalisation_CurrentUser_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $medicationhospitalisation; //Compatibility
//End medicationhospitalisation_CurrentUser_BeforeShow

//Custom Code @116-2A29BDB7
// -------------------------
 $medicationhospitalisation->CurrentUser->SetValue($_SESSION["UserLogin"]);
// -------------------------
//End Custom Code

//Close medicationhospitalisation_CurrentUser_BeforeShow @115-0D1B53AA
    return $medicationhospitalisation_CurrentUser_BeforeShow;
}
//End Close medicationhospitalisation_CurrentUser_BeforeShow


//Page_BeforeInitialize @1-DEA645F1
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisationmedication_maint; //Compatibility
//End Page_BeforeInitialize

//Custom Code @117-2A29BDB7
// -------------------------

// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize
?>
