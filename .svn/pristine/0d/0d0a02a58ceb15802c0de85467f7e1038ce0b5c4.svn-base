<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" connection="registry_db" dataSource="SELECT pregnancy.PregnancyID AS pregnancy_PregnancyID, PregnancyRecNr, FirstName, LastName, VisitDate, GivenName, FamilyName,
patient.PatientID AS patient_PatientID, Town, MobilePhone, RecomObstetricExaminationDate AS EncDate, 
hospitalisation.HospitalisationID AS hospitalisation_HospitalisationID,
pregnancy.FacilityID AS pregnancy_FacilityID, employees.EmployeeID 
FROM (((pregnancy INNER JOIN employees ON
employees.EmployeeID = pregnancy.EmployeeID) RIGHT JOIN patient ON
pregnancy.PatientID = patient.PatientID) LEFT JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN hospitalisation ON
hospitalisation.PregnancyID = pregnancy.PregnancyID
WHERE pregnancy.FacilityID IN ({s_Facilities})
AND employees.LastName LIKE '%{s_LastName}%'
AND employees.FirstName LIKE '%{s_FirstName}%'
AND patient.FamilyName LIKE '%{s_FamilyName}%'
AND patient.GivenName LIKE '%{s_GivenName}%'
AND patient.PatientID LIKE '{s_PatientID}'
AND patient.Discharged = 0
AND pregnancy.PregnancyRecNr LIKE '{s_PregnancyRecNr}'
AND RecomObstetricExaminationDate &gt;= '{s_EarliestVisitDate}' 
AND RecomObstetricExaminationDate &lt;= '{s_LatestVisitDate}' 
AND (RecomObstetricExaminationDate &gt;= CURRENT_DATE)

UNION

SELECT pregnancy.PregnancyID AS pregnancy_PregnancyID, PregnancyRecNr, FirstName, LastName, VisitDate, GivenName, FamilyName,
patient.PatientID AS patient_PatientID, Town, MobilePhone, NextVisit AS EncDate, 
hospitalisation.HospitalisationID AS hospitalisation_HospitalisationID,
pregnancy.FacilityID AS pregnancy_FacilityID, employees.EmployeeID
FROM (((pregnancy INNER JOIN employees ON
employees.EmployeeID = pregnancy.EmployeeID) RIGHT JOIN patient ON
pregnancy.PatientID = patient.PatientID) LEFT JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN hospitalisation ON
hospitalisation.PregnancyID = pregnancy.PregnancyID
WHERE pregnancy.FacilityID IN ({s_Facilities})
AND employees.LastName LIKE '%{s_LastName}%'
AND employees.FirstName LIKE '%{s_FirstName}%'
AND patient.FamilyName LIKE '%{s_FamilyName}%'
AND patient.GivenName LIKE '%{s_GivenName}%'
AND patient.PatientID LIKE '{s_PatientID}'
AND patient.Discharged = 0
AND pregnancy.PregnancyRecNr LIKE '{s_PregnancyRecNr}'
AND NextVisit &gt;= '{s_EarliestVisitDate}' 
AND NextVisit &lt;= '{s_LatestVisitDate}' 
AND (NextVisit &gt;= CURRENT_DATE)" activeCollection="SQLParameters" name="visit_referral_pregnancy" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:visitreferralpregnancypatientemployees} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="49" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
						<ReportLabel id="58" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="visit_referral_pregnancyReport_HeaderReport_TotalRecords">
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
				<Section id="50" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteActions="pasteActions" wizardAllowSorting="True">
					<Components>
						<Sorter id="71" visible="True" name="Sorter_NextVisit" column="EncDate" wizardCaption="{res:NextVisit}" wizardSortingType="SimpleDir" wizardControl="NextVisit">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="77" visible="True" name="Sorter_Town" column="Town" wizardCaption="{res:Town}" wizardSortingType="SimpleDir" wizardControl="Town">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="79" visible="True" name="Sorter_MobilePhone" column="MobilePhone" wizardCaption="{res:MobilePhone}" wizardSortingType="SimpleDir" wizardControl="MobilePhone">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="84" visible="True" name="PatientID1" wizardSortingType="SimpleDir" PathID="visit_referral_pregnancyPage_HeaderPatientID1" wizardCaption="{res:FamilyName}" column="patient.PatientID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="100" visible="True" name="Sorter_PregnancyRecNr" column="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr" connection="registry_db">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="112" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="visit_referral_pregnancyPage_HeaderSorter1" wizardCaption="{res:FirstNamePatient1}" column="GivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="139" visible="True" name="Sorter2" wizardSortingType="SimpleDir" PathID="visit_referral_pregnancyPage_HeaderSorter2" wizardCaption="{res:LastNamePatient1}" column="FamilyName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="52" visible="True" lines="1" name="EmployeeID_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="74" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="LastName" fieldSource="LastName" wizardCaption="LastName" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="visit_referral_pregnancyEmployeeID_HeaderLastName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="76" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="visit_referral_pregnancyEmployeeID_HeaderFirstName">
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
				<Section id="53" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="68" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="visit_referral_pregnancyDetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="70" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="GivenName" fieldSource="GivenName" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="visit_referral_pregnancyDetailGivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="72" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="NextVisit" fieldSource="EncDate" wizardCaption="NextVisit" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="visit_referral_pregnancyDetailNextVisit" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="78" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Town" fieldSource="Town" wizardCaption="Town" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="visit_referral_pregnancyDetailTown">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="80" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MobilePhone" fieldSource="MobilePhone" wizardCaption="MobilePhone" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="visit_referral_pregnancyDetailMobilePhone">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Link id="83" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="PatientID" fieldSource="patient_PatientID" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="visit_referral_pregnancyDetailPatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="89" sourceType="DataField" name="PatientID" source="patient_PatientID"/>
							</LinkParameters>
						</Link>
						<Link id="85" fieldSourceType="DBColumn" dataType="Memo" html="False" name="FamilyName" fieldSource="FamilyName" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="visit_referral_pregnancyDetailFamilyName" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="86" sourceType="DataField" name="PatientID" source="patient_PatientID"/>
							</LinkParameters>
						</Link>
						<ReportLabel id="101" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PregnancyRecNr" fieldSource="PregnancyRecNr" wizardCaption="PregnancyRecNr" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="visit_referral_pregnancyDetailPregnancyRecNr">
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
				<Section id="54" visible="True" lines="0" name="EmployeeID_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="55" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="56" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="57" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="60" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="visit_referral_pregnancyPage_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="61" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="62" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
			<TableParameters>
				<TableParameter id="91" conditionType="Parameter" useIsNull="False" field="pregnancy.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" leftBrackets="0" rightBrackets="0" parameterSource="s_Facilities"/>
				<TableParameter id="132" conditionType="Parameter" useIsNull="False" field="employees.LastName" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_LastName" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="133" conditionType="Parameter" useIsNull="False" field="employees.FirstName" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_FirstName" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="135" conditionType="Parameter" useIsNull="False" field="patient.FamilyName" dataType="Memo" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_FamilyName" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="136" conditionType="Parameter" useIsNull="False" field="patient.GivenName" dataType="Memo" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_GivenName" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="137" conditionType="Parameter" useIsNull="False" field="patient.PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_PatientID" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="96" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyRecNr" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_PregnancyRecNr" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="134" conditionType="Parameter" useIsNull="False" field="visit.NextVisit" dataType="Date" searchConditionType="Equal" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" leftBrackets="1" rightBrackets="0" parameterSource="s_NextVisit"/>
				<TableParameter id="90" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="Or" expression="visit.NextVisit&gt;=CURRENT_DATE" leftBrackets="0" rightBrackets="1"/>
				<TableParameter id="148" conditionType="Parameter" useIsNull="False" field="hospitalisation.RecomObstetricExaminationDate" dataType="Date" searchConditionType="Equal" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_NextVisit" rightBrackets="0" leftBrackets="1"/>
				<TableParameter id="147" conditionType="Expression" useIsNull="False" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="Expression" logicOperator="And" expression="hospitalisation.RecomObstetricExaminationDate&gt;=CURRENT_DATE" rightBrackets="1" field="hospitalisation.RecomObstetricExaminationDate" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="CURRENT_DATE" leftBrackets="0"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="157" parameterType="Session" variable="s_Facilities" dataType="Integer" format="0;(0)" parameterSource="s_Facilities" defaultValue="0"/>
<SQLParameter id="158" parameterType="URL" variable="s_LastName" dataType="Text" parameterSource="s_LastName" defaultValue="'%'"/><SQLParameter id="159" parameterType="URL" variable="s_FirstName" dataType="Text" parameterSource="s_FirstName" defaultValue="'%'"/><SQLParameter id="160" parameterType="URL" variable="s_FamilyName" dataType="Memo" parameterSource="s_FamilyName" defaultValue="'%'"/><SQLParameter id="161" parameterType="URL" variable="s_GivenName" dataType="Memo" parameterSource="s_GivenName" defaultValue="'%'"/><SQLParameter id="162" parameterType="URL" variable="s_PatientID" dataType="Text" parameterSource="s_PatientID" defaultValue="'%'"/><SQLParameter id="163" parameterType="URL" variable="s_PregnancyRecNr" dataType="Text" parameterSource="s_PregnancyRecNr" defaultValue="'%'"/><SQLParameter id="164" parameterType="URL" variable="s_EarliestVisitDate" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_EarliestVisitDate" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
<SQLParameter id="168" variable="s_LatestVisitDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;9999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_LatestVisitDate"/>
</SQLParameters>
			<ReportGroups>
				<ReportGroup id="169" name="EmployeeID" field="EmployeeID" sqlField="EmployeeID" sortOrder="asc"/>
</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="37" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="employees_patient_pregnan" wizardCaption="{res:CCS_SearchFormPrefix} {res:employees_patient_pregnan} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_visit_date.ccp" PathID="employees_patient_pregnan" pasteActions="pasteActions">
			<Components>
				<Button id="38" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="employees_patient_pregnanButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_LastName" wizardCaption="{res:LastName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" PathID="employees_patient_pregnans_LastName" caption="{res:LastNameDoctor}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" wizardCaption="{res:FirstName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" PathID="employees_patient_pregnans_FirstName" caption="{res:FirstNameDoctor}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_FamilyName" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" PathID="employees_patient_pregnans_FamilyName" caption="{res:FamilyNamePatient}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_GivenName" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" PathID="employees_patient_pregnans_GivenName" caption="{res:GivenNamePatient}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_PatientID" PathID="employees_patient_pregnans_PatientID" caption="{res:PatientID}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="103" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="employees_patient_pregnans_PregnancyRecNr" caption="{res:PregnancyRecNr}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_EarliestVisitDate" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="employees_patient_pregnans_EarliestVisitDate" caption="{res:NextVisit}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<DatePicker id="42" name="s_EarliestVisitDateDatePicker" control="s_EarliestVisitDate" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="employees_patient_pregnans_EarliestVisitDateDatePicker">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
<TextBox id="167" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_LatestVisitDate" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="employees_patient_pregnans_LatestVisitDate" caption="{res:NextVisit}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<DatePicker id="95" name="s_LatestVisitDateDatePicker" control="s_LatestVisitDate" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="employees_patient_pregnans_LatestVisitDateDatePicker">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="48" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
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
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Link id="45" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_visit_date.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="47" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="46" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_visit_date_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_visit_date.php" forShow="True" url="report_visit_date.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="138" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
