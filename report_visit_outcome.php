<?php
//Include Common Files @1-06944A29
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_visit_outcome.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//visit_referral_referralty1 ReportGroup class @95-9B3D888B
class clsReportGroupvisit_referral_referralty1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    public $TypeName, $_TypeNameAttributes;
    public $RefIndicationName, $_RefIndicationNameAttributes;
    public $FacilityName, $_FacilityNameAttributes;
    public $VisitDate, $_VisitDateAttributes;
    public $patient_PatientID, $_patient_PatientIDAttributes;
    public $FamilyName, $_FamilyNameAttributes;
    public $GivenName, $_GivenNameAttributes;
    public $Count_patient_PatientID2, $_Count_patient_PatientID2Attributes;
    public $Count_patient_PatientID1, $_Count_patient_PatientID1Attributes;
    public $Count_patient_PatientID, $_Count_patient_PatientIDAttributes;
    public $TotalCount_patient_PatientID, $_TotalCount_patient_PatientIDAttributes;
    public $Report_CurrentDate, $_Report_CurrentDateAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $TypeNameTotalIndex;
    public $RefIndicationNameTotalIndex;
    public $FacilityNameTotalIndex;

    function clsReportGroupvisit_referral_referralty1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->TypeName = $this->Parent->TypeName->Value;
        $this->RefIndicationName = $this->Parent->RefIndicationName->Value;
        $this->FacilityName = $this->Parent->FacilityName->Value;
        $this->VisitDate = $this->Parent->VisitDate->Value;
        $this->patient_PatientID = $this->Parent->patient_PatientID->Value;
        $this->FamilyName = $this->Parent->FamilyName->Value;
        $this->GivenName = $this->Parent->GivenName->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->Count_patient_PatientID2 = $this->Parent->Count_patient_PatientID2->GetTotalValue($mode);
        $this->Count_patient_PatientID1 = $this->Parent->Count_patient_PatientID1->GetTotalValue($mode);
        $this->Count_patient_PatientID = $this->Parent->Count_patient_PatientID->GetTotalValue($mode);
        $this->TotalCount_patient_PatientID = $this->Parent->TotalCount_patient_PatientID->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_Sorter_VisitDateAttributes = $this->Parent->Sorter_VisitDate->Attributes->GetAsArray();
        $this->_Sorter_patient_PatientIDAttributes = $this->Parent->Sorter_patient_PatientID->Attributes->GetAsArray();
        $this->_TypeNameAttributes = $this->Parent->TypeName->Attributes->GetAsArray();
        $this->_RefIndicationNameAttributes = $this->Parent->RefIndicationName->Attributes->GetAsArray();
        $this->_FacilityNameAttributes = $this->Parent->FacilityName->Attributes->GetAsArray();
        $this->_VisitDateAttributes = $this->Parent->VisitDate->Attributes->GetAsArray();
        $this->_patient_PatientIDAttributes = $this->Parent->patient_PatientID->Attributes->GetAsArray();
        $this->_FamilyNameAttributes = $this->Parent->FamilyName->Attributes->GetAsArray();
        $this->_GivenNameAttributes = $this->Parent->GivenName->Attributes->GetAsArray();
        $this->_Count_patient_PatientID2Attributes = $this->Parent->Count_patient_PatientID2->Attributes->GetAsArray();
        $this->_Count_patient_PatientID1Attributes = $this->Parent->Count_patient_PatientID1->Attributes->GetAsArray();
        $this->_Count_patient_PatientIDAttributes = $this->Parent->Count_patient_PatientID->Attributes->GetAsArray();
        $this->_TotalCount_patient_PatientIDAttributes = $this->Parent->TotalCount_patient_PatientID->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->Count_patient_PatientID2 = $this->Count_patient_PatientID2;
        $Header->_Count_patient_PatientID2Attributes = $this->_Count_patient_PatientID2Attributes;
        $Header->Count_patient_PatientID1 = $this->Count_patient_PatientID1;
        $Header->_Count_patient_PatientID1Attributes = $this->_Count_patient_PatientID1Attributes;
        $Header->Count_patient_PatientID = $this->Count_patient_PatientID;
        $Header->_Count_patient_PatientIDAttributes = $this->_Count_patient_PatientIDAttributes;
        $Header->TotalCount_patient_PatientID = $this->TotalCount_patient_PatientID;
        $Header->_TotalCount_patient_PatientIDAttributes = $this->_TotalCount_patient_PatientIDAttributes;
        $this->TypeName = $Header->TypeName;
        $Header->_TypeNameAttributes = $this->_TypeNameAttributes;
        $this->Parent->TypeName->Value = $Header->TypeName;
        $this->Parent->TypeName->Attributes->RestoreFromArray($Header->_TypeNameAttributes);
        $this->RefIndicationName = $Header->RefIndicationName;
        $Header->_RefIndicationNameAttributes = $this->_RefIndicationNameAttributes;
        $this->Parent->RefIndicationName->Value = $Header->RefIndicationName;
        $this->Parent->RefIndicationName->Attributes->RestoreFromArray($Header->_RefIndicationNameAttributes);
        $this->FacilityName = $Header->FacilityName;
        $Header->_FacilityNameAttributes = $this->_FacilityNameAttributes;
        $this->Parent->FacilityName->Value = $Header->FacilityName;
        $this->Parent->FacilityName->Attributes->RestoreFromArray($Header->_FacilityNameAttributes);
        $this->VisitDate = $Header->VisitDate;
        $Header->_VisitDateAttributes = $this->_VisitDateAttributes;
        $this->Parent->VisitDate->Value = $Header->VisitDate;
        $this->Parent->VisitDate->Attributes->RestoreFromArray($Header->_VisitDateAttributes);
        $this->patient_PatientID = $Header->patient_PatientID;
        $Header->_patient_PatientIDAttributes = $this->_patient_PatientIDAttributes;
        $this->Parent->patient_PatientID->Value = $Header->patient_PatientID;
        $this->Parent->patient_PatientID->Attributes->RestoreFromArray($Header->_patient_PatientIDAttributes);
        $this->FamilyName = $Header->FamilyName;
        $Header->_FamilyNameAttributes = $this->_FamilyNameAttributes;
        $this->Parent->FamilyName->Value = $Header->FamilyName;
        $this->Parent->FamilyName->Attributes->RestoreFromArray($Header->_FamilyNameAttributes);
        $this->GivenName = $Header->GivenName;
        $Header->_GivenNameAttributes = $this->_GivenNameAttributes;
        $this->Parent->GivenName->Value = $Header->GivenName;
        $this->Parent->GivenName->Attributes->RestoreFromArray($Header->_GivenNameAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Count_patient_PatientID2 = $this->Parent->Count_patient_PatientID2->GetValue();
        $this->Count_patient_PatientID1 = $this->Parent->Count_patient_PatientID1->GetValue();
        $this->Count_patient_PatientID = $this->Parent->Count_patient_PatientID->GetValue();
        $this->TotalCount_patient_PatientID = $this->Parent->TotalCount_patient_PatientID->GetValue();
    }
}
//End visit_referral_referralty1 ReportGroup class

//visit_referral_referralty1 GroupsCollection class @95-C5D18C68
class clsGroupsCollectionvisit_referral_referralty1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mTypeNameCurrentHeaderIndex;
    public $mRefIndicationNameCurrentHeaderIndex;
    public $mFacilityNameCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionvisit_referral_referralty1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mTypeNameCurrentHeaderIndex = 1;
        $this->mRefIndicationNameCurrentHeaderIndex = 2;
        $this->mFacilityNameCurrentHeaderIndex = 3;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupvisit_referral_referralty1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->TypeNameTotalIndex = $this->mTypeNameCurrentHeaderIndex;
        $group->RefIndicationNameTotalIndex = $this->mRefIndicationNameCurrentHeaderIndex;
        $group->FacilityNameTotalIndex = $this->mFacilityNameCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->TypeName->Value = $this->Parent->TypeName->initialValue;
        $this->Parent->RefIndicationName->Value = $this->Parent->RefIndicationName->initialValue;
        $this->Parent->FacilityName->Value = $this->Parent->FacilityName->initialValue;
        $this->Parent->VisitDate->Value = $this->Parent->VisitDate->initialValue;
        $this->Parent->patient_PatientID->Value = $this->Parent->patient_PatientID->initialValue;
        $this->Parent->FamilyName->Value = $this->Parent->FamilyName->initialValue;
        $this->Parent->GivenName->Value = $this->Parent->GivenName->initialValue;
        $this->Parent->Count_patient_PatientID2->Value = $this->Parent->Count_patient_PatientID2->initialValue;
        $this->Parent->Count_patient_PatientID1->Value = $this->Parent->Count_patient_PatientID1->initialValue;
        $this->Parent->Count_patient_PatientID->Value = $this->Parent->Count_patient_PatientID->initialValue;
        $this->Parent->TotalCount_patient_PatientID->Value = $this->Parent->TotalCount_patient_PatientID->initialValue;
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
        if ($groupName == "TypeName") {
            $GroupTypeName = & $this->InitGroup(true);
            $this->Parent->TypeName_Header->CCSEventResult = CCGetEvent($this->Parent->TypeName_Header->CCSEvents, "OnInitialize", $this->Parent->TypeName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->TypeName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->TypeName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->TypeName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->TypeName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->TypeName_Header->Height;
                $GroupTypeName->SetTotalControls("GetNextValue");
            $this->Parent->TypeName_Header->CCSEventResult = CCGetEvent($this->Parent->TypeName_Header->CCSEvents, "OnCalculate", $this->Parent->TypeName_Header);
            $GroupTypeName->SetControls();
            $GroupTypeName->Mode = 1;
            $OpenFlag = true;
            $GroupTypeName->GroupType = "TypeName";
            $this->mTypeNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupTypeName;
            $this->Parent->Count_patient_PatientID->Reset();
        }
        if ($groupName == "RefIndicationName" or $OpenFlag) {
            $GroupRefIndicationName = & $this->InitGroup(true);
            $this->Parent->RefIndicationName_Header->CCSEventResult = CCGetEvent($this->Parent->RefIndicationName_Header->CCSEvents, "OnInitialize", $this->Parent->RefIndicationName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->RefIndicationName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->RefIndicationName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->RefIndicationName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->RefIndicationName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->RefIndicationName_Header->Height;
                $GroupRefIndicationName->SetTotalControls("GetNextValue");
            $this->Parent->RefIndicationName_Header->CCSEventResult = CCGetEvent($this->Parent->RefIndicationName_Header->CCSEvents, "OnCalculate", $this->Parent->RefIndicationName_Header);
            $GroupRefIndicationName->SetControls();
            $GroupRefIndicationName->Mode = 1;
            $OpenFlag = true;
            $GroupRefIndicationName->GroupType = "RefIndicationName";
            $this->mRefIndicationNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupRefIndicationName;
            $this->Parent->Count_patient_PatientID1->Reset();
        }
        if ($groupName == "FacilityName" or $OpenFlag) {
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
            $this->Parent->Count_patient_PatientID2->Reset();
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
        $this->Parent->Count_patient_PatientID2->Reset();
        $this->RestoreValues();
        $GroupFacilityName->Mode = 2;
        $GroupFacilityName->GroupType ="FacilityName";
        $this->Groups[] = & $GroupFacilityName;
        if ($groupName == "FacilityName") return;
        $GroupRefIndicationName = & $this->InitGroup(true);
        $this->Parent->RefIndicationName_Footer->CCSEventResult = CCGetEvent($this->Parent->RefIndicationName_Footer->CCSEvents, "OnInitialize", $this->Parent->RefIndicationName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->RefIndicationName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->RefIndicationName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->RefIndicationName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupRefIndicationName->SetTotalControls("GetPrevValue");
        $GroupRefIndicationName->SyncWithHeader($this->Groups[$this->mRefIndicationNameCurrentHeaderIndex]);
        if ($this->Parent->RefIndicationName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->RefIndicationName_Footer->Height;
        $this->Parent->RefIndicationName_Footer->CCSEventResult = CCGetEvent($this->Parent->RefIndicationName_Footer->CCSEvents, "OnCalculate", $this->Parent->RefIndicationName_Footer);
        $GroupRefIndicationName->SetControls();
        $this->Parent->Count_patient_PatientID1->Reset();
        $this->RestoreValues();
        $GroupRefIndicationName->Mode = 2;
        $GroupRefIndicationName->GroupType ="RefIndicationName";
        $this->Groups[] = & $GroupRefIndicationName;
        if ($groupName == "RefIndicationName") return;
        $GroupTypeName = & $this->InitGroup(true);
        $this->Parent->TypeName_Footer->CCSEventResult = CCGetEvent($this->Parent->TypeName_Footer->CCSEvents, "OnInitialize", $this->Parent->TypeName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->TypeName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->TypeName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->TypeName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupTypeName->SetTotalControls("GetPrevValue");
        $GroupTypeName->SyncWithHeader($this->Groups[$this->mTypeNameCurrentHeaderIndex]);
        if ($this->Parent->TypeName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->TypeName_Footer->Height;
        $this->Parent->TypeName_Footer->CCSEventResult = CCGetEvent($this->Parent->TypeName_Footer->CCSEvents, "OnCalculate", $this->Parent->TypeName_Footer);
        $GroupTypeName->SetControls();
        $this->Parent->Count_patient_PatientID->Reset();
        $this->RestoreValues();
        $GroupTypeName->Mode = 2;
        $GroupTypeName->GroupType ="TypeName";
        $this->Groups[] = & $GroupTypeName;
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
//End visit_referral_referralty1 GroupsCollection class

class clsReportvisit_referral_referralty1 { //visit_referral_referralty1 Class @95-D20A82B8

//visit_referral_referralty1 Variables @95-394D11B0

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
    public $TypeName_HeaderBlock, $TypeName_Header;
    public $TypeName_FooterBlock, $TypeName_Footer;
    public $RefIndicationName_HeaderBlock, $RefIndicationName_Header;
    public $RefIndicationName_FooterBlock, $RefIndicationName_Footer;
    public $FacilityName_HeaderBlock, $FacilityName_Header;
    public $FacilityName_FooterBlock, $FacilityName_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = true;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $TypeName_HeaderControls, $TypeName_FooterControls;
    public $RefIndicationName_HeaderControls, $RefIndicationName_FooterControls;
    public $FacilityName_HeaderControls, $FacilityName_FooterControls;
    public $Sorter_VisitDate;
    public $Sorter_patient_PatientID;
//End visit_referral_referralty1 Variables

//Class_Initialize Event @95-AFF2AA03
    function clsReportvisit_referral_referralty1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "visit_referral_referralty1";
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
        $this->TypeName_Footer = new clsSection($this);
        $this->TypeName_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->TypeName_Footer->Height);
        $this->TypeName_Header = new clsSection($this);
        $this->TypeName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->TypeName_Header->Height);
        $this->RefIndicationName_Footer = new clsSection($this);
        $this->RefIndicationName_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->RefIndicationName_Footer->Height);
        $this->RefIndicationName_Header = new clsSection($this);
        $this->RefIndicationName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->RefIndicationName_Header->Height);
        $this->FacilityName_Footer = new clsSection($this);
        $this->FacilityName_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->FacilityName_Footer->Height);
        $this->FacilityName_Header = new clsSection($this);
        $this->FacilityName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->FacilityName_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsvisit_referral_referralty1DataSource($this);
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
        $this->SorterName = CCGetParam("visit_referral_referralty1Order", "");
        $this->SorterDirection = CCGetParam("visit_referral_referralty1Dir", "");

        $this->Report_TotalRecords = new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->Sorter_VisitDate = new clsSorter($this->ComponentName, "Sorter_VisitDate", $FileName, $this);
        $this->Sorter_patient_PatientID = new clsSorter($this->ComponentName, "Sorter_patient_PatientID", $FileName, $this);
        $this->TypeName = new clsControl(ccsReportLabel, "TypeName", "TypeName", ccsText, "", "", $this);
        $this->RefIndicationName = new clsControl(ccsReportLabel, "RefIndicationName", "RefIndicationName", ccsText, "", "", $this);
        $this->FacilityName = new clsControl(ccsReportLabel, "FacilityName", "FacilityName", ccsText, "", "", $this);
        $this->VisitDate = new clsControl(ccsReportLabel, "VisitDate", "VisitDate", ccsDate, array("ShortDate"), "", $this);
        $this->patient_PatientID = new clsControl(ccsReportLabel, "patient_PatientID", "patient_PatientID", ccsInteger, "", "", $this);
        $this->FamilyName = new clsControl(ccsReportLabel, "FamilyName", "FamilyName", ccsMemo, "", "", $this);
        $this->GivenName = new clsControl(ccsReportLabel, "GivenName", "GivenName", ccsMemo, "", "", $this);
        $this->Count_patient_PatientID2 = new clsControl(ccsReportLabel, "Count_patient_PatientID2", "Count_patient_PatientID2", ccsInteger, "", 0, $this);
        $this->Count_patient_PatientID2->TotalFunction = "Count";
        $this->Count_patient_PatientID2->IsEmptySource = true;
        $this->Count_patient_PatientID1 = new clsControl(ccsReportLabel, "Count_patient_PatientID1", "Count_patient_PatientID1", ccsInteger, "", 0, $this);
        $this->Count_patient_PatientID1->TotalFunction = "Count";
        $this->Count_patient_PatientID1->IsEmptySource = true;
        $this->Count_patient_PatientID = new clsControl(ccsReportLabel, "Count_patient_PatientID", "Count_patient_PatientID", ccsInteger, "", 0, $this);
        $this->Count_patient_PatientID->TotalFunction = "Count";
        $this->Count_patient_PatientID->IsEmptySource = true;
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalCount_patient_PatientID = new clsControl(ccsReportLabel, "TotalCount_patient_PatientID", "TotalCount_patient_PatientID", ccsInteger, "", 0, $this);
        $this->TotalCount_patient_PatientID->TotalFunction = "Count";
        $this->TotalCount_patient_PatientID->IsEmptySource = true;
        $this->Report_CurrentDate = new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @95-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @95-877D7DA7
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->TypeName->Errors->Count());
        $errors = ($errors || $this->RefIndicationName->Errors->Count());
        $errors = ($errors || $this->FacilityName->Errors->Count());
        $errors = ($errors || $this->VisitDate->Errors->Count());
        $errors = ($errors || $this->patient_PatientID->Errors->Count());
        $errors = ($errors || $this->FamilyName->Errors->Count());
        $errors = ($errors || $this->GivenName->Errors->Count());
        $errors = ($errors || $this->Count_patient_PatientID2->Errors->Count());
        $errors = ($errors || $this->Count_patient_PatientID1->Errors->Count());
        $errors = ($errors || $this->Count_patient_PatientID->Errors->Count());
        $errors = ($errors || $this->TotalCount_patient_PatientID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @95-4452F00A
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TypeName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RefIndicationName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VisitDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->patient_PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FamilyName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GivenName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_patient_PatientID2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_patient_PatientID1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_patient_PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_patient_PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @95-13CA823F
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_patient_PatientID"] = CCGetFromGet("s_patient_PatientID", NULL);
        $this->DataSource->Parameters["urls_FamilyName"] = CCGetFromGet("s_FamilyName", NULL);
        $this->DataSource->Parameters["urls_GivenName"] = CCGetFromGet("s_GivenName", NULL);
        $this->DataSource->Parameters["urls_VisitDate"] = CCGetFromGet("s_VisitDate", NULL);
        $this->DataSource->Parameters["urls_VisitDate1"] = CCGetFromGet("s_VisitDate1", NULL);
        $this->DataSource->Parameters["urls_TypeName"] = CCGetFromGet("s_TypeName", NULL);
        $this->DataSource->Parameters["urls_RefIndicationName"] = CCGetFromGet("s_RefIndicationName", NULL);
        $this->DataSource->Parameters["urls_FacilityName"] = CCGetFromGet("s_FacilityName", NULL);
        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $TypeNameKey = "";
        $RefIndicationNameKey = "";
        $FacilityNameKey = "";
        $Groups = new clsGroupsCollectionvisit_referral_referralty1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TypeName->SetValue($this->DataSource->TypeName->GetValue());
            $this->RefIndicationName->SetValue($this->DataSource->RefIndicationName->GetValue());
            $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
            $this->VisitDate->SetValue($this->DataSource->VisitDate->GetValue());
            $this->patient_PatientID->SetValue($this->DataSource->patient_PatientID->GetValue());
            $this->FamilyName->SetValue($this->DataSource->FamilyName->GetValue());
            $this->GivenName->SetValue($this->DataSource->GivenName->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            $this->Count_patient_PatientID2->SetValue(1);
            $this->Count_patient_PatientID1->SetValue(1);
            $this->Count_patient_PatientID->SetValue(1);
            $this->TotalCount_patient_PatientID->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $TypeNameKey != $this->DataSource->f("TypeName")) {
                $Groups->OpenGroup("TypeName");
            } elseif ($RefIndicationNameKey != $this->DataSource->f("RefIndicationName")) {
                $Groups->OpenGroup("RefIndicationName");
            } elseif ($FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->OpenGroup("FacilityName");
            }
            $Groups->AddItem();
            $TypeNameKey = $this->DataSource->f("TypeName");
            $RefIndicationNameKey = $this->DataSource->f("RefIndicationName");
            $FacilityNameKey = $this->DataSource->f("FacilityName");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $TypeNameKey != $this->DataSource->f("TypeName")) {
                $Groups->CloseGroup("TypeName");
            } elseif ($RefIndicationNameKey != $this->DataSource->f("RefIndicationName")) {
                $Groups->CloseGroup("RefIndicationName");
            } elseif ($FacilityNameKey != $this->DataSource->f("FacilityName")) {
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
            $this->ControlsVisible["TypeName"] = $this->TypeName->Visible;
            $this->ControlsVisible["RefIndicationName"] = $this->RefIndicationName->Visible;
            $this->ControlsVisible["FacilityName"] = $this->FacilityName->Visible;
            $this->ControlsVisible["VisitDate"] = $this->VisitDate->Visible;
            $this->ControlsVisible["patient_PatientID"] = $this->patient_PatientID->Visible;
            $this->ControlsVisible["FamilyName"] = $this->FamilyName->Visible;
            $this->ControlsVisible["GivenName"] = $this->GivenName->Visible;
            $this->ControlsVisible["Count_patient_PatientID2"] = $this->Count_patient_PatientID2->Visible;
            $this->ControlsVisible["Count_patient_PatientID1"] = $this->Count_patient_PatientID1->Visible;
            $this->ControlsVisible["Count_patient_PatientID"] = $this->Count_patient_PatientID->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->VisitDate->SetValue($items[$i]->VisitDate);
                        $this->VisitDate->Attributes->RestoreFromArray($items[$i]->_VisitDateAttributes);
                        $this->patient_PatientID->SetValue($items[$i]->patient_PatientID);
                        $this->patient_PatientID->Attributes->RestoreFromArray($items[$i]->_patient_PatientIDAttributes);
                        $this->FamilyName->SetValue($items[$i]->FamilyName);
                        $this->FamilyName->Attributes->RestoreFromArray($items[$i]->_FamilyNameAttributes);
                        $this->GivenName->SetValue($items[$i]->GivenName);
                        $this->GivenName->Attributes->RestoreFromArray($items[$i]->_GivenNameAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->VisitDate->Show();
                        $this->patient_PatientID->Show();
                        $this->FamilyName->Show();
                        $this->GivenName->Show();
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
                            $this->TotalCount_patient_PatientID->SetValue($items[$i]->TotalCount_patient_PatientID);
                            $this->TotalCount_patient_PatientID->Attributes->RestoreFromArray($items[$i]->_TotalCount_patient_PatientIDAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalCount_patient_PatientID->Show();
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
                                $this->Sorter_VisitDate->Show();
                                $this->Sorter_patient_PatientID->Show();
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
                    case "TypeName":
                        if ($items[$i]->Mode == 1) {
                            $this->TypeName->SetValue($items[$i]->TypeName);
                            $this->TypeName->Attributes->RestoreFromArray($items[$i]->_TypeNameAttributes);
                            $this->TypeName_Header->CCSEventResult = CCGetEvent($this->TypeName_Header->CCSEvents, "BeforeShow", $this->TypeName_Header);
                            if ($this->TypeName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section TypeName_Header";
                                $this->Attributes->Show();
                                $this->TypeName->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section TypeName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Count_patient_PatientID->SetValue($items[$i]->Count_patient_PatientID);
                            $this->Count_patient_PatientID->Attributes->RestoreFromArray($items[$i]->_Count_patient_PatientIDAttributes);
                            $this->TypeName_Footer->CCSEventResult = CCGetEvent($this->TypeName_Footer->CCSEvents, "BeforeShow", $this->TypeName_Footer);
                            if ($this->TypeName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section TypeName_Footer";
                                $this->Count_patient_PatientID->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section TypeName_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "RefIndicationName":
                        if ($items[$i]->Mode == 1) {
                            $this->RefIndicationName->SetValue($items[$i]->RefIndicationName);
                            $this->RefIndicationName->Attributes->RestoreFromArray($items[$i]->_RefIndicationNameAttributes);
                            $this->RefIndicationName_Header->CCSEventResult = CCGetEvent($this->RefIndicationName_Header->CCSEvents, "BeforeShow", $this->RefIndicationName_Header);
                            if ($this->RefIndicationName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section RefIndicationName_Header";
                                $this->Attributes->Show();
                                $this->RefIndicationName->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section RefIndicationName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Count_patient_PatientID1->SetValue($items[$i]->Count_patient_PatientID1);
                            $this->Count_patient_PatientID1->Attributes->RestoreFromArray($items[$i]->_Count_patient_PatientID1Attributes);
                            $this->RefIndicationName_Footer->CCSEventResult = CCGetEvent($this->RefIndicationName_Footer->CCSEvents, "BeforeShow", $this->RefIndicationName_Footer);
                            if ($this->RefIndicationName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section RefIndicationName_Footer";
                                $this->Count_patient_PatientID1->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section RefIndicationName_Footer", true, "Section Detail");
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
                            $this->Count_patient_PatientID2->SetValue($items[$i]->Count_patient_PatientID2);
                            $this->Count_patient_PatientID2->Attributes->RestoreFromArray($items[$i]->_Count_patient_PatientID2Attributes);
                            $this->FacilityName_Footer->CCSEventResult = CCGetEvent($this->FacilityName_Footer->CCSEvents, "BeforeShow", $this->FacilityName_Footer);
                            if ($this->FacilityName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FacilityName_Footer";
                                $this->Count_patient_PatientID2->Show();
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

} //End visit_referral_referralty1 Class @95-FCB6E20C

class clsvisit_referral_referralty1DataSource extends clsDBregistry_db {  //visit_referral_referralty1DataSource Class @95-8A29DBE8

//DataSource Variables @95-B677A1DD
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $TypeName;
    public $RefIndicationName;
    public $FacilityName;
    public $VisitDate;
    public $patient_PatientID;
    public $FamilyName;
    public $GivenName;
//End DataSource Variables

//DataSourceClass_Initialize Event @95-16E04DAF
    function clsvisit_referral_referralty1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report visit_referral_referralty1";
        $this->Initialize();
        $this->TypeName = new clsField("TypeName", ccsText, "");
        
        $this->RefIndicationName = new clsField("RefIndicationName", ccsText, "");
        
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->VisitDate = new clsField("VisitDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->patient_PatientID = new clsField("patient_PatientID", ccsInteger, "");
        
        $this->FamilyName = new clsField("FamilyName", ccsMemo, "");
        
        $this->GivenName = new clsField("GivenName", ccsMemo, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @95-27A8A680
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_VisitDate" => array("VisitDate", ""), 
            "Sorter_patient_PatientID" => array("patient.PatientID", "")));
    }
//End SetOrder Method

//Prepare Method @95-F59BC76E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_patient_PatientID", ccsInteger, "", "", $this->Parameters["urls_patient_PatientID"], "", false);
        $this->wp->AddParameter("2", "urls_FamilyName", ccsMemo, "", "", $this->Parameters["urls_FamilyName"], "", false);
        $this->wp->AddParameter("3", "urls_GivenName", ccsMemo, "", "", $this->Parameters["urls_GivenName"], "", false);
        $this->wp->AddParameter("4", "urls_VisitDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_VisitDate"], "", false);
        $this->wp->AddParameter("5", "urls_VisitDate1", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Parameters["urls_VisitDate1"], "", false);
        $this->wp->AddParameter("6", "urls_TypeName", ccsText, "", "", $this->Parameters["urls_TypeName"], "", false);
        $this->wp->AddParameter("7", "urls_RefIndicationName", ccsText, "", "", $this->Parameters["urls_RefIndicationName"], "", false);
        $this->wp->AddParameter("8", "urls_FacilityName", ccsText, "", "", $this->Parameters["urls_FacilityName"], "", false);
        $this->wp->AddParameter("9", "sess_Facilities", ccsInteger, "", "", $this->Parameters["sess_Facilities"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "patient.PatientID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "patient.FamilyName", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsMemo),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "patient.GivenName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsMemo),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opGreaterThanOrEqual, "visit.VisitDate", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsDate),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opLessThanOrEqual, "visit.VisitDate", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsDate),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "referraltype.TypeName", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opContains, "refindication.RefIndicationName", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsText),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opContains, "facilities.FacilityName", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsText),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opIn, "facilities1.FacilityID", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsInteger, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), $this->wp->opAND(
             true, 
             $this->wp->Criterion[4], 
             $this->wp->Criterion[5])), 
             $this->wp->Criterion[6]), 
             $this->wp->Criterion[7]), 
             $this->wp->Criterion[8]), 
             $this->wp->Criterion[9]);
    }
//End Prepare Method

//Open Method @95-DE11D571
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT VisitDate, RefIndicationName, TypeName, facilities.FacilityName AS facilities_FacilityName, patient.PatientID AS patient_PatientID,\n\n" .
        "FamilyName, GivenName, facilities1.FacilityID AS facilities1_FacilityID \n\n" .
        "FROM ((((((visit INNER JOIN referral ON\n\n" .
        "referral.VisitID = visit.VisitID) INNER JOIN pregnancy ON\n\n" .
        "visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN facilities facilities1 ON\n\n" .
        "visit.FacilityID = facilities1.FacilityID) INNER JOIN referraltype ON\n\n" .
        "referral.ReferralTypeID = referraltype.ReferralTypeID) INNER JOIN refindication ON\n\n" .
        "referral.IndicationID = refindication.IndicationID) INNER JOIN facilities ON\n\n" .
        "referral.FacilityID = facilities.FacilityID) INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "referraltype.TypeName asc,refindication.RefIndicationName asc,facilities.FacilityName asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @95-0A909231
    function SetValues()
    {
        $this->TypeName->SetDBValue($this->f("TypeName"));
        $this->RefIndicationName->SetDBValue($this->f("RefIndicationName"));
        $this->FacilityName->SetDBValue($this->f("facilities_FacilityName"));
        $this->VisitDate->SetDBValue(trim($this->f("VisitDate")));
        $this->patient_PatientID->SetDBValue(trim($this->f("patient_PatientID")));
        $this->FamilyName->SetDBValue($this->f("FamilyName"));
        $this->GivenName->SetDBValue($this->f("GivenName"));
    }
//End SetValues Method

} //End visit_referral_referralty1DataSource Class @95-FCB6E20C

class clsRecordfacilities_patient_pregna { //facilities_patient_pregna Class @136-65825752

//Variables @136-9E315808

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

//Class_Initialize Event @136-15A547AC
    function clsRecordfacilities_patient_pregna($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record facilities_patient_pregna/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "facilities_patient_pregna";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_patient_PatientID = new clsControl(ccsTextBox, "s_patient_PatientID", "s_patient_PatientID", ccsInteger, "", CCGetRequestParam("s_patient_PatientID", $Method, NULL), $this);
            $this->s_FamilyName = new clsControl(ccsTextBox, "s_FamilyName", "s_FamilyName", ccsMemo, "", CCGetRequestParam("s_FamilyName", $Method, NULL), $this);
            $this->s_GivenName = new clsControl(ccsTextBox, "s_GivenName", "s_GivenName", ccsMemo, "", CCGetRequestParam("s_GivenName", $Method, NULL), $this);
            $this->s_VisitDate = new clsControl(ccsTextBox, "s_VisitDate", "s_VisitDate", ccsDate, array("ShortDate"), CCGetRequestParam("s_VisitDate", $Method, NULL), $this);
            $this->DatePicker_s_VisitDate = new clsDatePicker("DatePicker_s_VisitDate", "facilities_patient_pregna", "s_VisitDate", $this);
            $this->s_TypeName = new clsControl(ccsListBox, "s_TypeName", "s_TypeName", ccsText, "", CCGetRequestParam("s_TypeName", $Method, NULL), $this);
            $this->s_TypeName->DSType = dsTable;
            $this->s_TypeName->DataSource = new clsDBregistry_db();
            $this->s_TypeName->ds = & $this->s_TypeName->DataSource;
            $this->s_TypeName->DataSource->SQL = "SELECT * \n" .
"FROM referraltype {SQL_Where} {SQL_OrderBy}";
            list($this->s_TypeName->BoundColumn, $this->s_TypeName->TextColumn, $this->s_TypeName->DBFormat) = array("TypeName", "TypeName", "");
            $this->s_RefIndicationName = new clsControl(ccsListBox, "s_RefIndicationName", "s_RefIndicationName", ccsText, "", CCGetRequestParam("s_RefIndicationName", $Method, NULL), $this);
            $this->s_RefIndicationName->DSType = dsTable;
            $this->s_RefIndicationName->DataSource = new clsDBregistry_db();
            $this->s_RefIndicationName->ds = & $this->s_RefIndicationName->DataSource;
            $this->s_RefIndicationName->DataSource->SQL = "SELECT * \n" .
"FROM refindication {SQL_Where} {SQL_OrderBy}";
            list($this->s_RefIndicationName->BoundColumn, $this->s_RefIndicationName->TextColumn, $this->s_RefIndicationName->DBFormat) = array("RefIndicationName", "RefIndicationName", "");
            $this->s_FacilityName = new clsControl(ccsListBox, "s_FacilityName", "s_FacilityName", ccsText, "", CCGetRequestParam("s_FacilityName", $Method, NULL), $this);
            $this->s_FacilityName->DSType = dsTable;
            $this->s_FacilityName->DataSource = new clsDBregistry_db();
            $this->s_FacilityName->ds = & $this->s_FacilityName->DataSource;
            $this->s_FacilityName->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            list($this->s_FacilityName->BoundColumn, $this->s_FacilityName->TextColumn, $this->s_FacilityName->DBFormat) = array("FacilityName", "FacilityName", "");
            $this->s_VisitDate1 = new clsControl(ccsTextBox, "s_VisitDate1", "s_VisitDate1", ccsDate, array("ShortDate"), CCGetRequestParam("s_VisitDate1", $Method, NULL), $this);
            $this->DatePicker_s_VisitDate1 = new clsDatePicker("DatePicker_s_VisitDate1", "facilities_patient_pregna", "s_VisitDate1", $this);
        }
    }
//End Class_Initialize Event

//Validate Method @136-8872E24C
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_patient_PatientID->Validate() && $Validation);
        $Validation = ($this->s_FamilyName->Validate() && $Validation);
        $Validation = ($this->s_GivenName->Validate() && $Validation);
        $Validation = ($this->s_VisitDate->Validate() && $Validation);
        $Validation = ($this->s_TypeName->Validate() && $Validation);
        $Validation = ($this->s_RefIndicationName->Validate() && $Validation);
        $Validation = ($this->s_FacilityName->Validate() && $Validation);
        $Validation = ($this->s_VisitDate1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_patient_PatientID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FamilyName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_GivenName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_VisitDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_TypeName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_RefIndicationName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FacilityName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_VisitDate1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @136-EB57B780
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_patient_PatientID->Errors->Count());
        $errors = ($errors || $this->s_FamilyName->Errors->Count());
        $errors = ($errors || $this->s_GivenName->Errors->Count());
        $errors = ($errors || $this->s_VisitDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_VisitDate->Errors->Count());
        $errors = ($errors || $this->s_TypeName->Errors->Count());
        $errors = ($errors || $this->s_RefIndicationName->Errors->Count());
        $errors = ($errors || $this->s_FacilityName->Errors->Count());
        $errors = ($errors || $this->s_VisitDate1->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_VisitDate1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @136-ED598703
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

//Operation Method @136-7154A319
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
        $Redirect = "report_visit_outcome.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_visit_outcome.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @136-9C992131
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

        $this->s_TypeName->Prepare();
        $this->s_RefIndicationName->Prepare();
        $this->s_FacilityName->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_patient_PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FamilyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_GivenName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_VisitDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_VisitDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_TypeName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_RefIndicationName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FacilityName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_VisitDate1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_VisitDate1->Errors->ToString());
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
        $this->s_patient_PatientID->Show();
        $this->s_FamilyName->Show();
        $this->s_GivenName->Show();
        $this->s_VisitDate->Show();
        $this->DatePicker_s_VisitDate->Show();
        $this->s_TypeName->Show();
        $this->s_RefIndicationName->Show();
        $this->s_FacilityName->Show();
        $this->s_VisitDate1->Show();
        $this->DatePicker_s_VisitDate1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End facilities_patient_pregna Class @136-FCB6E20C

//Initialize Page @1-8D3B9DA5
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
$TemplateFileName = "report_visit_outcome.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Include events file @1-5BA1782A
include_once("./report_visit_outcome_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-4F13076E
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$visit_referral_referralty1 = new clsReportvisit_referral_referralty1("", $MainPage);
$facilities_patient_pregna = new clsRecordfacilities_patient_pregna("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_visit_outcome.php";
$MainPage->topmenu = & $topmenu;
$MainPage->visit_referral_referralty1 = & $visit_referral_referralty1;
$MainPage->facilities_patient_pregna = & $facilities_patient_pregna;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$visit_referral_referralty1->Initialize();

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

//Execute Components @1-62F2AF5B
$topmenu->Operations();
$facilities_patient_pregna->Operation();
//End Execute Components

//Go to destination page @1-510CF109
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($visit_referral_referralty1);
    unset($facilities_patient_pregna);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-97FE573D
$topmenu->Show();
$visit_referral_referralty1->Show();
$facilities_patient_pregna->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-53B2196A
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($visit_referral_referralty1);
unset($facilities_patient_pregna);
unset($Tpl);
//End Unload Page


?>
