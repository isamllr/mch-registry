<?php
//Include Common Files @1-CCFE6344
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "medication_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @12-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordmedication { //medication Class @2-0A3F3BBE

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

//Class_Initialize Event @2-BABE24F2
    function clsRecordmedication($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record medication/Error";
        $this->DataSource = new clsmedicationDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;3;2");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "medication";
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
            $this->VisitID = new clsControl(ccsHidden, "VisitID", $CCSLocales->GetText("VisitID"), ccsInteger, "", CCGetRequestParam("VisitID", $Method, NULL), $this);
            $this->VisitID->Required = true;
            $this->DateMedication = new clsControl(ccsTextBox, "DateMedication", $CCSLocales->GetText("Date"), ccsDate, array("ShortDate"), CCGetRequestParam("DateMedication", $Method, NULL), $this);
            $this->DateMedication->Required = true;
            $this->DatePicker_DateMedication = new clsDatePicker("DatePicker_DateMedication", "medication", "DateMedication", $this);
            $this->Dosage = new clsControl(ccsTextBox, "Dosage", $CCSLocales->GetText("Dosage"), ccsText, "", CCGetRequestParam("Dosage", $Method, NULL), $this);
            $this->Dosage->Required = true;
            $this->lastmodified = new clsControl(ccsLabel, "lastmodified", "lastmodified", ccsDate, array("GeneralDate"), CCGetRequestParam("lastmodified", $Method, NULL), $this);
            $this->user = new clsControl(ccsLabel, "user", "user", ccsText, "", CCGetRequestParam("user", $Method, NULL), $this);
            $this->CurrentUser = new clsControl(ccsTextBox, "CurrentUser", "CurrentUser", ccsText, "", CCGetRequestParam("CurrentUser", $Method, NULL), $this);
            $this->TextArea1 = new clsControl(ccsTextArea, "TextArea1", "TextArea1", ccsText, "", CCGetRequestParam("TextArea1", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->DateMedication->Value) && !strlen($this->DateMedication->Value) && $this->DateMedication->Value !== false)
                    $this->DateMedication->SetValue(time());
            }
            if(!is_array($this->lastmodified->Value) && !strlen($this->lastmodified->Value) && $this->lastmodified->Value !== false)
                $this->lastmodified->SetValue(time());
        }
    }
//End Class_Initialize Event

//Initialize Method @2-E638D924
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlMedicationID"] = CCGetFromGet("MedicationID", NULL);
    }
//End Initialize Method

//Validate Method @2-D0D0D2EA
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->VisitID->Validate() && $Validation);
        $Validation = ($this->DateMedication->Validate() && $Validation);
        $Validation = ($this->Dosage->Validate() && $Validation);
        $Validation = ($this->CurrentUser->Validate() && $Validation);
        $Validation = ($this->TextArea1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->VisitID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateMedication->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Dosage->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CurrentUser->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextArea1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-6951E3D9
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->VisitID->Errors->Count());
        $errors = ($errors || $this->DateMedication->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateMedication->Errors->Count());
        $errors = ($errors || $this->Dosage->Errors->Count());
        $errors = ($errors || $this->lastmodified->Errors->Count());
        $errors = ($errors || $this->user->Errors->Count());
        $errors = ($errors || $this->CurrentUser->Errors->Count());
        $errors = ($errors || $this->TextArea1->Errors->Count());
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

//Operation Method @2-0D54EFD2
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
        $Redirect = "visit_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "MedicationID"));
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = "visit_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "MedicationID"));
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

//InsertRow Method @2-841F20A6
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->VisitID->SetValue($this->VisitID->GetValue(true));
        $this->DataSource->DateMedication->SetValue($this->DateMedication->GetValue(true));
        $this->DataSource->Dosage->SetValue($this->Dosage->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->TextArea1->SetValue($this->TextArea1->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-25805FB6
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->VisitID->SetValue($this->VisitID->GetValue(true));
        $this->DataSource->DateMedication->SetValue($this->DateMedication->GetValue(true));
        $this->DataSource->Dosage->SetValue($this->Dosage->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->TextArea1->SetValue($this->TextArea1->GetValue(true));
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

//Show Method @2-77A20669
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
                $this->lastmodified->SetValue($this->DataSource->lastmodified->GetValue());
                $this->user->SetValue($this->DataSource->user->GetValue());
                if(!$this->FormSubmitted){
                    $this->VisitID->SetValue($this->DataSource->VisitID->GetValue());
                    $this->DateMedication->SetValue($this->DataSource->DateMedication->GetValue());
                    $this->Dosage->SetValue($this->DataSource->Dosage->GetValue());
                    $this->CurrentUser->SetValue($this->DataSource->CurrentUser->GetValue());
                    $this->TextArea1->SetValue($this->DataSource->TextArea1->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->VisitID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateMedication->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateMedication->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Dosage->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lastmodified->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CurrentUser->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextArea1->Errors->ToString());
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
        $this->VisitID->Show();
        $this->DateMedication->Show();
        $this->DatePicker_DateMedication->Show();
        $this->Dosage->Show();
        $this->lastmodified->Show();
        $this->user->Show();
        $this->CurrentUser->Show();
        $this->TextArea1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End medication Class @2-FCB6E20C

class clsmedicationDataSource extends clsDBregistry_db {  //medicationDataSource Class @2-E4032679

//DataSource Variables @2-8D625491
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
    public $VisitID;
    public $DateMedication;
    public $Dosage;
    public $lastmodified;
    public $user;
    public $CurrentUser;
    public $TextArea1;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-3D532440
    function clsmedicationDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record medication/Error";
        $this->Initialize();
        $this->VisitID = new clsField("VisitID", ccsInteger, "");
        
        $this->DateMedication = new clsField("DateMedication", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Dosage = new clsField("Dosage", ccsText, "");
        
        $this->lastmodified = new clsField("lastmodified", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->user = new clsField("user", ccsText, "");
        
        $this->CurrentUser = new clsField("CurrentUser", ccsText, "");
        
        $this->TextArea1 = new clsField("TextArea1", ccsText, "");
        

        $this->InsertFields["VisitID"] = array("Name" => "VisitID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DateMedication"] = array("Name" => "DateMedication", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Dosage"] = array("Name" => "Dosage", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MedicationName"] = array("Name" => "MedicationName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["VisitID"] = array("Name" => "VisitID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateMedication"] = array("Name" => "DateMedication", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Dosage"] = array("Name" => "Dosage", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MedicationName"] = array("Name" => "MedicationName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-078697C9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlMedicationID", ccsInteger, "", "", $this->Parameters["urlMedicationID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "MedicationID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-6B07C343
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM medication {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-5B5074E8
    function SetValues()
    {
        $this->VisitID->SetDBValue(trim($this->f("VisitID")));
        $this->DateMedication->SetDBValue(trim($this->f("DateMedication")));
        $this->Dosage->SetDBValue($this->f("Dosage"));
        $this->lastmodified->SetDBValue(trim($this->f("created")));
        $this->user->SetDBValue($this->f("by_user"));
        $this->CurrentUser->SetDBValue($this->f("by_user"));
        $this->TextArea1->SetDBValue($this->f("MedicationName"));
    }
//End SetValues Method

//Insert Method @2-0D732E35
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["VisitID"] = new clsSQLParameter("ctrlVisitID", ccsInteger, "", "", $this->VisitID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DateMedication"] = new clsSQLParameter("ctrlDateMedication", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DateMedication->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Dosage"] = new clsSQLParameter("ctrlDosage", ccsText, "", "", $this->Dosage->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["MedicationName"] = new clsSQLParameter("ctrlTextArea1", ccsText, "", "", $this->TextArea1->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["VisitID"]->GetValue()) and !strlen($this->cp["VisitID"]->GetText()) and !is_bool($this->cp["VisitID"]->GetValue())) 
            $this->cp["VisitID"]->SetValue($this->VisitID->GetValue(true));
        if (!is_null($this->cp["DateMedication"]->GetValue()) and !strlen($this->cp["DateMedication"]->GetText()) and !is_bool($this->cp["DateMedication"]->GetValue())) 
            $this->cp["DateMedication"]->SetValue($this->DateMedication->GetValue(true));
        if (!is_null($this->cp["Dosage"]->GetValue()) and !strlen($this->cp["Dosage"]->GetText()) and !is_bool($this->cp["Dosage"]->GetValue())) 
            $this->cp["Dosage"]->SetValue($this->Dosage->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["MedicationName"]->GetValue()) and !strlen($this->cp["MedicationName"]->GetText()) and !is_bool($this->cp["MedicationName"]->GetValue())) 
            $this->cp["MedicationName"]->SetValue($this->TextArea1->GetValue(true));
        $this->InsertFields["VisitID"]["Value"] = $this->cp["VisitID"]->GetDBValue(true);
        $this->InsertFields["DateMedication"]["Value"] = $this->cp["DateMedication"]->GetDBValue(true);
        $this->InsertFields["Dosage"]["Value"] = $this->cp["Dosage"]->GetDBValue(true);
        $this->InsertFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->InsertFields["MedicationName"]["Value"] = $this->cp["MedicationName"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("medication", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-67C20F75
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["VisitID"] = new clsSQLParameter("ctrlVisitID", ccsInteger, "", "", $this->VisitID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DateMedication"] = new clsSQLParameter("ctrlDateMedication", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DateMedication->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Dosage"] = new clsSQLParameter("ctrlDosage", ccsText, "", "", $this->Dosage->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["MedicationName"] = new clsSQLParameter("ctrlTextArea1", ccsText, "", "", $this->TextArea1->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlMedicationID", ccsInteger, "", "", CCGetFromGet("MedicationID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["VisitID"]->GetValue()) and !strlen($this->cp["VisitID"]->GetText()) and !is_bool($this->cp["VisitID"]->GetValue())) 
            $this->cp["VisitID"]->SetValue($this->VisitID->GetValue(true));
        if (!is_null($this->cp["DateMedication"]->GetValue()) and !strlen($this->cp["DateMedication"]->GetText()) and !is_bool($this->cp["DateMedication"]->GetValue())) 
            $this->cp["DateMedication"]->SetValue($this->DateMedication->GetValue(true));
        if (!is_null($this->cp["Dosage"]->GetValue()) and !strlen($this->cp["Dosage"]->GetText()) and !is_bool($this->cp["Dosage"]->GetValue())) 
            $this->cp["Dosage"]->SetValue($this->Dosage->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["MedicationName"]->GetValue()) and !strlen($this->cp["MedicationName"]->GetText()) and !is_bool($this->cp["MedicationName"]->GetValue())) 
            $this->cp["MedicationName"]->SetValue($this->TextArea1->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "MedicationID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["VisitID"]["Value"] = $this->cp["VisitID"]->GetDBValue(true);
        $this->UpdateFields["DateMedication"]["Value"] = $this->cp["DateMedication"]->GetDBValue(true);
        $this->UpdateFields["Dosage"]["Value"] = $this->cp["Dosage"]->GetDBValue(true);
        $this->UpdateFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->UpdateFields["MedicationName"]["Value"] = $this->cp["MedicationName"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("medication", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @2-96613B19
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlMedicationID", ccsInteger, "", "", CCGetFromGet("MedicationID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $wp->AddParameter("2", "urlVisitID", ccsInteger, "", "", CCGetFromGet("VisitID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "MedicationID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $wp->Criterion[2] = $wp->Operation(opEqual, "VisitID", $wp->GetDBValue("2"), $this->ToSQL($wp->GetDBValue("2"), ccsInteger),false);
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->SQL = "DELETE FROM medication";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End medicationDataSource Class @2-FCB6E20C

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

//Class_Initialize Event @45-8D203E65
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

//Initialize Method @45-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
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

//CheckErrors Method @45-C82C427B
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

//Show Method @45-860F6492
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

} //End pregnancy_header Class @45-FCB6E20C

class clspregnancy_headerDataSource extends clsDBregistry_db {  //pregnancy_headerDataSource Class @45-B1B2C690

//DataSource Variables @45-DD53AE5C
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

//DataSourceClass_Initialize Event @45-B3F735C8
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

//Prepare Method @45-190B3DAA
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

//Open Method @45-64C2DC81
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

//SetValues Method @45-81074AD6
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->FirstName->SetDBValue($this->f("GivenName"));
        $this->FamiliyName->SetDBValue($this->f("FamilyName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_headerDataSource Class @45-FCB6E20C

class clsRecordpregnancy_header1 { //pregnancy_header1 Class @80-18A06872

//Variables @80-9E315808

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

//Class_Initialize Event @80-60A6F8D5
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

//Initialize Method @80-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @80-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @80-651F84E8
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

//MasterDetail @80-ED598703
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

//Operation Method @80-17DC9883
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

//Show Method @80-6CAF9031
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

} //End pregnancy_header1 Class @80-FCB6E20C

class clspregnancy_header1DataSource extends clsDBregistry_db {  //pregnancy_header1DataSource Class @80-FA18A47E

//DataSource Variables @80-E31437D1
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

//DataSourceClass_Initialize Event @80-A243E463
    function clspregnancy_header1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record pregnancy_header1/Error";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @80-190B3DAA
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

//Open Method @80-64C2DC81
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

//SetValues Method @80-0855F252
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_header1DataSource Class @80-FCB6E20C

//Initialize Page @1-BDDAF25E
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
$TemplateFileName = "medication_maint.html";
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

//Include events file @1-CF48C9E4
include_once("./medication_maint_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-2ECA479C
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$medication = new clsRecordmedication("", $MainPage);
$pregnancy_header = new clsRecordpregnancy_header("", $MainPage);
$pregnancy_header1 = new clsRecordpregnancy_header1("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->medication = & $medication;
$MainPage->pregnancy_header = & $pregnancy_header;
$MainPage->pregnancy_header1 = & $pregnancy_header1;
$medication->Initialize();
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

//Execute Components @1-F8D0D1B0
$topmenu->Operations();
$medication->Operation();
$pregnancy_header->Operation();
$pregnancy_header1->Operation();
//End Execute Components

//Go to destination page @1-34832482
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($medication);
    unset($pregnancy_header);
    unset($pregnancy_header1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-80AA0868
$topmenu->Show();
$medication->Show();
$pregnancy_header->Show();
$pregnancy_header1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-9FEF57F3
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($medication);
unset($pregnancy_header);
unset($pregnancy_header1);
unset($Tpl);
//End Unload Page


?>
