<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="54" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header" dataSource="pregnancy, patient, hospitalisation" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header" activeCollection="TableParameters">
			<Components>
				<Label id="4" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_headerPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="5" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" PathID="pregnancy_headerFirstName" fieldSource="GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="6" fieldSourceType="DBColumn" dataType="Text" html="False" name="FamiliyName" PathID="pregnancy_headerFamiliyName" fieldSource="FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="7" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDate" PathID="pregnancy_headerBirthDate" fieldSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="523" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_headerPatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
				<Label id="538" fieldSourceType="CodeExpression" dataType="Text" html="False" name="hospitalisation" PathID="pregnancy_headerhospitalisation" fieldSource="{res:HHospitalisation}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="539" fieldSourceType="DBColumn" dataType="Date" html="False" name="AdmissionDate" PathID="pregnancy_headerAdmissionDate" fieldSource="AdmissionDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="552" conditionType="Parameter" useIsNull="False" field="hospitalisation.HospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="HospitalisationID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="9" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="10" tableName="patient" posLeft="91" posTop="16" posWidth="129" posHeight="180"/>
				<JoinTable id="550" tableName="hospitalisation" posLeft="449" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="308" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="551" tableLeft="hospitalisation" tableRight="pregnancy" fieldLeft="hospitalisation.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
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
				<Group id="506" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="495" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header1" dataSource="pregnancy, patient, hospitalisation" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header1" activeCollection="TableParameters">
			<Components>
				<Label id="496" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_header1PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="524" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_header1PatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_district.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
				<Label id="546" fieldSourceType="CodeExpression" dataType="Text" html="False" name="hospitalisation" PathID="pregnancy_header1hospitalisation" fieldSource="{res:HHospitalisation}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="547" fieldSourceType="DBColumn" dataType="Date" html="False" name="AdmissionDate" PathID="pregnancy_header1AdmissionDate" fieldSource="AdmissionDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="555" conditionType="Parameter" useIsNull="False" field="hospitalisation.HospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="HospitalisationID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="501" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="502" tableName="patient" posLeft="91" posTop="16" posWidth="129" posHeight="180"/>
				<JoinTable id="553" tableName="hospitalisation" posLeft="449" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="503" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="554" tableLeft="hospitalisation" tableRight="pregnancy" fieldLeft="hospitalisation.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="504" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="505" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="507" groupID="1" read="True"/>
				<Group id="508" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<EditableGrid id="343" urlType="Relative" secured="True" emptyRows="1" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="100" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="tests" connection="registry_db" dataSource="testcode, testhospitalisation" returnPage="hospitalisation_maint.ccp" pageSizeLimit="100" deleteControl="CheckBox_Delete" customInsertType="Table" customInsert="testhospitalisation" customUpdateType="Table" customUpdate="testhospitalisation" customDeleteType="Table" customDelete="testhospitalisation" PathID="tests" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="UConditions" activeTableType="customUpdate">
			<Components>
				<Sorter id="354" visible="True" name="Sorter_TestDate" column="TestDate" PathID="testsSorter_TestDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="355" visible="True" name="Sorter_TestName" column="TestName" PathID="testsSorter_TestName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="356" visible="True" name="Sorter_TestResultNormal" column="TestResultNormal" PathID="testsSorter_TestResultNormal">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="357" visible="True" name="Sorter_TestResultDetails" column="TestResultDetails" PathID="testsSorter_TestResultDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<TextBox id="358" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TestDate" caption="{res:TestDate}" fieldSource="TestDate" format="ShortDate" required="True" DBFormat="yyyy-mm-dd HH:nn:ss" PathID="testsTestDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="359" name="DatePicker_TestDate" style="Styles/{CCS_Style}/Style.css" control="TestDate" PathID="testsDatePicker_TestDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="360" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="TestName" caption="{res:TestName}" fieldSource="test.TestCodeID" connection="registry_db" dataSource="testcode" boundColumn="TestCodeID" textColumn="TestName" required="True" PathID="testsTestName">
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
				<TextBox id="362" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TestResultDetails" caption="{res:TestResultDetails}" fieldSource="TestResultDetails" required="False" PathID="testsTestResultDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<RadioButton id="481" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="TestResultNormal" fieldSource="TestResultNormal" connection="registry_db" dataSource="1;{res:RYes} ;0;{res:RNo}" required="False" PathID="testsTestResultNormal" caption="{res:TestResultNormal}">
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
				<Button id="537" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" PathID="testsButton_Update" operation="Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="38" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="testsButton_Cancel">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="563" conditionType="Parameter" useIsNull="False" field="testhospitalisation.HospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="HospitalisationID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="409" variable="VisitID" dataType="Integer" parameterType="URL" parameterSource="VisitID" defaultValue="-1"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="560" tableName="testcode" posLeft="168" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="561" tableName="testhospitalisation" posLeft="284" posTop="10" posWidth="160" posHeight="152"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="562" tableLeft="testhospitalisation" tableRight="testcode" fieldLeft="testhospitalisation.TestCodeID" fieldRight="testcode.TestCodeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields/>
			<PKFields>
				<PKField id="367" tableName="testcode" fieldName="TestCodeID" dataType="Integer"/>
				<PKField id="413" tableName="test" fieldName="TestID" dataType="Integer"/>
				<PKField id="564" tableName="testhospitalisation" fieldName="TestHospitalisationID" dataType="Integer"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="369" field="TestDate" dataType="Date" parameterType="Control" parameterSource="TestDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<CustomParameter id="370" field="test.TestCodeID" dataType="Text" parameterType="Control" parameterSource="TestName"/>
				<CustomParameter id="371" field="TestResultNormal" dataType="Integer" parameterType="Control" parameterSource="TestResultNormal"/>
				<CustomParameter id="372" field="TestResultDetails" dataType="Text" parameterType="Control" parameterSource="TestResultDetails"/>
				<CustomParameter id="556" field="HospitalisationID" dataType="Integer" parameterType="URL" omitIfEmpty="True" parameterSource="HospitalisationID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="566" conditionType="Parameter" useIsNull="False" field="TestHospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="DataSourceColumn" logicOperator="And" parameterSource="TestHospitalisationID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="376" field="TestDate" dataType="Date" parameterType="Control" parameterSource="TestDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="377" field="TestCodeID" dataType="Integer" parameterType="Control" parameterSource="TestName" omitIfEmpty="True"/>
				<CustomParameter id="378" field="TestResultNormal" dataType="Integer" parameterType="Control" parameterSource="TestResultNormal" omitIfEmpty="True"/>
				<CustomParameter id="379" field="TestResultDetails" dataType="Text" parameterType="Control" parameterSource="TestResultDetails" omitIfEmpty="False"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="558" conditionType="Parameter" useIsNull="False" field="TestHospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="TestHospitalisationID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="512" groupID="1" read="True"/>
				<Group id="513" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="514" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</EditableGrid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="testhosplist_maint.php" forShow="True" url="testhosplist_maint.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="509" groupID="1"/>
		<Group id="510" groupID="3"/>
		<Group id="511" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
	</Events>
</Page>
