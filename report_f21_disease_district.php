<?php
//Include Common Files @1-24EAD904
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_f21_disease_district.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordpregnancySearch { //pregnancySearch Class @9-F8777AB7

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

//Class_Initialize Event @9-DBE5ABFF
    function clsRecordpregnancySearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record pregnancySearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "pregnancySearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_PregRegDate = new clsControl(ccsTextBox, "s_PregRegDate", "s_PregRegDate", ccsDate, array("ShortDate"), CCGetRequestParam("s_PregRegDate", $Method, NULL), $this);
            $this->DatePicker_s_PregRegDate = new clsDatePicker("DatePicker_s_PregRegDate", "pregnancySearch", "s_PregRegDate", $this);
            $this->s_PregRegDateTo = new clsControl(ccsTextBox, "s_PregRegDateTo", "s_PregRegDateTo", ccsDate, array("ShortDate"), CCGetRequestParam("s_PregRegDateTo", $Method, NULL), $this);
            $this->DatePicker_s_PregRegDateTo = new clsDatePicker("DatePicker_s_PregRegDateTo", "pregnancySearch", "s_PregRegDateTo", $this);
            $this->s_FacilityID = new clsControl(ccsListBox, "s_FacilityID", "s_FacilityID", ccsText, "", CCGetRequestParam("s_FacilityID", $Method, NULL), $this);
            $this->s_FacilityID->DSType = dsTable;
            $this->s_FacilityID->DataSource = new clsDBregistry_db();
            $this->s_FacilityID->ds = & $this->s_FacilityID->DataSource;
            $this->s_FacilityID->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            list($this->s_FacilityID->BoundColumn, $this->s_FacilityID->TextColumn, $this->s_FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
        }
    }
//End Class_Initialize Event

//Validate Method @9-7A24ADE4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_PregRegDate->Validate() && $Validation);
        $Validation = ($this->s_PregRegDateTo->Validate() && $Validation);
        $Validation = ($this->s_FacilityID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_PregRegDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PregRegDateTo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FacilityID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @9-178C9A3B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_PregRegDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_PregRegDate->Errors->Count());
        $errors = ($errors || $this->s_PregRegDateTo->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_PregRegDateTo->Errors->Count());
        $errors = ($errors || $this->s_FacilityID->Errors->Count());
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

//Operation Method @9-927C2811
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
        $Redirect = "report_f21_disease_district.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_f21_disease_district.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @9-994DDF01
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

        $this->s_FacilityID->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_PregRegDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_PregRegDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PregRegDateTo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_PregRegDateTo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FacilityID->Errors->ToString());
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
        $this->s_PregRegDate->Show();
        $this->DatePicker_s_PregRegDate->Show();
        $this->s_PregRegDateTo->Show();
        $this->DatePicker_s_PregRegDateTo->Show();
        $this->s_FacilityID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End pregnancySearch Class @9-FCB6E20C

//Report1 ReportGroup class @528-CC6A3ECB
class clsReportGroupReport1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report1 ReportGroup class

//Report1 GroupsCollection class @528-FF4F9DD1
class clsGroupsCollectionReport1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report1 GroupsCollection class

class clsReportReport1 { //Report1 Class @528-BC2FB08C

//Report1 Variables @528-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report1 Variables

//Class_Initialize Event @528-A03ECC59
    function clsReportReport1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport1DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @528-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @528-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @528-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @528-A0B1577D
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report1 Class @528-FCB6E20C

class clsReport1DataSource extends clsDBregistry_db {  //Report1DataSource Class @528-1787F62C

//DataSource Variables @528-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @528-D9503C87
    function clsReport1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report1";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @528-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @528-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @528-2386D3B7
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (visitdisease.ICD10ID >= 'O.23.' \n" .
        "AND visitdisease.ICD10ID < 'O.24.')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (hospitalisationdischargediagnosis.ICD10ID >= 'O.23.' \n" .
        "AND hospitalisationdischargediagnosis.ICD10ID < 'O.24.')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (obstetric_anamnesis.ICD10ID >= 'O.23.' \n" .
        "AND obstetric_anamnesis.ICD10ID < 'O.24.')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @528-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report1DataSource Class @528-FCB6E20C

//Report2 ReportGroup class @543-6B05D9A9
class clsReportGroupReport2 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport2(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report2 ReportGroup class

//Report2 GroupsCollection class @543-6C9EABC8
class clsGroupsCollectionReport2 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport2(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport2($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report2 GroupsCollection class

class clsReportReport2 { //Report2 Class @543-9702E34F

//Report2 Variables @543-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report2 Variables

//Class_Initialize Event @543-D4E050C7
    function clsReportReport2($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report2";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport2DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @543-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @543-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @543-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @543-27F973A4
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport2($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report2 Class @543-FCB6E20C

class clsReport2DataSource extends clsDBregistry_db {  //Report2DataSource Class @543-9C54C835

//DataSource Variables @543-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @543-E7D6A77A
    function clsReport2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report2";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @543-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @543-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @543-5DC3B8C2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE visitdisease.ICD10ID = 'O.99.4' \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE hospitalisationdischargediagnosis.ICD10ID = 'O.99.4' \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE obstetric_anamnesis.ICD10ID = 'O.99.4' \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @543-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report2DataSource Class @543-FCB6E20C

//Report3 ReportGroup class @550-09DF7B77
class clsReportGroupReport3 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport3(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report3 ReportGroup class

//Report3 GroupsCollection class @550-AB014400
class clsGroupsCollectionReport3 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport3(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport3($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report3 GroupsCollection class

class clsReportReport3 { //Report3 Class @550-8E19D20E

//Report3 Variables @550-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report3 Variables

//Class_Initialize Event @550-4E7AD972
    function clsReportReport3($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report3";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport3DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @550-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @550-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @550-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @550-EC11922C
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport3($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report3 Class @550-FCB6E20C

class clsReport3DataSource extends clsDBregistry_db {  //Report3DataSource Class @550-53CADFFD

//DataSource Variables @550-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @550-F254D1D1
    function clsReport3DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report3";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @550-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @550-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @550-42BCA58B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (visitdisease.ICD10ID >= 'O.24.' \n" .
        "AND visitdisease.ICD10ID <= 'O.24.9')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (hospitalisationdischargediagnosis.ICD10ID >= 'O.24.'\n" .
        "AND hospitalisationdischargediagnosis.ICD10ID <= 'O.24.9') \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (obstetric_anamnesis.ICD10ID >= 'O.24.'\n" .
        "AND obstetric_anamnesis.ICD10ID <= 'O.24.9') \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @550-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report3DataSource Class @550-FCB6E20C

//Report4 ReportGroup class @557-FEAB112C
class clsReportGroupReport4 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport4(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report4 ReportGroup class

//Report4 GroupsCollection class @557-904DC1BB
class clsGroupsCollectionReport4 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport4(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport4($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report4 GroupsCollection class

class clsReportReport4 { //Report4 Class @557-C15844C9

//Report4 Variables @557-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report4 Variables

//Class_Initialize Event @557-3D5D69FB
    function clsReportReport4($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report4";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport4DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @557-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @557-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @557-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @557-F2183C57
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport4($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report4 Class @557-FCB6E20C

class clsReport4DataSource extends clsDBregistry_db {  //Report4DataSource Class @557-5083B246

//DataSource Variables @557-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @557-9ADB9080
    function clsReport4DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report4";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @557-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @557-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @557-72A8435C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE visitdisease.ICD10ID = 'O.99.2' \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE hospitalisationdischargediagnosis.ICD10ID = 'O.99.2'\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE obstetric_anamnesis.ICD10ID = 'O.99.2' \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @557-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report4DataSource Class @557-FCB6E20C

//Report5 ReportGroup class @564-9C71B3F2
class clsReportGroupReport5 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport5(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report5 ReportGroup class

//Report5 GroupsCollection class @564-57D22E73
class clsGroupsCollectionReport5 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport5(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport5($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report5 GroupsCollection class

class clsReportReport5 { //Report5 Class @564-D8437588

//Report5 Variables @564-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report5 Variables

//Class_Initialize Event @564-A7C7E04E
    function clsReportReport5($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report5";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport5DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @564-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @564-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @564-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @564-39F0DDDF
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport5($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report5 Class @564-FCB6E20C

class clsReport5DataSource extends clsDBregistry_db {  //Report5DataSource Class @564-9F1DA58E

//DataSource Variables @564-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @564-8F59E62B
    function clsReport5DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report5";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @564-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @564-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @564-687115D6
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE visitdisease.ICD10ID = 'O.99.0' \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE hospitalisationdischargediagnosis.ICD10ID = 'O.99.0'\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE obstetric_anamnesis.ICD10ID = 'O.99.0' \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @564-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report5DataSource Class @564-FCB6E20C

//Report6 ReportGroup class @571-3B1E5490
class clsReportGroupReport6 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport6(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report6 ReportGroup class

//Report6 GroupsCollection class @571-C403186A
class clsGroupsCollectionReport6 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport6(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport6($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report6 GroupsCollection class

class clsReportReport6 { //Report6 Class @571-F36E264B

//Report6 Variables @571-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report6 Variables

//Class_Initialize Event @571-D3197CD0
    function clsReportReport6($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report6";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport6DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @571-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @571-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @571-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @571-BEB8F906
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport6($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report6 Class @571-FCB6E20C

class clsReport6DataSource extends clsDBregistry_db {  //Report6DataSource Class @571-14CE9B97

//DataSource Variables @571-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @571-B1DF7DD6
    function clsReport6DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report6";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @571-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @571-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @571-A6A82C04
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE visitdisease.ICD10ID = 'O.46.0' \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE hospitalisationdischargediagnosis.ICD10ID = 'O.46.0'\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE obstetric_anamnesis.ICD10ID = 'O.46.0' \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @571-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report6DataSource Class @571-FCB6E20C

//Report7 ReportGroup class @578-59C4F64E
class clsReportGroupReport7 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport7(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report7 ReportGroup class

//Report7 GroupsCollection class @578-039CF7A2
class clsGroupsCollectionReport7 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport7(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport7($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report7 GroupsCollection class

class clsReportReport7 { //Report7 Class @578-EA75170A

//Report7 Variables @578-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report7 Variables

//Class_Initialize Event @578-4983F565
    function clsReportReport7($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report7";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport7DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @578-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @578-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @578-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @578-7550188E
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport7($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report7 Class @578-FCB6E20C

class clsReport7DataSource extends clsDBregistry_db {  //Report7DataSource Class @578-DB508C5F

//DataSource Variables @578-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @578-A45D0B7D
    function clsReport7DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report7";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @578-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @578-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @578-DAB99FA2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (visitdisease.ICD10ID >= 'O.22.' \n" .
        "AND visitdisease.ICD10ID <= 'O.22.9')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (hospitalisationdischargediagnosis.ICD10ID >= 'O.22.'\n" .
        "AND hospitalisationdischargediagnosis.ICD10ID <= 'O.22.9') \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (obstetric_anamnesis.ICD10ID >= 'O.22.'\n" .
        "AND obstetric_anamnesis.ICD10ID <= 'O.22.9') \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @578-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report7DataSource Class @578-FCB6E20C

//Report8 ReportGroup class @585-0E878667
class clsReportGroupReport8 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport8(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report8 ReportGroup class

//Report8 GroupsCollection class @585-B29A131C
class clsGroupsCollectionReport8 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport8(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport8($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report8 GroupsCollection class

class clsReportReport8 { //Report8 Class @585-6DED0BC5

//Report8 Variables @585-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report8 Variables

//Class_Initialize Event @585-35561DC2
    function clsReportReport8($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report8";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport8DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @585-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @585-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @585-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @585-82ABA5F0
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport8($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report8 Class @585-FCB6E20C

class clsReport8DataSource extends clsDBregistry_db {  //Report8DataSource Class @585-125C40E1

//DataSource Variables @585-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @585-60C1FF74
    function clsReport8DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report8";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @585-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @585-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @585-81A1A5FE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (visitdisease.ICD10ID >= 'O.10.' \n" .
        "AND visitdisease.ICD10ID <= 'O.16.')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (hospitalisationdischargediagnosis.ICD10ID >= 'O.10.'\n" .
        "AND hospitalisationdischargediagnosis.ICD10ID <= 'O.16.') \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (obstetric_anamnesis.ICD10ID >= 'O.10.'\n" .
        "AND obstetric_anamnesis.ICD10ID <= 'O.16.') \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @585-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report8DataSource Class @585-FCB6E20C

//Report9 ReportGroup class @592-6C5D24B9
class clsReportGroupReport9 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport9(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report9 ReportGroup class

//Report9 GroupsCollection class @592-7505FCD4
class clsGroupsCollectionReport9 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport9(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport9($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report9 GroupsCollection class

class clsReportReport9 { //Report9 Class @592-74F63A84

//Report9 Variables @592-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report9 Variables

//Class_Initialize Event @592-AFCC9477
    function clsReportReport9($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report9";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport9DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @592-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @592-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @592-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @592-49434478
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport9($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report9 Class @592-FCB6E20C

class clsReport9DataSource extends clsDBregistry_db {  //Report9DataSource Class @592-DDC25729

//DataSource Variables @592-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @592-754389DF
    function clsReport9DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report9";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @592-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @592-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @592-D384BEAD
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (visitdisease.ICD10ID = 'O.11.' \n" .
        "OR visitdisease.ICD10ID = 'O.13.'\n" .
        "OR (visitdisease.ICD10ID >= 'O.14.'\n" .
        "AND visitdisease.ICD10ID < 'O.15.')\n" .
        "OR visitdisease.ICD10ID = 'O.15.0')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (hospitalisationdischargediagnosis.ICD10ID = 'O.11.'\n" .
        "OR hospitalisationdischargediagnosis.ICD10ID = 'O.13.'\n" .
        "OR (hospitalisationdischargediagnosis.ICD10ID >= 'O.14.'\n" .
        "AND hospitalisationdischargediagnosis.ICD10ID < 'O.15.')\n" .
        "OR hospitalisationdischargediagnosis.ICD10ID = 'O.15.0') \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (obstetric_anamnesis.ICD10ID = 'O.11.'\n" .
        "OR obstetric_anamnesis.ICD10ID = 'O.13.'\n" .
        "OR (obstetric_anamnesis.ICD10ID >= 'O.14.'\n" .
        "AND obstetric_anamnesis.ICD10ID < 'O.15.')\n" .
        "OR obstetric_anamnesis.ICD10ID = 'O.15.0')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @592-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report9DataSource Class @592-FCB6E20C

//Report10 ReportGroup class @599-712A623A
class clsReportGroupReport10 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $TotalSum_COUNT_disease_1, $_TotalSum_COUNT_disease_1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGroupReport10(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetTotalValue($mode);
        $this->_TotalSum_COUNT_disease_1Attributes = $this->Parent->TotalSum_COUNT_disease_1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_COUNT_disease_1 = $this->TotalSum_COUNT_disease_1;
        $Header->_TotalSum_COUNT_disease_1Attributes = $this->_TotalSum_COUNT_disease_1Attributes;
    }
    function ChangeTotalControls() {
        $this->TotalSum_COUNT_disease_1 = $this->Parent->TotalSum_COUNT_disease_1->GetValue();
    }
}
//End Report10 ReportGroup class

//Report10 GroupsCollection class @599-BC5775F3
class clsGroupsCollectionReport10 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReport10(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport10($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->TotalSum_COUNT_disease_1->Value = $this->Parent->TotalSum_COUNT_disease_1->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End Report10 GroupsCollection class

class clsReportReport10 { //Report10 Class @599-E2EA314C

//Report10 Variables @599-5DEB194B

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End Report10 Variables

//Class_Initialize Event @599-E0B9C2BC
    function clsReportReport10($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Report10";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport10DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->TotalSum_COUNT_disease_1 = new clsControl(ccsReportLabel, "TotalSum_COUNT_disease_1", "TotalSum_COUNT_disease_1", ccsInteger, "", "", $this);
        $this->TotalSum_COUNT_disease_1->TotalFunction = "Sum";
        $this->TotalSum_COUNT_disease_1->EmptyText = "0";
    }
//End Class_Initialize Event

//Initialize Method @599-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @599-F36D5D4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalSum_COUNT_disease_1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @599-21A607F5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TotalSum_COUNT_disease_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @599-DABCC516
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDateTo"] = CCGetFromGet("s_PregRegDateTo", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionReport10($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TotalSum_COUNT_disease_1->SetValue($this->DataSource->TotalSum_COUNT_disease_1->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    case "Report":
                        if ($items[$i]->Mode == 2) {
                            $this->TotalSum_COUNT_disease_1->SetValue($items[$i]->TotalSum_COUNT_disease_1);
                            $this->TotalSum_COUNT_disease_1->Attributes->RestoreFromArray($items[$i]->_TotalSum_COUNT_disease_1Attributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->TotalSum_COUNT_disease_1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Page_Header");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Page_Header");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End Report10 Class @599-FCB6E20C

class clsReport10DataSource extends clsDBregistry_db {  //Report10DataSource Class @599-F7F77921

//DataSource Variables @599-DFA2ABEB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TotalSum_COUNT_disease_1;
//End DataSource Variables

//DataSourceClass_Initialize Event @599-C57F494F
    function clsReport10DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report10";
        $this->Initialize();
        $this->TotalSum_COUNT_disease_1 = new clsField("TotalSum_COUNT_disease_1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @599-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @599-59164A5B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], CCFormatDate(CCParseDate("1903-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_PregRegDateTo", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDateTo"], CCFormatDate(CCParseDate("2999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @599-FFDF498E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(disease) FROM\n" .
        "(\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (visitdisease.ICD10ID = 'O.14.1' \n" .
        "OR visitdisease.ICD10ID = 'O.15.0')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (hospitalisationdischargediagnosis.ICD10ID = 'O.14.1'\n" .
        "OR hospitalisationdischargediagnosis.ICD10ID = 'O.15.0') \n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease\n" .
        "FROM (\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "(\n" .
        "patient \n" .
        "LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN facilities ON\n" .
        "pregnancy.FacilityID = facilities.FacilityID \n" .
        ")\n" .
        "LEFT JOIN delivery ON\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID \n" .
        ")\n" .
        "LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID\n" .
        ")\n" .
        "LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        ")\n" .
        "LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID\n" .
        ")\n" .
        "LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID\n" .
        "WHERE (obstetric_anamnesis.ICD10ID = 'O.14.1'\n" .
        "OR obstetric_anamnesis.ICD10ID = 'O.15.0')\n" .
        "AND delivery.DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND delivery.DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND delivery.FacilityID LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "\n" .
        "\n" .
        ") AS result\n" .
        "GROUP BY disease \n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @599-14459362
    function SetValues()
    {
        $this->TotalSum_COUNT_disease_1->SetDBValue(trim($this->f("COUNT(disease)")));
    }
//End SetValues Method

} //End Report10DataSource Class @599-FCB6E20C

//Initialize Page @1-C03A0C04
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
$TemplateFileName = "report_f21_disease_district.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-D9DBF8C9
CCSecurityRedirect("1;2", "");
//End Authenticate User

//Include events file @1-3E07B049
include_once("./report_f21_disease_district_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-16213652
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$pregnancySearch = new clsRecordpregnancySearch("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_f21_disease_district.php";
$Report1 = new clsReportReport1("", $MainPage);
$Report2 = new clsReportReport2("", $MainPage);
$Report3 = new clsReportReport3("", $MainPage);
$Report4 = new clsReportReport4("", $MainPage);
$Report5 = new clsReportReport5("", $MainPage);
$Report6 = new clsReportReport6("", $MainPage);
$Report7 = new clsReportReport7("", $MainPage);
$Report8 = new clsReportReport8("", $MainPage);
$Report9 = new clsReportReport9("", $MainPage);
$Report10 = new clsReportReport10("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->pregnancySearch = & $pregnancySearch;
$MainPage->Report_Print = & $Report_Print;
$MainPage->Report1 = & $Report1;
$MainPage->Report2 = & $Report2;
$MainPage->Report3 = & $Report3;
$MainPage->Report4 = & $Report4;
$MainPage->Report5 = & $Report5;
$MainPage->Report6 = & $Report6;
$MainPage->Report7 = & $Report7;
$MainPage->Report8 = & $Report8;
$MainPage->Report9 = & $Report9;
$MainPage->Report10 = & $Report10;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$Report1->Initialize();
$Report2->Initialize();
$Report3->Initialize();
$Report4->Initialize();
$Report5->Initialize();
$Report6->Initialize();
$Report7->Initialize();
$Report8->Initialize();
$Report9->Initialize();
$Report10->Initialize();

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

//Execute Components @1-16012FCF
$topmenu->Operations();
$pregnancySearch->Operation();
//End Execute Components

//Go to destination page @1-B816A6E0
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($pregnancySearch);
    unset($Report1);
    unset($Report2);
    unset($Report3);
    unset($Report4);
    unset($Report5);
    unset($Report6);
    unset($Report7);
    unset($Report8);
    unset($Report9);
    unset($Report10);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-693DE9B2
$topmenu->Show();
$pregnancySearch->Show();
$Report1->Show();
$Report2->Show();
$Report3->Show();
$Report4->Show();
$Report5->Show();
$Report6->Show();
$Report7->Show();
$Report8->Show();
$Report9->Show();
$Report10->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2F21D22C
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($pregnancySearch);
unset($Report1);
unset($Report2);
unset($Report3);
unset($Report4);
unset($Report5);
unset($Report6);
unset($Report7);
unset($Report8);
unset($Report9);
unset($Report10);
unset($Tpl);
//End Unload Page


?>
