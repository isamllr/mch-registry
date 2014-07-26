<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="9" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="57" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="medicationatcode" name="medicationatcode" orderBy="ATCode" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:medicationatcode} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteActions="pasteActions">
			<Components>
				<Link id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="medicationatcode_Insert" hrefSource="medication_admin_maint.ccp" removeParameters="ATCodeID" wizardThemeItem="FooterA" wizardDefaultValue="{res:CCS_InsertLink}" wizardUseTemplateBlock="False" PathID="medicationatcodemedicationatcode_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="64" fieldSourceType="DBColumn" dataType="Text" html="False" name="medicationatcode_TotalRecords" wizardUseTemplateBlock="False" PathID="medicationatcodemedicationatcode_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="65"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="68" visible="True" name="Sorter_MedicationName" column="MedicationName" wizardCaption="{res:MedicationName}" wizardSortingType="SimpleDir" wizardControl="MedicationName" wizardAddNbsp="False" PathID="medicationatcodeSorter_MedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="71" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="MedicationName" fieldSource="MedicationName" wizardCaption="{res:MedicationName}" wizardSize="50" wizardMaxLength="200" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" hrefSource="medication_admin_maint.ccp" wizardThemeItem="GridA" PathID="medicationatcodeMedicationName">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="72" sourceType="DataField" format="yyyy-mm-dd" name="ATCodeID" source="ATCodeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Navigator id="75" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Sorter id="69" visible="True" name="Sorter_ATCode" column="ATCode" PathID="medicationatcodeSorter_ATCode">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="74" fieldSourceType="DBColumn" dataType="Text" html="False" name="ATCode" fieldSource="ATCode" wizardCaption="{res:ATCode}" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="medicationatcodeATCode">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="66" conditionType="Parameter" useIsNull="False" field="ATCode" parameterSource="s_ATCode" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
				<TableParameter id="67" conditionType="Parameter" useIsNull="False" field="MedicationName" parameterSource="s_MedicationName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
				<Field id="62" tableName="medicationatcode" fieldName="ATCodeID"/>
				<Field id="70" tableName="medicationatcode" fieldName="MedicationName"/>
				<Field id="73" tableName="medicationatcode" fieldName="ATCode"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="58" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="medicationatcodeSearch" wizardCaption="{res:CCS_SearchFormPrefix} {res:medicationatcode} {res:CCS_SearchFormSuffix}" wizardOrientation="Vertical" wizardFormMethod="post" returnPage="medication_admin_maint.ccp" PathID="medicationatcodeSearch">
			<Components>
				<Button id="59" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="medicationatcodeSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_ATCode" wizardCaption="{res:ATCode}" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" PathID="medicationatcodeSearchs_ATCode">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_MedicationName" wizardCaption="{res:MedicationName}" wizardSize="50" wizardMaxLength="200" wizardIsPassword="False" PathID="medicationatcodeSearchs_MedicationName">
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
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="76" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="medicationatcode1" dataSource="medicationatcode" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:medicationatcode} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="medicationatcode1">
			<Components>
				<Button id="77" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="medicationatcode1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="78" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="medicationatcode1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="81" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="medicationatcode1Button_Cancel">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="85"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ATCode" fieldSource="ATCode" required="False" caption="{res:ATCode}" wizardCaption="{res:ATCode}" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="medicationatcode1ATCode">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MedicationName" fieldSource="MedicationName" required="True" caption="{res:MedicationName}" wizardCaption="{res:MedicationName}" wizardSize="50" wizardMaxLength="200" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="medicationatcode1MedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="82" conditionType="Parameter" useIsNull="False" field="ATCodeID" parameterSource="ATCodeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
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
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="medication_admin_maint.php" forShow="True" url="medication_admin_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="medication_admin_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="56" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
