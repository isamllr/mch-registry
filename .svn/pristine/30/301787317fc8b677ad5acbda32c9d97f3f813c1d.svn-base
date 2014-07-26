<?php
//BindEvents Method @1-C27A3F1B
function BindEvents()
{
    global $Report_Print;
    global $delivery_facilities_newbo;
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $delivery_facilities_newbo->CCSEvents["BeforeShow"] = "delivery_facilities_newbo_BeforeShow";
}
//End BindEvents Method

//Report_Print_BeforeShow @20-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @22-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @20-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow

//delivery_facilities_newbo_BeforeShow @51-F61B5173
function delivery_facilities_newbo_BeforeShow(& $sender)
{
    $delivery_facilities_newbo_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities_newbo; //Compatibility
//End delivery_facilities_newbo_BeforeShow

//Hide-Show Component @57-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_facilities_newbo_BeforeShow @51-96D90497
    return $delivery_facilities_newbo_BeforeShow;
}
//End Close delivery_facilities_newbo_BeforeShow


?>
