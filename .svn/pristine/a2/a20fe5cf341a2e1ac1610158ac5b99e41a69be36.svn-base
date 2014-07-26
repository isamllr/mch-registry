<?php
//Include Common Files @1-0A024541
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "delivery_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordpregnancy_header { //pregnancy_header Class @3-8E4CDD04

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

//Class_Initialize Event @3-8D203E65
    function clsRecordpregnancy_header($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record pregnancy_header/Error";
        $this->DataSource = new clspregnancy_headerDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("3") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "pregnancy_header";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->PregnancyRecNr = new clsControl(ccsLabel, "PregnancyRecNr", $CCSLocales->GetText("PregnancyRecNr"), ccsText, "", CCGetRequestParam("PregnancyRecNr", $Method, NULL), $this);
            $this->FirstName = new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", $Method, NULL), $this);
            $this->FamiliyName = new clsControl(ccsLabel, "FamiliyName", "FamiliyName", ccsText, "", CCGetRequestParam("FamiliyName", $Method, NULL), $this);
            $this->BirthDate = new clsControl(ccsLabel, "BirthDate", "BirthDate", ccsDate, array("ShortDate"), CCGetRequestParam("BirthDate", $Method, NULL), $this);
            $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
            $this->PatientID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->PatientID->Page = "patient_maint_fac.php";
        }
    }
//End Class_Initialize Event

//Initialize Method @3-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @3-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-C82C427B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->FamiliyName->Errors->Count());
        $errors = ($errors || $this->BirthDate->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
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

//Operation Method @3-17DC9883
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @3-860F6492
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
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
                $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                $this->FamiliyName->SetValue($this->DataSource->FamiliyName->GetValue());
                $this->BirthDate->SetValue($this->DataSource->BirthDate->GetValue());
                $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FamiliyName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BirthDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
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

        $this->PregnancyRecNr->Show();
        $this->FirstName->Show();
        $this->FamiliyName->Show();
        $this->BirthDate->Show();
        $this->PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End pregnancy_header Class @3-FCB6E20C

class clspregnancy_headerDataSource extends clsDBregistry_db {  //pregnancy_headerDataSource Class @3-B1B2C690

//DataSource Variables @3-DD53AE5C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $PregnancyRecNr;
    public $FirstName;
    public $FamiliyName;
    public $BirthDate;
    public $PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-B3F735C8
    function clspregnancy_headerDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record pregnancy_header/Error";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->FamiliyName = new clsField("FamiliyName", ccsText, "");
        
        $this->BirthDate = new clsField("BirthDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-190B3DAA
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @3-64C2DC81
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM pregnancy INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-81074AD6
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->FirstName->SetDBValue($this->f("GivenName"));
        $this->FamiliyName->SetDBValue($this->f("FamilyName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_headerDataSource Class @3-FCB6E20C

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecorddelivery { //delivery Class @234-A9C787A0

//Variables @234-9E315808

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

//Class_Initialize Event @234-5ABD11DC
    function clsRecorddelivery($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record delivery/Error";
        $this->DataSource = new clsdeliveryDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;3;2");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "delivery";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->HospitalAdmData = new clsControl(ccsTextBox, "HospitalAdmData", $CCSLocales->GetText("HospitalAdmData"), ccsDate, array("ShortDate"), CCGetRequestParam("HospitalAdmData", $Method, NULL), $this);
            $this->HospitalAdmData->Required = true;
            $this->DatePicker_HospitalAdmData = new clsDatePicker("DatePicker_HospitalAdmData", "delivery", "HospitalAdmData", $this);
            $this->FacilityID = new clsControl(ccsListBox, "FacilityID", $CCSLocales->GetText("FacilityID"), ccsInteger, "", CCGetRequestParam("FacilityID", $Method, NULL), $this);
            $this->FacilityID->DSType = dsTable;
            $this->FacilityID->DataSource = new clsDBregistry_db();
            $this->FacilityID->ds = & $this->FacilityID->DataSource;
            $this->FacilityID->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            $this->FacilityID->DataSource->Order = "FacilityName";
            list($this->FacilityID->BoundColumn, $this->FacilityID->TextColumn, $this->FacilityID->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->FacilityID->DataSource->Parameters["urlFacilityID"] = CCGetFromGet("FacilityID", NULL);
            $this->FacilityID->DataSource->wp = new clsSQLParameters();
            $this->FacilityID->DataSource->wp->AddParameter("1", "urlFacilityID", ccsInteger, "", "", $this->FacilityID->DataSource->Parameters["urlFacilityID"], "", false);
            $this->FacilityID->DataSource->wp->Criterion[1] = $this->FacilityID->DataSource->wp->Operation(opEqual, "FacilityID", $this->FacilityID->DataSource->wp->GetDBValue("1"), $this->FacilityID->DataSource->ToSQL($this->FacilityID->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->FacilityID->DataSource->Where = 
                 $this->FacilityID->DataSource->wp->Criterion[1];
            $this->FacilityID->DataSource->Order = "FacilityName";
            $this->FacilityID->Required = true;
            $this->PartnerDelivery = new clsControl(ccsRadioButton, "PartnerDelivery", $CCSLocales->GetText("PartnerDelivery"), ccsInteger, "", CCGetRequestParam("PartnerDelivery", $Method, NULL), $this);
            $this->PartnerDelivery->DSType = dsListOfValues;
            $this->PartnerDelivery->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")), array("-1", $CCSLocales->GetText("RNA")));
            $this->PartnerDelivery->HTML = true;
            $this->PartnerDelivery->Required = true;
            $this->Partogram = new clsControl(ccsRadioButton, "Partogram", $CCSLocales->GetText("Partogram"), ccsInteger, "", CCGetRequestParam("Partogram", $Method, NULL), $this);
            $this->Partogram->DSType = dsListOfValues;
            $this->Partogram->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")), array("-1", $CCSLocales->GetText("RNA")));
            $this->Partogram->HTML = true;
            $this->Partogram->Required = true;
            $this->PregnancyID = new clsControl(ccsHidden, "PregnancyID", "PregnancyID", ccsInteger, "", CCGetRequestParam("PregnancyID", $Method, NULL), $this);
            $this->CurrentUser = new clsControl(ccsHidden, "CurrentUser", "CurrentUser", ccsText, "", CCGetRequestParam("CurrentUser", $Method, NULL), $this);
            $this->lastmodified = new clsControl(ccsLabel, "lastmodified", "lastmodified", ccsDate, array("GeneralDate"), CCGetRequestParam("lastmodified", $Method, NULL), $this);
            $this->user = new clsControl(ccsLabel, "user", "user", ccsText, "", CCGetRequestParam("user", $Method, NULL), $this);
            $this->EmployeeID = new clsControl(ccsListBox, "EmployeeID", $CCSLocales->GetText("Doctor"), ccsInteger, "", CCGetRequestParam("EmployeeID", $Method, NULL), $this);
            $this->EmployeeID->DSType = dsTable;
            $this->EmployeeID->DataSource = new clsDBregistry_db();
            $this->EmployeeID->ds = & $this->EmployeeID->DataSource;
            $this->EmployeeID->DataSource->SQL = "SELECT *,  CONCAT(FirstName, \" \", LastName, \" (\",PositionName, \")\" ) AS FirstAndLastNameAndPosition\n" .
"FROM employees INNER JOIN position ON\n" .
"employees.PositionID = position.PositionID {SQL_Where} {SQL_OrderBy}";
            $this->EmployeeID->DataSource->Order = "FirstName, LastName";
            list($this->EmployeeID->BoundColumn, $this->EmployeeID->TextColumn, $this->EmployeeID->DBFormat) = array("EmployeeID", "FirstAndLastNameAndPosition", "");
            $this->EmployeeID->DataSource->wp = new clsSQLParameters();
            $this->EmployeeID->DataSource->wp->Criterion[1] = "( employees.PositionID = 1 )";
            $this->EmployeeID->DataSource->Where = 
                 $this->EmployeeID->DataSource->wp->Criterion[1];
            $this->EmployeeID->DataSource->Order = "FirstName, LastName";
            $this->EmployeeID->Required = true;
            $this->DataDelivery = new clsControl(ccsTextBox, "DataDelivery", $CCSLocales->GetText("DataDelivery"), ccsDate, array("ShortDate"), CCGetRequestParam("DataDelivery", $Method, NULL), $this);
            $this->DataDelivery->Required = true;
            $this->DatePicker_DataDelivery1 = new clsDatePicker("DatePicker_DataDelivery1", "delivery", "DataDelivery", $this);
            $this->ListofProcedures = new clsControl(ccsListBox, "ListofProcedures", "ListofProcedures", ccsText, "", CCGetRequestParam("ListofProcedures", $Method, NULL), $this);
            $this->ListofProcedures->Multiple = true;
            $this->ListofProcedures->DSType = dsTable;
            $this->ListofProcedures->DataSource = new clsDBregistry_db();
            $this->ListofProcedures->ds = & $this->ListofProcedures->DataSource;
            $this->ListofProcedures->DataSource->SQL = "SELECT *,  CONCAT(ProcedureTypeID, \" - \", ProcedureName) AS ProceudreIDName\n" .
"FROM proceduretype {SQL_Where} {SQL_OrderBy}";
            list($this->ListofProcedures->BoundColumn, $this->ListofProcedures->TextColumn, $this->ListofProcedures->DBFormat) = array("ProcedureTypeID", "ProceudreIDName", "");
            $this->RightButton_procedure = new clsButton("RightButton_procedure", $Method, $this);
            $this->LeftButton_procedure = new clsButton("LeftButton_procedure", $Method, $this);
            $this->SelectedProcedures = new clsControl(ccsListBox, "SelectedProcedures", "SelectedProcedures", ccsText, "", CCGetRequestParam("SelectedProcedures", $Method, NULL), $this);
            $this->SelectedProcedures->Multiple = true;
            $this->SelectedProcedures->DSType = dsTable;
            $this->SelectedProcedures->DataSource = new clsDBregistry_db();
            $this->SelectedProcedures->ds = & $this->SelectedProcedures->DataSource;
            $this->SelectedProcedures->DataSource->SQL = "SELECT CONCAT(procedures.ProcedureTypeID, \" - \", proceduretype.ProcedureName) AS ProcedureIDName, procedures.* \n" .
"FROM procedures INNER JOIN proceduretype ON\n" .
"procedures.ProcedureTypeID = proceduretype.ProcedureTypeID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedProcedures->BoundColumn, $this->SelectedProcedures->TextColumn, $this->SelectedProcedures->DBFormat) = array("ProcedureTypeID", "ProcedureIDName", "");
            $this->SelectedProcedures->DataSource->Parameters["urlDeliveryID"] = CCGetFromGet("DeliveryID", NULL);
            $this->SelectedProcedures->DataSource->wp = new clsSQLParameters();
            $this->SelectedProcedures->DataSource->wp->AddParameter("1", "urlDeliveryID", ccsInteger, "", "", $this->SelectedProcedures->DataSource->Parameters["urlDeliveryID"], 0, false);
            $this->SelectedProcedures->DataSource->wp->Criterion[1] = $this->SelectedProcedures->DataSource->wp->Operation(opEqual, "procedures.DeliveryID", $this->SelectedProcedures->DataSource->wp->GetDBValue("1"), $this->SelectedProcedures->DataSource->ToSQL($this->SelectedProcedures->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedProcedures->DataSource->Where = 
                 $this->SelectedProcedures->DataSource->wp->Criterion[1];
            $this->LinkedID_Comp = new clsControl(ccsHidden, "LinkedID_Comp", "LinkedID_Comp", ccsText, "", CCGetRequestParam("LinkedID_Comp", $Method, NULL), $this);
            $this->LinkedID_Procedures = new clsControl(ccsHidden, "LinkedID_Procedures", "LinkedID_Procedures", ccsText, "", CCGetRequestParam("LinkedID_Procedures", $Method, NULL), $this);
            $this->ListofAnesthesia = new clsControl(ccsListBox, "ListofAnesthesia", "ListofAnesthesia", ccsInteger, "", CCGetRequestParam("ListofAnesthesia", $Method, NULL), $this);
            $this->ListofAnesthesia->Multiple = true;
            $this->ListofAnesthesia->DSType = dsTable;
            $this->ListofAnesthesia->DataSource = new clsDBregistry_db();
            $this->ListofAnesthesia->ds = & $this->ListofAnesthesia->DataSource;
            $this->ListofAnesthesia->DataSource->SQL = "SELECT * \n" .
"FROM anesthesiatype {SQL_Where} {SQL_OrderBy}";
            list($this->ListofAnesthesia->BoundColumn, $this->ListofAnesthesia->TextColumn, $this->ListofAnesthesia->DBFormat) = array("AnesthesiaTypeID", "AnesthesiaName", "");
            $this->SelectedAnesthesia = new clsControl(ccsListBox, "SelectedAnesthesia", "SelectedAnesthesia", ccsInteger, "", CCGetRequestParam("SelectedAnesthesia", $Method, NULL), $this);
            $this->SelectedAnesthesia->Multiple = true;
            $this->SelectedAnesthesia->DSType = dsTable;
            $this->SelectedAnesthesia->DataSource = new clsDBregistry_db();
            $this->SelectedAnesthesia->ds = & $this->SelectedAnesthesia->DataSource;
            $this->SelectedAnesthesia->DataSource->SQL = "SELECT anesthesia.*, AnesthesiaName \n" .
"FROM anesthesia INNER JOIN anesthesiatype ON\n" .
"anesthesia.AnesthesiaTypeID = anesthesiatype.AnesthesiaTypeID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedAnesthesia->BoundColumn, $this->SelectedAnesthesia->TextColumn, $this->SelectedAnesthesia->DBFormat) = array("AnesthesiaTypeID", "AnesthesiaName", "");
            $this->SelectedAnesthesia->DataSource->Parameters["urlDeliveryID"] = CCGetFromGet("DeliveryID", NULL);
            $this->SelectedAnesthesia->DataSource->wp = new clsSQLParameters();
            $this->SelectedAnesthesia->DataSource->wp->AddParameter("1", "urlDeliveryID", ccsInteger, "", "", $this->SelectedAnesthesia->DataSource->Parameters["urlDeliveryID"], 0, false);
            $this->SelectedAnesthesia->DataSource->wp->Criterion[1] = $this->SelectedAnesthesia->DataSource->wp->Operation(opEqual, "anesthesia.DeliveryID", $this->SelectedAnesthesia->DataSource->wp->GetDBValue("1"), $this->SelectedAnesthesia->DataSource->ToSQL($this->SelectedAnesthesia->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedAnesthesia->DataSource->Where = 
                 $this->SelectedAnesthesia->DataSource->wp->Criterion[1];
            $this->RightButtonAnesthesia = new clsButton("RightButtonAnesthesia", $Method, $this);
            $this->LeftButtonAnesthesia = new clsButton("LeftButtonAnesthesia", $Method, $this);
            $this->LinkedID_Anesthesia = new clsControl(ccsHidden, "LinkedID_Anesthesia", "LinkedID_Anesthesia", ccsText, "", CCGetRequestParam("LinkedID_Anesthesia", $Method, NULL), $this);
            $this->AmnioticBursting = new clsControl(ccsRadioButton, "AmnioticBursting", $CCSLocales->GetText("AmnioticBursting"), ccsInteger, "", CCGetRequestParam("AmnioticBursting", $Method, NULL), $this);
            $this->AmnioticBursting->DSType = dsTable;
            $this->AmnioticBursting->DataSource = new clsDBregistry_db();
            $this->AmnioticBursting->ds = & $this->AmnioticBursting->DataSource;
            $this->AmnioticBursting->DataSource->SQL = "SELECT * \n" .
"FROM amniotic_bursting {SQL_Where} {SQL_OrderBy}";
            list($this->AmnioticBursting->BoundColumn, $this->AmnioticBursting->TextColumn, $this->AmnioticBursting->DBFormat) = array("AmnioticBurstingID", "AmnioticBursting", "");
            $this->AmnioticBursting->HTML = true;
            $this->AmnioticBursting->Required = true;
            $this->HospitalDischDate = new clsControl(ccsTextBox, "HospitalDischDate", $CCSLocales->GetText("HospitalDischDate"), ccsDate, array("ShortDate"), CCGetRequestParam("HospitalDischDate", $Method, NULL), $this);
            $this->DatePicker_HospitalDischDate = new clsDatePicker("DatePicker_HospitalDischDate", "delivery", "HospitalDischDate", $this);
            $this->Steroids = new clsControl(ccsTextBox, "Steroids", $CCSLocales->GetText("Steroids"), ccsInteger, "", CCGetRequestParam("Steroids", $Method, NULL), $this);
            $this->TextArea1 = new clsControl(ccsTextArea, "TextArea1", "TextArea1", ccsText, "", CCGetRequestParam("TextArea1", $Method, NULL), $this);
            $this->Antibiotics = new clsControl(ccsRadioButton, "Antibiotics", $CCSLocales->GetText("Antibiotics"), ccsInteger, "", CCGetRequestParam("Antibiotics", $Method, NULL), $this);
            $this->Antibiotics->DSType = dsListOfValues;
            $this->Antibiotics->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->Antibiotics->HTML = true;
            $this->Antibiotics->Required = true;
            $this->SteroidsYesNo = new clsControl(ccsRadioButton, "SteroidsYesNo", $CCSLocales->GetText("SteroidsYesNo"), ccsInteger, "", CCGetRequestParam("SteroidsYesNo", $Method, NULL), $this);
            $this->SteroidsYesNo->DSType = dsListOfValues;
            $this->SteroidsYesNo->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->SteroidsYesNo->HTML = true;
            $this->SteroidsYesNo->Required = true;
            $this->ListofComplications = new clsControl(ccsListBox, "ListofComplications", "ListofComplications", ccsText, "", CCGetRequestParam("ListofComplications", $Method, NULL), $this);
            $this->ListofComplications->Multiple = true;
            $this->ListofComplications->DSType = dsTable;
            $this->ListofComplications->DataSource = new clsDBregistry_db();
            $this->ListofComplications->ds = & $this->ListofComplications->DataSource;
            $this->ListofComplications->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, \" - \", DiseaseName) AS DiseaseIDName\n" .
"FROM icd10_all {SQL_Where} {SQL_OrderBy}";
            $this->ListofComplications->DataSource->Order = "ICD10ID";
            list($this->ListofComplications->BoundColumn, $this->ListofComplications->TextColumn, $this->ListofComplications->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->ListofComplications->DataSource->wp = new clsSQLParameters();
            $this->ListofComplications->DataSource->wp->Criterion[1] = "( ICD10_class = 'O' )";
            $this->ListofComplications->DataSource->Where = 
                 $this->ListofComplications->DataSource->wp->Criterion[1];
            $this->ListofComplications->DataSource->Order = "ICD10ID";
            $this->RightButton_comp = new clsButton("RightButton_comp", $Method, $this);
            $this->LeftButton_comp = new clsButton("LeftButton_comp", $Method, $this);
            $this->SelectedComplications = new clsControl(ccsListBox, "SelectedComplications", "SelectedComplications", ccsText, "", CCGetRequestParam("SelectedComplications", $Method, NULL), $this);
            $this->SelectedComplications->Multiple = true;
            $this->SelectedComplications->DSType = dsTable;
            $this->SelectedComplications->DataSource = new clsDBregistry_db();
            $this->SelectedComplications->ds = & $this->SelectedComplications->DataSource;
            $this->SelectedComplications->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, \" - \", DiseaseName) AS DiseaseIDName, complications.* \n" .
"FROM complications INNER JOIN icd10_all ON\n" .
"complications.ICD10ID = icd10_all.ICD10ID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedComplications->BoundColumn, $this->SelectedComplications->TextColumn, $this->SelectedComplications->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->SelectedComplications->DataSource->Parameters["urlDeliveryID"] = CCGetFromGet("DeliveryID", NULL);
            $this->SelectedComplications->DataSource->wp = new clsSQLParameters();
            $this->SelectedComplications->DataSource->wp->AddParameter("1", "urlDeliveryID", ccsInteger, "", "", $this->SelectedComplications->DataSource->Parameters["urlDeliveryID"], 0, false);
            $this->SelectedComplications->DataSource->wp->Criterion[1] = $this->SelectedComplications->DataSource->wp->Operation(opEqual, "DeliveryID", $this->SelectedComplications->DataSource->wp->GetDBValue("1"), $this->SelectedComplications->DataSource->ToSQL($this->SelectedComplications->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedComplications->DataSource->Where = 
                 $this->SelectedComplications->DataSource->wp->Criterion[1];
            $this->ListofPComplications = new clsControl(ccsListBox, "ListofPComplications", "ListofPComplications", ccsText, "", CCGetRequestParam("ListofPComplications", $Method, NULL), $this);
            $this->ListofPComplications->Multiple = true;
            $this->ListofPComplications->DSType = dsTable;
            $this->ListofPComplications->DataSource = new clsDBregistry_db();
            $this->ListofPComplications->ds = & $this->ListofPComplications->DataSource;
            $this->ListofPComplications->DataSource->SQL = "SELECT *,  CONCAT(ICD10ID, \" - \", DiseaseName) AS DiseaseIDName\n" .
"FROM icd10_all {SQL_Where} {SQL_OrderBy}";
            $this->ListofPComplications->DataSource->Order = "ICD10ID";
            list($this->ListofPComplications->BoundColumn, $this->ListofPComplications->TextColumn, $this->ListofPComplications->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->ListofPComplications->DataSource->wp = new clsSQLParameters();
            $this->ListofPComplications->DataSource->wp->Criterion[1] = "( ICD10_class = 'O' )";
            $this->ListofPComplications->DataSource->Where = 
                 $this->ListofPComplications->DataSource->wp->Criterion[1];
            $this->ListofPComplications->DataSource->Order = "ICD10ID";
            $this->RightButton_pcomp = new clsButton("RightButton_pcomp", $Method, $this);
            $this->LeftButton_pcomp = new clsButton("LeftButton_pcomp", $Method, $this);
            $this->SelectedPComplications = new clsControl(ccsListBox, "SelectedPComplications", "SelectedPComplications", ccsText, "", CCGetRequestParam("SelectedPComplications", $Method, NULL), $this);
            $this->SelectedPComplications->Multiple = true;
            $this->SelectedPComplications->DSType = dsTable;
            $this->SelectedPComplications->DataSource = new clsDBregistry_db();
            $this->SelectedPComplications->ds = & $this->SelectedPComplications->DataSource;
            $this->SelectedPComplications->DataSource->SQL = "SELECT CONCAT(icd10_all.ICD10ID, \" - \", DiseaseName) AS DiseaseIDName, pcomplications.* \n" .
"FROM pcomplications INNER JOIN icd10_all ON\n" .
"pcomplications.ICD10ID = icd10_all.ICD10ID {SQL_Where} {SQL_OrderBy}";
            list($this->SelectedPComplications->BoundColumn, $this->SelectedPComplications->TextColumn, $this->SelectedPComplications->DBFormat) = array("ICD10ID", "DiseaseIDName", "");
            $this->SelectedPComplications->DataSource->Parameters["urlDeliveryID"] = CCGetFromGet("DeliveryID", NULL);
            $this->SelectedPComplications->DataSource->wp = new clsSQLParameters();
            $this->SelectedPComplications->DataSource->wp->AddParameter("1", "urlDeliveryID", ccsInteger, "", "", $this->SelectedPComplications->DataSource->Parameters["urlDeliveryID"], 0, false);
            $this->SelectedPComplications->DataSource->wp->Criterion[1] = $this->SelectedPComplications->DataSource->wp->Operation(opEqual, "pcomplications.DeliveryID", $this->SelectedPComplications->DataSource->wp->GetDBValue("1"), $this->SelectedPComplications->DataSource->ToSQL($this->SelectedPComplications->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->SelectedPComplications->DataSource->Where = 
                 $this->SelectedPComplications->DataSource->wp->Criterion[1];
            $this->LinkedID_PComp = new clsControl(ccsHidden, "LinkedID_PComp", "LinkedID_PComp", ccsText, "", CCGetRequestParam("LinkedID_PComp", $Method, NULL), $this);
            $this->GestationAge = new clsControl(ccsTextBox, "GestationAge", "GestationAge", ccsInteger, "", CCGetRequestParam("GestationAge", $Method, NULL), $this);
            $this->ButtonUpdateAddNewBorn = new clsButton("ButtonUpdateAddNewBorn", $Method, $this);
            $this->Reloaded = new clsControl(ccsHidden, "Reloaded", "Reloaded", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Reloaded", $Method, NULL), $this);
            $this->NumberOfDelivery = new clsControl(ccsTextBox, "NumberOfDelivery", $CCSLocales->GetText("NumberOfDelivery"), ccsText, "", CCGetRequestParam("NumberOfDelivery", $Method, NULL), $this);
            $this->NumberOfDelivery->Required = true;
            $this->Uterotoics = new clsControl(ccsRadioButton, "Uterotoics", $CCSLocales->GetText("Uterotoics"), ccsInteger, "", CCGetRequestParam("Uterotoics", $Method, NULL), $this);
            $this->Uterotoics->DSType = dsListOfValues;
            $this->Uterotoics->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->Uterotoics->HTML = true;
            $this->Uterotoics->Required = true;
            $this->ART = new clsControl(ccsRadioButton, "ART", $CCSLocales->GetText("ART"), ccsInteger, "", CCGetRequestParam("ART", $Method, NULL), $this);
            $this->ART->DSType = dsListOfValues;
            $this->ART->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->ART->HTML = true;
            $this->ART->Required = true;
            $this->Mg_Label = new clsControl(ccsLabel, "Mg_Label", "Mg_Label", ccsText, "", CCGetRequestParam("Mg_Label", $Method, NULL), $this);
            $this->PregnancyOutcome1ID = new clsControl(ccsListBox, "PregnancyOutcome1ID", $CCSLocales->GetText("PregnancyOutcomeID"), ccsInteger, "", CCGetRequestParam("PregnancyOutcome1ID", $Method, NULL), $this);
            $this->PregnancyOutcome1ID->DSType = dsTable;
            $this->PregnancyOutcome1ID->DataSource = new clsDBregistry_db();
            $this->PregnancyOutcome1ID->ds = & $this->PregnancyOutcome1ID->DataSource;
            $this->PregnancyOutcome1ID->DataSource->SQL = "SELECT * \n" .
"FROM pregnancy_outcome {SQL_Where} {SQL_OrderBy}";
            list($this->PregnancyOutcome1ID->BoundColumn, $this->PregnancyOutcome1ID->TextColumn, $this->PregnancyOutcome1ID->DBFormat) = array("PregnancyOutcomeID", "PregnancyOutcomeName", "");
            $this->PregnancyOutcome1ID->Required = true;
            $this->PregnancyOutcome2ID = new clsControl(ccsListBox, "PregnancyOutcome2ID", $CCSLocales->GetText("PregnancyOutcomeID"), ccsInteger, "", CCGetRequestParam("PregnancyOutcome2ID", $Method, NULL), $this);
            $this->PregnancyOutcome2ID->DSType = dsTable;
            $this->PregnancyOutcome2ID->DataSource = new clsDBregistry_db();
            $this->PregnancyOutcome2ID->ds = & $this->PregnancyOutcome2ID->DataSource;
            $this->PregnancyOutcome2ID->DataSource->SQL = "SELECT * \n" .
"FROM pregnancy_outcome {SQL_Where} {SQL_OrderBy}";
            list($this->PregnancyOutcome2ID->BoundColumn, $this->PregnancyOutcome2ID->TextColumn, $this->PregnancyOutcome2ID->DBFormat) = array("PregnancyOutcomeID", "PregnancyOutcomeName", "");
            $this->PregnancyOutcome2ID->Required = true;
            $this->PregnancyOutcome3ID = new clsControl(ccsListBox, "PregnancyOutcome3ID", $CCSLocales->GetText("PregnancyOutcomeID"), ccsInteger, "", CCGetRequestParam("PregnancyOutcome3ID", $Method, NULL), $this);
            $this->PregnancyOutcome3ID->DSType = dsTable;
            $this->PregnancyOutcome3ID->DataSource = new clsDBregistry_db();
            $this->PregnancyOutcome3ID->ds = & $this->PregnancyOutcome3ID->DataSource;
            $this->PregnancyOutcome3ID->DataSource->SQL = "SELECT * \n" .
"FROM pregnancy_outcome {SQL_Where} {SQL_OrderBy}";
            list($this->PregnancyOutcome3ID->BoundColumn, $this->PregnancyOutcome3ID->TextColumn, $this->PregnancyOutcome3ID->DBFormat) = array("PregnancyOutcomeID", "PregnancyOutcomeName", "");
            $this->PregnancyOutcome3ID->Required = true;
            $this->PregnancyOutcome4ID = new clsControl(ccsTextArea, "PregnancyOutcome4ID", $CCSLocales->GetText("PregnancyOutcomeID"), ccsText, "", CCGetRequestParam("PregnancyOutcome4ID", $Method, NULL), $this);
            $this->PregnancyOutcome4ID->Required = true;
            $this->NrChildren = new clsControl(ccsHidden, "NrChildren", "NrChildren", ccsInteger, "", CCGetRequestParam("NrChildren", $Method, NULL), $this);
            $this->DeliveryMethodID = new clsControl(ccsListBox, "DeliveryMethodID", $CCSLocales->GetText("DeliveryMethodID"), ccsInteger, "", CCGetRequestParam("DeliveryMethodID", $Method, NULL), $this);
            $this->DeliveryMethodID->DSType = dsTable;
            $this->DeliveryMethodID->DataSource = new clsDBregistry_db();
            $this->DeliveryMethodID->ds = & $this->DeliveryMethodID->DataSource;
            $this->DeliveryMethodID->DataSource->SQL = "SELECT * \n" .
"FROM deliverymethod {SQL_Where} {SQL_OrderBy}";
            list($this->DeliveryMethodID->BoundColumn, $this->DeliveryMethodID->TextColumn, $this->DeliveryMethodID->DBFormat) = array("DeliveryMethodID", "DeliveryMethodName", "");
            $this->DeliveryMethodID->DataSource->Parameters["urlDeliveryMetodID"] = CCGetFromGet("DeliveryMetodID", NULL);
            $this->DeliveryMethodID->DataSource->wp = new clsSQLParameters();
            $this->DeliveryMethodID->DataSource->wp->AddParameter("1", "urlDeliveryMetodID", ccsInteger, "", "", $this->DeliveryMethodID->DataSource->Parameters["urlDeliveryMetodID"], "", false);
            $this->DeliveryMethodID->DataSource->wp->Criterion[1] = $this->DeliveryMethodID->DataSource->wp->Operation(opEqual, "DeliveryMetodID", $this->DeliveryMethodID->DataSource->wp->GetDBValue("1"), $this->DeliveryMethodID->DataSource->ToSQL($this->DeliveryMethodID->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->DeliveryMethodID->DataSource->Where = 
                 $this->DeliveryMethodID->DataSource->wp->Criterion[1];
            $this->DeliveryMethodID->Required = true;
            $this->DeliveryTypeID = new clsControl(ccsListBox, "DeliveryTypeID", $CCSLocales->GetText("DeliveryTypeID"), ccsInteger, "", CCGetRequestParam("DeliveryTypeID", $Method, NULL), $this);
            $this->DeliveryTypeID->DSType = dsTable;
            $this->DeliveryTypeID->DataSource = new clsDBregistry_db();
            $this->DeliveryTypeID->ds = & $this->DeliveryTypeID->DataSource;
            $this->DeliveryTypeID->DataSource->SQL = "SELECT * \n" .
"FROM deliverytype {SQL_Where} {SQL_OrderBy}";
            $this->DeliveryTypeID->DataSource->Order = "DeliveryTypeID";
            list($this->DeliveryTypeID->BoundColumn, $this->DeliveryTypeID->TextColumn, $this->DeliveryTypeID->DBFormat) = array("DeliveryTypeID", "DeliveryTypeName", "");
            $this->DeliveryTypeID->DataSource->Parameters["urlDeliveryTypeID"] = CCGetFromGet("DeliveryTypeID", NULL);
            $this->DeliveryTypeID->DataSource->wp = new clsSQLParameters();
            $this->DeliveryTypeID->DataSource->wp->AddParameter("1", "urlDeliveryTypeID", ccsInteger, "", "", $this->DeliveryTypeID->DataSource->Parameters["urlDeliveryTypeID"], "", false);
            $this->DeliveryTypeID->DataSource->wp->Criterion[1] = $this->DeliveryTypeID->DataSource->wp->Operation(opEqual, "DeliveryTypeID", $this->DeliveryTypeID->DataSource->wp->GetDBValue("1"), $this->DeliveryTypeID->DataSource->ToSQL($this->DeliveryTypeID->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->DeliveryTypeID->DataSource->Where = 
                 $this->DeliveryTypeID->DataSource->wp->Criterion[1];
            $this->DeliveryTypeID->DataSource->Order = "DeliveryTypeID";
            $this->DeliveryTypeID->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->HospitalAdmData->Value) && !strlen($this->HospitalAdmData->Value) && $this->HospitalAdmData->Value !== false)
                    $this->HospitalAdmData->SetValue(time());
                if(!is_array($this->PartnerDelivery->Value) && !strlen($this->PartnerDelivery->Value) && $this->PartnerDelivery->Value !== false)
                    $this->PartnerDelivery->SetText(1);
                if(!is_array($this->Partogram->Value) && !strlen($this->Partogram->Value) && $this->Partogram->Value !== false)
                    $this->Partogram->SetText(1);
                if(!is_array($this->DataDelivery->Value) && !strlen($this->DataDelivery->Value) && $this->DataDelivery->Value !== false)
                    $this->DataDelivery->SetValue(time());
                if(!is_array($this->AmnioticBursting->Value) && !strlen($this->AmnioticBursting->Value) && $this->AmnioticBursting->Value !== false)
                    $this->AmnioticBursting->SetText(1);
                if(!is_array($this->Antibiotics->Value) && !strlen($this->Antibiotics->Value) && $this->Antibiotics->Value !== false)
                    $this->Antibiotics->SetText(0);
                if(!is_array($this->SteroidsYesNo->Value) && !strlen($this->SteroidsYesNo->Value) && $this->SteroidsYesNo->Value !== false)
                    $this->SteroidsYesNo->SetText(0);
                if(!is_array($this->Reloaded->Value) && !strlen($this->Reloaded->Value) && $this->Reloaded->Value !== false)
                    $this->Reloaded->SetText(false);
                if(!is_array($this->Uterotoics->Value) && !strlen($this->Uterotoics->Value) && $this->Uterotoics->Value !== false)
                    $this->Uterotoics->SetText(1);
                if(!is_array($this->ART->Value) && !strlen($this->ART->Value) && $this->ART->Value !== false)
                    $this->ART->SetText(0);
                if(!is_array($this->PregnancyOutcome1ID->Value) && !strlen($this->PregnancyOutcome1ID->Value) && $this->PregnancyOutcome1ID->Value !== false)
                    $this->PregnancyOutcome1ID->SetText(1);
                if(!is_array($this->DeliveryMethodID->Value) && !strlen($this->DeliveryMethodID->Value) && $this->DeliveryMethodID->Value !== false)
                    $this->DeliveryMethodID->SetText(1);
                if(!is_array($this->DeliveryTypeID->Value) && !strlen($this->DeliveryTypeID->Value) && $this->DeliveryTypeID->Value !== false)
                    $this->DeliveryTypeID->SetText(2);
            }
            if(!is_array($this->Mg_Label->Value) && !strlen($this->Mg_Label->Value) && $this->Mg_Label->Value !== false)
                $this->Mg_Label->SetText($CCSLocales->GetText("mg"));
        }
    }
//End Class_Initialize Event

//Initialize Method @234-3DFB24DC
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlDeliveryID"] = CCGetFromGet("DeliveryID", NULL);
    }
//End Initialize Method

//Validate Method @234-64FD1053
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(! (($this->GestationAge->GetValue() > 0 && $this->GestationAge->GetValue() < 46))) {
            $this->GestationAge->Errors->addError($CCSLocales->GetText("Gestational_Limit"));
        }
        if(! ((($this-> PregnancyOutcome1ID->GetValue() < 3 and $this->PregnancyOutcome2ID->GetValue() < 3) or ($this-> PregnancyOutcome1ID->GetValue() > 2 and $this->PregnancyOutcome2ID->GetValue() <0)))) {
            $this->PregnancyOutcome2ID->Errors->addError($CCSLocales->GetText("ErorOutcome2"));
        }
        if(! ((($this-> PregnancyOutcome1ID->GetValue() < 3 and $this->PregnancyOutcome3ID->GetValue() < 3) or ($this-> PregnancyOutcome1ID->GetValue() > 2 and $this->PregnancyOutcome3ID->GetValue() <0)))) {
            $this->PregnancyOutcome3ID->Errors->addError($CCSLocales->GetText("ErrorOutcome3"));
        }
        if(! ((($this-> PregnancyOutcome1ID->GetValue() < 3 and $this->DeliveryMethodID->GetValue() < 4) or ($this-> PregnancyOutcome1ID->GetValue() > 2 and $this->DeliveryMethodID->GetValue() > 5)))) {
            $this->DeliveryMethodID->Errors->addError($CCSLocales->GetText("ErrorDeliveryMethod"));
        }
        if(! ((($this-> PregnancyOutcome1ID->GetValue() < 3 and $this->DeliveryTypeID->GetValue() < 4) or ($this-> PregnancyOutcome1ID->GetValue() > 2 and $this->DeliveryTypeID->GetValue() > 5)))) {
            $this->DeliveryTypeID->Errors->addError($CCSLocales->GetText("ErrorDeliveryType"));
        }
        $Validation = ($this->HospitalAdmData->Validate() && $Validation);
        $Validation = ($this->FacilityID->Validate() && $Validation);
        $Validation = ($this->PartnerDelivery->Validate() && $Validation);
        $Validation = ($this->Partogram->Validate() && $Validation);
        $Validation = ($this->PregnancyID->Validate() && $Validation);
        $Validation = ($this->CurrentUser->Validate() && $Validation);
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->DataDelivery->Validate() && $Validation);
        $Validation = ($this->ListofProcedures->Validate() && $Validation);
        $Validation = ($this->SelectedProcedures->Validate() && $Validation);
        $Validation = ($this->LinkedID_Comp->Validate() && $Validation);
        $Validation = ($this->LinkedID_Procedures->Validate() && $Validation);
        $Validation = ($this->ListofAnesthesia->Validate() && $Validation);
        $Validation = ($this->SelectedAnesthesia->Validate() && $Validation);
        $Validation = ($this->LinkedID_Anesthesia->Validate() && $Validation);
        $Validation = ($this->AmnioticBursting->Validate() && $Validation);
        $Validation = ($this->HospitalDischDate->Validate() && $Validation);
        $Validation = ($this->Steroids->Validate() && $Validation);
        $Validation = ($this->TextArea1->Validate() && $Validation);
        $Validation = ($this->Antibiotics->Validate() && $Validation);
        $Validation = ($this->SteroidsYesNo->Validate() && $Validation);
        $Validation = ($this->ListofComplications->Validate() && $Validation);
        $Validation = ($this->SelectedComplications->Validate() && $Validation);
        $Validation = ($this->ListofPComplications->Validate() && $Validation);
        $Validation = ($this->SelectedPComplications->Validate() && $Validation);
        $Validation = ($this->LinkedID_PComp->Validate() && $Validation);
        $Validation = ($this->GestationAge->Validate() && $Validation);
        $Validation = ($this->Reloaded->Validate() && $Validation);
        $Validation = ($this->NumberOfDelivery->Validate() && $Validation);
        $Validation = ($this->Uterotoics->Validate() && $Validation);
        $Validation = ($this->ART->Validate() && $Validation);
        $Validation = ($this->PregnancyOutcome1ID->Validate() && $Validation);
        $Validation = ($this->PregnancyOutcome2ID->Validate() && $Validation);
        $Validation = ($this->PregnancyOutcome3ID->Validate() && $Validation);
        $Validation = ($this->PregnancyOutcome4ID->Validate() && $Validation);
        $Validation = ($this->NrChildren->Validate() && $Validation);
        $Validation = ($this->DeliveryMethodID->Validate() && $Validation);
        $Validation = ($this->DeliveryTypeID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->HospitalAdmData->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FacilityID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PartnerDelivery->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Partogram->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PregnancyID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CurrentUser->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DataDelivery->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofProcedures->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedProcedures->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_Comp->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_Procedures->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofAnesthesia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedAnesthesia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_Anesthesia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AmnioticBursting->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HospitalDischDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Steroids->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextArea1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Antibiotics->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SteroidsYesNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofComplications->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedComplications->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListofPComplications->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SelectedPComplications->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LinkedID_PComp->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GestationAge->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Reloaded->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NumberOfDelivery->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Uterotoics->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ART->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PregnancyOutcome1ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PregnancyOutcome2ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PregnancyOutcome3ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PregnancyOutcome4ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NrChildren->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeliveryMethodID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeliveryTypeID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @234-36A0B0BD
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->HospitalAdmData->Errors->Count());
        $errors = ($errors || $this->DatePicker_HospitalAdmData->Errors->Count());
        $errors = ($errors || $this->FacilityID->Errors->Count());
        $errors = ($errors || $this->PartnerDelivery->Errors->Count());
        $errors = ($errors || $this->Partogram->Errors->Count());
        $errors = ($errors || $this->PregnancyID->Errors->Count());
        $errors = ($errors || $this->CurrentUser->Errors->Count());
        $errors = ($errors || $this->lastmodified->Errors->Count());
        $errors = ($errors || $this->user->Errors->Count());
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->DataDelivery->Errors->Count());
        $errors = ($errors || $this->DatePicker_DataDelivery1->Errors->Count());
        $errors = ($errors || $this->ListofProcedures->Errors->Count());
        $errors = ($errors || $this->SelectedProcedures->Errors->Count());
        $errors = ($errors || $this->LinkedID_Comp->Errors->Count());
        $errors = ($errors || $this->LinkedID_Procedures->Errors->Count());
        $errors = ($errors || $this->ListofAnesthesia->Errors->Count());
        $errors = ($errors || $this->SelectedAnesthesia->Errors->Count());
        $errors = ($errors || $this->LinkedID_Anesthesia->Errors->Count());
        $errors = ($errors || $this->AmnioticBursting->Errors->Count());
        $errors = ($errors || $this->HospitalDischDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_HospitalDischDate->Errors->Count());
        $errors = ($errors || $this->Steroids->Errors->Count());
        $errors = ($errors || $this->TextArea1->Errors->Count());
        $errors = ($errors || $this->Antibiotics->Errors->Count());
        $errors = ($errors || $this->SteroidsYesNo->Errors->Count());
        $errors = ($errors || $this->ListofComplications->Errors->Count());
        $errors = ($errors || $this->SelectedComplications->Errors->Count());
        $errors = ($errors || $this->ListofPComplications->Errors->Count());
        $errors = ($errors || $this->SelectedPComplications->Errors->Count());
        $errors = ($errors || $this->LinkedID_PComp->Errors->Count());
        $errors = ($errors || $this->GestationAge->Errors->Count());
        $errors = ($errors || $this->Reloaded->Errors->Count());
        $errors = ($errors || $this->NumberOfDelivery->Errors->Count());
        $errors = ($errors || $this->Uterotoics->Errors->Count());
        $errors = ($errors || $this->ART->Errors->Count());
        $errors = ($errors || $this->Mg_Label->Errors->Count());
        $errors = ($errors || $this->PregnancyOutcome1ID->Errors->Count());
        $errors = ($errors || $this->PregnancyOutcome2ID->Errors->Count());
        $errors = ($errors || $this->PregnancyOutcome3ID->Errors->Count());
        $errors = ($errors || $this->PregnancyOutcome4ID->Errors->Count());
        $errors = ($errors || $this->NrChildren->Errors->Count());
        $errors = ($errors || $this->DeliveryMethodID->Errors->Count());
        $errors = ($errors || $this->DeliveryTypeID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @234-ED598703
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

//Operation Method @234-53041AAF
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            } else if($this->RightButton_procedure->Pressed) {
                $this->PressedButton = "RightButton_procedure";
            } else if($this->LeftButton_procedure->Pressed) {
                $this->PressedButton = "LeftButton_procedure";
            } else if($this->RightButtonAnesthesia->Pressed) {
                $this->PressedButton = "RightButtonAnesthesia";
            } else if($this->LeftButtonAnesthesia->Pressed) {
                $this->PressedButton = "LeftButtonAnesthesia";
            } else if($this->RightButton_comp->Pressed) {
                $this->PressedButton = "RightButton_comp";
            } else if($this->LeftButton_comp->Pressed) {
                $this->PressedButton = "LeftButton_comp";
            } else if($this->RightButton_pcomp->Pressed) {
                $this->PressedButton = "RightButton_pcomp";
            } else if($this->LeftButton_pcomp->Pressed) {
                $this->PressedButton = "LeftButton_pcomp";
            } else if($this->ButtonUpdateAddNewBorn->Pressed) {
                $this->PressedButton = "ButtonUpdateAddNewBorn";
            }
        }
        $Redirect = "pregnancy_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "DeliveryID"));
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButton_procedure") {
            if(!CCGetEvent($this->RightButton_procedure->CCSEvents, "OnClick", $this->RightButton_procedure)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButton_procedure") {
            if(!CCGetEvent($this->LeftButton_procedure->CCSEvents, "OnClick", $this->LeftButton_procedure)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButtonAnesthesia") {
            if(!CCGetEvent($this->RightButtonAnesthesia->CCSEvents, "OnClick", $this->RightButtonAnesthesia)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButtonAnesthesia") {
            if(!CCGetEvent($this->LeftButtonAnesthesia->CCSEvents, "OnClick", $this->LeftButtonAnesthesia)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButton_comp") {
            if(!CCGetEvent($this->RightButton_comp->CCSEvents, "OnClick", $this->RightButton_comp)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButton_comp") {
            if(!CCGetEvent($this->LeftButton_comp->CCSEvents, "OnClick", $this->LeftButton_comp)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "RightButton_pcomp") {
            if(!CCGetEvent($this->RightButton_pcomp->CCSEvents, "OnClick", $this->RightButton_pcomp)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "LeftButton_pcomp") {
            if(!CCGetEvent($this->LeftButton_pcomp->CCSEvents, "OnClick", $this->LeftButton_pcomp)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert" && $this->InsertAllowed) {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update" && $this->UpdateAllowed) {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "ButtonUpdateAddNewBorn" && $this->UpdateAllowed) {
                $Redirect = "newborn_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "DeliveryID"));
                if(!CCGetEvent($this->ButtonUpdateAddNewBorn->CCSEvents, "OnClick", $this->ButtonUpdateAddNewBorn) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @234-25E7702D
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->HospitalAdmData->SetValue($this->HospitalAdmData->GetValue(true));
        $this->DataSource->HospitalDischDate->SetValue($this->HospitalDischDate->GetValue(true));
        $this->DataSource->FacilityID->SetValue($this->FacilityID->GetValue(true));
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->PartnerDelivery->SetValue($this->PartnerDelivery->GetValue(true));
        $this->DataSource->Partogram->SetValue($this->Partogram->GetValue(true));
        $this->DataSource->DeliveryTypeID->SetValue($this->DeliveryTypeID->GetValue(true));
        $this->DataSource->DeliveryMethodID->SetValue($this->DeliveryMethodID->GetValue(true));
        $this->DataSource->PregnancyID->SetValue($this->PregnancyID->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->DataDelivery->SetValue($this->DataDelivery->GetValue(true));
        $this->DataSource->AmnioticBursting->SetValue($this->AmnioticBursting->GetValue(true));
        $this->DataSource->TextArea1->SetValue($this->TextArea1->GetValue(true));
        $this->DataSource->GestationAge->SetValue($this->GestationAge->GetValue(true));
        $this->DataSource->Steroids->SetValue($this->Steroids->GetValue(true));
        $this->DataSource->Antibiotics->SetValue($this->Antibiotics->GetValue(true));
        $this->DataSource->ART->SetValue($this->ART->GetValue(true));
        $this->DataSource->SteroidsYesNo->SetValue($this->SteroidsYesNo->GetValue(true));
        $this->DataSource->NumberOfDelivery->SetValue($this->NumberOfDelivery->GetValue(true));
        $this->DataSource->Uterotoics->SetValue($this->Uterotoics->GetValue(true));
        $this->DataSource->PregnancyOutcome1ID->SetValue($this->PregnancyOutcome1ID->GetValue(true));
        $this->DataSource->PregnancyOutcome2ID->SetValue($this->PregnancyOutcome2ID->GetValue(true));
        $this->DataSource->PregnancyOutcome3ID->SetValue($this->PregnancyOutcome3ID->GetValue(true));
        $this->DataSource->PregnancyOutcome4ID->SetValue($this->PregnancyOutcome4ID->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @234-99C78D99
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->HospitalAdmData->SetValue($this->HospitalAdmData->GetValue(true));
        $this->DataSource->HospitalDischDate->SetValue($this->HospitalDischDate->GetValue(true));
        $this->DataSource->FacilityID->SetValue($this->FacilityID->GetValue(true));
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->PartnerDelivery->SetValue($this->PartnerDelivery->GetValue(true));
        $this->DataSource->Partogram->SetValue($this->Partogram->GetValue(true));
        $this->DataSource->DeliveryTypeID->SetValue($this->DeliveryTypeID->GetValue(true));
        $this->DataSource->DeliveryMethodID->SetValue($this->DeliveryMethodID->GetValue(true));
        $this->DataSource->PregnancyID->SetValue($this->PregnancyID->GetValue(true));
        $this->DataSource->DataDelivery->SetValue($this->DataDelivery->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->AmnioticBursting->SetValue($this->AmnioticBursting->GetValue(true));
        $this->DataSource->TextArea1->SetValue($this->TextArea1->GetValue(true));
        $this->DataSource->GestationAge->SetValue($this->GestationAge->GetValue(true));
        $this->DataSource->Steroids->SetValue($this->Steroids->GetValue(true));
        $this->DataSource->Antibiotics->SetValue($this->Antibiotics->GetValue(true));
        $this->DataSource->ART->SetValue($this->ART->GetValue(true));
        $this->DataSource->SteroidsYesNo->SetValue($this->SteroidsYesNo->GetValue(true));
        $this->DataSource->NumberOfDelivery->SetValue($this->NumberOfDelivery->GetValue(true));
        $this->DataSource->Uterotoics->SetValue($this->Uterotoics->GetValue(true));
        $this->DataSource->PregnancyOutcome1ID->SetValue($this->PregnancyOutcome1ID->GetValue(true));
        $this->DataSource->PregnancyOutcome2ID->SetValue($this->PregnancyOutcome2ID->GetValue(true));
        $this->DataSource->PregnancyOutcome3ID->SetValue($this->PregnancyOutcome3ID->GetValue(true));
        $this->DataSource->PregnancyOutcome4ID->SetValue($this->PregnancyOutcome4ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @234-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @234-AB517D52
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

        $this->FacilityID->Prepare();
        $this->PartnerDelivery->Prepare();
        $this->Partogram->Prepare();
        $this->EmployeeID->Prepare();
        $this->ListofProcedures->Prepare();
        $this->SelectedProcedures->Prepare();
        $this->ListofAnesthesia->Prepare();
        $this->SelectedAnesthesia->Prepare();
        $this->AmnioticBursting->Prepare();
        $this->Antibiotics->Prepare();
        $this->SteroidsYesNo->Prepare();
        $this->ListofComplications->Prepare();
        $this->SelectedComplications->Prepare();
        $this->ListofPComplications->Prepare();
        $this->SelectedPComplications->Prepare();
        $this->Uterotoics->Prepare();
        $this->ART->Prepare();
        $this->PregnancyOutcome1ID->Prepare();
        $this->PregnancyOutcome2ID->Prepare();
        $this->PregnancyOutcome3ID->Prepare();
        $this->DeliveryMethodID->Prepare();
        $this->DeliveryTypeID->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                $this->lastmodified->SetValue($this->DataSource->lastmodified->GetValue());
                $this->user->SetValue($this->DataSource->user->GetValue());
                if(!$this->FormSubmitted){
                    $this->HospitalAdmData->SetValue($this->DataSource->HospitalAdmData->GetValue());
                    $this->FacilityID->SetValue($this->DataSource->FacilityID->GetValue());
                    $this->PartnerDelivery->SetValue($this->DataSource->PartnerDelivery->GetValue());
                    $this->Partogram->SetValue($this->DataSource->Partogram->GetValue());
                    $this->PregnancyID->SetValue($this->DataSource->PregnancyID->GetValue());
                    $this->CurrentUser->SetValue($this->DataSource->CurrentUser->GetValue());
                    $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                    $this->DataDelivery->SetValue($this->DataSource->DataDelivery->GetValue());
                    $this->AmnioticBursting->SetValue($this->DataSource->AmnioticBursting->GetValue());
                    $this->HospitalDischDate->SetValue($this->DataSource->HospitalDischDate->GetValue());
                    $this->Steroids->SetValue($this->DataSource->Steroids->GetValue());
                    $this->TextArea1->SetValue($this->DataSource->TextArea1->GetValue());
                    $this->Antibiotics->SetValue($this->DataSource->Antibiotics->GetValue());
                    $this->SteroidsYesNo->SetValue($this->DataSource->SteroidsYesNo->GetValue());
                    $this->GestationAge->SetValue($this->DataSource->GestationAge->GetValue());
                    $this->NumberOfDelivery->SetValue($this->DataSource->NumberOfDelivery->GetValue());
                    $this->Uterotoics->SetValue($this->DataSource->Uterotoics->GetValue());
                    $this->ART->SetValue($this->DataSource->ART->GetValue());
                    $this->PregnancyOutcome1ID->SetValue($this->DataSource->PregnancyOutcome1ID->GetValue());
                    $this->PregnancyOutcome2ID->SetValue($this->DataSource->PregnancyOutcome2ID->GetValue());
                    $this->PregnancyOutcome3ID->SetValue($this->DataSource->PregnancyOutcome3ID->GetValue());
                    $this->PregnancyOutcome4ID->SetValue($this->DataSource->PregnancyOutcome4ID->GetValue());
                    $this->DeliveryMethodID->SetValue($this->DataSource->DeliveryMethodID->GetValue());
                    $this->DeliveryTypeID->SetValue($this->DataSource->DeliveryTypeID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }
        $this->Mg_Label->SetText($CCSLocales->GetText("mg"));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->HospitalAdmData->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_HospitalAdmData->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FacilityID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PartnerDelivery->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Partogram->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PregnancyID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CurrentUser->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lastmodified->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataDelivery->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DataDelivery1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofProcedures->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedProcedures->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_Comp->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_Procedures->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofAnesthesia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedAnesthesia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_Anesthesia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AmnioticBursting->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HospitalDischDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_HospitalDischDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Steroids->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextArea1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Antibiotics->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SteroidsYesNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofComplications->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedComplications->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListofPComplications->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SelectedPComplications->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LinkedID_PComp->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GestationAge->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Reloaded->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NumberOfDelivery->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Uterotoics->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ART->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Mg_Label->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PregnancyOutcome1ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PregnancyOutcome2ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PregnancyOutcome3ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PregnancyOutcome4ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NrChildren->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeliveryMethodID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeliveryTypeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;
        $this->ButtonUpdateAddNewBorn->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->HospitalAdmData->Show();
        $this->DatePicker_HospitalAdmData->Show();
        $this->FacilityID->Show();
        $this->PartnerDelivery->Show();
        $this->Partogram->Show();
        $this->PregnancyID->Show();
        $this->CurrentUser->Show();
        $this->lastmodified->Show();
        $this->user->Show();
        $this->EmployeeID->Show();
        $this->DataDelivery->Show();
        $this->DatePicker_DataDelivery1->Show();
        $this->ListofProcedures->Show();
        $this->RightButton_procedure->Show();
        $this->LeftButton_procedure->Show();
        $this->SelectedProcedures->Show();
        $this->LinkedID_Comp->Show();
        $this->LinkedID_Procedures->Show();
        $this->ListofAnesthesia->Show();
        $this->SelectedAnesthesia->Show();
        $this->RightButtonAnesthesia->Show();
        $this->LeftButtonAnesthesia->Show();
        $this->LinkedID_Anesthesia->Show();
        $this->AmnioticBursting->Show();
        $this->HospitalDischDate->Show();
        $this->DatePicker_HospitalDischDate->Show();
        $this->Steroids->Show();
        $this->TextArea1->Show();
        $this->Antibiotics->Show();
        $this->SteroidsYesNo->Show();
        $this->ListofComplications->Show();
        $this->RightButton_comp->Show();
        $this->LeftButton_comp->Show();
        $this->SelectedComplications->Show();
        $this->ListofPComplications->Show();
        $this->RightButton_pcomp->Show();
        $this->LeftButton_pcomp->Show();
        $this->SelectedPComplications->Show();
        $this->LinkedID_PComp->Show();
        $this->GestationAge->Show();
        $this->ButtonUpdateAddNewBorn->Show();
        $this->Reloaded->Show();
        $this->NumberOfDelivery->Show();
        $this->Uterotoics->Show();
        $this->ART->Show();
        $this->Mg_Label->Show();
        $this->PregnancyOutcome1ID->Show();
        $this->PregnancyOutcome2ID->Show();
        $this->PregnancyOutcome3ID->Show();
        $this->PregnancyOutcome4ID->Show();
        $this->NrChildren->Show();
        $this->DeliveryMethodID->Show();
        $this->DeliveryTypeID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End delivery Class @234-FCB6E20C

class clsdeliveryDataSource extends clsDBregistry_db {  //deliveryDataSource Class @234-9FB0C359

//DataSource Variables @234-3B34A7F5
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $DeleteParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $HospitalAdmData;
    public $FacilityID;
    public $PartnerDelivery;
    public $Partogram;
    public $PregnancyID;
    public $CurrentUser;
    public $lastmodified;
    public $user;
    public $EmployeeID;
    public $DataDelivery;
    public $ListofProcedures;
    public $SelectedProcedures;
    public $LinkedID_Comp;
    public $LinkedID_Procedures;
    public $ListofAnesthesia;
    public $SelectedAnesthesia;
    public $LinkedID_Anesthesia;
    public $AmnioticBursting;
    public $HospitalDischDate;
    public $Steroids;
    public $TextArea1;
    public $Antibiotics;
    public $SteroidsYesNo;
    public $ListofComplications;
    public $SelectedComplications;
    public $ListofPComplications;
    public $SelectedPComplications;
    public $LinkedID_PComp;
    public $GestationAge;
    public $Reloaded;
    public $NumberOfDelivery;
    public $Uterotoics;
    public $ART;
    public $Mg_Label;
    public $PregnancyOutcome1ID;
    public $PregnancyOutcome2ID;
    public $PregnancyOutcome3ID;
    public $PregnancyOutcome4ID;
    public $NrChildren;
    public $DeliveryMethodID;
    public $DeliveryTypeID;
//End DataSource Variables

//DataSourceClass_Initialize Event @234-14712ED8
    function clsdeliveryDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record delivery/Error";
        $this->Initialize();
        $this->HospitalAdmData = new clsField("HospitalAdmData", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->FacilityID = new clsField("FacilityID", ccsInteger, "");
        
        $this->PartnerDelivery = new clsField("PartnerDelivery", ccsInteger, "");
        
        $this->Partogram = new clsField("Partogram", ccsInteger, "");
        
        $this->PregnancyID = new clsField("PregnancyID", ccsInteger, "");
        
        $this->CurrentUser = new clsField("CurrentUser", ccsText, "");
        
        $this->lastmodified = new clsField("lastmodified", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->user = new clsField("user", ccsText, "");
        
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->DataDelivery = new clsField("DataDelivery", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->ListofProcedures = new clsField("ListofProcedures", ccsText, "");
        
        $this->SelectedProcedures = new clsField("SelectedProcedures", ccsText, "");
        
        $this->LinkedID_Comp = new clsField("LinkedID_Comp", ccsText, "");
        
        $this->LinkedID_Procedures = new clsField("LinkedID_Procedures", ccsText, "");
        
        $this->ListofAnesthesia = new clsField("ListofAnesthesia", ccsInteger, "");
        
        $this->SelectedAnesthesia = new clsField("SelectedAnesthesia", ccsInteger, "");
        
        $this->LinkedID_Anesthesia = new clsField("LinkedID_Anesthesia", ccsText, "");
        
        $this->AmnioticBursting = new clsField("AmnioticBursting", ccsInteger, "");
        
        $this->HospitalDischDate = new clsField("HospitalDischDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Steroids = new clsField("Steroids", ccsInteger, "");
        
        $this->TextArea1 = new clsField("TextArea1", ccsText, "");
        
        $this->Antibiotics = new clsField("Antibiotics", ccsInteger, "");
        
        $this->SteroidsYesNo = new clsField("SteroidsYesNo", ccsInteger, "");
        
        $this->ListofComplications = new clsField("ListofComplications", ccsText, "");
        
        $this->SelectedComplications = new clsField("SelectedComplications", ccsText, "");
        
        $this->ListofPComplications = new clsField("ListofPComplications", ccsText, "");
        
        $this->SelectedPComplications = new clsField("SelectedPComplications", ccsText, "");
        
        $this->LinkedID_PComp = new clsField("LinkedID_PComp", ccsText, "");
        
        $this->GestationAge = new clsField("GestationAge", ccsInteger, "");
        
        $this->Reloaded = new clsField("Reloaded", ccsBoolean, $this->BooleanFormat);
        
        $this->NumberOfDelivery = new clsField("NumberOfDelivery", ccsText, "");
        
        $this->Uterotoics = new clsField("Uterotoics", ccsInteger, "");
        
        $this->ART = new clsField("ART", ccsInteger, "");
        
        $this->Mg_Label = new clsField("Mg_Label", ccsText, "");
        
        $this->PregnancyOutcome1ID = new clsField("PregnancyOutcome1ID", ccsInteger, "");
        
        $this->PregnancyOutcome2ID = new clsField("PregnancyOutcome2ID", ccsInteger, "");
        
        $this->PregnancyOutcome3ID = new clsField("PregnancyOutcome3ID", ccsInteger, "");
        
        $this->PregnancyOutcome4ID = new clsField("PregnancyOutcome4ID", ccsText, "");
        
        $this->NrChildren = new clsField("NrChildren", ccsInteger, "");
        
        $this->DeliveryMethodID = new clsField("DeliveryMethodID", ccsInteger, "");
        
        $this->DeliveryTypeID = new clsField("DeliveryTypeID", ccsInteger, "");
        

        $this->InsertFields["HospitalAdmData"] = array("Name" => "HospitalAdmData", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["HospitalDischDate"] = array("Name" => "HospitalDischDate", "Value" => "", "DataType" => ccsDate);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["PartnerDelivery"] = array("Name" => "PartnerDelivery", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Partogram"] = array("Name" => "Partogram", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DeliveryTypeID"] = array("Name" => "DeliveryTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DeliveryMethodID"] = array("Name" => "DeliveryMethodID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["PregnancyID"] = array("Name" => "PregnancyID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DataDelivery"] = array("Name" => "DataDelivery", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["AmnioticBurstingID"] = array("Name" => "AmnioticBurstingID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Indications"] = array("Name" => "Indications", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->InsertFields["GestationAge"] = array("Name" => "GestationAge", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Steroids"] = array("Name" => "Steroids", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["Antibiotics"] = array("Name" => "Antibiotics", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["ART"] = array("Name" => "ART", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["SteroidsYesNo"] = array("Name" => "SteroidsYesNo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NumberOfDelivery"] = array("Name" => "NumberOfDelivery", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Uterotoics"] = array("Name" => "Uterotoics", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["PregnancyOutcome1ID"] = array("Name" => "PregnancyOutcome1ID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["PregnancyOutcome2ID"] = array("Name" => "PregnancyOutcome2ID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["PregnancyOutcome3ID"] = array("Name" => "PregnancyOutcome3ID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["PregnancyOutcome4ID"] = array("Name" => "PregnancyOutcome4ID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["HospitalAdmData"] = array("Name" => "HospitalAdmData", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["HospitalDischDate"] = array("Name" => "HospitalDischDate", "Value" => "", "DataType" => ccsDate);
        $this->UpdateFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PartnerDelivery"] = array("Name" => "PartnerDelivery", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Partogram"] = array("Name" => "Partogram", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DeliveryTypeID"] = array("Name" => "DeliveryTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DeliveryMethodID"] = array("Name" => "DeliveryMethodID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PregnancyID"] = array("Name" => "PregnancyID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DataDelivery"] = array("Name" => "DataDelivery", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AmnioticBurstingID"] = array("Name" => "AmnioticBurstingID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Indications"] = array("Name" => "Indications", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->UpdateFields["GestationAge"] = array("Name" => "GestationAge", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Steroids"] = array("Name" => "Steroids", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Antibiotics"] = array("Name" => "Antibiotics", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ART"] = array("Name" => "ART", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["SteroidsYesNo"] = array("Name" => "SteroidsYesNo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["NumberOfDelivery"] = array("Name" => "NumberOfDelivery", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Uterotoics"] = array("Name" => "Uterotoics", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["PregnancyOutcome1ID"] = array("Name" => "PregnancyOutcome1ID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PregnancyOutcome2ID"] = array("Name" => "PregnancyOutcome2ID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PregnancyOutcome3ID"] = array("Name" => "PregnancyOutcome3ID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PregnancyOutcome4ID"] = array("Name" => "PregnancyOutcome4ID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @234-4DAF4744
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlDeliveryID", ccsInteger, "", "", $this->Parameters["urlDeliveryID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "DeliveryID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @234-89C7DBB7
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM delivery {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @234-E3B22CD1
    function SetValues()
    {
        $this->HospitalAdmData->SetDBValue(trim($this->f("HospitalAdmData")));
        $this->FacilityID->SetDBValue(trim($this->f("FacilityID")));
        $this->PartnerDelivery->SetDBValue(trim($this->f("PartnerDelivery")));
        $this->Partogram->SetDBValue(trim($this->f("Partogram")));
        $this->PregnancyID->SetDBValue(trim($this->f("PregnancyID")));
        $this->CurrentUser->SetDBValue($this->f("by_user"));
        $this->lastmodified->SetDBValue(trim($this->f("created")));
        $this->user->SetDBValue($this->f("by_user"));
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->DataDelivery->SetDBValue(trim($this->f("DataDelivery")));
        $this->AmnioticBursting->SetDBValue(trim($this->f("AmnioticBurstingID")));
        $this->HospitalDischDate->SetDBValue(trim($this->f("HospitalDischDate")));
        $this->Steroids->SetDBValue(trim($this->f("Steroids")));
        $this->TextArea1->SetDBValue($this->f("Indications"));
        $this->Antibiotics->SetDBValue(trim($this->f("Antibiotics")));
        $this->SteroidsYesNo->SetDBValue(trim($this->f("SteroidsYesNo")));
        $this->GestationAge->SetDBValue(trim($this->f("GestationAge")));
        $this->NumberOfDelivery->SetDBValue($this->f("NumberOfDelivery"));
        $this->Uterotoics->SetDBValue(trim($this->f("Uterotoics")));
        $this->ART->SetDBValue(trim($this->f("ART")));
        $this->PregnancyOutcome1ID->SetDBValue(trim($this->f("PregnancyOutcome1ID")));
        $this->PregnancyOutcome2ID->SetDBValue(trim($this->f("PregnancyOutcome2ID")));
        $this->PregnancyOutcome3ID->SetDBValue(trim($this->f("PregnancyOutcome3ID")));
        $this->PregnancyOutcome4ID->SetDBValue($this->f("PregnancyOutcome4ID"));
        $this->DeliveryMethodID->SetDBValue(trim($this->f("DeliveryMethodID")));
        $this->DeliveryTypeID->SetDBValue(trim($this->f("DeliveryTypeID")));
    }
//End SetValues Method

//Insert Method @234-67EB272E
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["HospitalAdmData"] = new clsSQLParameter("ctrlHospitalAdmData", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->HospitalAdmData->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HospitalDischDate"] = new clsSQLParameter("ctrlHospitalDischDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->HospitalDischDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacilityID", ccsInteger, "", "", $this->FacilityID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["EmployeeID"] = new clsSQLParameter("ctrlEmployeeID", ccsInteger, "", "", $this->EmployeeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PartnerDelivery"] = new clsSQLParameter("ctrlPartnerDelivery", ccsInteger, "", "", $this->PartnerDelivery->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Partogram"] = new clsSQLParameter("ctrlPartogram", ccsInteger, "", "", $this->Partogram->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DeliveryTypeID"] = new clsSQLParameter("ctrlDeliveryTypeID", ccsInteger, "", "", $this->DeliveryTypeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DeliveryMethodID"] = new clsSQLParameter("ctrlDeliveryMethodID", ccsInteger, "", "", $this->DeliveryMethodID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyID"] = new clsSQLParameter("ctrlPregnancyID", ccsInteger, "", "", $this->PregnancyID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DataDelivery"] = new clsSQLParameter("ctrlDataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DataDelivery->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["AmnioticBurstingID"] = new clsSQLParameter("ctrlAmnioticBursting", ccsInteger, "", "", $this->AmnioticBursting->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Indications"] = new clsSQLParameter("ctrlTextArea1", ccsMemo, "", "", $this->TextArea1->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["GestationAge"] = new clsSQLParameter("ctrlGestationAge", ccsInteger, "", "", $this->GestationAge->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Steroids"] = new clsSQLParameter("ctrlSteroids", ccsInteger, "", "", $this->Steroids->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["Antibiotics"] = new clsSQLParameter("ctrlAntibiotics", ccsInteger, "", "", $this->Antibiotics->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ART"] = new clsSQLParameter("ctrlART", ccsInteger, "", "", $this->ART->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["SteroidsYesNo"] = new clsSQLParameter("ctrlSteroidsYesNo", ccsInteger, "", "", $this->SteroidsYesNo->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NumberOfDelivery"] = new clsSQLParameter("ctrlNumberOfDelivery", ccsText, "", "", $this->NumberOfDelivery->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Uterotoics"] = new clsSQLParameter("ctrlUterotoics", ccsInteger, "", "", $this->Uterotoics->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PregnancyOutcome1ID"] = new clsSQLParameter("ctrlPregnancyOutcome1ID", ccsInteger, "", "", $this->PregnancyOutcome1ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyOutcome2ID"] = new clsSQLParameter("ctrlPregnancyOutcome2ID", ccsInteger, "", "", $this->PregnancyOutcome2ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyOutcome3ID"] = new clsSQLParameter("ctrlPregnancyOutcome3ID", ccsInteger, "", "", $this->PregnancyOutcome3ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyOutcome4ID"] = new clsSQLParameter("ctrlPregnancyOutcome4ID", ccsText, "", "", $this->PregnancyOutcome4ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["HospitalAdmData"]->GetValue()) and !strlen($this->cp["HospitalAdmData"]->GetText()) and !is_bool($this->cp["HospitalAdmData"]->GetValue())) 
            $this->cp["HospitalAdmData"]->SetValue($this->HospitalAdmData->GetValue(true));
        if (!is_null($this->cp["HospitalDischDate"]->GetValue()) and !strlen($this->cp["HospitalDischDate"]->GetText()) and !is_bool($this->cp["HospitalDischDate"]->GetValue())) 
            $this->cp["HospitalDischDate"]->SetValue($this->HospitalDischDate->GetValue(true));
        if (!strlen($this->cp["HospitalDischDate"]->GetText()) and !is_bool($this->cp["HospitalDischDate"]->GetValue(true))) 
            $this->cp["HospitalDischDate"]->SetText(NULL);
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->FacilityID->GetValue(true));
        if (!is_null($this->cp["EmployeeID"]->GetValue()) and !strlen($this->cp["EmployeeID"]->GetText()) and !is_bool($this->cp["EmployeeID"]->GetValue())) 
            $this->cp["EmployeeID"]->SetValue($this->EmployeeID->GetValue(true));
        if (!is_null($this->cp["PartnerDelivery"]->GetValue()) and !strlen($this->cp["PartnerDelivery"]->GetText()) and !is_bool($this->cp["PartnerDelivery"]->GetValue())) 
            $this->cp["PartnerDelivery"]->SetValue($this->PartnerDelivery->GetValue(true));
        if (!is_null($this->cp["Partogram"]->GetValue()) and !strlen($this->cp["Partogram"]->GetText()) and !is_bool($this->cp["Partogram"]->GetValue())) 
            $this->cp["Partogram"]->SetValue($this->Partogram->GetValue(true));
        if (!is_null($this->cp["DeliveryTypeID"]->GetValue()) and !strlen($this->cp["DeliveryTypeID"]->GetText()) and !is_bool($this->cp["DeliveryTypeID"]->GetValue())) 
            $this->cp["DeliveryTypeID"]->SetValue($this->DeliveryTypeID->GetValue(true));
        if (!is_null($this->cp["DeliveryMethodID"]->GetValue()) and !strlen($this->cp["DeliveryMethodID"]->GetText()) and !is_bool($this->cp["DeliveryMethodID"]->GetValue())) 
            $this->cp["DeliveryMethodID"]->SetValue($this->DeliveryMethodID->GetValue(true));
        if (!is_null($this->cp["PregnancyID"]->GetValue()) and !strlen($this->cp["PregnancyID"]->GetText()) and !is_bool($this->cp["PregnancyID"]->GetValue())) 
            $this->cp["PregnancyID"]->SetValue($this->PregnancyID->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["DataDelivery"]->GetValue()) and !strlen($this->cp["DataDelivery"]->GetText()) and !is_bool($this->cp["DataDelivery"]->GetValue())) 
            $this->cp["DataDelivery"]->SetValue($this->DataDelivery->GetValue(true));
        if (!is_null($this->cp["AmnioticBurstingID"]->GetValue()) and !strlen($this->cp["AmnioticBurstingID"]->GetText()) and !is_bool($this->cp["AmnioticBurstingID"]->GetValue())) 
            $this->cp["AmnioticBurstingID"]->SetValue($this->AmnioticBursting->GetValue(true));
        if (!is_null($this->cp["Indications"]->GetValue()) and !strlen($this->cp["Indications"]->GetText()) and !is_bool($this->cp["Indications"]->GetValue())) 
            $this->cp["Indications"]->SetValue($this->TextArea1->GetValue(true));
        if (!is_null($this->cp["GestationAge"]->GetValue()) and !strlen($this->cp["GestationAge"]->GetText()) and !is_bool($this->cp["GestationAge"]->GetValue())) 
            $this->cp["GestationAge"]->SetValue($this->GestationAge->GetValue(true));
        if (!is_null($this->cp["Steroids"]->GetValue()) and !strlen($this->cp["Steroids"]->GetText()) and !is_bool($this->cp["Steroids"]->GetValue())) 
            $this->cp["Steroids"]->SetValue($this->Steroids->GetValue(true));
        if (!strlen($this->cp["Steroids"]->GetText()) and !is_bool($this->cp["Steroids"]->GetValue(true))) 
            $this->cp["Steroids"]->SetText(0);
        if (!is_null($this->cp["Antibiotics"]->GetValue()) and !strlen($this->cp["Antibiotics"]->GetText()) and !is_bool($this->cp["Antibiotics"]->GetValue())) 
            $this->cp["Antibiotics"]->SetValue($this->Antibiotics->GetValue(true));
        if (!strlen($this->cp["Antibiotics"]->GetText()) and !is_bool($this->cp["Antibiotics"]->GetValue(true))) 
            $this->cp["Antibiotics"]->SetText(0);
        if (!is_null($this->cp["ART"]->GetValue()) and !strlen($this->cp["ART"]->GetText()) and !is_bool($this->cp["ART"]->GetValue())) 
            $this->cp["ART"]->SetValue($this->ART->GetValue(true));
        if (!strlen($this->cp["ART"]->GetText()) and !is_bool($this->cp["ART"]->GetValue(true))) 
            $this->cp["ART"]->SetText(0);
        if (!is_null($this->cp["SteroidsYesNo"]->GetValue()) and !strlen($this->cp["SteroidsYesNo"]->GetText()) and !is_bool($this->cp["SteroidsYesNo"]->GetValue())) 
            $this->cp["SteroidsYesNo"]->SetValue($this->SteroidsYesNo->GetValue(true));
        if (!is_null($this->cp["NumberOfDelivery"]->GetValue()) and !strlen($this->cp["NumberOfDelivery"]->GetText()) and !is_bool($this->cp["NumberOfDelivery"]->GetValue())) 
            $this->cp["NumberOfDelivery"]->SetValue($this->NumberOfDelivery->GetValue(true));
        if (!is_null($this->cp["Uterotoics"]->GetValue()) and !strlen($this->cp["Uterotoics"]->GetText()) and !is_bool($this->cp["Uterotoics"]->GetValue())) 
            $this->cp["Uterotoics"]->SetValue($this->Uterotoics->GetValue(true));
        if (!strlen($this->cp["Uterotoics"]->GetText()) and !is_bool($this->cp["Uterotoics"]->GetValue(true))) 
            $this->cp["Uterotoics"]->SetText(0);
        if (!is_null($this->cp["PregnancyOutcome1ID"]->GetValue()) and !strlen($this->cp["PregnancyOutcome1ID"]->GetText()) and !is_bool($this->cp["PregnancyOutcome1ID"]->GetValue())) 
            $this->cp["PregnancyOutcome1ID"]->SetValue($this->PregnancyOutcome1ID->GetValue(true));
        if (!is_null($this->cp["PregnancyOutcome2ID"]->GetValue()) and !strlen($this->cp["PregnancyOutcome2ID"]->GetText()) and !is_bool($this->cp["PregnancyOutcome2ID"]->GetValue())) 
            $this->cp["PregnancyOutcome2ID"]->SetValue($this->PregnancyOutcome2ID->GetValue(true));
        if (!is_null($this->cp["PregnancyOutcome3ID"]->GetValue()) and !strlen($this->cp["PregnancyOutcome3ID"]->GetText()) and !is_bool($this->cp["PregnancyOutcome3ID"]->GetValue())) 
            $this->cp["PregnancyOutcome3ID"]->SetValue($this->PregnancyOutcome3ID->GetValue(true));
        if (!is_null($this->cp["PregnancyOutcome4ID"]->GetValue()) and !strlen($this->cp["PregnancyOutcome4ID"]->GetText()) and !is_bool($this->cp["PregnancyOutcome4ID"]->GetValue())) 
            $this->cp["PregnancyOutcome4ID"]->SetValue($this->PregnancyOutcome4ID->GetValue(true));
        $this->InsertFields["HospitalAdmData"]["Value"] = $this->cp["HospitalAdmData"]->GetDBValue(true);
        $this->InsertFields["HospitalDischDate"]["Value"] = $this->cp["HospitalDischDate"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->InsertFields["EmployeeID"]["Value"] = $this->cp["EmployeeID"]->GetDBValue(true);
        $this->InsertFields["PartnerDelivery"]["Value"] = $this->cp["PartnerDelivery"]->GetDBValue(true);
        $this->InsertFields["Partogram"]["Value"] = $this->cp["Partogram"]->GetDBValue(true);
        $this->InsertFields["DeliveryTypeID"]["Value"] = $this->cp["DeliveryTypeID"]->GetDBValue(true);
        $this->InsertFields["DeliveryMethodID"]["Value"] = $this->cp["DeliveryMethodID"]->GetDBValue(true);
        $this->InsertFields["PregnancyID"]["Value"] = $this->cp["PregnancyID"]->GetDBValue(true);
        $this->InsertFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->InsertFields["DataDelivery"]["Value"] = $this->cp["DataDelivery"]->GetDBValue(true);
        $this->InsertFields["AmnioticBurstingID"]["Value"] = $this->cp["AmnioticBurstingID"]->GetDBValue(true);
        $this->InsertFields["Indications"]["Value"] = $this->cp["Indications"]->GetDBValue(true);
        $this->InsertFields["GestationAge"]["Value"] = $this->cp["GestationAge"]->GetDBValue(true);
        $this->InsertFields["Steroids"]["Value"] = $this->cp["Steroids"]->GetDBValue(true);
        $this->InsertFields["Antibiotics"]["Value"] = $this->cp["Antibiotics"]->GetDBValue(true);
        $this->InsertFields["ART"]["Value"] = $this->cp["ART"]->GetDBValue(true);
        $this->InsertFields["SteroidsYesNo"]["Value"] = $this->cp["SteroidsYesNo"]->GetDBValue(true);
        $this->InsertFields["NumberOfDelivery"]["Value"] = $this->cp["NumberOfDelivery"]->GetDBValue(true);
        $this->InsertFields["Uterotoics"]["Value"] = $this->cp["Uterotoics"]->GetDBValue(true);
        $this->InsertFields["PregnancyOutcome1ID"]["Value"] = $this->cp["PregnancyOutcome1ID"]->GetDBValue(true);
        $this->InsertFields["PregnancyOutcome2ID"]["Value"] = $this->cp["PregnancyOutcome2ID"]->GetDBValue(true);
        $this->InsertFields["PregnancyOutcome3ID"]["Value"] = $this->cp["PregnancyOutcome3ID"]->GetDBValue(true);
        $this->InsertFields["PregnancyOutcome4ID"]["Value"] = $this->cp["PregnancyOutcome4ID"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("delivery", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @234-FFE2D3BF
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["HospitalAdmData"] = new clsSQLParameter("ctrlHospitalAdmData", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->HospitalAdmData->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["HospitalDischDate"] = new clsSQLParameter("ctrlHospitalDischDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->HospitalDischDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacilityID", ccsInteger, "", "", $this->FacilityID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["EmployeeID"] = new clsSQLParameter("ctrlEmployeeID", ccsInteger, "", "", $this->EmployeeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PartnerDelivery"] = new clsSQLParameter("ctrlPartnerDelivery", ccsInteger, "", "", $this->PartnerDelivery->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Partogram"] = new clsSQLParameter("ctrlPartogram", ccsInteger, "", "", $this->Partogram->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DeliveryTypeID"] = new clsSQLParameter("ctrlDeliveryTypeID", ccsInteger, "", "", $this->DeliveryTypeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DeliveryMethodID"] = new clsSQLParameter("ctrlDeliveryMethodID", ccsInteger, "", "", $this->DeliveryMethodID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyID"] = new clsSQLParameter("ctrlPregnancyID", ccsInteger, "", "", $this->PregnancyID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DataDelivery"] = new clsSQLParameter("ctrlDataDelivery", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->DataDelivery->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["AmnioticBurstingID"] = new clsSQLParameter("ctrlAmnioticBursting", ccsInteger, "", "", $this->AmnioticBursting->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Indications"] = new clsSQLParameter("ctrlTextArea1", ccsMemo, "", "", $this->TextArea1->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["GestationAge"] = new clsSQLParameter("ctrlGestationAge", ccsInteger, "", "", $this->GestationAge->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Steroids"] = new clsSQLParameter("ctrlSteroids", ccsInteger, "", "", $this->Steroids->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Antibiotics"] = new clsSQLParameter("ctrlAntibiotics", ccsInteger, "", "", $this->Antibiotics->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ART"] = new clsSQLParameter("ctrlART", ccsInteger, "", "", $this->ART->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["SteroidsYesNo"] = new clsSQLParameter("ctrlSteroidsYesNo", ccsInteger, "", "", $this->SteroidsYesNo->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NumberOfDelivery"] = new clsSQLParameter("ctrlNumberOfDelivery", ccsText, "", "", $this->NumberOfDelivery->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Uterotoics"] = new clsSQLParameter("ctrlUterotoics", ccsInteger, "", "", $this->Uterotoics->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PregnancyOutcome1ID"] = new clsSQLParameter("ctrlPregnancyOutcome1ID", ccsInteger, "", "", $this->PregnancyOutcome1ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyOutcome2ID"] = new clsSQLParameter("ctrlPregnancyOutcome2ID", ccsInteger, "", "", $this->PregnancyOutcome2ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyOutcome3ID"] = new clsSQLParameter("ctrlPregnancyOutcome3ID", ccsInteger, "", "", $this->PregnancyOutcome3ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyOutcome4ID"] = new clsSQLParameter("ctrlPregnancyOutcome4ID", ccsText, "", "", $this->PregnancyOutcome4ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlDeliveryID", ccsInteger, "", "", CCGetFromGet("DeliveryID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["HospitalAdmData"]->GetValue()) and !strlen($this->cp["HospitalAdmData"]->GetText()) and !is_bool($this->cp["HospitalAdmData"]->GetValue())) 
            $this->cp["HospitalAdmData"]->SetValue($this->HospitalAdmData->GetValue(true));
        if (!is_null($this->cp["HospitalDischDate"]->GetValue()) and !strlen($this->cp["HospitalDischDate"]->GetText()) and !is_bool($this->cp["HospitalDischDate"]->GetValue())) 
            $this->cp["HospitalDischDate"]->SetValue($this->HospitalDischDate->GetValue(true));
        if (!strlen($this->cp["HospitalDischDate"]->GetText()) and !is_bool($this->cp["HospitalDischDate"]->GetValue(true))) 
            $this->cp["HospitalDischDate"]->SetText(NULL);
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->FacilityID->GetValue(true));
        if (!is_null($this->cp["EmployeeID"]->GetValue()) and !strlen($this->cp["EmployeeID"]->GetText()) and !is_bool($this->cp["EmployeeID"]->GetValue())) 
            $this->cp["EmployeeID"]->SetValue($this->EmployeeID->GetValue(true));
        if (!is_null($this->cp["PartnerDelivery"]->GetValue()) and !strlen($this->cp["PartnerDelivery"]->GetText()) and !is_bool($this->cp["PartnerDelivery"]->GetValue())) 
            $this->cp["PartnerDelivery"]->SetValue($this->PartnerDelivery->GetValue(true));
        if (!is_null($this->cp["Partogram"]->GetValue()) and !strlen($this->cp["Partogram"]->GetText()) and !is_bool($this->cp["Partogram"]->GetValue())) 
            $this->cp["Partogram"]->SetValue($this->Partogram->GetValue(true));
        if (!is_null($this->cp["DeliveryTypeID"]->GetValue()) and !strlen($this->cp["DeliveryTypeID"]->GetText()) and !is_bool($this->cp["DeliveryTypeID"]->GetValue())) 
            $this->cp["DeliveryTypeID"]->SetValue($this->DeliveryTypeID->GetValue(true));
        if (!is_null($this->cp["DeliveryMethodID"]->GetValue()) and !strlen($this->cp["DeliveryMethodID"]->GetText()) and !is_bool($this->cp["DeliveryMethodID"]->GetValue())) 
            $this->cp["DeliveryMethodID"]->SetValue($this->DeliveryMethodID->GetValue(true));
        if (!is_null($this->cp["PregnancyID"]->GetValue()) and !strlen($this->cp["PregnancyID"]->GetText()) and !is_bool($this->cp["PregnancyID"]->GetValue())) 
            $this->cp["PregnancyID"]->SetValue($this->PregnancyID->GetValue(true));
        if (!is_null($this->cp["DataDelivery"]->GetValue()) and !strlen($this->cp["DataDelivery"]->GetText()) and !is_bool($this->cp["DataDelivery"]->GetValue())) 
            $this->cp["DataDelivery"]->SetValue($this->DataDelivery->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["AmnioticBurstingID"]->GetValue()) and !strlen($this->cp["AmnioticBurstingID"]->GetText()) and !is_bool($this->cp["AmnioticBurstingID"]->GetValue())) 
            $this->cp["AmnioticBurstingID"]->SetValue($this->AmnioticBursting->GetValue(true));
        if (!is_null($this->cp["Indications"]->GetValue()) and !strlen($this->cp["Indications"]->GetText()) and !is_bool($this->cp["Indications"]->GetValue())) 
            $this->cp["Indications"]->SetValue($this->TextArea1->GetValue(true));
        if (!is_null($this->cp["GestationAge"]->GetValue()) and !strlen($this->cp["GestationAge"]->GetText()) and !is_bool($this->cp["GestationAge"]->GetValue())) 
            $this->cp["GestationAge"]->SetValue($this->GestationAge->GetValue(true));
        if (!is_null($this->cp["Steroids"]->GetValue()) and !strlen($this->cp["Steroids"]->GetText()) and !is_bool($this->cp["Steroids"]->GetValue())) 
            $this->cp["Steroids"]->SetValue($this->Steroids->GetValue(true));
        if (!is_null($this->cp["Antibiotics"]->GetValue()) and !strlen($this->cp["Antibiotics"]->GetText()) and !is_bool($this->cp["Antibiotics"]->GetValue())) 
            $this->cp["Antibiotics"]->SetValue($this->Antibiotics->GetValue(true));
        if (!is_null($this->cp["ART"]->GetValue()) and !strlen($this->cp["ART"]->GetText()) and !is_bool($this->cp["ART"]->GetValue())) 
            $this->cp["ART"]->SetValue($this->ART->GetValue(true));
        if (!is_null($this->cp["SteroidsYesNo"]->GetValue()) and !strlen($this->cp["SteroidsYesNo"]->GetText()) and !is_bool($this->cp["SteroidsYesNo"]->GetValue())) 
            $this->cp["SteroidsYesNo"]->SetValue($this->SteroidsYesNo->GetValue(true));
        if (!is_null($this->cp["NumberOfDelivery"]->GetValue()) and !strlen($this->cp["NumberOfDelivery"]->GetText()) and !is_bool($this->cp["NumberOfDelivery"]->GetValue())) 
            $this->cp["NumberOfDelivery"]->SetValue($this->NumberOfDelivery->GetValue(true));
        if (!is_null($this->cp["Uterotoics"]->GetValue()) and !strlen($this->cp["Uterotoics"]->GetText()) and !is_bool($this->cp["Uterotoics"]->GetValue())) 
            $this->cp["Uterotoics"]->SetValue($this->Uterotoics->GetValue(true));
        if (!strlen($this->cp["Uterotoics"]->GetText()) and !is_bool($this->cp["Uterotoics"]->GetValue(true))) 
            $this->cp["Uterotoics"]->SetText(0);
        if (!is_null($this->cp["PregnancyOutcome1ID"]->GetValue()) and !strlen($this->cp["PregnancyOutcome1ID"]->GetText()) and !is_bool($this->cp["PregnancyOutcome1ID"]->GetValue())) 
            $this->cp["PregnancyOutcome1ID"]->SetValue($this->PregnancyOutcome1ID->GetValue(true));
        if (!is_null($this->cp["PregnancyOutcome2ID"]->GetValue()) and !strlen($this->cp["PregnancyOutcome2ID"]->GetText()) and !is_bool($this->cp["PregnancyOutcome2ID"]->GetValue())) 
            $this->cp["PregnancyOutcome2ID"]->SetValue($this->PregnancyOutcome2ID->GetValue(true));
        if (!is_null($this->cp["PregnancyOutcome3ID"]->GetValue()) and !strlen($this->cp["PregnancyOutcome3ID"]->GetText()) and !is_bool($this->cp["PregnancyOutcome3ID"]->GetValue())) 
            $this->cp["PregnancyOutcome3ID"]->SetValue($this->PregnancyOutcome3ID->GetValue(true));
        if (!is_null($this->cp["PregnancyOutcome4ID"]->GetValue()) and !strlen($this->cp["PregnancyOutcome4ID"]->GetText()) and !is_bool($this->cp["PregnancyOutcome4ID"]->GetValue())) 
            $this->cp["PregnancyOutcome4ID"]->SetValue($this->PregnancyOutcome4ID->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "DeliveryID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["HospitalAdmData"]["Value"] = $this->cp["HospitalAdmData"]->GetDBValue(true);
        $this->UpdateFields["HospitalDischDate"]["Value"] = $this->cp["HospitalDischDate"]->GetDBValue(true);
        $this->UpdateFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->UpdateFields["EmployeeID"]["Value"] = $this->cp["EmployeeID"]->GetDBValue(true);
        $this->UpdateFields["PartnerDelivery"]["Value"] = $this->cp["PartnerDelivery"]->GetDBValue(true);
        $this->UpdateFields["Partogram"]["Value"] = $this->cp["Partogram"]->GetDBValue(true);
        $this->UpdateFields["DeliveryTypeID"]["Value"] = $this->cp["DeliveryTypeID"]->GetDBValue(true);
        $this->UpdateFields["DeliveryMethodID"]["Value"] = $this->cp["DeliveryMethodID"]->GetDBValue(true);
        $this->UpdateFields["PregnancyID"]["Value"] = $this->cp["PregnancyID"]->GetDBValue(true);
        $this->UpdateFields["DataDelivery"]["Value"] = $this->cp["DataDelivery"]->GetDBValue(true);
        $this->UpdateFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->UpdateFields["AmnioticBurstingID"]["Value"] = $this->cp["AmnioticBurstingID"]->GetDBValue(true);
        $this->UpdateFields["Indications"]["Value"] = $this->cp["Indications"]->GetDBValue(true);
        $this->UpdateFields["GestationAge"]["Value"] = $this->cp["GestationAge"]->GetDBValue(true);
        $this->UpdateFields["Steroids"]["Value"] = $this->cp["Steroids"]->GetDBValue(true);
        $this->UpdateFields["Antibiotics"]["Value"] = $this->cp["Antibiotics"]->GetDBValue(true);
        $this->UpdateFields["ART"]["Value"] = $this->cp["ART"]->GetDBValue(true);
        $this->UpdateFields["SteroidsYesNo"]["Value"] = $this->cp["SteroidsYesNo"]->GetDBValue(true);
        $this->UpdateFields["NumberOfDelivery"]["Value"] = $this->cp["NumberOfDelivery"]->GetDBValue(true);
        $this->UpdateFields["Uterotoics"]["Value"] = $this->cp["Uterotoics"]->GetDBValue(true);
        $this->UpdateFields["PregnancyOutcome1ID"]["Value"] = $this->cp["PregnancyOutcome1ID"]->GetDBValue(true);
        $this->UpdateFields["PregnancyOutcome2ID"]["Value"] = $this->cp["PregnancyOutcome2ID"]->GetDBValue(true);
        $this->UpdateFields["PregnancyOutcome3ID"]["Value"] = $this->cp["PregnancyOutcome3ID"]->GetDBValue(true);
        $this->UpdateFields["PregnancyOutcome4ID"]["Value"] = $this->cp["PregnancyOutcome4ID"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("delivery", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @234-C652A5F8
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlDeliveryID", ccsInteger, "", "", CCGetFromGet("DeliveryID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "DeliveryID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM delivery";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End deliveryDataSource Class @234-FCB6E20C

class clsGridnewborn { //newborn class @357-101A564E

//Variables @357-0690242D

    // Public variables
    public $ComponentType = "Grid";
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $ErrorBlock;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $ForceIteration = false;
    public $HasRecord = false;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $RowNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";
    public $Attributes;

    // Grid Controls
    public $StaticControls;
    public $RowControls;
    public $Sorter_NewBornN;
    public $Sorter_Sex;
    public $Sorter_BirthDateTime;
//End Variables

//Class_Initialize Event @357-83F4D928
    function clsGridnewborn($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "newborn";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid newborn";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsnewbornDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("newbornOrder", "");
        $this->SorterDirection = CCGetParam("newbornDir", "");

        $this->NewBornN = new clsControl(ccsLabel, "NewBornN", "NewBornN", ccsText, "", CCGetRequestParam("NewBornN", ccsGet, NULL), $this);
        $this->Sex = new clsControl(ccsLabel, "Sex", "Sex", ccsInteger, "", CCGetRequestParam("Sex", ccsGet, NULL), $this);
        $this->BirthDateTime = new clsControl(ccsLabel, "BirthDateTime", "BirthDateTime", ccsDate, array("ShortDate"), CCGetRequestParam("BirthDateTime", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "newborn_maint.php";
        $this->BirthDateTime1 = new clsControl(ccsLabel, "BirthDateTime1", "BirthDateTime1", ccsDate, array("ShortTime"), CCGetRequestParam("BirthDateTime1", ccsGet, NULL), $this);
        $this->newborn_TotalRecords = new clsControl(ccsLabel, "newborn_TotalRecords", "newborn_TotalRecords", ccsText, "", CCGetRequestParam("newborn_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_NewBornN = new clsSorter($this->ComponentName, "Sorter_NewBornN", $FileName, $this);
        $this->Sorter_Sex = new clsSorter($this->ComponentName, "Sorter_Sex", $FileName, $this);
        $this->Sorter_BirthDateTime = new clsSorter($this->ComponentName, "Sorter_BirthDateTime", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @357-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @357-0686B819
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlDeliveryID"] = CCGetFromGet("DeliveryID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["NewBornN"] = $this->NewBornN->Visible;
            $this->ControlsVisible["Sex"] = $this->Sex->Visible;
            $this->ControlsVisible["BirthDateTime"] = $this->BirthDateTime->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            $this->ControlsVisible["BirthDateTime1"] = $this->BirthDateTime1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->NewBornN->SetValue($this->DataSource->NewBornN->GetValue());
                $this->Sex->SetValue($this->DataSource->Sex->GetValue());
                $this->BirthDateTime->SetValue($this->DataSource->BirthDateTime->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "NewBornID", $this->DataSource->f("NewBornID"));
                $this->BirthDateTime1->SetValue($this->DataSource->BirthDateTime1->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->NewBornN->Show();
                $this->Sex->Show();
                $this->BirthDateTime->Show();
                $this->ImageLink1->Show();
                $this->BirthDateTime1->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->newborn_TotalRecords->Show();
        $this->Sorter_NewBornN->Show();
        $this->Sorter_Sex->Show();
        $this->Sorter_BirthDateTime->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @357-54AFE8AE
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->NewBornN->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Sex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDateTime->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDateTime1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End newborn Class @357-FCB6E20C

class clsnewbornDataSource extends clsDBregistry_db {  //newbornDataSource Class @357-6B507A28

//DataSource Variables @357-15390B25
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $NewBornN;
    public $Sex;
    public $BirthDateTime;
    public $BirthDateTime1;
//End DataSource Variables

//DataSourceClass_Initialize Event @357-9BD5FB34
    function clsnewbornDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid newborn";
        $this->Initialize();
        $this->NewBornN = new clsField("NewBornN", ccsText, "");
        
        $this->Sex = new clsField("Sex", ccsInteger, "");
        
        $this->BirthDateTime = new clsField("BirthDateTime", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->BirthDateTime1 = new clsField("BirthDateTime1", ccsDate, array("HH", ":", "nn", ":", "ss"));
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @357-9D277426
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "newborn.BirthDate desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_NewBornN" => array("NewBornN", "BirthDate"), 
            "Sorter_Sex" => array("Sex", ""), 
            "Sorter_BirthDateTime" => array("BirthDateTime", "")));
    }
//End SetOrder Method

//Prepare Method @357-ECFD71F5
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlDeliveryID", ccsInteger, "", "", $this->Parameters["urlDeliveryID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "newborn.DeliveryID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @357-B79C91C0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (delivery INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID) INNER JOIN pregnancy ON\n\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID";
        $this->SQL = "SELECT * \n\n" .
        "FROM (delivery INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID) INNER JOIN pregnancy ON\n\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @357-F6C096D5
    function SetValues()
    {
        $this->NewBornN->SetDBValue($this->f("NewBornN"));
        $this->Sex->SetDBValue(trim($this->f("Sex")));
        $this->BirthDateTime->SetDBValue(trim($this->f("BirthDate")));
        $this->BirthDateTime1->SetDBValue(trim($this->f("BirthTime")));
    }
//End SetValues Method

} //End newbornDataSource Class @357-FCB6E20C

class clsRecordpregnancy_header1 { //pregnancy_header1 Class @409-18A06872

//Variables @409-9E315808

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

//Class_Initialize Event @409-60A6F8D5
    function clsRecordpregnancy_header1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record pregnancy_header1/Error";
        $this->DataSource = new clspregnancy_header1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;2");
            $this->ComponentName = "pregnancy_header1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->PregnancyRecNr = new clsControl(ccsLabel, "PregnancyRecNr", $CCSLocales->GetText("PregnancyRecNr"), ccsText, "", CCGetRequestParam("PregnancyRecNr", $Method, NULL), $this);
            $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
            $this->PatientID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->PatientID->Page = "patient_maint_district.php";
        }
    }
//End Class_Initialize Event

//Initialize Method @409-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @409-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @409-651F84E8
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @409-ED598703
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

//Operation Method @409-17DC9883
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @409-6CAF9031
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
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
                $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
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

        $this->PregnancyRecNr->Show();
        $this->PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End pregnancy_header1 Class @409-FCB6E20C

class clspregnancy_header1DataSource extends clsDBregistry_db {  //pregnancy_header1DataSource Class @409-FA18A47E

//DataSource Variables @409-E31437D1
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $PregnancyRecNr;
    public $PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @409-A243E463
    function clspregnancy_header1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record pregnancy_header1/Error";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @409-190B3DAA
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @409-64C2DC81
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM pregnancy INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @409-0855F252
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End pregnancy_header1DataSource Class @409-FCB6E20C

//Initialize Page @1-5A779C58
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
$TemplateFileName = "delivery_maint.html";
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

//Include events file @1-CCB7F523
include_once("./delivery_maint_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-75DE1268
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$pregnancy_header = new clsRecordpregnancy_header("", $MainPage);
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$delivery = new clsRecorddelivery("", $MainPage);
$newborn = new clsGridnewborn("", $MainPage);
$pregnancy_header1 = new clsRecordpregnancy_header1("", $MainPage);
$MainPage->pregnancy_header = & $pregnancy_header;
$MainPage->topmenu = & $topmenu;
$MainPage->delivery = & $delivery;
$MainPage->newborn = & $newborn;
$MainPage->pregnancy_header1 = & $pregnancy_header1;
$pregnancy_header->Initialize();
$delivery->Initialize();
$newborn->Initialize();
$pregnancy_header1->Initialize();

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

//Execute Components @1-A4F79F4A
$pregnancy_header->Operation();
$topmenu->Operations();
$delivery->Operation();
$pregnancy_header1->Operation();
//End Execute Components

//Go to destination page @1-7A208DAE
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    unset($pregnancy_header);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($delivery);
    unset($newborn);
    unset($pregnancy_header1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-8A15CDFD
$pregnancy_header->Show();
$topmenu->Show();
$delivery->Show();
$newborn->Show();
$pregnancy_header1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-D35E972E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
unset($pregnancy_header);
$topmenu->Class_Terminate();
unset($topmenu);
unset($delivery);
unset($newborn);
unset($pregnancy_header1);
unset($Tpl);
//End Unload Page


?>
