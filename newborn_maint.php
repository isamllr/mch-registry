<?php
//Include Common Files @1-2449E43D
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "newborn_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordnewborn { //newborn Class @3-C743CDA1

//Variables @3-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @3-7F91B955
    function clsRecordnewborn($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record newborn/Error";
        $this->DataSource = new clsnewbornDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;3;2");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "newborn";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->TreatedNICU = new clsControl(ccsRadioButton, "TreatedNICU", $CCSLocales->GetText("TreatedNICU"), ccsInteger, "", CCGetRequestParam("TreatedNICU", $Method, NULL), $this);
            $this->TreatedNICU->DSType = dsListOfValues;
            $this->TreatedNICU->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->TreatedNICU->HTML = true;
            $this->TreatedNICU->Required = true;
            $this->VaccinationHepB = new clsControl(ccsRadioButton, "VaccinationHepB", $CCSLocales->GetText("VaccinationHepB"), ccsInteger, "", CCGetRequestParam("VaccinationHepB", $Method, NULL), $this);
            $this->VaccinationHepB->DSType = dsListOfValues;
            $this->VaccinationHepB->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->VaccinationHepB->HTML = true;
            $this->VaccinationHepB->Required = true;
            $this->DischargeDate = new clsControl(ccsTextBox, "DischargeDate", $CCSLocales->GetText("DischargeDateTime"), ccsDate, array("ShortDate"), CCGetRequestParam("DischargeDate", $Method, NULL), $this);
            $this->DatePicker_DischargeDateTime = new clsDatePicker("DatePicker_DischargeDateTime", "newborn", "DischargeDate", $this);
            $this->Lenght = new clsControl(ccsTextBox, "Lenght", $CCSLocales->GetText("Lenght"), ccsInteger, "", CCGetRequestParam("Lenght", $Method, NULL), $this);
            $this->Lenght->Required = true;
            $this->ApgarScore1min = new clsControl(ccsTextBox, "ApgarScore1min", $CCSLocales->GetText("ApgarScore1min"), ccsInteger, "", CCGetRequestParam("ApgarScore1min", $Method, NULL), $this);
            $this->ApgarScore1min->Required = true;
            $this->Resuscitation = new clsControl(ccsRadioButton, "Resuscitation", $CCSLocales->GetText("Resuscitation"), ccsInteger, "", CCGetRequestParam("Resuscitation", $Method, NULL), $this);
            $this->Resuscitation->DSType = dsListOfValues;
            $this->Resuscitation->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->Resuscitation->HTML = true;
            $this->Resuscitation->Required = true;
            $this->Antibiotics = new clsControl(ccsRadioButton, "Antibiotics", $CCSLocales->GetText("Antibiotics"), ccsInteger, "", CCGetRequestParam("Antibiotics", $Method, NULL), $this);
            $this->Antibiotics->DSType = dsListOfValues;
            $this->Antibiotics->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->Antibiotics->HTML = true;
            $this->ALVdays = new clsControl(ccsTextBox, "ALVdays", $CCSLocales->GetText("ALVdays"), ccsInteger, "", CCGetRequestParam("ALVdays", $Method, NULL), $this);
            $this->NewBornOutcomeID = new clsControl(ccsListBox, "NewBornOutcomeID", $CCSLocales->GetText("NewBornOutcomeID"), ccsInteger, "", CCGetRequestParam("NewBornOutcomeID", $Method, NULL), $this);
            $this->NewBornOutcomeID->DSType = dsTable;
            $this->NewBornOutcomeID->DataSource = new clsDBregistry_db();
            $this->NewBornOutcomeID->ds = & $this->NewBornOutcomeID->DataSource;
            $this->NewBornOutcomeID->DataSource->SQL = "SELECT * \n" .
"FROM newborn_outcome {SQL_Where} {SQL_OrderBy}";
            list($this->NewBornOutcomeID->BoundColumn, $this->NewBornOutcomeID->TextColumn, $this->NewBornOutcomeID->DBFormat) = array("NewBornOutcomeID", "NewBornOutcomeName", "");
            $this->OutcomeDate = new clsControl(ccsTextBox, "OutcomeDate", $CCSLocales->GetText("DateOutcome"), ccsDate, array("ShortDate"), CCGetRequestParam("OutcomeDate", $Method, NULL), $this);
            $this->DatePicker_DateOutcome = new clsDatePicker("DatePicker_DateOutcome", "newborn", "OutcomeDate", $this);
            $this->LinkedID_ClinicalDiagnosis = new clsControl(ccsHidden, "LinkedID_ClinicalDiagnosis", "LinkedID_ClinicalDiagnosis", ccsText, "", CCGetRequestParam("LinkedID_ClinicalDiagnosis", $Method, NULL), $this);
            $this->LinkedID_AnatomicPathology = new clsControl(ccsHidden, "LinkedID_AnatomicPathology", "LinkedID_AnatomicPathology", ccsText, "", CCGetRequestParam("LinkedID_AnatomicPathology", $Method, NULL), $this);
            $this->RightButton_ClinicalDiagnosis = new clsButton("RightButton_ClinicalDiagnosis", $Method, $this);
            $this->LeftButton_ClinicalDiagnosis = new clsButton("LeftButton_ClinicalDiagnosis", $Method, $this);
            $this->SelectedClinicalDiagnosis = new clsControl(ccsListBox, "SelectedClinicalDiagnosis", "SelectedClinicalDiagnosis", ccsText, "", CCGetRequestParam("SelectedClinicalDiagnosis", $Method, NULL), $this);
            $this->SelectedClinicalDiagnosis->Multiple = true;
            $this->SelectedClinicalDiagnosis->DSType = dsTable;
            $this->SelectedClinicalDiagnosis->DataSource = new clsDBregistry_db();
            $this->SelectedClinicalDiagnosis->ds = & $this->SelectedClinicalDiagnosis->DataSource;
            $this->SelectedClinicalDiagnosis->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, \" - \", DiseaseName) AS DiseaseIDName, clinical_diagn.* \n" .
"FROM clinical_diagn INNER JOIN icd10_all ON\n" .
"clinical_diagn.ICD10ID = icd10_all.ICD10ID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedClinicalDiagnosis->BoundColumn, $this->SelectedClinicalDiagnosis->TextColumn, $this->SelectedClinicalDiagnosis->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->SelectedClinicalDiagnosis->DataSource->Parameters["urlNewBornID"] = CCGetFromGet("NewBornID", NULL);
            $this->SelectedClinicalDiagnosis->DataSource->wp = new clsSQLParameters();
            $this->SelectedClinicalDiagnosis->DataSource->wp->AddParameter("1", "urlNewBornID", ccsInteger, "", "", $this->SelectedClinicalDiagnosis->DataSource->Parameters["urlNewBornID"], 0, false);
            $this->SelectedClinicalDiagnosis->DataSource->wp->Criterion[1] = $this->SelectedClinicalDiagnosis->DataSource->wp->Operation(opEqual, "clinical_diagn.NewBornID", $this->SelectedClinicalDiagnosis->DataSource->wp->GetDBValue("1"), $this->SelectedClinicalDiagnosis->DataSource->ToSQL($this->SelectedClinicalDiagnosis->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedClinicalDiagnosis->DataSource->Where = 
                 $this->SelectedClinicalDiagnosis->DataSource->wp->Criterion[1];
            $this->ListofClinicalTests = new clsControl(ccsListBox, "ListofClinicalTests", "ListofClinicalTests", ccsText, "", CCGetRequestParam("ListofClinicalTests", $Method, NULL), $this);
            $this->ListofClinicalTests->Multiple = true;
            $this->ListofClinicalTests->DSType = dsTable;
            $this->ListofClinicalTests->DataSource = new clsDBregistry_db();
            $this->ListofClinicalTests->ds = & $this->ListofClinicalTests->DataSource;
            $this->ListofClinicalTests->DataSource->SQL = "SELECT * \n" .
"FROM clinical_tests {SQL_Where} {SQL_OrderBy}";
            list($this->ListofClinicalTests->BoundColumn, $this->ListofClinicalTests->TextColumn, $this->ListofClinicalTests->DBFormat) = array("ClinicalTestsID", "ClinicalTestsName", "");
            $this->RightButtonClinicalTests = new clsButton("RightButtonClinicalTests", $Method, $this);
            $this->LeftButtonClinicalTests = new clsButton("LeftButtonClinicalTests", $Method, $this);
            $this->SelectedClinicalTests = new clsControl(ccsListBox, "SelectedClinicalTests", "SelectedClinicalTests", ccsInteger, "", CCGetRequestParam("SelectedClinicalTests", $Method, NULL), $this);
            $this->SelectedClinicalTests->Multiple = true;
            $this->SelectedClinicalTests->DSType = dsTable;
            $this->SelectedClinicalTests->DataSource = new clsDBregistry_db();
            $this->SelectedClinicalTests->ds = & $this->SelectedClinicalTests->DataSource;
            $this->SelectedClinicalTests->DataSource->SQL = "SELECT clinical.*, ClinicalTestsName \n" .
"FROM clinical INNER JOIN clinical_tests ON\n" .
"clinical.ClinicalTestsID = clinical_tests.ClinicalTestsID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedClinicalTests->BoundColumn, $this->SelectedClinicalTests->TextColumn, $this->SelectedClinicalTests->DBFormat) = array("ClinicalTestsID", "ClinicalTestsName", "");
            $this->SelectedClinicalTests->DataSource->Parameters["urlNewBornID"] = CCGetFromGet("NewBornID", NULL);
            $this->SelectedClinicalTests->DataSource->wp = new clsSQLParameters();
            $this->SelectedClinicalTests->DataSource->wp->AddParameter("1", "urlNewBornID", ccsInteger, "", "", $this->SelectedClinicalTests->DataSource->Parameters["urlNewBornID"], 0, false);
            $this->SelectedClinicalTests->DataSource->wp->Criterion[1] = $this->SelectedClinicalTests->DataSource->wp->Operation(opEqual, "clinical.NewBornID", $this->SelectedClinicalTests->DataSource->wp->GetDBValue("1"), $this->SelectedClinicalTests->DataSource->ToSQL($this->SelectedClinicalTests->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedClinicalTests->DataSource->Where = 
                 $this->SelectedClinicalTests->DataSource->wp->Criterion[1];
            $this->LinkedID_ClinicalTests = new clsControl(ccsHidden, "LinkedID_ClinicalTests", "LinkedID_ClinicalTests", ccsText, "", CCGetRequestParam("LinkedID_ClinicalTests", $Method, NULL), $this);
            $this->OutcomeTime = new clsControl(ccsTextBox, "OutcomeTime", "OutcomeTime", ccsDate, array("H", ":", "nn"), CCGetRequestParam("OutcomeTime", $Method, NULL), $this);
            $this->DischargeTime = new clsControl(ccsTextBox, "DischargeTime", "DischargeTime", ccsDate, array("H", ":", "nn"), CCGetRequestParam("DischargeTime", $Method, NULL), $this);
            $this->ListofAnatomicPathology = new clsControl(ccsListBox, "ListofAnatomicPathology", "ListofAnatomicPathology", ccsText, "", CCGetRequestParam("ListofAnatomicPathology", $Method, NULL), $this);
            $this->ListofAnatomicPathology->Multiple = true;
            $this->ListofAnatomicPathology->DSType = dsTable;
            $this->ListofAnatomicPathology->DataSource = new clsDBregistry_db();
            $this->ListofAnatomicPathology->ds = & $this->ListofAnatomicPathology->DataSource;
            $this->ListofAnatomicPathology->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, \" - \", DiseaseName) AS DiseaseIDName\n" .
"FROM icd10_all {SQL_Where} {SQL_OrderBy}";
            $this->ListofAnatomicPathology->DataSource->Order = "ICD10ID";
            list($this->ListofAnatomicPathology->BoundColumn, $this->ListofAnatomicPathology->TextColumn, $this->ListofAnatomicPathology->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->ListofAnatomicPathology->DataSource->wp = new clsSQLParameters();
            $this->ListofAnatomicPathology->DataSource->wp->Criterion[1] = "( ICD10_class = 'P'  )";
            $this->ListofAnatomicPathology->DataSource->wp->Criterion[2] = "( ICD10_class = 'Q'  )";
            $this->ListofAnatomicPathology->DataSource->Where = $this->ListofAnatomicPathology->DataSource->wp->opOR(
                 false, 
                 $this->ListofAnatomicPathology->DataSource->wp->Criterion[1], 
                 $this->ListofAnatomicPathology->DataSource->wp->Criterion[2]);
            $this->ListofAnatomicPathology->DataSource->Order = "ICD10ID";
            $this->RightButton_AnatomicPathology = new clsButton("RightButton_AnatomicPathology", $Method, $this);
            $this->LeftButton_AnatomicPathology = new clsButton("LeftButton_AnatomicPathology", $Method, $this);
            $this->SelectedAnatomicPathology = new clsControl(ccsListBox, "SelectedAnatomicPathology", "SelectedAnatomicPathology", ccsText, "", CCGetRequestParam("SelectedAnatomicPathology", $Method, NULL), $this);
            $this->SelectedAnatomicPathology->Multiple = true;
            $this->SelectedAnatomicPathology->DSType = dsTable;
            $this->SelectedAnatomicPathology->DataSource = new clsDBregistry_db();
            $this->SelectedAnatomicPathology->ds = & $this->SelectedAnatomicPathology->DataSource;
            $this->SelectedAnatomicPathology->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, \" - \", DiseaseName) AS DiseaseIDName, anatomic_path.* \n" .
"FROM anatomic_path INNER JOIN icd10_all ON\n" .
"anatomic_path.ICD10ID = icd10_all.ICD10ID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedAnatomicPathology->BoundColumn, $this->SelectedAnatomicPathology->TextColumn, $this->SelectedAnatomicPathology->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->SelectedAnatomicPathology->DataSource->Parameters["urlNewBornID"] = CCGetFromGet("NewBornID", NULL);
            $this->SelectedAnatomicPathology->DataSource->wp = new clsSQLParameters();
            $this->SelectedAnatomicPathology->DataSource->wp->AddParameter("1", "urlNewBornID", ccsInteger, "", "", $this->SelectedAnatomicPathology->DataSource->Parameters["urlNewBornID"], 0, false);
            $this->SelectedAnatomicPathology->DataSource->wp->Criterion[1] = $this->SelectedAnatomicPathology->DataSource->wp->Operation(opEqual, "anatomic_path.NewBornID", $this->SelectedAnatomicPathology->DataSource->wp->GetDBValue("1"), $this->SelectedAnatomicPathology->DataSource->ToSQL($this->SelectedAnatomicPathology->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedAnatomicPathology->DataSource->Where = 
                 $this->SelectedAnatomicPathology->DataSource->wp->Criterion[1];
            $this->Circumference = new clsControl(ccsTextBox, "Circumference", $CCSLocales->GetText("Circumference"), ccsInteger, "", CCGetRequestParam("Circumference", $Method, NULL), $this);
            $this->Circumference->Required = true;
            $this->ApgarScore5min = new clsControl(ccsTextBox, "ApgarScore5min", $CCSLocales->GetText("ApgarScore5min"), ccsInteger, "", CCGetRequestParam("ApgarScore5min", $Method, NULL), $this);
            $this->ApgarScore5min->Required = true;
            $this->ResuscitationID = new clsControl(ccsListBox, "ResuscitationID", $CCSLocales->GetText("ResuscitationID"), ccsInteger, "", CCGetRequestParam("ResuscitationID", $Method, NULL), $this);
            $this->ResuscitationID->DSType = dsTable;
            $this->ResuscitationID->DataSource = new clsDBregistry_db();
            $this->ResuscitationID->ds = & $this->ResuscitationID->DataSource;
            $this->ResuscitationID->DataSource->SQL = "SELECT * \n" .
"FROM resuscitation {SQL_Where} {SQL_OrderBy}";
            list($this->ResuscitationID->BoundColumn, $this->ResuscitationID->TextColumn, $this->ResuscitationID->DBFormat) = array("ResuscitationID", "ResuscitationName", "");
            $this->ResuscitationID->Required = true;
            $this->DurationDays = new clsControl(ccsTextBox, "DurationDays", $CCSLocales->GetText("DurationDays"), ccsInteger, "", CCGetRequestParam("DurationDays", $Method, NULL), $this);
            $this->DurationDays->Required = true;
            $this->CPAPdays = new clsControl(ccsTextBox, "CPAPdays", $CCSLocales->GetText("CPAPdays"), ccsInteger, "", CCGetRequestParam("CPAPdays", $Method, NULL), $this);
            $this->FacilityID = new clsControl(ccsListBox, "FacilityID", $CCSLocales->GetText("FacilityID"), ccsInteger, "", CCGetRequestParam("FacilityID", $Method, NULL), $this);
            $this->FacilityID->DSType = dsTable;
            $this->FacilityID->DataSource = new clsDBregistry_db();
            $this->FacilityID->ds = & $this->FacilityID->DataSource;
            $this->FacilityID->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            $this->FacilityID->DataSource->Order = "FacilityName";
            list($this->FacilityID->BoundColumn, $this->FacilityID->TextColumn, $this->FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->FacilityID->DataSource->Order = "FacilityName";
            $this->DateReferral = new clsControl(ccsTextBox, "DateReferral", $CCSLocales->GetText("DateReferral"), ccsDate, array("ShortDate"), CCGetRequestParam("DateReferral", $Method, NULL), $this);
            $this->DatePicker_DateReferral = new clsDatePicker("DatePicker_DateReferral", "newborn", "DateReferral", $this);
            $this->ScreenningPUK = new clsControl(ccsRadioButton, "ScreenningPUK", $CCSLocales->GetText("ScreenningPUK"), ccsInteger, "", CCGetRequestParam("ScreenningPUK", $Method, NULL), $this);
            $this->ScreenningPUK->DSType = dsListOfValues;
            $this->ScreenningPUK->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->ScreenningPUK->HTML = true;
            $this->Surfactant = new clsControl(ccsRadioButton, "Surfactant", $CCSLocales->GetText("Surfactant"), ccsInteger, "", CCGetRequestParam("Surfactant", $Method, NULL), $this);
            $this->Surfactant->DSType = dsListOfValues;
            $this->Surfactant->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->Surfactant->HTML = true;
            $this->Surfactant->Required = true;
            $this->DeliveryID = new clsControl(ccsHidden, "DeliveryID", $CCSLocales->GetText("DeliveryID"), ccsInteger, "", CCGetRequestParam("DeliveryID", $Method, NULL), $this);
            $this->DeliveryID->Required = true;
            $this->Reloaded = new clsControl(ccsHidden, "Reloaded", "Reloaded", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Reloaded", $Method, NULL), $this);
            $this->CurrentUser = new clsControl(ccsHidden, "CurrentUser", "CurrentUser", ccsText, "", CCGetRequestParam("CurrentUser", $Method, NULL), $this);
            $this->lastmodified = new clsControl(ccsLabel, "lastmodified", "lastmodified", ccsDate, array("GeneralDate"), CCGetRequestParam("lastmodified", $Method, NULL), $this);
            $this->user = new clsControl(ccsLabel, "user", "user", ccsText, "", CCGetRequestParam("user", $Method, NULL), $this);
            $this->DepartmentID = new clsControl(ccsListBox, "DepartmentID", $CCSLocales->GetText("DepartmentID"), ccsInteger, "", CCGetRequestParam("DepartmentID", $Method, NULL), $this);
            $this->DepartmentID->DSType = dsTable;
            $this->DepartmentID->DataSource = new clsDBregistry_db();
            $this->DepartmentID->ds = & $this->DepartmentID->DataSource;
            $this->DepartmentID->DataSource->SQL = "SELECT DeptID, DepartmentDesc \n" .
"FROM department {SQL_Where} {SQL_OrderBy}";
            $this->DepartmentID->DataSource->Order = "DepartmentDesc";
            list($this->DepartmentID->BoundColumn, $this->DepartmentID->TextColumn, $this->DepartmentID->DBFormat) = array("DeptID", "DepartmentDesc", "");
            $this->DepartmentID->DataSource->Order = "DepartmentDesc";
            $this->Discharge = new clsControl(ccsRadioButton, "Discharge", "Discharge", ccsInteger, "", CCGetRequestParam("Discharge", $Method, NULL), $this);
            $this->Discharge->DSType = dsTable;
            $this->Discharge->DataSource = new clsDBregistry_db();
            $this->Discharge->ds = & $this->Discharge->DataSource;
            $this->Discharge->DataSource->SQL = "SELECT * \n" .
"FROM newborn_discharge {SQL_Where} {SQL_OrderBy}";
            list($this->Discharge->BoundColumn, $this->Discharge->TextColumn, $this->Discharge->DBFormat) = array("DischargeID", "DischargeName", "");
            $this->Discharge->HTML = true;
            $this->FilterofAnatomicPathology = new clsControl(ccsTextBox, "FilterofAnatomicPathology", "FilterofAnatomicPathology", ccsText, "", CCGetRequestParam("FilterofAnatomicPathology", $Method, NULL), $this);
            $this->FilterofClinicalTests = new clsControl(ccsTextBox, "FilterofClinicalTests", "FilterofClinicalTests", ccsText, "", CCGetRequestParam("FilterofClinicalTests", $Method, NULL), $this);
            $this->birthDateTemp = new clsControl(ccsHidden, "birthDateTemp", "birthDateTemp", ccsText, "", CCGetRequestParam("birthDateTemp", $Method, NULL), $this);
            $this->FilterofClinicalDiagnosis = new clsControl(ccsTextBox, "FilterofClinicalDiagnosis", "FilterofClinicalDiagnosis", ccsText, "", CCGetRequestParam("FilterofClinicalDiagnosis", $Method, NULL), $this);
            $this->ListofClinicalDiagnosis = new clsControl(ccsListBox, "ListofClinicalDiagnosis", "ListofClinicalDiagnosis", ccsText, "", CCGetRequestParam("ListofClinicalDiagnosis", $Method, NULL), $this);
            $this->ListofClinicalDiagnosis->Multiple = true;
            $this->ListofClinicalDiagnosis->DSType = dsTable;
            $this->ListofClinicalDiagnosis->DataSource = new clsDBregistry_db();
            $this->ListofClinicalDiagnosis->ds = & $this->ListofClinicalDiagnosis->DataSource;
            $this->ListofClinicalDiagnosis->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, \" - \", DiseaseName) AS DiseaseIDName\n" .
"FROM icd10_all {SQL_Where} {SQL_OrderBy}";
            $this->ListofClinicalDiagnosis->DataSource->Order = "ICD10ID";
            list($this->ListofClinicalDiagnosis->BoundColumn, $this->ListofClinicalDiagnosis->TextColumn, $this->ListofClinicalDiagnosis->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->ListofClinicalDiagnosis->DataSource->wp = new clsSQLParameters();
            $this->ListofClinicalDiagnosis->DataSource->wp->Criterion[1] = "( ICD10_class = 'P' )";
            $this->ListofClinicalDiagnosis->DataSource->wp->Criterion[2] = "( ICD10_class = 'Q' )";
            $this->ListofClinicalDiagnosis->DataSource->Where = $this->ListofClinicalDiagnosis->DataSource->wp->opOR(
                 false, 
                 $this->ListofClinicalDiagnosis->DataSource->wp->Criterion[1], 
                 $this->ListofClinicalDiagnosis->DataSource->wp->Criterion[2]);
            $this->ListofClinicalDiagnosis->DataSource->Order = "ICD10ID";
            $this->ScreenningHypoth = new clsControl(ccsRadioButton, "ScreenningHypoth", $CCSLocales->GetText("ScreenningHypoth"), ccsInteger, "", CCGetRequestParam("ScreenningHypoth", $Method, NULL), $this);
            $this->ScreenningHypoth->DSType = dsListOfValues;
            $this->ScreenningHypoth->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->ScreenningHypoth->HTML = true;
            $this->VaccinationBCG = new clsControl(ccsRadioButton, "VaccinationBCG", $CCSLocales->GetText("VaccinationBCG"), ccsInteger, "", CCGetRequestParam("VaccinationBCG", $Method, NULL), $this);
            $this->VaccinationBCG->DSType = dsListOfValues;
            $this->VaccinationBCG->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->VaccinationBCG->HTML = true;
            $this->VaccinationBCG->Required = true;
            $this->FeedingID = new clsControl(ccsListBox, "FeedingID", $CCSLocales->GetText("FeedingID"), ccsInteger, "", CCGetRequestParam("FeedingID", $Method, NULL), $this);
            $this->FeedingID->DSType = dsTable;
            $this->FeedingID->DataSource = new clsDBregistry_db();
            $this->FeedingID->ds = & $this->FeedingID->DataSource;
            $this->FeedingID->DataSource->SQL = "SELECT * \n" .
"FROM feeding {SQL_Where} {SQL_OrderBy}";
            list($this->FeedingID->BoundColumn, $this->FeedingID->TextColumn, $this->FeedingID->DBFormat) = array("FeedingID", "FeedingName", "");
            $this->CommonStay = new clsControl(ccsRadioButton, "CommonStay", "CommonStay", ccsInteger, "", CCGetRequestParam("CommonStay", $Method, NULL), $this);
            $this->CommonStay->DSType = dsListOfValues;
            $this->CommonStay->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->CommonStay->HTML = true;
            $this->Weight = new clsControl(ccsTextBox, "Weight", $CCSLocales->GetText("Weight"), ccsSingle, "", CCGetRequestParam("Weight", $Method, NULL), $this);
            $this->Weight->Required = true;
            $this->BirthDate = new clsControl(ccsTextBox, "BirthDate", $CCSLocales->GetText("BirthDate"), ccsDate, array("ShortDate"), CCGetRequestParam("BirthDate", $Method, NULL), $this);
            $this->BirthDate->Required = true;
            $this->DatePicker_BirthDate = new clsDatePicker("DatePicker_BirthDate", "newborn", "BirthDate", $this);
            $this->BirthTime = new clsControl(ccsTextBox, "BirthTime", $CCSLocales->GetText("BirthTime"), ccsDate, array("H", ":", "nn"), CCGetRequestParam("BirthTime", $Method, NULL), $this);
            $this->NewBornN = new clsControl(ccsTextBox, "NewBornN", $CCSLocales->GetText("NewBornN"), ccsText, "", CCGetRequestParam("NewBornN", $Method, NULL), $this);
            $this->NewBornN->Required = true;
            $this->Sex = new clsControl(ccsRadioButton, "Sex", $CCSLocales->GetText("Sex"), ccsInteger, "", CCGetRequestParam("Sex", $Method, NULL), $this);
            $this->Sex->DSType = dsListOfValues;
            $this->Sex->Values = array(array("0", $CCSLocales->GetText("Woman")), array("1", $CCSLocales->GetText("Man")));
            $this->Sex->HTML = true;
            $this->Sex->Required = true;
            $this->AppliedBreastID = new clsControl(ccsListBox, "AppliedBreastID", $CCSLocales->GetText("AppliedBreastID"), ccsInteger, "", CCGetRequestParam("AppliedBreastID", $Method, NULL), $this);
            $this->AppliedBreastID->DSType = dsTable;
            $this->AppliedBreastID->DataSource = new clsDBregistry_db();
            $this->AppliedBreastID->ds = & $this->AppliedBreastID->DataSource;
            $this->AppliedBreastID->DataSource->SQL = "SELECT * \n" .
"FROM applied_breast {SQL_Where} {SQL_OrderBy}";
            list($this->AppliedBreastID->BoundColumn, $this->AppliedBreastID->TextColumn, $this->AppliedBreastID->DBFormat) = array("AppliedBreastID", "AppliedBreastName", "");
            $this->SkinToSkin = new clsControl(ccsRadioButton, "SkinToSkin", "SkinToSkin", ccsInteger, "", CCGetRequestParam("SkinToSkin", $Method, NULL), $this);
            $this->SkinToSkin->DSType = dsListOfValues;
            $this->SkinToSkin->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->SkinToSkin->HTML = true;
            $this->SkinToSkin->Required = true;
            $this->Died = new clsControl(ccsRadioButton, "Died", "Died", ccsInteger, "", CCGetRequestParam("Died", $Method, NULL), $this);
            $this->Died->DSType = dsListOfValues;
            $this->Died->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->Died->HTML = true;
            $this->Died->Required = true;
            $this->DiedType = new clsControl(ccsListBox, "DiedType", "DiedType", ccsInteger, "", CCGetRequestParam("DiedType", $Method, NULL), $this);
            $this->DiedType->DSType = dsTable;
            $this->DiedType->DataSource = new clsDBregistry_db();
            $this->DiedType->ds = & $this->DiedType->DataSource;
            $this->DiedType->DataSource->SQL = "SELECT * \n" .
"FROM died {SQL_Where} {SQL_OrderBy}";
            list($this->DiedType->BoundColumn, $this->DiedType->TextColumn, $this->DiedType->DBFormat) = array("DiedID", "DiedName", "");
            if(!$this->FormSubmitted) {
                if(!is_array($this->TreatedNICU->Value) && !strlen($this->TreatedNICU->Value) && $this->TreatedNICU->Value !== false)
                    $this->TreatedNICU->SetText(0);
                if(!is_array($this->Resuscitation->Value) && !strlen($this->Resuscitation->Value) && $this->Resuscitation->Value !== false)
                    $this->Resuscitation->SetText(0);
                if(!is_array($this->Surfactant->Value) && !strlen($this->Surfactant->Value) && $this->Surfactant->Value !== false)
                    $this->Surfactant->SetText(0);
                if(!is_array($this->Reloaded->Value) && !strlen($this->Reloaded->Value) && $this->Reloaded->Value !== false)
                    $this->Reloaded->SetText(false);
                if(!is_array($this->CommonStay->Value) && !strlen($this->CommonStay->Value) && $this->CommonStay->Value !== false)
                    $this->CommonStay->SetText(1);
                if(!is_array($this->BirthTime->Value) && !strlen($this->BirthTime->Value) && $this->BirthTime->Value !== false)
                    $this->BirthTime->SetValue(time());
                if(!is_array($this->SkinToSkin->Value) && !strlen($this->SkinToSkin->Value) && $this->SkinToSkin->Value !== false)
                    $this->SkinToSkin->SetText(1);
                if(!is_array($this->Died->Value) && !strlen($this->Died->Value) && $this->Died->Value !== false)
                    $this->Died->SetText(0);
            }
            if(!is_array($this->lastmodified->Value) && !strlen($this->lastmodified->Value) && $this->lastmodified->Value !== false)
                $this->lastmodified->SetValue(time());
        }
    }
//End Class_Initialize Event

//Initialize Method @3-793451F5
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlNewBornID"] = CCGetFromGet("NewBornID", NULL);
    }
//End Initialize Method

//Validate Method @3-FCE8B848
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(! (($this->Lenght->GetValue() > 0 && $this->Lenght->GetValue() < 70))) {
            $this->Lenght->Errors->addError($CCSLocales->GetText("Length_less"));
        }
        if(! (($this->ApgarScore1min->GetValue() > 0 && $this->ApgarScore1min->GetValue() < 10))) {
            $this->ApgarScore1min->Errors->addError($CCSLocales->GetText("Apgar1"));
        }
        if(! (($this->Circumference->GetValue() > 0 && $this->Circumference->GetValue() < 50))) {
            $this->Circumference->Errors->addError($CCSLocales->GetText("Head_circumference"));
        }
        if(! (($this->ApgarScore5min->GetValue() > 0 && $this->ApgarScore5min->GetValue() < 10))) {
            $this->ApgarScore5min->Errors->addError($CCSLocales->GetText("Apgar5"));
        }
        if(! (($this->Weight->GetValue() > 0 && $this->Weight->GetValue() < 6000))) {
            $this->Weight->Errors->addError($CCSLocales->GetText("Birth_weight"));
        }
        $Validation = ($this->TreatedNICU->Validate() && $Validation);
        $Validation = ($this->VaccinationHepB->Validate() && $Validation);
        $Validation = ($this->DischargeDate->Validate() && $Validation);
        $Validation = ($this->Lenght->Validate() && $Validation);
        $Validation = ($this->ApgarScore1min->Validate() && $Validation);
        $Validation = ($this->Resuscitation->Validate() && $Validation);
        $Validation = ($this->Antibiotics->Validate() && $Validation);
        $Validation = ($this->ALVdays->Validate() && $Validation);
        $Validation = ($this->NewBornOutcomeID->Validate() && $Validation);
        $Validation = ($this->OutcomeDate->Validate() && $Validation);
        $Validation = ($this->LinkedID_ClinicalDiagnosis->Validate() && $Validation);
        $Validation = ($this->LinkedID_AnatomicPathology->Validate() && $Validation);
        $Validation = ($this->SelectedClinicalDiagnosis->Validate() && $Validation);
        $Validation = ($this->ListofClinicalTests->Validate() && $Validation);
        $Validation = ($this->SelectedClinicalTests->Validate() && $Validation);
        $Validation = ($this->LinkedID_ClinicalTests->Validate() && $Validation);
        $Validation = ($this->OutcomeTime->Validate() && $Validation);
        $Validation = ($this->DischargeTime->Validate() && $Validation);
        $Validation = ($this->ListofAnatomicPathology->Validate() && $Validation);
        $Validation = ($this->SelectedAnatomicPathology->Validate() && $Validation);
        $Validation = ($this->Circumference->Validate() && $Validation);
        $Validation = ($this->ApgarScore5min->Validate() && $Validation);
        $Validation = ($this->ResuscitationID->Validate() && $Validation);
        $Validation = ($this->DurationDays->Validate() && $Validation);
        $Validation = ($this->CPAPdays->Validate() && $Validation);
        $Validation = ($this->FacilityID->Validate() && $Validation);
        $Validation = ($this->DateReferral->Validate() && $Validation);
        $Validation = ($this->ScreenningPUK->Validate() && $Validation);
        $Validation = ($this->Surfactant->Validate() && $Validation);
        $Validation = ($this->DeliveryID->Validate() && $Validation);
        $Validation = ($this->Reloaded->Validate() && $Validation);
        $Validation = ($this->CurrentUser->Validate() && $Validation);
        $Validation = ($this->DepartmentID->Validate() && $Validation);
        $Validation = ($this->Discharge->Validate() && $Validation);
        $Validation = ($this->FilterofAnatomicPathology->Validate() && $Validation);
        $Validation = ($this->FilterofClinicalTests->Validate() && $Validation);
        $Validation = ($this->birthDateTemp->Validate() && $Validation);
        $Validation = ($this->FilterofClinicalDiagnosis->Validate() && $Validation);
        $Validation = ($this->ListofClinicalDiagnosis->Validate() && $Validation);
        $Validation = ($this->ScreenningHypoth->Validate() && $Validation);
        $Validation = ($this->VaccinationBCG->Validate() && $Validation);
        $Validation = ($this->FeedingID->Validate() && $Validation);
        $Validation = ($this->CommonStay->Validate() && $Validation);
        $Validation = ($this->Weight->Validate() && $Validation);
        $Validation = ($this->BirthDate->Validate() && $Validation);
        $Validation = ($this->BirthTime->Validate() && $Validation);
        $Validation = ($this->NewBornN->Validate() && $Validation);
        $Validation = ($this->Sex->Validate() && $Validation);
        $Validation = ($this->AppliedBreastID->Validate() && $Validation);
        $Validation = ($this->SkinToSkin->Validate() && $Validation);
        $Validation = ($this->Died->Validate() && $Validation);
        $Validation = ($this->DiedType->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->TreatedNICU->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VaccinationHepB->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DischargeDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Lenght->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ApgarScore1min->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Resuscitation->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Antibiotics->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ALVdays->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NewBornOutcomeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OutcomeDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_ClinicalDiagnosis->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_AnatomicPathology->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedClinicalDiagnosis->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofClinicalTests->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedClinicalTests->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_ClinicalTests->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OutcomeTime->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DischargeTime->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofAnatomicPathology->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedAnatomicPathology->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Circumference->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ApgarScore5min->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResuscitationID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DurationDays->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CPAPdays->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateReferral->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ScreenningPUK->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Surfactant->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeliveryID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Reloaded->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CurrentUser->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DepartmentID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Discharge->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FilterofAnatomicPathology->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FilterofClinicalTests->Errors->Count() == 0);
        $Validation =  $Validation && ($this->birthDateTemp->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FilterofClinicalDiagnosis->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofClinicalDiagnosis->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ScreenningHypoth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VaccinationBCG->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FeedingID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CommonStay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Weight->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BirthDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BirthTime->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NewBornN->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Sex->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AppliedBreastID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SkinToSkin->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Died->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiedType->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-0C600885
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TreatedNICU->Errors->Count());
        $errors = ($errors || $this->VaccinationHepB->Errors->Count());
        $errors = ($errors || $this->DischargeDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_DischargeDateTime->Errors->Count());
        $errors = ($errors || $this->Lenght->Errors->Count());
        $errors = ($errors || $this->ApgarScore1min->Errors->Count());
        $errors = ($errors || $this->Resuscitation->Errors->Count());
        $errors = ($errors || $this->Antibiotics->Errors->Count());
        $errors = ($errors || $this->ALVdays->Errors->Count());
        $errors = ($errors || $this->NewBornOutcomeID->Errors->Count());
        $errors = ($errors || $this->OutcomeDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateOutcome->Errors->Count());
        $errors = ($errors || $this->LinkedID_ClinicalDiagnosis->Errors->Count());
        $errors = ($errors || $this->LinkedID_AnatomicPathology->Errors->Count());
        $errors = ($errors || $this->SelectedClinicalDiagnosis->Errors->Count());
        $errors = ($errors || $this->ListofClinicalTests->Errors->Count());
        $errors = ($errors || $this->SelectedClinicalTests->Errors->Count());
        $errors = ($errors || $this->LinkedID_ClinicalTests->Errors->Count());
        $errors = ($errors || $this->OutcomeTime->Errors->Count());
        $errors = ($errors || $this->DischargeTime->Errors->Count());
        $errors = ($errors || $this->ListofAnatomicPathology->Errors->Count());
        $errors = ($errors || $this->SelectedAnatomicPathology->Errors->Count());
        $errors = ($errors || $this->Circumference->Errors->Count());
        $errors = ($errors || $this->ApgarScore5min->Errors->Count());
        $errors = ($errors || $this->ResuscitationID->Errors->Count());
        $errors = ($errors || $this->DurationDays->Errors->Count());
        $errors = ($errors || $this->CPAPdays->Errors->Count());
        $errors = ($errors || $this->FacilityID->Errors->Count());
        $errors = ($errors || $this->DateReferral->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateReferral->Errors->Count());
        $errors = ($errors || $this->ScreenningPUK->Errors->Count());
        $errors = ($errors || $this->Surfactant->Errors->Count());
        $errors = ($errors || $this->DeliveryID->Errors->Count());
        $errors = ($errors || $this->Reloaded->Errors->Count());
        $errors = ($errors || $this->CurrentUser->Errors->Count());
        $errors = ($errors || $this->lastmodified->Errors->Count());
        $errors = ($errors || $this->user->Errors->Count());
        $errors = ($errors || $this->DepartmentID->Errors->Count());
        $errors = ($errors || $this->Discharge->Errors->Count());
        $errors = ($errors || $this->FilterofAnatomicPathology->Errors->Count());
        $errors = ($errors || $this->FilterofClinicalTests->Errors->Count());
        $errors = ($errors || $this->birthDateTemp->Errors->Count());
        $errors = ($errors || $this->FilterofClinicalDiagnosis->Errors->Count());
        $errors = ($errors || $this->ListofClinicalDiagnosis->Errors->Count());
        $errors = ($errors || $this->ScreenningHypoth->Errors->Count());
        $errors = ($errors || $this->VaccinationBCG->Errors->Count());
        $errors = ($errors || $this->FeedingID->Errors->Count());
        $errors = ($errors || $this->CommonStay->Errors->Count());
        $errors = ($errors || $this->Weight->Errors->Count());
        $errors = ($errors || $this->BirthDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_BirthDate->Errors->Count());
        $errors = ($errors || $this->BirthTime->Errors->Count());
        $errors = ($errors || $this->NewBornN->Errors->Count());
        $errors = ($errors || $this->Sex->Errors->Count());
        $errors = ($errors || $this->AppliedBreastID->Errors->Count());
        $errors = ($errors || $this->SkinToSkin->Errors->Count());
        $errors = ($errors || $this->Died->Errors->Count());
        $errors = ($errors || $this->DiedType->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @3-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @3-CAB41157
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            } else if($this->RightButton_ClinicalDiagnosis->Pressed) {
                $this->PressedButton = "RightButton_ClinicalDiagnosis";
            } else if($this->LeftButton_ClinicalDiagnosis->Pressed) {
                $this->PressedButton = "LeftButton_ClinicalDiagnosis";
            } else if($this->RightButtonClinicalTests->Pressed) {
                $this->PressedButton = "RightButtonClinicalTests";
            } else if($this->LeftButtonClinicalTests->Pressed) {
                $this->PressedButton = "LeftButtonClinicalTests";
            } else if($this->RightButton_AnatomicPathology->Pressed) {
                $this->PressedButton = "RightButton_AnatomicPathology";
            } else if($this->LeftButton_AnatomicPathology->Pressed) {
                $this->PressedButton = "LeftButton_AnatomicPathology";
            }
        }
        $Redirect = "delivery_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "NewBornID"));
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButton_ClinicalDiagnosis") {
            if(!CCGetEvent($this->RightButton_ClinicalDiagnosis->CCSEvents, "OnClick", $this->RightButton_ClinicalDiagnosis)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButton_ClinicalDiagnosis") {
            if(!CCGetEvent($this->LeftButton_ClinicalDiagnosis->CCSEvents, "OnClick", $this->LeftButton_ClinicalDiagnosis)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButtonClinicalTests") {
            if(!CCGetEvent($this->RightButtonClinicalTests->CCSEvents, "OnClick", $this->RightButtonClinicalTests)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButtonClinicalTests") {
            if(!CCGetEvent($this->LeftButtonClinicalTests->CCSEvents, "OnClick", $this->LeftButtonClinicalTests)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButton_AnatomicPathology") {
            if(!CCGetEvent($this->RightButton_AnatomicPathology->CCSEvents, "OnClick", $this->RightButton_AnatomicPathology)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButton_AnatomicPathology") {
            if(!CCGetEvent($this->LeftButton_AnatomicPathology->CCSEvents, "OnClick", $this->LeftButton_AnatomicPathology)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert" && $this->InsertAllowed) {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update" && $this->UpdateAllowed) {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @3-18492CED
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->NewBornN->SetValue($this->NewBornN->GetValue(true));
        $this->DataSource->Weight->SetValue($this->Weight->GetValue(true));
        $this->DataSource->TreatedNICU->SetValue($this->TreatedNICU->GetValue(true));
        $this->DataSource->VaccinationHepB->SetValue($this->VaccinationHepB->GetValue(true));
        $this->DataSource->VaccinationBCG->SetValue($this->VaccinationBCG->GetValue(true));
        $this->DataSource->AppliedBreastID->SetValue($this->AppliedBreastID->GetValue(true));
        $this->DataSource->Sex->SetValue($this->Sex->GetValue(true));
        $this->DataSource->BirthDate->SetValue($this->BirthDate->GetValue(true));
        $this->DataSource->Lenght->SetValue($this->Lenght->GetValue(true));
        $this->DataSource->Circumference->SetValue($this->Circumference->GetValue(true));
        $this->DataSource->ApgarScore1min->SetValue($this->ApgarScore1min->GetValue(true));
        $this->DataSource->ApgarScore5min->SetValue($this->ApgarScore5min->GetValue(true));
        $this->DataSource->Surfactant->SetValue($this->Surfactant->GetValue(true));
        $this->DataSource->Resuscitation->SetValue($this->Resuscitation->GetValue(true));
        $this->DataSource->ResuscitationID->SetValue($this->ResuscitationID->GetValue(true));
        $this->DataSource->DurationDays->SetValue($this->DurationDays->GetValue(true));
        $this->DataSource->Antibiotics->SetValue($this->Antibiotics->GetValue(true));
        $this->DataSource->ALVdays->SetValue($this->ALVdays->GetValue(true));
        $this->DataSource->CPAPdays->SetValue($this->CPAPdays->GetValue(true));
        $this->DataSource->FacilityID->SetValue($this->FacilityID->GetValue(true));
        $this->DataSource->DateReferral->SetValue($this->DateReferral->GetValue(true));
        $this->DataSource->ScreenningPUK->SetValue($this->ScreenningPUK->GetValue(true));
        $this->DataSource->ScreenningHypoth->SetValue($this->ScreenningHypoth->GetValue(true));
        $this->DataSource->FeedingID->SetValue($this->FeedingID->GetValue(true));
        $this->DataSource->NewBornOutcomeID->SetValue($this->NewBornOutcomeID->GetValue(true));
        $this->DataSource->BirthTime->SetValue($this->BirthTime->GetValue(true));
        $this->DataSource->OutcomeDate->SetValue($this->OutcomeDate->GetValue(true));
        $this->DataSource->OutcomeTime->SetValue($this->OutcomeTime->GetValue(true));
        $this->DataSource->DischargeDate->SetValue($this->DischargeDate->GetValue(true));
        $this->DataSource->DischargeTime->SetValue($this->DischargeTime->GetValue(true));
        $this->DataSource->DeliveryID->SetValue($this->DeliveryID->GetValue(true));
        $this->DataSource->DepartmentID->SetValue($this->DepartmentID->GetValue(true));
        $this->DataSource->Discharge->SetValue($this->Discharge->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->SkinToSkin->SetValue($this->SkinToSkin->GetValue(true));
        $this->DataSource->CommonStay->SetValue($this->CommonStay->GetValue(true));
        $this->DataSource->Died->SetValue($this->Died->GetValue(true));
        $this->DataSource->DiedType->SetValue($this->DiedType->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-05A640A8
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->NewBornN->SetValue($this->NewBornN->GetValue(true));
        $this->DataSource->Weight->SetValue($this->Weight->GetValue(true));
        $this->DataSource->TreatedNICU->SetValue($this->TreatedNICU->GetValue(true));
        $this->DataSource->VaccinationHepB->SetValue($this->VaccinationHepB->GetValue(true));
        $this->DataSource->VaccinationBCG->SetValue($this->VaccinationBCG->GetValue(true));
        $this->DataSource->AppliedBreastID->SetValue($this->AppliedBreastID->GetValue(true));
        $this->DataSource->Sex->SetValue($this->Sex->GetValue(true));
        $this->DataSource->Lenght->SetValue($this->Lenght->GetValue(true));
        $this->DataSource->Circumference->SetValue($this->Circumference->GetValue(true));
        $this->DataSource->ApgarScore1min->SetValue($this->ApgarScore1min->GetValue(true));
        $this->DataSource->ApgarScore5min->SetValue($this->ApgarScore5min->GetValue(true));
        $this->DataSource->Surfactant->SetValue($this->Surfactant->GetValue(true));
        $this->DataSource->Resuscitation->SetValue($this->Resuscitation->GetValue(true));
        $this->DataSource->ResuscitationID->SetValue($this->ResuscitationID->GetValue(true));
        $this->DataSource->DurationDays->SetValue($this->DurationDays->GetValue(true));
        $this->DataSource->Antibiotics->SetValue($this->Antibiotics->GetValue(true));
        $this->DataSource->ALVdays->SetValue($this->ALVdays->GetValue(true));
        $this->DataSource->CPAPdays->SetValue($this->CPAPdays->GetValue(true));
        $this->DataSource->FacilityID->SetValue($this->FacilityID->GetValue(true));
        $this->DataSource->DateReferral->SetValue($this->DateReferral->GetValue(true));
        $this->DataSource->ScreenningPUK->SetValue($this->ScreenningPUK->GetValue(true));
        $this->DataSource->ScreenningHypoth->SetValue($this->ScreenningHypoth->GetValue(true));
        $this->DataSource->FeedingID->SetValue($this->FeedingID->GetValue(true));
        $this->DataSource->NewBornOutcomeID->SetValue($this->NewBornOutcomeID->GetValue(true));
        $this->DataSource->BirthDate->SetValue($this->BirthDate->GetValue(true));
        $this->DataSource->BirthTime->SetValue($this->BirthTime->GetValue(true));
        $this->DataSource->OutcomeDate->SetValue($this->OutcomeDate->GetValue(true));
        $this->DataSource->OutcomeTime->SetValue($this->OutcomeTime->GetValue(true));
        $this->DataSource->DischargeDate->SetValue($this->DischargeDate->GetValue(true));
        $this->DataSource->DischargeTime->SetValue($this->DischargeTime->GetValue(true));
        $this->DataSource->DeliveryID->SetValue($this->DeliveryID->GetValue(true));
        $this->DataSource->DepartmentID->SetValue($this->DepartmentID->GetValue(true));
        $this->DataSource->Discharge->SetValue($this->Discharge->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->SkinToSkin->SetValue($this->SkinToSkin->GetValue(true));
        $this->DataSource->CommonStay->SetValue($this->CommonStay->GetValue(true));
        $this->DataSource->Died->SetValue($this->Died->GetValue(true));
        $this->DataSource->DiedType->SetValue($this->DiedType->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @3-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @3-651A0B65
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->TreatedNICU->Prepare();
        $this->VaccinationHepB->Prepare();
        $this->Resuscitation->Prepare();
        $this->Antibiotics->Prepare();
        $this->NewBornOutcomeID->Prepare();
        $this->SelectedClinicalDiagnosis->Prepare();
        $this->ListofClinicalTests->Prepare();
        $this->SelectedClinicalTests->Prepare();
        $this->ListofAnatomicPathology->Prepare();
        $this->SelectedAnatomicPathology->Prepare();
        $this->ResuscitationID->Prepare();
        $this->FacilityID->Prepare();
        $this->ScreenningPUK->Prepare();
        $this->Surfactant->Prepare();
        $this->DepartmentID->Prepare();
        $this->Discharge->Prepare();
        $this->ListofClinicalDiagnosis->Prepare();
        $this->ScreenningHypoth->Prepare();
        $this->VaccinationBCG->Prepare();
        $this->FeedingID->Prepare();
        $this->CommonStay->Prepare();
        $this->Sex->Prepare();
        $this->AppliedBreastID->Prepare();
        $this->SkinToSkin->Prepare();
        $this->Died->Prepare();
        $this->DiedType->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                $this->lastmodified->SetValue($this->DataSource->lastmodified->GetValue());
                $this->user->SetValue($this->DataSource->user->GetValue());
                if(!$this->FormSubmitted){
                    $this->TreatedNICU->SetValue($this->DataSource->TreatedNICU->GetValue());
                    $this->VaccinationHepB->SetValue($this->DataSource->VaccinationHepB->GetValue());
                    $this->DischargeDate->SetValue($this->DataSource->DischargeDate->GetValue());
                    $this->Lenght->SetValue($this->DataSource->Lenght->GetValue());
                    $this->ApgarScore1min->SetValue($this->DataSource->ApgarScore1min->GetValue());
                    $this->Resuscitation->SetValue($this->DataSource->Resuscitation->GetValue());
                    $this->Antibiotics->SetValue($this->DataSource->Antibiotics->GetValue());
                    $this->ALVdays->SetValue($this->DataSource->ALVdays->GetValue());
                    $this->NewBornOutcomeID->SetValue($this->DataSource->NewBornOutcomeID->GetValue());
                    $this->OutcomeDate->SetValue($this->DataSource->OutcomeDate->GetValue());
                    $this->OutcomeTime->SetValue($this->DataSource->OutcomeTime->GetValue());
                    $this->DischargeTime->SetValue($this->DataSource->DischargeTime->GetValue());
                    $this->Circumference->SetValue($this->DataSource->Circumference->GetValue());
                    $this->ApgarScore5min->SetValue($this->DataSource->ApgarScore5min->GetValue());
                    $this->ResuscitationID->SetValue($this->DataSource->ResuscitationID->GetValue());
                    $this->DurationDays->SetValue($this->DataSource->DurationDays->GetValue());
                    $this->CPAPdays->SetValue($this->DataSource->CPAPdays->GetValue());
                    $this->FacilityID->SetValue($this->DataSource->FacilityID->GetValue());
                    $this->DateReferral->SetValue($this->DataSource->DateReferral->GetValue());
                    $this->ScreenningPUK->SetValue($this->DataSource->ScreenningPUK->GetValue());
                    $this->Surfactant->SetValue($this->DataSource->Surfactant->GetValue());
                    $this->DeliveryID->SetValue($this->DataSource->DeliveryID->GetValue());
                    $this->CurrentUser->SetValue($this->DataSource->CurrentUser->GetValue());
                    $this->DepartmentID->SetValue($this->DataSource->DepartmentID->GetValue());
                    $this->Discharge->SetValue($this->DataSource->Discharge->GetValue());
                    $this->ScreenningHypoth->SetValue($this->DataSource->ScreenningHypoth->GetValue());
                    $this->VaccinationBCG->SetValue($this->DataSource->VaccinationBCG->GetValue());
                    $this->FeedingID->SetValue($this->DataSource->FeedingID->GetValue());
                    $this->CommonStay->SetValue($this->DataSource->CommonStay->GetValue());
                    $this->Weight->SetValue($this->DataSource->Weight->GetValue());
                    $this->BirthDate->SetValue($this->DataSource->BirthDate->GetValue());
                    $this->BirthTime->SetValue($this->DataSource->BirthTime->GetValue());
                    $this->NewBornN->SetValue($this->DataSource->NewBornN->GetValue());
                    $this->Sex->SetValue($this->DataSource->Sex->GetValue());
                    $this->AppliedBreastID->SetValue($this->DataSource->AppliedBreastID->GetValue());
                    $this->SkinToSkin->SetValue($this->DataSource->SkinToSkin->GetValue());
                    $this->Died->SetValue($this->DataSource->Died->GetValue());
                    $this->DiedType->SetValue($this->DataSource->DiedType->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->TreatedNICU->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VaccinationHepB->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DischargeDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DischargeDateTime->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Lenght->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ApgarScore1min->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Resuscitation->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Antibiotics->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ALVdays->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NewBornOutcomeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OutcomeDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateOutcome->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_ClinicalDiagnosis->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_AnatomicPathology->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedClinicalDiagnosis->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofClinicalTests->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedClinicalTests->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_ClinicalTests->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OutcomeTime->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DischargeTime->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofAnatomicPathology->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedAnatomicPathology->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Circumference->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ApgarScore5min->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResuscitationID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DurationDays->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CPAPdays->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateReferral->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateReferral->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ScreenningPUK->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Surfactant->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeliveryID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Reloaded->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CurrentUser->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lastmodified->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DepartmentID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Discharge->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FilterofAnatomicPathology->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FilterofClinicalTests->Errors->ToString());
            $Error = ComposeStrings($Error, $this->birthDateTemp->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FilterofClinicalDiagnosis->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofClinicalDiagnosis->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ScreenningHypoth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VaccinationBCG->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FeedingID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CommonStay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Weight->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BirthTime->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NewBornN->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Sex->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AppliedBreastID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SkinToSkin->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Died->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiedType->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->TreatedNICU->Show();
        $this->VaccinationHepB->Show();
        $this->DischargeDate->Show();
        $this->DatePicker_DischargeDateTime->Show();
        $this->Lenght->Show();
        $this->ApgarScore1min->Show();
        $this->Resuscitation->Show();
        $this->Antibiotics->Show();
        $this->ALVdays->Show();
        $this->NewBornOutcomeID->Show();
        $this->OutcomeDate->Show();
        $this->DatePicker_DateOutcome->Show();
        $this->LinkedID_ClinicalDiagnosis->Show();
        $this->LinkedID_AnatomicPathology->Show();
        $this->RightButton_ClinicalDiagnosis->Show();
        $this->LeftButton_ClinicalDiagnosis->Show();
        $this->SelectedClinicalDiagnosis->Show();
        $this->ListofClinicalTests->Show();
        $this->RightButtonClinicalTests->Show();
        $this->LeftButtonClinicalTests->Show();
        $this->SelectedClinicalTests->Show();
        $this->LinkedID_ClinicalTests->Show();
        $this->OutcomeTime->Show();
        $this->DischargeTime->Show();
        $this->ListofAnatomicPathology->Show();
        $this->RightButton_AnatomicPathology->Show();
        $this->LeftButton_AnatomicPathology->Show();
        $this->SelectedAnatomicPathology->Show();
        $this->Circumference->Show();
        $this->ApgarScore5min->Show();
        $this->ResuscitationID->Show();
        $this->DurationDays->Show();
        $this->CPAPdays->Show();
        $this->FacilityID->Show();
        $this->DateReferral->Show();
        $this->DatePicker_DateReferral->Show();
        $this->ScreenningPUK->Show();
        $this->Surfactant->Show();
        $this->DeliveryID->Show();
        $this->Reloaded->Show();
        $this->CurrentUser->Show();
        $this->lastmodified->Show();
        $this->user->Show();
        $this->DepartmentID->Show();
        $this->Discharge->Show();
        $this->FilterofAnatomicPathology->Show();
        $this->FilterofClinicalTests->Show();
        $this->birthDateTemp->Show();
        $this->FilterofClinicalDiagnosis->Show();
        $this->ListofClinicalDiagnosis->Show();
        $this->ScreenningHypoth->Show();
        $this->VaccinationBCG->Show();
        $this->FeedingID->Show();
        $this->CommonStay->Show();
        $this->Weight->Show();
        $this->BirthDate->Show();
        $this->DatePicker_BirthDate->Show();
        $this->BirthTime->Show();
        $this->NewBornN->Show();
        $this->Sex->Show();
        $this->AppliedBreastID->Show();
        $this->SkinToSkin->Show();
        $this->Died->Show();
        $this->DiedType->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End newborn Class @3-FCB6E20C

class clsnewbornDataSource extends clsDBregistry_db {  //newbornDataSource Class @3-6B507A28

//DataSource Variables @3-35EAE754
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $DeleteParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $TreatedNICU;
    public $VaccinationHepB;
    public $DischargeDate;
    public $Lenght;
    public $ApgarScore1min;
    public $Resuscitation;
    public $Antibiotics;
    public $ALVdays;
    public $NewBornOutcomeID;
    public $OutcomeDate;
    public $LinkedID_ClinicalDiagnosis;
    public $LinkedID_AnatomicPathology;
    public $SelectedClinicalDiagnosis;
    public $ListofClinicalTests;
    public $SelectedClinicalTests;
    public $LinkedID_ClinicalTests;
    public $OutcomeTime;
    public $DischargeTime;
    public $ListofAnatomicPathology;
    public $SelectedAnatomicPathology;
    public $Circumference;
    public $ApgarScore5min;
    public $ResuscitationID;
    public $DurationDays;
    public $CPAPdays;
    public $FacilityID;
    public $DateReferral;
    public $ScreenningPUK;
    public $Surfactant;
    public $DeliveryID;
    public $Reloaded;
    public $CurrentUser;
    public $lastmodified;
    public $user;
    public $DepartmentID;
    public $Discharge;
    public $FilterofAnatomicPathology;
    public $FilterofClinicalTests;
    public $birthDateTemp;
    public $FilterofClinicalDiagnosis;
    public $ListofClinicalDiagnosis;
    public $ScreenningHypoth;
    public $VaccinationBCG;
    public $FeedingID;
    public $CommonStay;
    public $Weight;
    public $BirthDate;
    public $BirthTime;
    public $NewBornN;
    public $Sex;
    public $AppliedBreastID;
    public $SkinToSkin;
    public $Died;
    public $DiedType;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-EC7E6F20
    function clsnewbornDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record newborn/Error";
        $this->Initialize();
        $this->TreatedNICU = new clsField("TreatedNICU", ccsInteger, "");
        
        $this->VaccinationHepB = new clsField("VaccinationHepB", ccsInteger, "");
        
        $this->DischargeDate = new clsField("DischargeDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Lenght = new clsField("Lenght", ccsInteger, "");
        
        $this->ApgarScore1min = new clsField("ApgarScore1min", ccsInteger, "");
        
        $this->Resuscitation = new clsField("Resuscitation", ccsInteger, "");
        
        $this->Antibiotics = new clsField("Antibiotics", ccsInteger, "");
        
        $this->ALVdays = new clsField("ALVdays", ccsInteger, "");
        
        $this->NewBornOutcomeID = new clsField("NewBornOutcomeID", ccsInteger, "");
        
        $this->OutcomeDate = new clsField("OutcomeDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->LinkedID_ClinicalDiagnosis = new clsField("LinkedID_ClinicalDiagnosis", ccsText, "");
        
        $this->LinkedID_AnatomicPathology = new clsField("LinkedID_AnatomicPathology", ccsText, "");
        
        $this->SelectedClinicalDiagnosis = new clsField("SelectedClinicalDiagnosis", ccsText, "");
        
        $this->ListofClinicalTests = new clsField("ListofClinicalTests", ccsText, "");
        
        $this->SelectedClinicalTests = new clsField("SelectedClinicalTests", ccsInteger, "");
        
        $this->LinkedID_ClinicalTests = new clsField("LinkedID_ClinicalTests", ccsText, "");
        
        $this->OutcomeTime = new clsField("OutcomeTime", ccsDate, array("HH", ":", "nn", ":", "ss"));
        
        $this->DischargeTime = new clsField("DischargeTime", ccsDate, array("HH", ":", "nn", ":", "ss"));
        
        $this->ListofAnatomicPathology = new clsField("ListofAnatomicPathology", ccsText, "");
        
        $this->SelectedAnatomicPathology = new clsField("SelectedAnatomicPathology", ccsText, "");
        
        $this->Circumference = new clsField("Circumference", ccsInteger, "");
        
        $this->ApgarScore5min = new clsField("ApgarScore5min", ccsInteger, "");
        
        $this->ResuscitationID = new clsField("ResuscitationID", ccsInteger, "");
        
        $this->DurationDays = new clsField("DurationDays", ccsInteger, "");
        
        $this->CPAPdays = new clsField("CPAPdays", ccsInteger, "");
        
        $this->FacilityID = new clsField("FacilityID", ccsInteger, "");
        
        $this->DateReferral = new clsField("DateReferral", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->ScreenningPUK = new clsField("ScreenningPUK", ccsInteger, "");
        
        $this->Surfactant = new clsField("Surfactant", ccsInteger, "");
        
        $this->DeliveryID = new clsField("DeliveryID", ccsInteger, "");
        
        $this->Reloaded = new clsField("Reloaded", ccsBoolean, $this->BooleanFormat);
        
        $this->CurrentUser = new clsField("CurrentUser", ccsText, "");
        
        $this->lastmodified = new clsField("lastmodified", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->user = new clsField("user", ccsText, "");
        
        $this->DepartmentID = new clsField("DepartmentID", ccsInteger, "");
        
        $this->Discharge = new clsField("Discharge", ccsInteger, "");
        
        $this->FilterofAnatomicPathology = new clsField("FilterofAnatomicPathology", ccsText, "");
        
        $this->FilterofClinicalTests = new clsField("FilterofClinicalTests", ccsText, "");
        
        $this->birthDateTemp = new clsField("birthDateTemp", ccsText, "");
        
        $this->FilterofClinicalDiagnosis = new clsField("FilterofClinicalDiagnosis", ccsText, "");
        
        $this->ListofClinicalDiagnosis = new clsField("ListofClinicalDiagnosis", ccsText, "");
        
        $this->ScreenningHypoth = new clsField("ScreenningHypoth", ccsInteger, "");
        
        $this->VaccinationBCG = new clsField("VaccinationBCG", ccsInteger, "");
        
        $this->FeedingID = new clsField("FeedingID", ccsInteger, "");
        
        $this->CommonStay = new clsField("CommonStay", ccsInteger, "");
        
        $this->Weight = new clsField("Weight", ccsSingle, "");
        
        $this->BirthDate = new clsField("BirthDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->BirthTime = new clsField("BirthTime", ccsDate, array("HH", ":", "nn", ":", "ss"));
        
        $this->NewBornN = new clsField("NewBornN", ccsText, "");
        
        $this->Sex = new clsField("Sex", ccsInteger, "");
        
        $this->AppliedBreastID = new clsField("AppliedBreastID", ccsInteger, "");
        
        $this->SkinToSkin = new clsField("SkinToSkin", ccsInteger, "");
        
        $this->Died = new clsField("Died", ccsInteger, "");
        
        $this->DiedType = new clsField("DiedType", ccsInteger, "");
        

        $this->InsertFields["NewBornN"] = array("Name" => "NewBornN", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Weight"] = array("Name" => "Weight", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->InsertFields["TreatedNICU"] = array("Name" => "TreatedNICU", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["VaccinationHepB"] = array("Name" => "VaccinationHepB", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["VaccinationBCG"] = array("Name" => "VaccinationBCG", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["AppliedBreastID"] = array("Name" => "AppliedBreastID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Sex"] = array("Name" => "Sex", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["BirthDate"] = array("Name" => "BirthDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Lenght"] = array("Name" => "Lenght", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Circumference"] = array("Name" => "Circumference", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ApgarScore1min"] = array("Name" => "ApgarScore1min", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ApgarScore5min"] = array("Name" => "ApgarScore5min", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Surfactant"] = array("Name" => "Surfactant", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Resuscitation"] = array("Name" => "Resuscitation", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ResuscitationID"] = array("Name" => "ResuscitationID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DurationDays"] = array("Name" => "DurationDays", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Antibiotics"] = array("Name" => "Antibiotics", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ALVdays"] = array("Name" => "ALVdays", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["CPAPdays"] = array("Name" => "CPAPdays", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DateReferral"] = array("Name" => "DateReferral", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["ScreenningPUK"] = array("Name" => "ScreenningPUK", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ScreenningHypoth"] = array("Name" => "ScreenningHypoth", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FeedingID"] = array("Name" => "FeedingID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NewBornOutcomeID"] = array("Name" => "NewBornOutcomeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["BirthTime"] = array("Name" => "BirthTime", "Value" => "", "DataType" => ccsDate);
        $this->InsertFields["OutcomeDate"] = array("Name" => "OutcomeDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["OutcomeTime"] = array("Name" => "OutcomeTime", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DischargeDate"] = array("Name" => "DischargeDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DischargeTime"] = array("Name" => "DischargeTime", "Value" => "", "DataType" => ccsDate);
        $this->InsertFields["DeliveryID"] = array("Name" => "DeliveryID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DepartmentID"] = array("Name" => "DepartmentID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DischargeID"] = array("Name" => "DischargeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SkinToSkin"] = array("Name" => "SkinToSkin", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["CommonStay"] = array("Name" => "CommonStay", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Died"] = array("Name" => "Died", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DiedID"] = array("Name" => "DiedID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["NewBornN"] = array("Name" => "NewBornN", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Weight"] = array("Name" => "Weight", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->UpdateFields["TreatedNICU"] = array("Name" => "TreatedNICU", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["VaccinationHepB"] = array("Name" => "VaccinationHepB", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["VaccinationBCG"] = array("Name" => "VaccinationBCG", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["AppliedBreastID"] = array("Name" => "AppliedBreastID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Sex"] = array("Name" => "Sex", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Lenght"] = array("Name" => "Lenght", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Circumference"] = array("Name" => "Circumference", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ApgarScore1min"] = array("Name" => "ApgarScore1min", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ApgarScore5min"] = array("Name" => "ApgarScore5min", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Surfactant"] = array("Name" => "Surfactant", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Resuscitation"] = array("Name" => "Resuscitation", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResuscitationID"] = array("Name" => "ResuscitationID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DurationDays"] = array("Name" => "DurationDays", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Antibiotics"] = array("Name" => "Antibiotics", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ALVdays"] = array("Name" => "ALVdays", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["CPAPdays"] = array("Name" => "CPAPdays", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateReferral"] = array("Name" => "DateReferral", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["ScreenningPUK"] = array("Name" => "ScreenningPUK", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ScreenningHypoth"] = array("Name" => "ScreenningHypoth", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["FeedingID"] = array("Name" => "FeedingID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["NewBornOutcomeID"] = array("Name" => "NewBornOutcomeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["BirthDate"] = array("Name" => "BirthDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["BirthTime"] = array("Name" => "BirthTime", "Value" => "", "DataType" => ccsDate);
        $this->UpdateFields["OutcomeDate"] = array("Name" => "OutcomeDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["OutcomeTime"] = array("Name" => "OutcomeTime", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DischargeDate"] = array("Name" => "DischargeDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DischargeTime"] = array("Name" => "DischargeTime", "Value" => "", "DataType" => ccsDate);
        $this->UpdateFields["DeliveryID"] = array("Name" => "DeliveryID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DepartmentID"] = array("Name" => "DepartmentID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DischargeID"] = array("Name" => "DischargeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SkinToSkin"] = array("Name" => "SkinToSkin", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["CommonStay"] = array("Name" => "CommonStay", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Died"] = array("Name" => "Died", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiedID"] = array("Name" => "DiedID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-16A1AADB
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlNewBornID", ccsInteger, "", "", $this->Parameters["urlNewBornID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "newborn.NewBornID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @3-652C122B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT newborn.*, delivery.DeliveryID AS delivery_DeliveryID \n\n" .
        "FROM newborn INNER JOIN delivery ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-9D918BB3
    function SetValues()
    {
        $this->TreatedNICU->SetDBValue(trim($this->f("TreatedNICU")));
        $this->VaccinationHepB->SetDBValue(trim($this->f("VaccinationHepB")));
        $this->DischargeDate->SetDBValue(trim($this->f("DischargeDate")));
        $this->Lenght->SetDBValue(trim($this->f("Lenght")));
        $this->ApgarScore1min->SetDBValue(trim($this->f("ApgarScore1min")));
        $this->Resuscitation->SetDBValue(trim($this->f("Resuscitation")));
        $this->Antibiotics->SetDBValue(trim($this->f("Antibiotics")));
        $this->ALVdays->SetDBValue(trim($this->f("ALVdays")));
        $this->NewBornOutcomeID->SetDBValue(trim($this->f("NewBornOutcomeID")));
        $this->OutcomeDate->SetDBValue(trim($this->f("OutcomeDate")));
        $this->OutcomeTime->SetDBValue(trim($this->f("OutcomeTime")));
        $this->DischargeTime->SetDBValue(trim($this->f("DischargeTime")));
        $this->Circumference->SetDBValue(trim($this->f("Circumference")));
        $this->ApgarScore5min->SetDBValue(trim($this->f("ApgarScore5min")));
        $this->ResuscitationID->SetDBValue(trim($this->f("ResuscitationID")));
        $this->DurationDays->SetDBValue(trim($this->f("DurationDays")));
        $this->CPAPdays->SetDBValue(trim($this->f("CPAPdays")));
        $this->FacilityID->SetDBValue(trim($this->f("FacilityID")));
        $this->DateReferral->SetDBValue(trim($this->f("DateReferral")));
        $this->ScreenningPUK->SetDBValue(trim($this->f("ScreenningPUK")));
        $this->Surfactant->SetDBValue(trim($this->f("Surfactant")));
        $this->DeliveryID->SetDBValue(trim($this->f("delivery_DeliveryID")));
        $this->CurrentUser->SetDBValue($this->f("by_user"));
        $this->lastmodified->SetDBValue(trim($this->f("created")));
        $this->user->SetDBValue($this->f("by_user"));
        $this->DepartmentID->SetDBValue(trim($this->f("DepartmentID")));
        $this->Discharge->SetDBValue(trim($this->f("DischargeID")));
        $this->ScreenningHypoth->SetDBValue(trim($this->f("ScreenningHypoth")));
        $this->VaccinationBCG->SetDBValue(trim($this->f("VaccinationBCG")));
        $this->FeedingID->SetDBValue(trim($this->f("FeedingID")));
        $this->CommonStay->SetDBValue(trim($this->f("CommonStay")));
        $this->Weight->SetDBValue(trim($this->f("Weight")));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->BirthTime->SetDBValue(trim($this->f("BirthTime")));
        $this->NewBornN->SetDBValue($this->f("NewBornN"));
        $this->Sex->SetDBValue(trim($this->f("Sex")));
        $this->AppliedBreastID->SetDBValue(trim($this->f("AppliedBreastID")));
        $this->SkinToSkin->SetDBValue(trim($this->f("SkinToSkin")));
        $this->Died->SetDBValue(trim($this->f("Died")));
        $this->DiedType->SetDBValue(trim($this->f("ResuscitationID")));
    }
//End SetValues Method

//Insert Method @3-50EA47D1
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["NewBornN"] = new clsSQLParameter("ctrlNewBornN", ccsText, "", "", $this->NewBornN->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Weight"] = new clsSQLParameter("ctrlWeight", ccsSingle, "", "", $this->Weight->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TreatedNICU"] = new clsSQLParameter("ctrlTreatedNICU", ccsInteger, "", "", $this->TreatedNICU->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["VaccinationHepB"] = new clsSQLParameter("ctrlVaccinationHepB", ccsInteger, "", "", $this->VaccinationHepB->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["VaccinationBCG"] = new clsSQLParameter("ctrlVaccinationBCG", ccsInteger, "", "", $this->VaccinationBCG->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["AppliedBreastID"] = new clsSQLParameter("ctrlAppliedBreastID", ccsInteger, "", "", $this->AppliedBreastID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Sex"] = new clsSQLParameter("ctrlSex", ccsInteger, "", "", $this->Sex->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["BirthDate"] = new clsSQLParameter("ctrlBirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->BirthDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Lenght"] = new clsSQLParameter("ctrlLenght", ccsInteger, "", "", $this->Lenght->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Circumference"] = new clsSQLParameter("ctrlCircumference", ccsInteger, "", "", $this->Circumference->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ApgarScore1min"] = new clsSQLParameter("ctrlApgarScore1min", ccsInteger, "", "", $this->ApgarScore1min->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ApgarScore5min"] = new clsSQLParameter("ctrlApgarScore5min", ccsInteger, "", "", $this->ApgarScore5min->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Surfactant"] = new clsSQLParameter("ctrlSurfactant", ccsInteger, "", "", $this->Surfactant->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Resuscitation"] = new clsSQLParameter("ctrlResuscitation", ccsInteger, "", "", $this->Resuscitation->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ResuscitationID"] = new clsSQLParameter("ctrlResuscitationID", ccsInteger, "", "", $this->ResuscitationID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DurationDays"] = new clsSQLParameter("ctrlDurationDays", ccsInteger, "", "", $this->DurationDays->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Antibiotics"] = new clsSQLParameter("ctrlAntibiotics", ccsInteger, "", "", $this->Antibiotics->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ALVdays"] = new clsSQLParameter("ctrlALVdays", ccsInteger, "", "", $this->ALVdays->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CPAPdays"] = new clsSQLParameter("ctrlCPAPdays", ccsInteger, "", "", $this->CPAPdays->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacilityID", ccsInteger, "", "", $this->FacilityID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DateReferral"] = new clsSQLParameter("ctrlDateReferral", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DateReferral->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ScreenningPUK"] = new clsSQLParameter("ctrlScreenningPUK", ccsInteger, "", "", $this->ScreenningPUK->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ScreenningHypoth"] = new clsSQLParameter("ctrlScreenningHypoth", ccsInteger, "", "", $this->ScreenningHypoth->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FeedingID"] = new clsSQLParameter("ctrlFeedingID", ccsInteger, "", "", $this->FeedingID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NewBornOutcomeID"] = new clsSQLParameter("ctrlNewBornOutcomeID", ccsInteger, "", "", $this->NewBornOutcomeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["BirthTime"] = new clsSQLParameter("ctrlBirthTime", ccsDate, $DefaultDateFormat, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->BirthTime->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["OutcomeDate"] = new clsSQLParameter("ctrlOutcomeDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->OutcomeDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["OutcomeTime"] = new clsSQLParameter("ctrlOutcomeTime", ccsDate, array("ShortTime"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->OutcomeTime->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeDate"] = new clsSQLParameter("ctrlDischargeDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DischargeDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeTime"] = new clsSQLParameter("ctrlDischargeTime", ccsDate, array("ShortTime"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DischargeTime->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DeliveryID"] = new clsSQLParameter("ctrlDeliveryID", ccsInteger, "", "", $this->DeliveryID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DepartmentID"] = new clsSQLParameter("ctrlDepartmentID", ccsInteger, "", "", $this->DepartmentID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeID"] = new clsSQLParameter("ctrlDischarge", ccsInteger, "", "", $this->Discharge->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["SkinToSkin"] = new clsSQLParameter("ctrlSkinToSkin", ccsInteger, "", "", $this->SkinToSkin->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CommonStay"] = new clsSQLParameter("ctrlCommonStay", ccsInteger, "", "", $this->CommonStay->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Died"] = new clsSQLParameter("ctrlDied", ccsInteger, "", "", $this->Died->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DiedID"] = new clsSQLParameter("ctrlDiedType", ccsInteger, "", "", $this->DiedType->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["NewBornN"]->GetValue()) and !strlen($this->cp["NewBornN"]->GetText()) and !is_bool($this->cp["NewBornN"]->GetValue())) 
            $this->cp["NewBornN"]->SetValue($this->NewBornN->GetValue(true));
        if (!is_null($this->cp["Weight"]->GetValue()) and !strlen($this->cp["Weight"]->GetText()) and !is_bool($this->cp["Weight"]->GetValue())) 
            $this->cp["Weight"]->SetValue($this->Weight->GetValue(true));
        if (!is_null($this->cp["TreatedNICU"]->GetValue()) and !strlen($this->cp["TreatedNICU"]->GetText()) and !is_bool($this->cp["TreatedNICU"]->GetValue())) 
            $this->cp["TreatedNICU"]->SetValue($this->TreatedNICU->GetValue(true));
        if (!is_null($this->cp["VaccinationHepB"]->GetValue()) and !strlen($this->cp["VaccinationHepB"]->GetText()) and !is_bool($this->cp["VaccinationHepB"]->GetValue())) 
            $this->cp["VaccinationHepB"]->SetValue($this->VaccinationHepB->GetValue(true));
        if (!is_null($this->cp["VaccinationBCG"]->GetValue()) and !strlen($this->cp["VaccinationBCG"]->GetText()) and !is_bool($this->cp["VaccinationBCG"]->GetValue())) 
            $this->cp["VaccinationBCG"]->SetValue($this->VaccinationBCG->GetValue(true));
        if (!is_null($this->cp["AppliedBreastID"]->GetValue()) and !strlen($this->cp["AppliedBreastID"]->GetText()) and !is_bool($this->cp["AppliedBreastID"]->GetValue())) 
            $this->cp["AppliedBreastID"]->SetValue($this->AppliedBreastID->GetValue(true));
        if (!is_null($this->cp["Sex"]->GetValue()) and !strlen($this->cp["Sex"]->GetText()) and !is_bool($this->cp["Sex"]->GetValue())) 
            $this->cp["Sex"]->SetValue($this->Sex->GetValue(true));
        if (!is_null($this->cp["BirthDate"]->GetValue()) and !strlen($this->cp["BirthDate"]->GetText()) and !is_bool($this->cp["BirthDate"]->GetValue())) 
            $this->cp["BirthDate"]->SetValue($this->BirthDate->GetValue(true));
        if (!is_null($this->cp["Lenght"]->GetValue()) and !strlen($this->cp["Lenght"]->GetText()) and !is_bool($this->cp["Lenght"]->GetValue())) 
            $this->cp["Lenght"]->SetValue($this->Lenght->GetValue(true));
        if (!is_null($this->cp["Circumference"]->GetValue()) and !strlen($this->cp["Circumference"]->GetText()) and !is_bool($this->cp["Circumference"]->GetValue())) 
            $this->cp["Circumference"]->SetValue($this->Circumference->GetValue(true));
        if (!is_null($this->cp["ApgarScore1min"]->GetValue()) and !strlen($this->cp["ApgarScore1min"]->GetText()) and !is_bool($this->cp["ApgarScore1min"]->GetValue())) 
            $this->cp["ApgarScore1min"]->SetValue($this->ApgarScore1min->GetValue(true));
        if (!is_null($this->cp["ApgarScore5min"]->GetValue()) and !strlen($this->cp["ApgarScore5min"]->GetText()) and !is_bool($this->cp["ApgarScore5min"]->GetValue())) 
            $this->cp["ApgarScore5min"]->SetValue($this->ApgarScore5min->GetValue(true));
        if (!is_null($this->cp["Surfactant"]->GetValue()) and !strlen($this->cp["Surfactant"]->GetText()) and !is_bool($this->cp["Surfactant"]->GetValue())) 
            $this->cp["Surfactant"]->SetValue($this->Surfactant->GetValue(true));
        if (!is_null($this->cp["Resuscitation"]->GetValue()) and !strlen($this->cp["Resuscitation"]->GetText()) and !is_bool($this->cp["Resuscitation"]->GetValue())) 
            $this->cp["Resuscitation"]->SetValue($this->Resuscitation->GetValue(true));
        if (!is_null($this->cp["ResuscitationID"]->GetValue()) and !strlen($this->cp["ResuscitationID"]->GetText()) and !is_bool($this->cp["ResuscitationID"]->GetValue())) 
            $this->cp["ResuscitationID"]->SetValue($this->ResuscitationID->GetValue(true));
        if (!is_null($this->cp["DurationDays"]->GetValue()) and !strlen($this->cp["DurationDays"]->GetText()) and !is_bool($this->cp["DurationDays"]->GetValue())) 
            $this->cp["DurationDays"]->SetValue($this->DurationDays->GetValue(true));
        if (!is_null($this->cp["Antibiotics"]->GetValue()) and !strlen($this->cp["Antibiotics"]->GetText()) and !is_bool($this->cp["Antibiotics"]->GetValue())) 
            $this->cp["Antibiotics"]->SetValue($this->Antibiotics->GetValue(true));
        if (!is_null($this->cp["ALVdays"]->GetValue()) and !strlen($this->cp["ALVdays"]->GetText()) and !is_bool($this->cp["ALVdays"]->GetValue())) 
            $this->cp["ALVdays"]->SetValue($this->ALVdays->GetValue(true));
        if (!is_null($this->cp["CPAPdays"]->GetValue()) and !strlen($this->cp["CPAPdays"]->GetText()) and !is_bool($this->cp["CPAPdays"]->GetValue())) 
            $this->cp["CPAPdays"]->SetValue($this->CPAPdays->GetValue(true));
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->FacilityID->GetValue(true));
        if (!is_null($this->cp["DateReferral"]->GetValue()) and !strlen($this->cp["DateReferral"]->GetText()) and !is_bool($this->cp["DateReferral"]->GetValue())) 
            $this->cp["DateReferral"]->SetValue($this->DateReferral->GetValue(true));
        if (!is_null($this->cp["ScreenningPUK"]->GetValue()) and !strlen($this->cp["ScreenningPUK"]->GetText()) and !is_bool($this->cp["ScreenningPUK"]->GetValue())) 
            $this->cp["ScreenningPUK"]->SetValue($this->ScreenningPUK->GetValue(true));
        if (!is_null($this->cp["ScreenningHypoth"]->GetValue()) and !strlen($this->cp["ScreenningHypoth"]->GetText()) and !is_bool($this->cp["ScreenningHypoth"]->GetValue())) 
            $this->cp["ScreenningHypoth"]->SetValue($this->ScreenningHypoth->GetValue(true));
        if (!is_null($this->cp["FeedingID"]->GetValue()) and !strlen($this->cp["FeedingID"]->GetText()) and !is_bool($this->cp["FeedingID"]->GetValue())) 
            $this->cp["FeedingID"]->SetValue($this->FeedingID->GetValue(true));
        if (!is_null($this->cp["NewBornOutcomeID"]->GetValue()) and !strlen($this->cp["NewBornOutcomeID"]->GetText()) and !is_bool($this->cp["NewBornOutcomeID"]->GetValue())) 
            $this->cp["NewBornOutcomeID"]->SetValue($this->NewBornOutcomeID->GetValue(true));
        if (!is_null($this->cp["BirthTime"]->GetValue()) and !strlen($this->cp["BirthTime"]->GetText()) and !is_bool($this->cp["BirthTime"]->GetValue())) 
            $this->cp["BirthTime"]->SetValue($this->BirthTime->GetValue(true));
        if (!is_null($this->cp["OutcomeDate"]->GetValue()) and !strlen($this->cp["OutcomeDate"]->GetText()) and !is_bool($this->cp["OutcomeDate"]->GetValue())) 
            $this->cp["OutcomeDate"]->SetValue($this->OutcomeDate->GetValue(true));
        if (!is_null($this->cp["OutcomeTime"]->GetValue()) and !strlen($this->cp["OutcomeTime"]->GetText()) and !is_bool($this->cp["OutcomeTime"]->GetValue())) 
            $this->cp["OutcomeTime"]->SetValue($this->OutcomeTime->GetValue(true));
        if (!is_null($this->cp["DischargeDate"]->GetValue()) and !strlen($this->cp["DischargeDate"]->GetText()) and !is_bool($this->cp["DischargeDate"]->GetValue())) 
            $this->cp["DischargeDate"]->SetValue($this->DischargeDate->GetValue(true));
        if (!is_null($this->cp["DischargeTime"]->GetValue()) and !strlen($this->cp["DischargeTime"]->GetText()) and !is_bool($this->cp["DischargeTime"]->GetValue())) 
            $this->cp["DischargeTime"]->SetValue($this->DischargeTime->GetValue(true));
        if (!is_null($this->cp["DeliveryID"]->GetValue()) and !strlen($this->cp["DeliveryID"]->GetText()) and !is_bool($this->cp["DeliveryID"]->GetValue())) 
            $this->cp["DeliveryID"]->SetValue($this->DeliveryID->GetValue(true));
        if (!is_null($this->cp["DepartmentID"]->GetValue()) and !strlen($this->cp["DepartmentID"]->GetText()) and !is_bool($this->cp["DepartmentID"]->GetValue())) 
            $this->cp["DepartmentID"]->SetValue($this->DepartmentID->GetValue(true));
        if (!is_null($this->cp["DischargeID"]->GetValue()) and !strlen($this->cp["DischargeID"]->GetText()) and !is_bool($this->cp["DischargeID"]->GetValue())) 
            $this->cp["DischargeID"]->SetValue($this->Discharge->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["SkinToSkin"]->GetValue()) and !strlen($this->cp["SkinToSkin"]->GetText()) and !is_bool($this->cp["SkinToSkin"]->GetValue())) 
            $this->cp["SkinToSkin"]->SetValue($this->SkinToSkin->GetValue(true));
        if (!is_null($this->cp["CommonStay"]->GetValue()) and !strlen($this->cp["CommonStay"]->GetText()) and !is_bool($this->cp["CommonStay"]->GetValue())) 
            $this->cp["CommonStay"]->SetValue($this->CommonStay->GetValue(true));
        if (!is_null($this->cp["Died"]->GetValue()) and !strlen($this->cp["Died"]->GetText()) and !is_bool($this->cp["Died"]->GetValue())) 
            $this->cp["Died"]->SetValue($this->Died->GetValue(true));
        if (!is_null($this->cp["DiedID"]->GetValue()) and !strlen($this->cp["DiedID"]->GetText()) and !is_bool($this->cp["DiedID"]->GetValue())) 
            $this->cp["DiedID"]->SetValue($this->DiedType->GetValue(true));
        $this->InsertFields["NewBornN"]["Value"] = $this->cp["NewBornN"]->GetDBValue(true);
        $this->InsertFields["Weight"]["Value"] = $this->cp["Weight"]->GetDBValue(true);
        $this->InsertFields["TreatedNICU"]["Value"] = $this->cp["TreatedNICU"]->GetDBValue(true);
        $this->InsertFields["VaccinationHepB"]["Value"] = $this->cp["VaccinationHepB"]->GetDBValue(true);
        $this->InsertFields["VaccinationBCG"]["Value"] = $this->cp["VaccinationBCG"]->GetDBValue(true);
        $this->InsertFields["AppliedBreastID"]["Value"] = $this->cp["AppliedBreastID"]->GetDBValue(true);
        $this->InsertFields["Sex"]["Value"] = $this->cp["Sex"]->GetDBValue(true);
        $this->InsertFields["BirthDate"]["Value"] = $this->cp["BirthDate"]->GetDBValue(true);
        $this->InsertFields["Lenght"]["Value"] = $this->cp["Lenght"]->GetDBValue(true);
        $this->InsertFields["Circumference"]["Value"] = $this->cp["Circumference"]->GetDBValue(true);
        $this->InsertFields["ApgarScore1min"]["Value"] = $this->cp["ApgarScore1min"]->GetDBValue(true);
        $this->InsertFields["ApgarScore5min"]["Value"] = $this->cp["ApgarScore5min"]->GetDBValue(true);
        $this->InsertFields["Surfactant"]["Value"] = $this->cp["Surfactant"]->GetDBValue(true);
        $this->InsertFields["Resuscitation"]["Value"] = $this->cp["Resuscitation"]->GetDBValue(true);
        $this->InsertFields["ResuscitationID"]["Value"] = $this->cp["ResuscitationID"]->GetDBValue(true);
        $this->InsertFields["DurationDays"]["Value"] = $this->cp["DurationDays"]->GetDBValue(true);
        $this->InsertFields["Antibiotics"]["Value"] = $this->cp["Antibiotics"]->GetDBValue(true);
        $this->InsertFields["ALVdays"]["Value"] = $this->cp["ALVdays"]->GetDBValue(true);
        $this->InsertFields["CPAPdays"]["Value"] = $this->cp["CPAPdays"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->InsertFields["DateReferral"]["Value"] = $this->cp["DateReferral"]->GetDBValue(true);
        $this->InsertFields["ScreenningPUK"]["Value"] = $this->cp["ScreenningPUK"]->GetDBValue(true);
        $this->InsertFields["ScreenningHypoth"]["Value"] = $this->cp["ScreenningHypoth"]->GetDBValue(true);
        $this->InsertFields["FeedingID"]["Value"] = $this->cp["FeedingID"]->GetDBValue(true);
        $this->InsertFields["NewBornOutcomeID"]["Value"] = $this->cp["NewBornOutcomeID"]->GetDBValue(true);
        $this->InsertFields["BirthTime"]["Value"] = $this->cp["BirthTime"]->GetDBValue(true);
        $this->InsertFields["OutcomeDate"]["Value"] = $this->cp["OutcomeDate"]->GetDBValue(true);
        $this->InsertFields["OutcomeTime"]["Value"] = $this->cp["OutcomeTime"]->GetDBValue(true);
        $this->InsertFields["DischargeDate"]["Value"] = $this->cp["DischargeDate"]->GetDBValue(true);
        $this->InsertFields["DischargeTime"]["Value"] = $this->cp["DischargeTime"]->GetDBValue(true);
        $this->InsertFields["DeliveryID"]["Value"] = $this->cp["DeliveryID"]->GetDBValue(true);
        $this->InsertFields["DepartmentID"]["Value"] = $this->cp["DepartmentID"]->GetDBValue(true);
        $this->InsertFields["DischargeID"]["Value"] = $this->cp["DischargeID"]->GetDBValue(true);
        $this->InsertFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->InsertFields["SkinToSkin"]["Value"] = $this->cp["SkinToSkin"]->GetDBValue(true);
        $this->InsertFields["CommonStay"]["Value"] = $this->cp["CommonStay"]->GetDBValue(true);
        $this->InsertFields["Died"]["Value"] = $this->cp["Died"]->GetDBValue(true);
        $this->InsertFields["DiedID"]["Value"] = $this->cp["DiedID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("newborn", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-FFE55E85
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["NewBornN"] = new clsSQLParameter("ctrlNewBornN", ccsText, "", "", $this->NewBornN->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Weight"] = new clsSQLParameter("ctrlWeight", ccsSingle, "", "", $this->Weight->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TreatedNICU"] = new clsSQLParameter("ctrlTreatedNICU", ccsInteger, "", "", $this->TreatedNICU->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["VaccinationHepB"] = new clsSQLParameter("ctrlVaccinationHepB", ccsInteger, "", "", $this->VaccinationHepB->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["VaccinationBCG"] = new clsSQLParameter("ctrlVaccinationBCG", ccsInteger, "", "", $this->VaccinationBCG->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["AppliedBreastID"] = new clsSQLParameter("ctrlAppliedBreastID", ccsInteger, "", "", $this->AppliedBreastID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Sex"] = new clsSQLParameter("ctrlSex", ccsInteger, "", "", $this->Sex->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Lenght"] = new clsSQLParameter("ctrlLenght", ccsInteger, "", "", $this->Lenght->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Circumference"] = new clsSQLParameter("ctrlCircumference", ccsInteger, "", "", $this->Circumference->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ApgarScore1min"] = new clsSQLParameter("ctrlApgarScore1min", ccsInteger, "", "", $this->ApgarScore1min->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ApgarScore5min"] = new clsSQLParameter("ctrlApgarScore5min", ccsInteger, "", "", $this->ApgarScore5min->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Surfactant"] = new clsSQLParameter("ctrlSurfactant", ccsInteger, "", "", $this->Surfactant->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Resuscitation"] = new clsSQLParameter("ctrlResuscitation", ccsInteger, "", "", $this->Resuscitation->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ResuscitationID"] = new clsSQLParameter("ctrlResuscitationID", ccsInteger, "", "", $this->ResuscitationID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DurationDays"] = new clsSQLParameter("ctrlDurationDays", ccsInteger, "", "", $this->DurationDays->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Antibiotics"] = new clsSQLParameter("ctrlAntibiotics", ccsInteger, "", "", $this->Antibiotics->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ALVdays"] = new clsSQLParameter("ctrlALVdays", ccsInteger, "", "", $this->ALVdays->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CPAPdays"] = new clsSQLParameter("ctrlCPAPdays", ccsInteger, "", "", $this->CPAPdays->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacilityID", ccsInteger, "", "", $this->FacilityID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DateReferral"] = new clsSQLParameter("ctrlDateReferral", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DateReferral->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ScreenningPUK"] = new clsSQLParameter("ctrlScreenningPUK", ccsInteger, "", "", $this->ScreenningPUK->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ScreenningHypoth"] = new clsSQLParameter("ctrlScreenningHypoth", ccsInteger, "", "", $this->ScreenningHypoth->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FeedingID"] = new clsSQLParameter("ctrlFeedingID", ccsInteger, "", "", $this->FeedingID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NewBornOutcomeID"] = new clsSQLParameter("ctrlNewBornOutcomeID", ccsInteger, "", "", $this->NewBornOutcomeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["BirthDate"] = new clsSQLParameter("ctrlBirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->BirthDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["BirthTime"] = new clsSQLParameter("ctrlBirthTime", ccsDate, array("ShortTime"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->BirthTime->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["OutcomeDate"] = new clsSQLParameter("ctrlOutcomeDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->OutcomeDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["OutcomeTime"] = new clsSQLParameter("ctrlOutcomeTime", ccsDate, array("ShortTime"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->OutcomeTime->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeDate"] = new clsSQLParameter("ctrlDischargeDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DischargeDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeTime"] = new clsSQLParameter("ctrlDischargeTime", ccsDate, array("ShortTime"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DischargeTime->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DeliveryID"] = new clsSQLParameter("ctrlDeliveryID", ccsInteger, "", "", $this->DeliveryID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DepartmentID"] = new clsSQLParameter("ctrlDepartmentID", ccsInteger, "", "", $this->DepartmentID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeID"] = new clsSQLParameter("ctrlDischarge", ccsInteger, "", "", $this->Discharge->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["SkinToSkin"] = new clsSQLParameter("ctrlSkinToSkin", ccsInteger, "", "", $this->SkinToSkin->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CommonStay"] = new clsSQLParameter("ctrlCommonStay", ccsInteger, "", "", $this->CommonStay->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Died"] = new clsSQLParameter("ctrlDied", ccsInteger, "", "", $this->Died->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DiedID"] = new clsSQLParameter("ctrlDiedType", ccsInteger, "", "", $this->DiedType->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlNewBornID", ccsInteger, "", "", CCGetFromGet("NewBornID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["NewBornN"]->GetValue()) and !strlen($this->cp["NewBornN"]->GetText()) and !is_bool($this->cp["NewBornN"]->GetValue())) 
            $this->cp["NewBornN"]->SetValue($this->NewBornN->GetValue(true));
        if (!is_null($this->cp["Weight"]->GetValue()) and !strlen($this->cp["Weight"]->GetText()) and !is_bool($this->cp["Weight"]->GetValue())) 
            $this->cp["Weight"]->SetValue($this->Weight->GetValue(true));
        if (!is_null($this->cp["TreatedNICU"]->GetValue()) and !strlen($this->cp["TreatedNICU"]->GetText()) and !is_bool($this->cp["TreatedNICU"]->GetValue())) 
            $this->cp["TreatedNICU"]->SetValue($this->TreatedNICU->GetValue(true));
        if (!is_null($this->cp["VaccinationHepB"]->GetValue()) and !strlen($this->cp["VaccinationHepB"]->GetText()) and !is_bool($this->cp["VaccinationHepB"]->GetValue())) 
            $this->cp["VaccinationHepB"]->SetValue($this->VaccinationHepB->GetValue(true));
        if (!is_null($this->cp["VaccinationBCG"]->GetValue()) and !strlen($this->cp["VaccinationBCG"]->GetText()) and !is_bool($this->cp["VaccinationBCG"]->GetValue())) 
            $this->cp["VaccinationBCG"]->SetValue($this->VaccinationBCG->GetValue(true));
        if (!is_null($this->cp["AppliedBreastID"]->GetValue()) and !strlen($this->cp["AppliedBreastID"]->GetText()) and !is_bool($this->cp["AppliedBreastID"]->GetValue())) 
            $this->cp["AppliedBreastID"]->SetValue($this->AppliedBreastID->GetValue(true));
        if (!is_null($this->cp["Sex"]->GetValue()) and !strlen($this->cp["Sex"]->GetText()) and !is_bool($this->cp["Sex"]->GetValue())) 
            $this->cp["Sex"]->SetValue($this->Sex->GetValue(true));
        if (!is_null($this->cp["Lenght"]->GetValue()) and !strlen($this->cp["Lenght"]->GetText()) and !is_bool($this->cp["Lenght"]->GetValue())) 
            $this->cp["Lenght"]->SetValue($this->Lenght->GetValue(true));
        if (!is_null($this->cp["Circumference"]->GetValue()) and !strlen($this->cp["Circumference"]->GetText()) and !is_bool($this->cp["Circumference"]->GetValue())) 
            $this->cp["Circumference"]->SetValue($this->Circumference->GetValue(true));
        if (!is_null($this->cp["ApgarScore1min"]->GetValue()) and !strlen($this->cp["ApgarScore1min"]->GetText()) and !is_bool($this->cp["ApgarScore1min"]->GetValue())) 
            $this->cp["ApgarScore1min"]->SetValue($this->ApgarScore1min->GetValue(true));
        if (!is_null($this->cp["ApgarScore5min"]->GetValue()) and !strlen($this->cp["ApgarScore5min"]->GetText()) and !is_bool($this->cp["ApgarScore5min"]->GetValue())) 
            $this->cp["ApgarScore5min"]->SetValue($this->ApgarScore5min->GetValue(true));
        if (!is_null($this->cp["Surfactant"]->GetValue()) and !strlen($this->cp["Surfactant"]->GetText()) and !is_bool($this->cp["Surfactant"]->GetValue())) 
            $this->cp["Surfactant"]->SetValue($this->Surfactant->GetValue(true));
        if (!is_null($this->cp["Resuscitation"]->GetValue()) and !strlen($this->cp["Resuscitation"]->GetText()) and !is_bool($this->cp["Resuscitation"]->GetValue())) 
            $this->cp["Resuscitation"]->SetValue($this->Resuscitation->GetValue(true));
        if (!is_null($this->cp["ResuscitationID"]->GetValue()) and !strlen($this->cp["ResuscitationID"]->GetText()) and !is_bool($this->cp["ResuscitationID"]->GetValue())) 
            $this->cp["ResuscitationID"]->SetValue($this->ResuscitationID->GetValue(true));
        if (!is_null($this->cp["DurationDays"]->GetValue()) and !strlen($this->cp["DurationDays"]->GetText()) and !is_bool($this->cp["DurationDays"]->GetValue())) 
            $this->cp["DurationDays"]->SetValue($this->DurationDays->GetValue(true));
        if (!is_null($this->cp["Antibiotics"]->GetValue()) and !strlen($this->cp["Antibiotics"]->GetText()) and !is_bool($this->cp["Antibiotics"]->GetValue())) 
            $this->cp["Antibiotics"]->SetValue($this->Antibiotics->GetValue(true));
        if (!is_null($this->cp["ALVdays"]->GetValue()) and !strlen($this->cp["ALVdays"]->GetText()) and !is_bool($this->cp["ALVdays"]->GetValue())) 
            $this->cp["ALVdays"]->SetValue($this->ALVdays->GetValue(true));
        if (!is_null($this->cp["CPAPdays"]->GetValue()) and !strlen($this->cp["CPAPdays"]->GetText()) and !is_bool($this->cp["CPAPdays"]->GetValue())) 
            $this->cp["CPAPdays"]->SetValue($this->CPAPdays->GetValue(true));
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->FacilityID->GetValue(true));
        if (!is_null($this->cp["DateReferral"]->GetValue()) and !strlen($this->cp["DateReferral"]->GetText()) and !is_bool($this->cp["DateReferral"]->GetValue())) 
            $this->cp["DateReferral"]->SetValue($this->DateReferral->GetValue(true));
        if (!is_null($this->cp["ScreenningPUK"]->GetValue()) and !strlen($this->cp["ScreenningPUK"]->GetText()) and !is_bool($this->cp["ScreenningPUK"]->GetValue())) 
            $this->cp["ScreenningPUK"]->SetValue($this->ScreenningPUK->GetValue(true));
        if (!is_null($this->cp["ScreenningHypoth"]->GetValue()) and !strlen($this->cp["ScreenningHypoth"]->GetText()) and !is_bool($this->cp["ScreenningHypoth"]->GetValue())) 
            $this->cp["ScreenningHypoth"]->SetValue($this->ScreenningHypoth->GetValue(true));
        if (!is_null($this->cp["FeedingID"]->GetValue()) and !strlen($this->cp["FeedingID"]->GetText()) and !is_bool($this->cp["FeedingID"]->GetValue())) 
            $this->cp["FeedingID"]->SetValue($this->FeedingID->GetValue(true));
        if (!is_null($this->cp["NewBornOutcomeID"]->GetValue()) and !strlen($this->cp["NewBornOutcomeID"]->GetText()) and !is_bool($this->cp["NewBornOutcomeID"]->GetValue())) 
            $this->cp["NewBornOutcomeID"]->SetValue($this->NewBornOutcomeID->GetValue(true));
        if (!is_null($this->cp["BirthDate"]->GetValue()) and !strlen($this->cp["BirthDate"]->GetText()) and !is_bool($this->cp["BirthDate"]->GetValue())) 
            $this->cp["BirthDate"]->SetValue($this->BirthDate->GetValue(true));
        if (!is_null($this->cp["BirthTime"]->GetValue()) and !strlen($this->cp["BirthTime"]->GetText()) and !is_bool($this->cp["BirthTime"]->GetValue())) 
            $this->cp["BirthTime"]->SetValue($this->BirthTime->GetValue(true));
        if (!is_null($this->cp["OutcomeDate"]->GetValue()) and !strlen($this->cp["OutcomeDate"]->GetText()) and !is_bool($this->cp["OutcomeDate"]->GetValue())) 
            $this->cp["OutcomeDate"]->SetValue($this->OutcomeDate->GetValue(true));
        if (!is_null($this->cp["OutcomeTime"]->GetValue()) and !strlen($this->cp["OutcomeTime"]->GetText()) and !is_bool($this->cp["OutcomeTime"]->GetValue())) 
            $this->cp["OutcomeTime"]->SetValue($this->OutcomeTime->GetValue(true));
        if (!is_null($this->cp["DischargeDate"]->GetValue()) and !strlen($this->cp["DischargeDate"]->GetText()) and !is_bool($this->cp["DischargeDate"]->GetValue())) 
            $this->cp["DischargeDate"]->SetValue($this->DischargeDate->GetValue(true));
        if (!is_null($this->cp["DischargeTime"]->GetValue()) and !strlen($this->cp["DischargeTime"]->GetText()) and !is_bool($this->cp["DischargeTime"]->GetValue())) 
            $this->cp["DischargeTime"]->SetValue($this->DischargeTime->GetValue(true));
        if (!is_null($this->cp["DeliveryID"]->GetValue()) and !strlen($this->cp["DeliveryID"]->GetText()) and !is_bool($this->cp["DeliveryID"]->GetValue())) 
            $this->cp["DeliveryID"]->SetValue($this->DeliveryID->GetValue(true));
        if (!is_null($this->cp["DepartmentID"]->GetValue()) and !strlen($this->cp["DepartmentID"]->GetText()) and !is_bool($this->cp["DepartmentID"]->GetValue())) 
            $this->cp["DepartmentID"]->SetValue($this->DepartmentID->GetValue(true));
        if (!is_null($this->cp["DischargeID"]->GetValue()) and !strlen($this->cp["DischargeID"]->GetText()) and !is_bool($this->cp["DischargeID"]->GetValue())) 
            $this->cp["DischargeID"]->SetValue($this->Discharge->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["SkinToSkin"]->GetValue()) and !strlen($this->cp["SkinToSkin"]->GetText()) and !is_bool($this->cp["SkinToSkin"]->GetValue())) 
            $this->cp["SkinToSkin"]->SetValue($this->SkinToSkin->GetValue(true));
        if (!is_null($this->cp["CommonStay"]->GetValue()) and !strlen($this->cp["CommonStay"]->GetText()) and !is_bool($this->cp["CommonStay"]->GetValue())) 
            $this->cp["CommonStay"]->SetValue($this->CommonStay->GetValue(true));
        if (!is_null($this->cp["Died"]->GetValue()) and !strlen($this->cp["Died"]->GetText()) and !is_bool($this->cp["Died"]->GetValue())) 
            $this->cp["Died"]->SetValue($this->Died->GetValue(true));
        if (!is_null($this->cp["DiedID"]->GetValue()) and !strlen($this->cp["DiedID"]->GetText()) and !is_bool($this->cp["DiedID"]->GetValue())) 
            $this->cp["DiedID"]->SetValue($this->DiedType->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "NewBornID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["NewBornN"]["Value"] = $this->cp["NewBornN"]->GetDBValue(true);
        $this->UpdateFields["Weight"]["Value"] = $this->cp["Weight"]->GetDBValue(true);
        $this->UpdateFields["TreatedNICU"]["Value"] = $this->cp["TreatedNICU"]->GetDBValue(true);
        $this->UpdateFields["VaccinationHepB"]["Value"] = $this->cp["VaccinationHepB"]->GetDBValue(true);
        $this->UpdateFields["VaccinationBCG"]["Value"] = $this->cp["VaccinationBCG"]->GetDBValue(true);
        $this->UpdateFields["AppliedBreastID"]["Value"] = $this->cp["AppliedBreastID"]->GetDBValue(true);
        $this->UpdateFields["Sex"]["Value"] = $this->cp["Sex"]->GetDBValue(true);
        $this->UpdateFields["Lenght"]["Value"] = $this->cp["Lenght"]->GetDBValue(true);
        $this->UpdateFields["Circumference"]["Value"] = $this->cp["Circumference"]->GetDBValue(true);
        $this->UpdateFields["ApgarScore1min"]["Value"] = $this->cp["ApgarScore1min"]->GetDBValue(true);
        $this->UpdateFields["ApgarScore5min"]["Value"] = $this->cp["ApgarScore5min"]->GetDBValue(true);
        $this->UpdateFields["Surfactant"]["Value"] = $this->cp["Surfactant"]->GetDBValue(true);
        $this->UpdateFields["Resuscitation"]["Value"] = $this->cp["Resuscitation"]->GetDBValue(true);
        $this->UpdateFields["ResuscitationID"]["Value"] = $this->cp["ResuscitationID"]->GetDBValue(true);
        $this->UpdateFields["DurationDays"]["Value"] = $this->cp["DurationDays"]->GetDBValue(true);
        $this->UpdateFields["Antibiotics"]["Value"] = $this->cp["Antibiotics"]->GetDBValue(true);
        $this->UpdateFields["ALVdays"]["Value"] = $this->cp["ALVdays"]->GetDBValue(true);
        $this->UpdateFields["CPAPdays"]["Value"] = $this->cp["CPAPdays"]->GetDBValue(true);
        $this->UpdateFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->UpdateFields["DateReferral"]["Value"] = $this->cp["DateReferral"]->GetDBValue(true);
        $this->UpdateFields["ScreenningPUK"]["Value"] = $this->cp["ScreenningPUK"]->GetDBValue(true);
        $this->UpdateFields["ScreenningHypoth"]["Value"] = $this->cp["ScreenningHypoth"]->GetDBValue(true);
        $this->UpdateFields["FeedingID"]["Value"] = $this->cp["FeedingID"]->GetDBValue(true);
        $this->UpdateFields["NewBornOutcomeID"]["Value"] = $this->cp["NewBornOutcomeID"]->GetDBValue(true);
        $this->UpdateFields["BirthDate"]["Value"] = $this->cp["BirthDate"]->GetDBValue(true);
        $this->UpdateFields["BirthTime"]["Value"] = $this->cp["BirthTime"]->GetDBValue(true);
        $this->UpdateFields["OutcomeDate"]["Value"] = $this->cp["OutcomeDate"]->GetDBValue(true);
        $this->UpdateFields["OutcomeTime"]["Value"] = $this->cp["OutcomeTime"]->GetDBValue(true);
        $this->UpdateFields["DischargeDate"]["Value"] = $this->cp["DischargeDate"]->GetDBValue(true);
        $this->UpdateFields["DischargeTime"]["Value"] = $this->cp["DischargeTime"]->GetDBValue(true);
        $this->UpdateFields["DeliveryID"]["Value"] = $this->cp["DeliveryID"]->GetDBValue(true);
        $this->UpdateFields["DepartmentID"]["Value"] = $this->cp["DepartmentID"]->GetDBValue(true);
        $this->UpdateFields["DischargeID"]["Value"] = $this->cp["DischargeID"]->GetDBValue(true);
        $this->UpdateFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->UpdateFields["SkinToSkin"]["Value"] = $this->cp["SkinToSkin"]->GetDBValue(true);
        $this->UpdateFields["CommonStay"]["Value"] = $this->cp["CommonStay"]->GetDBValue(true);
        $this->UpdateFields["Died"]["Value"] = $this->cp["Died"]->GetDBValue(true);
        $this->UpdateFields["DiedID"]["Value"] = $this->cp["DiedID"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("newborn", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @3-FC912214
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlNewBornID", ccsInteger, "", "", CCGetFromGet("NewBornID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "NewBornID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM newborn";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End newbornDataSource Class @3-FCB6E20C

class clsRecordpregnancy_header { //pregnancy_header Class @198-8E4CDD04

//Variables @198-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @198-8D203E65
    function clsRecordpregnancy_header($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record pregnancy_header/Error";
        $this->DataSource = new clspregnancy_headerDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("3") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "pregnancy_header";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->PregnancyRecNr = new clsControl(ccsLabel, "PregnancyRecNr", $CCSLocales->GetText("PregnancyRecNr"), ccsText, "", CCGetRequestParam("PregnancyRecNr", $Method, NULL), $this);
            $this->FirstName = new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", $Method, NULL), $this);
            $this->FamiliyName = new clsControl(ccsLabel, "FamiliyName", "FamiliyName", ccsText, "", CCGetRequestParam("FamiliyName", $Method, NULL), $this);
            $this->BirthDate = new clsControl(ccsLabel, "BirthDate", "BirthDate", ccsDate, array("ShortDate"), CCGetRequestParam("BirthDate", $Method, NULL), $this);
            $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
            $this->PatientID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->PatientID->Page = "patient_maint_fac.php";
        }
    }
//End Class_Initialize Event

//Initialize Method @198-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @198-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @198-C82C427B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->FamiliyName->Errors->Count());
        $errors = ($errors || $this->BirthDate->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @198-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @198-17DC9883
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @198-860F6492
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
                $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                $this->FamiliyName->SetValue($this->DataSource->FamiliyName->GetValue());
                $this->BirthDate->SetValue($this->DataSource->BirthDate->GetValue());
                $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FamiliyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->PregnancyRecNr->Show();
        $this->FirstName->Show();
        $this->FamiliyName->Show();
        $this->BirthDate->Show();
        $this->PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End pregnancy_header Class @198-FCB6E20C

class clspregnancy_headerDataSource extends clsDBregistry_db {  //pregnancy_headerDataSource Class @198-B1B2C690

//DataSource Variables @198-DD53AE5C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $PregnancyRecNr;
    public $FirstName;
    public $FamiliyName;
    public $BirthDate;
    public $PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @198-B3F735C8
    function clspregnancy_headerDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record pregnancy_header/Error";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->FamiliyName = new clsField("FamiliyName", ccsText, "");
        
        $this->BirthDate = new clsField("BirthDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @198-190B3DAA
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @198-64C2DC81
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM pregnancy INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @198-81074AD6
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->FirstName->SetDBValue($this->f("GivenName"));
        $this->FamiliyName->SetDBValue($this->f("FamilyName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_headerDataSource Class @198-FCB6E20C

class clsRecordpregnancy_header1 { //pregnancy_header1 Class @235-18A06872

//Variables @235-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @235-60A6F8D5
    function clsRecordpregnancy_header1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record pregnancy_header1/Error";
        $this->DataSource = new clspregnancy_header1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;2");
            $this->ComponentName = "pregnancy_header1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->PregnancyRecNr = new clsControl(ccsLabel, "PregnancyRecNr", $CCSLocales->GetText("PregnancyRecNr"), ccsText, "", CCGetRequestParam("PregnancyRecNr", $Method, NULL), $this);
            $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
            $this->PatientID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->PatientID->Page = "patient_maint_district.php";
        }
    }
//End Class_Initialize Event

//Initialize Method @235-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @235-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @235-651F84E8
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @235-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @235-17DC9883
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @235-6CAF9031
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
                $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->PregnancyRecNr->Show();
        $this->PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End pregnancy_header1 Class @235-FCB6E20C

class clspregnancy_header1DataSource extends clsDBregistry_db {  //pregnancy_header1DataSource Class @235-FA18A47E

//DataSource Variables @235-E31437D1
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $PregnancyRecNr;
    public $PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @235-A243E463
    function clspregnancy_header1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record pregnancy_header1/Error";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @235-190B3DAA
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @235-64C2DC81
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM pregnancy INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @235-0855F252
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_header1DataSource Class @235-FCB6E20C

//Initialize Page @1-BDA541FD
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "newborn_maint.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Check SSL @1-E30DD771
CCCheckSSL();
//End Check SSL

//Authenticate User @1-0C179BD6
CCSecurityRedirect("1;3;2", SecureURL . "" .  "noaccess.php");
//End Authenticate User

//Include events file @1-47D420CF
include_once("./newborn_maint_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-7BD5DF3D
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$newborn = new clsRecordnewborn("", $MainPage);
$pregnancy_header = new clsRecordpregnancy_header("", $MainPage);
$pregnancy_header1 = new clsRecordpregnancy_header1("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->newborn = & $newborn;
$MainPage->pregnancy_header = & $pregnancy_header;
$MainPage->pregnancy_header1 = & $pregnancy_header1;
$newborn->Initialize();
$pregnancy_header->Initialize();
$pregnancy_header1->Initialize();

BindEvents();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-A06E9207
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
$Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "UTF-8", "replace");
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-A6132D86
$topmenu->Operations();
$newborn->Operation();
$pregnancy_header->Operation();
$pregnancy_header1->Operation();
//End Execute Components

//Go to destination page @1-5528C426
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($newborn);
    unset($pregnancy_header);
    unset($pregnancy_header1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-4D7F4A3F
$topmenu->Show();
$newborn->Show();
$pregnancy_header->Show();
$pregnancy_header1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-E86E8EAC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($newborn);
unset($pregnancy_header);
unset($pregnancy_header1);
unset($Tpl);
//End Unload Page


?>
