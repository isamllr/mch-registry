<?php
//Include Common Files @1-2C1C9C21
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "employees_list.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @76-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsGridemployees { //employees class @16-C14505EF

//Variables @16-1ADCBA09

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
    public $Sorter_FirstName;
    public $Sorter_LastName;
    public $Sorter_Position;
    public $Sorter_LocationID;
    public $Sorter_WorkPhone;
    public $Sorter_HandPhone;
    public $Sorter_Email;
    public $Sorter_DepartmentDsc;
//End Variables

//Class_Initialize Event @16-F37DC7CD
    function clsGridemployees($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employees";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employees";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployeesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->Visible = (CCSecurityAccessCheck("2") == "success");
        $this->SorterName = CCGetParam("employeesOrder", "");
        $this->SorterDirection = CCGetParam("employeesDir", "");

        $this->FirstName = new clsControl(ccsLink, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->FirstName->Page = "employees_maint.php";
        $this->LastName = new clsControl(ccsLabel, "LastName", "LastName", ccsText, "", CCGetRequestParam("LastName", ccsGet, NULL), $this);
        $this->Position = new clsControl(ccsLabel, "Position", "Position", ccsText, "", CCGetRequestParam("Position", ccsGet, NULL), $this);
        $this->LocationID = new clsControl(ccsLabel, "LocationID", "LocationID", ccsText, "", CCGetRequestParam("LocationID", ccsGet, NULL), $this);
        $this->WorkPhone = new clsControl(ccsLabel, "WorkPhone", "WorkPhone", ccsText, "", CCGetRequestParam("WorkPhone", ccsGet, NULL), $this);
        $this->HandPhone = new clsControl(ccsLabel, "HandPhone", "HandPhone", ccsText, "", CCGetRequestParam("HandPhone", ccsGet, NULL), $this);
        $this->Email = new clsControl(ccsLabel, "Email", "Email", ccsText, "", CCGetRequestParam("Email", ccsGet, NULL), $this);
        $this->DepartmentID = new clsControl(ccsLabel, "DepartmentID", "DepartmentID", ccsText, "", CCGetRequestParam("DepartmentID", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "employees_maint.php";
        $this->employees_Insert = new clsControl(ccsLink, "employees_Insert", "employees_Insert", ccsText, "", CCGetRequestParam("employees_Insert", ccsGet, NULL), $this);
        $this->employees_Insert->Parameters = CCGetQueryString("QueryString", array("EmployeeID", " LoginID", "ccsForm"));
        $this->employees_Insert->Page = "employees_maint.php";
        $this->Sorter_FirstName = new clsSorter($this->ComponentName, "Sorter_FirstName", $FileName, $this);
        $this->Sorter_LastName = new clsSorter($this->ComponentName, "Sorter_LastName", $FileName, $this);
        $this->Sorter_Position = new clsSorter($this->ComponentName, "Sorter_Position", $FileName, $this);
        $this->Sorter_LocationID = new clsSorter($this->ComponentName, "Sorter_LocationID", $FileName, $this);
        $this->Sorter_WorkPhone = new clsSorter($this->ComponentName, "Sorter_WorkPhone", $FileName, $this);
        $this->Sorter_HandPhone = new clsSorter($this->ComponentName, "Sorter_HandPhone", $FileName, $this);
        $this->Sorter_Email = new clsSorter($this->ComponentName, "Sorter_Email", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->ToExcelLink = new clsControl(ccsLink, "ToExcelLink", "ToExcelLink", ccsText, "", CCGetRequestParam("ToExcelLink", ccsGet, NULL), $this);
        $this->ToExcelLink->Page = "employees_list.php";
        $this->Sorter_DepartmentDsc = new clsSorter($this->ComponentName, "Sorter_DepartmentDsc", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @16-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @16-FF2E5AA3
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_EmployeeID"] = CCGetFromGet("s_EmployeeID", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_LastName"] = CCGetFromGet("s_LastName", NULL);
        $this->DataSource->Parameters["urls_Position"] = CCGetFromGet("s_Position", NULL);
        $this->DataSource->Parameters["urldepartment_DeptID"] = CCGetFromGet("department_DeptID", NULL);

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
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["LastName"] = $this->LastName->Visible;
            $this->ControlsVisible["Position"] = $this->Position->Visible;
            $this->ControlsVisible["LocationID"] = $this->LocationID->Visible;
            $this->ControlsVisible["WorkPhone"] = $this->WorkPhone->Visible;
            $this->ControlsVisible["HandPhone"] = $this->HandPhone->Visible;
            $this->ControlsVisible["Email"] = $this->Email->Visible;
            $this->ControlsVisible["DepartmentID"] = $this->DepartmentID->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                $this->FirstName->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->FirstName->Parameters = CCAddParam($this->FirstName->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->FirstName->Parameters = CCAddParam($this->FirstName->Parameters, "LoginID", $this->DataSource->f("LoginID"));
                $this->LastName->SetValue($this->DataSource->LastName->GetValue());
                $this->Position->SetValue($this->DataSource->Position->GetValue());
                $this->LocationID->SetValue($this->DataSource->LocationID->GetValue());
                $this->WorkPhone->SetValue($this->DataSource->WorkPhone->GetValue());
                $this->HandPhone->SetValue($this->DataSource->HandPhone->GetValue());
                $this->Email->SetValue($this->DataSource->Email->GetValue());
                $this->DepartmentID->SetValue($this->DataSource->DepartmentID->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "LoginID", $this->DataSource->f("LoginID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->FirstName->Show();
                $this->LastName->Show();
                $this->Position->Show();
                $this->LocationID->Show();
                $this->WorkPhone->Show();
                $this->HandPhone->Show();
                $this->Email->Show();
                $this->DepartmentID->Show();
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
        $this->ToExcelLink->Parameters = "";
        $this->ToExcelLink->Parameters = CCAddParam($this->ToExcelLink->Parameters, "export", 1);
        $this->employees_Insert->Show();
        $this->Sorter_FirstName->Show();
        $this->Sorter_LastName->Show();
        $this->Sorter_Position->Show();
        $this->Sorter_LocationID->Show();
        $this->Sorter_WorkPhone->Show();
        $this->Sorter_HandPhone->Show();
        $this->Sorter_Email->Show();
        $this->Navigator->Show();
        $this->ToExcelLink->Show();
        $this->Sorter_DepartmentDsc->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @16-8C8B4C27
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LastName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LocationID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->WorkPhone->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HandPhone->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Email->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DepartmentID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employees Class @16-FCB6E20C

class clsemployeesDataSource extends clsDBregistry_db {  //employeesDataSource Class @16-2A1BA216

//DataSource Variables @16-047D5410
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $FirstName;
    public $LastName;
    public $Position;
    public $LocationID;
    public $WorkPhone;
    public $HandPhone;
    public $Email;
    public $DepartmentID;
//End DataSource Variables

//DataSourceClass_Initialize Event @16-687E7A1A
    function clsemployeesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employees";
        $this->Initialize();
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->LastName = new clsField("LastName", ccsText, "");
        
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->LocationID = new clsField("LocationID", ccsText, "");
        
        $this->WorkPhone = new clsField("WorkPhone", ccsText, "");
        
        $this->HandPhone = new clsField("HandPhone", ccsText, "");
        
        $this->Email = new clsField("Email", ccsText, "");
        
        $this->DepartmentID = new clsField("DepartmentID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @16-84EA4FB8
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "FirstName";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_FirstName" => array("FirstName", ""), 
            "Sorter_LastName" => array("LastName", ""), 
            "Sorter_Position" => array("PositionName", ""), 
            "Sorter_LocationID" => array("FacilityName", ""), 
            "Sorter_WorkPhone" => array("WorkPhone", ""), 
            "Sorter_HandPhone" => array("HandPhone", ""), 
            "Sorter_Email" => array("Email", ""), 
            "Sorter_DepartmentDsc" => array("DepartmentDesc", "")));
    }
//End SetOrder Method

//Prepare Method @16-A82B54DC
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_EmployeeID", ccsText, "", "", $this->Parameters["urls_EmployeeID"], "", false);
        $this->wp->AddParameter("2", "urls_FacilityID", ccsInteger, "", "", $this->Parameters["urls_FacilityID"], "", false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("4", "urls_LastName", ccsText, "", "", $this->Parameters["urls_LastName"], "", false);
        $this->wp->AddParameter("5", "urls_Position", ccsInteger, "", "", $this->Parameters["urls_Position"], "", false);
        $this->wp->AddParameter("6", "urldepartment_DeptID", ccsInteger, "", "", $this->Parameters["urldepartment_DeptID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employees.EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "facilities.FacilityID", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "employees.FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "employees.LastName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "employees.PositionID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opEqual, "department.DeptID", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]);
    }
//End Prepare Method

//Open Method @16-CD1695C5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (((location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID) INNER JOIN department ON\n\n" .
        "location.DeptID = department.DeptID) INNER JOIN position ON\n\n" .
        "employees.PositionID = position.PositionID";
        $this->SQL = "SELECT employees.*, FacilityName, position.*, DepartmentDesc \n\n" .
        "FROM (((location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID) INNER JOIN department ON\n\n" .
        "location.DeptID = department.DeptID) INNER JOIN position ON\n\n" .
        "employees.PositionID = position.PositionID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @16-1735B2D3
    function SetValues()
    {
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->LastName->SetDBValue($this->f("LastName"));
        $this->Position->SetDBValue($this->f("PositionName"));
        $this->LocationID->SetDBValue($this->f("FacilityName"));
        $this->WorkPhone->SetDBValue($this->f("WorkPhone"));
        $this->HandPhone->SetDBValue($this->f("HandPhone"));
        $this->Email->SetDBValue($this->f("Email"));
        $this->DepartmentID->SetDBValue($this->f("DepartmentDesc"));
    }
//End SetValues Method

} //End employeesDataSource Class @16-FCB6E20C

class clsRecordemployeesSearch { //employeesSearch Class @2-E491DF1B

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

//Class_Initialize Event @2-01048425
    function clsRecordemployeesSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employeesSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employeesSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_FirstName = new clsControl(ccsTextBox, "s_FirstName", "s_FirstName", ccsText, "", CCGetRequestParam("s_FirstName", $Method, NULL), $this);
            $this->s_LastName = new clsControl(ccsTextBox, "s_LastName", "s_LastName", ccsText, "", CCGetRequestParam("s_LastName", $Method, NULL), $this);
            $this->s_Position = new clsControl(ccsListBox, "s_Position", "s_Position", ccsInteger, "", CCGetRequestParam("s_Position", $Method, NULL), $this);
            $this->s_Position->DSType = dsTable;
            $this->s_Position->DataSource = new clsDBregistry_db();
            $this->s_Position->ds = & $this->s_Position->DataSource;
            $this->s_Position->DataSource->SQL = "SELECT * \n" .
"FROM position {SQL_Where} {SQL_OrderBy}";
            list($this->s_Position->BoundColumn, $this->s_Position->TextColumn, $this->s_Position->DBFormat) = array("PositionID", "PositionName", "");
            $this->s_FacilityID = new clsControl(ccsListBox, "s_FacilityID", "s_FacilityID", ccsText, "", CCGetRequestParam("s_FacilityID", $Method, NULL), $this);
            $this->s_FacilityID->DSType = dsTable;
            $this->s_FacilityID->DataSource = new clsDBregistry_db();
            $this->s_FacilityID->ds = & $this->s_FacilityID->DataSource;
            $this->s_FacilityID->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            $this->s_FacilityID->DataSource->Order = "FacilityName";
            list($this->s_FacilityID->BoundColumn, $this->s_FacilityID->TextColumn, $this->s_FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->s_FacilityID->DataSource->Order = "FacilityName";
            $this->department_DeptID = new clsControl(ccsListBox, "department_DeptID", "department_DeptID", ccsText, "", CCGetRequestParam("department_DeptID", $Method, NULL), $this);
            $this->department_DeptID->DSType = dsTable;
            $this->department_DeptID->DataSource = new clsDBregistry_db();
            $this->department_DeptID->ds = & $this->department_DeptID->DataSource;
            $this->department_DeptID->DataSource->SQL = "SELECT * \n" .
"FROM department {SQL_Where} {SQL_OrderBy}";
            list($this->department_DeptID->BoundColumn, $this->department_DeptID->TextColumn, $this->department_DeptID->DBFormat) = array("DeptID", "DepartmentDesc", "");
        }
    }
//End Class_Initialize Event

//Validate Method @2-2E6D2685
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_LastName->Validate() && $Validation);
        $Validation = ($this->s_Position->Validate() && $Validation);
        $Validation = ($this->s_FacilityID->Validate() && $Validation);
        $Validation = ($this->department_DeptID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_LastName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Position->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->department_DeptID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-A46A57AC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_LastName->Errors->Count());
        $errors = ($errors || $this->s_Position->Errors->Count());
        $errors = ($errors || $this->s_FacilityID->Errors->Count());
        $errors = ($errors || $this->department_DeptID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
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

//Operation Method @2-0BFED1CF
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
        $Redirect = "employees_list.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "employees_list.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @2-26D656D4
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

        $this->s_Position->Prepare();
        $this->s_FacilityID->Prepare();
        $this->department_DeptID->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_LastName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Position->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->department_DeptID->Errors->ToString());
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
        $this->s_FirstName->Show();
        $this->s_LastName->Show();
        $this->s_Position->Show();
        $this->s_FacilityID->Show();
        $this->department_DeptID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End employeesSearch Class @2-FCB6E20C

class clsGridemployees_admin { //employees_admin class @118-849CF2ED

//Variables @118-9D1FAF47

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
    public $Sorter_FirstName;
    public $Sorter_LastName;
    public $Sorter_Position;
    public $Sorter_LocationID;
    public $Sorter_WorkPhone;
    public $Sorter_HandPhone;
    public $Sorter_Email;
    public $Sorter_DepartmentDsc;
    public $Sorter_login;
//End Variables

//Class_Initialize Event @118-4AC7B055
    function clsGridemployees_admin($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employees_admin";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employees_admin";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployees_adminDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        $this->SorterName = CCGetParam("employees_adminOrder", "");
        $this->SorterDirection = CCGetParam("employees_adminDir", "");

        $this->FirstName = new clsControl(ccsLink, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->FirstName->Page = "employees_maint.php";
        $this->LastName = new clsControl(ccsLabel, "LastName", "LastName", ccsText, "", CCGetRequestParam("LastName", ccsGet, NULL), $this);
        $this->Position = new clsControl(ccsLabel, "Position", "Position", ccsText, "", CCGetRequestParam("Position", ccsGet, NULL), $this);
        $this->LocationID = new clsControl(ccsLabel, "LocationID", "LocationID", ccsText, "", CCGetRequestParam("LocationID", ccsGet, NULL), $this);
        $this->WorkPhone = new clsControl(ccsLabel, "WorkPhone", "WorkPhone", ccsText, "", CCGetRequestParam("WorkPhone", ccsGet, NULL), $this);
        $this->HandPhone = new clsControl(ccsLabel, "HandPhone", "HandPhone", ccsText, "", CCGetRequestParam("HandPhone", ccsGet, NULL), $this);
        $this->Email = new clsControl(ccsLabel, "Email", "Email", ccsText, "", CCGetRequestParam("Email", ccsGet, NULL), $this);
        $this->DepartmentID = new clsControl(ccsLabel, "DepartmentID", "DepartmentID", ccsText, "", CCGetRequestParam("DepartmentID", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "employees_maint.php";
        $this->login = new clsControl(ccsLink, "login", "login", ccsText, "", CCGetRequestParam("login", ccsGet, NULL), $this);
        $this->login->Page = "employees_maint.php";
        $this->employees_Insert = new clsControl(ccsLink, "employees_Insert", "employees_Insert", ccsText, "", CCGetRequestParam("employees_Insert", ccsGet, NULL), $this);
        $this->employees_Insert->Parameters = CCGetQueryString("QueryString", array("EmployeeID", " LoginID", "ccsForm"));
        $this->employees_Insert->Page = "employees_maint.php";
        $this->Sorter_FirstName = new clsSorter($this->ComponentName, "Sorter_FirstName", $FileName, $this);
        $this->Sorter_LastName = new clsSorter($this->ComponentName, "Sorter_LastName", $FileName, $this);
        $this->Sorter_Position = new clsSorter($this->ComponentName, "Sorter_Position", $FileName, $this);
        $this->Sorter_LocationID = new clsSorter($this->ComponentName, "Sorter_LocationID", $FileName, $this);
        $this->Sorter_WorkPhone = new clsSorter($this->ComponentName, "Sorter_WorkPhone", $FileName, $this);
        $this->Sorter_HandPhone = new clsSorter($this->ComponentName, "Sorter_HandPhone", $FileName, $this);
        $this->Sorter_Email = new clsSorter($this->ComponentName, "Sorter_Email", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->ToExcelLink = new clsControl(ccsLink, "ToExcelLink", "ToExcelLink", ccsText, "", CCGetRequestParam("ToExcelLink", ccsGet, NULL), $this);
        $this->ToExcelLink->Page = "employees_list.php";
        $this->Sorter_DepartmentDsc = new clsSorter($this->ComponentName, "Sorter_DepartmentDsc", $FileName, $this);
        $this->Sorter_login = new clsSorter($this->ComponentName, "Sorter_login", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @118-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @118-1B637F2A
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_EmployeeID"] = CCGetFromGet("s_EmployeeID", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_LastName"] = CCGetFromGet("s_LastName", NULL);
        $this->DataSource->Parameters["urls_Position"] = CCGetFromGet("s_Position", NULL);
        $this->DataSource->Parameters["urldepartment_DeptID"] = CCGetFromGet("department_DeptID", NULL);

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
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["LastName"] = $this->LastName->Visible;
            $this->ControlsVisible["Position"] = $this->Position->Visible;
            $this->ControlsVisible["LocationID"] = $this->LocationID->Visible;
            $this->ControlsVisible["WorkPhone"] = $this->WorkPhone->Visible;
            $this->ControlsVisible["HandPhone"] = $this->HandPhone->Visible;
            $this->ControlsVisible["Email"] = $this->Email->Visible;
            $this->ControlsVisible["DepartmentID"] = $this->DepartmentID->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            $this->ControlsVisible["login"] = $this->login->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                $this->FirstName->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->FirstName->Parameters = CCAddParam($this->FirstName->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->FirstName->Parameters = CCAddParam($this->FirstName->Parameters, "LoginID", $this->DataSource->f("LoginID"));
                $this->LastName->SetValue($this->DataSource->LastName->GetValue());
                $this->Position->SetValue($this->DataSource->Position->GetValue());
                $this->LocationID->SetValue($this->DataSource->LocationID->GetValue());
                $this->WorkPhone->SetValue($this->DataSource->WorkPhone->GetValue());
                $this->HandPhone->SetValue($this->DataSource->HandPhone->GetValue());
                $this->Email->SetValue($this->DataSource->Email->GetValue());
                $this->DepartmentID->SetValue($this->DataSource->DepartmentID->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "LoginID", $this->DataSource->f("LoginID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->login->SetValue($this->DataSource->login->GetValue());
                $this->login->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->login->Parameters = CCAddParam($this->login->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->login->Parameters = CCAddParam($this->login->Parameters, "LoginID", $this->DataSource->f("LoginID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->FirstName->Show();
                $this->LastName->Show();
                $this->Position->Show();
                $this->LocationID->Show();
                $this->WorkPhone->Show();
                $this->HandPhone->Show();
                $this->Email->Show();
                $this->DepartmentID->Show();
                $this->ImageLink1->Show();
                $this->login->Show();
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
        $this->ToExcelLink->Parameters = "";
        $this->ToExcelLink->Parameters = CCAddParam($this->ToExcelLink->Parameters, "export", 1);
        $this->employees_Insert->Show();
        $this->Sorter_FirstName->Show();
        $this->Sorter_LastName->Show();
        $this->Sorter_Position->Show();
        $this->Sorter_LocationID->Show();
        $this->Sorter_WorkPhone->Show();
        $this->Sorter_HandPhone->Show();
        $this->Sorter_Email->Show();
        $this->Navigator->Show();
        $this->ToExcelLink->Show();
        $this->Sorter_DepartmentDsc->Show();
        $this->Sorter_login->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @118-3FC5CD47
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LastName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LocationID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->WorkPhone->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HandPhone->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Email->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DepartmentID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->login->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employees_admin Class @118-FCB6E20C

class clsemployees_adminDataSource extends clsDBregistry_db {  //employees_adminDataSource Class @118-6E82FF4F

//DataSource Variables @118-27AD4D4F
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $FirstName;
    public $LastName;
    public $Position;
    public $LocationID;
    public $WorkPhone;
    public $HandPhone;
    public $Email;
    public $DepartmentID;
    public $login;
//End DataSource Variables

//DataSourceClass_Initialize Event @118-6F211047
    function clsemployees_adminDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employees_admin";
        $this->Initialize();
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->LastName = new clsField("LastName", ccsText, "");
        
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->LocationID = new clsField("LocationID", ccsText, "");
        
        $this->WorkPhone = new clsField("WorkPhone", ccsText, "");
        
        $this->HandPhone = new clsField("HandPhone", ccsText, "");
        
        $this->Email = new clsField("Email", ccsText, "");
        
        $this->DepartmentID = new clsField("DepartmentID", ccsText, "");
        
        $this->login = new clsField("login", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @118-8C5CB2A9
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "FirstName";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_FirstName" => array("FirstName", ""), 
            "Sorter_LastName" => array("LastName", ""), 
            "Sorter_Position" => array("PositionName", ""), 
            "Sorter_LocationID" => array("FacilityName", ""), 
            "Sorter_WorkPhone" => array("WorkPhone", ""), 
            "Sorter_HandPhone" => array("HandPhone", ""), 
            "Sorter_Email" => array("Email", ""), 
            "Sorter_DepartmentDsc" => array("DepartmentDesc", ""), 
            "Sorter_login" => array("FirstName", "")));
    }
//End SetOrder Method

//Prepare Method @118-A82B54DC
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_EmployeeID", ccsText, "", "", $this->Parameters["urls_EmployeeID"], "", false);
        $this->wp->AddParameter("2", "urls_FacilityID", ccsInteger, "", "", $this->Parameters["urls_FacilityID"], "", false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("4", "urls_LastName", ccsText, "", "", $this->Parameters["urls_LastName"], "", false);
        $this->wp->AddParameter("5", "urls_Position", ccsInteger, "", "", $this->Parameters["urls_Position"], "", false);
        $this->wp->AddParameter("6", "urldepartment_DeptID", ccsInteger, "", "", $this->Parameters["urldepartment_DeptID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employees.EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "facilities.FacilityID", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "employees.FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "employees.LastName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "employees.PositionID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opEqual, "department.DeptID", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]);
    }
//End Prepare Method

//Open Method @118-BFA4FA5A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM ((((location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID) INNER JOIN department ON\n\n" .
        "location.DeptID = department.DeptID) INNER JOIN position ON\n\n" .
        "employees.PositionID = position.PositionID) RIGHT JOIN login ON\n\n" .
        "employees.LoginID = login.LoginID";
        $this->SQL = "SELECT employees.*, FacilityName, position.*, DepartmentDesc, username \n\n" .
        "FROM ((((location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID) INNER JOIN department ON\n\n" .
        "location.DeptID = department.DeptID) INNER JOIN position ON\n\n" .
        "employees.PositionID = position.PositionID) RIGHT JOIN login ON\n\n" .
        "employees.LoginID = login.LoginID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @118-43AECDA7
    function SetValues()
    {
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->LastName->SetDBValue($this->f("LastName"));
        $this->Position->SetDBValue($this->f("PositionName"));
        $this->LocationID->SetDBValue($this->f("FacilityName"));
        $this->WorkPhone->SetDBValue($this->f("WorkPhone"));
        $this->HandPhone->SetDBValue($this->f("HandPhone"));
        $this->Email->SetDBValue($this->f("Email"));
        $this->DepartmentID->SetDBValue($this->f("DepartmentDesc"));
        $this->login->SetDBValue($this->f("username"));
    }
//End SetValues Method

} //End employees_adminDataSource Class @118-FCB6E20C



//Initialize Page @1-703588EC
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
$TemplateFileName = "employees_list.html";
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

//Include events file @1-8D325805
include_once("./employees_list_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-02E674E0
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$employees = new clsGridemployees("", $MainPage);
$employeesSearch = new clsRecordemployeesSearch("", $MainPage);
$employees_admin = new clsGridemployees_admin("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->employees = & $employees;
$MainPage->employeesSearch = & $employeesSearch;
$MainPage->employees_admin = & $employees_admin;
$employees->Initialize();
$employees_admin->Initialize();

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

//Execute Components @1-8DE8335C
$topmenu->Operations();
$employeesSearch->Operation();
//End Execute Components

//Go to destination page @1-4F518057
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($employees);
    unset($employeesSearch);
    unset($employees_admin);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A8AC76B1
$topmenu->Show();
$employees->Show();
$employeesSearch->Show();
$employees_admin->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-26F02479
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($employees);
unset($employeesSearch);
unset($employees_admin);
unset($Tpl);
//End Unload Page


?>
