<?php
//BindEvents Method @1-B04A8204
function BindEvents()
{
    global $patient_visit_pregnancy;
    global $patient_pregnancy_visit;
    global $Report_Print;
    $patient_visit_pregnancy->Navigator->CCSEvents["BeforeShow"] = "patient_visit_pregnancy_Navigator_BeforeShow";
    $patient_pregnancy_visit->CCSEvents["BeforeShow"] = "patient_pregnancy_visit_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//patient_visit_pregnancy_Navigator_BeforeShow @38-DCBDA65C
function patient_visit_pregnancy_Navigator_BeforeShow(& $sender)
{
    $patient_visit_pregnancy_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient_visit_pregnancy; //Compatibility
//End patient_visit_pregnancy_Navigator_BeforeShow

//Hide-Show Component @39-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close patient_visit_pregnancy_Navigator_BeforeShow @38-D9424A0B
    return $patient_visit_pregnancy_Navigator_BeforeShow;
}
//End Close patient_visit_pregnancy_Navigator_BeforeShow

//patient_pregnancy_visit_BeforeShow @19-FC80BA89
function patient_pregnancy_visit_BeforeShow(& $sender)
{
    $patient_pregnancy_visit_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient_pregnancy_visit; //Compatibility
//End patient_pregnancy_visit_BeforeShow

//Hide-Show Component @28-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close patient_pregnancy_visit_BeforeShow @19-40534E9A
    return $patient_pregnancy_visit_BeforeShow;
}
//End Close patient_pregnancy_visit_BeforeShow

//Report_Print_BeforeShow @25-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @27-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @25-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow
?>
