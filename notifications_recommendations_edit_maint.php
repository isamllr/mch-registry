<?php
//Include Common Files @1-A24C8DF7
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "notifications_recommendations_edit_maint.php");
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

//Variables @78-F99FC1DE

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
    public $Sorter_Day;
    public $Sorter_Text;
//End Variables

//Class_Initialize Event @78-28888FEE
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

        $this->NotificationID = new clsControl(ccsLink, "NotificationID", "NotificationID", ccsInteger, "", CCGetRequestParam("NotificationID", ccsGet, NULL), $this);
        $this->NotificationID->Page = "notifications_recommendations_edit_maint.php";
        $this->Day = new clsControl(ccsLabel, "Day", "Day", ccsInteger, "", CCGetRequestParam("Day", ccsGet, NULL), $this);
        $this->Text = new clsControl(ccsLabel, "Text", "Text", ccsText, "", CCGetRequestParam("Text", ccsGet, NULL), $this);
        $this->Grid1_Insert = new clsControl(ccsLink, "Grid1_Insert", "Grid1_Insert", ccsText, "", CCGetRequestParam("Grid1_Insert", ccsGet, NULL), $this);
        $this->Grid1_Insert->Parameters = CCGetQueryString("QueryString", array("NotificationID", "ccsForm"));
        $this->Grid1_Insert->Page = "notifications_recommendations_edit_maint.php";
        $this->Sorter_NotificationID = new clsSorter($this->ComponentName, "Sorter_NotificationID", $FileName, $this);
        $this->Sorter_Day = new clsSorter($this->ComponentName, "Sorter_Day", $FileName, $this);
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

//Show Method @78-98066B16
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
            $this->ControlsVisible["Day"] = $this->Day->Visible;
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
                $this->Day->SetValue($this->DataSource->Day->GetValue());
                $this->Text->SetValue($this->DataSource->Text->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->NotificationID->Show();
                $this->Day->Show();
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
        $this->Grid1_Insert->Show();
        $this->Sorter_NotificationID->Show();
        $this->Sorter_Day->Show();
        $this->Sorter_Text->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @78-EDF9F9DE
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->NotificationID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Day->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Text->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End notificationgrid Class @78-FCB6E20C

class clsnotificationgridDataSource extends clsDBregistry_db {  //notificationgridDataSource Class @78-FBF82C59

//DataSource Variables @78-290A0D01
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $NotificationID;
    public $Day;
    public $Text;
//End DataSource Variables

//DataSourceClass_Initialize Event @78-59FFB0C3
    function clsnotificationgridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid notificationgrid";
        $this->Initialize();
        $this->NotificationID = new clsField("NotificationID", ccsInteger, "");
        
        $this->Day = new clsField("Day", ccsInteger, "");
        
        $this->Text = new clsField("Text", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @78-BD0D277B
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "Day";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_NotificationID" => array("NotificationID", ""), 
            "Sorter_Day" => array("Day", ""), 
            "Sorter_Text" => array("Text", "")));
    }
//End SetOrder Method

//Prepare Method @78-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @78-3AF8CD62
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM notificationtext INNER JOIN notification ON\n" .
        "notificationtext.NotificationID = notification.NotificationID\n" .
        "WHERE ( notificationtext.LanguageCode='UK' )\n" .
        "AND ( notification.NotificationTypeID=1 )";
        $this->SQL = "SELECT notification.NotificationID, notification.Day, notificationtext.Text \n" .
        "FROM notificationtext INNER JOIN notification ON\n" .
        "notificationtext.NotificationID = notification.NotificationID\n" .
        "WHERE ( notificationtext.LanguageCode='UK' )\n" .
        "AND ( notification.NotificationTypeID=1 )  {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @78-A9912DB3
    function SetValues()
    {
        $this->NotificationID->SetDBValue(trim($this->f("NotificationID")));
        $this->Day->SetDBValue(trim($this->f("Day")));
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

//Class_Initialize Event @93-1C1262F5
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
            $this->InsertAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->UpdateAllowed = CCUserInGroups(CCGetGroupID(), "1");
            $this->DeleteAllowed = CCUserInGroups(CCGetGroupID(), "1");
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
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->IDLabel = new clsControl(ccsLabel, "IDLabel", "IDLabel", ccsInteger, "", CCGetRequestParam("IDLabel", $Method, NULL), $this);
            $this->Day = new clsControl(ccsTextBox, "Day", "Day", ccsInteger, "", CCGetRequestParam("Day", $Method, NULL), $this);
            $this->Day->Required = true;
            $this->Text = new clsControl(ccsTextArea, "Text", "Text", ccsText, "", CCGetRequestParam("Text", $Method, NULL), $this);
            $this->Text->Required = true;
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

//Validate Method @93-8E13093F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->Day->GetText()) && !preg_match ("/^[1-9]\d*$/", $this->Day->GetText())) {
            $this->Day->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", "Day"));
        }
        $Validation = ($this->Day->Validate() && $Validation);
        $Validation = ($this->Text->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Text->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @93-16840701
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->IDLabel->Errors->Count());
        $errors = ($errors || $this->Day->Errors->Count());
        $errors = ($errors || $this->Text->Errors->Count());
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

//Operation Method @93-E0D63857
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
        if($this->PressedButton == "Button_Delete" && $this->DeleteAllowed) {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
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
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @93-7820DE47
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Text->SetValue($this->Text->GetValue(true));
        $this->DataSource->Day->SetValue($this->Day->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @93-E4648454
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Day->SetValue($this->Day->GetValue(true));
        $this->DataSource->Text->SetValue($this->Text->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @93-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @93-19CF3211
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
                $this->IDLabel->SetValue($this->DataSource->IDLabel->GetValue());
                if(!$this->FormSubmitted){
                    $this->Day->SetValue($this->DataSource->Day->GetValue());
                    $this->Text->SetValue($this->DataSource->Text->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if ($this->Day->GetValue() < 0 )
             $this->Day->Text = CCFormatNumber($this->Day->GetValue(), array(False, 0, Null, "", True, "(", ")", 1, True, ""));
        else
             $this->Day->Text = CCFormatNumber($this->Day->GetValue(), array(False, 0, Null, "", False, "", "", 1, True, ""));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->IDLabel->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Text->Errors->ToString());
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
        $this->IDLabel->Show();
        $this->Day->Show();
        $this->Text->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End notificationtextedit Class @93-FCB6E20C

class clsnotificationtexteditDataSource extends clsDBregistry_db {  //notificationtexteditDataSource Class @93-4878A966

//DataSource Variables @93-C4B7CF56
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


    // Datasource fields
    public $IDLabel;
    public $Day;
    public $Text;
//End DataSource Variables

//DataSourceClass_Initialize Event @93-B1136DCB
    function clsnotificationtexteditDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record notificationtextedit/Error";
        $this->Initialize();
        $this->IDLabel = new clsField("IDLabel", ccsInteger, "");
        
        $this->Day = new clsField("Day", ccsInteger, "");
        
        $this->Text = new clsField("Text", ccsText, "");
        

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

//Open Method @93-46A6BC97
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM notificationtext INNER JOIN notification ON\n\n" .
        "notificationtext.NotificationID = notification.NotificationID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @93-1F07479B
    function SetValues()
    {
        $this->IDLabel->SetDBValue(trim($this->f("NotificationID")));
        $this->Day->SetDBValue(trim($this->f("Day")));
        $this->Text->SetDBValue($this->f("Text"));
    }
//End SetValues Method

//Insert Method @93-2EE9E2CC
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["Text"] = new clsSQLParameter("ctrlText", ccsText, "", "", $this->Text->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Day"] = new clsSQLParameter("ctrlDay", ccsInteger, "", "", $this->Day->GetValue(true), 1, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["Text"]->GetValue()) and !strlen($this->cp["Text"]->GetText()) and !is_bool($this->cp["Text"]->GetValue())) 
            $this->cp["Text"]->SetValue($this->Text->GetValue(true));
        if (!is_null($this->cp["Day"]->GetValue()) and !strlen($this->cp["Day"]->GetText()) and !is_bool($this->cp["Day"]->GetValue())) 
            $this->cp["Day"]->SetValue($this->Day->GetValue(true));
        if (!strlen($this->cp["Day"]->GetText()) and !is_bool($this->cp["Day"]->GetValue(true))) 
            $this->cp["Day"]->SetText(1);
        $this->SQL = "CALL insertnotification('" . $this->SQLValue($this->cp["Text"]->GetDBValue(), ccsText) . "', " . $this->SQLValue($this->cp["Day"]->GetDBValue(), ccsInteger) . ", 1, 'UK')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @93-6D9C8376
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["NotificationID"] = new clsSQLParameter("urlNotificationID", ccsText, "", "", CCGetFromGet("NotificationID", NULL), "", false, $this->ErrorBlock);
        $this->cp["Day"] = new clsSQLParameter("ctrlDay", ccsText, "", "", $this->Day->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Text"] = new clsSQLParameter("ctrlText", ccsText, "", "", $this->Text->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["NotificationID"]->GetValue()) and !strlen($this->cp["NotificationID"]->GetText()) and !is_bool($this->cp["NotificationID"]->GetValue())) 
            $this->cp["NotificationID"]->SetText(CCGetFromGet("NotificationID", NULL));
        if (!is_null($this->cp["Day"]->GetValue()) and !strlen($this->cp["Day"]->GetText()) and !is_bool($this->cp["Day"]->GetValue())) 
            $this->cp["Day"]->SetValue($this->Day->GetValue(true));
        if (!is_null($this->cp["Text"]->GetValue()) and !strlen($this->cp["Text"]->GetText()) and !is_bool($this->cp["Text"]->GetValue())) 
            $this->cp["Text"]->SetValue($this->Text->GetValue(true));
        $this->SQL = "UPDATE notification n inner join notificationtext nt on n.NotificationID = nt.NotificationID\n" .
        "   set n.Day = " . $this->SQLValue($this->cp["Day"]->GetDBValue(), ccsText) . ",\n" .
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

//Delete Method @93-24D50DCD
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["NotificationID"] = new clsSQLParameter("urlNotificationID", ccsText, "", "", CCGetFromGet("NotificationID", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["NotificationID"]->GetValue()) and !strlen($this->cp["NotificationID"]->GetText()) and !is_bool($this->cp["NotificationID"]->GetValue())) 
            $this->cp["NotificationID"]->SetText(CCGetFromGet("NotificationID", NULL));
        $this->SQL = "DELETE \n" .
        "    notificationtext.*\n" .
        "    FROM notificationtext\n" .
        "    WHERE notificationtext.notificationID=" . $this->SQLValue($this->cp["NotificationID"]->GetDBValue(), ccsText) . " AND notificationtext.LanguageCode='UK'";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

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

//Initialize Page @1-CA8F96BF
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
$TemplateFileName = "notifications_recommendations_edit_maint.html";
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

//Include events file @1-B84D5E0A
include_once("./notifications_recommendations_edit_maint_events.php");
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
