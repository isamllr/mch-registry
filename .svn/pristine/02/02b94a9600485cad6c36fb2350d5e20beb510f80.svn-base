<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn9" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="4" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="5" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn9Report_HeaderReport_TotalRecords">
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
						<ReportLabel id="12" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex" PathID="NewBorn9Sex_HeaderGroupSex" fieldSource="Sex">
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
						<ReportLabel id="14" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn9Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
			</TableParameters>
			<JoinTables>
				<JoinTable id="20" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="21" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="22" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="383"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="23" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="24" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="25" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="26" tableName="facilities" fieldName="FacilityName"/>
				<Field id="27" tableName="newborn" fieldName="Sex"/>
				<Field id="28" tableName="newborn" fieldName="NewBornID"/>
				<Field id="29" tableName="newborn" fieldName="BirthDate"/>
				<Field id="30" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="31" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1065" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="61" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn10" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="62" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="63" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn10Report_HeaderReport_TotalRecords">
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
				<Section id="64" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="65" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="66" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="67" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="68" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="69" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="70" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex1" PathID="NewBorn10Sex_HeaderGroupSex1" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="71" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="72" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn10Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="73" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="74" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&lt;500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="75" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="76" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="77" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="78" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="79" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="80" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="81" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="82" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="83" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="84" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="85" tableName="facilities" fieldName="FacilityName"/>
				<Field id="86" tableName="newborn" fieldName="Sex"/>
				<Field id="87" tableName="newborn" fieldName="NewBornID"/>
				<Field id="88" tableName="newborn" fieldName="BirthDate"/>
				<Field id="89" tableName="newborn" fieldName="Weight"/>
				<Field id="90" tableName="facilities" fieldName="facilities.FacilityID" alias="facilities_FacilityID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="91" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1066" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="123" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn11" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="124" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="125" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn11Report_HeaderReport_TotalRecords">
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
				<Section id="126" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="127" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="128" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="129" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="130" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="131" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="132" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn11Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="133" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="134" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn11Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="135" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="136" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="137" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="138" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="139" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="140" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="141" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="142" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="143" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="144" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="145" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="146" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="147" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="148" tableName="facilities" fieldName="FacilityName"/>
				<Field id="149" tableName="newborn" fieldName="Sex"/>
				<Field id="150" tableName="newborn" fieldName="NewBornID"/>
				<Field id="151" tableName="newborn" fieldName="BirthDate"/>
				<Field id="152" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="153" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1067" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="185" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn12" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="186" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="187" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn12Report_HeaderReport_TotalRecords">
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
				<Section id="188" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="189" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="190" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="191" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="192" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="193" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="194" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn12Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="195" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="196" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn12Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="197" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="198" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="199" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="200" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="201" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="202" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="203" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="204" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="205" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="206" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="207" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="208" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="209" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="210" tableName="facilities" fieldName="FacilityName"/>
				<Field id="211" tableName="newborn" fieldName="Sex"/>
				<Field id="212" tableName="newborn" fieldName="NewBornID"/>
				<Field id="213" tableName="newborn" fieldName="BirthDate"/>
				<Field id="214" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="215" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1068" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="247" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn13" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="248" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="249" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn13Report_HeaderReport_TotalRecords">
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
				<Section id="250" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="251" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="252" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="253" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="254" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="255" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="256" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn13Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="257" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="258" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn13Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="259" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="260" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="261" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="262" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="263" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="264" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="265" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="266" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="267" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="268" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="269" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="270" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="271" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="272" tableName="facilities" fieldName="FacilityName"/>
				<Field id="273" tableName="newborn" fieldName="Sex"/>
				<Field id="274" tableName="newborn" fieldName="NewBornID"/>
				<Field id="275" tableName="newborn" fieldName="BirthDate"/>
				<Field id="276" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="277" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1069" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="309" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn14" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="310" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="311" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn14Report_HeaderReport_TotalRecords">
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
				<Section id="312" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="313" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="314" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="315" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="316" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="317" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="318" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn14Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="319" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="320" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn14Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="321" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="322" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="323" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="324" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="325" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="326" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="327" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="328" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="329" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="330" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="331" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="332" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="333" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="334" tableName="facilities" fieldName="FacilityName"/>
				<Field id="335" tableName="newborn" fieldName="Sex"/>
				<Field id="336" tableName="newborn" fieldName="NewBornID"/>
				<Field id="337" tableName="newborn" fieldName="BirthDate"/>
				<Field id="338" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="339" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1070" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="371" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn15" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="372" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="373" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn15Report_HeaderReport_TotalRecords">
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
				<Section id="374" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="375" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="376" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="377" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="378" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="379" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="380" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn15Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="381" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="382" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn15Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="383" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="384" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="385" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="386" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="387" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="388" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="389" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="390" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="391" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="392" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="393" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="394" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="395" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="396" tableName="facilities" fieldName="FacilityName"/>
				<Field id="397" tableName="newborn" fieldName="Sex"/>
				<Field id="398" tableName="newborn" fieldName="NewBornID"/>
				<Field id="399" tableName="newborn" fieldName="BirthDate"/>
				<Field id="400" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="401" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1071" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="433" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn16" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="434" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="435" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn16Report_HeaderReport_TotalRecords">
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
				<Section id="436" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="437" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="438" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="439" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="440" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="441" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="442" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn16Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="443" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="444" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn16Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="445" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="446" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="447" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=3499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="448" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="449" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="450" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="451" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="452" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="453" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="454" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="455" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="456" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="457" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="458" tableName="facilities" fieldName="FacilityName"/>
				<Field id="459" tableName="newborn" fieldName="Sex"/>
				<Field id="460" tableName="newborn" fieldName="NewBornID"/>
				<Field id="461" tableName="newborn" fieldName="BirthDate"/>
				<Field id="462" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="463" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1072" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="495" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn17" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="496" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="497" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn17Report_HeaderReport_TotalRecords">
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
				<Section id="498" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="499" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="500" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="501" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="502" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="503" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="504" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn17Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="505" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="506" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn17Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="507" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="508" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="509" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="510" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="511" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="512" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="513" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="514" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="515" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="516" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="517" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="518" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="519" tableName="facilities" fieldName="FacilityName"/>
				<Field id="520" tableName="newborn" fieldName="Sex"/>
				<Field id="521" tableName="newborn" fieldName="NewBornID"/>
				<Field id="522" tableName="newborn" fieldName="BirthDate"/>
				<Field id="523" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="524" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1073" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="525" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn18" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="526" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="527" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn18Report_HeaderReport_TotalRecords">
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
				<Section id="528" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="529" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="530" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="531" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="532" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="533" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="534" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex" PathID="NewBorn18Sex_HeaderGroupSex" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="535"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="536" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn18Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="537" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="538" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="539" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="541" conditionType="Expression" useIsNull="False" field="newborn.Died" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1" parameterSource="Died"/>
				<TableParameter id="1089" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="542" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="543" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="544" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="383"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="545" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="546" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="547" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="548" tableName="facilities" fieldName="FacilityName"/>
				<Field id="549" tableName="newborn" fieldName="Sex"/>
				<Field id="550" tableName="newborn" fieldName="NewBornID"/>
				<Field id="551" tableName="newborn" fieldName="BirthDate"/>
				<Field id="552" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="553" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1047" groupID="1" read="True"/>
				<Group id="1048" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="583" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn19" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="584" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="585" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn19Report_HeaderReport_TotalRecords">
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
				<Section id="586" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="587" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="588" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="589" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="590" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="591" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="592" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex1" PathID="NewBorn19Sex_HeaderGroupSex1" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="593"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="594" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn19Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="595" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="596" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&lt;500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="597" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="598" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="600" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1090" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="601" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="602" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="603" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="604" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="605" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="606" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="607" tableName="facilities" fieldName="FacilityName"/>
				<Field id="608" tableName="newborn" fieldName="Sex"/>
				<Field id="609" tableName="newborn" fieldName="NewBornID"/>
				<Field id="610" tableName="newborn" fieldName="BirthDate"/>
				<Field id="611" tableName="newborn" fieldName="Weight"/>
				<Field id="612" tableName="facilities" fieldName="facilities.FacilityID" alias="facilities_FacilityID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="613" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1049" groupID="1" read="True"/>
				<Group id="1050" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="645" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn20" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="646" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="647" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn20Report_HeaderReport_TotalRecords">
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
				<Section id="648" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="649" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="650" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="651" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="652" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="653" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="654" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn20Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="655"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="656" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn20Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="657" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="658" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="659" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="660" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="661" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="663" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1091" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="664" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="665" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="666" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="667" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="668" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="669" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="670" tableName="facilities" fieldName="FacilityName"/>
				<Field id="671" tableName="newborn" fieldName="Sex"/>
				<Field id="672" tableName="newborn" fieldName="NewBornID"/>
				<Field id="673" tableName="newborn" fieldName="BirthDate"/>
				<Field id="674" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="675" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1051" groupID="1" read="True"/>
				<Group id="1052" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="707" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn21" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="708" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="709" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn21Report_HeaderReport_TotalRecords">
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
				<Section id="710" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="711" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="712" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="713" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="714" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="715" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="716" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn21Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="717"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="718" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn21Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="719" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="720" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="721" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="722" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="723" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="725" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1092" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="726" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="727" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="728" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="729" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="730" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="731" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="732" tableName="facilities" fieldName="FacilityName"/>
				<Field id="733" tableName="newborn" fieldName="Sex"/>
				<Field id="734" tableName="newborn" fieldName="NewBornID"/>
				<Field id="735" tableName="newborn" fieldName="BirthDate"/>
				<Field id="736" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="737" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1053" groupID="1" read="True"/>
				<Group id="1054" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="769" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn22" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="770" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="771" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn22Report_HeaderReport_TotalRecords">
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
				<Section id="772" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="773" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="774" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="775" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="776" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="777" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="778" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn22Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="779"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="780" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn22Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="781" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="782" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=1500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="783" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=1999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="784" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="785" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="787" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1093" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="788" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="789" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="790" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="791" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="792" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="793" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="794" tableName="facilities" fieldName="FacilityName"/>
				<Field id="795" tableName="newborn" fieldName="Sex"/>
				<Field id="796" tableName="newborn" fieldName="NewBornID"/>
				<Field id="797" tableName="newborn" fieldName="BirthDate"/>
				<Field id="798" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="799" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1055" groupID="1" read="True"/>
				<Group id="1056" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="831" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn23" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="832" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="833" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn23Report_HeaderReport_TotalRecords">
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
				<Section id="834" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="835" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="836" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="837" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="838" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="839" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="840" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn23Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="841"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="842" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn23Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="843" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="844" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="845" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="846" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="847" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="849" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1094" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="850" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="851" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="852" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="853" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="854" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="855" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="856" tableName="facilities" fieldName="FacilityName"/>
				<Field id="857" tableName="newborn" fieldName="Sex"/>
				<Field id="858" tableName="newborn" fieldName="NewBornID"/>
				<Field id="859" tableName="newborn" fieldName="BirthDate"/>
				<Field id="860" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="861" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1057" groupID="1" read="True"/>
				<Group id="1058" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="893" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn24" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="894" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="895" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn24Report_HeaderReport_TotalRecords">
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
				<Section id="896" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="897" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="898" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="899" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="900" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="901" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="902" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn24Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="903"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="904" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn24Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="905" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="906" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=2500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="907" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=2999" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="908" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="909" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="911" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1095" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="912" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="913" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="914" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="915" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="916" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="917" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="918" tableName="facilities" fieldName="FacilityName"/>
				<Field id="919" tableName="newborn" fieldName="Sex"/>
				<Field id="920" tableName="newborn" fieldName="NewBornID"/>
				<Field id="921" tableName="newborn" fieldName="BirthDate"/>
				<Field id="922" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="923" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1059" groupID="1" read="True"/>
				<Group id="1060" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="955" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn25" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="956" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="957" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn25Report_HeaderReport_TotalRecords">
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
				<Section id="958" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="959" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="960" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="961" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="962" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="963" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="964" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn25Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="965"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="966" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn25Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="967" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="968" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3000" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="969" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Weight&lt;=3499" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="970" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="971" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="973" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1096" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="974" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="975" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="976" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="977" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="978" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="979" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="980" tableName="facilities" fieldName="FacilityName"/>
				<Field id="981" tableName="newborn" fieldName="Sex"/>
				<Field id="982" tableName="newborn" fieldName="NewBornID"/>
				<Field id="983" tableName="newborn" fieldName="BirthDate"/>
				<Field id="984" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="985" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1061" groupID="1" read="True"/>
				<Group id="1062" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="1017" secured="True" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerPhysicalPage="50" name="NewBorn26" wizardCaption="{res:CCS_ReportFormPrefix} {res:NewBorn} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" connection="registry_db" dataSource="delivery, facilities, newborn" activeCollection="TableParameters">
			<Components>
				<Section id="1018" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="1019" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="NewBorn26Report_HeaderReport_TotalRecords">
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
				<Section id="1020" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="1021" visible="True" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="1022" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="1023" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="1024" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="1025" visible="True" lines="1" name="Sex_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="1026" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="GroupSex2" PathID="NewBorn26Sex_HeaderGroupSex2" fieldSource="Sex">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="1027"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="1028" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Sex" name="CountGroupSex" PathID="NewBorn26Sex_HeaderCountGroupSex" fieldSource="Sex" function="Count">
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
				<Section id="1029" visible="True" lines="1" name="Sex_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="1030" conditionType="Expression" useIsNull="False" field="newborn.Weight" dataType="Single" searchConditionType="LessThan" parameterType="Session" logicOperator="And" defaultValue="0" format="0.#;(0.#)" expression="newborn.Weight&gt;=3500" parameterSource="500" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1031" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1032" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="1034" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="newborn.Died=1"/>
				<TableParameter id="1097" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="1035" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="413"/>
				<JoinTable id="1036" tableName="facilities" posLeft="200" posTop="142" posWidth="95" posHeight="104"/>
				<JoinTable id="1037" tableName="newborn" posLeft="336" posTop="32" posWidth="150" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="1038" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="1039" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="1040" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="1041" tableName="facilities" fieldName="FacilityName"/>
				<Field id="1042" tableName="newborn" fieldName="Sex"/>
				<Field id="1043" tableName="newborn" fieldName="NewBornID"/>
				<Field id="1044" tableName="newborn" fieldName="BirthDate"/>
				<Field id="1045" tableName="newborn" fieldName="Weight"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="1046" name="Sex" field="Sex" sqlField="newborn.Sex" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups>
				<Group id="1063" groupID="1" read="True"/>
				<Group id="1064" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="1074" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_facilities_newbo" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_facilities_newbo} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_on_newborn_dead_total.ccp" PathID="delivery_facilities_newbo" pasteActions="pasteActions">
			<Components>
				<Button id="1075" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_facilities_newboButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="1076" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbos_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="1077" name="DatePicker_s_BirthDate" control="s_BirthDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newboDatePicker_s_BirthDate">
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
				<Group id="1078" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
<Record id="1079" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_facilities_newbo1" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_facilities_newbo} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_on_newborn_dead_total.ccp" PathID="delivery_facilities_newbo1" pasteActions="pasteActions">
			<Components>
				<Button id="1080" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_facilities_newbo1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="1081" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbo1s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="1082" name="DatePicker_s_BirthDate" control="s_BirthDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newbo1DatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="1083" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate1" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbo1s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="1084" name="DatePicker_s_BirthDate1" control="s_BirthDate1" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newbo1DatePicker_s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="1085" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="delivery_facilities_newbo1s_FacilityName" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityName" textColumn="FacilityName">
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
						<Action actionName="Hide-Show Component" actionCategory="General" id="1086" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
				<Group id="1087" groupID="1" read="True"/>
				<Group id="1088" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_on_newborn_dead_total_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_on_newborn_dead_total.php" forShow="True" url="report_on_newborn_dead_total.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
