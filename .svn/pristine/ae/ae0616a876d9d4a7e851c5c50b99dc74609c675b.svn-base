<?php
//BindEvents Method @1-61AFBCD8
function BindEvents()
{
    global $delivery_deliverymethod_f1;
    global $delivery_deliverymethod_f;
    global $Report_Print;
    global $by_region;
    global $CCSEvents;
    $delivery_deliverymethod_f1->Navigator->CCSEvents["BeforeShow"] = "delivery_deliverymethod_f1_Navigator_BeforeShow";
    $delivery_deliverymethod_f->CCSEvents["BeforeShow"] = "delivery_deliverymethod_f_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $by_region->Navigator->CCSEvents["BeforeShow"] = "by_region_Navigator_BeforeShow";
}
//End BindEvents Method

//delivery_deliverymethod_f1_Navigator_BeforeShow @42-FAC7A05B
function delivery_deliverymethod_f1_Navigator_BeforeShow(& $sender)
{
    $delivery_deliverymethod_f1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_deliverymethod_f1; //Compatibility
//End delivery_deliverymethod_f1_Navigator_BeforeShow

//Hide-Show Component @83-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_deliverymethod_f1_Navigator_BeforeShow @42-F9C77F84
    return $delivery_deliverymethod_f1_Navigator_BeforeShow;
}
//End Close delivery_deliverymethod_f1_Navigator_BeforeShow

//delivery_deliverymethod_f_BeforeShow @15-FBCEFFD9
function delivery_deliverymethod_f_BeforeShow(& $sender)
{
    $delivery_deliverymethod_f_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_deliverymethod_f; //Compatibility
//End delivery_deliverymethod_f_BeforeShow

//Hide-Show Component @23-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_deliverymethod_f_BeforeShow @15-FD3ECD6A
    return $delivery_deliverymethod_f_BeforeShow;
}
//End Close delivery_deliverymethod_f_BeforeShow

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

//by_region_Navigator_BeforeShow @77-2356AA7F
function by_region_Navigator_BeforeShow(& $sender)
{
    $by_region_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $by_region; //Compatibility
//End by_region_Navigator_BeforeShow

//Hide-Show Component @78-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close by_region_Navigator_BeforeShow @77-6773DFDB
    return $by_region_Navigator_BeforeShow;
}
//End Close by_region_Navigator_BeforeShow

//Page_BeforeInitialize @1-22E3747A
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $report_delivery_method_district; //Compatibility
//End Page_BeforeInitialize

//FlashChart1 Initialization @86-62A9FAC2
    if ('report_delivery_method_districtFlashChart1' == CCGetParam('callbackControl')) {
        global $CCSLocales;
        $Service = new Service();
        $formatter = new TemplateFormatter();
        $formatter->SetTemplate(file_get_contents(RelativePath . "/" . "report_delivery_method_districtFlashChart1.xml"));
        $Service->SetFormatter($formatter);
//End FlashChart1 Initialization

//FlashChart1 DataSource @86-6F862104
        $Service->DataSource = new clsDBregistry_db();
        $Service->ds = & $Service->DataSource;
        $Service->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $Service->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $Service->DataSource->wp = new clsSQLParameters();
        $Service->DataSource->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery1"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->SQL = "SELECT DeliveryMethodName, COUNT(DeliveryID) AS DelivCount\n" .
        "FROM delivery INNER JOIN deliverymethod ON\n" .
        "delivery.DeliveryMethodID = deliverymethod.DeliveryMethodID\n" .
        "WHERE delivery.DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.DeliveryMethodID <> 99\n" .
        "GROUP BY DeliveryMethodName  {SQL_OrderBy}";
        $Service->DataSource->Order = "DeliveryMethodName";
        $Service->DataSource->PageSize = 25;
        $Service->SetDataSourceQuery($Service->DataSource->OptimizeSQL(CCBuildSQL($Service->DataSource->SQL, $Service->DataSource->Where, $Service->DataSource->Order)));
//End FlashChart1 DataSource

//FlashChart1 Execution @86-08A70CAF
        $Service->AddDataSetValue("Title", $CCSLocales->GetText("Delivery_method_inAll_facilities"));
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
