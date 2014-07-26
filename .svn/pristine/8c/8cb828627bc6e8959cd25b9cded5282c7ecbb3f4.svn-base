<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" connection="registry_db" dataSource="patient, pregnancy, delivery, facilities" name="patient_pregnancy_deliver" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:patientpregnancydeliveryfacilitiesreferral} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="58" visible="True" lines="1" name="Page_Footer">
					<Components>
						<ReportLabel id="62" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" PathID="patient_pregnancy_deliverPage_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="63" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="133" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
				<Section id="56" visible="True" lines="1" name="Report_Footer">
					<Components>
						<Panel id="57" visible="True" name="NoRecords">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="65" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalSum_patient_PatientID" fieldSource="patient_PatientID" function="Count" PathID="patient_pregnancy_deliverReport_FooterTotalSum_patient_PatientID">
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
						<ReportLabel id="61" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="FacilityName" name="Count_patient_PatientID" fieldSource="patient_PatientID" function="Count" PathID="patient_pregnancy_deliverFacilityName_FooterCount_patient_PatientID">
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
						<ReportLabel id="71" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" PathID="patient_pregnancy_deliverDetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Link id="73" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="patient_PatientID" fieldSource="patient_PatientID" hrefSource="patient_maint_district.ccp" PathID="patient_pregnancy_deliverDetailpatient_PatientID" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="98" sourceType="DataField" format="yyyy-mm-dd" name="PatientID" source="patient_PatientID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<ReportLabel id="77" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Calc_DeliveryDate" fieldSource="Calc_DeliveryDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" PathID="patient_pregnancy_deliverDetailCalc_DeliveryDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="79" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="DataDelivery" fieldSource="DataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" PathID="patient_pregnancy_deliverDetailDataDelivery">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="104" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PregnancyRecNr" fieldSource="PregnancyRecNr" PathID="patient_pregnancy_deliverDetailPregnancyRecNr">
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
				<Section id="53" visible="True" lines="1" name="FacilityName_Header">
					<Components>
						<ReportLabel id="60" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FacilityName" fieldSource="FacilityName" PathID="patient_pregnancy_deliverFacilityName_HeaderFacilityName">
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
				<Section id="51" visible="True" lines="1" name="Page_Header">
					<Components>
						<Sorter id="76" visible="True" name="Sorter_Calc_DeliveryDate" column="Calc_DeliveryDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="78" visible="True" name="Sorter_DataDelivery" column="DataDelivery">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="103" visible="True" name="Sorter_PregnancyRecNr" column="PregnancyRecNr">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="107" visible="True" name="Sorter1" column="patient.PatientID" PathID="patient_pregnancy_deliverPage_HeaderSorter1">
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
				<Section id="50" visible="True" lines="0" name="Report_Header">
					<Components>
						<ReportLabel id="59" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" PathID="patient_pregnancy_deliverReport_HeaderReport_TotalRecords">
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
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="67" conditionType="Parameter" useIsNull="False" field="DataDelivery" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="2" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="96" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_DataDelivery1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="68" conditionType="Parameter" useIsNull="False" field="patient.PatientID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3" leftBrackets="0" rightBrackets="0" parameterSource="s_patient_PatientID"/>
				<TableParameter id="106" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyRecNr" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_PregnancyRecNr" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="93" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="pregnancy.Calc_DeliveryDate IS NOT NULL" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="66" conditionType="Parameter" useIsNull="False" field="pregnancy.Calc_DeliveryDate" dataType="Date" logicOperator="And" searchConditionType="GreaterThanOrEqual" parameterType="URL" orderNumber="1" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_Calc_DeliveryDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="90" conditionType="Parameter" useIsNull="False" field="pregnancy.Calc_DeliveryDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" rightBrackets="0" leftBrackets="0" parameterSource="s_Calc_DeliveryDate1"/>
				<TableParameter id="70" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="BeginsWith" parameterType="URL" parameterSource="s_FacilityName" logicOperator="And" orderNumber="5" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="142" conditionType="Parameter" useIsNull="False" field="patient.Discharged" dataType="Integer" searchConditionType="Equal" parameterType="Expression" logicOperator="And" parameterSource="0"/>
				<TableParameter id="143" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="pregnancy.Calc_DeliveryDate&gt;(CURRENT_DATE)-100"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="patient" posLeft="10" posTop="10" posWidth="138" posHeight="453"/>
				<JoinTable id="12" tableName="pregnancy" posLeft="387" posTop="9" posWidth="159" posHeight="354"/>
				<JoinTable id="20" tableName="delivery" posLeft="645" posTop="61" posWidth="160" posHeight="180"/>
				<JoinTable id="26" tableName="facilities" posWidth="95" posHeight="104" posLeft="270" posTop="360"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="137" tableLeft="delivery" tableRight="pregnancy" fieldLeft="delivery.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="138" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="139" tableLeft="pregnancy" tableRight="facilities" fieldLeft="pregnancy.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="5" tableName="patient" fieldName="patient.PatientID" alias="patient_PatientID"/>
				<Field id="8" tableName="patient" fieldName="patient.FacilityID" alias="patient_FacilityID"/>
				<Field id="19" tableName="pregnancy" fieldName="Calc_DeliveryDate"/>
				<Field id="36" tableName="delivery" fieldName="DataDelivery"/>
				<Field id="105" tableName="pregnancy" fieldName="PregnancyRecNr"/>
				<Field id="136" tableName="delivery" fieldName="delivery.FacilityID" alias="delivery_FacilityID"/>
				<Field id="101" tableName="facilities" fieldName="FacilityName"/>
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
		<Record id="37" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_facilities_patie" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_facilities_patie} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_expected_date_of_delivery_district.ccp" PathID="delivery_facilities_patie" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
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
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_patient_PatientID" wizardCaption="{res:patient_PatientID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="delivery_facilities_paties_patient_PatientID" caption="{res:PatientID}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityName" PathID="delivery_facilities_paties_FacilityName" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityName" textColumn="FacilityName" caption="{res:FacilityName}">
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
				</ListBox>
				<TextBox id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="delivery_facilities_paties_PregnancyRecNr" caption="{res:PregnancyRecNr}">
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
		<Link id="46" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_expected_date_of_delivery_facilities.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
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
		<CodeFile id="Events" language="PHPTemplates" name="report_expected_date_of_delivery_district_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_expected_date_of_delivery_district.php" forShow="True" url="report_expected_date_of_delivery_district.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="140" groupID="1"/>
		<Group id="141" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
