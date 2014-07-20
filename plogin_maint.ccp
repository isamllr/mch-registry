<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="27" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="103" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="login" dataSource="login" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:login} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="login" customUpdateType="Table" customUpdate="login" pasteActions="pasteActions" activeCollection="UFormElements" activeTableType="login">
			<Components>
				<Button id="105" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="loginButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="110" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="password" caption="{res:password}" wizardCaption="{res:password}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="True" wizardUseTemplateBlock="False" PathID="loginpassword" fieldSource="password" validationRule="preg_match(&quot;/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/&quot;,$this-&gt;password-&gt;GetValue())" validationText="{res:PwdReq}">
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
				<Label id="206" fieldSourceType="DBColumn" dataType="Text" html="False" name="username" PathID="loginusername" fieldSource="username">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="207" visible="Yes" fieldSourceType="CodeExpression" dataType="Text" name="currentPwd" PathID="logincurrentPwd" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="209" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="repeatPassword" PathID="loginrepeatPassword">
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
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Encrypt Password" actionCategory="Security" id="118" passwordControlName="password" shadowControlName="password_Shadow" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="208"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="120" conditionType="Parameter" useIsNull="False" field="LoginID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="Session" orderNumber="1" parameterSource="UserID"/>
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
				<TableParameter id="126" conditionType="Parameter" useIsNull="False" field="LoginID" dataType="Integer" parameterType="Session" searchConditionType="Equal" logicOperator="And" orderNumber="1" omitIfEmpty="True" parameterSource="UserID"/>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="plogin_maint.php" forShow="True" url="plogin_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="plogin_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
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
