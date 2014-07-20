<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="12" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="2" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="medicationhospitalisation" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:test} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="medicationhospitalisation" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" returnPage="hospitalisation_maint.ccp" dataSource="medicationhospitalisation" activeCollection="UFormElements" customInsert="medicationhospitalisation" customInsertType="Table" customUpdate="medicationhospitalisation" customUpdateType="Table" customDelete="medicationhospitalisation" customDeleteType="Table" removeParameters="MedicationHospitalisationID" activeTableType="medicationhospitalisation">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="medicationhospitalisationButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="True" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="medicationhospitalisationButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="medicationhospitalisationButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="6" message="{res:CCS_DeleteConfirmation}"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="medicationhospitalisationButton_Cancel" returnPage="hospitalisation_maint.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="HospitalisationID" fieldSource="HospitalisationID" required="True" caption="{res:HospitalisationID}" wizardCaption="{res:HospitalisationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="medicationhospitalisationHospitalisationID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DateMedication" fieldSource="DateMedication" required="True" caption="{res:Date}" wizardCaption="{res:DateMedication}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="medicationhospitalisationDateMedication" format="ShortDate" defaultValue="CurrentDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="34" name="DatePicker_DateMedication" control="DateMedication" wizardSatellite="True" wizardControl="DateMedication" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="medicationhospitalisationDatePicker_DateMedication">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Dosage" fieldSource="Dosage" required="True" caption="{res:Dosage}" wizardCaption="{res:Dosage}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="medicationhospitalisationDosage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="113" fieldSourceType="DBColumn" dataType="Date" html="False" name="lastmodified" PathID="medicationhospitalisationlastmodified" fieldSource="created" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="114" fieldSourceType="DBColumn" dataType="Text" html="False" name="user" PathID="medicationhospitalisationuser" fieldSource="by_user" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CurrentUser" PathID="medicationhospitalisationCurrentUser" fieldSource="by_user" html="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="116"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="120" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextArea1" PathID="medicationhospitalisationTextArea1" fieldSource="MedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="79" conditionType="Parameter" useIsNull="False" field="MedicationHospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="MedicationHospitalisationID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="78" tableName="medicationhospitalisation" posLeft="132" posTop="10" posWidth="272" posHeight="136"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="59" field="DateMedication" dataType="Date" parameterType="Control" omitIfEmpty="True" parameterSource="DateMedication" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate"/>
				<CustomParameter id="60" field="Dosage" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="Dosage"/>
				<CustomParameter id="82" field="HospitalisationID" dataType="Integer" parameterType="Control" parameterSource="HospitalisationID" omitIfEmpty="True"/>
				<CustomParameter id="118" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="121" field="MedicationName" dataType="Memo" parameterType="Control" omitIfEmpty="True" parameterSource="TextArea1"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="83" conditionType="Parameter" useIsNull="False" field="MedicationHospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="MedicationHospitalisationID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="63" field="DateMedication" dataType="Date" parameterType="Control" parameterSource="DateMedication" format="ShortDate" omitIfEmpty="True" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<CustomParameter id="65" field="Dosage" dataType="Text" parameterType="Control" parameterSource="Dosage" omitIfEmpty="True"/>
				<CustomParameter id="81" field="HospitalisationID" dataType="Integer" parameterType="Control" parameterSource="HospitalisationID" omitIfEmpty="True"/>
				<CustomParameter id="119" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="122" field="MedicationName" dataType="Memo" parameterType="Control" omitIfEmpty="True" parameterSource="TextArea1"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="84" conditionType="Parameter" useIsNull="False" field="MedicationHospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="MedicationHospitalisationID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="103" groupID="1" read="True"/>
				<Group id="104" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="105" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="45" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header" activeCollection="TableParameters">
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
				<Link id="111" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_headerPatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="74" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="9" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="85" tableName="patient" posLeft="21" posTop="10" posWidth="138" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="86" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
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
				<Group id="100" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="89" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header1" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header1" activeCollection="TableParameters">
			<Components>
				<Label id="90" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_header1PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="112" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_header1PatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_district.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="94" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="95" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="96" tableName="patient" posLeft="21" posTop="10" posWidth="138" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="97" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="98" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="99" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="101" groupID="1" read="True"/>
				<Group id="102" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="hospitalisationmedication_maint.php" forShow="True" url="hospitalisationmedication_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="hospitalisationmedication_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="106" groupID="1"/>
		<Group id="107" groupID="3"/>
		<Group id="108" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnLoad" type="Client">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="110"/>
			</Actions>
		</Event>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="117"/>
			</Actions>
		</Event>
	</Events>
</Page>
