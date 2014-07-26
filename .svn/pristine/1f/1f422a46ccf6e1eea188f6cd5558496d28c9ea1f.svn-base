<?php
//Include Common Files @1-EA7C7FB1
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "library.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-203FAEA1
include_once(RelativePath . "/topmenu.php");
//End Include Page implementation

//Initialize Page @1-89398F93
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
$TemplateFileName = "library.html";
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

//Include events file @1-0FA6DB5C
include_once("./library_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-234D9834
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$topmenu = new clstopmenu("", "topmenu", $MainPage);
$topmenu->Initialize();
$LinkUserManual = new clsControl(ccsLink, "LinkUserManual", "LinkUserManual", ccsText, "", CCGetRequestParam("LinkUserManual", ccsGet, NULL), $MainPage);
$LinkUserManual->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$LinkUserManual->Page = "libdocs/UserManual_en.pdf";
$LinkTermsOfUse = new clsControl(ccsLink, "LinkTermsOfUse", "LinkTermsOfUse", ccsText, "", CCGetRequestParam("LinkTermsOfUse", ccsGet, NULL), $MainPage);
$LinkTermsOfUse->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$LinkTermsOfUse->Page = "libdocs/TermsOfUse_en.pdf";
$Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "libdocs/pcform.pdf";
$MainPage->topmenu = & $topmenu;
$MainPage->LinkUserManual = & $LinkUserManual;
$MainPage->LinkTermsOfUse = & $LinkTermsOfUse;
$MainPage->Link1 = & $Link1;

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

//Execute Components @1-8E13D1F8
$topmenu->Operations();
//End Execute Components

//Go to destination page @1-C3A20B76
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    header("Location: " . $Redirect);
    $topmenu->Class_Terminate();
    unset($topmenu);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-660F4F13
$topmenu->Show();
$LinkUserManual->Show();
$LinkTermsOfUse->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-96C50CE0
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$topmenu->Class_Terminate();
unset($topmenu);
unset($Tpl);
//End Unload Page


?>
