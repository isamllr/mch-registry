<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="64" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="69" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="pregnancy, pregnancytype, employees, position, patient" name="pregnancy" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:pregnancypregnancytype} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" activeCollection="TableParameters" orderBy="pregnancy.PregRegDate desc" pasteActions="pasteActions">
			<Components>
				<Sorter id="78" visible="True" name="Sorter_PregnancyRecNr" column="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr" wizardAddNbsp="False" PathID="pregnancySorter_PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="79" visible="True" name="Sorter_PregRegDate" column="PregRegDate" wizardCaption="{res:PregRegDate}" wizardSortingType="SimpleDir" wizardControl="PregRegDate" wizardAddNbsp="False" PathID="pregnancySorter_PregRegDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="80" visible="True" name="Sorter_LastMensesDate" column="LastMensesDate" wizardCaption="{res:LastMensesDate}" wizardSortingType="SimpleDir" wizardControl="LastMensesDate" wizardAddNbsp="False" PathID="pregnancySorter_LastMensesDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="81" visible="True" name="Sorter_GestationAge" column="GestationAge" wizardCaption="{res:GestationAge}" wizardSortingType="SimpleDir" wizardControl="GestationAge" wizardAddNbsp="False" PathID="pregnancySorter_GestationAge">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="82" visible="True" name="Sorter_Calc_DeliveryDate" column="Calc_DeliveryDate" wizardCaption="{res:Calc_DeliveryDate}" wizardSortingType="SimpleDir" wizardControl="Calc_DeliveryDate" wizardAddNbsp="False" PathID="pregnancySorter_Calc_DeliveryDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="83" visible="True" name="Sorter_PregnancyTypeName" column="PregnancyTypeName" wizardCaption="{res:PregnancyTypeName}" wizardSortingType="SimpleDir" wizardControl="PregnancyTypeName" wizardAddNbsp="False" PathID="pregnancySorter_PregnancyTypeName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="85" fieldSourceType="DBColumn" dataType="Date" html="False" name="PregRegDate" fieldSource="PregRegDate" wizardCaption="{res:PregRegDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pregnancyPregRegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="86" fieldSourceType="DBColumn" dataType="Date" html="False" name="LastMensesDate" fieldSource="LastMensesDate" wizardCaption="{res:LastMensesDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pregnancyLastMensesDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="87" fieldSourceType="DBColumn" dataType="Integer" html="False" name="GestationAge" fieldSource="GestationAge" wizardCaption="{res:GestationAge}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pregnancyGestationAge">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="88" fieldSourceType="DBColumn" dataType="Date" html="False" name="Calc_DeliveryDate" fieldSource="Calc_DeliveryDate" wizardCaption="{res:Calc_DeliveryDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pregnancyCalc_DeliveryDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="89" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyType" fieldSource="PregnancyTypeName" wizardCaption="{res:PregnancyTypeName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pregnancyPregnancyType">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="90" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="pregnancyImageLink1" hrefSource="pregnancy_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="92" sourceType="DataField" name="PregnancyID" source="PregnancyID"/>
						<LinkParameter id="374" sourceType="DataField" name="PatientID" source="PatientID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Label id="84" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" PathID="pregnancyPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="305" fieldSourceType="DBColumn" dataType="Text" html="False" name="RespDoctor" fieldSource="DoctorFirstLastNamePosition" wizardCaption="{res:PregnancyTypeName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pregnancyRespDoctor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="311" visible="True" name="Sorter_Doctor" column="FirstName" wizardCaption="{res:PregnancyTypeName}" wizardSortingType="SimpleDir" wizardControl="PregnancyTypeName" wizardAddNbsp="False" PathID="pregnancySorter_Doctor" connection="registry_db">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="370" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="359" conditionType="Parameter" useIsNull="False" field="pregnancy.PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="PatientID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="70" tableName="pregnancy" posLeft="10" posTop="10" posWidth="141" posHeight="288"/>
				<JoinTable id="71" tableName="pregnancytype" posLeft="172" posTop="10" posWidth="139" posHeight="88"/>
				<JoinTable id="306" tableName="employees" posLeft="332" posTop="10" posWidth="115" posHeight="180"/>
				<JoinTable id="312" tableName="position" posLeft="468" posTop="10" posWidth="95" posHeight="88"/>
				<JoinTable id="356" tableName="patient" posLeft="327" posTop="231" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="307" tableLeft="pregnancy" fieldLeft="pregnancy.EmployeeID" tableRight="employees" fieldRight="employees.EmployeeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="72" tableLeft="pregnancy" fieldLeft="pregnancy.PregnancyTypeID" tableRight="pregnancytype" fieldRight="pregnancytype.PregnancyTypeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="313" tableLeft="employees" tableRight="position" fieldLeft="employees.PositionID" fieldRight="position.PositionID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="357" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="75" tableName="pregnancytype" fieldName="PregnancyTypeName"/>
				<Field id="77" tableName="pregnancy" fieldName="pregnancy.*"/>
				<Field id="308" tableName="employees" fieldName="employees.*"/>
				<Field id="314" tableName="position" fieldName="position.*"/>
				<Field id="315" fieldName="CONCAT(FirstName, &quot; &quot;, LastName, &quot; (&quot;,PositionName, &quot;)&quot; )" isExpression="True" alias="DoctorFirstLastNamePosition"/>
				<Field id="358" tableName="patient" fieldName="patient.*"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
<Group id="801" groupID="3" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="33" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="patient" dataSource="districts, province, patient, districts districtsActual, province provinceActual" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:patient} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="patient" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" returnPage="patient_list.ccp" removeParameters="PatientID" customInsert="patient" customInsertType="Table" customUpdate="patient" customDelete="patient" customDeleteType="Table" activeCollection="UFormElements" customUpdateType="Table" activeTableType="patient" parameterTypeListName="ParameterTypeList" orderBy="districts.DistrictName, province.ProvinceName">
			<Components>
				<Button id="34" urlType="Relative" enableValidation="True" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="patientButton_Insert" isDefault="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="35" urlType="Relative" enableValidation="True" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="patientButton_Update" isDefault="True">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="36" urlType="Relative" enableValidation="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="patientButton_Delete" isDefault="False">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="37" message="{res:CCS_DeleteConfirmation}" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="38" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="patientButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="GivenName" fieldSource="GivenName" required="True" caption="{res:GivenName}" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardRows="3" PathID="patientGivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="Patient_RegDate" fieldSource="Patient_RegDate" required="True" caption="{res:Patient_RegDate}" wizardCaption="{res:Patient_RegDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientPatient_RegDate" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="41" name="DatePicker_Patient_RegDate" control="Patient_RegDate" wizardSatellite="True" wizardControl="Patient_RegDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="patientDatePicker_Patient_RegDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StreetName" fieldSource="StreetName" required="False" caption="{res:StreetName}" wizardCaption="{res:StreetName}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientStreetName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StreetNr" fieldSource="StreetNr" required="False" caption="{res:StreetNr}" wizardCaption="{res:StreetNr}" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientStreetNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Town" fieldSource="Town" required="True" caption="{res:Town}" wizardCaption="{res:Town}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientTown">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="NrPregnancies" fieldSource="NrPregnancies" required="True" caption="{res:NrPregnancies}" wizardCaption="{res:NrPregnancies}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientNrPregnancies">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="NrDeliveries" fieldSource="NrDeliveries" required="True" caption="{res:NrDeliveries}" wizardCaption="{res:NrDeliveries}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientNrDeliveries">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="51" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="BloodGroupID" fieldSource="BloodGroupID" required="False" caption="{res:BloodGroupID}" wizardCaption="{res:BloodGroupID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patientBloodGroupID" connection="registry_db" dataSource="bloodgroup" boundColumn="BloodGroupID" textColumn="BloodGroupDescription" defaultValue="5">
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
				<RadioButton id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Rhesus" fieldSource="Rhesus" required="False" caption="{res:Rhesus}" wizardCaption="{res:Rhesus}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientRhesus" sourceType="ListOfValues" html="True" connection="registry_db" _valueOfList="1" _nameOfList="(+)" dataSource="0;(-);1;(+)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</RadioButton>
				<ListBox id="231" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="SelectedDiseases" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patientSelectedDiseases" connection="registry_db" boundColumn="ICD10ID" textColumn="DiseaseIDName" dataSource="icd10_all, obstetric_anamnesis" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="539" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="537" conditionType="Parameter" useIsNull="False" field="obstetric_anamnesis.PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="PatientID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="532" tableName="icd10_all" posLeft="43" posTop="10" posWidth="142" posHeight="120"/>
						<JoinTable id="533" tableName="obstetric_anamnesis" posLeft="206" posTop="10" posWidth="152" posHeight="104"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="536" tableLeft="obstetric_anamnesis" tableRight="icd10_all" fieldLeft="obstetric_anamnesis.ICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="250" fieldName="CONCAT(icd10_all.ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="535" tableName="obstetric_anamnesis" fieldName="obstetric_anamnesis.*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="235" urlType="Relative" enableValidation="False" isDefault="False" name="RightButton_allerg">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="236" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="237" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButton_allerg">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="238" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="228" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="ListofObstetricAnamnesis" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patientListofObstetricAnamnesis" connection="registry_db" dataSource="icd10_all" boundColumn="ICD10ID" textColumn="DiseaseIDName" orderBy="ICD10ID" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="229" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="246" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="RelevantAnamnesis = '1'"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="230" tableName="icd10_all" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="245" fieldName="CONCAT(ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="249" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="247" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_Allerg" PathID="patientLinkedID_Allerg">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="114" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_BadHabbits" PathID="patientLinkedID_BadHabbits" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="299" fieldSourceType="DBColumn" dataType="Date" html="False" name="lastmodified" PathID="patientlastmodified" fieldSource="created" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="301" fieldSourceType="DBColumn" dataType="Text" html="False" name="user" PathID="patientuser" fieldSource="by_user" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="302" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CurrentUser" PathID="patientCurrentUser" fieldSource="by_user">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="303" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="HomePhone" fieldSource="HomePhone" required="False" caption="{res:HomePhone}" wizardCaption="{res:HomePhone}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientHomePhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MobilePhone" fieldSource="MobilePhone" required="False" caption="{res:MobilePhone}" wizardCaption="{res:MobilePhone}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientMobilePhone">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="377" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StreetNameActual" PathID="patientStreetNameActual" fieldSource="StreetNameActual" required="False" caption="{res:StreetName}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="379" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TownActual" fieldSource="TownActual" caption="{res:Town}" wizardCaption="{res:Town}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientTownActual" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="380" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StreetNrActual" fieldSource="StreetNrActual" caption="{res:StreetNr}" wizardCaption="{res:StreetNr}" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientStreetNrActual" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="57" visible="Dynamic" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="DistrictID" fieldSource="DistrictID" required="True" caption="{res:DistrictID}" wizardCaption="{res:DistrictID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patientDistrictID" connection="registry_db" dataSource="districts" boundColumn="DistrictID" textColumn="DistrictName" features="(assigned)" orderBy="DistrictName">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="60" tableName="districts" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features>
						<PTDependentListBox id="62" enabled="True" name="PTDependentListBox2" category="Prototype" featureNameChanged="No" masterListbox="s_province_ProvinceID" servicePage="services/DistrictID_from_Province_PTDependentListBox.ccp">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
				</ListBox>
				<ListBox id="61" visible="Dynamic" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_province_ProvinceID" wizardCaption="{res:provinceProvinceID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patients_province_ProvinceID" connection="registry_db" dataSource="province" boundColumn="ProvinceID" textColumn="ProvinceName" orderBy="ProvinceName" required="True" fieldSource="province_ProvinceID" caption="{res:Province}">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="63" tableName="province" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features>
					</Features>
				</ListBox>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="FamilyName" fieldSource="FamilyName" required="True" caption="{res:FamilyName}" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardRows="3" PathID="patientFamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="BirthDate" fieldSource="BirthDate" required="True" caption="{res:BirthDate}" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientBirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="45" name="DatePicker_BirthDate" control="BirthDate" wizardSatellite="True" wizardControl="BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="patientDatePicker_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<RadioButton id="396" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="AddressActual" PathID="patientAddressActual" caption="{res:AddressActual}" fieldSource="AddressActual" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" required="True" defaultValue="0">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="397" eventType="Client"/>
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
				<ListBox id="421" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="DistrictActualID" fieldSource="DistrictActualID" required="True" caption="{res:DistrictID}" wizardCaption="{res:DistrictID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patientDistrictActualID" connection="registry_db" dataSource="districts" boundColumn="DistrictID" textColumn="DistrictName" orderBy="DistrictName" features="(assigned)" defaultValue="99999">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="422" tableName="districts" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features>
						<PTDependentListBox id="423" enabled="True" name="PTDependentListBox1" category="Prototype" featureNameChanged="No" masterListbox="s_province_ProvinceActualID" servicePage="services/DistrictID_from_Province_PTDependentListBox.ccp">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
				</ListBox>
				<ListBox id="424" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_province_ProvinceActualID" wizardCaption="{res:provinceProvinceID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patients_province_ProvinceActualID" connection="registry_db" dataSource="province" boundColumn="ProvinceID" textColumn="ProvinceName" orderBy="ProvinceName" fieldSource="provinceActual_ProvinceID" defaultValue="99999">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="425" tableName="province" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features>
					</Features>
				</ListBox>
				<TextBox id="484" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="HomePhoneActual" PathID="patientHomePhoneActual" fieldSource="HomePhoneActual" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="256" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Integer" returnValueType="Number" name="ListofBadHabbits" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patientListofBadHabbits" connection="registry_db" boundColumn="BadHabbitsTypeID" textColumn="BadHabbitsName" activeCollection="TableParameters" dataSource="bad_habbitstype">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="257" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="522" tableName="bad_habbitstype" posLeft="10" posTop="10" posWidth="122" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="258" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="516" urlType="Relative" enableValidation="False" isDefault="False" name="RightButtonBadHabbits">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="270" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="273" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButtonBadHabbits">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="519" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="262" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Integer" returnValueType="Number" name="SelectedBadHabbits" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="patientSelectedBadHabbits" connection="registry_db" boundColumn="BadHabbitsTypeID" textColumn="BadHabbitsName" activeCollection="TableParameters" dataSource="bad_habbits, bad_habbitstype">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="538" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="529" conditionType="Parameter" useIsNull="False" field="bad_habbits.PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="PatientID" leftBrackets="0" rightBrackets="0"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="523" tableName="bad_habbits" posLeft="18" posTop="142" posWidth="122" posHeight="104"/>
						<JoinTable id="525" tableName="bad_habbitstype" posLeft="180" posTop="145" posWidth="122" posHeight="88"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="530" tableLeft="bad_habbits" tableRight="bad_habbitstype" fieldLeft="bad_habbits.BadHabbitsTypeID" fieldRight="bad_habbitstype.BadHabbitsTypeID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="524" tableName="bad_habbits" fieldName="bad_habbits.*"/>
						<Field id="528" tableName="bad_habbitstype" fieldName="BadHabbitsName"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="265" urlType="Relative" enableValidation="True" isDefault="False" name="Button_AddPreg" operation="Update" wizardCaption="{res:CCS_Insert}" PathID="patientButton_AddPreg" returnPage="pregnancy_maint.ccp">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="267" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="269" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="540" fieldSourceType="DBColumn" dataType="Boolean" name="Reloaded" PathID="patientReloaded" defaultValue="false">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="543" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FilterofObstetricAnamnesis" PathID="patientFilterofObstetricAnamnesis">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="769" fieldSourceType="DBColumn" dataType="Text" name="FacilityID" PathID="patientFacilityID" fieldSource="FacilityID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="785" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="Patient_RegDate2" fieldSource="DischargeDate" required="False" caption="{res:Patient_RegDate}" wizardCaption="{res:Patient_RegDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="patientPatient_RegDate2" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="790" name="DatePicker_Patient_RegDate2" PathID="patientDatePicker_Patient_RegDate2" control="Patient_RegDate2" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<CheckBox id="795" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="Discharged" PathID="patientDischarged" fieldSource="Discharged" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" caption="{res:Discharged}" defaultValue="0" required="True" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="797" eventType="Client"/>
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
				</CheckBox>
				<CheckBox id="796" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="Admitted" PathID="patientAdmitted" fieldSource="Admitted" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" caption="{res:Admitted}" defaultValue="0" required="True" checkedValue="1" uncheckedValue="0">
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
				</CheckBox>
			</Components>
			<Events>
				<Event name="OnSubmit" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="115" eventType="Client"/>
					</Actions>
				</Event>
				<Event name="BeforeDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="133" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="134" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="135" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="767"/>
					</Actions>
				</Event>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="781"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="429" conditionType="Parameter" useIsNull="False" field="patient.PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PatientID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="274" tableName="districts" posLeft="266" posTop="57" posWidth="95" posHeight="104"/>
				<JoinTable id="276" tableName="province" posLeft="440" posTop="54" posWidth="95" posHeight="104"/>
				<JoinTable id="407" tableName="patient" posLeft="21" posTop="10" posWidth="135" posHeight="489"/>
				<JoinTable id="461" tableName="districts" alias="districtsActual" posLeft="292" posTop="351" posWidth="95" posHeight="104"/>
				<JoinTable id="467" tableName="province" alias="provinceActual" posLeft="519" posTop="342" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="512" tableLeft="districts" tableRight="province" fieldLeft="districts.ProvinceID" fieldRight="province.ProvinceID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="513" tableLeft="patient" tableRight="districts" fieldLeft="patient.DistrictID" fieldRight="districts.DistrictID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="514" tableLeft="districtsActual" tableRight="patient" fieldLeft="districtsActual.DistrictID" fieldRight="patient.DistrictActualID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="515" tableLeft="provinceActual" tableRight="districtsActual" fieldLeft="provinceActual.ProvinceID" fieldRight="districtsActual.ProvinceID" joinType="right" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="409" tableName="patient" fieldName="patient.*"/>
				<Field id="479" tableName="provinceActual" fieldName="provinceActual.ProvinceID" alias="provinceActual_ProvinceID"/>
				<Field id="483" tableName="province" fieldName="province.ProvinceID" alias="province_ProvinceID"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="435" variable="FamilyName" dataType="Memo" parameterType="Control" parameterSource="FamilyName"/>
				<SQLParameter id="436" variable="BirthDate" dataType="Date" parameterType="Control" parameterSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="437" variable="MarritalStatusID" dataType="Integer" parameterType="Control" parameterSource="MarritalStatusID"/>
				<SQLParameter id="438" variable="StreetName" dataType="Text" parameterType="Control" parameterSource="StreetName"/>
				<SQLParameter id="439" variable="StreetNr" dataType="Text" parameterType="Control" parameterSource="StreetNr"/>
				<SQLParameter id="440" variable="Town" dataType="Text" parameterType="Control" parameterSource="Town"/>
				<SQLParameter id="441" variable="DistrictID" dataType="Integer" parameterType="Control" parameterSource="DistrictID"/>
				<SQLParameter id="442" variable="HomePhone" dataType="Text" parameterType="Control" parameterSource="HomePhone"/>
				<SQLParameter id="443" variable="MobilePhone" dataType="Text" parameterType="Control" parameterSource="MobilePhone"/>
				<SQLParameter id="444" variable="GivenName" dataType="Memo" parameterType="Control" parameterSource="GivenName"/>
				<SQLParameter id="445" variable="Patient_RegDate" dataType="Date" parameterType="Control" parameterSource="Patient_RegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="446" variable="Weight" dataType="Single" parameterType="Control" parameterSource="Weight"/>
				<SQLParameter id="447" variable="BloodGroupID" dataType="Integer" parameterType="Control" parameterSource="BloodGroupID"/>
				<SQLParameter id="448" variable="Rhesus" dataType="Integer" parameterType="Control" parameterSource="Rhesus"/>
				<SQLParameter id="449" variable="NrPregnancies" dataType="Integer" parameterType="Control" parameterSource="NrPregnancies"/>
				<SQLParameter id="450" variable="NrDeliveries" dataType="Integer" parameterType="Control" parameterSource="NrDeliveries"/>
				<SQLParameter id="451" variable="CurrentUser" dataType="Text" parameterType="Control" parameterSource="CurrentUser"/>
				<SQLParameter id="452" variable="EducationID" dataType="Integer" parameterType="Control" parameterSource="EducationID"/>
				<SQLParameter id="453" variable="Profession" dataType="Text" parameterType="Control" parameterSource="Profession"/>
				<SQLParameter id="454" variable="AddressActual" dataType="Integer" parameterType="Control" parameterSource="AddressActual"/>
				<SQLParameter id="455" variable="StreetNameActual" dataType="Text" parameterType="Control" parameterSource="StreetNameActual"/>
				<SQLParameter id="456" variable="StreetNrActual" dataType="Text" parameterType="Control" parameterSource="StreetNrActual"/>
				<SQLParameter id="457" variable="TownActual" dataType="Text" parameterType="Control" parameterSource="TownActual"/>
				<SQLParameter id="458" variable="HomePhoneActual" dataType="Text" parameterType="Control" parameterSource="HomePhoneActual"/>
				<SQLParameter id="459" variable="Unemployed" dataType="Integer" parameterType="Control" parameterSource="Unemployed"/>
				<SQLParameter id="460" variable="DistrictActualID" dataType="Integer" parameterType="Control" parameterSource="DistrictActualID"/>
				<SQLParameter id="768" variable="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="116" field="FamilyName" dataType="Memo" parameterType="Control" parameterSource="FamilyName" omitIfEmpty="True"/>
				<CustomParameter id="117" field="BirthDate" dataType="Date" parameterType="Control" parameterSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="119" field="StreetName" dataType="Text" parameterType="Control" parameterSource="StreetName" omitIfEmpty="True"/>
				<CustomParameter id="120" field="StreetNr" dataType="Text" parameterType="Control" parameterSource="StreetNr" omitIfEmpty="True"/>
				<CustomParameter id="121" field="Town" dataType="Text" parameterType="Control" parameterSource="Town" omitIfEmpty="True"/>
				<CustomParameter id="123" field="DistrictID" dataType="Integer" parameterType="Control" parameterSource="DistrictID" omitIfEmpty="True"/>
				<CustomParameter id="124" field="HomePhone" dataType="Text" parameterType="Control" parameterSource="HomePhone" omitIfEmpty="True"/>
				<CustomParameter id="125" field="MobilePhone" dataType="Text" parameterType="Control" parameterSource="MobilePhone" omitIfEmpty="True"/>
				<CustomParameter id="126" field="GivenName" dataType="Memo" parameterType="Control" parameterSource="GivenName" omitIfEmpty="True"/>
				<CustomParameter id="127" field="Patient_RegDate" dataType="Date" parameterType="Control" parameterSource="Patient_RegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="129" field="BloodGroupID" dataType="Integer" parameterType="Control" parameterSource="BloodGroupID" omitIfEmpty="True"/>
				<CustomParameter id="130" field="Rhesus" dataType="Integer" parameterType="Control" parameterSource="Rhesus" omitIfEmpty="True"/>
				<CustomParameter id="131" field="NrPregnancies" dataType="Integer" parameterType="Control" parameterSource="NrPregnancies" omitIfEmpty="True"/>
				<CustomParameter id="132" field="NrDeliveries" dataType="Integer" parameterType="Control" parameterSource="NrDeliveries" omitIfEmpty="True"/>
				<CustomParameter id="316" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="398" field="AddressActual" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="AddressActual"/>
				<CustomParameter id="399" field="StreetNameActual" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="StreetNameActual"/>
				<CustomParameter id="400" field="StreetNrActual" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="StreetNrActual"/>
				<CustomParameter id="401" field="TownActual" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="TownActual"/>
				<CustomParameter id="427" field="HomePhoneActual" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="HomePhoneActual"/>
				<CustomParameter id="432" field="DistrictActualID" dataType="Integer" parameterType="Control" parameterSource="DistrictActualID" omitIfEmpty="True"/>
				<CustomParameter id="766" field="FacilityID" parameterType="Control" omitIfEmpty="True" parameterSource="FacilityID" dataType="Integer"/>
				<CustomParameter id="788" field="Admitted" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Admitted"/>
				<CustomParameter id="791" field="Discharged" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Discharged"/>
				<CustomParameter id="792" field="DischargeDate" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" omitIfEmpty="True" parameterSource="Patient_RegDate2"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="485" variable="FamilyName" dataType="Memo" parameterType="Control" parameterSource="FamilyName"/>
				<SQLParameter id="486" variable="GivenName" dataType="Memo" parameterType="Control" parameterSource="GivenName"/>
				<SQLParameter id="487" variable="Patient_RegDate" dataType="Date" parameterType="Control" parameterSource="Patient_RegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="488" variable="BirthDate" dataType="Date" parameterType="Control" parameterSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="489" variable="MarritalStatusID" dataType="Integer" parameterType="Control" parameterSource="MarritalStatusID"/>
				<SQLParameter id="490" variable="StreetName" dataType="Text" parameterType="Control" parameterSource="StreetName"/>
				<SQLParameter id="491" variable="StreetNr" dataType="Text" parameterType="Control" parameterSource="StreetNr"/>
				<SQLParameter id="492" variable="Town" dataType="Text" parameterType="Control" parameterSource="Town"/>
				<SQLParameter id="493" variable="HomePhone" dataType="Text" parameterType="Control" parameterSource="HomePhone"/>
				<SQLParameter id="494" variable="MobilePhone" dataType="Text" parameterType="Control" parameterSource="MobilePhone"/>
				<SQLParameter id="495" variable="Weight" dataType="Single" parameterType="Control" parameterSource="Weight"/>
				<SQLParameter id="496" variable="NrPregnancies" dataType="Integer" parameterType="Control" parameterSource="NrPregnancies"/>
				<SQLParameter id="497" variable="NrDeliveries" dataType="Integer" parameterType="Control" parameterSource="NrDeliveries"/>
				<SQLParameter id="498" variable="DistrictID" dataType="Integer" parameterType="Control" parameterSource="DistrictID"/>
				<SQLParameter id="499" variable="BloodGroupID" dataType="Integer" parameterType="Control" parameterSource="BloodGroupID"/>
				<SQLParameter id="500" variable="Rhesus" dataType="Integer" parameterType="Control" parameterSource="Rhesus"/>
				<SQLParameter id="501" variable="CurrentUser" dataType="Text" parameterType="Control" parameterSource="CurrentUser"/>
				<SQLParameter id="502" variable="EducationID" dataType="Integer" parameterType="Control" parameterSource="EducationID"/>
				<SQLParameter id="503" variable="Profession" dataType="Text" parameterType="Control" parameterSource="Profession"/>
				<SQLParameter id="504" variable="AddressActual" dataType="Integer" parameterType="Control" parameterSource="AddressActual"/>
				<SQLParameter id="505" variable="StreetNameActual" dataType="Text" parameterType="Control" parameterSource="StreetNameActual"/>
				<SQLParameter id="506" variable="StreetNrActual" dataType="Text" parameterType="Control" parameterSource="StreetNrActual"/>
				<SQLParameter id="507" variable="TownActual" dataType="Text" parameterType="Control" parameterSource="TownActual"/>
				<SQLParameter id="508" variable="Unemployed" dataType="Integer" parameterType="Control" parameterSource="Unemployed"/>
				<SQLParameter id="509" variable="HomePhoneActual" dataType="Text" parameterType="Control" parameterSource="HomePhoneActual"/>
				<SQLParameter id="510" variable="DistrictActualID" dataType="Integer" parameterType="Control" parameterSource="DistrictActualID"/>
				<SQLParameter id="511" variable="PatientID" parameterType="URL" dataType="Integer" parameterSource="PatientID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="280" conditionType="Parameter" useIsNull="False" field="PatientID" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="PatientID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="281" field="FamilyName" dataType="Memo" parameterType="Control" parameterSource="FamilyName" omitIfEmpty="True"/>
				<CustomParameter id="282" field="GivenName" dataType="Memo" parameterType="Control" parameterSource="GivenName" omitIfEmpty="True"/>
				<CustomParameter id="283" field="Patient_RegDate" dataType="Date" parameterType="Control" parameterSource="Patient_RegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="284" field="BirthDate" dataType="Date" parameterType="Control" parameterSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="286" field="StreetName" dataType="Text" parameterType="Control" parameterSource="StreetName" omitIfEmpty="True"/>
				<CustomParameter id="287" field="StreetNr" dataType="Text" parameterType="Control" parameterSource="StreetNr" omitIfEmpty="True"/>
				<CustomParameter id="288" field="Town" dataType="Text" parameterType="Control" parameterSource="Town" omitIfEmpty="True"/>
				<CustomParameter id="289" field="HomePhone" dataType="Text" parameterType="Control" parameterSource="HomePhone" omitIfEmpty="True"/>
				<CustomParameter id="290" field="MobilePhone" dataType="Text" parameterType="Control" parameterSource="MobilePhone" omitIfEmpty="True"/>
				<CustomParameter id="292" field="NrPregnancies" dataType="Integer" parameterType="Control" parameterSource="NrPregnancies" omitIfEmpty="True"/>
				<CustomParameter id="293" field="NrDeliveries" dataType="Integer" parameterType="Control" parameterSource="NrDeliveries" omitIfEmpty="True"/>
				<CustomParameter id="294" field="DistrictID" dataType="Integer" parameterType="Control" parameterSource="DistrictID" omitIfEmpty="True"/>
				<CustomParameter id="296" field="BloodGroupID" dataType="Integer" parameterType="Control" parameterSource="BloodGroupID" omitIfEmpty="True"/>
				<CustomParameter id="297" field="Rhesus" dataType="Integer" parameterType="Control" parameterSource="Rhesus" omitIfEmpty="True"/>
				<CustomParameter id="304" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="402" field="AddressActual" dataType="Integer" parameterType="Control" omitIfEmpty="False" parameterSource="AddressActual"/>
				<CustomParameter id="403" field="StreetNameActual" dataType="Text" parameterType="Control" omitIfEmpty="False" parameterSource="StreetNameActual" defaultValue="NULL"/>
				<CustomParameter id="404" field="StreetNrActual" dataType="Text" parameterType="Control" omitIfEmpty="False" parameterSource="StreetNrActual" defaultValue="NULL"/>
				<CustomParameter id="405" field="TownActual" dataType="Text" parameterType="Control" omitIfEmpty="False" parameterSource="TownActual" defaultValue="NULL"/>
				<CustomParameter id="428" field="HomePhoneActual" dataType="Text" parameterType="Control" omitIfEmpty="False" parameterSource="HomePhoneActual" defaultValue="NULL"/>
				<CustomParameter id="434" field="DistrictActualID" dataType="Integer" parameterType="Control" parameterSource="DistrictActualID" omitIfEmpty="False" defaultValue="NULL"/>
				<CustomParameter id="789" field="Admitted" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Admitted"/>
				<CustomParameter id="793" field="Discharged" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Discharged"/>
				<CustomParameter id="794" field="DischargeDate" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" omitIfEmpty="True" parameterSource="Patient_RegDate2"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="298" conditionType="Parameter" useIsNull="False" field="patient.PatientID" dataType="Integer" parameterType="URL" parameterSource="PatientID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups>
				<Group id="550" groupID="3" read="True" insert="True" update="True" delete="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="317" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="pregnancy, delivery, facilities, deliverymethod, patient" activeCollection="TableParameters" name="delivery" orderBy="DataDelivery desc" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:complicationsdeliverydeliverymethodfacilitiesicd10_allpregnancypregnancytype} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}">
			<Components>
				<Label id="333" fieldSourceType="DBColumn" dataType="Text" html="False" name="complications_delivery_de_TotalRecords" wizardUseTemplateBlock="False" PathID="deliverycomplications_delivery_de_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="334" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="335" visible="True" name="Sorter_PregnancyRecNr" column="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr" wizardAddNbsp="False" PathID="deliverySorter_PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="336" visible="True" name="Sorter_DataDelivery" column="DataDelivery" wizardCaption="{res:DataDelivery}" wizardSortingType="SimpleDir" wizardControl="DataDelivery" wizardAddNbsp="False" PathID="deliverySorter_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="337" visible="True" name="Sorter_FacilityName" column="FacilityName" wizardCaption="{res:FacilityName}" wizardSortingType="SimpleDir" wizardControl="FacilityName" wizardAddNbsp="False" PathID="deliverySorter_FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="338" visible="True" name="Sorter_DeliveryMethodName" column="DeliveryMethodName" wizardCaption="{res:DeliveryMethodName}" wizardSortingType="SimpleDir" wizardControl="DeliveryMethodName" wizardAddNbsp="False" PathID="deliverySorter_DeliveryMethodName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="341" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="deliveryPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="342" fieldSourceType="DBColumn" dataType="Date" html="False" name="DataDelivery" fieldSource="DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="deliveryDataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="343" fieldSourceType="DBColumn" dataType="Text" html="False" name="FacilityName" fieldSource="FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="deliveryFacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="344" fieldSourceType="DBColumn" dataType="Text" html="False" name="DeliveryMethodName" fieldSource="DeliveryMethodName" wizardCaption="{res:DeliveryMethodName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="deliveryDeliveryMethodName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="347" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="352" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="deliveryImageLink1" hrefSource="delivery_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="353" sourceType="DataField" name="DeliveryID" source="DeliveryID"/>
						<LinkParameter id="372" sourceType="DataField" name="PatientID" source="PatientID"/>
						<LinkParameter id="373" sourceType="DataField" name="PregnancyID" source="PregnancyID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="355" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="363" conditionType="Parameter" useIsNull="False" field="patient.PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" leftBrackets="0" rightBrackets="0" defaultValue="0" parameterSource="PatientID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="318" tableName="pregnancy" posLeft="10" posTop="10" posWidth="141" posHeight="180"/>
				<JoinTable id="319" tableName="delivery" posLeft="172" posTop="10" posWidth="141" posHeight="293"/>
				<JoinTable id="322" tableName="facilities" posLeft="534" posTop="181" posWidth="95" posHeight="104"/>
				<JoinTable id="324" tableName="deliverymethod" posLeft="360" posTop="223" posWidth="141" posHeight="88"/>
				<JoinTable id="360" tableName="patient" posLeft="334" posTop="10" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="777" tableLeft="delivery" tableRight="pregnancy" fieldLeft="delivery.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="778" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="779" tableLeft="delivery" tableRight="deliverymethod" fieldLeft="delivery.DeliveryMethodID" fieldRight="deliverymethod.DeliveryMethodID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="780" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
<Group id="800" groupID="3" read="True"/>
</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="770" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="patientID" dataSource="patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:patient} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="patientID">
			<Components>
				<Label id="772" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="patientIDPatientID" fieldSource="PatientID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="776"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="771" conditionType="Parameter" useIsNull="False" field="PatientID" parameterSource="PatientID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
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
				<Group id="773" groupID="1" read="True"/>
				<Group id="774" groupID="3" read="True"/>
				<Group id="775" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="patient_maint_fac.php" forShow="True" url="patient_maint_fac.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="patient_maint_fac_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="798" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnLoad" type="Client">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="395"/>
			</Actions>
		</Event>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="799"/>
			</Actions>
		</Event>
	</Events>
</Page>
