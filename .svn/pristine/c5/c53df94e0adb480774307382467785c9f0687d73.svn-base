<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn27" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="4" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="5" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn27Report_HeaderReport_TotalRecords">
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
				<Section id="6" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="7" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="8" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="9" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="10" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="11" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="12" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex" PathID="NewBorn27Sex_HeaderGroupSex" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="13" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="14" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn27Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="15" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="16" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="17" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="18" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="19" conditionType="Expression" useIsNull="False" field="newborn.Died" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1" parameterSource="Died"/>
				<TableParameter id="20" conditionType="Expression" useIsNull="False" field="newborn.DiedID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4" parameterSource="DiedID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="21" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="22" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="23" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="383"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="24" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="25" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="26" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="27" tableName="facilities" fieldName="FacilityName"/>
				<Field id="28" tableName="newborn" fieldName="Sex"/>
				<Field id="29" tableName="newborn" fieldName="NewBornID"/>
				<Field id="30" tableName="newborn" fieldName="BirthDate"/>
				<Field id="31" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="32" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1103" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="63" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn28" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="64" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="65" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn28Report_HeaderReport_TotalRecords">
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
				<Section id="66" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="67" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="68" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="69" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="70" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="71" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="72" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex1" PathID="NewBorn28Sex_HeaderGroupSex1" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="73" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="74" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn28Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="75" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="76" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&lt;500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="77" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="78" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="79" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="80" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="81" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="82" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="83" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="84" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="85" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="86" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="87" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="88" tableName="facilities" fieldName="FacilityName"/>
				<Field id="89" tableName="newborn" fieldName="Sex"/>
				<Field id="90" tableName="newborn" fieldName="NewBornID"/>
				<Field id="91" tableName="newborn" fieldName="BirthDate"/>
				<Field id="92" tableName="newborn" fieldName="Weight"/>
				<Field id="93" tableName="facilities" fieldName="facilities.FacilityID" alias="facilities_FacilityID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="94" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1104" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="127" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn29" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="128" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="129" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn29Report_HeaderReport_TotalRecords">
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
				<Section id="130" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="131" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="132" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="133" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="134" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="135" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="136" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn29Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="137" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="138" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn29Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="139" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="140" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="141" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="142" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="143" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="144" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="145" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="146" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="147" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="148" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="149" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="150" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="151" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="152" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="153" tableName="facilities" fieldName="FacilityName"/>
				<Field id="154" tableName="newborn" fieldName="Sex"/>
				<Field id="155" tableName="newborn" fieldName="NewBornID"/>
				<Field id="156" tableName="newborn" fieldName="BirthDate"/>
				<Field id="157" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="158" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1105" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="191" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn30" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="192" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="193" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn30Report_HeaderReport_TotalRecords">
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
				<Section id="194" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="195" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="196" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="197" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="198" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="199" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="200" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn30Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="201" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="202" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn30Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="203" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="204" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="205" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="206" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="207" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="208" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="209" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="210" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="211" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="212" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="213" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="214" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="215" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="216" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="217" tableName="facilities" fieldName="FacilityName"/>
				<Field id="218" tableName="newborn" fieldName="Sex"/>
				<Field id="219" tableName="newborn" fieldName="NewBornID"/>
				<Field id="220" tableName="newborn" fieldName="BirthDate"/>
				<Field id="221" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="222" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1106" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="255" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn31" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="256" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="257" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn31Report_HeaderReport_TotalRecords">
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
				<Section id="258" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="259" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="260" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="261" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="262" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="263" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="264" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn31Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="265" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="266" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn31Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="267" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="268" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="269" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="270" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="271" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="272" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="273" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="274" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="275" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="276" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="277" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="278" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="279" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="280" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="281" tableName="facilities" fieldName="FacilityName"/>
				<Field id="282" tableName="newborn" fieldName="Sex"/>
				<Field id="283" tableName="newborn" fieldName="NewBornID"/>
				<Field id="284" tableName="newborn" fieldName="BirthDate"/>
				<Field id="285" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="286" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1107" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="319" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn32" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="320" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="321" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn32Report_HeaderReport_TotalRecords">
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
				<Section id="322" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="323" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="324" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="325" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="326" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="327" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="328" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn32Sex_HeaderGroupSex2" fieldSource="Sex">
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
						<ReportLabel id="330" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn32Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<TableParameter id="332" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="333" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="334" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="335" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="336" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="337" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="338" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="339" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="340" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="341" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="342" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="343" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="344" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="345" tableName="facilities" fieldName="FacilityName"/>
				<Field id="346" tableName="newborn" fieldName="Sex"/>
				<Field id="347" tableName="newborn" fieldName="NewBornID"/>
				<Field id="348" tableName="newborn" fieldName="BirthDate"/>
				<Field id="349" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="350" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1108" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="383" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn33" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="384" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="385" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn33Report_HeaderReport_TotalRecords">
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
				<Section id="386" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="387" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="388" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="389" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="390" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="391" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="392" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn33Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="393" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="394" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn33Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="395" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="396" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="397" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="398" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="399" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="400" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="401" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="402" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="403" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="404" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="405" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="406" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="407" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="408" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="409" tableName="facilities" fieldName="FacilityName"/>
				<Field id="410" tableName="newborn" fieldName="Sex"/>
				<Field id="411" tableName="newborn" fieldName="NewBornID"/>
				<Field id="412" tableName="newborn" fieldName="BirthDate"/>
				<Field id="413" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="414" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1112" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="447" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn34" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="448" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="449" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn34Report_HeaderReport_TotalRecords">
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
				<Section id="450" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="451" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="452" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="453" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="454" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="455" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="456" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn34Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="457" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="458" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn34Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="459" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="460" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="461" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=3499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="462" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="463" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="464" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="465" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="466" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="467" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="468" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="469" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="470" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="471" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="472" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="473" tableName="facilities" fieldName="FacilityName"/>
				<Field id="474" tableName="newborn" fieldName="Sex"/>
				<Field id="475" tableName="newborn" fieldName="NewBornID"/>
				<Field id="476" tableName="newborn" fieldName="BirthDate"/>
				<Field id="477" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="478" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1113" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="511" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn35" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="512" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="513" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn35Report_HeaderReport_TotalRecords">
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
				<Section id="514" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="515" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="516" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="517" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="518" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="519" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="520" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn35Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="521" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="522" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn35Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="523" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="524" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="525" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="526" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="527" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="528" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="529" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="530" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="531" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="532" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="533" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="534" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="535" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="536" tableName="facilities" fieldName="FacilityName"/>
				<Field id="537" tableName="newborn" fieldName="Sex"/>
				<Field id="538" tableName="newborn" fieldName="NewBornID"/>
				<Field id="539" tableName="newborn" fieldName="BirthDate"/>
				<Field id="540" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="541" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1114" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="543" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn36" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="544" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="545" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn36Report_HeaderReport_TotalRecords">
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
				<Section id="546" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="547" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="548" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="549" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="550" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="551" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="552" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex" PathID="NewBorn36Sex_HeaderGroupSex" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="553"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="554" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn36Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="555" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="556" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="557" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="559" conditionType="Expression" useIsNull="False" field="newborn.Died" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1" parameterSource="Died"/>
				<TableParameter id="560" conditionType="Expression" useIsNull="False" field="newborn.DiedID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4" parameterSource="DiedID"/>
				<TableParameter id="1132" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="561" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="562" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="563" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="383"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="564" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="565" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="566" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="567" tableName="facilities" fieldName="FacilityName"/>
				<Field id="568" tableName="newborn" fieldName="Sex"/>
				<Field id="569" tableName="newborn" fieldName="NewBornID"/>
				<Field id="570" tableName="newborn" fieldName="BirthDate"/>
				<Field id="571" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="572" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1115" groupID="1" read="True"/>
				<Group id="1116" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="603" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn37" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="604" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="605" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn37Report_HeaderReport_TotalRecords">
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
				<Section id="606" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="607" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="608" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="609" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="610" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="611" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="612" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex1" PathID="NewBorn37Sex_HeaderGroupSex1" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="613"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="614" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn37Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="615" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="616" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&lt;500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="617" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="618" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="620" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="621" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
				<TableParameter id="1133" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="622" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="623" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="624" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="625" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="626" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="627" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="628" tableName="facilities" fieldName="FacilityName"/>
				<Field id="629" tableName="newborn" fieldName="Sex"/>
				<Field id="630" tableName="newborn" fieldName="NewBornID"/>
				<Field id="631" tableName="newborn" fieldName="BirthDate"/>
				<Field id="632" tableName="newborn" fieldName="Weight"/>
				<Field id="633" tableName="facilities" fieldName="facilities.FacilityID" alias="facilities_FacilityID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="634" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1086" groupID="1" read="True"/>
				<Group id="1087" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="667" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn38" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="668" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="669" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn38Report_HeaderReport_TotalRecords">
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
				<Section id="670" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="671" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="672" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="673" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="674" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="675" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="676" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn38Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="677"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="678" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn38Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="679" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="680" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="681" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="682" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="683" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="685" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="686" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
				<TableParameter id="1134" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="687" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="688" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="689" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="690" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="691" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="692" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="693" tableName="facilities" fieldName="FacilityName"/>
				<Field id="694" tableName="newborn" fieldName="Sex"/>
				<Field id="695" tableName="newborn" fieldName="NewBornID"/>
				<Field id="696" tableName="newborn" fieldName="BirthDate"/>
				<Field id="697" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="698" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1088" groupID="1" read="True"/>
				<Group id="1089" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="731" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn39" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="732" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="733" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn39Report_HeaderReport_TotalRecords">
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
				<Section id="734" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="735" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="736" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="737" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="738" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="739" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="740" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn39Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="741"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="742" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn39Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="743" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="744" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="745" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="746" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="747" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="749" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="750" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
				<TableParameter id="1135" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="751" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="752" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="753" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="754" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="755" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="756" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="757" tableName="facilities" fieldName="FacilityName"/>
				<Field id="758" tableName="newborn" fieldName="Sex"/>
				<Field id="759" tableName="newborn" fieldName="NewBornID"/>
				<Field id="760" tableName="newborn" fieldName="BirthDate"/>
				<Field id="761" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="762" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1090" groupID="1" read="True"/>
				<Group id="1091" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="795" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn40" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="796" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="797" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn40Report_HeaderReport_TotalRecords">
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
				<Section id="798" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="799" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="800" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="801" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="802" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="803" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="804" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn40Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="805"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="806" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn40Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="807" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="808" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="809" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="810" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="811" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="813" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="814" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
				<TableParameter id="1136" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="815" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="816" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="817" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="818" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="819" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="820" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="821" tableName="facilities" fieldName="FacilityName"/>
				<Field id="822" tableName="newborn" fieldName="Sex"/>
				<Field id="823" tableName="newborn" fieldName="NewBornID"/>
				<Field id="824" tableName="newborn" fieldName="BirthDate"/>
				<Field id="825" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="826" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1092" groupID="1" read="True"/>
				<Group id="1093" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="859" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn41" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="860" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="861" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn41Report_HeaderReport_TotalRecords">
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
				<Section id="862" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="863" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="864" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="865" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="866" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="867" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="868" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn41Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="869"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="870" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn41Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="871" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="872" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="873" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="874" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="875" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="877" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="878" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
				<TableParameter id="1137" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="879" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="880" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="881" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="882" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="883" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="884" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="885" tableName="facilities" fieldName="FacilityName"/>
				<Field id="886" tableName="newborn" fieldName="Sex"/>
				<Field id="887" tableName="newborn" fieldName="NewBornID"/>
				<Field id="888" tableName="newborn" fieldName="BirthDate"/>
				<Field id="889" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="890" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1094" groupID="1" read="True"/>
				<Group id="1095" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="923" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn42" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="924" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="925" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn42Report_HeaderReport_TotalRecords">
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
				<Section id="926" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="927" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="928" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="929" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="930" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="931" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="932" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn42Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="933"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="934" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn42Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="935" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="936" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="937" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="938" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="939" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="941" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="942" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
				<TableParameter id="1138" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="943" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="944" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="945" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="946" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="947" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="948" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="949" tableName="facilities" fieldName="FacilityName"/>
				<Field id="950" tableName="newborn" fieldName="Sex"/>
				<Field id="951" tableName="newborn" fieldName="NewBornID"/>
				<Field id="952" tableName="newborn" fieldName="BirthDate"/>
				<Field id="953" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="954" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1096" groupID="1" read="True"/>
				<Group id="1097" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="987" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn43" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="988" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="989" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn43Report_HeaderReport_TotalRecords">
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
				<Section id="990" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="991" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="992" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="993" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="994" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="995" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="996" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn43Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="997"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="998" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn43Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="999" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="1000" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1001" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=3499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1002" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1003" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1005" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1006" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
				<TableParameter id="1139" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="1007" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="1008" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="1009" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="1010" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="1011" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="1012" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="1013" tableName="facilities" fieldName="FacilityName"/>
				<Field id="1014" tableName="newborn" fieldName="Sex"/>
				<Field id="1015" tableName="newborn" fieldName="NewBornID"/>
				<Field id="1016" tableName="newborn" fieldName="BirthDate"/>
				<Field id="1017" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="1018" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1098" groupID="1" read="True"/>
				<Group id="1099" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="1051" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn44" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="1052" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="1053" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn44Report_HeaderReport_TotalRecords">
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
				<Section id="1054" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="1055" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="1056" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="1057" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="1058" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="1059" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="1060" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn44Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="1061"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="1062" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn44Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="1063" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="1064" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1065" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1066" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1068" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1069" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.DiedID=4"/>
				<TableParameter id="1140" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="1070" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="1071" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="1072" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="1073" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="1074" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="1075" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="1076" tableName="facilities" fieldName="FacilityName"/>
				<Field id="1077" tableName="newborn" fieldName="Sex"/>
				<Field id="1078" tableName="newborn" fieldName="NewBornID"/>
				<Field id="1079" tableName="newborn" fieldName="BirthDate"/>
				<Field id="1080" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="1081" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1100" groupID="1" read="True"/>
				<Group id="1101" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="1117" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_facilities_newbo" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_facilities_newbo} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_died_during_7_27.ccp" PathID="delivery_facilities_newbo" pasteActions="pasteActions">
			<Components>
				<Button id="1118" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_facilities_newboButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="1119" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbos_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="1120" name="DatePicker_s_BirthDate" control="s_BirthDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newboDatePicker_s_BirthDate">
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
			<SecurityGroups>
<Group id="1121" groupID="3" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
<Record id="1122" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_facilities_newbo1" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_facilities_newbo} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_died_during_7_27.ccp" PathID="delivery_facilities_newbo1" pasteActions="pasteActions">
			<Components>
				<Button id="1123" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_facilities_newbo1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="1124" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbo1s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="1125" name="DatePicker_s_BirthDate" control="s_BirthDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newbo1DatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="1126" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate1" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbo1s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="1127" name="DatePicker_s_BirthDate1" control="s_BirthDate1" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newbo1DatePicker_s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="1128" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="delivery_facilities_newbo1s_FacilityName" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityName" textColumn="FacilityName">
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
						<Action actionName="Hide-Show Component" actionCategory="General" id="1129" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
			<SecurityGroups>
<Group id="1130" groupID="1" read="True"/>
<Group id="1131" groupID="2" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_died_during_7_27_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_died_during_7_27.php" forShow="True" url="report_died_during_7_27.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="1102" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
