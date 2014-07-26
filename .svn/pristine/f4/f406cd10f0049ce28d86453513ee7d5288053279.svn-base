<?php
//BindEvents Method @1-C9D8C37B
function BindEvents()
{
    global $patient_pregnancy_deliver;
    global $delivery_facilities_patie;
    global $Report_Print;
    $patient_pregnancy_deliver->Navigator->CCSEvents["BeforeShow"] = "patient_pregnancy_deliver_Navigator_BeforeShow";
    $delivery_facilities_patie->CCSEvents["BeforeShow"] = "delivery_facilities_patie_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//patient_pregnancy_deliver_Navigator_BeforeShow @63-9EB0AE96
function patient_pregnancy_deliver_Navigator_BeforeShow(& $sender)
{
    $patient_pregnancy_deliver_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $patient_pregnancy_deliver; //Compatibility
//End patient_pregnancy_deliver_Navigator_BeforeShow

//Hide-Show Component @64-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close patient_pregnancy_deliver_Navigator_BeforeShow @63-F07F9E98
    return $patient_pregnancy_deliver_Navigator_BeforeShow;
}
//End Close patient_pregnancy_deliver_Navigator_BeforeShow

//delivery_facilities_patie_BeforeShow @37-EB3F3421
function delivery_facilities_patie_BeforeShow(& $sender)
{
    $delivery_facilities_patie_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities_patie; //Compatibility
//End delivery_facilities_patie_BeforeShow

//Hide-Show Component @49-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_facilities_patie_BeforeShow @37-F754A55E
    return $delivery_facilities_patie_BeforeShow;
}
//End Close delivery_facilities_patie_BeforeShow

//Report_Print_BeforeShow @46-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @48-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @46-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
