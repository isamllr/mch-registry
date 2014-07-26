<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" pasteActions="pasteActions">
	<Components>
		<IncludePage id="2" name="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="156" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="report3" wizardCaption="{res:CCS_SearchFormPrefix} {res:Report1} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_risks.ccp" PathID="report3" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Button id="158" urlType="Relative" enableValidation="True" isDefault="True" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="report3Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="159" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="report3s_PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="197" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_FacilityID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="report3s_FacilityID" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="236" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_PatientID" PathID="report3s_PatientID" caption="{res:PatientID}">
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
				<Group id="160" groupID="1" read="True"/>
				<Group id="161" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Link id="167" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_risks.ccp" wizardTheme="Basic" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="169" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="168" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="347" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="25" connection="registry_db" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT * 
FROM

(

SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, 
pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, ')') AS Medical_Anamnesis, NULL AS Bad_Habits, 
NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, NULL AS HospAdmReason, NULL AS HospDiscReason, 
NULL AS GenHospDate, patient.Discharged AS Disc
FROM ((((patient INNER JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID) 
INNER JOIN pregnancy ON pregnancy.PatientID = patient.PatientID) 
INNER JOIN icd10_all ON obstetric_anamnesis.ICD10ID = icd10_all.ICD10ID) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID
GROUP BY Medical_Anamnesis, pregnancy.PregnancyID

UNION 

SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, 
pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, BadHabbitsName AS Bad_Habits, 
NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, NULL AS HospAdmReason, 
NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc
FROM ((((patient INNER JOIN pregnancy ON pregnancy.PatientID = patient.PatientID) INNER JOIN bad_habbits ON bad_habbits.PatientID = patient.PatientID) 
INNER JOIN bad_habbitstype ON bad_habbits.BadHabbitsTypeID = bad_habbitstype.BadHabbitsTypeID) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID
GROUP BY Bad_Habits, pregnancy.PregnancyID

UNION

SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, 
pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, 
CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(VisitDate AS CHAR)) AS Antenatal_Problems, VisitDate AS VisitDateProbs, NULL AS Abnormal_Test_Results, 
NULL AS VisitDateTests, NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc
FROM (((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) 
INNER JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN visitdisease ON visitdisease.VisitID = visit.VisitID) 
INNER JOIN icd10_all ON visitdisease.ICD10ID = icd10_all.ICD10ID) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID
GROUP BY Antenatal_Problems, pregnancy.PregnancyID

UNION

SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID,  
pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, 
NULL AS Antenatal_Problems, NULL AS VisitDateProbs, CONCAT(TestName, ', ', CAST(VisitDate AS CHAR)) AS Abnormal_Test_Results, VisitDate AS VisitDateTests, 
NULL AS HospAdmReason, NULL AS HospDiscReason, NULL AS GenHospDate, patient.Discharged AS Disc
FROM (((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) 
INNER JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN test ON test.VisitID = visit.VisitID) 
INNER JOIN testcode ON test.TestCodeID = testcode.TestCodeID) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID
WHERE TestResultNormal = 0 
GROUP BY Abnormal_Test_Results, pregnancy.PregnancyID

UNION

SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, 
pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, 
NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, 
CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(AdmissionDate AS CHAR)) AS HospAdmReason, NULL AS HospDiscReason, 
AdmissionDate AS GenHospDate, patient.Discharged AS Disc
FROM (((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) 
INNER JOIN hospitalisation ON pregnancy.PregnancyID = hospitalisation.PregnancyID) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) 
LEFT JOIN reasonhospitalisation ON hospitalisation.HospitalisationID = reasonhospitalisation.HospitalisationID)
INNER JOIN icd10_all ON reasonhospitalisation.ICD10ID = icd10_all.ICD10ID) 
INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID
GROUP BY HospAdmReason, pregnancy.PregnancyID 

UNION

SELECT FacilityName, PregnancyRecNr, Calc_DeliveryDate, DataDelivery, pregnancy.PatientID AS PatientID, 
pregnancy.FacilityID AS preg_facility_id, pregnancy.PregnancyID, NULL AS Medical_Anamnesis, NULL AS Bad_Habits, 
NULL AS Antenatal_Problems, NULL AS VisitDateProbs, NULL AS Abnormal_Test_Results, NULL AS VisitDateTests, 
NULL AS HospAdmReason, CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, '), ', CAST(hospitalisation.DischargeDate AS CHAR)) AS HospDiscReason, 
hospitalisation.DischargeDate AS GenHospDate, patient.Discharged AS Disc
FROM (((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) 
INNER JOIN hospitalisation ON pregnancy.PregnancyID = hospitalisation.PregnancyID) 
INNER JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID)
INNER JOIN icd10_all ON hospitalisationdischargediagnosis.ICD10ID = icd10_all.ICD10ID) 
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID
WHERE hospitalisation.DischargeDate IS NOT NULL
GROUP BY HospDiscReason, pregnancy.PregnancyID 

) 

AS result 

WHERE PatientID LIKE '{s_PatientID}' AND PregnancyRecNr LIKE '{s_PregnancyRecNr}' AND CURDATE() &lt; ADDDATE(Calc_DeliveryDate, 31) AND 
DataDelivery IS NULL AND preg_facility_id LIKE '{s_FacilityID}' AND Disc = 0
ORDER BY PregnancyID ASC, GenHospDate ASC, HospDiscReason ASC, HospAdmReason ASC, VisitDateTests ASC, Abnormal_Test_Results ASC, 
VisitDateProbs ASC, Antenatal_Problems ASC, Bad_Habits ASC, Medical_Anamnesis ASC" name="district_report" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report6} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupAbove">
			<Components>
				<Section id="351" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="352" visible="True" lines="0" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="354" visible="True" lines="1" name="FacilityName_Header" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="390" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" PathID="district_reportFacilityName_HeaderFacilityName" fieldSource="FacilityName">
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
				<Section id="356" visible="True" lines="1" name="PatientID_Header" pasteActions="pasteActions">
					<Components>
						<Link id="384" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="PatientID" fieldSource="PatientID" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_reportPatientID_HeaderPatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_district.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="385" sourceType="DataField" name="PatientID" source="PatientID"/>
							</LinkParameters>
						</Link>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="358" visible="True" lines="2" name="PregnancyRecNr_Header" pasteActions="pasteActions">
					<Components>
						<Link id="387" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="PregnancyRecNr" PathID="district_reportPregnancyRecNr_HeaderPregnancyRecNr" fieldSource="PregnancyRecNr" hrefSource="pregnancy_maint.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="388" sourceType="DataField" format="yyyy-mm-dd" name="PatientID" source="PatientID"/>
								<LinkParameter id="389" sourceType="DataField" format="yyyy-mm-dd" name="PregnancyID" source="PregnancyID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="359" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="374" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Medical_Anamnesis" fieldSource="Medical_Anamnesis" wizardCaption="Medical_Anamnesis" wizardSize="50" wizardMaxLength="113" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_reportDetailMedical_Anamnesis">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="375" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Bad_Habits" fieldSource="Bad_Habits" wizardCaption="Bad_Habits" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_reportDetailBad_Habits">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="376" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Antenatal_Problems" fieldSource="Antenatal_Problems" wizardCaption="Antenatal_Problems" wizardSize="50" wizardMaxLength="125" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_reportDetailAntenatal_Problems">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="377" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Abnormal_Test_Results" fieldSource="Abnormal_Test_Results" wizardCaption="Abnormal_Test_Results" wizardSize="50" wizardMaxLength="112" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_reportDetailAbnormal_Test_Results">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="378" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="HospAdmReason" fieldSource="HospAdmReason" wizardCaption="HospAdmReason" wizardSize="50" wizardMaxLength="125" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_reportDetailHospAdmReason">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="379" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="HospDiscReason" fieldSource="HospDiscReason" wizardCaption="HospDiscReason" wizardSize="50" wizardMaxLength="125" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_reportDetailHospDiscReason">
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
				<Section id="360" visible="True" lines="0" name="PregnancyRecNr_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="361" visible="True" lines="0" name="PatientID_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="362" visible="True" lines="0" name="FacilityName_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="363" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="364" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="365" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="369" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDateTime" fieldSource="CurrentDateTime" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="district_reportPage_FooterReport_CurrentDateTime">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="370" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentPage" fieldSource="PageNumber" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix="{res:CCS_ReportPageNumber1} " PathID="district_reportPage_FooterReport_CurrentPage">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="371" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalPages" fieldSource="TotalPages" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix=" {res:CCS_ReportPageNumber2} " PathID="district_reportPage_FooterReport_TotalPages">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="372" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="Basic">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="373" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression" eventType="Server"/>
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
				<SQLParameter id="348" variable="s_PatientID" parameterType="URL" defaultValue="'%'" dataType="Text" parameterSource="s_PatientID"/>
				<SQLParameter id="349" variable="s_PregnancyRecNr" parameterType="URL" defaultValue="'%'" dataType="Text" parameterSource="s_PregnancyRecNr"/>
				<SQLParameter id="350" variable="s_FacilityID" parameterType="URL" defaultValue="'%'" dataType="Text" parameterSource="s_FacilityID"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="353" name="FacilityName" field="FacilityName" sqlField="FacilityName" sortOrder="asc"/>
				<ReportGroup id="355" name="PatientID" field="PatientID" sqlField="PatientID" sortOrder="asc"/>
				<ReportGroup id="357" name="PregnancyRecNr" field="PregnancyRecNr" sqlField="PregnancyRecNr" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="380" groupID="1" read="True"/>
				<Group id="381" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="report_risks.php" forShow="True" url="report_risks.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="report_risks_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="41" groupID="1"/>
		<Group id="42" groupID="3"/>
		<Group id="43" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
