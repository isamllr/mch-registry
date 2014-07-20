<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="9" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="11" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="departmentSearch" wizardCaption="{res:CCS_SearchFormPrefix} {res:department} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="department_maint.ccp" PathID="departmentSearch" connection="registry_db">
			<Components>
				<Button id="12" urlType="Relative" enableValidation="True" isDefault="True" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="departmentSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_DepartmentDesc" wizardCaption="{res:DepartmentDesc}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="departmentSearchs_DepartmentDesc">
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
		<EditableGrid id="31" urlType="Relative" secured="False" emptyRows="0" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="15" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" dataSource="department" activeCollection="TableParameters" name="department1" orderBy="DeptID" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:department} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="Simple" wizardAltRecord="False" wizardRecordSeparator="True" wizardNoRecords="{res:CCS_NoRecords}" PathID="department1" deleteControl="CheckBox_Delete">
			<Components>
				<Sorter id="36" visible="True" name="Sorter_DeptID" column="DeptID" wizardCaption="{res:DeptID}" wizardSortingType="Simple" wizardControl="DeptID" PathID="department1Sorter_DeptID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="37" visible="True" name="Sorter_DepartmentDesc" column="DepartmentDesc" wizardCaption="{res:DepartmentDesc}" wizardSortingType="Simple" wizardControl="DepartmentDesc" PathID="department1Sorter_DepartmentDesc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="38" fieldSourceType="DBColumn" dataType="Integer" html="False" name="DeptID" fieldSource="DeptID" required="False" caption="{res:DeptID}" wizardCaption="{res:DeptID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department1DeptID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DepartmentDesc" fieldSource="DepartmentDesc" required="False" caption="{res:DepartmentDesc}" wizardCaption="{res:DepartmentDesc}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="department1DepartmentDesc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Panel id="40" visible="True" name="CheckBox_Delete_Panel">
					<Components>
						<CheckBox id="41" visible="Dynamic" fieldSourceType="CodeExpression" dataType="Boolean" name="CheckBox_Delete" checkedValue="true" uncheckedValue="false" wizardCaption="{res:CCS_Delete}" wizardAddNbsp="True" PathID="department1CheckBox_Delete_PanelCheckBox_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
				<Navigator id="42" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="{res:CCS_Update}" PathID="department1Button_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="DepartmentDesc" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_DepartmentDesc"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="32" tableName="department" posLeft="10" posTop="10" posWidth="108" posHeight="88"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields>
				<PKField id="35" tableName="department" fieldName="DeptID" dataType="Integer"/>
			</PKFields>
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
		</EditableGrid>
		<Record id="44" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="department" dataSource="department" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:department} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="department">
			<Components>
				<Button id="45" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="departmentButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="46" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="departmentButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DepartmentDesc" fieldSource="DepartmentDesc" required="False" caption="{res:DepartmentDesc}" wizardCaption="{res:DepartmentDesc}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="departmentDepartmentDesc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="DeptID" parameterSource="DeptID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="department_maint.php" forShow="True" url="department_maint.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="30" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
