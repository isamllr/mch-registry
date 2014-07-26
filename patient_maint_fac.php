<?php
//Include Common Files @1-AA6376F9
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "patient_maint_fac.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @64-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsGridpregnancy { //pregnancy class @69-F748B589

//Variables @69-C694E554

    // Public variables
    public $ComponentType = "Grid";
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $ErrorBlock;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $ForceIteration = false;
    public $HasRecord = false;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $RowNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";
    public $Attributes;

    // Grid Controls
    public $StaticControls;
    public $RowControls;
    public $Sorter_PregnancyRecNr;
    public $Sorter_PregRegDate;
    public $Sorter_LastMensesDate;
    public $Sorter_GestationAge;
    public $Sorter_Calc_DeliveryDate;
    public $Sorter_PregnancyTypeName;
    public $Sorter_Doctor;
//End Variables

//Class_Initialize Event @69-19EC1D9D
    function clsGridpregnancy($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "pregnancy";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid pregnancy";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clspregnancyDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->Visible = (CCSecurityAccessCheck("3") == "success");
        $this->SorterName = CCGetParam("pregnancyOrder", "");
        $this->SorterDirection = CCGetParam("pregnancyDir", "");

        $this->PregRegDate = new clsControl(ccsLabel, "PregRegDate", "PregRegDate", ccsDate, array("ShortDate"), CCGetRequestParam("PregRegDate", ccsGet, NULL), $this);
        $this->LastMensesDate = new clsControl(ccsLabel, "LastMensesDate", "LastMensesDate", ccsDate, array("ShortDate"), CCGetRequestParam("LastMensesDate", ccsGet, NULL), $this);
        $this->GestationAge = new clsControl(ccsLabel, "GestationAge", "GestationAge", ccsInteger, "", CCGetRequestParam("GestationAge", ccsGet, NULL), $this);
        $this->Calc_DeliveryDate = new clsControl(ccsLabel, "Calc_DeliveryDate", "Calc_DeliveryDate", ccsDate, array("ShortDate"), CCGetRequestParam("Calc_DeliveryDate", ccsGet, NULL), $this);
        $this->PregnancyType = new clsControl(ccsLabel, "PregnancyType", "PregnancyType", ccsText, "", CCGetRequestParam("PregnancyType", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "pregnancy_maint.php";
        $this->PregnancyRecNr = new clsControl(ccsLabel, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", CCGetRequestParam("PregnancyRecNr", ccsGet, NULL), $this);
        $this->RespDoctor = new clsControl(ccsLabel, "RespDoctor", "RespDoctor", ccsText, "", CCGetRequestParam("RespDoctor", ccsGet, NULL), $this);
        $this->Sorter_PregnancyRecNr = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr", $FileName, $this);
        $this->Sorter_PregRegDate = new clsSorter($this->ComponentName, "Sorter_PregRegDate", $FileName, $this);
        $this->Sorter_LastMensesDate = new clsSorter($this->ComponentName, "Sorter_LastMensesDate", $FileName, $this);
        $this->Sorter_GestationAge = new clsSorter($this->ComponentName, "Sorter_GestationAge", $FileName, $this);
        $this->Sorter_Calc_DeliveryDate = new clsSorter($this->ComponentName, "Sorter_Calc_DeliveryDate", $FileName, $this);
        $this->Sorter_PregnancyTypeName = new clsSorter($this->ComponentName, "Sorter_PregnancyTypeName", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Sorter_Doctor = new clsSorter($this->ComponentName, "Sorter_Doctor", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @69-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @69-7F756232
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlPatientID"] = CCGetFromGet("PatientID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["PregRegDate"] = $this->PregRegDate->Visible;
            $this->ControlsVisible["LastMensesDate"] = $this->LastMensesDate->Visible;
            $this->ControlsVisible["GestationAge"] = $this->GestationAge->Visible;
            $this->ControlsVisible["Calc_DeliveryDate"] = $this->Calc_DeliveryDate->Visible;
            $this->ControlsVisible["PregnancyType"] = $this->PregnancyType->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            $this->ControlsVisible["PregnancyRecNr"] = $this->PregnancyRecNr->Visible;
            $this->ControlsVisible["RespDoctor"] = $this->RespDoctor->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->PregRegDate->SetValue($this->DataSource->PregRegDate->GetValue());
                $this->LastMensesDate->SetValue($this->DataSource->LastMensesDate->GetValue());
                $this->GestationAge->SetValue($this->DataSource->GestationAge->GetValue());
                $this->Calc_DeliveryDate->SetValue($this->DataSource->Calc_DeliveryDate->GetValue());
                $this->PregnancyType->SetValue($this->DataSource->PregnancyType->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "PregnancyID", $this->DataSource->f("PregnancyID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "PatientID", $this->DataSource->f("PatientID"));
                $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
                $this->RespDoctor->SetValue($this->DataSource->RespDoctor->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->PregRegDate->Show();
                $this->LastMensesDate->Show();
                $this->GestationAge->Show();
                $this->Calc_DeliveryDate->Show();
                $this->PregnancyType->Show();
                $this->ImageLink1->Show();
                $this->PregnancyRecNr->Show();
                $this->RespDoctor->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->Sorter_PregnancyRecNr->Show();
        $this->Sorter_PregRegDate->Show();
        $this->Sorter_LastMensesDate->Show();
        $this->Sorter_GestationAge->Show();
        $this->Sorter_Calc_DeliveryDate->Show();
        $this->Sorter_PregnancyTypeName->Show();
        $this->Navigator->Show();
        $this->Sorter_Doctor->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @69-6BB8F6A5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PregRegDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LastMensesDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GestationAge->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Calc_DeliveryDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PregnancyType->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RespDoctor->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End pregnancy Class @69-FCB6E20C

class clspregnancyDataSource extends clsDBregistry_db {  //pregnancyDataSource Class @69-B20C040B

//DataSource Variables @69-0DBC82F8
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $PregRegDate;
    public $LastMensesDate;
    public $GestationAge;
    public $Calc_DeliveryDate;
    public $PregnancyType;
    public $PregnancyRecNr;
    public $RespDoctor;
//End DataSource Variables

//DataSourceClass_Initialize Event @69-B10F78C1
    function clspregnancyDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid pregnancy";
        $this->Initialize();
        $this->PregRegDate = new clsField("PregRegDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->LastMensesDate = new clsField("LastMensesDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->GestationAge = new clsField("GestationAge", ccsInteger, "");
        
        $this->Calc_DeliveryDate = new clsField("Calc_DeliveryDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->PregnancyType = new clsField("PregnancyType", ccsText, "");
        
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->RespDoctor = new clsField("RespDoctor", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @69-072BC9A6
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "pregnancy.PregRegDate desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_PregnancyRecNr" => array("PregnancyRecNr", ""), 
            "Sorter_PregRegDate" => array("PregRegDate", ""), 
            "Sorter_LastMensesDate" => array("LastMensesDate", ""), 
            "Sorter_GestationAge" => array("GestationAge", ""), 
            "Sorter_Calc_DeliveryDate" => array("Calc_DeliveryDate", ""), 
            "Sorter_PregnancyTypeName" => array("PregnancyTypeName", ""), 
            "Sorter_Doctor" => array("FirstName", "")));
    }
//End SetOrder Method

//Prepare Method @69-67A38850
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", $this->Parameters["urlPatientID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PatientID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @69-80CC35D2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (((employees INNER JOIN pregnancy ON\n\n" .
        "pregnancy.EmployeeID = employees.EmployeeID) INNER JOIN position ON\n\n" .
        "employees.PositionID = position.PositionID) INNER JOIN pregnancytype ON\n\n" .
        "pregnancy.PregnancyTypeID = pregnancytype.PregnancyTypeID) INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID";
        $this->SQL = "SELECT PregnancyTypeName, pregnancy.*, employees.*, position.*, CONCAT(FirstName, \" \", LastName, \" (\",PositionName, \")\" ) AS DoctorFirstLastNamePosition,\n\n" .
        "patient.* \n\n" .
        "FROM (((employees INNER JOIN pregnancy ON\n\n" .
        "pregnancy.EmployeeID = employees.EmployeeID) INNER JOIN position ON\n\n" .
        "employees.PositionID = position.PositionID) INNER JOIN pregnancytype ON\n\n" .
        "pregnancy.PregnancyTypeID = pregnancytype.PregnancyTypeID) INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @69-164BCF17
    function SetValues()
    {
        $this->PregRegDate->SetDBValue(trim($this->f("PregRegDate")));
        $this->LastMensesDate->SetDBValue(trim($this->f("LastMensesDate")));
        $this->GestationAge->SetDBValue(trim($this->f("GestationAge")));
        $this->Calc_DeliveryDate->SetDBValue(trim($this->f("Calc_DeliveryDate")));
        $this->PregnancyType->SetDBValue($this->f("PregnancyTypeName"));
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->RespDoctor->SetDBValue($this->f("DoctorFirstLastNamePosition"));
    }
//End SetValues Method

} //End pregnancyDataSource Class @69-FCB6E20C

class clsRecordpatient { //patient Class @33-61D5C9BF

//Variables @33-9E315808

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

//Class_Initialize Event @33-9F7CF1B4
    function clsRecordpatient($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record patient/Error";
        $this->DataSource = new clspatientDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("3") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "3");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "patient";
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
            $this->GivenName = new clsControl(ccsTextBox, "GivenName", $CCSLocales->GetText("GivenName"), ccsMemo, "", CCGetRequestParam("GivenName", $Method, NULL), $this);
            $this->GivenName->Required = true;
            $this->Patient_RegDate = new clsControl(ccsTextBox, "Patient_RegDate", $CCSLocales->GetText("Patient_RegDate"), ccsDate, array("ShortDate"), CCGetRequestParam("Patient_RegDate", $Method, NULL), $this);
            $this->Patient_RegDate->Required = true;
            $this->DatePicker_Patient_RegDate = new clsDatePicker("DatePicker_Patient_RegDate", "patient", "Patient_RegDate", $this);
            $this->StreetName = new clsControl(ccsTextBox, "StreetName", $CCSLocales->GetText("StreetName"), ccsText, "", CCGetRequestParam("StreetName", $Method, NULL), $this);
            $this->StreetNr = new clsControl(ccsTextBox, "StreetNr", $CCSLocales->GetText("StreetNr"), ccsText, "", CCGetRequestParam("StreetNr", $Method, NULL), $this);
            $this->Town = new clsControl(ccsTextBox, "Town", $CCSLocales->GetText("Town"), ccsText, "", CCGetRequestParam("Town", $Method, NULL), $this);
            $this->Town->Required = true;
            $this->NrPregnancies = new clsControl(ccsTextBox, "NrPregnancies", $CCSLocales->GetText("NrPregnancies"), ccsInteger, "", CCGetRequestParam("NrPregnancies", $Method, NULL), $this);
            $this->NrPregnancies->Required = true;
            $this->NrDeliveries = new clsControl(ccsTextBox, "NrDeliveries", $CCSLocales->GetText("NrDeliveries"), ccsInteger, "", CCGetRequestParam("NrDeliveries", $Method, NULL), $this);
            $this->NrDeliveries->Required = true;
            $this->BloodGroupID = new clsControl(ccsListBox, "BloodGroupID", $CCSLocales->GetText("BloodGroupID"), ccsInteger, "", CCGetRequestParam("BloodGroupID", $Method, NULL), $this);
            $this->BloodGroupID->DSType = dsTable;
            $this->BloodGroupID->DataSource = new clsDBregistry_db();
            $this->BloodGroupID->ds = & $this->BloodGroupID->DataSource;
            $this->BloodGroupID->DataSource->SQL = "SELECT * \n" .
"FROM bloodgroup {SQL_Where} {SQL_OrderBy}";
            list($this->BloodGroupID->BoundColumn, $this->BloodGroupID->TextColumn, $this->BloodGroupID->DBFormat) = array("BloodGroupID", "BloodGroupDescription", "");
            $this->Rhesus = new clsControl(ccsRadioButton, "Rhesus", $CCSLocales->GetText("Rhesus"), ccsInteger, "", CCGetRequestParam("Rhesus", $Method, NULL), $this);
            $this->Rhesus->DSType = dsListOfValues;
            $this->Rhesus->Values = array(array("0", "(-)"), array("1", "(+)"));
            $this->Rhesus->HTML = true;
            $this->SelectedDiseases = new clsControl(ccsListBox, "SelectedDiseases", "SelectedDiseases", ccsText, "", CCGetRequestParam("SelectedDiseases", $Method, NULL), $this);
            $this->SelectedDiseases->Multiple = true;
            $this->SelectedDiseases->DSType = dsTable;
            $this->SelectedDiseases->DataSource = new clsDBregistry_db();
            $this->SelectedDiseases->ds = & $this->SelectedDiseases->DataSource;
            $this->SelectedDiseases->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, \" - \", DiseaseName) AS DiseaseIDName, obstetric_anamnesis.* \n" .
"FROM obstetric_anamnesis INNER JOIN icd10_all ON\n" .
"obstetric_anamnesis.ICD10ID = icd10_all.ICD10ID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedDiseases->BoundColumn, $this->SelectedDiseases->TextColumn, $this->SelectedDiseases->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->SelectedDiseases->DataSource->Parameters["urlPatientID"] = CCGetFromGet("PatientID", NULL);
            $this->SelectedDiseases->DataSource->wp = new clsSQLParameters();
            $this->SelectedDiseases->DataSource->wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", $this->SelectedDiseases->DataSource->Parameters["urlPatientID"], 0, false);
            $this->SelectedDiseases->DataSource->wp->Criterion[1] = $this->SelectedDiseases->DataSource->wp->Operation(opEqual, "obstetric_anamnesis.PatientID", $this->SelectedDiseases->DataSource->wp->GetDBValue("1"), $this->SelectedDiseases->DataSource->ToSQL($this->SelectedDiseases->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedDiseases->DataSource->Where = 
                 $this->SelectedDiseases->DataSource->wp->Criterion[1];
            $this->RightButton_allerg = new clsButton("RightButton_allerg", $Method, $this);
            $this->LeftButton_allerg = new clsButton("LeftButton_allerg", $Method, $this);
            $this->ListofObstetricAnamnesis = new clsControl(ccsListBox, "ListofObstetricAnamnesis", "ListofObstetricAnamnesis", ccsText, "", CCGetRequestParam("ListofObstetricAnamnesis", $Method, NULL), $this);
            $this->ListofObstetricAnamnesis->Multiple = true;
            $this->ListofObstetricAnamnesis->DSType = dsTable;
            $this->ListofObstetricAnamnesis->DataSource = new clsDBregistry_db();
            $this->ListofObstetricAnamnesis->ds = & $this->ListofObstetricAnamnesis->DataSource;
            $this->ListofObstetricAnamnesis->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, \" - \", DiseaseName) AS DiseaseIDName\n" .
"FROM icd10_all {SQL_Where} {SQL_OrderBy}";
            $this->ListofObstetricAnamnesis->DataSource->Order = "ICD10ID";
            list($this->ListofObstetricAnamnesis->BoundColumn, $this->ListofObstetricAnamnesis->TextColumn, $this->ListofObstetricAnamnesis->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->ListofObstetricAnamnesis->DataSource->wp = new clsSQLParameters();
            $this->ListofObstetricAnamnesis->DataSource->wp->Criterion[1] = "( RelevantAnamnesis = '1' )";
            $this->ListofObstetricAnamnesis->DataSource->Where = 
                 $this->ListofObstetricAnamnesis->DataSource->wp->Criterion[1];
            $this->ListofObstetricAnamnesis->DataSource->Order = "ICD10ID";
            $this->LinkedID_Allerg = new clsControl(ccsHidden, "LinkedID_Allerg", "LinkedID_Allerg", ccsText, "", CCGetRequestParam("LinkedID_Allerg", $Method, NULL), $this);
            $this->LinkedID_BadHabbits = new clsControl(ccsHidden, "LinkedID_BadHabbits", "LinkedID_BadHabbits", ccsText, "", CCGetRequestParam("LinkedID_BadHabbits", $Method, NULL), $this);
            $this->lastmodified = new clsControl(ccsLabel, "lastmodified", "lastmodified", ccsDate, array("GeneralDate"), CCGetRequestParam("lastmodified", $Method, NULL), $this);
            $this->user = new clsControl(ccsLabel, "user", "user", ccsText, "", CCGetRequestParam("user", $Method, NULL), $this);
            $this->CurrentUser = new clsControl(ccsHidden, "CurrentUser", "CurrentUser", ccsText, "", CCGetRequestParam("CurrentUser", $Method, NULL), $this);
            $this->HomePhone = new clsControl(ccsTextBox, "HomePhone", $CCSLocales->GetText("HomePhone"), ccsText, "", CCGetRequestParam("HomePhone", $Method, NULL), $this);
            $this->MobilePhone = new clsControl(ccsTextBox, "MobilePhone", $CCSLocales->GetText("MobilePhone"), ccsText, "", CCGetRequestParam("MobilePhone", $Method, NULL), $this);
            $this->StreetNameActual = new clsControl(ccsTextBox, "StreetNameActual", $CCSLocales->GetText("StreetName"), ccsText, "", CCGetRequestParam("StreetNameActual", $Method, NULL), $this);
            $this->TownActual = new clsControl(ccsTextBox, "TownActual", $CCSLocales->GetText("Town"), ccsText, "", CCGetRequestParam("TownActual", $Method, NULL), $this);
            $this->TownActual->Required = true;
            $this->StreetNrActual = new clsControl(ccsTextBox, "StreetNrActual", $CCSLocales->GetText("StreetNr"), ccsText, "", CCGetRequestParam("StreetNrActual", $Method, NULL), $this);
            $this->DistrictID = new clsControl(ccsListBox, "DistrictID", $CCSLocales->GetText("DistrictID"), ccsInteger, "", CCGetRequestParam("DistrictID", $Method, NULL), $this);
            $this->DistrictID->DSType = dsTable;
            $this->DistrictID->DataSource = new clsDBregistry_db();
            $this->DistrictID->ds = & $this->DistrictID->DataSource;
            $this->DistrictID->DataSource->SQL = "SELECT * \n" .
"FROM districts {SQL_Where} {SQL_OrderBy}";
            $this->DistrictID->DataSource->Order = "DistrictName";
            list($this->DistrictID->BoundColumn, $this->DistrictID->TextColumn, $this->DistrictID->DBFormat) = array("DistrictID", "DistrictName", "");
            $this->DistrictID->DataSource->Order = "DistrictName";
            $this->DistrictID->Required = true;
            $this->s_province_ProvinceID = new clsControl(ccsListBox, "s_province_ProvinceID", $CCSLocales->GetText("Province"), ccsInteger, "", CCGetRequestParam("s_province_ProvinceID", $Method, NULL), $this);
            $this->s_province_ProvinceID->DSType = dsTable;
            $this->s_province_ProvinceID->DataSource = new clsDBregistry_db();
            $this->s_province_ProvinceID->ds = & $this->s_province_ProvinceID->DataSource;
            $this->s_province_ProvinceID->DataSource->SQL = "SELECT * \n" .
"FROM province {SQL_Where} {SQL_OrderBy}";
            $this->s_province_ProvinceID->DataSource->Order = "ProvinceName";
            list($this->s_province_ProvinceID->BoundColumn, $this->s_province_ProvinceID->TextColumn, $this->s_province_ProvinceID->DBFormat) = array("ProvinceID", "ProvinceName", "");
            $this->s_province_ProvinceID->DataSource->Order = "ProvinceName";
            $this->s_province_ProvinceID->Required = true;
            $this->FamilyName = new clsControl(ccsTextBox, "FamilyName", $CCSLocales->GetText("FamilyName"), ccsMemo, "", CCGetRequestParam("FamilyName", $Method, NULL), $this);
            $this->FamilyName->Required = true;
            $this->BirthDate = new clsControl(ccsTextBox, "BirthDate", $CCSLocales->GetText("BirthDate"), ccsDate, array("ShortDate"), CCGetRequestParam("BirthDate", $Method, NULL), $this);
            $this->BirthDate->Required = true;
            $this->DatePicker_BirthDate = new clsDatePicker("DatePicker_BirthDate", "patient", "BirthDate", $this);
            $this->AddressActual = new clsControl(ccsRadioButton, "AddressActual", $CCSLocales->GetText("AddressActual"), ccsInteger, "", CCGetRequestParam("AddressActual", $Method, NULL), $this);
            $this->AddressActual->DSType = dsListOfValues;
            $this->AddressActual->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->AddressActual->HTML = true;
            $this->AddressActual->Required = true;
            $this->DistrictActualID = new clsControl(ccsListBox, "DistrictActualID", $CCSLocales->GetText("DistrictID"), ccsInteger, "", CCGetRequestParam("DistrictActualID", $Method, NULL), $this);
            $this->DistrictActualID->DSType = dsTable;
            $this->DistrictActualID->DataSource = new clsDBregistry_db();
            $this->DistrictActualID->ds = & $this->DistrictActualID->DataSource;
            $this->DistrictActualID->DataSource->SQL = "SELECT * \n" .
"FROM districts {SQL_Where} {SQL_OrderBy}";
            $this->DistrictActualID->DataSource->Order = "DistrictName";
            list($this->DistrictActualID->BoundColumn, $this->DistrictActualID->TextColumn, $this->DistrictActualID->DBFormat) = array("DistrictID", "DistrictName", "");
            $this->DistrictActualID->DataSource->Order = "DistrictName";
            $this->DistrictActualID->Required = true;
            $this->s_province_ProvinceActualID = new clsControl(ccsListBox, "s_province_ProvinceActualID", "s_province_ProvinceActualID", ccsInteger, "", CCGetRequestParam("s_province_ProvinceActualID", $Method, NULL), $this);
            $this->s_province_ProvinceActualID->DSType = dsTable;
            $this->s_province_ProvinceActualID->DataSource = new clsDBregistry_db();
            $this->s_province_ProvinceActualID->ds = & $this->s_province_ProvinceActualID->DataSource;
            $this->s_province_ProvinceActualID->DataSource->SQL = "SELECT * \n" .
"FROM province {SQL_Where} {SQL_OrderBy}";
            $this->s_province_ProvinceActualID->DataSource->Order = "ProvinceName";
            list($this->s_province_ProvinceActualID->BoundColumn, $this->s_province_ProvinceActualID->TextColumn, $this->s_province_ProvinceActualID->DBFormat) = array("ProvinceID", "ProvinceName", "");
            $this->s_province_ProvinceActualID->DataSource->Order = "ProvinceName";
            $this->HomePhoneActual = new clsControl(ccsTextBox, "HomePhoneActual", "HomePhoneActual", ccsText, "", CCGetRequestParam("HomePhoneActual", $Method, NULL), $this);
            $this->ListofBadHabbits = new clsControl(ccsListBox, "ListofBadHabbits", "ListofBadHabbits", ccsInteger, "", CCGetRequestParam("ListofBadHabbits", $Method, NULL), $this);
            $this->ListofBadHabbits->Multiple = true;
            $this->ListofBadHabbits->DSType = dsTable;
            $this->ListofBadHabbits->DataSource = new clsDBregistry_db();
            $this->ListofBadHabbits->ds = & $this->ListofBadHabbits->DataSource;
            $this->ListofBadHabbits->DataSource->SQL = "SELECT * \n" .
"FROM bad_habbitstype {SQL_Where} {SQL_OrderBy}";
            list($this->ListofBadHabbits->BoundColumn, $this->ListofBadHabbits->TextColumn, $this->ListofBadHabbits->DBFormat) = array("BadHabbitsTypeID", "BadHabbitsName", "");
            $this->RightButtonBadHabbits = new clsButton("RightButtonBadHabbits", $Method, $this);
            $this->LeftButtonBadHabbits = new clsButton("LeftButtonBadHabbits", $Method, $this);
            $this->SelectedBadHabbits = new clsControl(ccsListBox, "SelectedBadHabbits", "SelectedBadHabbits", ccsInteger, "", CCGetRequestParam("SelectedBadHabbits", $Method, NULL), $this);
            $this->SelectedBadHabbits->Multiple = true;
            $this->SelectedBadHabbits->DSType = dsTable;
            $this->SelectedBadHabbits->DataSource = new clsDBregistry_db();
            $this->SelectedBadHabbits->ds = & $this->SelectedBadHabbits->DataSource;
            $this->SelectedBadHabbits->DataSource->SQL = "SELECT bad_habbits.*, BadHabbitsName \n" .
"FROM bad_habbits INNER JOIN bad_habbitstype ON\n" .
"bad_habbits.BadHabbitsTypeID = bad_habbitstype.BadHabbitsTypeID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedBadHabbits->BoundColumn, $this->SelectedBadHabbits->TextColumn, $this->SelectedBadHabbits->DBFormat) = array("BadHabbitsTypeID", "BadHabbitsName", "");
            $this->SelectedBadHabbits->DataSource->Parameters["urlPatientID"] = CCGetFromGet("PatientID", NULL);
            $this->SelectedBadHabbits->DataSource->wp = new clsSQLParameters();
            $this->SelectedBadHabbits->DataSource->wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", $this->SelectedBadHabbits->DataSource->Parameters["urlPatientID"], 0, false);
            $this->SelectedBadHabbits->DataSource->wp->Criterion[1] = $this->SelectedBadHabbits->DataSource->wp->Operation(opEqual, "bad_habbits.PatientID", $this->SelectedBadHabbits->DataSource->wp->GetDBValue("1"), $this->SelectedBadHabbits->DataSource->ToSQL($this->SelectedBadHabbits->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedBadHabbits->DataSource->Where = 
                 $this->SelectedBadHabbits->DataSource->wp->Criterion[1];
            $this->Button_AddPreg = new clsButton("Button_AddPreg", $Method, $this);
            $this->Reloaded = new clsControl(ccsHidden, "Reloaded", "Reloaded", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Reloaded", $Method, NULL), $this);
            $this->FilterofObstetricAnamnesis = new clsControl(ccsTextBox, "FilterofObstetricAnamnesis", "FilterofObstetricAnamnesis", ccsText, "", CCGetRequestParam("FilterofObstetricAnamnesis", $Method, NULL), $this);
            $this->FacilityID = new clsControl(ccsHidden, "FacilityID", "FacilityID", ccsText, "", CCGetRequestParam("FacilityID", $Method, NULL), $this);
            $this->Patient_RegDate2 = new clsControl(ccsTextBox, "Patient_RegDate2", $CCSLocales->GetText("Patient_RegDate"), ccsDate, array("ShortDate"), CCGetRequestParam("Patient_RegDate2", $Method, NULL), $this);
            $this->DatePicker_Patient_RegDate2 = new clsDatePicker("DatePicker_Patient_RegDate2", "patient", "Patient_RegDate2", $this);
            $this->Discharged = new clsControl(ccsCheckBox, "Discharged", $CCSLocales->GetText("Discharged"), ccsInteger, "", CCGetRequestParam("Discharged", $Method, NULL), $this);
            $this->Discharged->HTML = true;
            $this->Discharged->CheckedValue = $this->Discharged->GetParsedValue(1);
            $this->Discharged->UncheckedValue = $this->Discharged->GetParsedValue(0);
            $this->Admitted = new clsControl(ccsCheckBox, "Admitted", $CCSLocales->GetText("Admitted"), ccsInteger, "", CCGetRequestParam("Admitted", $Method, NULL), $this);
            $this->Admitted->HTML = true;
            $this->Admitted->CheckedValue = $this->Admitted->GetParsedValue(1);
            $this->Admitted->UncheckedValue = $this->Admitted->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->Patient_RegDate->Value) && !strlen($this->Patient_RegDate->Value) && $this->Patient_RegDate->Value !== false)
                    $this->Patient_RegDate->SetValue(time());
                if(!is_array($this->BloodGroupID->Value) && !strlen($this->BloodGroupID->Value) && $this->BloodGroupID->Value !== false)
                    $this->BloodGroupID->SetText(5);
                if(!is_array($this->AddressActual->Value) && !strlen($this->AddressActual->Value) && $this->AddressActual->Value !== false)
                    $this->AddressActual->SetText(0);
                if(!is_array($this->DistrictActualID->Value) && !strlen($this->DistrictActualID->Value) && $this->DistrictActualID->Value !== false)
                    $this->DistrictActualID->SetText(99999);
                if(!is_array($this->s_province_ProvinceActualID->Value) && !strlen($this->s_province_ProvinceActualID->Value) && $this->s_province_ProvinceActualID->Value !== false)
                    $this->s_province_ProvinceActualID->SetText(99999);
                if(!is_array($this->Reloaded->Value) && !strlen($this->Reloaded->Value) && $this->Reloaded->Value !== false)
                    $this->Reloaded->SetText(false);
                if(!is_array($this->Patient_RegDate2->Value) && !strlen($this->Patient_RegDate2->Value) && $this->Patient_RegDate2->Value !== false)
                    $this->Patient_RegDate2->SetValue(time());
                if(!is_array($this->Discharged->Value) && !strlen($this->Discharged->Value) && $this->Discharged->Value !== false)
                    $this->Discharged->SetValue(false);
                if(!is_array($this->Admitted->Value) && !strlen($this->Admitted->Value) && $this->Admitted->Value !== false)
                    $this->Admitted->SetValue(false);
            }
            if(!is_array($this->lastmodified->Value) && !strlen($this->lastmodified->Value) && $this->lastmodified->Value !== false)
                $this->lastmodified->SetValue(time());
        }
    }
//End Class_Initialize Event

//Initialize Method @33-8FD08588
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Order = "districts.DistrictName, province.ProvinceName";

        $this->DataSource->Parameters["urlPatientID"] = CCGetFromGet("PatientID", NULL);
    }
//End Initialize Method

//Validate Method @33-6DF248A6
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->MobilePhone->GetText()) && !preg_match ("/[+]\d{11,12}/", $this->MobilePhone->GetText())) {
            $this->MobilePhone->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("MobilePhone")));
        }
        $Validation = ($this->GivenName->Validate() && $Validation);
        $Validation = ($this->Patient_RegDate->Validate() && $Validation);
        $Validation = ($this->StreetName->Validate() && $Validation);
        $Validation = ($this->StreetNr->Validate() && $Validation);
        $Validation = ($this->Town->Validate() && $Validation);
        $Validation = ($this->NrPregnancies->Validate() && $Validation);
        $Validation = ($this->NrDeliveries->Validate() && $Validation);
        $Validation = ($this->BloodGroupID->Validate() && $Validation);
        $Validation = ($this->Rhesus->Validate() && $Validation);
        $Validation = ($this->SelectedDiseases->Validate() && $Validation);
        $Validation = ($this->ListofObstetricAnamnesis->Validate() && $Validation);
        $Validation = ($this->LinkedID_Allerg->Validate() && $Validation);
        $Validation = ($this->LinkedID_BadHabbits->Validate() && $Validation);
        $Validation = ($this->CurrentUser->Validate() && $Validation);
        $Validation = ($this->HomePhone->Validate() && $Validation);
        $Validation = ($this->MobilePhone->Validate() && $Validation);
        $Validation = ($this->StreetNameActual->Validate() && $Validation);
        $Validation = ($this->TownActual->Validate() && $Validation);
        $Validation = ($this->StreetNrActual->Validate() && $Validation);
        $Validation = ($this->DistrictID->Validate() && $Validation);
        $Validation = ($this->s_province_ProvinceID->Validate() && $Validation);
        $Validation = ($this->FamilyName->Validate() && $Validation);
        $Validation = ($this->BirthDate->Validate() && $Validation);
        $Validation = ($this->AddressActual->Validate() && $Validation);
        $Validation = ($this->DistrictActualID->Validate() && $Validation);
        $Validation = ($this->s_province_ProvinceActualID->Validate() && $Validation);
        $Validation = ($this->HomePhoneActual->Validate() && $Validation);
        $Validation = ($this->ListofBadHabbits->Validate() && $Validation);
        $Validation = ($this->SelectedBadHabbits->Validate() && $Validation);
        $Validation = ($this->Reloaded->Validate() && $Validation);
        $Validation = ($this->FilterofObstetricAnamnesis->Validate() && $Validation);
        $Validation = ($this->FacilityID->Validate() && $Validation);
        $Validation = ($this->Patient_RegDate2->Validate() && $Validation);
        $Validation = ($this->Discharged->Validate() && $Validation);
        $Validation = ($this->Admitted->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->GivenName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Patient_RegDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StreetName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StreetNr->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Town->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NrPregnancies->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NrDeliveries->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BloodGroupID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Rhesus->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedDiseases->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofObstetricAnamnesis->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_Allerg->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_BadHabbits->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CurrentUser->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HomePhone->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MobilePhone->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StreetNameActual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TownActual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StreetNrActual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DistrictID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_province_ProvinceID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FamilyName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BirthDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AddressActual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DistrictActualID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_province_ProvinceActualID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HomePhoneActual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofBadHabbits->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedBadHabbits->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Reloaded->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FilterofObstetricAnamnesis->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Patient_RegDate2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Discharged->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Admitted->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @33-4D591AB8
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->GivenName->Errors->Count());
        $errors = ($errors || $this->Patient_RegDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_Patient_RegDate->Errors->Count());
        $errors = ($errors || $this->StreetName->Errors->Count());
        $errors = ($errors || $this->StreetNr->Errors->Count());
        $errors = ($errors || $this->Town->Errors->Count());
        $errors = ($errors || $this->NrPregnancies->Errors->Count());
        $errors = ($errors || $this->NrDeliveries->Errors->Count());
        $errors = ($errors || $this->BloodGroupID->Errors->Count());
        $errors = ($errors || $this->Rhesus->Errors->Count());
        $errors = ($errors || $this->SelectedDiseases->Errors->Count());
        $errors = ($errors || $this->ListofObstetricAnamnesis->Errors->Count());
        $errors = ($errors || $this->LinkedID_Allerg->Errors->Count());
        $errors = ($errors || $this->LinkedID_BadHabbits->Errors->Count());
        $errors = ($errors || $this->lastmodified->Errors->Count());
        $errors = ($errors || $this->user->Errors->Count());
        $errors = ($errors || $this->CurrentUser->Errors->Count());
        $errors = ($errors || $this->HomePhone->Errors->Count());
        $errors = ($errors || $this->MobilePhone->Errors->Count());
        $errors = ($errors || $this->StreetNameActual->Errors->Count());
        $errors = ($errors || $this->TownActual->Errors->Count());
        $errors = ($errors || $this->StreetNrActual->Errors->Count());
        $errors = ($errors || $this->DistrictID->Errors->Count());
        $errors = ($errors || $this->s_province_ProvinceID->Errors->Count());
        $errors = ($errors || $this->FamilyName->Errors->Count());
        $errors = ($errors || $this->BirthDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_BirthDate->Errors->Count());
        $errors = ($errors || $this->AddressActual->Errors->Count());
        $errors = ($errors || $this->DistrictActualID->Errors->Count());
        $errors = ($errors || $this->s_province_ProvinceActualID->Errors->Count());
        $errors = ($errors || $this->HomePhoneActual->Errors->Count());
        $errors = ($errors || $this->ListofBadHabbits->Errors->Count());
        $errors = ($errors || $this->SelectedBadHabbits->Errors->Count());
        $errors = ($errors || $this->Reloaded->Errors->Count());
        $errors = ($errors || $this->FilterofObstetricAnamnesis->Errors->Count());
        $errors = ($errors || $this->FacilityID->Errors->Count());
        $errors = ($errors || $this->Patient_RegDate2->Errors->Count());
        $errors = ($errors || $this->DatePicker_Patient_RegDate2->Errors->Count());
        $errors = ($errors || $this->Discharged->Errors->Count());
        $errors = ($errors || $this->Admitted->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @33-ED598703
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

//Operation Method @33-615A14C5
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
            } else if($this->RightButton_allerg->Pressed) {
                $this->PressedButton = "RightButton_allerg";
            } else if($this->LeftButton_allerg->Pressed) {
                $this->PressedButton = "LeftButton_allerg";
            } else if($this->RightButtonBadHabbits->Pressed) {
                $this->PressedButton = "RightButtonBadHabbits";
            } else if($this->LeftButtonBadHabbits->Pressed) {
                $this->PressedButton = "LeftButtonBadHabbits";
            } else if($this->Button_AddPreg->Pressed) {
                $this->PressedButton = "Button_AddPreg";
            }
        }
        $Redirect = "patient_list.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "PatientID"));
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButton_allerg") {
            if(!CCGetEvent($this->RightButton_allerg->CCSEvents, "OnClick", $this->RightButton_allerg)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButton_allerg") {
            if(!CCGetEvent($this->LeftButton_allerg->CCSEvents, "OnClick", $this->LeftButton_allerg)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButtonBadHabbits") {
            if(!CCGetEvent($this->RightButtonBadHabbits->CCSEvents, "OnClick", $this->RightButtonBadHabbits)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButtonBadHabbits") {
            if(!CCGetEvent($this->LeftButtonBadHabbits->CCSEvents, "OnClick", $this->LeftButtonBadHabbits)) {
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
            } else if($this->PressedButton == "Button_AddPreg" && $this->UpdateAllowed) {
                $Redirect = "pregnancy_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "PatientID"));
                if(!CCGetEvent($this->Button_AddPreg->CCSEvents, "OnClick", $this->Button_AddPreg) || !$this->UpdateRow()) {
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

//InsertRow Method @33-660129AA
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->FamilyName->SetValue($this->FamilyName->GetValue(true));
        $this->DataSource->BirthDate->SetValue($this->BirthDate->GetValue(true));
        $this->DataSource->StreetName->SetValue($this->StreetName->GetValue(true));
        $this->DataSource->StreetNr->SetValue($this->StreetNr->GetValue(true));
        $this->DataSource->Town->SetValue($this->Town->GetValue(true));
        $this->DataSource->DistrictID->SetValue($this->DistrictID->GetValue(true));
        $this->DataSource->HomePhone->SetValue($this->HomePhone->GetValue(true));
        $this->DataSource->MobilePhone->SetValue($this->MobilePhone->GetValue(true));
        $this->DataSource->GivenName->SetValue($this->GivenName->GetValue(true));
        $this->DataSource->Patient_RegDate->SetValue($this->Patient_RegDate->GetValue(true));
        $this->DataSource->BloodGroupID->SetValue($this->BloodGroupID->GetValue(true));
        $this->DataSource->Rhesus->SetValue($this->Rhesus->GetValue(true));
        $this->DataSource->NrPregnancies->SetValue($this->NrPregnancies->GetValue(true));
        $this->DataSource->NrDeliveries->SetValue($this->NrDeliveries->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->AddressActual->SetValue($this->AddressActual->GetValue(true));
        $this->DataSource->StreetNameActual->SetValue($this->StreetNameActual->GetValue(true));
        $this->DataSource->StreetNrActual->SetValue($this->StreetNrActual->GetValue(true));
        $this->DataSource->TownActual->SetValue($this->TownActual->GetValue(true));
        $this->DataSource->HomePhoneActual->SetValue($this->HomePhoneActual->GetValue(true));
        $this->DataSource->DistrictActualID->SetValue($this->DistrictActualID->GetValue(true));
        $this->DataSource->FacilityID->SetValue($this->FacilityID->GetValue(true));
        $this->DataSource->Admitted->SetValue($this->Admitted->GetValue(true));
        $this->DataSource->Discharged->SetValue($this->Discharged->GetValue(true));
        $this->DataSource->Patient_RegDate2->SetValue($this->Patient_RegDate2->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @33-EDB26673
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->FamilyName->SetValue($this->FamilyName->GetValue(true));
        $this->DataSource->GivenName->SetValue($this->GivenName->GetValue(true));
        $this->DataSource->Patient_RegDate->SetValue($this->Patient_RegDate->GetValue(true));
        $this->DataSource->BirthDate->SetValue($this->BirthDate->GetValue(true));
        $this->DataSource->StreetName->SetValue($this->StreetName->GetValue(true));
        $this->DataSource->StreetNr->SetValue($this->StreetNr->GetValue(true));
        $this->DataSource->Town->SetValue($this->Town->GetValue(true));
        $this->DataSource->HomePhone->SetValue($this->HomePhone->GetValue(true));
        $this->DataSource->MobilePhone->SetValue($this->MobilePhone->GetValue(true));
        $this->DataSource->NrPregnancies->SetValue($this->NrPregnancies->GetValue(true));
        $this->DataSource->NrDeliveries->SetValue($this->NrDeliveries->GetValue(true));
        $this->DataSource->DistrictID->SetValue($this->DistrictID->GetValue(true));
        $this->DataSource->BloodGroupID->SetValue($this->BloodGroupID->GetValue(true));
        $this->DataSource->Rhesus->SetValue($this->Rhesus->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->AddressActual->SetValue($this->AddressActual->GetValue(true));
        $this->DataSource->StreetNameActual->SetValue($this->StreetNameActual->GetValue(true));
        $this->DataSource->StreetNrActual->SetValue($this->StreetNrActual->GetValue(true));
        $this->DataSource->TownActual->SetValue($this->TownActual->GetValue(true));
        $this->DataSource->HomePhoneActual->SetValue($this->HomePhoneActual->GetValue(true));
        $this->DataSource->DistrictActualID->SetValue($this->DistrictActualID->GetValue(true));
        $this->DataSource->Admitted->SetValue($this->Admitted->GetValue(true));
        $this->DataSource->Discharged->SetValue($this->Discharged->GetValue(true));
        $this->DataSource->Patient_RegDate2->SetValue($this->Patient_RegDate2->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @33-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @33-AF55F0E6
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

        $this->BloodGroupID->Prepare();
        $this->Rhesus->Prepare();
        $this->SelectedDiseases->Prepare();
        $this->ListofObstetricAnamnesis->Prepare();
        $this->DistrictID->Prepare();
        $this->s_province_ProvinceID->Prepare();
        $this->AddressActual->Prepare();
        $this->DistrictActualID->Prepare();
        $this->s_province_ProvinceActualID->Prepare();
        $this->ListofBadHabbits->Prepare();
        $this->SelectedBadHabbits->Prepare();

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
                    $this->GivenName->SetValue($this->DataSource->GivenName->GetValue());
                    $this->Patient_RegDate->SetValue($this->DataSource->Patient_RegDate->GetValue());
                    $this->StreetName->SetValue($this->DataSource->StreetName->GetValue());
                    $this->StreetNr->SetValue($this->DataSource->StreetNr->GetValue());
                    $this->Town->SetValue($this->DataSource->Town->GetValue());
                    $this->NrPregnancies->SetValue($this->DataSource->NrPregnancies->GetValue());
                    $this->NrDeliveries->SetValue($this->DataSource->NrDeliveries->GetValue());
                    $this->BloodGroupID->SetValue($this->DataSource->BloodGroupID->GetValue());
                    $this->Rhesus->SetValue($this->DataSource->Rhesus->GetValue());
                    $this->CurrentUser->SetValue($this->DataSource->CurrentUser->GetValue());
                    $this->HomePhone->SetValue($this->DataSource->HomePhone->GetValue());
                    $this->MobilePhone->SetValue($this->DataSource->MobilePhone->GetValue());
                    $this->StreetNameActual->SetValue($this->DataSource->StreetNameActual->GetValue());
                    $this->TownActual->SetValue($this->DataSource->TownActual->GetValue());
                    $this->StreetNrActual->SetValue($this->DataSource->StreetNrActual->GetValue());
                    $this->DistrictID->SetValue($this->DataSource->DistrictID->GetValue());
                    $this->s_province_ProvinceID->SetValue($this->DataSource->s_province_ProvinceID->GetValue());
                    $this->FamilyName->SetValue($this->DataSource->FamilyName->GetValue());
                    $this->BirthDate->SetValue($this->DataSource->BirthDate->GetValue());
                    $this->AddressActual->SetValue($this->DataSource->AddressActual->GetValue());
                    $this->DistrictActualID->SetValue($this->DataSource->DistrictActualID->GetValue());
                    $this->s_province_ProvinceActualID->SetValue($this->DataSource->s_province_ProvinceActualID->GetValue());
                    $this->HomePhoneActual->SetValue($this->DataSource->HomePhoneActual->GetValue());
                    $this->FacilityID->SetValue($this->DataSource->FacilityID->GetValue());
                    $this->Patient_RegDate2->SetValue($this->DataSource->Patient_RegDate2->GetValue());
                    $this->Discharged->SetValue($this->DataSource->Discharged->GetValue());
                    $this->Admitted->SetValue($this->DataSource->Admitted->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->GivenName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Patient_RegDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_Patient_RegDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StreetName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StreetNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Town->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NrPregnancies->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NrDeliveries->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BloodGroupID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Rhesus->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedDiseases->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofObstetricAnamnesis->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_Allerg->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_BadHabbits->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lastmodified->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CurrentUser->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HomePhone->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MobilePhone->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StreetNameActual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TownActual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StreetNrActual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DistrictID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_province_ProvinceID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FamilyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AddressActual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DistrictActualID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_province_ProvinceActualID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HomePhoneActual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofBadHabbits->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedBadHabbits->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Reloaded->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FilterofObstetricAnamnesis->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Patient_RegDate2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_Patient_RegDate2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Discharged->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Admitted->Errors->ToString());
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
        $this->Button_AddPreg->Visible = $this->EditMode && $this->UpdateAllowed;

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
        $this->GivenName->Show();
        $this->Patient_RegDate->Show();
        $this->DatePicker_Patient_RegDate->Show();
        $this->StreetName->Show();
        $this->StreetNr->Show();
        $this->Town->Show();
        $this->NrPregnancies->Show();
        $this->NrDeliveries->Show();
        $this->BloodGroupID->Show();
        $this->Rhesus->Show();
        $this->SelectedDiseases->Show();
        $this->RightButton_allerg->Show();
        $this->LeftButton_allerg->Show();
        $this->ListofObstetricAnamnesis->Show();
        $this->LinkedID_Allerg->Show();
        $this->LinkedID_BadHabbits->Show();
        $this->lastmodified->Show();
        $this->user->Show();
        $this->CurrentUser->Show();
        $this->HomePhone->Show();
        $this->MobilePhone->Show();
        $this->StreetNameActual->Show();
        $this->TownActual->Show();
        $this->StreetNrActual->Show();
        $this->DistrictID->Show();
        $this->s_province_ProvinceID->Show();
        $this->FamilyName->Show();
        $this->BirthDate->Show();
        $this->DatePicker_BirthDate->Show();
        $this->AddressActual->Show();
        $this->DistrictActualID->Show();
        $this->s_province_ProvinceActualID->Show();
        $this->HomePhoneActual->Show();
        $this->ListofBadHabbits->Show();
        $this->RightButtonBadHabbits->Show();
        $this->LeftButtonBadHabbits->Show();
        $this->SelectedBadHabbits->Show();
        $this->Button_AddPreg->Show();
        $this->Reloaded->Show();
        $this->FilterofObstetricAnamnesis->Show();
        $this->FacilityID->Show();
        $this->Patient_RegDate2->Show();
        $this->DatePicker_Patient_RegDate2->Show();
        $this->Discharged->Show();
        $this->Admitted->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End patient Class @33-FCB6E20C

class clspatientDataSource extends clsDBregistry_db {  //patientDataSource Class @33-96DCD097

//DataSource Variables @33-DB7A58DC
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
    public $GivenName;
    public $Patient_RegDate;
    public $StreetName;
    public $StreetNr;
    public $Town;
    public $NrPregnancies;
    public $NrDeliveries;
    public $BloodGroupID;
    public $Rhesus;
    public $SelectedDiseases;
    public $ListofObstetricAnamnesis;
    public $LinkedID_Allerg;
    public $LinkedID_BadHabbits;
    public $lastmodified;
    public $user;
    public $CurrentUser;
    public $HomePhone;
    public $MobilePhone;
    public $StreetNameActual;
    public $TownActual;
    public $StreetNrActual;
    public $DistrictID;
    public $s_province_ProvinceID;
    public $FamilyName;
    public $BirthDate;
    public $AddressActual;
    public $DistrictActualID;
    public $s_province_ProvinceActualID;
    public $HomePhoneActual;
    public $ListofBadHabbits;
    public $SelectedBadHabbits;
    public $Reloaded;
    public $FilterofObstetricAnamnesis;
    public $FacilityID;
    public $Patient_RegDate2;
    public $Discharged;
    public $Admitted;
//End DataSource Variables

//DataSourceClass_Initialize Event @33-B0B5BCA2
    function clspatientDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record patient/Error";
        $this->Initialize();
        $this->GivenName = new clsField("GivenName", ccsMemo, "");
        
        $this->Patient_RegDate = new clsField("Patient_RegDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->StreetName = new clsField("StreetName", ccsText, "");
        
        $this->StreetNr = new clsField("StreetNr", ccsText, "");
        
        $this->Town = new clsField("Town", ccsText, "");
        
        $this->NrPregnancies = new clsField("NrPregnancies", ccsInteger, "");
        
        $this->NrDeliveries = new clsField("NrDeliveries", ccsInteger, "");
        
        $this->BloodGroupID = new clsField("BloodGroupID", ccsInteger, "");
        
        $this->Rhesus = new clsField("Rhesus", ccsInteger, "");
        
        $this->SelectedDiseases = new clsField("SelectedDiseases", ccsText, "");
        
        $this->ListofObstetricAnamnesis = new clsField("ListofObstetricAnamnesis", ccsText, "");
        
        $this->LinkedID_Allerg = new clsField("LinkedID_Allerg", ccsText, "");
        
        $this->LinkedID_BadHabbits = new clsField("LinkedID_BadHabbits", ccsText, "");
        
        $this->lastmodified = new clsField("lastmodified", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->user = new clsField("user", ccsText, "");
        
        $this->CurrentUser = new clsField("CurrentUser", ccsText, "");
        
        $this->HomePhone = new clsField("HomePhone", ccsText, "");
        
        $this->MobilePhone = new clsField("MobilePhone", ccsText, "");
        
        $this->StreetNameActual = new clsField("StreetNameActual", ccsText, "");
        
        $this->TownActual = new clsField("TownActual", ccsText, "");
        
        $this->StreetNrActual = new clsField("StreetNrActual", ccsText, "");
        
        $this->DistrictID = new clsField("DistrictID", ccsInteger, "");
        
        $this->s_province_ProvinceID = new clsField("s_province_ProvinceID", ccsInteger, "");
        
        $this->FamilyName = new clsField("FamilyName", ccsMemo, "");
        
        $this->BirthDate = new clsField("BirthDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->AddressActual = new clsField("AddressActual", ccsInteger, "");
        
        $this->DistrictActualID = new clsField("DistrictActualID", ccsInteger, "");
        
        $this->s_province_ProvinceActualID = new clsField("s_province_ProvinceActualID", ccsInteger, "");
        
        $this->HomePhoneActual = new clsField("HomePhoneActual", ccsText, "");
        
        $this->ListofBadHabbits = new clsField("ListofBadHabbits", ccsInteger, "");
        
        $this->SelectedBadHabbits = new clsField("SelectedBadHabbits", ccsInteger, "");
        
        $this->Reloaded = new clsField("Reloaded", ccsBoolean, $this->BooleanFormat);
        
        $this->FilterofObstetricAnamnesis = new clsField("FilterofObstetricAnamnesis", ccsText, "");
        
        $this->FacilityID = new clsField("FacilityID", ccsText, "");
        
        $this->Patient_RegDate2 = new clsField("Patient_RegDate2", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Discharged = new clsField("Discharged", ccsInteger, "");
        
        $this->Admitted = new clsField("Admitted", ccsInteger, "");
        

        $this->InsertFields["FamilyName"] = array("Name" => "FamilyName", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->InsertFields["BirthDate"] = array("Name" => "BirthDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["StreetName"] = array("Name" => "StreetName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StreetNr"] = array("Name" => "StreetNr", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Town"] = array("Name" => "Town", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DistrictID"] = array("Name" => "DistrictID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["HomePhone"] = array("Name" => "HomePhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MobilePhone"] = array("Name" => "MobilePhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["GivenName"] = array("Name" => "GivenName", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->InsertFields["Patient_RegDate"] = array("Name" => "Patient_RegDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["BloodGroupID"] = array("Name" => "BloodGroupID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Rhesus"] = array("Name" => "Rhesus", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NrPregnancies"] = array("Name" => "NrPregnancies", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NrDeliveries"] = array("Name" => "NrDeliveries", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["AddressActual"] = array("Name" => "AddressActual", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["StreetNameActual"] = array("Name" => "StreetNameActual", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StreetNrActual"] = array("Name" => "StreetNrActual", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["TownActual"] = array("Name" => "TownActual", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["HomePhoneActual"] = array("Name" => "HomePhoneActual", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DistrictActualID"] = array("Name" => "DistrictActualID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Admitted"] = array("Name" => "Admitted", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Discharged"] = array("Name" => "Discharged", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DischargeDate"] = array("Name" => "DischargeDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["FamilyName"] = array("Name" => "FamilyName", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->UpdateFields["GivenName"] = array("Name" => "GivenName", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->UpdateFields["Patient_RegDate"] = array("Name" => "Patient_RegDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["BirthDate"] = array("Name" => "BirthDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["StreetName"] = array("Name" => "StreetName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StreetNr"] = array("Name" => "StreetNr", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Town"] = array("Name" => "Town", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["HomePhone"] = array("Name" => "HomePhone", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["MobilePhone"] = array("Name" => "MobilePhone", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["NrPregnancies"] = array("Name" => "NrPregnancies", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["NrDeliveries"] = array("Name" => "NrDeliveries", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DistrictID"] = array("Name" => "DistrictID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["BloodGroupID"] = array("Name" => "BloodGroupID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Rhesus"] = array("Name" => "Rhesus", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AddressActual"] = array("Name" => "AddressActual", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["StreetNameActual"] = array("Name" => "StreetNameActual", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["StreetNrActual"] = array("Name" => "StreetNrActual", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["TownActual"] = array("Name" => "TownActual", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["HomePhoneActual"] = array("Name" => "HomePhoneActual", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["DistrictActualID"] = array("Name" => "DistrictActualID", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["Admitted"] = array("Name" => "Admitted", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Discharged"] = array("Name" => "Discharged", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DischargeDate"] = array("Name" => "DischargeDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @33-5B0D6917
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", $this->Parameters["urlPatientID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "patient.PatientID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @33-FADD0CE2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT patient.*, provinceActual.ProvinceID AS provinceActual_ProvinceID, province.ProvinceID AS province_ProvinceID \n\n" .
        "FROM (((districts INNER JOIN province ON\n\n" .
        "districts.ProvinceID = province.ProvinceID) INNER JOIN patient ON\n\n" .
        "patient.DistrictID = districts.DistrictID) LEFT JOIN districts districtsActual ON\n\n" .
        "districtsActual.DistrictID = patient.DistrictActualID) LEFT JOIN province provinceActual ON\n\n" .
        "provinceActual.ProvinceID = districtsActual.ProvinceID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @33-C804C5B6
    function SetValues()
    {
        $this->GivenName->SetDBValue($this->f("GivenName"));
        $this->Patient_RegDate->SetDBValue(trim($this->f("Patient_RegDate")));
        $this->StreetName->SetDBValue($this->f("StreetName"));
        $this->StreetNr->SetDBValue($this->f("StreetNr"));
        $this->Town->SetDBValue($this->f("Town"));
        $this->NrPregnancies->SetDBValue(trim($this->f("NrPregnancies")));
        $this->NrDeliveries->SetDBValue(trim($this->f("NrDeliveries")));
        $this->BloodGroupID->SetDBValue(trim($this->f("BloodGroupID")));
        $this->Rhesus->SetDBValue(trim($this->f("Rhesus")));
        $this->lastmodified->SetDBValue(trim($this->f("created")));
        $this->user->SetDBValue($this->f("by_user"));
        $this->CurrentUser->SetDBValue($this->f("by_user"));
        $this->HomePhone->SetDBValue($this->f("HomePhone"));
        $this->MobilePhone->SetDBValue($this->f("MobilePhone"));
        $this->StreetNameActual->SetDBValue($this->f("StreetNameActual"));
        $this->TownActual->SetDBValue($this->f("TownActual"));
        $this->StreetNrActual->SetDBValue($this->f("StreetNrActual"));
        $this->DistrictID->SetDBValue(trim($this->f("DistrictID")));
        $this->s_province_ProvinceID->SetDBValue(trim($this->f("province_ProvinceID")));
        $this->FamilyName->SetDBValue($this->f("FamilyName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->AddressActual->SetDBValue(trim($this->f("AddressActual")));
        $this->DistrictActualID->SetDBValue(trim($this->f("DistrictActualID")));
        $this->s_province_ProvinceActualID->SetDBValue(trim($this->f("provinceActual_ProvinceID")));
        $this->HomePhoneActual->SetDBValue($this->f("HomePhoneActual"));
        $this->FacilityID->SetDBValue($this->f("FacilityID"));
        $this->Patient_RegDate2->SetDBValue(trim($this->f("DischargeDate")));
        $this->Discharged->SetDBValue(trim($this->f("Discharged")));
        $this->Admitted->SetDBValue(trim($this->f("Admitted")));
    }
//End SetValues Method

//Insert Method @33-2F7877E2
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["FamilyName"] = new clsSQLParameter("ctrlFamilyName", ccsMemo, "", "", $this->FamilyName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["BirthDate"] = new clsSQLParameter("ctrlBirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->BirthDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["StreetName"] = new clsSQLParameter("ctrlStreetName", ccsText, "", "", $this->StreetName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["StreetNr"] = new clsSQLParameter("ctrlStreetNr", ccsText, "", "", $this->StreetNr->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Town"] = new clsSQLParameter("ctrlTown", ccsText, "", "", $this->Town->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DistrictID"] = new clsSQLParameter("ctrlDistrictID", ccsInteger, "", "", $this->DistrictID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HomePhone"] = new clsSQLParameter("ctrlHomePhone", ccsText, "", "", $this->HomePhone->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["MobilePhone"] = new clsSQLParameter("ctrlMobilePhone", ccsText, "", "", $this->MobilePhone->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["GivenName"] = new clsSQLParameter("ctrlGivenName", ccsMemo, "", "", $this->GivenName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Patient_RegDate"] = new clsSQLParameter("ctrlPatient_RegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Patient_RegDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["BloodGroupID"] = new clsSQLParameter("ctrlBloodGroupID", ccsInteger, "", "", $this->BloodGroupID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Rhesus"] = new clsSQLParameter("ctrlRhesus", ccsInteger, "", "", $this->Rhesus->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NrPregnancies"] = new clsSQLParameter("ctrlNrPregnancies", ccsInteger, "", "", $this->NrPregnancies->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NrDeliveries"] = new clsSQLParameter("ctrlNrDeliveries", ccsInteger, "", "", $this->NrDeliveries->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["AddressActual"] = new clsSQLParameter("ctrlAddressActual", ccsInteger, "", "", $this->AddressActual->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["StreetNameActual"] = new clsSQLParameter("ctrlStreetNameActual", ccsText, "", "", $this->StreetNameActual->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["StreetNrActual"] = new clsSQLParameter("ctrlStreetNrActual", ccsText, "", "", $this->StreetNrActual->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TownActual"] = new clsSQLParameter("ctrlTownActual", ccsText, "", "", $this->TownActual->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HomePhoneActual"] = new clsSQLParameter("ctrlHomePhoneActual", ccsText, "", "", $this->HomePhoneActual->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DistrictActualID"] = new clsSQLParameter("ctrlDistrictActualID", ccsInteger, "", "", $this->DistrictActualID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacilityID", ccsInteger, "", "", $this->FacilityID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Admitted"] = new clsSQLParameter("ctrlAdmitted", ccsInteger, "", "", $this->Admitted->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Discharged"] = new clsSQLParameter("ctrlDischarged", ccsInteger, "", "", $this->Discharged->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeDate"] = new clsSQLParameter("ctrlPatient_RegDate2", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Patient_RegDate2->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["FamilyName"]->GetValue()) and !strlen($this->cp["FamilyName"]->GetText()) and !is_bool($this->cp["FamilyName"]->GetValue())) 
            $this->cp["FamilyName"]->SetValue($this->FamilyName->GetValue(true));
        if (!is_null($this->cp["BirthDate"]->GetValue()) and !strlen($this->cp["BirthDate"]->GetText()) and !is_bool($this->cp["BirthDate"]->GetValue())) 
            $this->cp["BirthDate"]->SetValue($this->BirthDate->GetValue(true));
        if (!is_null($this->cp["StreetName"]->GetValue()) and !strlen($this->cp["StreetName"]->GetText()) and !is_bool($this->cp["StreetName"]->GetValue())) 
            $this->cp["StreetName"]->SetValue($this->StreetName->GetValue(true));
        if (!is_null($this->cp["StreetNr"]->GetValue()) and !strlen($this->cp["StreetNr"]->GetText()) and !is_bool($this->cp["StreetNr"]->GetValue())) 
            $this->cp["StreetNr"]->SetValue($this->StreetNr->GetValue(true));
        if (!is_null($this->cp["Town"]->GetValue()) and !strlen($this->cp["Town"]->GetText()) and !is_bool($this->cp["Town"]->GetValue())) 
            $this->cp["Town"]->SetValue($this->Town->GetValue(true));
        if (!is_null($this->cp["DistrictID"]->GetValue()) and !strlen($this->cp["DistrictID"]->GetText()) and !is_bool($this->cp["DistrictID"]->GetValue())) 
            $this->cp["DistrictID"]->SetValue($this->DistrictID->GetValue(true));
        if (!is_null($this->cp["HomePhone"]->GetValue()) and !strlen($this->cp["HomePhone"]->GetText()) and !is_bool($this->cp["HomePhone"]->GetValue())) 
            $this->cp["HomePhone"]->SetValue($this->HomePhone->GetValue(true));
        if (!is_null($this->cp["MobilePhone"]->GetValue()) and !strlen($this->cp["MobilePhone"]->GetText()) and !is_bool($this->cp["MobilePhone"]->GetValue())) 
            $this->cp["MobilePhone"]->SetValue($this->MobilePhone->GetValue(true));
        if (!is_null($this->cp["GivenName"]->GetValue()) and !strlen($this->cp["GivenName"]->GetText()) and !is_bool($this->cp["GivenName"]->GetValue())) 
            $this->cp["GivenName"]->SetValue($this->GivenName->GetValue(true));
        if (!is_null($this->cp["Patient_RegDate"]->GetValue()) and !strlen($this->cp["Patient_RegDate"]->GetText()) and !is_bool($this->cp["Patient_RegDate"]->GetValue())) 
            $this->cp["Patient_RegDate"]->SetValue($this->Patient_RegDate->GetValue(true));
        if (!is_null($this->cp["BloodGroupID"]->GetValue()) and !strlen($this->cp["BloodGroupID"]->GetText()) and !is_bool($this->cp["BloodGroupID"]->GetValue())) 
            $this->cp["BloodGroupID"]->SetValue($this->BloodGroupID->GetValue(true));
        if (!is_null($this->cp["Rhesus"]->GetValue()) and !strlen($this->cp["Rhesus"]->GetText()) and !is_bool($this->cp["Rhesus"]->GetValue())) 
            $this->cp["Rhesus"]->SetValue($this->Rhesus->GetValue(true));
        if (!is_null($this->cp["NrPregnancies"]->GetValue()) and !strlen($this->cp["NrPregnancies"]->GetText()) and !is_bool($this->cp["NrPregnancies"]->GetValue())) 
            $this->cp["NrPregnancies"]->SetValue($this->NrPregnancies->GetValue(true));
        if (!is_null($this->cp["NrDeliveries"]->GetValue()) and !strlen($this->cp["NrDeliveries"]->GetText()) and !is_bool($this->cp["NrDeliveries"]->GetValue())) 
            $this->cp["NrDeliveries"]->SetValue($this->NrDeliveries->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["AddressActual"]->GetValue()) and !strlen($this->cp["AddressActual"]->GetText()) and !is_bool($this->cp["AddressActual"]->GetValue())) 
            $this->cp["AddressActual"]->SetValue($this->AddressActual->GetValue(true));
        if (!is_null($this->cp["StreetNameActual"]->GetValue()) and !strlen($this->cp["StreetNameActual"]->GetText()) and !is_bool($this->cp["StreetNameActual"]->GetValue())) 
            $this->cp["StreetNameActual"]->SetValue($this->StreetNameActual->GetValue(true));
        if (!is_null($this->cp["StreetNrActual"]->GetValue()) and !strlen($this->cp["StreetNrActual"]->GetText()) and !is_bool($this->cp["StreetNrActual"]->GetValue())) 
            $this->cp["StreetNrActual"]->SetValue($this->StreetNrActual->GetValue(true));
        if (!is_null($this->cp["TownActual"]->GetValue()) and !strlen($this->cp["TownActual"]->GetText()) and !is_bool($this->cp["TownActual"]->GetValue())) 
            $this->cp["TownActual"]->SetValue($this->TownActual->GetValue(true));
        if (!is_null($this->cp["HomePhoneActual"]->GetValue()) and !strlen($this->cp["HomePhoneActual"]->GetText()) and !is_bool($this->cp["HomePhoneActual"]->GetValue())) 
            $this->cp["HomePhoneActual"]->SetValue($this->HomePhoneActual->GetValue(true));
        if (!is_null($this->cp["DistrictActualID"]->GetValue()) and !strlen($this->cp["DistrictActualID"]->GetText()) and !is_bool($this->cp["DistrictActualID"]->GetValue())) 
            $this->cp["DistrictActualID"]->SetValue($this->DistrictActualID->GetValue(true));
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->FacilityID->GetValue(true));
        if (!is_null($this->cp["Admitted"]->GetValue()) and !strlen($this->cp["Admitted"]->GetText()) and !is_bool($this->cp["Admitted"]->GetValue())) 
            $this->cp["Admitted"]->SetValue($this->Admitted->GetValue(true));
        if (!is_null($this->cp["Discharged"]->GetValue()) and !strlen($this->cp["Discharged"]->GetText()) and !is_bool($this->cp["Discharged"]->GetValue())) 
            $this->cp["Discharged"]->SetValue($this->Discharged->GetValue(true));
        if (!is_null($this->cp["DischargeDate"]->GetValue()) and !strlen($this->cp["DischargeDate"]->GetText()) and !is_bool($this->cp["DischargeDate"]->GetValue())) 
            $this->cp["DischargeDate"]->SetValue($this->Patient_RegDate2->GetValue(true));
        $this->InsertFields["FamilyName"]["Value"] = $this->cp["FamilyName"]->GetDBValue(true);
        $this->InsertFields["BirthDate"]["Value"] = $this->cp["BirthDate"]->GetDBValue(true);
        $this->InsertFields["StreetName"]["Value"] = $this->cp["StreetName"]->GetDBValue(true);
        $this->InsertFields["StreetNr"]["Value"] = $this->cp["StreetNr"]->GetDBValue(true);
        $this->InsertFields["Town"]["Value"] = $this->cp["Town"]->GetDBValue(true);
        $this->InsertFields["DistrictID"]["Value"] = $this->cp["DistrictID"]->GetDBValue(true);
        $this->InsertFields["HomePhone"]["Value"] = $this->cp["HomePhone"]->GetDBValue(true);
        $this->InsertFields["MobilePhone"]["Value"] = $this->cp["MobilePhone"]->GetDBValue(true);
        $this->InsertFields["GivenName"]["Value"] = $this->cp["GivenName"]->GetDBValue(true);
        $this->InsertFields["Patient_RegDate"]["Value"] = $this->cp["Patient_RegDate"]->GetDBValue(true);
        $this->InsertFields["BloodGroupID"]["Value"] = $this->cp["BloodGroupID"]->GetDBValue(true);
        $this->InsertFields["Rhesus"]["Value"] = $this->cp["Rhesus"]->GetDBValue(true);
        $this->InsertFields["NrPregnancies"]["Value"] = $this->cp["NrPregnancies"]->GetDBValue(true);
        $this->InsertFields["NrDeliveries"]["Value"] = $this->cp["NrDeliveries"]->GetDBValue(true);
        $this->InsertFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->InsertFields["AddressActual"]["Value"] = $this->cp["AddressActual"]->GetDBValue(true);
        $this->InsertFields["StreetNameActual"]["Value"] = $this->cp["StreetNameActual"]->GetDBValue(true);
        $this->InsertFields["StreetNrActual"]["Value"] = $this->cp["StreetNrActual"]->GetDBValue(true);
        $this->InsertFields["TownActual"]["Value"] = $this->cp["TownActual"]->GetDBValue(true);
        $this->InsertFields["HomePhoneActual"]["Value"] = $this->cp["HomePhoneActual"]->GetDBValue(true);
        $this->InsertFields["DistrictActualID"]["Value"] = $this->cp["DistrictActualID"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->InsertFields["Admitted"]["Value"] = $this->cp["Admitted"]->GetDBValue(true);
        $this->InsertFields["Discharged"]["Value"] = $this->cp["Discharged"]->GetDBValue(true);
        $this->InsertFields["DischargeDate"]["Value"] = $this->cp["DischargeDate"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("patient", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @33-22971DF8
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["FamilyName"] = new clsSQLParameter("ctrlFamilyName", ccsMemo, "", "", $this->FamilyName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["GivenName"] = new clsSQLParameter("ctrlGivenName", ccsMemo, "", "", $this->GivenName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Patient_RegDate"] = new clsSQLParameter("ctrlPatient_RegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Patient_RegDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["BirthDate"] = new clsSQLParameter("ctrlBirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->BirthDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["StreetName"] = new clsSQLParameter("ctrlStreetName", ccsText, "", "", $this->StreetName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["StreetNr"] = new clsSQLParameter("ctrlStreetNr", ccsText, "", "", $this->StreetNr->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Town"] = new clsSQLParameter("ctrlTown", ccsText, "", "", $this->Town->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HomePhone"] = new clsSQLParameter("ctrlHomePhone", ccsText, "", "", $this->HomePhone->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["MobilePhone"] = new clsSQLParameter("ctrlMobilePhone", ccsText, "", "", $this->MobilePhone->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["NrPregnancies"] = new clsSQLParameter("ctrlNrPregnancies", ccsInteger, "", "", $this->NrPregnancies->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NrDeliveries"] = new clsSQLParameter("ctrlNrDeliveries", ccsInteger, "", "", $this->NrDeliveries->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DistrictID"] = new clsSQLParameter("ctrlDistrictID", ccsInteger, "", "", $this->DistrictID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["BloodGroupID"] = new clsSQLParameter("ctrlBloodGroupID", ccsInteger, "", "", $this->BloodGroupID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Rhesus"] = new clsSQLParameter("ctrlRhesus", ccsInteger, "", "", $this->Rhesus->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["AddressActual"] = new clsSQLParameter("ctrlAddressActual", ccsInteger, "", "", $this->AddressActual->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["StreetNameActual"] = new clsSQLParameter("ctrlStreetNameActual", ccsText, "", "", $this->StreetNameActual->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["StreetNrActual"] = new clsSQLParameter("ctrlStreetNrActual", ccsText, "", "", $this->StreetNrActual->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TownActual"] = new clsSQLParameter("ctrlTownActual", ccsText, "", "", $this->TownActual->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HomePhoneActual"] = new clsSQLParameter("ctrlHomePhoneActual", ccsText, "", "", $this->HomePhoneActual->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DistrictActualID"] = new clsSQLParameter("ctrlDistrictActualID", ccsInteger, "", "", $this->DistrictActualID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Admitted"] = new clsSQLParameter("ctrlAdmitted", ccsInteger, "", "", $this->Admitted->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Discharged"] = new clsSQLParameter("ctrlDischarged", ccsInteger, "", "", $this->Discharged->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeDate"] = new clsSQLParameter("ctrlPatient_RegDate2", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Patient_RegDate2->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", CCGetFromGet("PatientID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["FamilyName"]->GetValue()) and !strlen($this->cp["FamilyName"]->GetText()) and !is_bool($this->cp["FamilyName"]->GetValue())) 
            $this->cp["FamilyName"]->SetValue($this->FamilyName->GetValue(true));
        if (!is_null($this->cp["GivenName"]->GetValue()) and !strlen($this->cp["GivenName"]->GetText()) and !is_bool($this->cp["GivenName"]->GetValue())) 
            $this->cp["GivenName"]->SetValue($this->GivenName->GetValue(true));
        if (!is_null($this->cp["Patient_RegDate"]->GetValue()) and !strlen($this->cp["Patient_RegDate"]->GetText()) and !is_bool($this->cp["Patient_RegDate"]->GetValue())) 
            $this->cp["Patient_RegDate"]->SetValue($this->Patient_RegDate->GetValue(true));
        if (!is_null($this->cp["BirthDate"]->GetValue()) and !strlen($this->cp["BirthDate"]->GetText()) and !is_bool($this->cp["BirthDate"]->GetValue())) 
            $this->cp["BirthDate"]->SetValue($this->BirthDate->GetValue(true));
        if (!is_null($this->cp["StreetName"]->GetValue()) and !strlen($this->cp["StreetName"]->GetText()) and !is_bool($this->cp["StreetName"]->GetValue())) 
            $this->cp["StreetName"]->SetValue($this->StreetName->GetValue(true));
        if (!is_null($this->cp["StreetNr"]->GetValue()) and !strlen($this->cp["StreetNr"]->GetText()) and !is_bool($this->cp["StreetNr"]->GetValue())) 
            $this->cp["StreetNr"]->SetValue($this->StreetNr->GetValue(true));
        if (!is_null($this->cp["Town"]->GetValue()) and !strlen($this->cp["Town"]->GetText()) and !is_bool($this->cp["Town"]->GetValue())) 
            $this->cp["Town"]->SetValue($this->Town->GetValue(true));
        if (!is_null($this->cp["HomePhone"]->GetValue()) and !strlen($this->cp["HomePhone"]->GetText()) and !is_bool($this->cp["HomePhone"]->GetValue())) 
            $this->cp["HomePhone"]->SetValue($this->HomePhone->GetValue(true));
        if (!is_null($this->cp["MobilePhone"]->GetValue()) and !strlen($this->cp["MobilePhone"]->GetText()) and !is_bool($this->cp["MobilePhone"]->GetValue())) 
            $this->cp["MobilePhone"]->SetValue($this->MobilePhone->GetValue(true));
        if (!is_null($this->cp["NrPregnancies"]->GetValue()) and !strlen($this->cp["NrPregnancies"]->GetText()) and !is_bool($this->cp["NrPregnancies"]->GetValue())) 
            $this->cp["NrPregnancies"]->SetValue($this->NrPregnancies->GetValue(true));
        if (!is_null($this->cp["NrDeliveries"]->GetValue()) and !strlen($this->cp["NrDeliveries"]->GetText()) and !is_bool($this->cp["NrDeliveries"]->GetValue())) 
            $this->cp["NrDeliveries"]->SetValue($this->NrDeliveries->GetValue(true));
        if (!is_null($this->cp["DistrictID"]->GetValue()) and !strlen($this->cp["DistrictID"]->GetText()) and !is_bool($this->cp["DistrictID"]->GetValue())) 
            $this->cp["DistrictID"]->SetValue($this->DistrictID->GetValue(true));
        if (!is_null($this->cp["BloodGroupID"]->GetValue()) and !strlen($this->cp["BloodGroupID"]->GetText()) and !is_bool($this->cp["BloodGroupID"]->GetValue())) 
            $this->cp["BloodGroupID"]->SetValue($this->BloodGroupID->GetValue(true));
        if (!is_null($this->cp["Rhesus"]->GetValue()) and !strlen($this->cp["Rhesus"]->GetText()) and !is_bool($this->cp["Rhesus"]->GetValue())) 
            $this->cp["Rhesus"]->SetValue($this->Rhesus->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["AddressActual"]->GetValue()) and !strlen($this->cp["AddressActual"]->GetText()) and !is_bool($this->cp["AddressActual"]->GetValue())) 
            $this->cp["AddressActual"]->SetValue($this->AddressActual->GetValue(true));
        if (!is_null($this->cp["StreetNameActual"]->GetValue()) and !strlen($this->cp["StreetNameActual"]->GetText()) and !is_bool($this->cp["StreetNameActual"]->GetValue())) 
            $this->cp["StreetNameActual"]->SetValue($this->StreetNameActual->GetValue(true));
        if (!strlen($this->cp["StreetNameActual"]->GetText()) and !is_bool($this->cp["StreetNameActual"]->GetValue(true))) 
            $this->cp["StreetNameActual"]->SetText(NULL);
        if (!is_null($this->cp["StreetNrActual"]->GetValue()) and !strlen($this->cp["StreetNrActual"]->GetText()) and !is_bool($this->cp["StreetNrActual"]->GetValue())) 
            $this->cp["StreetNrActual"]->SetValue($this->StreetNrActual->GetValue(true));
        if (!strlen($this->cp["StreetNrActual"]->GetText()) and !is_bool($this->cp["StreetNrActual"]->GetValue(true))) 
            $this->cp["StreetNrActual"]->SetText(NULL);
        if (!is_null($this->cp["TownActual"]->GetValue()) and !strlen($this->cp["TownActual"]->GetText()) and !is_bool($this->cp["TownActual"]->GetValue())) 
            $this->cp["TownActual"]->SetValue($this->TownActual->GetValue(true));
        if (!strlen($this->cp["TownActual"]->GetText()) and !is_bool($this->cp["TownActual"]->GetValue(true))) 
            $this->cp["TownActual"]->SetText(NULL);
        if (!is_null($this->cp["HomePhoneActual"]->GetValue()) and !strlen($this->cp["HomePhoneActual"]->GetText()) and !is_bool($this->cp["HomePhoneActual"]->GetValue())) 
            $this->cp["HomePhoneActual"]->SetValue($this->HomePhoneActual->GetValue(true));
        if (!strlen($this->cp["HomePhoneActual"]->GetText()) and !is_bool($this->cp["HomePhoneActual"]->GetValue(true))) 
            $this->cp["HomePhoneActual"]->SetText(NULL);
        if (!is_null($this->cp["DistrictActualID"]->GetValue()) and !strlen($this->cp["DistrictActualID"]->GetText()) and !is_bool($this->cp["DistrictActualID"]->GetValue())) 
            $this->cp["DistrictActualID"]->SetValue($this->DistrictActualID->GetValue(true));
        if (!strlen($this->cp["DistrictActualID"]->GetText()) and !is_bool($this->cp["DistrictActualID"]->GetValue(true))) 
            $this->cp["DistrictActualID"]->SetText(NULL);
        if (!is_null($this->cp["Admitted"]->GetValue()) and !strlen($this->cp["Admitted"]->GetText()) and !is_bool($this->cp["Admitted"]->GetValue())) 
            $this->cp["Admitted"]->SetValue($this->Admitted->GetValue(true));
        if (!is_null($this->cp["Discharged"]->GetValue()) and !strlen($this->cp["Discharged"]->GetText()) and !is_bool($this->cp["Discharged"]->GetValue())) 
            $this->cp["Discharged"]->SetValue($this->Discharged->GetValue(true));
        if (!is_null($this->cp["DischargeDate"]->GetValue()) and !strlen($this->cp["DischargeDate"]->GetText()) and !is_bool($this->cp["DischargeDate"]->GetValue())) 
            $this->cp["DischargeDate"]->SetValue($this->Patient_RegDate2->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "PatientID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["FamilyName"]["Value"] = $this->cp["FamilyName"]->GetDBValue(true);
        $this->UpdateFields["GivenName"]["Value"] = $this->cp["GivenName"]->GetDBValue(true);
        $this->UpdateFields["Patient_RegDate"]["Value"] = $this->cp["Patient_RegDate"]->GetDBValue(true);
        $this->UpdateFields["BirthDate"]["Value"] = $this->cp["BirthDate"]->GetDBValue(true);
        $this->UpdateFields["StreetName"]["Value"] = $this->cp["StreetName"]->GetDBValue(true);
        $this->UpdateFields["StreetNr"]["Value"] = $this->cp["StreetNr"]->GetDBValue(true);
        $this->UpdateFields["Town"]["Value"] = $this->cp["Town"]->GetDBValue(true);
        $this->UpdateFields["HomePhone"]["Value"] = $this->cp["HomePhone"]->GetDBValue(true);
        $this->UpdateFields["MobilePhone"]["Value"] = $this->cp["MobilePhone"]->GetDBValue(true);
        $this->UpdateFields["NrPregnancies"]["Value"] = $this->cp["NrPregnancies"]->GetDBValue(true);
        $this->UpdateFields["NrDeliveries"]["Value"] = $this->cp["NrDeliveries"]->GetDBValue(true);
        $this->UpdateFields["DistrictID"]["Value"] = $this->cp["DistrictID"]->GetDBValue(true);
        $this->UpdateFields["BloodGroupID"]["Value"] = $this->cp["BloodGroupID"]->GetDBValue(true);
        $this->UpdateFields["Rhesus"]["Value"] = $this->cp["Rhesus"]->GetDBValue(true);
        $this->UpdateFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->UpdateFields["AddressActual"]["Value"] = $this->cp["AddressActual"]->GetDBValue(true);
        $this->UpdateFields["StreetNameActual"]["Value"] = $this->cp["StreetNameActual"]->GetDBValue(true);
        $this->UpdateFields["StreetNrActual"]["Value"] = $this->cp["StreetNrActual"]->GetDBValue(true);
        $this->UpdateFields["TownActual"]["Value"] = $this->cp["TownActual"]->GetDBValue(true);
        $this->UpdateFields["HomePhoneActual"]["Value"] = $this->cp["HomePhoneActual"]->GetDBValue(true);
        $this->UpdateFields["DistrictActualID"]["Value"] = $this->cp["DistrictActualID"]->GetDBValue(true);
        $this->UpdateFields["Admitted"]["Value"] = $this->cp["Admitted"]->GetDBValue(true);
        $this->UpdateFields["Discharged"]["Value"] = $this->cp["Discharged"]->GetDBValue(true);
        $this->UpdateFields["DischargeDate"]["Value"] = $this->cp["DischargeDate"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("patient", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @33-775110AB
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", CCGetFromGet("PatientID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "patient.PatientID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM patient";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End patientDataSource Class @33-FCB6E20C

class clsGriddelivery { //delivery class @317-99A521D2

//Variables @317-DEA8FF69

    // Public variables
    public $ComponentType = "Grid";
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $ErrorBlock;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $ForceIteration = false;
    public $HasRecord = false;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $RowNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";
    public $Attributes;

    // Grid Controls
    public $StaticControls;
    public $RowControls;
    public $Sorter_PregnancyRecNr;
    public $Sorter_DataDelivery;
    public $Sorter_FacilityName;
    public $Sorter_DeliveryMethodName;
//End Variables

//Class_Initialize Event @317-A4332D86
    function clsGriddelivery($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "delivery";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid delivery";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsdeliveryDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->Visible = (CCSecurityAccessCheck("3") == "success");
        $this->SorterName = CCGetParam("deliveryOrder", "");
        $this->SorterDirection = CCGetParam("deliveryDir", "");

        $this->PregnancyRecNr = new clsControl(ccsLabel, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", CCGetRequestParam("PregnancyRecNr", ccsGet, NULL), $this);
        $this->DataDelivery = new clsControl(ccsLabel, "DataDelivery", "DataDelivery", ccsDate, array("ShortDate"), CCGetRequestParam("DataDelivery", ccsGet, NULL), $this);
        $this->FacilityName = new clsControl(ccsLabel, "FacilityName", "FacilityName", ccsText, "", CCGetRequestParam("FacilityName", ccsGet, NULL), $this);
        $this->DeliveryMethodName = new clsControl(ccsLabel, "DeliveryMethodName", "DeliveryMethodName", ccsText, "", CCGetRequestParam("DeliveryMethodName", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "delivery_maint.php";
        $this->complications_delivery_de_TotalRecords = new clsControl(ccsLabel, "complications_delivery_de_TotalRecords", "complications_delivery_de_TotalRecords", ccsText, "", CCGetRequestParam("complications_delivery_de_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_PregnancyRecNr = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr", $FileName, $this);
        $this->Sorter_DataDelivery = new clsSorter($this->ComponentName, "Sorter_DataDelivery", $FileName, $this);
        $this->Sorter_FacilityName = new clsSorter($this->ComponentName, "Sorter_FacilityName", $FileName, $this);
        $this->Sorter_DeliveryMethodName = new clsSorter($this->ComponentName, "Sorter_DeliveryMethodName", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @317-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @317-74C45227
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlPatientID"] = CCGetFromGet("PatientID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["PregnancyRecNr"] = $this->PregnancyRecNr->Visible;
            $this->ControlsVisible["DataDelivery"] = $this->DataDelivery->Visible;
            $this->ControlsVisible["FacilityName"] = $this->FacilityName->Visible;
            $this->ControlsVisible["DeliveryMethodName"] = $this->DeliveryMethodName->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
                $this->DataDelivery->SetValue($this->DataSource->DataDelivery->GetValue());
                $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
                $this->DeliveryMethodName->SetValue($this->DataSource->DeliveryMethodName->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "DeliveryID", $this->DataSource->f("DeliveryID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "PatientID", $this->DataSource->f("PatientID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "PregnancyID", $this->DataSource->f("PregnancyID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->PregnancyRecNr->Show();
                $this->DataDelivery->Show();
                $this->FacilityName->Show();
                $this->DeliveryMethodName->Show();
                $this->ImageLink1->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->complications_delivery_de_TotalRecords->Show();
        $this->Sorter_PregnancyRecNr->Show();
        $this->Sorter_DataDelivery->Show();
        $this->Sorter_FacilityName->Show();
        $this->Sorter_DeliveryMethodName->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @317-4D78EA75
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataDelivery->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DeliveryMethodName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End delivery Class @317-FCB6E20C

class clsdeliveryDataSource extends clsDBregistry_db {  //deliveryDataSource Class @317-9FB0C359

//DataSource Variables @317-339B3FE7
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $PregnancyRecNr;
    public $DataDelivery;
    public $FacilityName;
    public $DeliveryMethodName;
//End DataSource Variables

//DataSourceClass_Initialize Event @317-407AE5E0
    function clsdeliveryDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid delivery";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->DataDelivery = new clsField("DataDelivery", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->DeliveryMethodName = new clsField("DeliveryMethodName", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @317-1BDAC647
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DataDelivery desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_PregnancyRecNr" => array("PregnancyRecNr", ""), 
            "Sorter_DataDelivery" => array("DataDelivery", ""), 
            "Sorter_FacilityName" => array("FacilityName", ""), 
            "Sorter_DeliveryMethodName" => array("DeliveryMethodName", "")));
    }
//End SetOrder Method

//Prepare Method @317-63ECCDDF
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", $this->Parameters["urlPatientID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "patient.PatientID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @317-C580DA69
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (((pregnancy INNER JOIN delivery ON\n\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID) INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN deliverymethod ON\n\n" .
        "delivery.DeliveryMethodID = deliverymethod.DeliveryMethodID";
        $this->SQL = "SELECT * \n\n" .
        "FROM (((pregnancy INNER JOIN delivery ON\n\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID) INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN deliverymethod ON\n\n" .
        "delivery.DeliveryMethodID = deliverymethod.DeliveryMethodID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @317-39FAF010
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->DataDelivery->SetDBValue(trim($this->f("DataDelivery")));
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->DeliveryMethodName->SetDBValue($this->f("DeliveryMethodName"));
    }
//End SetValues Method

} //End deliveryDataSource Class @317-FCB6E20C



class clsRecordpatientID { //patientID Class @770-B411A802

//Variables @770-9E315808

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

//Class_Initialize Event @770-99289862
    function clsRecordpatientID($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record patientID/Error";
        $this->DataSource = new clspatientIDDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;3;2");
            $this->ComponentName = "patientID";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->PatientID = new clsControl(ccsLabel, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @770-93E88696
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPatientID"] = CCGetFromGet("PatientID", NULL);
    }
//End Initialize Method

//Validate Method @770-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @770-F1086292
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @770-ED598703
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

//Operation Method @770-17DC9883
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

//Show Method @770-C595EAB2
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
                $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
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

        $this->PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End patientID Class @770-FCB6E20C

class clspatientIDDataSource extends clsDBregistry_db {  //patientIDDataSource Class @770-CE13CE38

//DataSource Variables @770-8DA0A97C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @770-CC3D84F0
    function clspatientIDDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record patientID/Error";
        $this->Initialize();
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @770-744C5837
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", $this->Parameters["urlPatientID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "PatientID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @770-2FACB139
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM patient {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @770-0754065F
    function SetValues()
    {
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End patientIDDataSource Class @770-FCB6E20C

//Initialize Page @1-FBF41C3D
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
$TemplateFileName = "patient_maint_fac.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Check SSL @1-E30DD771
CCCheckSSL();
//End Check SSL

//Authenticate User @1-0D3D90EB
CCSecurityRedirect("3", SecureURL . "" .  "noaccess.php");
//End Authenticate User

//Include events file @1-63262F04
include_once("./patient_maint_fac_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-054FF063
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$pregnancy = new clsGridpregnancy("", $MainPage);
$patient = new clsRecordpatient("", $MainPage);
$delivery = new clsGriddelivery("", $MainPage);
$patientID = new clsRecordpatientID("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->pregnancy = & $pregnancy;
$MainPage->patient = & $patient;
$MainPage->delivery = & $delivery;
$MainPage->patientID = & $patientID;
$pregnancy->Initialize();
$patient->Initialize();
$delivery->Initialize();
$patientID->Initialize();

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

//Execute Components @1-4A636B7B
$topmenu->Operations();
$patient->Operation();
$patientID->Operation();
//End Execute Components

//Go to destination page @1-E37FDBE8
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($pregnancy);
    unset($patient);
    unset($delivery);
    unset($patientID);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E1FD008C
$topmenu->Show();
$pregnancy->Show();
$patient->Show();
$delivery->Show();
$patientID->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-6457251D
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($pregnancy);
unset($patient);
unset($delivery);
unset($patientID);
unset($Tpl);
//End Unload Page


?>
