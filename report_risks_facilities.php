<?php
//Include Common Files @1-D16D6E2E
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_risks_facilities.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordReport2 { //Report2 Class @3-40449E32

//Variables @3-9E315808

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

//Class_Initialize Event @3-AE9FEEAB
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
        $this->Visible = (CCSecurityAccessCheck("3") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "3");
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
            $this->s_PregnancyRecNr = new clsControl(ccsTextBox, "s_PregnancyRecNr", "s_PregnancyRecNr", ccsText, "", CCGetRequestParam("s_PregnancyRecNr", $Method, NULL), $this);
            $this->s_PatientID = new clsControl(ccsTextBox, "s_PatientID", $CCSLocales->GetText("PatientID"), ccsInteger, "", CCGetRequestParam("s_PatientID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-160E951D
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_PregnancyRecNr->Validate() && $Validation);
        $Validation = ($this->s_PatientID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_PregnancyRecNr->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PatientID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-2BDFF344
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->s_PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @3-ED598703
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

//Operation Method @3-5E3FBCDF
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
        $Redirect = "report_risks_facilities.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_risks_facilities.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-4B0B70B3
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
            $Error = ComposeStrings($Error, $this->s_PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PatientID->Errors->ToString());
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
        $this->s_PregnancyRecNr->Show();
        $this->s_PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End Report2 Class @3-FCB6E20C

//Report1 ReportGroup class @72-6E546DC6
class clsReportGroupReport1 {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $PatientID, $_PatientIDPage, $_PatientIDParameters, $_PatientIDAttributes;
    public $FamilyName, $_FamilyNameAttributes;
    public $GivenName, $_GivenNameAttributes;
    public $PregnancyRecNr, $_PregnancyRecNrPage, $_PregnancyRecNrParameters, $_PregnancyRecNrAttributes;
    public $Abnormal_Test_Results, $_Abnormal_Test_ResultsAttributes;
    public $Bad_Habits, $_Bad_HabitsAttributes;
    public $Medical_Anamnesis, $_Medical_AnamnesisAttributes;
    public $Antenatal_Problems, $_Antenatal_ProblemsAttributes;
    public $Hospitalisation_Admission, $_Hospitalisation_AdmissionAttributes;
    public $Hospitalisation_Discharge, $_Hospitalisation_DischargeAttributes;
    public $Report_CurrentDateTime, $_Report_CurrentDateTimeAttributes;
    public $Report_CurrentPage, $_Report_CurrentPageAttributes;
    public $Report_TotalPages, $_Report_TotalPagesAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $PatientIDTotalIndex;
    public $FamilyNameTotalIndex;
    public $GivenNameTotalIndex;
    public $PregnancyRecNrTotalIndex;

    function clsReportGroupReport1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->PatientID = $this->Parent->PatientID->Value;
        $this->FamilyName = $this->Parent->FamilyName->Value;
        $this->GivenName = $this->Parent->GivenName->Value;
        $this->PregnancyRecNr = $this->Parent->PregnancyRecNr->Value;
        $this->Abnormal_Test_Results = $this->Parent->Abnormal_Test_Results->Value;
        $this->Bad_Habits = $this->Parent->Bad_Habits->Value;
        $this->Medical_Anamnesis = $this->Parent->Medical_Anamnesis->Value;
        $this->Antenatal_Problems = $this->Parent->Antenatal_Problems->Value;
        $this->Hospitalisation_Admission = $this->Parent->Hospitalisation_Admission->Value;
        $this->Hospitalisation_Discharge = $this->Parent->Hospitalisation_Discharge->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_PatientIDPage = $this->Parent->PatientID->Page;
        $this->_PatientIDParameters = $this->Parent->PatientID->Parameters;
        $this->_PregnancyRecNrPage = $this->Parent->PregnancyRecNr->Page;
        $this->_PregnancyRecNrParameters = $this->Parent->PregnancyRecNr->Parameters;
        $this->_PatientIDAttributes = $this->Parent->PatientID->Attributes->GetAsArray();
        $this->_FamilyNameAttributes = $this->Parent->FamilyName->Attributes->GetAsArray();
        $this->_GivenNameAttributes = $this->Parent->GivenName->Attributes->GetAsArray();
        $this->_PregnancyRecNrAttributes = $this->Parent->PregnancyRecNr->Attributes->GetAsArray();
        $this->_Abnormal_Test_ResultsAttributes = $this->Parent->Abnormal_Test_Results->Attributes->GetAsArray();
        $this->_Bad_HabitsAttributes = $this->Parent->Bad_Habits->Attributes->GetAsArray();
        $this->_Medical_AnamnesisAttributes = $this->Parent->Medical_Anamnesis->Attributes->GetAsArray();
        $this->_Antenatal_ProblemsAttributes = $this->Parent->Antenatal_Problems->Attributes->GetAsArray();
        $this->_Hospitalisation_AdmissionAttributes = $this->Parent->Hospitalisation_Admission->Attributes->GetAsArray();
        $this->_Hospitalisation_DischargeAttributes = $this->Parent->Hospitalisation_Discharge->Attributes->GetAsArray();
        $this->_Report_CurrentDateTimeAttributes = $this->Parent->Report_CurrentDateTime->Attributes->GetAsArray();
        $this->_Report_CurrentPageAttributes = $this->Parent->Report_CurrentPage->Attributes->GetAsArray();
        $this->_Report_TotalPagesAttributes = $this->Parent->Report_TotalPages->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->PatientID = $Header->PatientID;
        $this->_PatientIDPage = $Header->_PatientIDPage;
        $this->_PatientIDParameters = $Header->_PatientIDParameters;
        $Header->_PatientIDAttributes = $this->_PatientIDAttributes;
        $this->Parent->PatientID->Value = $Header->PatientID;
        $this->Parent->PatientID->Attributes->RestoreFromArray($Header->_PatientIDAttributes);
        $this->FamilyName = $Header->FamilyName;
        $Header->_FamilyNameAttributes = $this->_FamilyNameAttributes;
        $this->Parent->FamilyName->Value = $Header->FamilyName;
        $this->Parent->FamilyName->Attributes->RestoreFromArray($Header->_FamilyNameAttributes);
        $this->GivenName = $Header->GivenName;
        $Header->_GivenNameAttributes = $this->_GivenNameAttributes;
        $this->Parent->GivenName->Value = $Header->GivenName;
        $this->Parent->GivenName->Attributes->RestoreFromArray($Header->_GivenNameAttributes);
        $this->PregnancyRecNr = $Header->PregnancyRecNr;
        $this->_PregnancyRecNrPage = $Header->_PregnancyRecNrPage;
        $this->_PregnancyRecNrParameters = $Header->_PregnancyRecNrParameters;
        $Header->_PregnancyRecNrAttributes = $this->_PregnancyRecNrAttributes;
        $this->Parent->PregnancyRecNr->Value = $Header->PregnancyRecNr;
        $this->Parent->PregnancyRecNr->Attributes->RestoreFromArray($Header->_PregnancyRecNrAttributes);
        $this->Abnormal_Test_Results = $Header->Abnormal_Test_Results;
        $Header->_Abnormal_Test_ResultsAttributes = $this->_Abnormal_Test_ResultsAttributes;
        $this->Parent->Abnormal_Test_Results->Value = $Header->Abnormal_Test_Results;
        $this->Parent->Abnormal_Test_Results->Attributes->RestoreFromArray($Header->_Abnormal_Test_ResultsAttributes);
        $this->Bad_Habits = $Header->Bad_Habits;
        $Header->_Bad_HabitsAttributes = $this->_Bad_HabitsAttributes;
        $this->Parent->Bad_Habits->Value = $Header->Bad_Habits;
        $this->Parent->Bad_Habits->Attributes->RestoreFromArray($Header->_Bad_HabitsAttributes);
        $this->Medical_Anamnesis = $Header->Medical_Anamnesis;
        $Header->_Medical_AnamnesisAttributes = $this->_Medical_AnamnesisAttributes;
        $this->Parent->Medical_Anamnesis->Value = $Header->Medical_Anamnesis;
        $this->Parent->Medical_Anamnesis->Attributes->RestoreFromArray($Header->_Medical_AnamnesisAttributes);
        $this->Antenatal_Problems = $Header->Antenatal_Problems;
        $Header->_Antenatal_ProblemsAttributes = $this->_Antenatal_ProblemsAttributes;
        $this->Parent->Antenatal_Problems->Value = $Header->Antenatal_Problems;
        $this->Parent->Antenatal_Problems->Attributes->RestoreFromArray($Header->_Antenatal_ProblemsAttributes);
        $this->Hospitalisation_Admission = $Header->Hospitalisation_Admission;
        $Header->_Hospitalisation_AdmissionAttributes = $this->_Hospitalisation_AdmissionAttributes;
        $this->Parent->Hospitalisation_Admission->Value = $Header->Hospitalisation_Admission;
        $this->Parent->Hospitalisation_Admission->Attributes->RestoreFromArray($Header->_Hospitalisation_AdmissionAttributes);
        $this->Hospitalisation_Discharge = $Header->Hospitalisation_Discharge;
        $Header->_Hospitalisation_DischargeAttributes = $this->_Hospitalisation_DischargeAttributes;
        $this->Parent->Hospitalisation_Discharge->Value = $Header->Hospitalisation_Discharge;
        $this->Parent->Hospitalisation_Discharge->Attributes->RestoreFromArray($Header->_Hospitalisation_DischargeAttributes);
    }
    function ChangeTotalControls() {
    }
}
//End Report1 ReportGroup class

//Report1 GroupsCollection class @72-DAAC50F1
class clsGroupsCollectionReport1 {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mPatientIDCurrentHeaderIndex;
    public $mFamilyNameCurrentHeaderIndex;
    public $mGivenNameCurrentHeaderIndex;
    public $mPregnancyRecNrCurrentHeaderIndex;
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
        $this->mPatientIDCurrentHeaderIndex = 1;
        $this->mFamilyNameCurrentHeaderIndex = 2;
        $this->mGivenNameCurrentHeaderIndex = 3;
        $this->mPregnancyRecNrCurrentHeaderIndex = 4;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReport1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->PatientIDTotalIndex = $this->mPatientIDCurrentHeaderIndex;
        $group->FamilyNameTotalIndex = $this->mFamilyNameCurrentHeaderIndex;
        $group->GivenNameTotalIndex = $this->mGivenNameCurrentHeaderIndex;
        $group->PregnancyRecNrTotalIndex = $this->mPregnancyRecNrCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->PatientID->Value = $this->Parent->PatientID->initialValue;
        $this->Parent->FamilyName->Value = $this->Parent->FamilyName->initialValue;
        $this->Parent->GivenName->Value = $this->Parent->GivenName->initialValue;
        $this->Parent->PregnancyRecNr->Value = $this->Parent->PregnancyRecNr->initialValue;
        $this->Parent->Abnormal_Test_Results->Value = $this->Parent->Abnormal_Test_Results->initialValue;
        $this->Parent->Bad_Habits->Value = $this->Parent->Bad_Habits->initialValue;
        $this->Parent->Medical_Anamnesis->Value = $this->Parent->Medical_Anamnesis->initialValue;
        $this->Parent->Antenatal_Problems->Value = $this->Parent->Antenatal_Problems->initialValue;
        $this->Parent->Hospitalisation_Admission->Value = $this->Parent->Hospitalisation_Admission->initialValue;
        $this->Parent->Hospitalisation_Discharge->Value = $this->Parent->Hospitalisation_Discharge->initialValue;
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
        if ($groupName == "PatientID") {
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
            $OpenFlag = true;
            $GroupPatientID->GroupType = "PatientID";
            $this->mPatientIDCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupPatientID;
        }
        if ($groupName == "FamilyName" or $OpenFlag) {
            $GroupFamilyName = & $this->InitGroup(true);
            $this->Parent->FamilyName_Header->CCSEventResult = CCGetEvent($this->Parent->FamilyName_Header->CCSEvents, "OnInitialize", $this->Parent->FamilyName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->FamilyName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->FamilyName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->FamilyName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->FamilyName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->FamilyName_Header->Height;
                $GroupFamilyName->SetTotalControls("GetNextValue");
            $this->Parent->FamilyName_Header->CCSEventResult = CCGetEvent($this->Parent->FamilyName_Header->CCSEvents, "OnCalculate", $this->Parent->FamilyName_Header);
            $GroupFamilyName->SetControls();
            $GroupFamilyName->Mode = 1;
            $OpenFlag = true;
            $GroupFamilyName->GroupType = "FamilyName";
            $this->mFamilyNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupFamilyName;
        }
        if ($groupName == "GivenName" or $OpenFlag) {
            $GroupGivenName = & $this->InitGroup(true);
            $this->Parent->GivenName_Header->CCSEventResult = CCGetEvent($this->Parent->GivenName_Header->CCSEvents, "OnInitialize", $this->Parent->GivenName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->GivenName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->GivenName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->GivenName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->GivenName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->GivenName_Header->Height;
                $GroupGivenName->SetTotalControls("GetNextValue");
            $this->Parent->GivenName_Header->CCSEventResult = CCGetEvent($this->Parent->GivenName_Header->CCSEvents, "OnCalculate", $this->Parent->GivenName_Header);
            $GroupGivenName->SetControls();
            $GroupGivenName->Mode = 1;
            $OpenFlag = true;
            $GroupGivenName->GroupType = "GivenName";
            $this->mGivenNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupGivenName;
        }
        if ($groupName == "PregnancyRecNr" or $OpenFlag) {
            $GroupPregnancyRecNr = & $this->InitGroup(true);
            $this->Parent->PregnancyRecNr_Header->CCSEventResult = CCGetEvent($this->Parent->PregnancyRecNr_Header->CCSEvents, "OnInitialize", $this->Parent->PregnancyRecNr_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->PregnancyRecNr_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->PregnancyRecNr_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->PregnancyRecNr_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->PregnancyRecNr_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->PregnancyRecNr_Header->Height;
                $GroupPregnancyRecNr->SetTotalControls("GetNextValue");
            $this->Parent->PregnancyRecNr_Header->CCSEventResult = CCGetEvent($this->Parent->PregnancyRecNr_Header->CCSEvents, "OnCalculate", $this->Parent->PregnancyRecNr_Header);
            $GroupPregnancyRecNr->SetControls();
            $GroupPregnancyRecNr->Mode = 1;
            $GroupPregnancyRecNr->GroupType = "PregnancyRecNr";
            $this->mPregnancyRecNrCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupPregnancyRecNr;
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
        $GroupPregnancyRecNr = & $this->InitGroup(true);
        $this->Parent->PregnancyRecNr_Footer->CCSEventResult = CCGetEvent($this->Parent->PregnancyRecNr_Footer->CCSEvents, "OnInitialize", $this->Parent->PregnancyRecNr_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->PregnancyRecNr_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->PregnancyRecNr_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->PregnancyRecNr_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupPregnancyRecNr->SetTotalControls("GetPrevValue");
        $GroupPregnancyRecNr->SyncWithHeader($this->Groups[$this->mPregnancyRecNrCurrentHeaderIndex]);
        if ($this->Parent->PregnancyRecNr_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->PregnancyRecNr_Footer->Height;
        $this->Parent->PregnancyRecNr_Footer->CCSEventResult = CCGetEvent($this->Parent->PregnancyRecNr_Footer->CCSEvents, "OnCalculate", $this->Parent->PregnancyRecNr_Footer);
        $GroupPregnancyRecNr->SetControls();
        $this->RestoreValues();
        $GroupPregnancyRecNr->Mode = 2;
        $GroupPregnancyRecNr->GroupType ="PregnancyRecNr";
        $this->Groups[] = & $GroupPregnancyRecNr;
        if ($groupName == "PregnancyRecNr") return;
        $GroupGivenName = & $this->InitGroup(true);
        $this->Parent->GivenName_Footer->CCSEventResult = CCGetEvent($this->Parent->GivenName_Footer->CCSEvents, "OnInitialize", $this->Parent->GivenName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->GivenName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->GivenName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->GivenName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupGivenName->SetTotalControls("GetPrevValue");
        $GroupGivenName->SyncWithHeader($this->Groups[$this->mGivenNameCurrentHeaderIndex]);
        if ($this->Parent->GivenName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->GivenName_Footer->Height;
        $this->Parent->GivenName_Footer->CCSEventResult = CCGetEvent($this->Parent->GivenName_Footer->CCSEvents, "OnCalculate", $this->Parent->GivenName_Footer);
        $GroupGivenName->SetControls();
        $this->RestoreValues();
        $GroupGivenName->Mode = 2;
        $GroupGivenName->GroupType ="GivenName";
        $this->Groups[] = & $GroupGivenName;
        if ($groupName == "GivenName") return;
        $GroupFamilyName = & $this->InitGroup(true);
        $this->Parent->FamilyName_Footer->CCSEventResult = CCGetEvent($this->Parent->FamilyName_Footer->CCSEvents, "OnInitialize", $this->Parent->FamilyName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->FamilyName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->FamilyName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->FamilyName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupFamilyName->SetTotalControls("GetPrevValue");
        $GroupFamilyName->SyncWithHeader($this->Groups[$this->mFamilyNameCurrentHeaderIndex]);
        if ($this->Parent->FamilyName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->FamilyName_Footer->Height;
        $this->Parent->FamilyName_Footer->CCSEventResult = CCGetEvent($this->Parent->FamilyName_Footer->CCSEvents, "OnCalculate", $this->Parent->FamilyName_Footer);
        $GroupFamilyName->SetControls();
        $this->RestoreValues();
        $GroupFamilyName->Mode = 2;
        $GroupFamilyName->GroupType ="FamilyName";
        $this->Groups[] = & $GroupFamilyName;
        if ($groupName == "FamilyName") return;
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

class clsReportReport1 { //Report1 Class @72-BC2FB08C

//Report1 Variables @72-3D4309B4

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
    public $PatientID_HeaderBlock, $PatientID_Header;
    public $PatientID_FooterBlock, $PatientID_Footer;
    public $FamilyName_HeaderBlock, $FamilyName_Header;
    public $FamilyName_FooterBlock, $FamilyName_Footer;
    public $GivenName_HeaderBlock, $GivenName_Header;
    public $GivenName_FooterBlock, $GivenName_Footer;
    public $PregnancyRecNr_HeaderBlock, $PregnancyRecNr_Header;
    public $PregnancyRecNr_FooterBlock, $PregnancyRecNr_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $PatientID_HeaderControls, $PatientID_FooterControls;
    public $FamilyName_HeaderControls, $FamilyName_FooterControls;
    public $GivenName_HeaderControls, $GivenName_FooterControls;
    public $PregnancyRecNr_HeaderControls, $PregnancyRecNr_FooterControls;
//End Report1 Variables

//Class_Initialize Event @72-5E6FDCF2
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
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->PatientID_Footer = new clsSection($this);
        $this->PatientID_Header = new clsSection($this);
        $this->PatientID_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->PatientID_Header->Height);
        $this->FamilyName_Footer = new clsSection($this);
        $this->FamilyName_Header = new clsSection($this);
        $this->FamilyName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->FamilyName_Header->Height);
        $this->GivenName_Footer = new clsSection($this);
        $this->GivenName_Header = new clsSection($this);
        $this->GivenName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->GivenName_Header->Height);
        $this->PregnancyRecNr_Footer = new clsSection($this);
        $this->PregnancyRecNr_Header = new clsSection($this);
        $this->PregnancyRecNr_Header->Height = 2;
        $MaxSectionSize = max($MaxSectionSize, $this->PregnancyRecNr_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReport1DataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
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
        $this->Visible = (CCSecurityAccessCheck("3") == "success");

        $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsMemo, "", CCGetRequestParam("PatientID", ccsGet, NULL), $this);
        $this->PatientID->Page = "patient_maint_fac.php";
        $this->FamilyName = new clsControl(ccsReportLabel, "FamilyName", "FamilyName", ccsMemo, "", "", $this);
        $this->GivenName = new clsControl(ccsReportLabel, "GivenName", "GivenName", ccsMemo, "", "", $this);
        $this->PregnancyRecNr = new clsControl(ccsLink, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", CCGetRequestParam("PregnancyRecNr", ccsGet, NULL), $this);
        $this->PregnancyRecNr->Page = "pregnancy_maint.php";
        $this->Abnormal_Test_Results = new clsControl(ccsReportLabel, "Abnormal_Test_Results", "Abnormal_Test_Results", ccsText, "", "", $this);
        $this->Bad_Habits = new clsControl(ccsReportLabel, "Bad_Habits", "Bad_Habits", ccsText, "", "", $this);
        $this->Medical_Anamnesis = new clsControl(ccsReportLabel, "Medical_Anamnesis", "Medical_Anamnesis", ccsText, "", "", $this);
        $this->Antenatal_Problems = new clsControl(ccsReportLabel, "Antenatal_Problems", "Antenatal_Problems", ccsText, "", "", $this);
        $this->Hospitalisation_Admission = new clsControl(ccsReportLabel, "Hospitalisation_Admission", "Hospitalisation_Admission", ccsText, "", "", $this);
        $this->Hospitalisation_Discharge = new clsControl(ccsReportLabel, "Hospitalisation_Discharge", "Hospitalisation_Discharge", ccsText, "", "", $this);
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->Report_CurrentDateTime = new clsControl(ccsReportLabel, "Report_CurrentDateTime", "Report_CurrentDateTime", ccsText, array('ShortDate', ' ', 'ShortTime'), "", $this);
        $this->Report_CurrentPage = new clsControl(ccsReportLabel, "Report_CurrentPage", "Report_CurrentPage", ccsInteger, "", "", $this);
        $this->Report_TotalPages = new clsControl(ccsReportLabel, "Report_TotalPages", "Report_TotalPages", ccsInteger, "", "", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @72-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @72-5169D407
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->FamilyName->Errors->Count());
        $errors = ($errors || $this->GivenName->Errors->Count());
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->Abnormal_Test_Results->Errors->Count());
        $errors = ($errors || $this->Bad_Habits->Errors->Count());
        $errors = ($errors || $this->Medical_Anamnesis->Errors->Count());
        $errors = ($errors || $this->Antenatal_Problems->Errors->Count());
        $errors = ($errors || $this->Hospitalisation_Admission->Errors->Count());
        $errors = ($errors || $this->Hospitalisation_Discharge->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDateTime->Errors->Count());
        $errors = ($errors || $this->Report_CurrentPage->Errors->Count());
        $errors = ($errors || $this->Report_TotalPages->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @72-F8F557C7
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FamilyName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GivenName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Abnormal_Test_Results->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Bad_Habits->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Medical_Anamnesis->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Antenatal_Problems->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hospitalisation_Admission->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hospitalisation_Discharge->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDateTime->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentPage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_TotalPages->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @72-DCE606A7
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);
        $this->DataSource->Parameters["urls_PatientID"] = CCGetFromGet("s_PatientID", NULL);
        $this->DataSource->Parameters["urls_PregnancyRecNr"] = CCGetFromGet("s_PregnancyRecNr", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $PatientIDKey = "";
        $FamilyNameKey = "";
        $GivenNameKey = "";
        $PregnancyRecNrKey = "";
        $Groups = new clsGroupsCollectionReport1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            $this->FamilyName->SetValue($this->DataSource->FamilyName->GetValue());
            $this->GivenName->SetValue($this->DataSource->GivenName->GetValue());
            $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
            $this->Abnormal_Test_Results->SetValue($this->DataSource->Abnormal_Test_Results->GetValue());
            $this->Bad_Habits->SetValue($this->DataSource->Bad_Habits->GetValue());
            $this->Medical_Anamnesis->SetValue($this->DataSource->Medical_Anamnesis->GetValue());
            $this->Antenatal_Problems->SetValue($this->DataSource->Antenatal_Problems->GetValue());
            $this->Hospitalisation_Admission->SetValue($this->DataSource->Hospitalisation_Admission->GetValue());
            $this->Hospitalisation_Discharge->SetValue($this->DataSource->Hospitalisation_Discharge->GetValue());
            $this->PatientID->Parameters = "";
            $this->PatientID->Parameters = CCAddParam($this->PatientID->Parameters, "PatientID", $this->DataSource->f("PatientID"));
            $this->PregnancyRecNr->Parameters = "";
            $this->PregnancyRecNr->Parameters = CCAddParam($this->PregnancyRecNr->Parameters, "PatientID", $this->DataSource->f("PatientID"));
            $this->PregnancyRecNr->Parameters = CCAddParam($this->PregnancyRecNr->Parameters, "PregnancyID", $this->DataSource->f("PregnancyID"));
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $PatientIDKey != $this->DataSource->f("PatientID")) {
                $Groups->OpenGroup("PatientID");
            } elseif ($FamilyNameKey != $this->DataSource->f("FamilyName")) {
                $Groups->OpenGroup("FamilyName");
            } elseif ($GivenNameKey != $this->DataSource->f("GivenName")) {
                $Groups->OpenGroup("GivenName");
            } elseif ($PregnancyRecNrKey != $this->DataSource->f("PregnancyRecNr")) {
                $Groups->OpenGroup("PregnancyRecNr");
            }
            $Groups->AddItem();
            $PatientIDKey = $this->DataSource->f("PatientID");
            $FamilyNameKey = $this->DataSource->f("FamilyName");
            $GivenNameKey = $this->DataSource->f("GivenName");
            $PregnancyRecNrKey = $this->DataSource->f("PregnancyRecNr");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $PatientIDKey != $this->DataSource->f("PatientID")) {
                $Groups->CloseGroup("PatientID");
            } elseif ($FamilyNameKey != $this->DataSource->f("FamilyName")) {
                $Groups->CloseGroup("FamilyName");
            } elseif ($GivenNameKey != $this->DataSource->f("GivenName")) {
                $Groups->CloseGroup("GivenName");
            } elseif ($PregnancyRecNrKey != $this->DataSource->f("PregnancyRecNr")) {
                $Groups->CloseGroup("PregnancyRecNr");
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
            $this->ControlsVisible["PatientID"] = $this->PatientID->Visible;
            $this->ControlsVisible["FamilyName"] = $this->FamilyName->Visible;
            $this->ControlsVisible["GivenName"] = $this->GivenName->Visible;
            $this->ControlsVisible["PregnancyRecNr"] = $this->PregnancyRecNr->Visible;
            $this->ControlsVisible["Abnormal_Test_Results"] = $this->Abnormal_Test_Results->Visible;
            $this->ControlsVisible["Bad_Habits"] = $this->Bad_Habits->Visible;
            $this->ControlsVisible["Medical_Anamnesis"] = $this->Medical_Anamnesis->Visible;
            $this->ControlsVisible["Antenatal_Problems"] = $this->Antenatal_Problems->Visible;
            $this->ControlsVisible["Hospitalisation_Admission"] = $this->Hospitalisation_Admission->Visible;
            $this->ControlsVisible["Hospitalisation_Discharge"] = $this->Hospitalisation_Discharge->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Abnormal_Test_Results->SetValue($items[$i]->Abnormal_Test_Results);
                        $this->Abnormal_Test_Results->Attributes->RestoreFromArray($items[$i]->_Abnormal_Test_ResultsAttributes);
                        $this->Bad_Habits->SetValue($items[$i]->Bad_Habits);
                        $this->Bad_Habits->Attributes->RestoreFromArray($items[$i]->_Bad_HabitsAttributes);
                        $this->Medical_Anamnesis->SetValue($items[$i]->Medical_Anamnesis);
                        $this->Medical_Anamnesis->Attributes->RestoreFromArray($items[$i]->_Medical_AnamnesisAttributes);
                        $this->Antenatal_Problems->SetValue($items[$i]->Antenatal_Problems);
                        $this->Antenatal_Problems->Attributes->RestoreFromArray($items[$i]->_Antenatal_ProblemsAttributes);
                        $this->Hospitalisation_Admission->SetValue($items[$i]->Hospitalisation_Admission);
                        $this->Hospitalisation_Admission->Attributes->RestoreFromArray($items[$i]->_Hospitalisation_AdmissionAttributes);
                        $this->Hospitalisation_Discharge->SetValue($items[$i]->Hospitalisation_Discharge);
                        $this->Hospitalisation_Discharge->Attributes->RestoreFromArray($items[$i]->_Hospitalisation_DischargeAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Abnormal_Test_Results->Show();
                        $this->Bad_Habits->Show();
                        $this->Medical_Anamnesis->Show();
                        $this->Antenatal_Problems->Show();
                        $this->Hospitalisation_Admission->Show();
                        $this->Hospitalisation_Discharge->Show();
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
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Report_CurrentDateTime->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDateTime->Format));
                            $this->Report_CurrentDateTime->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateTimeAttributes);
                            $this->Report_CurrentPage->SetValue($items[$i]->PageNumber);
                            $this->Report_CurrentPage->Attributes->RestoreFromArray($items[$i]->_Report_CurrentPageAttributes);
                            $this->Report_TotalPages->SetValue($Groups->TotalPages);
                            $this->Report_TotalPages->Attributes->RestoreFromArray($items[$i]->_Report_TotalPagesAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Report_CurrentDateTime->Show();
                                $this->Report_CurrentPage->Show();
                                $this->Report_TotalPages->Show();
                                $this->Navigator->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "PatientID":
                        if ($items[$i]->Mode == 1) {
                            $this->PatientID->SetValue($items[$i]->PatientID);
                            $this->PatientID->Page = $items[$i]->_PatientIDPage;
                            $this->PatientID->Parameters = $items[$i]->_PatientIDParameters;
                            $this->PatientID->Attributes->RestoreFromArray($items[$i]->_PatientIDAttributes);
                            $this->PatientID_Header->CCSEventResult = CCGetEvent($this->PatientID_Header->CCSEvents, "BeforeShow", $this->PatientID_Header);
                            if ($this->PatientID_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section PatientID_Header";
                                $this->Attributes->Show();
                                $this->PatientID->Show();
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
                    case "FamilyName":
                        if ($items[$i]->Mode == 1) {
                            $this->FamilyName->SetValue($items[$i]->FamilyName);
                            $this->FamilyName->Attributes->RestoreFromArray($items[$i]->_FamilyNameAttributes);
                            $this->FamilyName_Header->CCSEventResult = CCGetEvent($this->FamilyName_Header->CCSEvents, "BeforeShow", $this->FamilyName_Header);
                            if ($this->FamilyName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FamilyName_Header";
                                $this->Attributes->Show();
                                $this->FamilyName->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FamilyName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->FamilyName_Footer->CCSEventResult = CCGetEvent($this->FamilyName_Footer->CCSEvents, "BeforeShow", $this->FamilyName_Footer);
                            if ($this->FamilyName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FamilyName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FamilyName_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "GivenName":
                        if ($items[$i]->Mode == 1) {
                            $this->GivenName->SetValue($items[$i]->GivenName);
                            $this->GivenName->Attributes->RestoreFromArray($items[$i]->_GivenNameAttributes);
                            $this->GivenName_Header->CCSEventResult = CCGetEvent($this->GivenName_Header->CCSEvents, "BeforeShow", $this->GivenName_Header);
                            if ($this->GivenName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section GivenName_Header";
                                $this->Attributes->Show();
                                $this->GivenName->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section GivenName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->GivenName_Footer->CCSEventResult = CCGetEvent($this->GivenName_Footer->CCSEvents, "BeforeShow", $this->GivenName_Footer);
                            if ($this->GivenName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section GivenName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section GivenName_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "PregnancyRecNr":
                        if ($items[$i]->Mode == 1) {
                            $this->PregnancyRecNr->SetValue($items[$i]->PregnancyRecNr);
                            $this->PregnancyRecNr->Page = $items[$i]->_PregnancyRecNrPage;
                            $this->PregnancyRecNr->Parameters = $items[$i]->_PregnancyRecNrParameters;
                            $this->PregnancyRecNr->Attributes->RestoreFromArray($items[$i]->_PregnancyRecNrAttributes);
                            $this->PregnancyRecNr_Header->CCSEventResult = CCGetEvent($this->PregnancyRecNr_Header->CCSEvents, "BeforeShow", $this->PregnancyRecNr_Header);
                            if ($this->PregnancyRecNr_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section PregnancyRecNr_Header";
                                $this->Attributes->Show();
                                $this->PregnancyRecNr->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section PregnancyRecNr_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->PregnancyRecNr_Footer->CCSEventResult = CCGetEvent($this->PregnancyRecNr_Footer->CCSEvents, "BeforeShow", $this->PregnancyRecNr_Footer);
                            if ($this->PregnancyRecNr_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section PregnancyRecNr_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section PregnancyRecNr_Footer", true, "Section Detail");
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

} //End Report1 Class @72-FCB6E20C

class clsReport1DataSource extends clsDBregistry_db {  //Report1DataSource Class @72-1787F62C

//DataSource Variables @72-2A65275E
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $PatientID;
    public $FamilyName;
    public $GivenName;
    public $PregnancyRecNr;
    public $Abnormal_Test_Results;
    public $Bad_Habits;
    public $Medical_Anamnesis;
    public $Antenatal_Problems;
    public $Hospitalisation_Admission;
    public $Hospitalisation_Discharge;
//End DataSource Variables

//DataSourceClass_Initialize Event @72-46DBF3BE
    function clsReport1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report Report1";
        $this->Initialize();
        $this->PatientID = new clsField("PatientID", ccsMemo, "");
        
        $this->FamilyName = new clsField("FamilyName", ccsMemo, "");
        
        $this->GivenName = new clsField("GivenName", ccsMemo, "");
        
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->Abnormal_Test_Results = new clsField("Abnormal_Test_Results", ccsText, "");
        
        $this->Bad_Habits = new clsField("Bad_Habits", ccsText, "");
        
        $this->Medical_Anamnesis = new clsField("Medical_Anamnesis", ccsText, "");
        
        $this->Antenatal_Problems = new clsField("Antenatal_Problems", ccsText, "");
        
        $this->Hospitalisation_Admission = new clsField("Hospitalisation_Admission", ccsText, "");
        
        $this->Hospitalisation_Discharge = new clsField("Hospitalisation_Discharge", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @72-A6781693
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "PregnancyID ASC, GenHospDate ASC, HospDiscReason ASC, HospAdmReason ASC, VisitDateTests ASC, Abnormal_Test_Results ASC, VisitDateProbs ASC, Antenatal_Problems ASC, Bad_Habits ASC, Medical_Anamnesis ASC";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @72-87D60009
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sess_Facilities", ccsText, "", "", $this->Parameters["sess_Facilities"], 0, false);
        $this->wp->AddParameter("2", "urls_PatientID", ccsText, "", "", $this->Parameters["urls_PatientID"], '%', false);
        $this->wp->AddParameter("3", "urls_PregnancyRecNr", ccsText, "", "", $this->Parameters["urls_PregnancyRecNr"], '%', false);
    }
//End Prepare Method

//Open Method @72-345868C9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n" .
        "FROM\n" .
        "\n" .
        "(\n" .
        "\n" .
        "SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  \n" .
        "pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, \n" .
        "CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, ')') AS Medical_Anamnesis, NULL AS Bad_Habits, NULL AS Antenatal_Problems, NULL AS VisitDateProbs, \n" .
        "NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM (((patient INNER JOIN obstetric_anamnesis ON\n" .
        "obstetric_anamnesis.PatientID = patient.PatientID) INNER JOIN pregnancy ON\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN icd10_all ON\n" .
        "obstetric_anamnesis.ICD10ID = icd10_all.ICD10ID) LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID\n" .
        "GROUP BY Medical_Anamnesis, pregnancy.PregnancyID\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  \n" .
        "pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, BadHabbitsName AS Bad_Habits, \n" .
        "NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, NULL AS HospAdmReason, \n" .
        "NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM (((patient INNER JOIN pregnancy ON pregnancy.PatientID = patient.PatientID) INNER JOIN bad_habbits ON bad_habbits.PatientID = patient.PatientID) \n" .
        "INNER JOIN bad_habbitstype ON bad_habbits.BadHabbitsTypeID = bad_habbitstype.BadHabbitsTypeID) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID\n" .
        "GROUP BY Bad_Habits, pregnancy.PregnancyID\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  \n" .
        "pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, \n" .
        "CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(VisitDate AS CHAR)) AS Antenatal_Problems, VisitDate AS VisitDateProbs, NULL AS Abnormal_Test_Results, \n" .
        "NULL AS VisitDateTests, NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM ((((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) INNER JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID) \n" .
        "INNER JOIN visitdisease ON visitdisease.VisitID = visit.VisitID) INNER JOIN icd10_all ON visitdisease.ICD10ID = icd10_all.ICD10ID ) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID\n" .
        "GROUP BY Antenatal_Problems, pregnancy.PregnancyID\n" .
        "\n" .
        "UNION \n" .
        "\n" .
        "SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  \n" .
        "pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, \n" .
        "NULL AS Antenatal_Problems, NULL AS VisitDateProbs, CONCAT(TestName, ', ', CAST(VisitDate AS CHAR)) AS Abnormal_Test_Results, VisitDate AS VisitDateTests, \n" .
        "NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM ((((visit INNER JOIN pregnancy ON\n" .
        "visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON\n" .
        "test.VisitID = visit.VisitID) INNER JOIN patient ON\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN testcode ON\n" .
        "test.TestCodeID = testcode.TestCodeID) LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID\n" .
        "WHERE TestResultNormal = 0 \n" .
        "GROUP BY Abnormal_Test_Results, pregnancy.PregnancyID\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  \n" .
        "pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, \n" .
        "NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, \n" .
        "CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(AdmissionDate AS CHAR)) AS HospAdmReason, NULL AS HospDiscReason, \n" .
        "AdmissionDate AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM ((((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) \n" .
        "INNER JOIN hospitalisation ON pregnancy.PregnancyID = hospitalisation.PregnancyID) \n" .
        "LEFT JOIN reasonhospitalisation ON reasonhospitalisation.HospitalisationID = hospitalisation.HospitalisationID)\n" .
        "INNER JOIN icd10_all ON reasonhospitalisation.ICD10ID = icd10_all.ICD10ID) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID\n" .
        "GROUP BY HospAdmReason, pregnancy.PregnancyID \n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID, \n" .
        "pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, \n" .
        "NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, \n" .
        "NULL AS HospAdmReason, CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(hospitalisation.DischargeDate AS CHAR)) AS HospDiscReason, \n" .
        "hospitalisation.DischargeDate AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM ((((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) \n" .
        "INNER JOIN hospitalisation ON pregnancy.PregnancyID = hospitalisation.PregnancyID) \n" .
        "INNER JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID)\n" .
        "INNER JOIN icd10_all ON hospitalisationdischargediagnosis.ICD10ID = icd10_all.ICD10ID) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID\n" .
        "WHERE hospitalisation.DischargeDate IS NOT NULL\n" .
        "GROUP BY HospDiscReason, pregnancy.PregnancyID \n" .
        "\n" .
        ") \n" .
        "\n" .
        "AS result \n" .
        "\n" .
        "WHERE PatientID LIKE '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "' AND PregnancyRecNr LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' AND CURDATE() < ADDDATE(Calc_DeliveryDate, 31) AND \n" .
        "DataDelivery IS NULL AND preg_f_id IN (" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . ") AND Disc = 0  {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "PatientID asc,FamilyName asc,GivenName asc,PregnancyRecNr asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @72-BAB60DF1
    function SetValues()
    {
        $this->PatientID->SetDBValue($this->f("PatientID"));
        $this->FamilyName->SetDBValue($this->f("FamilyName"));
        $this->GivenName->SetDBValue($this->f("GivenName"));
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->Abnormal_Test_Results->SetDBValue($this->f("Abnormal_Test_Results"));
        $this->Bad_Habits->SetDBValue($this->f("Bad_Habits"));
        $this->Medical_Anamnesis->SetDBValue($this->f("Medical_Anamnesis"));
        $this->Antenatal_Problems->SetDBValue($this->f("Antenatal_Problems"));
        $this->Hospitalisation_Admission->SetDBValue($this->f("HospAdmReason"));
        $this->Hospitalisation_Discharge->SetDBValue($this->f("HospDiscReason"));
    }
//End SetValues Method

} //End Report1DataSource Class @72-FCB6E20C

//Initialize Page @1-48B3D755
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
$TemplateFileName = "report_risks_facilities.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Authenticate User @1-4B0BB954
CCSecurityRedirect("3", "");
//End Authenticate User

//Include events file @1-0EE20A3A
include_once("./report_risks_facilities_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5937B7E4
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$Report2 = new clsRecordReport2("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_risks_facilities.php";
$Report1 = new clsReportReport1("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->Report2 = & $Report2;
$MainPage->Report_Print = & $Report_Print;
$MainPage->Report1 = & $Report1;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$Report1->Initialize();

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

//Go to destination page @1-28628C29
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($Report2);
    unset($Report1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-5F4EEFB9
$topmenu->Show();
$Report2->Show();
$Report1->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-CC1F1674
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($Report2);
unset($Report1);
unset($Tpl);
//End Unload Page


?>
