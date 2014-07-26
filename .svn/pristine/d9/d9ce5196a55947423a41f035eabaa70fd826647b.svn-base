<?php
//Include Common Files @1-588939C0
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "doctors.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordemployees { //employees Class @39-7F7E7759

//Variables @39-9E315808

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

//Class_Initialize Event @39-A0C4A739
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
        $this->DeleteAllowed = true;
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
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->FirstName = new clsControl(ccsTextBox, "FirstName", $CCSLocales->GetText("FirstName"), ccsText, "", CCGetRequestParam("FirstName", $Method, NULL), $this);
            $this->LastName = new clsControl(ccsTextBox, "LastName", $CCSLocales->GetText("LastName"), ccsText, "", CCGetRequestParam("LastName", $Method, NULL), $this);
            $this->PositionID = new clsControl(ccsListBox, "PositionID", $CCSLocales->GetText("PositionID"), ccsInteger, "", CCGetRequestParam("PositionID", $Method, NULL), $this);
            $this->PositionID->DSType = dsTable;
            $this->PositionID->DataSource = new clsDBregistry_db();
            $this->PositionID->ds = & $this->PositionID->DataSource;
            $this->PositionID->DataSource->SQL = "SELECT * \n" .
"FROM position {SQL_Where} {SQL_OrderBy}";
            list($this->PositionID->BoundColumn, $this->PositionID->TextColumn, $this->PositionID->DBFormat) = array("PositionID", "PositionName", "");
            $this->FacilityID = new clsControl(ccsListBox, "FacilityID", "FacilityID", ccsText, "", CCGetRequestParam("FacilityID", $Method, NULL), $this);
            $this->FacilityID->DSType = dsTable;
            $this->FacilityID->DataSource = new clsDBregistry_db();
            $this->FacilityID->ds = & $this->FacilityID->DataSource;
            $this->FacilityID->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where}\n" .
"GROUP BY FacilityName {SQL_OrderBy}";
            list($this->FacilityID->BoundColumn, $this->FacilityID->TextColumn, $this->FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->FacilityID->Required = true;
            $this->LocationID = new clsControl(ccsHidden, "LocationID", $CCSLocales->GetText("LocationID"), ccsText, "", CCGetRequestParam("LocationID", $Method, NULL), $this);
            $this->LocationID->Required = true;
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
        }
    }
//End Class_Initialize Event

//Initialize Method @39-AAA85980
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);
    }
//End Initialize Method

//Validate Method @39-C912F6A9
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->FirstName->Validate() && $Validation);
        $Validation = ($this->LastName->Validate() && $Validation);
        $Validation = ($this->PositionID->Validate() && $Validation);
        $Validation = ($this->FacilityID->Validate() && $Validation);
        $Validation = ($this->LocationID->Validate() && $Validation);
        $Validation = ($this->DeptID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LastName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LocationID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeptID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @39-13200F29
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->LastName->Errors->Count());
        $errors = ($errors || $this->PositionID->Errors->Count());
        $errors = ($errors || $this->FacilityID->Errors->Count());
        $errors = ($errors || $this->LocationID->Errors->Count());
        $errors = ($errors || $this->DeptID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @39-ED598703
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

//Operation Method @39-EF74ECC4
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
                $Redirect = "doctors_list.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @39-7A20F13F
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->FirstName->SetValue($this->FirstName->GetValue(true));
        $this->DataSource->LastName->SetValue($this->LastName->GetValue(true));
        $this->DataSource->PositionID->SetValue($this->PositionID->GetValue(true));
        $this->DataSource->LocationID->SetValue($this->LocationID->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @39-DD429267
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->FirstName->SetValue($this->FirstName->GetValue(true));
        $this->DataSource->LastName->SetValue($this->LastName->GetValue(true));
        $this->DataSource->PositionID->SetValue($this->PositionID->GetValue(true));
        $this->DataSource->LocationID->SetValue($this->LocationID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @39-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @39-46B2F916
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

        $this->PositionID->Prepare();
        $this->FacilityID->Prepare();
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
                if(!$this->FormSubmitted){
                    $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                    $this->LastName->SetValue($this->DataSource->LastName->GetValue());
                    $this->PositionID->SetValue($this->DataSource->PositionID->GetValue());
                    $this->LocationID->SetValue($this->DataSource->LocationID->GetValue());
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
            $Error = ComposeStrings($Error, $this->PositionID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LocationID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeptID->Errors->ToString());
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
        $this->FirstName->Show();
        $this->LastName->Show();
        $this->PositionID->Show();
        $this->FacilityID->Show();
        $this->LocationID->Show();
        $this->DeptID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employees Class @39-FCB6E20C

class clsemployeesDataSource extends clsDBregistry_db {  //employeesDataSource Class @39-2A1BA216

//DataSource Variables @39-4B6234B3
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
    public $PositionID;
    public $FacilityID;
    public $LocationID;
    public $DeptID;
//End DataSource Variables

//DataSourceClass_Initialize Event @39-35D9C0DD
    function clsemployeesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employees/Error";
        $this->Initialize();
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->LastName = new clsField("LastName", ccsText, "");
        
        $this->PositionID = new clsField("PositionID", ccsInteger, "");
        
        $this->FacilityID = new clsField("FacilityID", ccsText, "");
        
        $this->LocationID = new clsField("LocationID", ccsText, "");
        
        $this->DeptID = new clsField("DeptID", ccsInteger, "");
        

        $this->InsertFields["FirstName"] = array("Name" => "FirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["LastName"] = array("Name" => "LastName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionID"] = array("Name" => "PositionID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["LocationID"] = array("Name" => "LocationID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FirstName"] = array("Name" => "FirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LastName"] = array("Name" => "LastName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionID"] = array("Name" => "PositionID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["LocationID"] = array("Name" => "LocationID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @39-244A49FB
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEmployeeID", ccsInteger, "", "", $this->Parameters["urlEmployeeID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employees.EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @39-BF577012
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT employees.*, location.*, FacilityName, position.*, facilities.FacilityID AS facilities_FacilityID \n\n" .
        "FROM ((location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID) INNER JOIN position ON\n\n" .
        "employees.PositionID = position.PositionID {SQL_Where}\n\n" .
        "GROUP BY FacilityName {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @39-F10F04FE
    function SetValues()
    {
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->LastName->SetDBValue($this->f("LastName"));
        $this->PositionID->SetDBValue(trim($this->f("PositionID")));
        $this->LocationID->SetDBValue($this->f("LocationID"));
    }
//End SetValues Method

//Insert Method @39-22B9DBE8
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["FirstName"] = new clsSQLParameter("ctrlFirstName", ccsText, "", "", $this->FirstName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LastName"] = new clsSQLParameter("ctrlLastName", ccsText, "", "", $this->LastName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PositionID"] = new clsSQLParameter("ctrlPositionID", ccsInteger, "", "", $this->PositionID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LocationID"] = new clsSQLParameter("ctrlLocationID", ccsText, "", "", $this->LocationID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["FirstName"]->GetValue()) and !strlen($this->cp["FirstName"]->GetText()) and !is_bool($this->cp["FirstName"]->GetValue())) 
            $this->cp["FirstName"]->SetValue($this->FirstName->GetValue(true));
        if (!is_null($this->cp["LastName"]->GetValue()) and !strlen($this->cp["LastName"]->GetText()) and !is_bool($this->cp["LastName"]->GetValue())) 
            $this->cp["LastName"]->SetValue($this->LastName->GetValue(true));
        if (!is_null($this->cp["PositionID"]->GetValue()) and !strlen($this->cp["PositionID"]->GetText()) and !is_bool($this->cp["PositionID"]->GetValue())) 
            $this->cp["PositionID"]->SetValue($this->PositionID->GetValue(true));
        if (!is_null($this->cp["LocationID"]->GetValue()) and !strlen($this->cp["LocationID"]->GetText()) and !is_bool($this->cp["LocationID"]->GetValue())) 
            $this->cp["LocationID"]->SetValue($this->LocationID->GetValue(true));
        $this->InsertFields["FirstName"]["Value"] = $this->cp["FirstName"]->GetDBValue(true);
        $this->InsertFields["LastName"]["Value"] = $this->cp["LastName"]->GetDBValue(true);
        $this->InsertFields["PositionID"]["Value"] = $this->cp["PositionID"]->GetDBValue(true);
        $this->InsertFields["LocationID"]["Value"] = $this->cp["LocationID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("employees", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @39-B8FB9A16
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["FirstName"] = new clsSQLParameter("ctrlFirstName", ccsText, "", "", $this->FirstName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LastName"] = new clsSQLParameter("ctrlLastName", ccsText, "", "", $this->LastName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PositionID"] = new clsSQLParameter("ctrlPositionID", ccsInteger, "", "", $this->PositionID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LocationID"] = new clsSQLParameter("ctrlLocationID", ccsText, "", "", $this->LocationID->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlEmployeeID", ccsInteger, "", "", CCGetFromGet("EmployeeID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["FirstName"]->GetValue()) and !strlen($this->cp["FirstName"]->GetText()) and !is_bool($this->cp["FirstName"]->GetValue())) 
            $this->cp["FirstName"]->SetValue($this->FirstName->GetValue(true));
        if (!is_null($this->cp["LastName"]->GetValue()) and !strlen($this->cp["LastName"]->GetText()) and !is_bool($this->cp["LastName"]->GetValue())) 
            $this->cp["LastName"]->SetValue($this->LastName->GetValue(true));
        if (!is_null($this->cp["PositionID"]->GetValue()) and !strlen($this->cp["PositionID"]->GetText()) and !is_bool($this->cp["PositionID"]->GetValue())) 
            $this->cp["PositionID"]->SetValue($this->PositionID->GetValue(true));
        if (!is_null($this->cp["LocationID"]->GetValue()) and !strlen($this->cp["LocationID"]->GetText()) and !is_bool($this->cp["LocationID"]->GetValue())) 
            $this->cp["LocationID"]->SetValue($this->LocationID->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "EmployeeID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["FirstName"]["Value"] = $this->cp["FirstName"]->GetDBValue(true);
        $this->UpdateFields["LastName"]["Value"] = $this->cp["LastName"]->GetDBValue(true);
        $this->UpdateFields["PositionID"]["Value"] = $this->cp["PositionID"]->GetDBValue(true);
        $this->UpdateFields["LocationID"]["Value"] = $this->cp["LocationID"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("employees", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @39-DB570EC0
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlEmployeeID", ccsInteger, "", "", CCGetFromGet("EmployeeID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "EmployeeID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
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

} //End employeesDataSource Class @39-FCB6E20C

//Initialize Page @1-F2CF385D
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
$TemplateFileName = "doctors.html";
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

//Include events file @1-51C2F6A2
include_once("./doctors_events.php");
//End Include events file

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
