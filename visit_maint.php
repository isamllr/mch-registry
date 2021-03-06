<?php
//Include Common Files @1-49C3A8DD
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "visit_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @54-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsGridmedication { //medication class @270-28831675

//Variables @270-236B7EA3

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
    public $Sorter_DateMedication;
    public $Sorter_MedicationName;
    public $Sorter_Dosage;
//End Variables

//Class_Initialize Event @270-2390E169
    function clsGridmedication($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "medication";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid medication";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmedicationDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 100;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("medicationOrder", "");
        $this->SorterDirection = CCGetParam("medicationDir", "");

        $this->DateMedication = new clsControl(ccsLabel, "DateMedication", "DateMedication", ccsDate, array("ShortDate"), CCGetRequestParam("DateMedication", ccsGet, NULL), $this);
        $this->MedicationName = new clsControl(ccsLabel, "MedicationName", "MedicationName", ccsText, "", CCGetRequestParam("MedicationName", ccsGet, NULL), $this);
        $this->Dosage = new clsControl(ccsLabel, "Dosage", "Dosage", ccsText, "", CCGetRequestParam("Dosage", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "medication_maint.php";
        $this->medication_medicationatco_TotalRecords = new clsControl(ccsLabel, "medication_medicationatco_TotalRecords", "medication_medicationatco_TotalRecords", ccsText, "", CCGetRequestParam("medication_medicationatco_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_DateMedication = new clsSorter($this->ComponentName, "Sorter_DateMedication", $FileName, $this);
        $this->Sorter_MedicationName = new clsSorter($this->ComponentName, "Sorter_MedicationName", $FileName, $this);
        $this->Sorter_Dosage = new clsSorter($this->ComponentName, "Sorter_Dosage", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @270-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @270-0F569646
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);

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
            $this->ControlsVisible["DateMedication"] = $this->DateMedication->Visible;
            $this->ControlsVisible["MedicationName"] = $this->MedicationName->Visible;
            $this->ControlsVisible["Dosage"] = $this->Dosage->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->DateMedication->SetValue($this->DataSource->DateMedication->GetValue());
                $this->MedicationName->SetValue($this->DataSource->MedicationName->GetValue());
                $this->Dosage->SetValue($this->DataSource->Dosage->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "MedicationID", $this->DataSource->f("MedicationID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "VisitID", $this->DataSource->f("VisitID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->DateMedication->Show();
                $this->MedicationName->Show();
                $this->Dosage->Show();
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
        $this->medication_medicationatco_TotalRecords->Show();
        $this->Sorter_DateMedication->Show();
        $this->Sorter_MedicationName->Show();
        $this->Sorter_Dosage->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @270-4A036B34
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->DateMedication->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MedicationName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Dosage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End medication Class @270-FCB6E20C

class clsmedicationDataSource extends clsDBregistry_db {  //medicationDataSource Class @270-E4032679

//DataSource Variables @270-3B23A8E0
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $DateMedication;
    public $MedicationName;
    public $Dosage;
//End DataSource Variables

//DataSourceClass_Initialize Event @270-36275B27
    function clsmedicationDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid medication";
        $this->Initialize();
        $this->DateMedication = new clsField("DateMedication", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->MedicationName = new clsField("MedicationName", ccsText, "");
        
        $this->Dosage = new clsField("Dosage", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @270-2E51846C
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateMedication desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DateMedication" => array("DateMedication", ""), 
            "Sorter_MedicationName" => array("MedicationName", ""), 
            "Sorter_Dosage" => array("Dosage", "")));
    }
//End SetOrder Method

//Prepare Method @270-581D35BA
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", $this->Parameters["urlVisitID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "VisitID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @270-CB8F870E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM medication";
        $this->SQL = "SELECT * \n\n" .
        "FROM medication {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @270-BF93707D
    function SetValues()
    {
        $this->DateMedication->SetDBValue(trim($this->f("DateMedication")));
        $this->MedicationName->SetDBValue($this->f("MedicationName"));
        $this->Dosage->SetDBValue($this->f("Dosage"));
    }
//End SetValues Method

} //End medicationDataSource Class @270-FCB6E20C

class clsRecordpregnancy_header { //pregnancy_header Class @3-8E4CDD04

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

//Class_Initialize Event @3-8D203E65
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

//Initialize Method @3-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @3-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-C82C427B
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

//Operation Method @3-17DC9883
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

//Show Method @3-860F6492
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

} //End pregnancy_header Class @3-FCB6E20C

class clspregnancy_headerDataSource extends clsDBregistry_db {  //pregnancy_headerDataSource Class @3-B1B2C690

//DataSource Variables @3-DD53AE5C
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

//DataSourceClass_Initialize Event @3-B3F735C8
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

//Prepare Method @3-190B3DAA
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

//Open Method @3-64C2DC81
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

//SetValues Method @3-81074AD6
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->FirstName->SetDBValue($this->f("GivenName"));
        $this->FamiliyName->SetDBValue($this->f("FamilyName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_headerDataSource Class @3-FCB6E20C

class clsRecordvisit { //visit Class @55-1D6580F7

//Variables @55-9E315808

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

//Class_Initialize Event @55-AE6F8EE9
    function clsRecordvisit($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record visit/Error";
        $this->DataSource = new clsvisitDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;3;2");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "visit";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->VisitDate = new clsControl(ccsTextBox, "VisitDate", $CCSLocales->GetText("VisitDate"), ccsDate, array("ShortDate"), CCGetRequestParam("VisitDate", $Method, NULL), $this);
            $this->VisitDate->Required = true;
            $this->DatePicker_VisitDate = new clsDatePicker("DatePicker_VisitDate", "visit", "VisitDate", $this);
            $this->FacilityID = new clsControl(ccsListBox, "FacilityID", $CCSLocales->GetText("FacilityID"), ccsInteger, "", CCGetRequestParam("FacilityID", $Method, NULL), $this);
            $this->FacilityID->DSType = dsTable;
            $this->FacilityID->DataSource = new clsDBregistry_db();
            $this->FacilityID->ds = & $this->FacilityID->DataSource;
            $this->FacilityID->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            $this->FacilityID->DataSource->Order = "FacilityName";
            list($this->FacilityID->BoundColumn, $this->FacilityID->TextColumn, $this->FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->FacilityID->DataSource->Order = "FacilityName";
            $this->FacilityID->Required = true;
            $this->NextVisit = new clsControl(ccsTextBox, "NextVisit", $CCSLocales->GetText("NextVisit"), ccsDate, array("ShortDate"), CCGetRequestParam("NextVisit", $Method, NULL), $this);
            $this->DatePicker_NextVisit = new clsDatePicker("DatePicker_NextVisit", "visit", "NextVisit", $this);
            $this->ListofVisitDis = new clsControl(ccsListBox, "ListofVisitDis", "ListofVisitDis", ccsText, "", CCGetRequestParam("ListofVisitDis", $Method, NULL), $this);
            $this->ListofVisitDis->Multiple = true;
            $this->ListofVisitDis->DSType = dsTable;
            $this->ListofVisitDis->DataSource = new clsDBregistry_db();
            $this->ListofVisitDis->ds = & $this->ListofVisitDis->DataSource;
            $this->ListofVisitDis->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, \" - \", DiseaseName) AS DiseaseIDName\n" .
"FROM icd10_all {SQL_Where} {SQL_OrderBy}";
            $this->ListofVisitDis->DataSource->Order = "ICD10ID";
            list($this->ListofVisitDis->BoundColumn, $this->ListofVisitDis->TextColumn, $this->ListofVisitDis->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->ListofVisitDis->DataSource->wp = new clsSQLParameters();
            $this->ListofVisitDis->DataSource->wp->Criterion[1] = "( RelevantVisitProb = '1' )";
            $this->ListofVisitDis->DataSource->Where = 
                 $this->ListofVisitDis->DataSource->wp->Criterion[1];
            $this->ListofVisitDis->DataSource->Order = "ICD10ID";
            $this->SelectedVisitDis = new clsControl(ccsListBox, "SelectedVisitDis", "SelectedVisitDis", ccsText, "", CCGetRequestParam("SelectedVisitDis", $Method, NULL), $this);
            $this->SelectedVisitDis->Multiple = true;
            $this->SelectedVisitDis->DSType = dsTable;
            $this->SelectedVisitDis->DataSource = new clsDBregistry_db();
            $this->SelectedVisitDis->ds = & $this->SelectedVisitDis->DataSource;
            $this->SelectedVisitDis->DataSource->SQL = "SELECT *,  CONCAT(icd10_all.ICD10ID, \" - \", DiseaseName) AS DiseaseIDName\n" .
"FROM visitdisease INNER JOIN icd10_all ON\n" .
"visitdisease.ICD10ID = icd10_all.ICD10ID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedVisitDis->BoundColumn, $this->SelectedVisitDis->TextColumn, $this->SelectedVisitDis->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->SelectedVisitDis->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);
            $this->SelectedVisitDis->DataSource->wp = new clsSQLParameters();
            $this->SelectedVisitDis->DataSource->wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", $this->SelectedVisitDis->DataSource->Parameters["urlVisitID"], 0, false);
            $this->SelectedVisitDis->DataSource->wp->Criterion[1] = $this->SelectedVisitDis->DataSource->wp->Operation(opEqual, "visitdisease.VisitID", $this->SelectedVisitDis->DataSource->wp->GetDBValue("1"), $this->SelectedVisitDis->DataSource->ToSQL($this->SelectedVisitDis->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedVisitDis->DataSource->Where = 
                 $this->SelectedVisitDis->DataSource->wp->Criterion[1];
            $this->LinkedID_Visit = new clsControl(ccsHidden, "LinkedID_Visit", "LinkedID_Visit", ccsText, "", CCGetRequestParam("LinkedID_Visit", $Method, NULL), $this);
            $this->LeftButtonVisit = new clsButton("LeftButtonVisit", $Method, $this);
            $this->RightButtonVisit = new clsButton("RightButtonVisit", $Method, $this);
            $this->PregnancyID = new clsControl(ccsHidden, "PregnancyID", "PregnancyID", ccsInteger, "", CCGetRequestParam("PregnancyID", $Method, NULL), $this);
            $this->Button_UpdateAddMedication = new clsButton("Button_UpdateAddMedication", $Method, $this);
            $this->Button_UpdateAddHospitalisation = new clsButton("Button_UpdateAddHospitalisation", $Method, $this);
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Reloaded = new clsControl(ccsHidden, "Reloaded", "Reloaded", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Reloaded", $Method, NULL), $this);
            $this->CurrentUser = new clsControl(ccsTextBox, "CurrentUser", "CurrentUser", ccsText, "", CCGetRequestParam("CurrentUser", $Method, NULL), $this);
            $this->lastmodified = new clsControl(ccsLabel, "lastmodified", "lastmodified", ccsDate, array("GeneralDate"), CCGetRequestParam("lastmodified", $Method, NULL), $this);
            $this->user = new clsControl(ccsLabel, "user", "user", ccsText, "", CCGetRequestParam("user", $Method, NULL), $this);
            $this->VisitOutcomeID = new clsControl(ccsListBox, "VisitOutcomeID", $CCSLocales->GetText("VisitOutcomeID"), ccsInteger, "", CCGetRequestParam("VisitOutcomeID", $Method, NULL), $this);
            $this->VisitOutcomeID->DSType = dsTable;
            $this->VisitOutcomeID->DataSource = new clsDBregistry_db();
            $this->VisitOutcomeID->ds = & $this->VisitOutcomeID->DataSource;
            $this->VisitOutcomeID->DataSource->SQL = "SELECT * \n" .
"FROM visitoutcome {SQL_Where} {SQL_OrderBy}";
            list($this->VisitOutcomeID->BoundColumn, $this->VisitOutcomeID->TextColumn, $this->VisitOutcomeID->DBFormat) = array("VisitOutcomeID", "VisitOutcomeName", "");
            $this->VisitOutcomeID->Required = true;
            $this->IndicationID = new clsControl(ccsListBox, "IndicationID", $CCSLocales->GetText("IndicationID"), ccsInteger, "", CCGetRequestParam("IndicationID", $Method, NULL), $this);
            $this->IndicationID->DSType = dsTable;
            $this->IndicationID->DataSource = new clsDBregistry_db();
            $this->IndicationID->ds = & $this->IndicationID->DataSource;
            $this->IndicationID->DataSource->SQL = "SELECT * \n" .
"FROM refindication {SQL_Where} {SQL_OrderBy}";
            list($this->IndicationID->BoundColumn, $this->IndicationID->TextColumn, $this->IndicationID->DBFormat) = array("IndicationID", "RefIndicationName", "");
            $this->IndicationID->Required = true;
            $this->ReferralFacilityID = new clsControl(ccsListBox, "ReferralFacilityID", $CCSLocales->GetText("ReferralFacilityID"), ccsInteger, "", CCGetRequestParam("ReferralFacilityID", $Method, NULL), $this);
            $this->ReferralFacilityID->DSType = dsTable;
            $this->ReferralFacilityID->DataSource = new clsDBregistry_db();
            $this->ReferralFacilityID->ds = & $this->ReferralFacilityID->DataSource;
            $this->ReferralFacilityID->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            $this->ReferralFacilityID->DataSource->Order = "FacilityName";
            list($this->ReferralFacilityID->BoundColumn, $this->ReferralFacilityID->TextColumn, $this->ReferralFacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->ReferralFacilityID->DataSource->Order = "FacilityName";
            $this->ReferralFacilityID->Required = true;
            $this->DeptID = new clsControl(ccsListBox, "DeptID", $CCSLocales->GetText("ReferralDeptID"), ccsInteger, "", CCGetRequestParam("DeptID", $Method, NULL), $this);
            $this->DeptID->DSType = dsTable;
            $this->DeptID->DataSource = new clsDBregistry_db();
            $this->DeptID->ds = & $this->DeptID->DataSource;
            $this->DeptID->DataSource->SQL = "SELECT * \n" .
"FROM department {SQL_Where} {SQL_OrderBy}";
            $this->DeptID->DataSource->Order = "DepartmentDesc";
            list($this->DeptID->BoundColumn, $this->DeptID->TextColumn, $this->DeptID->DBFormat) = array("DeptID", "DepartmentDesc", "");
            $this->DeptID->DataSource->Order = "DepartmentDesc";
            $this->DeptID->Required = true;
            $this->EmployeeID = new clsControl(ccsListBox, "EmployeeID", $CCSLocales->GetText("EmployeeID"), ccsInteger, "", CCGetRequestParam("EmployeeID", $Method, NULL), $this);
            $this->EmployeeID->DSType = dsTable;
            $this->EmployeeID->DataSource = new clsDBregistry_db();
            $this->EmployeeID->ds = & $this->EmployeeID->DataSource;
            $this->EmployeeID->DataSource->SQL = "SELECT *,  CONCAT(FirstName, \" \", LastName, \" (\",PositionName, \")\" ) AS FirstAndLastNameAndPosition\n" .
"FROM employees INNER JOIN position ON\n" .
"employees.PositionID = position.PositionID {SQL_Where} {SQL_OrderBy}";
            list($this->EmployeeID->BoundColumn, $this->EmployeeID->TextColumn, $this->EmployeeID->DBFormat) = array("EmployeeID", "FirstAndLastNameAndPosition", "");
            $this->EmployeeID->DataSource->wp = new clsSQLParameters();
            $this->EmployeeID->DataSource->wp->Criterion[1] = "( employees.PositionID = 1 )";
            $this->EmployeeID->DataSource->Where = 
                 $this->EmployeeID->DataSource->wp->Criterion[1];
            $this->Button_UpdateAddTests = new clsButton("Button_UpdateAddTests", $Method, $this);
            $this->Button_UpdateAddTest = new clsButton("Button_UpdateAddTest", $Method, $this);
            $this->RiskGroup = new clsControl(ccsCheckBox, "RiskGroup", "RiskGroup", ccsInteger, "", CCGetRequestParam("RiskGroup", $Method, NULL), $this);
            $this->RiskGroup->CheckedValue = $this->RiskGroup->GetParsedValue(1);
            $this->RiskGroup->UncheckedValue = $this->RiskGroup->GetParsedValue(0);
            $this->ReferralTypeID = new clsControl(ccsListBox, "ReferralTypeID", $CCSLocales->GetText("IndicationID"), ccsInteger, "", CCGetRequestParam("ReferralTypeID", $Method, NULL), $this);
            $this->ReferralTypeID->DSType = dsTable;
            $this->ReferralTypeID->DataSource = new clsDBregistry_db();
            $this->ReferralTypeID->ds = & $this->ReferralTypeID->DataSource;
            $this->ReferralTypeID->DataSource->SQL = "SELECT * \n" .
"FROM referraltype {SQL_Where} {SQL_OrderBy}";
            list($this->ReferralTypeID->BoundColumn, $this->ReferralTypeID->TextColumn, $this->ReferralTypeID->DBFormat) = array("ReferralTypeID", "TypeName", "");
            $this->ReferralTypeID->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->VisitDate->Value) && !strlen($this->VisitDate->Value) && $this->VisitDate->Value !== false)
                    $this->VisitDate->SetValue(time());
                if(!is_array($this->Reloaded->Value) && !strlen($this->Reloaded->Value) && $this->Reloaded->Value !== false)
                    $this->Reloaded->SetText(false);
                if(!is_array($this->VisitOutcomeID->Value) && !strlen($this->VisitOutcomeID->Value) && $this->VisitOutcomeID->Value !== false)
                    $this->VisitOutcomeID->SetText(1);
                if(!is_array($this->DeptID->Value) && !strlen($this->DeptID->Value) && $this->DeptID->Value !== false)
                    $this->DeptID->SetText(1);
                if(!is_array($this->RiskGroup->Value) && !strlen($this->RiskGroup->Value) && $this->RiskGroup->Value !== false)
                    $this->RiskGroup->SetValue(false);
            }
            if(!is_array($this->lastmodified->Value) && !strlen($this->lastmodified->Value) && $this->lastmodified->Value !== false)
                $this->lastmodified->SetValue(time());
        }
    }
//End Class_Initialize Event

//Initialize Method @55-9F2B3976
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);
    }
//End Initialize Method

//Validate Method @55-C3B30C3E
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(! ((($this->VisitOutcomeID->GetValue()>2 and $this->ReferralFacilityID->GetValue() != $this->FacilityID->GetValue()) or ($this->VisitOutcomeID->GetValue()<3 and $this->ReferralFacilityID->GetValue() > 0)))) {
            $this->ReferralFacilityID->Errors->addError($CCSLocales->GetText("Referral"));
        }
        $Validation = ($this->VisitDate->Validate() && $Validation);
        $Validation = ($this->FacilityID->Validate() && $Validation);
        $Validation = ($this->NextVisit->Validate() && $Validation);
        $Validation = ($this->ListofVisitDis->Validate() && $Validation);
        $Validation = ($this->SelectedVisitDis->Validate() && $Validation);
        $Validation = ($this->LinkedID_Visit->Validate() && $Validation);
        $Validation = ($this->PregnancyID->Validate() && $Validation);
        $Validation = ($this->Reloaded->Validate() && $Validation);
        $Validation = ($this->CurrentUser->Validate() && $Validation);
        $Validation = ($this->VisitOutcomeID->Validate() && $Validation);
        $Validation = ($this->IndicationID->Validate() && $Validation);
        $Validation = ($this->ReferralFacilityID->Validate() && $Validation);
        $Validation = ($this->DeptID->Validate() && $Validation);
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->RiskGroup->Validate() && $Validation);
        $Validation = ($this->ReferralTypeID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->VisitDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NextVisit->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofVisitDis->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedVisitDis->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_Visit->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PregnancyID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Reloaded->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CurrentUser->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VisitOutcomeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IndicationID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ReferralFacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeptID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RiskGroup->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ReferralTypeID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @55-8BFD5287
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->VisitDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_VisitDate->Errors->Count());
        $errors = ($errors || $this->FacilityID->Errors->Count());
        $errors = ($errors || $this->NextVisit->Errors->Count());
        $errors = ($errors || $this->DatePicker_NextVisit->Errors->Count());
        $errors = ($errors || $this->ListofVisitDis->Errors->Count());
        $errors = ($errors || $this->SelectedVisitDis->Errors->Count());
        $errors = ($errors || $this->LinkedID_Visit->Errors->Count());
        $errors = ($errors || $this->PregnancyID->Errors->Count());
        $errors = ($errors || $this->Reloaded->Errors->Count());
        $errors = ($errors || $this->CurrentUser->Errors->Count());
        $errors = ($errors || $this->lastmodified->Errors->Count());
        $errors = ($errors || $this->user->Errors->Count());
        $errors = ($errors || $this->VisitOutcomeID->Errors->Count());
        $errors = ($errors || $this->IndicationID->Errors->Count());
        $errors = ($errors || $this->ReferralFacilityID->Errors->Count());
        $errors = ($errors || $this->DeptID->Errors->Count());
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->RiskGroup->Errors->Count());
        $errors = ($errors || $this->ReferralTypeID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @55-ED598703
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

//Operation Method @55-A5E31F34
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
            if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            } else if($this->LeftButtonVisit->Pressed) {
                $this->PressedButton = "LeftButtonVisit";
            } else if($this->RightButtonVisit->Pressed) {
                $this->PressedButton = "RightButtonVisit";
            } else if($this->Button_UpdateAddMedication->Pressed) {
                $this->PressedButton = "Button_UpdateAddMedication";
            } else if($this->Button_UpdateAddHospitalisation->Pressed) {
                $this->PressedButton = "Button_UpdateAddHospitalisation";
            } else if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_UpdateAddTests->Pressed) {
                $this->PressedButton = "Button_UpdateAddTests";
            } else if($this->Button_UpdateAddTest->Pressed) {
                $this->PressedButton = "Button_UpdateAddTest";
            }
        }
        $Redirect = "pregnancy_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "VisitID"));
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "LeftButtonVisit") {
                if(!CCGetEvent($this->LeftButtonVisit->CCSEvents, "OnClick", $this->LeftButtonVisit)) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "RightButtonVisit") {
                if(!CCGetEvent($this->RightButtonVisit->CCSEvents, "OnClick", $this->RightButtonVisit)) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddMedication" && $this->UpdateAllowed) {
                $Redirect = "medication_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "VisitID"));
                if(!CCGetEvent($this->Button_UpdateAddMedication->CCSEvents, "OnClick", $this->Button_UpdateAddMedication) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddHospitalisation" && $this->UpdateAllowed) {
                $Redirect = "hospitalisation_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "VisitID"));
                if(!CCGetEvent($this->Button_UpdateAddHospitalisation->CCSEvents, "OnClick", $this->Button_UpdateAddHospitalisation) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Insert" && $this->InsertAllowed) {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update" && $this->UpdateAllowed) {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddTests" && $this->UpdateAllowed) {
                $Redirect = "testlist_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "VisitID"));
                if(!CCGetEvent($this->Button_UpdateAddTests->CCSEvents, "OnClick", $this->Button_UpdateAddTests) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddTest" && $this->UpdateAllowed) {
                $Redirect = "Test_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "VisitID"));
                if(!CCGetEvent($this->Button_UpdateAddTest->CCSEvents, "OnClick", $this->Button_UpdateAddTest) || !$this->UpdateRow()) {
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

//InsertRow Method @55-4D0A2059
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->VisitDate->SetValue($this->VisitDate->GetValue(true));
        $this->DataSource->FacilityID->SetValue($this->FacilityID->GetValue(true));
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->NextVisit->SetValue($this->NextVisit->GetValue(true));
        $this->DataSource->VisitOutcomeID->SetValue($this->VisitOutcomeID->GetValue(true));
        $this->DataSource->PregnancyID->SetValue($this->PregnancyID->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->RiskGroup->SetValue($this->RiskGroup->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @55-C550957F
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->VisitDate->SetValue($this->VisitDate->GetValue(true));
        $this->DataSource->FacilityID->SetValue($this->FacilityID->GetValue(true));
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->NextVisit->SetValue($this->NextVisit->GetValue(true));
        $this->DataSource->VisitOutcomeID->SetValue($this->VisitOutcomeID->GetValue(true));
        $this->DataSource->PregnancyID->SetValue($this->PregnancyID->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->RiskGroup->SetValue($this->RiskGroup->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @55-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @55-00EB2664
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

        $this->FacilityID->Prepare();
        $this->ListofVisitDis->Prepare();
        $this->SelectedVisitDis->Prepare();
        $this->VisitOutcomeID->Prepare();
        $this->IndicationID->Prepare();
        $this->ReferralFacilityID->Prepare();
        $this->DeptID->Prepare();
        $this->EmployeeID->Prepare();
        $this->ReferralTypeID->Prepare();

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
                    $this->VisitDate->SetValue($this->DataSource->VisitDate->GetValue());
                    $this->FacilityID->SetValue($this->DataSource->FacilityID->GetValue());
                    $this->NextVisit->SetValue($this->DataSource->NextVisit->GetValue());
                    $this->PregnancyID->SetValue($this->DataSource->PregnancyID->GetValue());
                    $this->CurrentUser->SetValue($this->DataSource->CurrentUser->GetValue());
                    $this->VisitOutcomeID->SetValue($this->DataSource->VisitOutcomeID->GetValue());
                    $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                    $this->RiskGroup->SetValue($this->DataSource->RiskGroup->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->VisitDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VisitDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NextVisit->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_NextVisit->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofVisitDis->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedVisitDis->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_Visit->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PregnancyID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Reloaded->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CurrentUser->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lastmodified->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VisitOutcomeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IndicationID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ReferralFacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeptID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RiskGroup->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ReferralTypeID->Errors->ToString());
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
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;
        $this->Button_UpdateAddMedication->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_UpdateAddHospitalisation->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_UpdateAddTests->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_UpdateAddTest->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->VisitDate->Show();
        $this->DatePicker_VisitDate->Show();
        $this->FacilityID->Show();
        $this->NextVisit->Show();
        $this->DatePicker_NextVisit->Show();
        $this->ListofVisitDis->Show();
        $this->SelectedVisitDis->Show();
        $this->LinkedID_Visit->Show();
        $this->LeftButtonVisit->Show();
        $this->RightButtonVisit->Show();
        $this->PregnancyID->Show();
        $this->Button_UpdateAddMedication->Show();
        $this->Button_UpdateAddHospitalisation->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Reloaded->Show();
        $this->CurrentUser->Show();
        $this->lastmodified->Show();
        $this->user->Show();
        $this->VisitOutcomeID->Show();
        $this->IndicationID->Show();
        $this->ReferralFacilityID->Show();
        $this->DeptID->Show();
        $this->EmployeeID->Show();
        $this->Button_UpdateAddTests->Show();
        $this->Button_UpdateAddTest->Show();
        $this->RiskGroup->Show();
        $this->ReferralTypeID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End visit Class @55-FCB6E20C

class clsvisitDataSource extends clsDBregistry_db {  //visitDataSource Class @55-D9FBF55D

//DataSource Variables @55-0E244A52
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
    public $VisitDate;
    public $FacilityID;
    public $NextVisit;
    public $ListofVisitDis;
    public $SelectedVisitDis;
    public $LinkedID_Visit;
    public $PregnancyID;
    public $Reloaded;
    public $CurrentUser;
    public $lastmodified;
    public $user;
    public $VisitOutcomeID;
    public $IndicationID;
    public $ReferralFacilityID;
    public $DeptID;
    public $EmployeeID;
    public $RiskGroup;
    public $ReferralTypeID;
//End DataSource Variables

//DataSourceClass_Initialize Event @55-95A71A90
    function clsvisitDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record visit/Error";
        $this->Initialize();
        $this->VisitDate = new clsField("VisitDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->FacilityID = new clsField("FacilityID", ccsInteger, "");
        
        $this->NextVisit = new clsField("NextVisit", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->ListofVisitDis = new clsField("ListofVisitDis", ccsText, "");
        
        $this->SelectedVisitDis = new clsField("SelectedVisitDis", ccsText, "");
        
        $this->LinkedID_Visit = new clsField("LinkedID_Visit", ccsText, "");
        
        $this->PregnancyID = new clsField("PregnancyID", ccsInteger, "");
        
        $this->Reloaded = new clsField("Reloaded", ccsBoolean, $this->BooleanFormat);
        
        $this->CurrentUser = new clsField("CurrentUser", ccsText, "");
        
        $this->lastmodified = new clsField("lastmodified", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->user = new clsField("user", ccsText, "");
        
        $this->VisitOutcomeID = new clsField("VisitOutcomeID", ccsInteger, "");
        
        $this->IndicationID = new clsField("IndicationID", ccsInteger, "");
        
        $this->ReferralFacilityID = new clsField("ReferralFacilityID", ccsInteger, "");
        
        $this->DeptID = new clsField("DeptID", ccsInteger, "");
        
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->RiskGroup = new clsField("RiskGroup", ccsInteger, "");
        
        $this->ReferralTypeID = new clsField("ReferralTypeID", ccsInteger, "");
        

        $this->InsertFields["VisitDate"] = array("Name" => "VisitDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["NextVisit"] = array("Name" => "NextVisit", "Value" => "", "DataType" => ccsDate);
        $this->InsertFields["VisitOutcomeID"] = array("Name" => "VisitOutcomeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["PregnancyID"] = array("Name" => "PregnancyID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["RiskGroup"] = array("Name" => "RiskGroup", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["VisitDate"] = array("Name" => "VisitDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["NextVisit"] = array("Name" => "NextVisit", "Value" => "", "DataType" => ccsDate);
        $this->UpdateFields["VisitOutcomeID"] = array("Name" => "VisitOutcomeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PregnancyID"] = array("Name" => "PregnancyID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["RiskGroup"] = array("Name" => "RiskGroup", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @55-A43CDAB4
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", $this->Parameters["urlVisitID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "VisitID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @55-162A1176
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM visit {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @55-AB685786
    function SetValues()
    {
        $this->VisitDate->SetDBValue(trim($this->f("VisitDate")));
        $this->FacilityID->SetDBValue(trim($this->f("FacilityID")));
        $this->NextVisit->SetDBValue(trim($this->f("NextVisit")));
        $this->PregnancyID->SetDBValue(trim($this->f("PregnancyID")));
        $this->CurrentUser->SetDBValue($this->f("by_user"));
        $this->lastmodified->SetDBValue(trim($this->f("created")));
        $this->user->SetDBValue($this->f("by_user"));
        $this->VisitOutcomeID->SetDBValue(trim($this->f("VisitOutcomeID")));
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->RiskGroup->SetDBValue(trim($this->f("RiskGroup")));
    }
//End SetValues Method

//Insert Method @55-1DA8DF5A
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["VisitDate"] = new clsSQLParameter("ctrlVisitDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->VisitDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacilityID", ccsInteger, "", "", $this->FacilityID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["EmployeeID"] = new clsSQLParameter("ctrlEmployeeID", ccsInteger, "", "", $this->EmployeeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NextVisit"] = new clsSQLParameter("ctrlNextVisit", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->NextVisit->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VisitOutcomeID"] = new clsSQLParameter("ctrlVisitOutcomeID", ccsInteger, "", "", $this->VisitOutcomeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyID"] = new clsSQLParameter("ctrlPregnancyID", ccsInteger, "", "", $this->PregnancyID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RiskGroup"] = new clsSQLParameter("ctrlRiskGroup", ccsInteger, "", "", $this->RiskGroup->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["VisitDate"]->GetValue()) and !strlen($this->cp["VisitDate"]->GetText()) and !is_bool($this->cp["VisitDate"]->GetValue())) 
            $this->cp["VisitDate"]->SetValue($this->VisitDate->GetValue(true));
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->FacilityID->GetValue(true));
        if (!is_null($this->cp["EmployeeID"]->GetValue()) and !strlen($this->cp["EmployeeID"]->GetText()) and !is_bool($this->cp["EmployeeID"]->GetValue())) 
            $this->cp["EmployeeID"]->SetValue($this->EmployeeID->GetValue(true));
        if (!strlen($this->cp["EmployeeID"]->GetText()) and !is_bool($this->cp["EmployeeID"]->GetValue(true))) 
            $this->cp["EmployeeID"]->SetText(NULL);
        if (!is_null($this->cp["NextVisit"]->GetValue()) and !strlen($this->cp["NextVisit"]->GetText()) and !is_bool($this->cp["NextVisit"]->GetValue())) 
            $this->cp["NextVisit"]->SetValue($this->NextVisit->GetValue(true));
        if (!is_null($this->cp["VisitOutcomeID"]->GetValue()) and !strlen($this->cp["VisitOutcomeID"]->GetText()) and !is_bool($this->cp["VisitOutcomeID"]->GetValue())) 
            $this->cp["VisitOutcomeID"]->SetValue($this->VisitOutcomeID->GetValue(true));
        if (!is_null($this->cp["PregnancyID"]->GetValue()) and !strlen($this->cp["PregnancyID"]->GetText()) and !is_bool($this->cp["PregnancyID"]->GetValue())) 
            $this->cp["PregnancyID"]->SetValue($this->PregnancyID->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["RiskGroup"]->GetValue()) and !strlen($this->cp["RiskGroup"]->GetText()) and !is_bool($this->cp["RiskGroup"]->GetValue())) 
            $this->cp["RiskGroup"]->SetValue($this->RiskGroup->GetValue(true));
        $this->InsertFields["VisitDate"]["Value"] = $this->cp["VisitDate"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->InsertFields["EmployeeID"]["Value"] = $this->cp["EmployeeID"]->GetDBValue(true);
        $this->InsertFields["NextVisit"]["Value"] = $this->cp["NextVisit"]->GetDBValue(true);
        $this->InsertFields["VisitOutcomeID"]["Value"] = $this->cp["VisitOutcomeID"]->GetDBValue(true);
        $this->InsertFields["PregnancyID"]["Value"] = $this->cp["PregnancyID"]->GetDBValue(true);
        $this->InsertFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->InsertFields["RiskGroup"]["Value"] = $this->cp["RiskGroup"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("visit", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @55-5681FBE6
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["VisitDate"] = new clsSQLParameter("ctrlVisitDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->VisitDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacilityID", ccsInteger, "", "", $this->FacilityID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["EmployeeID"] = new clsSQLParameter("ctrlEmployeeID", ccsInteger, "", "", $this->EmployeeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NextVisit"] = new clsSQLParameter("ctrlNextVisit", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->NextVisit->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VisitOutcomeID"] = new clsSQLParameter("ctrlVisitOutcomeID", ccsInteger, "", "", $this->VisitOutcomeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyID"] = new clsSQLParameter("ctrlPregnancyID", ccsInteger, "", "", $this->PregnancyID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["RiskGroup"] = new clsSQLParameter("ctrlRiskGroup", ccsInteger, "", "", $this->RiskGroup->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", CCGetFromGet("VisitID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["VisitDate"]->GetValue()) and !strlen($this->cp["VisitDate"]->GetText()) and !is_bool($this->cp["VisitDate"]->GetValue())) 
            $this->cp["VisitDate"]->SetValue($this->VisitDate->GetValue(true));
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->FacilityID->GetValue(true));
        if (!is_null($this->cp["EmployeeID"]->GetValue()) and !strlen($this->cp["EmployeeID"]->GetText()) and !is_bool($this->cp["EmployeeID"]->GetValue())) 
            $this->cp["EmployeeID"]->SetValue($this->EmployeeID->GetValue(true));
        if (!strlen($this->cp["EmployeeID"]->GetText()) and !is_bool($this->cp["EmployeeID"]->GetValue(true))) 
            $this->cp["EmployeeID"]->SetText(NULL);
        if (!is_null($this->cp["NextVisit"]->GetValue()) and !strlen($this->cp["NextVisit"]->GetText()) and !is_bool($this->cp["NextVisit"]->GetValue())) 
            $this->cp["NextVisit"]->SetValue($this->NextVisit->GetValue(true));
        if (!is_null($this->cp["VisitOutcomeID"]->GetValue()) and !strlen($this->cp["VisitOutcomeID"]->GetText()) and !is_bool($this->cp["VisitOutcomeID"]->GetValue())) 
            $this->cp["VisitOutcomeID"]->SetValue($this->VisitOutcomeID->GetValue(true));
        if (!is_null($this->cp["PregnancyID"]->GetValue()) and !strlen($this->cp["PregnancyID"]->GetText()) and !is_bool($this->cp["PregnancyID"]->GetValue())) 
            $this->cp["PregnancyID"]->SetValue($this->PregnancyID->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["RiskGroup"]->GetValue()) and !strlen($this->cp["RiskGroup"]->GetText()) and !is_bool($this->cp["RiskGroup"]->GetValue())) 
            $this->cp["RiskGroup"]->SetValue($this->RiskGroup->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "visit.VisitID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["VisitDate"]["Value"] = $this->cp["VisitDate"]->GetDBValue(true);
        $this->UpdateFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->UpdateFields["EmployeeID"]["Value"] = $this->cp["EmployeeID"]->GetDBValue(true);
        $this->UpdateFields["NextVisit"]["Value"] = $this->cp["NextVisit"]->GetDBValue(true);
        $this->UpdateFields["VisitOutcomeID"]["Value"] = $this->cp["VisitOutcomeID"]->GetDBValue(true);
        $this->UpdateFields["PregnancyID"]["Value"] = $this->cp["PregnancyID"]->GetDBValue(true);
        $this->UpdateFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->UpdateFields["RiskGroup"]["Value"] = $this->cp["RiskGroup"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("visit", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @55-8BB5BE23
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", CCGetFromGet("VisitID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "visit.VisitID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM visit";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End visitDataSource Class @55-FCB6E20C

class clsGriddepartment_facilities_hos { //department_facilities_hos class @254-A02B7F67

//Variables @254-37156C14

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
    public $Sorter_DepartmentDesc;
    public $Sorter_FacilityName;
    public $Sorter_reason;
    public $Sorter_AdmissionDate;
    public $Sorter_DischargeDate;
//End Variables

//Class_Initialize Event @254-82C5276B
    function clsGriddepartment_facilities_hos($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "department_facilities_hos";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid department_facilities_hos";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsdepartment_facilities_hosDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 100;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("department_facilities_hosOrder", "");
        $this->SorterDirection = CCGetParam("department_facilities_hosDir", "");

        $this->DepartmentDesc = new clsControl(ccsLabel, "DepartmentDesc", "DepartmentDesc", ccsText, "", CCGetRequestParam("DepartmentDesc", ccsGet, NULL), $this);
        $this->FacilityName = new clsControl(ccsLabel, "FacilityName", "FacilityName", ccsText, "", CCGetRequestParam("FacilityName", ccsGet, NULL), $this);
        $this->reason = new clsControl(ccsLabel, "reason", "reason", ccsText, "", CCGetRequestParam("reason", ccsGet, NULL), $this);
        $this->AdmissionDate = new clsControl(ccsLabel, "AdmissionDate", "AdmissionDate", ccsDate, array("ShortDate"), CCGetRequestParam("AdmissionDate", ccsGet, NULL), $this);
        $this->DischargeDate = new clsControl(ccsLabel, "DischargeDate", "DischargeDate", ccsDate, array("ShortDate"), CCGetRequestParam("DischargeDate", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "hospitalisation_maint.php";
        $this->Sorter_DepartmentDesc = new clsSorter($this->ComponentName, "Sorter_DepartmentDesc", $FileName, $this);
        $this->Sorter_FacilityName = new clsSorter($this->ComponentName, "Sorter_FacilityName", $FileName, $this);
        $this->Sorter_reason = new clsSorter($this->ComponentName, "Sorter_reason", $FileName, $this);
        $this->Sorter_AdmissionDate = new clsSorter($this->ComponentName, "Sorter_AdmissionDate", $FileName, $this);
        $this->Sorter_DischargeDate = new clsSorter($this->ComponentName, "Sorter_DischargeDate", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @254-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @254-356B8C72
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);

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
            $this->ControlsVisible["DepartmentDesc"] = $this->DepartmentDesc->Visible;
            $this->ControlsVisible["FacilityName"] = $this->FacilityName->Visible;
            $this->ControlsVisible["reason"] = $this->reason->Visible;
            $this->ControlsVisible["AdmissionDate"] = $this->AdmissionDate->Visible;
            $this->ControlsVisible["DischargeDate"] = $this->DischargeDate->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->DepartmentDesc->SetValue($this->DataSource->DepartmentDesc->GetValue());
                $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
                $this->reason->SetValue($this->DataSource->reason->GetValue());
                $this->AdmissionDate->SetValue($this->DataSource->AdmissionDate->GetValue());
                $this->DischargeDate->SetValue($this->DataSource->DischargeDate->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "HospitalisationID", $this->DataSource->f("hospitalisation_HospitalisationID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->DepartmentDesc->Show();
                $this->FacilityName->Show();
                $this->reason->Show();
                $this->AdmissionDate->Show();
                $this->DischargeDate->Show();
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
        $this->Sorter_DepartmentDesc->Show();
        $this->Sorter_FacilityName->Show();
        $this->Sorter_reason->Show();
        $this->Sorter_AdmissionDate->Show();
        $this->Sorter_DischargeDate->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @254-2812DB98
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->DepartmentDesc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->reason->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AdmissionDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DischargeDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End department_facilities_hos Class @254-FCB6E20C

class clsdepartment_facilities_hosDataSource extends clsDBregistry_db {  //department_facilities_hosDataSource Class @254-FD62E96A

//DataSource Variables @254-FCFAC65E
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $DepartmentDesc;
    public $FacilityName;
    public $reason;
    public $AdmissionDate;
    public $DischargeDate;
//End DataSource Variables

//DataSourceClass_Initialize Event @254-502D8198
    function clsdepartment_facilities_hosDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid department_facilities_hos";
        $this->Initialize();
        $this->DepartmentDesc = new clsField("DepartmentDesc", ccsText, "");
        
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->reason = new clsField("reason", ccsText, "");
        
        $this->AdmissionDate = new clsField("AdmissionDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->DischargeDate = new clsField("DischargeDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @254-151CBB72
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DepartmentDesc" => array("DepartmentDesc", ""), 
            "Sorter_FacilityName" => array("FacilityName", ""), 
            "Sorter_reason" => array("reason", ""), 
            "Sorter_AdmissionDate" => array("AdmissionDate", ""), 
            "Sorter_DischargeDate" => array("DischargeDate", "")));
    }
//End SetOrder Method

//Prepare Method @254-40B3BF85
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", $this->Parameters["urlVisitID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "visit.VisitID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @254-772E59B0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (((hospitalisation INNER JOIN icd10_all ON\n\n" .
        "hospitalisation.ReasonHospitalisationICD10ID = icd10_all.ICD10ID) INNER JOIN department ON\n\n" .
        "department.DeptID = hospitalisation.DepartmentID) INNER JOIN facilities ON\n\n" .
        "facilities.FacilityID = hospitalisation.FacilityID) INNER JOIN visit ON\n\n" .
        "visit.HospitalisationID = hospitalisation.HospitalisationID";
        $this->SQL = "SELECT concat(ICD10ID,\" - \", DiseaseName) AS reason, AdmissionDate, DischargeDate, hospitalisation.HospitalisationID AS hospitalisation_HospitalisationID,\n\n" .
        "DepartmentDesc, FacilityName \n\n" .
        "FROM (((hospitalisation INNER JOIN icd10_all ON\n\n" .
        "hospitalisation.ReasonHospitalisationICD10ID = icd10_all.ICD10ID) INNER JOIN department ON\n\n" .
        "department.DeptID = hospitalisation.DepartmentID) INNER JOIN facilities ON\n\n" .
        "facilities.FacilityID = hospitalisation.FacilityID) INNER JOIN visit ON\n\n" .
        "visit.HospitalisationID = hospitalisation.HospitalisationID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @254-AECE421A
    function SetValues()
    {
        $this->DepartmentDesc->SetDBValue($this->f("DepartmentDesc"));
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->reason->SetDBValue($this->f("reason"));
        $this->AdmissionDate->SetDBValue(trim($this->f("AdmissionDate")));
        $this->DischargeDate->SetDBValue(trim($this->f("DischargeDate")));
    }
//End SetValues Method

} //End department_facilities_hosDataSource Class @254-FCB6E20C

class clsRecordpregnancy_header1 { //pregnancy_header1 Class @495-18A06872

//Variables @495-9E315808

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

//Class_Initialize Event @495-60A6F8D5
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

//Initialize Method @495-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @495-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @495-651F84E8
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

//MasterDetail @495-ED598703
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

//Operation Method @495-17DC9883
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

//Show Method @495-6CAF9031
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

} //End pregnancy_header1 Class @495-FCB6E20C

class clspregnancy_header1DataSource extends clsDBregistry_db {  //pregnancy_header1DataSource Class @495-FA18A47E

//DataSource Variables @495-E31437D1
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

//DataSourceClass_Initialize Event @495-A243E463
    function clspregnancy_header1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record pregnancy_header1/Error";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @495-190B3DAA
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

//Open Method @495-64C2DC81
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

//SetValues Method @495-0855F252
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_header1DataSource Class @495-FCB6E20C

class clsGridtest_testcode1 { //test_testcode1 class @551-2B043325

//Variables @551-CBB568F9

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
    public $Sorter_TestDate;
    public $Sorter_TestName;
    public $Sorter_TestResultNormal;
    public $Sorter_TestResultDetails;
//End Variables

//Class_Initialize Event @551-48B50045
    function clsGridtest_testcode1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "test_testcode1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid test_testcode1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clstest_testcode1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 100;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("test_testcode1Order", "");
        $this->SorterDirection = CCGetParam("test_testcode1Dir", "");

        $this->TestDate = new clsControl(ccsLabel, "TestDate", "TestDate", ccsDate, array("ShortDate"), CCGetRequestParam("TestDate", ccsGet, NULL), $this);
        $this->TestName = new clsControl(ccsLabel, "TestName", "TestName", ccsText, "", CCGetRequestParam("TestName", ccsGet, NULL), $this);
        $this->TestResultNormal = new clsControl(ccsLabel, "TestResultNormal", "TestResultNormal", ccsInteger, "", CCGetRequestParam("TestResultNormal", ccsGet, NULL), $this);
        $this->TestResultDetails = new clsControl(ccsLabel, "TestResultDetails", "TestResultDetails", ccsText, "", CCGetRequestParam("TestResultDetails", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "Test_maint.php";
        $this->Sorter_TestDate = new clsSorter($this->ComponentName, "Sorter_TestDate", $FileName, $this);
        $this->Sorter_TestName = new clsSorter($this->ComponentName, "Sorter_TestName", $FileName, $this);
        $this->Sorter_TestResultNormal = new clsSorter($this->ComponentName, "Sorter_TestResultNormal", $FileName, $this);
        $this->Sorter_TestResultDetails = new clsSorter($this->ComponentName, "Sorter_TestResultDetails", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @551-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @551-4B1053E5
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);

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
            $this->ControlsVisible["TestDate"] = $this->TestDate->Visible;
            $this->ControlsVisible["TestName"] = $this->TestName->Visible;
            $this->ControlsVisible["TestResultNormal"] = $this->TestResultNormal->Visible;
            $this->ControlsVisible["TestResultDetails"] = $this->TestResultDetails->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->TestDate->SetValue($this->DataSource->TestDate->GetValue());
                $this->TestName->SetValue($this->DataSource->TestName->GetValue());
                $this->TestResultNormal->SetValue($this->DataSource->TestResultNormal->GetValue());
                $this->TestResultDetails->SetValue($this->DataSource->TestResultDetails->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "VisitID", $this->DataSource->f("VisitID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "TestID", $this->DataSource->f("TestID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->TestDate->Show();
                $this->TestName->Show();
                $this->TestResultNormal->Show();
                $this->TestResultDetails->Show();
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
        $this->Sorter_TestDate->Show();
        $this->Sorter_TestName->Show();
        $this->Sorter_TestResultNormal->Show();
        $this->Sorter_TestResultDetails->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @551-ECAD41BD
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TestDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TestName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TestResultNormal->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TestResultDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End test_testcode1 Class @551-FCB6E20C

class clstest_testcode1DataSource extends clsDBregistry_db {  //test_testcode1DataSource Class @551-876B804F

//DataSource Variables @551-5BE37B8B
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $TestDate;
    public $TestName;
    public $TestResultNormal;
    public $TestResultDetails;
//End DataSource Variables

//DataSourceClass_Initialize Event @551-C94D668E
    function clstest_testcode1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid test_testcode1";
        $this->Initialize();
        $this->TestDate = new clsField("TestDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->TestName = new clsField("TestName", ccsText, "");
        
        $this->TestResultNormal = new clsField("TestResultNormal", ccsInteger, "");
        
        $this->TestResultDetails = new clsField("TestResultDetails", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @551-F2E1FB74
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "TestDate";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_TestDate" => array("TestDate", ""), 
            "Sorter_TestName" => array("TestName", ""), 
            "Sorter_TestResultNormal" => array("TestResultNormal", ""), 
            "Sorter_TestResultDetails" => array("TestResultDetails", "")));
    }
//End SetOrder Method

//Prepare Method @551-5E20381C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", $this->Parameters["urlVisitID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "test.VisitID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @551-44996AD2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM test INNER JOIN testcode ON\n\n" .
        "test.TestCodeID = testcode.TestCodeID";
        $this->SQL = "SELECT * \n\n" .
        "FROM test INNER JOIN testcode ON\n\n" .
        "test.TestCodeID = testcode.TestCodeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @551-B25B7DAA
    function SetValues()
    {
        $this->TestDate->SetDBValue(trim($this->f("TestDate")));
        $this->TestName->SetDBValue($this->f("TestName"));
        $this->TestResultNormal->SetDBValue(trim($this->f("TestResultNormal")));
        $this->TestResultDetails->SetDBValue($this->f("TestResultDetails"));
    }
//End SetValues Method

} //End test_testcode1DataSource Class @551-FCB6E20C

//Initialize Page @1-6088E9F1
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
$TemplateFileName = "visit_maint.html";
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

//Include events file @1-E09CF443
include_once("./visit_maint_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-4ABD9992
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$medication = new clsGridmedication("", $MainPage);
$pregnancy_header = new clsRecordpregnancy_header("", $MainPage);
$visit = new clsRecordvisit("", $MainPage);
$department_facilities_hos = new clsGriddepartment_facilities_hos("", $MainPage);
$pregnancy_header1 = new clsRecordpregnancy_header1("", $MainPage);
$test_testcode1 = new clsGridtest_testcode1("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->medication = & $medication;
$MainPage->pregnancy_header = & $pregnancy_header;
$MainPage->visit = & $visit;
$MainPage->department_facilities_hos = & $department_facilities_hos;
$MainPage->pregnancy_header1 = & $pregnancy_header1;
$MainPage->test_testcode1 = & $test_testcode1;
$medication->Initialize();
$pregnancy_header->Initialize();
$visit->Initialize();
$department_facilities_hos->Initialize();
$pregnancy_header1->Initialize();
$test_testcode1->Initialize();

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

//Execute Components @1-A11B963C
$topmenu->Operations();
$pregnancy_header->Operation();
$visit->Operation();
$pregnancy_header1->Operation();
//End Execute Components

//Go to destination page @1-0D0C882A
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($medication);
    unset($pregnancy_header);
    unset($visit);
    unset($department_facilities_hos);
    unset($pregnancy_header1);
    unset($test_testcode1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-FDB59C50
$topmenu->Show();
$medication->Show();
$pregnancy_header->Show();
$visit->Show();
$department_facilities_hos->Show();
$pregnancy_header1->Show();
$test_testcode1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2B008D15
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($medication);
unset($pregnancy_header);
unset($visit);
unset($department_facilities_hos);
unset($pregnancy_header1);
unset($test_testcode1);
unset($Tpl);
//End Unload Page


?>
