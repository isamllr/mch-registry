<?php
//Include Common Files @1-AF8AD738
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "districts_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



//Include Page implementation @33-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsGriddistricts { //districts class @40-4EF2FACB

//Variables @40-FE88FD7F

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
    public $Sorter_DistrictName;
    public $Sorter_ProvinceID;
//End Variables

//Class_Initialize Event @40-577672D8
    function clsGriddistricts($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "districts";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid districts";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsdistrictsDataSource($this);
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
        $this->SorterName = CCGetParam("districtsOrder", "");
        $this->SorterDirection = CCGetParam("districtsDir", "");

        $this->DistrictName = new clsControl(ccsLink, "DistrictName", "DistrictName", ccsText, "", CCGetRequestParam("DistrictName", ccsGet, NULL), $this);
        $this->DistrictName->Page = "districts_maint.php";
        $this->ProvinceID = new clsControl(ccsLabel, "ProvinceID", "ProvinceID", ccsText, "", CCGetRequestParam("ProvinceID", ccsGet, NULL), $this);
        $this->districts_Insert = new clsControl(ccsLink, "districts_Insert", "districts_Insert", ccsText, "", CCGetRequestParam("districts_Insert", ccsGet, NULL), $this);
        $this->districts_Insert->Parameters = CCGetQueryString("QueryString", array("DistrictID", "ccsForm"));
        $this->districts_Insert->Page = "districts_maint.php";
        $this->districts_TotalRecords = new clsControl(ccsLabel, "districts_TotalRecords", "districts_TotalRecords", ccsText, "", CCGetRequestParam("districts_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_DistrictName = new clsSorter($this->ComponentName, "Sorter_DistrictName", $FileName, $this);
        $this->Sorter_ProvinceID = new clsSorter($this->ComponentName, "Sorter_ProvinceID", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @40-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @40-31C96A39
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_ProvinceID"] = CCGetFromGet("s_ProvinceID", NULL);
        $this->DataSource->Parameters["urls_DistrictName"] = CCGetFromGet("s_DistrictName", NULL);

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
            $this->ControlsVisible["DistrictName"] = $this->DistrictName->Visible;
            $this->ControlsVisible["ProvinceID"] = $this->ProvinceID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->DistrictName->SetValue($this->DataSource->DistrictName->GetValue());
                $this->DistrictName->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->DistrictName->Parameters = CCAddParam($this->DistrictName->Parameters, "DistrictID", $this->DataSource->f("DistrictID"));
                $this->ProvinceID->SetValue($this->DataSource->ProvinceID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->DistrictName->Show();
                $this->ProvinceID->Show();
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
        $this->districts_Insert->Show();
        $this->districts_TotalRecords->Show();
        $this->Sorter_DistrictName->Show();
        $this->Sorter_ProvinceID->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @40-2B6CD88C
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->DistrictName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ProvinceID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End districts Class @40-FCB6E20C

class clsdistrictsDataSource extends clsDBregistry_db {  //districtsDataSource Class @40-19509880

//DataSource Variables @40-DAB4F7FC
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $DistrictName;
    public $ProvinceID;
//End DataSource Variables

//DataSourceClass_Initialize Event @40-7C253588
    function clsdistrictsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid districts";
        $this->Initialize();
        $this->DistrictName = new clsField("DistrictName", ccsText, "");
        
        $this->ProvinceID = new clsField("ProvinceID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @40-03F7B7B1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DistrictName";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DistrictName" => array("DistrictName", ""), 
            "Sorter_ProvinceID" => array("ProvinceID", "")));
    }
//End SetOrder Method

//Prepare Method @40-D951F686
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_ProvinceID", ccsInteger, "", "", $this->Parameters["urls_ProvinceID"], "", false);
        $this->wp->AddParameter("2", "urls_DistrictName", ccsText, "", "", $this->Parameters["urls_DistrictName"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "districts.ProvinceID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "districts.DistrictName", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @40-E2EB65D4
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (province INNER JOIN districts ON\n\n" .
        "districts.ProvinceID = province.ProvinceID) INNER JOIN countries ON\n\n" .
        "province.CountryID = countries.CountryID";
        $this->SQL = "SELECT DistrictID, DistrictName, districts.ProvinceID AS districts_ProvinceID, province.*, countries.* \n\n" .
        "FROM (province INNER JOIN districts ON\n\n" .
        "districts.ProvinceID = province.ProvinceID) INNER JOIN countries ON\n\n" .
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

//SetValues Method @40-43F79500
    function SetValues()
    {
        $this->DistrictName->SetDBValue($this->f("DistrictName"));
        $this->ProvinceID->SetDBValue($this->f("ProvinceName"));
    }
//End SetValues Method

} //End districtsDataSource Class @40-FCB6E20C

class clsRecorddistrictsEdit { //districtsEdit Class @59-9165F124

//Variables @59-9E315808

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

//Class_Initialize Event @59-5694525B
    function clsRecorddistrictsEdit($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record districtsEdit/Error";
        $this->DataSource = new clsdistrictsEditDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "districtsEdit";
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
            $this->ProvinceID = new clsControl(ccsListBox, "ProvinceID", $CCSLocales->GetText("ProvinceID"), ccsInteger, "", CCGetRequestParam("ProvinceID", $Method, NULL), $this);
            $this->ProvinceID->DSType = dsTable;
            $this->ProvinceID->DataSource = new clsDBregistry_db();
            $this->ProvinceID->ds = & $this->ProvinceID->DataSource;
            $this->ProvinceID->DataSource->SQL = "SELECT * \n" .
"FROM province {SQL_Where} {SQL_OrderBy}";
            $this->ProvinceID->DataSource->Order = "ProvinceName";
            list($this->ProvinceID->BoundColumn, $this->ProvinceID->TextColumn, $this->ProvinceID->DBFormat) = array("ProvinceID", "ProvinceName", "");
            $this->ProvinceID->DataSource->Order = "ProvinceName";
            $this->ProvinceID->Required = true;
            $this->DistrictName = new clsControl(ccsTextBox, "DistrictName", $CCSLocales->GetText("DistrictName"), ccsText, "", CCGetRequestParam("DistrictName", $Method, NULL), $this);
            $this->CountryID = new clsControl(ccsListBox, "CountryID", $CCSLocales->GetText("CountryID"), ccsInteger, "", CCGetRequestParam("CountryID", $Method, NULL), $this);
            $this->CountryID->DSType = dsTable;
            $this->CountryID->DataSource = new clsDBregistry_db();
            $this->CountryID->ds = & $this->CountryID->DataSource;
            $this->CountryID->DataSource->SQL = "SELECT * \n" .
"FROM countries {SQL_Where} {SQL_OrderBy}";
            list($this->CountryID->BoundColumn, $this->CountryID->TextColumn, $this->CountryID->DBFormat) = array("CountryID", "Country", "");
        }
    }
//End Class_Initialize Event

//Initialize Method @59-FB8AC30B
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Order = "Country";

        $this->DataSource->Parameters["urlDistrictID"] = CCGetFromGet("DistrictID", NULL);
    }
//End Initialize Method

//Validate Method @59-E5D3DF4E
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->ProvinceID->Validate() && $Validation);
        $Validation = ($this->DistrictName->Validate() && $Validation);
        $Validation = ($this->CountryID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->ProvinceID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DistrictName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CountryID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @59-1DED4EE7
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ProvinceID->Errors->Count());
        $errors = ($errors || $this->DistrictName->Errors->Count());
        $errors = ($errors || $this->CountryID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @59-ED598703
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

//Operation Method @59-B53A4798
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

//InsertRow Method @59-A26B7BEB
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->ProvinceID->SetValue($this->ProvinceID->GetValue(true));
        $this->DataSource->DistrictName->SetValue($this->DistrictName->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @59-2B1A9CF4
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->ProvinceID->SetValue($this->ProvinceID->GetValue(true));
        $this->DataSource->DistrictName->SetValue($this->DistrictName->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @59-7874E994
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
                    $this->ProvinceID->SetValue($this->DataSource->ProvinceID->GetValue());
                    $this->DistrictName->SetValue($this->DataSource->DistrictName->GetValue());
                    $this->CountryID->SetValue($this->DataSource->CountryID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ProvinceID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DistrictName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CountryID->Errors->ToString());
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
        $this->ProvinceID->Show();
        $this->DistrictName->Show();
        $this->CountryID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End districtsEdit Class @59-FCB6E20C

class clsdistrictsEditDataSource extends clsDBregistry_db {  //districtsEditDataSource Class @59-A5A14199

//DataSource Variables @59-E632D800
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
    public $ProvinceID;
    public $DistrictName;
    public $CountryID;
//End DataSource Variables

//DataSourceClass_Initialize Event @59-26C4324C
    function clsdistrictsEditDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record districtsEdit/Error";
        $this->Initialize();
        $this->ProvinceID = new clsField("ProvinceID", ccsInteger, "");
        
        $this->DistrictName = new clsField("DistrictName", ccsText, "");
        
        $this->CountryID = new clsField("CountryID", ccsInteger, "");
        

        $this->InsertFields["ProvinceID"] = array("Name" => "ProvinceID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DistrictName"] = array("Name" => "DistrictName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ProvinceID"] = array("Name" => "ProvinceID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DistrictName"] = array("Name" => "DistrictName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @59-D264C5F0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlDistrictID", ccsInteger, "", "", $this->Parameters["urlDistrictID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "districts.DistrictID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @59-99C169D2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM (province INNER JOIN districts ON\n\n" .
        "districts.ProvinceID = province.ProvinceID) INNER JOIN countries ON\n\n" .
        "province.CountryID = countries.CountryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @59-FE6DFBA6
    function SetValues()
    {
        $this->ProvinceID->SetDBValue(trim($this->f("ProvinceID")));
        $this->DistrictName->SetDBValue($this->f("DistrictName"));
        $this->CountryID->SetDBValue(trim($this->f("CountryID")));
    }
//End SetValues Method

//Insert Method @59-6EB3F356
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["ProvinceID"] = new clsSQLParameter("ctrlProvinceID", ccsInteger, "", "", $this->ProvinceID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DistrictName"] = new clsSQLParameter("ctrlDistrictName", ccsText, "", "", $this->DistrictName->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["ProvinceID"]->GetValue()) and !strlen($this->cp["ProvinceID"]->GetText()) and !is_bool($this->cp["ProvinceID"]->GetValue())) 
            $this->cp["ProvinceID"]->SetValue($this->ProvinceID->GetValue(true));
        if (!is_null($this->cp["DistrictName"]->GetValue()) and !strlen($this->cp["DistrictName"]->GetText()) and !is_bool($this->cp["DistrictName"]->GetValue())) 
            $this->cp["DistrictName"]->SetValue($this->DistrictName->GetValue(true));
        $this->InsertFields["ProvinceID"]["Value"] = $this->cp["ProvinceID"]->GetDBValue(true);
        $this->InsertFields["DistrictName"]["Value"] = $this->cp["DistrictName"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("districts", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @59-F02061D4
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["ProvinceID"] = new clsSQLParameter("ctrlProvinceID", ccsInteger, "", "", $this->ProvinceID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DistrictName"] = new clsSQLParameter("ctrlDistrictName", ccsText, "", "", $this->DistrictName->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlDistrictID", ccsInteger, "", "", CCGetFromGet("DistrictID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["ProvinceID"]->GetValue()) and !strlen($this->cp["ProvinceID"]->GetText()) and !is_bool($this->cp["ProvinceID"]->GetValue())) 
            $this->cp["ProvinceID"]->SetValue($this->ProvinceID->GetValue(true));
        if (!is_null($this->cp["DistrictName"]->GetValue()) and !strlen($this->cp["DistrictName"]->GetText()) and !is_bool($this->cp["DistrictName"]->GetValue())) 
            $this->cp["DistrictName"]->SetValue($this->DistrictName->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "DistrictID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["ProvinceID"]["Value"] = $this->cp["ProvinceID"]->GetDBValue(true);
        $this->UpdateFields["DistrictName"]["Value"] = $this->cp["DistrictName"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("districts", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End districtsEditDataSource Class @59-FCB6E20C

class clsRecorddistrictsSearch { //districtsSearch Class @41-D8047529

//Variables @41-9E315808

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

//Class_Initialize Event @41-B93920D3
    function clsRecorddistrictsSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record districtsSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "districtsSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_ProvinceID = new clsControl(ccsListBox, "s_ProvinceID", "s_ProvinceID", ccsInteger, "", CCGetRequestParam("s_ProvinceID", $Method, NULL), $this);
            $this->s_ProvinceID->DSType = dsTable;
            $this->s_ProvinceID->DataSource = new clsDBregistry_db();
            $this->s_ProvinceID->ds = & $this->s_ProvinceID->DataSource;
            $this->s_ProvinceID->DataSource->SQL = "SELECT * \n" .
"FROM province {SQL_Where} {SQL_OrderBy}";
            $this->s_ProvinceID->DataSource->Order = "ProvinceName";
            list($this->s_ProvinceID->BoundColumn, $this->s_ProvinceID->TextColumn, $this->s_ProvinceID->DBFormat) = array("ProvinceID", "ProvinceName", "");
            $this->s_ProvinceID->DataSource->Order = "ProvinceName";
            $this->s_DistrictName = new clsControl(ccsTextBox, "s_DistrictName", "s_DistrictName", ccsText, "", CCGetRequestParam("s_DistrictName", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @41-324AED08
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_ProvinceID->Validate() && $Validation);
        $Validation = ($this->s_DistrictName->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_ProvinceID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DistrictName->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @41-C26C8CD6
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_ProvinceID->Errors->Count());
        $errors = ($errors || $this->s_DistrictName->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @41-ED598703
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

//Operation Method @41-1C8C0936
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
        $Redirect = "districts_maint.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "districts_maint.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @41-F6649367
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

        $this->s_ProvinceID->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_ProvinceID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DistrictName->Errors->ToString());
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
        $this->s_ProvinceID->Show();
        $this->s_DistrictName->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End districtsSearch Class @41-FCB6E20C





//Initialize Page @1-275836D4
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
$TemplateFileName = "districts_maint.html";
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

//Include events file @1-F6F16FA9
include_once("./districts_maint_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-9E08FAD7
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$districts = new clsGriddistricts("", $MainPage);
$districtsEdit = new clsRecorddistrictsEdit("", $MainPage);
$districtsSearch = new clsRecorddistrictsSearch("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->districts = & $districts;
$MainPage->districtsEdit = & $districtsEdit;
$MainPage->districtsSearch = & $districtsSearch;
$districts->Initialize();
$districtsEdit->Initialize();

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

//Execute Components @1-BCF9BF5A
$topmenu->Operations();
$districtsEdit->Operation();
$districtsSearch->Operation();
//End Execute Components

//Go to destination page @1-6058C436
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($districts);
    unset($districtsEdit);
    unset($districtsSearch);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-F2B07865
$topmenu->Show();
$districts->Show();
$districtsEdit->Show();
$districtsSearch->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-99DB4DC9
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($districts);
unset($districtsEdit);
unset($districtsSearch);
unset($Tpl);
//End Unload Page


?>
