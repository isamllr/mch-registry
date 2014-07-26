<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" pasteActions="pasteActions">
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
				<Section id="30" visible="True" lines="1" name="DeliveryTypeName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="39" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="DeliveryTypeName" fieldSource="DeliveryTypeName" wizardCaption="DeliveryTypeName" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="delivery_facilities_delivDeliveryTypeName_HeaderDeliveryTypeName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="40" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="DeliveryTypeName" name="Count_deliverytype_DeliveryTypeID1" summarised="True" function="Count" wizardCaption="{res:deliverytype_DeliveryTypeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities_delivDeliveryTypeName_HeaderCount_deliverytype_DeliveryTypeID1" percentOf="Report" format="0.#%">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="152" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="DeliveryTypeName" name="Count_deliverytype_DeliveryTypeID2" summarised="True" function="Count" wizardCaption="{res:deliverytype_DeliveryTypeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities_delivDeliveryTypeName_HeaderCount_deliverytype_DeliveryTypeID2">
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
				<Section id="34" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteActions="pasteActions">
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
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="52" conditionType="Parameter" useIsNull="False" field="delivery.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="51" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="209" conditionType="Parameter" useIsNull="False" field="delivery.DeliveryTypeID" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="99"/>
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
				<ReportGroup id="29" name="DeliveryTypeName" field="DeliveryTypeName" sqlField="deliverytype.DeliveryTypeName" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="16" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_deliverytype_fac" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_deliverytype_fac} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_statistical_delivery_facilities.ccp" PathID="delivery_deliverytype_fac" pasteActions="pasteActions">
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
						<Action actionName="Hide-Show Component" actionCategory="General" id="24" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression" eventType="Server"/>
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
		<Link id="21" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_statistical_delivery_facilities.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="23" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="22" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="54" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="delivery, deliverymethod, facilities" name="delivery_deliverymethod_f1" wizardCaption="{res:CCS_ReportFormPrefix} {res:deliverydeliverymethodfacilities} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="55" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="57" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="58" visible="True" lines="1" name="FacilityName_Header">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="60" visible="True" lines="1" name="DeliveryMethodName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="61" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="DeliveryMethodName" fieldSource="DeliveryMethodName" wizardCaption="DeliveryMethodName" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="delivery_deliverymethod_f1DeliveryMethodName_HeaderDeliveryMethodName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="62" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="DeliveryMethodName" name="Count_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_deliverymethod_f1DeliveryMethodName_HeaderCount_DeliveryID1">
							<Components/>
							<Events/>
							<Attributes/>

							<Features/>
						</ReportLabel>
						<ReportLabel id="63" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="DeliveryMethodName" name="Count_DeliveryID2" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_deliverymethod_f1DeliveryMethodName_HeaderCount_DeliveryID2" percentOf="FacilityName" format="0.#%">
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
				<Section id="64" visible="True" lines="1" name="Detail" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="65" visible="True" lines="1" name="DeliveryMethodName_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="66" visible="True" lines="1" name="FacilityName_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="68" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="69" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="70" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_deliverymethod_f1Report_FooterTotalCount_DeliveryID">
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
				<Section id="71" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="74" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="75" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="76" conditionType="Parameter" useIsNull="False" field="delivery.FacilityID" dataType="Integer" logicOperator="And" searchConditionType="In" parameterType="Session" orderNumber="2" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
				<TableParameter id="210" conditionType="Parameter" useIsNull="False" field="delivery.DeliveryMethodID" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="99"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="77" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="452"/>
				<JoinTable id="78" tableName="deliverymethod" posLeft="255" posTop="311" posWidth="141" posHeight="88"/>
				<JoinTable id="79" tableName="facilities" posLeft="191" posTop="10" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="80" tableLeft="delivery" tableRight="deliverymethod" fieldLeft="delivery.DeliveryMethodID" fieldRight="deliverymethod.DeliveryMethodID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="81" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="11" tableName="facilities" fieldName="FacilityName"/>
				<Field id="82" tableName="deliverymethod" fieldName="DeliveryMethodName"/>
				<Field id="83" tableName="delivery" fieldName="DeliveryID"/>
				<Field id="84" tableName="delivery" fieldName="DataDelivery"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="85" name="FacilityName" field="FacilityName" sqlField="facilities.FacilityName" sortOrder="asc"/>
				<ReportGroup id="86" name="DeliveryMethodName" field="DeliveryMethodName" sqlField="deliverymethod.DeliveryMethodName" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="87" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="delivery, facilities" name="delivery_facilities1" wizardCaption="{res:CCS_ReportFormPrefix} {res:deliveryfacilities} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="88" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="90" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="91" visible="True" lines="1" name="FacilityName_Header">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="93" visible="True" lines="1" name="PartnerDelivery_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="94" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="PartnerDelivery" fieldSource="PartnerDelivery" wizardCaption="PartnerDelivery" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="delivery_facilities1PartnerDelivery_HeaderPartnerDelivery">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="95"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="96" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="PartnerDelivery" name="Count_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities1PartnerDelivery_HeaderCount_DeliveryID1">
							<Components/>
							<Events>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="98" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="PartnerDelivery" name="Count_DeliveryID2" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities1PartnerDelivery_HeaderCount_DeliveryID2" percentOf="FacilityName" format="0.#%">
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
				<Section id="99" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="100" visible="True" lines="1" name="PartnerDelivery_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="101" visible="True" lines="1" name="FacilityName_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="103" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="104" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="105" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities1Report_FooterTotalCount_DeliveryID">
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
				<Section id="106" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="110" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="111" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="112" conditionType="Parameter" useIsNull="False" field="delivery.FacilityID" dataType="Integer" logicOperator="And" searchConditionType="In" parameterType="Session" orderNumber="2" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
				<TableParameter id="211" conditionType="Parameter" useIsNull="False" field="delivery.PartnerDelivery" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="-1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="113" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="417"/>
				<JoinTable id="114" tableName="facilities" posLeft="191" posTop="10" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="115" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="116" tableName="delivery" fieldName="DataDelivery"/>
				<Field id="117" tableName="delivery" fieldName="PartnerDelivery"/>
				<Field id="10" tableName="facilities" fieldName="FacilityName"/>
				<Field id="118" tableName="delivery" fieldName="DeliveryID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="119" name="FacilityName" field="FacilityName" sqlField="facilities.FacilityName" sortOrder="asc"/>
				<ReportGroup id="120" name="PartnerDelivery" field="PartnerDelivery" sqlField="delivery.PartnerDelivery" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="121" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" connection="registry_db" dataSource="delivery, facilities" name="delivery_facilities2" wizardCaption="{res:CCS_ReportFormPrefix} {res:deliveryfacilities} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="122" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="124" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="125" visible="True" lines="1" name="FacilityName_Header">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="127" visible="True" lines="1" name="Partogram_Header">
					<Components>
						<ReportLabel id="128" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Partogram" fieldSource="Partogram" wizardCaption="Partogram" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="delivery_facilities2Partogram_HeaderPartogram">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="129"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="130" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Partogram" name="Count_DeliveryID2" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities2Partogram_HeaderCount_DeliveryID2">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="131" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Partogram" name="Count_DeliveryID3" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities2Partogram_HeaderCount_DeliveryID3" percentOf="FacilityName" format="0.#%">
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
				<Section id="132" visible="False" lines="1" name="Detail">
					<Components>
						<ReportLabel id="133" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="delivery_facilities2DetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="134" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="DeliveryID" fieldSource="DeliveryID" wizardCaption="DeliveryID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="delivery_facilities2DetailDeliveryID" format="0.#%">
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
				<Section id="135" visible="True" lines="1" name="Partogram_Footer">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="20" visible="True" lines="1" name="FacilityName_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="137" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="138" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="139" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_facilities2Report_FooterTotalCount_DeliveryID">
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
				<Section id="140" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="144" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="145" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="146" conditionType="Parameter" useIsNull="False" field="delivery.FacilityID" dataType="Integer" logicOperator="And" searchConditionType="In" parameterType="Session" orderNumber="2" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
				<TableParameter id="212" conditionType="Parameter" useIsNull="False" field="delivery.Partogram" dataType="Integer" searchConditionType="NotEqual" parameterType="Expression" logicOperator="And" parameterSource="-1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="147" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="445"/>
				<JoinTable id="148" tableName="facilities" posLeft="191" posTop="10" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="149" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="150" name="FacilityName" field="FacilityName" sqlField="facilities.FacilityName" sortOrder="asc"/>
				<ReportGroup id="151" name="Partogram" field="Partogram" sqlField="delivery.Partogram" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="180" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT * FROM
(
SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, &quot;O1&quot; AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome1ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome1ID != -1
AND delivery.FacilityID IN ({s_Facilities})
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery&lt;= '{s_DataDelivery1}' 

UNION

SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, &quot;O2&quot; AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome2ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome2ID != -1
AND delivery.FacilityID IN ({s_Facilities})
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery&lt;= '{s_DataDelivery1}' 

UNION

SELECT FacilityName, PregnancyOutcomeName as pregnancy_outcome, DeliveryID, &quot;O3&quot; AS O
FROM (delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy_outcome ON delivery.PregnancyOutcome3ID = pregnancy_outcome.PregnancyOutcomeID
WHERE delivery.PregnancyOutcome3ID != -1 
AND delivery.FacilityID IN ({s_Facilities})
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery&lt;= '{s_DataDelivery1}' 

) AS result " name="Report2" wizardCaption="{res:CCS_ReportFormPrefix} {res:Report2} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="181" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="182" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="198" visible="False" name="Sorter_DeliveryID" column="DeliveryID" wizardCaption="{res:DeliveryID}" wizardSortingType="SimpleDir" wizardControl="DeliveryID">
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
				<Section id="184" visible="True" lines="1" name="pregnancy_outcome_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="191" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="pregnancy_outcome" fieldSource="pregnancy_outcome" wizardCaption="pregnancy_outcome" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report2pregnancy_outcome_Headerpregnancy_outcome">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="192" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="pregnancy_outcome" name="Count_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report2pregnancy_outcome_HeaderCount_DeliveryID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="203" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="pregnancy_outcome" name="Count_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report2pregnancy_outcome_HeaderCount_DeliveryID1" percentOf="Report" format="0.#%">
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
				<Section id="185" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="186" visible="True" lines="1" name="pregnancy_outcome_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="187" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="188" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="196" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report2Report_FooterTotalCount_DeliveryID">
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
				<Section id="189" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
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
				<SQLParameter id="200" variable="s_Facilities" parameterType="Session" defaultValue="0" dataType="Integer" format="0;(0)" parameterSource="s_Facilities"/>
				<SQLParameter id="206" variable="s_DataDelivery" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<SQLParameter id="207" variable="s_DataDelivery1" parameterType="URL" defaultValue="CCFormatDate(CCParseDate(&quot;9999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))" dataType="Date" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="183" name="pregnancy_outcome" field="pregnancy_outcome" sqlField="pregnancy_outcome" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="213" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="20" linesPerPhysicalPage="50" name="Report3" connection="registry_db" dataSource="SELECT Physiological, COUNT(DeliveryID) AS DelivCount 
FROM 
(
SELECT 'res:Physiological' AS Physiological, delivery.DeliveryID,
GROUP_CONCAT(DISTINCT '-', procedures.ProcedureTypeID, '-') AS procedures, 
GROUP_CONCAT(DISTINCT '-', complications.ICD10ID, '-') AS complications

FROM ((delivery INNER JOIN facilities ON delivery.FacilityID = facilities.FacilityID)
LEFT JOIN procedures ON procedures.DeliveryID = delivery.DeliveryID)
LEFT JOIN complications ON complications.DeliveryID = delivery.DeliveryID

WHERE 
DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND facilities.FacilityID IN ({s_Facilities})
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
) AS p

UNION

SELECT Physiological, COUNT(DeliveryID) AS DelivCount 
FROM
(
SELECT 'res:Non-Physiological' AS Physiological, delivery.DeliveryID,
'p' AS procedures, 'c' AS complications

FROM ((delivery INNER JOIN facilities ON
delivery.FacilityID = facilities.FacilityID) LEFT JOIN procedures ON
procedures.DeliveryID = delivery.DeliveryID) LEFT JOIN complications ON complications.DeliveryID = delivery.DeliveryID

WHERE 
DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND facilities.FacilityID IN ({s_Facilities})
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

GROUP BY delivery.DeliveryID

) AS np

"><Components><Section id="214" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="215" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="216" visible="False" name="Sorter_DeliveryID" column="DeliveryID" wizardCaption="{res:DeliveryID}" wizardSortingType="SimpleDir" wizardControl="DeliveryID">
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
				<Section id="226" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="217" visible="True" lines="1" name="Physiological_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="218" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Physiological" fieldSource="Physiological" wizardCaption="Physiological" wizardSize="21" wizardMaxLength="21" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="Report3Physiological_HeaderPhysiological">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="219" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="220" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Physiological" name="Count_DeliveryID" summarised="True" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3Physiological_HeaderCount_DeliveryID" fieldSource="DelivCount">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="221" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Physiological" name="Count_DeliveryID1" summarised="True" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3Physiological_HeaderCount_DeliveryID1" percentOf="Report" format="0.#%" fieldSource="DelivCount">
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
				<Section id="222" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="223" visible="True" lines="1" name="Physiological_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="53" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="224" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="225" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID" summarised="True" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="Report3Report_FooterTotalCount_DeliveryID" fieldSource="DelivCount" function="Sum">
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
				<SQLParameter id="229" variable="s_DataDelivery" dataType="Date" parameterType="URL" parameterSource="s_DataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="67" variable="s_DataDelivery1" dataType="Date" parameterType="URL" parameterSource="s_DataDelivery1" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CCFormatDate(CCParseDate(&quot;9999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="230" variable="s_Facilities" dataType="Integer" parameterType="Session" parameterSource="s_Facilities" format="0;(0)" defaultValue="0"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="49" name="Physiological" field="Physiological" sqlField="Physiological" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_statistical_delivery_facilities_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_statistical_delivery_facilities.php" forShow="True" url="report_statistical_delivery_facilities.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="208" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
