<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="54" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" connection="registry_db" dataSource="patient, pregnancy, delivery" name="patient_pregnancy_deliver1" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:patientpregnancydelivery} {res:CCS_ReportFormSuffix}" wizardLayoutType="GroupLeft" activeCollection="TableParameters" groupBy="pregnancy.PregnancyID">
			<Components>
				<Section id="68" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
						<ReportLabel id="77" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="patient_pregnancy_deliver1Report_HeaderReport_TotalRecords">
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
				<Section id="69" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader" wizardAllowSorting="True" pasteActions="pasteActions">
					<Components>
						<Sorter id="86" visible="True" name="Sorter_PregnancyRecNr" column="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="90" visible="True" name="Sorter_MobilePhone" column="MobilePhone" wizardCaption="{res:MobilePhone}" wizardSortingType="SimpleDir" wizardControl="MobilePhone">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="110" visible="True" name="PregRegDate" wizardSortingType="SimpleDir" PathID="patient_pregnancy_deliver1Page_HeaderPregRegDate" wizardCaption="{res:PregRegDate}" column="PregRegDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="128" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="patient_pregnancy_deliver1Page_HeaderSorter1" wizardCaption="{res:DateDelivery}" column="DataDelivery">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="137" visible="True" name="Sorter_PregnancyRecNr1" column="FamilyName" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr" connection="registry_db">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="138" visible="True" name="Sorter2" wizardSortingType="SimpleDir" PathID="patient_pregnancy_deliver1Page_HeaderSorter2" wizardCaption="{res:FirstNamePatient1}" column="GivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="148" visible="True" name="Sorter3" wizardSortingType="SimpleDir" PathID="patient_pregnancy_deliver1Page_HeaderSorter3" wizardCaption="{res:Calc_DeliveryDate}" column="Calc_DeliveryDate">
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
				<Section id="71" visible="True" lines="0" name="Town_Header">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="72" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="84" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="True" resetAt="Report" name="Town" fieldSource="Town" wizardCaption="Town" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliver1DetailTown">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="85" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliver1DetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Link id="87" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PregnancyRecNr" fieldSource="PregnancyRecNr" wizardCaption="PregnancyRecNr" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliver1DetailPregnancyRecNr" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="pregnancy_maint.ccp">
							<Components/>
							<Events/>

							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="140" sourceType="DataField" name="PregnancyID" source="pregnancy_PregnancyID"/>
								<LinkParameter id="144" sourceType="DataField" name="PatientID" source="patient_PatientID"/>
							</LinkParameters>
						</Link>
						<Link id="88" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="FamilyName" fieldSource="FamilyName" wizardCaption="FamilyName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliver1DetailFamilyName" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="patient_maint_fac.ccp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="139" sourceType="DataField" name="PatientID" source="patient_PatientID"/>
							</LinkParameters>
						</Link>
						<ReportLabel id="89" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="GivenName" fieldSource="GivenName" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliver1DetailGivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="91" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MobilePhone" fieldSource="MobilePhone" wizardCaption="MobilePhone" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_pregnancy_deliver1DetailMobilePhone">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="111" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel1" PathID="patient_pregnancy_deliver1DetailReportLabel1" fieldSource="PregRegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="129" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="DateDelivery" PathID="patient_pregnancy_deliver1DetailDateDelivery" fieldSource="DataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="146" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Calc_DeliveryDate" PathID="patient_pregnancy_deliver1DetailCalc_DeliveryDate" fieldSource="Calc_DeliveryDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
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
				<Section id="73" visible="True" lines="1" name="Town_Footer" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="126" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Town" name="Count_PatientID" summarised="True" function="Count" wizardCaption="{res:MobilePhone}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="{res:Count}" wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="patient_pregnancy_deliver1Town_FooterCount_PatientID">
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
				<Section id="74" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
					<Components>
						<Panel id="75" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="127" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_PatientID" function="Count" PathID="patient_pregnancy_deliver1Report_FooterTotalCount_PatientID">
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
				<Section id="76" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="79" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="patient_pregnancy_deliver1Page_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="80" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="81" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
				<TableParameter id="104" conditionType="Parameter" useIsNull="False" field="pregnancy.FacilityID" dataType="Integer" searchConditionType="In" parameterType="Session" logicOperator="And" defaultValue="0" format="0;(0)" leftBrackets="0" parameterSource="s_Facilities" rightBrackets="0"/>
				<TableParameter id="83" conditionType="Parameter" useIsNull="False" field="patient.FamilyName" parameterSource="s_FamilyName" dataType="Memo" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="96" conditionType="Parameter" useIsNull="False" field="patient.GivenName" dataType="Memo" searchConditionType="BeginsWith" parameterType="URL" logicOperator="And" parameterSource="s_GivenName" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="102" conditionType="Parameter" useIsNull="False" field="patient.Town" dataType="Text" searchConditionType="BeginsWith" parameterType="URL" logicOperator="And" parameterSource="s_Town" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="133" conditionType="Parameter" useIsNull="False" field="pregnancy.PregRegDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="134" conditionType="Parameter" useIsNull="False" field="pregnancy.PregRegDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" parameterSource="s_PregRegDate1" leftBrackets="0" rightBrackets="0"/>
				<TableParameter id="135" conditionType="Parameter" useIsNull="False" field="pregnancy.Calc_DeliveryDate" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" leftBrackets="0" rightBrackets="0" parameterSource="s_DataDelivery"/>
				<TableParameter id="136" conditionType="Parameter" useIsNull="False" field="pregnancy.Calc_DeliveryDate" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" logicOperator="And" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" leftBrackets="0" rightBrackets="0" parameterSource="s_DataDelivery1"/>
				<TableParameter id="145" conditionType="Parameter" useIsNull="False" field="patient.Discharged" dataType="Integer" searchConditionType="Equal" parameterType="Expression" logicOperator="And" parameterSource="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="55" tableName="patient" posLeft="10" posTop="10" posWidth="138" posHeight="369"/>
				<JoinTable id="56" tableName="pregnancy" posLeft="169" posTop="10" posWidth="159" posHeight="276"/>
				<JoinTable id="58" tableName="delivery" posLeft="349" posTop="10" posWidth="160" posHeight="399"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="142" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="right" conditionType="Equal"/>
				<JoinTable2 id="143" tableLeft="delivery" tableRight="pregnancy" fieldLeft="delivery.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="right" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="112" tableName="patient" fieldName="FamilyName"/>
				<Field id="116" tableName="patient" fieldName="GivenName"/>
				<Field id="117" tableName="patient" fieldName="patient.PatientID" alias="patient_PatientID"/>
				<Field id="118" tableName="patient" fieldName="Town"/>
				<Field id="119" tableName="patient" fieldName="MobilePhone"/>
				<Field id="120" tableName="pregnancy" fieldName="pregnancy.PatientID" alias="pregnancy_PatientID"/>
				<Field id="121" tableName="pregnancy" fieldName="PregRegDate"/>
				<Field id="122" tableName="pregnancy" fieldName="PregnancyRecNr"/>
				<Field id="123" tableName="pregnancy" fieldName="pregnancy.PregnancyID" alias="pregnancy_PregnancyID"/>
				<Field id="124" tableName="delivery" fieldName="delivery.PregnancyID" alias="delivery_PregnancyID"/>
				<Field id="125" tableName="delivery" fieldName="DataDelivery"/>
				<Field id="147" tableName="pregnancy" fieldName="Calc_DeliveryDate"/>
</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="70" name="Town" field="Town" sqlField="patient.Town" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Link id="64" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print1" hrefSource="report_localities.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print1">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="66" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="65" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Record id="97" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="patient" wizardCaption="{res:CCS_SearchFormPrefix} {res:patient} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_localities.ccp" PathID="patient" pasteActions="pasteActions">
			<Components>
				<Button id="98" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="patientButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_FamilyName" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" PathID="patients_FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_GivenName" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" PathID="patients_GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="101" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Town" wizardCaption="{res:Town}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="patients_Town">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_PregRegDate" wizardCaption="{res:Calc_DeliveryDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="patients_PregRegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" caption="{res:PregRegDate}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="40" name="DatePicker_s_Calc_DeliveryDate" control="s_PregRegDate" wizardSatellite="True" wizardControl="s_Calc_DeliveryDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="patientDatePicker_s_Calc_DeliveryDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="132" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_PregRegDate1" wizardCaption="{res:Calc_DeliveryDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="patients_PregRegDate1" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" caption="{res:PregRegDate}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="92" name="DatePicker_s_Calc_DeliveryDate1" control="s_PregRegDate1" wizardSatellite="True" wizardControl="s_Calc_DeliveryDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="patientDatePicker_s_Calc_DeliveryDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="patients_DataDelivery" caption="{res:DataDelivery}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="42" name="DatePicker_s_DataDelivery" control="s_DataDelivery" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="patientDatePicker_s_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery1" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="patients_DataDelivery1" caption="{res:DataDelivery}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="95" name="DatePicker_s_DataDelivery1" control="s_DataDelivery1" wizardSatellite="True" wizardControl="s_DataDelivery" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="patientDatePicker_s_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
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
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_localities_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_localities.php" forShow="True" url="report_localities.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="141" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
