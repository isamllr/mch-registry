<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="12" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="2" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="recommendedmedicationhospitalisation" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:test} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="recommendedmedicationhospitalisation" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" returnPage="hospitalisation_maint.ccp" dataSource="recommendedmedicationhospitalisation" activeCollection="UFormElements" customInsert="recommendedmedicationhospitalisation" customInsertType="Table" customUpdate="recommendedmedicationhospitalisation" customUpdateType="Table" customDelete="recommendedmedicationhospitalisation" customDeleteType="Table" removeParameters="RecommendedMedicationHospitalisationID" activeTableType="recommendedmedicationhospitalisation">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="recommendedmedicationhospitalisationButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="True" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="recommendedmedicationhospitalisationButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="recommendedmedicationhospitalisationButton_Delete">
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
				<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="recommendedmedicationhospitalisationButton_Cancel" returnPage="hospitalisation_maint.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="HospitalisationID" fieldSource="HospitalisationID" required="True" caption="{res:HospitalisationID}" wizardCaption="{res:HospitalisationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="recommendedmedicationhospitalisationHospitalisationID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DateMedication" fieldSource="DateMedication" required="True" caption="{res:Date}" wizardCaption="{res:DateMedication}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="recommendedmedicationhospitalisationDateMedication" format="ShortDate" defaultValue="CurrentDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="34" name="DatePicker_DateMedication" control="DateMedication" wizardSatellite="True" wizardControl="DateMedication" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="recommendedmedicationhospitalisationDatePicker_DateMedication">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Dosage" fieldSource="Dosage" required="True" caption="{res:Dosage}" wizardCaption="{res:Dosage}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="recommendedmedicationhospitalisationDosage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="116" fieldSourceType="DBColumn" dataType="Date" html="False" name="lastmodified" PathID="recommendedmedicationhospitalisationlastmodified" fieldSource="created" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="118" fieldSourceType="DBColumn" dataType="Text" html="False" name="user" PathID="recommendedmedicationhospitalisationuser" fieldSource="by_user" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CurrentUser" PathID="recommendedmedicationhospitalisationCurrentUser" fieldSource="by_user" html="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="120"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextArea1" PathID="recommendedmedicationhospitalisationTextArea1" fieldSource="MedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
</Components>
			<Events>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="113"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="79" conditionType="Parameter" useIsNull="False" field="RecommendedMedicationHospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="RecommendedMedicationHospitalisationID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="87" tableName="recommendedmedicationhospitalisation" posLeft="10" posTop="10" posWidth="160" posHeight="136"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="58" field="MedicationName" dataType="Memo" parameterType="Control" omitIfEmpty="True" parameterSource="TextArea1"/>
				<CustomParameter id="59" field="DateMedication" dataType="Date" parameterType="Control" omitIfEmpty="True" parameterSource="DateMedication" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate"/>
				<CustomParameter id="60" field="Dosage" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="Dosage"/>
				<CustomParameter id="82" field="HospitalisationID" dataType="Integer" parameterType="Control" parameterSource="HospitalisationID" omitIfEmpty="True"/>
				<CustomParameter id="121" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="88" conditionType="Parameter" useIsNull="False" field="RecommendedMedicationHospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="RecommendedMedicationHospitalisationID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="63" field="DateMedication" dataType="Date" parameterType="Control" parameterSource="DateMedication" format="ShortDate" omitIfEmpty="True" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<CustomParameter id="64" field="MedicationName" dataType="Memo" parameterType="Control" parameterSource="TextArea1" omitIfEmpty="True"/>
				<CustomParameter id="65" field="Dosage" dataType="Text" parameterType="Control" parameterSource="Dosage" omitIfEmpty="True"/>
				<CustomParameter id="81" field="HospitalisationID" dataType="Integer" parameterType="Control" parameterSource="HospitalisationID" omitIfEmpty="True"/>
				<CustomParameter id="122" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="89" conditionType="Parameter" useIsNull="False" field="RecommendedMedicationHospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="RecommendedMedicationHospitalisationID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="106" groupID="1" read="True"/>
				<Group id="107" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="108" groupID="2" read="True"/>
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
				<Link id="114" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_headerPatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
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
				<Group id="105" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="92" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header1" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header1" activeCollection="TableParameters" pasteActions="pasteActions">
			<Components>
				<Label id="93" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_header1PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="115" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_header1PatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_district.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="97" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="98" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="99" tableName="patient" posLeft="21" posTop="10" posWidth="138" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="100" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="101" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="102" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="103" groupID="1" read="True"/>
				<Group id="104" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="hospitalisationrecommedication_maint.php" forShow="True" url="hospitalisationrecommedication_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="hospitalisationrecommedication_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="109" groupID="1"/>
		<Group id="110" groupID="3"/>
		<Group id="111" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
