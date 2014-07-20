<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" pasteActions="pasteActions">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="delivery, pregnancy, patient, facilities" activeCollection="TableParameters" name="delivery_pregnancy_patien" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:deliverypregnancypatient} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular">
			<Components>
				<Section id="23" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="24" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="25" visible="True" lines="1" name="Detail">
					<Components>
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
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="28" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="39" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID1" summarised="True" function="Count" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_pregnancy_patienPage_FooterTotalCount_DeliveryID1">
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
			<TableParameters>
				<TableParameter id="11" conditionType="Expression" useIsNull="False" field="pregnancy.PregnancyTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="PregnancyTypeID&gt;1" parameterSource="PregnancyTypeID"/>
				<TableParameter id="35" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="36" conditionType="Parameter" useIsNull="False" field="patient.BirthDate" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="2" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate"/>
				<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="patient.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1"/>
				<TableParameter id="82" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="delivery" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
				<JoinTable id="6" tableName="pregnancy" posLeft="191" posTop="10" posWidth="159" posHeight="180"/>
				<JoinTable id="12" tableName="patient" posLeft="371" posTop="10" posWidth="138" posHeight="180"/>
				<JoinTable id="71" tableName="facilities" posLeft="182" posTop="259" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="7" tableLeft="delivery" tableRight="pregnancy" fieldLeft="delivery.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="13" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="72" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="5" tableName="delivery" fieldName="DeliveryID"/>
				<Field id="9" tableName="pregnancy" fieldName="PregnancyTypeID"/>
				<Field id="10" tableName="delivery" fieldName="DataDelivery"/>
				<Field id="15" tableName="patient" fieldName="patient.PatientID" alias="patient_PatientID"/>
				<Field id="16" tableName="patient" fieldName="BirthDate"/>
				<Field id="79" tableName="facilities" fieldName="FacilityName"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="17" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_patient_pregnanc" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_patient_pregnanc} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_multiple_and_first_district.ccp" PathID="delivery_patient_pregnanc" pasteActions="pasteActions">
			<Components>
				<Button id="18" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_patient_pregnancButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_patient_pregnancs_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="20" name="DatePicker_s_DataDelivery" control="s_DataDelivery" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_patient_pregnancDatePicker_s_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery1" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_patient_pregnancs_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="42" name="DatePicker_s_DataDelivery1" control="s_DataDelivery1" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_patient_pregnancDatePicker_s_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_patient_pregnancs_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="22" name="DatePicker_s_BirthDate" control="s_BirthDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_patient_pregnancDatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate1" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_patient_pregnancs_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="45" name="DatePicker_s_BirthDate1" control="s_BirthDate1" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_patient_pregnancDatePicker_s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="81" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="delivery_patient_pregnancs_FacilityName" connection="registry_db" dataSource="facilities" boundColumn="FacilityName" textColumn="FacilityName">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
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
		<Report id="48" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="SELECT COUNT(patient.PatientID) AS patient_PatientID
FROM ((pregnancy LEFT JOIN delivery ON
delivery.PregnancyID = pregnancy.PregnancyID) RIGHT JOIN patient ON
pregnancy.PatientID = patient.PatientID) LEFT JOIN facilities ON
delivery.FacilityID = facilities.FacilityID
WHERE patient.NrDeliveries=0
AND delivery.DataDelivery IS NOT NULL
AND delivery.DataDelivery &gt;= '{s_DataDelivery}'
AND delivery.DataDelivery &lt;= '{s_DataDelivery1}'
AND patient.BirthDate &gt;= '{s_BirthDate}'
AND patient.BirthDate &lt;= '{s_BirthDate1}'
AND facilities.FacilityName LIKE '%{s_FacilityName}%'
" activeCollection="SQLParameters" name="delivery_pregnancy_patien1" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:deliverypregnancypatient} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="49" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="50" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="51" visible="True" lines="1" name="Detail">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="52" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="53" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="54" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="55" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_DeliveryID1" summarised="True" wizardCaption="{res:DeliveryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="delivery_pregnancy_patien1Page_FooterTotalCount_DeliveryID1" fieldSource="patient_PatientID">
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
			<TableParameters>
				<TableParameter id="56" conditionType="Expression" useIsNull="False" field="patient.NrDeliveries" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="patient.NrDeliveries=0" parameterSource="NrDeliveries"/>
				<TableParameter id="57" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="59" conditionType="Parameter" useIsNull="False" field="patient.BirthDate" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="2" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate"/>
				<TableParameter id="60" conditionType="Parameter" useIsNull="False" field="patient.BirthDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_BirthDate1"/>
				<TableParameter id="76" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="88" parameterType="URL" variable="s_DataDelivery" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="89" parameterType="URL" variable="s_DataDelivery1" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery1" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="90" parameterType="URL" variable="s_BirthDate" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_BirthDate" defaultValue="CCFormatDate(CCParseDate(&quot;1000-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="91" parameterType="URL" variable="s_BirthDate1" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_BirthDate1" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
				<SQLParameter id="92" parameterType="URL" variable="s_FacilityName" dataType="Text" parameterSource="s_FacilityName"/>
			</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Link id="85" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_multiple_and_first_district.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="86" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="87" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="report_multiple_and_first_district.php" forShow="True" url="report_multiple_and_first_district.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="report_multiple_and_first_district_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="83" groupID="1"/>
		<Group id="84" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
