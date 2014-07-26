<?php
//BindEvents Method @1-2E1B5366
function BindEvents()
{
    global $Report_Print;
    global $Report1;
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $Report1->Navigator->CCSEvents["BeforeShow"] = "Report1_Navigator_BeforeShow";
}
//End BindEvents Method

//Report_Print_BeforeShow @66-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @67-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @66-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow

//Report1_Navigator_BeforeShow @112-78E652A3
function Report1_Navigator_BeforeShow(& $sender)
{
    $Report1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report1; //Compatibility
//End Report1_Navigator_BeforeShow

//Hide-Show Component @113-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report1_Navigator_BeforeShow @112-115E333B
    return $Report1_Navigator_BeforeShow;
}
//End Close Report1_Navigator_BeforeShow


?>
