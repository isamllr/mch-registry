<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="employees, facilities, location" name="employees_facilities_loca1" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:employeesfacilitieslocation} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="TableParameters">
			<Components>
				<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="False" name="employees_facilities_loca1_TotalRecords" wizardUseTemplateBlock="False" PathID="employees_facilities_loca1employees_facilities_loca1_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="15"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="20" visible="True" name="Sorter_FirstName" column="FirstName" wizardCaption="{res:FirstName}" wizardSortingType="SimpleDir" wizardControl="FirstName" wizardAddNbsp="False" PathID="employees_facilities_loca1Sorter_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="21" visible="True" name="Sorter_LastName" column="LastName" wizardCaption="{res:LastName}" wizardSortingType="SimpleDir" wizardControl="LastName" wizardAddNbsp="False" PathID="employees_facilities_loca1Sorter_LastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" fieldSource="FirstName" wizardCaption="{res:FirstName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employees_facilities_loca1FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" name="LastName" fieldSource="LastName" wizardCaption="{res:LastName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employees_facilities_loca1LastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="31" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="None" name="ImageLink1" PathID="employees_facilities_loca1ImageLink1" hrefSource="doctors.ccp">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="35"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="36" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Sorter id="22" visible="True" name="Sorter_location_FacilityID" column="location.FacilityID" wizardCaption="{res:locationFacilityID}" wizardSortingType="SimpleDir" wizardControl="location_FacilityID" wizardAddNbsp="False" PathID="employees_facilities_loca1Sorter_location_FacilityID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" name="location_FacilityID" fieldSource="FacilityName" wizardCaption="{res:locationFacilityID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="employees_facilities_loca1location_FacilityID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employees_Insert" hrefSource="doctors.ccp" removeParameters="EmployeeID" wizardThemeItem="NavigatorLink" wizardDefaultValue="{res:CCS_InsertLink}" PathID="employees_facilities_loca1employees_Insert" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="16" conditionType="Parameter" useIsNull="False" field="employees.FirstName" parameterSource="s_FirstName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
				<TableParameter id="17" conditionType="Parameter" useIsNull="False" field="employees.LastName" parameterSource="s_LastName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="18" conditionType="Parameter" useIsNull="False" field="location.FacilityID" parameterSource="s_location_FacilityID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3"/>
				<TableParameter id="37" conditionType="Parameter" useIsNull="True" field="employees.LoginID" dataType="Integer" searchConditionType="IsNull" parameterType="URL" logicOperator="And" expression="WHERE `LoginID` IS NULL" parameterSource="LoginID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="employees" posLeft="10" posTop="10" posWidth="115" posHeight="223"/>
				<JoinTable id="5" tableName="facilities" posLeft="367" posTop="28" posWidth="95" posHeight="104"/>
				<JoinTable id="6" tableName="location" posLeft="146" posTop="10" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="7" tableLeft="employees" tableRight="location" fieldLeft="employees.LocationID" fieldRight="location.LocationID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="8" tableLeft="location" tableRight="facilities" fieldLeft="location.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="23" tableName="employees" fieldName="EmployeeID"/>
				<Field id="25" tableName="employees" fieldName="FirstName"/>
				<Field id="27" tableName="employees" fieldName="LastName"/>
				<Field id="29" tableName="location" fieldName="location.FacilityID" alias="location_FacilityID"/>
				<Field id="32" tableName="facilities" fieldName="FacilityName"/>
				<Field id="33" tableName="facilities" fieldName="facilities.FacilityID" alias="facilities_FacilityID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="9" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="employees_facilities_loca" wizardCaption="{res:CCS_SearchFormPrefix} {res:employees_facilities_loca} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="doctors_list.ccp" PathID="employees_facilities_loca">
			<Components>
				<Button id="10" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="employees_facilities_locaButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" wizardCaption="{res:FirstName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" PathID="employees_facilities_locas_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_LastName" wizardCaption="{res:LastName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" PathID="employees_facilities_locas_LastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_location_FacilityID" wizardCaption="{res:locationFacilityID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="employees_facilities_locas_location_FacilityID" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName">
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
		<CodeFile id="Events" language="PHPTemplates" name="doctors_list_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="doctors_list.php" forShow="True" url="doctors_list.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="39" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
