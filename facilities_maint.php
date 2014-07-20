<?php
//Include Common Files @1-EEB39F82
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "facilities_maint.php");
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

//Class_Initialize Event @80-27520B1A
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
        $this->FacilityName->Page = "facilities_maint.php";
        $this->ProvinceName = new clsControl(ccsLabel, "ProvinceName", "ProvinceName", ccsText, "", CCGetRequestParam("ProvinceName", ccsGet, NULL), $this);
        $this->DistrictName = new clsControl(ccsLabel, "DistrictName", "DistrictName", ccsText, "", CCGetRequestParam("DistrictName", ccsGet, NULL), $this);
        $this->Country = new clsControl(ccsLabel, "Country", "Country", ccsText, "", CCGetRequestParam("Country", ccsGet, NULL), $this);
        $this->countries_districts_facil1_Insert = new clsControl(ccsLink, "countries_districts_facil1_Insert", "countries_districts_facil1_Insert", ccsText, "", CCGetRequestParam("countries_districts_facil1_Insert", ccsGet, NULL), $this);
        $this->countries_districts_facil1_Insert->Parameters = CCGetQueryString("QueryString", array("FacilityID", "ccsForm"));
        $this->countries_districts_facil1_Insert->Page = "facilities_maint.php";
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

//Show Method @80-8CF9E061
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
        $this->countries_districts_facil1_Insert->Show();
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

class clsRecordfacilities { //facilities Class @115-AC746A07

//Variables @115-9E315808

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

//Class_Initialize Event @115-1E64BC82
    function clsRecordfacilities($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record facilities/Error";
        $this->DataSource = new clsfacilitiesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "facilities";
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
            $this->DistrictID = new clsControl(ccsListBox, "DistrictID", $CCSLocales->GetText("DistrictID"), ccsInteger, "", CCGetRequestParam("DistrictID", $Method, NULL), $this);
            $this->DistrictID->DSType = dsTable;
            $this->DistrictID->DataSource = new clsDBregistry_db();
            $this->DistrictID->ds = & $this->DistrictID->DataSource;
            $this->DistrictID->DataSource->SQL = "SELECT * \n" .
"FROM districts {SQL_Where} {SQL_OrderBy}";
            list($this->DistrictID->BoundColumn, $this->DistrictID->TextColumn, $this->DistrictID->DBFormat) = array("DistrictID", "DistrictName", "");
            $this->DistrictID->Required = true;
            $this->FacilityName = new clsControl(ccsTextBox, "FacilityName", $CCSLocales->GetText("FacilityName"), ccsText, "", CCGetRequestParam("FacilityName", $Method, NULL), $this);
            $this->FacilityName->Required = true;
            $this->ProvinceID = new clsControl(ccsListBox, "ProvinceID", $CCSLocales->GetText("ProvinceID"), ccsInteger, "", CCGetRequestParam("ProvinceID", $Method, NULL), $this);
            $this->ProvinceID->DSType = dsTable;
            $this->ProvinceID->DataSource = new clsDBregistry_db();
            $this->ProvinceID->ds = & $this->ProvinceID->DataSource;
            $this->ProvinceID->DataSource->SQL = "SELECT * \n" .
"FROM province {SQL_Where} {SQL_OrderBy}";
            list($this->ProvinceID->BoundColumn, $this->ProvinceID->TextColumn, $this->ProvinceID->DBFormat) = array("ProvinceID", "ProvinceName", "");
            $this->CountryID = new clsControl(ccsListBox, "CountryID", $CCSLocales->GetText("CountryID"), ccsInteger, "", CCGetRequestParam("CountryID", $Method, NULL), $this);
            $this->CountryID->DSType = dsTable;
            $this->CountryID->DataSource = new clsDBregistry_db();
            $this->CountryID->ds = & $this->CountryID->DataSource;
            $this->CountryID->DataSource->SQL = "SELECT * \n" .
"FROM countries {SQL_Where} {SQL_OrderBy}";
            list($this->CountryID->BoundColumn, $this->CountryID->TextColumn, $this->CountryID->DBFormat) = array("CountryID", "Country", "");
            $this->Phone = new clsControl(ccsTextBox, "Phone", $CCSLocales->GetText("Phone"), ccsText, "", CCGetRequestParam("Phone", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @115-80BA7BA3
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
    }
//End Initialize Method

//Validate Method @115-BD08CA19
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->DistrictID->Validate() && $Validation);
        $Validation = ($this->FacilityName->Validate() && $Validation);
        $Validation = ($this->ProvinceID->Validate() && $Validation);
        $Validation = ($this->CountryID->Validate() && $Validation);
        $Validation = ($this->Phone->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->DistrictID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FacilityName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ProvinceID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CountryID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Phone->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @115-EF68DFA8
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DistrictID->Errors->Count());
        $errors = ($errors || $this->FacilityName->Errors->Count());
        $errors = ($errors || $this->ProvinceID->Errors->Count());
        $errors = ($errors || $this->CountryID->Errors->Count());
        $errors = ($errors || $this->Phone->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @115-ED598703
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

//Operation Method @115-288F0419
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

//InsertRow Method @115-86DB6FD4
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DistrictID->SetValue($this->DistrictID->GetValue(true));
        $this->DataSource->FacilityName->SetValue($this->FacilityName->GetValue(true));
        $this->DataSource->Phone->SetValue($this->Phone->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @115-91EEA6C5
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->DistrictID->SetValue($this->DistrictID->GetValue(true));
        $this->DataSource->FacilityName->SetValue($this->FacilityName->GetValue(true));
        $this->DataSource->Phone->SetValue($this->Phone->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @115-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @115-B690BDC2
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

        $this->DistrictID->Prepare();
        $this->ProvinceID->Prepare();
        $this->CountryID->Prepare();

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
                    $this->DistrictID->SetValue($this->DataSource->DistrictID->GetValue());
                    $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
                    $this->ProvinceID->SetValue($this->DataSource->ProvinceID->GetValue());
                    $this->CountryID->SetValue($this->DataSource->CountryID->GetValue());
                    $this->Phone->SetValue($this->DataSource->Phone->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->DistrictID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ProvinceID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CountryID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Phone->Errors->ToString());
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
        $this->DistrictID->Show();
        $this->FacilityName->Show();
        $this->ProvinceID->Show();
        $this->CountryID->Show();
        $this->Phone->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End facilities Class @115-FCB6E20C

class clsfacilitiesDataSource extends clsDBregistry_db {  //facilitiesDataSource Class @115-DC257E69

//DataSource Variables @115-522BAF70
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
    public $DistrictID;
    public $FacilityName;
    public $ProvinceID;
    public $CountryID;
    public $Phone;
//End DataSource Variables

//DataSourceClass_Initialize Event @115-E1B4EFEC
    function clsfacilitiesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record facilities/Error";
        $this->Initialize();
        $this->DistrictID = new clsField("DistrictID", ccsInteger, "");
        
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->ProvinceID = new clsField("ProvinceID", ccsInteger, "");
        
        $this->CountryID = new clsField("CountryID", ccsInteger, "");
        
        $this->Phone = new clsField("Phone", ccsText, "");
        

        $this->InsertFields["DistrictID"] = array("Name" => "DistrictID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityName"] = array("Name" => "FacilityName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Phone"] = array("Name" => "Phone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DistrictID"] = array("Name" => "DistrictID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["FacilityName"] = array("Name" => "FacilityName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Phone"] = array("Name" => "Phone", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @115-BB93F40B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", $this->Parameters["urlFacilityID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "facilities.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @115-EE340941
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM ((districts INNER JOIN facilities ON\n\n" .
        "facilities.DistrictID = districts.DistrictID) INNER JOIN province ON\n\n" .
        "districts.ProvinceID = province.ProvinceID) INNER JOIN countries ON\n\n" .
        "province.CountryID = countries.CountryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @115-EF439ADE
    function SetValues()
    {
        $this->DistrictID->SetDBValue(trim($this->f("DistrictID")));
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->ProvinceID->SetDBValue(trim($this->f("ProvinceID")));
        $this->CountryID->SetDBValue(trim($this->f("CountryID")));
        $this->Phone->SetDBValue($this->f("Phone"));
    }
//End SetValues Method

//Insert Method @115-77E3B23D
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DistrictID"] = new clsSQLParameter("ctrlDistrictID", ccsInteger, "", "", $this->DistrictID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityName"] = new clsSQLParameter("ctrlFacilityName", ccsText, "", "", $this->FacilityName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Phone"] = new clsSQLParameter("ctrlPhone", ccsText, "", "", $this->Phone->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["DistrictID"]->GetValue()) and !strlen($this->cp["DistrictID"]->GetText()) and !is_bool($this->cp["DistrictID"]->GetValue())) 
            $this->cp["DistrictID"]->SetValue($this->DistrictID->GetValue(true));
        if (!is_null($this->cp["FacilityName"]->GetValue()) and !strlen($this->cp["FacilityName"]->GetText()) and !is_bool($this->cp["FacilityName"]->GetValue())) 
            $this->cp["FacilityName"]->SetValue($this->FacilityName->GetValue(true));
        if (!is_null($this->cp["Phone"]->GetValue()) and !strlen($this->cp["Phone"]->GetText()) and !is_bool($this->cp["Phone"]->GetValue())) 
            $this->cp["Phone"]->SetValue($this->Phone->GetValue(true));
        $this->InsertFields["DistrictID"]["Value"] = $this->cp["DistrictID"]->GetDBValue(true);
        $this->InsertFields["FacilityName"]["Value"] = $this->cp["FacilityName"]->GetDBValue(true);
        $this->InsertFields["Phone"]["Value"] = $this->cp["Phone"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("facilities", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @115-C2FD3586
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DistrictID"] = new clsSQLParameter("ctrlDistrictID", ccsInteger, "", "", $this->DistrictID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityName"] = new clsSQLParameter("ctrlFacilityName", ccsText, "", "", $this->FacilityName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Phone"] = new clsSQLParameter("ctrlPhone", ccsText, "", "", $this->Phone->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["DistrictID"]->GetValue()) and !strlen($this->cp["DistrictID"]->GetText()) and !is_bool($this->cp["DistrictID"]->GetValue())) 
            $this->cp["DistrictID"]->SetValue($this->DistrictID->GetValue(true));
        if (!is_null($this->cp["FacilityName"]->GetValue()) and !strlen($this->cp["FacilityName"]->GetText()) and !is_bool($this->cp["FacilityName"]->GetValue())) 
            $this->cp["FacilityName"]->SetValue($this->FacilityName->GetValue(true));
        if (!is_null($this->cp["Phone"]->GetValue()) and !strlen($this->cp["Phone"]->GetText()) and !is_bool($this->cp["Phone"]->GetValue())) 
            $this->cp["Phone"]->SetValue($this->Phone->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "facilities.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["DistrictID"]["Value"] = $this->cp["DistrictID"]->GetDBValue(true);
        $this->UpdateFields["FacilityName"]["Value"] = $this->cp["FacilityName"]->GetDBValue(true);
        $this->UpdateFields["Phone"]["Value"] = $this->cp["Phone"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("facilities", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @115-0B5D4952
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", CCGetFromGet("FacilityID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "facilities.FacilityID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM facilities";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End facilitiesDataSource Class @115-FCB6E20C

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

//Operation Method @88-7BDBFA30
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
        $Redirect = "facilities_maint.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "facilities_maint.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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





//Initialize Page @1-84980ACC
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
$TemplateFileName = "facilities_maint.html";
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

//Include events file @1-353FD56D
include_once("./facilities_maint_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5F892D9F
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$countries_districts_facil1 = new clsGridcountries_districts_facil1("", $MainPage);
$facilities = new clsRecordfacilities("", $MainPage);
$countries_districts_facil = new clsRecordcountries_districts_facil("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->countries_districts_facil1 = & $countries_districts_facil1;
$MainPage->facilities = & $facilities;
$MainPage->countries_districts_facil = & $countries_districts_facil;
$countries_districts_facil1->Initialize();
$facilities->Initialize();

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

//Execute Components @1-30B141A1
$topmenu->Operations();
$facilities->Operation();
$countries_districts_facil->Operation();
//End Execute Components

//Go to destination page @1-BA57641B
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($countries_districts_facil1);
    unset($facilities);
    unset($countries_districts_facil);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0D31D9BA
$topmenu->Show();
$countries_districts_facil1->Show();
$facilities->Show();
$countries_districts_facil->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-AB8B6EE0
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($countries_districts_facil1);
unset($facilities);
unset($countries_districts_facil);
unset($Tpl);
//End Unload Page


?>
