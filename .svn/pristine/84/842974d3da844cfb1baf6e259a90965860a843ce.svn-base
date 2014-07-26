<?php
//Include Common Files @1-8000BA31
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "plogin_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



//Include Page implementation @27-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

class clsRecordlogin { //login Class @103-5F3E6EB9

//Variables @103-9E315808

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

//Class_Initialize Event @103-B2AAE5D7
    function clsRecordlogin($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record login/Error";
        $this->DataSource = new clsloginDataSource($this);
        $this->ds = & $this->DataSource;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "login";
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
            $this->password = new clsControl(ccsTextBox, "password", $CCSLocales->GetText("password"), ccsText, "", CCGetRequestParam("password", $Method, NULL), $this);
            $this->locale = new clsControl(ccsListBox, "locale", $CCSLocales->GetText("locale"), ccsText, "", CCGetRequestParam("locale", $Method, NULL), $this);
            $this->locale->DSType = dsTable;
            $this->locale->DataSource = new clsDBregistry_db();
            $this->locale->ds = & $this->locale->DataSource;
            $this->locale->DataSource->SQL = "SELECT * \n" .
"FROM languages {SQL_Where} {SQL_OrderBy}";
            list($this->locale->BoundColumn, $this->locale->TextColumn, $this->locale->DBFormat) = array("locale", "Language", "");
            $this->locale->Required = true;
            $this->password_Shadow = new clsControl(ccsHidden, "password_Shadow", "password_Shadow", ccsText, "", CCGetRequestParam("password_Shadow", $Method, NULL), $this);
            $this->LoginID = new clsControl(ccsTextBox, "LoginID", "LoginID", ccsInteger, "", CCGetRequestParam("LoginID", $Method, NULL), $this);
            $this->username = new clsControl(ccsLabel, "username", "username", ccsText, "", CCGetRequestParam("username", $Method, NULL), $this);
            $this->currentPwd = new clsControl(ccsTextBox, "currentPwd", "currentPwd", ccsText, "", CCGetRequestParam("currentPwd", $Method, NULL), $this);
            $this->repeatPassword = new clsControl(ccsTextBox, "repeatPassword", "repeatPassword", ccsText, "", CCGetRequestParam("repeatPassword", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @103-D3026D7D
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["sesUserID"] = CCGetSession("UserID", NULL);
    }
//End Initialize Method

//Validate Method @103-4D07981E
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(! (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$this->password->GetValue()))) {
            $this->password->Errors->addError($CCSLocales->GetText("PwdReq"));
        }
        $Validation = ($this->password->Validate() && $Validation);
        $Validation = ($this->locale->Validate() && $Validation);
        $Validation = ($this->password_Shadow->Validate() && $Validation);
        $Validation = ($this->LoginID->Validate() && $Validation);
        $Validation = ($this->currentPwd->Validate() && $Validation);
        $Validation = ($this->repeatPassword->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->password->Errors->Count() == 0);
        $Validation =  $Validation && ($this->locale->Errors->Count() == 0);
        $Validation =  $Validation && ($this->password_Shadow->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LoginID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->currentPwd->Errors->Count() == 0);
        $Validation =  $Validation && ($this->repeatPassword->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @103-A978429F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->password->Errors->Count());
        $errors = ($errors || $this->locale->Errors->Count());
        $errors = ($errors || $this->password_Shadow->Errors->Count());
        $errors = ($errors || $this->LoginID->Errors->Count());
        $errors = ($errors || $this->username->Errors->Count());
        $errors = ($errors || $this->currentPwd->Errors->Count());
        $errors = ($errors || $this->repeatPassword->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @103-ED598703
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

//Operation Method @103-517B5C36
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
            if($this->PressedButton == "Button_Update") {
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

//UpdateRow Method @103-2D26F96E
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->username->SetValue($this->username->GetValue(true));
        $this->DataSource->locale->SetValue($this->locale->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @103-10D9F405
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

        $this->locale->Prepare();

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
                $this->username->SetValue($this->DataSource->username->GetValue());
                if(!$this->FormSubmitted){
                    $this->password->SetValue($this->DataSource->password->GetValue());
                    $this->locale->SetValue($this->DataSource->locale->GetValue());
                    $this->LoginID->SetValue($this->DataSource->LoginID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->password->Errors->ToString());
            $Error = ComposeStrings($Error, $this->locale->Errors->ToString());
            $Error = ComposeStrings($Error, $this->password_Shadow->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LoginID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->username->Errors->ToString());
            $Error = ComposeStrings($Error, $this->currentPwd->Errors->ToString());
            $Error = ComposeStrings($Error, $this->repeatPassword->Errors->ToString());
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
        $this->password->Show();
        $this->locale->Show();
        $this->password_Shadow->Show();
        $this->LoginID->Show();
        $this->username->Show();
        $this->currentPwd->Show();
        $this->repeatPassword->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End login Class @103-FCB6E20C

class clsloginDataSource extends clsDBregistry_db {  //loginDataSource Class @103-38C9DCC1

//DataSource Variables @103-721DCE1C
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
    public $password;
    public $locale;
    public $password_Shadow;
    public $LoginID;
    public $username;
    public $currentPwd;
    public $repeatPassword;
//End DataSource Variables

//DataSourceClass_Initialize Event @103-F8097239
    function clsloginDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record login/Error";
        $this->Initialize();
        $this->password = new clsField("password", ccsText, "");
        
        $this->locale = new clsField("locale", ccsText, "");
        
        $this->password_Shadow = new clsField("password_Shadow", ccsText, "");
        
        $this->LoginID = new clsField("LoginID", ccsInteger, "");
        
        $this->username = new clsField("username", ccsText, "");
        
        $this->currentPwd = new clsField("currentPwd", ccsText, "");
        
        $this->repeatPassword = new clsField("repeatPassword", ccsText, "");
        

        $this->UpdateFields["username"] = array("Name" => "username", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["password"] = array("Name" => "password", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["locale"] = array("Name" => "locale", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @103-435BCEB3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sesUserID", ccsInteger, "", "", $this->Parameters["sesUserID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "LoginID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @103-C5652A24
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM login {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @103-D3A6AAAC
    function SetValues()
    {
        $this->password->SetDBValue($this->f("password"));
        $this->locale->SetDBValue($this->f("locale"));
        $this->LoginID->SetDBValue(trim($this->f("LoginID")));
        $this->username->SetDBValue($this->f("username"));
    }
//End SetValues Method

//Update Method @103-2734E64C
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["username"] = new clsSQLParameter("ctrlusername", ccsText, "", "", $this->username->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["password"] = new clsSQLParameter("expr128", ccsText, "", "", "{password}", NULL, false, $this->ErrorBlock);
        $this->cp["locale"] = new clsSQLParameter("ctrllocale", ccsText, "", "", $this->locale->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "sesUserID", ccsInteger, "", "", CCGetSession("UserID", NULL), NULL, false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["username"]->GetValue()) and !strlen($this->cp["username"]->GetText()) and !is_bool($this->cp["username"]->GetValue())) 
            $this->cp["username"]->SetValue($this->username->GetValue(true));
        if (!is_null($this->cp["password"]->GetValue()) and !strlen($this->cp["password"]->GetText()) and !is_bool($this->cp["password"]->GetValue())) 
            $this->cp["password"]->SetValue("{password}");
        if (!is_null($this->cp["locale"]->GetValue()) and !strlen($this->cp["locale"]->GetText()) and !is_bool($this->cp["locale"]->GetValue())) 
            $this->cp["locale"]->SetValue($this->locale->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "LoginID", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["username"]["Value"] = $this->cp["username"]->GetDBValue(true);
        $this->UpdateFields["password"]["Value"] = $this->cp["password"]->GetDBValue(true);
        $this->UpdateFields["locale"]["Value"] = $this->cp["locale"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("login", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End loginDataSource Class @103-FCB6E20C





//Initialize Page @1-56D9BFEF
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
$TemplateFileName = "plogin_maint.html";
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

//Include events file @1-1448FD00
include_once("./plogin_maint_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-B9880925
$DBregistry_db = new clsDBregistry_db();
$MainPage->Connections["registry_db"] = & $DBregistry_db;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$login = new clsRecordlogin("", $MainPage);
$MainPage->topmenu = & $topmenu;
$MainPage->login = & $login;
$login->Initialize();

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

//Execute Components @1-36B37F03
$topmenu->Operations();
$login->Operation();
//End Execute Components

//Go to destination page @1-C01D3D55
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBregistry_db->close();
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($login);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-57371019
$topmenu->Show();
$login->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2EA1BAF5
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBregistry_db->close();
$topmenu->Class_Terminate();
unset($topmenu);
unset($login);
unset($Tpl);
//End Unload Page


?>
