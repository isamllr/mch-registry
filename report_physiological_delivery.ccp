<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="SQL" returnValueType="Number" connection="registry_db" name="Report1" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report1} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT facilities.FacilityID, facilities.FacilityName, 'res:Physiological' AS Physiological, delivery.DeliveryID,
GROUP_CONCAT(DISTINCT '-', procedures.ProcedureTypeID, '-') AS procedures, 
GROUP_CONCAT(DISTINCT '-', complications.ICD10ID, '-') AS complications

FROM ((delivery INNER JOIN facilities ON delivery.FacilityID = facilities.FacilityID)
LEFT JOIN procedures ON procedures.DeliveryID = delivery.DeliveryID)
LEFT JOIN complications ON complications.DeliveryID = delivery.DeliveryID

WHERE 
DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND facilities.FacilityID LIKE '{s_FacilityID}' 
AND
(PregnancyOutcome1ID = 1 OR
PregnancyOutcome1ID = 2 OR
PregnancyOutcome2ID = 1 OR
PregnancyOutcome2ID = 2 OR
PregnancyOutcome3ID = 1 OR
PregnancyOutcome3ID = 2)
AND delivery.GestationAge &gt; 37
AND delivery.deliveryMethodID = 1

GROUP BY delivery.DeliveryID

HAVING 
LOCATE('-1-', IFNULL(procedures,0)) = 0 AND 
LOCATE('-3-', IFNULL(procedures,0)) = 0 AND
LOCATE('-6-', IFNULL(procedures,0)) = 0 AND
LOCATE('-7-', IFNULL(procedures,0)) = 0 AND
LOCATE('-13-', IFNULL(procedures,0)) = 0 AND
LOCATE('-O.32.1-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.64.1-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.80.1-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.83.1-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.72.-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.72.0-', IFNULL(complications,0)) = 0 

UNION

SELECT facilities.FacilityID, facilities.FacilityName, 'res:Non-Physiological' AS Physiological, delivery.DeliveryID,
'p' AS procedures, 'c' AS complications

FROM ((delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID) LEFT JOIN procedures ON
procedures.DeliveryID = delivery.DeliveryID) LEFT JOIN complications ON complications.DeliveryID = delivery.DeliveryID

WHERE 
DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND facilities.FacilityID LIKE '{s_FacilityID}' 
AND
(PregnancyOutcome1ID = 1 OR
PregnancyOutcome1ID = 2 OR
PregnancyOutcome2ID = 1 OR
PregnancyOutcome2ID = 2 OR
PregnancyOutcome3ID = 1 OR
PregnancyOutcome3ID = 2)
AND 
(delivery.GestationAge &lt;= 37
OR IFNULL(procedures.ProcedureTypeID, 0) = 1
OR IFNULL(procedures.ProcedureTypeID, 0) = 3
OR IFNULL(procedures.ProcedureTypeID, 0) = 6
OR IFNULL(procedures.ProcedureTypeID, 0) = 7
OR IFNULL(procedures.ProcedureTypeID, 0) = 13
OR IFNULL(complications.ICD10ID, 0) = 'O.32.1'
OR IFNULL(complications.ICD10ID, 0) = 'O.64.1'
OR IFNULL(complications.ICD10ID, 0) = 'O.80.1'
OR IFNULL(complications.ICD10ID, 0) = 'O.83.1'
OR IFNULL(complications.ICD10ID, 0) = 'O.72.'
OR IFNULL(complications.ICD10ID, 0) = 'O.72.0'
OR delivery.deliveryMethodID != 1)

GROUP BY delivery.DeliveryID">
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
						<Sorter id="29" visible="False" name="Sorter_DeliveryID" column="DeliveryID">
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
				<Section id="12" visible="True" lines="1" name="Physiological_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="21" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Physiological" fieldSource="Physiological" wizardCaption="Physiological" wizardSize="21" wizardMaxLength="21" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report1Physiological_HeaderPhysiological">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="68"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="22" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Physiological" name="Count_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report1Physiological_HeaderCount_DeliveryID1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="42" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Physiological" name="Count_DeliveryID2" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report1Physiological_HeaderCount_DeliveryID2" percentOf="FacilityName" format="0.#%">
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
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="14" visible="True" lines="1" name="Physiological_Footer">
					<Components>
					</Components>
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
										<Action actionName="Hide-Show Component" actionCategory="General" id="26" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="43" parameterType="URL" variable="s_DataDelivery" dataType="Date" parameterSource="s_DataDelivery" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate"/>
				<SQLParameter id="45" variable="s_FacilityID" parameterType="URL" dataType="Text" parameterSource="s_FacilityID" defaultValue="'%'"/>
				<SQLParameter id="44" variable="s_DataDelivery1" dataType="Date" parameterType="URL" parameterSource="s_DataDelivery1" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CCFormatDate(CCParseDate(&quot;9999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="9" name="FacilityName" field="FacilityName" sqlField="FacilityName" sortOrder="asc"/>
				<ReportGroup id="11" name="Physiological" field="Physiological" sqlField="Physiological" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Link id="4" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_physiological_delivery.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
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
		<Record id="31" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Report2" wizardCaption="{res:CCS_SearchFormPrefix} {res:Report1} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_physiological_delivery.ccp" PathID="Report2" pasteActions="pasteActions">
			<Components>
				<Button id="32" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="Report2Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="Report2s_DataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="36" name="DatePicker_s_DataDelivery" control="s_DataDelivery" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="Report2DatePicker_s_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery1" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="Report2s_DataDelivery1" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="40" name="DatePicker_s_DataDelivery1" control="s_DataDelivery1" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="Report2DatePicker_s_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityID" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="Report2s_FacilityID" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName">
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
		<Report id="46" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerPhysicalPage="50" connection="registry_db" name="Report3" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report3} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT 'res:Physiological' AS Physiological, delivery.DeliveryID,
GROUP_CONCAT(DISTINCT '-', procedures.ProcedureTypeID, '-') AS procedures, 
GROUP_CONCAT(DISTINCT '-', complications.ICD10ID, '-') AS complications

FROM (delivery LEFT JOIN procedures ON procedures.DeliveryID = delivery.DeliveryID)
LEFT JOIN complications ON complications.DeliveryID = delivery.DeliveryID

WHERE 
DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}' 
AND
(PregnancyOutcome1ID = 1 OR
PregnancyOutcome1ID = 2 OR
PregnancyOutcome2ID = 1 OR
PregnancyOutcome2ID = 2 OR
PregnancyOutcome3ID = 1 OR
PregnancyOutcome3ID = 2)
AND delivery.GestationAge &gt; 37
AND delivery.deliveryMethodID = 1

GROUP BY delivery.DeliveryID

HAVING 
LOCATE('-1-', IFNULL(procedures,0)) = 0 AND 
LOCATE('-3-', IFNULL(procedures,0)) = 0 AND
LOCATE('-6-', IFNULL(procedures,0)) = 0 AND
LOCATE('-7-', IFNULL(procedures,0)) = 0 AND
LOCATE('-13-', IFNULL(procedures,0)) = 0 AND
LOCATE('-O.32.1-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.64.1-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.80.1-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.83.1-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.72.-', IFNULL(complications,0)) = 0 AND
LOCATE('-O.72.0-', IFNULL(complications,0)) = 0 

UNION

SELECT 'res:Non-Physiological' AS Physiological, delivery.DeliveryID,
'p' AS procedures, 'c' AS complications

FROM (delivery LEFT JOIN procedures ON procedures.DeliveryID = delivery.DeliveryID) 
LEFT JOIN complications ON complications.DeliveryID = delivery.DeliveryID

WHERE 
DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND
(PregnancyOutcome1ID = 1 OR
PregnancyOutcome1ID = 2 OR
PregnancyOutcome2ID = 1 OR
PregnancyOutcome2ID = 2 OR
PregnancyOutcome3ID = 1 OR
PregnancyOutcome3ID = 2)
AND 
(delivery.GestationAge &lt;= 37
OR IFNULL(procedures.ProcedureTypeID, 0) = 1
OR IFNULL(procedures.ProcedureTypeID, 0) = 3
OR IFNULL(procedures.ProcedureTypeID, 0) = 6
OR IFNULL(procedures.ProcedureTypeID, 0) = 7
OR IFNULL(procedures.ProcedureTypeID, 0) = 13
OR IFNULL(complications.ICD10ID, 0) = 'O.32.1'
OR IFNULL(complications.ICD10ID, 0) = 'O.64.1'
OR IFNULL(complications.ICD10ID, 0) = 'O.80.1'
OR IFNULL(complications.ICD10ID, 0) = 'O.83.1'
OR IFNULL(complications.ICD10ID, 0) = 'O.72.'
OR IFNULL(complications.ICD10ID, 0) = 'O.72.0'
OR delivery.deliveryMethodID != 1)

GROUP BY delivery.DeliveryID"><Components><Section id="47" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="48" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="64" visible="False" name="Sorter_DeliveryID" column="DeliveryID" wizardCaption="{res:DeliveryID}" wizardSortingType="SimpleDir" wizardControl="DeliveryID">
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
				<Section id="50" visible="True" lines="1" name="Physiological_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="57" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Physiological" fieldSource="Physiological" wizardCaption="Physiological" wizardSize="21" wizardMaxLength="21" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report3Physiological_HeaderPhysiological">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="69"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="58" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Physiological" name="Count_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3Physiological_HeaderCount_DeliveryID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="65" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Physiological" name="Count_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3Physiological_HeaderCount_DeliveryID1" percentOf="Report" format="0.#%">
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
				<Section id="51" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="52" visible="True" lines="1" name="Physiological_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="53" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="54" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="62" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3Report_FooterTotalCount_DeliveryID">
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
				<Section id="55" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="59" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="Report3Page_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="60" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="61" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression" eventType="Server"/>
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
				<SQLParameter id="66" variable="s_DataDelivery" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<SQLParameter id="67" variable="s_DataDelivery1" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;9999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="49" name="Physiological" field="Physiological" sqlField="Physiological" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<FlashChart id="72" secured="False" dataSeriesIn="Rows" chartType="3d_pie" sourceType="SQL" defaultPageSize="25" returnValueType="Number" name="FlashChart1" PathID="FlashChart1" connection="registry_db" schemaName="{user}_Autumn 5" layout="1" gridCaptionField="Physiological" width="400" height="300" displayTitle="True" title="{res:PhysiologicalDeliveryInAllFacilities}" displayLegend="True" displayLabels="True" displayGridLines="True" directionType="degrees" autoRotate="yes" template="&lt;root&gt;
	&lt;schema name=&quot;Autumn&quot;&gt;
		&lt;mask name=&quot;0&quot;/&gt;
		&lt;colors&gt;&lt;color value=&quot;BF7C35&quot;/&gt;&lt;color value=&quot;A44056&quot;/&gt;&lt;color value=&quot;658770&quot;/&gt;&lt;color value=&quot;959806&quot;/&gt;&lt;color value=&quot;7C643B&quot;/&gt;&lt;color value=&quot;CFC21B&quot;/&gt;&lt;color value=&quot;64801F&quot;/&gt;&lt;color value=&quot;7A4576&quot;/&gt;&lt;color value=&quot;C5B25D&quot;/&gt;&lt;color value=&quot;AF421C&quot;/&gt;&lt;color value=&quot;6897A1&quot;/&gt;&lt;color value=&quot;64A674&quot;/&gt;&lt;color value=&quot;B47E94&quot;/&gt;&lt;color value=&quot;7CAC46&quot;/&gt;&lt;color value=&quot;895737&quot;/&gt;&lt;color value=&quot;909685&quot;/&gt;&lt;color value=&quot;B54850&quot;/&gt;&lt;color value=&quot;872638&quot;/&gt;&lt;color value=&quot;B2C216&quot;/&gt;&lt;color value=&quot;AE583A&quot;/&gt;&lt;color value=&quot;476850&quot;/&gt;&lt;color value=&quot;C18A51&quot;/&gt;&lt;color value=&quot;924245&quot;/&gt;&lt;color value=&quot;89A1A5&quot;/&gt;&lt;color value=&quot;6C7738&quot;/&gt;&lt;color value=&quot;A37746&quot;/&gt;&lt;color value=&quot;BEBB58&quot;/&gt;&lt;color value=&quot;686F48&quot;/&gt;&lt;color value=&quot;DABC44&quot;/&gt;&lt;color value=&quot;BF794D&quot;/&gt;&lt;color value=&quot;917C49&quot;/&gt;&lt;color value=&quot;B26773&quot;/&gt;&lt;color value=&quot;4B8244&quot;/&gt;&lt;color value=&quot;BC634F&quot;/&gt;&lt;color value=&quot;8C8441&quot;/&gt;&lt;color value=&quot;9DAA24&quot;/&gt;&lt;color value=&quot;61553D&quot;/&gt;&lt;color value=&quot;9B5982&quot;/&gt;&lt;color value=&quot;8F4C28&quot;/&gt;&lt;color value=&quot;69576B&quot;/&gt;&lt;/colors&gt;
	&lt;/schema&gt;
	&lt;separator decimal=&quot;,&quot; group=&quot;&quot;/&gt;
	&lt;background border=&quot;yes&quot; beginColor=&quot;FFFFFF&quot; endColor=&quot;FFFFFF&quot; color=&quot;FFFFFF&quot; gradient=&quot;no&quot;/&gt;
	&lt;chartarea border=&quot;yes&quot; gradient=&quot;yes&quot; bgcolor=&quot;c9c8ac&quot; beginColor=&quot;c9c8ac&quot; endColor=&quot;f6f6d6&quot; alpha=&quot;100&quot;&gt;
		&lt;grid line_style=&quot;medium&quot; alpha=&quot;100&quot; color=&quot;8e8d65&quot; visible=&quot;yes&quot;/&gt;
		&lt;vertical_axis visible=&quot;yes&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;14&quot; bold=&quot;yes&quot; italic=&quot;no&quot; uline=&quot;no&quot; color=&quot;605f43&quot;/&gt;&lt;/vertical_axis&gt;
		&lt;horizontal_axis visible=&quot;yes&quot; rotation=&quot;degrees&quot; autoRotate=&quot;yes&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;14&quot; bold=&quot;yes&quot; italic=&quot;no&quot; uline=&quot;no&quot; color=&quot;605f43&quot;/&gt;&lt;/horizontal_axis&gt;
		&lt;chart line_thick=&quot;2&quot; enabled=&quot;yes&quot; border=&quot;yes&quot; alpha=&quot;100&quot; isBorderBright=&quot;yes&quot; border_color=&quot;000000&quot; type=&quot;3d_pie&quot; series=&quot;rows&quot;&gt;
			&lt;inscriptions color=&quot;605f43&quot; visible=&quot;yes&quot;&gt;&lt;font face=&quot;Verdana&quot; size=&quot;11&quot; bold=&quot;no&quot; italic=&quot;no&quot; uline=&quot;no&quot;/&gt;&lt;/inscriptions&gt;
			&lt;animation type=&quot;none&quot; time=&quot;2000&quot;/&gt;
			&lt;markers size=&quot;8&quot; type=&quot;0&quot;/&gt;
			&lt;hints border=&quot;yes&quot; enabled=&quot;yes&quot; color=&quot;FFFF99&quot;&gt;&lt;font face=&quot;Verdana&quot; size=&quot;11&quot; bold=&quot;no&quot; italic=&quot;no&quot; uline=&quot;no&quot; color=&quot;605f43&quot;/&gt;&lt;/hints&gt;
		&lt;/chart&gt;
		&lt;legend sqr_size=&quot;12&quot; sqr_borders=&quot;yes&quot; border_thick=&quot;0&quot; alpha=&quot;100&quot; position=&quot;top-left&quot; layout=&quot;horizontal&quot; visible=&quot;yes&quot;&gt;&lt;font face=&quot;Verdana&quot; size=&quot;11&quot; bold=&quot;no&quot; italic=&quot;no&quot; uline=&quot;no&quot; color=&quot;605f43&quot;/&gt;&lt;/legend&gt;
		&lt;title position=&quot;top&quot; align=&quot;center&quot; border=&quot;no&quot; alpha=&quot;100&quot; visible=&quot;yes&quot; text=&quot;{res:PhysiologicalDeliveryInAllFacilities}&quot;&gt;&lt;font face=&quot;TimesNewRoman&quot; size=&quot;24&quot; bold=&quot;yes&quot; uline=&quot;yes&quot; italic=&quot;no&quot; color=&quot;000000&quot;/&gt;&lt;/title&gt;
	&lt;/chartarea&gt;
	&lt;objects&gt;
	&lt;/objects&gt;
	&lt;data&gt;
		&lt;columns&gt;
			&lt;column field=&quot;DelivCount&quot; name=&quot;DelivCount&quot;/&gt;&lt;/columns&gt;
		&lt;rows&gt;&lt;!-- BEGIN Row --&gt;&lt;row col1=&quot;{DelivCount}&quot; name=&quot;{Physiological}&quot;/&gt;&lt;!-- END Row --&gt;&lt;/rows&gt;&lt;/data&gt;
&lt;/root&gt;
" orderBy="PartnerDelivery" groupBy="PartnerDelivery" isCaption="true" dataSource="SELECT COUNT(delivery.DeliveryID) AS DelivCount, '1' AS Physiological
FROM (delivery LEFT JOIN procedures ON
procedures.DeliveryID = delivery.DeliveryID) LEFT JOIN anesthesia ON
anesthesia.DeliveryID = delivery.DeliveryID
WHERE 
DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND 
(PregnancyOutcome1ID = 1 OR
PregnancyOutcome1ID = 2 OR
PregnancyOutcome2ID = 1 OR
PregnancyOutcome2ID = 2 OR
PregnancyOutcome3ID = 1 OR
PregnancyOutcome3ID = 2)
AND delivery.SteroidsYesNo = 0
AND delivery.Antibiotics = 0
AND delivery.ART = 0
AND delivery.Uterotoics = 0
AND ( procedures.ProcedureTypeID IS NULL )
AND delivery.DeliveryMethodID = 1
AND ( anesthesia.AnesthesiaID IS NULL )
AND delivery.GestationAge &gt;= 37
AND delivery.GestationAge &lt;= 41
GROUP BY Physiological

UNION

SELECT COUNT(delivery.DeliveryID) AS DelivCount, '2' AS Physiological
FROM (delivery LEFT JOIN procedures ON
procedures.DeliveryID = delivery.DeliveryID) LEFT JOIN anesthesia ON
anesthesia.DeliveryID = delivery.DeliveryID
WHERE 
DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND 
(PregnancyOutcome1ID = 1 OR
PregnancyOutcome1ID = 2 OR
PregnancyOutcome2ID = 1 OR
PregnancyOutcome2ID = 2 OR
PregnancyOutcome3ID = 1 OR
PregnancyOutcome3ID = 2)
AND (delivery.SteroidsYesNo != 0
OR delivery.Antibiotics != 0
OR delivery.ART != 0
OR delivery.Uterotoics != 0
OR ( procedures.ProcedureTypeID IS NOT NULL )
OR delivery.DeliveryMethodID != 1
OR ( anesthesia.AnesthesiaID IS NOT NULL )
OR delivery.GestationAge &lt; 37
OR delivery.GestationAge &gt; 41)
GROUP BY Physiological" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components/>
			<Events/>
			<Attributes/>
			<DataSeries>
				<Field id="103" fieldName="DelivCount" alias="DelivCount"/>
			</DataSeries>
			<TableParameters>
				<TableParameter id="74" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="75" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="76" conditionType="Parameter" useIsNull="False" field="PartnerDelivery" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="-1"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
				<Field id="77" fieldName="COUNT(DeliveryID)" isExpression="True" alias="DelivCount"/>
			</Fields>
			<AllFields>
				<Field id="99" fieldName="DelivCount"/>
				<Field id="101" fieldName="Physiological"/>
			</AllFields>
			<SelectedFields>
				<Field id="100" fieldName="DelivCount" isExpression="True"/>
				<Field id="102" fieldName="Physiological" isExpression="True"/>
			</SelectedFields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="82" parameterType="URL" variable="s_DataDelivery" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="83" parameterType="URL" variable="s_DataDelivery1" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery1" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
			</SQLParameters>
			<SecurityGroups/>
			<Features/>
		</FlashChart>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_physiological_delivery_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_physiological_delivery.php" forShow="True" url="report_physiological_delivery.php" comment="//" codePage="utf-8"/>
		<CodeFile id="FlashChartXML72" language="PHPTemplates" name="report_physiological_deliveryFlashChart1.xml" forShow="False" comment="&lt;!--" commentEnd="--&gt;" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="70" groupID="1"/>
		<Group id="71" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
