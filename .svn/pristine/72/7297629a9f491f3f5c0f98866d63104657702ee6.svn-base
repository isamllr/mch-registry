<?php
//BindEvents Method @1-24BE79DF
function BindEvents()
{
    global $delivery_procedures_proce1;
    global $delivery_procedures_proce;
    global $Report_Print;
    $delivery_procedures_proce1->Navigator->CCSEvents["BeforeShow"] = "delivery_procedures_proce1_Navigator_BeforeShow";
    $delivery_procedures_proce->CCSEvents["BeforeShow"] = "delivery_procedures_proce_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//delivery_procedures_proce1_Navigator_BeforeShow @118-D17A0870
function delivery_procedures_proce1_Navigator_BeforeShow(& $sender)
{
    $delivery_procedures_proce1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_procedures_proce1; //Compatibility
//End delivery_procedures_proce1_Navigator_BeforeShow

//Hide-Show Component @119-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_procedures_proce1_Navigator_BeforeShow @118-84364517
    return $delivery_procedures_proce1_Navigator_BeforeShow;
}
//End Close delivery_procedures_proce1_Navigator_BeforeShow

//delivery_procedures_proce_BeforeShow @95-D145E789
function delivery_procedures_proce_BeforeShow(& $sender)
{
    $delivery_procedures_proce_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_procedures_proce; //Compatibility
//End delivery_procedures_proce_BeforeShow

//Hide-Show Component @102-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_procedures_proce_BeforeShow @95-84F5B04F
    return $delivery_procedures_proce_BeforeShow;
}
//End Close delivery_procedures_proce_BeforeShow

//Report_Print_BeforeShow @99-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @101-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @99-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow
?>
