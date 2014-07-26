<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="27" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="employees" dataSource="employees, facilities, location, department" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:employees} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" returnPage="dashboard.ccp" PathID="employees" activeCollection="TableParameters" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" removeParameters="LoginID;EmployeeID;FirstName" customInsert="employees" customInsertType="Table" customUpdate="employees" customUpdateType="Table" customDelete="employees" customDeleteType="Table" activeTableType="customUpdate">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="employeesButton_Insert">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="184"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="employeesButton_Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="183"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="employeesButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="WorkPhone" fieldSource="WorkPhone" required="False" caption="{res:WorkPhone}" wizardCaption="{res:WorkPhone}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" PathID="employeesWorkPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="HandPhone" fieldSource="HandPhone" required="False" caption="{res:HandPhone}" wizardCaption="{res:HandPhone}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeesHandPhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Email" fieldSource="Email" required="False" caption="{res:Email}" wizardCaption="{res:Email}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeesEmail" inputMask="(-|^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="29" fieldSourceType="DBColumn" dataType="Integer" name="EmployeeID" PathID="employeesEmployeeID" fieldSource="EmployeeID">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
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
				<Hidden id="91" fieldSourceType="DBColumn" dataType="Integer" name="LoginID_employee" PathID="employeesLoginID_employee" fieldSource="LoginID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="142" fieldSourceType="DBColumn" dataType="Text" html="False" name="FacilityName" PathID="employeesFacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Button id="182" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="employeesButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="185" fieldSourceType="DBColumn" dataType="Text" html="False" name="FacilityNameDB" PathID="employeesFacilityNameDB" fieldSource="FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="193" fieldSourceType="DBColumn" dataType="Text" html="False" name="DepNameDB" PathID="employeesDepNameDB" fieldSource="DepartmentDesc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="206" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" PathID="employeesFirstName" fieldSource="FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="207" fieldSourceType="DBColumn" dataType="Text" html="False" name="LastName" PathID="employeesLastName" fieldSource="LastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="208" fieldSourceType="DBColumn" dataType="Text" html="False" name="Position" PathID="employeesPosition">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="DLookup" actionCategory="Database" id="209" typeOfTarget="Control" expression="&quot;PositionName&quot;" domain="&quot;position&quot;" criteria="&quot;PositionID = &quot;.$employees-&gt;PositionID-&gt;GetValue()" connection="registry_db" dataType="Text" target="Position"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="210" fieldSourceType="DBColumn" dataType="Integer" name="PositionID" PathID="employeesPositionID" fieldSource="PositionID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="55" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="56" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="57" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="6" conditionType="Parameter" useIsNull="False" field="employees.LoginID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="Session" orderNumber="1" leftBrackets="0" rightBrackets="0" parameterSource="LoginID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="31" tableName="employees" posLeft="94" posTop="39" posWidth="115" posHeight="223"/>
				<JoinTable id="186" tableName="facilities" posLeft="578" posTop="197" posWidth="95" posHeight="104"/>
				<JoinTable id="187" tableName="location" posLeft="346" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="194" tableName="department" posLeft="553" posTop="445" posWidth="108" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="188" tableLeft="employees" tableRight="location" fieldLeft="employees.LocationID" fieldRight="location.LocationID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="189" tableLeft="location" tableRight="facilities" fieldLeft="location.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="195" tableLeft="location" tableRight="department" fieldLeft="location.DeptID" fieldRight="department.DeptID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="190" tableName="employees" fieldName="employees.*"/>
				<Field id="191" tableName="facilities" fieldName="FacilityName"/>
				<Field id="192" tableName="location" fieldName="location.*"/>
				<Field id="197" tableName="department" fieldName="DepartmentDesc"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="58" field="LoginID" dataType="Integer" parameterType="Control" parameterSource="LoginID_employee" omitIfEmpty="True"/>
				<CustomParameter id="59" field="FirstName" dataType="Text" parameterType="Control" parameterSource="FirstName" omitIfEmpty="True"/>
				<CustomParameter id="60" field="LastName" dataType="Text" parameterType="Control" parameterSource="LastName" omitIfEmpty="True"/>
				<CustomParameter id="61" field="PositionID" dataType="Integer" parameterType="Control" parameterSource="Position" omitIfEmpty="True"/>
				<CustomParameter id="63" field="WorkPhone" dataType="Text" parameterType="Control" parameterSource="WorkPhone" omitIfEmpty="True"/>
				<CustomParameter id="64" field="HandPhone" dataType="Text" parameterType="Control" parameterSource="HandPhone" omitIfEmpty="True"/>
				<CustomParameter id="65" field="Email" dataType="Text" parameterType="Control" parameterSource="Email" omitIfEmpty="True"/>
				<CustomParameter id="68" field="LocationID" dataType="Text" parameterType="Control" parameterSource="LocationID" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="163" conditionType="Parameter" useIsNull="False" field="LoginID" dataType="Integer" parameterType="Session" searchConditionType="Equal" logicOperator="And" orderNumber="1" leftBrackets="0" rightBrackets="0" parameterSource="LoginID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="164" field="FirstName" dataType="Text" parameterType="Control" parameterSource="FirstName" omitIfEmpty="True"/>
				<CustomParameter id="165" field="LastName" dataType="Text" parameterType="Control" parameterSource="LastName" omitIfEmpty="True"/>
				<CustomParameter id="166" field="WorkPhone" dataType="Text" parameterType="Control" parameterSource="WorkPhone" omitIfEmpty="True"/>
				<CustomParameter id="167" field="HandPhone" dataType="Text" parameterType="Control" parameterSource="HandPhone" omitIfEmpty="True"/>
				<CustomParameter id="168" field="Email" dataType="Text" parameterType="Control" parameterSource="Email" omitIfEmpty="True"/>
				<CustomParameter id="169" field="LocationID" dataType="Text" parameterType="Control" parameterSource="LocationID" omitIfEmpty="True"/>
				<CustomParameter id="170" field="LoginID" dataType="Integer" parameterType="Control" parameterSource="LoginID_employee" omitIfEmpty="True"/>
				<CustomParameter id="171" field="PositionID" dataType="Integer" parameterType="Control" parameterSource="Position" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="172" conditionType="Parameter" useIsNull="False" field="EmployeeID" dataType="Text" parameterType="URL" parameterSource="EmployeeID" searchConditionType="Equal" logicOperator="And" orderNumber="1" leftBrackets="0" rightBrackets="0"/>
			</DConditions>
			<SecurityGroups>
				<Group id="201" groupID="1" read="True" insert="True" update="True" delete="True"/>
				<Group id="202" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="pinfo_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="pinfo_maint.php" forShow="True" url="pinfo_maint.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="203" groupID="1"/>
		<Group id="204" groupID="3"/>
		<Group id="205" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="176"/>
			</Actions>
		</Event>
	</Events>
</Page>
