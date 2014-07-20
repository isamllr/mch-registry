<?php
//Include Common Files @1-881FC115
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "notifications_smsconfiguration_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



//Include Page implementation @10-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordnotificationsmsservice { //notificationsmsservice Class @18-FE345C43

//Variables @18-9E315808

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

//Class_Initialize Event @18-0690F85F
    function clsRecordnotificationsmsservice($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record notificationsmsservice/Error";
        $this->DataSource = new clsnotificationsmsserviceDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "notificationsmsservice";
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
            $this->NotificationProvider = new clsControl(ccsListBox, "NotificationProvider", $CCSLocales->GetText("nProvider"), ccsText, "", CCGetRequestParam("NotificationProvider", $Method, NULL), $this);
            $this->NotificationProvider->DSType = dsListOfValues;
            $this->NotificationProvider->Values = array(array("Clickatell", "Clickatell"), array("ecall", "ecall"));
            $this->NotificationProvider->Required = true;
            $this->NotificationProtocol = new clsControl(ccsListBox, "NotificationProtocol", $CCSLocales->GetText("nProtocol"), ccsText, "", CCGetRequestParam("NotificationProtocol", $Method, NULL), $this);
            $this->NotificationProtocol->DSType = dsListOfValues;
            $this->NotificationProtocol->Values = array(array("HTTP", "HTTP"), array("SOAP", "SOAP"), array("XML", "XML"));
            $this->NotificationProtocol->Required = true;
        }
    }
//End Class_Initialize Event

//Initialize Method @18-5D060BAC
    function Initialize()
    {

        if(!$this->Visible)
            return;

    }
//End Initialize Method

//Validate Method @18-BB4E1D99
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(! ((!strcmp($this->NotificationProvider->getvalue(),"ecall") && !strcmp($this->NotificationProtocol->getvalue(),"HTTP")) || !strcmp($this->NotificationProvider->getvalue(),"Clickatell"))) {
            $this->NotificationProtocol->Errors->addError("The selected Protocol is unavailable for this Provider.");
        }
        $Validation = ($this->NotificationProvider->Validate() && $Validation);
        $Validation = ($this->NotificationProtocol->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->NotificationProvider->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NotificationProtocol->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @18-61563EBE
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->NotificationProvider->Errors->Count());
        $errors = ($errors || $this->NotificationProtocol->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @18-ED598703
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

//Operation Method @18-1EE86421
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
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert)) {
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

//UpdateRow Method @18-527134FD
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->NotificationProvider->SetValue($this->NotificationProvider->GetValue(true));
        $this->DataSource->NotificationProtocol->SetValue($this->NotificationProtocol->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @18-7438E87F
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

        $this->NotificationProvider->Prepare();
        $this->NotificationProtocol->Prepare();

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
                if(!$this->FormSubmitted){
                    $this->NotificationProvider->SetValue($this->DataSource->NotificationProvider->GetValue());
                    $this->NotificationProtocol->SetValue($this->DataSource->NotificationProtocol->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->NotificationProvider->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NotificationProtocol->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->NotificationProvider->Show();
        $this->NotificationProtocol->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End notificationsmsservice Class @18-FCB6E20C

class clsnotificationsmsserviceDataSource extends clsDBregistry_db {  //notificationsmsserviceDataSource Class @18-6E06CC5A

//DataSource Variables @18-3743FD56
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;

    public $UpdateFields = array();

    // Datasource fields
    public $NotificationProvider;
    public $NotificationProtocol;
//End DataSource Variables

//DataSourceClass_Initialize Event @18-AFF4907D
    function clsnotificationsmsserviceDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record notificationsmsservice/Error";
        $this->Initialize();
        $this->NotificationProvider = new clsField("NotificationProvider", ccsText, "");
        
        $this->NotificationProtocol = new clsField("NotificationProtocol", ccsText, "");
        

        $this->UpdateFields["NotificationProvider"] = array("Name" => "NotificationProvider", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NotificationProtocol"] = array("Name" => "NotificationProtocol", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @18-4A690400
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = "( NotificationSMSServiceID=1 )";
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @18-9480346D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM notificationsmsservice {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @18-13741B73
    function SetValues()
    {
        $this->NotificationProvider->SetDBValue($this->f("NotificationProvider"));
        $this->NotificationProtocol->SetDBValue($this->f("NotificationProtocol"));
    }
//End SetValues Method

//Update Method @18-9B88DCB9
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["NotificationProvider"] = new clsSQLParameter("ctrlNotificationProvider", ccsText, "", "", $this->NotificationProvider->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NotificationProtocol"] = new clsSQLParameter("ctrlNotificationProtocol", ccsText, "", "", $this->NotificationProtocol->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["NotificationProvider"]->GetValue()) and !strlen($this->cp["NotificationProvider"]->GetText()) and !is_bool($this->cp["NotificationProvider"]->GetValue())) 
            $this->cp["NotificationProvider"]->SetValue($this->NotificationProvider->GetValue(true));
        if (!is_null($this->cp["NotificationProtocol"]->GetValue()) and !strlen($this->cp["NotificationProtocol"]->GetText()) and !is_bool($this->cp["NotificationProtocol"]->GetValue())) 
            $this->cp["NotificationProtocol"]->SetValue($this->NotificationProtocol->GetValue(true));
        $wp->Criterion[1] = "( NotificationSMSServiceID=1 )";
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["NotificationProvider"]["Value"] = $this->cp["NotificationProvider"]->GetDBValue(true);
        $this->UpdateFields["NotificationProtocol"]["Value"] = $this->cp["NotificationProtocol"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("notificationsmsservice", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End notificationsmsserviceDataSource Class @18-FCB6E20C

//DEL      function Show()
//DEL      {
//DEL          global $Tpl;
//DEL          global $CCSLocales;
//DEL          if(!$this->Visible) return;
//DEL  
//DEL          $this->RowNumber = 0;
//DEL  
//DEL          $this->DataSource->Parameters["app1"] = 1;
//DEL          $this->DataSource->Parameters["app"] = "EN";
//DEL  
//DEL          $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);
//DEL  
//DEL  
//DEL          $this->DataSource->Prepare();
//DEL          $this->DataSource->Open();
//DEL          $this->HasRecord = $this->DataSource->has_next_record();
//DEL          $this->IsEmpty = ! $this->HasRecord;
//DEL          $this->Attributes->Show();
//DEL  
//DEL          $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
//DEL          if(!$this->Visible) return;
//DEL  
//DEL          $GridBlock = "Grid " . $this->ComponentName;
//DEL          $ParentPath = $Tpl->block_path;
//DEL          $Tpl->block_path = $ParentPath . "/" . $GridBlock;
//DEL  
//DEL  
//DEL          if (!$this->IsEmpty) {
//DEL              $this->ControlsVisible["Day"] = $this->Day->Visible;
//DEL              $this->ControlsVisible["LanguageCode"] = $this->LanguageCode->Visible;
//DEL              $this->ControlsVisible["Text"] = $this->Text->Visible;
//DEL              while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
//DEL                  $this->RowNumber++;
//DEL                  if ($this->HasRecord) {
//DEL                      $this->DataSource->next_record();
//DEL                      $this->DataSource->SetValues();
//DEL                  }
//DEL                  $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
//DEL                  $this->Day->SetValue($this->DataSource->Day->GetValue());
//DEL                  $this->Day->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
//DEL                  $this->Day->Parameters = CCAddParam($this->Day->Parameters, "notification_NotificationID", $this->DataSource->f("NotificationID"));
//DEL                  $this->LanguageCode->SetValue($this->DataSource->LanguageCode->GetValue());
//DEL                  $this->Text->SetValue($this->DataSource->Text->GetValue());
//DEL                  $this->Attributes->SetValue("rowNumber", $this->RowNumber);
//DEL                  $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
//DEL                  $this->Attributes->Show();
//DEL                  $this->Day->Show();
//DEL                  $this->LanguageCode->Show();
//DEL                  $this->Text->Show();
//DEL                  $Tpl->block_path = $ParentPath . "/" . $GridBlock;
//DEL                  $Tpl->parse("Row", true);
//DEL              }
//DEL          }
//DEL          else { // Show NoRecords block if no records are found
//DEL              $this->Attributes->Show();
//DEL              $Tpl->parse("NoRecords", false);
//DEL          }
//DEL  
//DEL          $errors = $this->GetErrors();
//DEL          if(strlen($errors))
//DEL          {
//DEL              $Tpl->replaceblock("", $errors);
//DEL              $Tpl->block_path = $ParentPath;
//DEL              return;
//DEL          }
//DEL          $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
//DEL          $this->Navigator->PageSize = $this->PageSize;
//DEL          if ($this->DataSource->RecordsCount == "CCS not counted")
//DEL              $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
//DEL          else
//DEL              $this->Navigator->TotalPages = $this->DataSource->PageCount();
//DEL          if ($this->Navigator->TotalPages <= 1) {
//DEL              $this->Navigator->Visible = false;
//DEL          }
//DEL          $this->notification_notification1_Insert->Show();
//DEL          $this->notification_notification1_TotalRecords->Show();
//DEL          $this->Navigator->Show();
//DEL          $Tpl->parse();
//DEL          $Tpl->block_path = $ParentPath;
//DEL          $this->DataSource->close();
//DEL      }

//DEL      function Prepare()
//DEL      {
//DEL          global $CCSLocales;
//DEL          global $DefaultDateFormat;
//DEL          $this->wp = new clsSQLParameters($this->ErrorBlock);
//DEL          $this->wp->AddParameter("1", "urlNotificationID", ccsInteger, "", "", $this->Parameters["urlNotificationID"], "", false);
//DEL          $this->AllParametersSet = $this->wp->AllParamsSet();
//DEL          $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "notificationtext.NotificationID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
//DEL          $this->wp->Criterion[2] = "( notificationtext.LanguageCode='UK' )";
//DEL          $this->Where = $this->wp->opAND(
//DEL               false, 
//DEL               $this->wp->Criterion[1], 
//DEL               $this->wp->Criterion[2]);
//DEL      }

//DEL      function Update()
//DEL      {
//DEL          global $CCSLocales;
//DEL          global $DefaultDateFormat;
//DEL          $this->CmdExecution = true;
//DEL          $this->cp["Text"] = new clsSQLParameter("ctrlText", ccsText, "", "", $this->Text->GetValue(true), NULL, false, $this->ErrorBlock);
//DEL          $this->cp["Day"] = new clsSQLParameter("ctrlDay", ccsInteger, "", "", $this->Day->GetValue(true), NULL, false, $this->ErrorBlock);
//DEL          $wp = new clsSQLParameters($this->ErrorBlock);
//DEL          $wp->AddParameter("1", "urlNotificationID", ccsInteger, "", "", CCGetFromGet("NotificationID", NULL), "", true);
//DEL          if(!$wp->AllParamsSet()) {
//DEL              $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
//DEL          }
//DEL          $wp->AddParameter("2", "urlNotificationID", ccsInteger, "", "", CCGetFromGet("NotificationID", NULL), "", false);
//DEL          if(!$wp->AllParamsSet()) {
//DEL              $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
//DEL          }
//DEL          $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
//DEL          if (!is_null($this->cp["Text"]->GetValue()) and !strlen($this->cp["Text"]->GetText()) and !is_bool($this->cp["Text"]->GetValue())) 
//DEL              $this->cp["Text"]->SetValue($this->Text->GetValue(true));
//DEL          if (!is_null($this->cp["Day"]->GetValue()) and !strlen($this->cp["Day"]->GetText()) and !is_bool($this->cp["Day"]->GetValue())) 
//DEL              $this->cp["Day"]->SetValue($this->Day->GetValue(true));
//DEL          $wp->Criterion[1] = $wp->Operation(opEqual, "NotificationID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),true);
//DEL          $wp->Criterion[2] = "( LanguageCode='UK' )";
//DEL          $wp->Criterion[3] = "( NType=1 )";
//DEL          $wp->Criterion[4] = $wp->Operation(opEqual, "NotificationID", $wp->GetDBValue("4"), $this->ToSQL($wp->GetDBValue("4"), ccsInteger),false);
//DEL          $Where = $wp->opAND(
//DEL               false, $wp->opAND(
//DEL               false, $wp->opAND(
//DEL               false, 
//DEL               $wp->Criterion[1], 
//DEL               $wp->Criterion[2]), 
//DEL               $wp->Criterion[3]), 
//DEL               $wp->Criterion[4]);
//DEL          $this->UpdateFields["Text"]["Value"] = $this->cp["Text"]->GetDBValue(true);
//DEL          $this->UpdateFields["Day"]["Value"] = $this->cp["Day"]->GetDBValue(true);
//DEL          $this->SQL = CCBuildUpdate("notificationtext", $this->UpdateFields, $this);
//DEL          $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
//DEL          $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
//DEL          if($this->Errors->Count() == 0 && $this->CmdExecution) {
//DEL              $this->query($this->SQL);
//DEL              $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
//DEL          }
//DEL      }

//Initialize Page @1-B2DD72EC
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
$TemplateFileName = "notifications_smsconfiguration_maint.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Check SSL @1-E30DD771
CCCheckSSL();
//End Check SSL

//Authenticate User @1-35F89DFE
CCSecurityRedirect("1", SecureURL . "" .  "noaccess.php");
//End Authenticate User

//Include events file @1-6F044BA6
include_once("./notifications_smsconfiguration_maint_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-7D272E59
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$notificationsmsservice = new clsRecordnotificationsmsservice("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->notificationsmsservice = & $notificationsmsservice;
$notificationsmsservice->Initialize();

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

//Execute Components @1-4DB47F27
$topmenu->Operations();
$notificationsmsservice->Operation();
//End Execute Components

//Go to destination page @1-DDBDB192
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($notificationsmsservice);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B6A2493E
$topmenu->Show();
$notificationsmsservice->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-66F6FB86
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($notificationsmsservice);
unset($Tpl);
//End Unload Page


?>
