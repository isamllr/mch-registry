<?php
//Include Common Files @1-0B96459E
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Test_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordtest { //test Class @2-823F7E18

//Variables @2-9E315808

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

//Class_Initialize Event @2-79CA3E90
    function clsRecordtest($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record test/Error";
        $this->DataSource = new clstestDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;3;2");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "test";
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
            $this->TestResult = new clsControl(ccsTextBox, "TestResult", $CCSLocales->GetText("TestResultDetails"), ccsText, "", CCGetRequestParam("TestResult", $Method, NULL), $this);
            $this->TestDate = new clsControl(ccsTextBox, "TestDate", $CCSLocales->GetText("TestDate"), ccsDate, array("ShortDate"), CCGetRequestParam("TestDate", $Method, NULL), $this);
            $this->TestDate->Required = true;
            $this->DatePicker_TestDate = new clsDatePicker("DatePicker_TestDate", "test", "TestDate", $this);
            $this->VisitID = new clsControl(ccsHidden, "VisitID", $CCSLocales->GetText("VisitID"), ccsInteger, "", CCGetRequestParam("VisitID", $Method, NULL), $this);
            $this->VisitID->Required = true;
            $this->TestCodeID = new clsControl(ccsListBox, "TestCodeID", $CCSLocales->GetText("TestCodeID"), ccsInteger, "", CCGetRequestParam("TestCodeID", $Method, NULL), $this);
            $this->TestCodeID->DSType = dsTable;
            $this->TestCodeID->DataSource = new clsDBregistry_db();
            $this->TestCodeID->ds = & $this->TestCodeID->DataSource;
            $this->TestCodeID->DataSource->SQL = "SELECT * \n" .
"FROM testcode {SQL_Where} {SQL_OrderBy}";
            list($this->TestCodeID->BoundColumn, $this->TestCodeID->TextColumn, $this->TestCodeID->DBFormat) = array("TestCodeID", "TestName", "");
            $this->TestCodeID->Required = true;
            $this->TestResultNormal = new clsControl(ccsRadioButton, "TestResultNormal", $CCSLocales->GetText("TestResultNormal"), ccsInteger, "", CCGetRequestParam("TestResultNormal", $Method, NULL), $this);
            $this->TestResultNormal->DSType = dsListOfValues;
            $this->TestResultNormal->Values = array(array("1", $CCSLocales->GetText("RYes") . " "), array("0", $CCSLocales->GetText("RNo")));
            $this->TestResultNormal->HTML = true;
            $this->TestResultNormal->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->TestDate->Value) && !strlen($this->TestDate->Value) && $this->TestDate->Value !== false)
                    $this->TestDate->SetValue(time());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @2-CD679AFE
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlTestID"] = CCGetFromGet("TestID", NULL);
    }
//End Initialize Method

//Validate Method @2-B9B348CD
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->TestResult->Validate() && $Validation);
        $Validation = ($this->TestDate->Validate() && $Validation);
        $Validation = ($this->VisitID->Validate() && $Validation);
        $Validation = ($this->TestCodeID->Validate() && $Validation);
        $Validation = ($this->TestResultNormal->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->TestResult->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TestDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VisitID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TestCodeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TestResultNormal->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-03E4B3AC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TestResult->Errors->Count());
        $errors = ($errors || $this->TestDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_TestDate->Errors->Count());
        $errors = ($errors || $this->VisitID->Errors->Count());
        $errors = ($errors || $this->TestCodeID->Errors->Count());
        $errors = ($errors || $this->TestResultNormal->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @2-ED598703
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

//Operation Method @2-B2F28D71
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
            }
        }
        $Redirect = "visit_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TestID"));
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = "visit_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "TestID"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
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

//InsertRow Method @2-2C5FEA70
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->TestResult->SetValue($this->TestResult->GetValue(true));
        $this->DataSource->TestDate->SetValue($this->TestDate->GetValue(true));
        $this->DataSource->VisitID->SetValue($this->VisitID->GetValue(true));
        $this->DataSource->TestCodeID->SetValue($this->TestCodeID->GetValue(true));
        $this->DataSource->TestResultNormal->SetValue($this->TestResultNormal->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-6F328D15
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->TestResult->SetValue($this->TestResult->GetValue(true));
        $this->DataSource->TestDate->SetValue($this->TestDate->GetValue(true));
        $this->DataSource->VisitID->SetValue($this->VisitID->GetValue(true));
        $this->DataSource->TestCodeID->SetValue($this->TestCodeID->GetValue(true));
        $this->DataSource->TestResultNormal->SetValue($this->TestResultNormal->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-E9FB0DC4
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

        $this->TestCodeID->Prepare();
        $this->TestResultNormal->Prepare();

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
                if(!$this->FormSubmitted){
                    $this->TestResult->SetValue($this->DataSource->TestResult->GetValue());
                    $this->TestDate->SetValue($this->DataSource->TestDate->GetValue());
                    $this->VisitID->SetValue($this->DataSource->VisitID->GetValue());
                    $this->TestCodeID->SetValue($this->DataSource->TestCodeID->GetValue());
                    $this->TestResultNormal->SetValue($this->DataSource->TestResultNormal->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->TestResult->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TestDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_TestDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VisitID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TestCodeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TestResultNormal->Errors->ToString());
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
        $this->TestResult->Show();
        $this->TestDate->Show();
        $this->DatePicker_TestDate->Show();
        $this->VisitID->Show();
        $this->TestCodeID->Show();
        $this->TestResultNormal->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End test Class @2-FCB6E20C

class clstestDataSource extends clsDBregistry_db {  //testDataSource Class @2-1BF98E65

//DataSource Variables @2-0791A86A
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
    public $TestResult;
    public $TestDate;
    public $VisitID;
    public $TestCodeID;
    public $TestResultNormal;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-97C97FCF
    function clstestDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record test/Error";
        $this->Initialize();
        $this->TestResult = new clsField("TestResult", ccsText, "");
        
        $this->TestDate = new clsField("TestDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->VisitID = new clsField("VisitID", ccsInteger, "");
        
        $this->TestCodeID = new clsField("TestCodeID", ccsInteger, "");
        
        $this->TestResultNormal = new clsField("TestResultNormal", ccsInteger, "");
        

        $this->InsertFields["TestResultDetails"] = array("Name" => "TestResultDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["TestDate"] = array("Name" => "TestDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["VisitID"] = array("Name" => "VisitID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TestCodeID"] = array("Name" => "TestCodeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TestResultNormal"] = array("Name" => "TestResultNormal", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TestResultDetails"] = array("Name" => "TestResultDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["TestDate"] = array("Name" => "TestDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["VisitID"] = array("Name" => "VisitID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TestCodeID"] = array("Name" => "TestCodeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TestResultNormal"] = array("Name" => "TestResultNormal", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-A4239C57
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlTestID", ccsInteger, "", "", $this->Parameters["urlTestID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "TestID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-F1A82630
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM test {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-B86B8E56
    function SetValues()
    {
        $this->TestResult->SetDBValue($this->f("TestResultDetails"));
        $this->TestDate->SetDBValue(trim($this->f("TestDate")));
        $this->VisitID->SetDBValue(trim($this->f("VisitID")));
        $this->TestCodeID->SetDBValue(trim($this->f("TestCodeID")));
        $this->TestResultNormal->SetDBValue(trim($this->f("TestResultNormal")));
    }
//End SetValues Method

//Insert Method @2-05161789
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["TestResultDetails"]["Value"] = $this->TestResult->GetDBValue(true);
        $this->InsertFields["TestDate"]["Value"] = $this->TestDate->GetDBValue(true);
        $this->InsertFields["VisitID"]["Value"] = $this->VisitID->GetDBValue(true);
        $this->InsertFields["TestCodeID"]["Value"] = $this->TestCodeID->GetDBValue(true);
        $this->InsertFields["TestResultNormal"]["Value"] = $this->TestResultNormal->GetDBValue(true);
        $this->SQL = CCBuildInsert("test", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-DB66AB04
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["TestResultDetails"]["Value"] = $this->TestResult->GetDBValue(true);
        $this->UpdateFields["TestDate"]["Value"] = $this->TestDate->GetDBValue(true);
        $this->UpdateFields["VisitID"]["Value"] = $this->VisitID->GetDBValue(true);
        $this->UpdateFields["TestCodeID"]["Value"] = $this->TestCodeID->GetDBValue(true);
        $this->UpdateFields["TestResultNormal"]["Value"] = $this->TestResultNormal->GetDBValue(true);
        $this->SQL = CCBuildUpdate("test", $this->UpdateFields, $this);
        $this->SQL .= strlen($this->Where) ? " WHERE " . $this->Where : $this->Where;
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @2-F6DA5A92
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM test";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End testDataSource Class @2-FCB6E20C

//Include Page implementation @15-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordpregnancy_header { //pregnancy_header Class @45-8E4CDD04

//Variables @45-9E315808

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

//Class_Initialize Event @45-1ACA56CC
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
            $this->PatientID = new clsControl(ccsLabel, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
            $this->visit = new clsControl(ccsLabel, "visit", "visit", ccsText, "", CCGetRequestParam("visit", $Method, NULL), $this);
            $this->VisitDate = new clsControl(ccsLabel, "VisitDate", "VisitDate", ccsDate, array("ShortDate"), CCGetRequestParam("VisitDate", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @45-9F2B3976
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);
    }
//End Initialize Method

//Validate Method @45-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @45-4AA0743B
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

//MasterDetail @45-ED598703
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

//Operation Method @45-17DC9883
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

//Show Method @45-3550E489
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

} //End pregnancy_header Class @45-FCB6E20C

class clspregnancy_headerDataSource extends clsDBregistry_db {  //pregnancy_headerDataSource Class @45-B1B2C690

//DataSource Variables @45-9DAF0FA1
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

//DataSourceClass_Initialize Event @45-4FC904CB
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

//Prepare Method @45-746DCC14
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

//Open Method @45-AFBBD9BE
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

//SetValues Method @45-098708FF
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

} //End pregnancy_headerDataSource Class @45-FCB6E20C

class clsRecordpregnancy_header1 { //pregnancy_header1 Class @57-18A06872

//Variables @57-9E315808

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

//Class_Initialize Event @57-19EEA094
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
            $this->PatientID = new clsControl(ccsLabel, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
            $this->visit = new clsControl(ccsLabel, "visit", "visit", ccsText, "", CCGetRequestParam("visit", $Method, NULL), $this);
            $this->VisitDate = new clsControl(ccsLabel, "VisitDate", "VisitDate", ccsDate, array("ShortDate"), CCGetRequestParam("VisitDate", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @57-9F2B3976
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlVisitID"] = CCGetFromGet("VisitID", NULL);
    }
//End Initialize Method

//Validate Method @57-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @57-9E6E040A
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

//MasterDetail @57-ED598703
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

//Operation Method @57-17DC9883
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

//Show Method @57-E9F05B82
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

} //End pregnancy_header1 Class @57-FCB6E20C

class clspregnancy_header1DataSource extends clsDBregistry_db {  //pregnancy_header1DataSource Class @57-FA18A47E

//DataSource Variables @57-0AF8BC96
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

//DataSourceClass_Initialize Event @57-9A5D4C79
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

//Prepare Method @57-746DCC14
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

//Open Method @57-AFBBD9BE
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

//SetValues Method @57-F9C8A979
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
        $this->VisitDate->SetDBValue(trim($this->f("VisitDate")));
    }
//End SetValues Method

} //End pregnancy_header1DataSource Class @57-FCB6E20C



//Initialize Page @1-0F2F731A
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
$TemplateFileName = "Test_maint.html";
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

//Initialize Objects @1-7848B1DD
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$test = new clsRecordtest("", $MainPage);
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$pregnancy_header = new clsRecordpregnancy_header("", $MainPage);
$pregnancy_header1 = new clsRecordpregnancy_header1("", $MainPage);
$MainPage->test = & $test;
$MainPage->topmenu = & $topmenu;
$MainPage->pregnancy_header = & $pregnancy_header;
$MainPage->pregnancy_header1 = & $pregnancy_header1;
$test->Initialize();
$pregnancy_header->Initialize();
$pregnancy_header1->Initialize();

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

//Execute Components @1-A0C4E74A
$test->Operation();
$topmenu->Operations();
$pregnancy_header->Operation();
$pregnancy_header1->Operation();
//End Execute Components

//Go to destination page @1-9731BE0D
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    unset($test);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($pregnancy_header);
    unset($pregnancy_header1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-7761B3AA
$test->Show();
$topmenu->Show();
$pregnancy_header->Show();
$pregnancy_header1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-61316F4C
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
unset($test);
$topmenu->Class_Terminate();
unset($topmenu);
unset($pregnancy_header);
unset($pregnancy_header1);
unset($Tpl);
//End Unload Page


?>
