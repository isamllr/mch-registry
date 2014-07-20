<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" connection="registry_db">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="delivery, facilities" name="delivery_facilities1" wizardCaption="{res:CCS_ReportFormPrefix} {res:deliveryfacilities} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="21" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="22" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="24" visible="True" lines="1" name="FacilityName_Header">
					<Components>
						<ReportLabel id="34" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" fieldSource="FacilityName" wizardCaption="FacilityName" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="delivery_facilities1FacilityName_HeaderFacilityName">
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
				<Section id="26" visible="True" lines="1" name="PartnerDelivery_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="35" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="PartnerDelivery" fieldSource="PartnerDelivery" wizardCaption="PartnerDelivery" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="delivery_facilities1PartnerDelivery_HeaderPartnerDelivery">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="44" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="36" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="PartnerDelivery" name="Count_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities1PartnerDelivery_HeaderCount_DeliveryID1">
							<Components/>
							<Events>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="46" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="PartnerDelivery" name="Count_DeliveryID2" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities1PartnerDelivery_HeaderCount_DeliveryID2" percentOf="FacilityName" format="0.#%">
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
				<Section id="27" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="28" visible="True" lines="1" name="PartnerDelivery_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="29" visible="True" lines="1" name="FacilityName_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="37" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="FacilityName" name="Count_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities1FacilityName_FooterCount_DeliveryID">
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
				<Section id="30" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="31" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="41" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities1Report_FooterTotalCount_DeliveryID">
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
				<Section id="32" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="38" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="delivery_facilities1Page_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="39" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="40" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
				<TableParameter id="42" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="54" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="43" conditionType="Parameter" useIsNull="False" field="FacilityName" parameterSource="s_FacilityName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="84" conditionType="Parameter" useIsNull="False" field="delivery.PartnerDelivery" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="-1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="417"/>
				<JoinTable id="7" tableName="facilities" posLeft="191" posTop="10" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="8" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="5" tableName="delivery" fieldName="DataDelivery"/>
				<Field id="6" tableName="delivery" fieldName="PartnerDelivery"/>
				<Field id="10" tableName="facilities" fieldName="FacilityName"/>
				<Field id="11" tableName="delivery" fieldName="DeliveryID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="23" name="FacilityName" field="FacilityName" sqlField="facilities.FacilityName" sortOrder="asc"/>
				<ReportGroup id="25" name="PartnerDelivery" field="PartnerDelivery" sqlField="delivery.PartnerDelivery" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="12" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_facilities" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_facilities} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_delivery_partner_district.ccp" PathID="delivery_facilities" pasteActions="pasteActions">
			<Components>
				<Button id="13" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_facilitiesButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="delivery_facilitiess_FacilityName" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityName" textColumn="FacilityName">
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
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilitiess_DataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="49" name="DatePicker_s_DataDelivery" control="s_DataDelivery" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilitiesDatePicker_s_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery1" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilitiess_DataDelivery1" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="53" name="DatePicker_s_DataDelivery1" control="s_DataDelivery1" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilitiesDatePicker_s_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="20" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
		<Link id="17" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_delivery_partner_district.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="19" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="18" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="55" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" connection="registry_db" dataSource="delivery" name="delivery" wizardCaption="{res:CCS_ReportFormPrefix} {res:delivery} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="60" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="61" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="77" visible="False" name="Sorter_DeliveryID" column="DeliveryID">
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
				<Section id="63" visible="True" lines="1" name="PartnerDelivery_Header">
					<Components>
						<ReportLabel id="70" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="PartnerDelivery" fieldSource="PartnerDelivery" wizardCaption="PartnerDelivery" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="deliveryPartnerDelivery_HeaderPartnerDelivery">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="78"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="71" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="PartnerDelivery" name="Count_DeliveryID" function="Count" PathID="deliveryPartnerDelivery_HeaderCount_DeliveryID" percentOf="Report" format="0.#%">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="79" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="PartnerDelivery" name="Count_DeliveryID1" function="Count" PathID="deliveryPartnerDelivery_HeaderCount_DeliveryID1">
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
				<Section id="64" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="65" visible="True" lines="1" name="PartnerDelivery_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="66" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="67" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="75" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="deliveryReport_FooterTotalCount_DeliveryID">
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
				<Section id="68" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="72" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="deliveryPage_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="73" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="74" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
				<TableParameter id="80" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="81" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="85" conditionType="Parameter" useIsNull="False" field="PartnerDelivery" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="-1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="56" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="57" tableName="delivery" fieldName="DeliveryID"/>
				<Field id="58" tableName="delivery" fieldName="PartnerDelivery"/>
				<Field id="59" tableName="delivery" fieldName="DataDelivery"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="62" name="PartnerDelivery" field="PartnerDelivery" sqlField="PartnerDelivery" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<FlashChart id="86" secured="False" dataSeriesIn="Rows" chartType="3d_pie" sourceType="SQL" defaultPageSize="25" returnValueType="Number" name="FlashChart1" PathID="FlashChart1" connection="registry_db" schemaName="{user}_Autumn 5" layout="1" gridCaptionField="PartnerDelivery" width="400" height="300" displayTitle="True" title="{res:Partner_deliveries_inall_facilities}" displayLegend="True" displayLabels="True" displayGridLines="True" directionType="degrees" autoRotate="yes" template="&lt;root&gt;
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
		&lt;title position=&quot;top&quot; align=&quot;center&quot; border=&quot;no&quot; alpha=&quot;100&quot; visible=&quot;yes&quot; text=&quot;{res:Partner_deliveries_inall_facilities}&quot;&gt;&lt;font face=&quot;TimesNewRoman&quot; size=&quot;24&quot; bold=&quot;yes&quot; uline=&quot;yes&quot; italic=&quot;no&quot; color=&quot;000000&quot;/&gt;&lt;/title&gt;
	&lt;/chartarea&gt;
	&lt;objects&gt;
	&lt;/objects&gt;
	&lt;data&gt;
		&lt;columns&gt;
			&lt;column field=&quot;DelivCount&quot; name=&quot;DelivCount&quot;/&gt;&lt;/columns&gt;
		&lt;rows&gt;&lt;!-- BEGIN Row --&gt;&lt;row col1=&quot;{DelivCount}&quot; name=&quot;{PartnerDelivery}&quot;/&gt;&lt;!-- END Row --&gt;&lt;/rows&gt;&lt;/data&gt;
&lt;/root&gt;
" orderBy="PartnerDelivery" groupBy="PartnerDelivery" isCaption="true" dataSource="SELECT COUNT(DeliveryID) AS DelivCount, 'Так' AS PartnerDelivery 	
FROM delivery
WHERE delivery.DataDelivery &gt;= '{s_DataDelivery}'
AND delivery.DataDelivery &lt;= '{s_DataDelivery1}'
AND PartnerDelivery = 1
GROUP BY PartnerDelivery 


UNION

SELECT COUNT(DeliveryID) AS DelivCount, 'Ні' AS PartnerDelivery 	
FROM delivery
WHERE delivery.DataDelivery &gt;= '{s_DataDelivery}'
AND delivery.DataDelivery &lt;= '{s_DataDelivery1}'
AND PartnerDelivery = 0
GROUP BY PartnerDelivery" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components/>
			<Events/>
			<Attributes/>
			<DataSeries>
				<Field id="252" fieldName="DelivCount" alias="DelivCount"/>
			</DataSeries>
			<TableParameters>
				<TableParameter id="204" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="205" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="206" conditionType="Parameter" useIsNull="False" field="PartnerDelivery" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="-1"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
				<Field id="197" fieldName="COUNT(DeliveryID)" isExpression="True" alias="DelivCount"/>
			</Fields>
			<AllFields>
				<Field id="248" fieldName="DelivCount"/>
				<Field id="250" fieldName="PartnerDelivery"/>
			</AllFields>
			<SelectedFields>
				<Field id="249" fieldName="DelivCount" isExpression="True"/>
				<Field id="251" fieldName="PartnerDelivery" isExpression="True"/>
			</SelectedFields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="213" parameterType="URL" variable="s_DataDelivery" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="214" parameterType="URL" variable="s_DataDelivery1" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery1" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
			</SQLParameters>
			<SecurityGroups/>
			<Features/>
		</FlashChart>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_delivery_partner_district_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_delivery_partner_district.php" forShow="True" url="report_delivery_partner_district.php" comment="//" codePage="utf-8"/>
		<CodeFile id="FlashChartXML86" language="PHPTemplates" name="report_delivery_partner_districtFlashChart1.xml" forShow="False" comment="&lt;!--" commentEnd="--&gt;" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="82" groupID="1"/>
		<Group id="83" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
