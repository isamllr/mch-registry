<?php
//BindEvents Method @1-BEC32835
function BindEvents()
{
    global $districts;
    global $districtsEdit;
    global $CCSEvents;
    $districts->districts_TotalRecords->CCSEvents["BeforeShow"] = "districts_districts_TotalRecords_BeforeShow";
    $districtsEdit->ProvinceID->CCSEvents["BeforeShow"] = "districtsEdit_ProvinceID_BeforeShow";
}
//End BindEvents Method

//districts_districts_TotalRecords_BeforeShow @47-3505CB4B
function districts_districts_TotalRecords_BeforeShow(& $sender)
{
    $districts_districts_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $districts; //Compatibility
//End districts_districts_TotalRecords_BeforeShow

//Retrieve number of records @48-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close districts_districts_TotalRecords_BeforeShow @47-77B66F84
    return $districts_districts_TotalRecords_BeforeShow;
}
//End Close districts_districts_TotalRecords_BeforeShow

//districtsEdit_ProvinceID_BeforeShow @66-B7B079B8
function districtsEdit_ProvinceID_BeforeShow(& $sender)
{
    $districtsEdit_ProvinceID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $districtsEdit; //Compatibility
//End districtsEdit_ProvinceID_BeforeShow

//Close districtsEdit_ProvinceID_BeforeShow @66-51792F01
    return $districtsEdit_ProvinceID_BeforeShow;
}
//End Close districtsEdit_ProvinceID_BeforeShow

//Page_BeforeInitialize @1-FD0131A7
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $districts_maint; //Compatibility
//End Page_BeforeInitialize

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize


?>
