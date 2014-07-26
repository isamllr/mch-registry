<?php
//BindEvents Method @1-DD53B79E
function BindEvents()
{
    global $visit_referral_pregnancy;
    global $employees_patient_pregnan;
    global $Report_Print;
    $visit_referral_pregnancy->Navigator->CCSEvents["BeforeShow"] = "visit_referral_pregnancy_Navigator_BeforeShow";
    $employees_patient_pregnan->CCSEvents["BeforeShow"] = "employees_patient_pregnan_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//visit_referral_pregnancy_Navigator_BeforeShow @61-BFD1635B
function visit_referral_pregnancy_Navigator_BeforeShow(& $sender)
{
    $visit_referral_pregnancy_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit_referral_pregnancy; //Compatibility
//End visit_referral_pregnancy_Navigator_BeforeShow

//Hide-Show Component @62-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close visit_referral_pregnancy_Navigator_BeforeShow @61-B01B1406
    return $visit_referral_pregnancy_Navigator_BeforeShow;
}
//End Close visit_referral_pregnancy_Navigator_BeforeShow

//employees_patient_pregnan_BeforeShow @37-DBD62E25
function employees_patient_pregnan_BeforeShow(& $sender)
{
    $employees_patient_pregnan_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees_patient_pregnan; //Compatibility
//End employees_patient_pregnan_BeforeShow

//Hide-Show Component @48-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close employees_patient_pregnan_BeforeShow @37-91B98BE6
    return $employees_patient_pregnan_BeforeShow;
}
//End Close employees_patient_pregnan_BeforeShow

//Report_Print_BeforeShow @45-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @47-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @45-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
