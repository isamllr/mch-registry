<?php
//Include Common Files @1-642C45D3
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "report_risks.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation



class clsRecordreport3 { //report3 Class @156-A029CD25

//Variables @156-9E315808

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

//Class_Initialize Event @156-A379B7DE
    function clsRecordreport3($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record report3/Error";
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;2");
            $this->ComponentName = "report3";
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
            $this->s_FacilityID = new clsControl(ccsListBox, "s_FacilityID", "s_FacilityID", ccsText, "", CCGetRequestParam("s_FacilityID", $Method, NULL), $this);
            $this->s_FacilityID->DSType = dsTable;
            $this->s_FacilityID->DataSource = new clsDBregistry_db();
            $this->s_FacilityID->ds = & $this->s_FacilityID->DataSource;
            $this->s_FacilityID->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            list($this->s_FacilityID->BoundColumn, $this->s_FacilityID->TextColumn, $this->s_FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->s_PatientID = new clsControl(ccsTextBox, "s_PatientID", $CCSLocales->GetText("PatientID"), ccsInteger, "", CCGetRequestParam("s_PatientID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @156-EB4B6602
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_PregnancyRecNr->Validate() && $Validation);
        $Validation = ($this->s_FacilityID->Validate() && $Validation);
        $Validation = ($this->s_PatientID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_PregnancyRecNr->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PatientID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @156-B93EB491
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->s_FacilityID->Errors->Count());
        $errors = ($errors || $this->s_PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @156-ED598703
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

//Operation Method @156-64F6D86E
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
        $Redirect = "report_risks.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "report_risks.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @156-FBF2EECF
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

        $this->s_FacilityID->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FacilityID->Errors->ToString());
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
        $this->s_FacilityID->Show();
        $this->s_PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End report3 Class @156-FCB6E20C



//district_report ReportGroup class @347-892532DB
class clsReportGroupdistrict_report {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $FacilityName, $_FacilityNameAttributes;
    public $PatientID, $_PatientIDPage, $_PatientIDParameters, $_PatientIDAttributes;
    public $PregnancyRecNr, $_PregnancyRecNrPage, $_PregnancyRecNrParameters, $_PregnancyRecNrAttributes;
    public $Medical_Anamnesis, $_Medical_AnamnesisAttributes;
    public $Bad_Habits, $_Bad_HabitsAttributes;
    public $Antenatal_Problems, $_Antenatal_ProblemsAttributes;
    public $Abnormal_Test_Results, $_Abnormal_Test_ResultsAttributes;
    public $HospAdmReason, $_HospAdmReasonAttributes;
    public $HospDiscReason, $_HospDiscReasonAttributes;
    public $Report_CurrentDateTime, $_Report_CurrentDateTimeAttributes;
    public $Report_CurrentPage, $_Report_CurrentPageAttributes;
    public $Report_TotalPages, $_Report_TotalPagesAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $FacilityNameTotalIndex;
    public $PatientIDTotalIndex;
    public $PregnancyRecNrTotalIndex;

    function clsReportGroupdistrict_report(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->FacilityName = $this->Parent->FacilityName->Value;
        $this->PatientID = $this->Parent->PatientID->Value;
        $this->PregnancyRecNr = $this->Parent->PregnancyRecNr->Value;
        $this->Medical_Anamnesis = $this->Parent->Medical_Anamnesis->Value;
        $this->Bad_Habits = $this->Parent->Bad_Habits->Value;
        $this->Antenatal_Problems = $this->Parent->Antenatal_Problems->Value;
        $this->Abnormal_Test_Results = $this->Parent->Abnormal_Test_Results->Value;
        $this->HospAdmReason = $this->Parent->HospAdmReason->Value;
        $this->HospDiscReason = $this->Parent->HospDiscReason->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_PatientIDPage = $this->Parent->PatientID->Page;
        $this->_PatientIDParameters = $this->Parent->PatientID->Parameters;
        $this->_PregnancyRecNrPage = $this->Parent->PregnancyRecNr->Page;
        $this->_PregnancyRecNrParameters = $this->Parent->PregnancyRecNr->Parameters;
        $this->_FacilityNameAttributes = $this->Parent->FacilityName->Attributes->GetAsArray();
        $this->_PatientIDAttributes = $this->Parent->PatientID->Attributes->GetAsArray();
        $this->_PregnancyRecNrAttributes = $this->Parent->PregnancyRecNr->Attributes->GetAsArray();
        $this->_Medical_AnamnesisAttributes = $this->Parent->Medical_Anamnesis->Attributes->GetAsArray();
        $this->_Bad_HabitsAttributes = $this->Parent->Bad_Habits->Attributes->GetAsArray();
        $this->_Antenatal_ProblemsAttributes = $this->Parent->Antenatal_Problems->Attributes->GetAsArray();
        $this->_Abnormal_Test_ResultsAttributes = $this->Parent->Abnormal_Test_Results->Attributes->GetAsArray();
        $this->_HospAdmReasonAttributes = $this->Parent->HospAdmReason->Attributes->GetAsArray();
        $this->_HospDiscReasonAttributes = $this->Parent->HospDiscReason->Attributes->GetAsArray();
        $this->_Report_CurrentDateTimeAttributes = $this->Parent->Report_CurrentDateTime->Attributes->GetAsArray();
        $this->_Report_CurrentPageAttributes = $this->Parent->Report_CurrentPage->Attributes->GetAsArray();
        $this->_Report_TotalPagesAttributes = $this->Parent->Report_TotalPages->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->FacilityName = $Header->FacilityName;
        $Header->_FacilityNameAttributes = $this->_FacilityNameAttributes;
        $this->Parent->FacilityName->Value = $Header->FacilityName;
        $this->Parent->FacilityName->Attributes->RestoreFromArray($Header->_FacilityNameAttributes);
        $this->PatientID = $Header->PatientID;
        $this->_PatientIDPage = $Header->_PatientIDPage;
        $this->_PatientIDParameters = $Header->_PatientIDParameters;
        $Header->_PatientIDAttributes = $this->_PatientIDAttributes;
        $this->Parent->PatientID->Value = $Header->PatientID;
        $this->Parent->PatientID->Attributes->RestoreFromArray($Header->_PatientIDAttributes);
        $this->PregnancyRecNr = $Header->PregnancyRecNr;
        $this->_PregnancyRecNrPage = $Header->_PregnancyRecNrPage;
        $this->_PregnancyRecNrParameters = $Header->_PregnancyRecNrParameters;
        $Header->_PregnancyRecNrAttributes = $this->_PregnancyRecNrAttributes;
        $this->Parent->PregnancyRecNr->Value = $Header->PregnancyRecNr;
        $this->Parent->PregnancyRecNr->Attributes->RestoreFromArray($Header->_PregnancyRecNrAttributes);
        $this->Medical_Anamnesis = $Header->Medical_Anamnesis;
        $Header->_Medical_AnamnesisAttributes = $this->_Medical_AnamnesisAttributes;
        $this->Parent->Medical_Anamnesis->Value = $Header->Medical_Anamnesis;
        $this->Parent->Medical_Anamnesis->Attributes->RestoreFromArray($Header->_Medical_AnamnesisAttributes);
        $this->Bad_Habits = $Header->Bad_Habits;
        $Header->_Bad_HabitsAttributes = $this->_Bad_HabitsAttributes;
        $this->Parent->Bad_Habits->Value = $Header->Bad_Habits;
        $this->Parent->Bad_Habits->Attributes->RestoreFromArray($Header->_Bad_HabitsAttributes);
        $this->Antenatal_Problems = $Header->Antenatal_Problems;
        $Header->_Antenatal_ProblemsAttributes = $this->_Antenatal_ProblemsAttributes;
        $this->Parent->Antenatal_Problems->Value = $Header->Antenatal_Problems;
        $this->Parent->Antenatal_Problems->Attributes->RestoreFromArray($Header->_Antenatal_ProblemsAttributes);
        $this->Abnormal_Test_Results = $Header->Abnormal_Test_Results;
        $Header->_Abnormal_Test_ResultsAttributes = $this->_Abnormal_Test_ResultsAttributes;
        $this->Parent->Abnormal_Test_Results->Value = $Header->Abnormal_Test_Results;
        $this->Parent->Abnormal_Test_Results->Attributes->RestoreFromArray($Header->_Abnormal_Test_ResultsAttributes);
        $this->HospAdmReason = $Header->HospAdmReason;
        $Header->_HospAdmReasonAttributes = $this->_HospAdmReasonAttributes;
        $this->Parent->HospAdmReason->Value = $Header->HospAdmReason;
        $this->Parent->HospAdmReason->Attributes->RestoreFromArray($Header->_HospAdmReasonAttributes);
        $this->HospDiscReason = $Header->HospDiscReason;
        $Header->_HospDiscReasonAttributes = $this->_HospDiscReasonAttributes;
        $this->Parent->HospDiscReason->Value = $Header->HospDiscReason;
        $this->Parent->HospDiscReason->Attributes->RestoreFromArray($Header->_HospDiscReasonAttributes);
    }
    function ChangeTotalControls() {
    }
}
//End district_report ReportGroup class

//district_report GroupsCollection class @347-8B7B9597
class clsGroupsCollectiondistrict_report {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mFacilityNameCurrentHeaderIndex;
    public $mPatientIDCurrentHeaderIndex;
    public $mPregnancyRecNrCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectiondistrict_report(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mFacilityNameCurrentHeaderIndex = 1;
        $this->mPatientIDCurrentHeaderIndex = 2;
        $this->mPregnancyRecNrCurrentHeaderIndex = 3;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdistrict_report($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->FacilityNameTotalIndex = $this->mFacilityNameCurrentHeaderIndex;
        $group->PatientIDTotalIndex = $this->mPatientIDCurrentHeaderIndex;
        $group->PregnancyRecNrTotalIndex = $this->mPregnancyRecNrCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->FacilityName->Value = $this->Parent->FacilityName->initialValue;
        $this->Parent->PatientID->Value = $this->Parent->PatientID->initialValue;
        $this->Parent->PregnancyRecNr->Value = $this->Parent->PregnancyRecNr->initialValue;
        $this->Parent->Medical_Anamnesis->Value = $this->Parent->Medical_Anamnesis->initialValue;
        $this->Parent->Bad_Habits->Value = $this->Parent->Bad_Habits->initialValue;
        $this->Parent->Antenatal_Problems->Value = $this->Parent->Antenatal_Problems->initialValue;
        $this->Parent->Abnormal_Test_Results->Value = $this->Parent->Abnormal_Test_Results->initialValue;
        $this->Parent->HospAdmReason->Value = $this->Parent->HospAdmReason->initialValue;
        $this->Parent->HospDiscReason->Value = $this->Parent->HospDiscReason->initialValue;
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
            $OpenFlag = true;
            $GroupPatientID->GroupType = "PatientID";
            $this->mPatientIDCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupPatientID;
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
//End district_report GroupsCollection class

class clsReportdistrict_report { //district_report Class @347-4349EAE0

//district_report Variables @347-2AE56B40

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
    public $PregnancyRecNr_HeaderBlock, $PregnancyRecNr_Header;
    public $PregnancyRecNr_FooterBlock, $PregnancyRecNr_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $FacilityName_HeaderControls, $FacilityName_FooterControls;
    public $PatientID_HeaderControls, $PatientID_FooterControls;
    public $PregnancyRecNr_HeaderControls, $PregnancyRecNr_FooterControls;
//End district_report Variables

//Class_Initialize Event @347-BD4566FB
    function clsReportdistrict_report($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "district_report";
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
        $this->FacilityName_Footer = new clsSection($this);
        $this->FacilityName_Header = new clsSection($this);
        $this->FacilityName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->FacilityName_Header->Height);
        $this->PatientID_Footer = new clsSection($this);
        $this->PatientID_Header = new clsSection($this);
        $this->PatientID_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->PatientID_Header->Height);
        $this->PregnancyRecNr_Footer = new clsSection($this);
        $this->PregnancyRecNr_Header = new clsSection($this);
        $this->PregnancyRecNr_Header->Height = 2;
        $MaxSectionSize = max($MaxSectionSize, $this->PregnancyRecNr_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdistrict_reportDataSource($this);
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
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");

        $this->FacilityName = new clsControl(ccsReportLabel, "FacilityName", "FacilityName", ccsText, "", "", $this);
        $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsMemo, "", CCGetRequestParam("PatientID", ccsGet, NULL), $this);
        $this->PatientID->Page = "patient_maint_district.php";
        $this->PregnancyRecNr = new clsControl(ccsLink, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", CCGetRequestParam("PregnancyRecNr", ccsGet, NULL), $this);
        $this->PregnancyRecNr->Page = "pregnancy_maint.php";
        $this->Medical_Anamnesis = new clsControl(ccsReportLabel, "Medical_Anamnesis", "Medical_Anamnesis", ccsText, "", "", $this);
        $this->Bad_Habits = new clsControl(ccsReportLabel, "Bad_Habits", "Bad_Habits", ccsText, "", "", $this);
        $this->Antenatal_Problems = new clsControl(ccsReportLabel, "Antenatal_Problems", "Antenatal_Problems", ccsText, "", "", $this);
        $this->Abnormal_Test_Results = new clsControl(ccsReportLabel, "Abnormal_Test_Results", "Abnormal_Test_Results", ccsText, "", "", $this);
        $this->HospAdmReason = new clsControl(ccsReportLabel, "HospAdmReason", "HospAdmReason", ccsText, "", "", $this);
        $this->HospDiscReason = new clsControl(ccsReportLabel, "HospDiscReason", "HospDiscReason", ccsText, "", "", $this);
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->Report_CurrentDateTime = new clsControl(ccsReportLabel, "Report_CurrentDateTime", "Report_CurrentDateTime", ccsText, array('ShortDate', ' ', 'ShortTime'), "", $this);
        $this->Report_CurrentPage = new clsControl(ccsReportLabel, "Report_CurrentPage", "Report_CurrentPage", ccsInteger, "", "", $this);
        $this->Report_TotalPages = new clsControl(ccsReportLabel, "Report_TotalPages", "Report_TotalPages", ccsInteger, "", "", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @347-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @347-5E61DF9B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FacilityName->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->Medical_Anamnesis->Errors->Count());
        $errors = ($errors || $this->Bad_Habits->Errors->Count());
        $errors = ($errors || $this->Antenatal_Problems->Errors->Count());
        $errors = ($errors || $this->Abnormal_Test_Results->Errors->Count());
        $errors = ($errors || $this->HospAdmReason->Errors->Count());
        $errors = ($errors || $this->HospDiscReason->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDateTime->Errors->Count());
        $errors = ($errors || $this->Report_CurrentPage->Errors->Count());
        $errors = ($errors || $this->Report_TotalPages->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @347-A607DBB9
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Medical_Anamnesis->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Bad_Habits->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Antenatal_Problems->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Abnormal_Test_Results->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HospAdmReason->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HospDiscReason->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDateTime->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentPage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_TotalPages->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @347-6F858BCB
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_PatientID"] = CCGetFromGet("s_PatientID", NULL);
        $this->DataSource->Parameters["urls_PregnancyRecNr"] = CCGetFromGet("s_PregnancyRecNr", NULL);
        $this->DataSource->Parameters["urls_FacilityID"] = CCGetFromGet("s_FacilityID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $FacilityNameKey = "";
        $PatientIDKey = "";
        $PregnancyRecNrKey = "";
        $Groups = new clsGroupsCollectiondistrict_report($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
            $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
            $this->Medical_Anamnesis->SetValue($this->DataSource->Medical_Anamnesis->GetValue());
            $this->Bad_Habits->SetValue($this->DataSource->Bad_Habits->GetValue());
            $this->Antenatal_Problems->SetValue($this->DataSource->Antenatal_Problems->GetValue());
            $this->Abnormal_Test_Results->SetValue($this->DataSource->Abnormal_Test_Results->GetValue());
            $this->HospAdmReason->SetValue($this->DataSource->HospAdmReason->GetValue());
            $this->HospDiscReason->SetValue($this->DataSource->HospDiscReason->GetValue());
            $this->PatientID->Parameters = "";
            $this->PatientID->Parameters = CCAddParam($this->PatientID->Parameters, "PatientID", $this->DataSource->f("PatientID"));
            $this->PregnancyRecNr->Parameters = "";
            $this->PregnancyRecNr->Parameters = CCAddParam($this->PregnancyRecNr->Parameters, "PatientID", $this->DataSource->f("PatientID"));
            $this->PregnancyRecNr->Parameters = CCAddParam($this->PregnancyRecNr->Parameters, "PregnancyID", $this->DataSource->f("PregnancyID"));
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->OpenGroup("FacilityName");
            } elseif ($PatientIDKey != $this->DataSource->f("PatientID")) {
                $Groups->OpenGroup("PatientID");
            } elseif ($PregnancyRecNrKey != $this->DataSource->f("PregnancyRecNr")) {
                $Groups->OpenGroup("PregnancyRecNr");
            }
            $Groups->AddItem();
            $FacilityNameKey = $this->DataSource->f("FacilityName");
            $PatientIDKey = $this->DataSource->f("PatientID");
            $PregnancyRecNrKey = $this->DataSource->f("PregnancyRecNr");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $FacilityNameKey != $this->DataSource->f("FacilityName")) {
                $Groups->CloseGroup("FacilityName");
            } elseif ($PatientIDKey != $this->DataSource->f("PatientID")) {
                $Groups->CloseGroup("PatientID");
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
            $this->ControlsVisible["FacilityName"] = $this->FacilityName->Visible;
            $this->ControlsVisible["PatientID"] = $this->PatientID->Visible;
            $this->ControlsVisible["PregnancyRecNr"] = $this->PregnancyRecNr->Visible;
            $this->ControlsVisible["Medical_Anamnesis"] = $this->Medical_Anamnesis->Visible;
            $this->ControlsVisible["Bad_Habits"] = $this->Bad_Habits->Visible;
            $this->ControlsVisible["Antenatal_Problems"] = $this->Antenatal_Problems->Visible;
            $this->ControlsVisible["Abnormal_Test_Results"] = $this->Abnormal_Test_Results->Visible;
            $this->ControlsVisible["HospAdmReason"] = $this->HospAdmReason->Visible;
            $this->ControlsVisible["HospDiscReason"] = $this->HospDiscReason->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Medical_Anamnesis->SetValue($items[$i]->Medical_Anamnesis);
                        $this->Medical_Anamnesis->Attributes->RestoreFromArray($items[$i]->_Medical_AnamnesisAttributes);
                        $this->Bad_Habits->SetValue($items[$i]->Bad_Habits);
                        $this->Bad_Habits->Attributes->RestoreFromArray($items[$i]->_Bad_HabitsAttributes);
                        $this->Antenatal_Problems->SetValue($items[$i]->Antenatal_Problems);
                        $this->Antenatal_Problems->Attributes->RestoreFromArray($items[$i]->_Antenatal_ProblemsAttributes);
                        $this->Abnormal_Test_Results->SetValue($items[$i]->Abnormal_Test_Results);
                        $this->Abnormal_Test_Results->Attributes->RestoreFromArray($items[$i]->_Abnormal_Test_ResultsAttributes);
                        $this->HospAdmReason->SetValue($items[$i]->HospAdmReason);
                        $this->HospAdmReason->Attributes->RestoreFromArray($items[$i]->_HospAdmReasonAttributes);
                        $this->HospDiscReason->SetValue($items[$i]->HospDiscReason);
                        $this->HospDiscReason->Attributes->RestoreFromArray($items[$i]->_HospDiscReasonAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Medical_Anamnesis->Show();
                        $this->Bad_Habits->Show();
                        $this->Antenatal_Problems->Show();
                        $this->Abnormal_Test_Results->Show();
                        $this->HospAdmReason->Show();
                        $this->HospDiscReason->Show();
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

} //End district_report Class @347-FCB6E20C

class clsdistrict_reportDataSource extends clsDBregistry_db {  //district_reportDataSource Class @347-7C0EB78C

//DataSource Variables @347-78CB0EE5
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $FacilityName;
    public $PatientID;
    public $PregnancyRecNr;
    public $Medical_Anamnesis;
    public $Bad_Habits;
    public $Antenatal_Problems;
    public $Abnormal_Test_Results;
    public $HospAdmReason;
    public $HospDiscReason;
//End DataSource Variables

//DataSourceClass_Initialize Event @347-2C1E8F41
    function clsdistrict_reportDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report district_report";
        $this->Initialize();
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsMemo, "");
        
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->Medical_Anamnesis = new clsField("Medical_Anamnesis", ccsText, "");
        
        $this->Bad_Habits = new clsField("Bad_Habits", ccsText, "");
        
        $this->Antenatal_Problems = new clsField("Antenatal_Problems", ccsText, "");
        
        $this->Abnormal_Test_Results = new clsField("Abnormal_Test_Results", ccsText, "");
        
        $this->HospAdmReason = new clsField("HospAdmReason", ccsText, "");
        
        $this->HospDiscReason = new clsField("HospDiscReason", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @347-A6781693
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "PregnancyID ASC, GenHospDate ASC, HospDiscReason ASC, HospAdmReason ASC, VisitDateTests ASC, Abnormal_Test_Results ASC, VisitDateProbs ASC, Antenatal_Problems ASC, Bad_Habits ASC, Medical_Anamnesis ASC";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @347-E95EBF64
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_PatientID", ccsText, "", "", $this->Parameters["urls_PatientID"], '%', false);
        $this->wp->AddParameter("2", "urls_PregnancyRecNr", ccsText, "", "", $this->Parameters["urls_PregnancyRecNr"], '%', false);
        $this->wp->AddParameter("3", "urls_FacilityID", ccsText, "", "", $this->Parameters["urls_FacilityID"], '%', false);
    }
//End Prepare Method

//Open Method @347-797DB89F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n" .
        "FROM\n" .
        "\n" .
        "(\n" .
        "\n" .
        "SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, \n" .
        "pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, ')') AS Medical_Anamnesis, NULL AS Bad_Habits, \n" .
        "NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, NULL AS HospAdmReason, NULL AS HospDiscReason, \n" .
        "NULL AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM ((((patient INNER JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID) \n" .
        "INNER JOIN pregnancy ON pregnancy.PatientID = patient.PatientID) \n" .
        "INNER JOIN icd10_all ON obstetric_anamnesis.ICD10ID = icd10_all.ICD10ID) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) \n" .
        "INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID\n" .
        "GROUP BY Medical_Anamnesis, pregnancy.PregnancyID\n" .
        "\n" .
        "UNION \n" .
        "\n" .
        "SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, \n" .
        "pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, BadHabbitsName AS Bad_Habits, \n" .
        "NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, NULL AS HospAdmReason, \n" .
        "NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM ((((patient INNER JOIN pregnancy ON pregnancy.PatientID = patient.PatientID) INNER JOIN bad_habbits ON bad_habbits.PatientID = patient.PatientID) \n" .
        "INNER JOIN bad_habbitstype ON bad_habbits.BadHabbitsTypeID = bad_habbitstype.BadHabbitsTypeID) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID\n" .
        "GROUP BY Bad_Habits, pregnancy.PregnancyID\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, \n" .
        "pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, \n" .
        "CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(VisitDate AS CHAR)) AS Antenatal_Problems, VisitDate AS VisitDateProbs, NULL AS Abnormal_Test_Results, \n" .
        "NULL AS VisitDateTests, NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM (((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) \n" .
        "INNER JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID) \n" .
        "INNER JOIN visitdisease ON visitdisease.VisitID = visit.VisitID) \n" .
        "INNER JOIN icd10_all ON visitdisease.ICD10ID = icd10_all.ICD10ID) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) \n" .
        "INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID\n" .
        "GROUP BY Antenatal_Problems, pregnancy.PregnancyID\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID,  \n" .
        "pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, \n" .
        "NULL AS Antenatal_Problems, NULL AS VisitDateProbs, CONCAT(TestName, ', ', CAST(VisitDate AS CHAR)) AS Abnormal_Test_Results, VisitDate AS VisitDateTests, \n" .
        "NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM (((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) \n" .
        "INNER JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID) \n" .
        "INNER JOIN test ON test.VisitID = visit.VisitID) \n" .
        "INNER JOIN testcode ON test.TestCodeID = testcode.TestCodeID) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) \n" .
        "INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID\n" .
        "WHERE TestResultNormal = 0 \n" .
        "GROUP BY Abnormal_Test_Results, pregnancy.PregnancyID\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, \n" .
        "pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, \n" .
        "NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, \n" .
        "CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(AdmissionDate AS CHAR)) AS HospAdmReason, NULL AS HospDiscReason, \n" .
        "AdmissionDate AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM (((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) \n" .
        "INNER JOIN hospitalisation ON pregnancy.PregnancyID = hospitalisation.PregnancyID) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) \n" .
        "LEFT JOIN reasonhospitalisation ON hospitalisation.HospitalisationID = reasonhospitalisation.HospitalisationID)\n" .
        "INNER JOIN icd10_all ON reasonhospitalisation.ICD10ID = icd10_all.ICD10ID) \n" .
        "INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID\n" .
        "GROUP BY HospAdmReason, pregnancy.PregnancyID \n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, \n" .
        "pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, \n" .
        "NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, \n" .
        "NULL AS HospAdmReason, CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(hospitalisation.DischargeDate AS CHAR)) AS HospDiscReason, \n" .
        "hospitalisation.DischargeDate AS GenHospDate, patient.Discharged AS Disc\n" .
        "FROM (((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) \n" .
        "INNER JOIN hospitalisation ON pregnancy.PregnancyID = hospitalisation.PregnancyID) \n" .
        "INNER JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID)\n" .
        "INNER JOIN icd10_all ON hospitalisationdischargediagnosis.ICD10ID = icd10_all.ICD10ID) \n" .
        "LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) \n" .
        "INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID\n" .
        "WHERE hospitalisation.DischargeDate IS NOT NULL\n" .
        "GROUP BY HospDiscReason, pregnancy.PregnancyID \n" .
        "\n" .
        ") \n" .
        "\n" .
        "AS result \n" .
        "\n" .
        "WHERE PatientID LIKE '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' AND PregnancyRecNr LIKE '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "' AND CURDATE() < ADDDATE(Calc_DeliveryDate, 31) AND \n" .
        "DataDelivery IS NULL AND preg_facility_id LIKE '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' AND Disc = 0{SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "FacilityName asc,PatientID asc,PregnancyRecNr asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @347-35428334
    function SetValues()
    {
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->PatientID->SetDBValue($this->f("PatientID"));
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->Medical_Anamnesis->SetDBValue($this->f("Medical_Anamnesis"));
        $this->Bad_Habits->SetDBValue($this->f("Bad_Habits"));
        $this->Antenatal_Problems->SetDBValue($this->f("Antenatal_Problems"));
        $this->Abnormal_Test_Results->SetDBValue($this->f("Abnormal_Test_Results"));
        $this->HospAdmReason->SetDBValue($this->f("HospAdmReason"));
        $this->HospDiscReason->SetDBValue($this->f("HospDiscReason"));
    }
//End SetValues Method

} //End district_reportDataSource Class @347-FCB6E20C

//Initialize Page @1-11AF3901
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
$TemplateFileName = "report_risks.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Check SSL @1-E30DD771
CCCheckSSL();
//End Check SSL

//Authenticate User @1-0C179BD6
CCSecurityRedirect("1;3;2", SecureURL . "" .  "noaccess.php");
//End Authenticate User

//Include events file @1-34F2CE02
include_once("./report_risks_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-B30D010A
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$report3 = new clsRecordreport3("", $MainPage);
$Report_Print = new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "report_risks.php";
$district_report = new clsReportdistrict_report("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->report3 = & $report3;
$MainPage->Report_Print = & $Report_Print;
$MainPage->district_report = & $district_report;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$district_report->Initialize();

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

//Execute Components @1-0F52052B
$topmenu->Operations();
$report3->Operation();
//End Execute Components

//Go to destination page @1-FFBEB03A
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($report3);
    unset($district_report);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2F031FF4
$topmenu->Show();
$report3->Show();
$district_report->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-89AFDEC7
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($report3);
unset($district_report);
unset($Tpl);
//End Unload Page


?>
