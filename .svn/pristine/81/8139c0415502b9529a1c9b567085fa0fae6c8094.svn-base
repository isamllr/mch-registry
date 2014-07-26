<?php
//Include Common Files @1-DF542D48
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "pinfo_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



//Include Page implementation @27-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation



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

//Class_Initialize Event @2-B9E752A9
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
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
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
            $this->WorkPhone = new clsControl(ccsTextBox, "WorkPhone", $CCSLocales->GetText("WorkPhone"), ccsText, "", CCGetRequestParam("WorkPhone", $Method, NULL), $this);
            $this->HandPhone = new clsControl(ccsTextBox, "HandPhone", $CCSLocales->GetText("HandPhone"), ccsText, "", CCGetRequestParam("HandPhone", $Method, NULL), $this);
            $this->Email = new clsControl(ccsTextBox, "Email", $CCSLocales->GetText("Email"), ccsText, "", CCGetRequestParam("Email", $Method, NULL), $this);
            $this->EmployeeID = new clsControl(ccsHidden, "EmployeeID", "EmployeeID", ccsInteger, "", CCGetRequestParam("EmployeeID", $Method, NULL), $this);
            $this->LocationID = new clsControl(ccsHidden, "LocationID", $CCSLocales->GetText("LocationID"), ccsText, "", CCGetRequestParam("LocationID", $Method, NULL), $this);
            $this->LocationID->Required = true;
            $this->LoginID_employee = new clsControl(ccsHidden, "LoginID_employee", "LoginID_employee", ccsInteger, "", CCGetRequestParam("LoginID_employee", $Method, NULL), $this);
            $this->FacilityName = new clsControl(ccsLabel, "FacilityName", "FacilityName", ccsText, "", CCGetRequestParam("FacilityName", $Method, NULL), $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->FacilityNameDB = new clsControl(ccsLabel, "FacilityNameDB", "FacilityNameDB", ccsText, "", CCGetRequestParam("FacilityNameDB", $Method, NULL), $this);
            $this->DepNameDB = new clsControl(ccsLabel, "DepNameDB", "DepNameDB", ccsText, "", CCGetRequestParam("DepNameDB", $Method, NULL), $this);
            $this->FirstName = new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", $Method, NULL), $this);
            $this->LastName = new clsControl(ccsLabel, "LastName", "LastName", ccsText, "", CCGetRequestParam("LastName", $Method, NULL), $this);
            $this->Position = new clsControl(ccsLabel, "Position", "Position", ccsText, "", CCGetRequestParam("Position", $Method, NULL), $this);
            $this->PositionID = new clsControl(ccsHidden, "PositionID", "PositionID", ccsInteger, "", CCGetRequestParam("PositionID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @2-90F4EAD6
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["sesLoginID"] = CCGetSession("LoginID", NULL);
    }
//End Initialize Method

//Validate Method @2-EB5BBEC4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->Email->GetText()) && !preg_match ("/(-|^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$)/", $this->Email->GetText())) {
            $this->Email->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("Email")));
        }
        $Validation = ($this->WorkPhone->Validate() && $Validation);
        $Validation = ($this->HandPhone->Validate() && $Validation);
        $Validation = ($this->Email->Validate() && $Validation);
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->LocationID->Validate() && $Validation);
        $Validation = ($this->LoginID_employee->Validate() && $Validation);
        $Validation = ($this->PositionID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->WorkPhone->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HandPhone->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Email->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LocationID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LoginID_employee->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-0369A5C5
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->WorkPhone->Errors->Count());
        $errors = ($errors || $this->HandPhone->Errors->Count());
        $errors = ($errors || $this->Email->Errors->Count());
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->LocationID->Errors->Count());
        $errors = ($errors || $this->LoginID_employee->Errors->Count());
        $errors = ($errors || $this->FacilityName->Errors->Count());
        $errors = ($errors || $this->FacilityNameDB->Errors->Count());
        $errors = ($errors || $this->DepNameDB->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->LastName->Errors->Count());
        $errors = ($errors || $this->Position->Errors->Count());
        $errors = ($errors || $this->PositionID->Errors->Count());
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

//Operation Method @2-10F3B9C7
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
        $Redirect = "dashboard.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "LoginID", "EmployeeID", "FirstName"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete)) {
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

//InsertRow Method @2-664E5EF4
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
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-062BE4E4
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
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @2-A36FDD36
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
                $this->FacilityNameDB->SetValue($this->DataSource->FacilityNameDB->GetValue());
                $this->DepNameDB->SetValue($this->DataSource->DepNameDB->GetValue());
                $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                $this->LastName->SetValue($this->DataSource->LastName->GetValue());
                if(!$this->FormSubmitted){
                    $this->WorkPhone->SetValue($this->DataSource->WorkPhone->GetValue());
                    $this->HandPhone->SetValue($this->DataSource->HandPhone->GetValue());
                    $this->Email->SetValue($this->DataSource->Email->GetValue());
                    $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                    $this->LocationID->SetValue($this->DataSource->LocationID->GetValue());
                    $this->LoginID_employee->SetValue($this->DataSource->LoginID_employee->GetValue());
                    $this->PositionID->SetValue($this->DataSource->PositionID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->WorkPhone->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HandPhone->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Email->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LocationID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LoginID_employee->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityNameDB->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DepNameDB->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LastName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Position->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionID->Errors->ToString());
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
        $this->WorkPhone->Show();
        $this->HandPhone->Show();
        $this->Email->Show();
        $this->EmployeeID->Show();
        $this->LocationID->Show();
        $this->LoginID_employee->Show();
        $this->FacilityName->Show();
        $this->Button_Cancel->Show();
        $this->FacilityNameDB->Show();
        $this->DepNameDB->Show();
        $this->FirstName->Show();
        $this->LastName->Show();
        $this->Position->Show();
        $this->PositionID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employees Class @2-FCB6E20C

class clsemployeesDataSource extends clsDBregistry_db {  //employeesDataSource Class @2-2A1BA216

//DataSource Variables @2-4DFE72ED
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $WorkPhone;
    public $HandPhone;
    public $Email;
    public $EmployeeID;
    public $LocationID;
    public $LoginID_employee;
    public $FacilityName;
    public $FacilityNameDB;
    public $DepNameDB;
    public $FirstName;
    public $LastName;
    public $Position;
    public $PositionID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-A16B0D56
    function clsemployeesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employees/Error";
        $this->Initialize();
        $this->WorkPhone = new clsField("WorkPhone", ccsText, "");
        
        $this->HandPhone = new clsField("HandPhone", ccsText, "");
        
        $this->Email = new clsField("Email", ccsText, "");
        
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->LocationID = new clsField("LocationID", ccsText, "");
        
        $this->LoginID_employee = new clsField("LoginID_employee", ccsInteger, "");
        
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->FacilityNameDB = new clsField("FacilityNameDB", ccsText, "");
        
        $this->DepNameDB = new clsField("DepNameDB", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->LastName = new clsField("LastName", ccsText, "");
        
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->PositionID = new clsField("PositionID", ccsInteger, "");
        

        $this->InsertFields["LoginID"] = array("Name" => "LoginID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FirstName"] = array("Name" => "FirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["LastName"] = array("Name" => "LastName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionID"] = array("Name" => "PositionID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["WorkPhone"] = array("Name" => "WorkPhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["HandPhone"] = array("Name" => "HandPhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Email"] = array("Name" => "Email", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["LocationID"] = array("Name" => "LocationID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FirstName"] = array("Name" => "FirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LastName"] = array("Name" => "LastName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["WorkPhone"] = array("Name" => "WorkPhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["HandPhone"] = array("Name" => "HandPhone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Email"] = array("Name" => "Email", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LocationID"] = array("Name" => "LocationID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LoginID"] = array("Name" => "LoginID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionID"] = array("Name" => "PositionID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-319E6ACE
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sesLoginID", ccsInteger, "", "", $this->Parameters["sesLoginID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employees.LoginID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-06CB1559
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT employees.*, FacilityName, location.*, DepartmentDesc \n\n" .
        "FROM ((location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID) INNER JOIN department ON\n\n" .
        "location.DeptID = department.DeptID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-2ED279AC
    function SetValues()
    {
        $this->WorkPhone->SetDBValue($this->f("WorkPhone"));
        $this->HandPhone->SetDBValue($this->f("HandPhone"));
        $this->Email->SetDBValue($this->f("Email"));
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->LocationID->SetDBValue($this->f("LocationID"));
        $this->LoginID_employee->SetDBValue(trim($this->f("LoginID")));
        $this->FacilityNameDB->SetDBValue($this->f("FacilityName"));
        $this->DepNameDB->SetDBValue($this->f("DepartmentDesc"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->LastName->SetDBValue($this->f("LastName"));
        $this->PositionID->SetDBValue(trim($this->f("PositionID")));
    }
//End SetValues Method

//Insert Method @2-A00F3896
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
        $this->InsertFields["LoginID"]["Value"] = $this->cp["LoginID"]->GetDBValue(true);
        $this->InsertFields["FirstName"]["Value"] = $this->cp["FirstName"]->GetDBValue(true);
        $this->InsertFields["LastName"]["Value"] = $this->cp["LastName"]->GetDBValue(true);
        $this->InsertFields["PositionID"]["Value"] = $this->cp["PositionID"]->GetDBValue(true);
        $this->InsertFields["WorkPhone"]["Value"] = $this->cp["WorkPhone"]->GetDBValue(true);
        $this->InsertFields["HandPhone"]["Value"] = $this->cp["HandPhone"]->GetDBValue(true);
        $this->InsertFields["Email"]["Value"] = $this->cp["Email"]->GetDBValue(true);
        $this->InsertFields["LocationID"]["Value"] = $this->cp["LocationID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("employees", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-DD4ED56A
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
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "sesLoginID", ccsInteger, "", "", CCGetSession("LoginID", NULL), "", false);
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
        $wp->Criterion[1] = $wp->Operation(opEqual, "LoginID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
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
        $this->SQL = CCBuildUpdate("employees", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End employeesDataSource Class @2-FCB6E20C



//Initialize Page @1-861C052E
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
$TemplateFileName = "pinfo_maint.html";
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

//Include events file @1-D83197F1
include_once("./pinfo_maint_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-7CFBEE95
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$employees = new clsRecordemployees("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->employees = & $employees;
$employees->Initialize();

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

//Execute Components @1-21DCC7CD
$topmenu->Operations();
$employees->Operation();
//End Execute Components

//Go to destination page @1-339B1FC0
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($employees);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-BE0FADD3
$topmenu->Show();
$employees->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-149F2972
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($employees);
unset($Tpl);
//End Unload Page


?>
