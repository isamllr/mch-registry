<?php
//Include Common Files @1-B62DDB92
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "testlist_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @54-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

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

//Class_Initialize Event @3-EF40F1D0
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
            $this->visit = new clsControl(ccsLabel, "visit", "visit", ccsText, "", CCGetRequestParam("visit", $Method, NULL), $this);
            $this->VisitDate = new clsControl(ccsLabel, "VisitDate", "VisitDate", ccsDate, array("ShortDate"), CCGetRequestParam("VisitDate", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @3-9F2B3976
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);
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

//CheckErrors Method @3-4AA0743B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->FamiliyName->Errors->Count());
        $errors = ($errors || $this->BirthDate->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->visit->Errors->Count());
        $errors = ($errors || $this->VisitDate->Errors->Count());
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

//Show Method @3-3550E489
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
                $this->VisitDate->SetValue($this->DataSource->VisitDate->GetValue());
            } else {
                $this->EditMode = false;
            }
        }
        $this->visit->SetText($CCSLocales->GetText("Visit"));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FamiliyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->visit->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VisitDate->Errors->ToString());
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
        $this->visit->Show();
        $this->VisitDate->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End pregnancy_header Class @3-FCB6E20C

class clspregnancy_headerDataSource extends clsDBregistry_db {  //pregnancy_headerDataSource Class @3-B1B2C690

//DataSource Variables @3-9DAF0FA1
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
    public $visit;
    public $VisitDate;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-4FC904CB
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
        
        $this->visit = new clsField("visit", ccsText, "");
        
        $this->VisitDate = new clsField("VisitDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-746DCC14
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", $this->Parameters["urlVisitID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "visit.VisitID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @3-AFBBD9BE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM (pregnancy INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN visit ON\n\n" .
        "visit.PregnancyID = pregnancy.PregnancyID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-098708FF
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->FirstName->SetDBValue($this->f("GivenName"));
        $this->FamiliyName->SetDBValue($this->f("FamilyName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
        $this->VisitDate->SetDBValue(trim($this->f("VisitDate")));
    }
//End SetValues Method

} //End pregnancy_headerDataSource Class @3-FCB6E20C

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

//Class_Initialize Event @495-0F731F8D
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
            $this->PatientID->Page = "patient_maint_fac.php";
            $this->visit = new clsControl(ccsLabel, "visit", "visit", ccsText, "", CCGetRequestParam("visit", $Method, NULL), $this);
            $this->VisitDate = new clsControl(ccsLabel, "VisitDate", "VisitDate", ccsDate, array("ShortDate"), CCGetRequestParam("VisitDate", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @495-9F2B3976
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);
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

//CheckErrors Method @495-9E6E040A
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->visit->Errors->Count());
        $errors = ($errors || $this->VisitDate->Errors->Count());
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

//Show Method @495-E9F05B82
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
                $this->VisitDate->SetValue($this->DataSource->VisitDate->GetValue());
            } else {
                $this->EditMode = false;
            }
        }
        $this->visit->SetText($CCSLocales->GetText("Visit"));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->visit->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VisitDate->Errors->ToString());
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
        $this->visit->Show();
        $this->VisitDate->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End pregnancy_header1 Class @495-FCB6E20C

class clspregnancy_header1DataSource extends clsDBregistry_db {  //pregnancy_header1DataSource Class @495-FA18A47E

//DataSource Variables @495-0AF8BC96
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
    public $visit;
    public $VisitDate;
//End DataSource Variables

//DataSourceClass_Initialize Event @495-9A5D4C79
    function clspregnancy_header1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record pregnancy_header1/Error";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        
        $this->visit = new clsField("visit", ccsText, "");
        
        $this->VisitDate = new clsField("VisitDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @495-746DCC14
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", $this->Parameters["urlVisitID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "visit.VisitID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @495-AFBBD9BE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM (pregnancy INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN visit ON\n\n" .
        "visit.PregnancyID = pregnancy.PregnancyID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @495-F9C8A979
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
        $this->VisitDate->SetDBValue(trim($this->f("VisitDate")));
    }
//End SetValues Method

} //End pregnancy_header1DataSource Class @495-FCB6E20C

class clsEditableGridtests { //tests Class @343-71CB8CB6

//Variables @343-DED0B74C

    // Public variables
    public $ComponentType = "EditableGrid";
    public $ComponentName;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormParameters;
    public $FormState;
    public $FormEnctype;
    public $CachedColumns;
    public $TotalRows;
    public $UpdatedRows;
    public $EmptyRows;
    public $Visible;
    public $RowsErrors;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode;
    public $ValidatingControls;
    public $Controls;
    public $ControlsErrors;
    public $RowNumber;
    public $Attributes;
    public $PrimaryKeys;

    // Class variables
    public $Sorter_TestDate;
    public $Sorter_TestName;
    public $Sorter_TestResultNormal;
    public $Sorter_TestResultDetails;
//End Variables

//Class_Initialize Event @343-05E97165
    function clsEditableGridtests($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid tests/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "tests";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["TestCodeID"][0] = "TestCodeID";
        $this->CachedColumns["TestID"][0] = "TestID";
        $this->DataSource = new clstestsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 100;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: EditableGrid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmptyRows = 1;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        if(!$this->Visible) return;

        $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;3;2");
        $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "3");
        $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "3");
        $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "3");
        $CCSForm = CCGetFromGet("ccsForm", "");
        $this->FormEnctype = "application/x-www-form-urlencoded";
        $this->FormSubmitted = ($CCSForm == $this->ComponentName);
        if($this->FormSubmitted) {
            $this->FormState = CCGetFromPost("FormState", "");
            $this->SetFormState($this->FormState);
        } else {
            $this->FormState = "";
        }
        $Method = $this->FormSubmitted ? ccsPost : ccsGet;

        $this->SorterName = CCGetParam("testsOrder", "");
        $this->SorterDirection = CCGetParam("testsDir", "");

        $this->Sorter_TestDate = new clsSorter($this->ComponentName, "Sorter_TestDate", $FileName, $this);
        $this->Sorter_TestName = new clsSorter($this->ComponentName, "Sorter_TestName", $FileName, $this);
        $this->Sorter_TestResultNormal = new clsSorter($this->ComponentName, "Sorter_TestResultNormal", $FileName, $this);
        $this->Sorter_TestResultDetails = new clsSorter($this->ComponentName, "Sorter_TestResultDetails", $FileName, $this);
        $this->TestDate = new clsControl(ccsTextBox, "TestDate", $CCSLocales->GetText("TestDate"), ccsDate, array("ShortDate"), NULL, $this);
        $this->TestDate->Required = true;
        $this->DatePicker_TestDate = new clsDatePicker("DatePicker_TestDate", "tests", "TestDate", $this);
        $this->TestName = new clsControl(ccsListBox, "TestName", $CCSLocales->GetText("TestName"), ccsText, "", NULL, $this);
        $this->TestName->DSType = dsTable;
        $this->TestName->DataSource = new clsDBregistry_db();
        $this->TestName->ds = & $this->TestName->DataSource;
        $this->TestName->DataSource->SQL = "SELECT * \n" .
"FROM testcode {SQL_Where} {SQL_OrderBy}";
        list($this->TestName->BoundColumn, $this->TestName->TextColumn, $this->TestName->DBFormat) = array("TestCodeID", "TestName", "");
        $this->TestName->Required = true;
        $this->TestResultDetails = new clsControl(ccsTextBox, "TestResultDetails", $CCSLocales->GetText("TestResultDetails"), ccsText, "", NULL, $this);
        $this->TestResultNormal = new clsControl(ccsRadioButton, "TestResultNormal", $CCSLocales->GetText("TestResultNormal"), ccsInteger, "", NULL, $this);
        $this->TestResultNormal->DSType = dsListOfValues;
        $this->TestResultNormal->Values = array(array("1", $CCSLocales->GetText("RYes") . " "), array("0", $CCSLocales->GetText("RNo")));
        $this->TestResultNormal->HTML = true;
        $this->Button_Update = new clsButton("Button_Update", $Method, $this);
        $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
    }
//End Class_Initialize Event

//Initialize Method @343-2A1AC48C
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);
    }
//End Initialize Method

//SetPrimaryKeys Method @343-EBC3F86C
    function SetPrimaryKeys($PrimaryKeys) {
        $this->PrimaryKeys = $PrimaryKeys;
        return $this->PrimaryKeys;
    }
//End SetPrimaryKeys Method

//GetPrimaryKeys Method @343-74F9A772
    function GetPrimaryKeys() {
        return $this->PrimaryKeys;
    }
//End GetPrimaryKeys Method

//GetFormParameters Method @343-103EA147
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["TestDate"][$RowNumber] = CCGetFromPost("TestDate_" . $RowNumber, NULL);
            $this->FormParameters["TestName"][$RowNumber] = CCGetFromPost("TestName_" . $RowNumber, NULL);
            $this->FormParameters["TestResultDetails"][$RowNumber] = CCGetFromPost("TestResultDetails_" . $RowNumber, NULL);
            $this->FormParameters["TestResultNormal"][$RowNumber] = CCGetFromPost("TestResultNormal_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @343-5FDCEA1F
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["TestCodeID"] = $this->CachedColumns["TestCodeID"][$this->RowNumber];
            $this->DataSource->CachedColumns["TestID"] = $this->CachedColumns["TestID"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->TestDate->SetText($this->FormParameters["TestDate"][$this->RowNumber], $this->RowNumber);
            $this->TestName->SetText($this->FormParameters["TestName"][$this->RowNumber], $this->RowNumber);
            $this->TestResultDetails->SetText($this->FormParameters["TestResultDetails"][$this->RowNumber], $this->RowNumber);
            $this->TestResultNormal->SetText($this->FormParameters["TestResultNormal"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                $Validation = ($this->ValidateRow($this->RowNumber) && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @343-38A58B94
    function ValidateRow()
    {
        global $CCSLocales;
        $this->TestDate->Validate();
        $this->TestName->Validate();
        $this->TestResultDetails->Validate();
        $this->TestResultNormal->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->TestDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TestName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TestResultDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TestResultNormal->Errors->ToString());
        $this->TestDate->Errors->Clear();
        $this->TestName->Errors->Clear();
        $this->TestResultDetails->Errors->Clear();
        $this->TestResultNormal->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @343-1D5D383A
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["TestDate"][$this->RowNumber]) && count($this->FormParameters["TestDate"][$this->RowNumber])) || strlen($this->FormParameters["TestDate"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["TestName"][$this->RowNumber]) && count($this->FormParameters["TestName"][$this->RowNumber])) || strlen($this->FormParameters["TestName"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["TestResultDetails"][$this->RowNumber]) && count($this->FormParameters["TestResultDetails"][$this->RowNumber])) || strlen($this->FormParameters["TestResultDetails"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["TestResultNormal"][$this->RowNumber]) && count($this->FormParameters["TestResultNormal"][$this->RowNumber])) || strlen($this->FormParameters["TestResultNormal"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @343-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @343-07C43216
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted)
            return;

        $this->GetFormParameters();
        $this->PressedButton = "Button_Update";
        if($this->Button_Update->Pressed) {
            $this->PressedButton = "Button_Update";
        } else if($this->Button_Cancel->Pressed) {
            $this->PressedButton = "Button_Cancel";
        }

        $Redirect = "visit_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Update") {
            if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateGrid()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//UpdateGrid Method @343-F2DD80CE
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["TestCodeID"] = $this->CachedColumns["TestCodeID"][$this->RowNumber];
            $this->DataSource->CachedColumns["TestID"] = $this->CachedColumns["TestID"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->TestDate->SetText($this->FormParameters["TestDate"][$this->RowNumber], $this->RowNumber);
            $this->TestName->SetText($this->FormParameters["TestName"][$this->RowNumber], $this->RowNumber);
            $this->TestResultDetails->SetText($this->FormParameters["TestResultDetails"][$this->RowNumber], $this->RowNumber);
            $this->TestResultNormal->SetText($this->FormParameters["TestResultNormal"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->UpdateAllowed) { $Validation = ($this->UpdateRow() && $Validation); }
            }
            else if($this->CheckInsert() && $this->InsertAllowed)
            {
                $Validation = ($Validation && $this->InsertRow());
            }
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterSubmit", $this);
        if ($this->Errors->Count() == 0 && $Validation){
            $this->DataSource->close();
            return true;
        }
        return false;
    }
//End UpdateGrid Method

//InsertRow Method @343-3F084095
    function InsertRow()
    {
        if(!$this->InsertAllowed) return false;
        $this->DataSource->TestDate->SetValue($this->TestDate->GetValue(true));
        $this->DataSource->TestName->SetValue($this->TestName->GetValue(true));
        $this->DataSource->TestResultNormal->SetValue($this->TestResultNormal->GetValue(true));
        $this->DataSource->TestResultDetails->SetValue($this->TestResultDetails->GetValue(true));
        $this->DataSource->Insert();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End InsertRow Method

//UpdateRow Method @343-736CC3E0
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->TestDate->SetValue($this->TestDate->GetValue(true));
        $this->DataSource->TestName->SetValue($this->TestName->GetValue(true));
        $this->DataSource->TestResultNormal->SetValue($this->TestResultNormal->GetValue(true));
        $this->DataSource->TestResultDetails->SetValue($this->TestResultDetails->GetValue(true));
        $this->DataSource->Update();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End UpdateRow Method

//DeleteRow Method @343-A4A656F6
    function DeleteRow()
    {
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End DeleteRow Method

//FormScript Method @343-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @343-4ADA285E
    function SetFormState($FormState)
    {
        if(strlen($FormState)) {
            $FormState = str_replace("\\\\", "\\" . ord("\\"), $FormState);
            $FormState = str_replace("\\;", "\\" . ord(";"), $FormState);
            $pieces = explode(";", $FormState);
            $this->UpdatedRows = $pieces[0];
            $this->EmptyRows   = $pieces[1];
            $this->TotalRows = $this->UpdatedRows + $this->EmptyRows;
            $RowNumber = 0;
            for($i = 2; $i < sizeof($pieces); $i = $i + 2)  {
                $piece = $pieces[$i + 0];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["TestCodeID"][$RowNumber] = $piece;
                $piece = $pieces[$i + 1];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["TestID"][$RowNumber] = $piece;
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $this->CachedColumns["TestCodeID"][$RowNumber] = "";
                $this->CachedColumns["TestID"][$RowNumber] = "";
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @343-CC969D30
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["TestCodeID"][$i]));
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["TestID"][$i]));
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @343-AE28D9EE
    function Show()
    {
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->TestName->Prepare();
        $this->TestResultNormal->Prepare();

        $this->DataSource->open();
        $is_next_record = ($this->ReadAllowed && $this->DataSource->next_record());
        $this->IsEmpty = ! $is_next_record;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) { return; }

        $this->Attributes->Show();
        $this->Button_Update->Visible = $this->Button_Update->Visible && ($this->InsertAllowed || $this->UpdateAllowed || $this->DeleteAllowed);
        $ParentPath = $Tpl->block_path;
        $EditableGridPath = $ParentPath . "/EditableGrid " . $this->ComponentName;
        $EditableGridRowPath = $ParentPath . "/EditableGrid " . $this->ComponentName . "/Row";
        $Tpl->block_path = $EditableGridRowPath;
        $this->RowNumber = 0;
        $NonEmptyRows = 0;
        $EmptyRowsLeft = $this->EmptyRows;
        $this->ControlsVisible["TestDate"] = $this->TestDate->Visible;
        $this->ControlsVisible["DatePicker_TestDate"] = $this->DatePicker_TestDate->Visible;
        $this->ControlsVisible["TestName"] = $this->TestName->Visible;
        $this->ControlsVisible["TestResultDetails"] = $this->TestResultDetails->Visible;
        $this->ControlsVisible["TestResultNormal"] = $this->TestResultNormal->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                // Parse Separator
                if($this->RowNumber) {
                    $Tpl->block_path = $EditableGridPath;
                    $this->Attributes->Show();
                    $Tpl->parseto("Separator", true, "Row");
                    $Tpl->block_path = $EditableGridRowPath;
                }
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CachedColumns["TestCodeID"][$this->RowNumber] = $this->DataSource->CachedColumns["TestCodeID"];
                    $this->CachedColumns["TestID"][$this->RowNumber] = $this->DataSource->CachedColumns["TestID"];
                    $this->TestDate->SetValue($this->DataSource->TestDate->GetValue());
                    $this->TestName->SetValue($this->DataSource->TestName->GetValue());
                    $this->TestResultDetails->SetValue($this->DataSource->TestResultDetails->GetValue());
                    $this->TestResultNormal->SetValue($this->DataSource->TestResultNormal->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->TestDate->SetText($this->FormParameters["TestDate"][$this->RowNumber], $this->RowNumber);
                    $this->TestName->SetText($this->FormParameters["TestName"][$this->RowNumber], $this->RowNumber);
                    $this->TestResultDetails->SetText($this->FormParameters["TestResultDetails"][$this->RowNumber], $this->RowNumber);
                    $this->TestResultNormal->SetText($this->FormParameters["TestResultNormal"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["TestCodeID"][$this->RowNumber] = "";
                    $this->CachedColumns["TestID"][$this->RowNumber] = "";
                    $this->TestDate->SetText("");
                    $this->TestName->SetText("");
                    $this->TestResultDetails->SetText("");
                    $this->TestResultNormal->SetText("");
                } else {
                    $this->TestDate->SetText($this->FormParameters["TestDate"][$this->RowNumber], $this->RowNumber);
                    $this->TestName->SetText($this->FormParameters["TestName"][$this->RowNumber], $this->RowNumber);
                    $this->TestResultDetails->SetText($this->FormParameters["TestResultDetails"][$this->RowNumber], $this->RowNumber);
                    $this->TestResultNormal->SetText($this->FormParameters["TestResultNormal"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->TestDate->Show($this->RowNumber);
                $this->DatePicker_TestDate->Show($this->RowNumber);
                $this->TestName->Show($this->RowNumber);
                $this->TestResultDetails->Show($this->RowNumber);
                $this->TestResultNormal->Show($this->RowNumber);
                if (isset($this->RowsErrors[$this->RowNumber]) && ($this->RowsErrors[$this->RowNumber] != "")) {
                    $Tpl->setblockvar("RowError", "");
                    $Tpl->setvar("Error", $this->RowsErrors[$this->RowNumber]);
                    $this->Attributes->Show();
                    $Tpl->parse("RowError", false);
                } else {
                    $Tpl->setblockvar("RowError", "");
                }
                $Tpl->setvar("FormScript", $this->FormScript($this->RowNumber));
                $Tpl->parse();
                if ($is_next_record) {
                    if ($this->FormSubmitted) {
                        $is_next_record = $this->RowNumber < $this->UpdatedRows;
                        if (($this->DataSource->CachedColumns["TestCodeID"] == $this->CachedColumns["TestCodeID"][$this->RowNumber]) && ($this->DataSource->CachedColumns["TestID"] == $this->CachedColumns["TestID"][$this->RowNumber])) {
                            if ($this->ReadAllowed) $this->DataSource->next_record();
                        }
                    }else{
                        $is_next_record = ($this->RowNumber < $this->PageSize) &&  $this->ReadAllowed && $this->DataSource->next_record();
                    }
                } else { 
                    $EmptyRowsLeft--;
                }
            } while($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed));
        } else {
            $Tpl->block_path = $EditableGridPath;
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $Tpl->block_path = $EditableGridPath;
        $this->Sorter_TestDate->Show();
        $this->Sorter_TestName->Show();
        $this->Sorter_TestResultNormal->Show();
        $this->Sorter_TestResultDetails->Show();
        $this->Button_Update->Show();
        $this->Button_Cancel->Show();

        if($this->CheckErrors()) {
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        if (!$CCSUseAmp) {
            $Tpl->SetVar("HTMLFormProperties", "method=\"POST\" action=\"" . $this->HTMLFormAction . "\" name=\"" . $this->ComponentName . "\"");
        } else {
            $Tpl->SetVar("HTMLFormProperties", "method=\"post\" action=\"" . str_replace("&", "&amp;", $this->HTMLFormAction) . "\" id=\"" . $this->ComponentName . "\"");
        }
        $Tpl->SetVar("FormState", CCToHTML($this->GetFormState($NonEmptyRows)));
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End tests Class @343-FCB6E20C

class clstestsDataSource extends clsDBregistry_db {  //testsDataSource Class @343-97B0D719

//DataSource Variables @343-3331FEAA
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $DeleteParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CachedColumns;
    public $CurrentRow;
    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $TestDate;
    public $TestName;
    public $TestResultDetails;
    public $TestResultNormal;
//End DataSource Variables

//DataSourceClass_Initialize Event @343-57DBC5C7
    function clstestsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid tests/Error";
        $this->Initialize();
        $this->TestDate = new clsField("TestDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->TestName = new clsField("TestName", ccsText, "");
        
        $this->TestResultDetails = new clsField("TestResultDetails", ccsText, "");
        
        $this->TestResultNormal = new clsField("TestResultNormal", ccsInteger, "");
        

        $this->InsertFields["TestDate"] = array("Name" => "TestDate", "Value" => "", "DataType" => ccsDate);
        $this->InsertFields["test.TestCodeID"] = array("Name" => "TestCodeID", "Value" => "", "DataType" => ccsText);
        $this->InsertFields["TestResultNormal"] = array("Name" => "TestResultNormal", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["TestResultDetails"] = array("Name" => "TestResultDetails", "Value" => "", "DataType" => ccsText);
        $this->InsertFields["VisitID"] = array("Name" => "VisitID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TestDate"] = array("Name" => "TestDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["TestCodeID"] = array("Name" => "TestCodeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TestResultNormal"] = array("Name" => "TestResultNormal", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TestResultDetails"] = array("Name" => "TestResultDetails", "Value" => "", "DataType" => ccsText);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @343-F50D7300
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_TestDate" => array("TestDate", ""), 
            "Sorter_TestName" => array("TestName", ""), 
            "Sorter_TestResultNormal" => array("TestResultNormal", ""), 
            "Sorter_TestResultDetails" => array("TestResultDetails", "")));
    }
//End SetOrder Method

//Prepare Method @343-1E19F65D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlVisitID", ccsInteger, "", "", $this->Parameters["urlVisitID"], -1, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "VisitID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @343-44996AD2
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

//SetValues Method @343-58674644
    function SetValues()
    {
        $this->CachedColumns["TestCodeID"] = $this->f("TestCodeID");
        $this->CachedColumns["TestID"] = $this->f("TestID");
        $this->TestDate->SetDBValue(trim($this->f("TestDate")));
        $this->TestName->SetDBValue($this->f("TestCodeID"));
        $this->TestResultDetails->SetDBValue($this->f("TestResultDetails"));
        $this->TestResultNormal->SetDBValue(trim($this->f("TestResultNormal")));
    }
//End SetValues Method

//Insert Method @343-AC5E8BBA
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["TestDate"] = new clsSQLParameter("ctrlTestDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->TestDate->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["test.TestCodeID"] = new clsSQLParameter("ctrlTestName", ccsText, "", "", $this->TestName->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TestResultNormal"] = new clsSQLParameter("ctrlTestResultNormal", ccsInteger, "", "", $this->TestResultNormal->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TestResultDetails"] = new clsSQLParameter("ctrlTestResultDetails", ccsText, "", "", $this->TestResultDetails->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VisitID"] = new clsSQLParameter("urlVisitID", ccsInteger, "", "", CCGetFromGet("VisitID", NULL), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["TestDate"]->GetValue()) and !strlen($this->cp["TestDate"]->GetText()) and !is_bool($this->cp["TestDate"]->GetValue())) 
            $this->cp["TestDate"]->SetValue($this->TestDate->GetValue(true));
        if (!is_null($this->cp["test.TestCodeID"]->GetValue()) and !strlen($this->cp["test.TestCodeID"]->GetText()) and !is_bool($this->cp["test.TestCodeID"]->GetValue())) 
            $this->cp["test.TestCodeID"]->SetValue($this->TestName->GetValue(true));
        if (!is_null($this->cp["TestResultNormal"]->GetValue()) and !strlen($this->cp["TestResultNormal"]->GetText()) and !is_bool($this->cp["TestResultNormal"]->GetValue())) 
            $this->cp["TestResultNormal"]->SetValue($this->TestResultNormal->GetValue(true));
        if (!is_null($this->cp["TestResultDetails"]->GetValue()) and !strlen($this->cp["TestResultDetails"]->GetText()) and !is_bool($this->cp["TestResultDetails"]->GetValue())) 
            $this->cp["TestResultDetails"]->SetValue($this->TestResultDetails->GetValue(true));
        if (!is_null($this->cp["VisitID"]->GetValue()) and !strlen($this->cp["VisitID"]->GetText()) and !is_bool($this->cp["VisitID"]->GetValue())) 
            $this->cp["VisitID"]->SetText(CCGetFromGet("VisitID", NULL));
        $this->InsertFields["TestDate"]["Value"] = $this->cp["TestDate"]->GetDBValue(true);
        $this->InsertFields["test.TestCodeID"]["Value"] = $this->cp["test.TestCodeID"]->GetDBValue(true);
        $this->InsertFields["TestResultNormal"]["Value"] = $this->cp["TestResultNormal"]->GetDBValue(true);
        $this->InsertFields["TestResultDetails"]["Value"] = $this->cp["TestResultDetails"]->GetDBValue(true);
        $this->InsertFields["VisitID"]["Value"] = $this->cp["VisitID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("test", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @343-B41B1E22
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["TestDate"] = new clsSQLParameter("ctrlTestDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->TestDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TestCodeID"] = new clsSQLParameter("ctrlTestName", ccsInteger, "", "", $this->TestName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TestResultNormal"] = new clsSQLParameter("ctrlTestResultNormal", ccsInteger, "", "", $this->TestResultNormal->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TestResultDetails"] = new clsSQLParameter("ctrlTestResultDetails", ccsText, "", "", $this->TestResultDetails->GetValue(true), "", false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "dsTestID", ccsInteger, "", "", $this->CachedColumns["TestID"], "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["TestDate"]->GetValue()) and !strlen($this->cp["TestDate"]->GetText()) and !is_bool($this->cp["TestDate"]->GetValue())) 
            $this->cp["TestDate"]->SetValue($this->TestDate->GetValue(true));
        if (!is_null($this->cp["TestCodeID"]->GetValue()) and !strlen($this->cp["TestCodeID"]->GetText()) and !is_bool($this->cp["TestCodeID"]->GetValue())) 
            $this->cp["TestCodeID"]->SetValue($this->TestName->GetValue(true));
        if (!is_null($this->cp["TestResultNormal"]->GetValue()) and !strlen($this->cp["TestResultNormal"]->GetText()) and !is_bool($this->cp["TestResultNormal"]->GetValue())) 
            $this->cp["TestResultNormal"]->SetValue($this->TestResultNormal->GetValue(true));
        if (!is_null($this->cp["TestResultDetails"]->GetValue()) and !strlen($this->cp["TestResultDetails"]->GetText()) and !is_bool($this->cp["TestResultDetails"]->GetValue())) 
            $this->cp["TestResultDetails"]->SetValue($this->TestResultDetails->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "TestID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["TestDate"]["Value"] = $this->cp["TestDate"]->GetDBValue(true);
        $this->UpdateFields["TestCodeID"]["Value"] = $this->cp["TestCodeID"]->GetDBValue(true);
        $this->UpdateFields["TestResultNormal"]["Value"] = $this->cp["TestResultNormal"]->GetDBValue(true);
        $this->UpdateFields["TestResultDetails"]["Value"] = $this->cp["TestResultDetails"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("test", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @343-83421E6C
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "dsTestID", ccsInteger, "", "", $this->CachedColumns["TestID"], "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "TestID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM test";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End testsDataSource Class @343-FCB6E20C

//Initialize Page @1-AA56DD84
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
$TemplateFileName = "testlist_maint.html";
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

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-ECB12231
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$pregnancy_header = new clsRecordpregnancy_header("", $MainPage);
$pregnancy_header1 = new clsRecordpregnancy_header1("", $MainPage);
$tests = new clsEditableGridtests("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->pregnancy_header = & $pregnancy_header;
$MainPage->pregnancy_header1 = & $pregnancy_header1;
$MainPage->tests = & $tests;
$pregnancy_header->Initialize();
$pregnancy_header1->Initialize();
$tests->Initialize();

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

//Execute Components @1-41607BF6
$topmenu->Operations();
$pregnancy_header->Operation();
$pregnancy_header1->Operation();
$tests->Operation();
//End Execute Components

//Go to destination page @1-DB62F71C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($pregnancy_header);
    unset($pregnancy_header1);
    unset($tests);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2DC587DF
$topmenu->Show();
$pregnancy_header->Show();
$pregnancy_header1->Show();
$tests->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2129EE09
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($pregnancy_header);
unset($pregnancy_header1);
unset($tests);
unset($Tpl);
//End Unload Page


?>
