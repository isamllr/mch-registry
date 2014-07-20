<?php
//Include Common Files @1-64A78897
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "patient_list.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordpatientSearch { //patientSearch Class @122-07A9818F

//Variables @122-9E315808

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

//Class_Initialize Event @122-F148564E
    function clsRecordpatientSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record patientSearch/Error";
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("3") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "patientSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_GivenName = new clsControl(ccsTextBox, "s_GivenName", "s_GivenName", ccsMemo, "", CCGetRequestParam("s_GivenName", $Method, NULL), $this);
            $this->s_FamilyName = new clsControl(ccsTextBox, "s_FamilyName", "s_FamilyName", ccsMemo, "", CCGetRequestParam("s_FamilyName", $Method, NULL), $this);
            $this->s_BirthDate = new clsControl(ccsTextBox, "s_BirthDate", "s_BirthDate", ccsDate, array("ShortDate"), CCGetRequestParam("s_BirthDate", $Method, NULL), $this);
            $this->DatePicker_s_BirthDate = new clsDatePicker("DatePicker_s_BirthDate", "patientSearch", "s_BirthDate", $this);
            $this->s_Town = new clsControl(ccsTextBox, "s_Town", "s_Town", ccsText, "", CCGetRequestParam("s_Town", $Method, NULL), $this);
            $this->s_PregnancyRecNr = new clsControl(ccsTextBox, "s_PregnancyRecNr", "s_PregnancyRecNr", ccsMemo, "", CCGetRequestParam("s_PregnancyRecNr", $Method, NULL), $this);
            $this->s_PatientID = new clsControl(ccsTextBox, "s_PatientID", "s_PatientID", ccsInteger, "", CCGetRequestParam("s_PatientID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @122-5ADF99AB
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_GivenName->Validate() && $Validation);
        $Validation = ($this->s_FamilyName->Validate() && $Validation);
        $Validation = ($this->s_BirthDate->Validate() && $Validation);
        $Validation = ($this->s_Town->Validate() && $Validation);
        $Validation = ($this->s_PregnancyRecNr->Validate() && $Validation);
        $Validation = ($this->s_PatientID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_GivenName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FamilyName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_BirthDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Town->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PregnancyRecNr->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PatientID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @122-F127D8FE
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_GivenName->Errors->Count());
        $errors = ($errors || $this->s_FamilyName->Errors->Count());
        $errors = ($errors || $this->s_BirthDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_BirthDate->Errors->Count());
        $errors = ($errors || $this->s_Town->Errors->Count());
        $errors = ($errors || $this->s_PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->s_PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @122-ED598703
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

//Operation Method @122-C6BF6FBF
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "patient_list.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "patient_list.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @122-542D04A7
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
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_GivenName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FamilyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Town->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
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

        $this->Button_DoSearch->Show();
        $this->s_GivenName->Show();
        $this->s_FamilyName->Show();
        $this->s_BirthDate->Show();
        $this->DatePicker_s_BirthDate->Show();
        $this->s_Town->Show();
        $this->s_PregnancyRecNr->Show();
        $this->s_PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End patientSearch Class @122-FCB6E20C

//Include Page implementation @109-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordpatientSearch1 { //patientSearch1 Class @165-6243D786

//Variables @165-9E315808

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

//Class_Initialize Event @165-8AEC62B9
    function clsRecordpatientSearch1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record patientSearch1/Error";
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;2");
            $this->ComponentName = "patientSearch1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->PregnancyRecNr = new clsControl(ccsTextBox, "PregnancyRecNr", "PregnancyRecNr", ccsMemo, "", CCGetRequestParam("PregnancyRecNr", $Method, NULL), $this);
            $this->FacilityID = new clsControl(ccsListBox, "FacilityID", "FacilityID", ccsText, "", CCGetRequestParam("FacilityID", $Method, NULL), $this);
            $this->FacilityID->DSType = dsTable;
            $this->FacilityID->DataSource = new clsDBregistry_db();
            $this->FacilityID->ds = & $this->FacilityID->DataSource;
            $this->FacilityID->DataSource->SQL = "SELECT FacilityName, FacilityID \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            list($this->FacilityID->BoundColumn, $this->FacilityID->TextColumn, $this->FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->PatientID = new clsControl(ccsTextBox, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @165-28CE6541
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->PregnancyRecNr->Validate() && $Validation);
        $Validation = ($this->FacilityID->Validate() && $Validation);
        $Validation = ($this->PatientID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->PregnancyRecNr->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PatientID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @165-123EA3E4
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->FacilityID->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @165-ED598703
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

//Operation Method @165-C6BF6FBF
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "patient_list.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "patient_list.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @165-0195662D
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

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
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

        $this->Button_DoSearch->Show();
        $this->PregnancyRecNr->Show();
        $this->FacilityID->Show();
        $this->PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End patientSearch1 Class @165-FCB6E20C

class clsGridpatients1 { //patients1 class @177-719E3741

//Variables @177-5183FE3E

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
    public $PatientID1;
//End Variables

//Class_Initialize Event @177-C503482D
    function clsGridpatients1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "patients1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid patients1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clspatients1DataSource($this);
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
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");
        $this->SorterName = CCGetParam("patients1Order", "");
        $this->SorterDirection = CCGetParam("patients1Dir", "");

        $this->PatientID = new clsControl(ccsLabel, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "patient_maint_district.php";
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->PatientID1 = new clsSorter($this->ComponentName, "PatientID1", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @177-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @177-FE700E2C
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlPregnancyRecNr"] = CCGetFromGet("PregnancyRecNr", NULL);
        $this->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
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
            $this->ControlsVisible["PatientID"] = $this->PatientID->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
                $this->ImageLink1->Parameters = "";
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->PatientID->Show();
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
        $this->Navigator->Show();
        $this->PatientID1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @177-DB24F1EB
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End patients1 Class @177-FCB6E20C

class clspatients1DataSource extends clsDBregistry_db {  //patients1DataSource Class @177-C403EF02

//DataSource Variables @177-A7ECA26E
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @177-55CCC49F
    function clspatients1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid patients1";
        $this->Initialize();
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @177-E914EBEC
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "patient.PatientID desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("PatientID1" => array("patient.PatientID", "")));
    }
//End SetOrder Method

//Prepare Method @177-EC45C902
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyRecNr", ccsText, "", "", $this->Parameters["urlPregnancyRecNr"], "", false);
        $this->wp->AddParameter("2", "urlFacilityID", ccsInteger, "", "", $this->Parameters["urlFacilityID"], "", false);
        $this->wp->AddParameter("3", "urlPatientID", ccsInteger, "", "", $this->Parameters["urlPatientID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PregnancyRecNr", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "facilities.FacilityID", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "patient.PatientID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]);
    }
//End Prepare Method

//Open Method @177-1D8117B6
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT patient.PatientID AS patient_PatientID, PregnancyRecNr, FacilityName \n\n" .
        "FROM (pregnancy LEFT JOIN facilities ON\n\n" .
        "pregnancy.FacilityID = facilities.FacilityID) RIGHT JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID {SQL_Where}\n\n" .
        "GROUP BY patient.PatientID {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @177-42D4602A
    function SetValues()
    {
        $this->PatientID->SetDBValue(trim($this->f("patient_PatientID")));
    }
//End SetValues Method

} //End patients1DataSource Class @177-FCB6E20C

class clsGridpatients { //patients class @110-B6D11097

//Variables @110-FEA64618

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
    public $Sorter_BirthDate;
    public $Sorter_Town;
    public $Sorter_DistrictName;
    public $Sorter_Patient_RegDate;
    public $GivenName1;
    public $FamilyName1;
    public $PatientID1;
//End Variables

//Class_Initialize Event @110-95C8E036
    function clsGridpatients($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "patients";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid patients";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clspatientsDataSource($this);
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
        $this->SorterName = CCGetParam("patientsOrder", "");
        $this->SorterDirection = CCGetParam("patientsDir", "");

        $this->FamilyName = new clsControl(ccsLink, "FamilyName", "FamilyName", ccsMemo, "", CCGetRequestParam("FamilyName", ccsGet, NULL), $this);
        $this->FamilyName->Page = "patient_maint_fac.php";
        $this->GivenName = new clsControl(ccsLabel, "GivenName", "GivenName", ccsMemo, "", CCGetRequestParam("GivenName", ccsGet, NULL), $this);
        $this->BirthDate = new clsControl(ccsLabel, "BirthDate", "BirthDate", ccsDate, array("ShortDate"), CCGetRequestParam("BirthDate", ccsGet, NULL), $this);
        $this->Town = new clsControl(ccsLabel, "Town", "Town", ccsText, "", CCGetRequestParam("Town", ccsGet, NULL), $this);
        $this->DistrictName = new clsControl(ccsLabel, "DistrictName", "DistrictName", ccsText, "", CCGetRequestParam("DistrictName", ccsGet, NULL), $this);
        $this->Patient_RegDate = new clsControl(ccsLabel, "Patient_RegDate", "Patient_RegDate", ccsDate, array("ShortDate"), CCGetRequestParam("Patient_RegDate", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "patient_maint_fac.php";
        $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", ccsGet, NULL), $this);
        $this->PatientID->Page = "patient_maint_fac.php";
        $this->Sorter_BirthDate = new clsSorter($this->ComponentName, "Sorter_BirthDate", $FileName, $this);
        $this->Sorter_Town = new clsSorter($this->ComponentName, "Sorter_Town", $FileName, $this);
        $this->Sorter_DistrictName = new clsSorter($this->ComponentName, "Sorter_DistrictName", $FileName, $this);
        $this->Sorter_Patient_RegDate = new clsSorter($this->ComponentName, "Sorter_Patient_RegDate", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->GivenName1 = new clsSorter($this->ComponentName, "GivenName1", $FileName, $this);
        $this->FamilyName1 = new clsSorter($this->ComponentName, "FamilyName1", $FileName, $this);
        $this->PatientID1 = new clsSorter($this->ComponentName, "PatientID1", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @110-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @110-0A5CFA0D
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["urls_PregnancyRecNr"] = CCGetFromGet("s_PregnancyRecNr", NULL);
        $this->DataSource->Parameters["urls_Town"] = CCGetFromGet("s_Town", NULL);
        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_FamilyName"] = CCGetFromGet("s_FamilyName", NULL);
        $this->DataSource->Parameters["urls_GivenName"] = CCGetFromGet("s_GivenName", NULL);
        $this->DataSource->Parameters["urls_PatientID"] = CCGetFromGet("s_PatientID", NULL);

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
            $this->ControlsVisible["FamilyName"] = $this->FamilyName->Visible;
            $this->ControlsVisible["GivenName"] = $this->GivenName->Visible;
            $this->ControlsVisible["BirthDate"] = $this->BirthDate->Visible;
            $this->ControlsVisible["Town"] = $this->Town->Visible;
            $this->ControlsVisible["DistrictName"] = $this->DistrictName->Visible;
            $this->ControlsVisible["Patient_RegDate"] = $this->Patient_RegDate->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            $this->ControlsVisible["PatientID"] = $this->PatientID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->FamilyName->SetValue($this->DataSource->FamilyName->GetValue());
                $this->FamilyName->Parameters = "";
                $this->FamilyName->Parameters = CCAddParam($this->FamilyName->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
                $this->GivenName->SetValue($this->DataSource->GivenName->GetValue());
                $this->BirthDate->SetValue($this->DataSource->BirthDate->GetValue());
                $this->Town->SetValue($this->DataSource->Town->GetValue());
                $this->DistrictName->SetValue($this->DataSource->DistrictName->GetValue());
                $this->Patient_RegDate->SetValue($this->DataSource->Patient_RegDate->GetValue());
                $this->ImageLink1->Parameters = "";
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
                $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
                $this->PatientID->Parameters = "";
                $this->PatientID->Parameters = CCAddParam($this->PatientID->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->FamilyName->Show();
                $this->GivenName->Show();
                $this->BirthDate->Show();
                $this->Town->Show();
                $this->DistrictName->Show();
                $this->Patient_RegDate->Show();
                $this->ImageLink1->Show();
                $this->PatientID->Show();
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
        $this->Sorter_BirthDate->Show();
        $this->Sorter_Town->Show();
        $this->Sorter_DistrictName->Show();
        $this->Sorter_Patient_RegDate->Show();
        $this->Navigator->Show();
        $this->GivenName1->Show();
        $this->FamilyName1->Show();
        $this->PatientID1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @110-AF3B2664
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FamilyName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GivenName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Town->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DistrictName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Patient_RegDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End patients Class @110-FCB6E20C

class clspatientsDataSource extends clsDBregistry_db {  //patientsDataSource Class @110-C48E6177

//DataSource Variables @110-92BB0337
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $FamilyName;
    public $GivenName;
    public $BirthDate;
    public $Town;
    public $DistrictName;
    public $Patient_RegDate;
    public $PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @110-FE5D211A
    function clspatientsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid patients";
        $this->Initialize();
        $this->FamilyName = new clsField("FamilyName", ccsMemo, "");
        
        $this->GivenName = new clsField("GivenName", ccsMemo, "");
        
        $this->BirthDate = new clsField("BirthDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Town = new clsField("Town", ccsText, "");
        
        $this->DistrictName = new clsField("DistrictName", ccsText, "");
        
        $this->Patient_RegDate = new clsField("Patient_RegDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @110-39FEA4D2
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "patient.Patient_RegDate desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_BirthDate" => array("BirthDate", ""), 
            "Sorter_Town" => array("Town", ""), 
            "Sorter_DistrictName" => array("DistrictName", ""), 
            "Sorter_Patient_RegDate" => array("Patient_RegDate", ""), 
            "GivenName1" => array("GivenName", ""), 
            "FamilyName1" => array("FamilyName", ""), 
            "PatientID1" => array("patient.PatientID", "")));
    }
//End SetOrder Method

//Prepare Method @110-40D9EC3B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("2", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("3", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("4", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("5", "urls_PregnancyRecNr", ccsText, "", "", $this->Parameters["urls_PregnancyRecNr"], "", false);
        $this->wp->AddParameter("6", "urls_Town", ccsText, "", "", $this->Parameters["urls_Town"], "", false);
        $this->wp->AddParameter("7", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("8", "urls_FamilyName", ccsMemo, "", "", $this->Parameters["urls_FamilyName"], "", false);
        $this->wp->AddParameter("9", "urls_GivenName", ccsMemo, "", "", $this->Parameters["urls_GivenName"], "", false);
        $this->wp->AddParameter("10", "urls_PatientID", ccsInteger, "", "", $this->Parameters["urls_PatientID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opIn, "pregnancy.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger, true),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opIn, "referralhosp.FacilityID", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger, true),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opIn, "patient.FacilityID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger, true),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opIn, "referral.FacilityID", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger, true),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "pregnancy.PregnancyRecNr", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "patient.Town", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opEqual, "patient.BirthDate", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsDate),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opContains, "patient.FamilyName", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsMemo),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opContains, "patient.GivenName", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsMemo),false);
        $this->wp->Criterion[10] = $this->wp->Operation(opEqual, "patient.PatientID", $this->wp->GetDBValue("10"), $this->ToSQL($this->wp->GetDBValue("10"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opOR(
             true, $this->wp->opOR(
             false, $this->wp->opOR(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]), 
             $this->wp->Criterion[7]), 
             $this->wp->Criterion[8]), 
             $this->wp->Criterion[9]), 
             $this->wp->Criterion[10]);
    }
//End Prepare Method

//Open Method @110-7FE1C840
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT Patient_RegDate, GivenName, FamilyName, BirthDate, Town, patient.PatientID AS patient_PatientID, DistrictName, referral.FacilityID AS referral_FacilityID,\n\n" .
        "pregnancy.FacilityID AS pregnancy_FacilityID, patient.FacilityID AS patient_FacilityID, referralhosp.FacilityID AS referralhosp_FacilityID \n\n" .
        "FROM (((((patient LEFT JOIN pregnancy ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN districts ON\n\n" .
        "patient.DistrictID = districts.DistrictID) LEFT JOIN visit ON\n\n" .
        "visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN hospitalisation ON\n\n" .
        "hospitalisation.PregnancyID = pregnancy.PregnancyID) LEFT JOIN referral ON\n\n" .
        "referral.VisitID = visit.VisitID) LEFT JOIN referralhosp ON\n\n" .
        "referralhosp.HospitalisationID = hospitalisation.HospitalisationID {SQL_Where}\n\n" .
        "GROUP BY patient.PatientID {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @110-7187B862
    function SetValues()
    {
        $this->FamilyName->SetDBValue($this->f("FamilyName"));
        $this->GivenName->SetDBValue($this->f("GivenName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->Town->SetDBValue($this->f("Town"));
        $this->DistrictName->SetDBValue($this->f("DistrictName"));
        $this->Patient_RegDate->SetDBValue(trim($this->f("Patient_RegDate")));
        $this->PatientID->SetDBValue(trim($this->f("patient_PatientID")));
    }
//End SetValues Method

} //End patientsDataSource Class @110-FCB6E20C

//Initialize Page @1-20F4F135
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
$TemplateFileName = "patient_list.html";
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

//Include events file @1-EEA6E905
include_once("./patient_list_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-31D0E31F
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$patientSearch = new clsRecordpatientSearch("", $MainPage);
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$patientSearch1 = new clsRecordpatientSearch1("", $MainPage);
$patients1 = new clsGridpatients1("", $MainPage);
$patients = new clsGridpatients("", $MainPage);
$MainPage->patientSearch = & $patientSearch;
$MainPage->topmenu = & $topmenu;
$MainPage->patientSearch1 = & $patientSearch1;
$MainPage->patients1 = & $patients1;
$MainPage->patients = & $patients;
$patients1->Initialize();
$patients->Initialize();

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

//Execute Components @1-1AF29677
$patientSearch->Operation();
$topmenu->Operations();
$patientSearch1->Operation();
//End Execute Components

//Go to destination page @1-3A6E6DC7
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    unset($patientSearch);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($patientSearch1);
    unset($patients1);
    unset($patients);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-C057A9F7
$patientSearch->Show();
$topmenu->Show();
$patientSearch1->Show();
$patients1->Show();
$patients->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-CD98D228
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
unset($patientSearch);
$topmenu->Class_Terminate();
unset($topmenu);
unset($patientSearch1);
unset($patients1);
unset($patients);
unset($Tpl);
//End Unload Page


?>
