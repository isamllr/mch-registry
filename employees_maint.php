<?php
//Include Common Files @1-8F16A318
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "employees_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordemployees { //employees Class @2-7F7E7759

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

//Class_Initialize Event @2-E7AF8836
    function clsRecordemployees($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employees/Error";
        $this->DataSource = new clsemployeesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;2");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "employees";
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
            $this->FirstName = new clsControl(ccsTextBox, "FirstName", $CCSLocales->GetText("FirstName"), ccsText, "", CCGetRequestParam("FirstName", $Method, NULL), $this);
            $this->FirstName->Required = true;
            $this->LastName = new clsControl(ccsTextBox, "LastName", $CCSLocales->GetText("LastName"), ccsText, "", CCGetRequestParam("LastName", $Method, NULL), $this);
            $this->WorkPhone = new clsControl(ccsTextBox, "WorkPhone", $CCSLocales->GetText("WorkPhone"), ccsText, "", CCGetRequestParam("WorkPhone", $Method, NULL), $this);
            $this->HandPhone = new clsControl(ccsTextBox, "HandPhone", $CCSLocales->GetText("HandPhone"), ccsText, "", CCGetRequestParam("HandPhone", $Method, NULL), $this);
            $this->Email = new clsControl(ccsTextBox, "Email", $CCSLocales->GetText("Email"), ccsText, "", CCGetRequestParam("Email", $Method, NULL), $this);
            $this->EmployeeID = new clsControl(ccsHidden, "EmployeeID", "EmployeeID", ccsInteger, "", CCGetRequestParam("EmployeeID", $Method, NULL), $this);
            $this->LocationID = new clsControl(ccsHidden, "LocationID", $CCSLocales->GetText("LocationID"), ccsText, "", CCGetRequestParam("LocationID", $Method, NULL), $this);
            $this->LocationID->Required = true;
            $this->FacilityID = new clsControl(ccsListBox, "FacilityID", $CCSLocales->GetText("FacilityID"), ccsInteger, "", CCGetRequestParam("FacilityID", $Method, NULL), $this);
            $this->FacilityID->DSType = dsTable;
            $this->FacilityID->DataSource = new clsDBregistry_db();
            $this->FacilityID->ds = & $this->FacilityID->DataSource;
            $this->FacilityID->DataSource->SQL = "SELECT FacilityID, FacilityName \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            $this->FacilityID->DataSource->Order = "FacilityName";
            list($this->FacilityID->BoundColumn, $this->FacilityID->TextColumn, $this->FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->FacilityID->DataSource->Order = "FacilityName";
            $this->FacilityID->Required = true;
            $this->DeptID = new clsControl(ccsListBox, "DeptID", $CCSLocales->GetText("DeptID"), ccsInteger, "", CCGetRequestParam("DeptID", $Method, NULL), $this);
            $this->DeptID->DSType = dsTable;
            $this->DeptID->DataSource = new clsDBregistry_db();
            $this->DeptID->ds = & $this->DeptID->DataSource;
            $this->DeptID->DataSource->SQL = "SELECT DeptID, DepartmentDesc \n" .
"FROM department {SQL_Where} {SQL_OrderBy}";
            $this->DeptID->DataSource->Order = "DepartmentDesc";
            list($this->DeptID->BoundColumn, $this->DeptID->TextColumn, $this->DeptID->DBFormat) = array("DeptID", "DepartmentDesc", "");
            $this->DeptID->DataSource->Order = "DepartmentDesc";
            $this->DeptID->Required = true;
            $this->LoginID_employee = new clsControl(ccsHidden, "LoginID_employee", "LoginID_employee", ccsInteger, "", CCGetRequestParam("LoginID_employee", $Method, NULL), $this);
            $this->Position = new clsControl(ccsListBox, "Position", $CCSLocales->GetText("Position"), ccsInteger, "", CCGetRequestParam("Position", $Method, NULL), $this);
            $this->Position->DSType = dsTable;
            $this->Position->DataSource = new clsDBregistry_db();
            $this->Position->ds = & $this->Position->DataSource;
            $this->Position->DataSource->SQL = "SELECT * \n" .
"FROM position {SQL_Where} {SQL_OrderBy}";
            list($this->Position->BoundColumn, $this->Position->TextColumn, $this->Position->DBFormat) = array("PositionID", "PositionName", "");
            $this->Position->Required = true;
            $this->HighRiskPregnanciesSummary = new clsControl(ccsRadioButton, "HighRiskPregnanciesSummary", $CCSLocales->GetText("ReminderNot"), ccsInteger, "", CCGetRequestParam("HighRiskPregnanciesSummary", $Method, NULL), $this);
            $this->HighRiskPregnanciesSummary->DSType = dsListOfValues;
            $this->HighRiskPregnanciesSummary->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->HighRiskPregnanciesSummary->HTML = true;
        }
    }
//End Class_Initialize Event

//Initialize Method @2-AAA85980
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);
    }
//End Initialize Method

//Validate Method @2-9A2D9E52
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->FirstName->Validate() && $Validation);
        $Validation = ($this->LastName->Validate() && $Validation);
        $Validation = ($this->WorkPhone->Validate() && $Validation);
        $Validation = ($this->HandPhone->Validate() && $Validation);
        $Validation = ($this->Email->Validate() && $Validation);
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->LocationID->Validate() && $Validation);
        $Validation = ($this->FacilityID->Validate() && $Validation);
        $Validation = ($this->DeptID->Validate() && $Validation);
        $Validation = ($this->LoginID_employee->Validate() && $Validation);
        $Validation = ($this->Position->Validate() && $Validation);
        $Validation = ($this->HighRiskPregnanciesSummary->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LastName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->WorkPhone->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HandPhone->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Email->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LocationID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeptID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LoginID_employee->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Position->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HighRiskPregnanciesSummary->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-A0D2AF3E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->LastName->Errors->Count());
        $errors = ($errors || $this->WorkPhone->Errors->Count());
        $errors = ($errors || $this->HandPhone->Errors->Count());
        $errors = ($errors || $this->Email->Errors->Count());
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->LocationID->Errors->Count());
        $errors = ($errors || $this->FacilityID->Errors->Count());
        $errors = ($errors || $this->DeptID->Errors->Count());
        $errors = ($errors || $this->LoginID_employee->Errors->Count());
        $errors = ($errors || $this->Position->Errors->Count());
        $errors = ($errors || $this->HighRiskPregnanciesSummary->Errors->Count());
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

//Operation Method @2-68BE5607
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
            }
        }
        $Redirect = "employees_list.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "LoginID", "EmployeeID", "FirstName"));
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
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

//InsertRow Method @2-D532AB79
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->LoginID_employee->SetValue($this->LoginID_employee->GetValue(true));
        $this->DataSource->FirstName->SetValue($this->FirstName->GetValue(true));
        $this->DataSource->LastName->SetValue($this->LastName->GetValue(true));
        $this->DataSource->Position->SetValue($this->Position->GetValue(true));
        $this->DataSource->WorkPhone->SetValue($this->WorkPhone->GetValue(true));
        $this->DataSource->HandPhone->SetValue($this->HandPhone->GetValue(true));
        $this->DataSource->Email->SetValue($this->Email->GetValue(true));
        $this->DataSource->LocationID->SetValue($this->LocationID->GetValue(true));
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->HighRiskPregnanciesSummary->SetValue($this->HighRiskPregnanciesSummary->GetValue(true));
        $this->DataSource->HighRiskPregnanciesSummary->SetValue($this->HighRiskPregnanciesSummary->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-DDE1C534
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->FirstName->SetValue($this->FirstName->GetValue(true));
        $this->DataSource->LastName->SetValue($this->LastName->GetValue(true));
        $this->DataSource->WorkPhone->SetValue($this->WorkPhone->GetValue(true));
        $this->DataSource->HandPhone->SetValue($this->HandPhone->GetValue(true));
        $this->DataSource->Email->SetValue($this->Email->GetValue(true));
        $this->DataSource->LocationID->SetValue($this->LocationID->GetValue(true));
        $this->DataSource->LoginID_employee->SetValue($this->LoginID_employee->GetValue(true));
        $this->DataSource->Position->SetValue($this->Position->GetValue(true));
        $this->DataSource->HighRiskPregnanciesSummary->SetValue($this->HighRiskPregnanciesSummary->GetValue(true));
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

//Show Method @2-5C6FD933
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
        $this->DeptID->Prepare();
        $this->Position->Prepare();
        $this->HighRiskPregnanciesSummary->Prepare();

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
                    $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                    $this->LastName->SetValue($this->DataSource->LastName->GetValue());
                    $this->WorkPhone->SetValue($this->DataSource->WorkPhone->GetValue());
                    $this->HandPhone->SetValue($this->DataSource->HandPhone->GetValue());
                    $this->Email->SetValue($this->DataSource->Email->GetValue());
                    $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                    $this->LocationID->SetValue($this->DataSource->LocationID->GetValue());
                    $this->LoginID_employee->SetValue($this->DataSource->LoginID_employee->GetValue());
                    $this->Position->SetValue($this->DataSource->Position->GetValue());
                    $this->HighRiskPregnanciesSummary->SetValue($this->DataSource->HighRiskPregnanciesSummary->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LastName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->WorkPhone->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HandPhone->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Email->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LocationID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeptID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LoginID_employee->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Position->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HighRiskPregnanciesSummary->Errors->ToString());
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
        $this->FirstName->Show();
        $this->LastName->Show();
        $this->WorkPhone->Show();
        $this->HandPhone->Show();
        $this->Email->Show();
        $this->EmployeeID->Show();
        $this->LocationID->Show();
        $this->FacilityID->Show();
        $this->DeptID->Show();
        $this->LoginID_employee->Show();
        $this->Position->Show();
        $this->HighRiskPregnanciesSummary->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employees Class @2-FCB6E20C

class clsemployeesDataSource extends clsDBregistry_db {  //employeesDataSource Class @2-2A1BA216

//DataSource Variables @2-3BF7DF3E
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
    public $FirstName;
    public $LastName;
    public $WorkPhone;
    public $HandPhone;
    public $Email;
    public $EmployeeID;
    public $LocationID;
    public $FacilityID;
    public $DeptID;
    public $LoginID_employee;
    public $Position;
    public $HighRiskPregnanciesSummary;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-5F92F67E
    function clsemployeesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employees/Error";
        $this->Initialize();
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->LastName = new clsField("LastName", ccsText, "");
        
        $this->WorkPhone = new clsField("WorkPhone", ccsText, "");
        
        $this->HandPhone = new clsField("HandPhone", ccsText, "");
        
        $this->Email = new clsField("Email", ccsText, "");
        
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->LocationID = new clsField("LocationID", ccsText, "");
        
        $this->FacilityID = new clsField("FacilityID", ccsInteger, "");
        
        $this->DeptID = new clsField("DeptID", ccsInteger, "");
        
        $this->LoginID_employee = new clsField("LoginID_employee", ccsInteger, "");
        
        $this->Position = new clsField("Position", ccsInteger, "");
        
        $this->HighRiskPregnanciesSummary = new clsField("HighRiskPregnanciesSummary", ccsInteger, "");
        

        $this->InsertFields["LoginID"] = array("Name" => "LoginID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FirstName"] = array("Name" => "FirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["LastName"] = array("Name" => "LastName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionID"] = array("Name" => "PositionID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["WorkPhone"] = array("Name" => "WorkPhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["HandPhone"] = array("Name" => "HandPhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Email"] = array("Name" => "Email", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["LocationID"] = array("Name" => "LocationID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["HighRiskPregnanciesSummaryNotification"] = array("Name" => "HighRiskPregnanciesSummaryNotification", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->InsertFields["HighRiskPregnanciesSummaryNotification"] = array("Name" => "HighRiskPregnanciesSummaryNotification", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["FirstName"] = array("Name" => "FirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LastName"] = array("Name" => "LastName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["WorkPhone"] = array("Name" => "WorkPhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["HandPhone"] = array("Name" => "HandPhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Email"] = array("Name" => "Email", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LocationID"] = array("Name" => "LocationID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LoginID"] = array("Name" => "LoginID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionID"] = array("Name" => "PositionID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["HighRiskPregnanciesSummaryNotification"] = array("Name" => "HighRiskPregnanciesSummaryNotification", "Value" => "", "DataType" => ccsInteger);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-E1300750
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEmployeeID", ccsText, "", "", $this->Parameters["urlEmployeeID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-EB416647
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employees {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-3E7C40C3
    function SetValues()
    {
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->LastName->SetDBValue($this->f("LastName"));
        $this->WorkPhone->SetDBValue($this->f("WorkPhone"));
        $this->HandPhone->SetDBValue($this->f("HandPhone"));
        $this->Email->SetDBValue($this->f("Email"));
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->LocationID->SetDBValue($this->f("LocationID"));
        $this->LoginID_employee->SetDBValue(trim($this->f("LoginID")));
        $this->Position->SetDBValue(trim($this->f("PositionID")));
        $this->HighRiskPregnanciesSummary->SetDBValue(trim($this->f("HighRiskPregnanciesSummaryNotification")));
    }
//End SetValues Method

//Insert Method @2-FF98DBEA
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["LoginID"] = new clsSQLParameter("ctrlLoginID_employee", ccsInteger, "", "", $this->LoginID_employee->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FirstName"] = new clsSQLParameter("ctrlFirstName", ccsText, "", "", $this->FirstName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LastName"] = new clsSQLParameter("ctrlLastName", ccsText, "", "", $this->LastName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PositionID"] = new clsSQLParameter("ctrlPosition", ccsInteger, "", "", $this->Position->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["WorkPhone"] = new clsSQLParameter("ctrlWorkPhone", ccsText, "", "", $this->WorkPhone->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HandPhone"] = new clsSQLParameter("ctrlHandPhone", ccsText, "", "", $this->HandPhone->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Email"] = new clsSQLParameter("ctrlEmail", ccsText, "", "", $this->Email->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LocationID"] = new clsSQLParameter("ctrlLocationID", ccsText, "", "", $this->LocationID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["EmployeeID"] = new clsSQLParameter("ctrlEmployeeID", ccsInteger, "", "", $this->EmployeeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HighRiskPregnanciesSummaryNotification"] = new clsSQLParameter("ctrlHighRiskPregnanciesSummary", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->HighRiskPregnanciesSummary->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HighRiskPregnanciesSummaryNotification"] = new clsSQLParameter("ctrlHighRiskPregnanciesSummary", ccsInteger, "", "", $this->HighRiskPregnanciesSummary->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["LoginID"]->GetValue()) and !strlen($this->cp["LoginID"]->GetText()) and !is_bool($this->cp["LoginID"]->GetValue())) 
            $this->cp["LoginID"]->SetValue($this->LoginID_employee->GetValue(true));
        if (!is_null($this->cp["FirstName"]->GetValue()) and !strlen($this->cp["FirstName"]->GetText()) and !is_bool($this->cp["FirstName"]->GetValue())) 
            $this->cp["FirstName"]->SetValue($this->FirstName->GetValue(true));
        if (!is_null($this->cp["LastName"]->GetValue()) and !strlen($this->cp["LastName"]->GetText()) and !is_bool($this->cp["LastName"]->GetValue())) 
            $this->cp["LastName"]->SetValue($this->LastName->GetValue(true));
        if (!is_null($this->cp["PositionID"]->GetValue()) and !strlen($this->cp["PositionID"]->GetText()) and !is_bool($this->cp["PositionID"]->GetValue())) 
            $this->cp["PositionID"]->SetValue($this->Position->GetValue(true));
        if (!is_null($this->cp["WorkPhone"]->GetValue()) and !strlen($this->cp["WorkPhone"]->GetText()) and !is_bool($this->cp["WorkPhone"]->GetValue())) 
            $this->cp["WorkPhone"]->SetValue($this->WorkPhone->GetValue(true));
        if (!is_null($this->cp["HandPhone"]->GetValue()) and !strlen($this->cp["HandPhone"]->GetText()) and !is_bool($this->cp["HandPhone"]->GetValue())) 
            $this->cp["HandPhone"]->SetValue($this->HandPhone->GetValue(true));
        if (!is_null($this->cp["Email"]->GetValue()) and !strlen($this->cp["Email"]->GetText()) and !is_bool($this->cp["Email"]->GetValue())) 
            $this->cp["Email"]->SetValue($this->Email->GetValue(true));
        if (!is_null($this->cp["LocationID"]->GetValue()) and !strlen($this->cp["LocationID"]->GetText()) and !is_bool($this->cp["LocationID"]->GetValue())) 
            $this->cp["LocationID"]->SetValue($this->LocationID->GetValue(true));
        if (!is_null($this->cp["EmployeeID"]->GetValue()) and !strlen($this->cp["EmployeeID"]->GetText()) and !is_bool($this->cp["EmployeeID"]->GetValue())) 
            $this->cp["EmployeeID"]->SetValue($this->EmployeeID->GetValue(true));
        if (!is_null($this->cp["HighRiskPregnanciesSummaryNotification"]->GetValue()) and !strlen($this->cp["HighRiskPregnanciesSummaryNotification"]->GetText()) and !is_bool($this->cp["HighRiskPregnanciesSummaryNotification"]->GetValue())) 
            $this->cp["HighRiskPregnanciesSummaryNotification"]->SetValue($this->HighRiskPregnanciesSummary->GetValue(true));
        if (!is_null($this->cp["HighRiskPregnanciesSummaryNotification"]->GetValue()) and !strlen($this->cp["HighRiskPregnanciesSummaryNotification"]->GetText()) and !is_bool($this->cp["HighRiskPregnanciesSummaryNotification"]->GetValue())) 
            $this->cp["HighRiskPregnanciesSummaryNotification"]->SetValue($this->HighRiskPregnanciesSummary->GetValue(true));
        if (!strlen($this->cp["HighRiskPregnanciesSummaryNotification"]->GetText()) and !is_bool($this->cp["HighRiskPregnanciesSummaryNotification"]->GetValue(true))) 
            $this->cp["HighRiskPregnanciesSummaryNotification"]->SetText(0);
        $this->InsertFields["LoginID"]["Value"] = $this->cp["LoginID"]->GetDBValue(true);
        $this->InsertFields["FirstName"]["Value"] = $this->cp["FirstName"]->GetDBValue(true);
        $this->InsertFields["LastName"]["Value"] = $this->cp["LastName"]->GetDBValue(true);
        $this->InsertFields["PositionID"]["Value"] = $this->cp["PositionID"]->GetDBValue(true);
        $this->InsertFields["WorkPhone"]["Value"] = $this->cp["WorkPhone"]->GetDBValue(true);
        $this->InsertFields["HandPhone"]["Value"] = $this->cp["HandPhone"]->GetDBValue(true);
        $this->InsertFields["Email"]["Value"] = $this->cp["Email"]->GetDBValue(true);
        $this->InsertFields["LocationID"]["Value"] = $this->cp["LocationID"]->GetDBValue(true);
        $this->InsertFields["EmployeeID"]["Value"] = $this->cp["EmployeeID"]->GetDBValue(true);
        $this->InsertFields["HighRiskPregnanciesSummaryNotification"]["Value"] = $this->cp["HighRiskPregnanciesSummaryNotification"]->GetDBValue(true);
        $this->InsertFields["HighRiskPregnanciesSummaryNotification"]["Value"] = $this->cp["HighRiskPregnanciesSummaryNotification"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("employees", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-11D18AE8
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["FirstName"] = new clsSQLParameter("ctrlFirstName", ccsText, "", "", $this->FirstName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LastName"] = new clsSQLParameter("ctrlLastName", ccsText, "", "", $this->LastName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["WorkPhone"] = new clsSQLParameter("ctrlWorkPhone", ccsText, "", "", $this->WorkPhone->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HandPhone"] = new clsSQLParameter("ctrlHandPhone", ccsText, "", "", $this->HandPhone->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Email"] = new clsSQLParameter("ctrlEmail", ccsText, "", "", $this->Email->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LocationID"] = new clsSQLParameter("ctrlLocationID", ccsText, "", "", $this->LocationID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LoginID"] = new clsSQLParameter("ctrlLoginID_employee", ccsInteger, "", "", $this->LoginID_employee->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PositionID"] = new clsSQLParameter("ctrlPosition", ccsInteger, "", "", $this->Position->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HighRiskPregnanciesSummaryNotification"] = new clsSQLParameter("ctrlHighRiskPregnanciesSummary", ccsInteger, "", "", $this->HighRiskPregnanciesSummary->GetValue(true), 0, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlEmployeeID", ccsText, "", "", CCGetFromGet("EmployeeID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["FirstName"]->GetValue()) and !strlen($this->cp["FirstName"]->GetText()) and !is_bool($this->cp["FirstName"]->GetValue())) 
            $this->cp["FirstName"]->SetValue($this->FirstName->GetValue(true));
        if (!is_null($this->cp["LastName"]->GetValue()) and !strlen($this->cp["LastName"]->GetText()) and !is_bool($this->cp["LastName"]->GetValue())) 
            $this->cp["LastName"]->SetValue($this->LastName->GetValue(true));
        if (!is_null($this->cp["WorkPhone"]->GetValue()) and !strlen($this->cp["WorkPhone"]->GetText()) and !is_bool($this->cp["WorkPhone"]->GetValue())) 
            $this->cp["WorkPhone"]->SetValue($this->WorkPhone->GetValue(true));
        if (!is_null($this->cp["HandPhone"]->GetValue()) and !strlen($this->cp["HandPhone"]->GetText()) and !is_bool($this->cp["HandPhone"]->GetValue())) 
            $this->cp["HandPhone"]->SetValue($this->HandPhone->GetValue(true));
        if (!is_null($this->cp["Email"]->GetValue()) and !strlen($this->cp["Email"]->GetText()) and !is_bool($this->cp["Email"]->GetValue())) 
            $this->cp["Email"]->SetValue($this->Email->GetValue(true));
        if (!is_null($this->cp["LocationID"]->GetValue()) and !strlen($this->cp["LocationID"]->GetText()) and !is_bool($this->cp["LocationID"]->GetValue())) 
            $this->cp["LocationID"]->SetValue($this->LocationID->GetValue(true));
        if (!is_null($this->cp["LoginID"]->GetValue()) and !strlen($this->cp["LoginID"]->GetText()) and !is_bool($this->cp["LoginID"]->GetValue())) 
            $this->cp["LoginID"]->SetValue($this->LoginID_employee->GetValue(true));
        if (!is_null($this->cp["PositionID"]->GetValue()) and !strlen($this->cp["PositionID"]->GetText()) and !is_bool($this->cp["PositionID"]->GetValue())) 
            $this->cp["PositionID"]->SetValue($this->Position->GetValue(true));
        if (!is_null($this->cp["HighRiskPregnanciesSummaryNotification"]->GetValue()) and !strlen($this->cp["HighRiskPregnanciesSummaryNotification"]->GetText()) and !is_bool($this->cp["HighRiskPregnanciesSummaryNotification"]->GetValue())) 
            $this->cp["HighRiskPregnanciesSummaryNotification"]->SetValue($this->HighRiskPregnanciesSummary->GetValue(true));
        if (!strlen($this->cp["HighRiskPregnanciesSummaryNotification"]->GetText()) and !is_bool($this->cp["HighRiskPregnanciesSummaryNotification"]->GetValue(true))) 
            $this->cp["HighRiskPregnanciesSummaryNotification"]->SetText(0);
        $wp->Criterion[1] = $wp->Operation(opEqual, "EmployeeID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsText),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["FirstName"]["Value"] = $this->cp["FirstName"]->GetDBValue(true);
        $this->UpdateFields["LastName"]["Value"] = $this->cp["LastName"]->GetDBValue(true);
        $this->UpdateFields["WorkPhone"]["Value"] = $this->cp["WorkPhone"]->GetDBValue(true);
        $this->UpdateFields["HandPhone"]["Value"] = $this->cp["HandPhone"]->GetDBValue(true);
        $this->UpdateFields["Email"]["Value"] = $this->cp["Email"]->GetDBValue(true);
        $this->UpdateFields["LocationID"]["Value"] = $this->cp["LocationID"]->GetDBValue(true);
        $this->UpdateFields["LoginID"]["Value"] = $this->cp["LoginID"]->GetDBValue(true);
        $this->UpdateFields["PositionID"]["Value"] = $this->cp["PositionID"]->GetDBValue(true);
        $this->UpdateFields["HighRiskPregnanciesSummaryNotification"]["Value"] = $this->cp["HighRiskPregnanciesSummaryNotification"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("employees", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @2-39DEE646
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlEmployeeID", ccsText, "", "", CCGetFromGet("EmployeeID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "EmployeeID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsText),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM employees";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End employeesDataSource Class @2-FCB6E20C

//Include Page implementation @27-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordlogin { //login Class @141-5F3E6EB9

//Variables @141-9E315808

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

//Class_Initialize Event @141-4DB416FE
    function clsRecordlogin($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record login/Error";
        $this->DataSource = new clsloginDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "login";
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
            $this->username = new clsControl(ccsTextBox, "username", $CCSLocales->GetText("username"), ccsText, "", CCGetRequestParam("username", $Method, NULL), $this);
            $this->username->Required = true;
            $this->password = new clsControl(ccsTextBox, "password", $CCSLocales->GetText("password"), ccsText, "", CCGetRequestParam("password", $Method, NULL), $this);
            $this->password->Required = true;
            $this->GroupID = new clsControl(ccsListBox, "GroupID", $CCSLocales->GetText("GroupID"), ccsInteger, "", CCGetRequestParam("GroupID", $Method, NULL), $this);
            $this->GroupID->DSType = dsTable;
            $this->GroupID->DataSource = new clsDBregistry_db();
            $this->GroupID->ds = & $this->GroupID->DataSource;
            $this->GroupID->DataSource->SQL = "SELECT * \n" .
"FROM usergroups {SQL_Where} {SQL_OrderBy}";
            list($this->GroupID->BoundColumn, $this->GroupID->TextColumn, $this->GroupID->DBFormat) = array("GroupID", "GroupName", "");
            $this->GroupID->Required = true;
            $this->DefaultDB = new clsControl(ccsListBox, "DefaultDB", $CCSLocales->GetText("DefaultDB"), ccsText, "", CCGetRequestParam("DefaultDB", $Method, NULL), $this);
            $this->DefaultDB->DSType = dsSQL;
            $this->DefaultDB->DataSource = new clsDBregistry_db();
            $this->DefaultDB->ds = & $this->DefaultDB->DataSource;
            list($this->DefaultDB->BoundColumn, $this->DefaultDB->TextColumn, $this->DefaultDB->DBFormat) = array("Database", "Database", "");
            $this->DefaultDB->DataSource->SQL = "SHOW Databases";
            $this->DefaultDB->DataSource->Order = "";
            $this->DefaultDB->Required = true;
            $this->locale = new clsControl(ccsListBox, "locale", $CCSLocales->GetText("locale"), ccsText, "", CCGetRequestParam("locale", $Method, NULL), $this);
            $this->locale->DSType = dsTable;
            $this->locale->DataSource = new clsDBregistry_db();
            $this->locale->ds = & $this->locale->DataSource;
            $this->locale->DataSource->SQL = "SELECT * \n" .
"FROM languages {SQL_Where} {SQL_OrderBy}";
            list($this->locale->BoundColumn, $this->locale->TextColumn, $this->locale->DBFormat) = array("locale", "Language", "");
            $this->locale->Required = true;
            $this->password_Shadow = new clsControl(ccsHidden, "password_Shadow", "password_Shadow", ccsText, "", CCGetRequestParam("password_Shadow", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @141-CF2C329A
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlLoginID"] = CCGetFromGet("LoginID", NULL);
    }
//End Initialize Method

//Validate Method @141-FEFC7931
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(! (preg_match("/^.*(?=.{6,})(?=.*\d)(?=.*[a-z]).*$/",$this->username->GetValue()))) {
            $this->username->Errors->addError($CCSLocales->GetText("LoginReq"));
        }
        if(! (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$this->password->GetValue()))) {
            $this->password->Errors->addError($CCSLocales->GetText("PwdReq"));
        }
        $Validation = ($this->username->Validate() && $Validation);
        $Validation = ($this->password->Validate() && $Validation);
        $Validation = ($this->GroupID->Validate() && $Validation);
        $Validation = ($this->DefaultDB->Validate() && $Validation);
        $Validation = ($this->locale->Validate() && $Validation);
        $Validation = ($this->password_Shadow->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->username->Errors->Count() == 0);
        $Validation =  $Validation && ($this->password->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GroupID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DefaultDB->Errors->Count() == 0);
        $Validation =  $Validation && ($this->locale->Errors->Count() == 0);
        $Validation =  $Validation && ($this->password_Shadow->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @141-0887BD42
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->username->Errors->Count());
        $errors = ($errors || $this->password->Errors->Count());
        $errors = ($errors || $this->GroupID->Errors->Count());
        $errors = ($errors || $this->DefaultDB->Errors->Count());
        $errors = ($errors || $this->locale->Errors->Count());
        $errors = ($errors || $this->password_Shadow->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @141-ED598703
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

//Operation Method @141-288F0419
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
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
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

//InsertRow Method @141-76BDA947
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->username->SetValue($this->username->GetValue(true));
        $this->DataSource->GroupID->SetValue($this->GroupID->GetValue(true));
        $this->DataSource->DefaultDB->SetValue($this->DefaultDB->GetValue(true));
        $this->DataSource->locale->SetValue($this->locale->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @141-0AC10537
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->username->SetValue($this->username->GetValue(true));
        $this->DataSource->GroupID->SetValue($this->GroupID->GetValue(true));
        $this->DataSource->DefaultDB->SetValue($this->DefaultDB->GetValue(true));
        $this->DataSource->locale->SetValue($this->locale->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @141-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @141-37310573
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

        $this->GroupID->Prepare();
        $this->DefaultDB->Prepare();
        $this->locale->Prepare();

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
                    $this->username->SetValue($this->DataSource->username->GetValue());
                    $this->password->SetValue($this->DataSource->password->GetValue());
                    $this->GroupID->SetValue($this->DataSource->GroupID->GetValue());
                    $this->DefaultDB->SetValue($this->DataSource->DefaultDB->GetValue());
                    $this->locale->SetValue($this->DataSource->locale->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->username->Errors->ToString());
            $Error = ComposeStrings($Error, $this->password->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GroupID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DefaultDB->Errors->ToString());
            $Error = ComposeStrings($Error, $this->locale->Errors->ToString());
            $Error = ComposeStrings($Error, $this->password_Shadow->Errors->ToString());
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
        $this->username->Show();
        $this->password->Show();
        $this->GroupID->Show();
        $this->DefaultDB->Show();
        $this->locale->Show();
        $this->password_Shadow->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End login Class @141-FCB6E20C

class clsloginDataSource extends clsDBregistry_db {  //loginDataSource Class @141-38C9DCC1

//DataSource Variables @141-86E08801
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
    public $username;
    public $password;
    public $GroupID;
    public $DefaultDB;
    public $locale;
    public $password_Shadow;
//End DataSource Variables

//DataSourceClass_Initialize Event @141-77EDA266
    function clsloginDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record login/Error";
        $this->Initialize();
        $this->username = new clsField("username", ccsText, "");
        
        $this->password = new clsField("password", ccsText, "");
        
        $this->GroupID = new clsField("GroupID", ccsInteger, "");
        
        $this->DefaultDB = new clsField("DefaultDB", ccsText, "");
        
        $this->locale = new clsField("locale", ccsText, "");
        
        $this->password_Shadow = new clsField("password_Shadow", ccsText, "");
        

        $this->InsertFields["username"] = array("Name" => "username", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["password"] = array("Name" => "password", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["GroupID"] = array("Name" => "GroupID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DefaultDB"] = array("Name" => "DefaultDB", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["locale"] = array("Name" => "locale", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["username"] = array("Name" => "username", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["password"] = array("Name" => "password", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["GroupID"] = array("Name" => "GroupID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DefaultDB"] = array("Name" => "DefaultDB", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["locale"] = array("Name" => "locale", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @141-07F33C23
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlLoginID", ccsInteger, "", "", $this->Parameters["urlLoginID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "LoginID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @141-C5652A24
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM login {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @141-C3500E25
    function SetValues()
    {
        $this->username->SetDBValue($this->f("username"));
        $this->password->SetDBValue($this->f("password"));
        $this->GroupID->SetDBValue(trim($this->f("GroupID")));
        $this->DefaultDB->SetDBValue($this->f("DefaultDB"));
        $this->locale->SetDBValue($this->f("locale"));
    }
//End SetValues Method

//Insert Method @141-03C338C7
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["username"] = new clsSQLParameter("ctrlusername", ccsText, "", "", $this->username->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["password"] = new clsSQLParameter("expr159", ccsText, "", "", "{password}", NULL, false, $this->ErrorBlock);
        $this->cp["GroupID"] = new clsSQLParameter("ctrlGroupID", ccsInteger, "", "", $this->GroupID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DefaultDB"] = new clsSQLParameter("ctrlDefaultDB", ccsText, "", "", $this->DefaultDB->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["locale"] = new clsSQLParameter("ctrllocale", ccsText, "", "", $this->locale->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["username"]->GetValue()) and !strlen($this->cp["username"]->GetText()) and !is_bool($this->cp["username"]->GetValue())) 
            $this->cp["username"]->SetValue($this->username->GetValue(true));
        if (!is_null($this->cp["password"]->GetValue()) and !strlen($this->cp["password"]->GetText()) and !is_bool($this->cp["password"]->GetValue())) 
            $this->cp["password"]->SetValue("{password}");
        if (!is_null($this->cp["GroupID"]->GetValue()) and !strlen($this->cp["GroupID"]->GetText()) and !is_bool($this->cp["GroupID"]->GetValue())) 
            $this->cp["GroupID"]->SetValue($this->GroupID->GetValue(true));
        if (!is_null($this->cp["DefaultDB"]->GetValue()) and !strlen($this->cp["DefaultDB"]->GetText()) and !is_bool($this->cp["DefaultDB"]->GetValue())) 
            $this->cp["DefaultDB"]->SetValue($this->DefaultDB->GetValue(true));
        if (!is_null($this->cp["locale"]->GetValue()) and !strlen($this->cp["locale"]->GetText()) and !is_bool($this->cp["locale"]->GetValue())) 
            $this->cp["locale"]->SetValue($this->locale->GetValue(true));
        $this->InsertFields["username"]["Value"] = $this->cp["username"]->GetDBValue(true);
        $this->InsertFields["password"]["Value"] = $this->cp["password"]->GetDBValue(true);
        $this->InsertFields["GroupID"]["Value"] = $this->cp["GroupID"]->GetDBValue(true);
        $this->InsertFields["DefaultDB"]["Value"] = $this->cp["DefaultDB"]->GetDBValue(true);
        $this->InsertFields["locale"]["Value"] = $this->cp["locale"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("login", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @141-670F7535
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["username"] = new clsSQLParameter("ctrlusername", ccsText, "", "", $this->username->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["password"] = new clsSQLParameter("expr165", ccsText, "", "", "{password}", NULL, false, $this->ErrorBlock);
        $this->cp["GroupID"] = new clsSQLParameter("ctrlGroupID", ccsInteger, "", "", $this->GroupID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DefaultDB"] = new clsSQLParameter("ctrlDefaultDB", ccsText, "", "", $this->DefaultDB->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["locale"] = new clsSQLParameter("ctrllocale", ccsText, "", "", $this->locale->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlLoginID", ccsInteger, "", "", CCGetFromGet("LoginID", NULL), NULL, false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["username"]->GetValue()) and !strlen($this->cp["username"]->GetText()) and !is_bool($this->cp["username"]->GetValue())) 
            $this->cp["username"]->SetValue($this->username->GetValue(true));
        if (!is_null($this->cp["password"]->GetValue()) and !strlen($this->cp["password"]->GetText()) and !is_bool($this->cp["password"]->GetValue())) 
            $this->cp["password"]->SetValue("{password}");
        if (!is_null($this->cp["GroupID"]->GetValue()) and !strlen($this->cp["GroupID"]->GetText()) and !is_bool($this->cp["GroupID"]->GetValue())) 
            $this->cp["GroupID"]->SetValue($this->GroupID->GetValue(true));
        if (!is_null($this->cp["DefaultDB"]->GetValue()) and !strlen($this->cp["DefaultDB"]->GetText()) and !is_bool($this->cp["DefaultDB"]->GetValue())) 
            $this->cp["DefaultDB"]->SetValue($this->DefaultDB->GetValue(true));
        if (!is_null($this->cp["locale"]->GetValue()) and !strlen($this->cp["locale"]->GetText()) and !is_bool($this->cp["locale"]->GetValue())) 
            $this->cp["locale"]->SetValue($this->locale->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "LoginID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["username"]["Value"] = $this->cp["username"]->GetDBValue(true);
        $this->UpdateFields["password"]["Value"] = $this->cp["password"]->GetDBValue(true);
        $this->UpdateFields["GroupID"]["Value"] = $this->cp["GroupID"]->GetDBValue(true);
        $this->UpdateFields["DefaultDB"]["Value"] = $this->cp["DefaultDB"]->GetDBValue(true);
        $this->UpdateFields["locale"]["Value"] = $this->cp["locale"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("login", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @141-84FB7863
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM login";
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

} //End loginDataSource Class @141-FCB6E20C



//Initialize Page @1-67C12C5E
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
$TemplateFileName = "employees_maint.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Check SSL @1-E30DD771
CCCheckSSL();
//End Check SSL

//Authenticate User @1-35F89DFE
CCSecurityRedirect("1", SecureURL . "" .  "noaccess.php");
//End Authenticate User

//Include events file @1-D99A5414
include_once("./employees_maint_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-0A03A3C6
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employees = new clsRecordemployees("", $MainPage);
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$login = new clsRecordlogin("", $MainPage);
$MainPage->employees = & $employees;
$MainPage->topmenu = & $topmenu;
$MainPage->login = & $login;
$employees->Initialize();
$login->Initialize();

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

//Execute Components @1-C32D1C59
$employees->Operation();
$topmenu->Operations();
$login->Operation();
//End Execute Components

//Go to destination page @1-CC9382DD
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    unset($employees);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($login);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-8BEA5852
$employees->Show();
$topmenu->Show();
$login->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-92F6D2AD
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
unset($employees);
$topmenu->Class_Terminate();
unset($topmenu);
unset($login);
unset($Tpl);
//End Unload Page


?>
