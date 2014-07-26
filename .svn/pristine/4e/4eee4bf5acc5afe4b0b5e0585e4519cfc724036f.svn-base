<?php

class clsMenutopmenumyMenuAdmin extends clsMenu { //myMenuAdmin class @2-4A10C161

//Class_Initialize Event @2-271AED84
    function clsMenutopmenumyMenuAdmin($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "myMenuAdmin";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu myMenuAdmin";

        $this->StaticItems = array();
        $this->StaticItems[] = array("item_id" => "MenuItem14", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("MenuHome"), "item_url" => array("Page" => $this->RelativePath . "dashboard.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem12", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("patient"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem12Item1", "item_id_parent" => "MenuItem12", "item_caption" => $CCSLocales->GetText("CCS_Search"), "item_url" => array("Page" => $this->RelativePath . "patient_list.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("menureports"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item10", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("PregRisksReportLastVisit"), "item_url" => array("Page" => $this->RelativePath . "report_risks_visit.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item1", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("PregRisksReportAll"), "item_url" => array("Page" => $this->RelativePath . "report_risks.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item9", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("Statistical_reports_for_district_level"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item9Item1", "item_id_parent" => "MenuItem13Item9", "item_caption" => $CCSLocales->GetText("delivery_deliverymethod_district"), "item_url" => array("Page" => $this->RelativePath . "report_delivery_method_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item9Item2", "item_id_parent" => "MenuItem13Item9", "item_caption" => $CCSLocales->GetText("PartnerDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_delivery_partner_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item9Item3", "item_id_parent" => "MenuItem13Item9", "item_caption" => $CCSLocales->GetText("PartogramDistrictReport"), "item_url" => array("Page" => $this->RelativePath . "report_delivery_partogram_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item9Item4", "item_id_parent" => "MenuItem13Item9", "item_caption" => $CCSLocales->GetText("DeliveryTypeID"), "item_url" => array("Page" => $this->RelativePath . "report_delivery_type_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item9Item5", "item_id_parent" => "MenuItem13Item9", "item_caption" => $CCSLocales->GetText("PhysiologicalDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_physiological_delivery.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item9Item6", "item_id_parent" => "MenuItem13Item9", "item_caption" => $CCSLocales->GetText("pregnancy_outcome"), "item_url" => array("Page" => $this->RelativePath . "report_pregnancy_outcome.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item11", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("F21"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item11Item1", "item_id_parent" => "MenuItem13Item11", "item_caption" => $CCSLocales->GetText("AntenatalActivity"), "item_url" => array("Page" => $this->RelativePath . "report_f21_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item11Item2", "item_id_parent" => "MenuItem13Item11", "item_caption" => $CCSLocales->GetText("Newborn_report"), "item_url" => array("Page" => $this->RelativePath . "report_on_newborn_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item11Item3", "item_id_parent" => "MenuItem13Item11", "item_caption" => $CCSLocales->GetText("DeliveryHospital"), "item_url" => array("Page" => $this->RelativePath . "report_multiple_and_first_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item11Item4", "item_id_parent" => "MenuItem13Item11", "item_caption" => $CCSLocales->GetText("ComplicationsDuringDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_complications_during_delivery_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item11Item5", "item_id_parent" => "MenuItem13Item11", "item_caption" => $CCSLocales->GetText("ComplicationsAfterDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_complications_after_delivery_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item11Item6", "item_id_parent" => "MenuItem13Item11", "item_caption" => $CCSLocales->GetText("F21_During"), "item_url" => array("Page" => $this->RelativePath . "report_f21_disease_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("MenuTools"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item9", "item_id_parent" => "MenuItem11", "item_caption" => $CCSLocales->GetText("myAccount"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item9Item1", "item_id_parent" => "MenuItem11Item9", "item_caption" => $CCSLocales->GetText("login"), "item_url" => array("Page" => $this->RelativePath . "plogin_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item9Item2", "item_id_parent" => "MenuItem11Item9", "item_caption" => $CCSLocales->GetText("personalInformation"), "item_url" => array("Page" => $this->RelativePath . "pinfo_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item8", "item_id_parent" => "MenuItem11", "item_caption" => $CCSLocales->GetText("employeesF21"), "item_url" => array("Page" => $this->RelativePath . "employees_list.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
		$this->StaticItems[] = array("item_id" => "MenuItem11Item10", "item_id_parent" => "MenuItem11", "item_caption" => $CCSLocales->GetText("MenuConfigure"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item10Item1", "item_id_parent" => "MenuItem11Item10", "item_caption" => $CCSLocales->GetText("countries"), "item_url" => array("Page" => $this->RelativePath . "countries_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item10Item2", "item_id_parent" => "MenuItem11Item10", "item_caption" => $CCSLocales->GetText("StateOrProvince"), "item_url" => array("Page" => $this->RelativePath . "province_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item10Item3", "item_id_parent" => "MenuItem11Item10", "item_caption" => $CCSLocales->GetText("districts"), "item_url" => array("Page" => $this->RelativePath . "districts_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item10Item4", "item_id_parent" => "MenuItem11Item10", "item_caption" => $CCSLocales->GetText("facilities"), "item_url" => array("Page" => $this->RelativePath . "facilities_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item10Item5", "item_id_parent" => "MenuItem11Item10", "item_caption" => $CCSLocales->GetText("department"), "item_url" => array("Page" => $this->RelativePath . "department_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
		$this->StaticItems[] = array("item_id" => "MenuItem11Item7", "item_id_parent" => "MenuItem11Item10", "item_caption" => $CCSLocales->GetText("notifications"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
		$this->StaticItems[] = array("item_id" => "MenuItem15Item1", "item_id_parent" => "MenuItem11Item7", "item_caption" => $CCSLocales->GetText("notificationsettings"), "item_url" => array("Page" => $this->RelativePath . "notifications_settings_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
                $this->StaticItems[] = array("item_id" => "MenuItem15Item2", "item_id_parent" => "MenuItem11Item7", "item_caption" => $CCSLocales->GetText("notificationsedit"), "item_url" => array("Page" => $this->RelativePath . "notifications_edit_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
		$this->StaticItems[] = array("item_id" => "MenuItem15Item2", "item_id_parent" => "MenuItem11Item7", "item_caption" => $CCSLocales->GetText("recommendationsnotificationsedit"), "item_url" => array("Page" => $this->RelativePath . "notifications_recommendations_edit_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
		        $this->StaticItems[] = array("item_id" => "MenuItem15Item2", "item_id_parent" => "MenuItem11Item7", "item_caption" => $CCSLocales->GetText("notificationssmsconfiguration"), "item_url" => array("Page" => $this->RelativePath . "notifications_smsconfiguration_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
		$this->StaticItems[] = array("item_id" => "MenuItem11Item11", "item_id_parent" => "MenuItem11", "item_caption" => $CCSLocales->GetText("doctorsF21"), "item_url" => array("Page" => $this->RelativePath . "doctors_list.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem9", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("CCS_LogoutBtn"), "item_url" => array("Page" => $this->RelativePath . "logout.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));

        $this->DataSource = new clstopmenumyMenuAdminDataSource($this);
        $this->ds = & $this->DataSource;
        $this->DataSource->SetProvider(array("DBLib" => "Array"));

        parent::clsMenu("item_id_parent", "item_id", null);
        $this->Visible = (CCSecurityAccessCheck("1") == "success");

        $this->ItemLink = new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @2-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @2-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End myMenuAdmin Class @2-FCB6E20C

//topmenumyMenuAdminDataSource Class @2-713AA442
class clstopmenumyMenuAdminDataSource extends DB_Adapter {
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;
    var $wp;
    var $Record = array();
    var $Index;
    var $FieldsList = array();

    function clstopmenumyMenuAdminDataSource($parent) {
        $this->Parent = & $parent;
        $this->ErrorBlock = "Menu myMenuAdmin";
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;
    }

    function Prepare()
    {
    }

    function Open()
    {
        $this->query($this->Parent->StaticItems);
    }

    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("item_caption"));
    }
}
//End topmenumyMenuAdminDataSource Class

class clsMenutopmenumyMenuObl extends clsMenu { //myMenuObl class @84-79D22849

//Class_Initialize Event @84-E8306824
    function clsMenutopmenumyMenuObl($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "myMenuObl";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu myMenuObl";

        $this->StaticItems = array();
        $this->StaticItems[] = array("item_id" => "MenuItem14", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("MenuHome"), "item_url" => array("Page" => $this->RelativePath . "dashboard.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem12", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("patient"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem12Item1", "item_id_parent" => "MenuItem12", "item_caption" => $CCSLocales->GetText("CCS_Search"), "item_url" => array("Page" => $this->RelativePath . "patient_list.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("menureports"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item4", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("PregRisksReportLastVisit"), "item_url" => array("Page" => $this->RelativePath . "report_risks_visit.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item1", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("PregRisksReportAll"), "item_url" => array("Page" => $this->RelativePath . "report_risks.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item3", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("Statistical_reports_for_district_level"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item3Item1", "item_id_parent" => "MenuItem13Item3", "item_caption" => $CCSLocales->GetText("delivery_deliverymethod_district"), "item_url" => array("Page" => $this->RelativePath . "report_delivery_method_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item3Item2", "item_id_parent" => "MenuItem13Item3", "item_caption" => $CCSLocales->GetText("PartnerDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_delivery_partner_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item3Item3", "item_id_parent" => "MenuItem13Item3", "item_caption" => $CCSLocales->GetText("PartogramDistrictReport"), "item_url" => array("Page" => $this->RelativePath . "report_delivery_partogram_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item3Item4", "item_id_parent" => "MenuItem13Item3", "item_caption" => $CCSLocales->GetText("DeliveryTypeID"), "item_url" => array("Page" => $this->RelativePath . "report_delivery_type_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item3Item5", "item_id_parent" => "MenuItem13Item3", "item_caption" => $CCSLocales->GetText("PhysiologicalDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_physiological_delivery.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item3Item6", "item_id_parent" => "MenuItem13Item3", "item_caption" => $CCSLocales->GetText("pregnancy_outcome"), "item_url" => array("Page" => $this->RelativePath . "report_pregnancy_outcome.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item5", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("F21"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item5Item1", "item_id_parent" => "MenuItem13Item5", "item_caption" => $CCSLocales->GetText("AntenatalActivity"), "item_url" => array("Page" => $this->RelativePath . "report_f21_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item5Item2", "item_id_parent" => "MenuItem13Item5", "item_caption" => $CCSLocales->GetText("Newborn_report"), "item_url" => array("Page" => $this->RelativePath . "report_on_newborn_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item5Item3", "item_id_parent" => "MenuItem13Item5", "item_caption" => $CCSLocales->GetText("DeliveryHospital"), "item_url" => array("Page" => $this->RelativePath . "report_multiple_and_first_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item5Item4", "item_id_parent" => "MenuItem13Item5", "item_caption" => $CCSLocales->GetText("ComplicationsDuringDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_complications_during_delivery_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item5Item5", "item_id_parent" => "MenuItem13Item5", "item_caption" => $CCSLocales->GetText("ComplicationsAfterDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_complications_after_delivery_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item5Item6", "item_id_parent" => "MenuItem13Item5", "item_caption" => $CCSLocales->GetText("F21_During"), "item_url" => array("Page" => $this->RelativePath . "report_f21_disease_district.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item9", "item_id_parent" => "MenuItem11", "item_caption" => $CCSLocales->GetText("myAccount"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item9Item1", "item_id_parent" => "MenuItem11Item9", "item_caption" => $CCSLocales->GetText("login"), "item_url" => array("Page" => $this->RelativePath . "plogin_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item9Item2", "item_id_parent" => "MenuItem11Item9", "item_caption" => $CCSLocales->GetText("personalInformation"), "item_url" => array("Page" => $this->RelativePath . "pinfo_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item10", "item_id_parent" => "MenuItem11", "item_caption" => $CCSLocales->GetText("library"), "item_url" => array("Page" => $this->RelativePath . "library.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem9", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("CCS_LogoutBtn"), "item_url" => array("Page" => $this->RelativePath . "logout.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));

        $this->DataSource = new clstopmenumyMenuOblDataSource($this);
        $this->ds = & $this->DataSource;
        $this->DataSource->SetProvider(array("DBLib" => "Array"));

        parent::clsMenu("item_id_parent", "item_id", null);
        $this->Visible = (CCSecurityAccessCheck("2") == "success");

        $this->ItemLink = new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @84-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @84-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End myMenuObl Class @84-FCB6E20C

//topmenumyMenuOblDataSource Class @84-4052926D
class clstopmenumyMenuOblDataSource extends DB_Adapter {
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;
    var $wp;
    var $Record = array();
    var $Index;
    var $FieldsList = array();

    function clstopmenumyMenuOblDataSource($parent) {
        $this->Parent = & $parent;
        $this->ErrorBlock = "Menu myMenuObl";
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;
    }

    function Prepare()
    {
    }

    function Open()
    {
        $this->query($this->Parent->StaticItems);
    }

    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("item_caption"));
    }
}
//End topmenumyMenuOblDataSource Class

class clsMenutopmenumyMenuFac extends clsMenu { //myMenuFac class @97-5CA10C1A

//Class_Initialize Event @97-98D2FAEA
    function clsMenutopmenumyMenuFac($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "myMenuFac";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu myMenuFac";

        $this->StaticItems = array();
        $this->StaticItems[] = array("item_id" => "MenuItem14", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("MenuHome"), "item_url" => array("Page" => $this->RelativePath . "dashboard.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem12", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("patient"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem12Item1", "item_id_parent" => "MenuItem12", "item_caption" => $CCSLocales->GetText("CCS_Search"), "item_url" => array("Page" => $this->RelativePath . "patient_list.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem12Item2", "item_id_parent" => "MenuItem12", "item_caption" => $CCSLocales->GetText("CCS_InsertLink"), "item_url" => array("Page" => $this->RelativePath . "patient_maint_fac.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("menureports"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item7", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("PregRisksReportLastVisit"), "item_url" => array("Page" => $this->RelativePath . "report_risks_visit.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item1", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("PregRisksReportAll"), "item_url" => array("Page" => $this->RelativePath . "report_risks_facilities.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item3", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("report_visit_date2"), "item_url" => array("Page" => $this->RelativePath . "report_visit_date.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item5", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("hospitalisationpregnancypatientfacilities"), "item_url" => array("Page" => $this->RelativePath . "report_hospitalisations.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item2", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("report_expected_date_of_delivery_facilities"), "item_url" => array("Page" => $this->RelativePath . "report_expected_date_of_delivery_facilities.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item4", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("patientpregnancydelivery"), "item_url" => array("Page" => $this->RelativePath . "report_localities.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item6", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("Statistical_reports_facility"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item6Item1", "item_id_parent" => "MenuItem13Item6", "item_caption" => $CCSLocales->GetText("DeliveryInfo"), "item_url" => array("Page" => $this->RelativePath . "report_statistical_delivery_facilities.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item6Item2", "item_id_parent" => "MenuItem13Item6", "item_caption" => $CCSLocales->GetText("Report_gestation"), "item_url" => array("Page" => $this->RelativePath . "report_DeliveryGestationalAge.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item6Item3", "item_id_parent" => "MenuItem13Item6", "item_caption" => $CCSLocales->GetText("vaccinated"), "item_url" => array("Page" => $this->RelativePath . "report_newborns_vaccinated.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item6Item4", "item_id_parent" => "MenuItem13Item6", "item_caption" => $CCSLocales->GetText("average"), "item_url" => array("Page" => $this->RelativePath . "report_average.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item6Item5", "item_id_parent" => "MenuItem13Item6", "item_caption" => $CCSLocales->GetText("obstetrical"), "item_url" => array("Page" => $this->RelativePath . "report_obstetrical_intervention.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item8", "item_id_parent" => "MenuItem13", "item_caption" => $CCSLocales->GetText("F21"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item8Item1", "item_id_parent" => "MenuItem13Item8", "item_caption" => $CCSLocales->GetText("AntenatalActivity"), "item_url" => array("Page" => $this->RelativePath . "report_f21_facilities.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item8Item2", "item_id_parent" => "MenuItem13Item8", "item_caption" => $CCSLocales->GetText("Newborn_report"), "item_url" => array("Page" => $this->RelativePath . "report_on_newborn_facility.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item8Item3", "item_id_parent" => "MenuItem13Item8", "item_caption" => $CCSLocales->GetText("DeliveryHospital"), "item_url" => array("Page" => $this->RelativePath . "report_multiple_and_first.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item8Item4", "item_id_parent" => "MenuItem13Item8", "item_caption" => $CCSLocales->GetText("ComplicationsDuringDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_complications_during_delivery.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item8Item5", "item_id_parent" => "MenuItem13Item8", "item_caption" => $CCSLocales->GetText("ComplicationsAfterDelivery"), "item_url" => array("Page" => $this->RelativePath . "report_complications_after_delivery.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem13Item8Item6", "item_id_parent" => "MenuItem13Item8", "item_caption" => $CCSLocales->GetText("F21_During"), "item_url" => array("Page" => $this->RelativePath . "report_f21_disease_facilities.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("MenuTools"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item10", "item_id_parent" => "MenuItem11", "item_caption" => $CCSLocales->GetText("Library"), "item_url" => array("Page" => $this->RelativePath . "library.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item9", "item_id_parent" => "MenuItem11", "item_caption" => $CCSLocales->GetText("myAccount"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item9Item1", "item_id_parent" => "MenuItem11Item9", "item_caption" => $CCSLocales->GetText("login"), "item_url" => array("Page" => $this->RelativePath . "plogin_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem11Item9Item2", "item_id_parent" => "MenuItem11Item9", "item_caption" => $CCSLocales->GetText("personalInformation"), "item_url" => array("Page" => $this->RelativePath . "pinfo_maint.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));
        $this->StaticItems[] = array("item_id" => "MenuItem9", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("CCS_LogoutBtn"), "item_url" => array("Page" => $this->RelativePath . "logout.php", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText(""));

        $this->DataSource = new clstopmenumyMenuFacDataSource($this);
        $this->ds = & $this->DataSource;
        $this->DataSource->SetProvider(array("DBLib" => "Array"));

        parent::clsMenu("item_id_parent", "item_id", null);
        $this->Visible = (CCSecurityAccessCheck("3") == "success");

        $this->ItemLink = new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @97-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @97-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End myMenuFac Class @97-FCB6E20C

//topmenumyMenuFacDataSource Class @97-94113C5D
class clstopmenumyMenuFacDataSource extends DB_Adapter {
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;
    var $wp;
    var $Record = array();
    var $Index;
    var $FieldsList = array();

    function clstopmenumyMenuFacDataSource($parent) {
        $this->Parent = & $parent;
        $this->ErrorBlock = "Menu myMenuFac";
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;
    }

    function Prepare()
    {
    }

    function Open()
    {
        $this->query($this->Parent->StaticItems);
    }

    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("item_caption"));
    }
}
//End topmenumyMenuFacDataSource Class

class clstopmenu { //topmenu class @1-914881A6

//Variables @1-51D7F06F
    public $ComponentType = "IncludablePage";
    public $Connections = array();
    public $FileName = "";
    public $Redirect = "";
    public $Tpl = "";
    public $TemplateFileName = "";
    public $BlockToParse = "";
    public $ComponentName = "";
    public $Attributes = "";

    // Events;
    public $CCSEvents = "";
    public $CCSEventResult = "";
    public $RelativePath;
    public $Visible;
    public $Parent;
//End Variables

//Class_Initialize Event @1-66982991
    function clstopmenu($RelativePath, $ComponentName, & $Parent)
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = $ComponentName;
        $this->RelativePath = $RelativePath;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        $this->FileName = "topmenu.php";
        $this->Redirect = "";
        $this->TemplateFileName = "topmenu.html";
        $this->BlockToParse = "main";
        $this->TemplateEncoding = "CP1252";
        $this->ContentType = "text/html";
    }
//End Class_Initialize Event

//Class_Terminate Event @1-7FDB4439
    function Class_Terminate()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUnload", $this);
        unset($this->myMenuAdmin);
        unset($this->myMenuObl);
        unset($this->myMenuFac);
    }
//End Class_Terminate Event

//BindEvents Method @1-9B8411E7
    function BindEvents()
    {
        $this->CCSEvents["AfterInitialize"] = "topmenu_AfterInitialize";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInitialize", $this);
    }
//End BindEvents Method

//Operations Method @1-7E2A14CF
    function Operations()
    {
        global $Redirect;
        if(!$this->Visible)
            return "";
    }
//End Operations Method

//Initialize Method @1-04AAD1C3
    function Initialize()
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInitialize", $this);
        if(!$this->Visible)
            return "";
        $this->Attributes = & $this->Parent->Attributes;

        // Create Components
        $this->myMenuAdmin = new clsMenutopmenumyMenuAdmin($this->RelativePath, $this);
        $this->Eng = new clsControl(ccsImageLink, "Eng", "Eng", ccsText, "", CCGetRequestParam("Eng", ccsGet, NULL), $this);
        $this->Eng->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Eng->Parameters = CCAddParam($this->Eng->Parameters, "locale", CCGetSession("locale", NULL));
        $this->Eng->Page = "";
        $this->Ukr = new clsControl(ccsImageLink, "Ukr", "Ukr", ccsText, "", CCGetRequestParam("Ukr", ccsGet, NULL), $this);
        $this->Ukr->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Ukr->Parameters = CCAddParam($this->Ukr->Parameters, "locale", CCGetSession("locale", NULL));
        $this->Ukr->Page = "";
        $this->myMenuObl = new clsMenutopmenumyMenuObl($this->RelativePath, $this);
        $this->myMenuFac = new clsMenutopmenumyMenuFac($this->RelativePath, $this);
        $this->Rus = new clsControl(ccsImageLink, "Rus", "Rus", ccsText, "", CCGetRequestParam("Rus", ccsGet, NULL), $this);
        $this->Rus->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Rus->Parameters = CCAddParam($this->Rus->Parameters, "locale", CCGetSession("locale", NULL));
        $this->Rus->Page = "";
        $this->BindEvents();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnInitializeView", $this);
    }
//End Initialize Method

//Show Method @1-6FCC0FF0
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        $block_path = $Tpl->block_path;
        $Tpl->LoadTemplate("/" . $this->TemplateFileName, $this->ComponentName, $this->TemplateEncoding, "remove");
        $Tpl->block_path = $Tpl->block_path . "/" . $this->ComponentName;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) {
            $Tpl->block_path = $block_path;
            $Tpl->SetVar($this->ComponentName, "");
            return "";
        }
        $this->Attributes->Show();
        $this->myMenuAdmin->Show();
        $this->myMenuObl->Show();
        $this->myMenuFac->Show();
        $this->Eng->Show();
        $this->Ukr->Show();
        $this->Rus->Show();
        $Tpl->Parse();
        $Tpl->block_path = $block_path;
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeOutput", $this);
        $Tpl->SetVar($this->ComponentName, $Tpl->GetVar($this->ComponentName));
    }
//End Show Method

} //End topmenu Class @1-FCB6E20C

//Include Event File @1-5D9F49C4
include_once(RelativePath . "/topmenu_events.php");
//End Include Event File
?>
