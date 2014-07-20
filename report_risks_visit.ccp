<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" pasteActions="pasteActions">
	<Components>
		<IncludePage id="2" name="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="36" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Report2" wizardCaption="{res:CCS_SearchFormPrefix} {res:Report1} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_risks_visit.ccp" PathID="Report2" pasteActions="pasteActions">
			<Components>
				<Button id="38" urlType="Relative" enableValidation="True" isDefault="True" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="Report2Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="Report2s_PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="235" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_PatientID" PathID="Report2s_PatientID" caption="{res:PatientID}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_VisitDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="Report2s_VisitDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="70" name="DatePicker_s_BirthDate" control="s_VisitDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="Report2DatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_VisitDate1" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="Report2s_VisitDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="74" name="DatePicker_s_BirthDate1" control="s_VisitDate1" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="Report2DatePicker_s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
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
				<Group id="121" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="156" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="report3" wizardCaption="{res:CCS_SearchFormPrefix} {res:Report1} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_risks_visit.ccp" PathID="report3" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
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
				<TextBox id="438" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_VisitDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="report3s_VisitDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<DatePicker id="440" name="DatePicker_s_BirthDate" control="s_VisitDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="report3DatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
<TextBox id="442" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_VisitDate1" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="report3s_VisitDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<DatePicker id="444" name="DatePicker_s_BirthDate1" control="s_VisitDate1" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="report3DatePicker_s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
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
		<Link id="167" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_risks_visit.ccp" wizardTheme="Basic" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="169" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="168" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="347" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="10000" linesPerPhysicalPage="25" connection="registry_db" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="


SELECT FacilityName, PregnancyRecNr, pregnancy.PatientID AS PatientID, pregnancy.PregnancyID, 
CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, ')') AS Antenatal_Problems, VisitDate

FROM (((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN visitdisease ON
visitdisease.VisitID = visit.VisitID) LEFT JOIN icd10_all ON
visitdisease.ICD10ID = icd10_all.ICD10ID ) LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID


WHERE pregnancy.PatientID LIKE '{s_PatientID}'
AND patient.Discharged = 0
AND PregnancyRecNr LIKE '{s_PregnancyRecNr}'
AND visit.VisitDate &gt;= '{s_VisitDate}'
AND visit.VisitDate &lt;= '{s_VisitDate1}'
AND visit.RiskGroup = 1 
AND DataDelivery IS NULL 
AND pregnancy.FacilityID LIKE '{s_FacilityID}' 

AND visit.VisitID IN 

(SELECT MaxVisitIDs FROM (SELECT PregID, maxDate, (SELECT MAX(VisitID) FROM visit INNER JOIN pregnancy ON pregnancy.PregnancyID = visit.PregnancyID 
WHERE pregnancy.PregnancyID = PregID AND visit.VisitDate= maxDate) AS MaxVisitIDs 
FROM
(SELECT pregnancy.PregnancyID AS PregID, MAX(visit.VisitDate) AS maxDate
FROM visit INNER JOIN pregnancy ON pregnancy.PregnancyID = visit.PregnancyID
WHERE CURDATE( ) &lt; ADDDATE( Calc_DeliveryDate, 31 )
GROUP BY pregnancy.PregnancyID) AS maxDates  ) AS maxd)

ORDER BY pregnancy.PregnancyID ASC, Antenatal_Problems ASC


" name="district_report" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report6} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupAbove">
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
						<ReportLabel id="429" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="VisitDate" PathID="district_reportPregnancyRecNr_HeaderVisitDate" fieldSource="VisitDate">
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
				<Section id="359" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="376" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Antenatal_Problems" fieldSource="Antenatal_Problems" wizardCaption="Antenatal_Problems" wizardSize="50" wizardMaxLength="125" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_reportDetailAntenatal_Problems">
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
				<SQLParameter id="348" variable="s_PatientID" parameterType="URL" defaultValue="'%'" dataType="Text" parameterSource="s_PatientID" designDefaultValue="14"/>
				<SQLParameter id="349" variable="s_PregnancyRecNr" parameterType="URL" defaultValue="'%'" dataType="Text" parameterSource="s_PregnancyRecNr" designDefaultValue="333"/>
				<SQLParameter id="350" variable="s_FacilityID" parameterType="URL" defaultValue="'%'" dataType="Text" parameterSource="s_FacilityID" designDefaultValue="2"/>
				<SQLParameter id="445" variable="s_VisitDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_VisitDate"/>
<SQLParameter id="446" variable="s_VisitDate1" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_VisitDate1"/>
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
		<Report id="391" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="10000" linesPerPhysicalPage="25" connection="registry_db" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT GivenName, FamilyName, FacilityName, PregnancyRecNr, pregnancy.PatientID AS PatientID, pregnancy.PregnancyID, 
CONCAT(DiseaseName, ' (', icd10_all.ICD10ID, ')') AS Antenatal_Problems, VisitDate, FirstName, LastName

FROM ((((((patient INNER JOIN pregnancy ON patient.PatientID = pregnancy.PatientID) INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN visitdisease ON
visitdisease.VisitID = visit.VisitID) LEFT JOIN employees ON
visit.EmployeeID = employees.EmployeeID) LEFT JOIN icd10_all ON
visitdisease.ICD10ID = icd10_all.ICD10ID ) LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN facilities ON pregnancy.FacilityID = facilities.FacilityID

WHERE pregnancy.PatientID LIKE '{s_PatientID}'
AND patient.Discharged = 0
AND PregnancyRecNr LIKE '{s_PregnancyRecNr}'
AND visit.RiskGroup = 1 
AND DataDelivery IS NULL 

AND visit.VisitDate &gt;= '{s_VisitDate}'
AND visit.VisitDate &lt;= '{s_VisitDate1}'


AND pregnancy.FacilityID LIKE '{s_FacilityID}' 
AND visit.VisitID IN 

(SELECT MaxVisitIDs FROM (SELECT PregID, maxDate, (SELECT MAX(VisitID) FROM visit INNER JOIN pregnancy ON pregnancy.PregnancyID = visit.PregnancyID 
WHERE pregnancy.PregnancyID = PregID AND visit.VisitDate= maxDate) AS MaxVisitIDs 
FROM
(SELECT pregnancy.PregnancyID AS PregID, MAX(visit.VisitDate) AS maxDate
FROM visit INNER JOIN pregnancy ON pregnancy.PregnancyID = visit.PregnancyID
WHERE CURDATE( ) &lt; ADDDATE( Calc_DeliveryDate, 31 )
GROUP BY pregnancy.PregnancyID) AS maxDates  ) AS maxd)

ORDER BY pregnancy.PregnancyID ASC, Antenatal_Problems ASC" name="district_report1" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report6} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupAbove">
			<Components>
				<Section id="392" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="393" visible="True" lines="0" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="394" visible="True" lines="1" name="FacilityName_Header" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="395" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" PathID="district_report1FacilityName_HeaderFacilityName" fieldSource="FacilityName">
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
				<Section id="396" visible="True" lines="1" name="PatientID_Header" pasteActions="pasteActions">
					<Components>
						<Link id="397" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="PatientID" fieldSource="PatientID" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_report1PatientID_HeaderPatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="398" sourceType="DataField" name="PatientID" source="PatientID"/>
							</LinkParameters>
						</Link>
						<ReportLabel id="426" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="GivenName" PathID="district_report1PatientID_HeaderGivenName" fieldSource="GivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="427" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FamilyName" PathID="district_report1PatientID_HeaderFamilyName" fieldSource="FamilyName">
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
				<Section id="399" visible="True" lines="2" name="PregnancyRecNr_Header" pasteActions="pasteActions">
					<Components>
						<Link id="400" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="PregnancyRecNr" PathID="district_report1PregnancyRecNr_HeaderPregnancyRecNr" fieldSource="PregnancyRecNr" hrefSource="pregnancy_maint.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="401" sourceType="DataField" format="yyyy-mm-dd" name="PatientID" source="PatientID"/>
								<LinkParameter id="402" sourceType="DataField" format="yyyy-mm-dd" name="PregnancyID" source="PregnancyID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<ReportLabel id="430" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="VisitDate" PathID="district_report1PregnancyRecNr_HeaderVisitDate" fieldSource="VisitDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="447" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" PathID="district_report1PregnancyRecNr_HeaderFirstName" fieldSource="FirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="448" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="LastName" PathID="district_report1PregnancyRecNr_HeaderLastName" fieldSource="LastName">
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
				<Section id="403" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="404" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Antenatal_Problems" fieldSource="Antenatal_Problems" wizardCaption="Antenatal_Problems" wizardSize="50" wizardMaxLength="125" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="district_report1DetailAntenatal_Problems">
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
				<Section id="405" visible="True" lines="0" name="PregnancyRecNr_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="406" visible="True" lines="0" name="PatientID_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="407" visible="True" lines="0" name="FacilityName_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="408" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="409" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="410" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="411" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDateTime" fieldSource="CurrentDateTime" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="district_report1Page_FooterReport_CurrentDateTime">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="412" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentPage" fieldSource="PageNumber" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix="{res:CCS_ReportPageNumber1} " PathID="district_report1Page_FooterReport_CurrentPage">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="413" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalPages" fieldSource="TotalPages" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix=" {res:CCS_ReportPageNumber2} " PathID="district_report1Page_FooterReport_TotalPages">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="414" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="Basic">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="415" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression" eventType="Server"/>
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
				<SQLParameter id="416" variable="s_PatientID" parameterType="URL" defaultValue="'%'" dataType="Text" parameterSource="s_PatientID" designDefaultValue="14"/>
				<SQLParameter id="417" variable="s_PregnancyRecNr" parameterType="URL" defaultValue="'%'" dataType="Text" parameterSource="s_PregnancyRecNr" designDefaultValue="333"/>
				<SQLParameter id="418" variable="s_FacilityID" parameterType="Session" defaultValue="0" dataType="Text" parameterSource="s_Facilities" designDefaultValue="2"/>
				<SQLParameter id="434" variable="s_VisitDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_VisitDate"/>
				<SQLParameter id="435" variable="s_VisitDate1" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_VisitDate1"/>
				<SQLParameter id="436" variable="s_icd10_all_ICD10ID1" parameterType="URL" dataType="Text" parameterSource="s_icd10_all_ICD10ID1" defaultValue="'%'"/>
				<SQLParameter id="437" variable="s_icd10_all_ICD10ID2" parameterType="URL" dataType="Text" parameterSource="s_icd10_all_ICD10ID2" defaultValue="'%'"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="419" name="FacilityName" field="FacilityName" sqlField="FacilityName" sortOrder="asc"/>
				<ReportGroup id="420" name="PatientID" field="PatientID" sqlField="PatientID" sortOrder="asc"/>
				<ReportGroup id="421" name="PregnancyRecNr" field="PregnancyRecNr" sqlField="PregnancyRecNr" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="428" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_risks_visit_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_risks_visit.php" forShow="True" url="report_risks_visit.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="431" groupID="1"/>
		<Group id="432" groupID="3"/>
		<Group id="433" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
