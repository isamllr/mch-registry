<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="newborn, delivery" activeCollection="TableParameters" name="newborn" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:newborn} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular">
			<Components>
				<Section id="18" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="31" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="NewBornID" wizardCaption="NewBornID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="newbornDetailNewBornID" emptyValue="0" function="Sum" fieldSource="NewBornIDcount">
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
				<Section id="21" visible="True" lines="2" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<Panel id="22" visible="True" name="PageBreak">
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
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="6" conditionType="Expression" useIsNull="False" field="newborn.VaccinationHepB" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="VaccinationBCG=1" parameterSource="VaccinationHepB"/>
				<TableParameter id="29" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate"/>
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1"/>
				<TableParameter id="48" conditionType="Parameter" useIsNull="False" field="delivery.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="newborn" posLeft="10" posTop="10" posWidth="150" posHeight="395"/>
				<JoinTable id="52" tableName="delivery" posLeft="181" posTop="10" posWidth="160" posHeight="180"/>
</JoinTables>
			<JoinLinks>
<JoinTable2 id="53" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="5" fieldName="COUNT(NewBornID)" isExpression="True" alias="NewBornIDcount"/>
				<Field id="7" tableName="newborn" fieldName="BirthDate"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="8" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="newbornSearch" wizardCaption="{res:CCS_SearchFormPrefix} {res:newborn} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_newborns_vaccinated.ccp" PathID="newbornSearch" pasteActions="pasteActions">
			<Components>
				<Button id="9" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="newbornSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="newbornSearchs_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="11" name="DatePicker_s_BirthDate" control="s_BirthDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="newbornSearchDatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate1" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="newbornSearchs_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="44" name="DatePicker_s_BirthDate1" control="s_BirthDate1" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="newbornSearchDatePicker_s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="15" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
		<Link id="12" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_newborns_vaccinated.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="14" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="13" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="32" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="newborn, delivery" activeCollection="TableParameters" name="newborn1" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:newborn} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular">
			<Components>
				<Section id="33" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="34" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="NewBornID" wizardCaption="NewBornID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="newborn1DetailNewBornID" emptyValue="0" function="Sum" fieldSource="NewBornIDcount">
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
				<Section id="35" visible="True" lines="2" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<Panel id="36" visible="True" name="PageBreak">
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
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="37" conditionType="Expression" useIsNull="False" field="newborn.VaccinationHepB" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="VaccinationHepB=1" parameterSource="VaccinationHepB" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="38" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="45" conditionType="Parameter" useIsNull="False" field="newborn.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="49" conditionType="Parameter" useIsNull="False" field="delivery.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" format="0;(0)" logicOperator="And" defaultValue="0" leftBrackets="0" rightBrackets="0" parameterSource="s_Facilities"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="39" tableName="newborn" posLeft="10" posTop="10" posWidth="150" posHeight="395"/>
				<JoinTable id="54" tableName="delivery" posLeft="181" posTop="10" posWidth="160" posHeight="180"/>
</JoinTables>
			<JoinLinks>
<JoinTable2 id="55" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
			<Fields>
				<Field id="40" fieldName="COUNT(NewBornID)" isExpression="True" alias="NewBornIDcount"/>
				<Field id="41" tableName="newborn" fieldName="BirthDate"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_newborns_vaccinated_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_newborns_vaccinated.php" forShow="True" url="report_newborns_vaccinated.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="47" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
