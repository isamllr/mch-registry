<?php
//Include Common Files @1-3020A777
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "dashboard.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @439-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//patient_facilities ReportGroup class @479-727F891A
class clsReportGrouppatient_facilities {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $FacilityName, $_FacilityNameAttributes;
    public $NumberPatients, $_NumberPatientsAttributes;
    public $TotalSum_NumberPatients, $_TotalSum_NumberPatientsAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGrouppatient_facilities(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->FacilityName = $this->Parent->FacilityName->Value;
        $this->NumberPatients = $this->Parent->NumberPatients->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->TotalSum_NumberPatients = $this->Parent->TotalSum_NumberPatients->GetTotalValue($mode);
        $this->_FacilityNameAttributes = $this->Parent->FacilityName->Attributes->GetAsArray();
        $this->_NumberPatientsAttributes = $this->Parent->NumberPatients->Attributes->GetAsArray();
        $this->_TotalSum_NumberPatientsAttributes = $this->Parent->TotalSum_NumberPatients->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->TotalSum_NumberPatients = $this->TotalSum_NumberPatients;
        $Header->_TotalSum_NumberPatientsAttributes = $this->_TotalSum_NumberPatientsAttributes;
        $this->FacilityName = $Header->FacilityName;
        $Header->_FacilityNameAttributes = $this->_FacilityNameAttributes;
        $this->Parent->FacilityName->Value = $Header->FacilityName;
        $this->Parent->FacilityName->Attributes->RestoreFromArray($Header->_FacilityNameAttributes);
        $this->NumberPatients = $Header->NumberPatients;
        $Header->_NumberPatientsAttributes = $this->_NumberPatientsAttributes;
        $this->Parent->NumberPatients->Value = $Header->NumberPatients;
        $this->Parent->NumberPatients->Attributes->RestoreFromArray($Header->_NumberPatientsAttributes);
    }
    function ChangeTotalControls() {
        $this->TotalSum_NumberPatients = $this->Parent->TotalSum_NumberPatients->GetValue();
    }
}
//End patient_facilities ReportGroup class

//patient_facilities GroupsCollection class @479-B3110383
class clsGroupsCollectionpatient_facilities {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionpatient_facilities(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGrouppatient_facilities($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->FacilityName->Value = $this->Parent->FacilityName->initialValue;
        $this->Parent->NumberPatients->Value = $this->Parent->NumberPatients->initialValue;
        $this->Parent->TotalSum_NumberPatients->Value = $this->Parent->TotalSum_NumberPatients->initialValue;
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
//End patient_facilities GroupsCollection class

class clsReportpatient_facilities { //patient_facilities Class @479-65AF7649

//patient_facilities Variables @479-944D286E

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
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
//End patient_facilities Variables

//Class_Initialize Event @479-8A6341B0
    function clsReportpatient_facilities($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "patient_facilities";
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
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clspatient_facilitiesDataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 10000;
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

        $this->FacilityName = new clsControl(ccsReportLabel, "FacilityName", "FacilityName", ccsText, "", "", $this);
        $this->NumberPatients = new clsControl(ccsReportLabel, "NumberPatients", "NumberPatients", ccsInteger, "", "", $this);
        $this->Separator = new clsPanel("Separator", $this);
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->TotalSum_NumberPatients = new clsControl(ccsReportLabel, "TotalSum_NumberPatients", "TotalSum_NumberPatients", ccsInteger, "", "", $this);
        $this->TotalSum_NumberPatients->TotalFunction = "Sum";
    }
//End Class_Initialize Event

//Initialize Method @479-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @479-1C6BDEE1
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FacilityName->Errors->Count());
        $errors = ($errors || $this->NumberPatients->Errors->Count());
        $errors = ($errors || $this->TotalSum_NumberPatients->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @479-D3780E9F
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NumberPatients->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalSum_NumberPatients->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @479-E4331136
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;


        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionpatient_facilities($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
            $this->NumberPatients->SetValue($this->DataSource->NumberPatients->GetValue());
            $this->TotalSum_NumberPatients->SetValue($this->DataSource->TotalSum_NumberPatients->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
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
            $this->ControlsVisible["NumberPatients"] = $this->NumberPatients->Visible;
            $this->ControlsVisible["Separator"] = $this->Separator->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $this->Separator->Visible = "" == $items[$i+1]->GroupType;
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->FacilityName->SetValue($items[$i]->FacilityName);
                        $this->FacilityName->Attributes->RestoreFromArray($items[$i]->_FacilityNameAttributes);
                        $this->NumberPatients->SetValue($items[$i]->NumberPatients);
                        $this->NumberPatients->Attributes->RestoreFromArray($items[$i]->_NumberPatientsAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->FacilityName->Show();
                        $this->NumberPatients->Show();
                        $this->Separator->Show();
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
                            $this->TotalSum_NumberPatients->SetValue($items[$i]->TotalSum_NumberPatients);
                            $this->TotalSum_NumberPatients->Attributes->RestoreFromArray($items[$i]->_TotalSum_NumberPatientsAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalSum_NumberPatients->Show();
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
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End patient_facilities Class @479-FCB6E20C

class clspatient_facilitiesDataSource extends clsDBregistry_db {  //patient_facilitiesDataSource Class @479-ED6F7BAD

//DataSource Variables @479-EEB8CB43
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $FacilityName;
    public $NumberPatients;
    public $TotalSum_NumberPatients;
//End DataSource Variables

//DataSourceClass_Initialize Event @479-528D2504
    function clspatient_facilitiesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report patient_facilities";
        $this->Initialize();
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->NumberPatients = new clsField("NumberPatients", ccsInteger, "");
        
        $this->TotalSum_NumberPatients = new clsField("TotalSum_NumberPatients", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @479-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @479-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @479-65A4B5B4
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT COUNT(*) AS NumberPatients, FacilityName \n\n" .
        "FROM patient INNER JOIN facilities ON\n\n" .
        "patient.FacilityID = facilities.FacilityID {SQL_Where}\n\n" .
        "GROUP BY FacilityName {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @479-5AD35F7B
    function SetValues()
    {
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->NumberPatients->SetDBValue(trim($this->f("NumberPatients")));
        $this->TotalSum_NumberPatients->SetDBValue(trim($this->f("NumberPatients")));
    }
//End SetValues Method

} //End patient_facilitiesDataSource Class @479-FCB6E20C

//Include Page implementation @500-76A3363F
include_once(RelativePath . "/news.php");
//End Include Page implementation

//refLast30Days ReportGroup class @501-24CAF7CB
class clsReportGrouprefLast30Days {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $GivenName, $_GivenNameAttributes;
    public $FamilyName, $_FamilyNameAttributes;
    public $ReferralDate, $_ReferralDateAttributes;
    public $RefIndicationName, $_RefIndicationNameAttributes;
    public $DepartmentDesc, $_DepartmentDescAttributes;
    public $PatientID, $_PatientIDPage, $_PatientIDParameters, $_PatientIDAttributes;
    public $TypeName, $_TypeNameAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;

    function clsReportGrouprefLast30Days(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->GivenName = $this->Parent->GivenName->Value;
        $this->FamilyName = $this->Parent->FamilyName->Value;
        $this->ReferralDate = $this->Parent->ReferralDate->Value;
        $this->RefIndicationName = $this->Parent->RefIndicationName->Value;
        $this->DepartmentDesc = $this->Parent->DepartmentDesc->Value;
        $this->PatientID = $this->Parent->PatientID->Value;
        $this->TypeName = $this->Parent->TypeName->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_PatientIDPage = $this->Parent->PatientID->Page;
        $this->_PatientIDParameters = $this->Parent->PatientID->Parameters;
        $this->_Sorter_patient_PatientIDAttributes = $this->Parent->Sorter_patient_PatientID->Attributes->GetAsArray();
        $this->_Sorter_ReferralDateAttributes = $this->Parent->Sorter_ReferralDate->Attributes->GetAsArray();
        $this->_Sorter_RefIndicationNameAttributes = $this->Parent->Sorter_RefIndicationName->Attributes->GetAsArray();
        $this->_Sorter_DepartmentDescAttributes = $this->Parent->Sorter_DepartmentDesc->Attributes->GetAsArray();
        $this->_GivenNameAttributes = $this->Parent->GivenName->Attributes->GetAsArray();
        $this->_FamilyNameAttributes = $this->Parent->FamilyName->Attributes->GetAsArray();
        $this->_ReferralDateAttributes = $this->Parent->ReferralDate->Attributes->GetAsArray();
        $this->_RefIndicationNameAttributes = $this->Parent->RefIndicationName->Attributes->GetAsArray();
        $this->_DepartmentDescAttributes = $this->Parent->DepartmentDesc->Attributes->GetAsArray();
        $this->_PatientIDAttributes = $this->Parent->PatientID->Attributes->GetAsArray();
        $this->_TypeNameAttributes = $this->Parent->TypeName->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->GivenName = $Header->GivenName;
        $Header->_GivenNameAttributes = $this->_GivenNameAttributes;
        $this->Parent->GivenName->Value = $Header->GivenName;
        $this->Parent->GivenName->Attributes->RestoreFromArray($Header->_GivenNameAttributes);
        $this->FamilyName = $Header->FamilyName;
        $Header->_FamilyNameAttributes = $this->_FamilyNameAttributes;
        $this->Parent->FamilyName->Value = $Header->FamilyName;
        $this->Parent->FamilyName->Attributes->RestoreFromArray($Header->_FamilyNameAttributes);
        $this->ReferralDate = $Header->ReferralDate;
        $Header->_ReferralDateAttributes = $this->_ReferralDateAttributes;
        $this->Parent->ReferralDate->Value = $Header->ReferralDate;
        $this->Parent->ReferralDate->Attributes->RestoreFromArray($Header->_ReferralDateAttributes);
        $this->RefIndicationName = $Header->RefIndicationName;
        $Header->_RefIndicationNameAttributes = $this->_RefIndicationNameAttributes;
        $this->Parent->RefIndicationName->Value = $Header->RefIndicationName;
        $this->Parent->RefIndicationName->Attributes->RestoreFromArray($Header->_RefIndicationNameAttributes);
        $this->DepartmentDesc = $Header->DepartmentDesc;
        $Header->_DepartmentDescAttributes = $this->_DepartmentDescAttributes;
        $this->Parent->DepartmentDesc->Value = $Header->DepartmentDesc;
        $this->Parent->DepartmentDesc->Attributes->RestoreFromArray($Header->_DepartmentDescAttributes);
        $this->PatientID = $Header->PatientID;
        $this->_PatientIDPage = $Header->_PatientIDPage;
        $this->_PatientIDParameters = $Header->_PatientIDParameters;
        $Header->_PatientIDAttributes = $this->_PatientIDAttributes;
        $this->Parent->PatientID->Value = $Header->PatientID;
        $this->Parent->PatientID->Attributes->RestoreFromArray($Header->_PatientIDAttributes);
        $this->TypeName = $Header->TypeName;
        $Header->_TypeNameAttributes = $this->_TypeNameAttributes;
        $this->Parent->TypeName->Value = $Header->TypeName;
        $this->Parent->TypeName->Attributes->RestoreFromArray($Header->_TypeNameAttributes);
    }
    function ChangeTotalControls() {
    }
}
//End refLast30Days ReportGroup class

//refLast30Days GroupsCollection class @501-421A0D95
class clsGroupsCollectionrefLast30Days {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionrefLast30Days(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGrouprefLast30Days($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->GivenName->Value = $this->Parent->GivenName->initialValue;
        $this->Parent->FamilyName->Value = $this->Parent->FamilyName->initialValue;
        $this->Parent->ReferralDate->Value = $this->Parent->ReferralDate->initialValue;
        $this->Parent->RefIndicationName->Value = $this->Parent->RefIndicationName->initialValue;
        $this->Parent->DepartmentDesc->Value = $this->Parent->DepartmentDesc->initialValue;
        $this->Parent->PatientID->Value = $this->Parent->PatientID->initialValue;
        $this->Parent->TypeName->Value = $this->Parent->TypeName->initialValue;
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
//End refLast30Days GroupsCollection class

class clsReportrefLast30Days { //refLast30Days Class @501-C14A04B3

//refLast30Days Variables @501-77D99060

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
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Sorter_patient_PatientID;
    public $Sorter_ReferralDate;
    public $Sorter_RefIndicationName;
    public $Sorter_DepartmentDesc;
//End refLast30Days Variables

//Class_Initialize Event @501-5DE4F9D8
    function clsReportrefLast30Days($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "refLast30Days";
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
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsrefLast30DaysDataSource($this);
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
        $this->Visible = (CCSecurityAccessCheck("3") == "success");
        $this->SorterName = CCGetParam("refLast30DaysOrder", "");
        $this->SorterDirection = CCGetParam("refLast30DaysDir", "");

        $this->Sorter_patient_PatientID = new clsSorter($this->ComponentName, "Sorter_patient_PatientID", $FileName, $this);
        $this->Sorter_ReferralDate = new clsSorter($this->ComponentName, "Sorter_ReferralDate", $FileName, $this);
        $this->Sorter_RefIndicationName = new clsSorter($this->ComponentName, "Sorter_RefIndicationName", $FileName, $this);
        $this->Sorter_DepartmentDesc = new clsSorter($this->ComponentName, "Sorter_DepartmentDesc", $FileName, $this);
        $this->GivenName = new clsControl(ccsReportLabel, "GivenName", "GivenName", ccsMemo, "", "", $this);
        $this->FamilyName = new clsControl(ccsReportLabel, "FamilyName", "FamilyName", ccsMemo, "", "", $this);
        $this->ReferralDate = new clsControl(ccsReportLabel, "ReferralDate", "ReferralDate", ccsDate, $DefaultDateFormat, "", $this);
        $this->RefIndicationName = new clsControl(ccsReportLabel, "RefIndicationName", "RefIndicationName", ccsText, "", "", $this);
        $this->DepartmentDesc = new clsControl(ccsReportLabel, "DepartmentDesc", "DepartmentDesc", ccsText, "", "", $this);
        $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", ccsGet, NULL), $this);
        $this->PatientID->Page = "patient_maint_fac.php";
        $this->TypeName = new clsControl(ccsReportLabel, "TypeName", "TypeName", ccsText, "", "", $this);
        $this->NoRecords = new clsPanel("NoRecords", $this);
    }
//End Class_Initialize Event

//Initialize Method @501-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @501-5A61D8A3
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->GivenName->Errors->Count());
        $errors = ($errors || $this->FamilyName->Errors->Count());
        $errors = ($errors || $this->ReferralDate->Errors->Count());
        $errors = ($errors || $this->RefIndicationName->Errors->Count());
        $errors = ($errors || $this->DepartmentDesc->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->TypeName->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @501-37581E77
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->GivenName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FamilyName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReferralDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RefIndicationName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DepartmentDesc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PatientID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TypeName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @501-A44A15E7
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["sess_Facilities"] = CCGetSession("s_Facilities", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionrefLast30Days($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->GivenName->SetValue($this->DataSource->GivenName->GetValue());
            $this->FamilyName->SetValue($this->DataSource->FamilyName->GetValue());
            $this->ReferralDate->SetValue($this->DataSource->ReferralDate->GetValue());
            $this->RefIndicationName->SetValue($this->DataSource->RefIndicationName->GetValue());
            $this->DepartmentDesc->SetValue($this->DataSource->DepartmentDesc->GetValue());
            $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            $this->TypeName->SetValue($this->DataSource->TypeName->GetValue());
            $this->PatientID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->PatientID->Parameters = CCAddParam($this->PatientID->Parameters, "PatientID", $this->DataSource->f("patient_PatientID"));
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
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
            $this->ControlsVisible["GivenName"] = $this->GivenName->Visible;
            $this->ControlsVisible["FamilyName"] = $this->FamilyName->Visible;
            $this->ControlsVisible["ReferralDate"] = $this->ReferralDate->Visible;
            $this->ControlsVisible["RefIndicationName"] = $this->RefIndicationName->Visible;
            $this->ControlsVisible["DepartmentDesc"] = $this->DepartmentDesc->Visible;
            $this->ControlsVisible["PatientID"] = $this->PatientID->Visible;
            $this->ControlsVisible["TypeName"] = $this->TypeName->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->GivenName->SetValue($items[$i]->GivenName);
                        $this->GivenName->Attributes->RestoreFromArray($items[$i]->_GivenNameAttributes);
                        $this->FamilyName->SetValue($items[$i]->FamilyName);
                        $this->FamilyName->Attributes->RestoreFromArray($items[$i]->_FamilyNameAttributes);
                        $this->ReferralDate->SetValue($items[$i]->ReferralDate);
                        $this->ReferralDate->Attributes->RestoreFromArray($items[$i]->_ReferralDateAttributes);
                        $this->RefIndicationName->SetValue($items[$i]->RefIndicationName);
                        $this->RefIndicationName->Attributes->RestoreFromArray($items[$i]->_RefIndicationNameAttributes);
                        $this->DepartmentDesc->SetValue($items[$i]->DepartmentDesc);
                        $this->DepartmentDesc->Attributes->RestoreFromArray($items[$i]->_DepartmentDescAttributes);
                        $this->PatientID->SetValue($items[$i]->PatientID);
                        $this->PatientID->Page = $items[$i]->_PatientIDPage;
                        $this->PatientID->Parameters = $items[$i]->_PatientIDParameters;
                        $this->PatientID->Attributes->RestoreFromArray($items[$i]->_PatientIDAttributes);
                        $this->TypeName->SetValue($items[$i]->TypeName);
                        $this->TypeName->Attributes->RestoreFromArray($items[$i]->_TypeNameAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->GivenName->Show();
                        $this->FamilyName->Show();
                        $this->ReferralDate->Show();
                        $this->RefIndicationName->Show();
                        $this->DepartmentDesc->Show();
                        $this->PatientID->Show();
                        $this->TypeName->Show();
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
                                $this->Sorter_patient_PatientID->Show();
                                $this->Sorter_ReferralDate->Show();
                                $this->Sorter_RefIndicationName->Show();
                                $this->Sorter_DepartmentDesc->Show();
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
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End refLast30Days Class @501-FCB6E20C

class clsrefLast30DaysDataSource extends clsDBregistry_db {  //refLast30DaysDataSource Class @501-715C0AA8

//DataSource Variables @501-51B9207B
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $GivenName;
    public $FamilyName;
    public $ReferralDate;
    public $RefIndicationName;
    public $DepartmentDesc;
    public $PatientID;
    public $TypeName;
//End DataSource Variables

//DataSourceClass_Initialize Event @501-7FB8AAD9
    function clsrefLast30DaysDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report refLast30Days";
        $this->Initialize();
        $this->GivenName = new clsField("GivenName", ccsMemo, "");
        
        $this->FamilyName = new clsField("FamilyName", ccsMemo, "");
        
        $this->ReferralDate = new clsField("ReferralDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->RefIndicationName = new clsField("RefIndicationName", ccsText, "");
        
        $this->DepartmentDesc = new clsField("DepartmentDesc", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        
        $this->TypeName = new clsField("TypeName", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @501-6D2758F1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateRef DESC";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_patient_PatientID" => array("patient.PatientID", ""), 
            "Sorter_ReferralDate" => array("VisitDate", ""), 
            "Sorter_RefIndicationName" => array("RefIndicationName", ""), 
            "Sorter_DepartmentDesc" => array("DepartmentDesc", "")));
    }
//End SetOrder Method

//Prepare Method @501-5FB630CD
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sess_Facilities", ccsText, "", "", $this->Parameters["sess_Facilities"], 0, false);
    }
//End Prepare Method

//Open Method @501-4569A68D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * FROM\n" .
        "(\n" .
        "SELECT patient.PatientID AS patient_PatientID, VisitDate AS DateRef, RefIndicationName,  DepartmentDesc, GivenName AS GivenName, FamilyName AS FamilyName, \n" .
        "referral.FacilityID AS refFacility, referraltype.TypeName as TypeName\n" .
        "FROM (((((pregnancy INNER JOIN visit ON\n" .
        "visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN patient ON\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN referral ON\n" .
        "referral.VisitID = visit.VisitID) INNER JOIN department ON\n" .
        "referral.DeptID = department.DeptID) INNER JOIN refindication ON\n" .
        "referral.IndicationID = refindication.IndicationID) INNER JOIN referraltype ON\n" .
        "referral.ReferralTypeID = referraltype.ReferralTypeID \n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT patient.PatientID AS patient_PatientID, hospitalisation.AdmissionDate AS DateRef,  RefIndicationName, DepartmentDesc, GivenName AS GivenName, FamilyName AS FamilyName,\n" .
        "referralhosp.FacilityID AS refFacility, 'res:RefDelivery' as TypeName\n" .
        "FROM ((((pregnancy INNER JOIN hospitalisation ON\n" .
        "hospitalisation.PregnancyID = pregnancy.PregnancyID) INNER JOIN patient ON\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN referralhosp ON\n" .
        "referralhosp.HospitalisationID = hospitalisation.HospitalisationID) INNER JOIN department ON\n" .
        "referralhosp.DeptID = department.DeptID) INNER JOIN refindication ON\n" .
        "referralhosp.IndicationID = refindication.IndicationID\n" .
        "\n" .
        ") AS res\n" .
        "WHERE refFacility = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND ( CURDATE() <= ADDDATE(DateRef, 30) )  {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @501-F7DC4FC8
    function SetValues()
    {
        $this->GivenName->SetDBValue($this->f("GivenName"));
        $this->FamilyName->SetDBValue($this->f("FamilyName"));
        $this->ReferralDate->SetDBValue(trim($this->f("DateRef")));
        $this->RefIndicationName->SetDBValue($this->f("RefIndicationName"));
        $this->DepartmentDesc->SetDBValue($this->f("DepartmentDesc"));
        $this->PatientID->SetDBValue(trim($this->f("patient_PatientID")));
        $this->TypeName->SetDBValue($this->f("TypeName"));
    }
//End SetValues Method

} //End refLast30DaysDataSource Class @501-FCB6E20C







//Initialize Page @1-ED05DC66
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
$TemplateFileName = "dashboard.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Check SSL @1-E30DD771
CCCheckSSL();
//End Check SSL

//Authenticate User @1-2562D38D
CCSecurityRedirect("1;3;2", "");
//End Authenticate User

//Include events file @1-6C8AB516
include_once("./dashboard_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5B275EC3
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$s_TodayDate = new clsControl(ccsLabel, "s_TodayDate", "s_TodayDate", ccsDate, array("dddd", ", ", "mmmm", " ", "d", ", ", "yyyy"), CCGetRequestParam("s_TodayDate", ccsGet, NULL), $MainPage);
$s_TodayDate->HTML = true;
$s_CurrentUser = new clsControl(ccsLabel, "s_CurrentUser", "s_CurrentUser", ccsText, "", CCGetRequestParam("s_CurrentUser", ccsGet, NULL), $MainPage);
$s_ActiveDatabase = new clsControl(ccsLabel, "s_ActiveDatabase", "s_ActiveDatabase", ccsText, "", CCGetRequestParam("s_ActiveDatabase", ccsGet, NULL), $MainPage);
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$s_Facilities = new clsControl(ccsLabel, "s_Facilities", "s_Facilities", ccsText, "", CCGetRequestParam("s_Facilities", ccsGet, NULL), $MainPage);
$DatabaseVersion = new clsControl(ccsLabel, "DatabaseVersion", "DatabaseVersion", ccsText, "", CCGetRequestParam("DatabaseVersion", ccsGet, NULL), $MainPage);
$patient_facilities = new clsReportpatient_facilities("", $MainPage);
$news = new clsnews("", "news", $MainPage);
$news->Initialize();
$refLast30Days = new clsReportrefLast30Days("", $MainPage);
$MainPage->s_TodayDate = & $s_TodayDate;
$MainPage->s_CurrentUser = & $s_CurrentUser;
$MainPage->s_ActiveDatabase = & $s_ActiveDatabase;
$MainPage->topmenu = & $topmenu;
$MainPage->s_Facilities = & $s_Facilities;
$MainPage->DatabaseVersion = & $DatabaseVersion;
$MainPage->patient_facilities = & $patient_facilities;
$MainPage->news = & $news;
$MainPage->refLast30Days = & $refLast30Days;
$patient_facilities->Initialize();
$refLast30Days->Initialize();

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

//Execute Components @1-614BAE77
$topmenu->Operations();
$news->Operations();
//End Execute Components

//Go to destination page @1-34DD7C9F
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($patient_facilities);
    $news->Class_Terminate();
    unset($news);
    unset($refLast30Days);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B44F830C
$topmenu->Show();
$patient_facilities->Show();
$news->Show();
$refLast30Days->Show();
$s_TodayDate->Show();
$s_CurrentUser->Show();
$s_ActiveDatabase->Show();
$s_Facilities->Show();
$DatabaseVersion->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-524D71F4
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($patient_facilities);
$news->Class_Terminate();
unset($news);
unset($refLast30Days);
unset($Tpl);
//End Unload Page


?>
