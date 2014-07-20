<?php
//Include Common Files @1-77A10EB8
define("RelativePath", "..");
define("PathToCurrentPage", "/services/");
define("FileName", "ProvinceID_from_Countries_PTDependentListBox.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridcountries_province { //countries_province class @2-01012286

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

//Class_Initialize Event @2-A3489046
    function clsGridcountries_province($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "countries_province";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid countries_province";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clscountries_provinceDataSource($this);
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

        $this->ProvinceID = new clsControl(ccsLabel, "ProvinceID", "ProvinceID", ccsInteger, "", CCGetRequestParam("ProvinceID", ccsGet, NULL), $this);
        $this->ProvinceName = new clsControl(ccsLabel, "ProvinceName", "ProvinceName", ccsText, "", CCGetRequestParam("ProvinceName", ccsGet, NULL), $this);
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

//Show Method @2-7299FC96
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlkeyword"] = CCGetFromGet("keyword", NULL);

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
            $this->ControlsVisible["ProvinceID"] = $this->ProvinceID->Visible;
            $this->ControlsVisible["ProvinceName"] = $this->ProvinceName->Visible;
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
                $this->ProvinceID->SetValue($this->DataSource->ProvinceID->GetValue());
                $this->ProvinceName->SetValue($this->DataSource->ProvinceName->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->ProvinceID->Show();
                $this->ProvinceName->Show();
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

//GetErrors Method @2-26FF1042
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ProvinceID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ProvinceName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End countries_province Class @2-FCB6E20C

class clscountries_provinceDataSource extends clsDBregistry_db {  //countries_provinceDataSource Class @2-3C293502

//DataSource Variables @2-F1294695
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $ProvinceID;
    public $ProvinceName;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-30395DE1
    function clscountries_provinceDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid countries_province";
        $this->Initialize();
        $this->ProvinceID = new clsField("ProvinceID", ccsInteger, "");
        
        $this->ProvinceName = new clsField("ProvinceName", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-EEBD6658
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "ProvinceName";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-A37CDC51
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlkeyword", ccsInteger, "", "", $this->Parameters["urlkeyword"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "province.CountryID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-C287EAB9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM province INNER JOIN countries ON\n\n" .
        "province.CountryID = countries.CountryID";
        $this->SQL = "SELECT * \n\n" .
        "FROM province INNER JOIN countries ON\n\n" .
        "province.CountryID = countries.CountryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-3370CC18
    function SetValues()
    {
        $this->ProvinceID->SetDBValue(trim($this->f("ProvinceID")));
        $this->ProvinceName->SetDBValue($this->f("ProvinceName"));
    }
//End SetValues Method

} //End countries_provinceDataSource Class @2-FCB6E20C



//Initialize Page @1-09A6E32B
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
$TemplateFileName = "ProvinceID_from_Countries_PTDependentListBox.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1251";
$ContentType = "text/html";
$PathToRoot = "../";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-FD38FCE9
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$countries_province = new clsGridcountries_province("", $MainPage);
$MainPage->countries_province = & $countries_province;
$countries_province->Initialize();

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

//Go to destination page @1-531399E8
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    unset($countries_province);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-FECC6F8D
$countries_province->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-A1EAE35A
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
unset($countries_province);
unset($Tpl);
//End Unload Page


?>
