<?php
//BindEvents Method @1-89B52E51
function BindEvents()
{
    global $delivery_pcomplications_i1;
    global $Report_Print;
    $delivery_pcomplications_i1->Navigator->CCSEvents["BeforeShow"] = "delivery_pcomplications_i1_Navigator_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//delivery_pcomplications_i1_Navigator_BeforeShow @63-A404D7FF
function delivery_pcomplications_i1_Navigator_BeforeShow(& $sender)
{
    $delivery_pcomplications_i1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_pcomplications_i1; //Compatibility
//End delivery_pcomplications_i1_Navigator_BeforeShow

//Hide-Show Component @86-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_pcomplications_i1_Navigator_BeforeShow @63-4B89A186
    return $delivery_pcomplications_i1_Navigator_BeforeShow;
}
//End Close delivery_pcomplications_i1_Navigator_BeforeShow

//Report_Print_BeforeShow @21-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @23-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @21-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
