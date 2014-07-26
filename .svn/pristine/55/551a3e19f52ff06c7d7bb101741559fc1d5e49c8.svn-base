<?php
//BindEvents Method @1-180FA072
function BindEvents()
{
    global $pregnancySearch;
    global $Report_Print;
    $pregnancySearch->CCSEvents["BeforeShow"] = "pregnancySearch_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//pregnancySearch_BeforeShow @9-3639E682
function pregnancySearch_BeforeShow(& $sender)
{
    $pregnancySearch_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $pregnancySearch; //Compatibility
//End pregnancySearch_BeforeShow

//Hide-Show Component @16-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close pregnancySearch_BeforeShow @9-517FBD84
    return $pregnancySearch_BeforeShow;
}
//End Close pregnancySearch_BeforeShow

//Report_Print_BeforeShow @13-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @15-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @13-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report1->Age->GetValue() == 0)
//DEL  		$Report1->Age->SetText($CCSLocales->GetText("gestation12weeks"));
//DEL  	else if($Report1->Age->GetValue() == 1)
//DEL  		$Report1->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report3->Admitted->GetValue() == 0)
//DEL  		$Report3->Admitted->SetText($CCSLocales->GetText("f21PregnanciesObserved"));
//DEL  	else if($Report3->Admitted->GetValue() == 1)
//DEL  		$Report3->Admitted->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report4->Discharged->GetValue() == 0)
//DEL  		$Report4->Discharged->SetText($CCSLocales->GetText("left_the_facilityF21"));
//DEL  	else if($Report4->Discharged->GetValue() == 1)
//DEL  		$Report4->Discharged->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      	global $CCSLocales;
//DEL  
//DEL     	if($Report5->F21HIV->GetValue() == 0)
//DEL  		$Report5->F21HIV->SetText($CCSLocales->GetText("F21HIV"));
//DEL  	else if($Report5->F21HIV->GetValue() == 1)
//DEL  		$Report5->F21HIV->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report2->Age->GetValue() == 0)
//DEL  		$Report2->Age->SetText($CCSLocales->GetText("F21HIV_positive"));
//DEL  	else if($Report2->Age->GetValue() == 1)
//DEL  		$Report2->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report6->Age->GetValue() == 0)
//DEL  		$Report6->Age->SetText($CCSLocales->GetText("F21alfafetoprotein"));
//DEL  	else if($Report6->Age->GetValue() == 1)
//DEL  		$Report6->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report7->Age->GetValue() == 0)
//DEL  		$Report7->Age->SetText($CCSLocales->GetText("F21HBsAg"));
//DEL  	else if($Report7->Age->GetValue() == 1)
//DEL  		$Report7->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report8->Age->GetValue() == 0)
//DEL  		$Report8->Age->SetText($CCSLocales->GetText("F21Ultrasound22weeks"));
//DEL  	else if($Report8->Age->GetValue() == 1)
//DEL  		$Report8->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report9->Age->GetValue() == 0)
//DEL  		$Report9->Age->SetText($CCSLocales->GetText("F21RWpositive"));
//DEL  	else if($Report9->Age->GetValue() == 1)
//DEL  		$Report9->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report10->Age->GetValue() == 0)
//DEL  		$Report10->Age->SetText($CCSLocales->GetText("F21abortions"));
//DEL  	else if($Report10->Age->GetValue() == 1)
//DEL  		$Report10->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report11->Age->GetValue() == 0)
//DEL  		$Report11->Age->SetText($CCSLocales->GetText("F21stillbirths"));
//DEL  	else if($Report11->Age->GetValue() == 1)
//DEL  		$Report11->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report12->Age->GetValue() == 0)
//DEL  		$Report12->Age->SetText($CCSLocales->GetText("F21Urinary"));
//DEL  	else if($Report12->Age->GetValue() == 1)
//DEL  		$Report12->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report13->Age->GetValue() == 0)
//DEL  		$Report13->Age->SetText($CCSLocales->GetText("F21Blood"));
//DEL  	else if($Report13->Age->GetValue() == 1)
//DEL  		$Report13->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report14->Age->GetValue() == 0)
//DEL  		$Report14->Age->SetText($CCSLocales->GetText("F21Diabetes"));
//DEL  	else if($Report14->Age->GetValue() == 1)
//DEL  		$Report14->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report15->Age->GetValue() == 0)
//DEL  		$Report15->Age->SetText($CCSLocales->GetText("F21Thyroid"));
//DEL  	else if($Report15->Age->GetValue() == 1)
//DEL  		$Report15->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report16->Age->GetValue() == 0)
//DEL  		$Report16->Age->SetText($CCSLocales->GetText("F21ConditionDescription"));
//DEL  	else if($Report16->Age->GetValue() == 1)
//DEL  		$Report16->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report17->Age->GetValue() == 0)
//DEL  		$Report17->Age->SetText($CCSLocales->GetText("F21Hemorrhage"));
//DEL  	else if($Report17->Age->GetValue() == 1)
//DEL  		$Report17->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report18->Age->GetValue() == 0)
//DEL  		$Report18->Age->SetText($CCSLocales->GetText("F21Venous"));
//DEL  	else if($Report18->Age->GetValue() == 1)
//DEL  		$Report18->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report19->Age->GetValue() == 0)
//DEL  		$Report19->Age->SetText($CCSLocales->GetText("F21Edemas"));
//DEL  	else if($Report19->Age->GetValue() == 1)
//DEL  		$Report19->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report20->Age->GetValue() == 0)
//DEL  		$Report20->Age->SetText($CCSLocales->GetText("F21eclampsia"));
//DEL  	else if($Report20->Age->GetValue() == 1)
//DEL  		$Report20->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------


//DEL  // -------------------------
//DEL     	global $CCSLocales;
//DEL  
//DEL     	if($Report21->Age->GetValue() == 0)
//DEL  		$Report21->Age->SetText($CCSLocales->GetText("F21SevereEclampsia"));
//DEL  	else if($Report21->Age->GetValue() == 1)
//DEL  		$Report21->Age->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------



?>
