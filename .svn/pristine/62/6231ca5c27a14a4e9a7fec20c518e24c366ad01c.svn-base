<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="noaccess.ccp" pasteActions="pasteActions">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="newborn" dataSource="newborn, delivery" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:newborn} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="newborn" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" returnPage="delivery_maint.ccp" activeCollection="IFormElements" activeTableType="newborn" customInsert="newborn" customInsertType="Table" customUpdate="newborn" customUpdateType="Table" customDelete="newborn" customDeleteType="Table" removeParameters="NewBornID">
			<Components>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="newbornButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="newbornButton_Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="265"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="6" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="newbornButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="7" message="{res:CCS_DeleteConfirmation}" id_oncopy="7"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="266"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="8" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="newbornButton_Cancel">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="267"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<RadioButton id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="TreatedNICU" fieldSource="TreatedNICU" required="True" caption="{res:TreatedNICU}" wizardCaption="{res:TreatedNICU}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornTreatedNICU" sourceType="ListOfValues" html="True" dataSource="1;{res:RYes};0;{res:RNo}" defaultValue="0">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="113" id_oncopy="113"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</RadioButton>
				<RadioButton id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="VaccinationHepB" fieldSource="VaccinationHepB" required="True" caption="{res:VaccinationHepB}" wizardCaption="{res:VaccinationHepB}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornVaccinationHepB" sourceType="ListOfValues" html="True" dataSource="1;{res:RYes};0;{res:RNo}">
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
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DischargeDate" fieldSource="DischargeDate" required="False" caption="{res:DischargeDateTime}" wizardCaption="{res:DischargeDateTime}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornDischargeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="41" name="DatePicker_DischargeDateTime" control="DischargeDate" wizardSatellite="True" wizardControl="DischargeDateTime" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="newbornDatePicker_DischargeDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Lenght" fieldSource="Lenght" required="True" caption="{res:Lenght}" wizardCaption="{res:Lenght}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornLenght" validationRule="($this-&gt;Lenght-&gt;GetValue() &gt; 0 &amp;&amp; $this-&gt;Lenght-&gt;GetValue() &lt; 70)" validationText="{res:Length_less}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ApgarScore1min" fieldSource="ApgarScore1min" required="True" caption="{res:ApgarScore1min}" wizardCaption="{res:ApgarScore1min}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornApgarScore1min" validationRule="($this-&gt;ApgarScore1min-&gt;GetValue() &gt; 0 &amp;&amp; $this-&gt;ApgarScore1min-&gt;GetValue() &lt; 10)" validationText="{res:Apgar1}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<RadioButton id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Resuscitation" fieldSource="Resuscitation" required="True" caption="{res:Resuscitation}" wizardCaption="{res:Resuscitation}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornResuscitation" sourceType="ListOfValues" html="True" dataSource="1;{res:RYes};0;{res:RNo}" connection="registry_db" unique="False" defaultValue="0">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="110" id_oncopy="110"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</RadioButton>
				<RadioButton id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Antibiotics" fieldSource="Antibiotics" required="False" caption="{res:Antibiotics}" wizardCaption="{res:Antibiotics}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornAntibiotics" sourceType="ListOfValues" html="True" dataSource="1;{res:RYes};0;{res:RNo}">
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
				<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ALVdays" fieldSource="ALVdays" required="False" caption="{res:ALVdays}" wizardCaption="{res:ALVdays}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornALVdays">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="NewBornOutcomeID" fieldSource="NewBornOutcomeID" required="False" caption="{res:NewBornOutcomeID}" wizardCaption="{res:NewBornOutcomeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornNewBornOutcomeID" sourceType="Table" connection="registry_db" dataSource="newborn_outcome" boundColumn="NewBornOutcomeID" textColumn="NewBornOutcomeName">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="106" id_oncopy="106"/>
							</Actions>
						</Event>
						<Event name="OnLoad" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="107" id_oncopy="107"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="31" tableName="newborn_outcome" posLeft="10" posTop="10" posWidth="154" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="OutcomeDate" fieldSource="OutcomeDate" required="False" caption="{res:DateOutcome}" wizardCaption="{res:DateOutcome}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornOutcomeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="30" name="DatePicker_DateOutcome" control="OutcomeDate" wizardSatellite="True" wizardControl="DateOutcome" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="newbornDatePicker_DateOutcome">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="131" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_ClinicalDiagnosis" PathID="newbornLinkedID_ClinicalDiagnosis" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="156" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_AnatomicPathology" PathID="newbornLinkedID_AnatomicPathology">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="127" urlType="Relative" enableValidation="False" isDefault="False" name="RightButton_ClinicalDiagnosis">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="128" eventType="Client" id_oncopy="128"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="129" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButton_ClinicalDiagnosis">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="130" eventType="Client" id_oncopy="130"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="121" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="SelectedClinicalDiagnosis" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="newbornSelectedClinicalDiagnosis" connection="registry_db" boundColumn="ICD10ID" textColumn="DiseaseIDName" dataSource="icd10_all, clinical_diagn" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="209"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="51" conditionType="Parameter" useIsNull="False" field="clinical_diagn.NewBornID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="NewBornID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="52" tableName="icd10_all" posLeft="46" posTop="101" posWidth="95" posHeight="104"/>
						<JoinTable id="53" tableName="clinical_diagn" posLeft="298" posTop="10" posWidth="100" posHeight="104"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="54" tableLeft="clinical_diagn" tableRight="icd10_all" fieldLeft="clinical_diagn.ICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="55" fieldName="CONCAT(icd10_all.ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="56" tableName="clinical_diagn" fieldName="clinical_diagn.*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="162" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="ListofClinicalTests" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="newbornListofClinicalTests" connection="registry_db" boundColumn="ClinicalTestsID" textColumn="ClinicalTestsName" activeCollection="TableParameters" dataSource="clinical_tests">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="163" id_oncopy="163"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="59" tableName="clinical_tests" posLeft="149" posTop="10" posWidth="122" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="60" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="166" urlType="Relative" enableValidation="False" isDefault="False" name="RightButtonClinicalTests">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="167" id_oncopy="167"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="170" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButtonClinicalTests">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="171" id_oncopy="171"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="172" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Integer" returnValueType="Number" name="SelectedClinicalTests" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="newbornSelectedClinicalTests" connection="registry_db" boundColumn="ClinicalTestsID" textColumn="ClinicalTestsName" activeCollection="TableParameters" dataSource="clinical, clinical_tests">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="210"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="66" conditionType="Parameter" useIsNull="False" field="clinical.NewBornID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" leftBrackets="0" rightBrackets="0" parameterSource="NewBornID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="67" tableName="clinical" posLeft="8" posTop="131" posWidth="98" posHeight="104"/>
						<JoinTable id="68" tableName="clinical_tests" posLeft="178" posTop="140" posWidth="122" posHeight="88"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="69" tableLeft="clinical" tableRight="clinical_tests" fieldLeft="clinical.ClinicalTestsID" fieldRight="clinical_tests.ClinicalTestsID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="70" tableName="clinical" fieldName="clinical.*"/>
						<Field id="71" tableName="clinical_tests" fieldName="ClinicalTestsName"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="184" fieldSourceType="DBColumn" dataType="Text" name="LinkedID_ClinicalTests" PathID="newbornLinkedID_ClinicalTests">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="189" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="OutcomeTime" PathID="newbornOutcomeTime" fieldSource="OutcomeTime" format="H:nn" DBFormat="HH:nn:ss" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="191" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DischargeTime" PathID="newbornDischargeTime" fieldSource="DischargeTime" format="H:nn" DBFormat="HH:nn:ss" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="140" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="ListofAnatomicPathology" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="newbornListofAnatomicPathology" connection="registry_db" dataSource="icd10_all" boundColumn="ICD10ID" textColumn="DiseaseIDName" orderBy="ICD10ID" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="141" eventType="Server" id_oncopy="141"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="78" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="Or" expression="ICD10_class = 'P' "/>
						<TableParameter id="213" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="ICD10_class = 'Q' "/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="79" tableName="icd10_all" posLeft="10" posTop="10" posWidth="253" posHeight="198"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="80" fieldName="CONCAT(ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="81" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="146" urlType="Relative" enableValidation="False" isDefault="False" name="RightButton_AnatomicPathology">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="147" eventType="Client" id_oncopy="147"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="148" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButton_AnatomicPathology">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="149" eventType="Client" id_oncopy="149"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="150" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="SelectedAnatomicPathology" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="newbornSelectedAnatomicPathology" connection="registry_db" boundColumn="ICD10ID" textColumn="DiseaseIDName" dataSource="icd10_all, anatomic_path" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="211"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="87" conditionType="Parameter" useIsNull="False" field="anatomic_path.NewBornID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="NewBornID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="88" tableName="icd10_all" posLeft="46" posTop="101" posWidth="95" posHeight="104"/>
						<JoinTable id="89" tableName="anatomic_path" posLeft="162" posTop="10" posWidth="102" posHeight="104"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="90" tableLeft="anatomic_path" tableRight="icd10_all" fieldLeft="anatomic_path.ICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="91" fieldName="CONCAT(icd10_all.ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="92" tableName="anatomic_path" fieldName="anatomic_path.*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Circumference" fieldSource="Circumference" required="True" caption="{res:Circumference}" wizardCaption="{res:Circumference}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornCircumference" validationRule="($this-&gt;Circumference-&gt;GetValue() &gt; 0 &amp;&amp; $this-&gt;Circumference-&gt;GetValue() &lt; 50)" validationText="{res:Head_circumference}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ApgarScore5min" fieldSource="ApgarScore5min" required="True" caption="{res:ApgarScore5min}" wizardCaption="{res:ApgarScore5min}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornApgarScore5min" validationRule="($this-&gt;ApgarScore5min-&gt;GetValue() &gt; 0 &amp;&amp; $this-&gt;ApgarScore5min-&gt;GetValue() &lt; 10)" validationText="{res:Apgar5}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ResuscitationID" fieldSource="ResuscitationID" required="True" caption="{res:ResuscitationID}" wizardCaption="{res:ResuscitationID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornResuscitationID" sourceType="Table" connection="registry_db" dataSource="resuscitation" boundColumn="ResuscitationID" textColumn="ResuscitationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="98" tableName="resuscitation" posLeft="10" posTop="10" posWidth="127" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DurationDays" fieldSource="DurationDays" required="True" caption="{res:DurationDays}" wizardCaption="{res:DurationDays}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornDurationDays">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CPAPdays" fieldSource="CPAPdays" required="False" caption="{res:CPAPdays}" wizardCaption="{res:CPAPdays}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornCPAPdays">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="FacilityID" fieldSource="FacilityID" required="False" caption="{res:FacilityID}" wizardCaption="{res:FacilityID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornFacilityID" sourceType="Table" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName" orderBy="FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="104" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DateReferral" fieldSource="DateReferral" required="False" caption="{res:DateReferral}" wizardCaption="{res:DateReferral}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornDateReferral" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="33" name="DatePicker_DateReferral" control="DateReferral" wizardSatellite="True" wizardControl="DateReferral" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="newbornDatePicker_DateReferral">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<RadioButton id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ScreenningPUK" fieldSource="ScreenningPUK" required="False" caption="{res:ScreenningPUK}" wizardCaption="{res:ScreenningPUK}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornScreenningPUK" sourceType="ListOfValues" html="True" dataSource="1;{res:RYes};0;{res:RNo}">
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
				<RadioButton id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Surfactant" fieldSource="Surfactant" required="True" caption="{res:Surfactant}" wizardCaption="{res:Surfactant}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornSurfactant" sourceType="ListOfValues" html="True" dataSource="1;{res:RYes};0;{res:RNo}" connection="registry_db" defaultValue="0">
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
				<Hidden id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DeliveryID" fieldSource="delivery.DeliveryID" required="True" caption="{res:DeliveryID}" wizardCaption="{res:VisitID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornDeliveryID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="208" fieldSourceType="DBColumn" dataType="Boolean" name="Reloaded" PathID="newbornReloaded" defaultValue="false">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CurrentUser" PathID="newbornCurrentUser" fieldSource="by_user">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="214" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="217" fieldSourceType="DBColumn" dataType="Date" html="False" name="lastmodified" PathID="newbornlastmodified" fieldSource="created" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="219" fieldSourceType="DBColumn" dataType="Text" html="False" name="user" PathID="newbornuser" fieldSource="by_user" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ListBox id="228" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="DepartmentID" fieldSource="DepartmentID" required="False" caption="{res:DepartmentID}" wizardCaption="{res:DepartmentID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="newbornDepartmentID" connection="registry_db" dataSource="department" boundColumn="DeptID" textColumn="DepartmentDesc" orderBy="DepartmentDesc">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="229" tableName="department" posLeft="10" posTop="10" posWidth="108" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="230" tableName="department" fieldName="DeptID"/>
						<Field id="231" tableName="department" fieldName="DepartmentDesc"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<RadioButton id="232" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" html="True" returnValueType="Number" name="Discharge" PathID="newbornDischarge" connection="registry_db" fieldSource="DischargeID" dataSource="newborn_discharge" boundColumn="DischargeID" textColumn="DischargeName" required="False">
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
				</RadioButton>
				<TextBox id="261" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FilterofAnatomicPathology" PathID="newbornFilterofAnatomicPathology">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="262" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FilterofClinicalTests" PathID="newbornFilterofClinicalTests">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="264" fieldSourceType="DBColumn" dataType="Text" name="birthDateTemp" PathID="newbornbirthDateTemp">
					<Components/>
					<Events/>
					<Attributes/>

					<Features/>
				</Hidden>
				<TextBox id="260" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FilterofClinicalDiagnosis" PathID="newbornFilterofClinicalDiagnosis">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="115" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="ListofClinicalDiagnosis" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="newbornListofClinicalDiagnosis" connection="registry_db" dataSource="icd10_all" boundColumn="ICD10ID" textColumn="DiseaseIDName" orderBy="ICD10ID" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="116"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="42" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="Or" expression="ICD10_class = 'P'"/>
						<TableParameter id="212" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="Or" expression="ICD10_class = 'Q'"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="43" tableName="icd10_all" posLeft="10" posTop="10" posWidth="246" posHeight="316"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="44" fieldName="CONCAT(ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="45" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<RadioButton id="192" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ScreenningHypoth" fieldSource="ScreenningHypoth" required="False" caption="{res:ScreenningHypoth}" wizardCaption="{res:ScreenningHypoth}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornScreenningHypoth" sourceType="ListOfValues" html="True" dataSource="1;{res:RYes};0;{res:RNo}">
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
				<RadioButton id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="VaccinationBCG" fieldSource="VaccinationBCG" required="True" caption="{res:VaccinationBCG}" wizardCaption="{res:VaccinationBCG}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornVaccinationBCG" sourceType="ListOfValues" html="True" dataSource="1;{res:RYes};0;{res:RNo}">
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
				<ListBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="FeedingID" fieldSource="FeedingID" required="False" caption="{res:FeedingID}" wizardCaption="{res:FeedingID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornFeedingID" sourceType="Table" connection="registry_db" dataSource="feeding" boundColumn="FeedingID" textColumn="FeedingName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="37" tableName="feeding" posLeft="10" posTop="10" posWidth="95" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<RadioButton id="275" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="CommonStay" PathID="newbornCommonStay" fieldSource="CommonStay" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" defaultValue="1">
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
				</RadioButton>
				<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Single" name="Weight" fieldSource="Weight" required="True" caption="{res:Weight}" wizardCaption="{res:Weight}" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornWeight" validationRule="($this-&gt;Weight-&gt;GetValue() &gt; 0 &amp;&amp; $this-&gt;Weight-&gt;GetValue() &lt; 6000)" validationText="{res:Birth_weight}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="BirthDate" fieldSource="BirthDate" required="True" caption="{res:BirthDate}" wizardCaption="{res:BirthDateTime}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornBirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events>
						<Event name="OnLoad" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="263" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="13" name="DatePicker_BirthDate" control="BirthDate" wizardSatellite="True" wizardControl="BirthDateTime" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="newbornDatePicker_BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="188" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="BirthTime" PathID="newbornBirthTime" fieldSource="BirthTime" format="H:nn" DBFormat="HH:nn:ss" defaultValue="CurrentTime" caption="{res:BirthTime}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NewBornN" fieldSource="NewBornN" required="True" caption="{res:NewBornN}" wizardCaption="{res:NewBornN}" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornNewBornN">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="272" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<RadioButton id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Sex" fieldSource="Sex" required="True" caption="{res:Sex}" wizardCaption="{res:Sex}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornSex" sourceType="ListOfValues" html="True" connection="registry_db" _valueOfList="1" _nameOfList="{res:Man}" dataSource="0;{res:Woman};1;{res:Man}">
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
				<ListBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="AppliedBreastID" fieldSource="AppliedBreastID" required="False" caption="{res:AppliedBreastID}" wizardCaption="{res:AppliedBreastID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="newbornAppliedBreastID" sourceType="Table" connection="registry_db" dataSource="applied_breast" boundColumn="AppliedBreastID" textColumn="AppliedBreastName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="273" tableName="applied_breast" posLeft="10" posTop="10" posWidth="129" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<RadioButton id="274" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="SkinToSkin" PathID="newbornSkinToSkin" fieldSource="SkinToSkin" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" defaultValue="1" required="True">
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
				</RadioButton>
				<RadioButton id="280" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="Died" PathID="newbornDied" fieldSource="Died" dataSource="1;{res:RYes};0;{res:RNo}" defaultValue="0" required="True">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="282"/>
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
				<ListBox id="281" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="DiedType" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="newbornDiedType" connection="registry_db" fieldSource="ResuscitationID" dataSource="died" boundColumn="DiedID" textColumn="DiedName" required="False">
					<Components/>
					<Events>
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
			</Components>
			<Events>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="111" id_oncopy="111"/>
					</Actions>
				</Event>
				<Event name="OnSubmit" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="137" id_oncopy="137"/>
					</Actions>
				</Event>
				<Event name="AfterInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="138" id_oncopy="138"/>
					</Actions>
				</Event>
				<Event name="AfterUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="139" id_oncopy="139"/>
					</Actions>
				</Event>
				<Event name="BeforeSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="259"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="112" conditionType="Parameter" useIsNull="False" field="newborn.NewBornID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" parameterSource="NewBornID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="193" tableName="newborn" posLeft="10" posTop="10" posWidth="150" posHeight="180"/>
				<JoinTable id="194" tableName="delivery" posLeft="181" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="195" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="206" tableName="newborn" fieldName="newborn.*"/>
				<Field id="207" tableName="delivery" fieldName="delivery.DeliveryID" alias="delivery_DeliveryID"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="113" field="NewBornN" dataType="Text" parameterType="Control" parameterSource="NewBornN" omitIfEmpty="True"/>
				<CustomParameter id="114" field="Weight" dataType="Single" parameterType="Control" parameterSource="Weight" omitIfEmpty="True"/>
				<CustomParameter id="115" field="TreatedNICU" dataType="Integer" parameterType="Control" parameterSource="TreatedNICU" omitIfEmpty="True"/>
				<CustomParameter id="116" field="VaccinationHepB" dataType="Integer" parameterType="Control" parameterSource="VaccinationHepB" omitIfEmpty="True"/>
				<CustomParameter id="117" field="VaccinationBCG" dataType="Integer" parameterType="Control" parameterSource="VaccinationBCG" omitIfEmpty="True"/>
				<CustomParameter id="118" field="AppliedBreastID" dataType="Integer" parameterType="Control" parameterSource="AppliedBreastID" omitIfEmpty="True"/>
				<CustomParameter id="119" field="Sex" dataType="Integer" parameterType="Control" parameterSource="Sex" omitIfEmpty="True"/>
				<CustomParameter id="120" field="BirthDate" dataType="Date" parameterType="Control" parameterSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="122" field="Lenght" dataType="Integer" parameterType="Control" parameterSource="Lenght" omitIfEmpty="True"/>
				<CustomParameter id="123" field="Circumference" dataType="Integer" parameterType="Control" parameterSource="Circumference" omitIfEmpty="True"/>
				<CustomParameter id="124" field="ApgarScore1min" dataType="Integer" parameterType="Control" parameterSource="ApgarScore1min" omitIfEmpty="True"/>
				<CustomParameter id="125" field="ApgarScore5min" dataType="Integer" parameterType="Control" parameterSource="ApgarScore5min" omitIfEmpty="True"/>
				<CustomParameter id="126" field="Surfactant" dataType="Integer" parameterType="Control" parameterSource="Surfactant" omitIfEmpty="True"/>
				<CustomParameter id="127" field="Resuscitation" dataType="Integer" parameterType="Control" parameterSource="Resuscitation" omitIfEmpty="True"/>
				<CustomParameter id="128" field="ResuscitationID" dataType="Integer" parameterType="Control" parameterSource="ResuscitationID" omitIfEmpty="True"/>
				<CustomParameter id="129" field="DurationDays" dataType="Integer" parameterType="Control" parameterSource="DurationDays" omitIfEmpty="True"/>
				<CustomParameter id="130" field="Antibiotics" dataType="Integer" parameterType="Control" parameterSource="Antibiotics" omitIfEmpty="True"/>
				<CustomParameter id="131" field="ALVdays" dataType="Integer" parameterType="Control" parameterSource="ALVdays" omitIfEmpty="True"/>
				<CustomParameter id="132" field="CPAPdays" dataType="Integer" parameterType="Control" parameterSource="CPAPdays" omitIfEmpty="True"/>
				<CustomParameter id="133" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID" omitIfEmpty="True"/>
				<CustomParameter id="134" field="DateReferral" dataType="Date" parameterType="Control" parameterSource="DateReferral" omitIfEmpty="True" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate"/>
				<CustomParameter id="135" field="ScreenningPUK" dataType="Integer" parameterType="Control" parameterSource="ScreenningPUK" omitIfEmpty="True"/>
				<CustomParameter id="136" field="ScreenningHypoth" dataType="Integer" parameterType="Control" parameterSource="ScreenningHypoth" omitIfEmpty="True"/>
				<CustomParameter id="137" field="FeedingID" dataType="Integer" parameterType="Control" parameterSource="FeedingID" omitIfEmpty="True"/>
				<CustomParameter id="138" field="NewBornOutcomeID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="NewBornOutcomeID"/>
				<CustomParameter id="139" field="BirthTime" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="False" parameterSource="BirthTime"/>
				<CustomParameter id="140" field="OutcomeDate" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" omitIfEmpty="True" parameterSource="OutcomeDate"/>
				<CustomParameter id="141" field="OutcomeTime" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortTime" omitIfEmpty="True" parameterSource="OutcomeTime"/>
				<CustomParameter id="142" field="DischargeDate" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" omitIfEmpty="True" parameterSource="DischargeDate"/>
				<CustomParameter id="143" field="DischargeTime" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortTime" omitIfEmpty="False" parameterSource="DischargeTime"/>
				<CustomParameter id="196" field="DeliveryID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="DeliveryID"/>
				<CustomParameter id="226" field="DepartmentID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="DepartmentID"/>
				<CustomParameter id="233" field="DischargeID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Discharge"/>
				<CustomParameter id="270" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="276" field="SkinToSkin" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="SkinToSkin"/>
				<CustomParameter id="277" field="CommonStay" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="CommonStay"/>
				<CustomParameter id="283" field="Died" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Died"/>
				<CustomParameter id="284" field="DiedID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="DiedType"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="144" conditionType="Parameter" useIsNull="False" field="NewBornID" dataType="Integer" parameterType="URL" parameterSource="NewBornID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="145" field="NewBornN" dataType="Text" parameterType="Control" parameterSource="NewBornN" omitIfEmpty="True"/>
				<CustomParameter id="146" field="Weight" dataType="Single" parameterType="Control" parameterSource="Weight" omitIfEmpty="True"/>
				<CustomParameter id="147" field="TreatedNICU" dataType="Integer" parameterType="Control" parameterSource="TreatedNICU" omitIfEmpty="True"/>
				<CustomParameter id="148" field="VaccinationHepB" dataType="Integer" parameterType="Control" parameterSource="VaccinationHepB" omitIfEmpty="True"/>
				<CustomParameter id="149" field="VaccinationBCG" dataType="Integer" parameterType="Control" parameterSource="VaccinationBCG" omitIfEmpty="True"/>
				<CustomParameter id="150" field="AppliedBreastID" dataType="Integer" parameterType="Control" parameterSource="AppliedBreastID" omitIfEmpty="True"/>
				<CustomParameter id="151" field="Sex" dataType="Integer" parameterType="Control" parameterSource="Sex" omitIfEmpty="True"/>
				<CustomParameter id="153" field="Lenght" dataType="Integer" parameterType="Control" parameterSource="Lenght" omitIfEmpty="True"/>
				<CustomParameter id="154" field="Circumference" dataType="Integer" parameterType="Control" parameterSource="Circumference" omitIfEmpty="True"/>
				<CustomParameter id="155" field="ApgarScore1min" dataType="Integer" parameterType="Control" parameterSource="ApgarScore1min" omitIfEmpty="True"/>
				<CustomParameter id="156" field="ApgarScore5min" dataType="Integer" parameterType="Control" parameterSource="ApgarScore5min" omitIfEmpty="True"/>
				<CustomParameter id="157" field="Surfactant" dataType="Integer" parameterType="Control" parameterSource="Surfactant" omitIfEmpty="True"/>
				<CustomParameter id="158" field="Resuscitation" dataType="Integer" parameterType="Control" parameterSource="Resuscitation" omitIfEmpty="True"/>
				<CustomParameter id="159" field="ResuscitationID" dataType="Integer" parameterType="Control" parameterSource="ResuscitationID" omitIfEmpty="True"/>
				<CustomParameter id="160" field="DurationDays" dataType="Integer" parameterType="Control" parameterSource="DurationDays" omitIfEmpty="True"/>
				<CustomParameter id="161" field="Antibiotics" dataType="Integer" parameterType="Control" parameterSource="Antibiotics" omitIfEmpty="True"/>
				<CustomParameter id="162" field="ALVdays" dataType="Integer" parameterType="Control" parameterSource="ALVdays" omitIfEmpty="True"/>
				<CustomParameter id="163" field="CPAPdays" dataType="Integer" parameterType="Control" parameterSource="CPAPdays" omitIfEmpty="True"/>
				<CustomParameter id="164" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID" omitIfEmpty="True"/>
				<CustomParameter id="165" field="DateReferral" dataType="Date" parameterType="Control" parameterSource="DateReferral" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" omitIfEmpty="True"/>
				<CustomParameter id="166" field="ScreenningPUK" dataType="Integer" parameterType="Control" parameterSource="ScreenningPUK" omitIfEmpty="True"/>
				<CustomParameter id="167" field="ScreenningHypoth" dataType="Integer" parameterType="Control" parameterSource="ScreenningHypoth" omitIfEmpty="True"/>
				<CustomParameter id="168" field="FeedingID" dataType="Integer" parameterType="Control" parameterSource="FeedingID" omitIfEmpty="True"/>
				<CustomParameter id="169" field="NewBornOutcomeID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="NewBornOutcomeID"/>
				<CustomParameter id="170" field="BirthDate" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" omitIfEmpty="True" parameterSource="BirthDate"/>
				<CustomParameter id="171" field="BirthTime" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortTime" omitIfEmpty="False" parameterSource="BirthTime"/>
				<CustomParameter id="172" field="OutcomeDate" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" omitIfEmpty="True" parameterSource="OutcomeDate"/>
				<CustomParameter id="173" field="OutcomeTime" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortTime" omitIfEmpty="True" parameterSource="OutcomeTime"/>
				<CustomParameter id="174" field="DischargeDate" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" omitIfEmpty="True" parameterSource="DischargeDate"/>
				<CustomParameter id="175" field="DischargeTime" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortTime" omitIfEmpty="False" parameterSource="DischargeTime"/>
				<CustomParameter id="197" field="DeliveryID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="DeliveryID"/>
				<CustomParameter id="227" field="DepartmentID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="DepartmentID"/>
				<CustomParameter id="234" field="DischargeID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Discharge"/>
				<CustomParameter id="271" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="278" field="SkinToSkin" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="SkinToSkin"/>
				<CustomParameter id="279" field="CommonStay" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="CommonStay"/>
				<CustomParameter id="285" field="Died" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Died"/>
				<CustomParameter id="286" field="DiedID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="DiedType"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="176" conditionType="Parameter" useIsNull="False" field="NewBornID" dataType="Integer" parameterType="URL" parameterSource="NewBornID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups>
				<Group id="249" groupID="1" read="True"/>
				<Group id="250" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="251" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="198" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header" activeCollection="TableParameters">
			<Components>
				<Label id="46" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_headerPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" PathID="pregnancy_headerFirstName" fieldSource="GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="48" fieldSourceType="DBColumn" dataType="Text" html="False" name="FamiliyName" PathID="pregnancy_headerFamiliyName" fieldSource="FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="49" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDate" PathID="pregnancy_headerBirthDate" fieldSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="268" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_headerPatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="74" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="9" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="199" tableName="patient" posLeft="108" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="200" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="201" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="202" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="248" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="235" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header1" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header1" activeCollection="TableParameters">
			<Components>
				<Label id="236" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_header1PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="269" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_header1PatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_district.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="240" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="241" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="242" tableName="patient" posLeft="108" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="243" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="244" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="245" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="246" groupID="1" read="True"/>
				<Group id="247" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="newborn_maint.php" forShow="True" url="newborn_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="newborn_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="252" groupID="1"/>
		<Group id="253" groupID="3"/>
		<Group id="254" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnLoad" type="Client">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="288"/>
			</Actions>
		</Event>
	</Events>
</Page>
