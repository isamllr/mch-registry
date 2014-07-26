<?php
//BindEvents Method @1-C99970BD
function BindEvents()
{
    global $Report1;
    global $Report_Print;
    global $Report3;
    global $CCSEvents;
    $Report1->Navigator->CCSEvents["BeforeShow"] = "Report1_Navigator_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $Report3->Navigator->CCSEvents["BeforeShow"] = "Report3_Navigator_BeforeShow";
}
//End BindEvents Method

//Report1_Navigator_BeforeShow @25-78E652A3
function Report1_Navigator_BeforeShow(& $sender)
{
    $Report1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report1; //Compatibility
//End Report1_Navigator_BeforeShow

//Hide-Show Component @26-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report1_Navigator_BeforeShow @25-115E333B
    return $Report1_Navigator_BeforeShow;
}
//End Close Report1_Navigator_BeforeShow

//Report_Print_BeforeShow @4-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @6-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @4-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow

//Report3_Navigator_BeforeShow @64-486F6826
function Report3_Navigator_BeforeShow(& $sender)
{
    $Report3_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report3; //Compatibility
//End Report3_Navigator_BeforeShow

//Hide-Show Component @65-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report3_Navigator_BeforeShow @64-C865FF34
    return $Report3_Navigator_BeforeShow;
}
//End Close Report3_Navigator_BeforeShow

//Page_BeforeInitialize @1-BB076885
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $report_pregnancy_outcome; //Compatibility
//End Page_BeforeInitialize

//FlashChart1 Initialization @76-795E168D
    if ('report_pregnancy_outcomeFlashChart1' == CCGetParam('callbackControl')) {
        global $CCSLocales;
        $Service = new Service();
        $formatter = new TemplateFormatter();
        $formatter->SetTemplate(file_get_contents(RelativePath . "/" . "report_pregnancy_outcomeFlashChart1.xml"));
        $Service->SetFormatter($formatter);
//End FlashChart1 Initialization

//FlashChart1 DataSource @76-A099ADE5
        $Service->DataSource = new clsDBregistry_db();
        $Service->ds = & $Service->DataSource;
        $Service->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $Service->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $Service->DataSource->wp = new clsSQLParameters();
        $Service->DataSource->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery1"], CCFormatDate(CCParseDate("9999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->SQL = "SELECT PregnancyOutcomeName, COUNT(*) AS TotalNumberOutcome \n" .
        "FROM\n" .
        "(\n" .
        "SELECT delivery.PregnancyOutcome1ID AS pregnancy_outcome, PregnancyOutcomeName, DeliveryID, 'O1' AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome1ID != -1\n" .
        "AND DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery<= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT delivery.PregnancyOutcome2ID AS pregnancy_outcome, PregnancyOutcomeName, DeliveryID, 'O2' AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome2ID != -1\n" .
        "AND DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery<= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT delivery.PregnancyOutcome3ID AS pregnancy_outcome, PregnancyOutcomeName, DeliveryID, 'O3' AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome3ID != -1\n" .
        "AND DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery<= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY PregnancyOutcomeName\n" .
        "";
        $Service->DataSource->Order = "";
        $Service->DataSource->PageSize = 25;
        $Service->SetDataSourceQuery($Service->DataSource->OptimizeSQL(CCBuildSQL($Service->DataSource->SQL, $Service->DataSource->Where, $Service->DataSource->Order)));
//End FlashChart1 DataSource

//FlashChart1 Execution @76-D19B13D1
        $Service->AddDataSetValue("Title", $CCSLocales->GetText("PregnancyOutcomeFacilitiesAll"));
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
