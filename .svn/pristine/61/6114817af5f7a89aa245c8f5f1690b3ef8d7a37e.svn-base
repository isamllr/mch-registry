<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<Report id="2" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" name="delivery" connection="registry_db" dataSource="SELECT SUM(TO_DAYS(HospitalDischDate)-TO_DAYS(DataDelivery))/COUNT(DeliveryID) AS SerPok 
FROM delivery
WHERE HospitalAdmData &lt;= HospitalDischDate
AND HospitalAdmData IS NOT NULL
AND HospitalDischDate IS NOT NULL
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND FacilityID IN ({s_Facilities}) " pageSizeLimit="100" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="11" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="21" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="SerPok" fieldSource="SerPok" PathID="deliveryDetailSerPok" emptyValue="0" format="0.00">
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
				<TableParameter id="7" conditionType="Parameter" useIsNull="False" field="HospitalAdmData" dataType="Date" searchConditionType="NotNull" parameterType="URL" parameterSource="HospitalAdmData" logicOperator="And"/>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="HospitalDischDate" dataType="Date" searchConditionType="NotNull" parameterType="URL" parameterSource="HospitalDischDate" logicOperator="And"/>
				<TableParameter id="60" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="61" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="66" conditionType="Parameter" useIsNull="False" field="FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="6" fieldName="SUM(TO_DAYS(HospitalDischDate)-TO_DAYS(DataDelivery))/COUNT(DeliveryID)" alias="SerPok" isExpression="True"/>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="72" parameterType="URL" variable="s_DataDelivery" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
<SQLParameter id="73" parameterType="URL" variable="s_DataDelivery1" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery1" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
<SQLParameter id="74" parameterType="Session" variable="s_Facilities" dataType="Integer" format="0;(0)" parameterSource="s_Facilities" defaultValue="0"/>
</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Report id="29" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" name="delivery2" connection="registry_db" dataSource="SELECT SUM(TO_DAYS(HospitalDischDate)-TO_DAYS(HospitalAdmData))/COUNT(DeliveryID) AS SerPok 
FROM delivery
WHERE HospitalAdmData &lt;= HospitalDischDate
AND HospitalAdmData IS NOT NULL
AND HospitalDischDate IS NOT NULL 
AND DataDelivery &gt;= '{s_DataDelivery}'
AND DataDelivery &lt;= '{s_DataDelivery1}'
AND FacilityID IN ({s_Facilities})" pageSizeLimit="100" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="30" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="31" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="SerPok" fieldSource="SerPok" PathID="delivery2DetailSerPok" emptyValue="0" format="0.00">
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
				<TableParameter id="32" conditionType="Parameter" useIsNull="False" field="HospitalAdmData" dataType="Date" searchConditionType="NotNull" parameterType="URL" parameterSource="HospitalAdmData" logicOperator="And"/>
				<TableParameter id="33" conditionType="Parameter" useIsNull="False" field="HospitalDischDate" dataType="Date" searchConditionType="NotNull" parameterType="URL" parameterSource="HospitalDischDate" logicOperator="And"/>
				<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="59" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="65" conditionType="Parameter" useIsNull="False" field="FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="35" fieldName="(SUM(UNIX_TIMESTAMP(HospitalDischDate)-UNIX_TIMESTAMP(HospitalAdmData))/(3600*24))/COUNT(DeliveryID)" alias="SerPok" isExpression="True"/>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="69" parameterType="URL" variable="s_DataDelivery" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
<SQLParameter id="70" parameterType="URL" variable="s_DataDelivery1" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery1" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
<SQLParameter id="71" parameterType="Session" variable="s_Facilities" dataType="Integer" format="0;(0)" parameterSource="s_Facilities" defaultValue="0"/>
</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<IncludePage id="36" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Link id="20" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_average.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="22" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="37" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="40" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" name="delivery1" connection="registry_db" dataSource="SELECT SUM(TO_DAYS(HospitalDischDate)-TO_DAYS(DataDelivery))/COUNT(DeliveryID) AS SerPok
FROM delivery LEFT JOIN deliverymethod ON
delivery.DeliveryMethodID = deliverymethod.DeliveryMethodID
WHERE delivery.HospitalAdmData &lt;= delivery.HospitalDischDate
AND delivery.HospitalAdmData IS NOT NULL
AND delivery.HospitalDischDate IS NOT NULL
AND ( ( deliverymethod.DeliveryMethodID=3 )
OR ( deliverymethod.DeliveryMethodID=4 ) )
AND delivery.DataDelivery &gt;= '{s_DataDelivery}'
AND delivery.DataDelivery &lt;= '{s_DataDelivery1}'
AND delivery.FacilityID IN ({s_Facilities}) " pageSizeLimit="100" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Section id="41" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="42" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="SerPok" fieldSource="SerPok" PathID="delivery1DetailSerPok" emptyValue="0" format="0.00">
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
				<TableParameter id="43" conditionType="Parameter" useIsNull="False" field="delivery.HospitalAdmData" dataType="Date" searchConditionType="NotNull" parameterType="URL" parameterSource="HospitalAdmData" logicOperator="And"/>
				<TableParameter id="44" conditionType="Parameter" useIsNull="False" field="delivery.HospitalDischDate" dataType="Date" searchConditionType="NotNull" parameterType="URL" parameterSource="HospitalDischDate" logicOperator="And"/>
				<TableParameter id="49" conditionType="Expression" useIsNull="False" field="deliverymethod.DeliveryMethodID" dataType="Integer" searchConditionType="Equal" parameterType="Session" logicOperator="Or" expression="deliverymethod.DeliveryMethodID=3" parameterSource="deliverymethod_DeliveryMethodID" leftBrackets="1" rightBrackets="0"/>
				<TableParameter id="50" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="deliverymethod.DeliveryMethodID=4" rightBrackets="1"/>
				<TableParameter id="62" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery"/>
				<TableParameter id="63" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1"/>
				<TableParameter id="67" conditionType="Parameter" useIsNull="False" field="delivery.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
				<Field id="46" fieldName="(SUM(UNIX_TIMESTAMP(HospitalDischDate)-UNIX_TIMESTAMP(DataDelivery))/(3600*24))/COUNT(DeliveryID)" alias="SerPok" isExpression="True"/>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="75" parameterType="URL" variable="s_DataDelivery" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery" defaultValue="CCFormatDate(CCParseDate(&quot;1903-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
<SQLParameter id="76" parameterType="URL" variable="s_DataDelivery1" dataType="Date" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" parameterSource="s_DataDelivery1" defaultValue="CCFormatDate(CCParseDate(&quot;2999-01-01&quot;,array(&quot;yyyy&quot;,&quot;-&quot;,&quot;mm&quot;,&quot;-&quot;,&quot;dd&quot;)),array(&quot;ShortDate&quot;))"/>
<SQLParameter id="77" parameterType="Session" variable="s_Facilities" dataType="Integer" format="0;(0)" parameterSource="s_Facilities" defaultValue="0"/>
</SQLParameters>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="51" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_facilities_newbo" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_facilities_newbo} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_average.ccp" PathID="delivery_facilities_newbo" pasteActions="pasteActions">
			<Components>
				<Button id="52" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_facilities_newboButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbos_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="54" name="DatePicker_s_BirthDate" control="s_DataDelivery" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newboDatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery1" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_newbos_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="56" name="DatePicker_s_BirthDate1" control="s_DataDelivery1" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_newboDatePicker_s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="57" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="report_average.php" forShow="True" url="report_average.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="report_average_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="64" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
