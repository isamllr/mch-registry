<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="10" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="18" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="notificationsmsservice" dataSource="notificationsmsservice" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:notificationsmsservice} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="notificationsmsservice" activeCollection="UFormElements" customUpdateType="Table" customUpdate="notificationsmsservice" activeTableType="notificationsmsservice" customInsert="notificationsmsservice" customInsertType="Table">
			<Components>
				<Button id="19" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="notificationsmsserviceButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="20" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="notificationsmsserviceButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="21" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="notificationsmsserviceButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="23" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="NotificationProvider" fieldSource="NotificationProvider" required="True" caption="{res:nProvider}" wizardCaption="{res:Provider}" wizardSize="45" wizardMaxLength="45" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="notificationsmsserviceNotificationProvider" connection="registry_db" dataSource="Clickatell;Clickatell;ecall;ecall" _valueOfList="ecall" _nameOfList="ecall">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="34"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="24" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="NotificationProtocol" fieldSource="NotificationProtocol" required="True" caption="{res:nProtocol}" wizardCaption="{res:Protocol}" wizardSize="45" wizardMaxLength="45" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="notificationsmsserviceNotificationProtocol" connection="registry_db" dataSource="HTTP;HTTP;SOAP;SOAP;XML;XML" _valueOfList="SMPT" _nameOfList="SMPT" validationRule="(!strcmp($this-&gt;NotificationProvider-&gt;getvalue(),&quot;ecall&quot;) &amp;&amp; !strcmp($this-&gt;NotificationProtocol-&gt;getvalue(),&quot;HTTP&quot;)) || !strcmp($this-&gt;NotificationProvider-&gt;getvalue(),&quot;Clickatell&quot;)" validationText="The selected Protocol is unavailable for this Provider.">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="33"/>
							</Actions>
						</Event>
					</Events>
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
			<TableParameters>
				<TableParameter id="22" conditionType="Expression" useIsNull="False" field="NotificationSMSServiceID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" expression="NotificationSMSServiceID=1" parameterSource="NotificationSMSServiceID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="26" tableName="notificationsmsservice" posLeft="10" posTop="10" posWidth="160" posHeight="104"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
<CustomParameter id="35" field="NotificationProvider" dataType="Text" parameterType="Control" parameterSource="NotificationProvider" omitIfEmpty="True"/>
<CustomParameter id="36" field="NotificationProtocol" dataType="Text" parameterType="Control" parameterSource="NotificationProtocol" omitIfEmpty="True"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="27" conditionType="Expression" useIsNull="False" field="NotificationSMSServiceID" dataType="Integer" parameterType="URL" parameterSource="NotificationSMSServiceID" searchConditionType="Equal" logicOperator="And" orderNumber="1" expression="NotificationSMSServiceID=1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="30" field="NotificationProvider" dataType="Text" parameterType="Control" parameterSource="NotificationProvider" omitIfEmpty="True"/>
				<CustomParameter id="31" field="NotificationProtocol" dataType="Text" parameterType="Control" parameterSource="NotificationProtocol" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups>
				<Group id="32" groupID="1" read="True" update="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="notifications_smsconfiguration_maint.php" forShow="True" url="notifications_smsconfiguration_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="notifications_smsconfiguration_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="9" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
