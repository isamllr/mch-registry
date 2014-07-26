<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="54" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="270" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="100" connection="registry_db" dataSource="medication" activeCollection="TableParameters" name="medication" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:medicationmedicationatcode} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" orderBy="DateMedication desc">
			<Components>
				<Label id="276" fieldSourceType="DBColumn" dataType="Text" html="False" name="medication_medicationatco_TotalRecords" wizardUseTemplateBlock="False" PathID="medicationmedication_medicationatco_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="277" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="278" visible="True" name="Sorter_DateMedication" column="DateMedication" wizardCaption="{res:DateMedication}" wizardSortingType="SimpleDir" wizardControl="DateMedication" wizardAddNbsp="False" PathID="medicationSorter_DateMedication">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="279" visible="True" name="Sorter_MedicationName" column="MedicationName" wizardCaption="{res:MedicationName}" wizardSortingType="SimpleDir" wizardControl="MedicationName" wizardAddNbsp="False" PathID="medicationSorter_MedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="280" visible="True" name="Sorter_Dosage" column="Dosage" wizardCaption="{res:Dosage}" wizardSortingType="SimpleDir" wizardControl="Dosage" wizardAddNbsp="False" PathID="medicationSorter_Dosage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="281" fieldSourceType="DBColumn" dataType="Date" html="False" name="DateMedication" fieldSource="DateMedication" wizardCaption="{res:DateMedication}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="medicationDateMedication" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="282" fieldSourceType="DBColumn" dataType="Text" html="False" name="MedicationName" fieldSource="MedicationName" wizardCaption="{res:MedicationName}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="medicationMedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="283" fieldSourceType="DBColumn" dataType="Text" html="False" name="Dosage" fieldSource="Dosage" wizardCaption="{res:Dosage}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="medicationDosage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="284" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="286" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="medicationImageLink1" hrefSource="medication_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="288" sourceType="DataField" name="MedicationID" source="MedicationID"/>
						<LinkParameter id="304" sourceType="DataField" name="VisitID" source="VisitID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="307" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="274" conditionType="Parameter" useIsNull="False" field="VisitID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="VisitID" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="271" tableName="medication" posLeft="10" posTop="10" posWidth="148" posHeight="165"/>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header" activeCollection="TableParameters">
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
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="309" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="9" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="10" tableName="patient" posLeft="91" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="308" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
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
		<Record id="55" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="visit" dataSource="visit" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:visit} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="visit" activeCollection="IFormElements" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" returnPage="pregnancy_maint.ccp" customInsert="visit" customInsertType="Table" customUpdate="visit" customUpdateType="Table" customDelete="visit" customDeleteType="Table" removeParameters="VisitID" activeTableType="visit">
			<Components>
				<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="visitButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="59" message="{res:ConfirmDeleteVisit}" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="60" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="visitButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VisitDate" fieldSource="VisitDate" required="True" caption="{res:VisitDate}" wizardCaption="{res:VisitDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="visitVisitDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="64" name="DatePicker_VisitDate" control="VisitDate" wizardSatellite="True" wizardControl="VisitDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="visitDatePicker_VisitDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="65" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="FacilityID" fieldSource="FacilityID" required="True" caption="{res:FacilityID}" wizardCaption="{res:FacilityID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="visitFacilityID" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName" orderBy="FacilityName" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="589"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="86" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="NextVisit" fieldSource="NextVisit" required="False" caption="{res:NextVisit}" wizardCaption="{res:NextVisit}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="visitNextVisit" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="68" name="DatePicker_NextVisit" control="NextVisit" wizardSatellite="True" wizardControl="NextVisit" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="visitDatePicker_NextVisit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="94" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="ListofVisitDis" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="visitListofVisitDis" connection="registry_db" dataSource="icd10_all" boundColumn="ICD10ID" textColumn="DiseaseIDName" orderBy="ICD10ID" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="95" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="185" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="RelevantVisitProb = '1'"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="97" tableName="icd10_all" posLeft="10" posTop="10" posWidth="95" posHeight="134"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="98" fieldName="CONCAT(ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="99" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="100" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="SelectedVisitDis" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="visitSelectedVisitDis" connection="registry_db" boundColumn="ICD10ID" textColumn="DiseaseIDName" dataSource="icd10_all, visitdisease" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="476" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="115" conditionType="Parameter" useIsNull="False" field="visitdisease.VisitID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="VisitID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="103" tableName="icd10_all" posLeft="21" posTop="10" posWidth="95" posHeight="104"/>
						<JoinTable id="113" tableName="visitdisease" posLeft="137" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="114" tableLeft="visitdisease" tableRight="icd10_all" fieldLeft="visitdisease.ICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="105" fieldName="CONCAT(icd10_all.ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="106" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="111" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_Visit" PathID="visitLinkedID_Visit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="125" urlType="Relative" enableValidation="True" isDefault="False" name="LeftButtonVisit" PathID="visitLeftButtonVisit">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="128" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="126" urlType="Relative" enableValidation="True" isDefault="False" name="RightButtonVisit" PathID="visitRightButtonVisit">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="127" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="180" fieldSourceType="DBColumn" dataType="Integer" name="PregnancyID" PathID="visitPregnancyID" fieldSource="PregnancyID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="51" urlType="Relative" enableValidation="True" isDefault="False" name="Button_UpdateAddMedication" operation="Update" wizardCaption="{res:CCS_Insert}" PathID="visitButton_UpdateAddMedication" returnPage="medication_maint.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="133" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="285" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="541" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="419" urlType="Relative" enableValidation="True" isDefault="False" name="Button_UpdateAddHospitalisation" PathID="visitButton_UpdateAddHospitalisation" operation="Update" returnPage="hospitalisation_maint.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="420"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="421"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="540"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="visitButton_Insert">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="True" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="visitButton_Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="539"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="477" fieldSourceType="DBColumn" dataType="Boolean" name="Reloaded" PathID="visitReloaded" defaultValue="false">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CurrentUser" PathID="visitCurrentUser" fieldSource="by_user" html="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="170" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="482" fieldSourceType="DBColumn" dataType="Date" html="False" name="lastmodified" PathID="visitlastmodified" fieldSource="created" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="484" fieldSourceType="DBColumn" dataType="Text" html="False" name="user" PathID="visituser" fieldSource="by_user" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ListBox id="209" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="VisitOutcomeID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="visitVisitOutcomeID" fieldSource="VisitOutcomeID" connection="registry_db" dataSource="visitoutcome" boundColumn="VisitOutcomeID" textColumn="VisitOutcomeName" required="True" caption="{res:VisitOutcomeID}" defaultValue="1">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="210" eventType="Client"/>
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
				<ListBox id="217" visible="Dynamic" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="IndicationID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="visitIndicationID" connection="registry_db" dataSource="refindication" boundColumn="IndicationID" textColumn="RefIndicationName" required="True" caption="{res:IndicationID}">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="313" tableName="refindication" posLeft="10" posTop="10" posWidth="123" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="475" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="ReferralFacilityID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="visitReferralFacilityID" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName" required="True" orderBy="FacilityName" caption="{res:ReferralFacilityID}" validationRule="(($this-&gt;VisitOutcomeID-&gt;GetValue()&gt;2 and $this-&gt;ReferralFacilityID-&gt;GetValue() != $this-&gt;FacilityID-&gt;GetValue()) or ($this-&gt;VisitOutcomeID-&gt;GetValue()&lt;3 and $this-&gt;ReferralFacilityID-&gt;GetValue() &gt; 0))" validationText="{res:Referral}">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="574" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="468" visible="Dynamic" fieldSourceType="DBColumn" dataType="Integer" name="DeptID" PathID="visitDeptID" sourceType="Table" connection="registry_db" dataSource="department" boundColumn="DeptID" textColumn="DepartmentDesc" required="True" orderBy="DepartmentDesc" caption="{res:ReferralDeptID}" defaultValue="1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="469" tableName="department" posLeft="10" posTop="10" posWidth="108" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<ListBox id="176" visible="Dynamic" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="EmployeeID" fieldSource="EmployeeID" required="False" caption="{res:EmployeeID}" wizardCaption="{res:EmployeeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="visitEmployeeID" connection="registry_db" dataSource="employees, position" boundColumn="EmployeeID" textColumn="FirstAndLastNameAndPosition" activeCollection="TableParameters" features="(assigned)">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="177" conditionType="Expression" useIsNull="False" field="employees.PositionID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="employees.PositionID = 1" parameterSource="employees_PositionID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="121" tableName="employees" posLeft="10" posTop="10" posWidth="115" posHeight="260"/>
						<JoinTable id="178" tableName="position" posLeft="146" posTop="10" posWidth="95" posHeight="88"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="179" tableLeft="employees" tableRight="position" fieldLeft="employees.PositionID" fieldRight="position.PositionID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="88" fieldName="CONCAT(FirstName, &quot; &quot;, LastName, &quot; (&quot;,PositionName, &quot;)&quot; )" isExpression="True" alias="FirstAndLastNameAndPosition"/>
						<Field id="122" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features>
						<PTDependentListBox id="587" enabled="True" name="PTDependentListBox1" servicePage="services/visit_maint_visit_EmployeeID_PTDependentListBox1.ccp" masterListbox="FacilityID" category="Prototype" featureNameChanged="No">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
				</ListBox>
				<Button id="547" urlType="Relative" enableValidation="True" isDefault="False" name="Button_UpdateAddTests" operation="Update" wizardCaption="{res:CCS_Insert}" PathID="visitButton_UpdateAddTests" returnPage="testlist_maint.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="548" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="549" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="550" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="569" urlType="Relative" enableValidation="True" isDefault="False" name="Button_UpdateAddTest" operation="Update" wizardCaption="{res:CCS_Insert}" PathID="visitButton_UpdateAddTest" returnPage="Test_maint.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="570"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="571"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="572"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<CheckBox id="590" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="RiskGroup" PathID="visitRiskGroup" fieldSource="RiskGroup" checkedValue="1" uncheckedValue="0" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<ListBox id="595" visible="Dynamic" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="ReferralTypeID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="visitReferralTypeID" connection="registry_db" dataSource="referraltype" boundColumn="ReferralTypeID" textColumn="TypeName" required="True" caption="{res:IndicationID}">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="596" tableName="refindication" posLeft="10" posTop="10" posWidth="123" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events>
				<Event name="AfterInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="118"/>
					</Actions>
				</Event>
				<Event name="AfterUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="119"/>
					</Actions>
				</Event>
				<Event name="BeforeDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="120"/>
					</Actions>
				</Event>
				<Event name="OnSubmit" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="123"/>
					</Actions>
				</Event>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="213"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="218"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="462"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="84" conditionType="Parameter" useIsNull="False" field="VisitID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" leftBrackets="0" rightBrackets="0" parameterSource="VisitID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="81" tableName="visit" posLeft="118" posTop="41" posWidth="119" posHeight="225"/>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="134" field="VisitDate" dataType="Date" parameterType="Control" parameterSource="VisitDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="135" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID" omitIfEmpty="True"/>
				<CustomParameter id="136" field="EmployeeID" dataType="Integer" parameterType="Control" parameterSource="EmployeeID" omitIfEmpty="False" defaultValue="NULL"/>
				<CustomParameter id="137" field="NextVisit" dataType="Date" parameterType="Control" parameterSource="NextVisit" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="False"/>
				<CustomParameter id="138" field="VisitOutcomeID" dataType="Integer" parameterType="Control" parameterSource="VisitOutcomeID" omitIfEmpty="True"/>
				<CustomParameter id="181" field="PregnancyID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="PregnancyID"/>
				<CustomParameter id="184" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="591" field="RiskGroup" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="RiskGroup"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="289" variable="VisitDate" dataType="Date" parameterType="Control" parameterSource="VisitDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="290" variable="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID"/>
				<SQLParameter id="291" variable="EmployeeID" dataType="Integer" parameterType="Control" parameterSource="EmployeeID"/>
				<SQLParameter id="292" variable="NextVisit" dataType="Date" parameterType="Control" parameterSource="NextVisit" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="293" variable="VisitOutcomeID" dataType="Integer" parameterType="Control" parameterSource="VisitOutcomeID"/>
				<SQLParameter id="294" variable="PregnancyID" dataType="Integer" parameterType="Control" parameterSource="PregnancyID"/>
				<SQLParameter id="295" variable="CurrentUser" dataType="Text" parameterType="Control" parameterSource="CurrentUser"/>
				<SQLParameter id="296" variable="VisitID" parameterType="URL" dataType="Integer" parameterSource="VisitID" defaultValue="0"/>
				<SQLParameter id="297" variable="VisitTypeID" parameterType="URL" dataType="Integer" parameterSource="VisitTypeID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="140" conditionType="Parameter" useIsNull="False" field="visit.VisitID" dataType="Integer" parameterType="URL" parameterSource="VisitID" searchConditionType="Equal" logicOperator="And" leftBrackets="0" rightBrackets="0"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="142" field="VisitDate" dataType="Date" parameterType="Control" parameterSource="VisitDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="143" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID" omitIfEmpty="True"/>
				<CustomParameter id="144" field="EmployeeID" dataType="Integer" parameterType="Control" parameterSource="EmployeeID" omitIfEmpty="False" defaultValue="NULL"/>
				<CustomParameter id="145" field="NextVisit" dataType="Date" parameterType="Control" parameterSource="NextVisit" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="False"/>
				<CustomParameter id="146" field="VisitOutcomeID" dataType="Integer" parameterType="Control" parameterSource="VisitOutcomeID" omitIfEmpty="True"/>
				<CustomParameter id="182" field="PregnancyID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="PregnancyID"/>
				<CustomParameter id="183" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="False" parameterSource="CurrentUser"/>
				<CustomParameter id="592" field="RiskGroup" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="RiskGroup"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="151" conditionType="Parameter" useIsNull="False" field="visit.VisitID" dataType="Integer" parameterType="URL" parameterSource="VisitID" searchConditionType="Equal" logicOperator="And" leftBrackets="0" rightBrackets="0"/>
			</DConditions>
			<SecurityGroups>
				<Group id="515" groupID="1" read="True"/>
				<Group id="516" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="517" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="254" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="100" connection="registry_db" dataSource="hospitalisation, facilities, department, icd10_all, visit" activeCollection="TableParameters" name="department_facilities_hos" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:departmentfacilitieshospitalisationicd10_all} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteActions="pasteActions">
			<Components>
				<Sorter id="428" visible="True" name="Sorter_DepartmentDesc" column="DepartmentDesc" wizardCaption="{res:DepartmentDesc}" wizardSortingType="SimpleDir" wizardControl="DepartmentDesc" wizardAddNbsp="False" PathID="department_facilities_hosSorter_DepartmentDesc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="275" visible="True" name="Sorter_FacilityName" column="FacilityName" wizardCaption="{res:FacilityName}" wizardSortingType="SimpleDir" wizardControl="FacilityName" wizardAddNbsp="False" PathID="department_facilities_hosSorter_FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="429" visible="True" name="Sorter_reason" column="reason" wizardCaption="{res:reason}" wizardSortingType="SimpleDir" wizardControl="reason" wizardAddNbsp="False" PathID="department_facilities_hosSorter_reason">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="430" visible="True" name="Sorter_AdmissionDate" column="AdmissionDate" wizardCaption="{res:AdmissionDate}" wizardSortingType="SimpleDir" wizardControl="AdmissionDate" wizardAddNbsp="False" PathID="department_facilities_hosSorter_AdmissionDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="431" visible="True" name="Sorter_DischargeDate" column="DischargeDate" wizardCaption="{res:DischargeDate}" wizardSortingType="SimpleDir" wizardControl="DischargeDate" wizardAddNbsp="False" PathID="department_facilities_hosSorter_DischargeDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="432" fieldSourceType="DBColumn" dataType="Text" html="False" name="DepartmentDesc" fieldSource="DepartmentDesc" wizardCaption="{res:DepartmentDesc}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department_facilities_hosDepartmentDesc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="433" fieldSourceType="DBColumn" dataType="Text" html="False" name="FacilityName" fieldSource="FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department_facilities_hosFacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="434" fieldSourceType="DBColumn" dataType="Text" html="False" name="reason" fieldSource="reason" wizardCaption="{res:reason}" wizardSize="50" wizardMaxLength="113" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department_facilities_hosreason">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="435" fieldSourceType="DBColumn" dataType="Date" html="False" name="AdmissionDate" fieldSource="AdmissionDate" wizardCaption="{res:AdmissionDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department_facilities_hosAdmissionDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="436" fieldSourceType="DBColumn" dataType="Date" html="False" name="DischargeDate" fieldSource="DischargeDate" wizardCaption="{res:DischargeDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department_facilities_hosDischargeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="437" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="department_facilities_hosImageLink1" hrefSource="hospitalisation_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="287" sourceType="DataField" name="HospitalisationID" source="hospitalisation_HospitalisationID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="438"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="454" conditionType="Parameter" useIsNull="False" field="visit.VisitID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="VisitID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="255" tableName="hospitalisation" posLeft="174" posTop="278" posWidth="253" posHeight="288"/>
				<JoinTable id="256" tableName="facilities" posLeft="535" posTop="43" posWidth="95" posHeight="104"/>
				<JoinTable id="258" tableName="department" posLeft="591" posTop="223" posWidth="108" posHeight="88"/>
				<JoinTable id="261" tableName="icd10_all" posLeft="556" posTop="400" posWidth="142" posHeight="120"/>
				<JoinTable id="444" tableName="visit" posLeft="21" posTop="10" posWidth="132" posHeight="264"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="450" tableLeft="hospitalisation" tableRight="icd10_all" fieldLeft="hospitalisation.ReasonHospitalisationICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="451" tableLeft="department" tableRight="hospitalisation" fieldLeft="department.DeptID" fieldRight="hospitalisation.DepartmentID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="452" tableLeft="facilities" tableRight="hospitalisation" fieldLeft="facilities.FacilityID" fieldRight="hospitalisation.FacilityID" joinType="inner"/>
				<JoinTable2 id="453" tableLeft="visit" tableRight="hospitalisation" fieldLeft="visit.HospitalisationID" fieldRight="hospitalisation.HospitalisationID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="442" tableName="hospitalisation" fieldName="concat(ICD10ID,&quot; - &quot;, DiseaseName)" isExpression="True" alias="reason"/>
				<Field id="455" tableName="hospitalisation" fieldName="AdmissionDate"/>
				<Field id="456" tableName="hospitalisation" fieldName="DischargeDate"/>
				<Field id="457" tableName="hospitalisation" fieldName="hospitalisation.HospitalisationID" alias="hospitalisation_HospitalisationID"/>
				<Field id="459" tableName="department" fieldName="DepartmentDesc"/>
				<Field id="460" tableName="facilities" fieldName="FacilityName"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="495" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header1" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header1" activeCollection="TableParameters">
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
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="500" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="501" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="502" tableName="patient" posLeft="91" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="503" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
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
		<Grid id="551" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="100" connection="registry_db" dataSource="test, testcode" activeCollection="TableParameters" name="test_testcode1" orderBy="TestDate" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:testtestcode} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="Simple" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteActions="pasteActions">
			<Components>
				<Sorter id="556" visible="True" name="Sorter_TestDate" column="TestDate" wizardCaption="{res:TestDate}" wizardSortingType="Simple" wizardControl="TestDate" wizardAddNbsp="False" PathID="test_testcode1Sorter_TestDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="557" visible="True" name="Sorter_TestName" column="TestName" wizardCaption="{res:TestName}" wizardSortingType="Simple" wizardControl="TestName" wizardAddNbsp="False" PathID="test_testcode1Sorter_TestName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="558" visible="True" name="Sorter_TestResultNormal" column="TestResultNormal" wizardCaption="{res:TestResultNormal}" wizardSortingType="Simple" wizardControl="TestResultNormal" wizardAddNbsp="False" PathID="test_testcode1Sorter_TestResultNormal">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="559" visible="True" name="Sorter_TestResultDetails" column="TestResultDetails" wizardCaption="{res:TestResultDetails}" wizardSortingType="Simple" wizardControl="TestResultDetails" wizardAddNbsp="False" PathID="test_testcode1Sorter_TestResultDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="560" fieldSourceType="DBColumn" dataType="Date" html="False" name="TestDate" fieldSource="TestDate" wizardCaption="{res:TestDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="test_testcode1TestDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="561" fieldSourceType="DBColumn" dataType="Text" html="False" name="TestName" fieldSource="TestName" wizardCaption="{res:TestName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="test_testcode1TestName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="562" fieldSourceType="DBColumn" dataType="Integer" html="False" name="TestResultNormal" fieldSource="TestResultNormal" wizardCaption="{res:TestResultNormal}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="test_testcode1TestResultNormal">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="573"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="563" fieldSourceType="DBColumn" dataType="Text" html="False" name="TestResultDetails" fieldSource="TestResultDetails" wizardCaption="{res:TestResultDetails}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="test_testcode1TestResultDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="564" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="test_testcode1ImageLink1" hrefSource="Test_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="566" sourceType="DataField" name="VisitID" source="VisitID"/>
						<LinkParameter id="568" sourceType="DataField" name="TestID" source="TestID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="567"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="555" conditionType="Parameter" useIsNull="False" field="test.VisitID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="VisitID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="552" tableName="test" posLeft="10" posTop="10" posWidth="137" posHeight="152"/>
				<JoinTable id="553" tableName="testcode" posLeft="168" posTop="10" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="554" tableLeft="test" tableRight="testcode" fieldLeft="test.TestCodeID" fieldRight="testcode.TestCodeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="visit_maint.php" forShow="True" url="visit_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="visit_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
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
		<Event name="OnLoad" type="Client">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="491"/>
			</Actions>
		</Event>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="593"/>
			</Actions>
		</Event>
	</Events>
</Page>
