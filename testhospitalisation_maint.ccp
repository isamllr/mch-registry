<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" pasteActions="pasteActions">
	<Components>
		<IncludePage id="15" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="45" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header" activeCollection="TableParameters" pasteActions="pasteActions">
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
				<Link id="87" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_headerPatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="9" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="51" tableName="patient" posLeft="108" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="52" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
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
				<Group id="83" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="53" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="testhospitalisation" dataSource="testhospitalisation" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:testhospitalisation} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="testhospitalisation" returnPage="hospitalisation_maint.ccp" removeParameters="TestHospitalisationID">
			<Components>
				<Button id="54" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="testhospitalisationButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="55" urlType="Relative" enableValidation="True" isDefault="True" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="testhospitalisationButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="56" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="testhospitalisationButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="57" message="{res:CCS_DeleteConfirmation}"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="testhospitalisationButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TestDate" fieldSource="TestDate" required="True" caption="{res:TestDate}" wizardCaption="{res:TestDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="testhospitalisationTestDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="61" name="DatePicker_TestDate" control="TestDate" wizardSatellite="True" wizardControl="TestDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="testhospitalisationDatePicker_TestDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="62" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="TestCodeID" fieldSource="TestCodeID" required="True" caption="{res:test}" wizardCaption="{res:TestCodeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="testhospitalisationTestCodeID" connection="registry_db" dataSource="testcode" boundColumn="TestCodeID" textColumn="TestName">
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
				<RadioButton id="63" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="TestResultNormal" fieldSource="TestResultNormal" required="True" caption="{res:TestResultNormal}" wizardCaption="{res:TestResultNormal}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="testhospitalisationTestResultNormal" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}">
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
				</RadioButton>
				<TextBox id="64" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TestResultDetails" fieldSource="TestResultDetails" required="False" caption="{res:TestResult}" wizardCaption="{res:TestResult}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="testhospitalisationTestResultDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="65" fieldSourceType="DBColumn" dataType="Text" name="HospitalisationID" PathID="testhospitalisationHospitalisationID" caption="{res:HospitalisationID}" fieldSource="HospitalisationID" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="59" conditionType="Parameter" useIsNull="False" field="TestHospitalisationID" parameterSource="TestHospitalisationID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="66" tableName="testhospitalisation" posLeft="10" posTop="10" posWidth="160" posHeight="152"/>
			</JoinTables>
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
			<SecurityGroups>
				<Group id="84" groupID="1" read="True"/>
				<Group id="85" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="86" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="70" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header1" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header1" activeCollection="TableParameters">
			<Components>
				<Label id="71" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_header1PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="88" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_header1PatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_district.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="75" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="76" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="77" tableName="patient" posLeft="108" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="78" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="79" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="80" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="81" groupID="1" read="True"/>
				<Group id="82" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="testhospitalisation_maint.php" forShow="True" url="testhospitalisation_maint.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="67" groupID="1"/>
		<Group id="68" groupID="3"/>
		<Group id="69" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
