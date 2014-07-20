<?php
//BindEvents Method @1-1883C56A
function BindEvents()
{
    global $pregnancySearch;
    global $Report_Print;
    global $Report1;
    global $Report3;
    global $Report4;
    global $Report5;
    global $Report2;
    global $Report6;
    global $Report7;
    global $Report8;
    global $Report9;
    global $Report10;
    global $Report11;
    global $Report22;
    global $Report23;
    $pregnancySearch->CCSEvents["BeforeShow"] = "pregnancySearch_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $Report1->Age->CCSEvents["BeforeShow"] = "Report1_Age_BeforeShow";
    $Report1->TotalPreg1->CCSEvents["BeforeShow"] = "Report1_TotalPreg1_BeforeShow";
    $Report3->Admitted->CCSEvents["BeforeShow"] = "Report3_Admitted_BeforeShow";
    $Report3->Totalpatient1->CCSEvents["BeforeShow"] = "Report3_Totalpatient1_BeforeShow";
    $Report3->CCSEvents["BeforeShow"] = "Report3_BeforeShow";
    $Report4->Discharged->CCSEvents["BeforeShow"] = "Report4_Discharged_BeforeShow";
    $Report4->CCSEvents["BeforeShow"] = "Report4_BeforeShow";
    $Report5->F21HIV->CCSEvents["BeforeShow"] = "Report5_F21HIV_BeforeShow";
    $Report5->patient_PatientID1->CCSEvents["BeforeShow"] = "Report5_patient_PatientID1_BeforeShow";
    $Report2->Age->CCSEvents["BeforeShow"] = "Report2_Age_BeforeShow";
    $Report2->PPP1->CCSEvents["BeforeShow"] = "Report2_PPP1_BeforeShow";
    $Report6->Age->CCSEvents["BeforeShow"] = "Report6_Age_BeforeShow";
    $Report6->PPP1->CCSEvents["BeforeShow"] = "Report6_PPP1_BeforeShow";
    $Report7->Age->CCSEvents["BeforeShow"] = "Report7_Age_BeforeShow";
    $Report7->PPP1->CCSEvents["BeforeShow"] = "Report7_PPP1_BeforeShow";
    $Report8->Age->CCSEvents["BeforeShow"] = "Report8_Age_BeforeShow";
    $Report8->PPP1->CCSEvents["BeforeShow"] = "Report8_PPP1_BeforeShow";
    $Report9->Age->CCSEvents["BeforeShow"] = "Report9_Age_BeforeShow";
    $Report9->COUNT_2->CCSEvents["BeforeShow"] = "Report9_COUNT_2_BeforeShow";
    $Report10->Age->CCSEvents["BeforeShow"] = "Report10_Age_BeforeShow";
    $Report11->Age->CCSEvents["BeforeShow"] = "Report11_Age_BeforeShow";
    $Report11->TotalPreg1->CCSEvents["BeforeShow"] = "Report11_TotalPreg1_BeforeShow";
    $Report22->Age->CCSEvents["BeforeShow"] = "Report22_Age_BeforeShow";
    $Report22->COUNT_2->CCSEvents["BeforeShow"] = "Report22_COUNT_2_BeforeShow";
    $Report23->Age->CCSEvents["BeforeShow"] = "Report23_Age_BeforeShow";
    $Report23->PPP1->CCSEvents["BeforeShow"] = "Report23_PPP1_BeforeShow";
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

//Report1_Age_BeforeShow @212-01039CD7
function Report1_Age_BeforeShow(& $sender)
{
    $Report1_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report1; //Compatibility
//End Report1_Age_BeforeShow

//Custom Code @213-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report1->Age->GetValue() == 0)
		$Report1->Age->SetText($CCSLocales->GetText("gestation12weeks"));
	else if($Report1->Age->GetValue() == 1)
		$Report1->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report1_Age_BeforeShow @212-D2845F5C
    return $Report1_Age_BeforeShow;
}
//End Close Report1_Age_BeforeShow

//Report1_TotalPreg1_BeforeShow @217-1D886E05
function Report1_TotalPreg1_BeforeShow(& $sender)
{
    $Report1_TotalPreg1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report1; //Compatibility
//End Report1_TotalPreg1_BeforeShow

//Custom Code @574-2A29BDB7
// -------------------------
    $Report1->TotalPreg1->SetValue(round($Report1->TotalPreg1->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report1_TotalPreg1_BeforeShow @217-CA9CAB36
    return $Report1_TotalPreg1_BeforeShow;
}
//End Close Report1_TotalPreg1_BeforeShow

//Report3_Admitted_BeforeShow @31-C1EFF932
function Report3_Admitted_BeforeShow(& $sender)
{
    $Report3_Admitted_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report3; //Compatibility
//End Report3_Admitted_BeforeShow

//Custom Code @225-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report3->Admitted->GetValue() == 0)
		$Report3->Admitted->SetText($CCSLocales->GetText("f21PregnanciesObserved"));
	else if($Report3->Admitted->GetValue() == 1)
		$Report3->Admitted->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report3_Admitted_BeforeShow @31-8AA8F090
    return $Report3_Admitted_BeforeShow;
}
//End Close Report3_Admitted_BeforeShow

//Report3_Totalpatient1_BeforeShow @34-6BDCA94A
function Report3_Totalpatient1_BeforeShow(& $sender)
{
    $Report3_Totalpatient1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report3; //Compatibility
//End Report3_Totalpatient1_BeforeShow

//Custom Code @575-2A29BDB7
// -------------------------
    $Report3->Totalpatient1->SetValue(round($Report3->Totalpatient1->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report3_Totalpatient1_BeforeShow @34-6A99B342
    return $Report3_Totalpatient1_BeforeShow;
}
//End Close Report3_Totalpatient1_BeforeShow

//Report3_BeforeShow @22-3E393582
function Report3_BeforeShow(& $sender)
{
    $Report3_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report3; //Compatibility
//End Report3_BeforeShow

//Custom Code @571-2A29BDB7
// -------------------------
	$Report3->Visible = FALSE;
// -------------------------
//End Custom Code

//Close Report3_BeforeShow @22-8C5C90F0
    return $Report3_BeforeShow;
}
//End Close Report3_BeforeShow

//Report4_Discharged_BeforeShow @237-AAD33B16
function Report4_Discharged_BeforeShow(& $sender)
{
    $Report4_Discharged_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report4; //Compatibility
//End Report4_Discharged_BeforeShow

//Custom Code @241-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report4->Discharged->GetValue() == 0)
		$Report4->Discharged->SetText($CCSLocales->GetText("left_the_facilityF21"));
	else if($Report4->Discharged->GetValue() == 1)
		$Report4->Discharged->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report4_Discharged_BeforeShow @237-BD5133F2
    return $Report4_Discharged_BeforeShow;
}
//End Close Report4_Discharged_BeforeShow

//Report4_BeforeShow @228-7658BCF3
function Report4_BeforeShow(& $sender)
{
    $Report4_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report4; //Compatibility
//End Report4_BeforeShow

//Custom Code @572-2A29BDB7
// -------------------------
	$Report4->Visible = FALSE;
// -------------------------
//End Custom Code

//Close Report4_BeforeShow @228-E9913A30
    return $Report4_BeforeShow;
}
//End Close Report4_BeforeShow

//DEL  // -------------------------
//DEL      	global $CCSLocales;
//DEL  
//DEL     	if($Report5->F21HIV->GetValue() == 0)
//DEL  		$Report5->F21HIV->SetText($CCSLocales->GetText("F21HIV"));
//DEL  	else if($Report5->F21HIV->GetValue() == 1)
//DEL  		$Report5->F21HIV->SetText($CCSLocales->GetText("F21Others"));
//DEL  // -------------------------

//Report5_F21HIV_BeforeShow @244-BD824DC2
function Report5_F21HIV_BeforeShow(& $sender)
{
    $Report5_F21HIV_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report5; //Compatibility
//End Report5_F21HIV_BeforeShow

//Custom Code @245-2A29BDB7
// -------------------------
    global $CCSLocales;

   	if($Report5->F21HIV->GetValue() == 0)
		$Report5->F21HIV->SetText($CCSLocales->GetText("F21HIV"));
	else if($Report5->F21HIV->GetValue() == 1)
		$Report5->F21HIV->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report5_F21HIV_BeforeShow @244-FF20F757
    return $Report5_F21HIV_BeforeShow;
}
//End Close Report5_F21HIV_BeforeShow

//Report5_patient_PatientID1_BeforeShow @246-1B76146A
function Report5_patient_PatientID1_BeforeShow(& $sender)
{
    $Report5_patient_PatientID1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report5; //Compatibility
//End Report5_patient_PatientID1_BeforeShow

//Custom Code @573-2A29BDB7
// -------------------------
    $Report5->patient_PatientID1->SetValue(round($Report5->patient_PatientID1->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report5_patient_PatientID1_BeforeShow @246-B634B108
    return $Report5_patient_PatientID1_BeforeShow;
}
//End Close Report5_patient_PatientID1_BeforeShow

//Report2_Age_BeforeShow @258-47E61745
function Report2_Age_BeforeShow(& $sender)
{
    $Report2_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report2; //Compatibility
//End Report2_Age_BeforeShow

//Custom Code @261-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report2->Age->GetValue() == 0)
		$Report2->Age->SetText($CCSLocales->GetText("F21HIV_positive"));
	else if($Report2->Age->GetValue() == 1)
		$Report2->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report2_Age_BeforeShow @258-3802823E
    return $Report2_Age_BeforeShow;
}
//End Close Report2_Age_BeforeShow

//Report2_PPP1_BeforeShow @262-EF4169EA
function Report2_PPP1_BeforeShow(& $sender)
{
    $Report2_PPP1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report2; //Compatibility
//End Report2_PPP1_BeforeShow

//Custom Code @577-2A29BDB7
// -------------------------
    $Report2->PPP1->SetValue(round($Report2->PPP1->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report2_PPP1_BeforeShow @262-953BAB33
    return $Report2_PPP1_BeforeShow;
}
//End Close Report2_PPP1_BeforeShow

//Report6_Age_BeforeShow @272-07BB0F42
function Report6_Age_BeforeShow(& $sender)
{
    $Report6_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report6; //Compatibility
//End Report6_Age_BeforeShow

//Custom Code @276-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report6->Age->GetValue() == 0)
		$Report6->Age->SetText($CCSLocales->GetText("F21alfafetoprotein"));
	else if($Report6->Age->GetValue() == 1)
		$Report6->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report6_Age_BeforeShow @272-33AA5538
    return $Report6_Age_BeforeShow;
}
//End Close Report6_Age_BeforeShow

//Report6_PPP1_BeforeShow @275-F84329EE
function Report6_PPP1_BeforeShow(& $sender)
{
    $Report6_PPP1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report6; //Compatibility
//End Report6_PPP1_BeforeShow

//Custom Code @578-2A29BDB7
// -------------------------
    $Report6->PPP1->SetValue(round($Report6->PPP1->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report6_PPP1_BeforeShow @275-7C53A6D1
    return $Report6_PPP1_BeforeShow;
}
//End Close Report6_PPP1_BeforeShow

//Report7_Age_BeforeShow @286-8CC88BF3
function Report7_Age_BeforeShow(& $sender)
{
    $Report7_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report7; //Compatibility
//End Report7_Age_BeforeShow

//Custom Code @290-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report7->Age->GetValue() == 0)
		$Report7->Age->SetText($CCSLocales->GetText("F21HBsAg"));
	else if($Report7->Age->GetValue() == 1)
		$Report7->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report7_Age_BeforeShow @286-DCF8E3D9
    return $Report7_Age_BeforeShow;
}
//End Close Report7_Age_BeforeShow

//Report7_PPP1_BeforeShow @289-FD83B9EF
function Report7_PPP1_BeforeShow(& $sender)
{
    $Report7_PPP1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report7; //Compatibility
//End Report7_PPP1_BeforeShow

//Custom Code @579-2A29BDB7
// -------------------------
    $Report7->PPP1->SetValue(round($Report7->PPP1->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report7_PPP1_BeforeShow @289-ABB12689
    return $Report7_PPP1_BeforeShow;
}
//End Close Report7_PPP1_BeforeShow

//Report8_Age_BeforeShow @300-0ACA2868
function Report8_Age_BeforeShow(& $sender)
{
    $Report8_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report8; //Compatibility
//End Report8_Age_BeforeShow

//Custom Code @304-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report8->Age->GetValue() == 0)
		$Report8->Age->SetText($CCSLocales->GetText("F21Ultrasound22weeks"));
	else if($Report8->Age->GetValue() == 1)
		$Report8->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report8_Age_BeforeShow @300-2A8747B1
    return $Report8_Age_BeforeShow;
}
//End Close Report8_Age_BeforeShow

//Report8_PPP1_BeforeShow @303-CAC4C9E0
function Report8_PPP1_BeforeShow(& $sender)
{
    $Report8_PPP1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report8; //Compatibility
//End Report8_PPP1_BeforeShow

//Custom Code @580-2A29BDB7
// -------------------------
    $Report8->PPP1->SetValue(round($Report8->PPP1->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report8_PPP1_BeforeShow @303-E82EB047
    return $Report8_PPP1_BeforeShow;
}
//End Close Report8_PPP1_BeforeShow

//Report9_Age_BeforeShow @314-81B9ACD9
function Report9_Age_BeforeShow(& $sender)
{
    $Report9_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report9; //Compatibility
//End Report9_Age_BeforeShow

//Custom Code @318-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report9->Age->GetValue() == 0)
		$Report9->Age->SetText($CCSLocales->GetText("F21RWpositive"));
	else if($Report9->Age->GetValue() == 1)
		$Report9->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report9_Age_BeforeShow @314-C5D5F150
    return $Report9_Age_BeforeShow;
}
//End Close Report9_Age_BeforeShow

//Report9_COUNT_2_BeforeShow @559-614509DA
function Report9_COUNT_2_BeforeShow(& $sender)
{
    $Report9_COUNT_2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report9; //Compatibility
//End Report9_COUNT_2_BeforeShow

//Custom Code @581-2A29BDB7
// -------------------------
    $Report9->COUNT_2->SetValue(round($Report9->COUNT_2->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report9_COUNT_2_BeforeShow @559-ED001273
    return $Report9_COUNT_2_BeforeShow;
}
//End Close Report9_COUNT_2_BeforeShow

//Report10_Age_BeforeShow @328-CD9F9CDE
function Report10_Age_BeforeShow(& $sender)
{
    $Report10_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report10; //Compatibility
//End Report10_Age_BeforeShow

//Custom Code @332-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report10->Age->GetValue() == 0)
		$Report10->Age->SetText($CCSLocales->GetText("F21abortions"));
	else if($Report10->Age->GetValue() == 1)
		$Report10->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report10_Age_BeforeShow @328-C0153735
    return $Report10_Age_BeforeShow;
}
//End Close Report10_Age_BeforeShow

//Report11_Age_BeforeShow @342-C85F0CDF
function Report11_Age_BeforeShow(& $sender)
{
    $Report11_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report11; //Compatibility
//End Report11_Age_BeforeShow

//Custom Code @346-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report11->Age->GetValue() == 0)
		$Report11->Age->SetText($CCSLocales->GetText("F21stillbirths"));
	else if($Report11->Age->GetValue() == 1)
		$Report11->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report11_Age_BeforeShow @342-2F4781D4
    return $Report11_Age_BeforeShow;
}
//End Close Report11_Age_BeforeShow

//Report11_TotalPreg1_BeforeShow @345-F60D1DB9
function Report11_TotalPreg1_BeforeShow(& $sender)
{
    $Report11_TotalPreg1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report11; //Compatibility
//End Report11_TotalPreg1_BeforeShow

//Custom Code @583-2A29BDB7
// -------------------------
    $Report11->TotalPreg1->SetValue(round($Report11->TotalPreg1->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report11_TotalPreg1_BeforeShow @345-83E82E8D
    return $Report11_TotalPreg1_BeforeShow;
}
//End Close Report11_TotalPreg1_BeforeShow

//Report22_Age_BeforeShow @534-5F19ACD6
function Report22_Age_BeforeShow(& $sender)
{
    $Report22_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report22; //Compatibility
//End Report22_Age_BeforeShow

//Custom Code @535-2A29BDB7
// -------------------------
  	global $CCSLocales;

   	if($Report22->Age->GetValue() == 0)
		$Report22->Age->SetText($CCSLocales->GetText("F21HIV_tested_twice"));
	else if($Report22->Age->GetValue() == 1)
		$Report22->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report22_Age_BeforeShow @534-6697DA1F
    return $Report22_Age_BeforeShow;
}
//End Close Report22_Age_BeforeShow

//Report22_COUNT_2_BeforeShow @537-75E515E5
function Report22_COUNT_2_BeforeShow(& $sender)
{
    $Report22_COUNT_2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report22; //Compatibility
//End Report22_COUNT_2_BeforeShow

//Custom Code @576-2A29BDB7
// -------------------------
    $Report22->COUNT_2->SetValue(round($Report22->COUNT_2->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report22_COUNT_2_BeforeShow @537-97FF2CCC
    return $Report22_COUNT_2_BeforeShow;
}
//End Close Report22_COUNT_2_BeforeShow

//Report23_Age_BeforeShow @548-5AD93CD7
function Report23_Age_BeforeShow(& $sender)
{
    $Report23_Age_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report23; //Compatibility
//End Report23_Age_BeforeShow

//Custom Code @549-2A29BDB7
// -------------------------
   	global $CCSLocales;

   	if($Report23->Age->GetValue() == 0)
		$Report23->Age->SetText($CCSLocales->GetText("F21RWpositive"));
	else if($Report23->Age->GetValue() == 1)
		$Report23->Age->SetText($CCSLocales->GetText("F21Others"));
// -------------------------
//End Custom Code

//Close Report23_Age_BeforeShow @548-89C56CFE
    return $Report23_Age_BeforeShow;
}
//End Close Report23_Age_BeforeShow

//Report23_PPP1_BeforeShow @551-1CFF7851
function Report23_PPP1_BeforeShow(& $sender)
{
    $Report23_PPP1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report23; //Compatibility
//End Report23_PPP1_BeforeShow

//Custom Code @582-2A29BDB7
// -------------------------
    $Report23->PPP1->SetValue(round($Report23->PPP1->GetValue()*100,2));
// -------------------------
//End Custom Code

//Close Report23_PPP1_BeforeShow @551-0EEEAE6D
    return $Report23_PPP1_BeforeShow;
}
//End Close Report23_PPP1_BeforeShow
?>
