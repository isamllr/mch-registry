<?php
//BindEvents Method @1-14F8C024
function BindEvents()
{
    global $Report_Print;
    global $district_report;
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $district_report->Navigator->CCSEvents["BeforeShow"] = "district_report_Navigator_BeforeShow";
}
//End BindEvents Method


//Report_Print_BeforeShow @167-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @169-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @167-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow

//district_report_Navigator_BeforeShow @372-A53ADA0E
function district_report_Navigator_BeforeShow(& $sender)
{
    $district_report_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $district_report; //Compatibility
//End district_report_Navigator_BeforeShow

//Hide-Show Component @373-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close district_report_Navigator_BeforeShow @372-78FA93BB
    return $district_report_Navigator_BeforeShow;
}
//End Close district_report_Navigator_BeforeShow

?>
