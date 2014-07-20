<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="11" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="80" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="20" connection="registry_db" dataSource="facilities, countries, province, districts" name="countries_districts_facil1" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:countriesdistrictsfacilitiesprovince} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}">
			<Components>
				<Link id="96" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="countries_districts_facil1_Insert" hrefSource="facilities_maint.ccp" removeParameters="FacilityID" wizardThemeItem="FooterA" wizardDefaultValue="{res:CCS_InsertLink}" wizardUseTemplateBlock="False" PathID="countries_districts_facil1countries_districts_facil1_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
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
				<Link id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="FacilityName" fieldSource="FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" hrefSource="facilities_maint.ccp" wizardThemeItem="GridA" PathID="countries_districts_facil1FacilityName">
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
		<Record id="115" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="facilities" dataSource="facilities, districts, province, countries" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:facilities} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="facilities" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" activeCollection="IFormElements" customDelete="facilities" customDeleteType="Table" customUpdate="facilities" customUpdateType="Table" customInsert="facilities" customInsertType="Table" visible="Dynamic" activeTableType="facilities">
			<Components>
				<Button id="116" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="facilitiesButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="117" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="facilitiesButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="118" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="facilitiesButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="119" message="{res:CCS_DeleteConfirmation}"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="120" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="facilitiesButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="122" visible="Dynamic" fieldSourceType="DBColumn" dataType="Integer" name="DistrictID" fieldSource="DistrictID" required="True" caption="{res:DistrictID}" wizardCaption="{res:DistrictID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="facilitiesDistrictID" sourceType="Table" connection="registry_db" dataSource="districts" boundColumn="DistrictID" textColumn="DistrictName" features="(assigned)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<PTDependentListBox id="151" enabled="True" name="PTDependentListBoxDistrictID" servicePage="services/DistrictID_from_Province_PTDependentListBox.ccp" masterListbox="ProvinceID" category="Prototype" featureNameChanged="No">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FacilityName" fieldSource="FacilityName" required="True" caption="{res:FacilityName}" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="facilitiesFacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ProvinceID" fieldSource="province.ProvinceID" required="False" caption="{res:ProvinceID}" wizardCaption="{res:DistrictID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="facilitiesProvinceID" sourceType="Table" connection="registry_db" dataSource="province" boundColumn="ProvinceID" textColumn="ProvinceName" features="(assigned)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<PTDependentListBox id="145" enabled="True" name="PTDependentListBoxProvinceID" servicePage="services/ProvinceID_from_Countries_PTDependentListBox.ccp" masterListbox="CountryID" category="Prototype">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<ListBox id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CountryID" required="False" caption="{res:CountryID}" wizardCaption="{res:DistrictID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="facilitiesCountryID" sourceType="Table" connection="registry_db" dataSource="countries" boundColumn="CountryID" textColumn="Country" fieldSource="countries.CountryID">
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
				<TextBox id="155" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Phone" fieldSource="Phone" required="False" caption="{res:Phone}" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="facilitiesPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="121" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" parameterSource="FacilityID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="127" tableName="facilities" posLeft="32" posTop="28" posWidth="95" posHeight="104"/>
				<JoinTable id="128" tableName="districts" posLeft="148" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="129" tableName="province" posLeft="264" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="130" tableName="countries" posLeft="380" posTop="10" posWidth="95" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="131" tableLeft="facilities" tableRight="districts" fieldLeft="facilities.DistrictID" fieldRight="districts.DistrictID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="132" tableLeft="districts" tableRight="province" fieldLeft="districts.ProvinceID" fieldRight="province.ProvinceID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="133" tableLeft="province" tableRight="countries" fieldLeft="province.CountryID" fieldRight="countries.CountryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="134" fieldName="*"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="135" field="DistrictID" dataType="Integer" parameterType="Control" parameterSource="DistrictID" omitIfEmpty="True"/>
				<CustomParameter id="136" field="FacilityName" dataType="Text" parameterType="Control" parameterSource="FacilityName" omitIfEmpty="True"/>
				<CustomParameter id="158" field="Phone" dataType="Text" parameterType="Control" parameterSource="Phone" omitIfEmpty="True"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="137" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="138" field="DistrictID" dataType="Integer" parameterType="Control" parameterSource="DistrictID" omitIfEmpty="True"/>
				<CustomParameter id="139" field="FacilityName" dataType="Text" parameterType="Control" parameterSource="FacilityName" omitIfEmpty="True"/>
				<CustomParameter id="161" field="Phone" dataType="Text" parameterType="Control" parameterSource="Phone" omitIfEmpty="True"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="140" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" parameterType="URL" parameterSource="FacilityID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="88" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="countries_districts_facil" wizardCaption="{res:CCS_SearchFormPrefix} {res:countries_districts_facil} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="facilities_maint.ccp" PathID="countries_districts_facil" visible="Dynamic" connection="registry_db">
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
			<Features>
			</Features>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="facilities_maint.php" forShow="True" url="facilities_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="facilities_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="79" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
