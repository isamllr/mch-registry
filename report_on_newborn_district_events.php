<?php
//BindEvents Method @1-40676498
function BindEvents()
{
    global $delivery_facilities_newbo;
    global $Report_Print;
    global $NewBorn;
    global $NewBorn1;
    global $NewBorn2;
    global $NewBorn3;
    global $NewBorn4;
    global $NewBorn5;
    global $NewBorn6;
    global $NewBorn7;
    global $NewBorn8;
    $delivery_facilities_newbo->CCSEvents["BeforeShow"] = "delivery_facilities_newbo_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $NewBorn->GroupSex->CCSEvents["BeforeShow"] = "NewBorn_GroupSex_BeforeShow";
    $NewBorn1->GroupSex1->CCSEvents["BeforeShow"] = "NewBorn1_GroupSex1_BeforeShow";
    $NewBorn2->GroupSex2->CCSEvents["BeforeShow"] = "NewBorn2_GroupSex2_BeforeShow";
    $NewBorn3->GroupSex2->CCSEvents["BeforeShow"] = "NewBorn3_GroupSex2_BeforeShow";
    $NewBorn4->GroupSex2->CCSEvents["BeforeShow"] = "NewBorn4_GroupSex2_BeforeShow";
    $NewBorn5->GroupSex2->CCSEvents["BeforeShow"] = "NewBorn5_GroupSex2_BeforeShow";
    $NewBorn6->GroupSex2->CCSEvents["BeforeShow"] = "NewBorn6_GroupSex2_BeforeShow";
    $NewBorn7->GroupSex2->CCSEvents["BeforeShow"] = "NewBorn7_GroupSex2_BeforeShow";
    $NewBorn8->GroupSex2->CCSEvents["BeforeShow"] = "NewBorn8_GroupSex2_BeforeShow";
}
//End BindEvents Method

//delivery_facilities_newbo_BeforeShow @89-F61B5173
function delivery_facilities_newbo_BeforeShow(& $sender)
{
    $delivery_facilities_newbo_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $delivery_facilities_newbo; //Compatibility
//End delivery_facilities_newbo_BeforeShow

//Hide-Show Component @97-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close delivery_facilities_newbo_BeforeShow @89-96D90497
    return $delivery_facilities_newbo_BeforeShow;
}
//End Close delivery_facilities_newbo_BeforeShow

//Report_Print_BeforeShow @94-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @96-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @94-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow

//NewBorn_GroupSex_BeforeShow @214-A54F2360
function NewBorn_GroupSex_BeforeShow(& $sender)
{
    $NewBorn_GroupSex_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $NewBorn; //Compatibility
//End NewBorn_GroupSex_BeforeShow

//Custom Code @219-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($NewBorn->GroupSex->GetValue() == 0)
		$NewBorn->GroupSex->SetValue($CCSLocales->GetText("girl"));
	else if($NewBorn->GroupSex->GetValue() == 1)
		$NewBorn->GroupSex->SetValue($CCSLocales->GetText("boy"));
// -------------------------
//End Custom Code

//Close NewBorn_GroupSex_BeforeShow @214-34F48316
    return $NewBorn_GroupSex_BeforeShow;
}
//End Close NewBorn_GroupSex_BeforeShow

//NewBorn1_GroupSex1_BeforeShow @238-B2212437
function NewBorn1_GroupSex1_BeforeShow(& $sender)
{
    $NewBorn1_GroupSex1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $NewBorn1; //Compatibility
//End NewBorn1_GroupSex1_BeforeShow

//Custom Code @239-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($NewBorn1->GroupSex1->GetValue() == 0)
		$NewBorn1->GroupSex1->SetValue($CCSLocales->GetText("girl"));
	else if($NewBorn1->GroupSex1->GetValue() == 1)
		$NewBorn1->GroupSex1->SetValue($CCSLocales->GetText("boy"));
// -------------------------
//End Custom Code

//Close NewBorn1_GroupSex1_BeforeShow @238-3005DA40
    return $NewBorn1_GroupSex1_BeforeShow;
}
//End Close NewBorn1_GroupSex1_BeforeShow

//NewBorn2_GroupSex2_BeforeShow @278-EE9A7F6E
function NewBorn2_GroupSex2_BeforeShow(& $sender)
{
    $NewBorn2_GroupSex2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $NewBorn2; //Compatibility
//End NewBorn2_GroupSex2_BeforeShow

//Custom Code @279-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($NewBorn2->GroupSex2->GetValue() == 0)
		$NewBorn2->GroupSex2->SetValue($CCSLocales->GetText("girl"));
	else if($NewBorn2->GroupSex2->GetValue() == 1)
		$NewBorn2->GroupSex2->SetValue($CCSLocales->GetText("boy"));
// -------------------------
//End Custom Code

//Close NewBorn2_GroupSex2_BeforeShow @278-147A56B3
    return $NewBorn2_GroupSex2_BeforeShow;
}
//End Close NewBorn2_GroupSex2_BeforeShow

//NewBorn3_GroupSex2_BeforeShow @328-6ABBB179
function NewBorn3_GroupSex2_BeforeShow(& $sender)
{
    $NewBorn3_GroupSex2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $NewBorn3; //Compatibility
//End NewBorn3_GroupSex2_BeforeShow

//Custom Code @329-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($NewBorn3->GroupSex2->GetValue() == 0)
		$NewBorn3->GroupSex2->SetValue($CCSLocales->GetText("girl"));
	else if($NewBorn3->GroupSex2->GetValue() == 1)
		$NewBorn3->GroupSex2->SetValue($CCSLocales->GetText("boy"));
// -------------------------
//End Custom Code

//Close NewBorn3_GroupSex2_BeforeShow @328-955F3394
    return $NewBorn3_GroupSex2_BeforeShow;
}
//End Close NewBorn3_GroupSex2_BeforeShow

//NewBorn4_GroupSex2_BeforeShow @375-40BCD79E
function NewBorn4_GroupSex2_BeforeShow(& $sender)
{
    $NewBorn4_GroupSex2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $NewBorn4; //Compatibility
//End NewBorn4_GroupSex2_BeforeShow

//Custom Code @376-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($NewBorn4->GroupSex2->GetValue() == 0)
		$NewBorn4->GroupSex2->SetValue($CCSLocales->GetText("girl"));
	else if($NewBorn4->GroupSex2->GetValue() == 1)
		$NewBorn4->GroupSex2->SetValue($CCSLocales->GetText("boy"));
// -------------------------
//End Custom Code

//Close NewBorn4_GroupSex2_BeforeShow @375-A44704E3
    return $NewBorn4_GroupSex2_BeforeShow;
}
//End Close NewBorn4_GroupSex2_BeforeShow

//NewBorn5_GroupSex2_BeforeShow @419-C49D1989
function NewBorn5_GroupSex2_BeforeShow(& $sender)
{
    $NewBorn5_GroupSex2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $NewBorn5; //Compatibility
//End NewBorn5_GroupSex2_BeforeShow

//Custom Code @420-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($NewBorn5->GroupSex2->GetValue() == 0)
		$NewBorn5->GroupSex2->SetValue($CCSLocales->GetText("girl"));
	else if($NewBorn5->GroupSex2->GetValue() == 1)
		$NewBorn5->GroupSex2->SetValue($CCSLocales->GetText("boy"));
// -------------------------
//End Custom Code

//Close NewBorn5_GroupSex2_BeforeShow @419-256261C4
    return $NewBorn5_GroupSex2_BeforeShow;
}
//End Close NewBorn5_GroupSex2_BeforeShow

//NewBorn6_GroupSex2_BeforeShow @463-938E4DF1
function NewBorn6_GroupSex2_BeforeShow(& $sender)
{
    $NewBorn6_GroupSex2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $NewBorn6; //Compatibility
//End NewBorn6_GroupSex2_BeforeShow

//Custom Code @464-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($NewBorn6->GroupSex2->GetValue() == 0)
		$NewBorn6->GroupSex2->SetValue($CCSLocales->GetText("girl"));
	else if($NewBorn6->GroupSex2->GetValue() == 1)
		$NewBorn6->GroupSex2->SetValue($CCSLocales->GetText("boy"));
// -------------------------
//End Custom Code

//Close NewBorn6_GroupSex2_BeforeShow @463-7D7CC8EC
    return $NewBorn6_GroupSex2_BeforeShow;
}
//End Close NewBorn6_GroupSex2_BeforeShow

//NewBorn7_GroupSex2_BeforeShow @507-17AF83E6
function NewBorn7_GroupSex2_BeforeShow(& $sender)
{
    $NewBorn7_GroupSex2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $NewBorn7; //Compatibility
//End NewBorn7_GroupSex2_BeforeShow

//Custom Code @508-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($NewBorn7->GroupSex2->GetValue() == 0)
		$NewBorn7->GroupSex2->SetValue($CCSLocales->GetText("girl"));
	else if($NewBorn7->GroupSex2->GetValue() == 1)
		$NewBorn7->GroupSex2->SetValue($CCSLocales->GetText("boy"));
// -------------------------
//End Custom Code

//Close NewBorn7_GroupSex2_BeforeShow @507-FC59ADCB
    return $NewBorn7_GroupSex2_BeforeShow;
}
//End Close NewBorn7_GroupSex2_BeforeShow

//NewBorn8_GroupSex2_BeforeShow @551-C780803F
function NewBorn8_GroupSex2_BeforeShow(& $sender)
{
    $NewBorn8_GroupSex2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $NewBorn8; //Compatibility
//End NewBorn8_GroupSex2_BeforeShow

//Custom Code @552-2A29BDB7
// -------------------------
global $CCSLocales;
	
	if($NewBorn8->GroupSex2->GetValue() == 0)
		$NewBorn8->GroupSex2->SetValue($CCSLocales->GetText("girl"));
	else if($NewBorn8->GroupSex2->GetValue() == 1)
		$NewBorn8->GroupSex2->SetValue($CCSLocales->GetText("boy"));
// -------------------------
//End Custom Code

//Close NewBorn8_GroupSex2_BeforeShow @551-1F4CA602
    return $NewBorn8_GroupSex2_BeforeShow;
}
//End Close NewBorn8_GroupSex2_BeforeShow
//DEL  // -------------------------
//DEL  global $CCSLocales;
//DEL  	
//DEL  	if($NewBorn->GroupSex->GetValue() == 0)
//DEL  		$NewBorn->GroupSex->SetValue($CCSLocales->GetText("girl"));
//DEL  	else if($NewBorn->GroupSex->GetValue() == 1)
//DEL  		$NewBorn->GroupSex->SetValue($CCSLocales->GetText("boy"));
//DEL  // -------------------------



?>
