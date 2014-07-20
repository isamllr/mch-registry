<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Report id="3" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="registry_db" dataSource="patient, visit, pregnancy" name="patient_visit_pregnancy" orderBy="NextVisit" pageSizeLimit="100" wizardCaption="{res:CCS_ReportFormPrefix} {res:patientvisitpregnancy} {res:CCS_ReportFormSuffix}" wizardLayoutType="Tabular">
			<Components>
				<Section id="29" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
						<ReportLabel id="35" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="patient_visit_pregnancyReport_HeaderReport_TotalRecords">
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
				<Section id="30" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="44" visible="True" name="Sorter_NextVisit" column="NextVisit" wizardCaption="{res:NextVisit}" wizardSortingType="SimpleDir" wizardControl="NextVisit">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="48" visible="True" name="Sorter_Town" column="Town" wizardCaption="{res:Town}" wizardSortingType="SimpleDir" wizardControl="Town">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="50" visible="True" name="Sorter_MobilePhone" column="MobilePhone" wizardCaption="{res:MobilePhone}" wizardSortingType="SimpleDir" wizardControl="MobilePhone">
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
				<Section id="31" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="43" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Page" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_visit_pregnancyDetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="45" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="NextVisit" fieldSource="NextVisit" wizardCaption="NextVisit" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_visit_pregnancyDetailNextVisit">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="46" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="FamilyName" fieldSource="FamilyName" wizardCaption="FamilyName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_visit_pregnancyDetailFamilyName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="47" fieldSourceType="DBColumn" dataType="Memo" html="False" hideDuplicates="False" resetAt="Report" name="GivenName" fieldSource="GivenName" wizardCaption="GivenName" wizardSize="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_visit_pregnancyDetailGivenName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="49" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Town" fieldSource="Town" wizardCaption="Town" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_visit_pregnancyDetailTown">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="51" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MobilePhone" fieldSource="MobilePhone" wizardCaption="MobilePhone" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="patient_visit_pregnancyDetailMobilePhone">
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
				<Section id="32" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="33" visible="True" name="NoRecords" wizardNoRecords="{res:CCS_NoRecords}">
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
				<Section id="34" visible="True" lines="2" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<Panel id="36" visible="True" name="PageBreak">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="37" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="patient_visit_pregnancyPage_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="38" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="39" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
				<TableParameter id="40" conditionType="Parameter" useIsNull="False" field="FamilyName" parameterSource="s_FamilyName" dataType="Memo" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
				<TableParameter id="41" conditionType="Parameter" useIsNull="False" field="GivenName" parameterSource="s_GivenName" dataType="Memo" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="42" conditionType="Parameter" useIsNull="False" field="NextVisit" parameterSource="s_NextVisit" dataType="Date" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="patient" posLeft="10" posTop="10" posWidth="138" posHeight="245"/>
				<JoinTable id="5" tableName="visit" posLeft="478" posTop="32" posWidth="132" posHeight="252"/>
				<JoinTable id="6" tableName="pregnancy" posLeft="169" posTop="10" posWidth="159" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="7" tableLeft="visit" tableRight="pregnancy" fieldLeft="visit.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="8" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="9" tableName="patient" fieldName="GivenName"/>
				<Field id="12" tableName="patient" fieldName="FamilyName"/>
				<Field id="13" tableName="pregnancy" fieldName="pregnancy.PatientID" alias="pregnancy_PatientID"/>
				<Field id="14" tableName="pregnancy" fieldName="pregnancy.PregnancyID" alias="pregnancy_PregnancyID"/>
				<Field id="15" tableName="visit" fieldName="visit.PregnancyID" alias="visit_PregnancyID"/>
				<Field id="16" tableName="visit" fieldName="NextVisit"/>
				<Field id="17" tableName="patient" fieldName="Town"/>
				<Field id="18" tableName="patient" fieldName="MobilePhone"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="19" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="patient_pregnancy_visit" wizardCaption="{res:CCS_SearchFormPrefix} {res:patient_pregnancy_visit} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_patient_attendance.ccp" PathID="patient_pregnancy_visit">
			<Components>
				<Button id="20" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="patient_pregnancy_visitButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_FamilyName" wizardCaption="{res:FamilyName}" wizardSize="50" wizardIsPassword="False" PathID="patient_pregnancy_visits_FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_GivenName" wizardCaption="{res:GivenName}" wizardSize="50" wizardIsPassword="False" PathID="patient_pregnancy_visits_GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_NextVisit" wizardCaption="{res:NextVisit}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="patient_pregnancy_visits_NextVisit" caption="{res:NextVisit}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="24" name="DatePicker_s_NextVisit" control="s_NextVisit" wizardSatellite="True" wizardControl="s_NextVisit" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="patient_pregnancy_visitDatePicker_s_NextVisit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="28" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
		<Link id="25" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_patient_attendance.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="27" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="26" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_patient_attendance_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_patient_attendance.php" forShow="True" url="report_patient_attendance.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
