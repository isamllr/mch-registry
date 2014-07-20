<?php
//BindEvents Method @1-0974C6E9
function BindEvents()
{
    global $province;
    $province->province_TotalRecords->CCSEvents["BeforeShow"] = "province_province_TotalRecords_BeforeShow";
}
//End BindEvents Method

//province_province_TotalRecords_BeforeShow @10-6F493822
function province_province_TotalRecords_BeforeShow(& $sender)
{
    $province_province_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $province; //Compatibility
//End province_province_TotalRecords_BeforeShow

//Retrieve number of records @11-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close province_province_TotalRecords_BeforeShow @10-1FCE9CF8
    return $province_province_TotalRecords_BeforeShow;
}
//End Close province_province_TotalRecords_BeforeShow


?>
