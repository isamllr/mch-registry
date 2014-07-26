<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="60" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="89" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_facilities_newbo" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_facilities_newbo} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_on_newborn_district.ccp" PathID="delivery_facilities_newbo" pasteActions="pasteActions">
			<Components>
				<Button id="90" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_facilities_newboButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbos_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="92" name="DatePicker_s_BirthDate" control="s_BirthDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newboDatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="301" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate1" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbos_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="303" name="DatePicker_s_BirthDate1" control="s_BirthDate1" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newboDatePicker_s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="93" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="delivery_facilities_newbos_FacilityName" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityName" textColumn="FacilityName">
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
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="97" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
		<Link id="94" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_on_newborn_district.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="96" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="95" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="170" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="171" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="180" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBornReport_HeaderReport_TotalRecords">
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
				<Section id="172" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="174" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="181" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" wizardCaption="Group1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="NewBornFacilityName_HeaderFacilityName" fieldSource="FacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="218" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="FacilityName" name="CountFacility" PathID="NewBornFacilityName_HeaderCountFacility" fieldSource="FacilityName" function="Count">
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
				<Section id="175" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="176" visible="True" lines="0" name="FacilityName_Footer" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="177" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="178" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="179" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="212" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="214" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex" PathID="NewBornSex_HeaderGroupSex" fieldSource="Sex">
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
						<ReportLabel id="215" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBornSex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="213" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="304" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="305" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="353" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="facilities.FacilityName='{s_FacilityName}'" parameterSource="s_FacilityName" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="187" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="189" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="193" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="579" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="580" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="188" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="192" tableName="facilities" fieldName="FacilityName"/>
				<Field id="199" tableName="newborn" fieldName="Sex"/>
				<Field id="200" tableName="newborn" fieldName="NewBornID"/>
				<Field id="201" tableName="newborn" fieldName="BirthDate"/>
				<Field id="202" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="203" name="FacilityName" field="FacilityName" sortOrder="asc" sqlField="facilities.FacilityName"/>
				<ReportGroup id="211" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="220" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn1" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="221" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="222" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn1Report_HeaderReport_TotalRecords">
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
				<Section id="223" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="224" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="225" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" wizardCaption="Group1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="NewBorn1FacilityName_HeaderFacilityName" fieldSource="FacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="226" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="FacilityName" name="CountFacility" PathID="NewBorn1FacilityName_HeaderCountFacility" fieldSource="FacilityName" function="Count">
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
				<Section id="227" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="228" visible="True" lines="0" name="FacilityName_Footer" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="229" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="230" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="231" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="237" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="238" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex1" PathID="NewBorn1Sex_HeaderGroupSex1" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="239" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="240" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn1Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="241" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="259" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&lt;500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="306" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="307" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="354" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="242" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="243" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="244" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="581" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="582" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="249" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="250" tableName="facilities" fieldName="FacilityName"/>
				<Field id="251" tableName="newborn" fieldName="Sex"/>
				<Field id="252" tableName="newborn" fieldName="NewBornID"/>
				<Field id="253" tableName="newborn" fieldName="BirthDate"/>
				<Field id="254" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="256" name="FacilityName" field="FacilityName" sortOrder="asc" sqlField="facilities.FacilityName"/>
				<ReportGroup id="258" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="260" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn2" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="261" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="262" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn2Report_HeaderReport_TotalRecords">
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
				<Section id="263" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="264" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="265" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" wizardCaption="Group1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="NewBorn2FacilityName_HeaderFacilityName" fieldSource="FacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="266" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="FacilityName" name="CountFacility" PathID="NewBorn2FacilityName_HeaderCountFacility" fieldSource="FacilityName" function="Count">
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
				<Section id="267" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="268" visible="True" lines="0" name="FacilityName_Footer" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="269" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="270" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="271" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="277" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="278" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn2Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="279" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="280" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn2Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="281" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="282" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="300" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="308" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="309" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="355" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="283" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="284" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="285" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="583" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="584" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="290" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="291" tableName="facilities" fieldName="FacilityName"/>
				<Field id="292" tableName="newborn" fieldName="Sex"/>
				<Field id="293" tableName="newborn" fieldName="NewBornID"/>
				<Field id="294" tableName="newborn" fieldName="BirthDate"/>
				<Field id="295" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="297" name="FacilityName" field="FacilityName" sortOrder="asc" sqlField="facilities.FacilityName"/>
				<ReportGroup id="299" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="310" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn3" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="311" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="312" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn3Report_HeaderReport_TotalRecords">
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
				<Section id="313" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="314" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="315" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" wizardCaption="Group1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="NewBorn3FacilityName_HeaderFacilityName" fieldSource="FacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="316" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="FacilityName" name="CountFacility" PathID="NewBorn3FacilityName_HeaderCountFacility" fieldSource="FacilityName" function="Count">
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
				<Section id="317" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="318" visible="True" lines="0" name="FacilityName_Footer" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="319" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="320" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="321" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="327" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="328" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn3Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="329" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="330" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn3Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="331" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="332" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="333" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="334" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="335" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="356" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="336" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="337" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="338" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="585" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="586" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="343" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="344" tableName="facilities" fieldName="FacilityName"/>
				<Field id="345" tableName="newborn" fieldName="Sex"/>
				<Field id="346" tableName="newborn" fieldName="NewBornID"/>
				<Field id="347" tableName="newborn" fieldName="BirthDate"/>
				<Field id="348" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="350" name="FacilityName" field="FacilityName" sortOrder="asc" sqlField="facilities.FacilityName"/>
				<ReportGroup id="352" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="357" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn4" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="358" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="359" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn4Report_HeaderReport_TotalRecords">
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
				<Section id="360" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="361" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="362" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" wizardCaption="Group1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="NewBorn4FacilityName_HeaderFacilityName" fieldSource="FacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="363" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="FacilityName" name="CountFacility" PathID="NewBorn4FacilityName_HeaderCountFacility" fieldSource="FacilityName" function="Count">
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
				<Section id="364" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="365" visible="True" lines="0" name="FacilityName_Footer" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="366" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="367" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="368" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="374" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="375" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn4Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="376" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="377" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn4Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="378" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="379" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="380" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="381" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="382" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="383" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="384" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="385" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="386" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="587" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="588" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="391" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="392" tableName="facilities" fieldName="FacilityName"/>
				<Field id="393" tableName="newborn" fieldName="Sex"/>
				<Field id="394" tableName="newborn" fieldName="NewBornID"/>
				<Field id="395" tableName="newborn" fieldName="BirthDate"/>
				<Field id="396" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="398" name="FacilityName" field="FacilityName" sortOrder="asc" sqlField="facilities.FacilityName"/>
				<ReportGroup id="400" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="401" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn5" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="402" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="403" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn5Report_HeaderReport_TotalRecords">
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
				<Section id="404" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="405" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="406" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" wizardCaption="Group1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="NewBorn5FacilityName_HeaderFacilityName" fieldSource="FacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="407" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="FacilityName" name="CountFacility" PathID="NewBorn5FacilityName_HeaderCountFacility" fieldSource="FacilityName" function="Count">
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
				<Section id="408" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="409" visible="True" lines="0" name="FacilityName_Footer" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="410" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="411" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="412" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="418" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="419" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn5Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="420" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="421" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn5Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="422" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="423" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="424" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="425" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="426" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="427" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="428" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="429" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="430" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="589" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="590" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="435" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="436" tableName="facilities" fieldName="FacilityName"/>
				<Field id="437" tableName="newborn" fieldName="Sex"/>
				<Field id="438" tableName="newborn" fieldName="NewBornID"/>
				<Field id="439" tableName="newborn" fieldName="BirthDate"/>
				<Field id="440" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="442" name="FacilityName" field="FacilityName" sortOrder="asc" sqlField="facilities.FacilityName"/>
				<ReportGroup id="444" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="445" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn6" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="446" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="447" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn6Report_HeaderReport_TotalRecords">
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
				<Section id="448" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="449" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="450" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" wizardCaption="Group1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="NewBorn6FacilityName_HeaderFacilityName" fieldSource="FacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="451" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="FacilityName" name="CountFacility" PathID="NewBorn6FacilityName_HeaderCountFacility" fieldSource="FacilityName" function="Count">
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
				<Section id="452" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="453" visible="True" lines="0" name="FacilityName_Footer" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="454" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="455" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="456" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="462" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="463" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn6Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="464" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="465" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn6Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="466" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="467" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="468" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="469" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="470" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="471" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="472" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="473" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="474" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="591" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="592" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="479" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="480" tableName="facilities" fieldName="FacilityName"/>
				<Field id="481" tableName="newborn" fieldName="Sex"/>
				<Field id="482" tableName="newborn" fieldName="NewBornID"/>
				<Field id="483" tableName="newborn" fieldName="BirthDate"/>
				<Field id="484" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="486" name="FacilityName" field="FacilityName" sortOrder="asc" sqlField="facilities.FacilityName"/>
				<ReportGroup id="488" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="489" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn7" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="490" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="491" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn7Report_HeaderReport_TotalRecords">
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
				<Section id="492" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="493" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="494" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" wizardCaption="Group1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="NewBorn7FacilityName_HeaderFacilityName" fieldSource="FacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="495" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="FacilityName" name="CountFacility" PathID="NewBorn7FacilityName_HeaderCountFacility" fieldSource="FacilityName" function="Count">
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
				<Section id="496" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="497" visible="True" lines="0" name="FacilityName_Footer" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="498" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="499" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="500" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="506" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="507" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn7Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="508" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="509" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn7Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="510" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="511" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="512" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=3499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="513" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="514" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="515" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="516" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="517" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="518" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="593" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="594" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="523" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="524" tableName="facilities" fieldName="FacilityName"/>
				<Field id="525" tableName="newborn" fieldName="Sex"/>
				<Field id="526" tableName="newborn" fieldName="NewBornID"/>
				<Field id="527" tableName="newborn" fieldName="BirthDate"/>
				<Field id="528" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="530" name="FacilityName" field="FacilityName" sortOrder="asc" sqlField="facilities.FacilityName"/>
				<ReportGroup id="532" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="533" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn8" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="534" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="535" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn8Report_HeaderReport_TotalRecords">
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
				<Section id="536" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="537" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="538" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" wizardCaption="Group1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="NewBorn8FacilityName_HeaderFacilityName" fieldSource="FacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="539" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="FacilityName" name="CountFacility" PathID="NewBorn8FacilityName_HeaderCountFacility" fieldSource="FacilityName" function="Count">
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
				<Section id="540" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="541" visible="True" lines="0" name="FacilityName_Footer" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="542" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="543" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="544" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="550" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="551" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn8Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="552"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="553" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn8Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="554" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="555" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="557" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="558" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="559" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="560" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="561" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="562" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="595" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
<JoinTable2 id="596" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="567" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="568" tableName="facilities" fieldName="FacilityName"/>
				<Field id="569" tableName="newborn" fieldName="Sex"/>
				<Field id="570" tableName="newborn" fieldName="NewBornID"/>
				<Field id="571" tableName="newborn" fieldName="BirthDate"/>
				<Field id="572" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="574" name="FacilityName" field="FacilityName" sortOrder="asc" sqlField="facilities.FacilityName"/>
				<ReportGroup id="576" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="report_on_newborn_district.php" forShow="True" url="report_on_newborn_district.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="report_on_newborn_district_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="577" groupID="1"/>
		<Group id="578" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
