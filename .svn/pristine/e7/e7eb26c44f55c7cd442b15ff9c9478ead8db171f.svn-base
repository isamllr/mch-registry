<?php
//BindEvents Method @1-65707702
function BindEvents()
{
    global $delivery_facilities_deliv;
    global $delivery_deliverytype_fac;
    global $Report_Print;
    global $delivery_deliverytype;
    global $CCSEvents;
    $delivery_facilities_deliv->Navigator->CCSEvents["BeforeShow"] = "delivery_facilities_deliv_Navigator_BeforeShow";
    $delivery_deliverytype_fac->CCSEvents["BeforeShow"] = "delivery_deliverytype_fac_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $delivery_deliverytype->Navigator->CCSEvents["BeforeShow"] = "delivery_deliverytype_Navigator_BeforeShow";
}
//End BindEvents Method

//delivery_facilities_deliv_Navigator_BeforeShow @43-BB636732
function delivery_facilities_deliv_Navigator_BeforeShow(& $sender)
{
    $delivery_facilities_deliv_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities_deliv; //Compatibility
//End delivery_facilities_deliv_Navigator_BeforeShow

//Hide-Show Component @44-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_facilities_deliv_Navigator_BeforeShow @43-821F319F
    return $delivery_facilities_deliv_Navigator_BeforeShow;
}
//End Close delivery_facilities_deliv_Navigator_BeforeShow

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

//delivery_deliverytype_Navigator_BeforeShow @81-B732841B
function delivery_deliverytype_Navigator_BeforeShow(& $sender)
{
    $delivery_deliverytype_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_deliverytype; //Compatibility
//End delivery_deliverytype_Navigator_BeforeShow

//Hide-Show Component @82-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_deliverytype_Navigator_BeforeShow @81-59959B3E
    return $delivery_deliverytype_Navigator_BeforeShow;
}
//End Close delivery_deliverytype_Navigator_BeforeShow

//Page_BeforeInitialize @1-CE330718
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $report_delivery_type_district; //Compatibility
//End Page_BeforeInitialize

//FlashChart1 Initialization @93-C780F3C5
    if ('report_delivery_type_districtFlashChart1' == CCGetParam('callbackControl')) {
        global $CCSLocales;
        $Service = new Service();
        $formatter = new TemplateFormatter();
        $formatter->SetTemplate(file_get_contents(RelativePath . "/" . "report_delivery_type_districtFlashChart1.xml"));
        $Service->SetFormatter($formatter);
//End FlashChart1 Initialization

//FlashChart1 DataSource @93-27754B72
        $Service->DataSource = new clsDBregistry_db();
        $Service->ds = & $Service->DataSource;
        $Service->DataSource->SQL = "SELECT DeliveryTypeName, COUNT(DeliveryID) AS DelivCount \n" .
"FROM delivery LEFT JOIN deliverytype ON\n" .
"delivery.DeliveryTypeID = deliverytype.DeliveryTypeID {SQL_Where}\n" .
"GROUP BY DeliveryTypeName {SQL_OrderBy}";
        $Service->DataSource->Order = "DeliveryTypeName";
        $Service->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $Service->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $Service->DataSource->wp = new clsSQLParameters();
        $Service->DataSource->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery"], "", false);
        $Service->DataSource->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery1"], "", false);
        $Service->DataSource->wp->Criterion[1] = $Service->DataSource->wp->Operation(opGreaterThanOrEqual, "delivery.DataDelivery", $Service->DataSource->wp->GetDBValue("1"), $Service->DataSource->ToSQL($Service->DataSource->wp->GetDBValue("1"), ccsDate),false);
        $Service->DataSource->wp->Criterion[2] = $Service->DataSource->wp->Operation(opLessThanOrEqual, "delivery.DataDelivery", $Service->DataSource->wp->GetDBValue("2"), $Service->DataSource->ToSQL($Service->DataSource->wp->GetDBValue("2"), ccsDate),false);
        $Service->DataSource->Where = $Service->DataSource->wp->opAND(
             false, 
             $Service->DataSource->wp->Criterion[1], 
             $Service->DataSource->wp->Criterion[2]);
        $Service->DataSource->Order = "DeliveryTypeName";
        $Service->DataSource->PageSize = 25;
        $Service->SetDataSourceQuery($Service->DataSource->OptimizeSQL(CCBuildSQL($Service->DataSource->SQL, $Service->DataSource->Where, $Service->DataSource->Order)));
//End FlashChart1 DataSource

//FlashChart1 Execution @93-FED6E84B
        $Service->AddDataSetValue("Title", $CCSLocales->GetText("Delivery_types_inAll_facilities"));
        $Service->AddHttpHeader("Cache-Control", "cache, must-revalidate");
        $Service->AddHttpHeader("Pragma", "public");
        $Service->AddHttpHeader("Content-type", "text/xml");
        $Service->DisplayHeaders();
        echo $Service->Execute();
//End FlashChart1 Execution

//FlashChart1 Tail @93-27890EF8
        exit;
    }
//End FlashChart1 Tail

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize
?>
