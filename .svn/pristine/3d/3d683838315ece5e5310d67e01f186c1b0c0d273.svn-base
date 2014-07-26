<?php
//BindEvents Method @1-0E8AF092
function BindEvents()
{
    global $delivery_deliverytype_fac;
    global $Report_Print;
    global $delivery_facilities1;
    global $delivery_facilities2;
    global $Report3;
    $delivery_deliverytype_fac->CCSEvents["BeforeShow"] = "delivery_deliverytype_fac_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $delivery_facilities1->PartnerDelivery->CCSEvents["BeforeShow"] = "delivery_facilities1_PartnerDelivery_BeforeShow";
    $delivery_facilities2->Partogram->CCSEvents["BeforeShow"] = "delivery_facilities2_Partogram_BeforeShow";
    $Report3->Physiological->CCSEvents["BeforeShow"] = "Report3_Physiological_BeforeShow";
}
//End BindEvents Method

//delivery_deliverytype_fac_BeforeShow @16-A4C2C84D
function delivery_deliverytype_fac_BeforeShow(& $sender)
{
    $delivery_deliverytype_fac_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_deliverytype_fac; //Compatibility
//End delivery_deliverytype_fac_BeforeShow

//Hide-Show Component @24-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_deliverytype_fac_BeforeShow @16-3EE45884
    return $delivery_deliverytype_fac_BeforeShow;
}
//End Close delivery_deliverytype_fac_BeforeShow

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

//delivery_facilities1_PartnerDelivery_BeforeShow @94-D238AC34
function delivery_facilities1_PartnerDelivery_BeforeShow(& $sender)
{
    $delivery_facilities1_PartnerDelivery_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities1; //Compatibility
//End delivery_facilities1_PartnerDelivery_BeforeShow

//Custom Code @95-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($delivery_facilities1->PartnerDelivery->GetValue() == 0)
		$delivery_facilities1->PartnerDelivery->SetValue($CCSLocales->GetText("RNo"));
	else if($delivery_facilities1->PartnerDelivery->GetValue() == 1)
		$delivery_facilities1->PartnerDelivery->SetValue($CCSLocales->GetText("RYes"));
// -------------------------
//End Custom Code

//Close delivery_facilities1_PartnerDelivery_BeforeShow @94-DE89D84A
    return $delivery_facilities1_PartnerDelivery_BeforeShow;
}
//End Close delivery_facilities1_PartnerDelivery_BeforeShow

//delivery_facilities2_Partogram_BeforeShow @128-C0F23802
function delivery_facilities2_Partogram_BeforeShow(& $sender)
{
    $delivery_facilities2_Partogram_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities2; //Compatibility
//End delivery_facilities2_Partogram_BeforeShow

//Custom Code @129-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($delivery_facilities2->Partogram->GetValue() == 0)
		$delivery_facilities2->Partogram->SetValue($CCSLocales->GetText("NotUsed"));
	else if($delivery_facilities2->Partogram->GetValue() == 1)
		$delivery_facilities2->Partogram->SetValue($CCSLocales->GetText("Used"));
// -------------------------
//End Custom Code

//Close delivery_facilities2_Partogram_BeforeShow @128-7A090864
    return $delivery_facilities2_Partogram_BeforeShow;
}
//End Close delivery_facilities2_Partogram_BeforeShow

//Report3_Physiological_BeforeShow @218-1993D980
function Report3_Physiological_BeforeShow(& $sender)
{
    $Report3_Physiological_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report3; //Compatibility
//End Report3_Physiological_BeforeShow

//Custom Code @219-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($Report3->Physiological->GetValue() == 'res:Non-Physiological')
		$Report3->Physiological->SetValue($CCSLocales->GetText("Non_physiological"));
	else if($Report3->Physiological->GetValue() == 'res:Physiological')
		$Report3->Physiological->SetValue($CCSLocales->GetText("Physiological"));
// -------------------------
//End Custom Code

//Close Report3_Physiological_BeforeShow @218-7960255D
    return $Report3_Physiological_BeforeShow;
}
//End Close Report3_Physiological_BeforeShow
?>
