<?php
//BindEvents Method @1-0F1CF1EC
function BindEvents()
{
    global $delivery_facilities1;
    global $delivery;
    global $Report_Print;
    global $CCSEvents;
    $delivery_facilities1->Partogram->CCSEvents["BeforeShow"] = "delivery_facilities1_Partogram_BeforeShow";
    $delivery_facilities1->Navigator->CCSEvents["BeforeShow"] = "delivery_facilities1_Navigator_BeforeShow";
    $delivery->Partogram->CCSEvents["BeforeShow"] = "delivery_Partogram_BeforeShow";
    $delivery->Navigator->CCSEvents["BeforeShow"] = "delivery_Navigator_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//delivery_facilities1_Partogram_BeforeShow @26-894901C6
function delivery_facilities1_Partogram_BeforeShow(& $sender)
{
    $delivery_facilities1_Partogram_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities1; //Compatibility
//End delivery_facilities1_Partogram_BeforeShow

//Custom Code @38-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($delivery_facilities1->Partogram->GetValue() == 0)
		$delivery_facilities1->Partogram->SetValue($CCSLocales->GetText("NotUsed"));
	else if($delivery_facilities1->Partogram->GetValue() == 1)
		$delivery_facilities1->Partogram->SetValue($CCSLocales->GetText("Used"));
// -------------------------
//End Custom Code

//Close delivery_facilities1_Partogram_BeforeShow @26-2217A14C
    return $delivery_facilities1_Partogram_BeforeShow;
}
//End Close delivery_facilities1_Partogram_BeforeShow

//delivery_facilities1_Navigator_BeforeShow @30-1698CBF6
function delivery_facilities1_Navigator_BeforeShow(& $sender)
{
    $delivery_facilities1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities1; //Compatibility
//End delivery_facilities1_Navigator_BeforeShow

//Hide-Show Component @31-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_facilities1_Navigator_BeforeShow @30-147737EE
    return $delivery_facilities1_Navigator_BeforeShow;
}
//End Close delivery_facilities1_Navigator_BeforeShow

//delivery_Partogram_BeforeShow @49-46057FCF
function delivery_Partogram_BeforeShow(& $sender)
{
    $delivery_Partogram_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_Partogram_BeforeShow

//Custom Code @50-2A29BDB7
// -------------------------
 global $CCSLocales;
	
	if($delivery->Partogram->GetValue() == 0)
		$delivery->Partogram->SetValue($CCSLocales->GetText("NotUsed"));
	else if($delivery->Partogram->GetValue() == 1)
		$delivery->Partogram->SetValue($CCSLocales->GetText("Used"));
// -------------------------
//End Custom Code

//Close delivery_Partogram_BeforeShow @49-D987E9DB
    return $delivery_Partogram_BeforeShow;
}
//End Close delivery_Partogram_BeforeShow

//delivery_Navigator_BeforeShow @60-5C3D66CF
function delivery_Navigator_BeforeShow(& $sender)
{
    $delivery_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery; //Compatibility
//End delivery_Navigator_BeforeShow

//Hide-Show Component @61-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_Navigator_BeforeShow @60-EFE77F79
    return $delivery_Navigator_BeforeShow;
}
//End Close delivery_Navigator_BeforeShow

//Report_Print_BeforeShow @69-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @70-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @69-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow

//Page_BeforeInitialize @1-17731316
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $report_delivery_partogram_district; //Compatibility
//End Page_BeforeInitialize

//FlashChart1 Initialization @76-06F27A3B
    if ('report_delivery_partogram_districtFlashChart1' == CCGetParam('callbackControl')) {
        global $CCSLocales;
        $Service = new Service();
        $formatter = new TemplateFormatter();
        $formatter->SetTemplate(file_get_contents(RelativePath . "/" . "report_delivery_partogram_districtFlashChart1.xml"));
        $Service->SetFormatter($formatter);
//End FlashChart1 Initialization

//FlashChart1 DataSource @76-40A371B1
        $Service->DataSource = new clsDBregistry_db();
        $Service->ds = & $Service->DataSource;
        $Service->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $Service->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $Service->DataSource->wp = new clsSQLParameters();
        $Service->DataSource->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery1"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->SQL = "SELECT COUNT(DeliveryID) AS DelivCount, '???' AS Partogram 	\n" .
        "FROM delivery\n" .
        "WHERE \n" .
        "delivery.DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND Partogram = 1\n" .
        "GROUP BY Partogram \n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT COUNT(DeliveryID) AS DelivCount, '??' AS Partogram 	\n" .
        "FROM delivery\n" .
        "WHERE\n" .
        "delivery.DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "' \n" .
        "AND Partogram = 0\n" .
        "GROUP BY Partogram";
        $Service->DataSource->Order = "";
        $Service->DataSource->PageSize = 25;
        $Service->SetDataSourceQuery($Service->DataSource->OptimizeSQL(CCBuildSQL($Service->DataSource->SQL, $Service->DataSource->Where, $Service->DataSource->Order)));
//End FlashChart1 DataSource


//FlashChart1 Execution @76-E4822714
        $Service->AddDataSetValue("Title", $CCSLocales->GetText("Partograms_inAll_facilities"));
        $Service->AddHttpHeader("Cache-Control", "cache, must-revalidate");
        $Service->AddHttpHeader("Pragma", "public");
        $Service->AddHttpHeader("Content-type", "text/xml");
        $Service->DisplayHeaders();
        echo $Service->Execute();
//End FlashChart1 Execution

//FlashChart1 Tail @76-27890EF8
        exit;
    }
//End FlashChart1 Tail

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize
?>
