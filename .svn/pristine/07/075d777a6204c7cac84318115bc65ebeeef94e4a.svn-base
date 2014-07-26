<?php
//Include Common Files @1-DCA25F1B
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_hospitalisations.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//hospitalisation_pregnancy ReportGroup class @3-71123D08
class clsReportGrouphospitalisation_pregnancy {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $FacilityName, $_FacilityNameAttributes;
    public $Report_Row_Number1, $_Report_Row_Number1Attributes;
    public $ReasonHospitalisationICD10ID, $_ReasonHospitalisationICD10IDAttributes;
    public $Report_Row_Number, $_Report_Row_NumberAttributes;
    public $Report_CurrentDate, $_Report_CurrentDateAttributes;
    public $PatientID, $_PatientIDAttributes;
    public $FamilyName, $_FamilyNamePage, $_FamilyNameParameters, $_FamilyNameAttributes;
    public $GivenName, $_GivenNamePage, $_GivenNameParameters, $_GivenNameAttributes;
    public $PregnancyRecNr, $_PregnancyRecNrAttributes;
    public $AdmissionDate, $_AdmissionDateAttributes;
    public $DischargeDate, $_DischargeDateAttributes;
    public $Dapartment, $_DapartmentAttributes;
    public $Town, $_TownAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $FacilityNameTotalIndex;
    public $PatientIDTotalIndex;

    function clsReportGrouphospitalisation_pregnancy(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->FacilityName = $this->Parent->FacilityName->Value;
        $this->ReasonHospitalisationICD10ID = $this->Parent->ReasonHospitalisationICD10ID->Value;
        $this->PatientID = $this->Parent->PatientID->Value;
        $this->FamilyName = $this->Parent->FamilyName->Value;
        $this->GivenName = $this->Parent->GivenName->Value;
        $this->PregnancyRecNr = $this->Parent->PregnancyRecNr->Value;
        $this->AdmissionDate = $this->Parent->AdmissionDate->Value;
        $this->DischargeDate = $this->Parent->DischargeDate->Value;
        $this->Dapartment = $this->Parent->Dapartment->Value;
        $this->Town = $this->Parent->Town->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_Row_Number1 = $this->Parent->Report_Row_Number1->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->_FamilyNamePage = $this->Parent->FamilyName->Page;
        $this->_FamilyNameParameters = $this->Parent->FamilyName->Parameters;
        $this->_GivenNamePage = $this->Parent->GivenName->Page;
        $this->_GivenNameParameters = $this->Parent->GivenName->Parameters;
        $this->_Sorter_PregnancyRecNrAttributes = $this->Parent->Sorter_PregnancyRecNr->Attributes->GetAsArray();
        $this->_Sorter_ReasonHospitalisationICD10IDAttributes = $this->Parent->Sorter_ReasonHospitalisationICD10ID->Attributes->GetAsArray();
        $this->_Sorter_TownAttributes = $this->Parent->Sorter_Town->Attributes->GetAsArray();
        $this->_Sorter_PregnancyRecNr1Attributes = $this->Parent->Sorter_PregnancyRecNr1->Attributes->GetAsArray();
        $this->_Sorter1Attributes = $this->Parent->Sorter1->Attributes->GetAsArray();
        $this->_DepartmentAttributes = $this->Parent->Department->Attributes->GetAsArray();
        $this->_Sorter2Attributes = $this->Parent->Sorter2->Attributes->GetAsArray();
        $this->_FacilityNameAttributes = $this->Parent->FacilityName->Attributes->GetAsArray();
        $this->_Report_Row_Number1Attributes = $this->Parent->Report_Row_Number1->Attributes->GetAsArray();
        $this->_ReasonHospitalisationICD10IDAttributes = $this->Parent->ReasonHospitalisationICD10ID->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
        $this->_PatientIDAttributes = $this->Parent->PatientID->Attributes->GetAsArray();
        $this->_FamilyNameAttributes = $this->Parent->FamilyName->Attributes->GetAsArray();
        $this->_GivenNameAttributes = $this->Parent->GivenName->Attributes->GetAsArray();
        $this->_PregnancyRecNrAttributes = $this->Parent->PregnancyRecNr->Attributes->GetAsArray();
        $this->_AdmissionDateAttributes = $this->Parent->AdmissionDate->Attributes->GetAsArray();
        $this->_DischargeDateAttributes = $this->Parent->DischargeDate->Attributes->GetAsArray();
        $this->_DapartmentAttributes = $this->Parent->Dapartment->Attributes->GetAsArray();
        $this->_TownAttributes = $this->Parent->Town->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_Row_Number1 = $this->Report_Row_Number1;
        $Header->_Report_Row_Number1Attributes = $this->_Report_Row_Number1Attributes;
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $this->FacilityName = $Header->FacilityName;
        $Header->_FacilityNameAttributes = $this->_FacilityNameAttributes;
        $this->Parent->FacilityName->Value = $Header->FacilityName;
        $this->Parent->FacilityName->Attributes->RestoreFromArray($Header->_FacilityNameAttributes);
        $this->ReasonHospitalisationICD10ID = $Header->ReasonHospitalisationICD10ID;
        $Header->_ReasonHospitalisationICD10IDAttributes = $this->_ReasonHospitalisationICD10IDAttributes;
        $this->Parent->ReasonHospitalisationICD10ID->Value = $Header->ReasonHospitalisationICD10ID;
        $this->Parent->ReasonHospitalisationICD10ID->Attributes->RestoreFromArray($Header->_ReasonHospitalisationICD10IDAttributes);
        $this->PatientID = $Header->PatientID;
        $Header->_PatientIDAttributes = $this->_PatientIDAttributes;
        $this->Parent->PatientID->Value = $Header->PatientID;
        $this->Parent->PatientID->Attributes->RestoreFromArray($Header->_PatientIDAttributes);
        $this->FamilyName = $Header->FamilyName;
        $this->_FamilyNamePage = $Header->_FamilyNamePage;
        $this->_FamilyNameParameters = $Header->_FamilyNameParameters;
        $Header->_FamilyNameAttributes = $this->_FamilyNameAttributes;
        $this->Parent->FamilyName->Value = $Header->FamilyName;
        $this->Parent->FamilyName->Attributes->RestoreFromArray($Header->_FamilyNameAttributes);
        $this->GivenName = $Header->GivenName;
        $this->_GivenNamePage = $Header->_GivenNamePage;
        $this->_GivenNameParameters = $Header->_GivenNameParameters;
        $Header->_GivenNameAttributes = $this->_GivenNameAttributes;
        $this->Parent->GivenName->Value = $Header->GivenName;
        $this->Parent->GivenName->Attributes->RestoreFromArray($Header->_GivenNameAttributes);
        $this->PregnancyRecNr = $Header->PregnancyRecNr;
        $Header->_PregnancyRecNrAttributes = $this->_PregnancyRecNrAttributes;
        $this->Parent->PregnancyRecNr->Value = $Header->PregnancyRecNr;
        $this->Parent->PregnancyRecNr->Attributes->RestoreFromArray($Header->_PregnancyRecNrAttributes);
        $this->AdmissionDate = $Header->AdmissionDate;
        $Header->_AdmissionDateAttributes = $this->_AdmissionDateAttributes;
        $this->Parent->AdmissionDate->Value = $Header->AdmissionDate;
        $this->Parent->AdmissionDate->Attributes->RestoreFromArray($Header->_AdmissionDateAttributes);
        $this->DischargeDate = $Header->DischargeDate;
        $Header->_DischargeDateAttributes = $this->_DischargeDateAttributes;
        $this->Parent->DischargeDate->Value = $Header->DischargeDate;
        $this->Parent->DischargeDate->Attributes->RestoreFromArray($Header->_DischargeDateAttributes);
        $this->Dapartment = $Header->Dapartment;
        $Header->_DapartmentAttributes = $this->_DapartmentAttributes;
        $this->Parent->Dapartment->Value = $Header->Dapartment;
        $this->Parent->Dapartment->Attributes->RestoreFromArray($Header->_DapartmentAttributes);
        $this->Town = $Header->Town;
        $Header->_TownAttributes = $this->_TownAttributes;
        $this->Parent->Town->Value = $Header->Town;
        $this->Parent->Town->Attributes->RestoreFromArray($Header->_TownAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_Row_Number1 = $this->Parent->Report_Row_Number1->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
    }
}
//End hospitalisation_pregnancy ReportGroup class

//hospitalisation_pregnancy GroupsCollection class @3-A0D33950
class clsGroupsCollectionhospitalisation_pregnancy {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mFacilityNameCurrentHeaderIndex;
    public $mPatientIDCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionhospitalisation_pregnancy(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mFacilityNameCurrentHeaderIndex = 1;
        $this->mPatientIDCurrentHeaderIndex = 2;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGrouphospitalisation_pregnancy($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->FacilityNameTotalIndex = $this->mFacilityNameCurrentHeaderIndex;
        $group->PatientIDTotalIndex = $this->mPatientIDCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->FacilityName->Value = $this->Parent->FacilityName->initialValue;
        $this->Parent->Report_Row_Number1->Value = $this->Parent->Report_Row_Number1->initialValue;
        $this->Parent->ReasonHospitalisationICD10ID->Value = $this->Parent->ReasonHospitalisationICD10ID->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->PatientID->Value = $this->Parent->PatientID->initialValue;
        $this->Parent->FamilyName->Value = $this->Parent->FamilyName->initialValue;
        $this->Parent->GivenName->Value = $this->Parent->GivenName->initialValue;
        $this->Parent->PregnancyRecNr->Value = $this->Parent->PregnancyRecNr->initialValue;
        $this->Parent->AdmissionDate->Value = $this->Parent->AdmissionDate->initialValue;
        $this->Parent->DischargeDate->Value = $this->Parent->DischargeDate->initialValue;
        $this->Parent->Dapartment->Value = $this->Parent->Dapartment->initialValue;
        $this->Parent->Town->Value = $this->Parent->Town->initialValue;
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
            $this->Parent->Report_Row_Number1->Reset();
        }
        if ($groupName == "PatientID" or $OpenFlag) {
            $GroupPatientID = & $this->InitGroup(true);
            $this->Parent->PatientID_Header->CCSEventResult = CCGetEvent($this->Parent->PatientID_Header->CCSEvents, "OnInitialize", $this->Parent->PatientID_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->PatientID_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->PatientID_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->PatientID_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->PatientID_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->PatientID_Header->Height;
                $GroupPatientID->SetTotalControls("GetNextValue");
            $this->Parent->PatientID_Header->CCSEventResult = CCGetEvent($this->Parent->PatientID_Header->CCSEvents, "OnCalculate", $this->Parent->PatientID_Header);
            $GroupPatientID->SetControls();
            $GroupPatientID->Mode = 1;
            $GroupPatientID->GroupType = "PatientID";
            $this->mPatientIDCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupPatientID;
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
        $GroupPatientID = & $this->InitGroup(true);
        $this->Parent->PatientID_Footer->CCSEventResult = CCGetEvent($this->Parent->PatientID_Footer->CCSEvents, "OnInitialize", $this->Parent->PatientID_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->PatientID_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->PatientID_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->PatientID_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupPatientID->SetTotalControls("GetPrevValue");
        $GroupPatientID->SyncWithHeader($this->Groups[$this->mPatientIDCurrentHeaderIndex]);
        if ($this->Parent->PatientID_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->PatientID_Footer->Height;
        $this->Parent->PatientID_Footer->CCSEventResult = CCGetEvent($this->Parent->PatientID_Footer->CCSEvents, "OnCalculate", $this->Parent->PatientID_Footer);
        $GroupPatientID->SetControls();
        $this->RestoreValues();
        $GroupPatientID->Mode = 2;
        $GroupPatientID->GroupType ="PatientID";
        $this->Groups[] = & $GroupPatientID;
        if ($groupName == "PatientID") return;
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
        $this->Parent->Report_Row_Number1->Reset();
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
//End hospitalisation_pregnancy GroupsCollection class

class clsReporthospitalisation_pregnancy { //hospitalisation_pregnancy Class @3-89B67080

//hospitalisation_pregnancy Variables @3-274A3143

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
    public $PatientID_HeaderBlock, $PatientID_Header;
    public $PatientID_FooterBlock, $PatientID_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $FacilityName_HeaderControls, $FacilityName_FooterControls;
    public $PatientID_HeaderControls, $PatientID_FooterControls;
    public $Sorter_PregnancyRecNr;
    public $Sorter_ReasonHospitalisationICD10ID;
    public $Sorter_Town;
    public $Sorter_PregnancyRecNr1;
    public $Sorter1;
    public $Department;
    public $Sorter2;
//End hospitalisation_pregnancy Variables

//Class_Initialize Event @3-3E82BD9B
    function clsReporthospitalisation_pregnancy($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "hospitalisation_pregnancy";
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
        $this->PatientID_Footer = new clsSection($this);
        $this->PatientID_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->PatientID_Footer->Height);
        $this->PatientID_Header = new clsSection($this);
        $this->PatientID_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->PatientID_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clshospitalisation_pregnancyDataSource($this);
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
        $this->SorterName = CCGetParam("hospitalisation_pregnancyOrder", "");
        $this->SorterDirection = CCGetParam("hospitalisation_pregnancyDir", "");

        $this->Sorter_PregnancyRecNr = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr", $FileName, $this);
        $this->Sorter_ReasonHospitalisationICD10ID = new clsSorter($this->ComponentName, "Sorter_ReasonHospitalisationICD10ID", $FileName, $this);
        $this->Sorter_Town = new clsSorter($this->ComponentName, "Sorter_Town", $FileName, $this);
        $this->Sorter_PregnancyRecNr1 = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr1", $FileName, $this);
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->Department = new clsSorter($this->ComponentName, "Department", $FileName, $this);
        $this->Sorter2 = new clsSorter($this->ComponentName, "Sorter2", $FileName, $this);
        $this->FacilityName = new clsControl(ccsReportLabel, "FacilityName", "FacilityName", ccsText, "", "", $this);
        $this->Report_Row_Number1 = new clsControl(ccsReportLabel, "Report_Row_Number1", "Report_Row_Number1", ccsInteger, "", 0, $this);
        $this->Report_Row_Number1->TotalFunction = "Count";
        $this->Report_Row_Number1->IsEmptySource = true;
        $this->ReasonHospitalisationICD10ID = new clsControl(ccsReportLabel, "ReasonHospitalisationICD10ID", "ReasonHospitalisationICD10ID", ccsText, "", "", $this);
        $this->Report_Row_Number = new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->Report_CurrentDate = new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->PatientID = new clsControl(ccsReportLabel, "PatientID", "PatientID", ccsText, "", "", $this);
        $this->FamilyName = new clsControl(ccsLink, "FamilyName", "FamilyName", ccsText, "", CCGetRequestParam("FamilyName", ccsGet, NULL), $this);
        $this->FamilyName->Page = "patient_maint_fac.php";
        $this->GivenName = new clsControl(ccsLink, "GivenName", "GivenName", ccsText, "", CCGetRequestParam("GivenName", ccsGet, NULL), $this);
        $this->GivenName->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->GivenName->Page = "patient_maint_fac.php";
        $this->PregnancyRecNr = new clsControl(ccsReportLabel, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", "", $this);
        $this->AdmissionDate = new clsControl(ccsReportLabel, "AdmissionDate", "AdmissionDate", ccsDate, array("ShortDate"), "", $this);
        $this->DischargeDate = new clsControl(ccsReportLabel, "DischargeDate", "DischargeDate", ccsDate, array("ShortDate"), "", $this);
        $this->Dapartment = new clsControl(ccsReportLabel, "Dapartment", "Dapartment", ccsText, "", "", $this);
        $this->Town = new clsControl(ccsReportLabel, "Town", "Town", ccsText, "", "", $this);
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

//CheckErrors Method @3-DBB37CB7
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FacilityName->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number1->Errors->Count());
        $errors = ($errors || $this->ReasonHospitalisationICD10ID->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->FamilyName->Errors->Count());
        $errors = ($errors || $this->GivenName->Errors->Count());
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->AdmissionDate->Errors->Count());
        $errors = ($errors || $this->DischargeDate->Errors->Count());
        $errors = ($errors || $this->Dapartment->Errors->Count());
        $errors = ($errors || $this->Town->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @3-B63B5F03
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReasonHospitalisationICD10ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FamilyName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GivenName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AdmissionDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DischargeDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Dapartment->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Town->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @3-CFAD0C64
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["urls_AdmissionDate"] = CCGetFromGet("s_AdmissionDate", NULL);
        $this->DataSource->Parameters["urls_AdmissionDate1"] = CCGetFromGet("s_AdmissionDate1", NULL);
        $this->DataSource->Parameters["urls_PregnancyRecNr"] = CCGetFromGet("s_PregnancyRecNr", NULL);
        $this->DataSource->Parameters["urls_FamilyName"] = CCGetFromGet("s_FamilyName", NULL);
        $this->DataSource->Parameters["urls_GivenName"] = CCGetFromGet("s_GivenName", NULL);
        $this->DataSource->Parameters["urls_DischargeDate"] = CCGetFromGet("s_DischargeDate", NULL);
        $this->DataSource->Parameters["urls_DischargeDate2"] = CCGetFromGet("s_DischargeDate2", NULL);
        $this->DataSource->Parameters["urlDiagnose"] = CCGetFromGet("Diagnose", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $FacilityNameKey = "";
        $PatientIDKey = "";
        $Groups = new clsGroupsCollectionhospitalisation_pregnancy($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
            $this->ReasonHospitalisationICD10ID->SetValue($this->DataSource->ReasonHospitalisationICD10ID->GetValue());
            $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            $this->FamilyName->SetValue($this->DataSource->FamilyName->GetValue());
            $this->GivenName->SetValue($this->DataSource->GivenName->GetValue());
            $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
            $this->AdmissionDate->SetValue($this->DataSource->AdmissionDate->GetValue());
            $this->DischargeDate->SetValue($this->DataSource->DischargeDate->GetValue());
            $this->Dapartment->SetValue($this->DataSource->Dapartment->GetValue());
            $this->Town->SetValue($this->DataSource->Town->GetValue());
            $this->FamilyName->Parameters = "";
            $this->FamilyName->Parameters = CCAddParam($this->FamilyName->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
            $this->Report_Row_Number1->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->OpenGroup("FacilityName");
            } elseif ($PatientIDKey != $this->DataSource->f("hospitalisation_HospitalisationID")) {
                $Groups->OpenGroup("PatientID");
            }
            $Groups->AddItem();
            $FacilityNameKey = $this->DataSource->f("FacilityName");
            $PatientIDKey = $this->DataSource->f("hospitalisation_HospitalisationID");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->CloseGroup("FacilityName");
            } elseif ($PatientIDKey != $this->DataSource->f("hospitalisation_HospitalisationID")) {
                $Groups->CloseGroup("PatientID");
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
            $this->ControlsVisible["Report_Row_Number1"] = $this->Report_Row_Number1->Visible;
            $this->ControlsVisible["ReasonHospitalisationICD10ID"] = $this->ReasonHospitalisationICD10ID->Visible;
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["PatientID"] = $this->PatientID->Visible;
            $this->ControlsVisible["FamilyName"] = $this->FamilyName->Visible;
            $this->ControlsVisible["GivenName"] = $this->GivenName->Visible;
            $this->ControlsVisible["PregnancyRecNr"] = $this->PregnancyRecNr->Visible;
            $this->ControlsVisible["AdmissionDate"] = $this->AdmissionDate->Visible;
            $this->ControlsVisible["DischargeDate"] = $this->DischargeDate->Visible;
            $this->ControlsVisible["Dapartment"] = $this->Dapartment->Visible;
            $this->ControlsVisible["Town"] = $this->Town->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->ReasonHospitalisationICD10ID->SetValue($items[$i]->ReasonHospitalisationICD10ID);
                        $this->ReasonHospitalisationICD10ID->Attributes->RestoreFromArray($items[$i]->_ReasonHospitalisationICD10IDAttributes);
                        $this->Report_Row_Number->SetValue($items[$i]->Report_Row_Number);
                        $this->Report_Row_Number->Attributes->RestoreFromArray($items[$i]->_Report_Row_NumberAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->ReasonHospitalisationICD10ID->Show();
                        $this->Report_Row_Number->Show();
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
                                $this->Sorter_PregnancyRecNr->Show();
                                $this->Sorter_ReasonHospitalisationICD10ID->Show();
                                $this->Sorter_Town->Show();
                                $this->Sorter_PregnancyRecNr1->Show();
                                $this->Sorter1->Show();
                                $this->Department->Show();
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
                    case "FacilityName":
                        if ($items[$i]->Mode == 1) {
                            $this->FacilityName->SetValue($items[$i]->FacilityName);
                            $this->FacilityName->Attributes->RestoreFromArray($items[$i]->_FacilityNameAttributes);
                            $this->Report_Row_Number1->SetValue($items[$i]->Report_Row_Number1);
                            $this->Report_Row_Number1->Attributes->RestoreFromArray($items[$i]->_Report_Row_Number1Attributes);
                            $this->FacilityName_Header->CCSEventResult = CCGetEvent($this->FacilityName_Header->CCSEvents, "BeforeShow", $this->FacilityName_Header);
                            if ($this->FacilityName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Header";
                                $this->Attributes->Show();
                                $this->FacilityName->Show();
                                $this->Report_Row_Number1->Show();
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
                    case "PatientID":
                        if ($items[$i]->Mode == 1) {
                            $this->PatientID->SetValue($items[$i]->PatientID);
                            $this->PatientID->Attributes->RestoreFromArray($items[$i]->_PatientIDAttributes);
                            $this->FamilyName->SetValue($items[$i]->FamilyName);
                            $this->FamilyName->Page = $items[$i]->_FamilyNamePage;
                            $this->FamilyName->Parameters = $items[$i]->_FamilyNameParameters;
                            $this->FamilyName->Attributes->RestoreFromArray($items[$i]->_FamilyNameAttributes);
                            $this->GivenName->SetValue($items[$i]->GivenName);
                            $this->GivenName->Page = $items[$i]->_GivenNamePage;
                            $this->GivenName->Parameters = $items[$i]->_GivenNameParameters;
                            $this->GivenName->Attributes->RestoreFromArray($items[$i]->_GivenNameAttributes);
                            $this->PregnancyRecNr->SetValue($items[$i]->PregnancyRecNr);
                            $this->PregnancyRecNr->Attributes->RestoreFromArray($items[$i]->_PregnancyRecNrAttributes);
                            $this->AdmissionDate->SetValue($items[$i]->AdmissionDate);
                            $this->AdmissionDate->Attributes->RestoreFromArray($items[$i]->_AdmissionDateAttributes);
                            $this->DischargeDate->SetValue($items[$i]->DischargeDate);
                            $this->DischargeDate->Attributes->RestoreFromArray($items[$i]->_DischargeDateAttributes);
                            $this->Dapartment->SetValue($items[$i]->Dapartment);
                            $this->Dapartment->Attributes->RestoreFromArray($items[$i]->_DapartmentAttributes);
                            $this->Town->SetValue($items[$i]->Town);
                            $this->Town->Attributes->RestoreFromArray($items[$i]->_TownAttributes);
                            $this->PatientID_Header->CCSEventResult = CCGetEvent($this->PatientID_Header->CCSEvents, "BeforeShow", $this->PatientID_Header);
                            if ($this->PatientID_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section PatientID_Header";
                                $this->Attributes->Show();
                                $this->PatientID->Show();
                                $this->FamilyName->Show();
                                $this->GivenName->Show();
                                $this->PregnancyRecNr->Show();
                                $this->AdmissionDate->Show();
                                $this->DischargeDate->Show();
                                $this->Dapartment->Show();
                                $this->Town->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section PatientID_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->PatientID_Footer->CCSEventResult = CCGetEvent($this->PatientID_Footer->CCSEvents, "BeforeShow", $this->PatientID_Footer);
                            if ($this->PatientID_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section PatientID_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section PatientID_Footer", true, "Section Detail");
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

} //End hospitalisation_pregnancy Class @3-FCB6E20C

class clshospitalisation_pregnancyDataSource extends clsDBregistry_db {  //hospitalisation_pregnancyDataSource Class @3-86ECB653

//DataSource Variables @3-CD9D49C9
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $FacilityName;
    public $ReasonHospitalisationICD10ID;
    public $PatientID;
    public $FamilyName;
    public $GivenName;
    public $PregnancyRecNr;
    public $AdmissionDate;
    public $DischargeDate;
    public $Dapartment;
    public $Town;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-042DF26F
    function clshospitalisation_pregnancyDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report hospitalisation_pregnancy";
        $this->Initialize();
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->ReasonHospitalisationICD10ID = new clsField("ReasonHospitalisationICD10ID", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsText, "");
        
        $this->FamilyName = new clsField("FamilyName", ccsText, "");
        
        $this->GivenName = new clsField("GivenName", ccsText, "");
        
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->AdmissionDate = new clsField("AdmissionDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->DischargeDate = new clsField("DischargeDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Dapartment = new clsField("Dapartment", ccsText, "");
        
        $this->Town = new clsField("Town", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-684EFE0E
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_PregnancyRecNr" => array("PregnancyRecNr", ""), 
            "Sorter_ReasonHospitalisationICD10ID" => array("ReasonHospitalisationICD10ID", ""), 
            "Sorter_Town" => array("Town", ""), 
            "Sorter_PregnancyRecNr1" => array("FamilyName", ""), 
            "Sorter1" => array("GivenName", ""), 
            "Department" => array("DepartmentDesc", ""), 
            "Sorter2" => array("hospitalisation.DischargeDate", "hospitalisation.DischargeDate")));
    }
//End SetOrder Method

//Prepare Method @3-6F3B6084
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("2", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("3", "urls_AdmissionDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_AdmissionDate"], "", false);
        $this->wp->AddParameter("4", "urls_AdmissionDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_AdmissionDate1"], "", false);
        $this->wp->AddParameter("5", "urls_PregnancyRecNr", ccsText, "", "", $this->Parameters["urls_PregnancyRecNr"], "", false);
        $this->wp->AddParameter("6", "urls_FamilyName", ccsMemo, "", "", $this->Parameters["urls_FamilyName"], "", false);
        $this->wp->AddParameter("7", "urls_GivenName", ccsMemo, "", "", $this->Parameters["urls_GivenName"], "", false);
        $this->wp->AddParameter("8", "urls_DischargeDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DischargeDate"], "", false);
        $this->wp->AddParameter("9", "urls_DischargeDate2", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_DischargeDate2"], "", false);
        $this->wp->AddParameter("10", "urlDiagnose", ccsText, "", "", $this->Parameters["urlDiagnose"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opIn, "pregnancy.FacilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger, true),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opIn, "hospitalisation.FacilityID", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger, true),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opGreaterThanOrEqual, "hospitalisation.AdmissionDate", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsDate),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opLessThanOrEqual, "hospitalisation.AdmissionDate", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsDate),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "pregnancy.PregnancyRecNr", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "patient.FamilyName", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsMemo),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opContains, "patient.GivenName", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsMemo),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opGreaterThanOrEqual, "hospitalisation.DischargeDate", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsDate),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opLessThanOrEqual, "hospitalisation.DischargeDate", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsDate),false);
        $this->wp->Criterion[10] = $this->wp->Operation(opIn, "icd10_all.ICD10ID", $this->wp->GetDBValue("10"), $this->ToSQL($this->wp->GetDBValue("10"), ccsText, true),false);
        $this->Where = $this->wp->opAND(
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
             $this->wp->Criterion[10]);
    }
//End Prepare Method

//Open Method @3-0D45C0A8
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT GivenName, FamilyName, pregnancy.PregnancyID AS pregnancy_PregnancyID, hospitalisation.FacilityID AS hospitalisation_FacilityID,\n\n" .
        "AdmissionDate, facilities.FacilityID AS facilities_FacilityID, FacilityName, PregnancyRecNr, Town, patient.PatientID AS patient_PatientID,\n\n" .
        "CONCAT(icd10_all.ICD10ID,\" - \", DiseaseName) AS ReasonHospitalisationICD10ID, DepartmentDesc, icd10_all.DiseaseName AS icd10_all_DiseaseName,\n\n" .
        "DepartmentID, hospitalisation.DischargeDate AS hospitalisation_DischargeDate, hospitalisation.DischargeDate-AdmissionDate AS Expr1,\n\n" .
        "hospitalisation.HospitalisationID AS hospitalisation_HospitalisationID \n\n" .
        "FROM (((((hospitalisation LEFT JOIN facilities ON\n\n" .
        "hospitalisation.FacilityID = facilities.FacilityID) LEFT JOIN pregnancy ON\n\n" .
        "hospitalisation.PregnancyID = pregnancy.PregnancyID) INNER JOIN department ON\n\n" .
        "hospitalisation.DepartmentID = department.DeptID) LEFT JOIN hospitalisationdischargediagnosis ON\n\n" .
        "hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID) LEFT JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN icd10_all ON\n\n" .
        "hospitalisationdischargediagnosis.ICD10ID = icd10_all.ICD10ID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "facilities.FacilityName asc,hospitalisation.HospitalisationID asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-81DE55B9
    function SetValues()
    {
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->ReasonHospitalisationICD10ID->SetDBValue($this->f("ReasonHospitalisationICD10ID"));
        $this->PatientID->SetDBValue($this->f("patient_PatientID"));
        $this->FamilyName->SetDBValue($this->f("FamilyName"));
        $this->GivenName->SetDBValue($this->f("GivenName"));
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->AdmissionDate->SetDBValue(trim($this->f("AdmissionDate")));
        $this->DischargeDate->SetDBValue(trim($this->f("hospitalisation_DischargeDate")));
        $this->Dapartment->SetDBValue($this->f("DepartmentDesc"));
        $this->Town->SetDBValue($this->f("Town"));
    }
//End SetValues Method

} //End hospitalisation_pregnancyDataSource Class @3-FCB6E20C

class clsRecordfacilities_hospitalisatio { //facilities_hospitalisatio Class @28-0B493F6B

//Variables @28-9E315808

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

//Class_Initialize Event @28-403FE1DD
    function clsRecordfacilities_hospitalisatio($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record facilities_hospitalisatio/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "facilities_hospitalisatio";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_AdmissionDate = new clsControl(ccsTextBox, "s_AdmissionDate", $CCSLocales->GetText("AdmissionDate"), ccsDate, array("ShortDate"), CCGetRequestParam("s_AdmissionDate", $Method, NULL), $this);
            $this->DatePicker_s_AdmissionDate = new clsDatePicker("DatePicker_s_AdmissionDate", "facilities_hospitalisatio", "s_AdmissionDate", $this);
            $this->s_PregnancyRecNr = new clsControl(ccsTextBox, "s_PregnancyRecNr", "s_PregnancyRecNr", ccsText, "", CCGetRequestParam("s_PregnancyRecNr", $Method, NULL), $this);
            $this->s_FamilyName = new clsControl(ccsTextBox, "s_FamilyName", "s_FamilyName", ccsMemo, "", CCGetRequestParam("s_FamilyName", $Method, NULL), $this);
            $this->s_GivenName = new clsControl(ccsTextBox, "s_GivenName", "s_GivenName", ccsMemo, "", CCGetRequestParam("s_GivenName", $Method, NULL), $this);
            $this->s_AdmissionDate1 = new clsControl(ccsTextBox, "s_AdmissionDate1", $CCSLocales->GetText("AdmissionDate"), ccsDate, array("ShortDate"), CCGetRequestParam("s_AdmissionDate1", $Method, NULL), $this);
            $this->DatePicker_s_AdmissionDate1 = new clsDatePicker("DatePicker_s_AdmissionDate1", "facilities_hospitalisatio", "s_AdmissionDate1", $this);
            $this->s_DischargeDate = new clsControl(ccsTextBox, "s_DischargeDate", $CCSLocales->GetText("DischargeDate"), ccsDate, array("ShortDate"), CCGetRequestParam("s_DischargeDate", $Method, NULL), $this);
            $this->DatePicker_s_AdmissionDate2 = new clsDatePicker("DatePicker_s_AdmissionDate2", "facilities_hospitalisatio", "s_DischargeDate", $this);
            $this->s_DischargeDate2 = new clsControl(ccsTextBox, "s_DischargeDate2", $CCSLocales->GetText("DischargeDate"), ccsDate, array("ShortDate"), CCGetRequestParam("s_DischargeDate2", $Method, NULL), $this);
            $this->DatePicker_s_AdmissionDate3 = new clsDatePicker("DatePicker_s_AdmissionDate3", "facilities_hospitalisatio", "s_DischargeDate2", $this);
            $this->Diagnose = new clsControl(ccsListBox, "Diagnose", "Diagnose", ccsText, "", CCGetRequestParam("Diagnose", $Method, NULL), $this);
            $this->Diagnose->DSType = dsTable;
            $this->Diagnose->DataSource = new clsDBregistry_db();
            $this->Diagnose->ds = & $this->Diagnose->DataSource;
            $this->Diagnose->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID,\" - \", DiseaseName) AS ID_Name, ICD10ID \n" .
"FROM icd10_all {SQL_Where} {SQL_OrderBy}";
            $this->Diagnose->DataSource->Order = "ICD10ID";
            list($this->Diagnose->BoundColumn, $this->Diagnose->TextColumn, $this->Diagnose->DBFormat) = array("ICD10ID", "ID_Name", "");
            $this->Diagnose->DataSource->Order = "ICD10ID";
        }
    }
//End Class_Initialize Event

//Validate Method @28-F9D899AE
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_AdmissionDate->Validate() && $Validation);
        $Validation = ($this->s_PregnancyRecNr->Validate() && $Validation);
        $Validation = ($this->s_FamilyName->Validate() && $Validation);
        $Validation = ($this->s_GivenName->Validate() && $Validation);
        $Validation = ($this->s_AdmissionDate1->Validate() && $Validation);
        $Validation = ($this->s_DischargeDate->Validate() && $Validation);
        $Validation = ($this->s_DischargeDate2->Validate() && $Validation);
        $Validation = ($this->Diagnose->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_AdmissionDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PregnancyRecNr->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FamilyName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_GivenName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_AdmissionDate1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DischargeDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DischargeDate2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Diagnose->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @28-E596C5F3
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_AdmissionDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_AdmissionDate->Errors->Count());
        $errors = ($errors || $this->s_PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->s_FamilyName->Errors->Count());
        $errors = ($errors || $this->s_GivenName->Errors->Count());
        $errors = ($errors || $this->s_AdmissionDate1->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_AdmissionDate1->Errors->Count());
        $errors = ($errors || $this->s_DischargeDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_AdmissionDate2->Errors->Count());
        $errors = ($errors || $this->s_DischargeDate2->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_AdmissionDate3->Errors->Count());
        $errors = ($errors || $this->Diagnose->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @28-ED598703
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

//Operation Method @28-B580ADB0
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
        $Redirect = "report_hospitalisations.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_hospitalisations.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @28-CCA0786E
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

        $this->Diagnose->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_AdmissionDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_AdmissionDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FamilyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_GivenName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_AdmissionDate1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_AdmissionDate1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DischargeDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_AdmissionDate2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DischargeDate2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_AdmissionDate3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Diagnose->Errors->ToString());
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
        $this->s_AdmissionDate->Show();
        $this->DatePicker_s_AdmissionDate->Show();
        $this->s_PregnancyRecNr->Show();
        $this->s_FamilyName->Show();
        $this->s_GivenName->Show();
        $this->s_AdmissionDate1->Show();
        $this->DatePicker_s_AdmissionDate1->Show();
        $this->s_DischargeDate->Show();
        $this->DatePicker_s_AdmissionDate2->Show();
        $this->s_DischargeDate2->Show();
        $this->DatePicker_s_AdmissionDate3->Show();
        $this->Diagnose->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End facilities_hospitalisatio Class @28-FCB6E20C



//Initialize Page @1-C5AED65F
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
$TemplateFileName = "report_hospitalisations.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-13756179
CCSecurityRedirect("3", "noaccess.php");
//End Authenticate User

//Include events file @1-C6D35090
include_once("./report_hospitalisations_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-BF2BF2D2
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$hospitalisation_pregnancy = new clsReporthospitalisation_pregnancy("", $MainPage);
$facilities_hospitalisatio = new clsRecordfacilities_hospitalisatio("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_hospitalisations.php";
$MainPage->topmenu = & $topmenu;
$MainPage->hospitalisation_pregnancy = & $hospitalisation_pregnancy;
$MainPage->facilities_hospitalisatio = & $facilities_hospitalisatio;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$hospitalisation_pregnancy->Initialize();

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

//Execute Components @1-81E6CD9D
$topmenu->Operations();
$facilities_hospitalisatio->Operation();
//End Execute Components

//Go to destination page @1-88D47662
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($hospitalisation_pregnancy);
    unset($facilities_hospitalisatio);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-7696C1EB
$topmenu->Show();
$hospitalisation_pregnancy->Show();
$facilities_hospitalisatio->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-EEC5CBAE
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($hospitalisation_pregnancy);
unset($facilities_hospitalisatio);
unset($Tpl);
//End Unload Page


?>
