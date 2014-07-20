<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp" connection="registry_db">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="SQL" returnValueType="Number" connection="registry_db" dataSource="SELECT * FROM
(
SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O1' AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome1ID != -1
AND DataDelivery &gt;= '{s_DataDelivery}' 
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND FacilityName LIKE '%{s_FacilityName}%'
UNION

SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O2' AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID
WHERE  delivery.PregnancyOutcome2ID != -1
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}' 
AND FacilityName LIKE '%{s_FacilityName}%'
UNION

SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O3' AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome3ID != -1
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}' 
AND FacilityName LIKE '%{s_FacilityName}%'
) AS result" name="Report1" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="7" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="8" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="29" visible="False" name="Sorter_DeliveryID" column="DeliveryID" wizardCaption="{res:DeliveryID}" wizardSortingType="SimpleDir" wizardControl="DeliveryID">
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
				<Section id="10" visible="True" lines="1" name="FacilityName_Header">
					<Components>
						<ReportLabel id="20" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" fieldSource="FacilityName" wizardCaption="FacilityName" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report1FacilityName_HeaderFacilityName">
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
				<Section id="12" visible="True" lines="1" name="pregnancy_outcome_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="21" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="pregnancy_outcome" fieldSource="pregnancy_outcome" wizardCaption="pregnancy_outcome" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report1pregnancy_outcome_Headerpregnancy_outcome">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="22" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="pregnancy_outcome" name="Count_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report1pregnancy_outcome_HeaderCount_DeliveryID1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="72" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="pregnancy_outcome" name="Count_DeliveryID2" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report1pregnancy_outcome_HeaderCount_DeliveryID2" percentOf="FacilityName" format="0.#%">
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
				<Section id="13" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="14" visible="True" lines="1" name="pregnancy_outcome_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="15" visible="True" lines="1" name="FacilityName_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="23" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="FacilityName" name="Count_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report1FacilityName_FooterCount_DeliveryID">
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
				<Section id="16" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="17" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="27" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report1Report_FooterTotalCount_DeliveryID">
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
				<Section id="18" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="24" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="Report1Page_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="25" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="26" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression" eventType="Server"/>
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
				<TableParameter id="41" conditionType="Parameter" useIsNull="False" field="DataDelivery" parameterSource="s_DataDelivery" dataType="Date" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="38" variable="s_DataDelivery" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<SQLParameter id="48" variable="s_FacilityName" parameterType="URL" dataType="Text" parameterSource="s_FacilityName"/>
				<SQLParameter id="49" variable="s_DataDelivery1" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;9999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="9" name="FacilityName" field="FacilityName" sqlField="FacilityName" sortOrder="asc"/>
				<ReportGroup id="11" name="pregnancy_outcome" field="pregnancy_outcome" sqlField="pregnancy_outcome" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Link id="4" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_pregnancy_outcome.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="6" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="5" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Record id="39" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Report2" wizardCaption="{res:CCS_SearchFormPrefix} {res:Report1} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_pregnancy_outcome.ccp" PathID="Report2" pasteActions="pasteActions">
			<Components>
				<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="Report2Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="Report2s_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="43" name="DatePicker_s_DataDelivery" control="s_DataDelivery" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="Report2DatePicker_s_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery1" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="Report2s_DataDelivery1" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="46" name="DatePicker_s_DataDelivery1" control="s_DataDelivery1" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="Report2DatePicker_s_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="Report2s_FacilityName" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityName" textColumn="FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
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
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Report id="50" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT * FROM
(
SELECT PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O1' AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome1ID != -1
AND DataDelivery &gt;= '{s_DataDelivery}' 
AND DataDelivery&lt;= '{s_DataDelivery1}'

UNION

SELECT PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O2' AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome2ID != -1
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery&lt;= '{s_DataDelivery1}' 

UNION

SELECT PregnancyOutcomeName as pregnancy_outcome, DeliveryID, 'O3' AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome3ID != -1
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery&lt;= '{s_DataDelivery1}' 

) AS result" name="Report3" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report3} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="51" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="52" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="68" visible="False" name="Sorter_DeliveryID" column="DeliveryID" wizardCaption="{res:DeliveryID}" wizardSortingType="SimpleDir" wizardControl="DeliveryID">
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
				<Section id="54" visible="True" lines="1" name="pregnancy_outcome_Header" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="61" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="pregnancy_outcome" fieldSource="pregnancy_outcome" wizardCaption="pregnancy_outcome" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report3pregnancy_outcome_Headerpregnancy_outcome">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="62" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="pregnancy_outcome" name="Count_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3pregnancy_outcome_HeaderCount_DeliveryID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="73" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="pregnancy_outcome" name="Count_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3pregnancy_outcome_HeaderCount_DeliveryID1" percentOf="Report" format="0.#%">
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
				<Section id="55" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="56" visible="True" lines="1" name="pregnancy_outcome_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="57" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="58" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="66" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3Report_FooterTotalCount_DeliveryID">
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
				<Section id="59" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="63" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="Report3Page_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="64" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="65" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
				<SQLParameter id="70" variable="s_DataDelivery" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<SQLParameter id="71" variable="s_DataDelivery1" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;9999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="53" name="pregnancy_outcome" field="pregnancy_outcome" sqlField="pregnancy_outcome" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<FlashChart id="76" secured="False" dataSeriesIn="Rows" chartType="3d_pie" sourceType="SQL" defaultPageSize="25" returnValueType="Number" name="FlashChart1" PathID="FlashChart1" connection="registry_db" dataSource="SELECT PregnancyOutcomeName, COUNT(*) AS TotalNumberOutcome 
FROM
(
SELECT delivery.PregnancyOutcome1ID AS pregnancy_outcome, PregnancyOutcomeName, DeliveryID, 'O1' AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome1ID != -1
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery&lt;= '{s_DataDelivery1}'

UNION

SELECT delivery.PregnancyOutcome2ID AS pregnancy_outcome, PregnancyOutcomeName, DeliveryID, 'O2' AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome2ID != -1
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery&lt;= '{s_DataDelivery1}'

UNION

SELECT delivery.PregnancyOutcome3ID AS pregnancy_outcome, PregnancyOutcomeName, DeliveryID, 'O3' AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome3ID != -1
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery&lt;= '{s_DataDelivery1}'

) AS result
GROUP BY PregnancyOutcomeName
" schemaName="{user}_Classic 1" layout="8" gridCaptionField="PregnancyOutcomeName" isCaption="true" width="500" height="300" displayTitle="True" title="{res:PregnancyOutcomeFacilitiesAll}" displayLegend="True" displayLabels="True" displayGridLines="True" directionType="degrees" autoRotate="yes" template="&lt;root&gt;
	&lt;schema name=&quot;Classic&quot;&gt;
		&lt;mask name=&quot;0&quot;/&gt;
		&lt;colors&gt;&lt;color value=&quot;17DCDC&quot;/&gt;&lt;color value=&quot;FF9900&quot;/&gt;&lt;color value=&quot;03D803&quot;/&gt;&lt;color value=&quot;FFEA00&quot;/&gt;&lt;color value=&quot;FF0000&quot;/&gt;&lt;color value=&quot;0000FF&quot;/&gt;&lt;color value=&quot;5C2DB3&quot;/&gt;&lt;color value=&quot;993366&quot;/&gt;&lt;color value=&quot;CB07CB&quot;/&gt;&lt;color value=&quot;2AA7CB&quot;/&gt;&lt;color value=&quot;B3EF00&quot;/&gt;&lt;color value=&quot;6CF2F7&quot;/&gt;&lt;color value=&quot;6B3CE4&quot;/&gt;&lt;color value=&quot;A2D061&quot;/&gt;&lt;color value=&quot;A76DFF&quot;/&gt;&lt;color value=&quot;FC9F62&quot;/&gt;&lt;color value=&quot;FFCC00&quot;/&gt;&lt;color value=&quot;FF99CC&quot;/&gt;&lt;color value=&quot;5454E5&quot;/&gt;&lt;color value=&quot;C50404&quot;/&gt;&lt;color value=&quot;CC99FF&quot;/&gt;&lt;color value=&quot;E15603&quot;/&gt;&lt;color value=&quot;899CFF&quot;/&gt;&lt;color value=&quot;ED70AF&quot;/&gt;&lt;color value=&quot;FDF98B&quot;/&gt;&lt;color value=&quot;BE3EE3&quot;/&gt;&lt;color value=&quot;764BE5&quot;/&gt;&lt;color value=&quot;CDDF52&quot;/&gt;&lt;color value=&quot;00F439&quot;/&gt;&lt;color value=&quot;CCCCCB&quot;/&gt;&lt;color value=&quot;3DC681&quot;/&gt;&lt;color value=&quot;4193DF&quot;/&gt;&lt;color value=&quot;D5B94A&quot;/&gt;&lt;color value=&quot;C46B30&quot;/&gt;&lt;color value=&quot;037ADE&quot;/&gt;&lt;color value=&quot;FFDD56&quot;/&gt;&lt;color value=&quot;FF6600&quot;/&gt;&lt;color value=&quot;99CC00&quot;/&gt;&lt;color value=&quot;FFFF00&quot;/&gt;&lt;color value=&quot;DB214C&quot;/&gt;&lt;/colors&gt;
	&lt;/schema&gt;
	&lt;separator decimal=&quot;,&quot; group=&quot;&quot;/&gt;
	&lt;background border=&quot;yes&quot; beginColor=&quot;FFFFFF&quot; endColor=&quot;FFFFFF&quot; color=&quot;FFFFFF&quot; gradient=&quot;no&quot;/&gt;
	&lt;chartarea border=&quot;yes&quot; alpha=&quot;100&quot; beginColor=&quot;dae1e0&quot; endColor=&quot;8f9f9b&quot; bgcolor=&quot;8f9f9b&quot; gradient=&quot;yes&quot;&gt;
		&lt;grid line_style=&quot;normal&quot; alpha=&quot;100&quot; color=&quot;e8f2f1&quot; visible=&quot;yes&quot;/&gt;
		&lt;vertical_axis visible=&quot;yes&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;14&quot; color=&quot;504e4e&quot; bold=&quot;yes&quot; italic=&quot;no&quot; uline=&quot;no&quot;/&gt;&lt;/vertical_axis&gt;
		&lt;horizontal_axis visible=&quot;yes&quot; rotation=&quot;degrees&quot; autoRotate=&quot;yes&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;14&quot; color=&quot;504e4e&quot; bold=&quot;yes&quot; italic=&quot;no&quot; uline=&quot;no&quot;/&gt;&lt;/horizontal_axis&gt;
		&lt;chart line_thick=&quot;2&quot; enabled=&quot;yes&quot; border_color=&quot;c0c0c0&quot; border=&quot;yes&quot; alpha=&quot;100&quot; isBorderBright=&quot;yes&quot; type=&quot;3d_pie&quot; series=&quot;rows&quot;&gt;
			&lt;inscriptions color=&quot;455955&quot; visible=&quot;yes&quot;&gt;&lt;font face=&quot;Verdana&quot; size=&quot;11&quot; bold=&quot;no&quot; italic=&quot;no&quot; uline=&quot;no&quot;/&gt;&lt;/inscriptions&gt;
			&lt;animation type=&quot;serie_alpha&quot; time=&quot;3000&quot;/&gt;
			&lt;markers size=&quot;8&quot; type=&quot;0&quot;/&gt;
			&lt;hints border=&quot;yes&quot; enabled=&quot;yes&quot; color=&quot;FFFF99&quot;&gt;&lt;font face=&quot;Verdana&quot; size=&quot;11&quot; color=&quot;323d3b&quot; bold=&quot;no&quot; italic=&quot;no&quot; uline=&quot;no&quot;/&gt;&lt;/hints&gt;
		&lt;/chart&gt;
		&lt;legend sqr_size=&quot;12&quot; sqr_borders=&quot;yes&quot; border_thick=&quot;0&quot; alpha=&quot;100&quot; position=&quot;bottom-center&quot; layout=&quot;horizontal&quot; visible=&quot;yes&quot;&gt;&lt;font face=&quot;Verdana&quot; size=&quot;11&quot; color=&quot;504e4e&quot; bold=&quot;no&quot; italic=&quot;no&quot; uline=&quot;no&quot;/&gt;&lt;/legend&gt;
		&lt;title position=&quot;top&quot; align=&quot;center&quot; border=&quot;no&quot; alpha=&quot;100&quot; visible=&quot;yes&quot; text=&quot;{res:PregnancyOutcomeFacilitiesAll}&quot;&gt;&lt;font face=&quot;TimesNewRoman&quot; size=&quot;24&quot; color=&quot;323d3b&quot; bold=&quot;yes&quot; italic=&quot;no&quot; uline=&quot;yes&quot;/&gt;&lt;/title&gt;
	&lt;/chartarea&gt;
	&lt;objects&gt;
	&lt;/objects&gt;
	&lt;data&gt;
		&lt;columns&gt;
			&lt;column field=&quot;TotalNumberOutcome&quot; name=&quot;TotalNumberOutcome&quot;/&gt;&lt;/columns&gt;
		&lt;rows&gt;
			&lt;!-- BEGIN Row --&gt;&lt;row col1=&quot;{TotalNumberOutcome}&quot; name=&quot;{PregnancyOutcomeName}&quot;/&gt;&lt;!-- END Row --&gt;&lt;/rows&gt;
	&lt;/data&gt;
&lt;/root&gt;
" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components/>
			<Events/>
			<Attributes/>
			<DataSeries>
				<Field id="201" fieldName="TotalNumberOutcome" alias="TotalNumberOutcome"/>
			</DataSeries>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<AllFields>
				<Field id="197" fieldName="PregnancyOutcomeName"/>
				<Field id="198" fieldName="TotalNumberOutcome"/>
			</AllFields>
			<SelectedFields>
				<Field id="199" fieldName="TotalNumberOutcome" isExpression="True"/>
				<Field id="200" fieldName="PregnancyOutcomeName" isExpression="True"/>
			</SelectedFields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="150" variable="s_DataDelivery" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<SQLParameter id="151" variable="s_DataDelivery1" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;9999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
			</SQLParameters>
			<SecurityGroups/>
			<Features/>
		</FlashChart>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="report_pregnancy_outcome.php" forShow="True" url="report_pregnancy_outcome.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="report_pregnancy_outcome_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="FlashChartXML76" language="PHPTemplates" name="report_pregnancy_outcomeFlashChart1.xml" forShow="False" comment="&lt;!--" commentEnd="--&gt;" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="74" groupID="1"/>
		<Group id="75" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
