<?php
//BindEvents Method @1-3BF1E4B8
function BindEvents()
{
    global $medicationatcode;
    global $medicationatcode1;
    $medicationatcode->medicationatcode_TotalRecords->CCSEvents["BeforeShow"] = "medicationatcode_medicationatcode_TotalRecords_BeforeShow";
    $medicationatcode1->Button_Cancel->CCSEvents["OnClick"] = "medicationatcode1_Button_Cancel_OnClick";
}
//End BindEvents Method

//medicationatcode_medicationatcode_TotalRecords_BeforeShow @64-F4CAE9DF
function medicationatcode_medicationatcode_TotalRecords_BeforeShow(& $sender)
{
    $medicationatcode_medicationatcode_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $medicationatcode; //Compatibility
//End medicationatcode_medicationatcode_TotalRecords_BeforeShow

//Retrieve number of records @65-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close medicationatcode_medicationatcode_TotalRecords_BeforeShow @64-D2ECF3D5
    return $medicationatcode_medicationatcode_TotalRecords_BeforeShow;
}
//End Close medicationatcode_medicationatcode_TotalRecords_BeforeShow

//medicationatcode1_Button_Cancel_OnClick @81-19305D26
function medicationatcode1_Button_Cancel_OnClick(& $sender)
{
    $medicationatcode1_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $medicationatcode1; //Compatibility
//End medicationatcode1_Button_Cancel_OnClick

//Custom Code @85-2A29BDB7
// -------------------------
     global $Redirect;
	$Redirect = "medication_admin_maint.php"; 
// -------------------------
//End Custom Code

//Close medicationatcode1_Button_Cancel_OnClick @81-381C5780
    return $medicationatcode1_Button_Cancel_OnClick;
}
//End Close medicationatcode1_Button_Cancel_OnClick


?>
