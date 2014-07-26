<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" wizardSortingType="SimpleDir">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" connection="registry_db" dataSource="pregnancy, delivery, facilities, patient, visit, referral" name="patient_pregnancy_deliver" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:patientpregnancydeliveryfacilitiesreferral} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters" groupBy="pregnancy.PregnancyID">
			<Components>
				<Section id="50" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
						<ReportLabel id="59" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="patient_pregnancy_deliverReport_HeaderReport_TotalRecords">
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
				<Section id="51" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" pasteActions="pasteActions" wizardAllowSorting="True">
					<Components>
						<Sorter id="72" visible="True" name="Sorter_patient_PatientID" column="patient.PatientID" wizardCaption="{res:patient_PatientID}" wizardSortingType="SimpleDir" wizardControl="patient_PatientID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="76" visible="True" name="Sorter_Calc_DeliveryDate" column="Calc_DeliveryDate" wizardCaption="{res:Calc_DeliveryDate}" wizardSortingType="SimpleDir" wizardControl="Calc_DeliveryDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="78" visible="True" name="Sorter_DataDelivery" column="DataDelivery" wizardCaption="{res:DataDelivery}" wizardSortingType="SimpleDir" wizardControl="DataDelivery">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="102" visible="True" name="Sorter_PregnancyRecNr" column="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr" connection="registry_db">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="111" visible="True" name="Sorter_PregnancyRecNr1" column="FamilyName" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr" connection="registry_db">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="112" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="patient_pregnancy_deliverPage_HeaderSorter1" wizardCaption="{res:FirstNamePatient1}" column="GivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="170" visible="True" name="SorterTown" wizardSortingType="SimpleDir" PathID="patient_pregnancy_deliverPage_HeaderSorterTown" wizardCaption="Town" column="Town">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="171" visible="True" name="SorterMobilePhone" wizardSortingType="SimpleDir" PathID="patient_pregnancy_deliverPage_HeaderSorterMobilePhone" wizardCaption="{res:MobilePhone}" column="MobilePhone">
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
				<Section id="53" visible="True" lines="1" name="FacilityName_Header">
					<Components>
						<ReportLabel id="60" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" fieldSource="FacilityName" wizardCaption="FacilityName" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliverFacilityName_HeaderFacilityName">
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
				<Section id="54" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="71" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliverDetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Link id="73" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="patient_PatientID" fieldSource="PatientID" wizardCaption="patient_PatientID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="patient_pregnancy_deliverDetailpatient_PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="98" sourceType="DataField" name="PatientID" source="PatientID"/>
							</LinkParameters>
						</Link>
						<Link id="74" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="FamilyName" fieldSource="FamilyName" wizardCaption="FamilyName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliverDetailFamilyName" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="99" sourceType="DataField" name="PatientID" source="PatientID"/>
							</LinkParameters>
						</Link>
						<ReportLabel id="75" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="GivenName" fieldSource="GivenName" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliverDetailGivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="77" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Calc_DeliveryDate" fieldSource="Calc_DeliveryDate" wizardCaption="Calc_DeliveryDate" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliverDetailCalc_DeliveryDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="79" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="DataDelivery" fieldSource="DataDelivery" wizardCaption="DataDelivery" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliverDetailDataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Label id="101" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PregnancyRecNr" fieldSource="PregnancyRecNr" wizardCaption="PregnancyRecNr" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliverDetailPregnancyRecNr" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="pregnancy_maint.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="161" sourceType="DataField" name="PregnancyID" source="pregnancy_PregnancyID"/>
							</LinkParameters>
						</Label>
						<ReportLabel id="168" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Town" PathID="patient_pregnancy_deliverDetailTown" fieldSource="Town">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="169" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MobilePhone" PathID="patient_pregnancy_deliverDetailMobilePhone" fieldSource="MobilePhone">
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
				<Section id="55" visible="True" lines="1" name="FacilityName_Footer">
					<Components>
						<ReportLabel id="61" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="FacilityName" name="Count_patient_PatientID" fieldSource="PatientID" summarised="True" function="Count" wizardCaption="{res:patient_PatientID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="patient_pregnancy_deliverFacilityName_FooterCount_patient_PatientID">
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
				<Section id="56" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="57" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="65" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_patient_PatientID" fieldSource="PatientID" summarised="True" function="Count" wizardCaption="{res:patient_PatientID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Sum}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="patient_pregnancy_deliverReport_FooterTotalSum_patient_PatientID">
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
				<Section id="58" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="62" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="patient_pregnancy_deliverPage_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="63" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="64" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="167" conditionType="Parameter" useIsNull="False" field="referral.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="Or" format="0;(0)" defaultValue="0" parameterSource="s_Facilities" leftBrackets="1"/>
				<TableParameter id="80" conditionType="Parameter" useIsNull="False" field="pregnancy.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" leftBrackets="0" rightBrackets="1" parameterSource="s_Facilities"/>
				<TableParameter id="67" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="2" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery" rightBrackets="0" leftBrackets="0"/>
				<TableParameter id="96" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="104" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyRecNr" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_PregnancyRecNr" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="69" conditionType="Parameter" useIsNull="False" field="patient.FamilyName" parameterSource="s_FamilyName" dataType="Memo" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="70" conditionType="Parameter" useIsNull="False" field="patient.GivenName" parameterSource="s_GivenName" dataType="Memo" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="5" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="108" conditionType="Parameter" useIsNull="False" field="pregnancy.Calc_DeliveryDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" rightBrackets="0" leftBrackets="0" parameterSource="s_Calc_DeliveryDate"/>
				<TableParameter id="110" conditionType="Parameter" useIsNull="False" field="pregnancy.Calc_DeliveryDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_Calc_DeliveryDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="172" conditionType="Parameter" useIsNull="False" field="patient.Discharged" dataType="Integer" searchConditionType="Equal" parameterType="Expression" logicOperator="And" parameterSource="0"/>
				<TableParameter id="173" conditionType="Parameter" useIsNull="False" field="patient.PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_patient_PatientID"/>
				<TableParameter id="174" conditionType="Parameter" useIsNull="False" field="facilities.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" format="0;(0)" parameterSource="s_Facilities"/>
				<TableParameter id="175" conditionType="Expression" useIsNull="False" field="pregnancy.Calc_DeliveryDate" dataType="Date" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="pregnancy.Calc_DeliveryDate&gt;(CURRENT_DATE)-100" parameterSource="Calc_DeliveryDate"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="12" tableName="pregnancy" posLeft="387" posTop="9" posWidth="159" posHeight="354"/>
				<JoinTable id="20" tableName="delivery" posLeft="645" posTop="61" posWidth="160" posHeight="180"/>
				<JoinTable id="115" tableName="facilities" posLeft="577" posTop="293" posWidth="95" posHeight="104"/>
				<JoinTable id="123" tableName="patient" posLeft="21" posTop="10" posWidth="138" posHeight="437"/>
				<JoinTable id="132" tableName="visit" posLeft="911" posTop="117" posWidth="132" posHeight="180"/>
				<JoinTable id="151" tableName="referral" posLeft="937" posTop="332" posWidth="95" posHeight="136"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="162" tableLeft="delivery" tableRight="pregnancy" fieldLeft="delivery.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="163" tableLeft="pregnancy" tableRight="facilities" fieldLeft="pregnancy.FacilityID" fieldRight="facilities.FacilityID" joinType="left" conditionType="Equal"/>
				<JoinTable2 id="164" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="left" conditionType="Equal"/>
				<JoinTable2 id="165" tableLeft="visit" tableRight="pregnancy" fieldLeft="visit.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="166" tableLeft="referral" tableRight="visit" fieldLeft="referral.VisitID" fieldRight="visit.VisitID" joinType="right" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="19" tableName="pregnancy" fieldName="Calc_DeliveryDate"/>
				<Field id="36" tableName="delivery" fieldName="DataDelivery"/>
				<Field id="103" tableName="pregnancy" fieldName="PregnancyRecNr"/>
				<Field id="117" tableName="facilities" fieldName="facilities.*"/>
				<Field id="126" tableName="patient" fieldName="patient.*"/>
				<Field id="131" tableName="pregnancy" fieldName="pregnancy.FacilityID" alias="pregnancy_FacilityID"/>
				<Field id="144" tableName="visit" fieldName="visit.VisitID" alias="visit_VisitID"/>
				<Field id="154" tableName="referral" fieldName="referral.*"/>
				<Field id="160" tableName="pregnancy" fieldName="pregnancy.PregnancyID" alias="pregnancy_PregnancyID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="52" name="FacilityName" field="FacilityName" sqlField="facilities.FacilityName" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="37" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_facilities_patie" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_facilities_patie} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_expected_date_of_delivery_facilities.ccp" PathID="delivery_facilities_patie" pasteActions="pasteActions">
			<Components>
				<Button id="38" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_facilities_patieButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_Calc_DeliveryDate" wizardCaption="{res:Calc_DeliveryDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_paties_Calc_DeliveryDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" caption="{res:Calc_DeliveryDate}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="40" name="DatePicker_s_Calc_DeliveryDate" control="s_Calc_DeliveryDate" wizardSatellite="True" wizardControl="s_Calc_DeliveryDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_patieDatePicker_s_Calc_DeliveryDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_paties_DataDelivery" caption="{res:DataDelivery}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="42" name="DatePicker_s_DataDelivery" control="s_DataDelivery" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_patieDatePicker_s_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_patient_PatientID" wizardCaption="{res:patient_PatientID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="delivery_facilities_paties_patient_PatientID" caption="{res:PatientID}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_FamilyName" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" PathID="delivery_facilities_paties_FamilyName" caption="{res:LastNamePatient1}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_GivenName" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" PathID="delivery_facilities_paties_GivenName" caption="{res:FirstNamePatient1}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_Calc_DeliveryDate1" wizardCaption="{res:Calc_DeliveryDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_paties_Calc_DeliveryDate1" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" caption="{res:Calc_DeliveryDate}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="92" name="DatePicker_s_Calc_DeliveryDate1" control="s_Calc_DeliveryDate1" wizardSatellite="True" wizardControl="s_Calc_DeliveryDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_patieDatePicker_s_Calc_DeliveryDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery1" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_facilities_paties_DataDelivery1" caption="{res:DataDelivery}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="95" name="DatePicker_s_DataDelivery1" control="s_DataDelivery1" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_facilities_patieDatePicker_s_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="delivery_facilities_paties_PregnancyRecNr" caption="{res:PregnancyRecNr}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="49" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
		<Link id="46" visible="No" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_expected_date_of_delivery_facilities.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="48" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="47" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_expected_date_of_delivery_facilities_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_expected_date_of_delivery_facilities.php" forShow="True" url="report_expected_date_of_delivery_facilities.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="113" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
