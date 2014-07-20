<?php
//Include Common Files @1-AEDF277F
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_obstetrical_intervention.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//delivery_procedures_proce1 ReportGroup class @85-0F97416A
class clsReportGroupdelivery_procedures_proce1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Count_delivery_DeliveryID, $_Count_delivery_DeliveryIDAttributes;
    public $ProcedureName, $_ProcedureNameAttributes;
    public $TotalCount_delivery_DeliveryID, $_TotalCount_delivery_DeliveryIDAttributes;
    public $Report_CurrentPage, $_Report_CurrentPageAttributes;
    public $Report_TotalPages, $_Report_TotalPagesAttributes;
    public $Report_CurrentDate, $_Report_CurrentDateAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $ProcedureNameTotalIndex;

    function clsReportGroupdelivery_procedures_proce1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->ProcedureName = $this->Parent->ProcedureName->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Count_delivery_DeliveryID = $this->Parent->Count_delivery_DeliveryID->GetTotalValue($mode);
        $this->TotalCount_delivery_DeliveryID = $this->Parent->TotalCount_delivery_DeliveryID->GetTotalValue($mode);
        $this->_Count_delivery_DeliveryIDAttributes = $this->Parent->Count_delivery_DeliveryID->Attributes->GetAsArray();
        $this->_ProcedureNameAttributes = $this->Parent->ProcedureName->Attributes->GetAsArray();
        $this->_TotalCount_delivery_DeliveryIDAttributes = $this->Parent->TotalCount_delivery_DeliveryID->Attributes->GetAsArray();
        $this->_Report_CurrentPageAttributes = $this->Parent->Report_CurrentPage->Attributes->GetAsArray();
        $this->_Report_TotalPagesAttributes = $this->Parent->Report_TotalPages->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Count_delivery_DeliveryID = $this->Count_delivery_DeliveryID;
        $Header->_Count_delivery_DeliveryIDAttributes = $this->_Count_delivery_DeliveryIDAttributes;
        $Header->TotalCount_delivery_DeliveryID = $this->TotalCount_delivery_DeliveryID;
        $Header->_TotalCount_delivery_DeliveryIDAttributes = $this->_TotalCount_delivery_DeliveryIDAttributes;
        $this->ProcedureName = $Header->ProcedureName;
        $Header->_ProcedureNameAttributes = $this->_ProcedureNameAttributes;
        $this->Parent->ProcedureName->Value = $Header->ProcedureName;
        $this->Parent->ProcedureName->Attributes->RestoreFromArray($Header->_ProcedureNameAttributes);
    }
    function ChangeTotalControls() {
        $this->Count_delivery_DeliveryID = $this->Parent->Count_delivery_DeliveryID->GetValue();
        $this->TotalCount_delivery_DeliveryID = $this->Parent->TotalCount_delivery_DeliveryID->GetValue();
    }
}
//End delivery_procedures_proce1 ReportGroup class

//delivery_procedures_proce1 GroupsCollection class @85-8DE24F2E
class clsGroupsCollectiondelivery_procedures_proce1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mProcedureNameCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectiondelivery_procedures_proce1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mProcedureNameCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdelivery_procedures_proce1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->ProcedureNameTotalIndex = $this->mProcedureNameCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Count_delivery_DeliveryID->Value = $this->Parent->Count_delivery_DeliveryID->initialValue;
        $this->Parent->ProcedureName->Value = $this->Parent->ProcedureName->initialValue;
        $this->Parent->TotalCount_delivery_DeliveryID->Value = $this->Parent->TotalCount_delivery_DeliveryID->initialValue;
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
        if ($groupName == "ProcedureName") {
            $GroupProcedureName = & $this->InitGroup(true);
            $this->Parent->ProcedureName_Header->CCSEventResult = CCGetEvent($this->Parent->ProcedureName_Header->CCSEvents, "OnInitialize", $this->Parent->ProcedureName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->ProcedureName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->ProcedureName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->ProcedureName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->ProcedureName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->ProcedureName_Header->Height;
                $GroupProcedureName->SetTotalControls("GetNextValue");
            $this->Parent->ProcedureName_Header->CCSEventResult = CCGetEvent($this->Parent->ProcedureName_Header->CCSEvents, "OnCalculate", $this->Parent->ProcedureName_Header);
            $GroupProcedureName->SetControls();
            $GroupProcedureName->Mode = 1;
            $GroupProcedureName->GroupType = "ProcedureName";
            $this->mProcedureNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupProcedureName;
            $this->Parent->Count_delivery_DeliveryID->Reset();
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
        $GroupProcedureName = & $this->InitGroup(true);
        $this->Parent->ProcedureName_Footer->CCSEventResult = CCGetEvent($this->Parent->ProcedureName_Footer->CCSEvents, "OnInitialize", $this->Parent->ProcedureName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->ProcedureName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->ProcedureName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->ProcedureName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupProcedureName->SetTotalControls("GetPrevValue");
        $GroupProcedureName->SyncWithHeader($this->Groups[$this->mProcedureNameCurrentHeaderIndex]);
        if ($this->Parent->ProcedureName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->ProcedureName_Footer->Height;
        $this->Parent->ProcedureName_Footer->CCSEventResult = CCGetEvent($this->Parent->ProcedureName_Footer->CCSEvents, "OnCalculate", $this->Parent->ProcedureName_Footer);
        $GroupProcedureName->SetControls();
        $this->Parent->Count_delivery_DeliveryID->Reset();
        $this->RestoreValues();
        $GroupProcedureName->Mode = 2;
        $GroupProcedureName->GroupType ="ProcedureName";
        $this->Groups[] = & $GroupProcedureName;
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
//End delivery_procedures_proce1 GroupsCollection class

class clsReportdelivery_procedures_proce1 { //delivery_procedures_proce1 Class @85-FC1FF2B9

//delivery_procedures_proce1 Variables @85-DC09B93E

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
    public $ProcedureName_HeaderBlock, $ProcedureName_Header;
    public $ProcedureName_FooterBlock, $ProcedureName_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $ProcedureName_HeaderControls, $ProcedureName_FooterControls;
//End delivery_procedures_proce1 Variables

//Class_Initialize Event @85-4298FED5
    function clsReportdelivery_procedures_proce1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "delivery_procedures_proce1";
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
        $this->Page_Footer->Height = 2;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->ProcedureName_Footer = new clsSection($this);
        $this->ProcedureName_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->ProcedureName_Footer->Height);
        $this->ProcedureName_Header = new clsSection($this);
        $this->ProcedureName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->ProcedureName_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdelivery_procedures_proce1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Web");
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else if($this->ViewMode == "Print") {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 50;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
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

        $this->Count_delivery_DeliveryID = new clsControl(ccsReportLabel, "Count_delivery_DeliveryID", "Count_delivery_DeliveryID", ccsInteger, "", 0, $this);
        $this->Count_delivery_DeliveryID->TotalFunction = "Count";
        $this->Count_delivery_DeliveryID->IsEmptySource = true;
        $this->ProcedureName = new clsControl(ccsReportLabel, "ProcedureName", "ProcedureName", ccsText, "", "", $this);
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_delivery_DeliveryID = new clsControl(ccsReportLabel, "TotalCount_delivery_DeliveryID", "TotalCount_delivery_DeliveryID", ccsInteger, "", 0, $this);
        $this->TotalCount_delivery_DeliveryID->TotalFunction = "Count";
        $this->TotalCount_delivery_DeliveryID->IsEmptySource = true;
        $this->PageBreak = new clsPanel("PageBreak", $this);
        $this->Report_CurrentPage = new clsControl(ccsReportLabel, "Report_CurrentPage", "Report_CurrentPage", ccsInteger, "", "", $this);
        $this->Report_TotalPages = new clsControl(ccsReportLabel, "Report_TotalPages", "Report_TotalPages", ccsInteger, "", "", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Report_CurrentDate = new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
    }
//End Class_Initialize Event

//Initialize Method @85-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @85-ECC8B8B7
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Count_delivery_DeliveryID->Errors->Count());
        $errors = ($errors || $this->ProcedureName->Errors->Count());
        $errors = ($errors || $this->TotalCount_delivery_DeliveryID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentPage->Errors->Count());
        $errors = ($errors || $this->Report_TotalPages->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @85-BBE4EB5B
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Count_delivery_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ProcedureName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_delivery_DeliveryID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentPage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_TotalPages->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @85-35F080B9
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

        $ProcedureNameKey = "";
        $Groups = new clsGroupsCollectiondelivery_procedures_proce1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->ProcedureName->SetValue($this->DataSource->ProcedureName->GetValue());
            $this->Count_delivery_DeliveryID->SetValue(1);
            $this->TotalCount_delivery_DeliveryID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $ProcedureNameKey != $this->DataSource->f("ProcedureName")) {
                $Groups->OpenGroup("ProcedureName");
            }
            $Groups->AddItem();
            $ProcedureNameKey = $this->DataSource->f("ProcedureName");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $ProcedureNameKey != $this->DataSource->f("ProcedureName")) {
                $Groups->CloseGroup("ProcedureName");
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
            $this->ControlsVisible["Count_delivery_DeliveryID"] = $this->Count_delivery_DeliveryID->Visible;
            $this->ControlsVisible["ProcedureName"] = $this->ProcedureName->Visible;
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
                            $this->TotalCount_delivery_DeliveryID->SetValue($items[$i]->TotalCount_delivery_DeliveryID);
                            $this->TotalCount_delivery_DeliveryID->Attributes->RestoreFromArray($items[$i]->_TotalCount_delivery_DeliveryIDAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalCount_delivery_DeliveryID->Show();
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
                            $this->PageBreak->Visible = (($i < count($items) - 1) && ($this->ViewMode == "Print"));
                            $this->Report_CurrentPage->SetValue($items[$i]->PageNumber);
                            $this->Report_CurrentPage->Attributes->RestoreFromArray($items[$i]->_Report_CurrentPageAttributes);
                            $this->Report_TotalPages->SetValue($Groups->TotalPages);
                            $this->Report_TotalPages->Attributes->RestoreFromArray($items[$i]->_Report_TotalPagesAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->PageBreak->Show();
                                $this->Report_CurrentPage->Show();
                                $this->Report_TotalPages->Show();
                                $this->Navigator->Show();
                                $this->Report_CurrentDate->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "ProcedureName":
                        if ($items[$i]->Mode == 1) {
                            $this->Count_delivery_DeliveryID->SetValue($items[$i]->Count_delivery_DeliveryID);
                            $this->Count_delivery_DeliveryID->Attributes->RestoreFromArray($items[$i]->_Count_delivery_DeliveryIDAttributes);
                            $this->ProcedureName->SetValue($items[$i]->ProcedureName);
                            $this->ProcedureName->Attributes->RestoreFromArray($items[$i]->_ProcedureNameAttributes);
                            $this->ProcedureName_Header->CCSEventResult = CCGetEvent($this->ProcedureName_Header->CCSEvents, "BeforeShow", $this->ProcedureName_Header);
                            if ($this->ProcedureName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section ProcedureName_Header";
                                $this->Attributes->Show();
                                $this->Count_delivery_DeliveryID->Show();
                                $this->ProcedureName->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section ProcedureName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->ProcedureName_Footer->CCSEventResult = CCGetEvent($this->ProcedureName_Footer->CCSEvents, "BeforeShow", $this->ProcedureName_Footer);
                            if ($this->ProcedureName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section ProcedureName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section ProcedureName_Footer", true, "Section Detail");
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

} //End delivery_procedures_proce1 Class @85-FCB6E20C

class clsdelivery_procedures_proce1DataSource extends clsDBregistry_db {  //delivery_procedures_proce1DataSource Class @85-65BFA934

//DataSource Variables @85-1FF69947
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $ProcedureName;
//End DataSource Variables

//DataSourceClass_Initialize Event @85-02F24A54
    function clsdelivery_procedures_proce1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report delivery_procedures_proce1";
        $this->Initialize();
        $this->ProcedureName = new clsField("ProcedureName", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @85-D1D63007
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "procedures.ProcedureTypeID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @85-9A1DB66F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], "", false);
        $this->wp->AddParameter("2", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], "", false);
        $this->wp->AddParameter("3", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opGreaterThanOrEqual, "delivery.DataDelivery", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsDate),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opLessThanOrEqual, "delivery.DataDelivery", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsDate),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opIn, "delivery.FacilityID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]);
    }
//End Prepare Method

//Open Method @85-F2702C4D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT delivery.DeliveryID AS delivery_DeliveryID, proceduretype.*, DataDelivery \n\n" .
        "FROM (procedures INNER JOIN delivery ON\n\n" .
        "procedures.DeliveryID = delivery.DeliveryID) INNER JOIN proceduretype ON\n\n" .
        "procedures.ProcedureTypeID = proceduretype.ProcedureTypeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "proceduretype.ProcedureName asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @85-3307A7ED
    function SetValues()
    {
        $this->ProcedureName->SetDBValue($this->f("ProcedureName"));
    }
//End SetValues Method

} //End delivery_procedures_proce1DataSource Class @85-FCB6E20C

class clsRecorddelivery_procedures_proce { //delivery_procedures_proce Class @95-5520AFC7

//Variables @95-9E315808

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

//Class_Initialize Event @95-63EC1D87
    function clsRecorddelivery_procedures_proce($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record delivery_procedures_proce/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "delivery_procedures_proce";
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
            $this->DatePicker_s_DataDelivery = new clsDatePicker("DatePicker_s_DataDelivery", "delivery_procedures_proce", "s_DataDelivery", $this);
            $this->s_DataDelivery1 = new clsControl(ccsTextBox, "s_DataDelivery1", "s_DataDelivery1", ccsDate, array("ShortDate"), CCGetRequestParam("s_DataDelivery1", $Method, NULL), $this);
            $this->DatePicker_s_DataDelivery1 = new clsDatePicker("DatePicker_s_DataDelivery1", "delivery_procedures_proce", "s_DataDelivery1", $this);
        }
    }
//End Class_Initialize Event

//Validate Method @95-7BC863FB
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

//CheckErrors Method @95-69028692
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

//MasterDetail @95-ED598703
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

//Operation Method @95-9CBA1CBA
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
        $Redirect = "report_obstetrical_intervention.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_obstetrical_intervention.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @95-8E6DC874
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

} //End delivery_procedures_proce Class @95-FCB6E20C



//Initialize Page @1-96D2AE91
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
$TemplateFileName = "report_obstetrical_intervention.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-13756179
CCSecurityRedirect("3", "noaccess.php");
//End Authenticate User

//Include events file @1-576EFA08
include_once("./report_obstetrical_intervention_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-D81411DA
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$delivery_procedures_proce1 = new clsReportdelivery_procedures_proce1("", $MainPage);
$delivery_procedures_proce = new clsRecorddelivery_procedures_proce("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_obstetrical_intervention.php";
$MainPage->topmenu = & $topmenu;
$MainPage->delivery_procedures_proce1 = & $delivery_procedures_proce1;
$MainPage->delivery_procedures_proce = & $delivery_procedures_proce;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$delivery_procedures_proce1->Initialize();

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

//Execute Components @1-E8D386DE
$topmenu->Operations();
$delivery_procedures_proce->Operation();
//End Execute Components

//Go to destination page @1-C7501706
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($delivery_procedures_proce1);
    unset($delivery_procedures_proce);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-39609A57
$topmenu->Show();
$delivery_procedures_proce1->Show();
$delivery_procedures_proce->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-BA993CEF
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($delivery_procedures_proce1);
unset($delivery_procedures_proce);
unset($Tpl);
//End Unload Page


?>
