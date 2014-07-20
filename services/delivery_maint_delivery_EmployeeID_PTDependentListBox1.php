<?php
//Include Common Files @1-4825FF89
define("RelativePath", "..");
define("PathToCurrentPage", "/services/");
define("FileName", "delivery_maint_delivery_EmployeeID_PTDependentListBox1.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridemployees_position_facili { //employees_position_facili class @2-0FDBCCF5

//Variables @2-6E51DF5A

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
//End Variables

//Class_Initialize Event @2-D575D167
    function clsGridemployees_position_facili($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employees_position_facili";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employees_position_facili";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployees_position_faciliDataSource($this);
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

        $this->EmployeeID = new clsControl(ccsLabel, "EmployeeID", "EmployeeID", ccsInteger, "", CCGetRequestParam("EmployeeID", ccsGet, NULL), $this);
        $this->Doctor = new clsControl(ccsLabel, "Doctor", "Doctor", ccsText, "", CCGetRequestParam("Doctor", ccsGet, NULL), $this);
    }
//End Class_Initialize Event

//Initialize Method @2-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @2-CEF498D9
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlkeyword"] = CCGetFromGet("keyword", NULL);
        $this->DataSource->Parameters["expr473"] = "1";

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
            $this->ControlsVisible["EmployeeID"] = $this->EmployeeID->Visible;
            $this->ControlsVisible["Doctor"] = $this->Doctor->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                // Parse Separator
                if($this->RowNumber) {
                    $this->Attributes->Show();
                    $Tpl->parseto("Separator", true, "Row");
                }
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                $this->Doctor->SetValue($this->DataSource->Doctor->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show();
                $this->Doctor->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-3D5D7539
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Doctor->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employees_position_facili Class @2-FCB6E20C

class clsemployees_position_faciliDataSource extends clsDBregistry_db {  //employees_position_faciliDataSource Class @2-904BFEBF

//DataSource Variables @2-770CCC12
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $EmployeeID;
    public $Doctor;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-83D0D4B9
    function clsemployees_position_faciliDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employees_position_facili";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->Doctor = new clsField("Doctor", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-011206A3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlkeyword", ccsInteger, "", "", $this->Parameters["urlkeyword"], "", true);
        $this->wp->AddParameter("2", "expr473", ccsInteger, "", "", $this->Parameters["expr473"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "location.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),true);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "position.PositionID", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @2-0536A3A3
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM ((location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID) INNER JOIN position ON\n\n" .
        "position.PositionID = employees.PositionID";
        $this->SQL = "SELECT CONCAT(FirstName, \" \", LastName, \" (\",PositionName, \")\" ) AS Doctor, EmployeeID, position.*, facilities.*, location.* \n\n" .
        "FROM ((location INNER JOIN employees ON\n\n" .
        "employees.LocationID = location.LocationID) INNER JOIN facilities ON\n\n" .
        "location.FacilityID = facilities.FacilityID) INNER JOIN position ON\n\n" .
        "position.PositionID = employees.PositionID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-075B3114
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->Doctor->SetDBValue($this->f("Doctor"));
    }
//End SetValues Method

} //End employees_position_faciliDataSource Class @2-FCB6E20C

//Initialize Page @1-9376E16F
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
$TemplateFileName = "delivery_maint_delivery_EmployeeID_PTDependentListBox1.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1251";
$ContentType = "text/html";
$PathToRoot = "../";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-CAE409DC
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employees_position_facili = new clsGridemployees_position_facili("", $MainPage);
$MainPage->employees_position_facili = & $employees_position_facili;
$employees_position_facili->Initialize();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-A4A8A84C
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
$Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1251", "replace");
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Go to destination page @1-0D28144C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    unset($employees_position_facili);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-013DE74D
$employees_position_facili->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2C8C7036
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
unset($employees_position_facili);
unset($Tpl);
//End Unload Page


?>
