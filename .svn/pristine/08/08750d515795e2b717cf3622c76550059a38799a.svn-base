<?php
//Include Common Files @1-F0ED5507
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "pregnancy_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordpregnancy { //pregnancy Class @3-4973C73F

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

//Class_Initialize Event @3-8C9FA425
    function clsRecordpregnancy($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record pregnancy/Error";
        $this->DataSource = new clspregnancyDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;3;2");
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "pregnancy";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->PregnancyRecNr = new clsControl(ccsTextBox, "PregnancyRecNr", $CCSLocales->GetText("PregnancyRecNr"), ccsText, "", CCGetRequestParam("PregnancyRecNr", $Method, NULL), $this);
            $this->PregnancyRecNr->Required = true;
            $this->PregRegDate = new clsControl(ccsTextBox, "PregRegDate", $CCSLocales->GetText("PregRegDate"), ccsDate, array("ShortDate"), CCGetRequestParam("PregRegDate", $Method, NULL), $this);
            $this->PregRegDate->Required = true;
            $this->GestationAge = new clsControl(ccsTextBox, "GestationAge", $CCSLocales->GetText("GestationAge"), ccsInteger, "", CCGetRequestParam("GestationAge", $Method, NULL), $this);
            $this->GestationAge->Required = true;
            $this->Calc_DeliveryDate = new clsControl(ccsTextBox, "Calc_DeliveryDate", $CCSLocales->GetText("Calc_DeliveryDate"), ccsDate, array("ShortDate"), CCGetRequestParam("Calc_DeliveryDate", $Method, NULL), $this);
            $this->Calc_DeliveryDate->Required = true;
            $this->PregnancyTypeID = new clsControl(ccsListBox, "PregnancyTypeID", $CCSLocales->GetText("PregnancyTypeName"), ccsInteger, "", CCGetRequestParam("PregnancyTypeID", $Method, NULL), $this);
            $this->PregnancyTypeID->DSType = dsTable;
            $this->PregnancyTypeID->DataSource = new clsDBregistry_db();
            $this->PregnancyTypeID->ds = & $this->PregnancyTypeID->DataSource;
            $this->PregnancyTypeID->DataSource->SQL = "SELECT * \n" .
"FROM pregnancytype {SQL_Where} {SQL_OrderBy}";
            list($this->PregnancyTypeID->BoundColumn, $this->PregnancyTypeID->TextColumn, $this->PregnancyTypeID->DBFormat) = array("PregnancyTypeID", "PregnancyTypeName", "");
            $this->PregnancyTypeID->Required = true;
            $this->LastMensesDate = new clsControl(ccsTextBox, "LastMensesDate", $CCSLocales->GetText("LastMensesDate"), ccsDate, array("ShortDate"), CCGetRequestParam("LastMensesDate", $Method, NULL), $this);
            $this->DatePicker_PregnancyRecNr1 = new clsDatePicker("DatePicker_PregnancyRecNr1", "pregnancy", "PregRegDate", $this);
            $this->DatePicker_LastMensesDate1 = new clsDatePicker("DatePicker_LastMensesDate1", "pregnancy", "LastMensesDate", $this);
            $this->Button_UpdateAddVisit = new clsButton("Button_UpdateAddVisit", $Method, $this);
            $this->UpdateDelDate = new clsButton("UpdateDelDate", $Method, $this);
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
            $this->Button_UpdateAddDelivery = new clsButton("Button_UpdateAddDelivery", $Method, $this);
            $this->Ultrasound20weeks = new clsControl(ccsRadioButton, "Ultrasound20weeks", $CCSLocales->GetText("Ultrasound20weeks"), ccsInteger, "", CCGetRequestParam("Ultrasound20weeks", $Method, NULL), $this);
            $this->Ultrasound20weeks->DSType = dsListOfValues;
            $this->Ultrasound20weeks->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->Ultrasound20weeks->HTML = true;
            $this->Ultrasound20weeks->Required = true;
            $this->MethodFertilization = new clsControl(ccsListBox, "MethodFertilization", $CCSLocales->GetText("MethodFertilization"), ccsInteger, "", CCGetRequestParam("MethodFertilization", $Method, NULL), $this);
            $this->MethodFertilization->DSType = dsTable;
            $this->MethodFertilization->DataSource = new clsDBregistry_db();
            $this->MethodFertilization->ds = & $this->MethodFertilization->DataSource;
            $this->MethodFertilization->DataSource->SQL = "SELECT * \n" .
"FROM method_fertilization {SQL_Where} {SQL_OrderBy}";
            list($this->MethodFertilization->BoundColumn, $this->MethodFertilization->TextColumn, $this->MethodFertilization->DBFormat) = array("MethodFertilizationID", "MethodFertilizationName", "");
            $this->MethodFertilization->Required = true;
            $this->Facility = new clsControl(ccsListBox, "Facility", $CCSLocales->GetText("FacilityID"), ccsInteger, "", CCGetRequestParam("Facility", $Method, NULL), $this);
            $this->Facility->DSType = dsTable;
            $this->Facility->DataSource = new clsDBregistry_db();
            $this->Facility->ds = & $this->Facility->DataSource;
            $this->Facility->DataSource->SQL = "SELECT * \n" .
"FROM facilities {SQL_Where} {SQL_OrderBy}";
            $this->Facility->DataSource->Order = "FacilityName";
            list($this->Facility->BoundColumn, $this->Facility->TextColumn, $this->Facility->DBFormat) = array("FacilityID", "FacilityName", "");
            $this->Facility->DataSource->Order = "FacilityName";
            $this->Facility->Required = true;
            $this->Button_UpdateAddHospitalisation = new clsButton("Button_UpdateAddHospitalisation", $Method, $this);
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->PatientID = new clsControl(ccsHidden, "PatientID", $CCSLocales->GetText("PatientID"), ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
            $this->PatientID->Required = true;
            $this->RecommendationNotifications = new clsControl(ccsRadioButton, "RecommendationNotifications", $CCSLocales->GetText("RecommendationNot"), ccsInteger, "", CCGetRequestParam("RecommendationNotifications", $Method, NULL), $this);
            $this->RecommendationNotifications->DSType = dsListOfValues;
            $this->RecommendationNotifications->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->RecommendationNotifications->HTML = true;
            $this->RecommendationNotifications->Required = true;
            $this->ReminderNotifications = new clsControl(ccsRadioButton, "ReminderNotifications", $CCSLocales->GetText("ReminderNot"), ccsInteger, "", CCGetRequestParam("ReminderNotifications", $Method, NULL), $this);
            $this->ReminderNotifications->DSType = dsListOfValues;
            $this->ReminderNotifications->Values = array(array("1", $CCSLocales->GetText("RYes")), array("0", $CCSLocales->GetText("RNo")));
            $this->ReminderNotifications->HTML = true;
            $this->ReminderNotifications->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->PregnancyTypeID->Value) && !strlen($this->PregnancyTypeID->Value) && $this->PregnancyTypeID->Value !== false)
                    $this->PregnancyTypeID->SetText(1);
                if(!is_array($this->MethodFertilization->Value) && !strlen($this->MethodFertilization->Value) && $this->MethodFertilization->Value !== false)
                    $this->MethodFertilization->SetText(1);
            }
            if(!is_array($this->lastmodified->Value) && !strlen($this->lastmodified->Value) && $this->lastmodified->Value !== false)
                $this->lastmodified->SetValue(time());
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

//Validate Method @3-45BDA204
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(! (($this->GestationAge->GetValue() > 0 && $this->GestationAge->GetValue() < 46))) {
            $this->GestationAge->Errors->addError($CCSLocales->GetText("Gestational_Limit"));
        }
        $Validation = ($this->PregnancyRecNr->Validate() && $Validation);
        $Validation = ($this->PregRegDate->Validate() && $Validation);
        $Validation = ($this->GestationAge->Validate() && $Validation);
        $Validation = ($this->Calc_DeliveryDate->Validate() && $Validation);
        $Validation = ($this->PregnancyTypeID->Validate() && $Validation);
        $Validation = ($this->LastMensesDate->Validate() && $Validation);
        $Validation = ($this->CurrentUser->Validate() && $Validation);
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->Ultrasound20weeks->Validate() && $Validation);
        $Validation = ($this->MethodFertilization->Validate() && $Validation);
        $Validation = ($this->Facility->Validate() && $Validation);
        $Validation = ($this->PatientID->Validate() && $Validation);
        $Validation = ($this->RecommendationNotifications->Validate() && $Validation);
        $Validation = ($this->ReminderNotifications->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->PregnancyRecNr->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PregRegDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GestationAge->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Calc_DeliveryDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PregnancyTypeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LastMensesDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CurrentUser->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Ultrasound20weeks->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MethodFertilization->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Facility->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PatientID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RecommendationNotifications->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ReminderNotifications->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-2986B8A8
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PregnancyRecNr->Errors->Count());
        $errors = ($errors || $this->PregRegDate->Errors->Count());
        $errors = ($errors || $this->GestationAge->Errors->Count());
        $errors = ($errors || $this->Calc_DeliveryDate->Errors->Count());
        $errors = ($errors || $this->PregnancyTypeID->Errors->Count());
        $errors = ($errors || $this->LastMensesDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_PregnancyRecNr1->Errors->Count());
        $errors = ($errors || $this->DatePicker_LastMensesDate1->Errors->Count());
        $errors = ($errors || $this->CurrentUser->Errors->Count());
        $errors = ($errors || $this->lastmodified->Errors->Count());
        $errors = ($errors || $this->user->Errors->Count());
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->Ultrasound20weeks->Errors->Count());
        $errors = ($errors || $this->MethodFertilization->Errors->Count());
        $errors = ($errors || $this->Facility->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->RecommendationNotifications->Errors->Count());
        $errors = ($errors || $this->ReminderNotifications->Errors->Count());
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

//Operation Method @3-15524F0B
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
            if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            } else if($this->Button_UpdateAddVisit->Pressed) {
                $this->PressedButton = "Button_UpdateAddVisit";
            } else if($this->UpdateDelDate->Pressed) {
                $this->PressedButton = "UpdateDelDate";
            } else if($this->Button_UpdateAddDelivery->Pressed) {
                $this->PressedButton = "Button_UpdateAddDelivery";
            } else if($this->Button_UpdateAddHospitalisation->Pressed) {
                $this->PressedButton = "Button_UpdateAddHospitalisation";
            } else if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            }
        }
        $Redirect = "patient_maint_fac.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "PregnancyID", "VisitsPage"));
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_UpdateAddVisit" && $this->UpdateAllowed) {
                $Redirect = "visit_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "PregnancyID", "VisitsPage"));
                if(!CCGetEvent($this->Button_UpdateAddVisit->CCSEvents, "OnClick", $this->Button_UpdateAddVisit) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "UpdateDelDate") {
                if(!CCGetEvent($this->UpdateDelDate->CCSEvents, "OnClick", $this->UpdateDelDate)) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddDelivery" && $this->UpdateAllowed) {
                $Redirect = "delivery_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "PregnancyID", "VisitsPage"));
                if(!CCGetEvent($this->Button_UpdateAddDelivery->CCSEvents, "OnClick", $this->Button_UpdateAddDelivery) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_UpdateAddHospitalisation" && $this->UpdateAllowed) {
                $Redirect = "hospitalisation_maint.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "PregnancyID", "VisitsPage"));
                if(!CCGetEvent($this->Button_UpdateAddHospitalisation->CCSEvents, "OnClick", $this->Button_UpdateAddHospitalisation) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Insert" && $this->InsertAllowed) {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update" && $this->UpdateAllowed) {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
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

//InsertRow Method @3-BCBB9559
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->PregnancyRecNr->SetValue($this->PregnancyRecNr->GetValue(true));
        $this->DataSource->PregRegDate->SetValue($this->PregRegDate->GetValue(true));
        $this->DataSource->GestationAge->SetValue($this->GestationAge->GetValue(true));
        $this->DataSource->Calc_DeliveryDate->SetValue($this->Calc_DeliveryDate->GetValue(true));
        $this->DataSource->PregnancyTypeID->SetValue($this->PregnancyTypeID->GetValue(true));
        $this->DataSource->PatientID->SetValue($this->PatientID->GetValue(true));
        $this->DataSource->LastMensesDate->SetValue($this->LastMensesDate->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->Ultrasound20weeks->SetValue($this->Ultrasound20weeks->GetValue(true));
        $this->DataSource->MethodFertilization->SetValue($this->MethodFertilization->GetValue(true));
        $this->DataSource->Facility->SetValue($this->Facility->GetValue(true));
        $this->DataSource->RecommendationNotifications->SetValue($this->RecommendationNotifications->GetValue(true));
        $this->DataSource->ReminderNotifications->SetValue($this->ReminderNotifications->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-8688EAB9
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->PregnancyRecNr->SetValue($this->PregnancyRecNr->GetValue(true));
        $this->DataSource->PregRegDate->SetValue($this->PregRegDate->GetValue(true));
        $this->DataSource->GestationAge->SetValue($this->GestationAge->GetValue(true));
        $this->DataSource->Calc_DeliveryDate->SetValue($this->Calc_DeliveryDate->GetValue(true));
        $this->DataSource->PregnancyTypeID->SetValue($this->PregnancyTypeID->GetValue(true));
        $this->DataSource->PatientID->SetValue($this->PatientID->GetValue(true));
        $this->DataSource->LastMensesDate->SetValue($this->LastMensesDate->GetValue(true));
        $this->DataSource->CurrentUser->SetValue($this->CurrentUser->GetValue(true));
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->Ultrasound20weeks->SetValue($this->Ultrasound20weeks->GetValue(true));
        $this->DataSource->MethodFertilization->SetValue($this->MethodFertilization->GetValue(true));
        $this->DataSource->Facility->SetValue($this->Facility->GetValue(true));
        $this->DataSource->RecommendationNotifications->SetValue($this->RecommendationNotifications->GetValue(true));
        $this->DataSource->ReminderNotifications->SetValue($this->ReminderNotifications->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @3-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @3-AFE7DAC3
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

        $this->PregnancyTypeID->Prepare();
        $this->EmployeeID->Prepare();
        $this->Ultrasound20weeks->Prepare();
        $this->MethodFertilization->Prepare();
        $this->Facility->Prepare();
        $this->RecommendationNotifications->Prepare();
        $this->ReminderNotifications->Prepare();

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
                    $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
                    $this->PregRegDate->SetValue($this->DataSource->PregRegDate->GetValue());
                    $this->GestationAge->SetValue($this->DataSource->GestationAge->GetValue());
                    $this->Calc_DeliveryDate->SetValue($this->DataSource->Calc_DeliveryDate->GetValue());
                    $this->PregnancyTypeID->SetValue($this->DataSource->PregnancyTypeID->GetValue());
                    $this->LastMensesDate->SetValue($this->DataSource->LastMensesDate->GetValue());
                    $this->CurrentUser->SetValue($this->DataSource->CurrentUser->GetValue());
                    $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                    $this->Ultrasound20weeks->SetValue($this->DataSource->Ultrasound20weeks->GetValue());
                    $this->MethodFertilization->SetValue($this->DataSource->MethodFertilization->GetValue());
                    $this->Facility->SetValue($this->DataSource->Facility->GetValue());
                    $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
                    $this->RecommendationNotifications->SetValue($this->DataSource->RecommendationNotifications->GetValue());
                    $this->ReminderNotifications->SetValue($this->DataSource->ReminderNotifications->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->PregnancyRecNr->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PregRegDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GestationAge->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Calc_DeliveryDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PregnancyTypeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LastMensesDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_PregnancyRecNr1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_LastMensesDate1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CurrentUser->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lastmodified->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Ultrasound20weeks->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MethodFertilization->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Facility->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PatientID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RecommendationNotifications->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ReminderNotifications->Errors->ToString());
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
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;
        $this->Button_UpdateAddVisit->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_UpdateAddDelivery->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_UpdateAddHospitalisation->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->PregnancyRecNr->Show();
        $this->PregRegDate->Show();
        $this->GestationAge->Show();
        $this->Calc_DeliveryDate->Show();
        $this->PregnancyTypeID->Show();
        $this->LastMensesDate->Show();
        $this->DatePicker_PregnancyRecNr1->Show();
        $this->DatePicker_LastMensesDate1->Show();
        $this->Button_UpdateAddVisit->Show();
        $this->UpdateDelDate->Show();
        $this->CurrentUser->Show();
        $this->lastmodified->Show();
        $this->user->Show();
        $this->EmployeeID->Show();
        $this->Button_UpdateAddDelivery->Show();
        $this->Ultrasound20weeks->Show();
        $this->MethodFertilization->Show();
        $this->Facility->Show();
        $this->Button_UpdateAddHospitalisation->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->PatientID->Show();
        $this->RecommendationNotifications->Show();
        $this->ReminderNotifications->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End pregnancy Class @3-FCB6E20C

class clspregnancyDataSource extends clsDBregistry_db {  //pregnancyDataSource Class @3-B20C040B

//DataSource Variables @3-22B18513
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
    public $PregnancyRecNr;
    public $PregRegDate;
    public $GestationAge;
    public $Calc_DeliveryDate;
    public $PregnancyTypeID;
    public $LastMensesDate;
    public $CurrentUser;
    public $lastmodified;
    public $user;
    public $EmployeeID;
    public $Ultrasound20weeks;
    public $MethodFertilization;
    public $Facility;
    public $PatientID;
    public $RecommendationNotifications;
    public $ReminderNotifications;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-2744DAFA
    function clspregnancyDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record pregnancy/Error";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->PregRegDate = new clsField("PregRegDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->GestationAge = new clsField("GestationAge", ccsInteger, "");
        
        $this->Calc_DeliveryDate = new clsField("Calc_DeliveryDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->PregnancyTypeID = new clsField("PregnancyTypeID", ccsInteger, "");
        
        $this->LastMensesDate = new clsField("LastMensesDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->CurrentUser = new clsField("CurrentUser", ccsText, "");
        
        $this->lastmodified = new clsField("lastmodified", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->user = new clsField("user", ccsText, "");
        
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->Ultrasound20weeks = new clsField("Ultrasound20weeks", ccsInteger, "");
        
        $this->MethodFertilization = new clsField("MethodFertilization", ccsInteger, "");
        
        $this->Facility = new clsField("Facility", ccsInteger, "");
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        
        $this->RecommendationNotifications = new clsField("RecommendationNotifications", ccsInteger, "");
        
        $this->ReminderNotifications = new clsField("ReminderNotifications", ccsInteger, "");
        

        $this->InsertFields["PregnancyRecNr"] = array("Name" => "PregnancyRecNr", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PregRegDate"] = array("Name" => "PregRegDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["GestationAge"] = array("Name" => "GestationAge", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Calc_DeliveryDate"] = array("Name" => "Calc_DeliveryDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["PregnancyTypeID"] = array("Name" => "PregnancyTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["PatientID"] = array("Name" => "PatientID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["LastMensesDate"] = array("Name" => "LastMensesDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Ultrasound20weeks"] = array("Name" => "Ultrasound20weeks", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["MethodFertilizationID"] = array("Name" => "MethodFertilizationID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["RecommendationNotifications"] = array("Name" => "RecommendationNotifications", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ReminderNotifications"] = array("Name" => "ReminderNotifications", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PregnancyRecNr"] = array("Name" => "PregnancyRecNr", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PregRegDate"] = array("Name" => "PregRegDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["GestationAge"] = array("Name" => "GestationAge", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Calc_DeliveryDate"] = array("Name" => "Calc_DeliveryDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PregnancyTypeID"] = array("Name" => "PregnancyTypeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PatientID"] = array("Name" => "PatientID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["LastMensesDate"] = array("Name" => "LastMensesDate", "Value" => "", "DataType" => ccsDate);
        $this->UpdateFields["by_user"] = array("Name" => "by_user", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Ultrasound20weeks"] = array("Name" => "Ultrasound20weeks", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["MethodFertilizationID"] = array("Name" => "MethodFertilizationID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["FacilityID"] = array("Name" => "FacilityID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["RecommendationNotifications"] = array("Name" => "RecommendationNotifications", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ReminderNotifications"] = array("Name" => "ReminderNotifications", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-6B6ECB04
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @3-96AE2420
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM pregnancy {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-052B49AC
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("PregnancyRecNr"));
        $this->PregRegDate->SetDBValue(trim($this->f("PregRegDate")));
        $this->GestationAge->SetDBValue(trim($this->f("GestationAge")));
        $this->Calc_DeliveryDate->SetDBValue(trim($this->f("Calc_DeliveryDate")));
        $this->PregnancyTypeID->SetDBValue(trim($this->f("PregnancyTypeID")));
        $this->LastMensesDate->SetDBValue(trim($this->f("LastMensesDate")));
        $this->CurrentUser->SetDBValue($this->f("by_user"));
        $this->lastmodified->SetDBValue(trim($this->f("created")));
        $this->user->SetDBValue($this->f("by_user"));
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->Ultrasound20weeks->SetDBValue(trim($this->f("Ultrasound20weeks")));
        $this->MethodFertilization->SetDBValue(trim($this->f("MethodFertilizationID")));
        $this->Facility->SetDBValue(trim($this->f("FacilityID")));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
        $this->RecommendationNotifications->SetDBValue(trim($this->f("RecommendationNotifications")));
        $this->ReminderNotifications->SetDBValue(trim($this->f("ReminderNotifications")));
    }
//End SetValues Method

//Insert Method @3-71400294
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["PregnancyRecNr"] = new clsSQLParameter("ctrlPregnancyRecNr", ccsText, "", "", $this->PregnancyRecNr->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregRegDate"] = new clsSQLParameter("ctrlPregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->PregRegDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["GestationAge"] = new clsSQLParameter("ctrlGestationAge", ccsInteger, "", "", $this->GestationAge->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Calc_DeliveryDate"] = new clsSQLParameter("ctrlCalc_DeliveryDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Calc_DeliveryDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyTypeID"] = new clsSQLParameter("ctrlPregnancyTypeID", ccsInteger, "", "", $this->PregnancyTypeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PatientID"] = new clsSQLParameter("ctrlPatientID", ccsInteger, "", "", $this->PatientID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LastMensesDate"] = new clsSQLParameter("ctrlLastMensesDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->LastMensesDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["EmployeeID"] = new clsSQLParameter("ctrlEmployeeID", ccsInteger, "", "", $this->EmployeeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Ultrasound20weeks"] = new clsSQLParameter("ctrlUltrasound20weeks", ccsInteger, "", "", $this->Ultrasound20weeks->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["MethodFertilizationID"] = new clsSQLParameter("ctrlMethodFertilization", ccsInteger, "", "", $this->MethodFertilization->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacility", ccsInteger, "", "", $this->Facility->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecommendationNotifications"] = new clsSQLParameter("ctrlRecommendationNotifications", ccsInteger, "", "", $this->RecommendationNotifications->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ReminderNotifications"] = new clsSQLParameter("ctrlReminderNotifications", ccsInteger, "", "", $this->ReminderNotifications->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["PregnancyRecNr"]->GetValue()) and !strlen($this->cp["PregnancyRecNr"]->GetText()) and !is_bool($this->cp["PregnancyRecNr"]->GetValue())) 
            $this->cp["PregnancyRecNr"]->SetValue($this->PregnancyRecNr->GetValue(true));
        if (!is_null($this->cp["PregRegDate"]->GetValue()) and !strlen($this->cp["PregRegDate"]->GetText()) and !is_bool($this->cp["PregRegDate"]->GetValue())) 
            $this->cp["PregRegDate"]->SetValue($this->PregRegDate->GetValue(true));
        if (!is_null($this->cp["GestationAge"]->GetValue()) and !strlen($this->cp["GestationAge"]->GetText()) and !is_bool($this->cp["GestationAge"]->GetValue())) 
            $this->cp["GestationAge"]->SetValue($this->GestationAge->GetValue(true));
        if (!is_null($this->cp["Calc_DeliveryDate"]->GetValue()) and !strlen($this->cp["Calc_DeliveryDate"]->GetText()) and !is_bool($this->cp["Calc_DeliveryDate"]->GetValue())) 
            $this->cp["Calc_DeliveryDate"]->SetValue($this->Calc_DeliveryDate->GetValue(true));
        if (!is_null($this->cp["PregnancyTypeID"]->GetValue()) and !strlen($this->cp["PregnancyTypeID"]->GetText()) and !is_bool($this->cp["PregnancyTypeID"]->GetValue())) 
            $this->cp["PregnancyTypeID"]->SetValue($this->PregnancyTypeID->GetValue(true));
        if (!is_null($this->cp["PatientID"]->GetValue()) and !strlen($this->cp["PatientID"]->GetText()) and !is_bool($this->cp["PatientID"]->GetValue())) 
            $this->cp["PatientID"]->SetValue($this->PatientID->GetValue(true));
        if (!is_null($this->cp["LastMensesDate"]->GetValue()) and !strlen($this->cp["LastMensesDate"]->GetText()) and !is_bool($this->cp["LastMensesDate"]->GetValue())) 
            $this->cp["LastMensesDate"]->SetValue($this->LastMensesDate->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["EmployeeID"]->GetValue()) and !strlen($this->cp["EmployeeID"]->GetText()) and !is_bool($this->cp["EmployeeID"]->GetValue())) 
            $this->cp["EmployeeID"]->SetValue($this->EmployeeID->GetValue(true));
        if (!is_null($this->cp["Ultrasound20weeks"]->GetValue()) and !strlen($this->cp["Ultrasound20weeks"]->GetText()) and !is_bool($this->cp["Ultrasound20weeks"]->GetValue())) 
            $this->cp["Ultrasound20weeks"]->SetValue($this->Ultrasound20weeks->GetValue(true));
        if (!is_null($this->cp["MethodFertilizationID"]->GetValue()) and !strlen($this->cp["MethodFertilizationID"]->GetText()) and !is_bool($this->cp["MethodFertilizationID"]->GetValue())) 
            $this->cp["MethodFertilizationID"]->SetValue($this->MethodFertilization->GetValue(true));
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->Facility->GetValue(true));
        if (!is_null($this->cp["RecommendationNotifications"]->GetValue()) and !strlen($this->cp["RecommendationNotifications"]->GetText()) and !is_bool($this->cp["RecommendationNotifications"]->GetValue())) 
            $this->cp["RecommendationNotifications"]->SetValue($this->RecommendationNotifications->GetValue(true));
        if (!is_null($this->cp["ReminderNotifications"]->GetValue()) and !strlen($this->cp["ReminderNotifications"]->GetText()) and !is_bool($this->cp["ReminderNotifications"]->GetValue())) 
            $this->cp["ReminderNotifications"]->SetValue($this->ReminderNotifications->GetValue(true));
        $this->InsertFields["PregnancyRecNr"]["Value"] = $this->cp["PregnancyRecNr"]->GetDBValue(true);
        $this->InsertFields["PregRegDate"]["Value"] = $this->cp["PregRegDate"]->GetDBValue(true);
        $this->InsertFields["GestationAge"]["Value"] = $this->cp["GestationAge"]->GetDBValue(true);
        $this->InsertFields["Calc_DeliveryDate"]["Value"] = $this->cp["Calc_DeliveryDate"]->GetDBValue(true);
        $this->InsertFields["PregnancyTypeID"]["Value"] = $this->cp["PregnancyTypeID"]->GetDBValue(true);
        $this->InsertFields["PatientID"]["Value"] = $this->cp["PatientID"]->GetDBValue(true);
        $this->InsertFields["LastMensesDate"]["Value"] = $this->cp["LastMensesDate"]->GetDBValue(true);
        $this->InsertFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->InsertFields["EmployeeID"]["Value"] = $this->cp["EmployeeID"]->GetDBValue(true);
        $this->InsertFields["Ultrasound20weeks"]["Value"] = $this->cp["Ultrasound20weeks"]->GetDBValue(true);
        $this->InsertFields["MethodFertilizationID"]["Value"] = $this->cp["MethodFertilizationID"]->GetDBValue(true);
        $this->InsertFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->InsertFields["RecommendationNotifications"]["Value"] = $this->cp["RecommendationNotifications"]->GetDBValue(true);
        $this->InsertFields["ReminderNotifications"]["Value"] = $this->cp["ReminderNotifications"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("pregnancy", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-37840B01
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["PregnancyRecNr"] = new clsSQLParameter("ctrlPregnancyRecNr", ccsText, "", "", $this->PregnancyRecNr->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregRegDate"] = new clsSQLParameter("ctrlPregRegDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->PregRegDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["GestationAge"] = new clsSQLParameter("ctrlGestationAge", ccsInteger, "", "", $this->GestationAge->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Calc_DeliveryDate"] = new clsSQLParameter("ctrlCalc_DeliveryDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->Calc_DeliveryDate->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PregnancyTypeID"] = new clsSQLParameter("ctrlPregnancyTypeID", ccsInteger, "", "", $this->PregnancyTypeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PatientID"] = new clsSQLParameter("ctrlPatientID", ccsInteger, "", "", $this->PatientID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["LastMensesDate"] = new clsSQLParameter("ctrlLastMensesDate", ccsDate, array("ShortDate"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"), $this->LastMensesDate->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["by_user"] = new clsSQLParameter("ctrlCurrentUser", ccsText, "", "", $this->CurrentUser->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["EmployeeID"] = new clsSQLParameter("ctrlEmployeeID", ccsInteger, "", "", $this->EmployeeID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Ultrasound20weeks"] = new clsSQLParameter("ctrlUltrasound20weeks", ccsInteger, "", "", $this->Ultrasound20weeks->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["MethodFertilizationID"] = new clsSQLParameter("ctrlMethodFertilization", ccsInteger, "", "", $this->MethodFertilization->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FacilityID"] = new clsSQLParameter("ctrlFacility", ccsInteger, "", "", $this->Facility->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RecommendationNotifications"] = new clsSQLParameter("ctrlRecommendationNotifications", ccsInteger, "", "", $this->RecommendationNotifications->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ReminderNotifications"] = new clsSQLParameter("ctrlReminderNotifications", ccsInteger, "", "", $this->ReminderNotifications->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", CCGetFromGet("PregnancyID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $wp->AddParameter("2", "urlPatientID", ccsInteger, "", "", CCGetFromGet("PatientID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["PregnancyRecNr"]->GetValue()) and !strlen($this->cp["PregnancyRecNr"]->GetText()) and !is_bool($this->cp["PregnancyRecNr"]->GetValue())) 
            $this->cp["PregnancyRecNr"]->SetValue($this->PregnancyRecNr->GetValue(true));
        if (!is_null($this->cp["PregRegDate"]->GetValue()) and !strlen($this->cp["PregRegDate"]->GetText()) and !is_bool($this->cp["PregRegDate"]->GetValue())) 
            $this->cp["PregRegDate"]->SetValue($this->PregRegDate->GetValue(true));
        if (!is_null($this->cp["GestationAge"]->GetValue()) and !strlen($this->cp["GestationAge"]->GetText()) and !is_bool($this->cp["GestationAge"]->GetValue())) 
            $this->cp["GestationAge"]->SetValue($this->GestationAge->GetValue(true));
        if (!is_null($this->cp["Calc_DeliveryDate"]->GetValue()) and !strlen($this->cp["Calc_DeliveryDate"]->GetText()) and !is_bool($this->cp["Calc_DeliveryDate"]->GetValue())) 
            $this->cp["Calc_DeliveryDate"]->SetValue($this->Calc_DeliveryDate->GetValue(true));
        if (!is_null($this->cp["PregnancyTypeID"]->GetValue()) and !strlen($this->cp["PregnancyTypeID"]->GetText()) and !is_bool($this->cp["PregnancyTypeID"]->GetValue())) 
            $this->cp["PregnancyTypeID"]->SetValue($this->PregnancyTypeID->GetValue(true));
        if (!is_null($this->cp["PatientID"]->GetValue()) and !strlen($this->cp["PatientID"]->GetText()) and !is_bool($this->cp["PatientID"]->GetValue())) 
            $this->cp["PatientID"]->SetValue($this->PatientID->GetValue(true));
        if (!is_null($this->cp["LastMensesDate"]->GetValue()) and !strlen($this->cp["LastMensesDate"]->GetText()) and !is_bool($this->cp["LastMensesDate"]->GetValue())) 
            $this->cp["LastMensesDate"]->SetValue($this->LastMensesDate->GetValue(true));
        if (!is_null($this->cp["by_user"]->GetValue()) and !strlen($this->cp["by_user"]->GetText()) and !is_bool($this->cp["by_user"]->GetValue())) 
            $this->cp["by_user"]->SetValue($this->CurrentUser->GetValue(true));
        if (!is_null($this->cp["EmployeeID"]->GetValue()) and !strlen($this->cp["EmployeeID"]->GetText()) and !is_bool($this->cp["EmployeeID"]->GetValue())) 
            $this->cp["EmployeeID"]->SetValue($this->EmployeeID->GetValue(true));
        if (!is_null($this->cp["Ultrasound20weeks"]->GetValue()) and !strlen($this->cp["Ultrasound20weeks"]->GetText()) and !is_bool($this->cp["Ultrasound20weeks"]->GetValue())) 
            $this->cp["Ultrasound20weeks"]->SetValue($this->Ultrasound20weeks->GetValue(true));
        if (!is_null($this->cp["MethodFertilizationID"]->GetValue()) and !strlen($this->cp["MethodFertilizationID"]->GetText()) and !is_bool($this->cp["MethodFertilizationID"]->GetValue())) 
            $this->cp["MethodFertilizationID"]->SetValue($this->MethodFertilization->GetValue(true));
        if (!is_null($this->cp["FacilityID"]->GetValue()) and !strlen($this->cp["FacilityID"]->GetText()) and !is_bool($this->cp["FacilityID"]->GetValue())) 
            $this->cp["FacilityID"]->SetValue($this->Facility->GetValue(true));
        if (!is_null($this->cp["RecommendationNotifications"]->GetValue()) and !strlen($this->cp["RecommendationNotifications"]->GetText()) and !is_bool($this->cp["RecommendationNotifications"]->GetValue())) 
            $this->cp["RecommendationNotifications"]->SetValue($this->RecommendationNotifications->GetValue(true));
        if (!is_null($this->cp["ReminderNotifications"]->GetValue()) and !strlen($this->cp["ReminderNotifications"]->GetText()) and !is_bool($this->cp["ReminderNotifications"]->GetValue())) 
            $this->cp["ReminderNotifications"]->SetValue($this->ReminderNotifications->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "PregnancyID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $wp->Criterion[2] = $wp->Operation(opEqual, "PatientID", $wp->GetDBValue("2"), $this->ToSQL($wp->GetDBValue("2"), ccsInteger),false);
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->UpdateFields["PregnancyRecNr"]["Value"] = $this->cp["PregnancyRecNr"]->GetDBValue(true);
        $this->UpdateFields["PregRegDate"]["Value"] = $this->cp["PregRegDate"]->GetDBValue(true);
        $this->UpdateFields["GestationAge"]["Value"] = $this->cp["GestationAge"]->GetDBValue(true);
        $this->UpdateFields["Calc_DeliveryDate"]["Value"] = $this->cp["Calc_DeliveryDate"]->GetDBValue(true);
        $this->UpdateFields["PregnancyTypeID"]["Value"] = $this->cp["PregnancyTypeID"]->GetDBValue(true);
        $this->UpdateFields["PatientID"]["Value"] = $this->cp["PatientID"]->GetDBValue(true);
        $this->UpdateFields["LastMensesDate"]["Value"] = $this->cp["LastMensesDate"]->GetDBValue(true);
        $this->UpdateFields["by_user"]["Value"] = $this->cp["by_user"]->GetDBValue(true);
        $this->UpdateFields["EmployeeID"]["Value"] = $this->cp["EmployeeID"]->GetDBValue(true);
        $this->UpdateFields["Ultrasound20weeks"]["Value"] = $this->cp["Ultrasound20weeks"]->GetDBValue(true);
        $this->UpdateFields["MethodFertilizationID"]["Value"] = $this->cp["MethodFertilizationID"]->GetDBValue(true);
        $this->UpdateFields["FacilityID"]["Value"] = $this->cp["FacilityID"]->GetDBValue(true);
        $this->UpdateFields["RecommendationNotifications"]["Value"] = $this->cp["RecommendationNotifications"]->GetDBValue(true);
        $this->UpdateFields["ReminderNotifications"]["Value"] = $this->cp["ReminderNotifications"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("pregnancy", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @3-97682C25
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", CCGetFromGet("PregnancyID", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "PregnancyID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM pregnancy";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End pregnancyDataSource Class @3-FCB6E20C

class clsGridVisits { //Visits class @56-653CF773

//Variables @56-C2768011

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
    public $Sorter_VisitDate;
    public $Sorter_FacilityName;
    public $Sorter_VisitOutcomeName;
    public $Sorter_NextVisit;
//End Variables

//Class_Initialize Event @56-D00F2A07
    function clsGridVisits($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Visits";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid Visits";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsVisitsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 25;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        $this->SorterName = CCGetParam("VisitsOrder", "");
        $this->SorterDirection = CCGetParam("VisitsDir", "");

        $this->VisitDate = new clsControl(ccsLabel, "VisitDate", "VisitDate", ccsDate, array("ShortDate"), CCGetRequestParam("VisitDate", ccsGet, NULL), $this);
        $this->FacilityName = new clsControl(ccsLabel, "FacilityName", "FacilityName", ccsText, "", CCGetRequestParam("FacilityName", ccsGet, NULL), $this);
        $this->VisitOutcomeName = new clsControl(ccsLabel, "VisitOutcomeName", "VisitOutcomeName", ccsText, "", CCGetRequestParam("VisitOutcomeName", ccsGet, NULL), $this);
        $this->NextVisit = new clsControl(ccsLabel, "NextVisit", "NextVisit", ccsDate, array("ShortDate"), CCGetRequestParam("NextVisit", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "visit_maint.php";
        $this->facilities_visit_visitout_TotalRecords = new clsControl(ccsLabel, "facilities_visit_visitout_TotalRecords", "facilities_visit_visitout_TotalRecords", ccsText, "", CCGetRequestParam("facilities_visit_visitout_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_VisitDate = new clsSorter($this->ComponentName, "Sorter_VisitDate", $FileName, $this);
        $this->Sorter_FacilityName = new clsSorter($this->ComponentName, "Sorter_FacilityName", $FileName, $this);
        $this->Sorter_VisitOutcomeName = new clsSorter($this->ComponentName, "Sorter_VisitOutcomeName", $FileName, $this);
        $this->Sorter_NextVisit = new clsSorter($this->ComponentName, "Sorter_NextVisit", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @56-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @56-CA599B67
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);

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
            $this->ControlsVisible["VisitDate"] = $this->VisitDate->Visible;
            $this->ControlsVisible["FacilityName"] = $this->FacilityName->Visible;
            $this->ControlsVisible["VisitOutcomeName"] = $this->VisitOutcomeName->Visible;
            $this->ControlsVisible["NextVisit"] = $this->NextVisit->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->VisitDate->SetValue($this->DataSource->VisitDate->GetValue());
                $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
                $this->VisitOutcomeName->SetValue($this->DataSource->VisitOutcomeName->GetValue());
                $this->NextVisit->SetValue($this->DataSource->NextVisit->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "VisitID", $this->DataSource->f("VisitID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->VisitDate->Show();
                $this->FacilityName->Show();
                $this->VisitOutcomeName->Show();
                $this->NextVisit->Show();
                $this->ImageLink1->Show();
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
        $this->facilities_visit_visitout_TotalRecords->Show();
        $this->Sorter_VisitDate->Show();
        $this->Sorter_FacilityName->Show();
        $this->Sorter_VisitOutcomeName->Show();
        $this->Sorter_NextVisit->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @56-91F451E2
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->VisitDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VisitOutcomeName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NextVisit->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Visits Class @56-FCB6E20C

class clsVisitsDataSource extends clsDBregistry_db {  //VisitsDataSource Class @56-8DCF6C41

//DataSource Variables @56-B8E71CF1
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $VisitDate;
    public $FacilityName;
    public $VisitOutcomeName;
    public $NextVisit;
//End DataSource Variables

//DataSourceClass_Initialize Event @56-70924C67
    function clsVisitsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Visits";
        $this->Initialize();
        $this->VisitDate = new clsField("VisitDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->VisitOutcomeName = new clsField("VisitOutcomeName", ccsText, "");
        
        $this->NextVisit = new clsField("NextVisit", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @56-F30391EB
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "visit.VisitDate desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_VisitDate" => array("VisitDate", "VisitDate"), 
            "Sorter_FacilityName" => array("FacilityName", ""), 
            "Sorter_VisitOutcomeName" => array("VisitOutcomeName", ""), 
            "Sorter_NextVisit" => array("NextVisit", "")));
    }
//End SetOrder Method

//Prepare Method @56-A2AC431C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "visit.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @56-478D2488
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (visit INNER JOIN facilities ON\n\n" .
        "visit.FacilityID = facilities.FacilityID) INNER JOIN visitoutcome ON\n\n" .
        "visit.VisitOutcomeID = visitoutcome.VisitOutcomeID";
        $this->SQL = "SELECT visit.*, FacilityName, VisitOutcomeName \n\n" .
        "FROM (visit INNER JOIN facilities ON\n\n" .
        "visit.FacilityID = facilities.FacilityID) INNER JOIN visitoutcome ON\n\n" .
        "visit.VisitOutcomeID = visitoutcome.VisitOutcomeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @56-FC791228
    function SetValues()
    {
        $this->VisitDate->SetDBValue(trim($this->f("VisitDate")));
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->VisitOutcomeName->SetDBValue($this->f("VisitOutcomeName"));
        $this->NextVisit->SetDBValue(trim($this->f("NextVisit")));
    }
//End SetValues Method

} //End VisitsDataSource Class @56-FCB6E20C

class clsRecordpatient_header { //patient_header Class @16-A6B1BB61

//Variables @16-9E315808

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

//Class_Initialize Event @16-13A522C8
    function clsRecordpatient_header($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record patient_header/Error";
        $this->DataSource = new clspatient_headerDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("3") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "3");
            $this->ComponentName = "patient_header";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->FirstName = new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", $Method, NULL), $this);
            $this->FamiliyName = new clsControl(ccsLabel, "FamiliyName", "FamiliyName", ccsText, "", CCGetRequestParam("FamiliyName", $Method, NULL), $this);
            $this->BirthDate = new clsControl(ccsLabel, "BirthDate", "BirthDate", ccsDate, array("ShortDate"), CCGetRequestParam("BirthDate", $Method, NULL), $this);
            $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
            $this->PatientID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->PatientID->Page = "patient_maint_fac.php";
        }
    }
//End Class_Initialize Event

//Initialize Method @16-93E88696
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPatientID"] = CCGetFromGet("PatientID", NULL);
    }
//End Initialize Method

//Validate Method @16-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @16-9E0ECF42
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->FamiliyName->Errors->Count());
        $errors = ($errors || $this->BirthDate->Errors->Count());
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @16-ED598703
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

//Operation Method @16-17DC9883
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

//Show Method @16-B20A0835
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

        $this->FirstName->Show();
        $this->FamiliyName->Show();
        $this->BirthDate->Show();
        $this->PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End patient_header Class @16-FCB6E20C

class clspatient_headerDataSource extends clsDBregistry_db {  //patient_headerDataSource Class @16-B6D0C3D1

//DataSource Variables @16-8B29B11B
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $FirstName;
    public $FamiliyName;
    public $BirthDate;
    public $PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @16-E626C781
    function clspatient_headerDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record patient_header/Error";
        $this->Initialize();
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->FamiliyName = new clsField("FamiliyName", ccsText, "");
        
        $this->BirthDate = new clsField("BirthDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @16-744C5837
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", $this->Parameters["urlPatientID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "PatientID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @16-2FACB139
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM patient {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @16-5D24272E
    function SetValues()
    {
        $this->FirstName->SetDBValue($this->f("GivenName"));
        $this->FamiliyName->SetDBValue($this->f("FamilyName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End patient_headerDataSource Class @16-FCB6E20C

class clsGriddelivery { //delivery class @159-99A521D2

//Variables @159-DEA8FF69

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
    public $Sorter_PregnancyRecNr;
    public $Sorter_DataDelivery;
    public $Sorter_FacilityName;
    public $Sorter_DeliveryMethodName;
//End Variables

//Class_Initialize Event @159-EFD6BD5B
    function clsGriddelivery($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "delivery";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid delivery";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsdeliveryDataSource($this);
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
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        $this->SorterName = CCGetParam("deliveryOrder", "");
        $this->SorterDirection = CCGetParam("deliveryDir", "");

        $this->PregnancyRecNr = new clsControl(ccsLabel, "PregnancyRecNr", "PregnancyRecNr", ccsText, "", CCGetRequestParam("PregnancyRecNr", ccsGet, NULL), $this);
        $this->DataDelivery = new clsControl(ccsLabel, "DataDelivery", "DataDelivery", ccsDate, array("ShortDate"), CCGetRequestParam("DataDelivery", ccsGet, NULL), $this);
        $this->FacilityName = new clsControl(ccsLabel, "FacilityName", "FacilityName", ccsText, "", CCGetRequestParam("FacilityName", ccsGet, NULL), $this);
        $this->DeliveryMethodName = new clsControl(ccsLabel, "DeliveryMethodName", "DeliveryMethodName", ccsText, "", CCGetRequestParam("DeliveryMethodName", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "delivery_maint.php";
        $this->Sorter_PregnancyRecNr = new clsSorter($this->ComponentName, "Sorter_PregnancyRecNr", $FileName, $this);
        $this->Sorter_DataDelivery = new clsSorter($this->ComponentName, "Sorter_DataDelivery", $FileName, $this);
        $this->Sorter_FacilityName = new clsSorter($this->ComponentName, "Sorter_FacilityName", $FileName, $this);
        $this->Sorter_DeliveryMethodName = new clsSorter($this->ComponentName, "Sorter_DeliveryMethodName", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @159-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @159-2C7D4010
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);

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
            $this->ControlsVisible["PregnancyRecNr"] = $this->PregnancyRecNr->Visible;
            $this->ControlsVisible["DataDelivery"] = $this->DataDelivery->Visible;
            $this->ControlsVisible["FacilityName"] = $this->FacilityName->Visible;
            $this->ControlsVisible["DeliveryMethodName"] = $this->DeliveryMethodName->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->PregnancyRecNr->SetValue($this->DataSource->PregnancyRecNr->GetValue());
                $this->DataDelivery->SetValue($this->DataSource->DataDelivery->GetValue());
                $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
                $this->DeliveryMethodName->SetValue($this->DataSource->DeliveryMethodName->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "DeliveryID", $this->DataSource->f("DeliveryID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "PatientID", $this->DataSource->f("PatientID"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "PregnancyID", $this->DataSource->f("PregnancyID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->PregnancyRecNr->Show();
                $this->DataDelivery->Show();
                $this->FacilityName->Show();
                $this->DeliveryMethodName->Show();
                $this->ImageLink1->Show();
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
        $this->Sorter_PregnancyRecNr->Show();
        $this->Sorter_DataDelivery->Show();
        $this->Sorter_FacilityName->Show();
        $this->Sorter_DeliveryMethodName->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @159-4D78EA75
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PregnancyRecNr->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataDelivery->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DeliveryMethodName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End delivery Class @159-FCB6E20C

class clsdeliveryDataSource extends clsDBregistry_db {  //deliveryDataSource Class @159-9FB0C359

//DataSource Variables @159-339B3FE7
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $PregnancyRecNr;
    public $DataDelivery;
    public $FacilityName;
    public $DeliveryMethodName;
//End DataSource Variables

//DataSourceClass_Initialize Event @159-407AE5E0
    function clsdeliveryDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid delivery";
        $this->Initialize();
        $this->PregnancyRecNr = new clsField("PregnancyRecNr", ccsText, "");
        
        $this->DataDelivery = new clsField("DataDelivery", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->DeliveryMethodName = new clsField("DeliveryMethodName", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @159-1BDAC647
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DataDelivery desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_PregnancyRecNr" => array("PregnancyRecNr", ""), 
            "Sorter_DataDelivery" => array("DataDelivery", ""), 
            "Sorter_FacilityName" => array("FacilityName", ""), 
            "Sorter_DeliveryMethodName" => array("DeliveryMethodName", "")));
    }
//End SetOrder Method

//Prepare Method @159-7EF44451
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "delivery.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @159-C580DA69
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (((pregnancy INNER JOIN delivery ON\n\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID) INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN deliverymethod ON\n\n" .
        "delivery.DeliveryMethodID = deliverymethod.DeliveryMethodID";
        $this->SQL = "SELECT * \n\n" .
        "FROM (((pregnancy INNER JOIN delivery ON\n\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID) INNER JOIN patient ON\n\n" .
        "pregnancy.PatientID = patient.PatientID) INNER JOIN facilities ON\n\n" .
        "delivery.FacilityID = facilities.FacilityID) INNER JOIN deliverymethod ON\n\n" .
        "delivery.DeliveryMethodID = deliverymethod.DeliveryMethodID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @159-B324B630
    function SetValues()
    {
        $this->PregnancyRecNr->SetDBValue($this->f("NumberOfDelivery"));
        $this->DataDelivery->SetDBValue(trim($this->f("DataDelivery")));
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->DeliveryMethodName->SetDBValue($this->f("DeliveryMethodName"));
    }
//End SetValues Method

} //End deliveryDataSource Class @159-FCB6E20C

class clsGridnewborn { //newborn class @203-101A564E

//Variables @203-0690242D

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

//Class_Initialize Event @203-DAD830DB
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
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        $this->SorterName = CCGetParam("newbornOrder", "");
        $this->SorterDirection = CCGetParam("newbornDir", "");

        $this->NewBornN = new clsControl(ccsLabel, "NewBornN", "NewBornN", ccsText, "", CCGetRequestParam("NewBornN", ccsGet, NULL), $this);
        $this->BirthDateTime = new clsControl(ccsLabel, "BirthDateTime", "BirthDateTime", ccsDate, array("ShortDate"), CCGetRequestParam("BirthDateTime", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "newborn_maint.php";
        $this->BirthDateTime1 = new clsControl(ccsLabel, "BirthDateTime1", "BirthDateTime1", ccsDate, array("ShortTime"), CCGetRequestParam("BirthDateTime1", ccsGet, NULL), $this);
        $this->Sex = new clsControl(ccsLabel, "Sex", "Sex", ccsInteger, "", CCGetRequestParam("Sex", ccsGet, NULL), $this);
        $this->newborn_TotalRecords = new clsControl(ccsLabel, "newborn_TotalRecords", "newborn_TotalRecords", ccsText, "", CCGetRequestParam("newborn_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_NewBornN = new clsSorter($this->ComponentName, "Sorter_NewBornN", $FileName, $this);
        $this->Sorter_Sex = new clsSorter($this->ComponentName, "Sorter_Sex", $FileName, $this);
        $this->Sorter_BirthDateTime = new clsSorter($this->ComponentName, "Sorter_BirthDateTime", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @203-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @203-82D64EC4
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);

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
            $this->ControlsVisible["BirthDateTime"] = $this->BirthDateTime->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            $this->ControlsVisible["BirthDateTime1"] = $this->BirthDateTime1->Visible;
            $this->ControlsVisible["Sex"] = $this->Sex->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->NewBornN->SetValue($this->DataSource->NewBornN->GetValue());
                $this->BirthDateTime->SetValue($this->DataSource->BirthDateTime->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "NewBornID", $this->DataSource->f("NewBornID"));
                $this->BirthDateTime1->SetValue($this->DataSource->BirthDateTime1->GetValue());
                $this->Sex->SetValue($this->DataSource->Sex->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->NewBornN->Show();
                $this->BirthDateTime->Show();
                $this->ImageLink1->Show();
                $this->BirthDateTime1->Show();
                $this->Sex->Show();
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

//GetErrors Method @203-8D48CDD3
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->NewBornN->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDateTime->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDateTime1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Sex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End newborn Class @203-FCB6E20C

class clsnewbornDataSource extends clsDBregistry_db {  //newbornDataSource Class @203-6B507A28

//DataSource Variables @203-2D73E9D2
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $NewBornN;
    public $BirthDateTime;
    public $BirthDateTime1;
    public $Sex;
//End DataSource Variables

//DataSourceClass_Initialize Event @203-8288F3C0
    function clsnewbornDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid newborn";
        $this->Initialize();
        $this->NewBornN = new clsField("NewBornN", ccsText, "");
        
        $this->BirthDateTime = new clsField("BirthDateTime", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->BirthDateTime1 = new clsField("BirthDateTime1", ccsDate, array("HH", ":", "nn", ":", "ss"));
        
        $this->Sex = new clsField("Sex", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @203-9D277426
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "newborn.BirthDate desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_NewBornN" => array("NewBornN", "BirthDate"), 
            "Sorter_Sex" => array("Sex", ""), 
            "Sorter_BirthDateTime" => array("BirthDateTime", "")));
    }
//End SetOrder Method

//Prepare Method @203-2FD3D622
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @203-E196E34C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (delivery INNER JOIN newborn ON\n\n" .
        "newborn.DeliveryID = delivery.DeliveryID) INNER JOIN pregnancy ON\n\n" .
        "delivery.PregnancyID = pregnancy.PregnancyID";
        $this->SQL = "SELECT newborn.*, pregnancy.* \n\n" .
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

//SetValues Method @203-7EA26CA6
    function SetValues()
    {
        $this->NewBornN->SetDBValue($this->f("NewBornN"));
        $this->BirthDateTime->SetDBValue(trim($this->f("BirthDate")));
        $this->BirthDateTime1->SetDBValue(trim($this->f("BirthTime")));
        $this->Sex->SetDBValue(trim($this->f("Sex")));
    }
//End SetValues Method

} //End newbornDataSource Class @203-FCB6E20C

class clsGriddepartment_facilities_hos { //department_facilities_hos class @254-A02B7F67

//Variables @254-88264F05

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
    public $Sorter_DepartmentDesc;
    public $Sorter_FacilityName;
    public $Sorter_AdmissionDate;
    public $Sorter_DischargeDate;
//End Variables

//Class_Initialize Event @254-46C6FCC8
    function clsGriddepartment_facilities_hos($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "department_facilities_hos";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid department_facilities_hos";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsdepartment_facilities_hosDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 100;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->Visible = (CCSecurityAccessCheck("1;3;2") == "success");
        $this->SorterName = CCGetParam("department_facilities_hosOrder", "");
        $this->SorterDirection = CCGetParam("department_facilities_hosDir", "");

        $this->DepartmentDesc = new clsControl(ccsLabel, "DepartmentDesc", "DepartmentDesc", ccsText, "", CCGetRequestParam("DepartmentDesc", ccsGet, NULL), $this);
        $this->FacilityName = new clsControl(ccsLabel, "FacilityName", "FacilityName", ccsText, "", CCGetRequestParam("FacilityName", ccsGet, NULL), $this);
        $this->AdmissionDate = new clsControl(ccsLabel, "AdmissionDate", "AdmissionDate", ccsDate, array("ShortDate"), CCGetRequestParam("AdmissionDate", ccsGet, NULL), $this);
        $this->DischargeDate = new clsControl(ccsLabel, "DischargeDate", "DischargeDate", ccsDate, array("ShortDate"), CCGetRequestParam("DischargeDate", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Page = "hospitalisation_maint.php";
        $this->department_facilities_hos_TotalRecords = new clsControl(ccsLabel, "department_facilities_hos_TotalRecords", "department_facilities_hos_TotalRecords", ccsText, "", CCGetRequestParam("department_facilities_hos_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_DepartmentDesc = new clsSorter($this->ComponentName, "Sorter_DepartmentDesc", $FileName, $this);
        $this->Sorter_FacilityName = new clsSorter($this->ComponentName, "Sorter_FacilityName", $FileName, $this);
        $this->Sorter_AdmissionDate = new clsSorter($this->ComponentName, "Sorter_AdmissionDate", $FileName, $this);
        $this->Sorter_DischargeDate = new clsSorter($this->ComponentName, "Sorter_DischargeDate", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @254-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @254-4EC36B59
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);

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
            $this->ControlsVisible["DepartmentDesc"] = $this->DepartmentDesc->Visible;
            $this->ControlsVisible["FacilityName"] = $this->FacilityName->Visible;
            $this->ControlsVisible["AdmissionDate"] = $this->AdmissionDate->Visible;
            $this->ControlsVisible["DischargeDate"] = $this->DischargeDate->Visible;
            $this->ControlsVisible["ImageLink1"] = $this->ImageLink1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->DepartmentDesc->SetValue($this->DataSource->DepartmentDesc->GetValue());
                $this->FacilityName->SetValue($this->DataSource->FacilityName->GetValue());
                $this->AdmissionDate->SetValue($this->DataSource->AdmissionDate->GetValue());
                $this->DischargeDate->SetValue($this->DataSource->DischargeDate->GetValue());
                $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ImageLink1->Parameters = CCAddParam($this->ImageLink1->Parameters, "HospitalisationID", $this->DataSource->f("HospitalisationID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->DepartmentDesc->Show();
                $this->FacilityName->Show();
                $this->AdmissionDate->Show();
                $this->DischargeDate->Show();
                $this->ImageLink1->Show();
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
        $this->department_facilities_hos_TotalRecords->Show();
        $this->Sorter_DepartmentDesc->Show();
        $this->Sorter_FacilityName->Show();
        $this->Sorter_AdmissionDate->Show();
        $this->Sorter_DischargeDate->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @254-57EA3242
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->DepartmentDesc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FacilityName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AdmissionDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DischargeDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End department_facilities_hos Class @254-FCB6E20C

class clsdepartment_facilities_hosDataSource extends clsDBregistry_db {  //department_facilities_hosDataSource Class @254-FD62E96A

//DataSource Variables @254-2273F00D
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $DepartmentDesc;
    public $FacilityName;
    public $AdmissionDate;
    public $DischargeDate;
//End DataSource Variables

//DataSourceClass_Initialize Event @254-9A3F0336
    function clsdepartment_facilities_hosDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid department_facilities_hos";
        $this->Initialize();
        $this->DepartmentDesc = new clsField("DepartmentDesc", ccsText, "");
        
        $this->FacilityName = new clsField("FacilityName", ccsText, "");
        
        $this->AdmissionDate = new clsField("AdmissionDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->DischargeDate = new clsField("DischargeDate", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @254-836C5D00
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "hospitalisation.AdmissionDate desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DepartmentDesc" => array("DepartmentDesc", ""), 
            "Sorter_FacilityName" => array("FacilityName", ""), 
            "Sorter_AdmissionDate" => array("AdmissionDate", ""), 
            "Sorter_DischargeDate" => array("DischargeDate", "")));
    }
//End SetOrder Method

//Prepare Method @254-2FD3D622
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], 0, false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @254-DD2BFDA0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM ((hospitalisation INNER JOIN pregnancy ON\n\n" .
        "hospitalisation.PregnancyID = pregnancy.PregnancyID) INNER JOIN department ON\n\n" .
        "department.DeptID = hospitalisation.DepartmentID) INNER JOIN facilities ON\n\n" .
        "facilities.FacilityID = hospitalisation.FacilityID";
        $this->SQL = "SELECT * \n\n" .
        "FROM ((hospitalisation INNER JOIN pregnancy ON\n\n" .
        "hospitalisation.PregnancyID = pregnancy.PregnancyID) INNER JOIN department ON\n\n" .
        "department.DeptID = hospitalisation.DepartmentID) INNER JOIN facilities ON\n\n" .
        "facilities.FacilityID = hospitalisation.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @254-BA700B56
    function SetValues()
    {
        $this->DepartmentDesc->SetDBValue($this->f("DepartmentDesc"));
        $this->FacilityName->SetDBValue($this->f("FacilityName"));
        $this->AdmissionDate->SetDBValue(trim($this->f("AdmissionDate")));
        $this->DischargeDate->SetDBValue(trim($this->f("DischargeDate")));
    }
//End SetValues Method

} //End department_facilities_hosDataSource Class @254-FCB6E20C

class clsRecordpatient_header1 { //patient_header1 Class @327-255000C3

//Variables @327-9E315808

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

//Class_Initialize Event @327-7EF19AF7
    function clsRecordpatient_header1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record patient_header1/Error";
        $this->DataSource = new clspatient_header1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1;2") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1;2");
            $this->ComponentName = "patient_header1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->PatientID = new clsControl(ccsLink, "PatientID", "PatientID", ccsInteger, "", CCGetRequestParam("PatientID", $Method, NULL), $this);
            $this->PatientID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->PatientID->Page = "patient_maint_fac.php";
        }
    }
//End Class_Initialize Event

//Initialize Method @327-93E88696
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPatientID"] = CCGetFromGet("PatientID", NULL);
    }
//End Initialize Method

//Validate Method @327-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @327-F1086292
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PatientID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @327-ED598703
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

//Operation Method @327-17DC9883
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

//Show Method @327-C595EAB2
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
                $this->PatientID->SetValue($this->DataSource->PatientID->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
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

        $this->PatientID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End patient_header1 Class @327-FCB6E20C

class clspatient_header1DataSource extends clsDBregistry_db {  //patient_header1DataSource Class @327-FBC4B77D

//DataSource Variables @327-8DA0A97C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $PatientID;
//End DataSource Variables

//DataSourceClass_Initialize Event @327-09840090
    function clspatient_header1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record patient_header1/Error";
        $this->Initialize();
        $this->PatientID = new clsField("PatientID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @327-744C5837
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPatientID", ccsInteger, "", "", $this->Parameters["urlPatientID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "PatientID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @327-2FACB139
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM patient {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @327-0754065F
    function SetValues()
    {
        $this->PatientID->SetDBValue(trim($this->f("PatientID")));
    }
//End SetValues Method

} //End patient_header1DataSource Class @327-FCB6E20C

class clsRecordHiddenSettings { //HiddenSettings Class @405-6355A6E4

//Variables @405-9E315808

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

//Class_Initialize Event @405-0CDD499E
    function clsRecordHiddenSettings($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record HiddenSettings/Error";
        $this->DataSource = new clsHiddenSettingsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "HiddenSettings";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ReminderNotifications = new clsControl(ccsLabel, "ReminderNotifications", $CCSLocales->GetText("ReminderNotifications"), ccsInteger, "", CCGetRequestParam("ReminderNotifications", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @405-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @405-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @405-49B78428
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ReminderNotifications->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @405-ED598703
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

//Operation Method @405-17DC9883
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

//Show Method @405-2DC45ED1
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
                $this->ReminderNotifications->SetValue($this->DataSource->ReminderNotifications->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ReminderNotifications->Errors->ToString());
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

        $this->ReminderNotifications->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End HiddenSettings Class @405-FCB6E20C

class clsHiddenSettingsDataSource extends clsDBregistry_db {  //HiddenSettingsDataSource Class @405-9482D496

//DataSource Variables @405-871A42ED
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $ReminderNotifications;
//End DataSource Variables

//DataSourceClass_Initialize Event @405-DDB39EEF
    function clsHiddenSettingsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record HiddenSettings/Error";
        $this->Initialize();
        $this->ReminderNotifications = new clsField("ReminderNotifications", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @405-D145E39E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = "( (notificationconfiguration.NotificationTypeID=1) )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @405-BD7EBBC8
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT Enabled \n\n" .
        "FROM pregnancy INNER JOIN notificationconfiguration ON\n\n" .
        "pregnancy.FacilityID = notificationconfiguration.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @405-F748154B
    function SetValues()
    {
        $this->ReminderNotifications->SetDBValue(trim($this->f("Enabled")));
    }
//End SetValues Method

} //End HiddenSettingsDataSource Class @405-FCB6E20C

class clsRecordHiddenSettings2 { //HiddenSettings2 Class @420-936AC0B2

//Variables @420-9E315808

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

//Class_Initialize Event @420-753ACFDA
    function clsRecordHiddenSettings2($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record HiddenSettings2/Error";
        $this->DataSource = new clsHiddenSettings2DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "HiddenSettings2";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->RecommendationNotifications = new clsControl(ccsLabel, "RecommendationNotifications", $CCSLocales->GetText("RecommendationNotifications"), ccsInteger, "", CCGetRequestParam("RecommendationNotifications", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @420-9FFA1581
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlPregnancyID"] = CCGetFromGet("PregnancyID", NULL);
    }
//End Initialize Method

//Validate Method @420-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @420-01EFA5B0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->RecommendationNotifications->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @420-ED598703
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

//Operation Method @420-17DC9883
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

//Show Method @420-2D1920B5
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
                $this->RecommendationNotifications->SetValue($this->DataSource->RecommendationNotifications->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->RecommendationNotifications->Errors->ToString());
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

        $this->RecommendationNotifications->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End HiddenSettings2 Class @420-FCB6E20C

class clsHiddenSettings2DataSource extends clsDBregistry_db {  //HiddenSettings2DataSource Class @420-988D0F40

//DataSource Variables @420-B09A2178
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $RecommendationNotifications;
//End DataSource Variables

//DataSourceClass_Initialize Event @420-4584F855
    function clsHiddenSettings2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record HiddenSettings2/Error";
        $this->Initialize();
        $this->RecommendationNotifications = new clsField("RecommendationNotifications", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @420-8BAB0361
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlPregnancyID", ccsInteger, "", "", $this->Parameters["urlPregnancyID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "pregnancy.PregnancyID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = "( notificationconfiguration.NotificationTypeID=2 )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @420-26F712D1
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT pregnancy.*, Enabled \n\n" .
        "FROM pregnancy INNER JOIN notificationconfiguration ON\n\n" .
        "pregnancy.FacilityID = notificationconfiguration.FacilityID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @420-ACBB93C6
    function SetValues()
    {
        $this->RecommendationNotifications->SetDBValue(trim($this->f("Enabled")));
    }
//End SetValues Method

} //End HiddenSettings2DataSource Class @420-FCB6E20C

//Initialize Page @1-570608E0
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
$TemplateFileName = "pregnancy_maint.html";
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

//Include events file @1-42734887
include_once("./pregnancy_maint_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-8553717C
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$pregnancy = new clsRecordpregnancy("", $MainPage);
$Visits = new clsGridVisits("", $MainPage);
$patient_header = new clsRecordpatient_header("", $MainPage);
$delivery = new clsGriddelivery("", $MainPage);
$newborn = new clsGridnewborn("", $MainPage);
$department_facilities_hos = new clsGriddepartment_facilities_hos("", $MainPage);
$patient_header1 = new clsRecordpatient_header1("", $MainPage);
$HiddenSettings = new clsRecordHiddenSettings("", $MainPage);
$HiddenSettings2 = new clsRecordHiddenSettings2("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->pregnancy = & $pregnancy;
$MainPage->Visits = & $Visits;
$MainPage->patient_header = & $patient_header;
$MainPage->delivery = & $delivery;
$MainPage->newborn = & $newborn;
$MainPage->department_facilities_hos = & $department_facilities_hos;
$MainPage->patient_header1 = & $patient_header1;
$MainPage->HiddenSettings = & $HiddenSettings;
$MainPage->HiddenSettings2 = & $HiddenSettings2;
$pregnancy->Initialize();
$Visits->Initialize();
$patient_header->Initialize();
$delivery->Initialize();
$newborn->Initialize();
$department_facilities_hos->Initialize();
$patient_header1->Initialize();
$HiddenSettings->Initialize();
$HiddenSettings2->Initialize();

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

//Execute Components @1-D35A301F
$topmenu->Operations();
$pregnancy->Operation();
$patient_header->Operation();
$patient_header1->Operation();
$HiddenSettings->Operation();
$HiddenSettings2->Operation();
//End Execute Components

//Go to destination page @1-F0EB716C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($pregnancy);
    unset($Visits);
    unset($patient_header);
    unset($delivery);
    unset($newborn);
    unset($department_facilities_hos);
    unset($patient_header1);
    unset($HiddenSettings);
    unset($HiddenSettings2);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-4412FBE8
$topmenu->Show();
$pregnancy->Show();
$Visits->Show();
$patient_header->Show();
$delivery->Show();
$newborn->Show();
$department_facilities_hos->Show();
$patient_header1->Show();
$HiddenSettings->Show();
$HiddenSettings2->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-BCB86B99
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($pregnancy);
unset($Visits);
unset($patient_header);
unset($delivery);
unset($newborn);
unset($department_facilities_hos);
unset($patient_header1);
unset($HiddenSettings);
unset($HiddenSettings2);
unset($Tpl);
//End Unload Page


?>
