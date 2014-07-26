<?php
//Include Common Files @1-BD13F8DF
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_statistical_delivery_facilities.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//delivery_facilities_deliv ReportGroup class @3-1F332E85
class clsReportGroupdelivery_facilities_deliv {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $DeliveryTypeName, $_DeliveryTypeNameAttributes;
    public $Count_deliverytype_DeliveryTypeID1, $Count_deliverytype_DeliveryTypeID140Rel, $_Count_deliverytype_DeliveryTypeID1Attributes;
    public $Count_deliverytype_DeliveryTypeID2, $_Count_deliverytype_DeliveryTypeID2Attributes;
    public $TotalCount_deliverytype_DeliveryTypeID, $_TotalCount_deliverytype_DeliveryTypeIDAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $DeliveryTypeNameTotalIndex;

    function clsReportGroupdelivery_facilities_deliv(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->DeliveryTypeName = $this->Parent->DeliveryTypeName->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Count_deliverytype_DeliveryTypeID1 = $this->Parent->Count_deliverytype_DeliveryTypeID1->GetTotalValue($mode);
        $this->Count_deliverytype_DeliveryTypeID2 = $this->Parent->Count_deliverytype_DeliveryTypeID2->GetTotalValue($mode);
        $this->TotalCount_deliverytype_DeliveryTypeID = $this->Parent->TotalCount_deliverytype_DeliveryTypeID->GetTotalValue($mode);
        $this->Count_deliverytype_DeliveryTypeID140Rel = $this->Parent->Count_deliverytype_DeliveryTypeID1->ValueRelative;
        $this->_DeliveryTypeNameAttributes = $this->Parent->DeliveryTypeName->Attributes->GetAsArray();
        $this->_Count_deliverytype_DeliveryTypeID1Attributes = $this->Parent->Count_deliverytype_DeliveryTypeID1->Attributes->GetAsArray();
        $this->_Count_deliverytype_DeliveryTypeID2Attributes = $this->Parent->Count_deliverytype_DeliveryTypeID2->Attributes->GetAsArray();
        $this->_TotalCount_deliverytype_DeliveryTypeIDAttributes = $this->Parent->TotalCount_deliverytype_DeliveryTypeID->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Count_deliverytype_DeliveryTypeID1 = $this->Count_deliverytype_DeliveryTypeID1;
        $Header->_Count_deliverytype_DeliveryTypeID1Attributes = $this->_Count_deliverytype_DeliveryTypeID1Attributes;
        $Header->Count_deliverytype_DeliveryTypeID2 = $this->Count_deliverytype_DeliveryTypeID2;
        $Header->_Count_deliverytype_DeliveryTypeID2Attributes = $this->_Count_deliverytype_DeliveryTypeID2Attributes;
        $Header->TotalCount_deliverytype_DeliveryTypeID = $this->TotalCount_deliverytype_DeliveryTypeID;
        $Header->_TotalCount_deliverytype_DeliveryTypeIDAttributes = $this->_TotalCount_deliverytype_DeliveryTypeIDAttributes;
        $Header->Count_deliverytype_DeliveryTypeID140Rel = $this->Count_deliverytype_DeliveryTypeID140Rel;
        $this->DeliveryTypeName = $Header->DeliveryTypeName;
        $Header->_DeliveryTypeNameAttributes = $this->_DeliveryTypeNameAttributes;
        $this->Parent->DeliveryTypeName->Value = $Header->DeliveryTypeName;
        $this->Parent->DeliveryTypeName->Attributes->RestoreFromArray($Header->_DeliveryTypeNameAttributes);
    }
    function ChangeTotalControls() {
        $this->Count_deliverytype_DeliveryTypeID1 = $this->Parent->Count_deliverytype_DeliveryTypeID1->GetValue();
        $this->Count_deliverytype_DeliveryTypeID2 = $this->Parent->Count_deliverytype_DeliveryTypeID2->GetValue();
        $this->TotalCount_deliverytype_DeliveryTypeID = $this->Parent->TotalCount_deliverytype_DeliveryTypeID->GetValue();
    }
}
//End delivery_facilities_deliv ReportGroup class

//delivery_facilities_deliv GroupsCollection class @3-E9F76929
class clsGroupsCollectiondelivery_facilities_deliv {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mDeliveryTypeNameCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectiondelivery_facilities_deliv(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mDeliveryTypeNameCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdelivery_facilities_deliv($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->DeliveryTypeNameTotalIndex = $this->mDeliveryTypeNameCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->DeliveryTypeName->Value = $this->Parent->DeliveryTypeName->initialValue;
        $this->Parent->Count_deliverytype_DeliveryTypeID1->Value = $this->Parent->Count_deliverytype_DeliveryTypeID1->initialValue;
        $this->Parent->Count_deliverytype_DeliveryTypeID2->Value = $this->Parent->Count_deliverytype_DeliveryTypeID2->initialValue;
        $this->Parent->TotalCount_deliverytype_DeliveryTypeID->Value = $this->Parent->TotalCount_deliverytype_DeliveryTypeID->initialValue;
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
        if ($groupName == "DeliveryTypeName") {
            $GroupDeliveryTypeName = & $this->InitGroup(true);
            $this->Parent->DeliveryTypeName_Header->CCSEventResult = CCGetEvent($this->Parent->DeliveryTypeName_Header->CCSEvents, "OnInitialize", $this->Parent->DeliveryTypeName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->DeliveryTypeName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->DeliveryTypeName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->DeliveryTypeName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->DeliveryTypeName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->DeliveryTypeName_Header->Height;
                $GroupDeliveryTypeName->SetTotalControls("GetNextValue");
            $this->Parent->DeliveryTypeName_Header->CCSEventResult = CCGetEvent($this->Parent->DeliveryTypeName_Header->CCSEvents, "OnCalculate", $this->Parent->DeliveryTypeName_Header);
            $GroupDeliveryTypeName->SetControls();
            $GroupDeliveryTypeName->Mode = 1;
            $GroupDeliveryTypeName->GroupType = "DeliveryTypeName";
            $this->mDeliveryTypeNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupDeliveryTypeName;
            $this->Parent->Count_deliverytype_DeliveryTypeID1->Reset();
            $this->Parent->Count_deliverytype_DeliveryTypeID2->Reset();
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
        $GroupDeliveryTypeName = & $this->InitGroup(true);
        $this->Parent->DeliveryTypeName_Footer->CCSEventResult = CCGetEvent($this->Parent->DeliveryTypeName_Footer->CCSEvents, "OnInitialize", $this->Parent->DeliveryTypeName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->DeliveryTypeName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->DeliveryTypeName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->DeliveryTypeName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupDeliveryTypeName->SetTotalControls("GetPrevValue");
        $GroupDeliveryTypeName->SyncWithHeader($this->Groups[$this->mDeliveryTypeNameCurrentHeaderIndex]);
        if ($this->Parent->DeliveryTypeName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->DeliveryTypeName_Footer->Height;
        $this->Parent->DeliveryTypeName_Footer->CCSEventResult = CCGetEvent($this->Parent->DeliveryTypeName_Footer->CCSEvents, "OnCalculate", $this->Parent->DeliveryTypeName_Footer);
        $GroupDeliveryTypeName->SetControls();
        $this->Parent->Count_deliverytype_DeliveryTypeID1->Reset();
        $this->Parent->Count_deliverytype_DeliveryTypeID2->Reset();
        $this->RestoreValues();
        $GroupDeliveryTypeName->Mode = 2;
        $GroupDeliveryTypeName->GroupType ="DeliveryTypeName";
        $this->Groups[] = & $GroupDeliveryTypeName;
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
//End delivery_facilities_deliv GroupsCollection class

class clsReportdelivery_facilities_deliv { //delivery_facilities_deliv Class @3-E4E10482

//delivery_facilities_deliv Variables @3-02720462

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
    public $DeliveryTypeName_HeaderBlock, $DeliveryTypeName_Header;
    public $DeliveryTypeName_FooterBlock, $DeliveryTypeName_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $DeliveryTypeName_HeaderControls, $DeliveryTypeName_FooterControls;
//End delivery_facilities_deliv Variables

//Class_Initialize Event @3-BDEB160D
    function clsReportdelivery_facilities_deliv($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "delivery_facilities_deliv";
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
        $this->DeliveryTypeName_Footer = new clsSection($this);
        $this->DeliveryTypeName_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->DeliveryTypeName_Footer->Height);
        $this->DeliveryTypeName_Header = new clsSection($this);
        $this->DeliveryTypeName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->DeliveryTypeName_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdelivery_facilities_delivDataSource($this);
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

        $this->DeliveryTypeName = new clsControl(ccsReportLabel, "DeliveryTypeName", "DeliveryTypeName", ccsText, "", "", $this);
        $this->Count_deliverytype_DeliveryTypeID1 = new clsControl(ccsReportLabel, "Count_deliverytype_DeliveryTypeID1", "Count_deliverytype_DeliveryTypeID1", ccsInteger, array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, ""), 0, $this);
        $this->Count_deliverytype_DeliveryTypeID1->TotalFunction = "Count";
        $this->Count_deliverytype_DeliveryTypeID1->IsPercent = true;
        $this->Count_deliverytype_DeliveryTypeID1->IsEmptySource = true;
        $this->Count_deliverytype_DeliveryTypeID2 = new clsControl(ccsReportLabel, "Count_deliverytype_DeliveryTypeID2", "Count_deliverytype_DeliveryTypeID2", ccsInteger, "", 0, $this);
        $this->Count_deliverytype_DeliveryTypeID2->TotalFunction = "Count";
        $this->Count_deliverytype_DeliveryTypeID2->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_deliverytype_DeliveryTypeID = new clsControl(ccsReportLabel, "TotalCount_deliverytype_DeliveryTypeID", "TotalCount_deliverytype_DeliveryTypeID", ccsInteger, "", 0, $this);
        $this->TotalCount_deliverytype_DeliveryTypeID->TotalFunction = "Count";
        $this->TotalCount_deliverytype_DeliveryTypeID->IsEmptySource = true;
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

//CheckErrors Method @3-09787A39
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DeliveryTypeName->Errors->Count());
        $errors = ($errors || $this->Count_deliverytype_DeliveryTypeID1->Errors->Count());
        $errors = ($errors || $this->Count_deliverytype_DeliveryTypeID2->Errors->Count());
        $errors = ($errors || $this->TotalCount_deliverytype_DeliveryTypeID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @3-787E6E89
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->DeliveryTypeName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_deliverytype_DeliveryTypeID1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_deliverytype_DeliveryTypeID2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_deliverytype_DeliveryTypeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @3-722E9A44
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $this->DataSource->Parameters["expr209"] = 99;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $DeliveryTypeNameKey = "";
        $Groups = new clsGroupsCollectiondelivery_facilities_deliv($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->DeliveryTypeName->SetValue($this->DataSource->DeliveryTypeName->GetValue());
            $this->Count_deliverytype_DeliveryTypeID1->SetValue(1);
            $this->Count_deliverytype_DeliveryTypeID2->SetValue(1);
            $this->TotalCount_deliverytype_DeliveryTypeID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $DeliveryTypeNameKey != $this->DataSource->f("DeliveryTypeName")) {
                $Groups->OpenGroup("DeliveryTypeName");
            }
            $Groups->AddItem();
            $DeliveryTypeNameKey = $this->DataSource->f("DeliveryTypeName");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $DeliveryTypeNameKey != $this->DataSource->f("DeliveryTypeName")) {
                $Groups->CloseGroup("DeliveryTypeName");
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
            $this->ControlsVisible["DeliveryTypeName"] = $this->DeliveryTypeName->Visible;
            $this->ControlsVisible["Count_deliverytype_DeliveryTypeID1"] = $this->Count_deliverytype_DeliveryTypeID1->Visible;
            $this->ControlsVisible["Count_deliverytype_DeliveryTypeID2"] = $this->Count_deliverytype_DeliveryTypeID2->Visible;
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
                            $this->TotalCount_deliverytype_DeliveryTypeID->SetValue($items[$i]->TotalCount_deliverytype_DeliveryTypeID);
                            $this->TotalCount_deliverytype_DeliveryTypeID->Attributes->RestoreFromArray($items[$i]->_TotalCount_deliverytype_DeliveryTypeIDAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalCount_deliverytype_DeliveryTypeID->Show();
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
                    case "DeliveryTypeName":
                        if ($items[$i]->Mode == 1) {
                            $this->DeliveryTypeName->SetValue($items[$i]->DeliveryTypeName);
                            $this->DeliveryTypeName->Attributes->RestoreFromArray($items[$i]->_DeliveryTypeNameAttributes);
                            $this->Count_deliverytype_DeliveryTypeID1->SetText(CCFormatNumber($items[$items[$i]->ReportTotalIndex]->Count_deliverytype_DeliveryTypeID140Rel && strval($items[$i]->Count_deliverytype_DeliveryTypeID1) != "" ? $items[$i]->Count_deliverytype_DeliveryTypeID1 / $items[$items[$i]->ReportTotalIndex]->Count_deliverytype_DeliveryTypeID140Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
                            $this->Count_deliverytype_DeliveryTypeID1->Attributes->RestoreFromArray($items[$i]->_Count_deliverytype_DeliveryTypeID1Attributes);
                            $this->Count_deliverytype_DeliveryTypeID2->SetValue($items[$i]->Count_deliverytype_DeliveryTypeID2);
                            $this->Count_deliverytype_DeliveryTypeID2->Attributes->RestoreFromArray($items[$i]->_Count_deliverytype_DeliveryTypeID2Attributes);
                            $this->DeliveryTypeName_Header->CCSEventResult = CCGetEvent($this->DeliveryTypeName_Header->CCSEvents, "BeforeShow", $this->DeliveryTypeName_Header);
                            if ($this->DeliveryTypeName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section DeliveryTypeName_Header";
                                $this->Attributes->Show();
                                $this->DeliveryTypeName->Show();
                                $this->Count_deliverytype_DeliveryTypeID1->Show();
                                $this->Count_deliverytype_DeliveryTypeID2->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section DeliveryTypeName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->DeliveryTypeName_Footer->CCSEventResult = CCGetEvent($this->DeliveryTypeName_Footer->CCSEvents, "BeforeShow", $this->DeliveryTypeName_Footer);
                            if ($this->DeliveryTypeName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section DeliveryTypeName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section DeliveryTypeName_Footer", true, "Section Detail");
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

} //End delivery_facilities_deliv Class @3-FCB6E20C

class clsdelivery_facilities_delivDataSource extends clsDBregistry_db {  //delivery_facilities_delivDataSource Class @3-0D505581

//DataSource Variables @3-E120C002
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $DeliveryTypeName;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-79B2281A
    function clsdelivery_facilities_delivDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report delivery_facilities_deliv";
        $this->Initialize();
        $this->DeliveryTypeName = new clsField("DeliveryTypeName", ccsText, "");
        

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

//Prepare Method @3-2315A0A9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("2", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], "", false);
        $this->wp->AddParameter("3", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], "", false);
        $this->wp->AddParameter("4", "expr209", ccsInteger, "", "", $this->Parameters["expr209"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opIn, "delivery.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger, true),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opGreaterThanOrEqual, "DataDelivery", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opLessThanOrEqual, "delivery.DataDelivery", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opNotEqual, "delivery.DeliveryTypeID", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger),false);
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

//Open Method @3-65353A71
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryTypeID AS delivery_DeliveryTypeID, DeliveryTypeName, deliverytype.DeliveryTypeID AS deliverytype_DeliveryTypeID,\n\n" .
        "FacilityName, DataDelivery \n\n" .
        "FROM (delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN deliverytype ON\n\n" .
        "delivery.DeliveryTypeID = deliverytype.DeliveryTypeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "deliverytype.DeliveryTypeName asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-34504519
    function SetValues()
    {
        $this->DeliveryTypeName->SetDBValue($this->f("DeliveryTypeName"));
    }
//End SetValues Method

} //End delivery_facilities_delivDataSource Class @3-FCB6E20C

class clsRecorddelivery_deliverytype_fac { //delivery_deliverytype_fac Class @16-FB4C4803

//Variables @16-9E315808

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

//Class_Initialize Event @16-3A444994
    function clsRecorddelivery_deliverytype_fac($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record delivery_deliverytype_fac/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "delivery_deliverytype_fac";
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
            $this->DatePicker_s_DataDelivery = new clsDatePicker("DatePicker_s_DataDelivery", "delivery_deliverytype_fac", "s_DataDelivery", $this);
            $this->s_DataDelivery1 = new clsControl(ccsTextBox, "s_DataDelivery1", "s_DataDelivery1", ccsDate, $DefaultDateFormat, CCGetRequestParam("s_DataDelivery1", $Method, NULL), $this);
            $this->DatePicker_s_DataDelivery1 = new clsDatePicker("DatePicker_s_DataDelivery1", "delivery_deliverytype_fac", "s_DataDelivery1", $this);
        }
    }
//End Class_Initialize Event

//Validate Method @16-7BC863FB
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_DataDelivery->Validate() && $Validation);
        $Validation = ($this->s_DataDelivery1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_DataDelivery->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DataDelivery1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @16-69028692
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @16-ED598703
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

//Operation Method @16-3E8D3630
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
        $Redirect = "report_statistical_delivery_facilities.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_statistical_delivery_facilities.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @16-8E6DC874
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
            $Error = ComposeStrings($Error, $this->s_DataDelivery->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_DataDelivery->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DataDelivery1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_DataDelivery1->Errors->ToString());
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
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End delivery_deliverytype_fac Class @16-FCB6E20C

//delivery_deliverymethod_f1 ReportGroup class @54-7EBEAF35
class clsReportGroupdelivery_deliverymethod_f1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $DeliveryMethodName, $_DeliveryMethodNameAttributes;
    public $Count_DeliveryID1, $_Count_DeliveryID1Attributes;
    public $Count_DeliveryID2, $Count_DeliveryID263Rel, $_Count_DeliveryID2Attributes;
    public $TotalCount_DeliveryID, $_TotalCount_DeliveryIDAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $FacilityNameTotalIndex;
    public $DeliveryMethodNameTotalIndex;

    function clsReportGroupdelivery_deliverymethod_f1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->DeliveryMethodName = $this->Parent->DeliveryMethodName->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetTotalValue($mode);
        $this->Count_DeliveryID2 = $this->Parent->Count_DeliveryID2->GetTotalValue($mode);
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetTotalValue($mode);
        $this->Count_DeliveryID263Rel = $this->Parent->Count_DeliveryID2->ValueRelative;
        $this->_DeliveryMethodNameAttributes = $this->Parent->DeliveryMethodName->Attributes->GetAsArray();
        $this->_Count_DeliveryID1Attributes = $this->Parent->Count_DeliveryID1->Attributes->GetAsArray();
        $this->_Count_DeliveryID2Attributes = $this->Parent->Count_DeliveryID2->Attributes->GetAsArray();
        $this->_TotalCount_DeliveryIDAttributes = $this->Parent->TotalCount_DeliveryID->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Count_DeliveryID1 = $this->Count_DeliveryID1;
        $Header->_Count_DeliveryID1Attributes = $this->_Count_DeliveryID1Attributes;
        $Header->Count_DeliveryID2 = $this->Count_DeliveryID2;
        $Header->_Count_DeliveryID2Attributes = $this->_Count_DeliveryID2Attributes;
        $Header->TotalCount_DeliveryID = $this->TotalCount_DeliveryID;
        $Header->_TotalCount_DeliveryIDAttributes = $this->_TotalCount_DeliveryIDAttributes;
        $Header->Count_DeliveryID263Rel = $this->Count_DeliveryID263Rel;
        $this->DeliveryMethodName = $Header->DeliveryMethodName;
        $Header->_DeliveryMethodNameAttributes = $this->_DeliveryMethodNameAttributes;
        $this->Parent->DeliveryMethodName->Value = $Header->DeliveryMethodName;
        $this->Parent->DeliveryMethodName->Attributes->RestoreFromArray($Header->_DeliveryMethodNameAttributes);
    }
    function ChangeTotalControls() {
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetValue();
        $this->Count_DeliveryID2 = $this->Parent->Count_DeliveryID2->GetValue();
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetValue();
    }
}
//End delivery_deliverymethod_f1 ReportGroup class

//delivery_deliverymethod_f1 GroupsCollection class @54-87B4F030
class clsGroupsCollectiondelivery_deliverymethod_f1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mFacilityNameCurrentHeaderIndex;
    public $mDeliveryMethodNameCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectiondelivery_deliverymethod_f1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mFacilityNameCurrentHeaderIndex = 1;
        $this->mDeliveryMethodNameCurrentHeaderIndex = 2;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdelivery_deliverymethod_f1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->FacilityNameTotalIndex = $this->mFacilityNameCurrentHeaderIndex;
        $group->DeliveryMethodNameTotalIndex = $this->mDeliveryMethodNameCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->DeliveryMethodName->Value = $this->Parent->DeliveryMethodName->initialValue;
        $this->Parent->Count_DeliveryID1->Value = $this->Parent->Count_DeliveryID1->initialValue;
        $this->Parent->Count_DeliveryID2->Value = $this->Parent->Count_DeliveryID2->initialValue;
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
            $this->Parent->Count_DeliveryID2->ResetRelativeValues();
        }
        if ($groupName == "DeliveryMethodName" or $OpenFlag) {
            $GroupDeliveryMethodName = & $this->InitGroup(true);
            $this->Parent->DeliveryMethodName_Header->CCSEventResult = CCGetEvent($this->Parent->DeliveryMethodName_Header->CCSEvents, "OnInitialize", $this->Parent->DeliveryMethodName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->DeliveryMethodName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->DeliveryMethodName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->DeliveryMethodName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->DeliveryMethodName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->DeliveryMethodName_Header->Height;
                $GroupDeliveryMethodName->SetTotalControls("GetNextValue");
            $this->Parent->DeliveryMethodName_Header->CCSEventResult = CCGetEvent($this->Parent->DeliveryMethodName_Header->CCSEvents, "OnCalculate", $this->Parent->DeliveryMethodName_Header);
            $GroupDeliveryMethodName->SetControls();
            $GroupDeliveryMethodName->Mode = 1;
            $GroupDeliveryMethodName->GroupType = "DeliveryMethodName";
            $this->mDeliveryMethodNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupDeliveryMethodName;
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
        $GroupDeliveryMethodName = & $this->InitGroup(true);
        $this->Parent->DeliveryMethodName_Footer->CCSEventResult = CCGetEvent($this->Parent->DeliveryMethodName_Footer->CCSEvents, "OnInitialize", $this->Parent->DeliveryMethodName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->DeliveryMethodName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->DeliveryMethodName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->DeliveryMethodName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupDeliveryMethodName->SetTotalControls("GetPrevValue");
        $GroupDeliveryMethodName->SyncWithHeader($this->Groups[$this->mDeliveryMethodNameCurrentHeaderIndex]);
        if ($this->Parent->DeliveryMethodName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->DeliveryMethodName_Footer->Height;
        $this->Parent->DeliveryMethodName_Footer->CCSEventResult = CCGetEvent($this->Parent->DeliveryMethodName_Footer->CCSEvents, "OnCalculate", $this->Parent->DeliveryMethodName_Footer);
        $GroupDeliveryMethodName->SetControls();
        $this->Parent->Count_DeliveryID1->Reset();
        $this->Parent->Count_DeliveryID2->Reset();
        $this->RestoreValues();
        $GroupDeliveryMethodName->Mode = 2;
        $GroupDeliveryMethodName->GroupType ="DeliveryMethodName";
        $this->Groups[] = & $GroupDeliveryMethodName;
        if ($groupName == "DeliveryMethodName") return;
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
//End delivery_deliverymethod_f1 GroupsCollection class

class clsReportdelivery_deliverymethod_f1 { //delivery_deliverymethod_f1 Class @54-7CEFF53E

//delivery_deliverymethod_f1 Variables @54-AAD01F9C

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
    public $DeliveryMethodName_HeaderBlock, $DeliveryMethodName_Header;
    public $DeliveryMethodName_FooterBlock, $DeliveryMethodName_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $FacilityName_HeaderControls, $FacilityName_FooterControls;
    public $DeliveryMethodName_HeaderControls, $DeliveryMethodName_FooterControls;
//End delivery_deliverymethod_f1 Variables

//Class_Initialize Event @54-BF868928
    function clsReportdelivery_deliverymethod_f1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "delivery_deliverymethod_f1";
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
        $this->DeliveryMethodName_Footer = new clsSection($this);
        $this->DeliveryMethodName_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->DeliveryMethodName_Footer->Height);
        $this->DeliveryMethodName_Header = new clsSection($this);
        $this->DeliveryMethodName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->DeliveryMethodName_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdelivery_deliverymethod_f1DataSource($this);
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

        $this->DeliveryMethodName = new clsControl(ccsReportLabel, "DeliveryMethodName", "DeliveryMethodName", ccsText, "", "", $this);
        $this->Count_DeliveryID1 = new clsControl(ccsReportLabel, "Count_DeliveryID1", "Count_DeliveryID1", ccsInteger, "", 0, $this);
        $this->Count_DeliveryID1->TotalFunction = "Count";
        $this->Count_DeliveryID1->IsEmptySource = true;
        $this->Count_DeliveryID2 = new clsControl(ccsReportLabel, "Count_DeliveryID2", "Count_DeliveryID2", ccsInteger, array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, ""), 0, $this);
        $this->Count_DeliveryID2->TotalFunction = "Count";
        $this->Count_DeliveryID2->IsPercent = true;
        $this->Count_DeliveryID2->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_DeliveryID = new clsControl(ccsReportLabel, "TotalCount_DeliveryID", "TotalCount_DeliveryID", ccsInteger, "", 0, $this);
        $this->TotalCount_DeliveryID->TotalFunction = "Count";
        $this->TotalCount_DeliveryID->IsEmptySource = true;
    }
//End Class_Initialize Event

//Initialize Method @54-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @54-6D84E002
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DeliveryMethodName->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID1->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID2->Errors->Count());
        $errors = ($errors || $this->TotalCount_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @54-AC9BFA46
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->DeliveryMethodName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @54-DBCF582E
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["expr210"] = 99;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $FacilityNameKey = "";
        $DeliveryMethodNameKey = "";
        $Groups = new clsGroupsCollectiondelivery_deliverymethod_f1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->DeliveryMethodName->SetValue($this->DataSource->DeliveryMethodName->GetValue());
            $this->Count_DeliveryID1->SetValue(1);
            $this->Count_DeliveryID2->SetValue(1);
            $this->TotalCount_DeliveryID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->OpenGroup("FacilityName");
            } elseif ($DeliveryMethodNameKey != $this->DataSource->f("DeliveryMethodName")) {
                $Groups->OpenGroup("DeliveryMethodName");
            }
            $Groups->AddItem();
            $FacilityNameKey = $this->DataSource->f("FacilityName");
            $DeliveryMethodNameKey = $this->DataSource->f("DeliveryMethodName");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->CloseGroup("FacilityName");
            } elseif ($DeliveryMethodNameKey != $this->DataSource->f("DeliveryMethodName")) {
                $Groups->CloseGroup("DeliveryMethodName");
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
            $this->ControlsVisible["DeliveryMethodName"] = $this->DeliveryMethodName->Visible;
            $this->ControlsVisible["Count_DeliveryID1"] = $this->Count_DeliveryID1->Visible;
            $this->ControlsVisible["Count_DeliveryID2"] = $this->Count_DeliveryID2->Visible;
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
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "FacilityName":
                        if ($items[$i]->Mode == 1) {
                            $this->FacilityName_Header->CCSEventResult = CCGetEvent($this->FacilityName_Header->CCSEvents, "BeforeShow", $this->FacilityName_Header);
                            if ($this->FacilityName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FacilityName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->FacilityName_Footer->CCSEventResult = CCGetEvent($this->FacilityName_Footer->CCSEvents, "BeforeShow", $this->FacilityName_Footer);
                            if ($this->FacilityName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FacilityName_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "DeliveryMethodName":
                        if ($items[$i]->Mode == 1) {
                            $this->DeliveryMethodName->SetValue($items[$i]->DeliveryMethodName);
                            $this->DeliveryMethodName->Attributes->RestoreFromArray($items[$i]->_DeliveryMethodNameAttributes);
                            $this->Count_DeliveryID1->SetValue($items[$i]->Count_DeliveryID1);
                            $this->Count_DeliveryID1->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID1Attributes);
                            $this->Count_DeliveryID2->SetText(CCFormatNumber($items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID263Rel && strval($items[$i]->Count_DeliveryID2) != "" ? $items[$i]->Count_DeliveryID2 / $items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID263Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
                            $this->Count_DeliveryID2->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID2Attributes);
                            $this->DeliveryMethodName_Header->CCSEventResult = CCGetEvent($this->DeliveryMethodName_Header->CCSEvents, "BeforeShow", $this->DeliveryMethodName_Header);
                            if ($this->DeliveryMethodName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section DeliveryMethodName_Header";
                                $this->Attributes->Show();
                                $this->DeliveryMethodName->Show();
                                $this->Count_DeliveryID1->Show();
                                $this->Count_DeliveryID2->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section DeliveryMethodName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->DeliveryMethodName_Footer->CCSEventResult = CCGetEvent($this->DeliveryMethodName_Footer->CCSEvents, "BeforeShow", $this->DeliveryMethodName_Footer);
                            if ($this->DeliveryMethodName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section DeliveryMethodName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section DeliveryMethodName_Footer", true, "Section Detail");
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

} //End delivery_deliverymethod_f1 Class @54-FCB6E20C

class clsdelivery_deliverymethod_f1DataSource extends clsDBregistry_db {  //delivery_deliverymethod_f1DataSource Class @54-EC437F08

//DataSource Variables @54-37FFC9C4
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $DeliveryMethodName;
//End DataSource Variables

//DataSourceClass_Initialize Event @54-34476BA2
    function clsdelivery_deliverymethod_f1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report delivery_deliverymethod_f1";
        $this->Initialize();
        $this->DeliveryMethodName = new clsField("DeliveryMethodName", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @54-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @54-A29BD832
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], "", false);
        $this->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], "", false);
        $this->wp->AddParameter("3", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("4", "expr210", ccsInteger, "", "", $this->Parameters["expr210"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opGreaterThanOrEqual, "DataDelivery", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsDate),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opLessThanOrEqual, "delivery.DataDelivery", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opIn, "delivery.FacilityID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger, true),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opNotEqual, "delivery.DeliveryMethodID", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger),false);
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

//Open Method @54-85A35E53
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT FacilityName, DeliveryMethodName, DeliveryID, DataDelivery \n\n" .
        "FROM (delivery INNER JOIN deliverymethod ON\n\n" .
        "delivery.DeliveryMethodID = deliverymethod.DeliveryMethodID) INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "facilities.FacilityName asc,deliverymethod.DeliveryMethodName asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @54-25E4063E
    function SetValues()
    {
        $this->DeliveryMethodName->SetDBValue($this->f("DeliveryMethodName"));
    }
//End SetValues Method

} //End delivery_deliverymethod_f1DataSource Class @54-FCB6E20C

//delivery_facilities1 ReportGroup class @87-28A9D467
class clsReportGroupdelivery_facilities1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $PartnerDelivery, $_PartnerDeliveryAttributes;
    public $Count_DeliveryID1, $_Count_DeliveryID1Attributes;
    public $Count_DeliveryID2, $Count_DeliveryID298Rel, $_Count_DeliveryID2Attributes;
    public $TotalCount_DeliveryID, $_TotalCount_DeliveryIDAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $FacilityNameTotalIndex;
    public $PartnerDeliveryTotalIndex;

    function clsReportGroupdelivery_facilities1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->PartnerDelivery = $this->Parent->PartnerDelivery->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetTotalValue($mode);
        $this->Count_DeliveryID2 = $this->Parent->Count_DeliveryID2->GetTotalValue($mode);
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetTotalValue($mode);
        $this->Count_DeliveryID298Rel = $this->Parent->Count_DeliveryID2->ValueRelative;
        $this->_PartnerDeliveryAttributes = $this->Parent->PartnerDelivery->Attributes->GetAsArray();
        $this->_Count_DeliveryID1Attributes = $this->Parent->Count_DeliveryID1->Attributes->GetAsArray();
        $this->_Count_DeliveryID2Attributes = $this->Parent->Count_DeliveryID2->Attributes->GetAsArray();
        $this->_TotalCount_DeliveryIDAttributes = $this->Parent->TotalCount_DeliveryID->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Count_DeliveryID1 = $this->Count_DeliveryID1;
        $Header->_Count_DeliveryID1Attributes = $this->_Count_DeliveryID1Attributes;
        $Header->Count_DeliveryID2 = $this->Count_DeliveryID2;
        $Header->_Count_DeliveryID2Attributes = $this->_Count_DeliveryID2Attributes;
        $Header->TotalCount_DeliveryID = $this->TotalCount_DeliveryID;
        $Header->_TotalCount_DeliveryIDAttributes = $this->_TotalCount_DeliveryIDAttributes;
        $Header->Count_DeliveryID298Rel = $this->Count_DeliveryID298Rel;
        $this->PartnerDelivery = $Header->PartnerDelivery;
        $Header->_PartnerDeliveryAttributes = $this->_PartnerDeliveryAttributes;
        $this->Parent->PartnerDelivery->Value = $Header->PartnerDelivery;
        $this->Parent->PartnerDelivery->Attributes->RestoreFromArray($Header->_PartnerDeliveryAttributes);
    }
    function ChangeTotalControls() {
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetValue();
        $this->Count_DeliveryID2 = $this->Parent->Count_DeliveryID2->GetValue();
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetValue();
    }
}
//End delivery_facilities1 ReportGroup class

//delivery_facilities1 GroupsCollection class @87-2399421E
class clsGroupsCollectiondelivery_facilities1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mFacilityNameCurrentHeaderIndex;
    public $mPartnerDeliveryCurrentHeaderIndex;
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
        $this->mPartnerDeliveryCurrentHeaderIndex = 2;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdelivery_facilities1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->FacilityNameTotalIndex = $this->mFacilityNameCurrentHeaderIndex;
        $group->PartnerDeliveryTotalIndex = $this->mPartnerDeliveryCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->PartnerDelivery->Value = $this->Parent->PartnerDelivery->initialValue;
        $this->Parent->Count_DeliveryID1->Value = $this->Parent->Count_DeliveryID1->initialValue;
        $this->Parent->Count_DeliveryID2->Value = $this->Parent->Count_DeliveryID2->initialValue;
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
            $this->Parent->Count_DeliveryID2->ResetRelativeValues();
        }
        if ($groupName == "PartnerDelivery" or $OpenFlag) {
            $GroupPartnerDelivery = & $this->InitGroup(true);
            $this->Parent->PartnerDelivery_Header->CCSEventResult = CCGetEvent($this->Parent->PartnerDelivery_Header->CCSEvents, "OnInitialize", $this->Parent->PartnerDelivery_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->PartnerDelivery_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->PartnerDelivery_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->PartnerDelivery_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->PartnerDelivery_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->PartnerDelivery_Header->Height;
                $GroupPartnerDelivery->SetTotalControls("GetNextValue");
            $this->Parent->PartnerDelivery_Header->CCSEventResult = CCGetEvent($this->Parent->PartnerDelivery_Header->CCSEvents, "OnCalculate", $this->Parent->PartnerDelivery_Header);
            $GroupPartnerDelivery->SetControls();
            $GroupPartnerDelivery->Mode = 1;
            $GroupPartnerDelivery->GroupType = "PartnerDelivery";
            $this->mPartnerDeliveryCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupPartnerDelivery;
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
        $GroupPartnerDelivery = & $this->InitGroup(true);
        $this->Parent->PartnerDelivery_Footer->CCSEventResult = CCGetEvent($this->Parent->PartnerDelivery_Footer->CCSEvents, "OnInitialize", $this->Parent->PartnerDelivery_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->PartnerDelivery_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->PartnerDelivery_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->PartnerDelivery_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupPartnerDelivery->SetTotalControls("GetPrevValue");
        $GroupPartnerDelivery->SyncWithHeader($this->Groups[$this->mPartnerDeliveryCurrentHeaderIndex]);
        if ($this->Parent->PartnerDelivery_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->PartnerDelivery_Footer->Height;
        $this->Parent->PartnerDelivery_Footer->CCSEventResult = CCGetEvent($this->Parent->PartnerDelivery_Footer->CCSEvents, "OnCalculate", $this->Parent->PartnerDelivery_Footer);
        $GroupPartnerDelivery->SetControls();
        $this->Parent->Count_DeliveryID1->Reset();
        $this->Parent->Count_DeliveryID2->Reset();
        $this->RestoreValues();
        $GroupPartnerDelivery->Mode = 2;
        $GroupPartnerDelivery->GroupType ="PartnerDelivery";
        $this->Groups[] = & $GroupPartnerDelivery;
        if ($groupName == "PartnerDelivery") return;
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
//End delivery_facilities1 GroupsCollection class

class clsReportdelivery_facilities1 { //delivery_facilities1 Class @87-624C1990

//delivery_facilities1 Variables @87-CF530066

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
    public $PartnerDelivery_HeaderBlock, $PartnerDelivery_Header;
    public $PartnerDelivery_FooterBlock, $PartnerDelivery_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $FacilityName_HeaderControls, $FacilityName_FooterControls;
    public $PartnerDelivery_HeaderControls, $PartnerDelivery_FooterControls;
//End delivery_facilities1 Variables

//Class_Initialize Event @87-C1BD4C3A
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
        $this->PartnerDelivery_Footer = new clsSection($this);
        $this->PartnerDelivery_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->PartnerDelivery_Footer->Height);
        $this->PartnerDelivery_Header = new clsSection($this);
        $this->PartnerDelivery_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->PartnerDelivery_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdelivery_facilities1DataSource($this);
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

        $this->PartnerDelivery = new clsControl(ccsReportLabel, "PartnerDelivery", "PartnerDelivery", ccsInteger, "", "", $this);
        $this->Count_DeliveryID1 = new clsControl(ccsReportLabel, "Count_DeliveryID1", "Count_DeliveryID1", ccsInteger, "", 0, $this);
        $this->Count_DeliveryID1->TotalFunction = "Count";
        $this->Count_DeliveryID1->IsEmptySource = true;
        $this->Count_DeliveryID2 = new clsControl(ccsReportLabel, "Count_DeliveryID2", "Count_DeliveryID2", ccsInteger, array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, ""), 0, $this);
        $this->Count_DeliveryID2->TotalFunction = "Count";
        $this->Count_DeliveryID2->IsPercent = true;
        $this->Count_DeliveryID2->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_DeliveryID = new clsControl(ccsReportLabel, "TotalCount_DeliveryID", "TotalCount_DeliveryID", ccsInteger, "", 0, $this);
        $this->TotalCount_DeliveryID->TotalFunction = "Count";
        $this->TotalCount_DeliveryID->IsEmptySource = true;
    }
//End Class_Initialize Event

//Initialize Method @87-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @87-06587BFF
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PartnerDelivery->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID1->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID2->Errors->Count());
        $errors = ($errors || $this->TotalCount_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @87-7A600979
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PartnerDelivery->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @87-467CD753
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["expr211"] = -1;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $FacilityNameKey = "";
        $PartnerDeliveryKey = "";
        $Groups = new clsGroupsCollectiondelivery_facilities1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->PartnerDelivery->SetValue($this->DataSource->PartnerDelivery->GetValue());
            $this->Count_DeliveryID1->SetValue(1);
            $this->Count_DeliveryID2->SetValue(1);
            $this->TotalCount_DeliveryID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->OpenGroup("FacilityName");
            } elseif ($PartnerDeliveryKey != $this->DataSource->f("PartnerDelivery")) {
                $Groups->OpenGroup("PartnerDelivery");
            }
            $Groups->AddItem();
            $FacilityNameKey = $this->DataSource->f("FacilityName");
            $PartnerDeliveryKey = $this->DataSource->f("PartnerDelivery");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->CloseGroup("FacilityName");
            } elseif ($PartnerDeliveryKey != $this->DataSource->f("PartnerDelivery")) {
                $Groups->CloseGroup("PartnerDelivery");
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
            $this->ControlsVisible["PartnerDelivery"] = $this->PartnerDelivery->Visible;
            $this->ControlsVisible["Count_DeliveryID1"] = $this->Count_DeliveryID1->Visible;
            $this->ControlsVisible["Count_DeliveryID2"] = $this->Count_DeliveryID2->Visible;
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
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "FacilityName":
                        if ($items[$i]->Mode == 1) {
                            $this->FacilityName_Header->CCSEventResult = CCGetEvent($this->FacilityName_Header->CCSEvents, "BeforeShow", $this->FacilityName_Header);
                            if ($this->FacilityName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FacilityName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->FacilityName_Footer->CCSEventResult = CCGetEvent($this->FacilityName_Footer->CCSEvents, "BeforeShow", $this->FacilityName_Footer);
                            if ($this->FacilityName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FacilityName_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "PartnerDelivery":
                        if ($items[$i]->Mode == 1) {
                            $this->PartnerDelivery->SetValue($items[$i]->PartnerDelivery);
                            $this->PartnerDelivery->Attributes->RestoreFromArray($items[$i]->_PartnerDeliveryAttributes);
                            $this->Count_DeliveryID1->SetValue($items[$i]->Count_DeliveryID1);
                            $this->Count_DeliveryID1->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID1Attributes);
                            $this->Count_DeliveryID2->SetText(CCFormatNumber($items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID298Rel && strval($items[$i]->Count_DeliveryID2) != "" ? $items[$i]->Count_DeliveryID2 / $items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID298Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
                            $this->Count_DeliveryID2->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID2Attributes);
                            $this->PartnerDelivery_Header->CCSEventResult = CCGetEvent($this->PartnerDelivery_Header->CCSEvents, "BeforeShow", $this->PartnerDelivery_Header);
                            if ($this->PartnerDelivery_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section PartnerDelivery_Header";
                                $this->Attributes->Show();
                                $this->PartnerDelivery->Show();
                                $this->Count_DeliveryID1->Show();
                                $this->Count_DeliveryID2->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section PartnerDelivery_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->PartnerDelivery_Footer->CCSEventResult = CCGetEvent($this->PartnerDelivery_Footer->CCSEvents, "BeforeShow", $this->PartnerDelivery_Footer);
                            if ($this->PartnerDelivery_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section PartnerDelivery_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section PartnerDelivery_Footer", true, "Section Detail");
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

} //End delivery_facilities1 Class @87-FCB6E20C

class clsdelivery_facilities1DataSource extends clsDBregistry_db {  //delivery_facilities1DataSource Class @87-4BD5CEB3

//DataSource Variables @87-A606AED8
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $PartnerDelivery;
//End DataSource Variables

//DataSourceClass_Initialize Event @87-200399D3
    function clsdelivery_facilities1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report delivery_facilities1";
        $this->Initialize();
        $this->PartnerDelivery = new clsField("PartnerDelivery", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @87-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @87-DF376614
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], "", false);
        $this->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], "", false);
        $this->wp->AddParameter("3", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("4", "expr211", ccsInteger, "", "", $this->Parameters["expr211"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opGreaterThanOrEqual, "DataDelivery", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsDate),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opLessThanOrEqual, "delivery.DataDelivery", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opIn, "delivery.FacilityID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger, true),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opNotEqual, "delivery.PartnerDelivery", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger),false);
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

//Open Method @87-81C5DA56
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT DataDelivery, PartnerDelivery, FacilityName, DeliveryID \n\n" .
        "FROM delivery INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "facilities.FacilityName asc,delivery.PartnerDelivery asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @87-0E6AAAB8
    function SetValues()
    {
        $this->PartnerDelivery->SetDBValue(trim($this->f("PartnerDelivery")));
    }
//End SetValues Method

} //End delivery_facilities1DataSource Class @87-FCB6E20C

//delivery_facilities2 ReportGroup class @121-EAB3D7C8
class clsReportGroupdelivery_facilities2 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Partogram, $_PartogramAttributes;
    public $Count_DeliveryID2, $_Count_DeliveryID2Attributes;
    public $Count_DeliveryID3, $Count_DeliveryID3131Rel, $_Count_DeliveryID3Attributes;
    public $Report_Row_Number, $_Report_Row_NumberAttributes;
    public $DeliveryID, $_DeliveryIDAttributes;
    public $TotalCount_DeliveryID, $_TotalCount_DeliveryIDAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $FacilityNameTotalIndex;
    public $PartogramTotalIndex;

    function clsReportGroupdelivery_facilities2(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Partogram = $this->Parent->Partogram->Value;
        $this->DeliveryID = $this->Parent->DeliveryID->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Count_DeliveryID2 = $this->Parent->Count_DeliveryID2->GetTotalValue($mode);
        $this->Count_DeliveryID3 = $this->Parent->Count_DeliveryID3->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetTotalValue($mode);
        $this->Count_DeliveryID3131Rel = $this->Parent->Count_DeliveryID3->ValueRelative;
        $this->_PartogramAttributes = $this->Parent->Partogram->Attributes->GetAsArray();
        $this->_Count_DeliveryID2Attributes = $this->Parent->Count_DeliveryID2->Attributes->GetAsArray();
        $this->_Count_DeliveryID3Attributes = $this->Parent->Count_DeliveryID3->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_DeliveryIDAttributes = $this->Parent->DeliveryID->Attributes->GetAsArray();
        $this->_TotalCount_DeliveryIDAttributes = $this->Parent->TotalCount_DeliveryID->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Count_DeliveryID2 = $this->Count_DeliveryID2;
        $Header->_Count_DeliveryID2Attributes = $this->_Count_DeliveryID2Attributes;
        $Header->Count_DeliveryID3 = $this->Count_DeliveryID3;
        $Header->_Count_DeliveryID3Attributes = $this->_Count_DeliveryID3Attributes;
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $Header->TotalCount_DeliveryID = $this->TotalCount_DeliveryID;
        $Header->_TotalCount_DeliveryIDAttributes = $this->_TotalCount_DeliveryIDAttributes;
        $Header->Count_DeliveryID3131Rel = $this->Count_DeliveryID3131Rel;
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
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetValue();
    }
}
//End delivery_facilities2 ReportGroup class

//delivery_facilities2 GroupsCollection class @121-6B8A4AAB
class clsGroupsCollectiondelivery_facilities2 {
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

    function clsGroupsCollectiondelivery_facilities2(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mFacilityNameCurrentHeaderIndex = 1;
        $this->mPartogramCurrentHeaderIndex = 2;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdelivery_facilities2($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->FacilityNameTotalIndex = $this->mFacilityNameCurrentHeaderIndex;
        $group->PartogramTotalIndex = $this->mPartogramCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Partogram->Value = $this->Parent->Partogram->initialValue;
        $this->Parent->Count_DeliveryID2->Value = $this->Parent->Count_DeliveryID2->initialValue;
        $this->Parent->Count_DeliveryID3->Value = $this->Parent->Count_DeliveryID3->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->DeliveryID->Value = $this->Parent->DeliveryID->initialValue;
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
//End delivery_facilities2 GroupsCollection class

class clsReportdelivery_facilities2 { //delivery_facilities2 Class @121-49614A53

//delivery_facilities2 Variables @121-905F384F

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
//End delivery_facilities2 Variables

//Class_Initialize Event @121-84B2515A
    function clsReportdelivery_facilities2($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "delivery_facilities2";
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
        $this->DataSource = new clsdelivery_facilities2DataSource($this);
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
        $this->DeliveryID = new clsControl(ccsReportLabel, "DeliveryID", "DeliveryID", ccsInteger, array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, ""), "", $this);
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_DeliveryID = new clsControl(ccsReportLabel, "TotalCount_DeliveryID", "TotalCount_DeliveryID", ccsInteger, "", 0, $this);
        $this->TotalCount_DeliveryID->TotalFunction = "Count";
        $this->TotalCount_DeliveryID->IsEmptySource = true;
    }
//End Class_Initialize Event

//Initialize Method @121-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @121-6BF16C52
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Partogram->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID2->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID3->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->DeliveryID->Errors->Count());
        $errors = ($errors || $this->TotalCount_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @121-05DFEA76
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Partogram->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @121-E74EEB37
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["expr212"] = -1;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $FacilityNameKey = "";
        $PartogramKey = "";
        $Groups = new clsGroupsCollectiondelivery_facilities2($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Partogram->SetValue($this->DataSource->Partogram->GetValue());
            $this->DeliveryID->SetValue($this->DataSource->DeliveryID->GetValue());
            $this->Count_DeliveryID2->SetValue(1);
            $this->Count_DeliveryID3->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
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
            $this->ControlsVisible["Partogram"] = $this->Partogram->Visible;
            $this->ControlsVisible["Count_DeliveryID2"] = $this->Count_DeliveryID2->Visible;
            $this->ControlsVisible["Count_DeliveryID3"] = $this->Count_DeliveryID3->Visible;
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["DeliveryID"] = $this->DeliveryID->Visible;
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
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "FacilityName":
                        if ($items[$i]->Mode == 1) {
                            $this->FacilityName_Header->CCSEventResult = CCGetEvent($this->FacilityName_Header->CCSEvents, "BeforeShow", $this->FacilityName_Header);
                            if ($this->FacilityName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FacilityName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->FacilityName_Footer->CCSEventResult = CCGetEvent($this->FacilityName_Footer->CCSEvents, "BeforeShow", $this->FacilityName_Footer);
                            if ($this->FacilityName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Footer";
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
                            $this->Count_DeliveryID3->SetText(CCFormatNumber($items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID3131Rel && strval($items[$i]->Count_DeliveryID3) != "" ? $items[$i]->Count_DeliveryID3 / $items[$items[$i]->FacilityNameTotalIndex]->Count_DeliveryID3131Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
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

} //End delivery_facilities2 Class @121-FCB6E20C

class clsdelivery_facilities2DataSource extends clsDBregistry_db {  //delivery_facilities2DataSource Class @121-C006F0AA

//DataSource Variables @121-24BAC761
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $Partogram;
    public $DeliveryID;
//End DataSource Variables

//DataSourceClass_Initialize Event @121-BE65B8B2
    function clsdelivery_facilities2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report delivery_facilities2";
        $this->Initialize();
        $this->Partogram = new clsField("Partogram", ccsInteger, "");
        
        $this->DeliveryID = new clsField("DeliveryID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @121-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @121-E1072DAB
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], "", false);
        $this->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], "", false);
        $this->wp->AddParameter("3", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("4", "expr212", ccsInteger, "", "", $this->Parameters["expr212"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opGreaterThanOrEqual, "DataDelivery", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsDate),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opLessThanOrEqual, "delivery.DataDelivery", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opIn, "delivery.FacilityID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger, true),false);
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

//Open Method @121-FDA9D026
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

//SetValues Method @121-746A9C78
    function SetValues()
    {
        $this->Partogram->SetDBValue(trim($this->f("Partogram")));
        $this->DeliveryID->SetDBValue(trim($this->f("DeliveryID")));
    }
//End SetValues Method

} //End delivery_facilities2DataSource Class @121-FCB6E20C

//Report2 ReportGroup class @180-1E3B97A6
class clsReportGroupReport2 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $pregnancy_outcome, $_pregnancy_outcomeAttributes;
    public $Count_DeliveryID, $_Count_DeliveryIDAttributes;
    public $Count_DeliveryID1, $Count_DeliveryID1203Rel, $_Count_DeliveryID1Attributes;
    public $TotalCount_DeliveryID, $_TotalCount_DeliveryIDAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $pregnancy_outcomeTotalIndex;

    function clsReportGroupReport2(& $parent) {
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
        $this->Count_DeliveryID1203Rel = $this->Parent->Count_DeliveryID1->ValueRelative;
        $this->_Sorter_DeliveryIDAttributes = $this->Parent->Sorter_DeliveryID->Attributes->GetAsArray();
        $this->_pregnancy_outcomeAttributes = $this->Parent->pregnancy_outcome->Attributes->GetAsArray();
        $this->_Count_DeliveryIDAttributes = $this->Parent->Count_DeliveryID->Attributes->GetAsArray();
        $this->_Count_DeliveryID1Attributes = $this->Parent->Count_DeliveryID1->Attributes->GetAsArray();
        $this->_TotalCount_DeliveryIDAttributes = $this->Parent->TotalCount_DeliveryID->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Count_DeliveryID = $this->Count_DeliveryID;
        $Header->_Count_DeliveryIDAttributes = $this->_Count_DeliveryIDAttributes;
        $Header->Count_DeliveryID1 = $this->Count_DeliveryID1;
        $Header->_Count_DeliveryID1Attributes = $this->_Count_DeliveryID1Attributes;
        $Header->TotalCount_DeliveryID = $this->TotalCount_DeliveryID;
        $Header->_TotalCount_DeliveryIDAttributes = $this->_TotalCount_DeliveryIDAttributes;
        $Header->Count_DeliveryID1203Rel = $this->Count_DeliveryID1203Rel;
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
//End Report2 ReportGroup class

//Report2 GroupsCollection class @180-998995BA
class clsGroupsCollectionReport2 {
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

    function clsGroupsCollectionReport2(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mpregnancy_outcomeCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport2($this->Parent);
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
//End Report2 GroupsCollection class

class clsReportReport2 { //Report2 Class @180-9702E34F

//Report2 Variables @180-81C4763F

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
//End Report2 Variables

//Class_Initialize Event @180-84C7FA85
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
        $this->DataSource = new clsReport2DataSource($this);
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
        $this->SorterName = CCGetParam("Report2Order", "");
        $this->SorterDirection = CCGetParam("Report2Dir", "");

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
    }
//End Class_Initialize Event

//Initialize Method @180-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @180-FAE6DE19
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->pregnancy_outcome->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID1->Errors->Count());
        $errors = ($errors || $this->TotalCount_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @180-8A4A8CED
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->pregnancy_outcome->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @180-7E0512AA
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $pregnancy_outcomeKey = "";
        $Groups = new clsGroupsCollectionReport2($this);
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
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
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
                            $this->Count_DeliveryID1->SetText(CCFormatNumber($items[$items[$i]->ReportTotalIndex]->Count_DeliveryID1203Rel && strval($items[$i]->Count_DeliveryID1) != "" ? $items[$i]->Count_DeliveryID1 / $items[$items[$i]->ReportTotalIndex]->Count_DeliveryID1203Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
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

} //End Report2 Class @180-FCB6E20C

class clsReport2DataSource extends clsDBregistry_db {  //Report2DataSource Class @180-9C54C835

//DataSource Variables @180-F477A14A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $pregnancy_outcome;
//End DataSource Variables

//DataSourceClass_Initialize Event @180-B405FCC5
    function clsReport2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report2";
        $this->Initialize();
        $this->pregnancy_outcome = new clsField("pregnancy_outcome", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @180-2B9B5508
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DeliveryID" => array("DeliveryID", "")));
    }
//End SetOrder Method

//Prepare Method @180-4485DD10
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("2", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], CCFormatDate(CCParseDate("9999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
    }
//End Prepare Method

//Open Method @180-59920D17
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * FROM\n" .
        "(\n" .
        "SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, \"O1\" AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome1ID != -1\n" .
        "AND delivery.FacilityID IN (" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "AND DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND DataDelivery<= '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsDate) . "' \n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, \"O2\" AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome2ID != -1\n" .
        "AND delivery.FacilityID IN (" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "AND DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND DataDelivery<= '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsDate) . "' \n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, \"O3\" AS O\n" .
        "FROM (delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID)\n" .
        "INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID\n" .
        "WHERE delivery.PregnancyOutcome3ID != -1 \n" .
        "AND delivery.FacilityID IN (" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "AND DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND DataDelivery<= '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsDate) . "' \n" .
        "\n" .
        ") AS result ";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "pregnancy_outcome asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @180-BB61547B
    function SetValues()
    {
        $this->pregnancy_outcome->SetDBValue($this->f("pregnancy_outcome"));
    }
//End SetValues Method

} //End Report2DataSource Class @180-FCB6E20C

//Report3 ReportGroup class @213-3DCB226D
class clsReportGroupReport3 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Physiological, $_PhysiologicalAttributes;
    public $Count_DeliveryID, $_Count_DeliveryIDAttributes;
    public $Count_DeliveryID1, $Count_DeliveryID1221Rel, $_Count_DeliveryID1Attributes;
    public $TotalCount_DeliveryID, $_TotalCount_DeliveryIDAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $PhysiologicalTotalIndex;

    function clsReportGroupReport3(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Physiological = $this->Parent->Physiological->Value;
        $this->Count_DeliveryID = $this->Parent->Count_DeliveryID->Value;
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetTotalValue($mode);
        $this->Parent->Count_DeliveryID1->GetTotalValue($mode);
        $this->Count_DeliveryID1221Rel = $this->Parent->Count_DeliveryID1->ValueRelative;
        $this->_Sorter_DeliveryIDAttributes = $this->Parent->Sorter_DeliveryID->Attributes->GetAsArray();
        $this->_PhysiologicalAttributes = $this->Parent->Physiological->Attributes->GetAsArray();
        $this->_Count_DeliveryIDAttributes = $this->Parent->Count_DeliveryID->Attributes->GetAsArray();
        $this->_Count_DeliveryID1Attributes = $this->Parent->Count_DeliveryID1->Attributes->GetAsArray();
        $this->_TotalCount_DeliveryIDAttributes = $this->Parent->TotalCount_DeliveryID->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalCount_DeliveryID = $this->TotalCount_DeliveryID;
        $Header->_TotalCount_DeliveryIDAttributes = $this->_TotalCount_DeliveryIDAttributes;
        $this->Physiological = $Header->Physiological;
        $Header->_PhysiologicalAttributes = $this->_PhysiologicalAttributes;
        $this->Parent->Physiological->Value = $Header->Physiological;
        $this->Parent->Physiological->Attributes->RestoreFromArray($Header->_PhysiologicalAttributes);
        $this->Count_DeliveryID = $Header->Count_DeliveryID;
        $Header->_Count_DeliveryIDAttributes = $this->_Count_DeliveryIDAttributes;
        $this->Parent->Count_DeliveryID->Value = $Header->Count_DeliveryID;
        $this->Parent->Count_DeliveryID->Attributes->RestoreFromArray($Header->_Count_DeliveryIDAttributes);
        $this->Count_DeliveryID1 = $Header->Count_DeliveryID1;
        $Header->_Count_DeliveryID1Attributes = $this->_Count_DeliveryID1Attributes;
        $this->Parent->Count_DeliveryID1->Value = $Header->Count_DeliveryID1;
        $this->Parent->Count_DeliveryID1->Attributes->RestoreFromArray($Header->_Count_DeliveryID1Attributes);
        $Header->Count_DeliveryID1221Rel = $this->Count_DeliveryID1221Rel;
    }
    function ChangeTotalControls() {
        $this->Count_DeliveryID1 = $this->Parent->Count_DeliveryID1->GetValue();
        $this->TotalCount_DeliveryID = $this->Parent->TotalCount_DeliveryID->GetValue();
    }
}
//End Report3 ReportGroup class

//Report3 GroupsCollection class @213-0A579690
class clsGroupsCollectionReport3 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mPhysiologicalCurrentHeaderIndex;
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
        $this->mPhysiologicalCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport3($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->PhysiologicalTotalIndex = $this->mPhysiologicalCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Physiological->Value = $this->Parent->Physiological->initialValue;
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
        if ($groupName == "Physiological") {
            $GroupPhysiological = & $this->InitGroup(true);
            $this->Parent->Physiological_Header->CCSEventResult = CCGetEvent($this->Parent->Physiological_Header->CCSEvents, "OnInitialize", $this->Parent->Physiological_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Physiological_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Physiological_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Physiological_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Physiological_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Physiological_Header->Height;
                $GroupPhysiological->SetTotalControls("GetNextValue");
            $this->Parent->Physiological_Header->CCSEventResult = CCGetEvent($this->Parent->Physiological_Header->CCSEvents, "OnCalculate", $this->Parent->Physiological_Header);
            $GroupPhysiological->SetControls();
            $GroupPhysiological->Mode = 1;
            $GroupPhysiological->GroupType = "Physiological";
            $this->mPhysiologicalCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupPhysiological;
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
        $GroupPhysiological = & $this->InitGroup(true);
        $this->Parent->Physiological_Footer->CCSEventResult = CCGetEvent($this->Parent->Physiological_Footer->CCSEvents, "OnInitialize", $this->Parent->Physiological_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Physiological_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Physiological_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Physiological_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupPhysiological->SetTotalControls("GetPrevValue");
        $GroupPhysiological->SyncWithHeader($this->Groups[$this->mPhysiologicalCurrentHeaderIndex]);
        if ($this->Parent->Physiological_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Physiological_Footer->Height;
        $this->Parent->Physiological_Footer->CCSEventResult = CCGetEvent($this->Parent->Physiological_Footer->CCSEvents, "OnCalculate", $this->Parent->Physiological_Footer);
        $GroupPhysiological->SetControls();
        $this->RestoreValues();
        $GroupPhysiological->Mode = 2;
        $GroupPhysiological->GroupType ="Physiological";
        $this->Groups[] = & $GroupPhysiological;
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

class clsReportReport3 { //Report3 Class @213-8E19D20E

//Report3 Variables @213-00C23B0D

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
    public $Physiological_HeaderBlock, $Physiological_Header;
    public $Physiological_FooterBlock, $Physiological_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Physiological_HeaderControls, $Physiological_FooterControls;
    public $Sorter_DeliveryID;
//End Report3 Variables

//Class_Initialize Event @213-44B8B598
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
        $this->Physiological_Footer = new clsSection($this);
        $this->Physiological_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Physiological_Footer->Height);
        $this->Physiological_Header = new clsSection($this);
        $this->Physiological_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Physiological_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport3DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 20;
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
        $this->Physiological = new clsControl(ccsReportLabel, "Physiological", "Physiological", ccsText, "", "", $this);
        $this->Count_DeliveryID = new clsControl(ccsReportLabel, "Count_DeliveryID", "Count_DeliveryID", ccsInteger, "", "", $this);
        $this->Count_DeliveryID1 = new clsControl(ccsReportLabel, "Count_DeliveryID1", "Count_DeliveryID1", ccsInteger, array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, ""), "", $this);
        $this->Count_DeliveryID1->IsPercent = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_DeliveryID = new clsControl(ccsReportLabel, "TotalCount_DeliveryID", "TotalCount_DeliveryID", ccsInteger, "", "", $this);
        $this->TotalCount_DeliveryID->TotalFunction = "Sum";
    }
//End Class_Initialize Event

//Initialize Method @213-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @213-69CE80DD
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Physiological->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Count_DeliveryID1->Errors->Count());
        $errors = ($errors || $this->TotalCount_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @213-A3B86477
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Physiological->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_DeliveryID1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @213-59F5797E
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $PhysiologicalKey = "";
        $Groups = new clsGroupsCollectionReport3($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Physiological->SetValue($this->DataSource->Physiological->GetValue());
            $this->Count_DeliveryID->SetValue($this->DataSource->Count_DeliveryID->GetValue());
            $this->Count_DeliveryID1->SetValue($this->DataSource->Count_DeliveryID1->GetValue());
            $this->TotalCount_DeliveryID->SetValue($this->DataSource->TotalCount_DeliveryID->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $PhysiologicalKey != $this->DataSource->f("Physiological")) {
                $Groups->OpenGroup("Physiological");
            }
            $Groups->AddItem();
            $PhysiologicalKey = $this->DataSource->f("Physiological");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $PhysiologicalKey != $this->DataSource->f("Physiological")) {
                $Groups->CloseGroup("Physiological");
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
            $this->ControlsVisible["Physiological"] = $this->Physiological->Visible;
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
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Physiological":
                        if ($items[$i]->Mode == 1) {
                            $this->Physiological->SetValue($items[$i]->Physiological);
                            $this->Physiological->Attributes->RestoreFromArray($items[$i]->_PhysiologicalAttributes);
                            $this->Count_DeliveryID->SetValue($items[$i]->Count_DeliveryID);
                            $this->Count_DeliveryID->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryIDAttributes);
                            $this->Count_DeliveryID1->SetText(CCFormatNumber($items[$items[$i]->ReportTotalIndex]->Count_DeliveryID1221Rel && strval($items[$i]->Count_DeliveryID1) != "" ? $items[$i]->Count_DeliveryID1 / $items[$items[$i]->ReportTotalIndex]->Count_DeliveryID1221Rel : "", array(True, 1, Null, "", False, array("0"), array("#", "%"), 100, True, "")), ccsFloat);
                            $this->Count_DeliveryID1->Attributes->RestoreFromArray($items[$i]->_Count_DeliveryID1Attributes);
                            $this->Physiological_Header->CCSEventResult = CCGetEvent($this->Physiological_Header->CCSEvents, "BeforeShow", $this->Physiological_Header);
                            if ($this->Physiological_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Physiological_Header";
                                $this->Attributes->Show();
                                $this->Physiological->Show();
                                $this->Count_DeliveryID->Show();
                                $this->Count_DeliveryID1->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Physiological_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Physiological_Footer->CCSEventResult = CCGetEvent($this->Physiological_Footer->CCSEvents, "BeforeShow", $this->Physiological_Footer);
                            if ($this->Physiological_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Physiological_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Physiological_Footer", true, "Section Detail");
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

} //End Report3 Class @213-FCB6E20C

class clsReport3DataSource extends clsDBregistry_db {  //Report3DataSource Class @213-53CADFFD

//DataSource Variables @213-4DED053E
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $Physiological;
    public $Count_DeliveryID;
    public $Count_DeliveryID1;
    public $TotalCount_DeliveryID;
//End DataSource Variables

//DataSourceClass_Initialize Event @213-5FC436F1
    function clsReport3DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report3";
        $this->Initialize();
        $this->Physiological = new clsField("Physiological", ccsText, "");
        
        $this->Count_DeliveryID = new clsField("Count_DeliveryID", ccsInteger, "");
        
        $this->Count_DeliveryID1 = new clsField("Count_DeliveryID1", ccsInteger, "");
        
        $this->TotalCount_DeliveryID = new clsField("TotalCount_DeliveryID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @213-2B9B5508
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DeliveryID" => array("DeliveryID", "")));
    }
//End SetOrder Method

//Prepare Method @213-5F91FFCB
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], CCFormatDate(CCParseDate("9999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("3", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
    }
//End Prepare Method

//Open Method @213-8C737B94
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT Physiological, COUNT(DeliveryID) AS DelivCount \n" .
        "FROM \n" .
        "(\n" .
        "SELECT 'res:Physiological' AS Physiological, delivery.DeliveryID,\n" .
        "GROUP_CONCAT(DISTINCT '-', procedures.ProcedureTypeID, '-') AS procedures, \n" .
        "GROUP_CONCAT(DISTINCT '-', complications.ICD10ID, '-') AS complications\n" .
        "\n" .
        "FROM ((delivery INNER JOIN facilities ON delivery.FacilityID = facilities.FacilityID)\n" .
        "LEFT JOIN procedures ON procedures.DeliveryID = delivery.DeliveryID)\n" .
        "LEFT JOIN complications ON complications.DeliveryID = delivery.DeliveryID\n" .
        "\n" .
        "WHERE \n" .
        "DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND facilities.FacilityID IN (" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "AND\n" .
        "(PregnancyOutcome1ID = 1 OR\n" .
        "PregnancyOutcome1ID = 2 OR\n" .
        "PregnancyOutcome2ID = 1 OR\n" .
        "PregnancyOutcome2ID = 2 OR\n" .
        "PregnancyOutcome3ID = 1 OR\n" .
        "PregnancyOutcome3ID = 2)\n" .
        "AND delivery.GestationAge > 37\n" .
        "AND delivery.deliveryMethodID = 1\n" .
        "\n" .
        "GROUP BY delivery.DeliveryID\n" .
        "\n" .
        "HAVING \n" .
        "LOCATE('-1-', IFNULL(procedures,0)) = 0 AND \n" .
        "LOCATE('-3-', IFNULL(procedures,0)) = 0 AND\n" .
        "LOCATE('-6-', IFNULL(procedures,0)) = 0 AND\n" .
        "LOCATE('-7-', IFNULL(procedures,0)) = 0 AND\n" .
        "LOCATE('-13-', IFNULL(procedures,0)) = 0 AND\n" .
        "LOCATE('-O.32.1-', IFNULL(complications,0)) = 0 AND\n" .
        "LOCATE('-O.64.1-', IFNULL(complications,0)) = 0 AND\n" .
        "LOCATE('-O.80.1-', IFNULL(complications,0)) = 0 AND\n" .
        "LOCATE('-O.83.1-', IFNULL(complications,0)) = 0 AND\n" .
        "LOCATE('-O.72.-', IFNULL(complications,0)) = 0 AND\n" .
        "LOCATE('-O.72.0-', IFNULL(complications,0)) = 0 \n" .
        ") AS p\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT Physiological, COUNT(DeliveryID) AS DelivCount \n" .
        "FROM\n" .
        "(\n" .
        "SELECT 'res:Non-Physiological' AS Physiological, delivery.DeliveryID,\n" .
        "'p' AS procedures, 'c' AS complications\n" .
        "\n" .
        "FROM ((delivery INNER JOIN facilities ON\n" .
        "delivery.FacilityID = facilities.FacilityID) LEFT JOIN procedures ON\n" .
        "procedures.DeliveryID = delivery.DeliveryID) LEFT JOIN complications ON complications.DeliveryID = delivery.DeliveryID\n" .
        "\n" .
        "WHERE \n" .
        "DataDelivery >= '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsDate) . "'\n" .
        "AND DataDelivery <= '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsDate) . "'\n" .
        "AND facilities.FacilityID IN (" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "AND\n" .
        "(PregnancyOutcome1ID = 1 OR\n" .
        "PregnancyOutcome1ID = 2 OR\n" .
        "PregnancyOutcome2ID = 1 OR\n" .
        "PregnancyOutcome2ID = 2 OR\n" .
        "PregnancyOutcome3ID = 1 OR\n" .
        "PregnancyOutcome3ID = 2)\n" .
        "AND \n" .
        "(delivery.GestationAge <= 37\n" .
        "OR IFNULL(procedures.ProcedureTypeID, 0) = 1\n" .
        "OR IFNULL(procedures.ProcedureTypeID, 0) = 3\n" .
        "OR IFNULL(procedures.ProcedureTypeID, 0) = 6\n" .
        "OR IFNULL(procedures.ProcedureTypeID, 0) = 7\n" .
        "OR IFNULL(procedures.ProcedureTypeID, 0) = 13\n" .
        "OR IFNULL(complications.ICD10ID, 0) = 'O.32.1'\n" .
        "OR IFNULL(complications.ICD10ID, 0) = 'O.64.1'\n" .
        "OR IFNULL(complications.ICD10ID, 0) = 'O.80.1'\n" .
        "OR IFNULL(complications.ICD10ID, 0) = 'O.83.1'\n" .
        "OR IFNULL(complications.ICD10ID, 0) = 'O.72.'\n" .
        "OR IFNULL(complications.ICD10ID, 0) = 'O.72.0'\n" .
        "OR delivery.deliveryMethodID != 1)\n" .
        "\n" .
        "GROUP BY delivery.DeliveryID\n" .
        "\n" .
        ") AS np\n" .
        "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "Physiological asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @213-626A402E
    function SetValues()
    {
        $this->Physiological->SetDBValue($this->f("Physiological"));
        $this->Count_DeliveryID->SetDBValue(trim($this->f("DelivCount")));
        $this->Count_DeliveryID1->SetDBValue(trim($this->f("DelivCount")));
        $this->TotalCount_DeliveryID->SetDBValue(trim($this->f("DelivCount")));
    }
//End SetValues Method

} //End Report3DataSource Class @213-FCB6E20C

//Initialize Page @1-0B84A75C
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
$TemplateFileName = "report_statistical_delivery_facilities.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-13756179
CCSecurityRedirect("3", "noaccess.php");
//End Authenticate User

//Include events file @1-B22CA354
include_once("./report_statistical_delivery_facilities_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-664ECB38
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$delivery_facilities_deliv = new clsReportdelivery_facilities_deliv("", $MainPage);
$delivery_deliverytype_fac = new clsRecorddelivery_deliverytype_fac("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_statistical_delivery_facilities.php";
$delivery_deliverymethod_f1 = new clsReportdelivery_deliverymethod_f1("", $MainPage);
$delivery_facilities1 = new clsReportdelivery_facilities1("", $MainPage);
$delivery_facilities2 = new clsReportdelivery_facilities2("", $MainPage);
$Report2 = new clsReportReport2("", $MainPage);
$Report3 = new clsReportReport3("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->delivery_facilities_deliv = & $delivery_facilities_deliv;
$MainPage->delivery_deliverytype_fac = & $delivery_deliverytype_fac;
$MainPage->Report_Print = & $Report_Print;
$MainPage->delivery_deliverymethod_f1 = & $delivery_deliverymethod_f1;
$MainPage->delivery_facilities1 = & $delivery_facilities1;
$MainPage->delivery_facilities2 = & $delivery_facilities2;
$MainPage->Report2 = & $Report2;
$MainPage->Report3 = & $Report3;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$delivery_facilities_deliv->Initialize();
$delivery_deliverymethod_f1->Initialize();
$delivery_facilities1->Initialize();
$delivery_facilities2->Initialize();
$Report2->Initialize();
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

//Execute Components @1-E4DF8C0E
$topmenu->Operations();
$delivery_deliverytype_fac->Operation();
//End Execute Components

//Go to destination page @1-156FAB84
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($delivery_facilities_deliv);
    unset($delivery_deliverytype_fac);
    unset($delivery_deliverymethod_f1);
    unset($delivery_facilities1);
    unset($delivery_facilities2);
    unset($Report2);
    unset($Report3);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-F60DB8FD
$topmenu->Show();
$delivery_facilities_deliv->Show();
$delivery_deliverytype_fac->Show();
$delivery_deliverymethod_f1->Show();
$delivery_facilities1->Show();
$delivery_facilities2->Show();
$Report2->Show();
$Report3->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-8E818D37
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($delivery_facilities_deliv);
unset($delivery_deliverytype_fac);
unset($delivery_deliverymethod_f1);
unset($delivery_facilities1);
unset($delivery_facilities2);
unset($Report2);
unset($Report3);
unset($Tpl);
//End Unload Page


?>
