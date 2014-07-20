<?php
//Include Common Files @1-8470C5D1
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "hospitalisation_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordpregnancy_header { //pregnancy_header Class @41-8E4CDD04

//Variables @41-9E315808

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

//Class_Initialize Event @41-8D203E65
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

//Initialize Method @41-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @41-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @41-C82C427B
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

//MasterDetail @41-ED598703
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

//Operation Method @41-17DC9883
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

//Show Method @41-860F6492
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

} //End pregnancy_header Class @41-FCB6E20C

class clspregnancy_headerDataSource extends clsDBregistry_db {  //pregnancy_headerDataSource Class @41-B1B2C690

//DataSource Variables @41-DD53AE5C
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

//DataSourceClass_Initialize Event @41-B3F735C8
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

//Prepare Method @41-190B3DAA
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

//Open Method @41-64C2DC81
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

//SetValues Method @41-81074AD6
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->FirstName->SetDBValue($this->f("GivenName"));
        $this->FamiliyName->SetDBValue($this->f("FamilyName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_headerDataSource Class @41-FCB6E20C

class clsGridtest_testcode { //test_testcode class @52-290A6F69

//Variables @52-CBB568F9

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

//Class_Initialize Event @52-C70BB6AA
    function clsGridtest_testcode($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "test_testcode";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid test_testcode";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clstest_testcodeDataSource($this);
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
        $this->SorterName = CCGetParam("test_testcodeOrder", "");
        $this->SorterDirection = CCGetParam("test_testcodeDir", "");

        $this->TestDate = new clsControl(ccsLabel, "TestDate", "TestDate", ccsDate, array("ShortDate"), CCGetRequestParam("TestDate", ccsGet, NULL), $this);
        $this->TestName = new clsControl(ccsLabel, "TestName", "TestName", ccsText, "", CCGetRequestParam("TestName", ccsGet, NULL), $this);
        $this->TestResultNormal = new clsControl(ccsLabel, "TestResultNormal", "TestResultNormal", ccsInteger, "", CCGetRequestParam("TestResultNormal", ccsGet, NULL), $this);
        $this->TestResultDetails = new clsControl(ccsLabel, "TestResultDetails", "TestResultDetails", ccsText, "", CCGetRequestParam("TestResultDetails", ccsGet, NULL), $this);
        $this->ImageLink2 = new clsControl(ccsImageLink, "ImageLink2", "ImageLink2", ccsText, "", CCGetRequestParam("ImageLink2", ccsGet, NULL), $this);
        $this->ImageLink2->Page = "testhospitalisation_maint.php";
        $this->test_testcode_TotalRecords = new clsControl(ccsLabel, "test_testcode_TotalRecords", "test_testcode_TotalRecords", ccsText, "", CCGetRequestParam("test_testcode_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_TestDate = new clsSorter($this->ComponentName, "Sorter_TestDate", $FileName, $this);
        $this->Sorter_TestName = new clsSorter($this->ComponentName, "Sorter_TestName", $FileName, $this);
        $this->Sorter_TestResultNormal = new clsSorter($this->ComponentName, "Sorter_TestResultNormal", $FileName, $this);
        $this->Sorter_TestResultDetails = new clsSorter($this->ComponentName, "Sorter_TestResultDetails", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @52-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @52-5BFD1BF7
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlHospitalisationID"] = CCGetFromGet("HospitalisationID", NULL);

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
            $this->ControlsVisible["ImageLink2"] = $this->ImageLink2->Visible;
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
                $this->ImageLink2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink2->Parameters = CCAddParam($this->ImageLink2->Parameters, "TestHospitalisationID", $this->DataSource->f("TestHospitalisationID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->TestDate->Show();
                $this->TestName->Show();
                $this->TestResultNormal->Show();
                $this->TestResultDetails->Show();
                $this->ImageLink2->Show();
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
        $this->test_testcode_TotalRecords->Show();
        $this->Sorter_TestDate->Show();
        $this->Sorter_TestName->Show();
        $this->Sorter_TestResultNormal->Show();
        $this->Sorter_TestResultDetails->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @52-9D2FED96
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TestDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TestName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TestResultNormal->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TestResultDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End test_testcode Class @52-FCB6E20C

class clstest_testcodeDataSource extends clsDBregistry_db {  //test_testcodeDataSource Class @52-C508461F

//DataSource Variables @52-5BE37B8B
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

//DataSourceClass_Initialize Event @52-4B4F5B40
    function clstest_testcodeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid test_testcode";
        $this->Initialize();
        $this->TestDate = new clsField("TestDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->TestName = new clsField("TestName", ccsText, "");
        
        $this->TestResultNormal = new clsField("TestResultNormal", ccsInteger, "");
        
        $this->TestResultDetails = new clsField("TestResultDetails", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @52-2418FD03
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_TestDate" => array("TestDate", ""), 
            "Sorter_TestName" => array("TestName", ""), 
            "Sorter_TestResultNormal" => array("TestResultNormal", ""), 
            "Sorter_TestResultDetails" => array("TestResult", "")));
    }
//End SetOrder Method

//Prepare Method @52-08239001
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlHospitalisationID", ccsInteger, "", "", $this->Parameters["urlHospitalisationID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "testhospitalisation.HospitalisationID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @52-1C3AFF76
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM testhospitalisation INNER JOIN testcode ON\n\n" .
        "testhospitalisation.TestCodeID = testcode.TestCodeID";
        $this->SQL = "SELECT * \n\n" .
        "FROM testhospitalisation INNER JOIN testcode ON\n\n" .
        "testhospitalisation.TestCodeID = testcode.TestCodeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @52-B25B7DAA
    function SetValues()
    {
        $this->TestDate->SetDBValue(trim($this->f("TestDate")));
        $this->TestName->SetDBValue($this->f("TestName"));
        $this->TestResultNormal->SetDBValue(trim($this->f("TestResultNormal")));
        $this->TestResultDetails->SetDBValue($this->f("TestResultDetails"));
    }
//End SetValues Method

} //End test_testcodeDataSource Class @52-FCB6E20C

class clsGridmedicationhospitalisation { //medicationhospitalisation class @70-11E64904

//Variables @70-236B7EA3

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

//Class_Initialize Event @70-A5EF38F4
    function clsGridmedicationhospitalisation($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "medicationhospitalisation";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid medicationhospitalisation";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmedicationhospitalisationDataSource($this);
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
        $this->SorterName = CCGetParam("medicationhospitalisationOrder", "");
        $this->SorterDirection = CCGetParam("medicationhospitalisationDir", "");

        $this->DateMedication = new clsControl(ccsLabel, "DateMedication", "DateMedication", ccsDate, array("ShortDate"), CCGetRequestParam("DateMedication", ccsGet, NULL), $this);
        $this->MedicationName = new clsControl(ccsLabel, "MedicationName", "MedicationName", ccsText, "", CCGetRequestParam("MedicationName", ccsGet, NULL), $this);
        $this->Dosage = new clsControl(ccsLabel, "Dosage", "Dosage", ccsText, "", CCGetRequestParam("Dosage", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "hospitalisationmedication_maint.php";
        $this->medication_medicationatco_TotalRecords = new clsControl(ccsLabel, "medication_medicationatco_TotalRecords", "medication_medicationatco_TotalRecords", ccsText, "", CCGetRequestParam("medication_medicationatco_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_DateMedication = new clsSorter($this->ComponentName, "Sorter_DateMedication", $FileName, $this);
        $this->Sorter_MedicationName = new clsSorter($this->ComponentName, "Sorter_MedicationName", $FileName, $this);
        $this->Sorter_Dosage = new clsSorter($this->ComponentName, "Sorter_Dosage", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @70-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @70-4CEC9BEE
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlHospitalisationID"] = CCGetFromGet("HospitalisationID", NULL);

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
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "HospitalisationID", $this->DataSource->f("HospitalisationID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "MedicationHospitalisationID", $this->DataSource->f("MedicationHospitalisationID"));
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
        $this->medication_medicationatco_TotalRecords->Show();
        $this->Sorter_DateMedication->Show();
        $this->Sorter_MedicationName->Show();
        $this->Sorter_Dosage->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @70-4A036B34
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

} //End medicationhospitalisation Class @70-FCB6E20C

class clsmedicationhospitalisationDataSource extends clsDBregistry_db {  //medicationhospitalisationDataSource Class @70-BE40F0D3

//DataSource Variables @70-3B23A8E0
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

//DataSourceClass_Initialize Event @70-676434D1
    function clsmedicationhospitalisationDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid medicationhospitalisation";
        $this->Initialize();
        $this->DateMedication = new clsField("DateMedication", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->MedicationName = new clsField("MedicationName", ccsText, "");
        
        $this->Dosage = new clsField("Dosage", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @70-861937C1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DateMedication" => array("DateMedication", ""), 
            "Sorter_MedicationName" => array("MedicationName", ""), 
            "Sorter_Dosage" => array("Dosage", "")));
    }
//End SetOrder Method

//Prepare Method @70-EADE1F9F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlHospitalisationID", ccsInteger, "", "", $this->Parameters["urlHospitalisationID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "HospitalisationID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @70-6EF0CD73
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM medicationhospitalisation";
        $this->SQL = "SELECT * \n\n" .
        "FROM medicationhospitalisation {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @70-BF93707D
    function SetValues()
    {
        $this->DateMedication->SetDBValue(trim($this->f("DateMedication")));
        $this->MedicationName->SetDBValue($this->f("MedicationName"));
        $this->Dosage->SetDBValue($this->f("Dosage"));
    }
//End SetValues Method

} //End medicationhospitalisationDataSource Class @70-FCB6E20C

class clsGridrecommendedmedicationhospitalisation { //recommendedmedicationhospitalisation class @92-72887751

//Variables @92-236B7EA3

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

//Class_Initialize Event @92-AE653716
    function clsGridrecommendedmedicationhospitalisation($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "recommendedmedicationhospitalisation";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid recommendedmedicationhospitalisation";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsrecommendedmedicationhospitalisationDataSource($this);
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
        $this->SorterName = CCGetParam("recommendedmedicationhospitalisationOrder", "");
        $this->SorterDirection = CCGetParam("recommendedmedicationhospitalisationDir", "");

        $this->DateMedication = new clsControl(ccsLabel, "DateMedication", "DateMedication", ccsDate, array("ShortDate"), CCGetRequestParam("DateMedication", ccsGet, NULL), $this);
        $this->MedicationName = new clsControl(ccsLabel, "MedicationName", "MedicationName", ccsText, "", CCGetRequestParam("MedicationName", ccsGet, NULL), $this);
        $this->Dosage = new clsControl(ccsLabel, "Dosage", "Dosage", ccsText, "", CCGetRequestParam("Dosage", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "hospitalisationrecommedication_maint.php";
        $this->medication_medicationatco_TotalRecords = new clsControl(ccsLabel, "medication_medicationatco_TotalRecords", "medication_medicationatco_TotalRecords", ccsText, "", CCGetRequestParam("medication_medicationatco_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_DateMedication = new clsSorter($this->ComponentName, "Sorter_DateMedication", $FileName, $this);
        $this->Sorter_MedicationName = new clsSorter($this->ComponentName, "Sorter_MedicationName", $FileName, $this);
        $this->Sorter_Dosage = new clsSorter($this->ComponentName, "Sorter_Dosage", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @92-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @92-E319A9DE
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlHospitalisationID"] = CCGetFromGet("HospitalisationID", NULL);

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
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "HospitalisationID", $this->DataSource->f("HospitalisationID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "RecommendedMedicationHospitalisationID", $this->DataSource->f("RecommendedMedicationHospitalisationID"));
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
        $this->medication_medicationatco_TotalRecords->Show();
        $this->Sorter_DateMedication->Show();
        $this->Sorter_MedicationName->Show();
        $this->Sorter_Dosage->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @92-4A036B34
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

} //End recommendedmedicationhospitalisation Class @92-FCB6E20C

class clsrecommendedmedicationhospitalisationDataSource extends clsDBregistry_db {  //recommendedmedicationhospitalisationDataSource Class @92-7A226659

//DataSource Variables @92-3B23A8E0
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

//DataSourceClass_Initialize Event @92-832FCA4F
    function clsrecommendedmedicationhospitalisationDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid recommendedmedicationhospitalisation";
        $this->Initialize();
        $this->DateMedication = new clsField("DateMedication", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->MedicationName = new clsField("MedicationName", ccsText, "");
        
        $this->Dosage = new clsField("Dosage", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @92-861937C1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DateMedication" => array("DateMedication", ""), 
            "Sorter_MedicationName" => array("MedicationName", ""), 
            "Sorter_Dosage" => array("Dosage", "")));
    }
//End SetOrder Method

//Prepare Method @92-EADE1F9F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlHospitalisationID", ccsInteger, "", "", $this->Parameters["urlHospitalisationID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "HospitalisationID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @92-0325EA15
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM recommendedmedicationhospitalisation";
        $this->SQL = "SELECT * \n\n" .
        "FROM recommendedmedicationhospitalisation {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @92-BF93707D
    function SetValues()
    {
        $this->DateMedication->SetDBValue(trim($this->f("DateMedication")));
        $this->MedicationName->SetDBValue($this->f("MedicationName"));
        $this->Dosage->SetDBValue($this->f("Dosage"));
    }
//End SetValues Method

} //End recommendedmedicationhospitalisationDataSource Class @92-FCB6E20C

class clsGridDelivery { //Delivery class @288-1B54A371

//Variables @288-DEA8FF69

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

//Class_Initialize Event @288-084C3602
    function clsGridDelivery($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Delivery";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid Delivery";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsDeliveryDataSource($this);
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
        $this->SorterName = CCGetParam("DeliveryOrder", "");
        $this->SorterDirection = CCGetParam("DeliveryDir", "");

        $this->PregnancyRecNr = new clsControl(ccsLabel, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", CCGetRequestParam("PregnancyRecNr", ccsGet, NULL), $this);
        $this->DataDelivery = new clsControl(ccsLabel, "DataDelivery", "DataDelivery", ccsDate, array("ShortDate"), CCGetRequestParam("DataDelivery", ccsGet, NULL), $this);
        $this->FacilityName = new clsControl(ccsLabel, "FacilityName", "FacilityName", ccsText, "", CCGetRequestParam("FacilityName", ccsGet, NULL), $this);
        $this->DeliveryMethodName = new clsControl(ccsLabel, "DeliveryMethodName", "DeliveryMethodName", ccsText, "", CCGetRequestParam("DeliveryMethodName", ccsGet, NULL), $this);
        $this->ImageLink2 = new clsControl(ccsImageLink, "ImageLink2", "ImageLink2", ccsText, "", CCGetRequestParam("ImageLink2", ccsGet, NULL), $this);
        $this->ImageLink2->Page = "delivery_maint.php";
        $this->Sorter_PregnancyRecNr = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr", $FileName, $this);
        $this->Sorter_DataDelivery = new clsSorter($this->ComponentName, "Sorter_DataDelivery", $FileName, $this);
        $this->Sorter_FacilityName = new clsSorter($this->ComponentName, "Sorter_FacilityName", $FileName, $this);
        $this->Sorter_DeliveryMethodName = new clsSorter($this->ComponentName, "Sorter_DeliveryMethodName", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @288-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @288-A0FEDC10
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlHospitalisationID"] = CCGetFromGet("HospitalisationID", NULL);

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
            $this->ControlsVisible["ImageLink2"] = $this->ImageLink2->Visible;
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
                $this->ImageLink2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink2->Parameters = CCAddParam($this->ImageLink2->Parameters, "DeliveryID", $this->DataSource->f("DeliveryID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->PregnancyRecNr->Show();
                $this->DataDelivery->Show();
                $this->FacilityName->Show();
                $this->DeliveryMethodName->Show();
                $this->ImageLink2->Show();
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
        $this->Sorter_PregnancyRecNr->Show();
        $this->Sorter_DataDelivery->Show();
        $this->Sorter_FacilityName->Show();
        $this->Sorter_DeliveryMethodName->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @288-3CFA465E
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataDelivery->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DeliveryMethodName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Delivery Class @288-FCB6E20C

class clsDeliveryDataSource extends clsDBregistry_db {  //DeliveryDataSource Class @288-B9DC1185

//DataSource Variables @288-339B3FE7
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

//DataSourceClass_Initialize Event @288-D367777B
    function clsDeliveryDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Delivery";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->DataDelivery = new clsField("DataDelivery", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->DeliveryMethodName = new clsField("DeliveryMethodName", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @288-97C2D665
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_PregnancyRecNr" => array("PregnancyRecNr", ""), 
            "Sorter_DataDelivery" => array("DataDelivery", ""), 
            "Sorter_FacilityName" => array("FacilityName", ""), 
            "Sorter_DeliveryMethodName" => array("DeliveryMethodName", "")));
    }
//End SetOrder Method

//Prepare Method @288-C4590258
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlHospitalisationID", ccsText, "", "", $this->Parameters["urlHospitalisationID"], 0, false);
    }
//End Prepare Method

//Open Method @288-5997A8DB
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (((delivery \n" .
        "INNER JOIN deliverymethod ON deliverymethod.DeliveryMethodID = delivery.DeliveryMethodID)\n" .
        "INNER JOIN facilities ON delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy ON delivery.PregnancyID = pregnancy.PregnancyID) \n" .
        "INNER JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        "WHERE hospitalisation.HospitalisationID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " \n" .
        "AND delivery.DataDelivery >= hospitalisation.AdmissionDate \n" .
        "AND delivery.DataDelivery <= hospitalisation.DischargeDate";
        $this->SQL = "SELECT pregnancy.PregnancyRecNr, DataDelivery, FacilityName, deliverymethod.DeliveryMethodName, delivery.DeliveryID\n" .
        "FROM (((delivery \n" .
        "INNER JOIN deliverymethod ON deliverymethod.DeliveryMethodID = delivery.DeliveryMethodID)\n" .
        "INNER JOIN facilities ON delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy ON delivery.PregnancyID = pregnancy.PregnancyID) \n" .
        "INNER JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        "WHERE hospitalisation.HospitalisationID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " \n" .
        "AND delivery.DataDelivery >= hospitalisation.AdmissionDate \n" .
        "AND delivery.DataDelivery <= hospitalisation.DischargeDate\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @288-39FAF010
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->DataDelivery->SetDBValue(trim($this->f("DataDelivery")));
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->DeliveryMethodName->SetDBValue($this->f("DeliveryMethodName"));
    }
//End SetValues Method

} //End DeliveryDataSource Class @288-FCB6E20C

class clsRecordhospitalisation { //hospitalisation Class @3-5F6F2808

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

//Class_Initialize Event @3-ADD2232C
    function clsRecordhospitalisation($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record hospitalisation/Error";
        $this->DataSource = new clshospitalisationDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;3;2");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "hospitalisation";
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
            $this->AdmissionDate = new clsControl(ccsTextBox, "AdmissionDate", $CCSLocales->GetText("AdmissionDate"), ccsDate, array("ShortDate"), CCGetRequestParam("AdmissionDate", $Method, NULL), $this);
            $this->AdmissionDate->Required = true;
            $this->DatePicker_AdmissionDate = new clsDatePicker("DatePicker_AdmissionDate", "hospitalisation", "AdmissionDate", $this);
            $this->FacilityID = new clsControl(ccsListBox, "FacilityID", $CCSLocales->GetText("FacilityID"), ccsInteger, "", CCGetRequestParam("FacilityID", $Method, NULL), $this);
            $this->FacilityID->DSType = dsTable;
            $this->FacilityID->DataSource = new clsDBregistry_db();
            $this->FacilityID->ds = & $this->FacilityID->DataSource;
            $this->FacilityID->DataSource->SQL = "SELECT FacilityName, FacilityID \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            $this->FacilityID->DataSource->Order = "FacilityName";
            list($this->FacilityID->BoundColumn, $this->FacilityID->TextColumn, $this->FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->FacilityID->DataSource->Order = "FacilityName";
            $this->FacilityID->Required = true;
            $this->DepartmentID = new clsControl(ccsListBox, "DepartmentID", $CCSLocales->GetText("DepartmentID"), ccsInteger, "", CCGetRequestParam("DepartmentID", $Method, NULL), $this);
            $this->DepartmentID->DSType = dsTable;
            $this->DepartmentID->DataSource = new clsDBregistry_db();
            $this->DepartmentID->ds = & $this->DepartmentID->DataSource;
            $this->DepartmentID->DataSource->SQL = "SELECT DeptID, DepartmentDesc \n" .
"FROM department {SQL_Where} {SQL_OrderBy}";
            $this->DepartmentID->DataSource->Order = "DepartmentDesc";
            list($this->DepartmentID->BoundColumn, $this->DepartmentID->TextColumn, $this->DepartmentID->DBFormat) = array("DeptID", "DepartmentDesc", "");
            $this->DepartmentID->DataSource->Order = "DepartmentDesc";
            $this->DepartmentID->Required = true;
            $this->RecomObstetricExamination = new clsControl(ccsRadioButton, "RecomObstetricExamination", $CCSLocales->GetText("RecomObstetricExamination"), ccsInteger, "", CCGetRequestParam("RecomObstetricExamination", $Method, NULL), $this);
            $this->RecomObstetricExamination->DSType = dsListOfValues;
            $this->RecomObstetricExamination->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->RecomObstetricExamination->HTML = true;
            $this->RecomDelivery3rdLevel = new clsControl(ccsRadioButton, "RecomDelivery3rdLevel", $CCSLocales->GetText("RecomDelivery3rdLevel"), ccsInteger, "", CCGetRequestParam("RecomDelivery3rdLevel", $Method, NULL), $this);
            $this->RecomDelivery3rdLevel->DSType = dsListOfValues;
            $this->RecomDelivery3rdLevel->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->RecomDelivery3rdLevel->HTML = true;
            $this->DischargeDate = new clsControl(ccsTextBox, "DischargeDate", $CCSLocales->GetText("DischargeDate"), ccsDate, array("ShortDate"), CCGetRequestParam("DischargeDate", $Method, NULL), $this);
            $this->DatePicker_DischargeDate = new clsDatePicker("DatePicker_DischargeDate", "hospitalisation", "DischargeDate", $this);
            $this->PregnancyID = new clsControl(ccsHidden, "PregnancyID", "PregnancyID", ccsText, "", CCGetRequestParam("PregnancyID", $Method, NULL), $this);
            $this->Button_UpdateAddAdministeredMedication = new clsButton("Button_UpdateAddAdministeredMedication", $Method, $this);
            $this->Button_UpdateAddRecommendedFollowUpMedication = new clsButton("Button_UpdateAddRecommendedFollowUpMedication", $Method, $this);
            $this->LeftButtonHospDiag = new clsButton("LeftButtonHospDiag", $Method, $this);
            $this->RightButtonHospDiag = new clsButton("RightButtonHospDiag", $Method, $this);
            $this->hosppossibdiag = new clsControl(ccsListBox, "hosppossibdiag", "hosppossibdiag", ccsText, "", CCGetRequestParam("hosppossibdiag", $Method, NULL), $this);
            $this->hosppossibdiag->Multiple = true;
            $this->hosppossibdiag->DSType = dsTable;
            $this->hosppossibdiag->DataSource = new clsDBregistry_db();
            $this->hosppossibdiag->ds = & $this->hosppossibdiag->DataSource;
            $this->hosppossibdiag->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, \" - \", DiseaseName) AS codeName\n" .
"FROM icd10_all {SQL_Where} {SQL_OrderBy}";
            $this->hosppossibdiag->DataSource->Order = "ICD10ID";
            list($this->hosppossibdiag->BoundColumn, $this->hosppossibdiag->TextColumn, $this->hosppossibdiag->DBFormat) = array("ICD10ID", "codeName", "");
            $this->hosppossibdiag->DataSource->wp = new clsSQLParameters();
            $this->hosppossibdiag->DataSource->wp->Criterion[1] = "( ICD10_class = 'other' OR ICD10_class = 'O' )";
            $this->hosppossibdiag->DataSource->Where = 
                 $this->hosppossibdiag->DataSource->wp->Criterion[1];
            $this->hosppossibdiag->DataSource->Order = "ICD10ID";
            $this->hospselectdiag = new clsControl(ccsListBox, "hospselectdiag", "hospselectdiag", ccsText, "", CCGetRequestParam("hospselectdiag", $Method, NULL), $this);
            $this->hospselectdiag->Multiple = true;
            $this->hospselectdiag->DSType = dsTable;
            $this->hospselectdiag->DataSource = new clsDBregistry_db();
            $this->hospselectdiag->ds = & $this->hospselectdiag->DataSource;
            $this->hospselectdiag->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, \" - \", DiseaseName) AS DiseaseIDName, hospitalisationdischargediagnosis.* \n" .
"FROM hospitalisationdischargediagnosis INNER JOIN icd10_all ON\n" .
"hospitalisationdischargediagnosis.ICD10ID = icd10_all.ICD10ID {SQL_Where} {SQL_OrderBy}";
            list($this->hospselectdiag->BoundColumn, $this->hospselectdiag->TextColumn, $this->hospselectdiag->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->hospselectdiag->DataSource->Parameters["urlHospitalisationID"] = CCGetFromGet("HospitalisationID", NULL);
            $this->hospselectdiag->DataSource->wp = new clsSQLParameters();
            $this->hospselectdiag->DataSource->wp->AddParameter("1", "urlHospitalisationID", ccsInteger, "", "", $this->hospselectdiag->DataSource->Parameters["urlHospitalisationID"], 0, false);
            $this->hospselectdiag->DataSource->wp->Criterion[1] = $this->hospselectdiag->DataSource->wp->Operation(opEqual, "hospitalisationdischargediagnosis.HospitalisationID", $this->hospselectdiag->DataSource->wp->GetDBValue("1"), $this->hospselectdiag->DataSource->ToSQL($this->hospselectdiag->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->hospselectdiag->DataSource->Where = 
                 $this->hospselectdiag->DataSource->wp->Criterion[1];
            $this->LinkedDD_Hospitalisation = new clsControl(ccsHidden, "LinkedDD_Hospitalisation", "LinkedDD_Hospitalisation", ccsText, "", CCGetRequestParam("LinkedDD_Hospitalisation", $Method, NULL), $this);
            $this->RecomObstetricExaminationDate = new clsControl(ccsTextBox, "RecomObstetricExaminationDate", $CCSLocales->GetText("RecomObstetricExaminationDate"), ccsDate, array("ShortDate"), CCGetRequestParam("RecomObstetricExaminationDate", $Method, NULL), $this);
            $this->DatePicker_RecomObstetricExaminationDate = new clsDatePicker("DatePicker_RecomObstetricExaminationDate", "hospitalisation", "RecomObstetricExaminationDate", $this);
            $this->RecomRepeatedHospitalisation = new clsControl(ccsRadioButton, "RecomRepeatedHospitalisation", $CCSLocales->GetText("RecomRepeatedHospitalisation"), ccsInteger, "", CCGetRequestParam("RecomRepeatedHospitalisation", $Method, NULL), $this);
            $this->RecomRepeatedHospitalisation->DSType = dsListOfValues;
            $this->RecomRepeatedHospitalisation->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->RecomRepeatedHospitalisation->HTML = true;
            $this->RecomRepeatedHospitalisationDate = new clsControl(ccsTextBox, "RecomRepeatedHospitalisationDate", $CCSLocales->GetText("RecomRepeatedHospitalisationDate"), ccsDate, array("ShortDate"), CCGetRequestParam("RecomRepeatedHospitalisationDate", $Method, NULL), $this);
            $this->DatePicker_RecomRepeatedHospitalisationDate = new clsDatePicker("DatePicker_RecomRepeatedHospitalisationDate", "hospitalisation", "RecomRepeatedHospitalisationDate", $this);
            $this->Button_UpdateAddDelivery = new clsButton("Button_UpdateAddDelivery", $Method, $this);
            $this->Button_UpdateAddTest = new clsButton("Button_UpdateAddTest", $Method, $this);
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Reloaded = new clsControl(ccsHidden, "Reloaded", "Reloaded", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Reloaded", $Method, NULL), $this);
            $this->lastmodified = new clsControl(ccsLabel, "lastmodified", "lastmodified", ccsDate, array("GeneralDate"), CCGetRequestParam("lastmodified", $Method, NULL), $this);
            $this->user = new clsControl(ccsLabel, "user", "user", ccsText, "", CCGetRequestParam("user", $Method, NULL), $this);
            $this->CurrentUser = new clsControl(ccsTextBox, "CurrentUser", "CurrentUser", ccsText, "", CCGetRequestParam("CurrentUser", $Method, NULL), $this);
            $this->RightButtonReasonHospitalisation = new clsButton("RightButtonReasonHospitalisation", $Method, $this);
            $this->LeftButtonReasonHospitalisation = new clsButton("LeftButtonReasonHospitalisation", $Method, $this);
            $this->SelectedReasonHospitalisation = new clsControl(ccsListBox, "SelectedReasonHospitalisation", "SelectedReasonHospitalisation", ccsText, "", CCGetRequestParam("SelectedReasonHospitalisation", $Method, NULL), $this);
            $this->SelectedReasonHospitalisation->Multiple = true;
            $this->SelectedReasonHospitalisation->DSType = dsTable;
            $this->SelectedReasonHospitalisation->DataSource = new clsDBregistry_db();
            $this->SelectedReasonHospitalisation->ds = & $this->SelectedReasonHospitalisation->DataSource;
            $this->SelectedReasonHospitalisation->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, \" - \", DiseaseName) AS DiseaseIDName, reasonhospitalisation.* \n" .
"FROM reasonhospitalisation INNER JOIN icd10_all ON\n" .
"reasonhospitalisation.ICD10ID = icd10_all.ICD10ID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedReasonHospitalisation->BoundColumn, $this->SelectedReasonHospitalisation->TextColumn, $this->SelectedReasonHospitalisation->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->SelectedReasonHospitalisation->DataSource->Parameters["urlHospitalisationID"] = CCGetFromGet("HospitalisationID", NULL);
            $this->SelectedReasonHospitalisation->DataSource->wp = new clsSQLParameters();
            $this->SelectedReasonHospitalisation->DataSource->wp->AddParameter("1", "urlHospitalisationID", ccsInteger, "", "", $this->SelectedReasonHospitalisation->DataSource->Parameters["urlHospitalisationID"], 0, false);
            $this->SelectedReasonHospitalisation->DataSource->wp->Criterion[1] = $this->SelectedReasonHospitalisation->DataSource->wp->Operation(opEqual, "reasonhospitalisation.HospitalisationID", $this->SelectedReasonHospitalisation->DataSource->wp->GetDBValue("1"), $this->SelectedReasonHospitalisation->DataSource->ToSQL($this->SelectedReasonHospitalisation->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedReasonHospitalisation->DataSource->Where = 
                 $this->SelectedReasonHospitalisation->DataSource->wp->Criterion[1];
            $this->LinkedDD_ReasonHospitalisation = new clsControl(ccsHidden, "LinkedDD_ReasonHospitalisation", "LinkedDD_ReasonHospitalisation", ccsText, "", CCGetRequestParam("LinkedDD_ReasonHospitalisation", $Method, NULL), $this);
            $this->ReasonHospitalisation = new clsControl(ccsListBox, "ReasonHospitalisation", "ReasonHospitalisation", ccsText, "", CCGetRequestParam("ReasonHospitalisation", $Method, NULL), $this);
            $this->ReasonHospitalisation->Multiple = true;
            $this->ReasonHospitalisation->DSType = dsTable;
            $this->ReasonHospitalisation->DataSource = new clsDBregistry_db();
            $this->ReasonHospitalisation->ds = & $this->ReasonHospitalisation->DataSource;
            $this->ReasonHospitalisation->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, ' - ' ,DiseaseName) AS codeName\n" .
"FROM icd10_all {SQL_Where} {SQL_OrderBy}";
            $this->ReasonHospitalisation->DataSource->Order = "ICD10ID";
            list($this->ReasonHospitalisation->BoundColumn, $this->ReasonHospitalisation->TextColumn, $this->ReasonHospitalisation->DBFormat) = array("ICD10ID", "codeName", "");
            $this->ReasonHospitalisation->DataSource->wp = new clsSQLParameters();
            $this->ReasonHospitalisation->DataSource->wp->Criterion[1] = "( ICD10_class = 'other' OR ICD10_class = 'O' )";
            $this->ReasonHospitalisation->DataSource->Where = 
                 $this->ReasonHospitalisation->DataSource->wp->Criterion[1];
            $this->ReasonHospitalisation->DataSource->Order = "ICD10ID";
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
            $this->RecomDelivery3rdLevelDate = new clsControl(ccsTextBox, "RecomDelivery3rdLevelDate", $CCSLocales->GetText("RecomDelivery3rdLevelDate"), ccsDate, array("ShortDate"), CCGetRequestParam("RecomDelivery3rdLevelDate", $Method, NULL), $this);
            $this->DatePicker_RecomDelivery3rdLevelDate = new clsDatePicker("DatePicker_RecomDelivery3rdLevelDate", "hospitalisation", "RecomDelivery3rdLevelDate", $this);
            $this->Button_UpdateAddTests = new clsButton("Button_UpdateAddTests", $Method, $this);
            $this->pregnancyDateTemp = new clsControl(ccsHidden, "pregnancyDateTemp", "pregnancyDateTemp", ccsDate, array("ShortDate"), CCGetRequestParam("pregnancyDateTemp", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->AdmissionDate->Value) && !strlen($this->AdmissionDate->Value) && $this->AdmissionDate->Value !== false)
                    $this->AdmissionDate->SetValue(time());
                if(!is_array($this->RecomObstetricExamination->Value) && !strlen($this->RecomObstetricExamination->Value) && $this->RecomObstetricExamination->Value !== false)
                    $this->RecomObstetricExamination->SetText(1);
                if(!is_array($this->RecomDelivery3rdLevel->Value) && !strlen($this->RecomDelivery3rdLevel->Value) && $this->RecomDelivery3rdLevel->Value !== false)
                    $this->RecomDelivery3rdLevel->SetText(0);
                if(!is_array($this->RecomRepeatedHospitalisation->Value) && !strlen($this->RecomRepeatedHospitalisation->Value) && $this->RecomRepeatedHospitalisation->Value !== false)
                    $this->RecomRepeatedHospitalisation->SetText(0);
                if(!is_array($this->Reloaded->Value) && !strlen($this->Reloaded->Value) && $this->Reloaded->Value !== false)
                    $this->Reloaded->SetText(false);
                if(!is_array($this->IndicationID->Value) && !strlen($this->IndicationID->Value) && $this->IndicationID->Value !== false)
                    $this->IndicationID->SetText(1);
                if(!is_array($this->DeptID->Value) && !strlen($this->DeptID->Value) && $this->DeptID->Value !== false)
                    $this->DeptID->SetText(1);
            }
            if(!is_array($this->lastmodified->Value) && !strlen($this->lastmodified->Value) && $this->lastmodified->Value !== false)
                $this->lastmodified->SetValue(time());
        }
    }
//End Class_Initialize Event

//Initialize Method @3-BE1B0C93
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlHospitalisationID"] = CCGetFromGet("HospitalisationID", NULL);
    }
//End Initialize Method

//Validate Method @3-413C77DE
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(! (($this->AdmissionDate->GetValue() >= $this->pregnancyDateTemp->GetValue()))) {
            $this->AdmissionDate->Errors->addError($CCSLocales->GetText("VerDataDel"));
        }
        if(! ((($this->DischargeDate->GetValue() >= $this->AdmissionDate->GetValue()) || ($this->DischargeDate->GetValue() == NULL)))) {
            $this->DischargeDate->Errors->addError("неправильна дата");
        }
        if(! (($this->ReferralFacilityID->GetValue() != $this->FacilityID->GetValue()))) {
            $this->ReferralFacilityID->Errors->addError($CCSLocales->GetText("Referral1"));
        }
        $Validation = ($this->AdmissionDate->Validate() && $Validation);
        $Validation = ($this->FacilityID->Validate() && $Validation);
        $Validation = ($this->DepartmentID->Validate() && $Validation);
        $Validation = ($this->RecomObstetricExamination->Validate() && $Validation);
        $Validation = ($this->RecomDelivery3rdLevel->Validate() && $Validation);
        $Validation = ($this->DischargeDate->Validate() && $Validation);
        $Validation = ($this->PregnancyID->Validate() && $Validation);
        $Validation = ($this->hosppossibdiag->Validate() && $Validation);
        $Validation = ($this->hospselectdiag->Validate() && $Validation);
        $Validation = ($this->LinkedDD_Hospitalisation->Validate() && $Validation);
        $Validation = ($this->RecomObstetricExaminationDate->Validate() && $Validation);
        $Validation = ($this->RecomRepeatedHospitalisation->Validate() && $Validation);
        $Validation = ($this->RecomRepeatedHospitalisationDate->Validate() && $Validation);
        $Validation = ($this->Reloaded->Validate() && $Validation);
        $Validation = ($this->CurrentUser->Validate() && $Validation);
        $Validation = ($this->SelectedReasonHospitalisation->Validate() && $Validation);
        $Validation = ($this->LinkedDD_ReasonHospitalisation->Validate() && $Validation);
        $Validation = ($this->ReasonHospitalisation->Validate() && $Validation);
        $Validation = ($this->IndicationID->Validate() && $Validation);
        $Validation = ($this->ReferralFacilityID->Validate() && $Validation);
        $Validation = ($this->DeptID->Validate() && $Validation);
        $Validation = ($this->RecomDelivery3rdLevelDate->Validate() && $Validation);
        $Validation = ($this->pregnancyDateTemp->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->AdmissionDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DepartmentID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RecomObstetricExamination->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RecomDelivery3rdLevel->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DischargeDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PregnancyID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hosppossibdiag->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hospselectdiag->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedDD_Hospitalisation->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RecomObstetricExaminationDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RecomRepeatedHospitalisation->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RecomRepeatedHospitalisationDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Reloaded->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CurrentUser->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedReasonHospitalisation->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedDD_ReasonHospitalisation->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ReasonHospitalisation->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IndicationID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ReferralFacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeptID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RecomDelivery3rdLevelDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->pregnancyDateTemp->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-E447484C
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->AdmissionDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_AdmissionDate->Errors->Count());
        $errors = ($errors || $this->FacilityID->Errors->Count());
        $errors = ($errors || $this->DepartmentID->Errors->Count());
        $errors = ($errors || $this->RecomObstetricExamination->Errors->Count());
        $errors = ($errors || $this->RecomDelivery3rdLevel->Errors->Count());
        $errors = ($errors || $this->DischargeDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_DischargeDate->Errors->Count());
        $errors = ($errors || $this->PregnancyID->Errors->Count());
        $errors = ($errors || $this->hosppossibdiag->Errors->Count());
        $errors = ($errors || $this->hospselectdiag->Errors->Count());
        $errors = ($errors || $this->LinkedDD_Hospitalisation->Errors->Count());
        $errors = ($errors || $this->RecomObstetricExaminationDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_RecomObstetricExaminationDate->Errors->Count());
        $errors = ($errors || $this->RecomRepeatedHospitalisation->Errors->Count());
        $errors = ($errors || $this->RecomRepeatedHospitalisationDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_RecomRepeatedHospitalisationDate->Errors->Count());
        $errors = ($errors || $this->Reloaded->Errors->Count());
        $errors = ($errors || $this->lastmodified->Errors->Count());
        $errors = ($errors || $this->user->Errors->Count());
        $errors = ($errors || $this->CurrentUser->Errors->Count());
        $errors = ($errors || $this->SelectedReasonHospitalisation->Errors->Count());
        $errors = ($errors || $this->LinkedDD_ReasonHospitalisation->Errors->Count());
        $errors = ($errors || $this->ReasonHospitalisation->Errors->Count());
        $errors = ($errors || $this->IndicationID->Errors->Count());
        $errors = ($errors || $this->ReferralFacilityID->Errors->Count());
        $errors = ($errors || $this->DeptID->Errors->Count());
        $errors = ($errors || $this->RecomDelivery3rdLevelDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_RecomDelivery3rdLevelDate->Errors->Count());
        $errors = ($errors || $this->pregnancyDateTemp->Errors->Count());
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

//Operation Method @3-F4BAF2AE
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
            } else if($this->Button_UpdateAddAdministeredMedication->Pressed) {
                $this->PressedButton = "Button_UpdateAddAdministeredMedication";
            } else if($this->Button_UpdateAddRecommendedFollowUpMedication->Pressed) {
                $this->PressedButton = "Button_UpdateAddRecommendedFollowUpMedication";
            } else if($this->LeftButtonHospDiag->Pressed) {
                $this->PressedButton = "LeftButtonHospDiag";
            } else if($this->RightButtonHospDiag->Pressed) {
                $this->PressedButton = "RightButtonHospDiag";
            } else if($this->Button_UpdateAddDelivery->Pressed) {
                $this->PressedButton = "Button_UpdateAddDelivery";
            } else if($this->Button_UpdateAddTest->Pressed) {
                $this->PressedButton = "Button_UpdateAddTest";
            } else if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->RightButtonReasonHospitalisation->Pressed) {
                $this->PressedButton = "RightButtonReasonHospitalisation";
            } else if($this->LeftButtonReasonHospitalisation->Pressed) {
                $this->PressedButton = "LeftButtonReasonHospitalisation";
            } else if($this->Button_UpdateAddTests->Pressed) {
                $this->PressedButton = "Button_UpdateAddTests";
            }
        }
        $Redirect = "pregnancy_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "HospitalisationID"));
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButtonReasonHospitalisation") {
            if(!CCGetEvent($this->RightButtonReasonHospitalisation->CCSEvents, "OnClick", $this->RightButtonReasonHospitalisation)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButtonReasonHospitalisation") {
            if(!CCGetEvent($this->LeftButtonReasonHospitalisation->CCSEvents, "OnClick", $this->LeftButtonReasonHospitalisation)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_UpdateAddAdministeredMedication" && $this->UpdateAllowed) {
                if(!CCGetEvent($this->Button_UpdateAddAdministeredMedication->CCSEvents, "OnClick", $this->Button_UpdateAddAdministeredMedication) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddRecommendedFollowUpMedication" && $this->UpdateAllowed) {
                if(!CCGetEvent($this->Button_UpdateAddRecommendedFollowUpMedication->CCSEvents, "OnClick", $this->Button_UpdateAddRecommendedFollowUpMedication) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "LeftButtonHospDiag") {
                if(!CCGetEvent($this->LeftButtonHospDiag->CCSEvents, "OnClick", $this->LeftButtonHospDiag)) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "RightButtonHospDiag") {
                if(!CCGetEvent($this->RightButtonHospDiag->CCSEvents, "OnClick", $this->RightButtonHospDiag)) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddDelivery" && $this->UpdateAllowed) {
                $Redirect = "delivery_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "HospitalisationID"));
                if(!CCGetEvent($this->Button_UpdateAddDelivery->CCSEvents, "OnClick", $this->Button_UpdateAddDelivery) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddTest" && $this->UpdateAllowed) {
                if(!CCGetEvent($this->Button_UpdateAddTest->CCSEvents, "OnClick", $this->Button_UpdateAddTest) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Insert" && $this->InsertAllowed) {
                $Redirect = "pregnancy_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "HospitalisationID"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update" && $this->UpdateAllowed) {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddTests" && $this->UpdateAllowed) {
                $Redirect = "testhosplist_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "HospitalisationID"));
                if(!CCGetEvent($this->Button_UpdateAddTests->CCSEvents, "OnClick", $this->Button_UpdateAddTests) || !$this->UpdateRow()) {
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

//InsertRow Method @3-B14133F1
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->AdmissionDate->SetValue($this->AdmissionDate->GetValue(true));
        $this->DataSource->FacilityID->SetValue($this->FacilityID->GetValue(true));
        $this->DataSource->DepartmentID->SetValue($this->DepartmentID->GetValue(true));
        $this->DataSource->RecomObstetricExamination->SetValue($this->RecomObstetricExamination->GetValue(true));
        $this->DataSource->RecomObstetricExaminationDate->SetValue($this->RecomObstetricExaminationDate->GetValue(true));
        $this->DataSource->RecomRepeatedHospitalisation->SetValue($this->RecomRepeatedHospitalisation->GetValue(true));
        $this->DataSource->RecomRepeatedHospitalisationDate->SetValue($this->RecomRepeatedHospitalisationDate->GetValue(true));
        $this->DataSource->RecomDelivery3rdLevel->SetValue($this->RecomDelivery3rdLevel->GetValue(true));
        $this->DataSource->RecomDelivery3rdLevelDate->SetValue($this->RecomDelivery3rdLevelDate->GetValue(true));
        $this->DataSource->DischargeDate->SetValue($this->DischargeDate->GetValue(true));
        $this->DataSource->PregnancyID->SetValue($this->PregnancyID->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-57349035
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->AdmissionDate->SetValue($this->AdmissionDate->GetValue(true));
        $this->DataSource->FacilityID->SetValue($this->FacilityID->GetValue(true));
        $this->DataSource->DepartmentID->SetValue($this->DepartmentID->GetValue(true));
        $this->DataSource->RecomObstetricExamination->SetValue($this->RecomObstetricExamination->GetValue(true));
        $this->DataSource->RecomObstetricExaminationDate->SetValue($this->RecomObstetricExaminationDate->GetValue(true));
        $this->DataSource->RecomRepeatedHospitalisation->SetValue($this->RecomRepeatedHospitalisation->GetValue(true));
        $this->DataSource->RecomRepeatedHospitalisationDate->SetValue($this->RecomRepeatedHospitalisationDate->GetValue(true));
        $this->DataSource->RecomDelivery3rdLevel->SetValue($this->RecomDelivery3rdLevel->GetValue(true));
        $this->DataSource->DischargeDate->SetValue($this->DischargeDate->GetValue(true));
        $this->DataSource->PregnancyID->SetValue($this->PregnancyID->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->RecomDelivery3rdLevelDate->SetValue($this->RecomDelivery3rdLevelDate->GetValue(true));
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

//Show Method @3-BC2F5F53
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
        $this->DepartmentID->Prepare();
        $this->RecomObstetricExamination->Prepare();
        $this->RecomDelivery3rdLevel->Prepare();
        $this->hosppossibdiag->Prepare();
        $this->hospselectdiag->Prepare();
        $this->RecomRepeatedHospitalisation->Prepare();
        $this->SelectedReasonHospitalisation->Prepare();
        $this->ReasonHospitalisation->Prepare();
        $this->IndicationID->Prepare();
        $this->ReferralFacilityID->Prepare();
        $this->DeptID->Prepare();

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
                    $this->AdmissionDate->SetValue($this->DataSource->AdmissionDate->GetValue());
                    $this->FacilityID->SetValue($this->DataSource->FacilityID->GetValue());
                    $this->DepartmentID->SetValue($this->DataSource->DepartmentID->GetValue());
                    $this->RecomObstetricExamination->SetValue($this->DataSource->RecomObstetricExamination->GetValue());
                    $this->RecomDelivery3rdLevel->SetValue($this->DataSource->RecomDelivery3rdLevel->GetValue());
                    $this->DischargeDate->SetValue($this->DataSource->DischargeDate->GetValue());
                    $this->PregnancyID->SetValue($this->DataSource->PregnancyID->GetValue());
                    $this->RecomObstetricExaminationDate->SetValue($this->DataSource->RecomObstetricExaminationDate->GetValue());
                    $this->RecomRepeatedHospitalisation->SetValue($this->DataSource->RecomRepeatedHospitalisation->GetValue());
                    $this->RecomRepeatedHospitalisationDate->SetValue($this->DataSource->RecomRepeatedHospitalisationDate->GetValue());
                    $this->CurrentUser->SetValue($this->DataSource->CurrentUser->GetValue());
                    $this->RecomDelivery3rdLevelDate->SetValue($this->DataSource->RecomDelivery3rdLevelDate->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->AdmissionDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_AdmissionDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DepartmentID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RecomObstetricExamination->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RecomDelivery3rdLevel->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DischargeDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DischargeDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PregnancyID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hosppossibdiag->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hospselectdiag->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedDD_Hospitalisation->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RecomObstetricExaminationDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_RecomObstetricExaminationDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RecomRepeatedHospitalisation->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RecomRepeatedHospitalisationDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_RecomRepeatedHospitalisationDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Reloaded->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lastmodified->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CurrentUser->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedReasonHospitalisation->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedDD_ReasonHospitalisation->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ReasonHospitalisation->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IndicationID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ReferralFacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeptID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RecomDelivery3rdLevelDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_RecomDelivery3rdLevelDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->pregnancyDateTemp->Errors->ToString());
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
        $this->Button_UpdateAddAdministeredMedication->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_UpdateAddRecommendedFollowUpMedication->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_UpdateAddDelivery->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_UpdateAddTest->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_UpdateAddTests->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->AdmissionDate->Show();
        $this->DatePicker_AdmissionDate->Show();
        $this->FacilityID->Show();
        $this->DepartmentID->Show();
        $this->RecomObstetricExamination->Show();
        $this->RecomDelivery3rdLevel->Show();
        $this->DischargeDate->Show();
        $this->DatePicker_DischargeDate->Show();
        $this->PregnancyID->Show();
        $this->Button_UpdateAddAdministeredMedication->Show();
        $this->Button_UpdateAddRecommendedFollowUpMedication->Show();
        $this->LeftButtonHospDiag->Show();
        $this->RightButtonHospDiag->Show();
        $this->hosppossibdiag->Show();
        $this->hospselectdiag->Show();
        $this->LinkedDD_Hospitalisation->Show();
        $this->RecomObstetricExaminationDate->Show();
        $this->DatePicker_RecomObstetricExaminationDate->Show();
        $this->RecomRepeatedHospitalisation->Show();
        $this->RecomRepeatedHospitalisationDate->Show();
        $this->DatePicker_RecomRepeatedHospitalisationDate->Show();
        $this->Button_UpdateAddDelivery->Show();
        $this->Button_UpdateAddTest->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Reloaded->Show();
        $this->lastmodified->Show();
        $this->user->Show();
        $this->CurrentUser->Show();
        $this->RightButtonReasonHospitalisation->Show();
        $this->LeftButtonReasonHospitalisation->Show();
        $this->SelectedReasonHospitalisation->Show();
        $this->LinkedDD_ReasonHospitalisation->Show();
        $this->ReasonHospitalisation->Show();
        $this->IndicationID->Show();
        $this->ReferralFacilityID->Show();
        $this->DeptID->Show();
        $this->RecomDelivery3rdLevelDate->Show();
        $this->DatePicker_RecomDelivery3rdLevelDate->Show();
        $this->Button_UpdateAddTests->Show();
        $this->pregnancyDateTemp->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End hospitalisation Class @3-FCB6E20C

class clshospitalisationDataSource extends clsDBregistry_db {  //hospitalisationDataSource Class @3-C38B4938

//DataSource Variables @3-F4EE8DB0
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
    public $AdmissionDate;
    public $FacilityID;
    public $DepartmentID;
    public $RecomObstetricExamination;
    public $RecomDelivery3rdLevel;
    public $DischargeDate;
    public $PregnancyID;
    public $hosppossibdiag;
    public $hospselectdiag;
    public $LinkedDD_Hospitalisation;
    public $RecomObstetricExaminationDate;
    public $RecomRepeatedHospitalisation;
    public $RecomRepeatedHospitalisationDate;
    public $Reloaded;
    public $lastmodified;
    public $user;
    public $CurrentUser;
    public $SelectedReasonHospitalisation;
    public $LinkedDD_ReasonHospitalisation;
    public $ReasonHospitalisation;
    public $IndicationID;
    public $ReferralFacilityID;
    public $DeptID;
    public $RecomDelivery3rdLevelDate;
    public $pregnancyDateTemp;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-DFECD9C0
    function clshospitalisationDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record hospitalisation/Error";
        $this->Initialize();
        $this->AdmissionDate = new clsField("AdmissionDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->FacilityID = new clsField("FacilityID", ccsInteger, "");
        
        $this->DepartmentID = new clsField("DepartmentID", ccsInteger, "");
        
        $this->RecomObstetricExamination = new clsField("RecomObstetricExamination", ccsInteger, "");
        
        $this->RecomDelivery3rdLevel = new clsField("RecomDelivery3rdLevel", ccsInteger, "");
        
        $this->DischargeDate = new clsField("DischargeDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->PregnancyID = new clsField("PregnancyID", ccsText, "");
        
        $this->hosppossibdiag = new clsField("hosppossibdiag", ccsText, "");
        
        $this->hospselectdiag = new clsField("hospselectdiag", ccsText, "");
        
        $this->LinkedDD_Hospitalisation = new clsField("LinkedDD_Hospitalisation", ccsText, "");
        
        $this->RecomObstetricExaminationDate = new clsField("RecomObstetricExaminationDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->RecomRepeatedHospitalisation = new clsField("RecomRepeatedHospitalisation", ccsInteger, "");
        
        $this->RecomRepeatedHospitalisationDate = new clsField("RecomRepeatedHospitalisationDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Reloaded = new clsField("Reloaded", ccsBoolean, $this->BooleanFormat);
        
        $this->lastmodified = new clsField("lastmodified", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->user = new clsField("user", ccsText, "");
        
        $this->CurrentUser = new clsField("CurrentUser", ccsText, "");
        
        $this->SelectedReasonHospitalisation = new clsField("SelectedReasonHospitalisation", ccsText, "");
        
        $this->LinkedDD_ReasonHospitalisation = new clsField("LinkedDD_ReasonHospitalisation", ccsText, "");
        
        $this->ReasonHospitalisation = new clsField("ReasonHospitalisation", ccsText, "");
        
        $this->IndicationID = new clsField("IndicationID", ccsInteger, "");
        
        $this->ReferralFacilityID = new clsField("ReferralFacilityID", ccsInteger, "");
        
        $this->DeptID = new clsField("DeptID", ccsInteger, "");
        
        $this->RecomDelivery3rdLevelDate = new clsField("RecomDelivery3rdLevelDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->pregnancyDateTemp = new clsField("pregnancyDateTemp", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        

        $this->InsertFields["AdmissionDate"] = array("Name" => "AdmissionDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DepartmentID"] = array("Name" => "DepartmentID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["RecomObstetricExamination"] = array("Name" => "RecomObstetricExamination", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["RecomObstetricExaminationDate"] = array("Name" => "RecomObstetricExaminationDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["RecomRepeatedHospitalisation"] = array("Name" => "RecomRepeatedHospitalisation", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["RecomRepeatedHospitalisationDate"] = array("Name" => "RecomRepeatedHospitalisationDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["RecomDelivery3rdLevel"] = array("Name" => "RecomDelivery3rdLevel", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["RecomDelivery3rdLevelDate"] = array("Name" => "RecomDelivery3rdLevelDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DischargeDate"] = array("Name" => "DischargeDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["PregnancyID"] = array("Name" => "PregnancyID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AdmissionDate"] = array("Name" => "AdmissionDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DepartmentID"] = array("Name" => "DepartmentID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["RecomObstetricExamination"] = array("Name" => "RecomObstetricExamination", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["RecomObstetricExaminationDate"] = array("Name" => "RecomObstetricExaminationDate", "Value" => "", "DataType" => ccsDate);
        $this->UpdateFields["RecomRepeatedHospitalisation"] = array("Name" => "RecomRepeatedHospitalisation", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["RecomRepeatedHospitalisationDate"] = array("Name" => "RecomRepeatedHospitalisationDate", "Value" => "", "DataType" => ccsDate);
        $this->UpdateFields["RecomDelivery3rdLevel"] = array("Name" => "RecomDelivery3rdLevel", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DischargeDate"] = array("Name" => "DischargeDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PregnancyID"] = array("Name" => "PregnancyID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["RecomDelivery3rdLevelDate"] = array("Name" => "RecomDelivery3rdLevelDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-664F75AD
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlHospitalisationID", ccsInteger, "", "", $this->Parameters["urlHospitalisationID"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @3-7C96D014
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT hospitalisation.*,  PatientID \n" .
        "FROM (pregnancy INNER JOIN hospitalisation ON\n" .
        "hospitalisation.PregnancyID = pregnancy.PregnancyID) \n" .
        "WHERE hospitalisation.HospitalisationID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " \n" .
        "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-575B6FA5
    function SetValues()
    {
        $this->AdmissionDate->SetDBValue(trim($this->f("AdmissionDate")));
        $this->FacilityID->SetDBValue(trim($this->f("FacilityID")));
        $this->DepartmentID->SetDBValue(trim($this->f("DepartmentID")));
        $this->RecomObstetricExamination->SetDBValue(trim($this->f("RecomObstetricExamination")));
        $this->RecomDelivery3rdLevel->SetDBValue(trim($this->f("RecomDelivery3rdLevel")));
        $this->DischargeDate->SetDBValue(trim($this->f("DischargeDate")));
        $this->PregnancyID->SetDBValue($this->f("PregnancyID"));
        $this->RecomObstetricExaminationDate->SetDBValue(trim($this->f("RecomObstetricExaminationDate")));
        $this->RecomRepeatedHospitalisation->SetDBValue(trim($this->f("RecomRepeatedHospitalisation")));
        $this->RecomRepeatedHospitalisationDate->SetDBValue(trim($this->f("RecomRepeatedHospitalisationDate")));
        $this->lastmodified->SetDBValue(trim($this->f("created")));
        $this->user->SetDBValue($this->f("by_user"));
        $this->CurrentUser->SetDBValue($this->f("by_user"));
        $this->RecomDelivery3rdLevelDate->SetDBValue(trim($this->f("RecomDelivery3rdLevelDate")));
    }
//End SetValues Method

//Insert Method @3-59A8C6AB
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["AdmissionDate"] = new clsSQLParameter("ctrlAdmissionDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->AdmissionDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacilityID", ccsInteger, "", "", $this->FacilityID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DepartmentID"] = new clsSQLParameter("ctrlDepartmentID", ccsInteger, "", "", $this->DepartmentID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomObstetricExamination"] = new clsSQLParameter("ctrlRecomObstetricExamination", ccsInteger, "", "", $this->RecomObstetricExamination->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomObstetricExaminationDate"] = new clsSQLParameter("ctrlRecomObstetricExaminationDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->RecomObstetricExaminationDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomRepeatedHospitalisation"] = new clsSQLParameter("ctrlRecomRepeatedHospitalisation", ccsInteger, "", "", $this->RecomRepeatedHospitalisation->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomRepeatedHospitalisationDate"] = new clsSQLParameter("ctrlRecomRepeatedHospitalisationDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->RecomRepeatedHospitalisationDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomDelivery3rdLevel"] = new clsSQLParameter("ctrlRecomDelivery3rdLevel", ccsInteger, "", "", $this->RecomDelivery3rdLevel->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomDelivery3rdLevelDate"] = new clsSQLParameter("ctrlRecomDelivery3rdLevelDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->RecomDelivery3rdLevelDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeDate"] = new clsSQLParameter("ctrlDischargeDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DischargeDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyID"] = new clsSQLParameter("ctrlPregnancyID", ccsText, "", "", $this->PregnancyID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["AdmissionDate"]->GetValue()) and !strlen($this->cp["AdmissionDate"]->GetText()) and !is_bool($this->cp["AdmissionDate"]->GetValue())) 
            $this->cp["AdmissionDate"]->SetValue($this->AdmissionDate->GetValue(true));
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->FacilityID->GetValue(true));
        if (!is_null($this->cp["DepartmentID"]->GetValue()) and !strlen($this->cp["DepartmentID"]->GetText()) and !is_bool($this->cp["DepartmentID"]->GetValue())) 
            $this->cp["DepartmentID"]->SetValue($this->DepartmentID->GetValue(true));
        if (!is_null($this->cp["RecomObstetricExamination"]->GetValue()) and !strlen($this->cp["RecomObstetricExamination"]->GetText()) and !is_bool($this->cp["RecomObstetricExamination"]->GetValue())) 
            $this->cp["RecomObstetricExamination"]->SetValue($this->RecomObstetricExamination->GetValue(true));
        if (!is_null($this->cp["RecomObstetricExaminationDate"]->GetValue()) and !strlen($this->cp["RecomObstetricExaminationDate"]->GetText()) and !is_bool($this->cp["RecomObstetricExaminationDate"]->GetValue())) 
            $this->cp["RecomObstetricExaminationDate"]->SetValue($this->RecomObstetricExaminationDate->GetValue(true));
        if (!is_null($this->cp["RecomRepeatedHospitalisation"]->GetValue()) and !strlen($this->cp["RecomRepeatedHospitalisation"]->GetText()) and !is_bool($this->cp["RecomRepeatedHospitalisation"]->GetValue())) 
            $this->cp["RecomRepeatedHospitalisation"]->SetValue($this->RecomRepeatedHospitalisation->GetValue(true));
        if (!is_null($this->cp["RecomRepeatedHospitalisationDate"]->GetValue()) and !strlen($this->cp["RecomRepeatedHospitalisationDate"]->GetText()) and !is_bool($this->cp["RecomRepeatedHospitalisationDate"]->GetValue())) 
            $this->cp["RecomRepeatedHospitalisationDate"]->SetValue($this->RecomRepeatedHospitalisationDate->GetValue(true));
        if (!is_null($this->cp["RecomDelivery3rdLevel"]->GetValue()) and !strlen($this->cp["RecomDelivery3rdLevel"]->GetText()) and !is_bool($this->cp["RecomDelivery3rdLevel"]->GetValue())) 
            $this->cp["RecomDelivery3rdLevel"]->SetValue($this->RecomDelivery3rdLevel->GetValue(true));
        if (!is_null($this->cp["RecomDelivery3rdLevelDate"]->GetValue()) and !strlen($this->cp["RecomDelivery3rdLevelDate"]->GetText()) and !is_bool($this->cp["RecomDelivery3rdLevelDate"]->GetValue())) 
            $this->cp["RecomDelivery3rdLevelDate"]->SetValue($this->RecomDelivery3rdLevelDate->GetValue(true));
        if (!is_null($this->cp["DischargeDate"]->GetValue()) and !strlen($this->cp["DischargeDate"]->GetText()) and !is_bool($this->cp["DischargeDate"]->GetValue())) 
            $this->cp["DischargeDate"]->SetValue($this->DischargeDate->GetValue(true));
        if (!is_null($this->cp["PregnancyID"]->GetValue()) and !strlen($this->cp["PregnancyID"]->GetText()) and !is_bool($this->cp["PregnancyID"]->GetValue())) 
            $this->cp["PregnancyID"]->SetValue($this->PregnancyID->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        $this->InsertFields["AdmissionDate"]["Value"] = $this->cp["AdmissionDate"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->InsertFields["DepartmentID"]["Value"] = $this->cp["DepartmentID"]->GetDBValue(true);
        $this->InsertFields["RecomObstetricExamination"]["Value"] = $this->cp["RecomObstetricExamination"]->GetDBValue(true);
        $this->InsertFields["RecomObstetricExaminationDate"]["Value"] = $this->cp["RecomObstetricExaminationDate"]->GetDBValue(true);
        $this->InsertFields["RecomRepeatedHospitalisation"]["Value"] = $this->cp["RecomRepeatedHospitalisation"]->GetDBValue(true);
        $this->InsertFields["RecomRepeatedHospitalisationDate"]["Value"] = $this->cp["RecomRepeatedHospitalisationDate"]->GetDBValue(true);
        $this->InsertFields["RecomDelivery3rdLevel"]["Value"] = $this->cp["RecomDelivery3rdLevel"]->GetDBValue(true);
        $this->InsertFields["RecomDelivery3rdLevelDate"]["Value"] = $this->cp["RecomDelivery3rdLevelDate"]->GetDBValue(true);
        $this->InsertFields["DischargeDate"]["Value"] = $this->cp["DischargeDate"]->GetDBValue(true);
        $this->InsertFields["PregnancyID"]["Value"] = $this->cp["PregnancyID"]->GetDBValue(true);
        $this->InsertFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("hospitalisation", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-33DB7DAA
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["AdmissionDate"] = new clsSQLParameter("ctrlAdmissionDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->AdmissionDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacilityID", ccsInteger, "", "", $this->FacilityID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DepartmentID"] = new clsSQLParameter("ctrlDepartmentID", ccsInteger, "", "", $this->DepartmentID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomObstetricExamination"] = new clsSQLParameter("ctrlRecomObstetricExamination", ccsInteger, "", "", $this->RecomObstetricExamination->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomObstetricExaminationDate"] = new clsSQLParameter("ctrlRecomObstetricExaminationDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->RecomObstetricExaminationDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomRepeatedHospitalisation"] = new clsSQLParameter("ctrlRecomRepeatedHospitalisation", ccsInteger, "", "", $this->RecomRepeatedHospitalisation->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomRepeatedHospitalisationDate"] = new clsSQLParameter("ctrlRecomRepeatedHospitalisationDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->RecomRepeatedHospitalisationDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomDelivery3rdLevel"] = new clsSQLParameter("ctrlRecomDelivery3rdLevel", ccsInteger, "", "", $this->RecomDelivery3rdLevel->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DischargeDate"] = new clsSQLParameter("ctrlDischargeDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DischargeDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyID"] = new clsSQLParameter("ctrlPregnancyID", ccsText, "", "", $this->PregnancyID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecomDelivery3rdLevelDate"] = new clsSQLParameter("ctrlRecomDelivery3rdLevelDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->RecomDelivery3rdLevelDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlHospitalisationID", ccsInteger, "", "", CCGetFromGet("HospitalisationID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["AdmissionDate"]->GetValue()) and !strlen($this->cp["AdmissionDate"]->GetText()) and !is_bool($this->cp["AdmissionDate"]->GetValue())) 
            $this->cp["AdmissionDate"]->SetValue($this->AdmissionDate->GetValue(true));
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->FacilityID->GetValue(true));
        if (!is_null($this->cp["DepartmentID"]->GetValue()) and !strlen($this->cp["DepartmentID"]->GetText()) and !is_bool($this->cp["DepartmentID"]->GetValue())) 
            $this->cp["DepartmentID"]->SetValue($this->DepartmentID->GetValue(true));
        if (!is_null($this->cp["RecomObstetricExamination"]->GetValue()) and !strlen($this->cp["RecomObstetricExamination"]->GetText()) and !is_bool($this->cp["RecomObstetricExamination"]->GetValue())) 
            $this->cp["RecomObstetricExamination"]->SetValue($this->RecomObstetricExamination->GetValue(true));
        if (!is_null($this->cp["RecomObstetricExaminationDate"]->GetValue()) and !strlen($this->cp["RecomObstetricExaminationDate"]->GetText()) and !is_bool($this->cp["RecomObstetricExaminationDate"]->GetValue())) 
            $this->cp["RecomObstetricExaminationDate"]->SetValue($this->RecomObstetricExaminationDate->GetValue(true));
        if (!strlen($this->cp["RecomObstetricExaminationDate"]->GetText()) and !is_bool($this->cp["RecomObstetricExaminationDate"]->GetValue(true))) 
            $this->cp["RecomObstetricExaminationDate"]->SetText(NULL);
        if (!is_null($this->cp["RecomRepeatedHospitalisation"]->GetValue()) and !strlen($this->cp["RecomRepeatedHospitalisation"]->GetText()) and !is_bool($this->cp["RecomRepeatedHospitalisation"]->GetValue())) 
            $this->cp["RecomRepeatedHospitalisation"]->SetValue($this->RecomRepeatedHospitalisation->GetValue(true));
        if (!is_null($this->cp["RecomRepeatedHospitalisationDate"]->GetValue()) and !strlen($this->cp["RecomRepeatedHospitalisationDate"]->GetText()) and !is_bool($this->cp["RecomRepeatedHospitalisationDate"]->GetValue())) 
            $this->cp["RecomRepeatedHospitalisationDate"]->SetValue($this->RecomRepeatedHospitalisationDate->GetValue(true));
        if (!strlen($this->cp["RecomRepeatedHospitalisationDate"]->GetText()) and !is_bool($this->cp["RecomRepeatedHospitalisationDate"]->GetValue(true))) 
            $this->cp["RecomRepeatedHospitalisationDate"]->SetText(NULL);
        if (!is_null($this->cp["RecomDelivery3rdLevel"]->GetValue()) and !strlen($this->cp["RecomDelivery3rdLevel"]->GetText()) and !is_bool($this->cp["RecomDelivery3rdLevel"]->GetValue())) 
            $this->cp["RecomDelivery3rdLevel"]->SetValue($this->RecomDelivery3rdLevel->GetValue(true));
        if (!is_null($this->cp["DischargeDate"]->GetValue()) and !strlen($this->cp["DischargeDate"]->GetText()) and !is_bool($this->cp["DischargeDate"]->GetValue())) 
            $this->cp["DischargeDate"]->SetValue($this->DischargeDate->GetValue(true));
        if (!is_null($this->cp["PregnancyID"]->GetValue()) and !strlen($this->cp["PregnancyID"]->GetText()) and !is_bool($this->cp["PregnancyID"]->GetValue())) 
            $this->cp["PregnancyID"]->SetValue($this->PregnancyID->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["RecomDelivery3rdLevelDate"]->GetValue()) and !strlen($this->cp["RecomDelivery3rdLevelDate"]->GetText()) and !is_bool($this->cp["RecomDelivery3rdLevelDate"]->GetValue())) 
            $this->cp["RecomDelivery3rdLevelDate"]->SetValue($this->RecomDelivery3rdLevelDate->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "hospitalisation.HospitalisationID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["AdmissionDate"]["Value"] = $this->cp["AdmissionDate"]->GetDBValue(true);
        $this->UpdateFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->UpdateFields["DepartmentID"]["Value"] = $this->cp["DepartmentID"]->GetDBValue(true);
        $this->UpdateFields["RecomObstetricExamination"]["Value"] = $this->cp["RecomObstetricExamination"]->GetDBValue(true);
        $this->UpdateFields["RecomObstetricExaminationDate"]["Value"] = $this->cp["RecomObstetricExaminationDate"]->GetDBValue(true);
        $this->UpdateFields["RecomRepeatedHospitalisation"]["Value"] = $this->cp["RecomRepeatedHospitalisation"]->GetDBValue(true);
        $this->UpdateFields["RecomRepeatedHospitalisationDate"]["Value"] = $this->cp["RecomRepeatedHospitalisationDate"]->GetDBValue(true);
        $this->UpdateFields["RecomDelivery3rdLevel"]["Value"] = $this->cp["RecomDelivery3rdLevel"]->GetDBValue(true);
        $this->UpdateFields["DischargeDate"]["Value"] = $this->cp["DischargeDate"]->GetDBValue(true);
        $this->UpdateFields["PregnancyID"]["Value"] = $this->cp["PregnancyID"]->GetDBValue(true);
        $this->UpdateFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->UpdateFields["RecomDelivery3rdLevelDate"]["Value"] = $this->cp["RecomDelivery3rdLevelDate"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("hospitalisation", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @3-5DE0A9BD
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlHospitalisationID", ccsInteger, "", "", CCGetFromGet("HospitalisationID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "hospitalisation.HospitalisationID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM hospitalisation";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End hospitalisationDataSource Class @3-FCB6E20C

class clsRecordpregnancy_header1 { //pregnancy_header1 Class @307-18A06872

//Variables @307-9E315808

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

//Class_Initialize Event @307-60A6F8D5
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

//Initialize Method @307-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @307-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @307-651F84E8
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

//MasterDetail @307-ED598703
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

//Operation Method @307-17DC9883
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

//Show Method @307-6CAF9031
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

} //End pregnancy_header1 Class @307-FCB6E20C

class clspregnancy_header1DataSource extends clsDBregistry_db {  //pregnancy_header1DataSource Class @307-FA18A47E

//DataSource Variables @307-E31437D1
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

//DataSourceClass_Initialize Event @307-A243E463
    function clspregnancy_header1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record pregnancy_header1/Error";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @307-190B3DAA
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

//Open Method @307-64C2DC81
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

//SetValues Method @307-0855F252
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_header1DataSource Class @307-FCB6E20C

//Initialize Page @1-E1712712
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
$TemplateFileName = "hospitalisation_maint.html";
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

//Include events file @1-44A98A72
include_once("./hospitalisation_maint_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-79323667
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$pregnancy_header = new clsRecordpregnancy_header("", $MainPage);
$test_testcode = new clsGridtest_testcode("", $MainPage);
$medicationhospitalisation = new clsGridmedicationhospitalisation("", $MainPage);
$recommendedmedicationhospitalisation = new clsGridrecommendedmedicationhospitalisation("", $MainPage);
$Delivery = new clsGridDelivery("", $MainPage);
$hospitalisation = new clsRecordhospitalisation("", $MainPage);
$pregnancy_header1 = new clsRecordpregnancy_header1("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->pregnancy_header = & $pregnancy_header;
$MainPage->test_testcode = & $test_testcode;
$MainPage->medicationhospitalisation = & $medicationhospitalisation;
$MainPage->recommendedmedicationhospitalisation = & $recommendedmedicationhospitalisation;
$MainPage->Delivery = & $Delivery;
$MainPage->hospitalisation = & $hospitalisation;
$MainPage->pregnancy_header1 = & $pregnancy_header1;
$pregnancy_header->Initialize();
$test_testcode->Initialize();
$medicationhospitalisation->Initialize();
$recommendedmedicationhospitalisation->Initialize();
$Delivery->Initialize();
$hospitalisation->Initialize();
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

//Execute Components @1-46507951
$topmenu->Operations();
$pregnancy_header->Operation();
$hospitalisation->Operation();
$pregnancy_header1->Operation();
//End Execute Components

//Go to destination page @1-7F7760A8
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($pregnancy_header);
    unset($test_testcode);
    unset($medicationhospitalisation);
    unset($recommendedmedicationhospitalisation);
    unset($Delivery);
    unset($hospitalisation);
    unset($pregnancy_header1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0EB5AE32
$topmenu->Show();
$pregnancy_header->Show();
$test_testcode->Show();
$medicationhospitalisation->Show();
$recommendedmedicationhospitalisation->Show();
$Delivery->Show();
$hospitalisation->Show();
$pregnancy_header1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-EE5B42A0
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($pregnancy_header);
unset($test_testcode);
unset($medicationhospitalisation);
unset($recommendedmedicationhospitalisation);
unset($Delivery);
unset($hospitalisation);
unset($pregnancy_header1);
unset($Tpl);
//End Unload Page


?>
