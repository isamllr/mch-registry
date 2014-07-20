<?php
//BindEvents Method @1-334CBEF2
function BindEvents()
{
    global $employees;
    global $employees_admin;
    global $CCSEvents;
    $employees->Navigator->CCSEvents["BeforeShow"] = "employees_Navigator_BeforeShow";
    $employees_admin->Navigator->CCSEvents["BeforeShow"] = "employees_admin_Navigator_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//employees_Navigator_BeforeShow @64-24135AB7
function employees_Navigator_BeforeShow(& $sender)
{
    $employees_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees; //Compatibility
//End employees_Navigator_BeforeShow

//Hide-Show Component @65-0DB41530
    $Parameter1 = $Container->DataSource->PageCount();
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employees_Navigator_BeforeShow @64-770030A0
    return $employees_Navigator_BeforeShow;
}
//End Close employees_Navigator_BeforeShow

//employees_admin_Navigator_BeforeShow @136-F2A250B8
function employees_admin_Navigator_BeforeShow(& $sender)
{
    $employees_admin_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees_admin; //Compatibility
//End employees_admin_Navigator_BeforeShow

//Hide-Show Component @137-0DB41530
    $Parameter1 = $Container->DataSource->PageCount();
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employees_admin_Navigator_BeforeShow @136-1B412E92
    return $employees_admin_Navigator_BeforeShow;
}
//End Close employees_admin_Navigator_BeforeShow

//Page_OnInitializeView @1-10AD588D
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employees_list; //Compatibility
//End Page_OnInitializeView

//Custom Code @97-2A29BDB7
// -------------------------
global $topmenu;
global $employeesSearch;
global $employees;

	$ExportFileName = "EmployeesListExport.xls";
 	if (CCGetFromGet("export") == "1") {
		//Hide the ToExcelLink Link and all the rest
		$employees->ToExcelLink->Visible = false;
		$employees->employees_Insert->Visible= false;
		$topmenu->Visible = false;
		$employeesSearch->Visible = false;
		
		//Set Content type to Excel
        header("Content-Type: application/vnd.ms-excel");
        //Fix IE 5.0-5.5 bug with Content-Disposition=attachment
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.5;") || 
            strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.0;")) {
	  		header("Content-Disposition: filename=" . $ExportFileName);
		} else {
	  		header("Content-Disposition: attachment; filename=" . $ExportFileName);
		}
	}
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//DEL  // -------------------------
//DEL  global $Redirect;
//DEL  
//DEL  if
//DEL  
//DEL  // -------------------------



?>
