<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="11" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="80" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="20" connection="registry_db" dataSource="facilities, countries, province, districts" name="countries_districts_facil1" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:countriesdistrictsfacilitiesprovince} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}">
			<Components>
				<Sorter id="101" visible="True" name="Sorter_FacilityName" column="FacilityName" wizardCaption="{res:FacilityName}" wizardSortingType="SimpleDir" wizardControl="FacilityName" wizardAddNbsp="False" PathID="countries_districts_facil1Sorter_FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="102" visible="True" name="Sorter_ProvinceName" column="ProvinceName" wizardCaption="{res:ProvinceName}" wizardSortingType="SimpleDir" wizardControl="ProvinceName" wizardAddNbsp="False" PathID="countries_districts_facil1Sorter_ProvinceName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="103" visible="True" name="Sorter_DistrictName" column="DistrictName" wizardCaption="{res:DistrictName}" wizardSortingType="SimpleDir" wizardControl="DistrictName" wizardAddNbsp="False" PathID="countries_districts_facil1Sorter_DistrictName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="104" visible="True" name="Sorter_Country" column="Country" wizardCaption="{res:Country}" wizardSortingType="SimpleDir" wizardControl="Country" wizardAddNbsp="False" PathID="countries_districts_facil1Sorter_Country">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="FacilityName" fieldSource="FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" hrefSource="notifications_settings_maint.ccp" wizardThemeItem="GridA" PathID="countries_districts_facil1FacilityName">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="107" sourceType="DataField" format="yyyy-mm-dd" name="FacilityID" source="FacilityID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="109" fieldSourceType="DBColumn" dataType="Text" html="False" name="ProvinceName" fieldSource="ProvinceName" wizardCaption="{res:ProvinceName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="countries_districts_facil1ProvinceName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="111" fieldSourceType="DBColumn" dataType="Text" html="False" name="DistrictName" fieldSource="DistrictName" wizardCaption="{res:DistrictName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="countries_districts_facil1DistrictName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="113" fieldSourceType="DBColumn" dataType="Text" html="False" name="Country" fieldSource="Country" wizardCaption="{res:Country}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="countries_districts_facil1Country">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="114" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="Compact">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="97" conditionType="Parameter" useIsNull="False" field="countries.CountryID" parameterSource="s_countries_CountryID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="98" conditionType="Parameter" useIsNull="False" field="province.ProvinceID" parameterSource="s_province_ProvinceID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="2"/>
				<TableParameter id="99" conditionType="Parameter" useIsNull="False" field="districts.DistrictID" parameterSource="s_districts_DistrictID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3"/>
				<TableParameter id="100" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" parameterSource="s_FacilityName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="81" tableName="facilities" posLeft="414" posTop="38" posWidth="95" posHeight="104"/>
				<JoinTable id="82" tableName="countries" posLeft="13" posTop="33" posWidth="95" posHeight="88"/>
				<JoinTable id="83" tableName="province" posLeft="148" posTop="35" posWidth="95" posHeight="104"/>
				<JoinTable id="85" tableName="districts" posLeft="282" posTop="35" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="84" tableLeft="province" tableRight="countries" fieldLeft="province.CountryID" fieldRight="countries.CountryID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="86" tableLeft="facilities" tableRight="districts" fieldLeft="facilities.DistrictID" fieldRight="districts.DistrictID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="87" tableLeft="districts" tableRight="province" fieldLeft="districts.ProvinceID" fieldRight="province.ProvinceID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="95" tableName="facilities" fieldName="FacilityID"/>
				<Field id="105" tableName="facilities" fieldName="FacilityName"/>
				<Field id="108" tableName="province" fieldName="ProvinceName"/>
				<Field id="110" tableName="districts" fieldName="DistrictName"/>
				<Field id="112" tableName="countries" fieldName="Country"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="88" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="countries_districts_facil" wizardCaption="{res:CCS_SearchFormPrefix} {res:countries_districts_facil} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="notifications_settings_maint.ccp" PathID="countries_districts_facil" visible="Dynamic" connection="registry_db">
			<Components>
				<Button id="89" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="countries_districts_facilButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="90" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_countries_CountryID" wizardCaption="{res:countriesCountryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="countries_districts_facils_countries_CountryID" connection="registry_db" dataSource="countries" boundColumn="CountryID" textColumn="Country">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="152" tableName="countries" posLeft="10" posTop="10" posWidth="95" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="91" visible="Dynamic" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_province_ProvinceID" wizardCaption="{res:provinceProvinceID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="countries_districts_facils_province_ProvinceID" connection="registry_db" dataSource="province" boundColumn="ProvinceID" textColumn="ProvinceName" features="(assigned)">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features>
						<PTDependentListBox id="153" enabled="True" name="PTDependentListBox1" category="Prototype" featureNameChanged="No" masterListbox="s_countries_CountryID" servicePage="services/ProvinceID_from_Countries_PTDependentListBox.ccp">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
				</ListBox>
				<ListBox id="92" visible="Dynamic" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_districts_DistrictID" wizardCaption="{res:districtsDistrictID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="countries_districts_facils_districts_DistrictID" connection="registry_db" dataSource="districts" boundColumn="DistrictID" textColumn="DistrictName" features="(assigned)">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features>
						<PTDependentListBox id="154" enabled="True" name="PTDependentListBox2" category="Prototype" featureNameChanged="No" masterListbox="s_province_ProvinceID" servicePage="services/DistrictID_from_Province_PTDependentListBox.ccp">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
				</ListBox>
				<TextBox id="93" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="countries_districts_facils_FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="94" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="facilities_countries_provPageSize" dataSource=";{res:CCS_SelectValue};5;5;10;10;25;25;100;100" wizardCaption="{res:CCS_RecPerPage}" wizardNoEmptyValue="True" PathID="countries_districts_facilfacilities_countries_provPageSize">
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
			<Events>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="522"/>
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
				<Group id="448" groupID="1" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features>
			</Features>
		</Record>
		<Record id="256" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="Recommendations" dataSource="facilities, notificationtype, notificationconfiguration, notification" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:notificationconfiguration} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="Recommendations" activeCollection="IFormElements" customInsertType="Table" customInsert="notificationconfiguration" activeTableType="notificationconfiguration" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customUpdateType="Table" customUpdate="notificationconfiguration" customDeleteType="Table" customDelete="notificationconfiguration" visible="Dynamic">
			<Components>
				<Button id="257" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="RecommendationsButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="258" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="RecommendationsButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="259" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="RecommendationsButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="262" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TimeToSend" fieldSource="TimeToSend" required="True" caption="{res:TimeToSend}" wizardCaption="{res:TimeToSend}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="RecommendationsTimeToSend" validationText="{res:NotificationInvalidTimeFormat}" format="H:nn" DBFormat="H:nn:ss" defaultValue="'09:30'" inputMask="/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="264" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Enabled" fieldSource="Enabled" required="False" caption="{res:Enabled}" wizardCaption="{res:Enabled}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" checkedValue="1" uncheckedValue="0" PathID="RecommendationsEnabled">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="284" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="FacilityID"/>
				<TableParameter id="285" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=1" parameterSource="notificationconfiguration_FacilityID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="266" parameterType="URL" variable="NotificationConfigurationID" dataType="Integer" parameterSource="NotificationConfigurationID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="267" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="268" tableName="notificationtype" posLeft="380" posTop="153" posWidth="119" posHeight="134"/>
				<JoinTable id="270" tableName="notificationconfiguration" posLeft="94" posTop="152" posWidth="160" posHeight="152"/>
				<JoinTable id="273" tableName="notification" posLeft="126" posTop="10" posWidth="119" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="271" tableLeft="notificationconfiguration" tableRight="facilities" fieldLeft="notificationconfiguration.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="272" tableLeft="notificationconfiguration" tableRight="notificationtype" fieldLeft="notificationconfiguration.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="274" tableLeft="notification" tableRight="notificationtype" fieldLeft="notification.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="275" tableName="facilities" fieldName="FacilityName"/>
				<Field id="279" tableName="notification" fieldName="Day"/>
				<Field id="280" tableName="notificationtype" fieldName="TypeName"/>
				<Field id="281" tableName="notificationconfiguration" fieldName="TimeToSend"/>
				<Field id="282" tableName="notificationconfiguration" fieldName="Enabled"/>
				<Field id="283" tableName="notificationconfiguration" fieldName="DaysBeforeOrAfter"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="287" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="288" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
				<CustomParameter id="289" field="NotificationTypeID" dataType="Integer" parameterType="Expression" parameterSource="1" omitIfEmpty="True"/>
				<CustomParameter id="290" field="FacilityID" dataType="Integer" parameterType="URL" omitIfEmpty="True" parameterSource="FacilityID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="291" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="292" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=1" parameterSource="notificationconfiguration_FacilityID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="294" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="295" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="296" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="297" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=1" parameterSource="notificationconfiguration_FacilityID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="299" groupID="1" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="300" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="Reminders" dataSource="facilities, notificationtype, notificationconfiguration, notification" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:notificationconfiguration} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="Reminders" activeCollection="UFormElements" customInsertType="Table" customInsert="notificationconfiguration" activeTableType="notificationconfiguration" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customUpdateType="Table" customUpdate="notificationconfiguration" customDeleteType="Table" customDelete="notificationconfiguration" visible="Dynamic">
			<Components>
				<Button id="301" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="RemindersButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="302" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="RemindersButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="303" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="RemindersButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="304" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DaysBeforeOrAfter" fieldSource="DaysBeforeOrAfter" required="True" caption="{res:DaysBeforeOrAfter}" wizardCaption="{res:DaysBeforeOrAfter}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="RemindersDaysBeforeOrAfter" format="0;(0)" defaultValue="3" validationText="Message has to be sent 1-7 days in advance." inputMask="/^([1-7])$/">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="305" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="TimeToSend" fieldSource="TimeToSend" required="True" caption="{res:TimeToSend}" wizardCaption="{res:TimeToSend}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="RemindersTimeToSend" validationText="{res:NotificationInvalidTimeFormat}" format="H:nn" DBFormat="H:nn:ss" defaultValue="'10:00'" inputMask="/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="307" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Enabled" fieldSource="Enabled" required="False" caption="{res:Enabled}" wizardCaption="{res:Enabled}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" checkedValue="1" uncheckedValue="0" PathID="RemindersEnabled">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="308" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="FacilityID"/>
				<TableParameter id="309" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=2" parameterSource="notificationconfiguration_FacilityID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="310" parameterType="URL" variable="NotificationConfigurationID" dataType="Integer" parameterSource="NotificationConfigurationID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="311" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="312" tableName="notificationtype" posLeft="380" posTop="153" posWidth="119" posHeight="134"/>
				<JoinTable id="313" tableName="notificationconfiguration" posLeft="94" posTop="152" posWidth="160" posHeight="152"/>
				<JoinTable id="314" tableName="notification" posLeft="126" posTop="10" posWidth="119" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="315" tableLeft="notificationconfiguration" tableRight="facilities" fieldLeft="notificationconfiguration.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="316" tableLeft="notificationconfiguration" tableRight="notificationtype" fieldLeft="notificationconfiguration.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="317" tableLeft="notification" tableRight="notificationtype" fieldLeft="notification.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="318" tableName="facilities" fieldName="FacilityName"/>
				<Field id="319" tableName="notification" fieldName="Day"/>
				<Field id="320" tableName="notificationtype" fieldName="TypeName"/>
				<Field id="321" tableName="notificationconfiguration" fieldName="TimeToSend"/>
				<Field id="322" tableName="notificationconfiguration" fieldName="Enabled"/>
				<Field id="323" tableName="notificationconfiguration" fieldName="DaysBeforeOrAfter"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="324" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="325" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortTime"/>
				<CustomParameter id="326" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
				<CustomParameter id="327" field="NotificationTypeID" dataType="Integer" parameterType="Expression" parameterSource="2" omitIfEmpty="True"/>
				<CustomParameter id="328" field="FacilityID" dataType="Integer" parameterType="URL" omitIfEmpty="True" parameterSource="FacilityID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="329" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="330" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=2" parameterSource="notificationconfiguration_FacilityID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="331" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="332" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortTime"/>
				<CustomParameter id="333" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="334" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="335" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=2" parameterSource="notificationconfiguration_FacilityID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="336" groupID="1" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="374" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="PatientDischarged" dataSource="facilities, notificationtype, notificationconfiguration, notification" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:notificationconfiguration} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="PatientDischarged" activeCollection="IFormElements" customInsertType="Table" customInsert="notificationconfiguration" activeTableType="notificationconfiguration" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customUpdateType="Table" customUpdate="notificationconfiguration" customDeleteType="Table" customDelete="notificationconfiguration">
			<Components>
				<Button id="375" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="PatientDischargedButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="376" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="PatientDischargedButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="377" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="PatientDischargedButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="378" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DaysBeforeOrAfter" fieldSource="DaysBeforeOrAfter" required="True" caption="{res:PatientDischargedReferralDaysAfter}" wizardCaption="{res:DaysBeforeOrAfter}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="PatientDischargedDaysBeforeOrAfter" format="0;(0)" defaultValue="1" inputMask="/^([1-7])$/">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="379" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TimeToSend" fieldSource="TimeToSend" required="True" caption="{res:TimeToSend}" wizardCaption="{res:TimeToSend}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="PatientDischargedTimeToSend" validationText="{res:NotificationInvalidTimeFormat}" format="H:nn" DBFormat="H:nn:ss" inputMask="/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/" defaultValue="'08:00'">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="381" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Enabled" fieldSource="Enabled" required="False" caption="{res:Enabled}" wizardCaption="{res:Enabled}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" checkedValue="1" uncheckedValue="0" PathID="PatientDischargedEnabled">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="382" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="FacilityID"/>
				<TableParameter id="383" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=5" parameterSource="notificationconfiguration_FacilityID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="384" parameterType="URL" variable="NotificationConfigurationID" dataType="Integer" parameterSource="NotificationConfigurationID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="385" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="386" tableName="notificationtype" posLeft="380" posTop="153" posWidth="119" posHeight="134"/>
				<JoinTable id="387" tableName="notificationconfiguration" posLeft="94" posTop="152" posWidth="160" posHeight="152"/>
				<JoinTable id="388" tableName="notification" posLeft="126" posTop="10" posWidth="119" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="389" tableLeft="notificationconfiguration" tableRight="facilities" fieldLeft="notificationconfiguration.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="390" tableLeft="notificationconfiguration" tableRight="notificationtype" fieldLeft="notificationconfiguration.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="391" tableLeft="notification" tableRight="notificationtype" fieldLeft="notification.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="392" tableName="facilities" fieldName="FacilityName"/>
				<Field id="393" tableName="notification" fieldName="Day"/>
				<Field id="394" tableName="notificationtype" fieldName="TypeName"/>
				<Field id="395" tableName="notificationconfiguration" fieldName="TimeToSend"/>
				<Field id="396" tableName="notificationconfiguration" fieldName="Enabled"/>
				<Field id="397" tableName="notificationconfiguration" fieldName="DaysBeforeOrAfter"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="398" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="399" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="400" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
				<CustomParameter id="401" field="NotificationTypeID" dataType="Integer" parameterType="Expression" parameterSource="5" omitIfEmpty="True"/>
				<CustomParameter id="402" field="FacilityID" dataType="Integer" parameterType="URL" omitIfEmpty="True" parameterSource="FacilityID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="403" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="404" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=5" parameterSource="notificationconfiguration_FacilityID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="405" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="406" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="407" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="408" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="409" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=5" parameterSource="notificationconfiguration_FacilityID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="410" groupID="1" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="411" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="HighRiskPregnancySummaries" dataSource="facilities, notificationtype, notificationconfiguration, notification" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:notificationconfiguration} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="HighRiskPregnancySummaries" activeCollection="IFormElements" customInsertType="Table" customInsert="notificationconfiguration" activeTableType="notificationconfiguration" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customUpdateType="Table" customUpdate="notificationconfiguration" customDeleteType="Table" customDelete="notificationconfiguration">
			<Components>
				<Button id="412" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="HighRiskPregnancySummariesButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="413" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="HighRiskPregnancySummariesButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="414" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="HighRiskPregnancySummariesButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="415" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DaysBeforeOrAfter" fieldSource="DaysBeforeOrAfter" required="True" caption="{res:DaysBeforeOrAfter}" wizardCaption="{res:DaysBeforeOrAfter}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="HighRiskPregnancySummariesDaysBeforeOrAfter" defaultValue="1" inputMask="/^(0{0,2}[1-9]|0?[1-2][0-8])$/">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="416" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TimeToSend" fieldSource="TimeToSend" required="True" caption="{res:TimeToSend}" wizardCaption="{res:TimeToSend}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="HighRiskPregnancySummariesTimeToSend" validationText="{res:NotificationInvalidTimeFormat}" format="H:nn" DBFormat="H:nn:ss" inputMask="/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/" defaultValue="'14:00'">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="418" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Enabled" fieldSource="Enabled" required="False" caption="{res:Enabled}" wizardCaption="{res:Enabled}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" checkedValue="1" uncheckedValue="0" PathID="HighRiskPregnancySummariesEnabled">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="419" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="FacilityID"/>
				<TableParameter id="420" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=4" parameterSource="notificationconfiguration_FacilityID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="421" parameterType="URL" variable="NotificationConfigurationID" dataType="Integer" parameterSource="NotificationConfigurationID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="422" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="423" tableName="notificationtype" posLeft="380" posTop="153" posWidth="119" posHeight="134"/>
				<JoinTable id="424" tableName="notificationconfiguration" posLeft="94" posTop="152" posWidth="160" posHeight="152"/>
				<JoinTable id="425" tableName="notification" posLeft="126" posTop="10" posWidth="119" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="426" tableLeft="notificationconfiguration" tableRight="facilities" fieldLeft="notificationconfiguration.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="427" tableLeft="notificationconfiguration" tableRight="notificationtype" fieldLeft="notificationconfiguration.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="428" tableLeft="notification" tableRight="notificationtype" fieldLeft="notification.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="429" tableName="facilities" fieldName="FacilityName"/>
				<Field id="430" tableName="notification" fieldName="Day"/>
				<Field id="431" tableName="notificationtype" fieldName="TypeName"/>
				<Field id="432" tableName="notificationconfiguration" fieldName="TimeToSend"/>
				<Field id="433" tableName="notificationconfiguration" fieldName="Enabled"/>
				<Field id="434" tableName="notificationconfiguration" fieldName="DaysBeforeOrAfter"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="435" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="436" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="437" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
				<CustomParameter id="438" field="NotificationTypeID" dataType="Integer" parameterType="Expression" parameterSource="4" omitIfEmpty="True"/>
				<CustomParameter id="439" field="FacilityID" dataType="Integer" parameterType="URL" omitIfEmpty="True" parameterSource="FacilityID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="440" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="441" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=4" parameterSource="notificationconfiguration_FacilityID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="442" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="443" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="444" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="445" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="446" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=4" parameterSource="notificationconfiguration_FacilityID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="447" groupID="1" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="337" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="HighRiskReminders" dataSource="facilities, notificationtype, notificationconfiguration, notification" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:notificationconfiguration} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="HighRiskReminders" activeCollection="IFormElements" customInsertType="Table" customInsert="notificationconfiguration" activeTableType="notificationconfiguration" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customUpdateType="Table" customUpdate="notificationconfiguration" customDeleteType="Table" customDelete="notificationconfiguration">
			<Components>
				<Button id="338" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="HighRiskRemindersButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="339" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="HighRiskRemindersButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="340" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="HighRiskRemindersButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="341" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DaysBeforeOrAfter" fieldSource="DaysBeforeOrAfter" required="True" caption="{res:DaysBeforeOrAfter}" wizardCaption="{res:DaysBeforeOrAfter}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="HighRiskRemindersDaysBeforeOrAfter" format="0;(0)" defaultValue="2" inputMask="/^([1-7])$/">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="342" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TimeToSend" fieldSource="TimeToSend" required="True" caption="{res:TimeToSend}" wizardCaption="{res:TimeToSend}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="HighRiskRemindersTimeToSend" validationText="{res:NotificationInvalidTimeFormat}" format="H:nn" DBFormat="H:nn:ss" inputMask="/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/" defaultValue="'08:30'">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="344" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Enabled" fieldSource="Enabled" required="False" caption="{res:Enabled}" wizardCaption="{res:Enabled}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" checkedValue="1" uncheckedValue="0" PathID="HighRiskRemindersEnabled">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="345" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="FacilityID"/>
				<TableParameter id="346" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=3" parameterSource="notificationconfiguration_FacilityID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="347" parameterType="URL" variable="NotificationConfigurationID" dataType="Integer" parameterSource="NotificationConfigurationID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="348" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="349" tableName="notificationtype" posLeft="380" posTop="153" posWidth="119" posHeight="134"/>
				<JoinTable id="350" tableName="notificationconfiguration" posLeft="94" posTop="152" posWidth="160" posHeight="152"/>
				<JoinTable id="351" tableName="notification" posLeft="126" posTop="10" posWidth="119" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="352" tableLeft="notificationconfiguration" tableRight="facilities" fieldLeft="notificationconfiguration.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="353" tableLeft="notificationconfiguration" tableRight="notificationtype" fieldLeft="notificationconfiguration.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="354" tableLeft="notification" tableRight="notificationtype" fieldLeft="notification.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="355" tableName="facilities" fieldName="FacilityName"/>
				<Field id="356" tableName="notification" fieldName="Day"/>
				<Field id="357" tableName="notificationtype" fieldName="TypeName"/>
				<Field id="358" tableName="notificationconfiguration" fieldName="TimeToSend"/>
				<Field id="359" tableName="notificationconfiguration" fieldName="Enabled"/>
				<Field id="360" tableName="notificationconfiguration" fieldName="DaysBeforeOrAfter"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="361" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="362" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="363" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
				<CustomParameter id="364" field="NotificationTypeID" dataType="Integer" parameterType="Expression" parameterSource="3" omitIfEmpty="True"/>
				<CustomParameter id="365" field="FacilityID" dataType="Integer" parameterType="URL" omitIfEmpty="True" parameterSource="FacilityID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="366" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="367" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=3" parameterSource="notificationconfiguration_FacilityID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="368" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="369" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="370" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="371" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="372" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=3" parameterSource="notificationconfiguration_FacilityID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="373" groupID="1" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="449" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="Unsubscribe" dataSource="facilities, notificationtype, notificationconfiguration, notification" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:notificationconfiguration} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="Unsubscribe" activeCollection="DConditions" customInsertType="Table" customInsert="notificationconfiguration" activeTableType="customDelete" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customUpdateType="Table" customUpdate="notificationconfiguration" customDeleteType="Table" customDelete="notificationconfiguration">
			<Components>
				<Button id="450" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="UnsubscribeButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="451" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="UnsubscribeButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="452" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="UnsubscribeButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="453" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DaysBeforeOrAfter" fieldSource="DaysBeforeOrAfter" required="True" caption="{res:PatientDischargedReferralDaysAfter}" wizardCaption="{res:DaysBeforeOrAfter}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="UnsubscribeDaysBeforeOrAfter" format="0;(0)" defaultValue="1" inputMask="/^([1-7])$/">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="454" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TimeToSend" fieldSource="TimeToSend" required="True" caption="{res:TimeToSend}" wizardCaption="{res:TimeToSend}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="UnsubscribeTimeToSend" validationText="{res:NotificationInvalidTimeFormat}" format="H:nn" DBFormat="H:nn:ss" inputMask="/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/" defaultValue="'19:00'">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="455" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Enabled" fieldSource="Enabled" required="False" caption="{res:Enabled}" wizardCaption="{res:Enabled}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" checkedValue="1" uncheckedValue="0" PathID="UnsubscribeEnabled">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="456" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="FacilityID"/>
				<TableParameter id="457" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=7" parameterSource="notificationconfiguration_FacilityID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="458" parameterType="URL" variable="NotificationConfigurationID" dataType="Integer" parameterSource="NotificationConfigurationID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="459" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="460" tableName="notificationtype" posLeft="380" posTop="153" posWidth="119" posHeight="134"/>
				<JoinTable id="461" tableName="notificationconfiguration" posLeft="94" posTop="152" posWidth="160" posHeight="152"/>
				<JoinTable id="462" tableName="notification" posLeft="126" posTop="10" posWidth="119" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="463" tableLeft="notificationconfiguration" tableRight="facilities" fieldLeft="notificationconfiguration.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="464" tableLeft="notificationconfiguration" tableRight="notificationtype" fieldLeft="notificationconfiguration.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="465" tableLeft="notification" tableRight="notificationtype" fieldLeft="notification.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="466" tableName="facilities" fieldName="FacilityName"/>
				<Field id="467" tableName="notification" fieldName="Day"/>
				<Field id="468" tableName="notificationtype" fieldName="TypeName"/>
				<Field id="469" tableName="notificationconfiguration" fieldName="TimeToSend"/>
				<Field id="470" tableName="notificationconfiguration" fieldName="Enabled"/>
				<Field id="471" tableName="notificationconfiguration" fieldName="DaysBeforeOrAfter"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="472" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="473" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="474" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
				<CustomParameter id="475" field="NotificationTypeID" dataType="Integer" parameterType="Expression" parameterSource="7" omitIfEmpty="True"/>
				<CustomParameter id="476" field="FacilityID" dataType="Integer" parameterType="URL" omitIfEmpty="True" parameterSource="FacilityID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="477" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="478" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=7" parameterSource="notificationconfiguration_FacilityID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="479" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="480" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="481" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="482" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="483" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=7" parameterSource="notificationconfiguration_FacilityID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="521" groupID="1" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="485" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="Subscribe" dataSource="facilities, notificationtype, notificationconfiguration, notification" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:notificationconfiguration} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="Subscribe" activeCollection="DConditions" customInsertType="Table" customInsert="notificationconfiguration" activeTableType="customDelete" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customUpdateType="Table" customUpdate="notificationconfiguration" customDeleteType="Table" customDelete="notificationconfiguration">
			<Components>
				<Button id="486" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="SubscribeButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="487" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="SubscribeButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="488" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="SubscribeButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="489" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DaysBeforeOrAfter" fieldSource="DaysBeforeOrAfter" required="True" caption="{res:PatientDischargedReferralDaysAfter}" wizardCaption="{res:DaysBeforeOrAfter}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="SubscribeDaysBeforeOrAfter" format="0;(0)" defaultValue="1" inputMask="/^([1-7])$/">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="490" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TimeToSend" fieldSource="TimeToSend" required="True" caption="{res:TimeToSend}" wizardCaption="{res:TimeToSend}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="SubscribeTimeToSend" validationText="{res:NotificationInvalidTimeFormat}" format="H:nn" DBFormat="H:nn:ss" inputMask="/^((0?[6-9])|(1[0-9])|(2[0-2])):(00)|(30)/" defaultValue="'18:30'">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="491" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Enabled" fieldSource="Enabled" required="False" caption="{res:Enabled}" wizardCaption="{res:Enabled}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" checkedValue="1" uncheckedValue="0" PathID="SubscribeEnabled">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="492" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="FacilityID"/>
				<TableParameter id="493" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=6" parameterSource="notificationconfiguration_FacilityID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="494" parameterType="URL" variable="NotificationConfigurationID" dataType="Integer" parameterSource="NotificationConfigurationID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="495" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="496" tableName="notificationtype" posLeft="380" posTop="153" posWidth="119" posHeight="134"/>
				<JoinTable id="497" tableName="notificationconfiguration" posLeft="94" posTop="152" posWidth="160" posHeight="152"/>
				<JoinTable id="498" tableName="notification" posLeft="126" posTop="10" posWidth="119" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="499" tableLeft="notificationconfiguration" tableRight="facilities" fieldLeft="notificationconfiguration.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="500" tableLeft="notificationconfiguration" tableRight="notificationtype" fieldLeft="notificationconfiguration.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="501" tableLeft="notification" tableRight="notificationtype" fieldLeft="notification.NotificationTypeID" fieldRight="notificationtype.NotificationTypeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="502" tableName="facilities" fieldName="FacilityName"/>
				<Field id="503" tableName="notification" fieldName="Day"/>
				<Field id="504" tableName="notificationtype" fieldName="TypeName"/>
				<Field id="505" tableName="notificationconfiguration" fieldName="TimeToSend"/>
				<Field id="506" tableName="notificationconfiguration" fieldName="Enabled"/>
				<Field id="507" tableName="notificationconfiguration" fieldName="DaysBeforeOrAfter"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="508" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="509" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="510" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
				<CustomParameter id="511" field="NotificationTypeID" dataType="Integer" parameterType="Expression" parameterSource="6" omitIfEmpty="True"/>
				<CustomParameter id="512" field="FacilityID" dataType="Integer" parameterType="URL" omitIfEmpty="True" parameterSource="FacilityID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="513" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="514" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=6" parameterSource="notificationconfiguration_FacilityID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="515" field="DaysBeforeOrAfter" dataType="Integer" parameterType="Control" parameterSource="DaysBeforeOrAfter" omitIfEmpty="True"/>
				<CustomParameter id="516" field="TimeToSend" dataType="Date" parameterType="Control" parameterSource="TimeToSend" omitIfEmpty="True"/>
				<CustomParameter id="517" field="Enabled" dataType="Integer" parameterType="Control" parameterSource="Enabled" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="518" conditionType="Parameter" useIsNull="True" field="notificationconfiguration.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And"/>
				<TableParameter id="519" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=6" parameterSource="notificationconfiguration_FacilityID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="520" groupID="1" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="notifications_settings_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="notifications_settings_maint.php" forShow="True" url="notifications_settings_maint.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="298" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
