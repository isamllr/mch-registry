<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="39" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="employees" dataSource="employees, location, facilities, position" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:employees} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="employees" activeCollection="UFormElements" customInsertType="Table" activeTableType="employees" customInsert="employees" customUpdateType="Table" customUpdate="employees" customDeleteType="Table" customDelete="employees" groupBy="FacilityName" pasteActions="pasteActions">
			<Components>
				<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="employeesButton_Insert" returnPage="doctors_list.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="employeesButton_Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="116"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="employeesButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="118"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="43" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="employeesButton_Cancel">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="117"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FirstName" fieldSource="FirstName" required="False" caption="{res:FirstName}" wizardCaption="{res:FirstName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employeesFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LastName" fieldSource="LastName" required="False" caption="{res:LastName}" wizardCaption="{res:LastName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employeesLastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="PositionID" fieldSource="PositionID" required="False" caption="{res:PositionID}" wizardCaption="{res:PositionID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employeesPositionID" sourceType="Table" connection="registry_db" dataSource="position" boundColumn="PositionID" textColumn="PositionName">
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
				<ListBox id="92" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="FacilityID" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName" groupBy="FacilityName" required="True" PathID="employeesFacilityID">
<Components/>
<Events/>
<TableParameters/>
<SPParameters/>
<SQLParameters/>
<JoinTables>
<JoinTable id="100" tableName="facilities" posWidth="95" posHeight="115" posLeft="262" posTop="10"/>
</JoinTables>
<JoinLinks/>
<Fields>
<Field id="113" fieldName="*"/>
</Fields>
<Attributes/>
<Features/>
</ListBox>
<Hidden id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LocationID" fieldSource="LocationID" required="True" caption="{res:LocationID}" wizardCaption="{res:LocationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="employeesLocationID" sourceType="Table" connection="openmedis_db" dataSource="location, facilities" boundColumn="LocationID" textColumn="FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="21" tableName="location" posLeft="10" posTop="10" posWidth="115" posHeight="180"/>
						<JoinTable id="23" tableName="facilities" posLeft="146" posTop="10" posWidth="95" posHeight="120"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="24" tableLeft="location" tableRight="facilities" fieldLeft="location.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="22" tableName="location" fieldName="LocationID"/>
						<Field id="26" tableName="facilities" fieldName="FacilityName"/>
					</Fields>
				</Hidden>
<ListBox id="122" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DeptID" required="True" caption="{res:DeptID}" wizardCaption="{res:DeptID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="employeesDeptID" sourceType="Table" connection="registry_db" dataSource="department" boundColumn="DeptID" textColumn="DepartmentDesc" orderBy="DepartmentDesc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="123" tableName="department" posLeft="10" posTop="10" posWidth="108" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="51" tableName="department" fieldName="DeptID"/>
						<Field id="124" tableName="department" fieldName="DepartmentDesc"/>
					</Fields>
				</ListBox>
</Components>
			<Events>
				<Event name="BeforeInsert" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="125"/>
</Actions>
</Event>
<Event name="BeforeUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="126"/>
</Actions>
</Event>
<Event name="AfterUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="127"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="128"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="44" conditionType="Parameter" useIsNull="False" field="employees.EmployeeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" leftBrackets="0" rightBrackets="0" parameterSource="EmployeeID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="49" tableName="employees" posLeft="10" posTop="10" posWidth="115" posHeight="180"/>
				<JoinTable id="50" tableName="location" posLeft="146" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="52" tableName="facilities" posLeft="262" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="61" tableName="position" posLeft="170" posTop="219" posWidth="95" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="95" tableLeft="employees" tableRight="location" fieldLeft="employees.LocationID" fieldRight="location.LocationID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="96" tableLeft="location" tableRight="facilities" fieldLeft="location.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="97" tableLeft="employees" tableRight="position" fieldLeft="employees.PositionID" fieldRight="position.PositionID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="54" tableName="employees" fieldName="employees.*"/>
				<Field id="55" tableName="location" fieldName="location.*"/>
				<Field id="56" tableName="facilities" fieldName="FacilityName"/>
				<Field id="63" tableName="position" fieldName="position.*"/>
				<Field id="121" tableName="facilities" fieldName="facilities.FacilityID" alias="facilities_FacilityID"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="67" field="FirstName" dataType="Text" parameterType="Control" parameterSource="FirstName" omitIfEmpty="True"/>
				<CustomParameter id="68" field="LastName" dataType="Text" parameterType="Control" parameterSource="LastName" omitIfEmpty="True"/>
				<CustomParameter id="69" field="PositionID" dataType="Integer" parameterType="Control" parameterSource="PositionID" omitIfEmpty="True"/>
				<CustomParameter id="88" field="LocationID" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="LocationID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="90" conditionType="Parameter" useIsNull="False" field="EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="75" field="FirstName" dataType="Text" parameterType="Control" parameterSource="FirstName" omitIfEmpty="True"/>
				<CustomParameter id="76" field="LastName" dataType="Text" parameterType="Control" parameterSource="LastName" omitIfEmpty="True"/>
				<CustomParameter id="77" field="PositionID" dataType="Integer" parameterType="Control" parameterSource="PositionID" omitIfEmpty="True"/>
				<CustomParameter id="89" field="LocationID" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="LocationID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="91" conditionType="Parameter" useIsNull="False" field="EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="doctors.php" forShow="True" url="doctors.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="doctors_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
<Group id="129" groupID="1"/>
</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
