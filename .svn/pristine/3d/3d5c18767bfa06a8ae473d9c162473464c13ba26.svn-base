<?php
//Include Common Files @1-CE80A1E9
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_pregnancy_outcome.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
include_once(RelativePath . "/Services.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//Report1 ReportGroup class @3-0B12BC03
class clsReportGroupReport1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $FacilityName, $_FacilityNameAttributes;
    public $pregnancy_outcome, $_pregnancy_outcomeAttributes;
    public $Count_DeliveryID1, $_Count_DeliveryID1Attributes;
    public $Count_DeliveryID2, $Count_DeliveryID272Rel, $_Count_DeliveryID2Attributes;
    public $Count_DeliveryID, $_Count_DeliveryIDAttributes;
    public $TotalCount_DeliveryID, $_TotalCount_DeliveryIDAttributes;
    public $Report_CurrentDate, $_Report_CurrentDateAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $FacilityNameTotalIndex;
    public $pregnancy_outcomeTotalIndex;

    function clsReportGroupReport1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->FacilityName = $this->Parent->FacilityName->Value;
        $this->pregnancy_outcome = $this->Parent->pregnancy_outcome->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetTotalValue($mode);
        $this->Count_DeliveryID2 = $this->Parent->Count_DeliveryID2->GetTotalValue($mode);
        $this->Count_DeliveryID = $this->Parent->Count_DeliveryID->GetTotalValue($mode);
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetTotalValue($mode);
        $this->Count_DeliveryID272Rel = $this->Parent->Count_DeliveryID2->ValueRelative;
        $this->_Sorter_DeliveryIDAttributes = $this->Parent->Sorter_DeliveryID->Attributes->GetAsArray();
        $this->_FacilityNameAttributes = $this->Parent->FacilityName->Attributes->GetAsArray();
        $this->_pregnancy_outcomeAttributes = $this->Parent->pregnancy_outcome->Attributes->GetAsArray();
        $this->_Count_DeliveryID1Attributes = $this->Parent->Count_DeliveryID1->Attributes->GetAsArray();
        $this->_Count_DeliveryID2Attributes = $this->Parent->Count_DeliveryID2->Attributes->GetAsArray();
        $this->_Count_DeliveryIDAttributes = $this->Parent->Count_DeliveryID->Attributes->GetAsArray();
        $this->_TotalCount_DeliveryIDAttributes = $this->Parent->TotalCount_DeliveryID->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Count_DeliveryID1 = $this->Count_DeliveryID1;
        $Header->_Count_DeliveryID1Attributes = $this->_Count_DeliveryID1Attributes;
        $Header->Count_DeliveryID2 = $this->Count_DeliveryID2;
        $Header->_Count_DeliveryID2Attributes = $this->_Count_DeliveryID2Attributes;
        $Header->Count_DeliveryID = $this->Count_DeliveryID;
        $Header->_Count_DeliveryIDAttributes = $this->_Count_DeliveryIDAttributes;
        $Header->TotalCount_DeliveryID = $this->TotalCount_DeliveryID;
        $Header->_TotalCount_DeliveryIDAttributes = $this->_TotalCount_DeliveryIDAttributes;
        $Header->Count_DeliveryID272Rel = $this->Count_DeliveryID272Rel;
        $this->FacilityName = $Header->FacilityName;
        $Header->_FacilityNameAttributes = $this->_FacilityNameAttributes;
        $this->Parent->FacilityName->Value = $Header->FacilityName;
        $this->Parent->FacilityName->Attributes->RestoreFromArray($Header->_FacilityNameAttributes);
        $this->pregnancy_outcome = $Header->pregnancy_outcome;
        $Header->_pregnancy_outcomeAttributes = $this->_pregnancy_outcomeAttributes;
        $this->Parent->pregnancy_outcome->Value = $Header->pregnancy_outcome;
        $this->Parent->pregnancy_outcome->Attributes->RestoreFromArray($Header->_pregnancy_outcomeAttributes);
    }
    function ChangeTotalControls() {
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetValue();
        $this->Count_DeliveryID2 = $this->Parent->Count_DeliveryID2->GetValue();
        $this->Count_DeliveryID = $this->Parent->Count_DeliveryID->GetValue();
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetValue();
    }
}
//End Report1 ReportGroup class

//Report1 GroupsCollection class @3-5ECBACD4
class clsGroupsCollectionReport1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mFacilityNameCurrentHeaderIndex;
    public $mpregnancy_outcomeCurrentHeaderIndex;
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
        $this->mFacilityNameCurrentHeaderIndex = 1;
        $this->mpregnancy_outcomeCurrentHeaderIndex = 2;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->FacilityNameTotalIndex = $this->mFacilityNameCurrentHeaderIndex;
        $group->pregnancy_outcomeTotalIndex = $this->mpregnancy_outcomeCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->FacilityName->Value = $this->Parent->FacilityName->initialValue;
        $this->Parent->pregnancy_outcome->Value = $this->Parent->pregnancy_outcome->initialValue;
        $this->Parent->Count_DeliveryID1->Value = $this->Parent->Count_DeliveryID1->initialValue;
        $this->Parent->Count_DeliveryID2->Value = $this->Parent->Count_DeliveryID2->initialValue;
        $this->Parent->Count_DeliveryID->Value = $this->Parent->Count_DeliveryID->initialValue;
        $this->Parent->TotalCount_DeliveryID->Value = $this->Parent->TotalCount_DeliveryID->initialValue;
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
        if ($groupName == "FacilityName") {
            $GroupFacilityName = & $this->InitGroup(true);
            $this->Parent->FacilityName_Header->CCSEventResult = CCGetEvent($this->Parent->FacilityName_Header->CCSEvents, "OnInitialize", $this->Parent->FacilityName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->FacilityName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->FacilityName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->FacilityName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->FacilityName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->FacilityName_Header->Height;
                $GroupFacilityName->SetTotalControls("GetNextValue");
            $this->Parent->FacilityName_Header->CCSEventResult = CCGetEvent($this->Parent->FacilityName_Header->CCSEvents, "OnCalculate", $this->Parent->FacilityName_Header);
            $GroupFacilityName->SetControls();
            $GroupFacilityName->Mode = 1;
            $OpenFlag = true;
            $GroupFacilityName->GroupType = "FacilityName";
            $this->mFacilityNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupFacilityName;
            $this->Parent->Count_DeliveryID->Reset();
            $this->Parent->Count_DeliveryID2->ResetRelativeValues();
        }
        if ($groupName == "pregnancy_outcome" or $OpenFlag) {
            $Grouppregnancy_outcome = & $this->InitGroup(true);
            $this->Parent->pregnancy_outcome_Header->CCSEventResult = CCGetEvent($this->Parent->pregnancy_outcome_Header->CCSEvents, "OnInitialize", $this->Parent->pregnancy_outcome_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->pregnancy_outcome_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->pregnancy_outcome_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->pregnancy_outcome_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->pregnancy_outcome_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->pregnancy_outcome_Header->Height;
                $Grouppregnancy_outcome->SetTotalControls("GetNextValue");
            $this->Parent->pregnancy_outcome_Header->CCSEventResult = CCGetEvent($this->Parent->pregnancy_outcome_Header->CCSEvents, "OnCalculate", $this->Parent->pregnancy_outcome_Header);
            $Grouppregnancy_outcome->SetControls();
            $Grouppregnancy_outcome->Mode = 1;
            $Grouppregnancy_outcome->GroupType = "pregnancy_outcome";
            $this->mpregnancy_outcomeCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $Grouppregnancy_outcome;
            $this->Parent->Count_DeliveryID1->Reset();
            $this->Parent->Count_DeliveryID2->Reset();
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
        $Grouppregnancy_outcome = & $this->InitGroup(true);
        $this->Parent->pregnancy_outcome_Footer->CCSEventResult = CCGetEvent($this->Parent->pregnancy_outcome_Footer->CCSEvents, "OnInitialize", $this->Parent->pregnancy_outcome_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->pregnancy_outcome_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->pregnancy_outcome_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->pregnancy_outcome_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $Grouppregnancy_outcome->SetTotalControls("GetPrevValue");
        $Grouppregnancy_outcome->SyncWithHeader($this->Groups[$this->mpregnancy_outcomeCurrentHeaderIndex]);
        if ($this->Parent->pregnancy_outcome_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->pregnancy_outcome_Footer->Height;
        $this->Parent->pregnancy_outcome_Footer->CCSEventResult = CCGetEvent($this->Parent->pregnancy_outcome_Footer->CCSEvents, "OnCalculate", $this->Parent->pregnancy_outcome_Footer);
        $Grouppregnancy_outcome->SetControls();
        $this->Parent->Count_DeliveryID1->Reset();
        $this->Parent->Count_DeliveryID2->Reset();
        $this->RestoreValues();
        $Grouppregnancy_outcome->Mode = 2;
        $Grouppregnancy_outcome->GroupType ="pregnancy_outcome";
        $this->Groups[] = & $Grouppregnancy_outcome;
        if ($groupName == "pregnancy_outcome") return;
        $GroupFacilityName = & $this->InitGroup(true);
        $this->Parent->FacilityName_Footer->CCSEventResult = CCGetEvent($this->Parent->FacilityName_Footer->CCSEvents, "OnInitialize", $this->Parent->FacilityName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->FacilityName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->FacilityName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->FacilityName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupFacilityName->SetTotalControls("GetPrevValue");
        $GroupFacilityName->SyncWithHeader($this->Groups[$this->mFacilityNameCurrentHeaderIndex]);
        if ($this->Parent->FacilityName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->FacilityName_Footer->Height;
        $this->Parent->FacilityName_Footer->CCSEventResult = CCGetEvent($this->Parent->FacilityName_Footer->CCSEvents, "OnCalculate", $this->Parent->FacilityName_Footer);
        $GroupFacilityName->SetControls();
        $this->Parent->Count_DeliveryID->Reset();
        $this->Parent->Count_DeliveryID2->ResetRelativeValues();
        $this->RestoreValues();
        $GroupFacilityName->Mode = 2;
        $GroupFacilityName->GroupType ="FacilityName";
        $this->Groups[] = & $GroupFacilityName;
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
//End Report1 GroupsCollection class

class clsReportReport1 { //Report1 Class @3-BC2FB08C

//Report1 Variables @3-A2E7FC81

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
    public $FacilityName_HeaderBlock, $FacilityName_Header;
    public $FacilityName_FooterBlock, $FacilityName_Footer;
    public $pregnancy_outcome_HeaderBlock, $pregnancy_outcome_Header;
    public $pregnancy_outcome_FooterBlock, $pregnancy_outcome_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $FacilityName_HeaderControls, $FacilityName_FooterControls;
    public $pregnancy_outcome_HeaderControls, $pregnancy_outcome_FooterControls;
    public $Sorter_DeliveryID;
//End Report1 Variables

//Class_Initialize Event @3-DAF294D6
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
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->FacilityName_Footer = new clsSection($this);
        $this->FacilityName_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->FacilityName_Footer->Height);
        $this->FacilityName_Header = new clsSection($this);
        $this->FacilityName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->FacilityName_Header->Height);
        $this->pregnancy_outcome_Footer = new clsSection($this);
        $this->pregnancy_outcome_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->pregnancy_outcome_Footer->Height);
        $this->pregnancy_outcome_Header = new clsSection($this);
        $this->pregnancy_outcome_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->pregnancy_outcome_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Web");
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else if($this->ViewMode == "Print") {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
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
        $this->SorterName = CCGetParam("Report1Order", "");
        $this->SorterDirection = CCGetParam("Report1Dir", "");

        $this->Sorter_DeliveryID = new clsSorter($this->ComponentName, "Sorter_DeliveryID", $FileName, $this);
        $this->Sorter_DeliveryID->Visible = false;
        $this->FacilityName = new clsControl(ccsReportLabel, "FacilityName", "FacilityName", ccsText, "", "", $this);
        $this->pregnancy_outcome = new clsControl(ccsReportLabel, "pregnancy_outcome", "pregnancy_outcome", ccsText, "", "", $this);
        $this->Count_DeliveryID1 = new clsControl(ccsReportLabel, "Count_DeliveryID1", "Count_DeliveryID1", ccsInteger, "", 0, $this);
        $this->Count_DeliveryID1->TotalFunction = "Count";
        $this->Count_DeliveryID1->IsEmptySource = true;
        $this->Count_DeliveryID2 = new clsControl(ccsReportLabel, "Count_DeliveryID2", "Count_DeliveryID2", ccsInteger, array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, ""), 0, $this);
        $this->Count_DeliveryID2->TotalFunction = "Count";
        $this->Count_DeliveryID2->IsPercent = true;
        $this->Count_DeliveryID2->IsEmptySource = true;
        $this->Count_DeliveryID = new clsControl(ccsReportLabel, "Count_DeliveryID", "Count_DeliveryID", ccsInteger, "", 0, $this);
        $this->Count_DeliveryID->TotalFunction = "Count";
        $this->Count_DeliveryID->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_DeliveryID = new clsControl(ccsReportLabel, "TotalCount_DeliveryID", "TotalCount_DeliveryID", ccsInteger, "", 0, $this);
        $this->TotalCount_DeliveryID->TotalFunction = "Count";
        $this->TotalCount_DeliveryID->IsEmptySource = true;
        $this->Report_CurrentDate = new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @3-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @3-02E867D0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FacilityName->Errors->Count());
        $errors = ($errors || $this->pregnancy_outcome->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID1->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID2->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID->Errors->Count());
        $errors = ($errors || $this->TotalCount_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @3-26DFEA24
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->pregnancy_outcome->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @3-E21CA490
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_FacilityName"] = CCGetFromGet("s_FacilityName", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $FacilityNameKey = "";
        $pregnancy_outcomeKey = "";
        $Groups = new clsGroupsCollectionReport1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
            $this->pregnancy_outcome->SetValue($this->DataSource->pregnancy_outcome->GetValue());
            $this->Count_DeliveryID1->SetValue(1);
            $this->Count_DeliveryID2->SetValue(1);
            $this->Count_DeliveryID->SetValue(1);
            $this->TotalCount_DeliveryID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->OpenGroup("FacilityName");
            } elseif ($pregnancy_outcomeKey != $this->DataSource->f("pregnancy_outcome")) {
                $Groups->OpenGroup("pregnancy_outcome");
            }
            $Groups->AddItem();
            $FacilityNameKey = $this->DataSource->f("FacilityName");
            $pregnancy_outcomeKey = $this->DataSource->f("pregnancy_outcome");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->CloseGroup("FacilityName");
            } elseif ($pregnancy_outcomeKey != $this->DataSource->f("pregnancy_outcome")) {
                $Groups->CloseGroup("pregnancy_outcome");
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
            $this->ControlsVisible["FacilityName"] = $this->FacilityName->Visible;
            $this->ControlsVisible["pregnancy_outcome"] = $this->pregnancy_outcome->Visible;
            $this->ControlsVisible["Count_DeliveryID1"] = $this->Count_DeliveryID1->Visible;
            $this->ControlsVisible["Count_DeliveryID2"] = $this->Count_DeliveryID2->Visible;
            $this->ControlsVisible["Count_DeliveryID"] = $this->Count_DeliveryID->Visible;
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
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->TotalCount_DeliveryID->SetValue($items[$i]->TotalCount_DeliveryID);
                            $this->TotalCount_DeliveryID->Attributes->RestoreFromArray($items[$i]->_TotalCount_DeliveryIDAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalCount_DeliveryID->Show();
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
                                $this->Sorter_DeliveryID->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Report_CurrentDate->Show();
                                $this->Navigator->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "FacilityName":
                        if ($items[$i]->Mode == 1) {
                            $this->FacilityName->SetValue($items[$i]->FacilityName);
                            $this->FacilityName->Attributes->RestoreFromArray($items[$i]->_FacilityNameAttributes);
                            $this->FacilityName_Header->CCSEventResult = CCGetEvent($this->FacilityName_Header->CCSEvents, "BeforeShow", $this->FacilityName_Header);
                            if ($this->FacilityName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Header";
                                $this->Attributes->Show();
                                $this->FacilityName->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FacilityName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Count_DeliveryID->SetValue($items[$i]->Count_DeliveryID);
                            $this->Count_DeliveryID->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryIDAttributes);
                            $this->FacilityName_Footer->CCSEventResult = CCGetEvent($this->FacilityName_Footer->CCSEvents, "BeforeShow", $this->FacilityName_Footer);
                            if ($this->FacilityName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Footer";
                                $this->Count_DeliveryID->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FacilityName_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "pregnancy_outcome":
                        if ($items[$i]->Mode == 1) {
                            $this->pregnancy_outcome->SetValue($items[$i]->pregnancy_outcome);
                            $this->pregnancy_outcome->Attributes->RestoreFromArray($items[$i]->_pregnancy_outcomeAttributes);
                            $this->Count_DeliveryID1->SetValue($items[$i]->Count_DeliveryID1);
                            $this->Count_DeliveryID1->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID1Attributes);
                            $this->Count_DeliveryID2->SetText(CCFormatNumber($items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID272Rel && strval($items[$i]->Count_DeliveryID2) != "" ? $items[$i]->Count_DeliveryID2 / $items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID272Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
                            $this->Count_DeliveryID2->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID2Attributes);
                            $this->pregnancy_outcome_Header->CCSEventResult = CCGetEvent($this->pregnancy_outcome_Header->CCSEvents, "BeforeShow", $this->pregnancy_outcome_Header);
                            if ($this->pregnancy_outcome_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section pregnancy_outcome_Header";
                                $this->Attributes->Show();
                                $this->pregnancy_outcome->Show();
                                $this->Count_DeliveryID1->Show();
                                $this->Count_DeliveryID2->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section pregnancy_outcome_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->pregnancy_outcome_Footer->CCSEventResult = CCGetEvent($this->pregnancy_outcome_Footer->CCSEvents, "BeforeShow", $this->pregnancy_outcome_Footer);
                            if ($this->pregnancy_outcome_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section pregnancy_outcome_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section pregnancy_outcome_Footer", true, "Section Detail");
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

} //End Report1 Class @3-FCB6E20C

class clsReport1DataSource extends clsDBregistry_db {  //Report1DataSource Class @3-1787F62C

//DataSource Variables @3-AC308DA1
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $FacilityName;
    public $pregnancy_outcome;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-E7B6BB53
    function clsReport1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report1";
        $this->Initialize();
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->pregnancy_outcome = new clsField("pregnancy_outcome", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-2B9B5508
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DeliveryID" => array("DeliveryID", "")));
    }
//End SetOrder Method

//Prepare Method @3-82CEE1F8
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_FacilityName", ccsText, "", "", $this->Parameters["urls_FacilityName"], "", false);
        $this->wp->AddParameter("3", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], CCFormatDate(CCParseDate("9999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
    }
//End Prepare Method

//Open Method @3-1D1D6E93
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * FROM\n" .
        "(\n" .
        "SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O1' AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome1ID != -1\n" .
        "AND DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "' \n" .
        "AND DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsDate) . "'\n" .
        "AND FacilityName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "UNION\n" .
        "\n" .
        "SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O2' AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE  delivery.PregnancyOutcome2ID != -1\n" .
        "AND DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsDate) . "' \n" .
        "AND FacilityName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "UNION\n" .
        "\n" .
        "SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O3' AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome3ID != -1\n" .
        "AND DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsDate) . "' \n" .
        "AND FacilityName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        ") AS result";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "FacilityName asc,pregnancy_outcome asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-92BB5900
    function SetValues()
    {
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->pregnancy_outcome->SetDBValue($this->f("pregnancy_outcome"));
    }
//End SetValues Method

} //End Report1DataSource Class @3-FCB6E20C

class clsRecordReport2 { //Report2 Class @39-40449E32

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

//Class_Initialize Event @39-3D67518F
    function clsRecordReport2($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Report2/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "Report2";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_DataDelivery = new clsControl(ccsTextBox, "s_DataDelivery", "s_DataDelivery", ccsDate, $DefaultDateFormat, CCGetRequestParam("s_DataDelivery", $Method, NULL), $this);
            $this->DatePicker_s_DataDelivery = new clsDatePicker("DatePicker_s_DataDelivery", "Report2", "s_DataDelivery", $this);
            $this->s_DataDelivery1 = new clsControl(ccsTextBox, "s_DataDelivery1", "s_DataDelivery1", ccsDate, array("ShortDate"), CCGetRequestParam("s_DataDelivery1", $Method, NULL), $this);
            $this->DatePicker_s_DataDelivery1 = new clsDatePicker("DatePicker_s_DataDelivery1", "Report2", "s_DataDelivery1", $this);
            $this->s_FacilityName = new clsControl(ccsListBox, "s_FacilityName", "s_FacilityName", ccsText, "", CCGetRequestParam("s_FacilityName", $Method, NULL), $this);
            $this->s_FacilityName->DSType = dsTable;
            $this->s_FacilityName->DataSource = new clsDBregistry_db();
            $this->s_FacilityName->ds = & $this->s_FacilityName->DataSource;
            $this->s_FacilityName->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            list($this->s_FacilityName->BoundColumn, $this->s_FacilityName->TextColumn, $this->s_FacilityName->DBFormat) = array("FacilityName", "FacilityName", "");
        }
    }
//End Class_Initialize Event

//Validate Method @39-90D876FC
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_DataDelivery->Validate() && $Validation);
        $Validation = ($this->s_DataDelivery1->Validate() && $Validation);
        $Validation = ($this->s_FacilityName->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_DataDelivery->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DataDelivery1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FacilityName->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @39-4F37B1F6
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->s_FacilityName->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
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

//Operation Method @39-80548D7D
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
        $Redirect = "report_pregnancy_outcome.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_pregnancy_outcome.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @39-C4D57245
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

        $this->s_FacilityName->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_DataDelivery->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_DataDelivery->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DataDelivery1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_DataDelivery1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FacilityName->Errors->ToString());
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
        $this->s_DataDelivery->Show();
        $this->DatePicker_s_DataDelivery->Show();
        $this->s_DataDelivery1->Show();
        $this->DatePicker_s_DataDelivery1->Show();
        $this->s_FacilityName->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End Report2 Class @39-FCB6E20C

//Report3 ReportGroup class @50-AEB1B276
class clsReportGroupReport3 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $pregnancy_outcome, $_pregnancy_outcomeAttributes;
    public $Count_DeliveryID, $_Count_DeliveryIDAttributes;
    public $Count_DeliveryID1, $Count_DeliveryID173Rel, $_Count_DeliveryID1Attributes;
    public $TotalCount_DeliveryID, $_TotalCount_DeliveryIDAttributes;
    public $Report_CurrentDate, $_Report_CurrentDateAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $pregnancy_outcomeTotalIndex;

    function clsReportGroupReport3(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->pregnancy_outcome = $this->Parent->pregnancy_outcome->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Count_DeliveryID = $this->Parent->Count_DeliveryID->GetTotalValue($mode);
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetTotalValue($mode);
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetTotalValue($mode);
        $this->Count_DeliveryID173Rel = $this->Parent->Count_DeliveryID1->ValueRelative;
        $this->_Sorter_DeliveryIDAttributes = $this->Parent->Sorter_DeliveryID->Attributes->GetAsArray();
        $this->_pregnancy_outcomeAttributes = $this->Parent->pregnancy_outcome->Attributes->GetAsArray();
        $this->_Count_DeliveryIDAttributes = $this->Parent->Count_DeliveryID->Attributes->GetAsArray();
        $this->_Count_DeliveryID1Attributes = $this->Parent->Count_DeliveryID1->Attributes->GetAsArray();
        $this->_TotalCount_DeliveryIDAttributes = $this->Parent->TotalCount_DeliveryID->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Count_DeliveryID = $this->Count_DeliveryID;
        $Header->_Count_DeliveryIDAttributes = $this->_Count_DeliveryIDAttributes;
        $Header->Count_DeliveryID1 = $this->Count_DeliveryID1;
        $Header->_Count_DeliveryID1Attributes = $this->_Count_DeliveryID1Attributes;
        $Header->TotalCount_DeliveryID = $this->TotalCount_DeliveryID;
        $Header->_TotalCount_DeliveryIDAttributes = $this->_TotalCount_DeliveryIDAttributes;
        $Header->Count_DeliveryID173Rel = $this->Count_DeliveryID173Rel;
        $this->pregnancy_outcome = $Header->pregnancy_outcome;
        $Header->_pregnancy_outcomeAttributes = $this->_pregnancy_outcomeAttributes;
        $this->Parent->pregnancy_outcome->Value = $Header->pregnancy_outcome;
        $this->Parent->pregnancy_outcome->Attributes->RestoreFromArray($Header->_pregnancy_outcomeAttributes);
    }
    function ChangeTotalControls() {
        $this->Count_DeliveryID = $this->Parent->Count_DeliveryID->GetValue();
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetValue();
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetValue();
    }
}
//End Report3 ReportGroup class

//Report3 GroupsCollection class @50-B07C3082
class clsGroupsCollectionReport3 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mpregnancy_outcomeCurrentHeaderIndex;
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
        $this->mpregnancy_outcomeCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport3($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->pregnancy_outcomeTotalIndex = $this->mpregnancy_outcomeCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->pregnancy_outcome->Value = $this->Parent->pregnancy_outcome->initialValue;
        $this->Parent->Count_DeliveryID->Value = $this->Parent->Count_DeliveryID->initialValue;
        $this->Parent->Count_DeliveryID1->Value = $this->Parent->Count_DeliveryID1->initialValue;
        $this->Parent->TotalCount_DeliveryID->Value = $this->Parent->TotalCount_DeliveryID->initialValue;
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
        if ($groupName == "pregnancy_outcome") {
            $Grouppregnancy_outcome = & $this->InitGroup(true);
            $this->Parent->pregnancy_outcome_Header->CCSEventResult = CCGetEvent($this->Parent->pregnancy_outcome_Header->CCSEvents, "OnInitialize", $this->Parent->pregnancy_outcome_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->pregnancy_outcome_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->pregnancy_outcome_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->pregnancy_outcome_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->pregnancy_outcome_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->pregnancy_outcome_Header->Height;
                $Grouppregnancy_outcome->SetTotalControls("GetNextValue");
            $this->Parent->pregnancy_outcome_Header->CCSEventResult = CCGetEvent($this->Parent->pregnancy_outcome_Header->CCSEvents, "OnCalculate", $this->Parent->pregnancy_outcome_Header);
            $Grouppregnancy_outcome->SetControls();
            $Grouppregnancy_outcome->Mode = 1;
            $Grouppregnancy_outcome->GroupType = "pregnancy_outcome";
            $this->mpregnancy_outcomeCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $Grouppregnancy_outcome;
            $this->Parent->Count_DeliveryID->Reset();
            $this->Parent->Count_DeliveryID1->Reset();
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
        $Grouppregnancy_outcome = & $this->InitGroup(true);
        $this->Parent->pregnancy_outcome_Footer->CCSEventResult = CCGetEvent($this->Parent->pregnancy_outcome_Footer->CCSEvents, "OnInitialize", $this->Parent->pregnancy_outcome_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->pregnancy_outcome_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->pregnancy_outcome_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->pregnancy_outcome_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $Grouppregnancy_outcome->SetTotalControls("GetPrevValue");
        $Grouppregnancy_outcome->SyncWithHeader($this->Groups[$this->mpregnancy_outcomeCurrentHeaderIndex]);
        if ($this->Parent->pregnancy_outcome_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->pregnancy_outcome_Footer->Height;
        $this->Parent->pregnancy_outcome_Footer->CCSEventResult = CCGetEvent($this->Parent->pregnancy_outcome_Footer->CCSEvents, "OnCalculate", $this->Parent->pregnancy_outcome_Footer);
        $Grouppregnancy_outcome->SetControls();
        $this->Parent->Count_DeliveryID->Reset();
        $this->Parent->Count_DeliveryID1->Reset();
        $this->RestoreValues();
        $Grouppregnancy_outcome->Mode = 2;
        $Grouppregnancy_outcome->GroupType ="pregnancy_outcome";
        $this->Groups[] = & $Grouppregnancy_outcome;
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
//End Report3 GroupsCollection class

class clsReportReport3 { //Report3 Class @50-8E19D20E

//Report3 Variables @50-81C4763F

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
    public $pregnancy_outcome_HeaderBlock, $pregnancy_outcome_Header;
    public $pregnancy_outcome_FooterBlock, $pregnancy_outcome_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $pregnancy_outcome_HeaderControls, $pregnancy_outcome_FooterControls;
    public $Sorter_DeliveryID;
//End Report3 Variables

//Class_Initialize Event @50-172FDC87
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
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->pregnancy_outcome_Footer = new clsSection($this);
        $this->pregnancy_outcome_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->pregnancy_outcome_Footer->Height);
        $this->pregnancy_outcome_Header = new clsSection($this);
        $this->pregnancy_outcome_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->pregnancy_outcome_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport3DataSource($this);
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
        $this->SorterName = CCGetParam("Report3Order", "");
        $this->SorterDirection = CCGetParam("Report3Dir", "");

        $this->Sorter_DeliveryID = new clsSorter($this->ComponentName, "Sorter_DeliveryID", $FileName, $this);
        $this->Sorter_DeliveryID->Visible = false;
        $this->pregnancy_outcome = new clsControl(ccsReportLabel, "pregnancy_outcome", "pregnancy_outcome", ccsText, "", "", $this);
        $this->Count_DeliveryID = new clsControl(ccsReportLabel, "Count_DeliveryID", "Count_DeliveryID", ccsInteger, "", 0, $this);
        $this->Count_DeliveryID->TotalFunction = "Count";
        $this->Count_DeliveryID->IsEmptySource = true;
        $this->Count_DeliveryID1 = new clsControl(ccsReportLabel, "Count_DeliveryID1", "Count_DeliveryID1", ccsInteger, array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, ""), 0, $this);
        $this->Count_DeliveryID1->TotalFunction = "Count";
        $this->Count_DeliveryID1->IsPercent = true;
        $this->Count_DeliveryID1->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_DeliveryID = new clsControl(ccsReportLabel, "TotalCount_DeliveryID", "TotalCount_DeliveryID", ccsInteger, "", 0, $this);
        $this->TotalCount_DeliveryID->TotalFunction = "Count";
        $this->TotalCount_DeliveryID->IsEmptySource = true;
        $this->Report_CurrentDate = new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @50-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @50-A8842E01
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->pregnancy_outcome->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID1->Errors->Count());
        $errors = ($errors || $this->TotalCount_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @50-FBB18159
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->pregnancy_outcome->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @50-EE9F622C
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $pregnancy_outcomeKey = "";
        $Groups = new clsGroupsCollectionReport3($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->pregnancy_outcome->SetValue($this->DataSource->pregnancy_outcome->GetValue());
            $this->Count_DeliveryID->SetValue(1);
            $this->Count_DeliveryID1->SetValue(1);
            $this->TotalCount_DeliveryID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $pregnancy_outcomeKey != $this->DataSource->f("pregnancy_outcome")) {
                $Groups->OpenGroup("pregnancy_outcome");
            }
            $Groups->AddItem();
            $pregnancy_outcomeKey = $this->DataSource->f("pregnancy_outcome");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $pregnancy_outcomeKey != $this->DataSource->f("pregnancy_outcome")) {
                $Groups->CloseGroup("pregnancy_outcome");
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
            $this->ControlsVisible["pregnancy_outcome"] = $this->pregnancy_outcome->Visible;
            $this->ControlsVisible["Count_DeliveryID"] = $this->Count_DeliveryID->Visible;
            $this->ControlsVisible["Count_DeliveryID1"] = $this->Count_DeliveryID1->Visible;
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
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->TotalCount_DeliveryID->SetValue($items[$i]->TotalCount_DeliveryID);
                            $this->TotalCount_DeliveryID->Attributes->RestoreFromArray($items[$i]->_TotalCount_DeliveryIDAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalCount_DeliveryID->Show();
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
                                $this->Sorter_DeliveryID->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Report_CurrentDate->Show();
                                $this->Navigator->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "pregnancy_outcome":
                        if ($items[$i]->Mode == 1) {
                            $this->pregnancy_outcome->SetValue($items[$i]->pregnancy_outcome);
                            $this->pregnancy_outcome->Attributes->RestoreFromArray($items[$i]->_pregnancy_outcomeAttributes);
                            $this->Count_DeliveryID->SetValue($items[$i]->Count_DeliveryID);
                            $this->Count_DeliveryID->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryIDAttributes);
                            $this->Count_DeliveryID1->SetText(CCFormatNumber($items[$items[$i]->ReportTotalIndex]->Count_DeliveryID173Rel && strval($items[$i]->Count_DeliveryID1) != "" ? $items[$i]->Count_DeliveryID1 / $items[$items[$i]->ReportTotalIndex]->Count_DeliveryID173Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
                            $this->Count_DeliveryID1->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID1Attributes);
                            $this->pregnancy_outcome_Header->CCSEventResult = CCGetEvent($this->pregnancy_outcome_Header->CCSEvents, "BeforeShow", $this->pregnancy_outcome_Header);
                            if ($this->pregnancy_outcome_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section pregnancy_outcome_Header";
                                $this->Attributes->Show();
                                $this->pregnancy_outcome->Show();
                                $this->Count_DeliveryID->Show();
                                $this->Count_DeliveryID1->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section pregnancy_outcome_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->pregnancy_outcome_Footer->CCSEventResult = CCGetEvent($this->pregnancy_outcome_Footer->CCSEvents, "BeforeShow", $this->pregnancy_outcome_Footer);
                            if ($this->pregnancy_outcome_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section pregnancy_outcome_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section pregnancy_outcome_Footer", true, "Section Detail");
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

} //End Report3 Class @50-FCB6E20C

class clsReport3DataSource extends clsDBregistry_db {  //Report3DataSource Class @50-53CADFFD

//DataSource Variables @50-F477A14A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $pregnancy_outcome;
//End DataSource Variables

//DataSourceClass_Initialize Event @50-40108C94
    function clsReport3DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report3";
        $this->Initialize();
        $this->pregnancy_outcome = new clsField("pregnancy_outcome", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @50-2B9B5508
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DeliveryID" => array("DeliveryID", "")));
    }
//End SetOrder Method

//Prepare Method @50-A4571D81
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], CCFormatDate(CCParseDate("9999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
    }
//End Prepare Method

//Open Method @50-A728E7E9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * FROM\n" .
        "(\n" .
        "SELECT PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O1' AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome1ID != -1\n" .
        "AND DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "' \n" .
        "AND DataDelivery<= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O2' AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome2ID != -1\n" .
        "AND DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery<= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "' \n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O3' AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome3ID != -1\n" .
        "AND DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery<= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "' \n" .
        "\n" .
        ") AS result";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "pregnancy_outcome asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @50-BB61547B
    function SetValues()
    {
        $this->pregnancy_outcome->SetDBValue($this->f("pregnancy_outcome"));
    }
//End SetValues Method

} //End Report3DataSource Class @50-FCB6E20C

//Initialize Page @1-1BF19078
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
$TemplateFileName = "report_pregnancy_outcome.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-4DB1C155
CCSecurityRedirect("1;2", "noaccess.php");
//End Authenticate User

//Include events file @1-50C48D4F
include_once("./report_pregnancy_outcome_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-0F23A3CC
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$Report1 = new clsReportReport1("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_pregnancy_outcome.php";
$Report2 = new clsRecordReport2("", $MainPage);
$Report3 = new clsReportReport3("", $MainPage);
$FlashChart1 = new clsFlashChart("FlashChart1", $MainPage);
$FlashChart1->CallbackParameter = "report_pregnancy_outcomeFlashChart1";
$FlashChart1->Title = $CCSLocales->GetText("PregnancyOutcomeFacilitiesAll");
$FlashChart1->Width = 500;
$FlashChart1->Height = 300;
$MainPage->topmenu = & $topmenu;
$MainPage->Report1 = & $Report1;
$MainPage->Report_Print = & $Report_Print;
$MainPage->Report2 = & $Report2;
$MainPage->Report3 = & $Report3;
$MainPage->FlashChart1 = & $FlashChart1;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$Report1->Initialize();
$Report3->Initialize();

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

//Execute Components @1-2161FB1B
$topmenu->Operations();
$Report2->Operation();
//End Execute Components

//Go to destination page @1-3CAEDF22
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($Report1);
    unset($Report2);
    unset($Report3);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0AEB2E86
$topmenu->Show();
$Report1->Show();
$Report2->Show();
$Report3->Show();
$FlashChart1->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-62C0540F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($Report1);
unset($Report2);
unset($Report3);
unset($Tpl);
//End Unload Page


?>
