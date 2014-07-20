<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" pasteActions="pasteActions">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="test" dataSource="test" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:test} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="test" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" returnPage="visit_maint.ccp" activeCollection="IFormElements" activeTableType="test" removeParameters="TestID">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="testButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="True" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="testButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="testButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="6" message="{res:CCS_DeleteConfirmation}" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="testButton_Cancel" returnPage="visit_maint.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TestResult" fieldSource="TestResultDetails" required="False" caption="{res:TestResultDetails}" wizardCaption="{res:TestResult}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="testTestResult">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TestDate" fieldSource="TestDate" required="True" caption="{res:TestDate}" wizardCaption="{res:TestDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="testTestDate" format="ShortDate" defaultValue="CurrentDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="12" name="DatePicker_TestDate" control="TestDate" wizardSatellite="True" wizardControl="TestDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="testDatePicker_TestDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="VisitID" fieldSource="VisitID" required="True" caption="{res:VisitID}" wizardCaption="{res:VisitID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="testVisitID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<ListBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="TestCodeID" fieldSource="TestCodeID" required="True" caption="{res:TestCodeID}" wizardCaption="{res:TestCodeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="testTestCodeID" sourceType="Table" connection="registry_db" dataSource="testcode" boundColumn="TestCodeID" textColumn="TestName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="44" tableName="testcode" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<RadioButton id="53" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="TestResultNormal" PathID="testTestResultNormal" caption="{res:TestResultNormal}" fieldSource="TestResultNormal" connection="registry_db" dataSource="1;{res:RYes} ;0;{res:RNo}" required="True">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="54"/>
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
				</RadioButton>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="TestID" parameterSource="TestID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="29" tableName="test" posLeft="10" posTop="10" posWidth="335" posHeight="136"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="30" field="TestCodeID" dataType="Integer" parameterType="Control" parameterSource="TestCodeID"/>
				<CustomParameter id="31" field="TestResult" dataType="Text" parameterType="Control" parameterSource="TestResult"/>
				<CustomParameter id="32" field="TestDate" dataType="Date" parameterType="Control" parameterSource="TestDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<CustomParameter id="33" field="VisitID" dataType="Integer" parameterType="Control" parameterSource="VisitID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="TestID" dataType="Integer" parameterType="URL" parameterSource="TestID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="38" field="TestCodeID" dataType="Integer" parameterType="Control" parameterSource="TestCodeID"/>
				<CustomParameter id="39" field="TestResult" dataType="Text" parameterType="Control" parameterSource="TestResult"/>
				<CustomParameter id="40" field="TestDate" dataType="Date" parameterType="Control" parameterSource="TestDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<CustomParameter id="41" field="VisitID" dataType="Integer" parameterType="Control" parameterSource="VisitID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="42" conditionType="Parameter" useIsNull="False" field="TestID" dataType="Integer" parameterType="URL" parameterSource="TestID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups>
				<Group id="74" groupID="1" read="True"/>
				<Group id="75" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="76" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<IncludePage id="15" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="45" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header" dataSource="pregnancy, patient, visit" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header" activeCollection="TableParameters" pasteActions="pasteActions">
			<Components>
				<Label id="46" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_headerPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" PathID="pregnancy_headerFirstName" fieldSource="GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="48" fieldSourceType="DBColumn" dataType="Text" html="False" name="FamiliyName" PathID="pregnancy_headerFamiliyName" fieldSource="FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="49" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDate" PathID="pregnancy_headerBirthDate" fieldSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="77" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_headerPatientID" fieldSource="patient.PatientID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="82" fieldSourceType="CodeExpression" dataType="Text" html="False" name="visit" PathID="pregnancy_headervisit" fieldSource="{res:Visit}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="84" fieldSourceType="DBColumn" dataType="Date" html="False" name="VisitDate" PathID="pregnancy_headerVisitDate" fieldSource="VisitDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="87" conditionType="Parameter" useIsNull="False" field="visit.VisitID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="VisitID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="9" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="51" tableName="patient" posLeft="108" posTop="16" posWidth="129" posHeight="180"/>
				<JoinTable id="85" tableName="visit" posLeft="449" posTop="10" posWidth="132" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="52" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="86" tableLeft="visit" tableRight="pregnancy" fieldLeft="visit.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="19" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="20" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="71" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="57" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header1" dataSource="pregnancy, patient, visit" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header1" activeCollection="TableParameters">
			<Components>
				<Label id="58" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_header1PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="78" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_header1PatientID" fieldSource="patient.PatientID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="79" fieldSourceType="CodeExpression" dataType="Text" html="False" name="visit" PathID="pregnancy_header1visit" fieldSource="{res:Visit}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="81" fieldSourceType="DBColumn" dataType="Date" html="False" name="VisitDate" PathID="pregnancy_header1VisitDate" fieldSource="VisitDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="90" conditionType="Parameter" useIsNull="False" field="visit.VisitID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="VisitID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="63" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="64" tableName="patient" posLeft="108" posTop="16" posWidth="129" posHeight="180"/>
				<JoinTable id="88" tableName="visit" posLeft="449" posTop="10" posWidth="132" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="65" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="89" tableLeft="visit" tableRight="pregnancy" fieldLeft="visit.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="66" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="67" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="72" groupID="1" read="True"/>
				<Group id="73" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="Test_maint.php" forShow="True" url="Test_maint.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="68" groupID="1"/>
		<Group id="69" groupID="3"/>
		<Group id="70" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
