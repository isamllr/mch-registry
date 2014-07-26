<?php
//BindEvents Method @1-11BDFEDA
function BindEvents()
{
    global $visit_referral_referralty1;
    global $facilities_patient_pregna;
    global $Report_Print;
    $visit_referral_referralty1->Navigator->CCSEvents["BeforeShow"] = "visit_referral_referralty1_Navigator_BeforeShow";
    $facilities_patient_pregna->CCSEvents["BeforeShow"] = "facilities_patient_pregna_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//visit_referral_referralty1_Navigator_BeforeShow @173-BEFCFCAB
function visit_referral_referralty1_Navigator_BeforeShow(& $sender)
{
    $visit_referral_referralty1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $visit_referral_referralty1; //Compatibility
//End visit_referral_referralty1_Navigator_BeforeShow

//Hide-Show Component @174-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close visit_referral_referralty1_Navigator_BeforeShow @173-C26640AA
    return $visit_referral_referralty1_Navigator_BeforeShow;
}
//End Close visit_referral_referralty1_Navigator_BeforeShow

//facilities_patient_pregna_BeforeShow @136-6A3B3D2A
function facilities_patient_pregna_BeforeShow(& $sender)
{
    $facilities_patient_pregna_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $facilities_patient_pregna; //Compatibility
//End facilities_patient_pregna_BeforeShow

//Hide-Show Component @149-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close facilities_patient_pregna_BeforeShow @136-C015D954
    return $facilities_patient_pregna_BeforeShow;
}
//End Close facilities_patient_pregna_BeforeShow

//Report_Print_BeforeShow @146-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @148-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @146-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow
?>
