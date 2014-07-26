<?php
//BindEvents Method @1-0D08D4FE
function BindEvents()
{
    global $hospitalisation_pregnancy;
    global $facilities_hospitalisatio;
    global $Report_Print;
    $hospitalisation_pregnancy->Navigator->CCSEvents["BeforeShow"] = "hospitalisation_pregnancy_Navigator_BeforeShow";
    $facilities_hospitalisatio->CCSEvents["BeforeShow"] = "facilities_hospitalisatio_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//hospitalisation_pregnancy_Navigator_BeforeShow @54-E6F46C4A
function hospitalisation_pregnancy_Navigator_BeforeShow(& $sender)
{
    $hospitalisation_pregnancy_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $hospitalisation_pregnancy; //Compatibility
//End hospitalisation_pregnancy_Navigator_BeforeShow

//Hide-Show Component @55-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close hospitalisation_pregnancy_Navigator_BeforeShow @54-FEA621C2
    return $hospitalisation_pregnancy_Navigator_BeforeShow;
}
//End Close hospitalisation_pregnancy_Navigator_BeforeShow

//facilities_hospitalisatio_BeforeShow @28-EEDC58D7
function facilities_hospitalisatio_BeforeShow(& $sender)
{
    $facilities_hospitalisatio_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $facilities_hospitalisatio; //Compatibility
//End facilities_hospitalisatio_BeforeShow

//Hide-Show Component @40-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close facilities_hospitalisatio_BeforeShow @28-B77C0DDC
    return $facilities_hospitalisatio_BeforeShow;
}
//End Close facilities_hospitalisatio_BeforeShow

//Report_Print_BeforeShow @37-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @39-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @37-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow
?>
