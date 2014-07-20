<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="9" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="pregnancySearch" wizardCaption="{res:CCS_SearchFormPrefix} {res:pregnancy} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_f21_disease_district.ccp" PathID="pregnancySearch" pasteActions="pasteActions">
			<Components>
				<Button id="10" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="pregnancySearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_PregRegDate" wizardCaption="{res:PregRegDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="pregnancySearchs_PregRegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="12" name="DatePicker_s_PregRegDate" control="s_PregRegDate" wizardSatellite="True" wizardControl="s_PregRegDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="pregnancySearchDatePicker_s_PregRegDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="124" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_PregRegDateTo" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="pregnancySearchs_PregRegDateTo" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="126" name="DatePicker_s_PregRegDateTo" control="s_PregRegDateTo" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="pregnancySearchDatePicker_s_PregRegDateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="606" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_FacilityID" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="pregnancySearchs_FacilityID" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName">
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
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="16" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
		<Link id="13" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_f21_disease_district.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="15" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="14" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="528" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (visitdisease.ICD10ID &gt;= 'O.23.' 
AND visitdisease.ICD10ID &lt; 'O.24.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (hospitalisationdischargediagnosis.ICD10ID &gt;= 'O.23.' 
AND hospitalisationdischargediagnosis.ICD10ID &lt; 'O.24.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (obstetric_anamnesis.ICD10ID &gt;= 'O.23.' 
AND obstetric_anamnesis.ICD10ID &lt; 'O.24.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report1" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="530" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="532" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="537" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report1Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="539" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="540" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="607" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
				<Group id="621" groupID="1" read="True"/>
<Group id="622" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="543" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE visitdisease.ICD10ID = 'O.99.4' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE hospitalisationdischargediagnosis.ICD10ID = 'O.99.4' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE obstetric_anamnesis.ICD10ID = 'O.99.4' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report2" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="544" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="545" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="546" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report2Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="548" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="549" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="608" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
				<Group id="623" groupID="1" read="True"/>
<Group id="624" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="550" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (visitdisease.ICD10ID &gt;= 'O.24.' 
AND visitdisease.ICD10ID &lt;= 'O.24.9')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (hospitalisationdischargediagnosis.ICD10ID &gt;= 'O.24.'
AND hospitalisationdischargediagnosis.ICD10ID &lt;= 'O.24.9') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (obstetric_anamnesis.ICD10ID &gt;= 'O.24.'
AND obstetric_anamnesis.ICD10ID &lt;= 'O.24.9') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report3" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="551" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="552" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="553" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="555" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="556" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="609" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
<Group id="625" groupID="1" read="True"/>
<Group id="626" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="557" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE visitdisease.ICD10ID = 'O.99.2' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE hospitalisationdischargediagnosis.ICD10ID = 'O.99.2'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE obstetric_anamnesis.ICD10ID = 'O.99.2' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report4" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="558" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="559" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="560" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report4Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="562" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="563" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="610" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
<Group id="627" groupID="1" read="True"/>
<Group id="628" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="564" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE visitdisease.ICD10ID = 'O.99.0' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE hospitalisationdischargediagnosis.ICD10ID = 'O.99.0'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE obstetric_anamnesis.ICD10ID = 'O.99.0' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report5" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="565" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="566" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="567" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report5Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="569" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="570" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="611" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
<Group id="629" groupID="1" read="True"/>
<Group id="630" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="571" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE visitdisease.ICD10ID = 'O.46.0' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE hospitalisationdischargediagnosis.ICD10ID = 'O.46.0'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE obstetric_anamnesis.ICD10ID = 'O.46.0' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report6" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="572" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="573" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="574" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report6Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="576" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="577" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="612" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
<Group id="631" groupID="1" read="True"/>
<Group id="632" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="578" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (visitdisease.ICD10ID &gt;= 'O.22.' 
AND visitdisease.ICD10ID &lt;= 'O.22.9')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (hospitalisationdischargediagnosis.ICD10ID &gt;= 'O.22.'
AND hospitalisationdischargediagnosis.ICD10ID &lt;= 'O.22.9') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (obstetric_anamnesis.ICD10ID &gt;= 'O.22.'
AND obstetric_anamnesis.ICD10ID &lt;= 'O.22.9') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report7" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="579" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="580" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="581" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report7Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="583" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="584" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="613" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
<Group id="633" groupID="1" read="True"/>
<Group id="634" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="585" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (visitdisease.ICD10ID &gt;= 'O.10.' 
AND visitdisease.ICD10ID &lt;= 'O.16.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'

UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (hospitalisationdischargediagnosis.ICD10ID &gt;= 'O.10.'
AND hospitalisationdischargediagnosis.ICD10ID &lt;= 'O.16.') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (obstetric_anamnesis.ICD10ID &gt;= 'O.10.'
AND obstetric_anamnesis.ICD10ID &lt;= 'O.16.') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report8" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="586" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="587" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="588" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report8Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="590" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="591" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="614" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
<Group id="635" groupID="1" read="True"/>
<Group id="636" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="592" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (visitdisease.ICD10ID = 'O.11.' 
OR visitdisease.ICD10ID = 'O.13.'
OR (visitdisease.ICD10ID &gt;= 'O.14.'
AND visitdisease.ICD10ID &lt; 'O.15.')
OR visitdisease.ICD10ID = 'O.15.0')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (hospitalisationdischargediagnosis.ICD10ID = 'O.11.'
OR hospitalisationdischargediagnosis.ICD10ID = 'O.13.'
OR (hospitalisationdischargediagnosis.ICD10ID &gt;= 'O.14.'
AND hospitalisationdischargediagnosis.ICD10ID &lt; 'O.15.')
OR hospitalisationdischargediagnosis.ICD10ID = 'O.15.0') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (obstetric_anamnesis.ICD10ID = 'O.11.'
OR obstetric_anamnesis.ICD10ID = 'O.13.'
OR (obstetric_anamnesis.ICD10ID &gt;= 'O.14.'
AND obstetric_anamnesis.ICD10ID &lt; 'O.15.')
OR obstetric_anamnesis.ICD10ID = 'O.15.0')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report9" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="593" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="594" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="595" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report9Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="597" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="598" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="615" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
<Group id="637" groupID="1" read="True"/>
<Group id="638" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="599" secured="True" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT( patient.PatientID, visitdisease.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (visitdisease.ICD10ID = 'O.14.1' 
OR visitdisease.ICD10ID = 'O.15.0')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, hospitalisationdischargediagnosis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (hospitalisationdischargediagnosis.ICD10ID = 'O.14.1'
OR hospitalisationdischargediagnosis.ICD10ID = 'O.15.0') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


UNION

SELECT CONCAT( patient.PatientID, obstetric_anamnesis.ICD10ID ) AS disease
FROM (
(
(
(
(
(
(
patient 
LEFT JOIN pregnancy ON pregnancy.PatientID = patient.PatientID
)
LEFT JOIN facilities ON
pregnancy.FacilityID = facilities.FacilityID 
)
LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
)
LEFT JOIN obstetric_anamnesis ON obstetric_anamnesis.PatientID = patient.PatientID
)
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN visitdisease ON visitdisease.VisitID = visit.VisitID
)
LEFT JOIN hospitalisationdischargediagnosis ON hospitalisationdischargediagnosis.HospitalisationID = hospitalisation.HospitalisationID
WHERE (obstetric_anamnesis.ICD10ID = 'O.14.1'
OR obstetric_anamnesis.ICD10ID = 'O.15.0')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID LIKE '{s_FacilityID}'


) AS result
GROUP BY disease 

" name="Report10" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="600" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="601" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="602" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report10Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="604" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="605" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="616" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'" designDefaultValue="2"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups>
<Group id="639" groupID="1" read="True"/>
<Group id="640" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_f21_disease_district_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_f21_disease_district.php" forShow="True" url="report_f21_disease_district.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="541" groupID="1"/>
		<Group id="542" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
