<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" wizardUsePageScroller="True" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="33" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="40" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="20" connection="registry_db" dataSource="districts, province, countries" name="districts" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:districts} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" orderBy="DistrictName">
			<Components>
				<Link id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="districts_Insert" hrefSource="districts_maint.ccp" removeParameters="DistrictID" wizardThemeItem="FooterA" wizardDefaultValue="{res:CCS_InsertLink}" wizardUseTemplateBlock="False" PathID="districtsdistricts_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" name="districts_TotalRecords" wizardUseTemplateBlock="False" PathID="districtsdistricts_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="48"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="51" visible="True" name="Sorter_DistrictName" column="DistrictName" wizardCaption="{res:DistrictName}" wizardSortingType="SimpleDir" wizardControl="DistrictName" wizardAddNbsp="False" PathID="districtsSorter_DistrictName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="52" visible="True" name="Sorter_ProvinceID" column="ProvinceID" wizardCaption="{res:ProvinceID}" wizardSortingType="SimpleDir" wizardControl="ProvinceID" wizardAddNbsp="False" PathID="districtsSorter_ProvinceID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DistrictName" fieldSource="DistrictName" wizardCaption="{res:DistrictName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" hrefSource="districts_maint.ccp" wizardThemeItem="GridA" PathID="districtsDistrictName">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="55" sourceType="DataField" format="yyyy-mm-dd" name="DistrictID" source="DistrictID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="57" fieldSourceType="DBColumn" dataType="Text" html="False" name="ProvinceID" fieldSource="ProvinceName" wizardCaption="{res:ProvinceID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="districtsProvinceID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="58" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImages="Images">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="49" conditionType="Parameter" useIsNull="False" field="districts.ProvinceID" parameterSource="s_ProvinceID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="districts.DistrictName" parameterSource="s_DistrictName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="70" tableName="districts" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="71" tableName="province" posLeft="126" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="81" tableName="countries" posLeft="242" posTop="10" posWidth="95" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="72" tableLeft="districts" tableRight="province" fieldLeft="districts.ProvinceID" fieldRight="province.ProvinceID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="82" tableLeft="province" tableRight="countries" fieldLeft="province.CountryID" fieldRight="countries.CountryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="45" tableName="districts" fieldName="DistrictID"/>
				<Field id="53" tableName="districts" fieldName="DistrictName"/>
				<Field id="56" tableName="districts" fieldName="districts.ProvinceID" alias="districts_ProvinceID"/>
				<Field id="73" tableName="province" fieldName="province.*"/>
				<Field id="83" tableName="countries" fieldName="countries.*"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="59" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="districtsEdit" dataSource="districts, province, countries" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:districts} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="districtsEdit" pasteActions="pasteActions" customInsertType="Table" customInsert="districts" customUpdateType="Table" customUpdate="districts" customDeleteType="Table" orderBy="Country">
			<Components>
				<Button id="60" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="districtsEditButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="61" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="districtsEditButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="62" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="districtsEditButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="63" message="{res:CCS_DeleteConfirmation}"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="64" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="districtsEditButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="66" visible="Dynamic" fieldSourceType="DBColumn" dataType="Integer" name="ProvinceID" fieldSource="ProvinceID" required="True" caption="{res:ProvinceID}" wizardCaption="{res:ProvinceID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="districtsEditProvinceID" sourceType="Table" connection="registry_db" dataSource="province" boundColumn="ProvinceID" textColumn="ProvinceName" features="(assigned)" orderBy="ProvinceName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<PTDependentListBox id="74" enabled="True" name="PTDependentListBox1" category="Prototype" featureNameChanged="No" masterListbox="CountryID" servicePage="services/ProvinceID_from_Countries_PTDependentListBox.ccp">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="68" tableName="province" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DistrictName" fieldSource="DistrictName" required="False" caption="{res:DistrictName}" wizardCaption="{res:DistrictName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="districtsEditDistrictName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="74" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CountryID" required="False" caption="{res:CountryID}" wizardCaption="{res:DistrictID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="districtsEditCountryID" sourceType="Table" connection="registry_db" dataSource="countries" boundColumn="CountryID" textColumn="Country" fieldSource="province.CountryID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="88" tableName="countries" posLeft="10" posTop="10" posWidth="95" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="65" conditionType="Parameter" useIsNull="False" field="districts.DistrictID" parameterSource="DistrictID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="75" tableName="districts" posLeft="10" posTop="10" posWidth="160" posHeight="122"/>
				<JoinTable id="84" tableName="province" posLeft="191" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="86" tableName="countries" posLeft="307" posTop="10" posWidth="95" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="85" tableLeft="districts" tableRight="province" fieldLeft="districts.ProvinceID" fieldRight="province.ProvinceID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="87" tableLeft="province" tableRight="countries" fieldLeft="province.CountryID" fieldRight="countries.CountryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="76" field="ProvinceID" dataType="Integer" parameterType="Control" parameterSource="ProvinceID" omitIfEmpty="True"/>
				<CustomParameter id="77" field="DistrictName" dataType="Text" parameterType="Control" parameterSource="DistrictName" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="78" conditionType="Parameter" useIsNull="False" field="DistrictID" dataType="Integer" parameterType="URL" parameterSource="DistrictID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="79" field="ProvinceID" dataType="Integer" parameterType="Control" parameterSource="ProvinceID" omitIfEmpty="True"/>
				<CustomParameter id="80" field="DistrictName" dataType="Text" parameterType="Control" parameterSource="DistrictName" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="89" conditionType="Parameter" useIsNull="False" field="districts.DistrictID" dataType="Integer" parameterType="URL" parameterSource="DistrictID" searchConditionType="Equal" logicOperator="And" orderNumber="1" leftBrackets="0" rightBrackets="0"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="41" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="districtsSearch" wizardCaption="{res:CCS_SearchFormPrefix} {res:districts} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="districts_maint.ccp" PathID="districtsSearch" connection="registry_db">
			<Components>
				<Button id="42" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="districtsSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="43" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_ProvinceID" wizardCaption="{res:ProvinceID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="districtsSearchs_ProvinceID" connection="registry_db" dataSource="province" boundColumn="ProvinceID" textColumn="ProvinceName" orderBy="ProvinceName">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="69" tableName="province" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_DistrictName" wizardCaption="{res:DistrictName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="districtsSearchs_DistrictName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="districts_maint.php" forShow="True" url="districts_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="districts_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="90" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
