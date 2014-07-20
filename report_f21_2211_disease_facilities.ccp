<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="9" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="pregnancySearch" wizardCaption="{res:CCS_SearchFormPrefix} {res:pregnancy} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_f21_2211_disease_facilities.ccp" PathID="pregnancySearch" pasteActions="pasteActions">
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
		<Link id="13" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_f21_2211_disease_facilities.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
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
		<Report id="528" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
complications.ICD10ID = 'O.44.1' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
pcomplications.ICD10ID = 'O.44.1' 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report1" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="TableParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="530" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="532" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
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
				<SQLParameter id="538" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="539" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="540" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="543" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.45.0' 
OR complications.ICD10ID = 'O.67.0' 
OR complications.ICD10ID = 'O.46.0')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.45.0' 
OR pcomplications.ICD10ID = 'O.67.0' 
OR pcomplications.ICD10ID = 'O.46.0') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report2" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
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
				<SQLParameter id="547" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="548" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="549" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="550" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.45.8' 
OR complications.ICD10ID = 'O.45.9')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.45.8' 
OR pcomplications.ICD10ID = 'O.45.9') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



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
				<SQLParameter id="554" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="555" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="556" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="557" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID &gt;= 'O.10.' 
AND complications.ICD10ID &lt;= 'O.16.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID &gt;= 'O.10.' 
AND pcomplications.ICD10ID &lt;= 'O.16.') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report4" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
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
				<SQLParameter id="561" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="562" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="563" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="564" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.11.' 
OR complications.ICD10ID = 'O.13.'
OR complications.ICD10ID &gt;= 'O.14.'
AND complications.ICD10ID &lt;= 'O.15.9')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.11.' 
OR pcomplications.ICD10ID = 'O.13.'
OR pcomplications.ICD10ID &gt;= 'O.14.'
AND pcomplications.ICD10ID &lt;= 'O.15.9') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report5" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
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
				<SQLParameter id="568" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="569" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="570" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="571" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.14.1' 
OR complications.ICD10ID = 'O.15.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.14.1' 
OR pcomplications.ICD10ID = 'O.15.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report6" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
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
				<SQLParameter id="575" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="576" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="577" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="578" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.86.2' 
OR complications.ICD10ID = 'O.86.3')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.86.2' 
OR pcomplications.ICD10ID = 'O.86.3')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report7" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
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
				<SQLParameter id="582" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="583" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="584" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="585" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID &gt;= 'O.24.' 
AND complications.ICD10ID &lt; 'O.25.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID &gt;= 'O.24.' 
AND pcomplications.ICD10ID &lt; 'O.25.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report8" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
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
				<SQLParameter id="589" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="590" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="591" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="592" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.90.5' 
OR complications.ICD10ID = 'O.99.2')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.90.5' 
OR pcomplications.ICD10ID = 'O.99.2')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report9" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
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
				<SQLParameter id="596" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="597" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="598" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="599" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
complications.ICD10ID = 'O.99.2'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
pcomplications.ICD10ID = 'O.99.2'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report10" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
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
				<SQLParameter id="603" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="604" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="605" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="607" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
complications.ICD10ID = 'O.99.0'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
pcomplications.ICD10ID = 'O.99.0'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report11" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="608" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="609" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="610" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report11Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="611" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="612" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="613" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="614" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
complications.ICD10ID = 'O.99.4'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
pcomplications.ICD10ID = 'O.99.4'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report12" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="615" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="616" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="617" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report12Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="618" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="619" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="620" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="621" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID &gt;= 'O.64.' 
AND complications.ICD10ID &lt; 'O.67.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID &gt;= 'O.64.' 
AND pcomplications.ICD10ID &lt; 'O.67.') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report13" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="622" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="623" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="624" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report13Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="625" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="626" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="627" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="628" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID &gt;= 'O.62.' 
AND complications.ICD10ID &lt; 'O.64.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID &gt;= 'O.62.' 
AND pcomplications.ICD10ID &lt; 'O.64.') 
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report14" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="629" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="630" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="631" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report14Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="632" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="633" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="634" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="635" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.70.2' 
OR complications.ICD10ID = 'O.70.3')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.70.2' 
OR pcomplications.ICD10ID = 'O.70.3')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report15" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="636" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="637" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="638" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report15Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="639" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="640" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="641" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="642" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.71.0' 
OR complications.ICD10ID = 'O.71.1')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.71.0' 
OR pcomplications.ICD10ID = 'O.71.1')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report16" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="643" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="644" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="645" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report16Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="646" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="647" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="648" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="649" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.72.0' 
OR complications.ICD10ID = 'O.72.1')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.72.0' 
OR pcomplications.ICD10ID = 'O.72.1')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report17" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="650" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="651" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="652" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report17Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="653" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="654" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="655" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="656" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.75.3' 
OR complications.ICD10ID = 'O.85.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID = 'O.75.3' 
OR pcomplications.ICD10ID = 'O.85.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report18" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="657" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="658" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="659" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report18Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="660" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="661" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="662" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="663" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
complications.ICD10ID = 'O.85.'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
pcomplications.ICD10ID = 'O.85.'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report19" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="664" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="665" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="666" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report19Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="667" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="668" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="669" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="670" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID &gt;= 'O.87.' 
AND complications.ICD10ID &lt; 'O.88.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
(pcomplications.ICD10ID &gt;= 'O.87.' 
AND pcomplications.ICD10ID &lt; 'O.88.')
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report20" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="671" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="672" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="673" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report20Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="674" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="675" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="676" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="677" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
complications.ICD10ID = 'O.91.1'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM (((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID 

WHERE 
pcomplications.ICD10ID = 'O.91.1'
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report21" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="678" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="679" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="680" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report21Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="681" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="682" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="683" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="684" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM ((((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID) LEFT JOIN procedures ON
procedures.DeliveryID = delivery.DeliveryID 

WHERE 
(complications.ICD10ID = 'O.72.0' 
OR complications.ICD10ID = 'O.72.1')
AND procedures.ProcedureTypeID = 24
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM ((((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID) LEFT JOIN procedures ON
procedures.DeliveryID = delivery.DeliveryID

WHERE 
(pcomplications.ICD10ID = 'O.72.0' 
OR pcomplications.ICD10ID = 'O.72.1')
AND procedures.ProcedureTypeID = 24
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report22" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="685" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="686" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="687" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report22Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="688" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="689" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="690" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
<Report id="691" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(disease) FROM
(

SELECT CONCAT(patient.PatientID, complications.ICD10ID) AS disease
FROM ((((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID) LEFT JOIN procedures ON
procedures.DeliveryID = delivery.DeliveryID

WHERE 
complications.ICD10ID = 'O.85.'
AND procedures.ProcedureTypeID = 24
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY complications.ICD10ID

UNION

SELECT CONCAT(patient.PatientID, pcomplications.ICD10ID) AS disease
FROM ((((pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) INNER JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) LEFT JOIN complications ON
complications.DeliveryID = delivery.DeliveryID) LEFT JOIN pcomplications ON
pcomplications.DeliveryID = delivery.DeliveryID) LEFT JOIN procedures ON
procedures.DeliveryID = delivery.DeliveryID 

WHERE 
pcomplications.ICD10ID = 'O.85.'
AND procedures.ProcedureTypeID = 24
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND delivery.FacilityID IN ({s_Facilities})
-- GROUP BY pcomplications.ICD10ID



) AS result
GROUP BY disease " name="Report23" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="692" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="693" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<ReportLabel id="694" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_disease_1" fieldSource="COUNT(disease)" summarised="True" function="Sum" wizardCaption="{res:COUNTdisease}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report23Report_FooterTotalSum_COUNT_disease_1" emptyValue="0">
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
				<SQLParameter id="695" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="696" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="697" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_f21_2211_disease_facilities_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_f21_2211_disease_facilities.php" forShow="True" url="report_f21_2211_disease_facilities.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="606" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
