<?php
//BindEvents Method @1-6E2822D4
function BindEvents()
{
    global $patient_pregnancy_deliver1;
    global $Report_Print1;
    $patient_pregnancy_deliver1->Navigator->CCSEvents["BeforeShow"] = "patient_pregnancy_deliver1_Navigator_BeforeShow";
    $Report_Print1->CCSEvents["BeforeShow"] = "Report_Print1_BeforeShow";
}
//End BindEvents Method

//patient_pregnancy_deliver1_Navigator_BeforeShow @80-D180A857
function patient_pregnancy_deliver1_Navigator_BeforeShow(& $sender)
{
    $patient_pregnancy_deliver1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient_pregnancy_deliver1; //Compatibility
//End patient_pregnancy_deliver1_Navigator_BeforeShow

//Hide-Show Component @81-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close patient_pregnancy_deliver1_Navigator_BeforeShow @80-43A21622
    return $patient_pregnancy_deliver1_Navigator_BeforeShow;
}
//End Close patient_pregnancy_deliver1_Navigator_BeforeShow

//Report_Print1_BeforeShow @64-E4A2549A
function Report_Print1_BeforeShow(& $sender)
{
    $Report_Print1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print1; //Compatibility
//End Report_Print1_BeforeShow

//Hide-Show Component @66-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print1_BeforeShow @64-7AEBF47C
    return $Report_Print1_BeforeShow;
}
//End Close Report_Print1_BeforeShow
?>
