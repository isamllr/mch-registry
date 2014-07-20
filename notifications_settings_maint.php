<?php
//Include Common Files @1-0FC3C0F6
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "notifications_settings_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @11-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsGridcountries_districts_facil1 { //countries_districts_facil1 class @80-4DE50C27

//Variables @80-012D3538

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
    public $Sorter_FacilityName;
    public $Sorter_ProvinceName;
    public $Sorter_DistrictName;
    public $Sorter_Country;
//End Variables

//Class_Initialize Event @80-EDFFE685
    function clsGridcountries_districts_facil1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "countries_districts_facil1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid countries_districts_facil1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clscountries_districts_facil1DataSource($this);
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
        $this->SorterName = CCGetParam("countries_districts_facil1Order", "");
        $this->SorterDirection = CCGetParam("countries_districts_facil1Dir", "");

        $this->FacilityName = new clsControl(ccsLink, "FacilityName", "FacilityName", ccsText, "", CCGetRequestParam("FacilityName", ccsGet, NULL), $this);
        $this->FacilityName->Page = "notifications_settings_maint.php";
        $this->ProvinceName = new clsControl(ccsLabel, "ProvinceName", "ProvinceName", ccsText, "", CCGetRequestParam("ProvinceName", ccsGet, NULL), $this);
        $this->DistrictName = new clsControl(ccsLabel, "DistrictName", "DistrictName", ccsText, "", CCGetRequestParam("DistrictName", ccsGet, NULL), $this);
        $this->Country = new clsControl(ccsLabel, "Country", "Country", ccsText, "", CCGetRequestParam("Country", ccsGet, NULL), $this);
        $this->Sorter_FacilityName = new clsSorter($this->ComponentName, "Sorter_FacilityName", $FileName, $this);
        $this->Sorter_ProvinceName = new clsSorter($this->ComponentName, "Sorter_ProvinceName", $FileName, $this);
        $this->Sorter_DistrictName = new clsSorter($this->ComponentName, "Sorter_DistrictName", $FileName, $this);
        $this->Sorter_Country = new clsSorter($this->ComponentName, "Sorter_Country", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @80-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @80-C5E5CA31
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_countries_CountryID"] = CCGetFromGet("s_countries_CountryID", NULL);
        $this->DataSource->Parameters["urls_province_ProvinceID"] = CCGetFromGet("s_province_ProvinceID", NULL);
        $this->DataSource->Parameters["urls_districts_DistrictID"] = CCGetFromGet("s_districts_DistrictID", NULL);
        $this->DataSource->Parameters["urls_FacilityName"] = CCGetFromGet("s_FacilityName", NULL);

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
            $this->ControlsVisible["FacilityName"] = $this->FacilityName->Visible;
            $this->ControlsVisible["ProvinceName"] = $this->ProvinceName->Visible;
            $this->ControlsVisible["DistrictName"] = $this->DistrictName->Visible;
            $this->ControlsVisible["Country"] = $this->Country->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
                $this->FacilityName->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->FacilityName->Parameters = CCAddParam($this->FacilityName->Parameters, "FacilityID", $this->DataSource->f("FacilityID"));
                $this->ProvinceName->SetValue($this->DataSource->ProvinceName->GetValue());
                $this->DistrictName->SetValue($this->DataSource->DistrictName->GetValue());
                $this->Country->SetValue($this->DataSource->Country->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->FacilityName->Show();
                $this->ProvinceName->Show();
                $this->DistrictName->Show();
                $this->Country->Show();
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
        $this->Sorter_FacilityName->Show();
        $this->Sorter_ProvinceName->Show();
        $this->Sorter_DistrictName->Show();
        $this->Sorter_Country->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @80-94B0D790
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ProvinceName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DistrictName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Country->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End countries_districts_facil1 Class @80-FCB6E20C

class clscountries_districts_facil1DataSource extends clsDBregistry_db {  //countries_districts_facil1DataSource Class @80-8F8ECF96

//DataSource Variables @80-9680092C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $FacilityName;
    public $ProvinceName;
    public $DistrictName;
    public $Country;
//End DataSource Variables

//DataSourceClass_Initialize Event @80-15050FD7
    function clscountries_districts_facil1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid countries_districts_facil1";
        $this->Initialize();
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->ProvinceName = new clsField("ProvinceName", ccsText, "");
        
        $this->DistrictName = new clsField("DistrictName", ccsText, "");
        
        $this->Country = new clsField("Country", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @80-F7E49927
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_FacilityName" => array("FacilityName", ""), 
            "Sorter_ProvinceName" => array("ProvinceName", ""), 
            "Sorter_DistrictName" => array("DistrictName", ""), 
            "Sorter_Country" => array("Country", "")));
    }
//End SetOrder Method

//Prepare Method @80-3390EDA3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_countries_CountryID", ccsInteger, "", "", $this->Parameters["urls_countries_CountryID"], "", false);
        $this->wp->AddParameter("2", "urls_province_ProvinceID", ccsInteger, "", "", $this->Parameters["urls_province_ProvinceID"], "", false);
        $this->wp->AddParameter("3", "urls_districts_DistrictID", ccsInteger, "", "", $this->Parameters["urls_districts_DistrictID"], "", false);
        $this->wp->AddParameter("4", "urls_FacilityName", ccsText, "", "", $this->Parameters["urls_FacilityName"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "countries.CountryID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "province.ProvinceID", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "districts.DistrictID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "facilities.FacilityName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
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

//Open Method @80-DA4BE272
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM ((districts INNER JOIN province ON\n\n" .
        "districts.ProvinceID = province.ProvinceID) INNER JOIN facilities ON\n\n" .
        "facilities.DistrictID = districts.DistrictID) INNER JOIN countries ON\n\n" .
        "province.CountryID = countries.CountryID";
        $this->SQL = "SELECT FacilityID, FacilityName, ProvinceName, DistrictName, Country \n\n" .
        "FROM ((districts INNER JOIN province ON\n\n" .
        "districts.ProvinceID = province.ProvinceID) INNER JOIN facilities ON\n\n" .
        "facilities.DistrictID = districts.DistrictID) INNER JOIN countries ON\n\n" .
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

//SetValues Method @80-8EEE0BFD
    function SetValues()
    {
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->ProvinceName->SetDBValue($this->f("ProvinceName"));
        $this->DistrictName->SetDBValue($this->f("DistrictName"));
        $this->Country->SetDBValue($this->f("Country"));
    }
//End SetValues Method

} //End countries_districts_facil1DataSource Class @80-FCB6E20C



class clsRecordcountries_districts_facil { //countries_districts_facil Class @88-27BBB6AC

//Variables @88-9E315808

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

//Class_Initialize Event @88-EEE3C5EF
    function clsRecordcountries_districts_facil($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record countries_districts_facil/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "countries_districts_facil";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_countries_CountryID = new clsControl(ccsListBox, "s_countries_CountryID", "s_countries_CountryID", ccsInteger, "", CCGetRequestParam("s_countries_CountryID", $Method, NULL), $this);
            $this->s_countries_CountryID->DSType = dsTable;
            $this->s_countries_CountryID->DataSource = new clsDBregistry_db();
            $this->s_countries_CountryID->ds = & $this->s_countries_CountryID->DataSource;
            $this->s_countries_CountryID->DataSource->SQL = "SELECT * \n" .
"FROM countries {SQL_Where} {SQL_OrderBy}";
            list($this->s_countries_CountryID->BoundColumn, $this->s_countries_CountryID->TextColumn, $this->s_countries_CountryID->DBFormat) = array("CountryID", "Country", "");
            $this->s_province_ProvinceID = new clsControl(ccsListBox, "s_province_ProvinceID", "s_province_ProvinceID", ccsInteger, "", CCGetRequestParam("s_province_ProvinceID", $Method, NULL), $this);
            $this->s_province_ProvinceID->DSType = dsTable;
            $this->s_province_ProvinceID->DataSource = new clsDBregistry_db();
            $this->s_province_ProvinceID->ds = & $this->s_province_ProvinceID->DataSource;
            $this->s_province_ProvinceID->DataSource->SQL = "SELECT * \n" .
"FROM province {SQL_Where} {SQL_OrderBy}";
            list($this->s_province_ProvinceID->BoundColumn, $this->s_province_ProvinceID->TextColumn, $this->s_province_ProvinceID->DBFormat) = array("ProvinceID", "ProvinceName", "");
            $this->s_districts_DistrictID = new clsControl(ccsListBox, "s_districts_DistrictID", "s_districts_DistrictID", ccsInteger, "", CCGetRequestParam("s_districts_DistrictID", $Method, NULL), $this);
            $this->s_districts_DistrictID->DSType = dsTable;
            $this->s_districts_DistrictID->DataSource = new clsDBregistry_db();
            $this->s_districts_DistrictID->ds = & $this->s_districts_DistrictID->DataSource;
            $this->s_districts_DistrictID->DataSource->SQL = "SELECT * \n" .
"FROM districts {SQL_Where} {SQL_OrderBy}";
            list($this->s_districts_DistrictID->BoundColumn, $this->s_districts_DistrictID->TextColumn, $this->s_districts_DistrictID->DBFormat) = array("DistrictID", "DistrictName", "");
            $this->s_FacilityName = new clsControl(ccsTextBox, "s_FacilityName", "s_FacilityName", ccsText, "", CCGetRequestParam("s_FacilityName", $Method, NULL), $this);
            $this->facilities_countries_provPageSize = new clsControl(ccsListBox, "facilities_countries_provPageSize", "facilities_countries_provPageSize", ccsText, "", CCGetRequestParam("facilities_countries_provPageSize", $Method, NULL), $this);
            $this->facilities_countries_provPageSize->DSType = dsListOfValues;
            $this->facilities_countries_provPageSize->Values = array(array("", $CCSLocales->GetText("CCS_SelectValue")), array("5", "5"), array("10", "10"), array("25", "25"), array("100", "100"));
        }
    }
//End Class_Initialize Event

//Validate Method @88-162C19B1
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_countries_CountryID->Validate() && $Validation);
        $Validation = ($this->s_province_ProvinceID->Validate() && $Validation);
        $Validation = ($this->s_districts_DistrictID->Validate() && $Validation);
        $Validation = ($this->s_FacilityName->Validate() && $Validation);
        $Validation = ($this->facilities_countries_provPageSize->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_countries_CountryID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_province_ProvinceID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_districts_DistrictID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FacilityName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->facilities_countries_provPageSize->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @88-5CDBC762
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_countries_CountryID->Errors->Count());
        $errors = ($errors || $this->s_province_ProvinceID->Errors->Count());
        $errors = ($errors || $this->s_districts_DistrictID->Errors->Count());
        $errors = ($errors || $this->s_FacilityName->Errors->Count());
        $errors = ($errors || $this->facilities_countries_provPageSize->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @88-ED598703
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

//Operation Method @88-F58FE3FF
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
        $Redirect = "notifications_settings_maint.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "notifications_settings_maint.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @88-6FB7D973
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

        $this->s_countries_CountryID->Prepare();
        $this->s_province_ProvinceID->Prepare();
        $this->s_districts_DistrictID->Prepare();
        $this->facilities_countries_provPageSize->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_countries_CountryID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_province_ProvinceID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_districts_DistrictID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FacilityName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->facilities_countries_provPageSize->Errors->ToString());
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
        $this->s_countries_CountryID->Show();
        $this->s_province_ProvinceID->Show();
        $this->s_districts_DistrictID->Show();
        $this->s_FacilityName->Show();
        $this->facilities_countries_provPageSize->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End countries_districts_facil Class @88-FCB6E20C

//DEL      function Validate()
//DEL      {
//DEL          global $CCSLocales;
//DEL          $Validation = true;
//DEL          $Where = "";
//DEL          if(!(($this->RemindersTimeToSend->getvalue().substr(0,2) >= 0 && $this->RemindersTimeToSend->getvalue().substr(0,2) <= 23) &&
//DEL              ($this->RemindersTimeToSend->getvalue().substr(3,2) >= 0 && $this->RemindersTimeToSend->getvalue().substr(3,2) <= 59) &&
//DEL              ($this->RemindersTimeToSend->getvalue().substr(6,2) >= 0 && $this->RemindersTimeToSend->getvalue().substr(6,2) <= 59))) {
//DEL              $this->RemindersTimeToSend->Errors->addError($CCSLocales->GetText("NotificationInvalidTimeFormat"));
//DEL          }
//DEL  
//DEL  		if(!(($this->RemindersHighRiskTimeToSend->getvalue().substr(0,2) >= 0 && $this->RemindersHighRiskTimeToSend->getvalue().substr(0,2) <= 23) &&
//DEL              ($this->RemindersHighRiskTimeToSend->getvalue().substr(3,2) >= 0 && $this->RemindersHighRiskTimeToSend->getvalue().substr(3,2) <= 59) &&
//DEL              ($this->RemindersHighRiskTimeToSend->getvalue().substr(6,2) >= 0 && $this->RemindersHighRiskTimeToSend->getvalue().substr(6,2) <= 59))) {
//DEL              $this->RemindersHighRiskTimeToSend->Errors->addError($CCSLocales->GetText("NotificationInvalidTimeFormat"));
//DEL          }
//DEL  
//DEL  		if(!(($this->RecommendationsTimeToSend->getvalue().substr(0,2) >= 0 && $this->RecommendationsTimeToSend->getvalue().substr(0,2) <= 23) &&
//DEL              ($this->RecommendationsTimeToSend->getvalue().substr(3,2) >= 0 && $this->RecommendationsTimeToSend->getvalue().substr(3,2) <= 59) &&
//DEL              ($this->RecommendationsTimeToSend->getvalue().substr(6,2) >= 0 && $this->RecommendationsTimeToSend->getvalue().substr(6,2) <= 59))) {
//DEL              $this->RecommendationsTimeToSend->Errors->addError($CCSLocales->GetText("NotificationInvalidTimeFormat"));
//DEL          }
//DEL  
//DEL          if(! (($this->PatientDischargedReferralDaysAfter->getvalue() > 0) && (($this->PatientDischargedReferralDaysAfter->getvalue() < 16)))) {
//DEL              $this->PatientDischargedReferralDaysAfter->Errors->addError($CCSLocales->GetText("NotificationsDaysAfter"));
//DEL          }
//DEL          if(! (($this->HighRiskPregnanciesSummaryDayOfMonth->getvalue() > 0) && ($this->HighRiskPregnanciesSummaryDayOfMonth->getvalue() < 29))) {
//DEL              $this->HighRiskPregnanciesSummaryDayOfMonth->Errors->addError($CCSLocales->GetText("NotificationsDayOfMonth"));
//DEL          }
//DEL          if(! (($this->RemindersHighRiskDaysInAdv->getvalue() > 0) && (($this->RemindersHighRiskDaysInAdv->getvalue() < 16)))) {
//DEL              $this->RemindersHighRiskDaysInAdv->Errors->addError($CCSLocales->GetText("NotificationsDaysinAdvHighRiskReminders"));
//DEL          }
//DEL          if(! (($this->RemindersDaysInAdv->getvalue() > 0) && (($this->RemindersDaysInAdv->getvalue() < 16)))) {
//DEL              $this->RemindersDaysInAdv->Errors->addError($CCSLocales->GetText("NotificationsReminderDaysinAdvance"));
//DEL          }
//DEL          $Validation = ($this->Recommendations->Validate() && $Validation);
//DEL          $Validation = ($this->Reminders->Validate() && $Validation);
//DEL          $Validation = ($this->RemindersTimeToSend->Validate() && $Validation);
//DEL          $Validation = ($this->RemindersHighRisk->Validate() && $Validation);
//DEL          $Validation = ($this->RemindersHighRiskTimeToSend->Validate() && $Validation);
//DEL          $Validation = ($this->PatientDischargedReferralDaysAfter->Validate() && $Validation);
//DEL          $Validation = ($this->HighRiskPregnanciesSummary->Validate() && $Validation);
//DEL          $Validation = ($this->HighRiskPregnanciesSummaryDayOfMonth->Validate() && $Validation);
//DEL          $Validation = ($this->HighRiskPregnanciesSummaryTimeToSend->Validate() && $Validation);
//DEL          $Validation = ($this->RecommendationsTimeToSend->Validate() && $Validation);
//DEL          $Validation = ($this->RemindersHighRiskDaysInAdv->Validate() && $Validation);
//DEL          $Validation = ($this->RemindersDaysInAdv->Validate() && $Validation);
//DEL          $Validation = ($this->PatientDischargedReferral->Validate() && $Validation);
//DEL          $Validation = ($this->PatientDischargedReferralTimeToSend->Validate() && $Validation);
//DEL          $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
//DEL          $Validation =  $Validation && ($this->Recommendations->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->Reminders->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->RemindersTimeToSend->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->RemindersHighRisk->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->RemindersHighRiskTimeToSend->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->PatientDischargedReferralDaysAfter->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->HighRiskPregnanciesSummary->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->HighRiskPregnanciesSummaryDayOfMonth->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->HighRiskPregnanciesSummaryTimeToSend->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->RecommendationsTimeToSend->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->RemindersHighRiskDaysInAdv->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->RemindersDaysInAdv->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->PatientDischargedReferral->Errors->Count() == 0);
//DEL          $Validation =  $Validation && ($this->PatientDischargedReferralTimeToSend->Errors->Count() == 0);
//DEL          return (($this->Errors->Count() == 0) && $Validation);
//DEL      }

class clsRecordRecommendations { //Recommendations Class @256-4244AD45

//Variables @256-9E315808

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

//Class_Initialize Event @256-C99630EF
    function clsRecordRecommendations($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Recommendations/Error";
        $this->DataSource = new clsRecommendationsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "Recommendations";
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
            $this->TimeToSend = new clsControl(ccsTextBox, "TimeToSend", $CCSLocales->GetText("TimeToSend"), ccsDate, array("H", ":", "nn"), CCGetRequestParam("TimeToSend", $Method, NULL), $this);
            $this->TimeToSend->Required = true;
            $this->Enabled = new clsControl(ccsCheckBox, "Enabled", $CCSLocales->GetText("Enabled"), ccsInteger, "", CCGetRequestParam("Enabled", $Method, NULL), $this);
            $this->Enabled->CheckedValue = $this->Enabled->GetParsedValue(1);
            $this->Enabled->UncheckedValue = $this->Enabled->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->TimeToSend->Value) && !strlen($this->TimeToSend->Value) && $this->TimeToSend->Value !== false)
                    $this->TimeToSend->SetText('09:30');
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @256-80BA7BA3
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
    }
//End Initialize Method

//Validate Method @256-4BEF52CB
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->TimeToSend->GetText()) && !preg_match ("/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/", $this->TimeToSend->GetText())) {
            $this->TimeToSend->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("TimeToSend")));
        }
        $Validation = ($this->TimeToSend->Validate() && $Validation);
        $Validation = ($this->Enabled->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->TimeToSend->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Enabled->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @256-B4F1C312
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TimeToSend->Errors->Count());
        $errors = ($errors || $this->Enabled->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @256-ED598703
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

//Operation Method @256-E0D63857
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
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @256-F0821F0F
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @256-FB841DB7
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @256-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @256-078DF728
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
                if(!$this->FormSubmitted){
                    $this->TimeToSend->SetValue($this->DataSource->TimeToSend->GetValue());
                    $this->Enabled->SetValue($this->DataSource->Enabled->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->TimeToSend->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Enabled->Errors->ToString());
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
        $this->TimeToSend->Show();
        $this->Enabled->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End Recommendations Class @256-FCB6E20C

class clsRecommendationsDataSource extends clsDBregistry_db {  //RecommendationsDataSource Class @256-1FE15FED

//DataSource Variables @256-C9639C2A
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
    public $TimeToSend;
    public $Enabled;
//End DataSource Variables

//DataSourceClass_Initialize Event @256-D1916C6C
    function clsRecommendationsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record Recommendations/Error";
        $this->Initialize();
        $this->TimeToSend = new clsField("TimeToSend", ccsDate, array("H", ":", "nn", ":", "ss"));
        
        $this->Enabled = new clsField("Enabled", ccsInteger, "");
        

        $this->InsertFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NotificationTypeID"] = array("Name" => "NotificationTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @256-5058CB4C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", $this->Parameters["urlFacilityID"], "", true);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "notificationconfiguration.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),true);
        $this->wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=1 )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @256-251108D9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT FacilityName, Day, TypeName, TimeToSend, Enabled, DaysBeforeOrAfter \n\n" .
        "FROM ((notificationtype INNER JOIN notificationconfiguration ON\n\n" .
        "notificationconfiguration.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN notification ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN facilities ON\n\n" .
        "notificationconfiguration.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @256-3C1DD945
    function SetValues()
    {
        $this->TimeToSend->SetDBValue(trim($this->f("TimeToSend")));
        $this->Enabled->SetDBValue(trim($this->f("Enabled")));
    }
//End SetValues Method

//Insert Method @256-EF75CA91
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NotificationTypeID"] = new clsSQLParameter("expr289", ccsInteger, "", "", 1, NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        if (!is_null($this->cp["NotificationTypeID"]->GetValue()) and !strlen($this->cp["NotificationTypeID"]->GetText()) and !is_bool($this->cp["NotificationTypeID"]->GetValue())) 
            $this->cp["NotificationTypeID"]->SetValue(1);
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetText(CCGetFromGet("FacilityID", NULL));
        $this->InsertFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->InsertFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->InsertFields["NotificationTypeID"]["Value"] = $this->cp["NotificationTypeID"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("notificationconfiguration", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @256-065A89C0
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=1 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->UpdateFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->UpdateFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("notificationconfiguration", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @256-C94D92B8
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=1 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->SQL = "DELETE FROM notificationconfiguration";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End RecommendationsDataSource Class @256-FCB6E20C

class clsRecordReminders { //Reminders Class @300-B14A723E

//Variables @300-9E315808

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

//Class_Initialize Event @300-BB5385DE
    function clsRecordReminders($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Reminders/Error";
        $this->DataSource = new clsRemindersDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "Reminders";
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
            $this->DaysBeforeOrAfter = new clsControl(ccsTextBox, "DaysBeforeOrAfter", $CCSLocales->GetText("DaysBeforeOrAfter"), ccsInteger, "", CCGetRequestParam("DaysBeforeOrAfter", $Method, NULL), $this);
            $this->DaysBeforeOrAfter->Required = true;
            $this->TimeToSend = new clsControl(ccsTextBox, "TimeToSend", $CCSLocales->GetText("TimeToSend"), ccsDate, array("H", ":", "nn"), CCGetRequestParam("TimeToSend", $Method, NULL), $this);
            $this->TimeToSend->Required = true;
            $this->Enabled = new clsControl(ccsCheckBox, "Enabled", $CCSLocales->GetText("Enabled"), ccsInteger, "", CCGetRequestParam("Enabled", $Method, NULL), $this);
            $this->Enabled->CheckedValue = $this->Enabled->GetParsedValue(1);
            $this->Enabled->UncheckedValue = $this->Enabled->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->DaysBeforeOrAfter->Value) && !strlen($this->DaysBeforeOrAfter->Value) && $this->DaysBeforeOrAfter->Value !== false)
                    $this->DaysBeforeOrAfter->SetText(3);
                if(!is_array($this->TimeToSend->Value) && !strlen($this->TimeToSend->Value) && $this->TimeToSend->Value !== false)
                    $this->TimeToSend->SetText('10:00');
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @300-80BA7BA3
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
    }
//End Initialize Method

//Validate Method @300-A26B72E0
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->DaysBeforeOrAfter->GetText()) && !preg_match ("/^([1-7])$/", $this->DaysBeforeOrAfter->GetText())) {
            $this->DaysBeforeOrAfter->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("DaysBeforeOrAfter")));
        }
        if(strlen($this->TimeToSend->GetText()) && !preg_match ("/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/", $this->TimeToSend->GetText())) {
            $this->TimeToSend->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("TimeToSend")));
        }
        $Validation = ($this->DaysBeforeOrAfter->Validate() && $Validation);
        $Validation = ($this->TimeToSend->Validate() && $Validation);
        $Validation = ($this->Enabled->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->DaysBeforeOrAfter->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TimeToSend->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Enabled->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @300-8A030921
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DaysBeforeOrAfter->Errors->Count());
        $errors = ($errors || $this->TimeToSend->Errors->Count());
        $errors = ($errors || $this->Enabled->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @300-ED598703
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

//Operation Method @300-E0D63857
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
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @300-81ACE85A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @300-FAFF100D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @300-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @300-37E2555A
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
                if(!$this->FormSubmitted){
                    $this->DaysBeforeOrAfter->SetValue($this->DataSource->DaysBeforeOrAfter->GetValue());
                    $this->TimeToSend->SetValue($this->DataSource->TimeToSend->GetValue());
                    $this->Enabled->SetValue($this->DataSource->Enabled->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if ($this->DaysBeforeOrAfter->GetValue() < 0 )
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", True, "(", ")", 1, True, ""));
        else
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", False, "", "", 1, True, ""));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->DaysBeforeOrAfter->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TimeToSend->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Enabled->Errors->ToString());
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
        $this->DaysBeforeOrAfter->Show();
        $this->TimeToSend->Show();
        $this->Enabled->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End Reminders Class @300-FCB6E20C

class clsRemindersDataSource extends clsDBregistry_db {  //RemindersDataSource Class @300-D9A430FF

//DataSource Variables @300-0D6C43E3
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
    public $DaysBeforeOrAfter;
    public $TimeToSend;
    public $Enabled;
//End DataSource Variables

//DataSourceClass_Initialize Event @300-EBB11C2E
    function clsRemindersDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record Reminders/Error";
        $this->Initialize();
        $this->DaysBeforeOrAfter = new clsField("DaysBeforeOrAfter", ccsInteger, "");
        
        $this->TimeToSend = new clsField("TimeToSend", ccsDate, array("H", ":", "nn", ":", "ss"));
        
        $this->Enabled = new clsField("Enabled", ccsInteger, "");
        

        $this->InsertFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NotificationTypeID"] = array("Name" => "NotificationTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @300-AE20948C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", $this->Parameters["urlFacilityID"], "", true);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "notificationconfiguration.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),true);
        $this->wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=2 )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @300-251108D9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT FacilityName, Day, TypeName, TimeToSend, Enabled, DaysBeforeOrAfter \n\n" .
        "FROM ((notificationtype INNER JOIN notificationconfiguration ON\n\n" .
        "notificationconfiguration.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN notification ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN facilities ON\n\n" .
        "notificationconfiguration.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @300-999E090D
    function SetValues()
    {
        $this->DaysBeforeOrAfter->SetDBValue(trim($this->f("DaysBeforeOrAfter")));
        $this->TimeToSend->SetDBValue(trim($this->f("TimeToSend")));
        $this->Enabled->SetDBValue(trim($this->f("Enabled")));
    }
//End SetValues Method

//Insert Method @300-BE15C803
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, array("ShortTime"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NotificationTypeID"] = new clsSQLParameter("expr327", ccsInteger, "", "", 2, NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        if (!is_null($this->cp["NotificationTypeID"]->GetValue()) and !strlen($this->cp["NotificationTypeID"]->GetText()) and !is_bool($this->cp["NotificationTypeID"]->GetValue())) 
            $this->cp["NotificationTypeID"]->SetValue(2);
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetText(CCGetFromGet("FacilityID", NULL));
        $this->InsertFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->InsertFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->InsertFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->InsertFields["NotificationTypeID"]["Value"] = $this->cp["NotificationTypeID"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("notificationconfiguration", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @300-5A9B98DA
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, array("ShortTime"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=2 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->UpdateFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->UpdateFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->UpdateFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("notificationconfiguration", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @300-B7147BBD
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=2 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->SQL = "DELETE FROM notificationconfiguration";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End RemindersDataSource Class @300-FCB6E20C

class clsRecordPatientDischarged { //PatientDischarged Class @374-610BEF54

//Variables @374-9E315808

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

//Class_Initialize Event @374-1901D718
    function clsRecordPatientDischarged($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record PatientDischarged/Error";
        $this->DataSource = new clsPatientDischargedDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "PatientDischarged";
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
            $this->DaysBeforeOrAfter = new clsControl(ccsTextBox, "DaysBeforeOrAfter", $CCSLocales->GetText("PatientDischargedReferralDaysAfter"), ccsInteger, "", CCGetRequestParam("DaysBeforeOrAfter", $Method, NULL), $this);
            $this->DaysBeforeOrAfter->Required = true;
            $this->TimeToSend = new clsControl(ccsTextBox, "TimeToSend", $CCSLocales->GetText("TimeToSend"), ccsDate, array("H", ":", "nn"), CCGetRequestParam("TimeToSend", $Method, NULL), $this);
            $this->TimeToSend->Required = true;
            $this->Enabled = new clsControl(ccsCheckBox, "Enabled", $CCSLocales->GetText("Enabled"), ccsInteger, "", CCGetRequestParam("Enabled", $Method, NULL), $this);
            $this->Enabled->CheckedValue = $this->Enabled->GetParsedValue(1);
            $this->Enabled->UncheckedValue = $this->Enabled->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->DaysBeforeOrAfter->Value) && !strlen($this->DaysBeforeOrAfter->Value) && $this->DaysBeforeOrAfter->Value !== false)
                    $this->DaysBeforeOrAfter->SetText(1);
                if(!is_array($this->TimeToSend->Value) && !strlen($this->TimeToSend->Value) && $this->TimeToSend->Value !== false)
                    $this->TimeToSend->SetText('08:00');
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @374-80BA7BA3
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
    }
//End Initialize Method

//Validate Method @374-31C36EB4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->DaysBeforeOrAfter->GetText()) && !preg_match ("/^([1-7])$/", $this->DaysBeforeOrAfter->GetText())) {
            $this->DaysBeforeOrAfter->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("PatientDischargedReferralDaysAfter")));
        }
        if(strlen($this->TimeToSend->GetText()) && !preg_match ("/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/", $this->TimeToSend->GetText())) {
            $this->TimeToSend->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("TimeToSend")));
        }
        $Validation = ($this->DaysBeforeOrAfter->Validate() && $Validation);
        $Validation = ($this->TimeToSend->Validate() && $Validation);
        $Validation = ($this->Enabled->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->DaysBeforeOrAfter->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TimeToSend->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Enabled->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @374-8A030921
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DaysBeforeOrAfter->Errors->Count());
        $errors = ($errors || $this->TimeToSend->Errors->Count());
        $errors = ($errors || $this->Enabled->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @374-ED598703
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

//Operation Method @374-E0D63857
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
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @374-81ACE85A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @374-FAFF100D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @374-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @374-37E2555A
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
                if(!$this->FormSubmitted){
                    $this->DaysBeforeOrAfter->SetValue($this->DataSource->DaysBeforeOrAfter->GetValue());
                    $this->TimeToSend->SetValue($this->DataSource->TimeToSend->GetValue());
                    $this->Enabled->SetValue($this->DataSource->Enabled->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if ($this->DaysBeforeOrAfter->GetValue() < 0 )
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", True, "(", ")", 1, True, ""));
        else
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", False, "", "", 1, True, ""));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->DaysBeforeOrAfter->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TimeToSend->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Enabled->Errors->ToString());
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
        $this->DaysBeforeOrAfter->Show();
        $this->TimeToSend->Show();
        $this->Enabled->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End PatientDischarged Class @374-FCB6E20C

class clsPatientDischargedDataSource extends clsDBregistry_db {  //PatientDischargedDataSource Class @374-86C6FFF4

//DataSource Variables @374-0D6C43E3
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
    public $DaysBeforeOrAfter;
    public $TimeToSend;
    public $Enabled;
//End DataSource Variables

//DataSourceClass_Initialize Event @374-E7CC4187
    function clsPatientDischargedDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record PatientDischarged/Error";
        $this->Initialize();
        $this->DaysBeforeOrAfter = new clsField("DaysBeforeOrAfter", ccsInteger, "");
        
        $this->TimeToSend = new clsField("TimeToSend", ccsDate, array("H", ":", "nn", ":", "ss"));
        
        $this->Enabled = new clsField("Enabled", ccsInteger, "");
        

        $this->InsertFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NotificationTypeID"] = array("Name" => "NotificationTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @374-6AA61A32
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", $this->Parameters["urlFacilityID"], "", true);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "notificationconfiguration.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),true);
        $this->wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=5 )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @374-251108D9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT FacilityName, Day, TypeName, TimeToSend, Enabled, DaysBeforeOrAfter \n\n" .
        "FROM ((notificationtype INNER JOIN notificationconfiguration ON\n\n" .
        "notificationconfiguration.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN notification ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN facilities ON\n\n" .
        "notificationconfiguration.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @374-999E090D
    function SetValues()
    {
        $this->DaysBeforeOrAfter->SetDBValue(trim($this->f("DaysBeforeOrAfter")));
        $this->TimeToSend->SetDBValue(trim($this->f("TimeToSend")));
        $this->Enabled->SetDBValue(trim($this->f("Enabled")));
    }
//End SetValues Method

//Insert Method @374-DA9EE940
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NotificationTypeID"] = new clsSQLParameter("expr401", ccsInteger, "", "", 5, NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        if (!is_null($this->cp["NotificationTypeID"]->GetValue()) and !strlen($this->cp["NotificationTypeID"]->GetText()) and !is_bool($this->cp["NotificationTypeID"]->GetValue())) 
            $this->cp["NotificationTypeID"]->SetValue(5);
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetText(CCGetFromGet("FacilityID", NULL));
        $this->InsertFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->InsertFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->InsertFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->InsertFields["NotificationTypeID"]["Value"] = $this->cp["NotificationTypeID"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("notificationconfiguration", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @374-755E4B62
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=5 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->UpdateFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->UpdateFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->UpdateFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("notificationconfiguration", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @374-D7400C8B
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=5 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->SQL = "DELETE FROM notificationconfiguration";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End PatientDischargedDataSource Class @374-FCB6E20C

class clsRecordHighRiskPregnancySummaries { //HighRiskPregnancySummaries Class @411-CA7FDEB1

//Variables @411-9E315808

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

//Class_Initialize Event @411-073EEE20
    function clsRecordHighRiskPregnancySummaries($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record HighRiskPregnancySummaries/Error";
        $this->DataSource = new clsHighRiskPregnancySummariesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "HighRiskPregnancySummaries";
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
            $this->DaysBeforeOrAfter = new clsControl(ccsTextBox, "DaysBeforeOrAfter", $CCSLocales->GetText("DaysBeforeOrAfter"), ccsInteger, "", CCGetRequestParam("DaysBeforeOrAfter", $Method, NULL), $this);
            $this->DaysBeforeOrAfter->Required = true;
            $this->TimeToSend = new clsControl(ccsTextBox, "TimeToSend", $CCSLocales->GetText("TimeToSend"), ccsDate, array("H", ":", "nn"), CCGetRequestParam("TimeToSend", $Method, NULL), $this);
            $this->TimeToSend->Required = true;
            $this->Enabled = new clsControl(ccsCheckBox, "Enabled", $CCSLocales->GetText("Enabled"), ccsInteger, "", CCGetRequestParam("Enabled", $Method, NULL), $this);
            $this->Enabled->CheckedValue = $this->Enabled->GetParsedValue(1);
            $this->Enabled->UncheckedValue = $this->Enabled->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->DaysBeforeOrAfter->Value) && !strlen($this->DaysBeforeOrAfter->Value) && $this->DaysBeforeOrAfter->Value !== false)
                    $this->DaysBeforeOrAfter->SetText(1);
                if(!is_array($this->TimeToSend->Value) && !strlen($this->TimeToSend->Value) && $this->TimeToSend->Value !== false)
                    $this->TimeToSend->SetText('14:00');
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @411-80BA7BA3
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
    }
//End Initialize Method

//Validate Method @411-FB7F31E7
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->DaysBeforeOrAfter->GetText()) && !preg_match ("/^(0{0,2}[1-9]|0?[1-2][0-8])$/", $this->DaysBeforeOrAfter->GetText())) {
            $this->DaysBeforeOrAfter->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("DaysBeforeOrAfter")));
        }
        if(strlen($this->TimeToSend->GetText()) && !preg_match ("/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/", $this->TimeToSend->GetText())) {
            $this->TimeToSend->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("TimeToSend")));
        }
        $Validation = ($this->DaysBeforeOrAfter->Validate() && $Validation);
        $Validation = ($this->TimeToSend->Validate() && $Validation);
        $Validation = ($this->Enabled->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->DaysBeforeOrAfter->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TimeToSend->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Enabled->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @411-8A030921
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DaysBeforeOrAfter->Errors->Count());
        $errors = ($errors || $this->TimeToSend->Errors->Count());
        $errors = ($errors || $this->Enabled->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @411-ED598703
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

//Operation Method @411-E0D63857
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
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @411-81ACE85A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @411-FAFF100D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @411-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @411-7CF9F02E
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
                if(!$this->FormSubmitted){
                    $this->DaysBeforeOrAfter->SetValue($this->DataSource->DaysBeforeOrAfter->GetValue());
                    $this->TimeToSend->SetValue($this->DataSource->TimeToSend->GetValue());
                    $this->Enabled->SetValue($this->DataSource->Enabled->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->DaysBeforeOrAfter->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TimeToSend->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Enabled->Errors->ToString());
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
        $this->DaysBeforeOrAfter->Show();
        $this->TimeToSend->Show();
        $this->Enabled->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End HighRiskPregnancySummaries Class @411-FCB6E20C

class clsHighRiskPregnancySummariesDataSource extends clsDBregistry_db {  //HighRiskPregnancySummariesDataSource Class @411-D4C5BFC3

//DataSource Variables @411-0D6C43E3
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
    public $DaysBeforeOrAfter;
    public $TimeToSend;
    public $Enabled;
//End DataSource Variables

//DataSourceClass_Initialize Event @411-8211FAAF
    function clsHighRiskPregnancySummariesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record HighRiskPregnancySummaries/Error";
        $this->Initialize();
        $this->DaysBeforeOrAfter = new clsField("DaysBeforeOrAfter", ccsInteger, "");
        
        $this->TimeToSend = new clsField("TimeToSend", ccsDate, array("H", ":", "nn", ":", "ss"));
        
        $this->Enabled = new clsField("Enabled", ccsInteger, "");
        

        $this->InsertFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NotificationTypeID"] = array("Name" => "NotificationTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @411-89A12D4D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", $this->Parameters["urlFacilityID"], "", true);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "notificationconfiguration.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),true);
        $this->wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=4 )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @411-251108D9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT FacilityName, Day, TypeName, TimeToSend, Enabled, DaysBeforeOrAfter \n\n" .
        "FROM ((notificationtype INNER JOIN notificationconfiguration ON\n\n" .
        "notificationconfiguration.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN notification ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN facilities ON\n\n" .
        "notificationconfiguration.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @411-999E090D
    function SetValues()
    {
        $this->DaysBeforeOrAfter->SetDBValue(trim($this->f("DaysBeforeOrAfter")));
        $this->TimeToSend->SetDBValue(trim($this->f("TimeToSend")));
        $this->Enabled->SetDBValue(trim($this->f("Enabled")));
    }
//End SetValues Method

//Insert Method @411-361BC70D
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NotificationTypeID"] = new clsSQLParameter("expr438", ccsInteger, "", "", 4, NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        if (!is_null($this->cp["NotificationTypeID"]->GetValue()) and !strlen($this->cp["NotificationTypeID"]->GetText()) and !is_bool($this->cp["NotificationTypeID"]->GetValue())) 
            $this->cp["NotificationTypeID"]->SetValue(4);
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetText(CCGetFromGet("FacilityID", NULL));
        $this->InsertFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->InsertFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->InsertFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->InsertFields["NotificationTypeID"]["Value"] = $this->cp["NotificationTypeID"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("notificationconfiguration", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @411-0588B93A
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=4 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->UpdateFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->UpdateFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->UpdateFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("notificationconfiguration", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @411-4BA7A9B7
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=4 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->SQL = "DELETE FROM notificationconfiguration";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End HighRiskPregnancySummariesDataSource Class @411-FCB6E20C

class clsRecordHighRiskReminders { //HighRiskReminders Class @337-4E480B45

//Variables @337-9E315808

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

//Class_Initialize Event @337-0ED00C19
    function clsRecordHighRiskReminders($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record HighRiskReminders/Error";
        $this->DataSource = new clsHighRiskRemindersDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "HighRiskReminders";
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
            $this->DaysBeforeOrAfter = new clsControl(ccsTextBox, "DaysBeforeOrAfter", $CCSLocales->GetText("DaysBeforeOrAfter"), ccsInteger, "", CCGetRequestParam("DaysBeforeOrAfter", $Method, NULL), $this);
            $this->DaysBeforeOrAfter->Required = true;
            $this->TimeToSend = new clsControl(ccsTextBox, "TimeToSend", $CCSLocales->GetText("TimeToSend"), ccsDate, array("H", ":", "nn"), CCGetRequestParam("TimeToSend", $Method, NULL), $this);
            $this->TimeToSend->Required = true;
            $this->Enabled = new clsControl(ccsCheckBox, "Enabled", $CCSLocales->GetText("Enabled"), ccsInteger, "", CCGetRequestParam("Enabled", $Method, NULL), $this);
            $this->Enabled->CheckedValue = $this->Enabled->GetParsedValue(1);
            $this->Enabled->UncheckedValue = $this->Enabled->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->DaysBeforeOrAfter->Value) && !strlen($this->DaysBeforeOrAfter->Value) && $this->DaysBeforeOrAfter->Value !== false)
                    $this->DaysBeforeOrAfter->SetText(2);
                if(!is_array($this->TimeToSend->Value) && !strlen($this->TimeToSend->Value) && $this->TimeToSend->Value !== false)
                    $this->TimeToSend->SetText('08:30');
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @337-80BA7BA3
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
    }
//End Initialize Method

//Validate Method @337-A26B72E0
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->DaysBeforeOrAfter->GetText()) && !preg_match ("/^([1-7])$/", $this->DaysBeforeOrAfter->GetText())) {
            $this->DaysBeforeOrAfter->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("DaysBeforeOrAfter")));
        }
        if(strlen($this->TimeToSend->GetText()) && !preg_match ("/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/", $this->TimeToSend->GetText())) {
            $this->TimeToSend->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("TimeToSend")));
        }
        $Validation = ($this->DaysBeforeOrAfter->Validate() && $Validation);
        $Validation = ($this->TimeToSend->Validate() && $Validation);
        $Validation = ($this->Enabled->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->DaysBeforeOrAfter->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TimeToSend->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Enabled->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @337-8A030921
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DaysBeforeOrAfter->Errors->Count());
        $errors = ($errors || $this->TimeToSend->Errors->Count());
        $errors = ($errors || $this->Enabled->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @337-ED598703
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

//Operation Method @337-E0D63857
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
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @337-81ACE85A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @337-FAFF100D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @337-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @337-37E2555A
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
                if(!$this->FormSubmitted){
                    $this->DaysBeforeOrAfter->SetValue($this->DataSource->DaysBeforeOrAfter->GetValue());
                    $this->TimeToSend->SetValue($this->DataSource->TimeToSend->GetValue());
                    $this->Enabled->SetValue($this->DataSource->Enabled->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if ($this->DaysBeforeOrAfter->GetValue() < 0 )
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", True, "(", ")", 1, True, ""));
        else
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", False, "", "", 1, True, ""));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->DaysBeforeOrAfter->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TimeToSend->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Enabled->Errors->ToString());
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
        $this->DaysBeforeOrAfter->Show();
        $this->TimeToSend->Show();
        $this->Enabled->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End HighRiskReminders Class @337-FCB6E20C

class clsHighRiskRemindersDataSource extends clsDBregistry_db {  //HighRiskRemindersDataSource Class @337-CDD5A92D

//DataSource Variables @337-0D6C43E3
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
    public $DaysBeforeOrAfter;
    public $TimeToSend;
    public $Enabled;
//End DataSource Variables

//DataSourceClass_Initialize Event @337-DA74CEF2
    function clsHighRiskRemindersDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record HighRiskReminders/Error";
        $this->Initialize();
        $this->DaysBeforeOrAfter = new clsField("DaysBeforeOrAfter", ccsInteger, "");
        
        $this->TimeToSend = new clsField("TimeToSend", ccsDate, array("H", ":", "nn", ":", "ss"));
        
        $this->Enabled = new clsField("Enabled", ccsInteger, "");
        

        $this->InsertFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NotificationTypeID"] = array("Name" => "NotificationTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @337-4D27A3F3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", $this->Parameters["urlFacilityID"], "", true);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "notificationconfiguration.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),true);
        $this->wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=3 )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @337-251108D9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT FacilityName, Day, TypeName, TimeToSend, Enabled, DaysBeforeOrAfter \n\n" .
        "FROM ((notificationtype INNER JOIN notificationconfiguration ON\n\n" .
        "notificationconfiguration.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN notification ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN facilities ON\n\n" .
        "notificationconfiguration.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @337-999E090D
    function SetValues()
    {
        $this->DaysBeforeOrAfter->SetDBValue(trim($this->f("DaysBeforeOrAfter")));
        $this->TimeToSend->SetDBValue(trim($this->f("TimeToSend")));
        $this->Enabled->SetDBValue(trim($this->f("Enabled")));
    }
//End SetValues Method

//Insert Method @337-2E53EBF6
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NotificationTypeID"] = new clsSQLParameter("expr364", ccsInteger, "", "", 3, NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        if (!is_null($this->cp["NotificationTypeID"]->GetValue()) and !strlen($this->cp["NotificationTypeID"]->GetText()) and !is_bool($this->cp["NotificationTypeID"]->GetValue())) 
            $this->cp["NotificationTypeID"]->SetValue(3);
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetText(CCGetFromGet("FacilityID", NULL));
        $this->InsertFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->InsertFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->InsertFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->InsertFields["NotificationTypeID"]["Value"] = $this->cp["NotificationTypeID"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("notificationconfiguration", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @337-8CD960F3
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=3 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->UpdateFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->UpdateFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->UpdateFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("notificationconfiguration", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @337-2BF3DE81
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=3 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->SQL = "DELETE FROM notificationconfiguration";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End HighRiskRemindersDataSource Class @337-FCB6E20C

class clsRecordUnsubscribe { //Unsubscribe Class @449-4ABC8A6D

//Variables @449-9E315808

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

//Class_Initialize Event @449-7E550E8C
    function clsRecordUnsubscribe($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Unsubscribe/Error";
        $this->DataSource = new clsUnsubscribeDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "Unsubscribe";
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
            $this->DaysBeforeOrAfter = new clsControl(ccsTextBox, "DaysBeforeOrAfter", $CCSLocales->GetText("PatientDischargedReferralDaysAfter"), ccsInteger, "", CCGetRequestParam("DaysBeforeOrAfter", $Method, NULL), $this);
            $this->DaysBeforeOrAfter->Required = true;
            $this->TimeToSend = new clsControl(ccsTextBox, "TimeToSend", $CCSLocales->GetText("TimeToSend"), ccsDate, array("H", ":", "nn"), CCGetRequestParam("TimeToSend", $Method, NULL), $this);
            $this->TimeToSend->Required = true;
            $this->Enabled = new clsControl(ccsCheckBox, "Enabled", $CCSLocales->GetText("Enabled"), ccsInteger, "", CCGetRequestParam("Enabled", $Method, NULL), $this);
            $this->Enabled->CheckedValue = $this->Enabled->GetParsedValue(1);
            $this->Enabled->UncheckedValue = $this->Enabled->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->DaysBeforeOrAfter->Value) && !strlen($this->DaysBeforeOrAfter->Value) && $this->DaysBeforeOrAfter->Value !== false)
                    $this->DaysBeforeOrAfter->SetText(1);
                if(!is_array($this->TimeToSend->Value) && !strlen($this->TimeToSend->Value) && $this->TimeToSend->Value !== false)
                    $this->TimeToSend->SetText('19:00');
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @449-80BA7BA3
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
    }
//End Initialize Method

//Validate Method @449-31C36EB4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->DaysBeforeOrAfter->GetText()) && !preg_match ("/^([1-7])$/", $this->DaysBeforeOrAfter->GetText())) {
            $this->DaysBeforeOrAfter->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("PatientDischargedReferralDaysAfter")));
        }
        if(strlen($this->TimeToSend->GetText()) && !preg_match ("/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/", $this->TimeToSend->GetText())) {
            $this->TimeToSend->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("TimeToSend")));
        }
        $Validation = ($this->DaysBeforeOrAfter->Validate() && $Validation);
        $Validation = ($this->TimeToSend->Validate() && $Validation);
        $Validation = ($this->Enabled->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->DaysBeforeOrAfter->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TimeToSend->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Enabled->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @449-8A030921
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DaysBeforeOrAfter->Errors->Count());
        $errors = ($errors || $this->TimeToSend->Errors->Count());
        $errors = ($errors || $this->Enabled->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @449-ED598703
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

//Operation Method @449-E0D63857
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
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @449-81ACE85A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @449-FAFF100D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @449-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @449-37E2555A
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
                if(!$this->FormSubmitted){
                    $this->DaysBeforeOrAfter->SetValue($this->DataSource->DaysBeforeOrAfter->GetValue());
                    $this->TimeToSend->SetValue($this->DataSource->TimeToSend->GetValue());
                    $this->Enabled->SetValue($this->DataSource->Enabled->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if ($this->DaysBeforeOrAfter->GetValue() < 0 )
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", True, "(", ")", 1, True, ""));
        else
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", False, "", "", 1, True, ""));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->DaysBeforeOrAfter->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TimeToSend->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Enabled->Errors->ToString());
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
        $this->DaysBeforeOrAfter->Show();
        $this->TimeToSend->Show();
        $this->Enabled->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End Unsubscribe Class @449-FCB6E20C

class clsUnsubscribeDataSource extends clsDBregistry_db {  //UnsubscribeDataSource Class @449-DE2A3A0D

//DataSource Variables @449-0D6C43E3
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
    public $DaysBeforeOrAfter;
    public $TimeToSend;
    public $Enabled;
//End DataSource Variables

//DataSourceClass_Initialize Event @449-E3B3E9F2
    function clsUnsubscribeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record Unsubscribe/Error";
        $this->Initialize();
        $this->DaysBeforeOrAfter = new clsField("DaysBeforeOrAfter", ccsInteger, "");
        
        $this->TimeToSend = new clsField("TimeToSend", ccsDate, array("H", ":", "nn", ":", "ss"));
        
        $this->Enabled = new clsField("Enabled", ccsInteger, "");
        

        $this->InsertFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NotificationTypeID"] = array("Name" => "NotificationTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @449-77D9728D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", $this->Parameters["urlFacilityID"], "", true);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "notificationconfiguration.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),true);
        $this->wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=7 )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @449-251108D9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT FacilityName, Day, TypeName, TimeToSend, Enabled, DaysBeforeOrAfter \n\n" .
        "FROM ((notificationtype INNER JOIN notificationconfiguration ON\n\n" .
        "notificationconfiguration.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN notification ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN facilities ON\n\n" .
        "notificationconfiguration.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @449-999E090D
    function SetValues()
    {
        $this->DaysBeforeOrAfter->SetDBValue(trim($this->f("DaysBeforeOrAfter")));
        $this->TimeToSend->SetDBValue(trim($this->f("TimeToSend")));
        $this->Enabled->SetDBValue(trim($this->f("Enabled")));
    }
//End SetValues Method

//Insert Method @449-DA3BFAB7
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NotificationTypeID"] = new clsSQLParameter("expr475", ccsInteger, "", "", 7, NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        if (!is_null($this->cp["NotificationTypeID"]->GetValue()) and !strlen($this->cp["NotificationTypeID"]->GetText()) and !is_bool($this->cp["NotificationTypeID"]->GetValue())) 
            $this->cp["NotificationTypeID"]->SetValue(7);
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetText(CCGetFromGet("FacilityID", NULL));
        $this->InsertFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->InsertFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->InsertFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->InsertFields["NotificationTypeID"]["Value"] = $this->cp["NotificationTypeID"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("notificationconfiguration", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @449-94F3AFD2
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=7 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->UpdateFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->UpdateFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->UpdateFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("notificationconfiguration", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @449-35FE40B2
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=7 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->SQL = "DELETE FROM notificationconfiguration";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End UnsubscribeDataSource Class @449-FCB6E20C

class clsRecordSubscribe { //Subscribe Class @485-F19052BE

//Variables @485-9E315808

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

//Class_Initialize Event @485-38BAEA39
    function clsRecordSubscribe($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Subscribe/Error";
        $this->DataSource = new clsSubscribeDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "Subscribe";
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
            $this->DaysBeforeOrAfter = new clsControl(ccsTextBox, "DaysBeforeOrAfter", $CCSLocales->GetText("PatientDischargedReferralDaysAfter"), ccsInteger, "", CCGetRequestParam("DaysBeforeOrAfter", $Method, NULL), $this);
            $this->DaysBeforeOrAfter->Required = true;
            $this->TimeToSend = new clsControl(ccsTextBox, "TimeToSend", $CCSLocales->GetText("TimeToSend"), ccsDate, array("H", ":", "nn"), CCGetRequestParam("TimeToSend", $Method, NULL), $this);
            $this->TimeToSend->Required = true;
            $this->Enabled = new clsControl(ccsCheckBox, "Enabled", $CCSLocales->GetText("Enabled"), ccsInteger, "", CCGetRequestParam("Enabled", $Method, NULL), $this);
            $this->Enabled->CheckedValue = $this->Enabled->GetParsedValue(1);
            $this->Enabled->UncheckedValue = $this->Enabled->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->DaysBeforeOrAfter->Value) && !strlen($this->DaysBeforeOrAfter->Value) && $this->DaysBeforeOrAfter->Value !== false)
                    $this->DaysBeforeOrAfter->SetText(1);
                if(!is_array($this->TimeToSend->Value) && !strlen($this->TimeToSend->Value) && $this->TimeToSend->Value !== false)
                    $this->TimeToSend->SetText('18:30');
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @485-80BA7BA3
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
    }
//End Initialize Method

//Validate Method @485-31C36EB4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->DaysBeforeOrAfter->GetText()) && !preg_match ("/^([1-7])$/", $this->DaysBeforeOrAfter->GetText())) {
            $this->DaysBeforeOrAfter->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("PatientDischargedReferralDaysAfter")));
        }
        if(strlen($this->TimeToSend->GetText()) && !preg_match ("/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/", $this->TimeToSend->GetText())) {
            $this->TimeToSend->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", $CCSLocales->GetText("TimeToSend")));
        }
        $Validation = ($this->DaysBeforeOrAfter->Validate() && $Validation);
        $Validation = ($this->TimeToSend->Validate() && $Validation);
        $Validation = ($this->Enabled->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->DaysBeforeOrAfter->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TimeToSend->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Enabled->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @485-8A030921
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DaysBeforeOrAfter->Errors->Count());
        $errors = ($errors || $this->TimeToSend->Errors->Count());
        $errors = ($errors || $this->Enabled->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @485-ED598703
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

//Operation Method @485-E0D63857
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
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @485-81ACE85A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @485-FAFF100D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->DaysBeforeOrAfter->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        $this->DataSource->TimeToSend->SetValue($this->TimeToSend->GetValue(true));
        $this->DataSource->Enabled->SetValue($this->Enabled->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @485-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @485-37E2555A
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
                if(!$this->FormSubmitted){
                    $this->DaysBeforeOrAfter->SetValue($this->DataSource->DaysBeforeOrAfter->GetValue());
                    $this->TimeToSend->SetValue($this->DataSource->TimeToSend->GetValue());
                    $this->Enabled->SetValue($this->DataSource->Enabled->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if ($this->DaysBeforeOrAfter->GetValue() < 0 )
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", True, "(", ")", 1, True, ""));
        else
             $this->DaysBeforeOrAfter->Text = CCFormatNumber($this->DaysBeforeOrAfter->GetValue(), array(False, 0, Null, "", False, "", "", 1, True, ""));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->DaysBeforeOrAfter->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TimeToSend->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Enabled->Errors->ToString());
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
        $this->DaysBeforeOrAfter->Show();
        $this->TimeToSend->Show();
        $this->Enabled->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End Subscribe Class @485-FCB6E20C

class clsSubscribeDataSource extends clsDBregistry_db {  //SubscribeDataSource Class @485-169C4ACD

//DataSource Variables @485-0D6C43E3
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
    public $DaysBeforeOrAfter;
    public $TimeToSend;
    public $Enabled;
//End DataSource Variables

//DataSourceClass_Initialize Event @485-3D9ED30E
    function clsSubscribeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record Subscribe/Error";
        $this->Initialize();
        $this->DaysBeforeOrAfter = new clsField("DaysBeforeOrAfter", ccsInteger, "");
        
        $this->TimeToSend = new clsField("TimeToSend", ccsDate, array("H", ":", "nn", ":", "ss"));
        
        $this->Enabled = new clsField("Enabled", ccsInteger, "");
        

        $this->InsertFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NotificationTypeID"] = array("Name" => "NotificationTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DaysBeforeOrAfter"] = array("Name" => "DaysBeforeOrAfter", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TimeToSend"] = array("Name" => "TimeToSend", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Enabled"] = array("Name" => "Enabled", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @485-94DE45F2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", $this->Parameters["urlFacilityID"], "", true);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "notificationconfiguration.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),true);
        $this->wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=6 )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @485-251108D9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT FacilityName, Day, TypeName, TimeToSend, Enabled, DaysBeforeOrAfter \n\n" .
        "FROM ((notificationtype INNER JOIN notificationconfiguration ON\n\n" .
        "notificationconfiguration.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN notification ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID) INNER JOIN facilities ON\n\n" .
        "notificationconfiguration.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @485-999E090D
    function SetValues()
    {
        $this->DaysBeforeOrAfter->SetDBValue(trim($this->f("DaysBeforeOrAfter")));
        $this->TimeToSend->SetDBValue(trim($this->f("TimeToSend")));
        $this->Enabled->SetDBValue(trim($this->f("Enabled")));
    }
//End SetValues Method

//Insert Method @485-2CCB9B2B
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NotificationTypeID"] = new clsSQLParameter("expr511", ccsInteger, "", "", 6, NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        if (!is_null($this->cp["NotificationTypeID"]->GetValue()) and !strlen($this->cp["NotificationTypeID"]->GetText()) and !is_bool($this->cp["NotificationTypeID"]->GetValue())) 
            $this->cp["NotificationTypeID"]->SetValue(6);
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetText(CCGetFromGet("FacilityID", NULL));
        $this->InsertFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->InsertFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->InsertFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->InsertFields["NotificationTypeID"]["Value"] = $this->cp["NotificationTypeID"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("notificationconfiguration", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @485-E4255D8A
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DaysBeforeOrAfter"] = new clsSQLParameter("ctrlDaysBeforeOrAfter", ccsInteger, "", "", $this->DaysBeforeOrAfter->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["TimeToSend"] = new clsSQLParameter("ctrlTimeToSend", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TimeToSend->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Enabled"] = new clsSQLParameter("ctrlEnabled", ccsInteger, "", "", $this->Enabled->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["DaysBeforeOrAfter"]->GetValue()) and !strlen($this->cp["DaysBeforeOrAfter"]->GetText()) and !is_bool($this->cp["DaysBeforeOrAfter"]->GetValue())) 
            $this->cp["DaysBeforeOrAfter"]->SetValue($this->DaysBeforeOrAfter->GetValue(true));
        if (!is_null($this->cp["TimeToSend"]->GetValue()) and !strlen($this->cp["TimeToSend"]->GetText()) and !is_bool($this->cp["TimeToSend"]->GetValue())) 
            $this->cp["TimeToSend"]->SetValue($this->TimeToSend->GetValue(true));
        if (!is_null($this->cp["Enabled"]->GetValue()) and !strlen($this->cp["Enabled"]->GetText()) and !is_bool($this->cp["Enabled"]->GetValue())) 
            $this->cp["Enabled"]->SetValue($this->Enabled->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=6 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->UpdateFields["DaysBeforeOrAfter"]["Value"] = $this->cp["DaysBeforeOrAfter"]->GetDBValue(true);
        $this->UpdateFields["TimeToSend"]["Value"] = $this->cp["TimeToSend"]->GetDBValue(true);
        $this->UpdateFields["Enabled"]["Value"] = $this->cp["Enabled"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("notificationconfiguration", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @485-A919E58E
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", true);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "notificationconfiguration.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
        $wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=6 )";
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->SQL = "DELETE FROM notificationconfiguration";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End SubscribeDataSource Class @485-FCB6E20C







//Initialize Page @1-0E5451CB
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
$TemplateFileName = "notifications_settings_maint.html";
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

//Include events file @1-5C6C3614
include_once("./notifications_settings_maint_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-18618EA4
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$countries_districts_facil1 = new clsGridcountries_districts_facil1("", $MainPage);
$countries_districts_facil = new clsRecordcountries_districts_facil("", $MainPage);
$Recommendations = new clsRecordRecommendations("", $MainPage);
$Reminders = new clsRecordReminders("", $MainPage);
$PatientDischarged = new clsRecordPatientDischarged("", $MainPage);
$HighRiskPregnancySummaries = new clsRecordHighRiskPregnancySummaries("", $MainPage);
$HighRiskReminders = new clsRecordHighRiskReminders("", $MainPage);
$Unsubscribe = new clsRecordUnsubscribe("", $MainPage);
$Subscribe = new clsRecordSubscribe("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->countries_districts_facil1 = & $countries_districts_facil1;
$MainPage->countries_districts_facil = & $countries_districts_facil;
$MainPage->Recommendations = & $Recommendations;
$MainPage->Reminders = & $Reminders;
$MainPage->PatientDischarged = & $PatientDischarged;
$MainPage->HighRiskPregnancySummaries = & $HighRiskPregnancySummaries;
$MainPage->HighRiskReminders = & $HighRiskReminders;
$MainPage->Unsubscribe = & $Unsubscribe;
$MainPage->Subscribe = & $Subscribe;
$countries_districts_facil1->Initialize();
$Recommendations->Initialize();
$Reminders->Initialize();
$PatientDischarged->Initialize();
$HighRiskPregnancySummaries->Initialize();
$HighRiskReminders->Initialize();
$Unsubscribe->Initialize();
$Subscribe->Initialize();

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

//Execute Components @1-B433185F
$topmenu->Operations();
$countries_districts_facil->Operation();
$Recommendations->Operation();
$Reminders->Operation();
$PatientDischarged->Operation();
$HighRiskPregnancySummaries->Operation();
$HighRiskReminders->Operation();
$Unsubscribe->Operation();
$Subscribe->Operation();
//End Execute Components

//Go to destination page @1-5C76C1EB
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($countries_districts_facil1);
    unset($countries_districts_facil);
    unset($Recommendations);
    unset($Reminders);
    unset($PatientDischarged);
    unset($HighRiskPregnancySummaries);
    unset($HighRiskReminders);
    unset($Unsubscribe);
    unset($Subscribe);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-F9FA8228
$topmenu->Show();
$countries_districts_facil1->Show();
$countries_districts_facil->Show();
$Recommendations->Show();
$Reminders->Show();
$PatientDischarged->Show();
$HighRiskPregnancySummaries->Show();
$HighRiskReminders->Show();
$Unsubscribe->Show();
$Subscribe->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-B36836B9
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($countries_districts_facil1);
unset($countries_districts_facil);
unset($Recommendations);
unset($Reminders);
unset($PatientDischarged);
unset($HighRiskPregnancySummaries);
unset($HighRiskReminders);
unset($Unsubscribe);
unset($Subscribe);
unset($Tpl);
//End Unload Page


?>
