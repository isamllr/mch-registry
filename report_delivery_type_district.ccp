<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" connection="registry_db">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="delivery, facilities, deliverytype" name="delivery_facilities_deliv" wizardCaption="{res:CCS_ReportFormPrefix} {res:deliveryfacilitiesdeliverytype} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="25" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="26" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="28" visible="True" lines="1" name="FacilityName_Header">
					<Components>
						<ReportLabel id="38" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" fieldSource="FacilityName" wizardCaption="FacilityName" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="delivery_facilities_delivFacilityName_HeaderFacilityName">
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
				<Section id="30" visible="True" lines="1" name="DeliveryTypeName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="39" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="DeliveryTypeName" fieldSource="DeliveryTypeName" wizardCaption="DeliveryTypeName" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="delivery_facilities_delivDeliveryTypeName_HeaderDeliveryTypeName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="40" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="DeliveryTypeName" name="Count_deliverytype_DeliveryTypeID1" summarised="True" function="Count" wizardCaption="{res:deliverytype_DeliveryTypeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities_delivDeliveryTypeName_HeaderCount_deliverytype_DeliveryTypeID1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="54" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="DeliveryTypeName" name="Count_deliverytype_DeliveryTypeID2" summarised="True" function="Count" wizardCaption="{res:deliverytype_DeliveryTypeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities_delivDeliveryTypeName_HeaderCount_deliverytype_DeliveryTypeID2" percentOf="FacilityName" format="0.#%">
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
				<Section id="31" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="32" visible="True" lines="1" name="DeliveryTypeName_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="33" visible="True" lines="1" name="FacilityName_Footer">
					<Components>
						<ReportLabel id="41" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="FacilityName" name="Count_deliverytype_DeliveryTypeID" summarised="True" function="Count" wizardCaption="{res:deliverytype_DeliveryTypeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities_delivFacilityName_FooterCount_deliverytype_DeliveryTypeID">
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
				<Section id="34" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="35" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="45" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_deliverytype_DeliveryTypeID" summarised="True" function="Count" wizardCaption="{res:deliverytype_DeliveryTypeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities_delivReport_FooterTotalCount_deliverytype_DeliveryTypeID">
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
				<Section id="36" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="42" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="delivery_facilities_delivPage_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="43" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="44" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="51" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="FacilityName" parameterSource="s_FacilityName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="91" conditionType="Parameter" useIsNull="False" field="delivery.DeliveryTypeID" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="99"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="431"/>
				<JoinTable id="5" tableName="facilities" posLeft="191" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="7" tableName="deliverytype" posLeft="371" posTop="201" posWidth="125" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="6" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="8" tableLeft="delivery" tableRight="deliverytype" fieldLeft="delivery.DeliveryTypeID" fieldRight="deliverytype.DeliveryTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="9" tableName="delivery" fieldName="delivery.DeliveryTypeID" alias="delivery_DeliveryTypeID"/>
				<Field id="12" tableName="deliverytype" fieldName="DeliveryTypeName"/>
				<Field id="13" tableName="deliverytype" fieldName="deliverytype.DeliveryTypeID" alias="deliverytype_DeliveryTypeID"/>
				<Field id="14" tableName="facilities" fieldName="FacilityName"/>
				<Field id="15" tableName="delivery" fieldName="DataDelivery"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="27" name="FacilityName" field="FacilityName" sqlField="facilities.FacilityName" sortOrder="asc"/>
				<ReportGroup id="29" name="DeliveryTypeName" field="DeliveryTypeName" sqlField="deliverytype.DeliveryTypeName" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="16" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_deliverytype_fac" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_deliverytype_fac} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_delivery_type_district.ccp" PathID="delivery_deliverytype_fac" pasteActions="pasteActions">
			<Components>
				<Button id="17" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_deliverytype_facButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_deliverytype_facs_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="19" name="DatePicker_s_DataDelivery" control="s_DataDelivery" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_deliverytype_facDatePicker_s_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="delivery_deliverytype_facs_FacilityName" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityName" textColumn="FacilityName">
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
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery1" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_deliverytype_facs_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="50" name="DatePicker_s_DataDelivery1" control="s_DataDelivery1" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_deliverytype_facDatePicker_s_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="24" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
		<Link id="21" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_delivery_type_district.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="23" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="22" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="55" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" connection="registry_db" dataSource="delivery, deliverytype" name="delivery_deliverytype" wizardCaption="{res:CCS_ReportFormPrefix} {res:deliverydeliverytype} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="68" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="69" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="85" visible="False" name="Sorter_DeliveryID" column="DeliveryID" wizardCaption="{res:DeliveryID}" wizardSortingType="SimpleDir" wizardControl="DeliveryID">
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
				<Section id="71" visible="True" lines="1" name="DeliveryTypeName_Header" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="78" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="DeliveryTypeName" fieldSource="DeliveryTypeName" wizardCaption="DeliveryTypeName" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="delivery_deliverytypeDeliveryTypeName_HeaderDeliveryTypeName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="79" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="DeliveryTypeName" name="Count_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_deliverytypeDeliveryTypeName_HeaderCount_DeliveryID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="86" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="DeliveryTypeName" name="Count_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_deliverytypeDeliveryTypeName_HeaderCount_DeliveryID1" percentOf="Report" format="0.#%">
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
				<Section id="72" visible="False" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="73" visible="True" lines="1" name="DeliveryTypeName_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="74" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="75" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="83" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_deliverytypeReport_FooterTotalCount_DeliveryID">
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
				<Section id="76" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="80" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="delivery_deliverytypePage_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="81" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="82" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
				<TableParameter id="87" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="88" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="92" conditionType="Parameter" useIsNull="False" field="delivery.DeliveryTypeID" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="99"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="56" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="437"/>
				<JoinTable id="57" tableName="deliverytype" posLeft="191" posTop="10" posWidth="125" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="67" tableLeft="delivery" tableRight="deliverytype" fieldLeft="delivery.DeliveryTypeID" fieldRight="deliverytype.DeliveryTypeID" joinType="left" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="59" tableName="delivery" fieldName="delivery.DeliveryTypeID" alias="delivery_DeliveryTypeID"/>
				<Field id="61" tableName="delivery" fieldName="DeliveryID"/>
				<Field id="62" tableName="delivery" fieldName="DataDelivery"/>
				<Field id="66" tableName="deliverytype" fieldName="deliverytype.*"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="70" name="DeliveryTypeName" field="DeliveryTypeName" sqlField="deliverytype.DeliveryTypeName" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<FlashChart id="93" secured="False" dataSeriesIn="Rows" chartType="3d_pie" sourceType="Table" defaultPageSize="25" returnValueType="Number" name="FlashChart1" PathID="FlashChart1" connection="registry_db" dataSource="delivery, deliverytype" schemaName="{user}_Autumn 4" layout="1" gridCaptionField="DeliveryTypeName" width="400" height="300" displayTitle="True" title="{res:Delivery_types_inAll_facilities}" displayLegend="True" displayLabels="True" displayGridLines="True" directionType="degrees" autoRotate="yes" template="&lt;root&gt;
	&lt;schema name=&quot;Autumn&quot;&gt;
		&lt;mask name=&quot;0&quot;/&gt;
		&lt;colors&gt;&lt;color value=&quot;297CC0&quot;/&gt;&lt;color value=&quot;F8C909&quot;/&gt;&lt;color value=&quot;67AA0D&quot;/&gt;&lt;color value=&quot;F74A22&quot;/&gt;&lt;color value=&quot;2EABA7&quot;/&gt;&lt;color value=&quot;FF9000&quot;/&gt;&lt;color value=&quot;293CBC&quot;/&gt;&lt;color value=&quot;9E9EF2&quot;/&gt;&lt;color value=&quot;4FC634&quot;/&gt;&lt;color value=&quot;347821&quot;/&gt;&lt;color value=&quot;0CABED&quot;/&gt;&lt;color value=&quot;FDC782&quot;/&gt;&lt;color value=&quot;028B98&quot;/&gt;&lt;color value=&quot;5A75D7&quot;/&gt;&lt;color value=&quot;BF1800&quot;/&gt;&lt;color value=&quot;DB75F4&quot;/&gt;&lt;color value=&quot;5EE2FF&quot;/&gt;&lt;color value=&quot;F0007D&quot;/&gt;&lt;color value=&quot;97ABBF&quot;/&gt;&lt;color value=&quot;CAE89C&quot;/&gt;&lt;color value=&quot;FFF69B&quot;/&gt;&lt;color value=&quot;DD420E&quot;/&gt;&lt;color value=&quot;A6FD8C&quot;/&gt;&lt;color value=&quot;E7C339&quot;/&gt;&lt;color value=&quot;E0D4F9&quot;/&gt;&lt;color value=&quot;FDDD88&quot;/&gt;&lt;color value=&quot;D7EAFD&quot;/&gt;&lt;color value=&quot;9ED4EE&quot;/&gt;&lt;color value=&quot;5A75D7&quot;/&gt;&lt;color value=&quot;B6B209&quot;/&gt;&lt;color value=&quot;D4B8CA&quot;/&gt;&lt;color value=&quot;4E89F6&quot;/&gt;&lt;color value=&quot;F7575F&quot;/&gt;&lt;color value=&quot;95CACC&quot;/&gt;&lt;color value=&quot;CBDAFB&quot;/&gt;&lt;color value=&quot;D7DD89&quot;/&gt;&lt;color value=&quot;C1C8CF&quot;/&gt;&lt;color value=&quot;CB8A53&quot;/&gt;&lt;color value=&quot;D0DDC4&quot;/&gt;&lt;color value=&quot;EF8C2F&quot;/&gt;&lt;/colors&gt;
	&lt;/schema&gt;
	&lt;separator decimal=&quot;,&quot; group=&quot;&quot;/&gt;
	&lt;background border=&quot;yes&quot; beginColor=&quot;FFFFFF&quot; endColor=&quot;FFFFFF&quot; color=&quot;FFFFFF&quot; gradient=&quot;no&quot;/&gt;
	&lt;chartarea border=&quot;yes&quot; alpha=&quot;100&quot; beginColor=&quot;c9c8ac&quot; endColor=&quot;f6f6d6&quot; bgcolor=&quot;c9c8ac&quot; gradient=&quot;yes&quot;&gt;
		&lt;grid line_style=&quot;medium&quot; alpha=&quot;100&quot; color=&quot;8e8d65&quot; visible=&quot;yes&quot;/&gt;
		&lt;vertical_axis visible=&quot;yes&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;14&quot; bold=&quot;yes&quot; italic=&quot;no&quot; uline=&quot;no&quot; color=&quot;605f43&quot;/&gt;&lt;/vertical_axis&gt;
		&lt;horizontal_axis visible=&quot;yes&quot; rotation=&quot;degrees&quot; autoRotate=&quot;yes&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;14&quot; bold=&quot;yes&quot; italic=&quot;no&quot; uline=&quot;no&quot; color=&quot;605f43&quot;/&gt;&lt;/horizontal_axis&gt;
		&lt;chart line_thick=&quot;2&quot; enabled=&quot;yes&quot; border=&quot;yes&quot; alpha=&quot;100&quot; isBorderBright=&quot;no&quot; border_color=&quot;000000&quot; type=&quot;3d_pie&quot; series=&quot;rows&quot;&gt;
			&lt;inscriptions color=&quot;605f43&quot; visible=&quot;yes&quot;&gt;&lt;font face=&quot;Verdana&quot; size=&quot;11&quot; bold=&quot;no&quot; italic=&quot;no&quot; uline=&quot;no&quot;/&gt;&lt;/inscriptions&gt;
			&lt;animation type=&quot;none&quot; time=&quot;2000&quot;/&gt;
			&lt;markers size=&quot;8&quot; type=&quot;0&quot;/&gt;
			&lt;hints border=&quot;yes&quot; enabled=&quot;yes&quot; color=&quot;FFFF99&quot;&gt;&lt;font face=&quot;Verdana&quot; size=&quot;11&quot; bold=&quot;no&quot; italic=&quot;no&quot; uline=&quot;no&quot; color=&quot;605f43&quot;/&gt;&lt;/hints&gt;
		&lt;/chart&gt;
		&lt;legend sqr_size=&quot;12&quot; sqr_borders=&quot;yes&quot; border_thick=&quot;0&quot; alpha=&quot;100&quot; position=&quot;top-left&quot; layout=&quot;horizontal&quot; visible=&quot;yes&quot;&gt;&lt;font face=&quot;Verdana&quot; size=&quot;11&quot; bold=&quot;no&quot; italic=&quot;no&quot; uline=&quot;no&quot; color=&quot;605f43&quot;/&gt;&lt;/legend&gt;
		&lt;title position=&quot;top&quot; align=&quot;center&quot; border=&quot;no&quot; alpha=&quot;100&quot; visible=&quot;yes&quot; text=&quot;{res:Delivery_types_inAll_facilities}&quot;&gt;&lt;font face=&quot;TimesNewRoman&quot; size=&quot;24&quot; bold=&quot;yes&quot; uline=&quot;yes&quot; italic=&quot;no&quot; color=&quot;000000&quot;/&gt;&lt;/title&gt;
	&lt;/chartarea&gt;
	&lt;objects&gt;
	&lt;/objects&gt;
	&lt;data&gt;
		&lt;columns&gt;
			&lt;column field=&quot;DelivCount&quot; name=&quot;DelivCount&quot;/&gt;&lt;/columns&gt;
		&lt;rows&gt;&lt;!-- BEGIN Row --&gt;&lt;row col1=&quot;{DelivCount}&quot; name=&quot;{DeliveryTypeName}&quot;/&gt;&lt;!-- END Row --&gt;&lt;/rows&gt;&lt;/data&gt;
&lt;/root&gt;
" activeCollection="TableParameters" parameterTypeListName="ParameterTypeList" isCaption="true" orderBy="DeliveryTypeName" groupBy="DeliveryTypeName">
			<Components/>
			<Events/>
			<Attributes/>
			<DataSeries>
				<Field id="153" fieldName="DelivCount" alias="DelivCount"/>
			</DataSeries>
			<TableParameters>
				<TableParameter id="147" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="148" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="135" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="417"/>
				<JoinTable id="136" tableName="deliverytype" posLeft="191" posTop="10" posWidth="125" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="137" tableLeft="delivery" tableRight="deliverytype" fieldLeft="delivery.DeliveryTypeID" fieldRight="deliverytype.DeliveryTypeID" joinType="left" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="139" tableName="deliverytype" fieldName="DeliveryTypeName"/>
				<Field id="140" fieldName="COUNT(DeliveryID)" isExpression="True" alias="DelivCount"/>
			</Fields>
			<AllFields>
				<Field id="149" fieldName="DelivCount"/>
				<Field id="151" fieldName="DeliveryTypeName"/>
			</AllFields>
			<SelectedFields>
				<Field id="150" fieldName="DelivCount" isExpression="True"/>
				<Field id="152" tableName="deliverytype" fieldName="DeliveryTypeName" isExpression="False"/>
			</SelectedFields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="98" variable="s_DataDelivery" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<SQLParameter id="99" variable="s_DataDelivery1" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
			</SQLParameters>
			<SecurityGroups/>
			<Features/>
		</FlashChart>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_delivery_type_district_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_delivery_type_district.php" forShow="True" url="report_delivery_type_district.php" comment="//" codePage="utf-8"/>
		<CodeFile id="FlashChartXML93" language="PHPTemplates" name="report_delivery_type_districtFlashChart1.xml" forShow="False" comment="&lt;!--" commentEnd="--&gt;" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="89" groupID="1"/>
		<Group id="90" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
