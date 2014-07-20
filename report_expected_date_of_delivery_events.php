<?php
//BindEvents Method @1-98F967CE
function BindEvents()
{
    global $patient_pregnancy_deliver;
    global $delivery_patient_pregnanc;
    global $Report_Print;
    $patient_pregnancy_deliver->Navigator->CCSEvents["BeforeShow"] = "patient_pregnancy_deliver_Navigator_BeforeShow";
    $delivery_patient_pregnanc->CCSEvents["BeforeShow"] = "delivery_patient_pregnanc_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//patient_pregnancy_deliver_Navigator_BeforeShow @52-9EB0AE96
function patient_pregnancy_deliver_Navigator_BeforeShow(& $sender)
{
    $patient_pregnancy_deliver_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient_pregnancy_deliver; //Compatibility
//End patient_pregnancy_deliver_Navigator_BeforeShow

//Hide-Show Component @53-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close patient_pregnancy_deliver_Navigator_BeforeShow @52-F07F9E98
    return $patient_pregnancy_deliver_Navigator_BeforeShow;
}
//End Close patient_pregnancy_deliver_Navigator_BeforeShow

//delivery_patient_pregnanc_BeforeShow @31-AEC9CC85
function delivery_patient_pregnanc_BeforeShow(& $sender)
{
    $delivery_patient_pregnanc_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_patient_pregnanc; //Compatibility
//End delivery_patient_pregnanc_BeforeShow

//Hide-Show Component @43-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_patient_pregnanc_BeforeShow @31-9A9C99B5
    return $delivery_patient_pregnanc_BeforeShow;
}
//End Close delivery_patient_pregnanc_BeforeShow

//Report_Print_BeforeShow @40-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @42-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @40-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
