<?php
// //Events @1-F81417CB

//topmenu_AfterInitialize @1-8886CF70
function topmenu_AfterInitialize(& $sender)
{
    $topmenu_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $topmenu; //Compatibility
//End topmenu_AfterInitialize

//Custom Code @29-2A29BDB7
// -------------------------
	$topmenu->Eng->Parameters = CCAddParam($topmenu->Eng->Parameters, "locale", "en");
	$topmenu->Ukr->Parameters = CCAddParam($topmenu->Ukr->Parameters, "locale", "uk");
	$topmenu->Rus->Parameters = CCAddParam($topmenu->Rus->Parameters, "locale", "ru");
	
// -------------------------
//End Custom Code

//Close topmenu_AfterInitialize @1-EBE6E303
    return $topmenu_AfterInitialize;
}
//End Close topmenu_AfterInitialize


?>
