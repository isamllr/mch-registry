<?php
//Include Common Files @1-95D2A9AF
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "notifications_edit_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



//Include Page implementation @10-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

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

class clsGridnotificationgrid { //notificationgrid class @78-4E164D78

//Variables @78-B1687E48

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
    public $Sorter_NotificationID;
    public $Sorter_Text;
//End Variables

//Class_Initialize Event @78-B66B6964
    function clsGridnotificationgrid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "notificationgrid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid notificationgrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsnotificationgridDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 30;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("notificationgridOrder", "");
        $this->SorterDirection = CCGetParam("notificationgridDir", "");

        $this->NotificationID = new clsControl(ccsLink, "NotificationID", "NotificationID", ccsText, "", CCGetRequestParam("NotificationID", ccsGet, NULL), $this);
        $this->NotificationID->Page = "notifications_edit_maint.php";
        $this->Text = new clsControl(ccsLabel, "Text", "Text", ccsText, "", CCGetRequestParam("Text", ccsGet, NULL), $this);
        $this->Sorter_NotificationID = new clsSorter($this->ComponentName, "Sorter_NotificationID", $FileName, $this);
        $this->Sorter_Text = new clsSorter($this->ComponentName, "Sorter_Text", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @78-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @78-790D98A4
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;


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
            $this->ControlsVisible["NotificationID"] = $this->NotificationID->Visible;
            $this->ControlsVisible["Text"] = $this->Text->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->NotificationID->SetValue($this->DataSource->NotificationID->GetValue());
                $this->NotificationID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->NotificationID->Parameters = CCAddParam($this->NotificationID->Parameters, "NotificationID", $this->DataSource->f("NotificationID"));
                $this->Text->SetValue($this->DataSource->Text->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->NotificationID->Show();
                $this->Text->Show();
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
        $this->Sorter_NotificationID->Show();
        $this->Sorter_Text->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @78-1265C8D1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->NotificationID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Text->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End notificationgrid Class @78-FCB6E20C

class clsnotificationgridDataSource extends clsDBregistry_db {  //notificationgridDataSource Class @78-FBF82C59

//DataSource Variables @78-E9422BFE
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $NotificationID;
    public $Text;
//End DataSource Variables

//DataSourceClass_Initialize Event @78-5691A076
    function clsnotificationgridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid notificationgrid";
        $this->Initialize();
        $this->NotificationID = new clsField("NotificationID", ccsText, "");
        
        $this->Text = new clsField("Text", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @78-0468DAE2
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "notification.Day";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_NotificationID" => array("NotificationID", ""), 
            "Sorter_Text" => array("Text", "")));
    }
//End SetOrder Method

//Prepare Method @78-8B6EFF2F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->Criterion[1] = "( notificationtext.LanguageCode='UK' )";
        $this->wp->Criterion[2] = "( notification.NotificationTypeID>1 )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @78-F1570EFE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM (notification INNER JOIN notificationtext ON\n\n" .
        "notificationtext.NotificationID = notification.NotificationID) INNER JOIN notificationtype ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID";
        $this->SQL = "SELECT notification.*, TypeName, Text \n\n" .
        "FROM (notification INNER JOIN notificationtext ON\n\n" .
        "notificationtext.NotificationID = notification.NotificationID) INNER JOIN notificationtype ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @78-A35B0AD3
    function SetValues()
    {
        $this->NotificationID->SetDBValue($this->f("TypeName"));
        $this->Text->SetDBValue($this->f("Text"));
    }
//End SetValues Method

} //End notificationgridDataSource Class @78-FCB6E20C

class clsRecordnotificationtextedit { //notificationtextedit Class @93-D1B1957A

//Variables @93-9E315808

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

//Class_Initialize Event @93-CF9BF7F3
    function clsRecordnotificationtextedit($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record notificationtextedit/Error";
        $this->DataSource = new clsnotificationtexteditDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        $this->Visible = (CCSecurityAccessCheck("1") == "success");
        if($this->Visible)
        {
            $this->ReadAllowed = $this->ReadAllowed && CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->ComponentName = "notificationtextedit";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Text = new clsControl(ccsTextArea, "Text", "Text", ccsText, "", CCGetRequestParam("Text", $Method, NULL), $this);
            $this->Text->Required = true;
            $this->TypeName = new clsControl(ccsLabel, "TypeName", "TypeName", ccsText, "", CCGetRequestParam("TypeName", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @93-68EBA268
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlNotificationID"] = CCGetFromGet("NotificationID", NULL);
    }
//End Initialize Method

//Validate Method @93-86BBE906
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Text->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Text->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @93-ACE55797
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Text->Errors->Count());
        $errors = ($errors || $this->TypeName->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @93-ED598703
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

//Operation Method @93-8DB78E97
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
            $this->PressedButton = $this->EditMode ? "Button_Update" : "";
            if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Update" && $this->UpdateAllowed) {
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

//UpdateRow Method @93-F55B5278
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Text->SetValue($this->Text->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @93-B14F6D95
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
                $this->TypeName->SetValue($this->DataSource->TypeName->GetValue());
                if(!$this->FormSubmitted){
                    $this->Text->SetValue($this->DataSource->Text->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Text->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TypeName->Errors->ToString());
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
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Update->Show();
        $this->Text->Show();
        $this->TypeName->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End notificationtextedit Class @93-FCB6E20C

class clsnotificationtexteditDataSource extends clsDBregistry_db {  //notificationtexteditDataSource Class @93-4878A966

//DataSource Variables @93-22FDB2A4
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $Text;
    public $TypeName;
//End DataSource Variables

//DataSourceClass_Initialize Event @93-0B11F331
    function clsnotificationtexteditDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record notificationtextedit/Error";
        $this->Initialize();
        $this->Text = new clsField("Text", ccsText, "");
        
        $this->TypeName = new clsField("TypeName", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @93-05426E84
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlNotificationID", ccsInteger, "", "", $this->Parameters["urlNotificationID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "notificationtext.NotificationID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = "( notificationtext.LanguageCode='UK' )";
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @93-B6188C14
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT notificationtext.*, notification.*, TypeName \n\n" .
        "FROM (notification INNER JOIN notificationtext ON\n\n" .
        "notificationtext.NotificationID = notification.NotificationID) INNER JOIN notificationtype ON\n\n" .
        "notification.NotificationTypeID = notificationtype.NotificationTypeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @93-4627BF85
    function SetValues()
    {
        $this->Text->SetDBValue($this->f("Text"));
        $this->TypeName->SetDBValue($this->f("TypeName"));
    }
//End SetValues Method

//Update Method @93-01E0E64B
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["NotificationID"] = new clsSQLParameter("urlNotificationID", ccsText, "", "", CCGetFromGet("NotificationID", NULL), "", false, $this->ErrorBlock);
        $this->cp["Text"] = new clsSQLParameter("ctrlText", ccsText, "", "", $this->Text->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["NotificationID"]->GetValue()) and !strlen($this->cp["NotificationID"]->GetText()) and !is_bool($this->cp["NotificationID"]->GetValue())) 
            $this->cp["NotificationID"]->SetText(CCGetFromGet("NotificationID", NULL));
        if (!is_null($this->cp["Text"]->GetValue()) and !strlen($this->cp["Text"]->GetText()) and !is_bool($this->cp["Text"]->GetValue())) 
            $this->cp["Text"]->SetValue($this->Text->GetValue(true));
        $this->SQL = "UPDATE notification n inner join notificationtext nt on n.NotificationID = nt.NotificationID\n" .
        "   set n.Day = null,\n" .
        "nt.Text = '" . $this->SQLValue($this->cp["Text"]->GetDBValue(), ccsText) . "'\n" .
        "  where nt.LanguageCode = 'UK' \n" .
        "AND n.notificationID=" . $this->SQLValue($this->cp["NotificationID"]->GetDBValue(), ccsText) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

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

} //End notificationtexteditDataSource Class @93-FCB6E20C

//Initialize Page @1-1721FA77
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
$TemplateFileName = "notifications_edit_maint.html";
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

//Include events file @1-54B67B8B
include_once("./notifications_edit_maint_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-97D11065
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$notificationgrid = new clsGridnotificationgrid("", $MainPage);
$notificationtextedit = new clsRecordnotificationtextedit("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->notificationgrid = & $notificationgrid;
$MainPage->notificationtextedit = & $notificationtextedit;
$notificationgrid->Initialize();
$notificationtextedit->Initialize();

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

//Execute Components @1-0848EE08
$topmenu->Operations();
$notificationtextedit->Operation();
//End Execute Components

//Go to destination page @1-968B13F6
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($notificationgrid);
    unset($notificationtextedit);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A4DF69FA
$topmenu->Show();
$notificationgrid->Show();
$notificationtextedit->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-7FE9A6BE
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($notificationgrid);
unset($notificationtextedit);
unset($Tpl);
//End Unload Page


?>
