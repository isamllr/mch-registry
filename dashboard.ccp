<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" connection="openmedis_db" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Label id="389" fieldSourceType="DBColumn" dataType="Date" html="True" name="s_TodayDate" PathID="s_TodayDate" format="dddd, mmmm d, yyyy" DBFormat="yyyy-mm-dd HH:nn:ss">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="391" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="392" fieldSourceType="DBColumn" dataType="Text" html="False" name="s_CurrentUser" PathID="s_CurrentUser">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Retrieve Value for Control" actionCategory="General" id="396" name="s_CurrentUser" sourceType="Session" sourceName="UserLogin" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="394" fieldSourceType="DBColumn" dataType="Text" html="False" name="s_ActiveDatabase" PathID="s_ActiveDatabase">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="DLookup" actionCategory="Database" id="397" typeOfTarget="Control" dataType="Text" target="s_ActiveDatabase" connection="registry_db" expression="&quot;DATABASE()&quot;" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Label>
		<IncludePage id="439" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Label id="404" fieldSourceType="DBColumn" dataType="Text" html="False" name="s_Facilities" PathID="s_Facilities">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="DLookup" actionCategory="Database" id="405" typeOfTarget="Control" connection="registry_db" expression="&quot;COUNT(*)&quot;" domain="facilities" dataType="Text" target="s_Facilities" id_oncopy="405" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="473" fieldSourceType="DBColumn" dataType="Text" html="False" name="DatabaseVersion" PathID="DatabaseVersion">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="474" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Label>
		<Report id="479" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="10000" linesPerPhysicalPage="25" connection="registry_db" dataSource="patient, facilities" activeCollection="TableParameters" groupBy="FacilityName" name="patient_facilities" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:patientfacilities} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular">
			<Components>
				<Section id="490" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="491" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="492" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="497" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" fieldSource="FacilityName" wizardCaption="FacilityName" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_facilitiesDetailFacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="498" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="NumberPatients" fieldSource="NumberPatients" wizardCaption="NumberPatients" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="patient_facilitiesDetailNumberPatients">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Panel id="499" visible="True" name="Separator">
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
				<Section id="493" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="494" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="496" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_NumberPatients" fieldSource="NumberPatients" summarised="True" function="Sum" wizardCaption="{res:NumberPatients}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="patient_facilitiesReport_FooterTotalSum_NumberPatients">
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
				<Section id="495" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables>
				<JoinTable id="480" tableName="patient" posLeft="10" posTop="10" posWidth="138" posHeight="180"/>
				<JoinTable id="486" tableName="facilities" posLeft="169" posTop="10" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="487" tableLeft="patient" tableRight="facilities" fieldLeft="patient.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="485" fieldName="COUNT(*)" isExpression="True" alias="NumberPatients"/>
				<Field id="489" tableName="facilities" fieldName="FacilityName"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<IncludePage id="500" name="news" PathID="news" page="news.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="501" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT * FROM
(
SELECT patient.PatientID AS patient_PatientID, VisitDate AS DateRef, RefIndicationName,  DepartmentDesc, GivenName AS GivenName, FamilyName AS FamilyName, 
referral.FacilityID AS refFacility, referraltype.TypeName as TypeName
FROM (((((pregnancy INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN referral ON
referral.VisitID = visit.VisitID) INNER JOIN department ON
referral.DeptID = department.DeptID) INNER JOIN refindication ON
referral.IndicationID = refindication.IndicationID) INNER JOIN referraltype ON
referral.ReferralTypeID = referraltype.ReferralTypeID 

UNION

SELECT patient.PatientID AS patient_PatientID, hospitalisation.AdmissionDate AS DateRef,  RefIndicationName, DepartmentDesc, GivenName AS GivenName, FamilyName AS FamilyName,
referralhosp.FacilityID AS refFacility, 'res:RefDelivery' as TypeName
FROM ((((pregnancy INNER JOIN hospitalisation ON
hospitalisation.PregnancyID = pregnancy.PregnancyID) INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN referralhosp ON
referralhosp.HospitalisationID = hospitalisation.HospitalisationID) INNER JOIN department ON
referralhosp.DeptID = department.DeptID) INNER JOIN refindication ON
referralhosp.IndicationID = refindication.IndicationID

) AS res
WHERE refFacility = {s_Facilities}
AND ( CURDATE() &lt;= ADDDATE(DateRef, 30) ) 
ORDER BY DateRef DESC" activeCollection="SQLParameters" name="refLast30Days" orderBy="VisitDate" wizardCaption="{res:CCS_ReportFormPrefix} {res:referralrefindicationdepartmentvisitpregnancypatient} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="527" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="528" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="533" visible="True" name="Sorter_patient_PatientID" column="patient.PatientID" wizardCaption="{res:patientPatientID}" wizardSortingType="Simple" wizardControl="patient_PatientID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="539" visible="True" name="Sorter_ReferralDate" column="VisitDate" wizardCaption="{res:VisitDate}" wizardSortingType="Simple" wizardControl="VisitDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="541" visible="True" name="Sorter_RefIndicationName" column="RefIndicationName" wizardCaption="{res:RefIndicationName}" wizardSortingType="Simple" wizardControl="RefIndicationName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="543" visible="True" name="Sorter_DepartmentDesc" column="DepartmentDesc" wizardCaption="{res:DepartmentDesc}" wizardSortingType="Simple" wizardControl="DepartmentDesc">
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
				<Section id="529" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="536" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="GivenName" fieldSource="GivenName" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="refLast30DaysDetailGivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="538" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="FamilyName" fieldSource="FamilyName" wizardCaption="FamilyName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="refLast30DaysDetailFamilyName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="540" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="ReferralDate" fieldSource="DateRef" wizardCaption="VisitDate" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="refLast30DaysDetailReferralDate" DBFormat="yyyy-mm-dd HH:nn:ss">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="542" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="RefIndicationName" fieldSource="RefIndicationName" wizardCaption="RefIndicationName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="refLast30DaysDetailRefIndicationName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="544" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="DepartmentDesc" fieldSource="DepartmentDesc" wizardCaption="DepartmentDesc" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="refLast30DaysDetailDepartmentDesc">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Link id="554" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="PatientID" PathID="refLast30DaysDetailPatientID" fieldSource="patient_PatientID" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="555" sourceType="DataField" format="yyyy-mm-dd" name="PatientID" source="patient_PatientID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<ReportLabel id="558" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="TypeName" PathID="refLast30DaysDetailTypeName" fieldSource="TypeName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="559"/>
</Actions>
</Event>
</Events>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="530" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="531" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="532" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="556"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="525" conditionType="Parameter" useIsNull="False" field="referral.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="Session" logicOperator="And" defaultValue="0" parameterSource="s_Facilities"/>
				<TableParameter id="526" conditionType="Expression" useIsNull="False" field="visit.VisitDate" dataType="Date" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_TimeSpan" expression="CURDATE() &lt; ADDDATE(visit.VisitDate, s_TimeFrame)"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="550" parameterType="Session" variable="s_Facilities" dataType="Text" parameterSource="s_Facilities" defaultValue="0" designDefaultValue="17"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
				<Group id="553" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="dashboard_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="dashboard.php" forShow="True" url="dashboard.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="475" groupID="1"/>
		<Group id="476" groupID="3"/>
		<Group id="477" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="478"/>
			</Actions>
		</Event>
		<Event name="OnLoad" type="Client">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="557"/>
			</Actions>
		</Event>
	</Events>
</Page>
