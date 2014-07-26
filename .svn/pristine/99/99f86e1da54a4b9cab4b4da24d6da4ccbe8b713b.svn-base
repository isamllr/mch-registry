<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="27" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="103" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="login" dataSource="login" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:login} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="login" customInsertType="Table" customInsert="login" customUpdateType="Table" customUpdate="login" pasteActions="pasteActions" activeCollection="UConditions" activeTableType="customUpdate">
			<Components>
				<Button id="105" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="loginButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="109" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="username" fieldSource="username" required="True" caption="{res:username}" wizardCaption="{res:username}" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="loginusername">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="110" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="password" fieldSource="password" required="True" caption="{res:password}" wizardCaption="{res:password}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="True" wizardUseTemplateBlock="False" PathID="loginpassword">
					<Components/>
					<Events>
						<Event name="OnValidate" type="Server">
							<Actions>
								<Action actionName="Reset Password Validation" actionCategory="Security" id="111" passwordControlName="password" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="114" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="locale" fieldSource="locale" required="True" caption="{res:locale}" wizardCaption="{res:locale}" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="loginlocale" connection="registry_db" dataSource="languages" boundColumn="locale" textColumn="Language">
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
				<Hidden id="115" fieldSourceType="DBColumn" dataType="Text" name="password_Shadow" PathID="loginpassword_Shadow">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="133" fieldSourceType="DBColumn" dataType="Integer" name="LoginID" PathID="loginLoginID" fieldSource="LoginID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Preserve Password" actionCategory="Security" id="116" passwordControlName="password" shadowControlName="password_Shadow" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Encrypt Password" actionCategory="Security" id="117" passwordControlName="password" shadowControlName="password_Shadow" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Encrypt Password" actionCategory="Security" id="118" passwordControlName="password" shadowControlName="password_Shadow" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="181"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="120" conditionType="Parameter" useIsNull="False" field="LoginID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="Session" orderNumber="1" parameterSource="LoginID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="178" tableName="login" posLeft="10" posTop="10" posWidth="115" posHeight="152"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="121" field="username" dataType="Text" parameterType="Control" parameterSource="username" omitIfEmpty="True"/>
				<CustomParameter id="122" field="password" dataType="Text" parameterType="Expression" parameterSource="&quot;{password}&quot;" omitIfEmpty="True"/>
				<CustomParameter id="123" field="GroupID" dataType="Integer" parameterType="Control" parameterSource="GroupID" omitIfEmpty="True"/>
				<CustomParameter id="124" field="DefaultDB" dataType="Text" parameterType="Control" parameterSource="DefaultDB" omitIfEmpty="True"/>
				<CustomParameter id="125" field="locale" dataType="Text" parameterType="Control" parameterSource="locale" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="126" conditionType="Parameter" useIsNull="False" field="LoginID" dataType="Integer" parameterType="Session" searchConditionType="Equal" logicOperator="And" orderNumber="1" omitIfEmpty="True" parameterSource="LoginID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="127" field="username" dataType="Text" parameterType="Control" parameterSource="username" omitIfEmpty="True"/>
				<CustomParameter id="128" field="password" dataType="Text" parameterType="Expression" parameterSource="&quot;{password}&quot;" omitIfEmpty="True"/>
				<CustomParameter id="131" field="locale" dataType="Text" parameterType="Control" parameterSource="locale" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
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
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FirstName" fieldSource="FirstName" required="True" caption="{res:FirstName}" wizardCaption="{res:FirstName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" PathID="employeesFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LastName" fieldSource="LastName" required="False" caption="{res:LastName}" wizardCaption="{res:LastName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" PathID="employeesLastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
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
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Email" fieldSource="Email" required="False" caption="{res:Email}" wizardCaption="{res:Email}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeesEmail" inputMask="^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$">
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
				<ListBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Position" fieldSource="PositionID" required="True" caption="{res:Position}" wizardCaption="{res:Position}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="employeesPosition" sourceType="Table" connection="registry_db" dataSource="position" boundColumn="PositionID" textColumn="PositionName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="161" tableName="position" posLeft="10" posTop="10" posWidth="95" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
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
		<CodeFile id="Code" language="PHPTemplates" name="myAccount.php" forShow="True" url="myAccount.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="myAccount_events.php" forShow="False" comment="//" codePage="utf-8"/>
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
