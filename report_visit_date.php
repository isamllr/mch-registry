<?php
//Include Common Files @1-D4DCC506
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_visit_date.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//visit_referral_pregnancy ReportGroup class @3-05CE4422
class clsReportGroupvisit_referral_pregnancy {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $LastName, $_LastNameAttributes;
    public $FirstName, $_FirstNameAttributes;
    public $Report_Row_Number, $_Report_Row_NumberAttributes;
    public $GivenName, $_GivenNameAttributes;
    public $NextVisit, $_NextVisitAttributes;
    public $Town, $_TownAttributes;
    public $MobilePhone, $_MobilePhoneAttributes;
    public $PatientID, $_PatientIDPage, $_PatientIDParameters, $_PatientIDAttributes;
    public $FamilyName, $_FamilyNamePage, $_FamilyNameParameters, $_FamilyNameAttributes;
    public $PregnancyRecNr, $_PregnancyRecNrAttributes;
    public $Report_CurrentDate, $_Report_CurrentDateAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $EmployeeIDTotalIndex;

    function clsReportGroupvisit_referral_pregnancy(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->LastName = $this->Parent->LastName->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->GivenName = $this->Parent->GivenName->Value;
        $this->NextVisit = $this->Parent->NextVisit->Value;
        $this->Town = $this->Parent->Town->Value;
        $this->MobilePhone = $this->Parent->MobilePhone->Value;
        $this->PatientID = $this->Parent->PatientID->Value;
        $this->FamilyName = $this->Parent->FamilyName->Value;
        $this->PregnancyRecNr = $this->Parent->PregnancyRecNr->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->_PatientIDPage = $this->Parent->PatientID->Page;
        $this->_PatientIDParameters = $this->Parent->PatientID->Parameters;
        $this->_FamilyNamePage = $this->Parent->FamilyName->Page;
        $this->_FamilyNameParameters = $this->Parent->FamilyName->Parameters;
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_Sorter_NextVisitAttributes = $this->Parent->Sorter_NextVisit->Attributes->GetAsArray();
        $this->_Sorter_TownAttributes = $this->Parent->Sorter_Town->Attributes->GetAsArray();
        $this->_Sorter_MobilePhoneAttributes = $this->Parent->Sorter_MobilePhone->Attributes->GetAsArray();
        $this->_PatientID1Attributes = $this->Parent->PatientID1->Attributes->GetAsArray();
        $this->_Sorter_PregnancyRecNrAttributes = $this->Parent->Sorter_PregnancyRecNr->Attributes->GetAsArray();
        $this->_Sorter1Attributes = $this->Parent->Sorter1->Attributes->GetAsArray();
        $this->_Sorter2Attributes = $this->Parent->Sorter2->Attributes->GetAsArray();
        $this->_LastNameAttributes = $this->Parent->LastName->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_GivenNameAttributes = $this->Parent->GivenName->Attributes->GetAsArray();
        $this->_NextVisitAttributes = $this->Parent->NextVisit->Attributes->GetAsArray();
        $this->_TownAttributes = $this->Parent->Town->Attributes->GetAsArray();
        $this->_MobilePhoneAttributes = $this->Parent->MobilePhone->Attributes->GetAsArray();
        $this->_PatientIDAttributes = $this->Parent->PatientID->Attributes->GetAsArray();
        $this->_FamilyNameAttributes = $this->Parent->FamilyName->Attributes->GetAsArray();
        $this->_PregnancyRecNrAttributes = $this->Parent->PregnancyRecNr->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $this->LastName = $Header->LastName;
        $Header->_LastNameAttributes = $this->_LastNameAttributes;
        $this->Parent->LastName->Value = $Header->LastName;
        $this->Parent->LastName->Attributes->RestoreFromArray($Header->_LastNameAttributes);
        $this->FirstName = $Header->FirstName;
        $Header->_FirstNameAttributes = $this->_FirstNameAttributes;
        $this->Parent->FirstName->Value = $Header->FirstName;
        $this->Parent->FirstName->Attributes->RestoreFromArray($Header->_FirstNameAttributes);
        $this->GivenName = $Header->GivenName;
        $Header->_GivenNameAttributes = $this->_GivenNameAttributes;
        $this->Parent->GivenName->Value = $Header->GivenName;
        $this->Parent->GivenName->Attributes->RestoreFromArray($Header->_GivenNameAttributes);
        $this->NextVisit = $Header->NextVisit;
        $Header->_NextVisitAttributes = $this->_NextVisitAttributes;
        $this->Parent->NextVisit->Value = $Header->NextVisit;
        $this->Parent->NextVisit->Attributes->RestoreFromArray($Header->_NextVisitAttributes);
        $this->Town = $Header->Town;
        $Header->_TownAttributes = $this->_TownAttributes;
        $this->Parent->Town->Value = $Header->Town;
        $this->Parent->Town->Attributes->RestoreFromArray($Header->_TownAttributes);
        $this->MobilePhone = $Header->MobilePhone;
        $Header->_MobilePhoneAttributes = $this->_MobilePhoneAttributes;
        $this->Parent->MobilePhone->Value = $Header->MobilePhone;
        $this->Parent->MobilePhone->Attributes->RestoreFromArray($Header->_MobilePhoneAttributes);
        $this->PatientID = $Header->PatientID;
        $this->_PatientIDPage = $Header->_PatientIDPage;
        $this->_PatientIDParameters = $Header->_PatientIDParameters;
        $Header->_PatientIDAttributes = $this->_PatientIDAttributes;
        $this->Parent->PatientID->Value = $Header->PatientID;
        $this->Parent->PatientID->Attributes->RestoreFromArray($Header->_PatientIDAttributes);
        $this->FamilyName = $Header->FamilyName;
        $this->_FamilyNamePage = $Header->_FamilyNamePage;
        $this->_FamilyNameParameters = $Header->_FamilyNameParameters;
        $Header->_FamilyNameAttributes = $this->_FamilyNameAttributes;
        $this->Parent->FamilyName->Value = $Header->FamilyName;
        $this->Parent->FamilyName->Attributes->RestoreFromArray($Header->_FamilyNameAttributes);
        $this->PregnancyRecNr = $Header->PregnancyRecNr;
        $Header->_PregnancyRecNrAttributes = $this->_PregnancyRecNrAttributes;
        $this->Parent->PregnancyRecNr->Value = $Header->PregnancyRecNr;
        $this->Parent->PregnancyRecNr->Attributes->RestoreFromArray($Header->_PregnancyRecNrAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
    }
}
//End visit_referral_pregnancy ReportGroup class

//visit_referral_pregnancy GroupsCollection class @3-60B729E7
class clsGroupsCollectionvisit_referral_pregnancy {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mEmployeeIDCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionvisit_referral_pregnancy(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mEmployeeIDCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupvisit_referral_pregnancy($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->EmployeeIDTotalIndex = $this->mEmployeeIDCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->LastName->Value = $this->Parent->LastName->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->GivenName->Value = $this->Parent->GivenName->initialValue;
        $this->Parent->NextVisit->Value = $this->Parent->NextVisit->initialValue;
        $this->Parent->Town->Value = $this->Parent->Town->initialValue;
        $this->Parent->MobilePhone->Value = $this->Parent->MobilePhone->initialValue;
        $this->Parent->PatientID->Value = $this->Parent->PatientID->initialValue;
        $this->Parent->FamilyName->Value = $this->Parent->FamilyName->initialValue;
        $this->Parent->PregnancyRecNr->Value = $this->Parent->PregnancyRecNr->initialValue;
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
        if ($groupName == "EmployeeID") {
            $GroupEmployeeID = & $this->InitGroup(true);
            $this->Parent->EmployeeID_Header->CCSEventResult = CCGetEvent($this->Parent->EmployeeID_Header->CCSEvents, "OnInitialize", $this->Parent->EmployeeID_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->EmployeeID_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->EmployeeID_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->EmployeeID_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->EmployeeID_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->EmployeeID_Header->Height;
                $GroupEmployeeID->SetTotalControls("GetNextValue");
            $this->Parent->EmployeeID_Header->CCSEventResult = CCGetEvent($this->Parent->EmployeeID_Header->CCSEvents, "OnCalculate", $this->Parent->EmployeeID_Header);
            $GroupEmployeeID->SetControls();
            $GroupEmployeeID->Mode = 1;
            $GroupEmployeeID->GroupType = "EmployeeID";
            $this->mEmployeeIDCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupEmployeeID;
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
        $GroupEmployeeID = & $this->InitGroup(true);
        $this->Parent->EmployeeID_Footer->CCSEventResult = CCGetEvent($this->Parent->EmployeeID_Footer->CCSEvents, "OnInitialize", $this->Parent->EmployeeID_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->EmployeeID_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->EmployeeID_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->EmployeeID_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupEmployeeID->SetTotalControls("GetPrevValue");
        $GroupEmployeeID->SyncWithHeader($this->Groups[$this->mEmployeeIDCurrentHeaderIndex]);
        if ($this->Parent->EmployeeID_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->EmployeeID_Footer->Height;
        $this->Parent->EmployeeID_Footer->CCSEventResult = CCGetEvent($this->Parent->EmployeeID_Footer->CCSEvents, "OnCalculate", $this->Parent->EmployeeID_Footer);
        $GroupEmployeeID->SetControls();
        $this->RestoreValues();
        $GroupEmployeeID->Mode = 2;
        $GroupEmployeeID->GroupType ="EmployeeID";
        $this->Groups[] = & $GroupEmployeeID;
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
//End visit_referral_pregnancy GroupsCollection class

class clsReportvisit_referral_pregnancy { //visit_referral_pregnancy Class @3-81EDA8AD

//visit_referral_pregnancy Variables @3-F048E30A

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
    public $EmployeeID_HeaderBlock, $EmployeeID_Header;
    public $EmployeeID_FooterBlock, $EmployeeID_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $EmployeeID_HeaderControls, $EmployeeID_FooterControls;
    public $Sorter_NextVisit;
    public $Sorter_Town;
    public $Sorter_MobilePhone;
    public $PatientID1;
    public $Sorter_PregnancyRecNr;
    public $Sorter1;
    public $Sorter2;
//End visit_referral_pregnancy Variables

//Class_Initialize Event @3-525CA77F
    function clsReportvisit_referral_pregnancy($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "visit_referral_pregnancy";
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
        $this->EmployeeID_Footer = new clsSection($this);
        $this->EmployeeID_Header = new clsSection($this);
        $this->EmployeeID_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->EmployeeID_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsvisit_referral_pregnancyDataSource($this);
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
        $this->SorterName = CCGetParam("visit_referral_pregnancyOrder", "");
        $this->SorterDirection = CCGetParam("visit_referral_pregnancyDir", "");

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->Sorter_NextVisit = new clsSorter($this->ComponentName, "Sorter_NextVisit", $FileName, $this);
        $this->Sorter_Town = new clsSorter($this->ComponentName, "Sorter_Town", $FileName, $this);
        $this->Sorter_MobilePhone = new clsSorter($this->ComponentName, "Sorter_MobilePhone", $FileName, $this);
        $this->PatientID1 = new clsSorter($this->ComponentName, "PatientID1", $FileName, $this);
        $this->Sorter_PregnancyRecNr = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr", $FileName, $this);
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->Sorter2 = new clsSorter($this->ComponentName, "Sorter2", $FileName, $this);
        $this->LastName = new clsControl(ccsReportLabel, "LastName", "LastName", ccsText, "", "", $this);
        $this->FirstName = new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->Report_Row_Number = new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->GivenName = new clsControl(ccsReportLabel, "GivenName", "GivenName", ccsMemo, "", "", $this);
        $this->NextVisit = new clsControl(ccsReportLabel, "NextVisit", "NextVisit", ccsDate, array("ShortDate"), "", $this);
        $this->Town = new clsControl(ccsReportLabel, "Town", "Town", ccsText, "", "", $this);
        $this->MobilePhone = new clsControl(ccsReportLabel, "MobilePhone", "MobilePhone", ccsText, "", "", $this);
        $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsMemo, "", CCGetRequestParam("PatientID", ccsGet, NULL), $this);
        $this->PatientID->Page = "patient_maint_fac.php";
        $this->FamilyName = new clsControl(ccsLink, "FamilyName", "FamilyName", ccsMemo, "", CCGetRequestParam("FamilyName", ccsGet, NULL), $this);
        $this->FamilyName->Page = "patient_maint_fac.php";
        $this->PregnancyRecNr = new clsControl(ccsReportLabel, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", "", $this);
        $this->NoRecords = new clsPanel("NoRecords", $this);
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

//CheckErrors Method @3-DF37BC7A
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->LastName->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->GivenName->Errors->Count());
        $errors = ($errors || $this->NextVisit->Errors->Count());
        $errors = ($errors || $this->Town->Errors->Count());
        $errors = ($errors || $this->MobilePhone->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->FamilyName->Errors->Count());
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @3-3C70828E
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LastName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GivenName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NextVisit->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Town->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MobilePhone->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FamilyName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @3-1301967B
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["urls_LastName"] = CCGetFromGet("s_LastName", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_FamilyName"] = CCGetFromGet("s_FamilyName", NULL);
        $this->DataSource->Parameters["urls_GivenName"] = CCGetFromGet("s_GivenName", NULL);
        $this->DataSource->Parameters["urls_PatientID"] = CCGetFromGet("s_PatientID", NULL);
        $this->DataSource->Parameters["urls_PregnancyRecNr"] = CCGetFromGet("s_PregnancyRecNr", NULL);
        $this->DataSource->Parameters["urls_EarliestVisitDate"] = CCGetFromGet("s_EarliestVisitDate", NULL);
        $this->DataSource->Parameters["urls_LatestVisitDate"] = CCGetFromGet("s_LatestVisitDate", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $EmployeeIDKey = "";
        $Groups = new clsGroupsCollectionvisit_referral_pregnancy($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->LastName->SetValue($this->DataSource->LastName->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->GivenName->SetValue($this->DataSource->GivenName->GetValue());
            $this->NextVisit->SetValue($this->DataSource->NextVisit->GetValue());
            $this->Town->SetValue($this->DataSource->Town->GetValue());
            $this->MobilePhone->SetValue($this->DataSource->MobilePhone->GetValue());
            $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            $this->FamilyName->SetValue($this->DataSource->FamilyName->GetValue());
            $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
            $this->PatientID->Parameters = "";
            $this->PatientID->Parameters = CCAddParam($this->PatientID->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
            $this->FamilyName->Parameters = "";
            $this->FamilyName->Parameters = CCAddParam($this->FamilyName->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
            $this->Report_TotalRecords->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $EmployeeIDKey != $this->DataSource->f("EmployeeID")) {
                $Groups->OpenGroup("EmployeeID");
            }
            $Groups->AddItem();
            $EmployeeIDKey = $this->DataSource->f("EmployeeID");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $EmployeeIDKey != $this->DataSource->f("EmployeeID")) {
                $Groups->CloseGroup("EmployeeID");
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
            $this->ControlsVisible["LastName"] = $this->LastName->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["GivenName"] = $this->GivenName->Visible;
            $this->ControlsVisible["NextVisit"] = $this->NextVisit->Visible;
            $this->ControlsVisible["Town"] = $this->Town->Visible;
            $this->ControlsVisible["MobilePhone"] = $this->MobilePhone->Visible;
            $this->ControlsVisible["PatientID"] = $this->PatientID->Visible;
            $this->ControlsVisible["FamilyName"] = $this->FamilyName->Visible;
            $this->ControlsVisible["PregnancyRecNr"] = $this->PregnancyRecNr->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Report_Row_Number->SetValue($items[$i]->Report_Row_Number);
                        $this->Report_Row_Number->Attributes->RestoreFromArray($items[$i]->_Report_Row_NumberAttributes);
                        $this->GivenName->SetValue($items[$i]->GivenName);
                        $this->GivenName->Attributes->RestoreFromArray($items[$i]->_GivenNameAttributes);
                        $this->NextVisit->SetValue($items[$i]->NextVisit);
                        $this->NextVisit->Attributes->RestoreFromArray($items[$i]->_NextVisitAttributes);
                        $this->Town->SetValue($items[$i]->Town);
                        $this->Town->Attributes->RestoreFromArray($items[$i]->_TownAttributes);
                        $this->MobilePhone->SetValue($items[$i]->MobilePhone);
                        $this->MobilePhone->Attributes->RestoreFromArray($items[$i]->_MobilePhoneAttributes);
                        $this->PatientID->SetValue($items[$i]->PatientID);
                        $this->PatientID->Page = $items[$i]->_PatientIDPage;
                        $this->PatientID->Parameters = $items[$i]->_PatientIDParameters;
                        $this->PatientID->Attributes->RestoreFromArray($items[$i]->_PatientIDAttributes);
                        $this->FamilyName->SetValue($items[$i]->FamilyName);
                        $this->FamilyName->Page = $items[$i]->_FamilyNamePage;
                        $this->FamilyName->Parameters = $items[$i]->_FamilyNameParameters;
                        $this->FamilyName->Attributes->RestoreFromArray($items[$i]->_FamilyNameAttributes);
                        $this->PregnancyRecNr->SetValue($items[$i]->PregnancyRecNr);
                        $this->PregnancyRecNr->Attributes->RestoreFromArray($items[$i]->_PregnancyRecNrAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->GivenName->Show();
                        $this->NextVisit->Show();
                        $this->Town->Show();
                        $this->MobilePhone->Show();
                        $this->PatientID->Show();
                        $this->FamilyName->Show();
                        $this->PregnancyRecNr->Show();
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
                                $this->Sorter_NextVisit->Show();
                                $this->Sorter_Town->Show();
                                $this->Sorter_MobilePhone->Show();
                                $this->PatientID1->Show();
                                $this->Sorter_PregnancyRecNr->Show();
                                $this->Sorter1->Show();
                                $this->Sorter2->Show();
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
                    case "EmployeeID":
                        if ($items[$i]->Mode == 1) {
                            $this->LastName->SetValue($items[$i]->LastName);
                            $this->LastName->Attributes->RestoreFromArray($items[$i]->_LastNameAttributes);
                            $this->FirstName->SetValue($items[$i]->FirstName);
                            $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                            $this->EmployeeID_Header->CCSEventResult = CCGetEvent($this->EmployeeID_Header->CCSEvents, "BeforeShow", $this->EmployeeID_Header);
                            if ($this->EmployeeID_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section EmployeeID_Header";
                                $this->Attributes->Show();
                                $this->LastName->Show();
                                $this->FirstName->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section EmployeeID_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->EmployeeID_Footer->CCSEventResult = CCGetEvent($this->EmployeeID_Footer->CCSEvents, "BeforeShow", $this->EmployeeID_Footer);
                            if ($this->EmployeeID_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section EmployeeID_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section EmployeeID_Footer", true, "Section Detail");
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

} //End visit_referral_pregnancy Class @3-FCB6E20C

class clsvisit_referral_pregnancyDataSource extends clsDBregistry_db {  //visit_referral_pregnancyDataSource Class @3-73418D71

//DataSource Variables @3-8ABB136A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $LastName;
    public $FirstName;
    public $GivenName;
    public $NextVisit;
    public $Town;
    public $MobilePhone;
    public $PatientID;
    public $FamilyName;
    public $PregnancyRecNr;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-7454CE3C
    function clsvisit_referral_pregnancyDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report visit_referral_pregnancy";
        $this->Initialize();
        $this->LastName = new clsField("LastName", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->GivenName = new clsField("GivenName", ccsMemo, "");
        
        $this->NextVisit = new clsField("NextVisit", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Town = new clsField("Town", ccsText, "");
        
        $this->MobilePhone = new clsField("MobilePhone", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsMemo, "");
        
        $this->FamilyName = new clsField("FamilyName", ccsMemo, "");
        
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-0C9E4ECF
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_NextVisit" => array("EncDate", ""), 
            "Sorter_Town" => array("Town", ""), 
            "Sorter_MobilePhone" => array("MobilePhone", ""), 
            "PatientID1" => array("patient.PatientID", ""), 
            "Sorter_PregnancyRecNr" => array("PregnancyRecNr", ""), 
            "Sorter1" => array("GivenName", ""), 
            "Sorter2" => array("FamilyName", "")));
    }
//End SetOrder Method

//Prepare Method @3-01445CDD
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("2", "urls_LastName", ccsText, "", "", $this->Parameters["urls_LastName"], '%', false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], '%', false);
        $this->wp->AddParameter("4", "urls_FamilyName", ccsMemo, "", "", $this->Parameters["urls_FamilyName"], '%', false);
        $this->wp->AddParameter("5", "urls_GivenName", ccsMemo, "", "", $this->Parameters["urls_GivenName"], '%', false);
        $this->wp->AddParameter("6", "urls_PatientID", ccsText, "", "", $this->Parameters["urls_PatientID"], '%', false);
        $this->wp->AddParameter("7", "urls_PregnancyRecNr", ccsText, "", "", $this->Parameters["urls_PregnancyRecNr"], '%', false);
        $this->wp->AddParameter("8", "urls_EarliestVisitDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_EarliestVisitDate"], CCFormatDate(CCParseDate("1000-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
        $this->wp->AddParameter("9", "urls_LatestVisitDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_LatestVisitDate"], CCFormatDate(CCParseDate("9999-01-01",array("yyyy","-","mm","-","dd")),array("ShortDate")), false);
    }
//End Prepare Method

//Open Method @3-57843DBD
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT pregnancy.PregnancyID AS pregnancy_PregnancyID, PregnancyRecNr, FirstName, LastName, VisitDate, GivenName, FamilyName,\n" .
        "patient.PatientID AS patient_PatientID, Town, MobilePhone, RecomObstetricExaminationDate AS EncDate, \n" .
        "hospitalisation.HospitalisationID AS hospitalisation_HospitalisationID,\n" .
        "pregnancy.FacilityID AS pregnancy_FacilityID, employees.EmployeeID \n" .
        "FROM (((pregnancy INNER JOIN employees ON\n" .
        "employees.EmployeeID = pregnancy.EmployeeID) RIGHT JOIN patient ON\n" .
        "pregnancy.PatientID = patient.PatientID) LEFT JOIN visit ON\n" .
        "visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN hospitalisation ON\n" .
        "hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        "WHERE pregnancy.FacilityID IN (" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "AND employees.LastName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "AND employees.FirstName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "%'\n" .
        "AND patient.FamilyName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("4"), ccsMemo) . "%'\n" .
        "AND patient.GivenName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("5"), ccsMemo) . "%'\n" .
        "AND patient.PatientID LIKE '" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "'\n" .
        "AND patient.Discharged = 0\n" .
        "AND pregnancy.PregnancyRecNr LIKE '" . $this->SQLValue($this->wp->GetDBValue("7"), ccsText) . "'\n" .
        "AND RecomObstetricExaminationDate >= '" . $this->SQLValue($this->wp->GetDBValue("8"), ccsDate) . "' \n" .
        "AND RecomObstetricExaminationDate <= '" . $this->SQLValue($this->wp->GetDBValue("9"), ccsDate) . "' \n" .
        "AND (RecomObstetricExaminationDate >= CURRENT_DATE)\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT pregnancy.PregnancyID AS pregnancy_PregnancyID, PregnancyRecNr, FirstName, LastName, VisitDate, GivenName, FamilyName,\n" .
        "patient.PatientID AS patient_PatientID, Town, MobilePhone, NextVisit AS EncDate, \n" .
        "hospitalisation.HospitalisationID AS hospitalisation_HospitalisationID,\n" .
        "pregnancy.FacilityID AS pregnancy_FacilityID, employees.EmployeeID\n" .
        "FROM (((pregnancy INNER JOIN employees ON\n" .
        "employees.EmployeeID = pregnancy.EmployeeID) RIGHT JOIN patient ON\n" .
        "pregnancy.PatientID = patient.PatientID) LEFT JOIN visit ON\n" .
        "visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN hospitalisation ON\n" .
        "hospitalisation.PregnancyID = pregnancy.PregnancyID\n" .
        "WHERE pregnancy.FacilityID IN (" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "AND employees.LastName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "AND employees.FirstName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "%'\n" .
        "AND patient.FamilyName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("4"), ccsMemo) . "%'\n" .
        "AND patient.GivenName LIKE '%" . $this->SQLValue($this->wp->GetDBValue("5"), ccsMemo) . "%'\n" .
        "AND patient.PatientID LIKE '" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "'\n" .
        "AND patient.Discharged = 0\n" .
        "AND pregnancy.PregnancyRecNr LIKE '" . $this->SQLValue($this->wp->GetDBValue("7"), ccsText) . "'\n" .
        "AND NextVisit >= '" . $this->SQLValue($this->wp->GetDBValue("8"), ccsDate) . "' \n" .
        "AND NextVisit <= '" . $this->SQLValue($this->wp->GetDBValue("9"), ccsDate) . "' \n" .
        "AND (NextVisit >= CURRENT_DATE)";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "EmployeeID asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-C63E3398
    function SetValues()
    {
        $this->LastName->SetDBValue($this->f("LastName"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->GivenName->SetDBValue($this->f("GivenName"));
        $this->NextVisit->SetDBValue(trim($this->f("EncDate")));
        $this->Town->SetDBValue($this->f("Town"));
        $this->MobilePhone->SetDBValue($this->f("MobilePhone"));
        $this->PatientID->SetDBValue($this->f("patient_PatientID"));
        $this->FamilyName->SetDBValue($this->f("FamilyName"));
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
    }
//End SetValues Method

} //End visit_referral_pregnancyDataSource Class @3-FCB6E20C

class clsRecordemployees_patient_pregnan { //employees_patient_pregnan Class @37-31CA641D

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

//Class_Initialize Event @37-5317AAA8
    function clsRecordemployees_patient_pregnan($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employees_patient_pregnan/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employees_patient_pregnan";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_LastName = new clsControl(ccsTextBox, "s_LastName", $CCSLocales->GetText("LastNameDoctor"), ccsText, "", CCGetRequestParam("s_LastName", $Method, NULL), $this);
            $this->s_FirstName = new clsControl(ccsTextBox, "s_FirstName", $CCSLocales->GetText("FirstNameDoctor"), ccsText, "", CCGetRequestParam("s_FirstName", $Method, NULL), $this);
            $this->s_FamilyName = new clsControl(ccsTextBox, "s_FamilyName", $CCSLocales->GetText("FamilyNamePatient"), ccsMemo, "", CCGetRequestParam("s_FamilyName", $Method, NULL), $this);
            $this->s_GivenName = new clsControl(ccsTextBox, "s_GivenName", $CCSLocales->GetText("GivenNamePatient"), ccsMemo, "", CCGetRequestParam("s_GivenName", $Method, NULL), $this);
            $this->s_PatientID = new clsControl(ccsTextBox, "s_PatientID", $CCSLocales->GetText("PatientID"), ccsInteger, "", CCGetRequestParam("s_PatientID", $Method, NULL), $this);
            $this->s_PregnancyRecNr = new clsControl(ccsTextBox, "s_PregnancyRecNr", $CCSLocales->GetText("PregnancyRecNr"), ccsText, "", CCGetRequestParam("s_PregnancyRecNr", $Method, NULL), $this);
            $this->s_EarliestVisitDate = new clsControl(ccsTextBox, "s_EarliestVisitDate", $CCSLocales->GetText("NextVisit"), ccsDate, $DefaultDateFormat, CCGetRequestParam("s_EarliestVisitDate", $Method, NULL), $this);
            $this->s_EarliestVisitDateDatePicker = new clsDatePicker("s_EarliestVisitDateDatePicker", "employees_patient_pregnan", "s_EarliestVisitDate", $this);
            $this->s_LatestVisitDate = new clsControl(ccsTextBox, "s_LatestVisitDate", $CCSLocales->GetText("NextVisit"), ccsDate, $DefaultDateFormat, CCGetRequestParam("s_LatestVisitDate", $Method, NULL), $this);
            $this->s_LatestVisitDateDatePicker = new clsDatePicker("s_LatestVisitDateDatePicker", "employees_patient_pregnan", "s_LatestVisitDate", $this);
        }
    }
//End Class_Initialize Event

//Validate Method @37-1618AC51
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_LastName->Validate() && $Validation);
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_FamilyName->Validate() && $Validation);
        $Validation = ($this->s_GivenName->Validate() && $Validation);
        $Validation = ($this->s_PatientID->Validate() && $Validation);
        $Validation = ($this->s_PregnancyRecNr->Validate() && $Validation);
        $Validation = ($this->s_EarliestVisitDate->Validate() && $Validation);
        $Validation = ($this->s_LatestVisitDate->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_LastName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FamilyName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_GivenName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PatientID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PregnancyRecNr->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_EarliestVisitDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_LatestVisitDate->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @37-AC650FFF
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_LastName->Errors->Count());
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_FamilyName->Errors->Count());
        $errors = ($errors || $this->s_GivenName->Errors->Count());
        $errors = ($errors || $this->s_PatientID->Errors->Count());
        $errors = ($errors || $this->s_PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->s_EarliestVisitDate->Errors->Count());
        $errors = ($errors || $this->s_EarliestVisitDateDatePicker->Errors->Count());
        $errors = ($errors || $this->s_LatestVisitDate->Errors->Count());
        $errors = ($errors || $this->s_LatestVisitDateDatePicker->Errors->Count());
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

//Operation Method @37-073D0FE1
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
        $Redirect = "report_visit_date.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_visit_date.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @37-FA2D16C4
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
            $Error = ComposeStrings($Error, $this->s_LastName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FamilyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_GivenName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_EarliestVisitDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_EarliestVisitDateDatePicker->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_LatestVisitDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_LatestVisitDateDatePicker->Errors->ToString());
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
        $this->s_LastName->Show();
        $this->s_FirstName->Show();
        $this->s_FamilyName->Show();
        $this->s_GivenName->Show();
        $this->s_PatientID->Show();
        $this->s_PregnancyRecNr->Show();
        $this->s_EarliestVisitDate->Show();
        $this->s_EarliestVisitDateDatePicker->Show();
        $this->s_LatestVisitDate->Show();
        $this->s_LatestVisitDateDatePicker->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End employees_patient_pregnan Class @37-FCB6E20C

//Initialize Page @1-567DEFF7
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
$TemplateFileName = "report_visit_date.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-13756179
CCSecurityRedirect("3", "noaccess.php");
//End Authenticate User

//Include events file @1-13611ABC
include_once("./report_visit_date_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-20B7EE07
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$visit_referral_pregnancy = new clsReportvisit_referral_pregnancy("", $MainPage);
$employees_patient_pregnan = new clsRecordemployees_patient_pregnan("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_visit_date.php";
$MainPage->topmenu = & $topmenu;
$MainPage->visit_referral_pregnancy = & $visit_referral_pregnancy;
$MainPage->employees_patient_pregnan = & $employees_patient_pregnan;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$visit_referral_pregnancy->Initialize();

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

//Execute Components @1-47CCD1A9
$topmenu->Operations();
$employees_patient_pregnan->Operation();
//End Execute Components

//Go to destination page @1-BF4CC212
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($visit_referral_pregnancy);
    unset($employees_patient_pregnan);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-65EB1579
$topmenu->Show();
$visit_referral_pregnancy->Show();
$employees_patient_pregnan->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-7B343102
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($visit_referral_pregnancy);
unset($employees_patient_pregnan);
unset($Tpl);
//End Unload Page


?>
