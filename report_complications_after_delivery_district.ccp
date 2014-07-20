<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="45" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="delivery_icd10_all_pcompl1" wizardCaption="{res:CCS_SearchFormPrefix} {res:delivery_icd10_all_pcompl} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="report_complications_after_delivery_district.ccp" PathID="delivery_icd10_all_pcompl1" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
			<Components>
				<Button id="46" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="delivery_icd10_all_pcompl1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_icd10_all_pcompl1s_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="70" name="DatePicker_s_BirthDate" control="s_DataDelivery" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_icd10_all_pcompl1DatePicker_s_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DataDelivery1" wizardCaption="{res:BirthDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="delivery_icd10_all_pcompl1s_DataDelivery1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="74" name="DatePicker_s_BirthDate1" control="s_DataDelivery1" wizardSatellite="True" wizardControl="s_BirthDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="delivery_icd10_all_pcompl1DatePicker_s_BirthDate1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_icd10_all_ICD10ID1" wizardCaption="{res:icd10_all_ICD10ID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="delivery_icd10_all_pcompl1s_icd10_all_ICD10ID1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_icd10_all_ICD10ID2" wizardCaption="{res:icd10_all_ICD10ID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="delivery_icd10_all_pcompl1s_icd10_all_ICD10ID2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" PathID="delivery_icd10_all_pcompl1s_FacilityName" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityName" textColumn="FacilityName">
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
		<Report id="33" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" name="delivery_pcomplications_i1" connection="registry_db" dataSource="delivery, pcomplications, icd10_all, facilities" pageSizeLimit="100" activeCollection="TableParameters">
			<Components>
				<Section id="48" visible="True" lines="0" name="Report_Header">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="49" visible="True" lines="1" name="Page_Header">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="51" visible="True" lines="1" name="icd10_all_ICD10ID_Header">
					<Components>
						<ReportLabel id="57" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="icd10_all_ICD10ID" fieldSource="icd10_all_ICD10ID" PathID="delivery_pcomplications_i1icd10_all_ICD10ID_Headericd10_all_ICD10ID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="58" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="icd10_all_ICD10ID" name="Count_delivery_DeliveryID" function="Count" PathID="delivery_pcomplications_i1icd10_all_ICD10ID_HeaderCount_delivery_DeliveryID">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="87" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="icd10_all_Name" fieldSource="DiseaseName" PathID="delivery_pcomplications_i1icd10_all_ICD10ID_Headericd10_all_Name">
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
				<Section id="52" visible="False" lines="1" name="Detail">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="53" visible="True" lines="1" name="icd10_all_ICD10ID_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="54" visible="True" lines="1" name="Report_Footer">
					<Components>
						<Panel id="55" visible="True" name="NoRecords">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="65" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_delivery_DeliveryID" function="Count" PathID="delivery_pcomplications_i1Report_FooterTotalCount_delivery_DeliveryID">
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
				<Section id="56" visible="True" lines="2" name="Page_Footer">
					<Components>
						<Panel id="59" visible="True" name="PageBreak">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="60" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" PathID="delivery_pcomplications_i1Page_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="61" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentPage" fieldSource="PageNumber" PathID="delivery_pcomplications_i1Page_FooterReport_CurrentPage">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="62" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalPages" fieldSource="TotalPages" PathID="delivery_pcomplications_i1Page_FooterReport_TotalPages">
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
										<Action actionName="Hide-Show Component" actionCategory="General" id="86" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
				<TableParameter id="44" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="NotNull" parameterType="URL" parameterSource="DataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" logicOperator="And"/>
				<TableParameter id="66" conditionType="Parameter" useIsNull="False" field="icd10_all.ICD10ID" dataType="Text" searchConditionType="GreaterThanOrEqual" parameterType="URL" logicOperator="And" orderNumber="1" parameterSource="s_icd10_all_ICD10ID1"/>
				<TableParameter id="83" conditionType="Parameter" useIsNull="False" field="icd10_all.ICD10ID" dataType="Text" searchConditionType="LessThanOrEqual" parameterType="URL" parameterSource="s_icd10_all_ICD10ID2" logicOperator="And"/>
				<TableParameter id="75" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="GreaterThanOrEqual" parameterType="URL" parameterSource="s_DataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" logicOperator="And"/>
				<TableParameter id="76" conditionType="Parameter" useIsNull="False" field="delivery.DataDelivery" dataType="Date" searchConditionType="LessThanOrEqual" parameterType="URL" parameterSource="s_DataDelivery1" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" logicOperator="And"/>
				<TableParameter id="85" conditionType="Parameter" useIsNull="False" field="facilities.FacilityName" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_FacilityName"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="34" tableName="delivery" posWidth="160" posHeight="413" posLeft="10" posTop="10"/>
				<JoinTable id="36" tableName="pcomplications" posWidth="115" posHeight="104" posLeft="191" posTop="10"/>
				<JoinTable id="39" tableName="icd10_all" posWidth="160" posHeight="152" posLeft="327" posTop="10"/>
				<JoinTable id="89" tableName="facilities" posLeft="273" posTop="234" posWidth="95" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="37" tableLeft="pcomplications" fieldLeft="pcomplications.DeliveryID" tableRight="delivery" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="40" tableLeft="pcomplications" fieldLeft="pcomplications.ICD10ID" tableRight="icd10_all" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="90" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="42" tableName="icd10_all" fieldName="icd10_all.ICD10ID" alias="icd10_all_ICD10ID"/>
				<Field id="43" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
				<Field id="88" tableName="icd10_all" fieldName="DiseaseName"/>
				<Field id="92" tableName="facilities" fieldName="FacilityName"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="50" name="icd10_all_ICD10ID" field="icd10_all_ICD10ID" sqlField="icd10_all.ICD10ID" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Link id="21" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="report_complications_after_delivery_district.ccp" wizardTheme="{ccs_style}" wizardThemeType="File" wizardDefaultValue="{res:CCS_ReportPrintLink}" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="23" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="22" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="report_complications_after_delivery_district_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="report_complications_after_delivery_district.php" forShow="True" url="report_complications_after_delivery_district.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="93" groupID="1"/>
		<Group id="94" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
