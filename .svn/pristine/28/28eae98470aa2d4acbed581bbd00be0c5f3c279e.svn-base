<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Report2" wizardCaption="{res:CCS_SearchFormPrefix} {res:Report1} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_risks_facilities.ccp" PathID="Report2">
			<Components>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="True" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="Report2Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="Report2s_PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_PatientID" PathID="Report2s_PatientID" caption="{res:PatientID}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups>
				<Group id="7" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Link id="66" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_risks_facilities.ccp" wizardTheme="Basic" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="67" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="68" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="72" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="25" connection="registry_db" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" name="Report1" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Outline" dataSource="SELECT * 
FROM

(

SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  
pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, 
CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, ')') AS Medical_Anamnesis, NULL AS Bad_Habits, NULL AS Antenatal_Problems, NULL AS VisitDateProbs, 
NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc
FROM (((patient INNER JOIN obstetric_anamnesis ON
obstetric_anamnesis.PatientID = patient.PatientID) INNER JOIN pregnancy ON
pregnancy.PatientID = patient.PatientID) INNER JOIN icd10_all ON
obstetric_anamnesis.ICD10ID = icd10_all.ICD10ID) LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID
GROUP BY Medical_Anamnesis, pregnancy.PregnancyID

UNION

SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  
pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, BadHabbitsName AS Bad_Habits, 
NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, NULL AS HospAdmReason, 
NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc
FROM (((patient INNER JOIN pregnancy ON pregnancy.PatientID = patient.PatientID) INNER JOIN bad_habbits ON bad_habbits.PatientID = patient.PatientID) 
INNER JOIN bad_habbitstype ON bad_habbits.BadHabbitsTypeID = bad_habbitstype.BadHabbitsTypeID) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID
GROUP BY Bad_Habits, pregnancy.PregnancyID

UNION

SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  
pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, 
CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(VisitDate AS CHAR)) AS Antenatal_Problems, VisitDate AS VisitDateProbs, NULL AS Abnormal_Test_Results, 
NULL AS VisitDateTests, NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc
FROM ((((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) INNER JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN visitdisease ON visitdisease.VisitID = visit.VisitID) INNER JOIN icd10_all ON visitdisease.ICD10ID = icd10_all.ICD10ID ) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID
GROUP BY Antenatal_Problems, pregnancy.PregnancyID

UNION 

SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  
pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, 
NULL AS Antenatal_Problems, NULL AS VisitDateProbs, CONCAT(TestName, ', ', CAST(VisitDate AS CHAR)) AS Abnormal_Test_Results, VisitDate AS VisitDateTests, 
NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc
FROM ((((visit INNER JOIN pregnancy ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON
test.VisitID = visit.VisitID) INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN testcode ON
test.TestCodeID = testcode.TestCodeID) LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID
WHERE TestResultNormal = 0 
GROUP BY Abnormal_Test_Results, pregnancy.PregnancyID

UNION

SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID,  
pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, 
NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, 
CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(AdmissionDate AS CHAR)) AS HospAdmReason, NULL AS HospDiscReason, 
AdmissionDate AS GenHospDate, patient.Discharged AS Disc
FROM ((((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) 
INNER JOIN hospitalisation ON pregnancy.PregnancyID = hospitalisation.PregnancyID) 
LEFT JOIN reasonhospitalisation ON reasonhospitalisation.HospitalisationID = hospitalisation.HospitalisationID)
INNER JOIN icd10_all ON reasonhospitalisation.ICD10ID = icd10_all.ICD10ID) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID
GROUP BY HospAdmReason, pregnancy.PregnancyID 

UNION

SELECT PregnancyRecNr, GivenName, FamilyName, Calc_DeliveryDate, DataDelivery, patient.PatientID AS PatientID, 
pregnancy.FacilityID AS preg_f_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, 
NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, 
NULL AS HospAdmReason, CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(hospitalisation.DischargeDate AS CHAR)) AS HospDiscReason, 
hospitalisation.DischargeDate AS GenHospDate, patient.Discharged AS Disc
FROM ((((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) 
INNER JOIN hospitalisation ON pregnancy.PregnancyID = hospitalisation.PregnancyID) 
INNER JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID)
INNER JOIN icd10_all ON hospitalisationdischargediagnosis.ICD10ID = icd10_all.ICD10ID) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID
WHERE hospitalisation.DischargeDate IS NOT NULL
GROUP BY HospDiscReason, pregnancy.PregnancyID 

) 

AS result 

WHERE PatientID LIKE '{s_PatientID}' AND PregnancyRecNr LIKE '{s_PregnancyRecNr}' AND CURDATE() &lt; ADDDATE(Calc_DeliveryDate, 31) AND 
DataDelivery IS NULL AND preg_f_id IN ({s_Facilities}) AND Disc = 0  
ORDER BY PregnancyID ASC, GenHospDate ASC, HospDiscReason ASC, HospAdmReason ASC, VisitDateTests ASC, Abnormal_Test_Results ASC, 
VisitDateProbs ASC, Antenatal_Problems ASC, Bad_Habits ASC, Medical_Anamnesis ASC">
			<Components>
				<Section id="73" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="74" visible="True" lines="0" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="75" visible="True" lines="1" name="PatientID_Header" pasteActions="pasteActions">
					<Components>
						<Link id="76" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="PatientID" fieldSource="PatientID" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report1PatientID_HeaderPatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="77" sourceType="DataField" name="PatientID" source="PatientID"/>
							</LinkParameters>
						</Link>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="78" visible="True" lines="1" name="FamilyName_Header">
					<Components>
						<ReportLabel id="79" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="FamilyName" fieldSource="FamilyName" wizardCaption="FamilyName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report1FamilyName_HeaderFamilyName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="80" visible="True" lines="1" name="GivenName_Header">
					<Components>
						<ReportLabel id="81" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="GivenName" fieldSource="GivenName" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report1GivenName_HeaderGivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="82" visible="True" lines="2" name="PregnancyRecNr_Header">
					<Components>
						<Link id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="PregnancyRecNr" PathID="Report1PregnancyRecNr_HeaderPregnancyRecNr" fieldSource="PregnancyRecNr" hrefSource="pregnancy_maint.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="84" sourceType="DataField" format="yyyy-mm-dd" name="PatientID" source="PatientID"/>
								<LinkParameter id="85" sourceType="DataField" format="yyyy-mm-dd" name="PregnancyID" source="PregnancyID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="86" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="87" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Abnormal_Test_Results" fieldSource="Abnormal_Test_Results" PathID="Report1DetailAbnormal_Test_Results">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="88" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Bad_Habits" fieldSource="Bad_Habits" PathID="Report1DetailBad_Habits">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="89" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Medical_Anamnesis" fieldSource="Medical_Anamnesis" PathID="Report1DetailMedical_Anamnesis">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="90" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Antenatal_Problems" fieldSource="Antenatal_Problems" PathID="Report1DetailAntenatal_Problems">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="91" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Hospitalisation_Admission" fieldSource="HospAdmReason" PathID="Report1DetailHospitalisation_Admission">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="92" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Hospitalisation_Discharge" fieldSource="HospDiscReason" PathID="Report1DetailHospitalisation_Discharge">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="93" visible="True" lines="0" name="PregnancyRecNr_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="94" visible="True" lines="0" name="GivenName_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="95" visible="True" lines="0" name="FamilyName_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="96" visible="True" lines="0" name="PatientID_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="97" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="98" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="99" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="100" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDateTime" fieldSource="CurrentDateTime" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="Report1Page_FooterReport_CurrentDateTime">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="101" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentPage" fieldSource="PageNumber" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix="{res:CCS_ReportPageNumber1} " PathID="Report1Page_FooterReport_CurrentPage">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="102" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalPages" fieldSource="TotalPages" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix=" {res:CCS_ReportPageNumber2} " PathID="Report1Page_FooterReport_TotalPages">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="112" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="Basic">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="113" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Navigator>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="103" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Text" parameterSource="s_Facilities" designDefaultValue="3"/>
				<SQLParameter id="104" variable="s_PatientID" parameterType="URL" defaultValue="'%'" dataType="Text" parameterSource="s_PatientID" designDefaultValue="26"/>
				<SQLParameter id="105" variable="s_PregnancyRecNr" dataType="Text" parameterType="URL" parameterSource="s_PregnancyRecNr" defaultValue="'%'" designDefaultValue="1"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="106" name="PatientID" field="PatientID" sqlField="PatientID" sortOrder="asc"/>
				<ReportGroup id="107" name="FamilyName" field="FamilyName" sqlField="FamilyName" sortOrder="asc"/>
				<ReportGroup id="108" name="GivenName" field="GivenName" sqlField="GivenName" sortOrder="asc"/>
				<ReportGroup id="109" name="PregnancyRecNr" field="PregnancyRecNr" sqlField="PregnancyRecNr" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="110" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_risks_facilities_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_risks_facilities.php" forShow="True" url="report_risks_facilities.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="111" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
