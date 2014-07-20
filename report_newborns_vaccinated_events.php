<?php
//BindEvents Method @1-B80BB792  
function BindEvents()
{
    global $newbornSearch;
    global $Report_Print;
    $newbornSearch->CCSEvents["BeforeShow"] = "newbornSearch_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//newbornSearch_BeforeShow @8-F14D109F
function newbornSearch_BeforeShow(& $sender)
{
    $newbornSearch_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $newbornSearch; //Compatibility
//End newbornSearch_BeforeShow

//Hide-Show Component @15-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close newbornSearch_BeforeShow @8-25F2137B
    return $newbornSearch_BeforeShow;
}
//End Close newbornSearch_BeforeShow

//Report_Print_BeforeShow @12-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @14-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @12-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
