<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0" wizardUsePageScroller="True" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="provinceSearch" wizardCaption="{res:CCS_SearchFormPrefix} {res:province} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="province_maint.ccp" PathID="provinceSearch" connection="registry_db">
			<Components>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="provinceSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_CountryID" wizardCaption="{res:CountryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="provinceSearchs_CountryID" sourceType="Table" connection="registry_db" dataSource="countries" boundColumn="CountryID" textColumn="Country">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="35" tableName="countries" posLeft="10" posTop="10" posWidth="95" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_ProvinceName" wizardCaption="{res:ProvinceName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" PathID="provinceSearchs_ProvinceName">
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
		<Grid id="3" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="province, countries" name="province" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:province} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" orderBy="ProvinceName">
			<Components>
				<Link id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="province_Insert" hrefSource="province_maint.ccp" removeParameters="ProvinceID" wizardThemeItem="FooterA" wizardDefaultValue="{res:CCS_InsertLink}" wizardUseTemplateBlock="False" PathID="provinceprovince_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="10" fieldSourceType="DBColumn" dataType="Text" html="False" name="province_TotalRecords" wizardUseTemplateBlock="False" PathID="provinceprovince_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="11" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="14" visible="True" name="Sorter_ProvinceName" column="ProvinceName" wizardCaption="{res:ProvinceName}" wizardSortingType="SimpleDir" wizardControl="ProvinceName" wizardAddNbsp="False" PathID="provinceSorter_ProvinceName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_CountryID" column="CountryID" wizardCaption="{res:CountryID}" wizardSortingType="SimpleDir" wizardControl="CountryID" wizardAddNbsp="False" PathID="provinceSorter_CountryID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ProvinceName" fieldSource="ProvinceName" wizardCaption="{res:ProvinceName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" hrefSource="province_maint.ccp" wizardThemeItem="GridA" PathID="provinceProvinceName">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="ProvinceID" source="ProvinceID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CountryID" fieldSource="Country" wizardCaption="{res:CountryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="provinceCountryID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="21" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImages="Images">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="12" conditionType="Parameter" useIsNull="False" field="province.CountryID" parameterSource="s_CountryID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="13" conditionType="Parameter" useIsNull="False" field="province.ProvinceName" parameterSource="s_ProvinceName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="31" tableName="province" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="32" tableName="countries" posLeft="126" posTop="10" posWidth="95" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="33" tableLeft="province" tableRight="countries" fieldLeft="province.CountryID" fieldRight="countries.CountryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="8" tableName="province" fieldName="ProvinceID"/>
				<Field id="16" tableName="province" fieldName="ProvinceName"/>
				<Field id="19" tableName="province" fieldName="province.CountryID" alias="province_CountryID"/>
				<Field id="34" tableName="countries" fieldName="countries.*"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="22" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="province1" dataSource="province" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:province} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="province1">
			<Components>
				<Button id="23" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="province1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="24" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="province1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="25" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="province1Button_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="26" message="{res:CCS_DeleteConfirmation}"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="27" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="province1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CountryID" fieldSource="CountryID" required="True" caption="{res:CountryID}" wizardCaption="{res:CountryID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="province1CountryID" sourceType="Table" connection="registry_db" dataSource="countries" boundColumn="CountryID" textColumn="Country">
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
				<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ProvinceName" fieldSource="ProvinceName" required="True" caption="{res:ProvinceName}" wizardCaption="{res:ProvinceName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="province1ProvinceName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="ProvinceID" parameterSource="ProvinceID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
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
		<CodeFile id="Events" language="PHPTemplates" name="province_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="province_maint.php" forShow="True" url="province_maint.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="36" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
