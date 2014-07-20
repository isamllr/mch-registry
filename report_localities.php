<?php
//Include Common Files @1-86902392
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_localities.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation



//patient_pregnancy_deliver1 ReportGroup class @54-17EE1A63
class clsReportGrouppatient_pregnancy_deliver1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $Town, $TownDup, $_TownAttributes;
    public $Report_Row_Number, $_Report_Row_NumberAttributes;
    public $PregnancyRecNr, $_PregnancyRecNrPage, $_PregnancyRecNrParameters, $_PregnancyRecNrAttributes;
    public $FamilyName, $_FamilyNamePage, $_FamilyNameParameters, $_FamilyNameAttributes;
    public $GivenName, $_GivenNameAttributes;
    public $MobilePhone, $_MobilePhoneAttributes;
    public $ReportLabel1, $_ReportLabel1Attributes;
    public $DateDelivery, $_DateDeliveryAttributes;
    public $Calc_DeliveryDate, $_Calc_DeliveryDateAttributes;
    public $Count_PatientID, $_Count_PatientIDAttributes;
    public $TotalCount_PatientID, $_TotalCount_PatientIDAttributes;
    public $Report_CurrentDate, $_Report_CurrentDateAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $TownTotalIndex;

    function clsReportGrouppatient_pregnancy_deliver1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Town = $this->Parent->Town->Value;
        $this->PregnancyRecNr = $this->Parent->PregnancyRecNr->Value;
        $this->FamilyName = $this->Parent->FamilyName->Value;
        $this->GivenName = $this->Parent->GivenName->Value;
        $this->MobilePhone = $this->Parent->MobilePhone->Value;
        $this->ReportLabel1 = $this->Parent->ReportLabel1->Value;
        $this->DateDelivery = $this->Parent->DateDelivery->Value;
        $this->Calc_DeliveryDate = $this->Parent->Calc_DeliveryDate->Value;
        if ($PrevGroup) {
            $this->TownDup =  CCCompareValues($this->Town, $PrevGroup->Town, $this->Parent->Town->DataType) == 0;
        }
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->Count_PatientID = $this->Parent->Count_PatientID->GetTotalValue($mode);
        $this->TotalCount_PatientID = $this->Parent->TotalCount_PatientID->GetTotalValue($mode);
        $this->_PregnancyRecNrPage = $this->Parent->PregnancyRecNr->Page;
        $this->_PregnancyRecNrParameters = $this->Parent->PregnancyRecNr->Parameters;
        $this->_FamilyNamePage = $this->Parent->FamilyName->Page;
        $this->_FamilyNameParameters = $this->Parent->FamilyName->Parameters;
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_Sorter_PregnancyRecNrAttributes = $this->Parent->Sorter_PregnancyRecNr->Attributes->GetAsArray();
        $this->_Sorter_MobilePhoneAttributes = $this->Parent->Sorter_MobilePhone->Attributes->GetAsArray();
        $this->_PregRegDateAttributes = $this->Parent->PregRegDate->Attributes->GetAsArray();
        $this->_Sorter1Attributes = $this->Parent->Sorter1->Attributes->GetAsArray();
        $this->_Sorter_PregnancyRecNr1Attributes = $this->Parent->Sorter_PregnancyRecNr1->Attributes->GetAsArray();
        $this->_Sorter2Attributes = $this->Parent->Sorter2->Attributes->GetAsArray();
        $this->_Sorter3Attributes = $this->Parent->Sorter3->Attributes->GetAsArray();
        $this->_TownAttributes = $this->Parent->Town->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_PregnancyRecNrAttributes = $this->Parent->PregnancyRecNr->Attributes->GetAsArray();
        $this->_FamilyNameAttributes = $this->Parent->FamilyName->Attributes->GetAsArray();
        $this->_GivenNameAttributes = $this->Parent->GivenName->Attributes->GetAsArray();
        $this->_MobilePhoneAttributes = $this->Parent->MobilePhone->Attributes->GetAsArray();
        $this->_ReportLabel1Attributes = $this->Parent->ReportLabel1->Attributes->GetAsArray();
        $this->_DateDeliveryAttributes = $this->Parent->DateDelivery->Attributes->GetAsArray();
        $this->_Calc_DeliveryDateAttributes = $this->Parent->Calc_DeliveryDate->Attributes->GetAsArray();
        $this->_Count_PatientIDAttributes = $this->Parent->Count_PatientID->Attributes->GetAsArray();
        $this->_TotalCount_PatientIDAttributes = $this->Parent->TotalCount_PatientID->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $Header->Count_PatientID = $this->Count_PatientID;
        $Header->_Count_PatientIDAttributes = $this->_Count_PatientIDAttributes;
        $Header->TotalCount_PatientID = $this->TotalCount_PatientID;
        $Header->_TotalCount_PatientIDAttributes = $this->_TotalCount_PatientIDAttributes;
        $this->Town = $Header->Town;
        $Header->_TownAttributes = $this->_TownAttributes;
        $this->Parent->Town->Value = $Header->Town;
        $this->Parent->Town->Attributes->RestoreFromArray($Header->_TownAttributes);
        $this->PregnancyRecNr = $Header->PregnancyRecNr;
        $this->_PregnancyRecNrPage = $Header->_PregnancyRecNrPage;
        $this->_PregnancyRecNrParameters = $Header->_PregnancyRecNrParameters;
        $Header->_PregnancyRecNrAttributes = $this->_PregnancyRecNrAttributes;
        $this->Parent->PregnancyRecNr->Value = $Header->PregnancyRecNr;
        $this->Parent->PregnancyRecNr->Attributes->RestoreFromArray($Header->_PregnancyRecNrAttributes);
        $this->FamilyName = $Header->FamilyName;
        $this->_FamilyNamePage = $Header->_FamilyNamePage;
        $this->_FamilyNameParameters = $Header->_FamilyNameParameters;
        $Header->_FamilyNameAttributes = $this->_FamilyNameAttributes;
        $this->Parent->FamilyName->Value = $Header->FamilyName;
        $this->Parent->FamilyName->Attributes->RestoreFromArray($Header->_FamilyNameAttributes);
        $this->GivenName = $Header->GivenName;
        $Header->_GivenNameAttributes = $this->_GivenNameAttributes;
        $this->Parent->GivenName->Value = $Header->GivenName;
        $this->Parent->GivenName->Attributes->RestoreFromArray($Header->_GivenNameAttributes);
        $this->MobilePhone = $Header->MobilePhone;
        $Header->_MobilePhoneAttributes = $this->_MobilePhoneAttributes;
        $this->Parent->MobilePhone->Value = $Header->MobilePhone;
        $this->Parent->MobilePhone->Attributes->RestoreFromArray($Header->_MobilePhoneAttributes);
        $this->ReportLabel1 = $Header->ReportLabel1;
        $Header->_ReportLabel1Attributes = $this->_ReportLabel1Attributes;
        $this->Parent->ReportLabel1->Value = $Header->ReportLabel1;
        $this->Parent->ReportLabel1->Attributes->RestoreFromArray($Header->_ReportLabel1Attributes);
        $this->DateDelivery = $Header->DateDelivery;
        $Header->_DateDeliveryAttributes = $this->_DateDeliveryAttributes;
        $this->Parent->DateDelivery->Value = $Header->DateDelivery;
        $this->Parent->DateDelivery->Attributes->RestoreFromArray($Header->_DateDeliveryAttributes);
        $this->Calc_DeliveryDate = $Header->Calc_DeliveryDate;
        $Header->_Calc_DeliveryDateAttributes = $this->_Calc_DeliveryDateAttributes;
        $this->Parent->Calc_DeliveryDate->Value = $Header->Calc_DeliveryDate;
        $this->Parent->Calc_DeliveryDate->Attributes->RestoreFromArray($Header->_Calc_DeliveryDateAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
        $this->Count_PatientID = $this->Parent->Count_PatientID->GetValue();
        $this->TotalCount_PatientID = $this->Parent->TotalCount_PatientID->GetValue();
    }
}
//End patient_pregnancy_deliver1 ReportGroup class

//patient_pregnancy_deliver1 GroupsCollection class @54-6C531A52
class clsGroupsCollectionpatient_pregnancy_deliver1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mTownCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionpatient_pregnancy_deliver1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mTownCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGrouppatient_pregnancy_deliver1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->TownTotalIndex = $this->mTownCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->Town->Value = $this->Parent->Town->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->PregnancyRecNr->Value = $this->Parent->PregnancyRecNr->initialValue;
        $this->Parent->FamilyName->Value = $this->Parent->FamilyName->initialValue;
        $this->Parent->GivenName->Value = $this->Parent->GivenName->initialValue;
        $this->Parent->MobilePhone->Value = $this->Parent->MobilePhone->initialValue;
        $this->Parent->ReportLabel1->Value = $this->Parent->ReportLabel1->initialValue;
        $this->Parent->DateDelivery->Value = $this->Parent->DateDelivery->initialValue;
        $this->Parent->Calc_DeliveryDate->Value = $this->Parent->Calc_DeliveryDate->initialValue;
        $this->Parent->Count_PatientID->Value = $this->Parent->Count_PatientID->initialValue;
        $this->Parent->TotalCount_PatientID->Value = $this->Parent->TotalCount_PatientID->initialValue;
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
        if ($groupName == "Town") {
            $GroupTown = & $this->InitGroup(true);
            $this->Parent->Town_Header->CCSEventResult = CCGetEvent($this->Parent->Town_Header->CCSEvents, "OnInitialize", $this->Parent->Town_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Town_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Town_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Town_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Town_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Town_Header->Height;
                $GroupTown->SetTotalControls("GetNextValue");
            $this->Parent->Town_Header->CCSEventResult = CCGetEvent($this->Parent->Town_Header->CCSEvents, "OnCalculate", $this->Parent->Town_Header);
            $GroupTown->SetControls();
            $GroupTown->Mode = 1;
            $GroupTown->GroupType = "Town";
            $this->mTownCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupTown;
            $this->Parent->Count_PatientID->Reset();
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
        $GroupTown = & $this->InitGroup(true);
        $this->Parent->Town_Footer->CCSEventResult = CCGetEvent($this->Parent->Town_Footer->CCSEvents, "OnInitialize", $this->Parent->Town_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Town_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Town_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Town_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupTown->SetTotalControls("GetPrevValue");
        $GroupTown->SyncWithHeader($this->Groups[$this->mTownCurrentHeaderIndex]);
        if ($this->Parent->Town_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Town_Footer->Height;
        $this->Parent->Town_Footer->CCSEventResult = CCGetEvent($this->Parent->Town_Footer->CCSEvents, "OnCalculate", $this->Parent->Town_Footer);
        $GroupTown->SetControls();
        $this->Parent->Count_PatientID->Reset();
        $this->RestoreValues();
        $GroupTown->Mode = 2;
        $GroupTown->GroupType ="Town";
        $this->Groups[] = & $GroupTown;
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
//End patient_pregnancy_deliver1 GroupsCollection class

class clsReportpatient_pregnancy_deliver1 { //patient_pregnancy_deliver1 Class @54-02EA200A

//patient_pregnancy_deliver1 Variables @54-D47D10C7

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
    public $Town_HeaderBlock, $Town_Header;
    public $Town_FooterBlock, $Town_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Town_HeaderControls, $Town_FooterControls;
    public $Sorter_PregnancyRecNr;
    public $Sorter_MobilePhone;
    public $PregRegDate;
    public $Sorter1;
    public $Sorter_PregnancyRecNr1;
    public $Sorter2;
    public $Sorter3;
//End patient_pregnancy_deliver1 Variables

//Class_Initialize Event @54-79DFD936
    function clsReportpatient_pregnancy_deliver1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "patient_pregnancy_deliver1";
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
        $this->Town_Footer = new clsSection($this);
        $this->Town_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Town_Footer->Height);
        $this->Town_Header = new clsSection($this);
        $this->Errors = new clsErrors();
        $this->DataSource = new clspatient_pregnancy_deliver1DataSource($this);
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
        $this->SorterName = CCGetParam("patient_pregnancy_deliver1Order", "");
        $this->SorterDirection = CCGetParam("patient_pregnancy_deliver1Dir", "");

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->Sorter_PregnancyRecNr = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr", $FileName, $this);
        $this->Sorter_MobilePhone = new clsSorter($this->ComponentName, "Sorter_MobilePhone", $FileName, $this);
        $this->PregRegDate = new clsSorter($this->ComponentName, "PregRegDate", $FileName, $this);
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->Sorter_PregnancyRecNr1 = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr1", $FileName, $this);
        $this->Sorter2 = new clsSorter($this->ComponentName, "Sorter2", $FileName, $this);
        $this->Sorter3 = new clsSorter($this->ComponentName, "Sorter3", $FileName, $this);
        $this->Town = new clsControl(ccsReportLabel, "Town", "Town", ccsText, "", "", $this);
        $this->Report_Row_Number = new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->PregnancyRecNr = new clsControl(ccsLink, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", CCGetRequestParam("PregnancyRecNr", ccsGet, NULL), $this);
        $this->PregnancyRecNr->Page = "pregnancy_maint.php";
        $this->FamilyName = new clsControl(ccsLink, "FamilyName", "FamilyName", ccsMemo, "", CCGetRequestParam("FamilyName", ccsGet, NULL), $this);
        $this->FamilyName->Page = "patient_maint_fac.php";
        $this->GivenName = new clsControl(ccsReportLabel, "GivenName", "GivenName", ccsMemo, "", "", $this);
        $this->MobilePhone = new clsControl(ccsReportLabel, "MobilePhone", "MobilePhone", ccsText, "", "", $this);
        $this->ReportLabel1 = new clsControl(ccsReportLabel, "ReportLabel1", "ReportLabel1", ccsDate, array("ShortDate"), "", $this);
        $this->DateDelivery = new clsControl(ccsReportLabel, "DateDelivery", "DateDelivery", ccsDate, array("ShortDate"), "", $this);
        $this->Calc_DeliveryDate = new clsControl(ccsReportLabel, "Calc_DeliveryDate", "Calc_DeliveryDate", ccsDate, array("ShortDate"), "", $this);
        $this->Count_PatientID = new clsControl(ccsReportLabel, "Count_PatientID", "Count_PatientID", ccsInteger, "", 0, $this);
        $this->Count_PatientID->TotalFunction = "Count";
        $this->Count_PatientID->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_PatientID = new clsControl(ccsReportLabel, "TotalCount_PatientID", "TotalCount_PatientID", ccsInteger, "", 0, $this);
        $this->TotalCount_PatientID->TotalFunction = "Count";
        $this->TotalCount_PatientID->IsEmptySource = true;
        $this->Report_CurrentDate = new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
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

//CheckErrors Method @54-A39EAF8A
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->Town->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->FamilyName->Errors->Count());
        $errors = ($errors || $this->GivenName->Errors->Count());
        $errors = ($errors || $this->MobilePhone->Errors->Count());
        $errors = ($errors || $this->ReportLabel1->Errors->Count());
        $errors = ($errors || $this->DateDelivery->Errors->Count());
        $errors = ($errors || $this->Calc_DeliveryDate->Errors->Count());
        $errors = ($errors || $this->Count_PatientID->Errors->Count());
        $errors = ($errors || $this->TotalCount_PatientID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @54-5F31CD07
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Town->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FamilyName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GivenName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MobilePhone->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateDelivery->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Calc_DeliveryDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @54-8527F3E2
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["urls_FamilyName"] = CCGetFromGet("s_FamilyName", NULL);
        $this->DataSource->Parameters["urls_GivenName"] = CCGetFromGet("s_GivenName", NULL);
        $this->DataSource->Parameters["urls_Town"] = CCGetFromGet("s_Town", NULL);
        $this->DataSource->Parameters["urls_PregRegDate"] = CCGetFromGet("s_PregRegDate", NULL);
        $this->DataSource->Parameters["urls_PregRegDate1"] = CCGetFromGet("s_PregRegDate1", NULL);
        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $this->DataSource->Parameters["expr145"] = 0;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $TownKey = "";
        $Groups = new clsGroupsCollectionpatient_pregnancy_deliver1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Town->SetValue($this->DataSource->Town->GetValue());
            $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
            $this->FamilyName->SetValue($this->DataSource->FamilyName->GetValue());
            $this->GivenName->SetValue($this->DataSource->GivenName->GetValue());
            $this->MobilePhone->SetValue($this->DataSource->MobilePhone->GetValue());
            $this->ReportLabel1->SetValue($this->DataSource->ReportLabel1->GetValue());
            $this->DateDelivery->SetValue($this->DataSource->DateDelivery->GetValue());
            $this->Calc_DeliveryDate->SetValue($this->DataSource->Calc_DeliveryDate->GetValue());
            $this->PregnancyRecNr->Parameters = "";
            $this->PregnancyRecNr->Parameters = CCAddParam($this->PregnancyRecNr->Parameters, "PregnancyID", $this->DataSource->f("pregnancy_PregnancyID"));
            $this->PregnancyRecNr->Parameters = CCAddParam($this->PregnancyRecNr->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
            $this->FamilyName->Parameters = "";
            $this->FamilyName->Parameters = CCAddParam($this->FamilyName->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
            $this->Report_TotalRecords->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
            $this->Count_PatientID->SetValue(1);
            $this->TotalCount_PatientID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $TownKey != $this->DataSource->f("Town")) {
                $Groups->OpenGroup("Town");
            }
            $Groups->AddItem();
            $TownKey = $this->DataSource->f("Town");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $TownKey != $this->DataSource->f("Town")) {
                $Groups->CloseGroup("Town");
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
            $this->ControlsVisible["Town"] = $this->Town->Visible;
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["PregnancyRecNr"] = $this->PregnancyRecNr->Visible;
            $this->ControlsVisible["FamilyName"] = $this->FamilyName->Visible;
            $this->ControlsVisible["GivenName"] = $this->GivenName->Visible;
            $this->ControlsVisible["MobilePhone"] = $this->MobilePhone->Visible;
            $this->ControlsVisible["ReportLabel1"] = $this->ReportLabel1->Visible;
            $this->ControlsVisible["DateDelivery"] = $this->DateDelivery->Visible;
            $this->ControlsVisible["Calc_DeliveryDate"] = $this->Calc_DeliveryDate->Visible;
            $this->ControlsVisible["Count_PatientID"] = $this->Count_PatientID->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Town->Visible = $this->ControlsVisible["Town"] && !$items[$i]->TownDup;
                        $this->Town->SetValue($items[$i]->Town);
                        $this->Town->Attributes->RestoreFromArray($items[$i]->_TownAttributes);
                        $this->Report_Row_Number->SetValue($items[$i]->Report_Row_Number);
                        $this->Report_Row_Number->Attributes->RestoreFromArray($items[$i]->_Report_Row_NumberAttributes);
                        $this->PregnancyRecNr->SetValue($items[$i]->PregnancyRecNr);
                        $this->PregnancyRecNr->Page = $items[$i]->_PregnancyRecNrPage;
                        $this->PregnancyRecNr->Parameters = $items[$i]->_PregnancyRecNrParameters;
                        $this->PregnancyRecNr->Attributes->RestoreFromArray($items[$i]->_PregnancyRecNrAttributes);
                        $this->FamilyName->SetValue($items[$i]->FamilyName);
                        $this->FamilyName->Page = $items[$i]->_FamilyNamePage;
                        $this->FamilyName->Parameters = $items[$i]->_FamilyNameParameters;
                        $this->FamilyName->Attributes->RestoreFromArray($items[$i]->_FamilyNameAttributes);
                        $this->GivenName->SetValue($items[$i]->GivenName);
                        $this->GivenName->Attributes->RestoreFromArray($items[$i]->_GivenNameAttributes);
                        $this->MobilePhone->SetValue($items[$i]->MobilePhone);
                        $this->MobilePhone->Attributes->RestoreFromArray($items[$i]->_MobilePhoneAttributes);
                        $this->ReportLabel1->SetValue($items[$i]->ReportLabel1);
                        $this->ReportLabel1->Attributes->RestoreFromArray($items[$i]->_ReportLabel1Attributes);
                        $this->DateDelivery->SetValue($items[$i]->DateDelivery);
                        $this->DateDelivery->Attributes->RestoreFromArray($items[$i]->_DateDeliveryAttributes);
                        $this->Calc_DeliveryDate->SetValue($items[$i]->Calc_DeliveryDate);
                        $this->Calc_DeliveryDate->Attributes->RestoreFromArray($items[$i]->_Calc_DeliveryDateAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Town->Show();
                        $this->Report_Row_Number->Show();
                        $this->PregnancyRecNr->Show();
                        $this->FamilyName->Show();
                        $this->GivenName->Show();
                        $this->MobilePhone->Show();
                        $this->ReportLabel1->Show();
                        $this->DateDelivery->Show();
                        $this->Calc_DeliveryDate->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
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
                            $this->TotalCount_PatientID->SetValue($items[$i]->TotalCount_PatientID);
                            $this->TotalCount_PatientID->Attributes->RestoreFromArray($items[$i]->_TotalCount_PatientIDAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalCount_PatientID->Show();
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
                                $this->Sorter_PregnancyRecNr->Show();
                                $this->Sorter_MobilePhone->Show();
                                $this->PregRegDate->Show();
                                $this->Sorter1->Show();
                                $this->Sorter_PregnancyRecNr1->Show();
                                $this->Sorter2->Show();
                                $this->Sorter3->Show();
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
                    case "Town":
                        if ($items[$i]->Mode == 1) {
                            $this->Town_Header->CCSEventResult = CCGetEvent($this->Town_Header->CCSEvents, "BeforeShow", $this->Town_Header);
                            if ($this->Town_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Town_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Town_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Count_PatientID->SetValue($items[$i]->Count_PatientID);
                            $this->Count_PatientID->Attributes->RestoreFromArray($items[$i]->_Count_PatientIDAttributes);
                            $this->Town_Footer->CCSEventResult = CCGetEvent($this->Town_Footer->CCSEvents, "BeforeShow", $this->Town_Footer);
                            if ($this->Town_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Town_Footer";
                                $this->Count_PatientID->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Town_Footer", true, "Section Detail");
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

} //End patient_pregnancy_deliver1 Class @54-FCB6E20C

class clspatient_pregnancy_deliver1DataSource extends clsDBregistry_db {  //patient_pregnancy_deliver1DataSource Class @54-89BB2E3D

//DataSource Variables @54-9FE01379
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $Town;
    public $PregnancyRecNr;
    public $FamilyName;
    public $GivenName;
    public $MobilePhone;
    public $ReportLabel1;
    public $DateDelivery;
    public $Calc_DeliveryDate;
//End DataSource Variables

//DataSourceClass_Initialize Event @54-092EE383
    function clspatient_pregnancy_deliver1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report patient_pregnancy_deliver1";
        $this->Initialize();
        $this->Town = new clsField("Town", ccsText, "");
        
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->FamilyName = new clsField("FamilyName", ccsMemo, "");
        
        $this->GivenName = new clsField("GivenName", ccsMemo, "");
        
        $this->MobilePhone = new clsField("MobilePhone", ccsText, "");
        
        $this->ReportLabel1 = new clsField("ReportLabel1", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->DateDelivery = new clsField("DateDelivery", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Calc_DeliveryDate = new clsField("Calc_DeliveryDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @54-8BBD1351
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_PregnancyRecNr" => array("PregnancyRecNr", ""), 
            "Sorter_MobilePhone" => array("MobilePhone", ""), 
            "PregRegDate" => array("PregRegDate", ""), 
            "Sorter1" => array("DataDelivery", ""), 
            "Sorter_PregnancyRecNr1" => array("FamilyName", ""), 
            "Sorter2" => array("GivenName", ""), 
            "Sorter3" => array("Calc_DeliveryDate", "")));
    }
//End SetOrder Method

//Prepare Method @54-647DECCE
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("2", "urls_FamilyName", ccsMemo, "", "", $this->Parameters["urls_FamilyName"], "", false);
        $this->wp->AddParameter("3", "urls_GivenName", ccsMemo, "", "", $this->Parameters["urls_GivenName"], "", false);
        $this->wp->AddParameter("4", "urls_Town", ccsText, "", "", $this->Parameters["urls_Town"], "", false);
        $this->wp->AddParameter("5", "urls_PregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate"], "", false);
        $this->wp->AddParameter("6", "urls_PregRegDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_PregRegDate1"], "", false);
        $this->wp->AddParameter("7", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], "", false);
        $this->wp->AddParameter("8", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], "", false);
        $this->wp->AddParameter("9", "expr145", ccsInteger, "", "", $this->Parameters["expr145"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opIn, "pregnancy.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger, true),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "patient.FamilyName", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsMemo),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opBeginsWith, "patient.GivenName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsMemo),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opBeginsWith, "patient.Town", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opGreaterThanOrEqual, "pregnancy.PregRegDate", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsDate),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opLessThanOrEqual, "pregnancy.PregRegDate", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsDate),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opGreaterThanOrEqual, "pregnancy.Calc_DeliveryDate", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsDate),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opLessThanOrEqual, "pregnancy.Calc_DeliveryDate", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsDate),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opEqual, "patient.Discharged", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]), 
             $this->wp->Criterion[7]), 
             $this->wp->Criterion[8]), 
             $this->wp->Criterion[9]);
    }
//End Prepare Method

//Open Method @54-15B8FFE8
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT FamilyName, GivenName, patient.PatientID AS patient_PatientID, Town, MobilePhone, pregnancy.PatientID AS pregnancy_PatientID,\n\n" .
        "PregRegDate, PregnancyRecNr, pregnancy.PregnancyID AS pregnancy_PregnancyID, delivery.PregnancyID AS delivery_PregnancyID,\n\n" .
        "DataDelivery, Calc_DeliveryDate \n\n" .
        "FROM (pregnancy RIGHT JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) LEFT JOIN delivery ON\n\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID {SQL_Where}\n\n" .
        "GROUP BY pregnancy.PregnancyID {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "patient.Town asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @54-6183E219
    function SetValues()
    {
        $this->Town->SetDBValue($this->f("Town"));
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->FamilyName->SetDBValue($this->f("FamilyName"));
        $this->GivenName->SetDBValue($this->f("GivenName"));
        $this->MobilePhone->SetDBValue($this->f("MobilePhone"));
        $this->ReportLabel1->SetDBValue(trim($this->f("PregRegDate")));
        $this->DateDelivery->SetDBValue(trim($this->f("DataDelivery")));
        $this->Calc_DeliveryDate->SetDBValue(trim($this->f("Calc_DeliveryDate")));
    }
//End SetValues Method

} //End patient_pregnancy_deliver1DataSource Class @54-FCB6E20C

class clsRecordpatient { //patient Class @97-61D5C9BF

//Variables @97-9E315808

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

//Class_Initialize Event @97-74D85396
    function clsRecordpatient($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record patient/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "patient";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_FamilyName = new clsControl(ccsTextBox, "s_FamilyName", "s_FamilyName", ccsMemo, "", CCGetRequestParam("s_FamilyName", $Method, NULL), $this);
            $this->s_GivenName = new clsControl(ccsTextBox, "s_GivenName", "s_GivenName", ccsMemo, "", CCGetRequestParam("s_GivenName", $Method, NULL), $this);
            $this->s_Town = new clsControl(ccsTextBox, "s_Town", "s_Town", ccsText, "", CCGetRequestParam("s_Town", $Method, NULL), $this);
            $this->s_PregRegDate = new clsControl(ccsTextBox, "s_PregRegDate", $CCSLocales->GetText("PregRegDate"), ccsDate, array("ShortDate"), CCGetRequestParam("s_PregRegDate", $Method, NULL), $this);
            $this->DatePicker_s_Calc_DeliveryDate = new clsDatePicker("DatePicker_s_Calc_DeliveryDate", "patient", "s_PregRegDate", $this);
            $this->s_PregRegDate1 = new clsControl(ccsTextBox, "s_PregRegDate1", $CCSLocales->GetText("PregRegDate"), ccsDate, array("ShortDate"), CCGetRequestParam("s_PregRegDate1", $Method, NULL), $this);
            $this->DatePicker_s_Calc_DeliveryDate1 = new clsDatePicker("DatePicker_s_Calc_DeliveryDate1", "patient", "s_PregRegDate1", $this);
            $this->s_DataDelivery = new clsControl(ccsTextBox, "s_DataDelivery", $CCSLocales->GetText("DataDelivery"), ccsDate, $DefaultDateFormat, CCGetRequestParam("s_DataDelivery", $Method, NULL), $this);
            $this->DatePicker_s_DataDelivery = new clsDatePicker("DatePicker_s_DataDelivery", "patient", "s_DataDelivery", $this);
            $this->s_DataDelivery1 = new clsControl(ccsTextBox, "s_DataDelivery1", $CCSLocales->GetText("DataDelivery"), ccsDate, $DefaultDateFormat, CCGetRequestParam("s_DataDelivery1", $Method, NULL), $this);
            $this->DatePicker_s_DataDelivery1 = new clsDatePicker("DatePicker_s_DataDelivery1", "patient", "s_DataDelivery1", $this);
        }
    }
//End Class_Initialize Event

//Validate Method @97-B38D6FA3
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_FamilyName->Validate() && $Validation);
        $Validation = ($this->s_GivenName->Validate() && $Validation);
        $Validation = ($this->s_Town->Validate() && $Validation);
        $Validation = ($this->s_PregRegDate->Validate() && $Validation);
        $Validation = ($this->s_PregRegDate1->Validate() && $Validation);
        $Validation = ($this->s_DataDelivery->Validate() && $Validation);
        $Validation = ($this->s_DataDelivery1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_FamilyName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_GivenName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Town->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PregRegDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PregRegDate1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DataDelivery->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DataDelivery1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @97-B095C8DC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_FamilyName->Errors->Count());
        $errors = ($errors || $this->s_GivenName->Errors->Count());
        $errors = ($errors || $this->s_Town->Errors->Count());
        $errors = ($errors || $this->s_PregRegDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_Calc_DeliveryDate->Errors->Count());
        $errors = ($errors || $this->s_PregRegDate1->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_Calc_DeliveryDate1->Errors->Count());
        $errors = ($errors || $this->s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @97-ED598703
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

//Operation Method @97-7EA0A3EE
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
        $Redirect = "report_localities.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_localities.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @97-13A0185A
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
            $Error = ComposeStrings($Error, $this->s_FamilyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_GivenName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Town->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PregRegDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_Calc_DeliveryDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PregRegDate1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_Calc_DeliveryDate1->Errors->ToString());
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
        $this->s_FamilyName->Show();
        $this->s_GivenName->Show();
        $this->s_Town->Show();
        $this->s_PregRegDate->Show();
        $this->DatePicker_s_Calc_DeliveryDate->Show();
        $this->s_PregRegDate1->Show();
        $this->DatePicker_s_Calc_DeliveryDate1->Show();
        $this->s_DataDelivery->Show();
        $this->DatePicker_s_DataDelivery->Show();
        $this->s_DataDelivery1->Show();
        $this->DatePicker_s_DataDelivery1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End patient Class @97-FCB6E20C

//Initialize Page @1-08F96F8D
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
$TemplateFileName = "report_localities.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-13756179
CCSecurityRedirect("3", "noaccess.php");
//End Authenticate User

//Include events file @1-359068D3
include_once("./report_localities_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-3726AA1B
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$patient_pregnancy_deliver1 = new clsReportpatient_pregnancy_deliver1("", $MainPage);
$Report_Print1 = new clsControl(ccsLink, "Report_Print1", "Report_Print1", ccsText, "", CCGetRequestParam("Report_Print1", ccsGet, NULL), $MainPage);
$Report_Print1->Page = "report_localities.php";
$patient = new clsRecordpatient("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->patient_pregnancy_deliver1 = & $patient_pregnancy_deliver1;
$MainPage->Report_Print1 = & $Report_Print1;
$MainPage->patient = & $patient;
$Report_Print1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print1->Parameters = CCAddParam($Report_Print1->Parameters, "ViewMode", "Print");
$patient_pregnancy_deliver1->Initialize();

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

//Execute Components @1-36C24B8B
$topmenu->Operations();
$patient->Operation();
//End Execute Components

//Go to destination page @1-F6C6D93A
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($patient_pregnancy_deliver1);
    unset($patient);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E83CFEBF
$topmenu->Show();
$patient_pregnancy_deliver1->Show();
$patient->Show();
$Report_Print1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-5A746D40
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($patient_pregnancy_deliver1);
unset($patient);
unset($Tpl);
//End Unload Page


?>
