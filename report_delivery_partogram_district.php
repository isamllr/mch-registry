<?php
//Include Common Files @1-16DCB3AE
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_delivery_partogram_district.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
include_once(RelativePath . "/Services.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//delivery_facilities1 ReportGroup class @3-A43DA505
class clsReportGroupdelivery_facilities1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $FacilityName, $_FacilityNameAttributes;
    public $Partogram, $_PartogramAttributes;
    public $Count_DeliveryID2, $_Count_DeliveryID2Attributes;
    public $Count_DeliveryID3, $Count_DeliveryID340Rel, $_Count_DeliveryID3Attributes;
    public $Report_Row_Number, $_Report_Row_NumberAttributes;
    public $DeliveryID, $_DeliveryIDAttributes;
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
    public $PartogramTotalIndex;

    function clsReportGroupdelivery_facilities1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->FacilityName = $this->Parent->FacilityName->Value;
        $this->Partogram = $this->Parent->Partogram->Value;
        $this->DeliveryID = $this->Parent->DeliveryID->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Count_DeliveryID2 = $this->Parent->Count_DeliveryID2->GetTotalValue($mode);
        $this->Count_DeliveryID3 = $this->Parent->Count_DeliveryID3->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->Count_DeliveryID = $this->Parent->Count_DeliveryID->GetTotalValue($mode);
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetTotalValue($mode);
        $this->Count_DeliveryID340Rel = $this->Parent->Count_DeliveryID3->ValueRelative;
        $this->_FacilityNameAttributes = $this->Parent->FacilityName->Attributes->GetAsArray();
        $this->_PartogramAttributes = $this->Parent->Partogram->Attributes->GetAsArray();
        $this->_Count_DeliveryID2Attributes = $this->Parent->Count_DeliveryID2->Attributes->GetAsArray();
        $this->_Count_DeliveryID3Attributes = $this->Parent->Count_DeliveryID3->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_DeliveryIDAttributes = $this->Parent->DeliveryID->Attributes->GetAsArray();
        $this->_Count_DeliveryIDAttributes = $this->Parent->Count_DeliveryID->Attributes->GetAsArray();
        $this->_TotalCount_DeliveryIDAttributes = $this->Parent->TotalCount_DeliveryID->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Count_DeliveryID2 = $this->Count_DeliveryID2;
        $Header->_Count_DeliveryID2Attributes = $this->_Count_DeliveryID2Attributes;
        $Header->Count_DeliveryID3 = $this->Count_DeliveryID3;
        $Header->_Count_DeliveryID3Attributes = $this->_Count_DeliveryID3Attributes;
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $Header->Count_DeliveryID = $this->Count_DeliveryID;
        $Header->_Count_DeliveryIDAttributes = $this->_Count_DeliveryIDAttributes;
        $Header->TotalCount_DeliveryID = $this->TotalCount_DeliveryID;
        $Header->_TotalCount_DeliveryIDAttributes = $this->_TotalCount_DeliveryIDAttributes;
        $Header->Count_DeliveryID340Rel = $this->Count_DeliveryID340Rel;
        $this->FacilityName = $Header->FacilityName;
        $Header->_FacilityNameAttributes = $this->_FacilityNameAttributes;
        $this->Parent->FacilityName->Value = $Header->FacilityName;
        $this->Parent->FacilityName->Attributes->RestoreFromArray($Header->_FacilityNameAttributes);
        $this->Partogram = $Header->Partogram;
        $Header->_PartogramAttributes = $this->_PartogramAttributes;
        $this->Parent->Partogram->Value = $Header->Partogram;
        $this->Parent->Partogram->Attributes->RestoreFromArray($Header->_PartogramAttributes);
        $this->DeliveryID = $Header->DeliveryID;
        $Header->_DeliveryIDAttributes = $this->_DeliveryIDAttributes;
        $this->Parent->DeliveryID->Value = $Header->DeliveryID;
        $this->Parent->DeliveryID->Attributes->RestoreFromArray($Header->_DeliveryIDAttributes);
    }
    function ChangeTotalControls() {
        $this->Count_DeliveryID2 = $this->Parent->Count_DeliveryID2->GetValue();
        $this->Count_DeliveryID3 = $this->Parent->Count_DeliveryID3->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
        $this->Count_DeliveryID = $this->Parent->Count_DeliveryID->GetValue();
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetValue();
    }
}
//End delivery_facilities1 ReportGroup class

//delivery_facilities1 GroupsCollection class @3-006D2D6C
class clsGroupsCollectiondelivery_facilities1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mFacilityNameCurrentHeaderIndex;
    public $mPartogramCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectiondelivery_facilities1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mFacilityNameCurrentHeaderIndex = 1;
        $this->mPartogramCurrentHeaderIndex = 2;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdelivery_facilities1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->FacilityNameTotalIndex = $this->mFacilityNameCurrentHeaderIndex;
        $group->PartogramTotalIndex = $this->mPartogramCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->FacilityName->Value = $this->Parent->FacilityName->initialValue;
        $this->Parent->Partogram->Value = $this->Parent->Partogram->initialValue;
        $this->Parent->Count_DeliveryID2->Value = $this->Parent->Count_DeliveryID2->initialValue;
        $this->Parent->Count_DeliveryID3->Value = $this->Parent->Count_DeliveryID3->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->DeliveryID->Value = $this->Parent->DeliveryID->initialValue;
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
            $this->Parent->Count_DeliveryID3->ResetRelativeValues();
        }
        if ($groupName == "Partogram" or $OpenFlag) {
            $GroupPartogram = & $this->InitGroup(true);
            $this->Parent->Partogram_Header->CCSEventResult = CCGetEvent($this->Parent->Partogram_Header->CCSEvents, "OnInitialize", $this->Parent->Partogram_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Partogram_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Partogram_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Partogram_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Partogram_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Partogram_Header->Height;
                $GroupPartogram->SetTotalControls("GetNextValue");
            $this->Parent->Partogram_Header->CCSEventResult = CCGetEvent($this->Parent->Partogram_Header->CCSEvents, "OnCalculate", $this->Parent->Partogram_Header);
            $GroupPartogram->SetControls();
            $GroupPartogram->Mode = 1;
            $GroupPartogram->GroupType = "Partogram";
            $this->mPartogramCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupPartogram;
            $this->Parent->Count_DeliveryID2->Reset();
            $this->Parent->Count_DeliveryID3->Reset();
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
        $GroupPartogram = & $this->InitGroup(true);
        $this->Parent->Partogram_Footer->CCSEventResult = CCGetEvent($this->Parent->Partogram_Footer->CCSEvents, "OnInitialize", $this->Parent->Partogram_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Partogram_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Partogram_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Partogram_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupPartogram->SetTotalControls("GetPrevValue");
        $GroupPartogram->SyncWithHeader($this->Groups[$this->mPartogramCurrentHeaderIndex]);
        if ($this->Parent->Partogram_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Partogram_Footer->Height;
        $this->Parent->Partogram_Footer->CCSEventResult = CCGetEvent($this->Parent->Partogram_Footer->CCSEvents, "OnCalculate", $this->Parent->Partogram_Footer);
        $GroupPartogram->SetControls();
        $this->Parent->Count_DeliveryID2->Reset();
        $this->Parent->Count_DeliveryID3->Reset();
        $this->RestoreValues();
        $GroupPartogram->Mode = 2;
        $GroupPartogram->GroupType ="Partogram";
        $this->Groups[] = & $GroupPartogram;
        if ($groupName == "Partogram") return;
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
        $this->Parent->Count_DeliveryID3->ResetRelativeValues();
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
//End delivery_facilities1 GroupsCollection class

class clsReportdelivery_facilities1 { //delivery_facilities1 Class @3-624C1990

//delivery_facilities1 Variables @3-905F384F

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
    public $Partogram_HeaderBlock, $Partogram_Header;
    public $Partogram_FooterBlock, $Partogram_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $FacilityName_HeaderControls, $FacilityName_FooterControls;
    public $Partogram_HeaderControls, $Partogram_FooterControls;
//End delivery_facilities1 Variables

//Class_Initialize Event @3-244C0797
    function clsReportdelivery_facilities1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "delivery_facilities1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Detail->Visible = false;
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
        $this->Partogram_Footer = new clsSection($this);
        $this->Partogram_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Partogram_Footer->Height);
        $this->Partogram_Header = new clsSection($this);
        $this->Partogram_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Partogram_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdelivery_facilities1DataSource($this);
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

        $this->FacilityName = new clsControl(ccsReportLabel, "FacilityName", "FacilityName", ccsText, "", "", $this);
        $this->Partogram = new clsControl(ccsReportLabel, "Partogram", "Partogram", ccsInteger, "", "", $this);
        $this->Count_DeliveryID2 = new clsControl(ccsReportLabel, "Count_DeliveryID2", "Count_DeliveryID2", ccsInteger, "", 0, $this);
        $this->Count_DeliveryID2->TotalFunction = "Count";
        $this->Count_DeliveryID2->IsEmptySource = true;
        $this->Count_DeliveryID3 = new clsControl(ccsReportLabel, "Count_DeliveryID3", "Count_DeliveryID3", ccsInteger, array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, ""), 0, $this);
        $this->Count_DeliveryID3->TotalFunction = "Count";
        $this->Count_DeliveryID3->IsPercent = true;
        $this->Count_DeliveryID3->IsEmptySource = true;
        $this->Report_Row_Number = new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->DeliveryID = new clsControl(ccsReportLabel, "DeliveryID", "DeliveryID", ccsInteger, "", "", $this);
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

//CheckErrors Method @3-9B2C7736
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FacilityName->Errors->Count());
        $errors = ($errors || $this->Partogram->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID2->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID3->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->DeliveryID->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID->Errors->Count());
        $errors = ($errors || $this->TotalCount_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @3-9C611F27
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Partogram->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @3-D269E768
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $this->DataSource->Parameters["urls_FacilityName"] = CCGetFromGet("s_FacilityName", NULL);
        $this->DataSource->Parameters["expr74"] = -1;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $FacilityNameKey = "";
        $PartogramKey = "";
        $Groups = new clsGroupsCollectiondelivery_facilities1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
            $this->Partogram->SetValue($this->DataSource->Partogram->GetValue());
            $this->DeliveryID->SetValue($this->DataSource->DeliveryID->GetValue());
            $this->Count_DeliveryID2->SetValue(1);
            $this->Count_DeliveryID3->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
            $this->Count_DeliveryID->SetValue(1);
            $this->TotalCount_DeliveryID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->OpenGroup("FacilityName");
            } elseif ($PartogramKey != $this->DataSource->f("Partogram")) {
                $Groups->OpenGroup("Partogram");
            }
            $Groups->AddItem();
            $FacilityNameKey = $this->DataSource->f("FacilityName");
            $PartogramKey = $this->DataSource->f("Partogram");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->CloseGroup("FacilityName");
            } elseif ($PartogramKey != $this->DataSource->f("Partogram")) {
                $Groups->CloseGroup("Partogram");
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
            $this->ControlsVisible["Partogram"] = $this->Partogram->Visible;
            $this->ControlsVisible["Count_DeliveryID2"] = $this->Count_DeliveryID2->Visible;
            $this->ControlsVisible["Count_DeliveryID3"] = $this->Count_DeliveryID3->Visible;
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["DeliveryID"] = $this->DeliveryID->Visible;
            $this->ControlsVisible["Count_DeliveryID"] = $this->Count_DeliveryID->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Report_Row_Number->SetValue($items[$i]->Report_Row_Number);
                        $this->Report_Row_Number->Attributes->RestoreFromArray($items[$i]->_Report_Row_NumberAttributes);
                        $this->DeliveryID->SetValue($items[$i]->DeliveryID);
                        $this->DeliveryID->Attributes->RestoreFromArray($items[$i]->_DeliveryIDAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->DeliveryID->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
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
                    case "Partogram":
                        if ($items[$i]->Mode == 1) {
                            $this->Partogram->SetValue($items[$i]->Partogram);
                            $this->Partogram->Attributes->RestoreFromArray($items[$i]->_PartogramAttributes);
                            $this->Count_DeliveryID2->SetValue($items[$i]->Count_DeliveryID2);
                            $this->Count_DeliveryID2->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID2Attributes);
                            $this->Count_DeliveryID3->SetText(CCFormatNumber($items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID340Rel && strval($items[$i]->Count_DeliveryID3) != "" ? $items[$i]->Count_DeliveryID3 / $items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID340Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
                            $this->Count_DeliveryID3->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID3Attributes);
                            $this->Partogram_Header->CCSEventResult = CCGetEvent($this->Partogram_Header->CCSEvents, "BeforeShow", $this->Partogram_Header);
                            if ($this->Partogram_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Partogram_Header";
                                $this->Attributes->Show();
                                $this->Partogram->Show();
                                $this->Count_DeliveryID2->Show();
                                $this->Count_DeliveryID3->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Partogram_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Partogram_Footer->CCSEventResult = CCGetEvent($this->Partogram_Footer->CCSEvents, "BeforeShow", $this->Partogram_Footer);
                            if ($this->Partogram_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Partogram_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Partogram_Footer", true, "Section Detail");
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

} //End delivery_facilities1 Class @3-FCB6E20C

class clsdelivery_facilities1DataSource extends clsDBregistry_db {  //delivery_facilities1DataSource Class @3-4BD5CEB3

//DataSource Variables @3-BC1F2C74
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $FacilityName;
    public $Partogram;
    public $DeliveryID;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-CDD50DEC
    function clsdelivery_facilities1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report delivery_facilities1";
        $this->Initialize();
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->Partogram = new clsField("Partogram", ccsInteger, "");
        
        $this->DeliveryID = new clsField("DeliveryID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @3-C6DA9E88
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], "", false);
        $this->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], "", false);
        $this->wp->AddParameter("3", "urls_FacilityName", ccsText, "", "", $this->Parameters["urls_FacilityName"], "", false);
        $this->wp->AddParameter("4", "expr74", ccsInteger, "", "", $this->Parameters["expr74"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opGreaterThanOrEqual, "DataDelivery", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsDate),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opLessThanOrEqual, "delivery.DataDelivery", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "FacilityName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opNotEqual, "delivery.Partogram", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger),false);
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

//Open Method @3-FDA9D026
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "facilities.FacilityName asc,delivery.Partogram asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-2E92F250
    function SetValues()
    {
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->Partogram->SetDBValue(trim($this->f("Partogram")));
        $this->DeliveryID->SetDBValue(trim($this->f("DeliveryID")));
    }
//End SetValues Method

} //End delivery_facilities1DataSource Class @3-FCB6E20C

class clsRecorddelivery_facilities { //delivery_facilities Class @7-64F65376

//Variables @7-9E315808

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

//Class_Initialize Event @7-384D704D
    function clsRecorddelivery_facilities($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record delivery_facilities/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "delivery_facilities";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_DataDelivery = new clsControl(ccsTextBox, "s_DataDelivery", "s_DataDelivery", ccsDate, array("ShortDate"), CCGetRequestParam("s_DataDelivery", $Method, NULL), $this);
            $this->DatePicker_s_DataDelivery = new clsDatePicker("DatePicker_s_DataDelivery", "delivery_facilities", "s_DataDelivery", $this);
            $this->s_FacilityName = new clsControl(ccsListBox, "s_FacilityName", "s_FacilityName", ccsText, "", CCGetRequestParam("s_FacilityName", $Method, NULL), $this);
            $this->s_FacilityName->DSType = dsTable;
            $this->s_FacilityName->DataSource = new clsDBregistry_db();
            $this->s_FacilityName->ds = & $this->s_FacilityName->DataSource;
            $this->s_FacilityName->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            list($this->s_FacilityName->BoundColumn, $this->s_FacilityName->TextColumn, $this->s_FacilityName->DBFormat) = array("FacilityName", "FacilityName", "");
            $this->DatePicker_s_DataDelivery1 = new clsDatePicker("DatePicker_s_DataDelivery1", "delivery_facilities", "s_DataDelivery1", $this);
            $this->s_DataDelivery1 = new clsControl(ccsTextBox, "s_DataDelivery1", "s_DataDelivery1", ccsDate, array("ShortDate"), CCGetRequestParam("s_DataDelivery1", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @7-10E385BE
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_DataDelivery->Validate() && $Validation);
        $Validation = ($this->s_FacilityName->Validate() && $Validation);
        $Validation = ($this->s_DataDelivery1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_DataDelivery->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FacilityName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DataDelivery1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @7-9DB68290
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->s_FacilityName->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @7-ED598703
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

//Operation Method @7-B9B8D2AD
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
        $Redirect = "report_delivery_partogram_district.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_delivery_partogram_district.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @7-41A22D3B
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
            $Error = ComposeStrings($Error, $this->s_FacilityName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_DataDelivery1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DataDelivery1->Errors->ToString());
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
        $this->s_FacilityName->Show();
        $this->DatePicker_s_DataDelivery1->Show();
        $this->s_DataDelivery1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End delivery_facilities Class @7-FCB6E20C

//delivery ReportGroup class @44-94DC6149
class clsReportGroupdelivery {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Partogram, $_PartogramAttributes;
    public $Count_DeliveryID, $_Count_DeliveryIDAttributes;
    public $Count_DeliveryID1, $Count_DeliveryID152Rel, $_Count_DeliveryID1Attributes;
    public $TotalCount_DeliveryID, $_TotalCount_DeliveryIDAttributes;
    public $Report_CurrentDate, $_Report_CurrentDateAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $PartogramTotalIndex;

    function clsReportGroupdelivery(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Partogram = $this->Parent->Partogram->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Count_DeliveryID = $this->Parent->Count_DeliveryID->GetTotalValue($mode);
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetTotalValue($mode);
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetTotalValue($mode);
        $this->Count_DeliveryID152Rel = $this->Parent->Count_DeliveryID1->ValueRelative;
        $this->_PartogramAttributes = $this->Parent->Partogram->Attributes->GetAsArray();
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
        $Header->Count_DeliveryID152Rel = $this->Count_DeliveryID152Rel;
        $this->Partogram = $Header->Partogram;
        $Header->_PartogramAttributes = $this->_PartogramAttributes;
        $this->Parent->Partogram->Value = $Header->Partogram;
        $this->Parent->Partogram->Attributes->RestoreFromArray($Header->_PartogramAttributes);
    }
    function ChangeTotalControls() {
        $this->Count_DeliveryID = $this->Parent->Count_DeliveryID->GetValue();
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetValue();
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetValue();
    }
}
//End delivery ReportGroup class

//delivery GroupsCollection class @44-6A75D1B4
class clsGroupsCollectiondelivery {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mPartogramCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectiondelivery(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mPartogramCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdelivery($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->PartogramTotalIndex = $this->mPartogramCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Partogram->Value = $this->Parent->Partogram->initialValue;
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
        if ($groupName == "Partogram") {
            $GroupPartogram = & $this->InitGroup(true);
            $this->Parent->Partogram_Header->CCSEventResult = CCGetEvent($this->Parent->Partogram_Header->CCSEvents, "OnInitialize", $this->Parent->Partogram_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Partogram_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Partogram_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Partogram_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Partogram_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Partogram_Header->Height;
                $GroupPartogram->SetTotalControls("GetNextValue");
            $this->Parent->Partogram_Header->CCSEventResult = CCGetEvent($this->Parent->Partogram_Header->CCSEvents, "OnCalculate", $this->Parent->Partogram_Header);
            $GroupPartogram->SetControls();
            $GroupPartogram->Mode = 1;
            $GroupPartogram->GroupType = "Partogram";
            $this->mPartogramCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupPartogram;
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
        $GroupPartogram = & $this->InitGroup(true);
        $this->Parent->Partogram_Footer->CCSEventResult = CCGetEvent($this->Parent->Partogram_Footer->CCSEvents, "OnInitialize", $this->Parent->Partogram_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Partogram_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Partogram_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Partogram_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupPartogram->SetTotalControls("GetPrevValue");
        $GroupPartogram->SyncWithHeader($this->Groups[$this->mPartogramCurrentHeaderIndex]);
        if ($this->Parent->Partogram_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Partogram_Footer->Height;
        $this->Parent->Partogram_Footer->CCSEventResult = CCGetEvent($this->Parent->Partogram_Footer->CCSEvents, "OnCalculate", $this->Parent->Partogram_Footer);
        $GroupPartogram->SetControls();
        $this->Parent->Count_DeliveryID->Reset();
        $this->Parent->Count_DeliveryID1->Reset();
        $this->RestoreValues();
        $GroupPartogram->Mode = 2;
        $GroupPartogram->GroupType ="Partogram";
        $this->Groups[] = & $GroupPartogram;
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
//End delivery GroupsCollection class

class clsReportdelivery { //delivery Class @44-87A4CC5C

//delivery Variables @44-3DD43DAC

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
    public $Partogram_HeaderBlock, $Partogram_Header;
    public $Partogram_FooterBlock, $Partogram_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Partogram_HeaderControls, $Partogram_FooterControls;
//End delivery Variables

//Class_Initialize Event @44-8B9D740B
    function clsReportdelivery($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "delivery";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Detail->Visible = false;
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
        $this->Partogram_Footer = new clsSection($this);
        $this->Partogram_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Partogram_Footer->Height);
        $this->Partogram_Header = new clsSection($this);
        $this->Partogram_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Partogram_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdeliveryDataSource($this);
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

        $this->Partogram = new clsControl(ccsReportLabel, "Partogram", "Partogram", ccsInteger, "", "", $this);
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

//Initialize Method @44-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @44-E590F1ED
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Partogram->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID1->Errors->Count());
        $errors = ($errors || $this->TotalCount_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @44-954DEFEE
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Partogram->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @44-20CA6896
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $this->DataSource->Parameters["expr75"] = -1;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $PartogramKey = "";
        $Groups = new clsGroupsCollectiondelivery($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Partogram->SetValue($this->DataSource->Partogram->GetValue());
            $this->Count_DeliveryID->SetValue(1);
            $this->Count_DeliveryID1->SetValue(1);
            $this->TotalCount_DeliveryID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $PartogramKey != $this->DataSource->f("Partogram")) {
                $Groups->OpenGroup("Partogram");
            }
            $Groups->AddItem();
            $PartogramKey = $this->DataSource->f("Partogram");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $PartogramKey != $this->DataSource->f("Partogram")) {
                $Groups->CloseGroup("Partogram");
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
            $this->ControlsVisible["Partogram"] = $this->Partogram->Visible;
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
                    case "Partogram":
                        if ($items[$i]->Mode == 1) {
                            $this->Partogram->SetValue($items[$i]->Partogram);
                            $this->Partogram->Attributes->RestoreFromArray($items[$i]->_PartogramAttributes);
                            $this->Count_DeliveryID->SetValue($items[$i]->Count_DeliveryID);
                            $this->Count_DeliveryID->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryIDAttributes);
                            $this->Count_DeliveryID1->SetText(CCFormatNumber($items[$items[$i]->ReportTotalIndex]->Count_DeliveryID152Rel && strval($items[$i]->Count_DeliveryID1) != "" ? $items[$i]->Count_DeliveryID1 / $items[$items[$i]->ReportTotalIndex]->Count_DeliveryID152Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
                            $this->Count_DeliveryID1->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID1Attributes);
                            $this->Partogram_Header->CCSEventResult = CCGetEvent($this->Partogram_Header->CCSEvents, "BeforeShow", $this->Partogram_Header);
                            if ($this->Partogram_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Partogram_Header";
                                $this->Attributes->Show();
                                $this->Partogram->Show();
                                $this->Count_DeliveryID->Show();
                                $this->Count_DeliveryID1->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Partogram_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Partogram_Footer->CCSEventResult = CCGetEvent($this->Partogram_Footer->CCSEvents, "BeforeShow", $this->Partogram_Footer);
                            if ($this->Partogram_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Partogram_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Partogram_Footer", true, "Section Detail");
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

} //End delivery Class @44-FCB6E20C

class clsdeliveryDataSource extends clsDBregistry_db {  //deliveryDataSource Class @44-9FB0C359

//DataSource Variables @44-D65412DA
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $Partogram;
//End DataSource Variables

//DataSourceClass_Initialize Event @44-179B8DA0
    function clsdeliveryDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report delivery";
        $this->Initialize();
        $this->Partogram = new clsField("Partogram", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @44-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @44-43F393D9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], "", false);
        $this->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], "", false);
        $this->wp->AddParameter("3", "expr75", ccsInteger, "", "", $this->Parameters["expr75"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opGreaterThanOrEqual, "DataDelivery", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsDate),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opLessThanOrEqual, "DataDelivery", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opNotEqual, "Partogram", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]);
    }
//End Prepare Method

//Open Method @44-B7BEFE11
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT DeliveryID, Partogram, DataDelivery \n\n" .
        "FROM delivery {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "Partogram asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @44-E89A05D1
    function SetValues()
    {
        $this->Partogram->SetDBValue(trim($this->f("Partogram")));
    }
//End SetValues Method

} //End deliveryDataSource Class @44-FCB6E20C

//Initialize Page @1-093D6381
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
$TemplateFileName = "report_delivery_partogram_district.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-4DB1C155
CCSecurityRedirect("1;2", "noaccess.php");
//End Authenticate User

//Include events file @1-422EF8C3
include_once("./report_delivery_partogram_district_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-BE99D98C
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$delivery_facilities1 = new clsReportdelivery_facilities1("", $MainPage);
$delivery_facilities = new clsRecorddelivery_facilities("", $MainPage);
$delivery = new clsReportdelivery("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_delivery_partogram_district.php";
$FlashChart1 = new clsFlashChart("FlashChart1", $MainPage);
$FlashChart1->CallbackParameter = "report_delivery_partogram_districtFlashChart1";
$FlashChart1->Title = $CCSLocales->GetText("Partograms_inAll_facilities");
$FlashChart1->Width = 400;
$FlashChart1->Height = 300;
$MainPage->topmenu = & $topmenu;
$MainPage->delivery_facilities1 = & $delivery_facilities1;
$MainPage->delivery_facilities = & $delivery_facilities;
$MainPage->delivery = & $delivery;
$MainPage->Report_Print = & $Report_Print;
$MainPage->FlashChart1 = & $FlashChart1;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$delivery_facilities1->Initialize();
$delivery->Initialize();

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

//Execute Components @1-E5525FD4
$topmenu->Operations();
$delivery_facilities->Operation();
//End Execute Components

//Go to destination page @1-7D1FC959
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($delivery_facilities1);
    unset($delivery_facilities);
    unset($delivery);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-60768B8E
$topmenu->Show();
$delivery_facilities1->Show();
$delivery_facilities->Show();
$delivery->Show();
$FlashChart1->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C2DD054E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($delivery_facilities1);
unset($delivery_facilities);
unset($delivery);
unset($Tpl);
//End Unload Page


?>
