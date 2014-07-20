<?php
//Include Common Files @1-F238ADD7
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_on_newborn_facility.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @60-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecorddelivery_facilities_newbo { //delivery_facilities_newbo Class @89-3F0E03CC

//Variables @89-9E315808

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

//Class_Initialize Event @89-98710A5F
    function clsRecorddelivery_facilities_newbo($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record delivery_facilities_newbo/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "delivery_facilities_newbo";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_BirthDate = new clsControl(ccsTextBox, "s_BirthDate", "s_BirthDate", ccsDate, $DefaultDateFormat, CCGetRequestParam("s_BirthDate", $Method, NULL), $this);
            $this->DatePicker_s_BirthDate = new clsDatePicker("DatePicker_s_BirthDate", "delivery_facilities_newbo", "s_BirthDate", $this);
            $this->s_BirthDate1 = new clsControl(ccsTextBox, "s_BirthDate1", "s_BirthDate1", ccsDate, $DefaultDateFormat, CCGetRequestParam("s_BirthDate1", $Method, NULL), $this);
            $this->DatePicker_s_BirthDate1 = new clsDatePicker("DatePicker_s_BirthDate1", "delivery_facilities_newbo", "s_BirthDate1", $this);
        }
    }
//End Class_Initialize Event

//Validate Method @89-C2100B2E
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_BirthDate->Validate() && $Validation);
        $Validation = ($this->s_BirthDate1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_BirthDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_BirthDate1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @89-F115D629
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_BirthDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_BirthDate->Errors->Count());
        $errors = ($errors || $this->s_BirthDate1->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_BirthDate1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @89-ED598703
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

//Operation Method @89-EACEB567
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
        $Redirect = "report_on_newborn_facility.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_on_newborn_facility.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @89-D9618E04
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
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_BirthDate1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_BirthDate1->Errors->ToString());
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
        $this->s_BirthDate->Show();
        $this->DatePicker_s_BirthDate->Show();
        $this->s_BirthDate1->Show();
        $this->DatePicker_s_BirthDate1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End delivery_facilities_newbo Class @89-FCB6E20C

//NewBorn ReportGroup class @170-4689377A
class clsReportGroupNewBorn {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $GroupSex, $_GroupSexAttributes;
    public $CountGroupSex, $_CountGroupSexAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $SexTotalIndex;

    function clsReportGroupNewBorn(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GroupSex = $this->Parent->GroupSex->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_GroupSexAttributes = $this->Parent->GroupSex->Attributes->GetAsArray();
        $this->_CountGroupSexAttributes = $this->Parent->CountGroupSex->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->CountGroupSex = $this->CountGroupSex;
        $Header->_CountGroupSexAttributes = $this->_CountGroupSexAttributes;
        $this->GroupSex = $Header->GroupSex;
        $Header->_GroupSexAttributes = $this->_GroupSexAttributes;
        $this->Parent->GroupSex->Value = $Header->GroupSex;
        $this->Parent->GroupSex->Attributes->RestoreFromArray($Header->_GroupSexAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetValue();
    }
}
//End NewBorn ReportGroup class

//NewBorn GroupsCollection class @170-7F9CDC6B
class clsGroupsCollectionNewBorn {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mSexCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionNewBorn(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSexCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupNewBorn($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SexTotalIndex = $this->mSexCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->GroupSex->Value = $this->Parent->GroupSex->initialValue;
        $this->Parent->CountGroupSex->Value = $this->Parent->CountGroupSex->initialValue;
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
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Sex") {
            $GroupSex = & $this->InitGroup(true);
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnInitialize", $this->Parent->Sex_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Sex_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Sex_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Sex_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Sex_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Header->Height;
                $GroupSex->SetTotalControls("GetNextValue");
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnCalculate", $this->Parent->Sex_Header);
            $GroupSex->SetControls();
            $GroupSex->Mode = 1;
            $GroupSex->GroupType = "Sex";
            $this->mSexCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSex;
            $this->Parent->CountGroupSex->Reset();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
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
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
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
        $GroupSex = & $this->InitGroup(true);
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnInitialize", $this->Parent->Sex_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Sex_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Sex_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Sex_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSex->SetTotalControls("GetPrevValue");
        $GroupSex->SyncWithHeader($this->Groups[$this->mSexCurrentHeaderIndex]);
        if ($this->Parent->Sex_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Footer->Height;
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnCalculate", $this->Parent->Sex_Footer);
        $GroupSex->SetControls();
        $this->Parent->CountGroupSex->Reset();
        $this->RestoreValues();
        $GroupSex->Mode = 2;
        $GroupSex->GroupType ="Sex";
        $this->Groups[] = & $GroupSex;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End NewBorn GroupsCollection class

class clsReportNewBorn { //NewBorn Class @170-28B2FD8E

//NewBorn Variables @170-80D63D80

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
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Sex_HeaderBlock, $Sex_Header;
    public $Sex_FooterBlock, $Sex_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sex_HeaderControls, $Sex_FooterControls;
//End NewBorn Variables

//Class_Initialize Event @170-2519EC40
    function clsReportNewBorn($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "NewBorn";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Sex_Footer = new clsSection($this);
        $this->Sex_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Footer->Height);
        $this->Sex_Header = new clsSection($this);
        $this->Sex_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsNewBornDataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->GroupSex = new clsControl(ccsReportLabel, "GroupSex", "GroupSex", ccsInteger, "", "", $this);
        $this->CountGroupSex = new clsControl(ccsReportLabel, "CountGroupSex", "CountGroupSex", ccsText, "", 0, $this);
        $this->CountGroupSex->TotalFunction = "Count";
    }
//End Class_Initialize Event

//Initialize Method @170-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @170-9B8077A3
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->GroupSex->Errors->Count());
        $errors = ($errors || $this->CountGroupSex->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @170-4C3BD975
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CountGroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @170-5639FF6D
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_BirthDate1"] = CCGetFromGet("s_BirthDate1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SexKey = "";
        $Groups = new clsGroupsCollectionNewBorn($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GroupSex->SetValue($this->DataSource->GroupSex->GetValue());
            $this->CountGroupSex->SetValue($this->DataSource->CountGroupSex->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SexKey != $this->DataSource->f("Sex")) {
                $Groups->OpenGroup("Sex");
            }
            $Groups->AddItem();
            $SexKey = $this->DataSource->f("Sex");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SexKey != $this->DataSource->f("Sex")) {
                $Groups->CloseGroup("Sex");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
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
            $this->ControlsVisible["GroupSex"] = $this->GroupSex->Visible;
            $this->ControlsVisible["CountGroupSex"] = $this->CountGroupSex->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        if ($this->Detail->Visible) {
                            $this->Attributes->Show();
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        }
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
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
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Sex":
                        if ($items[$i]->Mode == 1) {
                            $this->GroupSex->SetValue($items[$i]->GroupSex);
                            $this->GroupSex->Attributes->RestoreFromArray($items[$i]->_GroupSexAttributes);
                            $this->CountGroupSex->SetValue($items[$i]->CountGroupSex);
                            $this->CountGroupSex->Attributes->RestoreFromArray($items[$i]->_CountGroupSexAttributes);
                            $this->Sex_Header->CCSEventResult = CCGetEvent($this->Sex_Header->CCSEvents, "BeforeShow", $this->Sex_Header);
                            if ($this->Sex_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Header";
                                $this->Attributes->Show();
                                $this->GroupSex->Show();
                                $this->CountGroupSex->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Sex_Footer->CCSEventResult = CCGetEvent($this->Sex_Footer->CCSEvents, "BeforeShow", $this->Sex_Footer);
                            if ($this->Sex_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Footer", true, "Section Detail");
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

} //End NewBorn Class @170-FCB6E20C

class clsNewBornDataSource extends clsDBregistry_db {  //NewBornDataSource Class @170-6EA6EA83

//DataSource Variables @170-94ED7D63
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GroupSex;
    public $CountGroupSex;
//End DataSource Variables

//DataSourceClass_Initialize Event @170-0E95AA30
    function clsNewBornDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report NewBorn";
        $this->Initialize();
        $this->GroupSex = new clsField("GroupSex", ccsInteger, "");
        
        $this->CountGroupSex = new clsField("CountGroupSex", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @170-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @170-F180FF6A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("2", "urls_BirthDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate1"], "", false);
        $this->wp->AddParameter("3", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opGreaterThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsDate),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opLessThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]);
    }
//End Prepare Method

//Open Method @170-E3BDF83B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, FacilityName, Sex, NewBornID, BirthDate, Weight \n\n" .
        "FROM (delivery INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID) INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "newborn.Sex asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @170-5BFFA3DB
    function SetValues()
    {
        $this->GroupSex->SetDBValue(trim($this->f("Sex")));
        $this->CountGroupSex->SetDBValue($this->f("Sex"));
    }
//End SetValues Method

} //End NewBornDataSource Class @170-FCB6E20C

//NewBorn1 ReportGroup class @220-742D22E0
class clsReportGroupNewBorn1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $GroupSex1, $_GroupSex1Attributes;
    public $CountGroupSex, $_CountGroupSexAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $SexTotalIndex;

    function clsReportGroupNewBorn1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GroupSex1 = $this->Parent->GroupSex1->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_GroupSex1Attributes = $this->Parent->GroupSex1->Attributes->GetAsArray();
        $this->_CountGroupSexAttributes = $this->Parent->CountGroupSex->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->CountGroupSex = $this->CountGroupSex;
        $Header->_CountGroupSexAttributes = $this->_CountGroupSexAttributes;
        $this->GroupSex1 = $Header->GroupSex1;
        $Header->_GroupSex1Attributes = $this->_GroupSex1Attributes;
        $this->Parent->GroupSex1->Value = $Header->GroupSex1;
        $this->Parent->GroupSex1->Attributes->RestoreFromArray($Header->_GroupSex1Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetValue();
    }
}
//End NewBorn1 ReportGroup class

//NewBorn1 GroupsCollection class @220-7004F4AF
class clsGroupsCollectionNewBorn1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mSexCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionNewBorn1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSexCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupNewBorn1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SexTotalIndex = $this->mSexCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->GroupSex1->Value = $this->Parent->GroupSex1->initialValue;
        $this->Parent->CountGroupSex->Value = $this->Parent->CountGroupSex->initialValue;
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
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Sex") {
            $GroupSex = & $this->InitGroup(true);
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnInitialize", $this->Parent->Sex_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Sex_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Sex_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Sex_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Sex_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Header->Height;
                $GroupSex->SetTotalControls("GetNextValue");
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnCalculate", $this->Parent->Sex_Header);
            $GroupSex->SetControls();
            $GroupSex->Mode = 1;
            $GroupSex->GroupType = "Sex";
            $this->mSexCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSex;
            $this->Parent->CountGroupSex->Reset();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
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
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
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
        $GroupSex = & $this->InitGroup(true);
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnInitialize", $this->Parent->Sex_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Sex_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Sex_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Sex_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSex->SetTotalControls("GetPrevValue");
        $GroupSex->SyncWithHeader($this->Groups[$this->mSexCurrentHeaderIndex]);
        if ($this->Parent->Sex_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Footer->Height;
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnCalculate", $this->Parent->Sex_Footer);
        $GroupSex->SetControls();
        $this->Parent->CountGroupSex->Reset();
        $this->RestoreValues();
        $GroupSex->Mode = 2;
        $GroupSex->GroupType ="Sex";
        $this->Groups[] = & $GroupSex;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End NewBorn1 GroupsCollection class

class clsReportNewBorn1 { //NewBorn1 Class @220-156BFC6C

//NewBorn1 Variables @220-80D63D80

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
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Sex_HeaderBlock, $Sex_Header;
    public $Sex_FooterBlock, $Sex_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sex_HeaderControls, $Sex_FooterControls;
//End NewBorn1 Variables

//Class_Initialize Event @220-F4227B56
    function clsReportNewBorn1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "NewBorn1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Sex_Footer = new clsSection($this);
        $this->Sex_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Footer->Height);
        $this->Sex_Header = new clsSection($this);
        $this->Sex_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsNewBorn1DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->GroupSex1 = new clsControl(ccsReportLabel, "GroupSex1", "GroupSex1", ccsInteger, "", "", $this);
        $this->CountGroupSex = new clsControl(ccsReportLabel, "CountGroupSex", "CountGroupSex", ccsText, "", 0, $this);
        $this->CountGroupSex->TotalFunction = "Count";
    }
//End Class_Initialize Event

//Initialize Method @220-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @220-59C7908B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->GroupSex1->Errors->Count());
        $errors = ($errors || $this->CountGroupSex->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @220-2AF875A1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GroupSex1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CountGroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @220-564C9797
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_BirthDate1"] = CCGetFromGet("s_BirthDate1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SexKey = "";
        $Groups = new clsGroupsCollectionNewBorn1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GroupSex1->SetValue($this->DataSource->GroupSex1->GetValue());
            $this->CountGroupSex->SetValue($this->DataSource->CountGroupSex->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SexKey != $this->DataSource->f("Sex")) {
                $Groups->OpenGroup("Sex");
            }
            $Groups->AddItem();
            $SexKey = $this->DataSource->f("Sex");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SexKey != $this->DataSource->f("Sex")) {
                $Groups->CloseGroup("Sex");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
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
            $this->ControlsVisible["GroupSex1"] = $this->GroupSex1->Visible;
            $this->ControlsVisible["CountGroupSex"] = $this->CountGroupSex->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        if ($this->Detail->Visible) {
                            $this->Attributes->Show();
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        }
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
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
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Sex":
                        if ($items[$i]->Mode == 1) {
                            $this->GroupSex1->SetValue($items[$i]->GroupSex1);
                            $this->GroupSex1->Attributes->RestoreFromArray($items[$i]->_GroupSex1Attributes);
                            $this->CountGroupSex->SetValue($items[$i]->CountGroupSex);
                            $this->CountGroupSex->Attributes->RestoreFromArray($items[$i]->_CountGroupSexAttributes);
                            $this->Sex_Header->CCSEventResult = CCGetEvent($this->Sex_Header->CCSEvents, "BeforeShow", $this->Sex_Header);
                            if ($this->Sex_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Header";
                                $this->Attributes->Show();
                                $this->GroupSex1->Show();
                                $this->CountGroupSex->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Sex_Footer->CCSEventResult = CCGetEvent($this->Sex_Footer->CCSEvents, "BeforeShow", $this->Sex_Footer);
                            if ($this->Sex_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Footer", true, "Section Detail");
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

} //End NewBorn1 Class @220-FCB6E20C

class clsNewBorn1DataSource extends clsDBregistry_db {  //NewBorn1DataSource Class @220-7E79F18C

//DataSource Variables @220-83E06D24
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GroupSex1;
    public $CountGroupSex;
//End DataSource Variables

//DataSourceClass_Initialize Event @220-1F80A1FC
    function clsNewBorn1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report NewBorn1";
        $this->Initialize();
        $this->GroupSex1 = new clsField("GroupSex1", ccsInteger, "");
        
        $this->CountGroupSex = new clsField("CountGroupSex", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @220-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @220-1EF06282
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("2", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("3", "urls_BirthDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate1"], "", false);
        $this->wp->AddParameter("4", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = "( newborn.Weight<500 )";
        $this->wp->Criterion[2] = $this->wp->Operation(opGreaterThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opLessThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger, true),false);
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

//Open Method @220-191103F6
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, FacilityName, Sex, NewBornID, BirthDate, Weight, facilities.FacilityID AS facilities_FacilityID \n\n" .
        "FROM (delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "newborn.Sex asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @220-0F75DA76
    function SetValues()
    {
        $this->GroupSex1->SetDBValue(trim($this->f("Sex")));
        $this->CountGroupSex->SetDBValue($this->f("Sex"));
    }
//End SetValues Method

} //End NewBorn1DataSource Class @220-FCB6E20C

//NewBorn2 ReportGroup class @260-8E0833E4
class clsReportGroupNewBorn2 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $GroupSex2, $_GroupSex2Attributes;
    public $CountGroupSex, $_CountGroupSexAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $SexTotalIndex;

    function clsReportGroupNewBorn2(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GroupSex2 = $this->Parent->GroupSex2->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_GroupSex2Attributes = $this->Parent->GroupSex2->Attributes->GetAsArray();
        $this->_CountGroupSexAttributes = $this->Parent->CountGroupSex->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->CountGroupSex = $this->CountGroupSex;
        $Header->_CountGroupSexAttributes = $this->_CountGroupSexAttributes;
        $this->GroupSex2 = $Header->GroupSex2;
        $Header->_GroupSex2Attributes = $this->_GroupSex2Attributes;
        $this->Parent->GroupSex2->Value = $Header->GroupSex2;
        $this->Parent->GroupSex2->Attributes->RestoreFromArray($Header->_GroupSex2Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetValue();
    }
}
//End NewBorn2 ReportGroup class

//NewBorn2 GroupsCollection class @260-4D63766D
class clsGroupsCollectionNewBorn2 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mSexCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionNewBorn2(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSexCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupNewBorn2($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SexTotalIndex = $this->mSexCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->GroupSex2->Value = $this->Parent->GroupSex2->initialValue;
        $this->Parent->CountGroupSex->Value = $this->Parent->CountGroupSex->initialValue;
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
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Sex") {
            $GroupSex = & $this->InitGroup(true);
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnInitialize", $this->Parent->Sex_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Sex_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Sex_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Sex_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Sex_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Header->Height;
                $GroupSex->SetTotalControls("GetNextValue");
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnCalculate", $this->Parent->Sex_Header);
            $GroupSex->SetControls();
            $GroupSex->Mode = 1;
            $GroupSex->GroupType = "Sex";
            $this->mSexCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSex;
            $this->Parent->CountGroupSex->Reset();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
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
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
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
        $GroupSex = & $this->InitGroup(true);
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnInitialize", $this->Parent->Sex_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Sex_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Sex_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Sex_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSex->SetTotalControls("GetPrevValue");
        $GroupSex->SyncWithHeader($this->Groups[$this->mSexCurrentHeaderIndex]);
        if ($this->Parent->Sex_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Footer->Height;
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnCalculate", $this->Parent->Sex_Footer);
        $GroupSex->SetControls();
        $this->Parent->CountGroupSex->Reset();
        $this->RestoreValues();
        $GroupSex->Mode = 2;
        $GroupSex->GroupType ="Sex";
        $this->Groups[] = & $GroupSex;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End NewBorn2 GroupsCollection class

class clsReportNewBorn2 { //NewBorn2 Class @260-3E46AFAF

//NewBorn2 Variables @260-80D63D80

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
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Sex_HeaderBlock, $Sex_Header;
    public $Sex_FooterBlock, $Sex_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sex_HeaderControls, $Sex_FooterControls;
//End NewBorn2 Variables

//Class_Initialize Event @260-603F09BF
    function clsReportNewBorn2($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "NewBorn2";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Sex_Footer = new clsSection($this);
        $this->Sex_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Footer->Height);
        $this->Sex_Header = new clsSection($this);
        $this->Sex_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsNewBorn2DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->GroupSex2 = new clsControl(ccsReportLabel, "GroupSex2", "GroupSex2", ccsInteger, "", "", $this);
        $this->CountGroupSex = new clsControl(ccsReportLabel, "CountGroupSex", "CountGroupSex", ccsText, "", 0, $this);
        $this->CountGroupSex->TotalFunction = "Count";
    }
//End Class_Initialize Event

//Initialize Method @260-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @260-CD002B70
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->GroupSex2->Errors->Count());
        $errors = ($errors || $this->CountGroupSex->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @260-B2E862A1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GroupSex2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CountGroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @260-3DFEFCCD
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_BirthDate1"] = CCGetFromGet("s_BirthDate1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SexKey = "";
        $Groups = new clsGroupsCollectionNewBorn2($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GroupSex2->SetValue($this->DataSource->GroupSex2->GetValue());
            $this->CountGroupSex->SetValue($this->DataSource->CountGroupSex->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SexKey != $this->DataSource->f("Sex")) {
                $Groups->OpenGroup("Sex");
            }
            $Groups->AddItem();
            $SexKey = $this->DataSource->f("Sex");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SexKey != $this->DataSource->f("Sex")) {
                $Groups->CloseGroup("Sex");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
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
            $this->ControlsVisible["GroupSex2"] = $this->GroupSex2->Visible;
            $this->ControlsVisible["CountGroupSex"] = $this->CountGroupSex->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        if ($this->Detail->Visible) {
                            $this->Attributes->Show();
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        }
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
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
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Sex":
                        if ($items[$i]->Mode == 1) {
                            $this->GroupSex2->SetValue($items[$i]->GroupSex2);
                            $this->GroupSex2->Attributes->RestoreFromArray($items[$i]->_GroupSex2Attributes);
                            $this->CountGroupSex->SetValue($items[$i]->CountGroupSex);
                            $this->CountGroupSex->Attributes->RestoreFromArray($items[$i]->_CountGroupSexAttributes);
                            $this->Sex_Header->CCSEventResult = CCGetEvent($this->Sex_Header->CCSEvents, "BeforeShow", $this->Sex_Header);
                            if ($this->Sex_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Header";
                                $this->Attributes->Show();
                                $this->GroupSex2->Show();
                                $this->CountGroupSex->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Sex_Footer->CCSEventResult = CCGetEvent($this->Sex_Footer->CCSEvents, "BeforeShow", $this->Sex_Footer);
                            if ($this->Sex_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Footer", true, "Section Detail");
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

} //End NewBorn2 Class @260-FCB6E20C

class clsNewBorn2DataSource extends clsDBregistry_db {  //NewBorn2DataSource Class @260-F5AACF95

//DataSource Variables @260-F5055419
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GroupSex2;
    public $CountGroupSex;
//End DataSource Variables

//DataSourceClass_Initialize Event @260-98E62A41
    function clsNewBorn2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report NewBorn2";
        $this->Initialize();
        $this->GroupSex2 = new clsField("GroupSex2", ccsInteger, "");
        
        $this->CountGroupSex = new clsField("CountGroupSex", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @260-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @260-556C8B2D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("3", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("4", "urls_BirthDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate1"], "", false);
        $this->wp->AddParameter("5", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = "( newborn.Weight>=500 )";
        $this->wp->Criterion[2] = "( newborn.Weight<=999 )";
        $this->wp->Criterion[3] = $this->wp->Operation(opGreaterThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opLessThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsDate),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @260-CA3C9D7B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, FacilityName, Sex, NewBornID, BirthDate, Weight \n\n" .
        "FROM (delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "newborn.Sex asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @260-F73A025D
    function SetValues()
    {
        $this->GroupSex2->SetDBValue(trim($this->f("Sex")));
        $this->CountGroupSex->SetDBValue($this->f("Sex"));
    }
//End SetValues Method

} //End NewBorn2DataSource Class @260-FCB6E20C

//NewBorn3 ReportGroup class @310-8A85C460
class clsReportGroupNewBorn3 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $GroupSex2, $_GroupSex2Attributes;
    public $CountGroupSex, $_CountGroupSexAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $SexTotalIndex;

    function clsReportGroupNewBorn3(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GroupSex2 = $this->Parent->GroupSex2->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_GroupSex2Attributes = $this->Parent->GroupSex2->Attributes->GetAsArray();
        $this->_CountGroupSexAttributes = $this->Parent->CountGroupSex->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->CountGroupSex = $this->CountGroupSex;
        $Header->_CountGroupSexAttributes = $this->_CountGroupSexAttributes;
        $this->GroupSex2 = $Header->GroupSex2;
        $Header->_GroupSex2Attributes = $this->_GroupSex2Attributes;
        $this->Parent->GroupSex2->Value = $Header->GroupSex2;
        $this->Parent->GroupSex2->Attributes->RestoreFromArray($Header->_GroupSex2Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetValue();
    }
}
//End NewBorn3 ReportGroup class

//NewBorn3 GroupsCollection class @310-045EFB2A
class clsGroupsCollectionNewBorn3 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mSexCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionNewBorn3(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSexCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupNewBorn3($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SexTotalIndex = $this->mSexCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->GroupSex2->Value = $this->Parent->GroupSex2->initialValue;
        $this->Parent->CountGroupSex->Value = $this->Parent->CountGroupSex->initialValue;
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
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Sex") {
            $GroupSex = & $this->InitGroup(true);
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnInitialize", $this->Parent->Sex_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Sex_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Sex_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Sex_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Sex_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Header->Height;
                $GroupSex->SetTotalControls("GetNextValue");
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnCalculate", $this->Parent->Sex_Header);
            $GroupSex->SetControls();
            $GroupSex->Mode = 1;
            $GroupSex->GroupType = "Sex";
            $this->mSexCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSex;
            $this->Parent->CountGroupSex->Reset();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
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
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
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
        $GroupSex = & $this->InitGroup(true);
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnInitialize", $this->Parent->Sex_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Sex_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Sex_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Sex_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSex->SetTotalControls("GetPrevValue");
        $GroupSex->SyncWithHeader($this->Groups[$this->mSexCurrentHeaderIndex]);
        if ($this->Parent->Sex_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Footer->Height;
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnCalculate", $this->Parent->Sex_Footer);
        $GroupSex->SetControls();
        $this->Parent->CountGroupSex->Reset();
        $this->RestoreValues();
        $GroupSex->Mode = 2;
        $GroupSex->GroupType ="Sex";
        $this->Groups[] = & $GroupSex;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End NewBorn3 GroupsCollection class

class clsReportNewBorn3 { //NewBorn3 Class @310-275D9EEE

//NewBorn3 Variables @310-80D63D80

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
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Sex_HeaderBlock, $Sex_Header;
    public $Sex_FooterBlock, $Sex_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sex_HeaderControls, $Sex_FooterControls;
//End NewBorn3 Variables

//Class_Initialize Event @310-B10181B4
    function clsReportNewBorn3($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "NewBorn3";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Sex_Footer = new clsSection($this);
        $this->Sex_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Footer->Height);
        $this->Sex_Header = new clsSection($this);
        $this->Sex_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsNewBorn3DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->GroupSex2 = new clsControl(ccsReportLabel, "GroupSex2", "GroupSex2", ccsInteger, "", "", $this);
        $this->CountGroupSex = new clsControl(ccsReportLabel, "CountGroupSex", "CountGroupSex", ccsText, "", 0, $this);
        $this->CountGroupSex->TotalFunction = "Count";
    }
//End Class_Initialize Event

//Initialize Method @310-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @310-CD002B70
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->GroupSex2->Errors->Count());
        $errors = ($errors || $this->CountGroupSex->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @310-B2E862A1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GroupSex2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CountGroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @310-5E55CE1E
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_BirthDate1"] = CCGetFromGet("s_BirthDate1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SexKey = "";
        $Groups = new clsGroupsCollectionNewBorn3($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GroupSex2->SetValue($this->DataSource->GroupSex2->GetValue());
            $this->CountGroupSex->SetValue($this->DataSource->CountGroupSex->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SexKey != $this->DataSource->f("Sex")) {
                $Groups->OpenGroup("Sex");
            }
            $Groups->AddItem();
            $SexKey = $this->DataSource->f("Sex");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SexKey != $this->DataSource->f("Sex")) {
                $Groups->CloseGroup("Sex");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
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
            $this->ControlsVisible["GroupSex2"] = $this->GroupSex2->Visible;
            $this->ControlsVisible["CountGroupSex"] = $this->CountGroupSex->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        if ($this->Detail->Visible) {
                            $this->Attributes->Show();
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        }
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
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
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Sex":
                        if ($items[$i]->Mode == 1) {
                            $this->GroupSex2->SetValue($items[$i]->GroupSex2);
                            $this->GroupSex2->Attributes->RestoreFromArray($items[$i]->_GroupSex2Attributes);
                            $this->CountGroupSex->SetValue($items[$i]->CountGroupSex);
                            $this->CountGroupSex->Attributes->RestoreFromArray($items[$i]->_CountGroupSexAttributes);
                            $this->Sex_Header->CCSEventResult = CCGetEvent($this->Sex_Header->CCSEvents, "BeforeShow", $this->Sex_Header);
                            if ($this->Sex_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Header";
                                $this->Attributes->Show();
                                $this->GroupSex2->Show();
                                $this->CountGroupSex->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Sex_Footer->CCSEventResult = CCGetEvent($this->Sex_Footer->CCSEvents, "BeforeShow", $this->Sex_Footer);
                            if ($this->Sex_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Footer", true, "Section Detail");
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

} //End NewBorn3 Class @310-FCB6E20C

class clsNewBorn3DataSource extends clsDBregistry_db {  //NewBorn3DataSource Class @310-3A34D85D

//DataSource Variables @310-F5055419
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GroupSex2;
    public $CountGroupSex;
//End DataSource Variables

//DataSourceClass_Initialize Event @310-F1381EF4
    function clsNewBorn3DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report NewBorn3";
        $this->Initialize();
        $this->GroupSex2 = new clsField("GroupSex2", ccsInteger, "");
        
        $this->CountGroupSex = new clsField("CountGroupSex", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @310-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @310-133147A6
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("3", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("4", "urls_BirthDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate1"], "", false);
        $this->wp->AddParameter("5", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = "( newborn.Weight>=1000 )";
        $this->wp->Criterion[2] = "( newborn.Weight<=1499 )";
        $this->wp->Criterion[3] = $this->wp->Operation(opGreaterThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opLessThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsDate),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @310-CA3C9D7B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, FacilityName, Sex, NewBornID, BirthDate, Weight \n\n" .
        "FROM (delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "newborn.Sex asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @310-F73A025D
    function SetValues()
    {
        $this->GroupSex2->SetDBValue(trim($this->f("Sex")));
        $this->CountGroupSex->SetDBValue($this->f("Sex"));
    }
//End SetValues Method

} //End NewBorn3DataSource Class @310-FCB6E20C

//NewBorn4 ReportGroup class @357-952402FC
class clsReportGroupNewBorn4 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $GroupSex2, $_GroupSex2Attributes;
    public $CountGroupSex, $_CountGroupSexAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $SexTotalIndex;

    function clsReportGroupNewBorn4(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GroupSex2 = $this->Parent->GroupSex2->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_GroupSex2Attributes = $this->Parent->GroupSex2->Attributes->GetAsArray();
        $this->_CountGroupSexAttributes = $this->Parent->CountGroupSex->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->CountGroupSex = $this->CountGroupSex;
        $Header->_CountGroupSexAttributes = $this->_CountGroupSexAttributes;
        $this->GroupSex2 = $Header->GroupSex2;
        $Header->_GroupSex2Attributes = $this->_GroupSex2Attributes;
        $this->Parent->GroupSex2->Value = $Header->GroupSex2;
        $this->Parent->GroupSex2->Attributes->RestoreFromArray($Header->_GroupSex2Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetValue();
    }
}
//End NewBorn4 ReportGroup class

//NewBorn4 GroupsCollection class @357-209F5FBE
class clsGroupsCollectionNewBorn4 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mSexCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionNewBorn4(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSexCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupNewBorn4($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SexTotalIndex = $this->mSexCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->GroupSex2->Value = $this->Parent->GroupSex2->initialValue;
        $this->Parent->CountGroupSex->Value = $this->Parent->CountGroupSex->initialValue;
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
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Sex") {
            $GroupSex = & $this->InitGroup(true);
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnInitialize", $this->Parent->Sex_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Sex_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Sex_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Sex_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Sex_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Header->Height;
                $GroupSex->SetTotalControls("GetNextValue");
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnCalculate", $this->Parent->Sex_Header);
            $GroupSex->SetControls();
            $GroupSex->Mode = 1;
            $GroupSex->GroupType = "Sex";
            $this->mSexCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSex;
            $this->Parent->CountGroupSex->Reset();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
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
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
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
        $GroupSex = & $this->InitGroup(true);
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnInitialize", $this->Parent->Sex_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Sex_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Sex_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Sex_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSex->SetTotalControls("GetPrevValue");
        $GroupSex->SyncWithHeader($this->Groups[$this->mSexCurrentHeaderIndex]);
        if ($this->Parent->Sex_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Footer->Height;
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnCalculate", $this->Parent->Sex_Footer);
        $GroupSex->SetControls();
        $this->Parent->CountGroupSex->Reset();
        $this->RestoreValues();
        $GroupSex->Mode = 2;
        $GroupSex->GroupType ="Sex";
        $this->Groups[] = & $GroupSex;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End NewBorn4 GroupsCollection class

class clsReportNewBorn4 { //NewBorn4 Class @357-681C0829

//NewBorn4 Variables @357-80D63D80

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
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Sex_HeaderBlock, $Sex_Header;
    public $Sex_FooterBlock, $Sex_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sex_HeaderControls, $Sex_FooterControls;
//End NewBorn4 Variables

//Class_Initialize Event @357-EB2B3346
    function clsReportNewBorn4($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "NewBorn4";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Sex_Footer = new clsSection($this);
        $this->Sex_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Footer->Height);
        $this->Sex_Header = new clsSection($this);
        $this->Sex_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsNewBorn4DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->GroupSex2 = new clsControl(ccsReportLabel, "GroupSex2", "GroupSex2", ccsInteger, "", "", $this);
        $this->CountGroupSex = new clsControl(ccsReportLabel, "CountGroupSex", "CountGroupSex", ccsText, "", 0, $this);
        $this->CountGroupSex->TotalFunction = "Count";
    }
//End Class_Initialize Event

//Initialize Method @357-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @357-CD002B70
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->GroupSex2->Errors->Count());
        $errors = ($errors || $this->CountGroupSex->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @357-B2E862A1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GroupSex2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CountGroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @357-AF755466
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_BirthDate1"] = CCGetFromGet("s_BirthDate1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SexKey = "";
        $Groups = new clsGroupsCollectionNewBorn4($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GroupSex2->SetValue($this->DataSource->GroupSex2->GetValue());
            $this->CountGroupSex->SetValue($this->DataSource->CountGroupSex->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SexKey != $this->DataSource->f("Sex")) {
                $Groups->OpenGroup("Sex");
            }
            $Groups->AddItem();
            $SexKey = $this->DataSource->f("Sex");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SexKey != $this->DataSource->f("Sex")) {
                $Groups->CloseGroup("Sex");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
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
            $this->ControlsVisible["GroupSex2"] = $this->GroupSex2->Visible;
            $this->ControlsVisible["CountGroupSex"] = $this->CountGroupSex->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        if ($this->Detail->Visible) {
                            $this->Attributes->Show();
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        }
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
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
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Sex":
                        if ($items[$i]->Mode == 1) {
                            $this->GroupSex2->SetValue($items[$i]->GroupSex2);
                            $this->GroupSex2->Attributes->RestoreFromArray($items[$i]->_GroupSex2Attributes);
                            $this->CountGroupSex->SetValue($items[$i]->CountGroupSex);
                            $this->CountGroupSex->Attributes->RestoreFromArray($items[$i]->_CountGroupSexAttributes);
                            $this->Sex_Header->CCSEventResult = CCGetEvent($this->Sex_Header->CCSEvents, "BeforeShow", $this->Sex_Header);
                            if ($this->Sex_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Header";
                                $this->Attributes->Show();
                                $this->GroupSex2->Show();
                                $this->CountGroupSex->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Sex_Footer->CCSEventResult = CCGetEvent($this->Sex_Footer->CCSEvents, "BeforeShow", $this->Sex_Footer);
                            if ($this->Sex_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Footer", true, "Section Detail");
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

} //End NewBorn4 Class @357-FCB6E20C

class clsNewBorn4DataSource extends clsDBregistry_db {  //NewBorn4DataSource Class @357-397DB5E6

//DataSource Variables @357-F5055419
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GroupSex2;
    public $CountGroupSex;
//End DataSource Variables

//DataSourceClass_Initialize Event @357-375397BE
    function clsNewBorn4DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report NewBorn4";
        $this->Initialize();
        $this->GroupSex2 = new clsField("GroupSex2", ccsInteger, "");
        
        $this->CountGroupSex = new clsField("CountGroupSex", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @357-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @357-C537212A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("3", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("4", "urls_BirthDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate1"], "", false);
        $this->wp->AddParameter("5", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = "( newborn.Weight>=1500 )";
        $this->wp->Criterion[2] = "( newborn.Weight<=1999 )";
        $this->wp->Criterion[3] = $this->wp->Operation(opGreaterThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opLessThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsDate),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @357-CA3C9D7B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, FacilityName, Sex, NewBornID, BirthDate, Weight \n\n" .
        "FROM (delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "newborn.Sex asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @357-F73A025D
    function SetValues()
    {
        $this->GroupSex2->SetDBValue(trim($this->f("Sex")));
        $this->CountGroupSex->SetDBValue($this->f("Sex"));
    }
//End SetValues Method

} //End NewBorn4DataSource Class @357-FCB6E20C

//NewBorn5 ReportGroup class @401-91A9F578
class clsReportGroupNewBorn5 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $GroupSex2, $_GroupSex2Attributes;
    public $CountGroupSex, $_CountGroupSexAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $SexTotalIndex;

    function clsReportGroupNewBorn5(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GroupSex2 = $this->Parent->GroupSex2->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_GroupSex2Attributes = $this->Parent->GroupSex2->Attributes->GetAsArray();
        $this->_CountGroupSexAttributes = $this->Parent->CountGroupSex->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->CountGroupSex = $this->CountGroupSex;
        $Header->_CountGroupSexAttributes = $this->_CountGroupSexAttributes;
        $this->GroupSex2 = $Header->GroupSex2;
        $Header->_GroupSex2Attributes = $this->_GroupSex2Attributes;
        $this->Parent->GroupSex2->Value = $Header->GroupSex2;
        $this->Parent->GroupSex2->Attributes->RestoreFromArray($Header->_GroupSex2Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetValue();
    }
}
//End NewBorn5 ReportGroup class

//NewBorn5 GroupsCollection class @401-69A2D2F9
class clsGroupsCollectionNewBorn5 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mSexCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionNewBorn5(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSexCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupNewBorn5($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SexTotalIndex = $this->mSexCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->GroupSex2->Value = $this->Parent->GroupSex2->initialValue;
        $this->Parent->CountGroupSex->Value = $this->Parent->CountGroupSex->initialValue;
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
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Sex") {
            $GroupSex = & $this->InitGroup(true);
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnInitialize", $this->Parent->Sex_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Sex_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Sex_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Sex_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Sex_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Header->Height;
                $GroupSex->SetTotalControls("GetNextValue");
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnCalculate", $this->Parent->Sex_Header);
            $GroupSex->SetControls();
            $GroupSex->Mode = 1;
            $GroupSex->GroupType = "Sex";
            $this->mSexCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSex;
            $this->Parent->CountGroupSex->Reset();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
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
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
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
        $GroupSex = & $this->InitGroup(true);
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnInitialize", $this->Parent->Sex_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Sex_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Sex_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Sex_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSex->SetTotalControls("GetPrevValue");
        $GroupSex->SyncWithHeader($this->Groups[$this->mSexCurrentHeaderIndex]);
        if ($this->Parent->Sex_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Footer->Height;
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnCalculate", $this->Parent->Sex_Footer);
        $GroupSex->SetControls();
        $this->Parent->CountGroupSex->Reset();
        $this->RestoreValues();
        $GroupSex->Mode = 2;
        $GroupSex->GroupType ="Sex";
        $this->Groups[] = & $GroupSex;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End NewBorn5 GroupsCollection class

class clsReportNewBorn5 { //NewBorn5 Class @401-71073968

//NewBorn5 Variables @401-80D63D80

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
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Sex_HeaderBlock, $Sex_Header;
    public $Sex_FooterBlock, $Sex_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sex_HeaderControls, $Sex_FooterControls;
//End NewBorn5 Variables

//Class_Initialize Event @401-3A15BB4D
    function clsReportNewBorn5($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "NewBorn5";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Sex_Footer = new clsSection($this);
        $this->Sex_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Footer->Height);
        $this->Sex_Header = new clsSection($this);
        $this->Sex_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsNewBorn5DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->GroupSex2 = new clsControl(ccsReportLabel, "GroupSex2", "GroupSex2", ccsInteger, "", "", $this);
        $this->CountGroupSex = new clsControl(ccsReportLabel, "CountGroupSex", "CountGroupSex", ccsText, "", 0, $this);
        $this->CountGroupSex->TotalFunction = "Count";
    }
//End Class_Initialize Event

//Initialize Method @401-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @401-CD002B70
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->GroupSex2->Errors->Count());
        $errors = ($errors || $this->CountGroupSex->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @401-B2E862A1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GroupSex2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CountGroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @401-CCDE66B5
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_BirthDate1"] = CCGetFromGet("s_BirthDate1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SexKey = "";
        $Groups = new clsGroupsCollectionNewBorn5($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GroupSex2->SetValue($this->DataSource->GroupSex2->GetValue());
            $this->CountGroupSex->SetValue($this->DataSource->CountGroupSex->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SexKey != $this->DataSource->f("Sex")) {
                $Groups->OpenGroup("Sex");
            }
            $Groups->AddItem();
            $SexKey = $this->DataSource->f("Sex");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SexKey != $this->DataSource->f("Sex")) {
                $Groups->CloseGroup("Sex");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
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
            $this->ControlsVisible["GroupSex2"] = $this->GroupSex2->Visible;
            $this->ControlsVisible["CountGroupSex"] = $this->CountGroupSex->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        if ($this->Detail->Visible) {
                            $this->Attributes->Show();
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        }
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
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
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Sex":
                        if ($items[$i]->Mode == 1) {
                            $this->GroupSex2->SetValue($items[$i]->GroupSex2);
                            $this->GroupSex2->Attributes->RestoreFromArray($items[$i]->_GroupSex2Attributes);
                            $this->CountGroupSex->SetValue($items[$i]->CountGroupSex);
                            $this->CountGroupSex->Attributes->RestoreFromArray($items[$i]->_CountGroupSexAttributes);
                            $this->Sex_Header->CCSEventResult = CCGetEvent($this->Sex_Header->CCSEvents, "BeforeShow", $this->Sex_Header);
                            if ($this->Sex_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Header";
                                $this->Attributes->Show();
                                $this->GroupSex2->Show();
                                $this->CountGroupSex->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Sex_Footer->CCSEventResult = CCGetEvent($this->Sex_Footer->CCSEvents, "BeforeShow", $this->Sex_Footer);
                            if ($this->Sex_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Footer", true, "Section Detail");
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

} //End NewBorn5 Class @401-FCB6E20C

class clsNewBorn5DataSource extends clsDBregistry_db {  //NewBorn5DataSource Class @401-F6E3A22E

//DataSource Variables @401-F5055419
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GroupSex2;
    public $CountGroupSex;
//End DataSource Variables

//DataSourceClass_Initialize Event @401-5E8DA30B
    function clsNewBorn5DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report NewBorn5";
        $this->Initialize();
        $this->GroupSex2 = new clsField("GroupSex2", ccsInteger, "");
        
        $this->CountGroupSex = new clsField("CountGroupSex", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @401-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @401-9CD9671E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("3", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("4", "urls_BirthDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate1"], "", false);
        $this->wp->AddParameter("5", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = "( newborn.Weight>=2000 )";
        $this->wp->Criterion[2] = "( newborn.Weight<=2499 )";
        $this->wp->Criterion[3] = $this->wp->Operation(opGreaterThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opLessThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsDate),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @401-CA3C9D7B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, FacilityName, Sex, NewBornID, BirthDate, Weight \n\n" .
        "FROM (delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "newborn.Sex asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @401-F73A025D
    function SetValues()
    {
        $this->GroupSex2->SetDBValue(trim($this->f("Sex")));
        $this->CountGroupSex->SetDBValue($this->f("Sex"));
    }
//End SetValues Method

} //End NewBorn5DataSource Class @401-FCB6E20C

//NewBorn6 ReportGroup class @445-9C3FEDF4
class clsReportGroupNewBorn6 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $GroupSex2, $_GroupSex2Attributes;
    public $CountGroupSex, $_CountGroupSexAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $SexTotalIndex;

    function clsReportGroupNewBorn6(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GroupSex2 = $this->Parent->GroupSex2->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_GroupSex2Attributes = $this->Parent->GroupSex2->Attributes->GetAsArray();
        $this->_CountGroupSexAttributes = $this->Parent->CountGroupSex->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->CountGroupSex = $this->CountGroupSex;
        $Header->_CountGroupSexAttributes = $this->_CountGroupSexAttributes;
        $this->GroupSex2 = $Header->GroupSex2;
        $Header->_GroupSex2Attributes = $this->_GroupSex2Attributes;
        $this->Parent->GroupSex2->Value = $Header->GroupSex2;
        $this->Parent->GroupSex2->Attributes->RestoreFromArray($Header->_GroupSex2Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetValue();
    }
}
//End NewBorn6 ReportGroup class

//NewBorn6 GroupsCollection class @445-B2E44530
class clsGroupsCollectionNewBorn6 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mSexCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionNewBorn6(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSexCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupNewBorn6($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SexTotalIndex = $this->mSexCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->GroupSex2->Value = $this->Parent->GroupSex2->initialValue;
        $this->Parent->CountGroupSex->Value = $this->Parent->CountGroupSex->initialValue;
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
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Sex") {
            $GroupSex = & $this->InitGroup(true);
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnInitialize", $this->Parent->Sex_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Sex_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Sex_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Sex_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Sex_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Header->Height;
                $GroupSex->SetTotalControls("GetNextValue");
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnCalculate", $this->Parent->Sex_Header);
            $GroupSex->SetControls();
            $GroupSex->Mode = 1;
            $GroupSex->GroupType = "Sex";
            $this->mSexCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSex;
            $this->Parent->CountGroupSex->Reset();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
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
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
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
        $GroupSex = & $this->InitGroup(true);
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnInitialize", $this->Parent->Sex_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Sex_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Sex_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Sex_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSex->SetTotalControls("GetPrevValue");
        $GroupSex->SyncWithHeader($this->Groups[$this->mSexCurrentHeaderIndex]);
        if ($this->Parent->Sex_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Footer->Height;
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnCalculate", $this->Parent->Sex_Footer);
        $GroupSex->SetControls();
        $this->Parent->CountGroupSex->Reset();
        $this->RestoreValues();
        $GroupSex->Mode = 2;
        $GroupSex->GroupType ="Sex";
        $this->Groups[] = & $GroupSex;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End NewBorn6 GroupsCollection class

class clsReportNewBorn6 { //NewBorn6 Class @445-5A2A6AAB

//NewBorn6 Variables @445-80D63D80

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
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Sex_HeaderBlock, $Sex_Header;
    public $Sex_FooterBlock, $Sex_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sex_HeaderControls, $Sex_FooterControls;
//End NewBorn6 Variables

//Class_Initialize Event @445-92272511
    function clsReportNewBorn6($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "NewBorn6";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Sex_Footer = new clsSection($this);
        $this->Sex_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Footer->Height);
        $this->Sex_Header = new clsSection($this);
        $this->Sex_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsNewBorn6DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->GroupSex2 = new clsControl(ccsReportLabel, "GroupSex2", "GroupSex2", ccsInteger, "", "", $this);
        $this->CountGroupSex = new clsControl(ccsReportLabel, "CountGroupSex", "CountGroupSex", ccsText, "", 0, $this);
        $this->CountGroupSex->TotalFunction = "Count";
    }
//End Class_Initialize Event

//Initialize Method @445-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @445-CD002B70
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->GroupSex2->Errors->Count());
        $errors = ($errors || $this->CountGroupSex->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @445-B2E862A1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GroupSex2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CountGroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @445-682331C0
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_BirthDate1"] = CCGetFromGet("s_BirthDate1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SexKey = "";
        $Groups = new clsGroupsCollectionNewBorn6($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GroupSex2->SetValue($this->DataSource->GroupSex2->GetValue());
            $this->CountGroupSex->SetValue($this->DataSource->CountGroupSex->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SexKey != $this->DataSource->f("Sex")) {
                $Groups->OpenGroup("Sex");
            }
            $Groups->AddItem();
            $SexKey = $this->DataSource->f("Sex");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SexKey != $this->DataSource->f("Sex")) {
                $Groups->CloseGroup("Sex");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
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
            $this->ControlsVisible["GroupSex2"] = $this->GroupSex2->Visible;
            $this->ControlsVisible["CountGroupSex"] = $this->CountGroupSex->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        if ($this->Detail->Visible) {
                            $this->Attributes->Show();
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        }
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
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
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Sex":
                        if ($items[$i]->Mode == 1) {
                            $this->GroupSex2->SetValue($items[$i]->GroupSex2);
                            $this->GroupSex2->Attributes->RestoreFromArray($items[$i]->_GroupSex2Attributes);
                            $this->CountGroupSex->SetValue($items[$i]->CountGroupSex);
                            $this->CountGroupSex->Attributes->RestoreFromArray($items[$i]->_CountGroupSexAttributes);
                            $this->Sex_Header->CCSEventResult = CCGetEvent($this->Sex_Header->CCSEvents, "BeforeShow", $this->Sex_Header);
                            if ($this->Sex_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Header";
                                $this->Attributes->Show();
                                $this->GroupSex2->Show();
                                $this->CountGroupSex->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Sex_Footer->CCSEventResult = CCGetEvent($this->Sex_Footer->CCSEvents, "BeforeShow", $this->Sex_Footer);
                            if ($this->Sex_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Footer", true, "Section Detail");
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

} //End NewBorn6 Class @445-FCB6E20C

class clsNewBorn6DataSource extends clsDBregistry_db {  //NewBorn6DataSource Class @445-7D309C37

//DataSource Variables @445-F5055419
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GroupSex2;
    public $CountGroupSex;
//End DataSource Variables

//DataSourceClass_Initialize Event @445-E4EFFED4
    function clsNewBorn6DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report NewBorn6";
        $this->Initialize();
        $this->GroupSex2 = new clsField("GroupSex2", ccsInteger, "");
        
        $this->CountGroupSex = new clsField("CountGroupSex", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @445-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @445-4ADF0192
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("3", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("4", "urls_BirthDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate1"], "", false);
        $this->wp->AddParameter("5", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = "( newborn.Weight>=2500 )";
        $this->wp->Criterion[2] = "( newborn.Weight<=2999 )";
        $this->wp->Criterion[3] = $this->wp->Operation(opGreaterThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opLessThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsDate),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @445-CA3C9D7B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, FacilityName, Sex, NewBornID, BirthDate, Weight \n\n" .
        "FROM (delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "newborn.Sex asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @445-F73A025D
    function SetValues()
    {
        $this->GroupSex2->SetDBValue(trim($this->f("Sex")));
        $this->CountGroupSex->SetDBValue($this->f("Sex"));
    }
//End SetValues Method

} //End NewBorn6DataSource Class @445-FCB6E20C

//NewBorn7 ReportGroup class @489-98B21A70
class clsReportGroupNewBorn7 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $GroupSex2, $_GroupSex2Attributes;
    public $CountGroupSex, $_CountGroupSexAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $SexTotalIndex;

    function clsReportGroupNewBorn7(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GroupSex2 = $this->Parent->GroupSex2->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_GroupSex2Attributes = $this->Parent->GroupSex2->Attributes->GetAsArray();
        $this->_CountGroupSexAttributes = $this->Parent->CountGroupSex->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->CountGroupSex = $this->CountGroupSex;
        $Header->_CountGroupSexAttributes = $this->_CountGroupSexAttributes;
        $this->GroupSex2 = $Header->GroupSex2;
        $Header->_GroupSex2Attributes = $this->_GroupSex2Attributes;
        $this->Parent->GroupSex2->Value = $Header->GroupSex2;
        $this->Parent->GroupSex2->Attributes->RestoreFromArray($Header->_GroupSex2Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetValue();
    }
}
//End NewBorn7 ReportGroup class

//NewBorn7 GroupsCollection class @489-FBD9C877
class clsGroupsCollectionNewBorn7 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mSexCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionNewBorn7(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSexCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupNewBorn7($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SexTotalIndex = $this->mSexCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->GroupSex2->Value = $this->Parent->GroupSex2->initialValue;
        $this->Parent->CountGroupSex->Value = $this->Parent->CountGroupSex->initialValue;
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
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Sex") {
            $GroupSex = & $this->InitGroup(true);
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnInitialize", $this->Parent->Sex_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Sex_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Sex_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Sex_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Sex_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Header->Height;
                $GroupSex->SetTotalControls("GetNextValue");
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnCalculate", $this->Parent->Sex_Header);
            $GroupSex->SetControls();
            $GroupSex->Mode = 1;
            $GroupSex->GroupType = "Sex";
            $this->mSexCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSex;
            $this->Parent->CountGroupSex->Reset();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
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
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
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
        $GroupSex = & $this->InitGroup(true);
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnInitialize", $this->Parent->Sex_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Sex_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Sex_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Sex_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSex->SetTotalControls("GetPrevValue");
        $GroupSex->SyncWithHeader($this->Groups[$this->mSexCurrentHeaderIndex]);
        if ($this->Parent->Sex_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Footer->Height;
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnCalculate", $this->Parent->Sex_Footer);
        $GroupSex->SetControls();
        $this->Parent->CountGroupSex->Reset();
        $this->RestoreValues();
        $GroupSex->Mode = 2;
        $GroupSex->GroupType ="Sex";
        $this->Groups[] = & $GroupSex;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End NewBorn7 GroupsCollection class

class clsReportNewBorn7 { //NewBorn7 Class @489-43315BEA

//NewBorn7 Variables @489-80D63D80

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
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Sex_HeaderBlock, $Sex_Header;
    public $Sex_FooterBlock, $Sex_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sex_HeaderControls, $Sex_FooterControls;
//End NewBorn7 Variables

//Class_Initialize Event @489-4319AD1A
    function clsReportNewBorn7($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "NewBorn7";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Sex_Footer = new clsSection($this);
        $this->Sex_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Footer->Height);
        $this->Sex_Header = new clsSection($this);
        $this->Sex_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsNewBorn7DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->GroupSex2 = new clsControl(ccsReportLabel, "GroupSex2", "GroupSex2", ccsInteger, "", "", $this);
        $this->CountGroupSex = new clsControl(ccsReportLabel, "CountGroupSex", "CountGroupSex", ccsText, "", 0, $this);
        $this->CountGroupSex->TotalFunction = "Count";
    }
//End Class_Initialize Event

//Initialize Method @489-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @489-CD002B70
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->GroupSex2->Errors->Count());
        $errors = ($errors || $this->CountGroupSex->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @489-B2E862A1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GroupSex2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CountGroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @489-0B880313
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_BirthDate1"] = CCGetFromGet("s_BirthDate1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SexKey = "";
        $Groups = new clsGroupsCollectionNewBorn7($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GroupSex2->SetValue($this->DataSource->GroupSex2->GetValue());
            $this->CountGroupSex->SetValue($this->DataSource->CountGroupSex->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SexKey != $this->DataSource->f("Sex")) {
                $Groups->OpenGroup("Sex");
            }
            $Groups->AddItem();
            $SexKey = $this->DataSource->f("Sex");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SexKey != $this->DataSource->f("Sex")) {
                $Groups->CloseGroup("Sex");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
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
            $this->ControlsVisible["GroupSex2"] = $this->GroupSex2->Visible;
            $this->ControlsVisible["CountGroupSex"] = $this->CountGroupSex->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        if ($this->Detail->Visible) {
                            $this->Attributes->Show();
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        }
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
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
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Sex":
                        if ($items[$i]->Mode == 1) {
                            $this->GroupSex2->SetValue($items[$i]->GroupSex2);
                            $this->GroupSex2->Attributes->RestoreFromArray($items[$i]->_GroupSex2Attributes);
                            $this->CountGroupSex->SetValue($items[$i]->CountGroupSex);
                            $this->CountGroupSex->Attributes->RestoreFromArray($items[$i]->_CountGroupSexAttributes);
                            $this->Sex_Header->CCSEventResult = CCGetEvent($this->Sex_Header->CCSEvents, "BeforeShow", $this->Sex_Header);
                            if ($this->Sex_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Header";
                                $this->Attributes->Show();
                                $this->GroupSex2->Show();
                                $this->CountGroupSex->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Sex_Footer->CCSEventResult = CCGetEvent($this->Sex_Footer->CCSEvents, "BeforeShow", $this->Sex_Footer);
                            if ($this->Sex_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Footer", true, "Section Detail");
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

} //End NewBorn7 Class @489-FCB6E20C

class clsNewBorn7DataSource extends clsDBregistry_db {  //NewBorn7DataSource Class @489-B2AE8BFF

//DataSource Variables @489-F5055419
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GroupSex2;
    public $CountGroupSex;
//End DataSource Variables

//DataSourceClass_Initialize Event @489-8D31CA61
    function clsNewBorn7DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report NewBorn7";
        $this->Initialize();
        $this->GroupSex2 = new clsField("GroupSex2", ccsInteger, "");
        
        $this->CountGroupSex = new clsField("CountGroupSex", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @489-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @489-E67E8776
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("3", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("4", "urls_BirthDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate1"], "", false);
        $this->wp->AddParameter("5", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = "( newborn.Weight>=3000 )";
        $this->wp->Criterion[2] = "( newborn.Weight<=3499 )";
        $this->wp->Criterion[3] = $this->wp->Operation(opGreaterThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opLessThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsDate),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @489-CA3C9D7B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, FacilityName, Sex, NewBornID, BirthDate, Weight \n\n" .
        "FROM (delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "newborn.Sex asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @489-F73A025D
    function SetValues()
    {
        $this->GroupSex2->SetDBValue(trim($this->f("Sex")));
        $this->CountGroupSex->SetDBValue($this->f("Sex"));
    }
//End SetValues Method

} //End NewBorn7DataSource Class @489-FCB6E20C

//NewBorn8 ReportGroup class @533-A37C60CC
class clsReportGroupNewBorn8 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $GroupSex2, $_GroupSex2Attributes;
    public $CountGroupSex, $_CountGroupSexAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $SexTotalIndex;

    function clsReportGroupNewBorn8(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GroupSex2 = $this->Parent->GroupSex2->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_GroupSex2Attributes = $this->Parent->GroupSex2->Attributes->GetAsArray();
        $this->_CountGroupSexAttributes = $this->Parent->CountGroupSex->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->CountGroupSex = $this->CountGroupSex;
        $Header->_CountGroupSexAttributes = $this->_CountGroupSexAttributes;
        $this->GroupSex2 = $Header->GroupSex2;
        $Header->_GroupSex2Attributes = $this->_GroupSex2Attributes;
        $this->Parent->GroupSex2->Value = $Header->GroupSex2;
        $this->Parent->GroupSex2->Attributes->RestoreFromArray($Header->_GroupSex2Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->CountGroupSex = $this->Parent->CountGroupSex->GetValue();
    }
}
//End NewBorn8 ReportGroup class

//NewBorn8 GroupsCollection class @533-FB670C18
class clsGroupsCollectionNewBorn8 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mSexCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionNewBorn8(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSexCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupNewBorn8($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SexTotalIndex = $this->mSexCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->GroupSex2->Value = $this->Parent->GroupSex2->initialValue;
        $this->Parent->CountGroupSex->Value = $this->Parent->CountGroupSex->initialValue;
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
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Sex") {
            $GroupSex = & $this->InitGroup(true);
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnInitialize", $this->Parent->Sex_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Sex_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Sex_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Sex_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Sex_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Header->Height;
                $GroupSex->SetTotalControls("GetNextValue");
            $this->Parent->Sex_Header->CCSEventResult = CCGetEvent($this->Parent->Sex_Header->CCSEvents, "OnCalculate", $this->Parent->Sex_Header);
            $GroupSex->SetControls();
            $GroupSex->Mode = 1;
            $GroupSex->GroupType = "Sex";
            $this->mSexCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSex;
            $this->Parent->CountGroupSex->Reset();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
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
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
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
        $GroupSex = & $this->InitGroup(true);
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnInitialize", $this->Parent->Sex_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Sex_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Sex_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Sex_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSex->SetTotalControls("GetPrevValue");
        $GroupSex->SyncWithHeader($this->Groups[$this->mSexCurrentHeaderIndex]);
        if ($this->Parent->Sex_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Sex_Footer->Height;
        $this->Parent->Sex_Footer->CCSEventResult = CCGetEvent($this->Parent->Sex_Footer->CCSEvents, "OnCalculate", $this->Parent->Sex_Footer);
        $GroupSex->SetControls();
        $this->Parent->CountGroupSex->Reset();
        $this->RestoreValues();
        $GroupSex->Mode = 2;
        $GroupSex->GroupType ="Sex";
        $this->Groups[] = & $GroupSex;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End NewBorn8 GroupsCollection class

class clsReportNewBorn8 { //NewBorn8 Class @533-C4A94725

//NewBorn8 Variables @533-80D63D80

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
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Sex_HeaderBlock, $Sex_Header;
    public $Sex_FooterBlock, $Sex_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sex_HeaderControls, $Sex_FooterControls;
//End NewBorn8 Variables

//Class_Initialize Event @533-267240F5
    function clsReportNewBorn8($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "NewBorn8";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Sex_Footer = new clsSection($this);
        $this->Sex_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Footer->Height);
        $this->Sex_Header = new clsSection($this);
        $this->Sex_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Sex_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsNewBorn8DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->GroupSex2 = new clsControl(ccsReportLabel, "GroupSex2", "GroupSex2", ccsInteger, "", "", $this);
        $this->CountGroupSex = new clsControl(ccsReportLabel, "CountGroupSex", "CountGroupSex", ccsText, "", 0, $this);
        $this->CountGroupSex->TotalFunction = "Count";
    }
//End Class_Initialize Event

//Initialize Method @533-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @533-CD002B70
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->GroupSex2->Errors->Count());
        $errors = ($errors || $this->CountGroupSex->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @533-B2E862A1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GroupSex2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CountGroupSex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @533-51130371
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_BirthDate"] = CCGetFromGet("s_BirthDate", NULL);
        $this->DataSource->Parameters["urls_BirthDate1"] = CCGetFromGet("s_BirthDate1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SexKey = "";
        $Groups = new clsGroupsCollectionNewBorn8($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GroupSex2->SetValue($this->DataSource->GroupSex2->GetValue());
            $this->CountGroupSex->SetValue($this->DataSource->CountGroupSex->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SexKey != $this->DataSource->f("Sex")) {
                $Groups->OpenGroup("Sex");
            }
            $Groups->AddItem();
            $SexKey = $this->DataSource->f("Sex");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SexKey != $this->DataSource->f("Sex")) {
                $Groups->CloseGroup("Sex");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
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
            $this->ControlsVisible["GroupSex2"] = $this->GroupSex2->Visible;
            $this->ControlsVisible["CountGroupSex"] = $this->CountGroupSex->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        if ($this->Detail->Visible) {
                            $this->Attributes->Show();
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        }
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
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
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Sex":
                        if ($items[$i]->Mode == 1) {
                            $this->GroupSex2->SetValue($items[$i]->GroupSex2);
                            $this->GroupSex2->Attributes->RestoreFromArray($items[$i]->_GroupSex2Attributes);
                            $this->CountGroupSex->SetValue($items[$i]->CountGroupSex);
                            $this->CountGroupSex->Attributes->RestoreFromArray($items[$i]->_CountGroupSexAttributes);
                            $this->Sex_Header->CCSEventResult = CCGetEvent($this->Sex_Header->CCSEvents, "BeforeShow", $this->Sex_Header);
                            if ($this->Sex_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Header";
                                $this->Attributes->Show();
                                $this->GroupSex2->Show();
                                $this->CountGroupSex->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Sex_Footer->CCSEventResult = CCGetEvent($this->Sex_Footer->CCSEvents, "BeforeShow", $this->Sex_Footer);
                            if ($this->Sex_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Sex_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Sex_Footer", true, "Section Detail");
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

} //End NewBorn8 Class @533-FCB6E20C

class clsNewBorn8DataSource extends clsDBregistry_db {  //NewBorn8DataSource Class @533-7BA24741

//DataSource Variables @533-F5055419
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GroupSex2;
    public $CountGroupSex;
//End DataSource Variables

//DataSourceClass_Initialize Event @533-B349EA01
    function clsNewBorn8DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report NewBorn8";
        $this->Initialize();
        $this->GroupSex2 = new clsField("GroupSex2", ccsInteger, "");
        
        $this->CountGroupSex = new clsField("CountGroupSex", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @533-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @533-7042C4A9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("2", "urls_BirthDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate"], "", false);
        $this->wp->AddParameter("3", "urls_BirthDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_BirthDate1"], "", false);
        $this->wp->AddParameter("4", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = "( newborn.Weight>=3500 )";
        $this->wp->Criterion[2] = $this->wp->Operation(opGreaterThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opLessThanOrEqual, "newborn.BirthDate", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger, true),false);
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

//Open Method @533-CA3C9D7B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, FacilityName, Sex, NewBornID, BirthDate, Weight \n\n" .
        "FROM (delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "newborn.Sex asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @533-F73A025D
    function SetValues()
    {
        $this->GroupSex2->SetDBValue(trim($this->f("Sex")));
        $this->CountGroupSex->SetDBValue($this->f("Sex"));
    }
//End SetValues Method

} //End NewBorn8DataSource Class @533-FCB6E20C

//Initialize Page @1-9BEDFEAA
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
$TemplateFileName = "report_on_newborn_facility.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-13756179
CCSecurityRedirect("3", "noaccess.php");
//End Authenticate User

//Include events file @1-6EC6B7C7
include_once("./report_on_newborn_facility_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-60AEC2A6
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$delivery_facilities_newbo = new clsRecorddelivery_facilities_newbo("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_on_newborn_facility.php";
$NewBorn = new clsReportNewBorn("", $MainPage);
$NewBorn1 = new clsReportNewBorn1("", $MainPage);
$NewBorn2 = new clsReportNewBorn2("", $MainPage);
$NewBorn3 = new clsReportNewBorn3("", $MainPage);
$NewBorn4 = new clsReportNewBorn4("", $MainPage);
$NewBorn5 = new clsReportNewBorn5("", $MainPage);
$NewBorn6 = new clsReportNewBorn6("", $MainPage);
$NewBorn7 = new clsReportNewBorn7("", $MainPage);
$NewBorn8 = new clsReportNewBorn8("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->delivery_facilities_newbo = & $delivery_facilities_newbo;
$MainPage->Report_Print = & $Report_Print;
$MainPage->NewBorn = & $NewBorn;
$MainPage->NewBorn1 = & $NewBorn1;
$MainPage->NewBorn2 = & $NewBorn2;
$MainPage->NewBorn3 = & $NewBorn3;
$MainPage->NewBorn4 = & $NewBorn4;
$MainPage->NewBorn5 = & $NewBorn5;
$MainPage->NewBorn6 = & $NewBorn6;
$MainPage->NewBorn7 = & $NewBorn7;
$MainPage->NewBorn8 = & $NewBorn8;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$NewBorn->Initialize();
$NewBorn1->Initialize();
$NewBorn2->Initialize();
$NewBorn3->Initialize();
$NewBorn4->Initialize();
$NewBorn5->Initialize();
$NewBorn6->Initialize();
$NewBorn7->Initialize();
$NewBorn8->Initialize();

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

//Execute Components @1-60C9F08C
$topmenu->Operations();
$delivery_facilities_newbo->Operation();
//End Execute Components

//Go to destination page @1-F870A02F
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($delivery_facilities_newbo);
    unset($NewBorn);
    unset($NewBorn1);
    unset($NewBorn2);
    unset($NewBorn3);
    unset($NewBorn4);
    unset($NewBorn5);
    unset($NewBorn6);
    unset($NewBorn7);
    unset($NewBorn8);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-5EF4AE25
$topmenu->Show();
$delivery_facilities_newbo->Show();
$NewBorn->Show();
$NewBorn1->Show();
$NewBorn2->Show();
$NewBorn3->Show();
$NewBorn4->Show();
$NewBorn5->Show();
$NewBorn6->Show();
$NewBorn7->Show();
$NewBorn8->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-6C6EC09F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($delivery_facilities_newbo);
unset($NewBorn);
unset($NewBorn1);
unset($NewBorn2);
unset($NewBorn3);
unset($NewBorn4);
unset($NewBorn5);
unset($NewBorn6);
unset($NewBorn7);
unset($NewBorn8);
unset($Tpl);
//End Unload Page