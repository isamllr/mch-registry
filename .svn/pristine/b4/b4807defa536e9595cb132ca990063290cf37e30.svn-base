<?php
//Include Common Files @1-2D550622
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "doctors_list.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsGridemployees_facilities_loca1 { //employees_facilities_loca1 class @3-D86FFAAE

//Variables @3-3AE13575

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
    public $Sorter_location_FacilityID;
//End Variables

//Class_Initialize Event @3-8BE9A793
    function clsGridemployees_facilities_loca1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employees_facilities_loca1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employees_facilities_loca1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployees_facilities_loca1DataSource($this);
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
        $this->SorterName = CCGetParam("employees_facilities_loca1Order", "");
        $this->SorterDirection = CCGetParam("employees_facilities_loca1Dir", "");

        $this->FirstName = new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->LastName = new clsControl(ccsLabel, "LastName", "LastName", ccsText, "", CCGetRequestParam("LastName", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "doctors.php";
        $this->location_FacilityID = new clsControl(ccsLabel, "location_FacilityID", "location_FacilityID", ccsText, "", CCGetRequestParam("location_FacilityID", ccsGet, NULL), $this);
        $this->employees_facilities_loca1_TotalRecords = new clsControl(ccsLabel, "employees_facilities_loca1_TotalRecords", "employees_facilities_loca1_TotalRecords", ccsText, "", CCGetRequestParam("employees_facilities_loca1_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_FirstName = new clsSorter($this->ComponentName, "Sorter_FirstName", $FileName, $this);
        $this->Sorter_LastName = new clsSorter($this->ComponentName, "Sorter_LastName", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Sorter_location_FacilityID = new clsSorter($this->ComponentName, "Sorter_location_FacilityID", $FileName, $this);
        $this->employees_Insert = new clsControl(ccsLink, "employees_Insert", "employees_Insert", ccsText, "", CCGetRequestParam("employees_Insert", ccsGet, NULL), $this);
        $this->employees_Insert->Parameters = CCGetQueryString("QueryString", array("EmployeeID", "ccsForm"));
        $this->employees_Insert->Page = "doctors.php";
    }
//End Class_Initialize Event

//Initialize Method @3-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @3-97E2D1C2
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_LastName"] = CCGetFromGet("s_LastName", NULL);
        $this->DataSource->Parameters["urls_location_FacilityID"] = CCGetFromGet("s_location_FacilityID", NULL);
        $this->DataSource->Parameters["urlLoginID"] = CCGetFromGet("LoginID", NULL);

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
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            $this->ControlsVisible["location_FacilityID"] = $this->location_FacilityID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                $this->LastName->SetValue($this->DataSource->LastName->GetValue());
                $this->ImageLink1->Parameters = "";
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->location_FacilityID->SetValue($this->DataSource->location_FacilityID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->FirstName->Show();
                $this->LastName->Show();
                $this->ImageLink1->Show();
                $this->location_FacilityID->Show();
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
        $this->employees_facilities_loca1_TotalRecords->Show();
        $this->Sorter_FirstName->Show();
        $this->Sorter_LastName->Show();
        $this->Navigator->Show();
        $this->Sorter_location_FacilityID->Show();
        $this->employees_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-2823E1DD
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LastName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->location_FacilityID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employees_facilities_loca1 Class @3-FCB6E20C

class clsemployees_facilities_loca1DataSource extends clsDBregistry_db {  //employees_facilities_loca1DataSource Class @3-A432ED97

//DataSource Variables @3-35835EA8
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
    public $location_FacilityID;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-466095D0
    function clsemployees_facilities_loca1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employees_facilities_loca1";
        $this->Initialize();
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->LastName = new clsField("LastName", ccsText, "");
        
        $this->location_FacilityID = new clsField("location_FacilityID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-8A581F99
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_FirstName" => array("FirstName", ""), 
            "Sorter_LastName" => array("LastName", ""), 
            "Sorter_location_FacilityID" => array("location.FacilityID", "")));
    }
//End SetOrder Method

//Prepare Method @3-461DC2C5
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("2", "urls_LastName", ccsText, "", "", $this->Parameters["urls_LastName"], "", false);
        $this->wp->AddParameter("3", "urls_location_FacilityID", ccsInteger, "", "", $this->Parameters["urls_location_FacilityID"], "", false);
        $this->wp->AddParameter("4", "urlLoginID", ccsInteger, "", "", $this->Parameters["urlLoginID"], "", true);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "employees.FirstName", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "employees.LastName", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "location.FacilityID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opIsNull, "employees.LoginID", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger),true);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]);
    }
//End Prepare Method

//Open Method @3-C7D99964
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID";
        $this->SQL = "SELECT EmployeeID, FirstName, LastName, location.FacilityID AS location_FacilityID, FacilityName, facilities.FacilityID AS facilities_FacilityID \n\n" .
        "FROM (location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-E8140C35
    function SetValues()
    {
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->LastName->SetDBValue($this->f("LastName"));
        $this->location_FacilityID->SetDBValue($this->f("FacilityName"));
    }
//End SetValues Method

} //End employees_facilities_loca1DataSource Class @3-FCB6E20C

class clsRecordemployees_facilities_loca { //employees_facilities_loca Class @9-1207BD64

//Variables @9-9E315808

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

//Class_Initialize Event @9-85CEBD29
    function clsRecordemployees_facilities_loca($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employees_facilities_loca/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employees_facilities_loca";
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
            $this->s_location_FacilityID = new clsControl(ccsListBox, "s_location_FacilityID", "s_location_FacilityID", ccsInteger, "", CCGetRequestParam("s_location_FacilityID", $Method, NULL), $this);
            $this->s_location_FacilityID->DSType = dsTable;
            $this->s_location_FacilityID->DataSource = new clsDBregistry_db();
            $this->s_location_FacilityID->ds = & $this->s_location_FacilityID->DataSource;
            $this->s_location_FacilityID->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            list($this->s_location_FacilityID->BoundColumn, $this->s_location_FacilityID->TextColumn, $this->s_location_FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
        }
    }
//End Class_Initialize Event

//Validate Method @9-7B330F1B
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_LastName->Validate() && $Validation);
        $Validation = ($this->s_location_FacilityID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_LastName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_location_FacilityID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @9-437124FD
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_LastName->Errors->Count());
        $errors = ($errors || $this->s_location_FacilityID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @9-ED598703
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

//Operation Method @9-FEA2C274
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
        $Redirect = "doctors_list.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "doctors_list.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @9-16EDA705
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

        $this->s_location_FacilityID->Prepare();

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
            $Error = ComposeStrings($Error, $this->s_location_FacilityID->Errors->ToString());
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
        $this->s_location_FacilityID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End employees_facilities_loca Class @9-FCB6E20C

//Initialize Page @1-3C7B00B0
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
$TemplateFileName = "doctors_list.html";
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

//Include events file @1-F79F4BE7
include_once("./doctors_list_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-791CBAE1
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$employees_facilities_loca1 = new clsGridemployees_facilities_loca1("", $MainPage);
$employees_facilities_loca = new clsRecordemployees_facilities_loca("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->employees_facilities_loca1 = & $employees_facilities_loca1;
$MainPage->employees_facilities_loca = & $employees_facilities_loca;
$employees_facilities_loca1->Initialize();

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

//Execute Components @1-75EF711C
$topmenu->Operations();
$employees_facilities_loca->Operation();
//End Execute Components

//Go to destination page @1-693AB85C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($employees_facilities_loca1);
    unset($employees_facilities_loca);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-FA9D3B9E
$topmenu->Show();
$employees_facilities_loca1->Show();
$employees_facilities_loca->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-F6A81F4F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($employees_facilities_loca1);
unset($employees_facilities_loca);
unset($Tpl);
//End Unload Page


?>
