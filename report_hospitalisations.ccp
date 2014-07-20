<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" connection="registry_db" dataSource="hospitalisation, pregnancy, patient, facilities, icd10_all, department, hospitalisationdischargediagnosis" name="hospitalisation_pregnancy" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:hospitalisationpregnancypatientfacilities} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="41" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="42" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteActions="pasteActions" wizardAllowSorting="True">
					<Components>
						<Sorter id="64" visible="True" name="Sorter_PregnancyRecNr" column="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="70" visible="True" name="Sorter_ReasonHospitalisationICD10ID" column="ReasonHospitalisationICD10ID" wizardCaption="{res:ReasonHospitalisationICD10ID}" wizardSortingType="SimpleDir" wizardControl="ReasonHospitalisationICD10ID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="72" visible="True" name="Sorter_Town" column="Town" wizardCaption="{res:Town}" wizardSortingType="SimpleDir" wizardControl="Town">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="88" visible="True" name="Sorter_PregnancyRecNr1" column="FamilyName" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr" connection="registry_db">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="89" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="hospitalisation_pregnancyPage_HeaderSorter1" wizardCaption="{res:FirstNamePatient1}" column="GivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="116" visible="True" name="Department" wizardSortingType="SimpleDir" PathID="hospitalisation_pregnancyPage_HeaderDepartment" wizardCaption="{res:DepartmentDesc}" column="DepartmentDesc">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="126" visible="True" name="Sorter2" wizardSortingType="SimpleDir" PathID="hospitalisation_pregnancyPage_HeaderSorter2" wizardCaption="{res:DischargeDate}" column="hospitalisation.DischargeDate" columnReverse="hospitalisation.DischargeDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="44" visible="True" lines="1" name="FacilityName_Header" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="51" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" fieldSource="FacilityName" wizardCaption="FacilityName" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyFacilityName_HeaderFacilityName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="191" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="FacilityName" name="Report_Row_Number1" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyFacilityName_HeaderReport_Row_Number1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="45" visible="True" lines="1" name="Detail" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
					<Components>
						<ReportLabel id="71" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReasonHospitalisationICD10ID" fieldSource="ReasonHospitalisationICD10ID" wizardCaption="ReasonHospitalisationICD10ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyDetailReasonHospitalisationICD10ID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="63" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyDetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="46" visible="True" lines="1" name="FacilityName_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="47" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="48" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="49" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="53" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="hospitalisation_pregnancyPage_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="54" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="55" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Navigator>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="141" visible="True" lines="1" name="PatientID_Header" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
					<Components>
						<ReportLabel id="144" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PatientID" fieldSource="patient_PatientID" wizardCaption="FacilityName" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyPatientID_HeaderPatientID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Link id="69" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FamilyName" fieldSource="FamilyName" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyPatientID_HeaderFamilyName" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="91" sourceType="DataField" name="PatientID" source="patient_PatientID"/>
							</LinkParameters>
						</Link>
						<Link id="145" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="GivenName" PathID="hospitalisation_pregnancyPatientID_HeaderGivenName" fieldSource="GivenName" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters/>
						</Link>
						<ReportLabel id="65" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PregnancyRecNr" fieldSource="PregnancyRecNr" wizardCaption="PregnancyRecNr" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyPatientID_HeaderPregnancyRecNr">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="67" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="AdmissionDate" fieldSource="AdmissionDate" wizardCaption="AdmissionDate" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyPatientID_HeaderAdmissionDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="127" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="DischargeDate" fieldSource="hospitalisation_DischargeDate" wizardCaption="AdmissionDate" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyPatientID_HeaderDischargeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="110" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Dapartment" PathID="hospitalisation_pregnancyPatientID_HeaderDapartment" fieldSource="DepartmentDesc">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="73" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Town" fieldSource="Town" wizardCaption="Town" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="hospitalisation_pregnancyPatientID_HeaderTown">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="142" visible="True" lines="1" name="PatientID_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="92" conditionType="Parameter" useIsNull="False" field="pregnancy.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="Or" defaultValue="0" format="0;(0)" leftBrackets="1" rightBrackets="0" parameterSource="s_Facilities"/>
				<TableParameter id="93" conditionType="Parameter" useIsNull="False" field="hospitalisation.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" leftBrackets="0" rightBrackets="1" parameterSource="s_Facilities"/>
				<TableParameter id="57" conditionType="Parameter" useIsNull="False" field="hospitalisation.AdmissionDate" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_AdmissionDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="87" conditionType="Parameter" useIsNull="False" field="hospitalisation.AdmissionDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_AdmissionDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyRecNr" parameterSource="s_PregnancyRecNr" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="59" conditionType="Parameter" useIsNull="False" field="patient.FamilyName" parameterSource="s_FamilyName" dataType="Memo" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="60" conditionType="Parameter" useIsNull="False" field="patient.GivenName" parameterSource="s_GivenName" dataType="Memo" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="136" conditionType="Parameter" useIsNull="False" field="hospitalisation.DischargeDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DischargeDate"/>
				<TableParameter id="137" conditionType="Parameter" useIsNull="False" field="hospitalisation.DischargeDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DischargeDate2"/>
				<TableParameter id="139" conditionType="Parameter" useIsNull="False" field="icd10_all.ICD10ID" dataType="Text" searchConditionType="In" parameterType="URL" logicOperator="And" parameterSource="Diagnose"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="hospitalisation" posLeft="10" posTop="10" posWidth="160" posHeight="354"/>
				<JoinTable id="5" tableName="pregnancy" posLeft="577" posTop="12" posWidth="159" posHeight="180"/>
				<JoinTable id="7" tableName="patient" posLeft="789" posTop="5" posWidth="138" posHeight="180"/>
				<JoinTable id="17" tableName="facilities" posLeft="244" posTop="491" posWidth="95" posHeight="104"/>
				<JoinTable id="97" tableName="icd10_all" posLeft="469" posTop="233" posWidth="235" posHeight="152"/>
				<JoinTable id="112" tableName="department" posLeft="221" posTop="244" posWidth="152" posHeight="93"/>
				<JoinTable id="119" tableName="hospitalisationdischargediagnosis" posLeft="226" posTop="63" posWidth="251" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="120" tableLeft="hospitalisation" tableRight="facilities" fieldLeft="hospitalisation.FacilityID" fieldRight="facilities.FacilityID" joinType="left" conditionType="Equal"/>
				<JoinTable2 id="121" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="left" conditionType="Equal"/>
				<JoinTable2 id="122" tableLeft="hospitalisation" tableRight="pregnancy" fieldLeft="hospitalisation.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="left" conditionType="Equal"/>
				<JoinTable2 id="123" tableLeft="hospitalisation" tableRight="department" fieldLeft="hospitalisation.DepartmentID" fieldRight="department.DeptID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="124" tableLeft="hospitalisationdischargediagnosis" tableRight="hospitalisation" fieldLeft="hospitalisationdischargediagnosis.HospitalisationID" fieldRight="hospitalisation.HospitalisationID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="125" tableLeft="hospitalisationdischargediagnosis" tableRight="icd10_all" fieldLeft="hospitalisationdischargediagnosis.ICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="11" tableName="patient" fieldName="GivenName"/>
				<Field id="12" tableName="patient" fieldName="FamilyName"/>
				<Field id="13" tableName="pregnancy" fieldName="pregnancy.PregnancyID" alias="pregnancy_PregnancyID"/>
				<Field id="14" tableName="hospitalisation" fieldName="hospitalisation.FacilityID" alias="hospitalisation_FacilityID"/>
				<Field id="16" tableName="hospitalisation" fieldName="AdmissionDate"/>
				<Field id="20" tableName="facilities" fieldName="facilities.FacilityID" alias="facilities_FacilityID"/>
				<Field id="21" tableName="facilities" fieldName="FacilityName"/>
				<Field id="22" tableName="pregnancy" fieldName="PregnancyRecNr"/>
				<Field id="26" tableName="patient" fieldName="Town"/>
				<Field id="27" tableName="patient" fieldName="patient.PatientID" alias="patient_PatientID"/>
				<Field id="98" fieldName="CONCAT(icd10_all.ICD10ID,&quot; - &quot;, DiseaseName)" isExpression="True" alias="ReasonHospitalisationICD10ID"/>
				<Field id="115" tableName="department" fieldName="DepartmentDesc"/>
				<Field id="117" tableName="icd10_all" fieldName="icd10_all.DiseaseName" alias="icd10_all_DiseaseName"/>
				<Field id="118" tableName="hospitalisation" fieldName="DepartmentID"/>
				<Field id="128" tableName="hospitalisation" fieldName="hospitalisation.DischargeDate" alias="hospitalisation_DischargeDate"/>
				<Field id="188" fieldName="hospitalisation.DischargeDate-AdmissionDate" isExpression="True" alias="Expr1"/>
				<Field id="190" tableName="hospitalisation" fieldName="hospitalisation.HospitalisationID" alias="hospitalisation_HospitalisationID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="43" name="FacilityName" field="FacilityName" sqlField="facilities.FacilityName" sortOrder="asc"/>
				<ReportGroup id="140" name="PatientID" field="hospitalisation_HospitalisationID" sqlField="hospitalisation.HospitalisationID" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="28" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="facilities_hospitalisatio" wizardCaption="{res:CCS_SearchFormPrefix} {res:facilities_hospitalisatio} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_hospitalisations.ccp" PathID="facilities_hospitalisatio" pasteActions="pasteActions">
			<Components>
				<Button id="29" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="facilities_hospitalisatioButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_AdmissionDate" wizardCaption="{res:AdmissionDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="facilities_hospitalisatios_AdmissionDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" caption="{res:AdmissionDate}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="31" name="DatePicker_s_AdmissionDate" control="s_AdmissionDate" wizardSatellite="True" wizardControl="s_AdmissionDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="facilities_hospitalisatioDatePicker_s_AdmissionDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="facilities_hospitalisatios_PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_FamilyName" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" PathID="facilities_hospitalisatios_FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_GivenName" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" PathID="facilities_hospitalisatios_GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_AdmissionDate1" wizardCaption="{res:AdmissionDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="facilities_hospitalisatios_AdmissionDate1" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" caption="{res:AdmissionDate}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="86" name="DatePicker_s_AdmissionDate1" control="s_AdmissionDate1" wizardSatellite="True" wizardControl="s_AdmissionDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="facilities_hospitalisatioDatePicker_s_AdmissionDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DischargeDate" wizardCaption="{res:AdmissionDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="facilities_hospitalisatios_DischargeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" caption="{res:DischargeDate}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="131" name="DatePicker_s_AdmissionDate2" control="s_DischargeDate" wizardSatellite="True" wizardControl="s_AdmissionDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="facilities_hospitalisatioDatePicker_s_AdmissionDate2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DischargeDate2" wizardCaption="{res:AdmissionDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="facilities_hospitalisatios_DischargeDate2" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" caption="{res:DischargeDate}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="135" name="DatePicker_s_AdmissionDate3" control="s_DischargeDate2" wizardSatellite="True" wizardControl="s_AdmissionDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="facilities_hospitalisatioDatePicker_s_AdmissionDate3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="138" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="Diagnose" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="facilities_hospitalisatioDiagnose" connection="registry_db" dataSource="icd10_all" boundColumn="ICD10ID" textColumn="ID_Name" orderBy="ICD10ID">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="146" tableName="icd10_all" posLeft="10" posTop="10" posWidth="160" posHeight="152"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="147" fieldName="CONCAT(icd10_all.ICD10ID,&quot; - &quot;, DiseaseName)" isExpression="True" alias="ID_Name"/>
						<Field id="148" tableName="icd10_all" fieldName="ICD10ID"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="40" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
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
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Link id="37" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_hospitalisations.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="39" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="38" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_hospitalisations_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_hospitalisations.php" forShow="True" url="report_hospitalisations.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="83" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
