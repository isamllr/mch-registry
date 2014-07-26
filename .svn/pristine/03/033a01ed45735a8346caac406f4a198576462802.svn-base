<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<Record id="122" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="patientSearch" wizardCaption="{res:CCS_SearchFormPrefix} {res:districts_patient} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="patient_list.ccp" PathID="patientSearch" pasteActions="pasteActions">
			<Components>
				<Button id="123" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="patientSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="124" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_GivenName" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" PathID="patientSearchs_GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_FamilyName" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" PathID="patientSearchs_FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_BirthDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="patientSearchs_BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="127" name="DatePicker_s_BirthDate" control="s_BirthDate" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="patientSearchDatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Town" wizardCaption="{res:Town}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="patientSearchs_Town">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="154" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_PregnancyRecNr" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" PathID="patientSearchs_PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="266" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_PatientID" PathID="patientSearchs_PatientID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
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
				<Group id="173" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<IncludePage id="109" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="165" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="patientSearch1" wizardCaption="{res:CCS_SearchFormPrefix} {res:districts_patient} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="patient_list.ccp" PathID="patientSearch1" pasteActions="pasteActions">
			<Components>
				<Button id="166" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="patientSearch1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="172" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="PregnancyRecNr" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" PathID="patientSearch1PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="224" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="FacilityID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patientSearch1FacilityID" connection="registry_db" dataSource="facilities" textColumn="FacilityName" boundColumn="FacilityID">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="225" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="226" tableName="facilities" fieldName="FacilityName"/>
						<Field id="227" tableName="facilities" fieldName="FacilityID"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="267" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="PatientID" PathID="patientSearch1PatientID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="222" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="223" tableName="facilities" fieldName="FacilityName"/>
			</Fields>
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
				<Group id="174" groupID="1" read="True"/>
				<Group id="175" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="177" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="patient, pregnancy, facilities" name="patients1" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:districtspatient} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteActions="pasteActions" activeCollection="TableParameters" wizardAllowSorting="True" orderBy="patient.PatientID desc" groupBy="patient.PatientID">
			<Components>
				<Label id="184" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" fieldSource="patient_PatientID" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="patients1PatientID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="189" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="False" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="190" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="None" name="ImageLink1" PathID="patients1ImageLink1" hrefSource="patient_maint_district.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="191" sourceType="DataField" name="PatientID" source="patient_PatientID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Sorter id="192" visible="True" name="PatientID1" wizardSortingType="SimpleDir" PathID="patients1PatientID1" wizardCaption="{res:GivenName}" column="patient.PatientID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
			</Components>
			<Events>
<Event name="BeforeExecuteSelect" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="294"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="198" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyRecNr" dataType="Text" searchConditionType="Equal" parameterType="URL" parameterSource="PregnancyRecNr" logicOperator="And" expression="pregnancy.PregnancyRecNr LIKE '{PregnancyRecNr}'"/><TableParameter id="219" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="Equal" parameterType="URL" parameterSource="FacilityID" logicOperator="And"/>
				<TableParameter id="269" conditionType="Parameter" useIsNull="False" field="patient.PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" parameterSource="PatientID" logicOperator="And" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="199" tableName="patient" posLeft="10" posTop="10" posWidth="212" posHeight="592"/>
				<JoinTable id="201" tableName="pregnancy" posWidth="159" posHeight="317" posLeft="276" posTop="10"/>
				<JoinTable id="215" tableName="facilities" posWidth="95" posHeight="104" posLeft="507" posTop="269"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="273" tableLeft="pregnancy" tableRight="facilities" fieldLeft="pregnancy.FacilityID" fieldRight="facilities.FacilityID" joinType="left" conditionType="Equal"/>
				<JoinTable2 id="274" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="right" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="221" tableName="patient" fieldName="patient.PatientID" alias="patient_PatientID"/>
				<Field id="214" tableName="pregnancy" fieldName="PregnancyRecNr"/>
				<Field id="218" tableName="facilities" fieldName="FacilityName"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
				<Group id="212" groupID="1" read="True"/>
				<Group id="213" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="110" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="patient, pregnancy, visit, referral, districts, hospitalisation, referralhosp" name="patients" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:districtspatient} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteActions="pasteActions" activeCollection="TableParameters" orderBy="patient.Patient_RegDate desc" wizardAllowSorting="True" groupBy="patient.PatientID">
			<Components>
				<Sorter id="135" visible="True" name="Sorter_BirthDate" column="BirthDate" wizardCaption="{res:BirthDate}" wizardSortingType="SimpleDir" wizardControl="BirthDate" wizardAddNbsp="False" PathID="patientsSorter_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="136" visible="True" name="Sorter_Town" column="Town" wizardCaption="{res:Town}" wizardSortingType="SimpleDir" wizardControl="Town" wizardAddNbsp="False" PathID="patientsSorter_Town">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="137" visible="True" name="Sorter_DistrictName" column="DistrictName" wizardCaption="{res:DistrictName}" wizardSortingType="SimpleDir" wizardControl="DistrictName" wizardAddNbsp="False" PathID="patientsSorter_DistrictName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="138" visible="True" name="Sorter_Patient_RegDate" column="Patient_RegDate" wizardCaption="{res:Patient_RegDate}" wizardSortingType="SimpleDir" wizardControl="Patient_RegDate" wizardAddNbsp="False" PathID="patientsSorter_Patient_RegDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="139" fieldSourceType="DBColumn" dataType="Memo" html="False" name="FamilyName" fieldSource="FamilyName" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="patientsFamilyName" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="161" sourceType="DataField" name="PatientID" source="patient_PatientID"/>
					</LinkParameters>
				</Link>
				<Label id="140" fieldSourceType="DBColumn" dataType="Memo" html="False" name="GivenName" fieldSource="GivenName" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="patientsGivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="141" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDate" fieldSource="BirthDate" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="patientsBirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="142" fieldSourceType="DBColumn" dataType="Text" html="False" name="Town" fieldSource="Town" wizardCaption="{res:Town}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="patientsTown">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="143" fieldSourceType="DBColumn" dataType="Text" html="False" name="DistrictName" fieldSource="DistrictName" wizardCaption="{res:DistrictName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="patientsDistrictName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="144" fieldSourceType="DBColumn" dataType="Date" html="False" name="Patient_RegDate" fieldSource="Patient_RegDate" wizardCaption="{res:Patient_RegDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="patientsPatient_RegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="145" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="False" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="146" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="None" name="ImageLink1" PathID="patientsImageLink1" hrefSource="patient_maint_fac.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="143" sourceType="DataField" name="PatientID" source="patient_PatientID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Sorter id="159" visible="True" name="GivenName1" wizardSortingType="SimpleDir" PathID="patientsGivenName1" wizardCaption="{res:GivenName}" column="GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="160" visible="True" name="FamilyName1" wizardSortingType="SimpleDir" PathID="patientsFamilyName1" wizardCaption="{res:FamilyName}" column="FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="270" visible="True" name="PatientID1" wizardSortingType="SimpleDir" PathID="patientsPatientID1" wizardCaption="{res:FamilyName}" column="patient.PatientID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="271" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" fieldSource="patient_PatientID" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="patientsPatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="272" sourceType="DataField" name="PatientID" source="patient_PatientID"/>
					</LinkParameters>
				</Link>
			</Components>
			<Events>
<Event name="BeforeExecuteSelect" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="293"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="234" conditionType="Parameter" useIsNull="False" field="pregnancy.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="Or" leftBrackets="1" rightBrackets="0" format="0;(0)" defaultValue="0" parameterSource="s_Facilities"/>
				<TableParameter id="292" conditionType="Parameter" useIsNull="False" field="referralhosp.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="Or" defaultValue="0" format="0;(0)" parameterSource="s_Facilities"/>
				<TableParameter id="239" conditionType="Parameter" useIsNull="False" field="patient.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="Or" leftBrackets="0" rightBrackets="0" format="0;(0)" defaultValue="0" parameterSource="s_Facilities"/>
				<TableParameter id="243" conditionType="Parameter" useIsNull="False" field="referral.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" rightBrackets="1" leftBrackets="0" format="0;(0)" defaultValue="0" parameterSource="s_Facilities"/>
				<TableParameter id="156" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyRecNr" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" leftBrackets="0" rightBrackets="0" expression="pregnancy.PregnancyRecNr LIKE '{PregnancyRecNr}'" parameterSource="s_PregnancyRecNr"/>
				<TableParameter id="147" conditionType="Parameter" useIsNull="False" field="patient.Town" dataType="Text" searchConditionType="Contains" parameterType="URL" parameterSource="s_Town" logicOperator="And" orderNumber="4" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="146" conditionType="Parameter" useIsNull="False" field="patient.BirthDate" dataType="Date" searchConditionType="Equal" parameterType="URL" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" logicOperator="And" orderNumber="3" leftBrackets="0" rightBrackets="0" parameterSource="s_BirthDate"/>
				<TableParameter id="145" conditionType="Parameter" useIsNull="False" field="patient.FamilyName" dataType="Memo" searchConditionType="Contains" parameterType="URL" logicOperator="And" orderNumber="2" leftBrackets="0" rightBrackets="0" parameterSource="s_FamilyName"/>
				<TableParameter id="144" conditionType="Parameter" useIsNull="False" field="patient.GivenName" dataType="Memo" searchConditionType="Contains" parameterType="URL" logicOperator="And" orderNumber="1" leftBrackets="0" rightBrackets="0" parameterSource="s_GivenName"/>
				<TableParameter id="268" conditionType="Parameter" useIsNull="False" field="patient.PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_PatientID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="111" tableName="patient" posLeft="10" posTop="10" posWidth="161" posHeight="649"/>
				<JoinTable id="151" tableName="pregnancy" posLeft="242" posTop="38" posWidth="159" posHeight="317"/>
				<JoinTable id="235" tableName="visit" posLeft="579" posTop="5" posWidth="218" posHeight="227"/>
				<JoinTable id="240" tableName="referral" posLeft="857" posTop="226" posWidth="95" posHeight="136"/>
				<JoinTable id="249" tableName="districts" posLeft="364" posTop="469" posWidth="95" posHeight="104"/>
				<JoinTable id="275" tableName="hospitalisation" posLeft="513" posTop="387" posWidth="160" posHeight="180"/>
				<JoinTable id="281" tableName="referralhosp" posLeft="713" posTop="557" posWidth="218" posHeight="136"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="285" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="286" tableLeft="visit" tableRight="pregnancy" fieldLeft="visit.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="287" tableLeft="referral" tableRight="visit" fieldLeft="referral.VisitID" fieldRight="visit.VisitID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="288" tableLeft="patient" tableRight="districts" fieldLeft="patient.DistrictID" fieldRight="districts.DistrictID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="289" tableLeft="hospitalisation" tableRight="pregnancy" fieldLeft="hospitalisation.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="290" tableLeft="referralhosp" tableRight="hospitalisation" fieldLeft="referralhosp.HospitalisationID" fieldRight="hospitalisation.HospitalisationID" joinType="right" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="116" tableName="patient" fieldName="Patient_RegDate"/>
				<Field id="117" tableName="patient" fieldName="GivenName"/>
				<Field id="118" tableName="patient" fieldName="FamilyName"/>
				<Field id="119" tableName="patient" fieldName="BirthDate"/>
				<Field id="120" tableName="patient" fieldName="Town"/>
				<Field id="148" tableName="patient" fieldName="patient.PatientID" alias="patient_PatientID"/>
				<Field id="251" tableName="districts" fieldName="DistrictName"/>
				<Field id="258" tableName="referral" fieldName="referral.FacilityID" alias="referral_FacilityID"/>
				<Field id="259" tableName="pregnancy" fieldName="pregnancy.FacilityID" alias="pregnancy_FacilityID"/>
				<Field id="265" tableName="patient" fieldName="patient.FacilityID" alias="patient_FacilityID"/>
				<Field id="291" tableName="referralhosp" fieldName="referralhosp.FacilityID" alias="referralhosp_FacilityID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
				<Group id="176" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="patient_list.php" forShow="True" url="patient_list.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="patient_list_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="162" groupID="1"/>
		<Group id="163" groupID="3"/>
		<Group id="164" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="150"/>
			</Actions>
		</Event>
	</Events>
</Page>
