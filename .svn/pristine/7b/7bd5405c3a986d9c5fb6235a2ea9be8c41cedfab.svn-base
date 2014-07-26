<?php
//BindEvents Method @1-70403650
function BindEvents()
{
    global $Report1;
    global $Report_Print;
    global $Report3;
    global $CCSEvents;
    $Report1->Physiological->CCSEvents["BeforeShow"] = "Report1_Physiological_BeforeShow";
    $Report1->Navigator->CCSEvents["BeforeShow"] = "Report1_Navigator_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $Report3->Physiological->CCSEvents["BeforeShow"] = "Report3_Physiological_BeforeShow";
    $Report3->Navigator->CCSEvents["BeforeShow"] = "Report3_Navigator_BeforeShow";
}
//End BindEvents Method

//Report1_Physiological_BeforeShow @21-5D6DFC62
function Report1_Physiological_BeforeShow(& $sender)
{
    $Report1_Physiological_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report1; //Compatibility
//End Report1_Physiological_BeforeShow

//Custom Code @68-2A29BDB7
// -------------------------
 global $CCSLocales;
	
	if($Report1->Physiological->GetValue() == 'res:Non-Physiological')
		$Report1->Physiological->SetValue($CCSLocales->GetText("Non_physiological"));
	else if($Report1->Physiological->GetValue() == 'res:Physiological')
		$Report1->Physiological->SetValue($CCSLocales->GetText("Physiological"));
// -------------------------
//End Custom Code

//Close Report1_Physiological_BeforeShow @21-7A0BDF67
    return $Report1_Physiological_BeforeShow;
}
//End Close Report1_Physiological_BeforeShow

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

//Report3_Physiological_BeforeShow @57-1993D980
function Report3_Physiological_BeforeShow(& $sender)
{
    $Report3_Physiological_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report3; //Compatibility
//End Report3_Physiological_BeforeShow

//Custom Code @69-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($Report3->Physiological->GetValue() == 'res:Non-Physiological')
		$Report3->Physiological->SetValue($CCSLocales->GetText("Non_physiological"));
	else if($Report3->Physiological->GetValue() == 'res:Physiological')
		$Report3->Physiological->SetValue($CCSLocales->GetText("Physiological"));
// -------------------------
//End Custom Code

//Close Report3_Physiological_BeforeShow @57-7960255D
    return $Report3_Physiological_BeforeShow;
}
//End Close Report3_Physiological_BeforeShow

//Report3_Navigator_BeforeShow @60-486F6826
function Report3_Navigator_BeforeShow(& $sender)
{
    $Report3_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report3; //Compatibility
//End Report3_Navigator_BeforeShow

//Hide-Show Component @61-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report3_Navigator_BeforeShow @60-C865FF34
    return $Report3_Navigator_BeforeShow;
}
//End Close Report3_Navigator_BeforeShow

//Page_BeforeInitialize @1-0D6F3B0C
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $report_physiological_delivery; //Compatibility
//End Page_BeforeInitialize

//FlashChart1 Initialization @72-F5B6E652
    if ('report_physiological_deliveryFlashChart1' == CCGetParam('callbackControl')) {
        global $CCSLocales;
        $Service = new Service();
        $formatter = new TemplateFormatter();
        $formatter->SetTemplate(file_get_contents(RelativePath . "/" . "report_physiological_deliveryFlashChart1.xml"));
        $Service->SetFormatter($formatter);
//End FlashChart1 Initialization

//FlashChart1 DataSource @72-0040764F
        $Service->DataSource = new clsDBregistry_db();
        $Service->ds = & $Service->DataSource;
        $Service->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $Service->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $Service->DataSource->wp = new clsSQLParameters();
        $Service->DataSource->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $Service->DataSource->Parameters["urls_DataDelivery1"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $Service->DataSource->SQL = "SELECT COUNT(delivery.DeliveryID) AS DelivCount, '1' AS Physiological\n" .
        "FROM (delivery LEFT JOIN procedures ON\n" .
        "procedures.DeliveryID = delivery.DeliveryID) LEFT JOIN anesthesia ON\n" .
        "anesthesia.DeliveryID = delivery.DeliveryID\n" .
        "WHERE \n" .
        "DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery <= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND \n" .
        "(PregnancyOutcome1ID = 1 OR\n" .
        "PregnancyOutcome1ID = 2 OR\n" .
        "PregnancyOutcome2ID = 1 OR\n" .
        "PregnancyOutcome2ID = 2 OR\n" .
        "PregnancyOutcome3ID = 1 OR\n" .
        "PregnancyOutcome3ID = 2)\n" .
        "AND delivery.SteroidsYesNo = 0\n" .
        "AND delivery.Antibiotics = 0\n" .
        "AND delivery.ART = 0\n" .
        "AND delivery.Uterotoics = 0\n" .
        "AND ( procedures.ProcedureTypeID IS NULL )\n" .
        "AND delivery.DeliveryMethodID = 1\n" .
        "AND ( anesthesia.AnesthesiaID IS NULL )\n" .
        "AND delivery.GestationAge >= 37\n" .
        "AND delivery.GestationAge <= 41\n" .
        "GROUP BY Physiological\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT COUNT(delivery.DeliveryID) AS DelivCount, '2' AS Physiological\n" .
        "FROM (delivery LEFT JOIN procedures ON\n" .
        "procedures.DeliveryID = delivery.DeliveryID) LEFT JOIN anesthesia ON\n" .
        "anesthesia.DeliveryID = delivery.DeliveryID\n" .
        "WHERE \n" .
        "DataDelivery >= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery <= '" . $Service->DataSource->SQLValue($Service->DataSource->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND \n" .
        "(PregnancyOutcome1ID = 1 OR\n" .
        "PregnancyOutcome1ID = 2 OR\n" .
        "PregnancyOutcome2ID = 1 OR\n" .
        "PregnancyOutcome2ID = 2 OR\n" .
        "PregnancyOutcome3ID = 1 OR\n" .
        "PregnancyOutcome3ID = 2)\n" .
        "AND (delivery.SteroidsYesNo != 0\n" .
        "OR delivery.Antibiotics != 0\n" .
        "OR delivery.ART != 0\n" .
        "OR delivery.Uterotoics != 0\n" .
        "OR ( procedures.ProcedureTypeID IS NOT NULL )\n" .
        "OR delivery.DeliveryMethodID != 1\n" .
        "OR ( anesthesia.AnesthesiaID IS NOT NULL )\n" .
        "OR delivery.GestationAge < 37\n" .
        "OR delivery.GestationAge > 41)\n" .
        "GROUP BY Physiological";
        $Service->DataSource->Order = "";
        $Service->DataSource->PageSize = 25;
        $Service->SetDataSourceQuery($Service->DataSource->OptimizeSQL(CCBuildSQL($Service->DataSource->SQL, $Service->DataSource->Where, $Service->DataSource->Order)));
//End FlashChart1 DataSource

//FlashChart1 Execution @72-2D83E484
        $Service->AddDataSetValue("Title", $CCSLocales->GetText("PhysiologicalDeliveryInAllFacilities"));
        $Service->AddHttpHeader("Cache-Control", "cache, must-revalidate");
        $Service->AddHttpHeader("Pragma", "public");
        $Service->AddHttpHeader("Content-type", "text/xml");
        $Service->DisplayHeaders();
        echo $Service->Execute();
//End FlashChart1 Execution



//FlashChart1 Tail @72-27890EF8
        exit;
    }
//End FlashChart1 Tail

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize
?>
