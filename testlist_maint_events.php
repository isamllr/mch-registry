<?php
//BindEvents Method @1-8880E854
function BindEvents()
{
    global $tests;
    global $CCSEvents;
    $tests->Button_Cancel->CCSEvents["OnClick"] = "tests_Button_Cancel_OnClick";
    $CCSEvents["BeforeUnload"] = "Page_BeforeUnload";
}
//End BindEvents Method

//tests_Button_Cancel_OnClick @38-54A5B0FF
function tests_Button_Cancel_OnClick(& $sender)
{
    $tests_Button_Cancel_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $tests; //Compatibility
//End tests_Button_Cancel_OnClick

//Custom Code @548-2A29BDB7
// -------------------------
    removeTests("");
// -------------------------
//End Custom Code

//Close tests_Button_Cancel_OnClick @38-474264D2
    return $tests_Button_Cancel_OnClick;
}
//End Close tests_Button_Cancel_OnClick

//Page_BeforeUnload @1-95EA9B70
function Page_BeforeUnload(& $sender)
{
    $Page_BeforeUnload = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $testlist_maint; //Compatibility
//End Page_BeforeUnload

//Custom Code @549-2A29BDB7
// -------------------------
    removeNotSelectedTests();
// -------------------------
//End Custom Code

//Close Page_BeforeUnload @1-CFAEC742
    return $Page_BeforeUnload;
}
//End Close Page_BeforeUnload

function removeTests($not_selected)
{
	// Retrieve current visitID
	$VisitID = CCGetFromGet("VisitID",0);
	if($VisitID != 0)
	{
		// open DB
		$registry_db = new clsDBregistry_db();
		$registry_db->query("DELETE FROM test WHERE VisitID = ".$registry_db->ToSQL($VisitID,ccsInteger).$not_selected);
		//Close and destroy the database connection object
		$registry_db->close();
	}
}

function removeNotSelectedTests()
{
	removeTests("AND TestResultNormal = -1");
}

?>
