<?php
//Include Common Files @1-C3991B22
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_expected_date_of_delivery_facilities.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//patient_pregnancy_deliver ReportGroup class @3-77303BFE
class clsReportGrouppatient_pregnancy_deliver {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $FacilityName, $_FacilityNameAttributes;
    public $Report_Row_Number, $_Report_Row_NumberAttributes;
    public $patient_PatientID, $_patient_PatientIDPage, $_patient_PatientIDParameters, $_patient_PatientIDAttributes;
    public $FamilyName, $_FamilyNamePage, $_FamilyNameParameters, $_FamilyNameAttributes;
    public $GivenName, $_GivenNameAttributes;
    public $Calc_DeliveryDate, $_Calc_DeliveryDateAttributes;
    public $DataDelivery, $_DataDeliveryAttributes;
    public $PregnancyRecNr, $_PregnancyRecNrAttributes;
    public $Town, $_TownAttributes;
    public $MobilePhone, $_MobilePhoneAttributes;
    public $Count_patient_PatientID, $_Count_patient_PatientIDAttributes;
    public $TotalSum_patient_PatientID, $_TotalSum_patient_PatientIDAttributes;
    public $Report_CurrentDate, $_Report_CurrentDateAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $FacilityNameTotalIndex;

    function clsReportGrouppatient_pregnancy_deliver(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->FacilityName = $this->Parent->FacilityName->Value;
        $this->patient_PatientID = $this->Parent->patient_PatientID->Value;
        $this->FamilyName = $this->Parent->FamilyName->Value;
        $this->GivenName = $this->Parent->GivenName->Value;
        $this->Calc_DeliveryDate = $this->Parent->Calc_DeliveryDate->Value;
        $this->DataDelivery = $this->Parent->DataDelivery->Value;
        $this->PregnancyRecNr = $this->Parent->PregnancyRecNr->Value;
        $this->Town = $this->Parent->Town->Value;
        $this->MobilePhone = $this->Parent->MobilePhone->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->Count_patient_PatientID = $this->Parent->Count_patient_PatientID->GetTotalValue($mode);
        $this->TotalSum_patient_PatientID = $this->Parent->TotalSum_patient_PatientID->GetTotalValue($mode);
        $this->_patient_PatientIDPage = $this->Parent->patient_PatientID->Page;
        $this->_patient_PatientIDParameters = $this->Parent->patient_PatientID->Parameters;
        $this->_FamilyNamePage = $this->Parent->FamilyName->Page;
        $this->_FamilyNameParameters = $this->Parent->FamilyName->Parameters;
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_Sorter_patient_PatientIDAttributes = $this->Parent->Sorter_patient_PatientID->Attributes->GetAsArray();
        $this->_Sorter_Calc_DeliveryDateAttributes = $this->Parent->Sorter_Calc_DeliveryDate->Attributes->GetAsArray();
        $this->_Sorter_DataDeliveryAttributes = $this->Parent->Sorter_DataDelivery->Attributes->GetAsArray();
        $this->_Sorter_PregnancyRecNrAttributes = $this->Parent->Sorter_PregnancyRecNr->Attributes->GetAsArray();
        $this->_Sorter_PregnancyRecNr1Attributes = $this->Parent->Sorter_PregnancyRecNr1->Attributes->GetAsArray();
        $this->_Sorter1Attributes = $this->Parent->Sorter1->Attributes->GetAsArray();
        $this->_SorterTownAttributes = $this->Parent->SorterTown->Attributes->GetAsArray();
        $this->_SorterMobilePhoneAttributes = $this->Parent->SorterMobilePhone->Attributes->GetAsArray();
        $this->_FacilityNameAttributes = $this->Parent->FacilityName->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_patient_PatientIDAttributes = $this->Parent->patient_PatientID->Attributes->GetAsArray();
        $this->_FamilyNameAttributes = $this->Parent->FamilyName->Attributes->GetAsArray();
        $this->_GivenNameAttributes = $this->Parent->GivenName->Attributes->GetAsArray();
        $this->_Calc_DeliveryDateAttributes = $this->Parent->Calc_DeliveryDate->Attributes->GetAsArray();
        $this->_DataDeliveryAttributes = $this->Parent->DataDelivery->Attributes->GetAsArray();
        $this->_PregnancyRecNrAttributes = $this->Parent->PregnancyRecNr->Attributes->GetAsArray();
        $this->_TownAttributes = $this->Parent->Town->Attributes->GetAsArray();
        $this->_MobilePhoneAttributes = $this->Parent->MobilePhone->Attributes->GetAsArray();
        $this->_Count_patient_PatientIDAttributes = $this->Parent->Count_patient_PatientID->Attributes->GetAsArray();
        $this->_TotalSum_patient_PatientIDAttributes = $this->Parent->TotalSum_patient_PatientID->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $Header->Count_patient_PatientID = $this->Count_patient_PatientID;
        $Header->_Count_patient_PatientIDAttributes = $this->_Count_patient_PatientIDAttributes;
        $Header->TotalSum_patient_PatientID = $this->TotalSum_patient_PatientID;
        $Header->_TotalSum_patient_PatientIDAttributes = $this->_TotalSum_patient_PatientIDAttributes;
        $this->FacilityName = $Header->FacilityName;
        $Header->_FacilityNameAttributes = $this->_FacilityNameAttributes;
        $this->Parent->FacilityName->Value = $Header->FacilityName;
        $this->Parent->FacilityName->Attributes->RestoreFromArray($Header->_FacilityNameAttributes);
        $this->patient_PatientID = $Header->patient_PatientID;
        $this->_patient_PatientIDPage = $Header->_patient_PatientIDPage;
        $this->_patient_PatientIDParameters = $Header->_patient_PatientIDParameters;
        $Header->_patient_PatientIDAttributes = $this->_patient_PatientIDAttributes;
        $this->Parent->patient_PatientID->Value = $Header->patient_PatientID;
        $this->Parent->patient_PatientID->Attributes->RestoreFromArray($Header->_patient_PatientIDAttributes);
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
        $this->Calc_DeliveryDate = $Header->Calc_DeliveryDate;
        $Header->_Calc_DeliveryDateAttributes = $this->_Calc_DeliveryDateAttributes;
        $this->Parent->Calc_DeliveryDate->Value = $Header->Calc_DeliveryDate;
        $this->Parent->Calc_DeliveryDate->Attributes->RestoreFromArray($Header->_Calc_DeliveryDateAttributes);
        $this->DataDelivery = $Header->DataDelivery;
        $Header->_DataDeliveryAttributes = $this->_DataDeliveryAttributes;
        $this->Parent->DataDelivery->Value = $Header->DataDelivery;
        $this->Parent->DataDelivery->Attributes->RestoreFromArray($Header->_DataDeliveryAttributes);
        $this->PregnancyRecNr = $Header->PregnancyRecNr;
        $Header->_PregnancyRecNrAttributes = $this->_PregnancyRecNrAttributes;
        $this->Parent->PregnancyRecNr->Value = $Header->PregnancyRecNr;
        $this->Parent->PregnancyRecNr->Attributes->RestoreFromArray($Header->_PregnancyRecNrAttributes);
        $this->Town = $Header->Town;
        $Header->_TownAttributes = $this->_TownAttributes;
        $this->Parent->Town->Value = $Header->Town;
        $this->Parent->Town->Attributes->RestoreFromArray($Header->_TownAttributes);
        $this->MobilePhone = $Header->MobilePhone;
        $Header->_MobilePhoneAttributes = $this->_MobilePhoneAttributes;
        $this->Parent->MobilePhone->Value = $Header->MobilePhone;
        $this->Parent->MobilePhone->Attributes->RestoreFromArray($Header->_MobilePhoneAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
        $this->Count_patient_PatientID = $this->Parent->Count_patient_PatientID->GetValue();
        $this->TotalSum_patient_PatientID = $this->Parent->TotalSum_patient_PatientID->GetValue();
    }
}
//End patient_pregnancy_deliver ReportGroup class

//patient_pregnancy_deliver GroupsCollection class @3-9BA42C0A
class clsGroupsCollectionpatient_pregnancy_deliver {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mFacilityNameCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionpatient_pregnancy_deliver(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mFacilityNameCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGrouppatient_pregnancy_deliver($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->FacilityNameTotalIndex = $this->mFacilityNameCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->FacilityName->Value = $this->Parent->FacilityName->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->patient_PatientID->Value = $this->Parent->patient_PatientID->initialValue;
        $this->Parent->FamilyName->Value = $this->Parent->FamilyName->initialValue;
        $this->Parent->GivenName->Value = $this->Parent->GivenName->initialValue;
        $this->Parent->Calc_DeliveryDate->Value = $this->Parent->Calc_DeliveryDate->initialValue;
        $this->Parent->DataDelivery->Value = $this->Parent->DataDelivery->initialValue;
        $this->Parent->PregnancyRecNr->Value = $this->Parent->PregnancyRecNr->initialValue;
        $this->Parent->Town->Value = $this->Parent->Town->initialValue;
        $this->Parent->MobilePhone->Value = $this->Parent->MobilePhone->initialValue;
        $this->Parent->Count_patient_PatientID->Value = $this->Parent->Count_patient_PatientID->initialValue;
        $this->Parent->TotalSum_patient_PatientID->Value = $this->Parent->TotalSum_patient_PatientID->initialValue;
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
            $GroupFacilityName->GroupType = "FacilityName";
            $this->mFacilityNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupFacilityName;
            $this->Parent->Count_patient_PatientID->Reset();
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
        $this->Parent->Count_patient_PatientID->Reset();
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
//End patient_pregnancy_deliver GroupsCollection class

class clsReportpatient_pregnancy_deliver { //patient_pregnancy_deliver Class @3-1ED0D810

//patient_pregnancy_deliver Variables @3-138403D9

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
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $FacilityName_HeaderControls, $FacilityName_FooterControls;
    public $Sorter_patient_PatientID;
    public $Sorter_Calc_DeliveryDate;
    public $Sorter_DataDelivery;
    public $Sorter_PregnancyRecNr;
    public $Sorter_PregnancyRecNr1;
    public $Sorter1;
    public $SorterTown;
    public $SorterMobilePhone;
//End patient_pregnancy_deliver Variables

//Class_Initialize Event @3-D2A66722
    function clsReportpatient_pregnancy_deliver($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "patient_pregnancy_deliver";
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
        $this->Errors = new clsErrors();
        $this->DataSource = new clspatient_pregnancy_deliverDataSource($this);
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
        $this->SorterName = CCGetParam("patient_pregnancy_deliverOrder", "");
        $this->SorterDirection = CCGetParam("patient_pregnancy_deliverDir", "");

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->Sorter_patient_PatientID = new clsSorter($this->ComponentName, "Sorter_patient_PatientID", $FileName, $this);
        $this->Sorter_Calc_DeliveryDate = new clsSorter($this->ComponentName, "Sorter_Calc_DeliveryDate", $FileName, $this);
        $this->Sorter_DataDelivery = new clsSorter($this->ComponentName, "Sorter_DataDelivery", $FileName, $this);
        $this->Sorter_PregnancyRecNr = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr", $FileName, $this);
        $this->Sorter_PregnancyRecNr1 = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr1", $FileName, $this);
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->SorterTown = new clsSorter($this->ComponentName, "SorterTown", $FileName, $this);
        $this->SorterMobilePhone = new clsSorter($this->ComponentName, "SorterMobilePhone", $FileName, $this);
        $this->FacilityName = new clsControl(ccsReportLabel, "FacilityName", "FacilityName", ccsText, "", "", $this);
        $this->Report_Row_Number = new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->patient_PatientID = new clsControl(ccsLink, "patient_PatientID", "patient_PatientID", ccsInteger, "", CCGetRequestParam("patient_PatientID", ccsGet, NULL), $this);
        $this->patient_PatientID->Page = "patient_maint_fac.php";
        $this->FamilyName = new clsControl(ccsLink, "FamilyName", "FamilyName", ccsMemo, "", CCGetRequestParam("FamilyName", ccsGet, NULL), $this);
        $this->FamilyName->Page = "patient_maint_fac.php";
        $this->GivenName = new clsControl(ccsReportLabel, "GivenName", "GivenName", ccsMemo, "", "", $this);
        $this->Calc_DeliveryDate = new clsControl(ccsReportLabel, "Calc_DeliveryDate", "Calc_DeliveryDate", ccsDate, array("ShortDate"), "", $this);
        $this->DataDelivery = new clsControl(ccsReportLabel, "DataDelivery", "DataDelivery", ccsDate, array("ShortDate"), "", $this);
        $this->PregnancyRecNr = new clsControl(ccsLabel, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", CCGetRequestParam("PregnancyRecNr", ccsGet, NULL), $this);
        $this->Town = new clsControl(ccsReportLabel, "Town", "Town", ccsText, "", "", $this);
        $this->MobilePhone = new clsControl(ccsReportLabel, "MobilePhone", "MobilePhone", ccsText, "", "", $this);
        $this->Count_patient_PatientID = new clsControl(ccsReportLabel, "Count_patient_PatientID", "Count_patient_PatientID", ccsInteger, "", 0, $this);
        $this->Count_patient_PatientID->TotalFunction = "Count";
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalSum_patient_PatientID = new clsControl(ccsReportLabel, "TotalSum_patient_PatientID", "TotalSum_patient_PatientID", ccsInteger, "", 0, $this);
        $this->TotalSum_patient_PatientID->TotalFunction = "Count";
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

//CheckErrors Method @3-F6AB2FAC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->FacilityName->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->patient_PatientID->Errors->Count());
        $errors = ($errors || $this->FamilyName->Errors->Count());
        $errors = ($errors || $this->GivenName->Errors->Count());
        $errors = ($errors || $this->Calc_DeliveryDate->Errors->Count());
        $errors = ($errors || $this->DataDelivery->Errors->Count());
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->Town->Errors->Count());
        $errors = ($errors || $this->MobilePhone->Errors->Count());
        $errors = ($errors || $this->Count_patient_PatientID->Errors->Count());
        $errors = ($errors || $this->TotalSum_patient_PatientID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @3-F8F4EFE0
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->patient_PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FamilyName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GivenName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Calc_DeliveryDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataDelivery->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Town->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MobilePhone->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_patient_PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalSum_patient_PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @3-0F3F689B
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["urls_DataDelivery"] = CCGetFromGet("s_DataDelivery", NULL);
        $this->DataSource->Parameters["urls_DataDelivery1"] = CCGetFromGet("s_DataDelivery1", NULL);
        $this->DataSource->Parameters["urls_PregnancyRecNr"] = CCGetFromGet("s_PregnancyRecNr", NULL);
        $this->DataSource->Parameters["urls_FamilyName"] = CCGetFromGet("s_FamilyName", NULL);
        $this->DataSource->Parameters["urls_GivenName"] = CCGetFromGet("s_GivenName", NULL);
        $this->DataSource->Parameters["urls_Calc_DeliveryDate"] = CCGetFromGet("s_Calc_DeliveryDate", NULL);
        $this->DataSource->Parameters["urls_Calc_DeliveryDate1"] = CCGetFromGet("s_Calc_DeliveryDate1", NULL);
        $this->DataSource->Parameters["expr172"] = 0;
        $this->DataSource->Parameters["urls_patient_PatientID"] = CCGetFromGet("s_patient_PatientID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $FacilityNameKey = "";
        $Groups = new clsGroupsCollectionpatient_pregnancy_deliver($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
            $this->patient_PatientID->SetValue($this->DataSource->patient_PatientID->GetValue());
            $this->FamilyName->SetValue($this->DataSource->FamilyName->GetValue());
            $this->GivenName->SetValue($this->DataSource->GivenName->GetValue());
            $this->Calc_DeliveryDate->SetValue($this->DataSource->Calc_DeliveryDate->GetValue());
            $this->DataDelivery->SetValue($this->DataSource->DataDelivery->GetValue());
            $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
            $this->Town->SetValue($this->DataSource->Town->GetValue());
            $this->MobilePhone->SetValue($this->DataSource->MobilePhone->GetValue());
            $this->Count_patient_PatientID->SetValue($this->DataSource->Count_patient_PatientID->GetValue());
            $this->TotalSum_patient_PatientID->SetValue($this->DataSource->TotalSum_patient_PatientID->GetValue());
            $this->patient_PatientID->Parameters = "";
            $this->patient_PatientID->Parameters = CCAddParam($this->patient_PatientID->Parameters, "PatientID", $this->DataSource->f("PatientID"));
            $this->FamilyName->Parameters = "";
            $this->FamilyName->Parameters = CCAddParam($this->FamilyName->Parameters, "PatientID", $this->DataSource->f("PatientID"));
            $this->Report_TotalRecords->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->OpenGroup("FacilityName");
            }
            $Groups->AddItem();
            $FacilityNameKey = $this->DataSource->f("FacilityName");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->CloseGroup("FacilityName");
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
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["patient_PatientID"] = $this->patient_PatientID->Visible;
            $this->ControlsVisible["FamilyName"] = $this->FamilyName->Visible;
            $this->ControlsVisible["GivenName"] = $this->GivenName->Visible;
            $this->ControlsVisible["Calc_DeliveryDate"] = $this->Calc_DeliveryDate->Visible;
            $this->ControlsVisible["DataDelivery"] = $this->DataDelivery->Visible;
            $this->ControlsVisible["PregnancyRecNr"] = $this->PregnancyRecNr->Visible;
            $this->ControlsVisible["Town"] = $this->Town->Visible;
            $this->ControlsVisible["MobilePhone"] = $this->MobilePhone->Visible;
            $this->ControlsVisible["Count_patient_PatientID"] = $this->Count_patient_PatientID->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Report_Row_Number->SetValue($items[$i]->Report_Row_Number);
                        $this->Report_Row_Number->Attributes->RestoreFromArray($items[$i]->_Report_Row_NumberAttributes);
                        $this->patient_PatientID->SetValue($items[$i]->patient_PatientID);
                        $this->patient_PatientID->Page = $items[$i]->_patient_PatientIDPage;
                        $this->patient_PatientID->Parameters = $items[$i]->_patient_PatientIDParameters;
                        $this->patient_PatientID->Attributes->RestoreFromArray($items[$i]->_patient_PatientIDAttributes);
                        $this->FamilyName->SetValue($items[$i]->FamilyName);
                        $this->FamilyName->Page = $items[$i]->_FamilyNamePage;
                        $this->FamilyName->Parameters = $items[$i]->_FamilyNameParameters;
                        $this->FamilyName->Attributes->RestoreFromArray($items[$i]->_FamilyNameAttributes);
                        $this->GivenName->SetValue($items[$i]->GivenName);
                        $this->GivenName->Attributes->RestoreFromArray($items[$i]->_GivenNameAttributes);
                        $this->Calc_DeliveryDate->SetValue($items[$i]->Calc_DeliveryDate);
                        $this->Calc_DeliveryDate->Attributes->RestoreFromArray($items[$i]->_Calc_DeliveryDateAttributes);
                        $this->DataDelivery->SetValue($items[$i]->DataDelivery);
                        $this->DataDelivery->Attributes->RestoreFromArray($items[$i]->_DataDeliveryAttributes);
                        $this->PregnancyRecNr->SetValue($items[$i]->PregnancyRecNr);
                        $this->PregnancyRecNr->Attributes->RestoreFromArray($items[$i]->_PregnancyRecNrAttributes);
                        $this->Town->SetValue($items[$i]->Town);
                        $this->Town->Attributes->RestoreFromArray($items[$i]->_TownAttributes);
                        $this->MobilePhone->SetValue($items[$i]->MobilePhone);
                        $this->MobilePhone->Attributes->RestoreFromArray($items[$i]->_MobilePhoneAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->patient_PatientID->Show();
                        $this->FamilyName->Show();
                        $this->GivenName->Show();
                        $this->Calc_DeliveryDate->Show();
                        $this->DataDelivery->Show();
                        $this->PregnancyRecNr->Show();
                        $this->Town->Show();
                        $this->MobilePhone->Show();
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
                            $this->TotalSum_patient_PatientID->SetValue($items[$i]->TotalSum_patient_PatientID);
                            $this->TotalSum_patient_PatientID->Attributes->RestoreFromArray($items[$i]->_TotalSum_patient_PatientIDAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalSum_patient_PatientID->Show();
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
                                $this->Sorter_patient_PatientID->Show();
                                $this->Sorter_Calc_DeliveryDate->Show();
                                $this->Sorter_DataDelivery->Show();
                                $this->Sorter_PregnancyRecNr->Show();
                                $this->Sorter_PregnancyRecNr1->Show();
                                $this->Sorter1->Show();
                                $this->SorterTown->Show();
                                $this->SorterMobilePhone->Show();
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
                            $this->Count_patient_PatientID->SetValue($items[$i]->Count_patient_PatientID);
                            $this->Count_patient_PatientID->Attributes->RestoreFromArray($items[$i]->_Count_patient_PatientIDAttributes);
                            $this->FacilityName_Footer->CCSEventResult = CCGetEvent($this->FacilityName_Footer->CCSEvents, "BeforeShow", $this->FacilityName_Footer);
                            if ($this->FacilityName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Footer";
                                $this->Count_patient_PatientID->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FacilityName_Footer", true, "Section Detail");
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

} //End patient_pregnancy_deliver Class @3-FCB6E20C

class clspatient_pregnancy_deliverDataSource extends clsDBregistry_db {  //patient_pregnancy_deliverDataSource Class @3-CE2E0617

//DataSource Variables @3-9A8DFA2F
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $FacilityName;
    public $patient_PatientID;
    public $FamilyName;
    public $GivenName;
    public $Calc_DeliveryDate;
    public $DataDelivery;
    public $PregnancyRecNr;
    public $Town;
    public $MobilePhone;
    public $Count_patient_PatientID;
    public $TotalSum_patient_PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-A782394D
    function clspatient_pregnancy_deliverDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report patient_pregnancy_deliver";
        $this->Initialize();
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->patient_PatientID = new clsField("patient_PatientID", ccsInteger, "");
        
        $this->FamilyName = new clsField("FamilyName", ccsMemo, "");
        
        $this->GivenName = new clsField("GivenName", ccsMemo, "");
        
        $this->Calc_DeliveryDate = new clsField("Calc_DeliveryDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->DataDelivery = new clsField("DataDelivery", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->Town = new clsField("Town", ccsText, "");
        
        $this->MobilePhone = new clsField("MobilePhone", ccsText, "");
        
        $this->Count_patient_PatientID = new clsField("Count_patient_PatientID", ccsInteger, "");
        
        $this->TotalSum_patient_PatientID = new clsField("TotalSum_patient_PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-A21FED0F
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_patient_PatientID" => array("patient.PatientID", ""), 
            "Sorter_Calc_DeliveryDate" => array("Calc_DeliveryDate", ""), 
            "Sorter_DataDelivery" => array("DataDelivery", ""), 
            "Sorter_PregnancyRecNr" => array("PregnancyRecNr", ""), 
            "Sorter_PregnancyRecNr1" => array("FamilyName", ""), 
            "Sorter1" => array("GivenName", ""), 
            "SorterTown" => array("Town", ""), 
            "SorterMobilePhone" => array("MobilePhone", "")));
    }
//End SetOrder Method

//Prepare Method @3-5526E49F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("2", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("3", "urls_DataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery"], "", false);
        $this->wp->AddParameter("4", "urls_DataDelivery1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DataDelivery1"], "", false);
        $this->wp->AddParameter("5", "urls_PregnancyRecNr", ccsText, "", "", $this->Parameters["urls_PregnancyRecNr"], "", false);
        $this->wp->AddParameter("6", "urls_FamilyName", ccsMemo, "", "", $this->Parameters["urls_FamilyName"], "", false);
        $this->wp->AddParameter("7", "urls_GivenName", ccsMemo, "", "", $this->Parameters["urls_GivenName"], "", false);
        $this->wp->AddParameter("8", "urls_Calc_DeliveryDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_Calc_DeliveryDate"], "", false);
        $this->wp->AddParameter("9", "urls_Calc_DeliveryDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_Calc_DeliveryDate1"], "", false);
        $this->wp->AddParameter("10", "expr172", ccsInteger, "", "", $this->Parameters["expr172"], "", false);
        $this->wp->AddParameter("11", "urls_patient_PatientID", ccsInteger, "", "", $this->Parameters["urls_patient_PatientID"], "", false);
        $this->wp->AddParameter("12", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opIn, "referral.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger, true),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opIn, "pregnancy.FacilityID", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger, true),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opGreaterThanOrEqual, "DataDelivery", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opLessThanOrEqual, "delivery.DataDelivery", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsDate),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "pregnancy.PregnancyRecNr", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "patient.FamilyName", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsMemo),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opContains, "patient.GivenName", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsMemo),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opGreaterThanOrEqual, "pregnancy.Calc_DeliveryDate", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsDate),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opLessThanOrEqual, "pregnancy.Calc_DeliveryDate", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsDate),false);
        $this->wp->Criterion[10] = $this->wp->Operation(opEqual, "patient.Discharged", $this->wp->GetDBValue("10"), $this->ToSQL($this->wp->GetDBValue("10"), ccsInteger),false);
        $this->wp->Criterion[11] = $this->wp->Operation(opEqual, "patient.PatientID", $this->wp->GetDBValue("11"), $this->ToSQL($this->wp->GetDBValue("11"), ccsInteger),false);
        $this->wp->Criterion[12] = $this->wp->Operation(opIn, "facilities.FacilityID", $this->wp->GetDBValue("12"), $this->ToSQL($this->wp->GetDBValue("12"), ccsInteger, true),false);
        $this->wp->Criterion[13] = "( pregnancy.Calc_DeliveryDate>(CURRENT_DATE)-100 )";
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opOR(
             true, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]), 
             $this->wp->Criterion[7]), 
             $this->wp->Criterion[8]), 
             $this->wp->Criterion[9]), 
             $this->wp->Criterion[10]), 
             $this->wp->Criterion[11]), 
             $this->wp->Criterion[12]), 
             $this->wp->Criterion[13]);
    }
//End Prepare Method

//Open Method @3-6AD107E2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT Calc_DeliveryDate, DataDelivery, PregnancyRecNr, facilities.*, patient.*, pregnancy.FacilityID AS pregnancy_FacilityID, visit.VisitID AS visit_VisitID,\n\n" .
        "referral.*, pregnancy.PregnancyID AS pregnancy_PregnancyID \n\n" .
        "FROM ((((pregnancy LEFT JOIN delivery ON\n\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN facilities ON\n\n" .
        "pregnancy.FacilityID = facilities.FacilityID) LEFT JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) LEFT JOIN visit ON\n\n" .
        "visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN referral ON\n\n" .
        "referral.VisitID = visit.VisitID {SQL_Where}\n\n" .
        "GROUP BY pregnancy.PregnancyID {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "facilities.FacilityName asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-3382EEF0
    function SetValues()
    {
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->patient_PatientID->SetDBValue(trim($this->f("PatientID")));
        $this->FamilyName->SetDBValue($this->f("FamilyName"));
        $this->GivenName->SetDBValue($this->f("GivenName"));
        $this->Calc_DeliveryDate->SetDBValue(trim($this->f("Calc_DeliveryDate")));
        $this->DataDelivery->SetDBValue(trim($this->f("DataDelivery")));
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->Town->SetDBValue($this->f("Town"));
        $this->MobilePhone->SetDBValue($this->f("MobilePhone"));
        $this->Count_patient_PatientID->SetDBValue(trim($this->f("PatientID")));
        $this->TotalSum_patient_PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End patient_pregnancy_deliverDataSource Class @3-FCB6E20C

class clsRecorddelivery_facilities_patie { //delivery_facilities_patie Class @37-175D6E62

//Variables @37-9E315808

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

//Class_Initialize Event @37-4B2115CB
    function clsRecorddelivery_facilities_patie($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record delivery_facilities_patie/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "delivery_facilities_patie";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_Calc_DeliveryDate = new clsControl(ccsTextBox, "s_Calc_DeliveryDate", $CCSLocales->GetText("Calc_DeliveryDate"), ccsDate, array("ShortDate"), CCGetRequestParam("s_Calc_DeliveryDate", $Method, NULL), $this);
            $this->DatePicker_s_Calc_DeliveryDate = new clsDatePicker("DatePicker_s_Calc_DeliveryDate", "delivery_facilities_patie", "s_Calc_DeliveryDate", $this);
            $this->s_DataDelivery = new clsControl(ccsTextBox, "s_DataDelivery", $CCSLocales->GetText("DataDelivery"), ccsDate, $DefaultDateFormat, CCGetRequestParam("s_DataDelivery", $Method, NULL), $this);
            $this->DatePicker_s_DataDelivery = new clsDatePicker("DatePicker_s_DataDelivery", "delivery_facilities_patie", "s_DataDelivery", $this);
            $this->s_patient_PatientID = new clsControl(ccsTextBox, "s_patient_PatientID", $CCSLocales->GetText("PatientID"), ccsInteger, "", CCGetRequestParam("s_patient_PatientID", $Method, NULL), $this);
            $this->s_FamilyName = new clsControl(ccsTextBox, "s_FamilyName", $CCSLocales->GetText("LastNamePatient1"), ccsMemo, "", CCGetRequestParam("s_FamilyName", $Method, NULL), $this);
            $this->s_GivenName = new clsControl(ccsTextBox, "s_GivenName", $CCSLocales->GetText("FirstNamePatient1"), ccsMemo, "", CCGetRequestParam("s_GivenName", $Method, NULL), $this);
            $this->s_Calc_DeliveryDate1 = new clsControl(ccsTextBox, "s_Calc_DeliveryDate1", $CCSLocales->GetText("Calc_DeliveryDate"), ccsDate, array("ShortDate"), CCGetRequestParam("s_Calc_DeliveryDate1", $Method, NULL), $this);
            $this->DatePicker_s_Calc_DeliveryDate1 = new clsDatePicker("DatePicker_s_Calc_DeliveryDate1", "delivery_facilities_patie", "s_Calc_DeliveryDate1", $this);
            $this->s_DataDelivery1 = new clsControl(ccsTextBox, "s_DataDelivery1", $CCSLocales->GetText("DataDelivery"), ccsDate, $DefaultDateFormat, CCGetRequestParam("s_DataDelivery1", $Method, NULL), $this);
            $this->DatePicker_s_DataDelivery1 = new clsDatePicker("DatePicker_s_DataDelivery1", "delivery_facilities_patie", "s_DataDelivery1", $this);
            $this->s_PregnancyRecNr = new clsControl(ccsTextBox, "s_PregnancyRecNr", $CCSLocales->GetText("PregnancyRecNr"), ccsText, "", CCGetRequestParam("s_PregnancyRecNr", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @37-DBE87CF4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_Calc_DeliveryDate->Validate() && $Validation);
        $Validation = ($this->s_DataDelivery->Validate() && $Validation);
        $Validation = ($this->s_patient_PatientID->Validate() && $Validation);
        $Validation = ($this->s_FamilyName->Validate() && $Validation);
        $Validation = ($this->s_GivenName->Validate() && $Validation);
        $Validation = ($this->s_Calc_DeliveryDate1->Validate() && $Validation);
        $Validation = ($this->s_DataDelivery1->Validate() && $Validation);
        $Validation = ($this->s_PregnancyRecNr->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_Calc_DeliveryDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DataDelivery->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_patient_PatientID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FamilyName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_GivenName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Calc_DeliveryDate1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DataDelivery1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PregnancyRecNr->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @37-5669AAAC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_Calc_DeliveryDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_Calc_DeliveryDate->Errors->Count());
        $errors = ($errors || $this->s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery->Errors->Count());
        $errors = ($errors || $this->s_patient_PatientID->Errors->Count());
        $errors = ($errors || $this->s_FamilyName->Errors->Count());
        $errors = ($errors || $this->s_GivenName->Errors->Count());
        $errors = ($errors || $this->s_Calc_DeliveryDate1->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_Calc_DeliveryDate1->Errors->Count());
        $errors = ($errors || $this->s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->s_PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @37-ED598703
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

//Operation Method @37-666F92F3
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
        $Redirect = "report_expected_date_of_delivery_facilities.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_expected_date_of_delivery_facilities.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @37-EF58A358
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
            $Error = ComposeStrings($Error, $this->s_Calc_DeliveryDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_Calc_DeliveryDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DataDelivery->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_DataDelivery->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_patient_PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FamilyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_GivenName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Calc_DeliveryDate1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_Calc_DeliveryDate1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DataDelivery1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_DataDelivery1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PregnancyRecNr->Errors->ToString());
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
        $this->s_Calc_DeliveryDate->Show();
        $this->DatePicker_s_Calc_DeliveryDate->Show();
        $this->s_DataDelivery->Show();
        $this->DatePicker_s_DataDelivery->Show();
        $this->s_patient_PatientID->Show();
        $this->s_FamilyName->Show();
        $this->s_GivenName->Show();
        $this->s_Calc_DeliveryDate1->Show();
        $this->DatePicker_s_Calc_DeliveryDate1->Show();
        $this->s_DataDelivery1->Show();
        $this->DatePicker_s_DataDelivery1->Show();
        $this->s_PregnancyRecNr->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End delivery_facilities_patie Class @37-FCB6E20C

//Initialize Page @1-962F0C22
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
$TemplateFileName = "report_expected_date_of_delivery_facilities.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-13756179
CCSecurityRedirect("3", "noaccess.php");
//End Authenticate User

//Include events file @1-D639522A
include_once("./report_expected_date_of_delivery_facilities_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-D50530B3
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$patient_pregnancy_deliver = new clsReportpatient_pregnancy_deliver("", $MainPage);
$delivery_facilities_patie = new clsRecorddelivery_facilities_patie("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_expected_date_of_delivery_facilities.php";
$Report_Print->Visible = false;
$MainPage->topmenu = & $topmenu;
$MainPage->patient_pregnancy_deliver = & $patient_pregnancy_deliver;
$MainPage->delivery_facilities_patie = & $delivery_facilities_patie;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$patient_pregnancy_deliver->Initialize();

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

//Execute Components @1-82100739
$topmenu->Operations();
$delivery_facilities_patie->Operation();
//End Execute Components

//Go to destination page @1-76112BCB
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($patient_pregnancy_deliver);
    unset($delivery_facilities_patie);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B961EC5C
$topmenu->Show();
$patient_pregnancy_deliver->Show();
$delivery_facilities_patie->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C2210FFD
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($patient_pregnancy_deliver);
unset($delivery_facilities_patie);
unset($Tpl);
//End Unload Page


?>
