<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="9" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="pregnancySearch" wizardCaption="{res:CCS_SearchFormPrefix} {res:pregnancy} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_f21_facilities.ccp" PathID="pregnancySearch" pasteActions="pasteActions">
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
		<Link id="13" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_f21_facilities.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
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
		<Report id="132" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS pregnancy_PregnancyID
FROM delivery LEFT JOIN pregnancy ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND pregnancy.FacilityID IN ({s_Facilities})" name="pregnancy1" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:pregnancy} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="136" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="137" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="594" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_PregnancyID1" summarised="True" wizardCaption="{res:PregnancyID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="pregnancy1Page_HeaderTotalCount_PregnancyID1" fieldSource="pregnancy_PregnancyID" format="0">
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
				<Section id="138" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="139" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="140" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="141" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="147" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<TableParameter id="148" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<TableParameter id="531" conditionType="Parameter" useIsNull="False" field="pregnancy.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
				<TableParameter id="591" conditionType="Parameter" useIsNull="False" field="delivery.PregnancyOutcome1ID" dataType="Integer" searchConditionType="GreaterThan" parameterType="Expression" logicOperator="And" parameterSource="0"/>
				<TableParameter id="592" conditionType="Parameter" useIsNull="False" field="delivery.PregnancyOutcome1ID" dataType="Integer" searchConditionType="LessThan" parameterType="Expression" logicOperator="And" parameterSource="3"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="595" parameterType="URL" variable="s_PregRegDate" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_PregRegDate" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="596" parameterType="URL" variable="s_PregRegDateTo" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_PregRegDateTo" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="597" parameterType="Session" variable="s_Facilities" dataType="Integer" format="0;(0)" parameterSource="s_Facilities" defaultValue="0"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="209" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, COUNT(DISTINCT pregnancy.PregnancyID) AS TotalPreg
FROM pregnancy LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE pregnancy.GestationAge &lt;= 12
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' 
AND pregnancy.FacilityID IN ({s_Facilities})

UNION

SELECT 1 AS Age, (
(SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS TotalPreg
FROM pregnancy LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE 
delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND pregnancy.FacilityID IN ({s_Facilities}) 

)
-
(SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS TotalPreg
FROM pregnancy LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE pregnancy.GestationAge &lt;= 12
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' 
AND pregnancy.FacilityID IN ({s_Facilities})
)
)" name="Report1" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="210" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="4" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="211" visible="True" name="Sorter_TotalPreg" column="TotalPreg" wizardCaption="{res:TotalPreg}" wizardSortingType="SimpleDir" wizardControl="TotalPreg">
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
				<Section id="5" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="212" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="8" wizardMaxLength="8" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report1DetailAge">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="213"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="214" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalPreg" wizardCaption="TotalPreg" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report1DetailTotalPreg" fieldSource="TotalPreg">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="217" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="TotalPreg1" wizardCaption="TotalPreg" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report1DetailTotalPreg1" fieldSource="TotalPreg" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="602"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="6" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="7" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="218" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_TotalPreg" fieldSource="TotalPreg" summarised="True" function="Sum" wizardCaption="{res:TotalPreg}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report1Report_FooterTotalSum_TotalPreg">
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
				<Section id="219" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
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
				<SQLParameter id="220" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="221" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="528" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="22" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Admitted, COUNT(DISTINCT pregnancy.PregnancyID) AS Totalpatient 
FROM (pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE patient.Admitted = 1 
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' 
AND pregnancy.FacilityID IN ({s_Facilities}) 

UNION

SELECT 1 AS Admitted,(
(SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS Totalpatient 
FROM (pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE 
delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND pregnancy.FacilityID IN ({s_Facilities})
)
-
(SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS Totalpatient 
FROM (pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE patient.Admitted = 1 
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities}) 
)
)" name="Report3" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report2} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="23" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="24" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="25" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="31" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Admitted" fieldSource="Admitted" wizardCaption="Admitted" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report3DetailAdmitted">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="225"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="33" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Totalpatient" fieldSource="Totalpatient" wizardCaption="Totalpatient" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report3DetailTotalpatient">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="34" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="Totalpatient1" fieldSource="Totalpatient" wizardCaption="Totalpatient" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report3DetailTotalpatient1" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="603"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="26" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="27" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="29" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_Totalpatient" summarised="True" function="Sum" wizardCaption="{res:Totalpatient}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3Report_FooterTotalCount_Totalpatient" fieldSource="Totalpatient">
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
				<Section id="28" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="598"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="226" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="227" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="529" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="228" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Discharged, COUNT(DISTINCT pregnancy.PregnancyID) AS Totalpatient 
FROM (pregnancy INNER JOIN patient ON
pregnancy.PatientID = patient.PatientID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE patient.Discharged = 1 
AND pregnancy.PregRegDate &gt;= '{s_PregRegDate}' 
AND pregnancy.PregRegDate &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities}) 
" name="Report4" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report4} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="229" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="230" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="231" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="237" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Discharged" fieldSource="Discharged" wizardCaption="Discharged" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report4DetailDischarged">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="241"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="239" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Totalpatient" fieldSource="Totalpatient" wizardCaption="Totalpatient" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report4DetailTotalpatient">
							<Components/>
							<Events>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="232" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="233" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="234" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="599"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="242" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="243" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="530" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="35" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, COUNT(DISTINCT pregnancy.PregnancyID)AS PPP 
FROM ((pregnancy INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID = 3 
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})

UNION

SELECT 1 AS Age,(
(SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS PPP
FROM ((pregnancy LEFT JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE 
((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
) 
- 
(SELECT COUNT(DISTINCT pregnancy.PregnancyID)AS PPP 
FROM ((pregnancy INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID = 3 
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
)

)" name="Report5" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report3} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="36" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="37" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="38" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="48" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="patient_PatientID" fieldSource="PPP" wizardCaption="patient_PatientID" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report5Detailpatient_PatientID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="244" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="F21HIV" PathID="Report5DetailF21HIV" fieldSource="Age">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="245"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="246" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="patient_PatientID1" fieldSource="PPP" wizardCaption="patient_PatientID" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report5Detailpatient_PatientID1" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="605"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="39" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="40" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="43" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_patient_PatientID" fieldSource="PPP" summarised="True" function="Sum" wizardCaption="{res:patient_PatientID}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report5Report_FooterTotalSum_patient_PatientID">
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
				<Section id="41" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="394" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="395" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="532" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="247" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, COUNT( DISTINCT pregnancy.PregnancyID ) AS PPP
FROM 
((pregnancy
INNER JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID)
INNER JOIN test ON test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID =3
AND test.TestResultNormal =0
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities}) 
UNION

SELECT 1 AS Age, (
(

SELECT COUNT( DISTINCT pregnancy.PregnancyID ) AS PPP
FROM 
((pregnancy
LEFT JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID
)
LEFT JOIN test ON test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE 
((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
) 
- 
(

SELECT COUNT( DISTINCT pregnancy.PregnancyID ) AS PPP
FROM 
((pregnancy
INNER JOIN visit ON visit.PregnancyID = pregnancy.PregnancyID)
INNER JOIN test ON test.VisitID = visit.VisitID)
LEFT JOIN delivery ON delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID =3
AND test.TestResultNormal =0
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
)
)
" name="Report2" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report2} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="248" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="249" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="250" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="258" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report2DetailAge">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="261"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="260" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="PPP" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report2DetailPPP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="262" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="PPP1" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report2DetailPPP1" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="607"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="251" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="252" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="256" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_PPP" fieldSource="PPP" summarised="True" function="Sum" wizardCaption="{res:PPP}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report2Report_FooterTotalSum_PPP">
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
				<Section id="253" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="396" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="397" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="533" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="263" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, COUNT(DISTINCT pregnancy.PregnancyID)AS PPP 
FROM ((pregnancy INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID = 4
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' 
AND pregnancy.FacilityID IN ({s_Facilities})

UNION

SELECT 1 AS Age,(
(SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS PPP
FROM ((pregnancy LEFT JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE 
((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
)
- 
(SELECT COUNT(DISTINCT pregnancy.PregnancyID)AS PPP 
FROM ((pregnancy INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID = 4
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
)

)" name="Report6" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report6} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="264" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="265" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="266" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="272" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report6DetailAge">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="276"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="274" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="PPP" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report6DetailPPP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="275" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="PPP1" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report6DetailPPP1" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="608"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="267" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="268" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="270" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_PPP" fieldSource="PPP" summarised="True" function="Sum" wizardCaption="{res:PPP}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report6Report_FooterTotalSum_PPP">
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
				<Section id="269" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="398" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="399" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="534" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="277" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, COUNT(DISTINCT pregnancy.PregnancyID)AS PPP 
FROM ((pregnancy INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID = 2
AND((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})

UNION

SELECT 1 AS Age,(
(SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS PPP
FROM ((pregnancy LEFT JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE 
((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
)
- 
(SELECT COUNT(DISTINCT pregnancy.PregnancyID)AS PPP 
FROM ((pregnancy INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID = 2 
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
)

)" name="Report7" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report7} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="278" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="279" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="280" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="286" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report7DetailAge">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="290"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="288" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="PPP" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report7DetailPPP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="289" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="PPP1" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report7DetailPPP1" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="609"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="281" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="282" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="284" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_PPP" fieldSource="PPP" summarised="True" function="Sum" wizardCaption="{res:PPP}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report7Report_FooterTotalSum_PPP">
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
				<Section id="283" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="400" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="401" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="535" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="291" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, COUNT(DISTINCT pregnancy.PregnancyID)AS PPP 
FROM pregnancy LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE pregnancy.Ultrasound20weeks = 1
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' 
AND pregnancy.FacilityID IN ({s_Facilities})

UNION

SELECT 1 AS Age, (
(SELECT COUNT(DISTINCT pregnancy.PregnancyID)AS PPP 
FROM pregnancy LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE 
((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
)
-
(SELECT COUNT(DISTINCT pregnancy.PregnancyID)AS PPP 
FROM pregnancy LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE pregnancy.Ultrasound20weeks = 1
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities}) 
)
)" name="Report8" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report8} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="292" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="293" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="294" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="300" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report8DetailAge">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="304"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="302" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="PPP" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report8DetailPPP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="303" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="PPP1" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report8DetailPPP1" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="610"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="295" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="296" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="298" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_PPP" fieldSource="PPP" summarised="True" function="Sum" wizardCaption="{res:PPP}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report8Report_FooterTotalSum_PPP">
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
				<Section id="297" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="402" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="403" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="536" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="305" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, COUNT(DISTINCT pregnancy.PregnancyID) AS PPP 
FROM ((pregnancy INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID = 1 AND test.TestResultNormal = 0 
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})


UNION

SELECT 1 AS Age,(
(SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS PPP
FROM ((pregnancy LEFT JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) LEFT JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE 
((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
) 
- 
(SELECT COUNT(DISTINCT pregnancy.PregnancyID) AS PPP 
FROM ((pregnancy INNER JOIN visit ON
visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON
test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID
WHERE test.TestCodeID = 1 AND test.TestResultNormal = 0 
AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
AND pregnancy.FacilityID IN ({s_Facilities})
)
)" name="Report9" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report9} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="306" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="307" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="308" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="314" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report9DetailAge">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="318" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="316" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="PPP" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report9DetailPPP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="317" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="PPP1" fieldSource="PPP" wizardCaption="PPP" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report9DetailPPP1" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="612"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="309" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="310" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="312" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_PPP" fieldSource="PPP" summarised="True" function="Sum" wizardCaption="{res:PPP}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report9Report_FooterTotalSum_PPP">
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
				<Section id="311" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="404" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="405" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="537" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="319" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, (
SELECT COUNT(*) FROM
(

SELECT DeliveryID, 'O1' AS O
FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome1ID = 3 AND delivery.GestationAge &lt;=22 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})

UNION

SELECT DeliveryID, 'O2' AS O
FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome2ID = 3 AND delivery.GestationAge &lt;=22 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})

UNION

SELECT DeliveryID, 'O3' AS O
FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome3ID = 3 AND delivery.GestationAge &lt;=22 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})

) AS TotalPregI) AS TotalPreg



" name="Report10" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report10} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="320" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="321" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="322" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="328" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report10DetailAge">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="332"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="330" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalPreg" fieldSource="TotalPreg" wizardCaption="TotalPreg" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report10DetailTotalPreg">
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
				<Section id="323" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="324" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="325" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="406" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="407" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="538" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="551" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, COUNT(*) FROM
(
	SELECT patient_PatientID, pregnancy_PregnancyID, nrTests
	FROM
	(
		SELECT patient.PatientID AS patient_PatientID, pregnancy.PregnancyID AS pregnancy_PregnancyID, COUNT(test.TestCodeID) AS nrTests
		FROM (((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) INNER JOIN visit ON
		visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
		WHERE test.TestCodeID = 3
		AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
		OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
		OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
		AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
		AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
		AND pregnancy.FacilityID IN ({s_Facilities})
		
		GROUP BY pregnancy.PregnancyID
	) AS t1
WHERE nrTests &gt; 1) AS t2

UNION

SELECT 1 AS Age,
(
	(
		SELECT COUNT(*) FROM pregnancy LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
		WHERE 
		((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
		OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
		OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
		AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
		AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
		AND pregnancy.FacilityID IN ({s_Facilities}) 
		
	) 
	- 	(
		SELECT COUNT(*) 
		FROM
		(
			SELECT patient.PatientID AS patient_PatientID, pregnancy.PregnancyID AS pregnancy_PregnancyID, COUNT(test.TestCodeID) AS nrTests
			FROM (((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) INNER JOIN visit ON
		visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON test.VisitID = visit.VisitID) LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID 
			WHERE test.TestCodeID = 3 
			AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
			OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
			OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
			AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
			AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
			AND pregnancy.FacilityID IN ({s_Facilities})
		
			GROUP BY pregnancy.PregnancyID
		) AS t1
		WHERE nrTests &gt; 1
	) 
) AS t2" name="Report22" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report22} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="552" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="553" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="554" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="560" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report22DetailAge">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="576" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="562" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="COUNT_1" fieldSource="COUNT(*)" wizardCaption="COUNT(*)" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report22DetailCOUNT_1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="575" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="COUNT_2" fieldSource="COUNT(*)" wizardCaption="COUNT(*)" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report22DetailCOUNT_2" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="606"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="555" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="556" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="558" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_1" fieldSource="COUNT(*)" summarised="True" function="Sum" wizardCaption="{res:COUNT}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report22Report_FooterTotalSum_COUNT_1">
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
				<Section id="557" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="577" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="578" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="579" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="563" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, COUNT(*) FROM
(
	SELECT patient_PatientID, pregnancy_PregnancyID, nrTests
	FROM
	(
		SELECT patient.PatientID AS patient_PatientID, pregnancy.PregnancyID AS pregnancy_PregnancyID, COUNT(test.TestCodeID) AS nrTests
		FROM (((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) INNER JOIN visit ON
		visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON test.VisitID = visit.VisitID) LEFT JOIN delivery ON
		delivery.PregnancyID = pregnancy.PregnancyID
		WHERE test.TestCodeID = 1 
		AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
		AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
		AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
		OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
		OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
		AND (DATEDIFF(test.TestDate, pregnancy.PregRegDate) / 7 + pregnancy.GestationAge) &lt;= 30 
		AND DATEDIFF(test.TestDate, pregnancy.PregRegDate) &gt; 0
		AND pregnancy.FacilityID IN ({s_Facilities})
		GROUP BY pregnancy.PregnancyID
	) AS t1
WHERE nrTests &gt; 1) AS t2

UNION

SELECT 1 AS Age,
(
	(
		SELECT COUNT(*) FROM 
		(
			SELECT pregnancy.PregnancyID FROM pregnancy LEFT JOIN delivery ON
			delivery.PregnancyID = pregnancy.PregnancyID
			WHERE delivery.DataDelivery &gt;= '{s_PregRegDate}'
			AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
			AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
			OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
			OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
			AND pregnancy.FacilityID IN ({s_Facilities})
			GROUP BY pregnancy.PregnancyID
		) AS z
	) 
	- 	(
		SELECT COUNT(*) 
		FROM
		(
			SELECT patient.PatientID AS patient_PatientID, pregnancy.PregnancyID AS pregnancy_PregnancyID, COUNT(test.TestCodeID) AS nrTests
			FROM (((pregnancy INNER JOIN patient ON pregnancy.PatientID = patient.PatientID) INNER JOIN visit ON
		visit.PregnancyID = pregnancy.PregnancyID) INNER JOIN test ON test.VisitID = visit.VisitID) LEFT JOIN delivery ON
		delivery.PregnancyID = pregnancy.PregnancyID 
			WHERE test.TestCodeID = 1 
			AND delivery.DataDelivery &gt;= '{s_PregRegDate}' 
			AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}'
			AND ((delivery.PregnancyOutcome1ID&gt;0 AND delivery.PregnancyOutcome1ID&lt;3)
			OR (delivery.PregnancyOutcome2ID&gt;0 AND delivery.PregnancyOutcome2ID&lt;3)
			OR (delivery.PregnancyOutcome3ID&gt;0 AND delivery.PregnancyOutcome3ID&lt;3))
			AND (DATEDIFF(test.TestDate, pregnancy.PregRegDate) / 7 + pregnancy.GestationAge) &lt;= 30 
			AND DATEDIFF(test.TestDate, pregnancy.PregRegDate) &gt; 0
			AND pregnancy.FacilityID IN ({s_Facilities})
			GROUP BY pregnancy.PregnancyID
		) AS t1
		WHERE nrTests &gt; 1
	) 
) AS t2" name="Report23" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report23} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="564" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="565" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="566" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="572" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report23DetailAge">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="581"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="574" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="COUNT_1" fieldSource="COUNT(*)" wizardCaption="COUNT(*)" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report23DetailCOUNT_1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="580" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="COUNT_2" fieldSource="COUNT(*)" wizardCaption="COUNT(*)" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report23DetailCOUNT_2" percentOf="Report">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="611"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="567" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="568" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="570" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_COUNT_1" fieldSource="COUNT(*)" summarised="True" function="Sum" wizardCaption="{res:COUNT}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report23Report_FooterTotalSum_COUNT_1">
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
				<Section id="569" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="584" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="585" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="586" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="333" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT 0 AS Age, 
(
	SELECT COUNT(*) FROM
	(
		SELECT DeliveryID, 'O1' AS O
		FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID
		WHERE delivery.PregnancyOutcome1ID = 3 AND delivery.GestationAge &lt;=22 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
		AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})

		UNION

		SELECT DeliveryID, 'O2' AS O
		FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID
		WHERE delivery.PregnancyOutcome2ID = 3 AND delivery.GestationAge &lt;=22 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
		AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})

		UNION

		SELECT DeliveryID, 'O3' AS O
		FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID
		WHERE delivery.PregnancyOutcome3ID = 3 AND delivery.GestationAge &lt;=22 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
		AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})
	) AS TotalPreg1
) AS TotalPreg

UNION

SELECT 1 AS Age, 
(
	(
		SELECT COUNT(*) FROM
		(
			SELECT DeliveryID, 'O1' AS O
			FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID
			WHERE delivery.PregnancyOutcome1ID != -1 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
			AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})

			UNION

			SELECT DeliveryID, 'O2' AS O
			FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID
			WHERE delivery.PregnancyOutcome2ID != -1 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
			AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})

			UNION

			SELECT DeliveryID, 'O3' AS O
			FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID
			WHERE delivery.PregnancyOutcome3ID != -1 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
			AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})	
		) AS TotalPreg1
	)
	
	- 
	
	(
		SELECT COUNT(*) FROM
		(
			SELECT DeliveryID, 'O1' AS O
			FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID
			WHERE delivery.PregnancyOutcome1ID = 3 AND delivery.GestationAge &lt;=22 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
			AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})

			UNION

			SELECT DeliveryID, 'O2' AS O
			FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID
			WHERE delivery.PregnancyOutcome2ID = 3 AND delivery.GestationAge &lt;=22 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
			AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})

			UNION

			SELECT DeliveryID, 'O3' AS O
			FROM delivery INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID
			WHERE delivery.PregnancyOutcome3ID = 3 AND delivery.GestationAge &lt;=22 AND delivery.DataDelivery &gt;= '{s_PregRegDate}'
			AND delivery.DataDelivery &lt;= '{s_PregRegDateTo}' AND delivery.FacilityID IN ({s_Facilities})
		) AS TotalPreg2
	)
) AS TotalPreg" name="Report11" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report11} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="334" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="335" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="336" visible="True" lines="1" name="Detail" pasteActions="pasteActions" wizardTheme="Table" wizardThemeVersion="3.0">
					<Components>
						<ReportLabel id="342" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Age" fieldSource="Age" wizardCaption="Age" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report11DetailAge" wizardTheme="Table" wizardThemeVersion="3.0">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="346" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="344" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalPreg" fieldSource="TotalPreg" wizardCaption="TotalPreg" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report11DetailTotalPreg" wizardTheme="Table" wizardThemeVersion="3.0">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="345" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="TotalPreg1" fieldSource="TotalPreg" wizardCaption="TotalPreg" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="Report11DetailTotalPreg1" percentOf="Report" wizardTheme="Table" wizardThemeVersion="3.0">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="600"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="337" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="338" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="340" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_TotalPreg" fieldSource="TotalPreg" summarised="True" function="Sum" wizardCaption="{res:TotalPreg}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report11Report_FooterTotalSum_TotalPreg">
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
				<Section id="339" visible="True" lines="0" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components/>
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
				<SQLParameter id="408" variable="s_PregRegDate" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate"/>
				<SQLParameter id="409" variable="s_PregRegDateTo" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDateTo"/>
				<SQLParameter id="593" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_f21_facilities_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_f21_facilities.php" forShow="True" url="report_f21_facilities.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="550" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
