<?php
//BindEvents Method @1-3429120C
function BindEvents()
{
    global $LinkUserManual;
    global $LinkTermsOfUse;
    $LinkUserManual->CCSEvents["BeforeShow"] = "LinkUserManual_BeforeShow";
    $LinkTermsOfUse->CCSEvents["BeforeShow"] = "LinkTermsOfUse_BeforeShow";
}
//End BindEvents Method

//LinkUserManual_BeforeShow @6-3CDAFD76
function LinkUserManual_BeforeShow(& $sender)
{
    $LinkUserManual_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $LinkUserManual; //Compatibility
//End LinkUserManual_BeforeShow

//Custom Code @7-2A29BDB7
// -------------------------
    $ManualLocale = $LinkUserManual->GetLink();
	$ManualLocale = str_replace("_en", "_" . CCGetSession("locale"), $ManualLocale);
	$LinkUserManual->SetLink($ManualLocale);
// -------------------------
//End Custom Code

//Close LinkUserManual_BeforeShow @6-4AEB4726
    return $LinkUserManual_BeforeShow;
}
//End Close LinkUserManual_BeforeShow

//LinkTermsOfUse_BeforeShow @8-B1B8115E
function LinkTermsOfUse_BeforeShow(& $sender)
{
    $LinkTermsOfUse_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $LinkTermsOfUse; //Compatibility
//End LinkTermsOfUse_BeforeShow

//Custom Code @9-2A29BDB7
// -------------------------
    $TermsLocale = $LinkTermsOfUse->GetLink();
	$TermsLocale = str_replace("_en", "_" . CCGetSession("locale"), $TermsLocale);
	$LinkTermsOfUse->SetLink($TermsLocale);
// -------------------------
//End Custom Code

//Close LinkTermsOfUse_BeforeShow @8-E289E6CF
    return $LinkTermsOfUse_BeforeShow;
}
//End Close LinkTermsOfUse_BeforeShow
?>
