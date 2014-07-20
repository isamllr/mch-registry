<?php
//BindEvents Method @1-398C1E62
function BindEvents()
{
    global $delivery_facilities1;
    global $delivery_facilities;
    global $Report_Print;
    global $delivery;
    global $CCSEvents;
    $delivery_facilities1->PartnerDelivery->CCSEvents["BeforeShow"] = "delivery_facilities1_PartnerDelivery_BeforeShow";
    $delivery_facilities1->Navigator->CCSEvents["BeforeShow"] = "delivery_facilities1_Navigator_BeforeShow";
    $delivery_facilities->CCSEvents["BeforeShow"] = "delivery_facilities_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $delivery->PartnerDelivery->CCSEvents["BeforeShow"] = "delivery_PartnerDelivery_BeforeShow";
    $delivery->Navigator->CCSEvents["BeforeShow"] = "delivery_Navigator_BeforeShow";
}
//End BindEvents Method

//delivery_facilities1_PartnerDelivery_BeforeShow @35-D238AC34
function delivery_facilities1_PartnerDelivery_BeforeShow(& $sender)
{
    $delivery_facilities1_PartnerDelivery_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities1; //Compatibility
//End delivery_facilities1_PartnerDelivery_BeforeShow

//Custom Code @44-2A29BDB7
// -------------------------
	global $CCSLocales;
	
	if($delivery_facilities1->PartnerDelivery->GetValue() == 0)
		$delivery_facilities1->PartnerDelivery->SetValue($CCSLocales->GetText("RNo"));
	else if($delivery_facilities1->PartnerDelivery->GetValue() == 1)
		$delivery_facilities1->PartnerDelivery->SetValue($CCSLocales->GetText("RYes"));
// -------------------------
//End Custom Code

//Close delivery_facilities1_PartnerDelivery_BeforeShow @35-DE89D84A
    return $delivery_facilities1_PartnerDelivery_BeforeShow;
}
//End Close delivery_facilities1_PartnerDelivery_BeforeShow

//delivery_facilities1_Navigator_BeforeShow @39-1698CBF6
function delivery_facilities1_Navigator_BeforeShow(& $sender)
{
    $delivery_facilities1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities1; //Compatibility
//End delivery_facilities1_Navigator_BeforeShow

//Hide-Show Component @40-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_facilities1_Navigator_BeforeShow @39-147737EE
    return $delivery_facilities1_Navigator_BeforeShow;
}
//End Close delivery_facilities1_Navigator_BeforeShow

//delivery_facilities_BeforeShow @12-7E20A17E
function delivery_facilities_BeforeShow(& $sender)
{
    $delivery_facilities_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities; //Compatibility
//End delivery_facilities_BeforeShow

//Hide-Show Component @20-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_facilities_BeforeShow @12-4B7A4FB5
    return $delivery_facilities_BeforeShow;
}
//End Close delivery_facilities_BeforeShow

//Report_Print_BeforeShow @17-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @19-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @17-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow

//delivery_PartnerDelivery_BeforeShow @70-6FFEB98F
function delivery_PartnerDelivery_BeforeShow(& $sender)
{
    $delivery_PartnerDelivery_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_PartnerDelivery_BeforeShow

//Custom Code @78-2A29BDB7
// -------------------------
	global $CCSLocales;
	
	if($delivery->PartnerDelivery->GetValue() == 0)
		$delivery->PartnerDelivery->SetValue($CCSLocales->GetText("RNo"));
	else if($delivery->PartnerDelivery->GetValue() == 1)
		$delivery->PartnerDelivery->SetValue($CCSLocales->GetText("RYes"));
// -------------------------
//End Custom Code

//Close delivery_PartnerDelivery_BeforeShow @70-B2B890AC
    return $delivery_PartnerDelivery_BeforeShow;
}
//End Close delivery_PartnerDelivery_BeforeShow

//delivery_Navigator_BeforeShow @73-5C3D66CF
function delivery_Navigator_BeforeShow(& $sender)
{
    $delivery_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_Navigator_BeforeShow

//Hide-Show Component @74-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_Navigator_BeforeShow @73-EFE77F79
    return $delivery_Navigator_BeforeShow;
}
//End Close delivery_Navigator_BeforeShow

//Page_BeforeInitialize @1-04F7C8C2
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $report_delivery_partner_district; //Compatibility
//End Page_BeforeInitialize

//FlashChart1 Initialization @86-37BBCC12
    if ('report_delivery_partner_districtFlashChart1' == CCGetParam('callbackControl')) {
        global $CCSLocales;
        $Service = new Service();
        $formatter = new TemplateFormatter();
        $formatter->SetTemplate(file_get_contents(RelativePath . "/" . "report_delivery_partner_districtFlashChart1.xml"));
        $Service->SetFormatter($formatter);
//End FlashChart1 Initialization

//FlashChart1 DataSource @86-046AD6D8
        $Service->DataSource = new clsDBregistry_db();
        $Service->ds = & $Service->DataSource;
        $Service->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $Service->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $Service->DataSource->wp = new clsSQLParameters();
        $Service->DataSource->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery1"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->SQL = "SELECT COUNT(DeliveryID) AS DelivCount, '???' AS PartnerDelivery 	\n" .
        "FROM delivery\n" .
        "WHERE delivery.DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND PartnerDelivery = 1\n" .
        "GROUP BY PartnerDelivery \n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT COUNT(DeliveryID) AS DelivCount, '??' AS PartnerDelivery 	\n" .
        "FROM delivery\n" .
        "WHERE delivery.DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND PartnerDelivery = 0\n" .
        "GROUP BY PartnerDelivery";
        $Service->DataSource->Order = "";
        $Service->DataSource->PageSize = 25;
        $Service->SetDataSourceQuery($Service->DataSource->OptimizeSQL(CCBuildSQL($Service->DataSource->SQL, $Service->DataSource->Where, $Service->DataSource->Order)));
//End FlashChart1 DataSource

//FlashChart1 Execution @86-188E9E9A
        $Service->AddDataSetValue("Title", $CCSLocales->GetText("Partner_deliveries_inall_facilities"));
        $Service->AddHttpHeader("Cache-Control", "cache, must-revalidate");
        $Service->AddHttpHeader("Pragma", "public");
        $Service->AddHttpHeader("Content-type", "text/xml");
        $Service->DisplayHeaders();
        echo $Service->Execute();
//End FlashChart1 Execution

//FlashChart1 Tail @86-27890EF8
        exit;
    }
//End FlashChart1 Tail

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize


?>
