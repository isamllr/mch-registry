<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="41" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header" activeCollection="TableParameters">
			<Components>
				<Label id="42" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_headerPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" PathID="pregnancy_headerFirstName" fieldSource="GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" name="FamiliyName" PathID="pregnancy_headerFamiliyName" fieldSource="FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="45" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDate" PathID="pregnancy_headerBirthDate" fieldSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="338" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_headerPatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="47" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="48" tableName="patient" posLeft="91" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="49" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="51" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="318" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="52" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="100" connection="registry_db" dataSource="testcode, testhospitalisation" activeCollection="TableParameters" name="test_testcode" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:testtestcode} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteActions="pasteActions">
			<Components>
				<Label id="53" fieldSourceType="DBColumn" dataType="Text" html="False" name="test_testcode_TotalRecords" wizardUseTemplateBlock="False" PathID="test_testcodetest_testcode_TotalRecords">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="54" visible="True" name="Sorter_TestDate" column="TestDate" wizardCaption="{res:TestDate}" wizardSortingType="SimpleDir" wizardControl="TestDate" wizardAddNbsp="False" PathID="test_testcodeSorter_TestDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="55" visible="True" name="Sorter_TestName" column="TestName" wizardCaption="{res:TestName}" wizardSortingType="SimpleDir" wizardControl="TestName" wizardAddNbsp="False" PathID="test_testcodeSorter_TestName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="56" visible="True" name="Sorter_TestResultNormal" column="TestResultNormal" wizardCaption="{res:TestResultNormal}" wizardSortingType="SimpleDir" wizardControl="TestResultNormal" wizardAddNbsp="False" PathID="test_testcodeSorter_TestResultNormal">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="57" visible="True" name="Sorter_TestResultDetails" column="TestResult" wizardCaption="{res:TestResultDetails}" wizardSortingType="SimpleDir" wizardControl="TestResultDetails" wizardAddNbsp="False" PathID="test_testcodeSorter_TestResultDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="58" fieldSourceType="DBColumn" dataType="Date" html="False" name="TestDate" fieldSource="TestDate" wizardCaption="{res:TestDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="test_testcodeTestDate" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="59" fieldSourceType="DBColumn" dataType="Text" html="False" name="TestName" fieldSource="TestName" wizardCaption="{res:TestName}" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="test_testcodeTestName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="60" fieldSourceType="DBColumn" dataType="Integer" html="False" name="TestResultNormal" wizardCaption="{res:TestResultNormal}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="test_testcodeTestResultNormal" fieldSource="TestResultNormal">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="350"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="61" fieldSourceType="DBColumn" dataType="Text" html="False" name="TestResultDetails" fieldSource="TestResultDetails" wizardCaption="{res:TestResultDetails}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="test_testcodeTestResultDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink2" PathID="test_testcodeImageLink2" hrefSource="testhospitalisation_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="279" sourceType="DataField" name="TestHospitalisationID" source="TestHospitalisationID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="113"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="283" conditionType="Parameter" useIsNull="False" field="testhospitalisation.HospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="HospitalisationID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="68" tableName="testcode" posLeft="168" posTop="10" posWidth="95" posHeight="104"/>
				<JoinTable id="88" tableName="testhospitalisation" posLeft="284" posTop="10" posWidth="160" posHeight="152"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="89" tableLeft="testhospitalisation" tableRight="testcode" fieldLeft="testhospitalisation.TestCodeID" fieldRight="testcode.TestCodeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="70" secured="False" sourceType="Table" returnValueType="Number" connection="registry_db" dataSource="medicationhospitalisation" activeCollection="TableParameters" name="medicationhospitalisation" wizardCaption="{res:CCS_GridFormPrefix} {res:medicationmedicationatcode} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" defaultPageSize="100" pageSizeLimit="100">
			<Components>
				<Label id="71" fieldSourceType="DBColumn" dataType="Text" html="False" name="medication_medicationatco_TotalRecords" wizardUseTemplateBlock="False" PathID="medicationhospitalisationmedication_medicationatco_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="72" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="73" visible="True" name="Sorter_DateMedication" column="DateMedication" wizardCaption="{res:DateMedication}" wizardSortingType="SimpleDir" wizardControl="DateMedication" wizardAddNbsp="False" PathID="medicationhospitalisationSorter_DateMedication">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="74" visible="True" name="Sorter_MedicationName" column="MedicationName" wizardCaption="{res:MedicationName}" wizardSortingType="SimpleDir" wizardControl="MedicationName" wizardAddNbsp="False" PathID="medicationhospitalisationSorter_MedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="75" visible="True" name="Sorter_Dosage" column="Dosage" wizardCaption="{res:Dosage}" wizardSortingType="SimpleDir" wizardControl="Dosage" wizardAddNbsp="False" PathID="medicationhospitalisationSorter_Dosage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="76" fieldSourceType="DBColumn" dataType="Date" html="False" name="DateMedication" fieldSource="DateMedication" wizardCaption="{res:DateMedication}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="medicationhospitalisationDateMedication" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="77" fieldSourceType="DBColumn" dataType="Text" html="False" name="MedicationName" fieldSource="MedicationName" wizardCaption="{res:MedicationName}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="medicationhospitalisationMedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="78" fieldSourceType="DBColumn" dataType="Text" html="False" name="Dosage" fieldSource="Dosage" wizardCaption="{res:Dosage}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="medicationhospitalisationDosage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="medicationhospitalisationImageLink1" hrefSource="hospitalisationmedication_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="188" sourceType="DataField" name="HospitalisationID" source="HospitalisationID"/>
						<LinkParameter id="190" sourceType="DataField" name="MedicationHospitalisationID" source="MedicationHospitalisationID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="83" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="111" conditionType="Parameter" useIsNull="False" field="HospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="HospitalisationID" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="90" tableName="medicationhospitalisation" posLeft="262" posTop="10" posWidth="160" posHeight="162"/>
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
		<Grid id="92" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="100" connection="registry_db" dataSource="recommendedmedicationhospitalisation" activeCollection="TableParameters" name="recommendedmedicationhospitalisation" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:medicationmedicationatcode} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}">
			<Components>
				<Label id="93" fieldSourceType="DBColumn" dataType="Text" html="False" name="medication_medicationatco_TotalRecords" wizardUseTemplateBlock="False" PathID="recommendedmedicationhospitalisationmedication_medicationatco_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="94" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="95" visible="True" name="Sorter_DateMedication" column="DateMedication" wizardCaption="{res:DateMedication}" wizardSortingType="SimpleDir" wizardControl="DateMedication" wizardAddNbsp="False" PathID="recommendedmedicationhospitalisationSorter_DateMedication">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="96" visible="True" name="Sorter_MedicationName" column="MedicationName" wizardCaption="{res:MedicationName}" wizardSortingType="SimpleDir" wizardControl="MedicationName" wizardAddNbsp="False" PathID="recommendedmedicationhospitalisationSorter_MedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="97" visible="True" name="Sorter_Dosage" column="Dosage" wizardCaption="{res:Dosage}" wizardSortingType="SimpleDir" wizardControl="Dosage" wizardAddNbsp="False" PathID="recommendedmedicationhospitalisationSorter_Dosage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="98" fieldSourceType="DBColumn" dataType="Date" html="False" name="DateMedication" fieldSource="DateMedication" wizardCaption="{res:DateMedication}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="recommendedmedicationhospitalisationDateMedication" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="99" fieldSourceType="DBColumn" dataType="Text" html="False" name="MedicationName" fieldSource="MedicationName" wizardCaption="{res:MedicationName}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="recommendedmedicationhospitalisationMedicationName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="100" fieldSourceType="DBColumn" dataType="Text" html="False" name="Dosage" fieldSource="Dosage" wizardCaption="{res:Dosage}" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="recommendedmedicationhospitalisationDosage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="recommendedmedicationhospitalisationImageLink1" hrefSource="hospitalisationrecommedication_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="189" sourceType="DataField" name="HospitalisationID" source="HospitalisationID"/>
						<LinkParameter id="191" sourceType="DataField" name="RecommendedMedicationHospitalisationID" source="RecommendedMedicationHospitalisationID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="105"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="112" conditionType="Parameter" useIsNull="False" field="HospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="HospitalisationID" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="109" tableName="recommendedmedicationhospitalisation" posLeft="21" posTop="124" posWidth="160" posHeight="160"/>
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
		<Grid id="288" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="100" connection="registry_db" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT pregnancy.PregnancyRecNr, DataDelivery, FacilityName, deliverymethod.DeliveryMethodName, delivery.DeliveryID
FROM (((delivery 
INNER JOIN deliverymethod ON deliverymethod.DeliveryMethodID = delivery.DeliveryMethodID)
INNER JOIN facilities ON delivery.FacilityID = facilities.FacilityID)
INNER JOIN pregnancy ON delivery.PregnancyID = pregnancy.PregnancyID) 
INNER JOIN hospitalisation ON hospitalisation.PregnancyID = pregnancy.PregnancyID
WHERE hospitalisation.HospitalisationID = {HospitalisationID} 
AND delivery.DataDelivery &gt;= hospitalisation.AdmissionDate 
AND delivery.DataDelivery &lt;= hospitalisation.DischargeDate
" name="Delivery" orderBy="PregnancyRecNr" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:Grid1} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="Simple" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteActions="pasteActions">
			<Components>
				<Sorter id="290" visible="True" name="Sorter_PregnancyRecNr" column="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="Simple" wizardControl="PregnancyRecNr" wizardAddNbsp="False" PathID="DeliverySorter_PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="291" visible="True" name="Sorter_DataDelivery" column="DataDelivery" wizardCaption="{res:DataDelivery}" wizardSortingType="Simple" wizardControl="DataDelivery" wizardAddNbsp="False" PathID="DeliverySorter_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="292" visible="True" name="Sorter_FacilityName" column="FacilityName" wizardCaption="{res:FacilityName}" wizardSortingType="Simple" wizardControl="FacilityName" wizardAddNbsp="False" PathID="DeliverySorter_FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="293" visible="True" name="Sorter_DeliveryMethodName" column="DeliveryMethodName" wizardCaption="{res:DeliveryMethodName}" wizardSortingType="Simple" wizardControl="DeliveryMethodName" wizardAddNbsp="False" PathID="DeliverySorter_DeliveryMethodName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="295" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="DeliveryPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="296" fieldSourceType="DBColumn" dataType="Date" html="False" name="DataDelivery" fieldSource="DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="DeliveryDataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="297" fieldSourceType="DBColumn" dataType="Text" html="False" name="FacilityName" fieldSource="FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="DeliveryFacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="298" fieldSourceType="DBColumn" dataType="Text" html="False" name="DeliveryMethodName" fieldSource="DeliveryMethodName" wizardCaption="{res:DeliveryMethodName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="DeliveryDeliveryMethodName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="300" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink2" PathID="DeliveryImageLink2" hrefSource="delivery_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="301" sourceType="DataField" name="DeliveryID" source="DeliveryID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="302"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="289" variable="HospitalisationID" parameterType="URL" dataType="Text" parameterSource="HospitalisationID" defaultValue="0" designDefaultValue="48"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="SQL" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="hospitalisation" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:hospitalisation} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="hospitalisation" activeCollection="UFormElements" customInsertType="Table" customInsert="hospitalisation" parameterTypeListName="ParameterTypeList" customUpdateType="Table" customUpdate="hospitalisation" customDeleteType="Table" customDelete="hospitalisation" pasteActions="pasteActions" returnPage="pregnancy_maint.ccp" activeTableType="hospitalisation" removeParameters="HospitalisationID" pasteAsReplace="pasteAsReplace" dataSource="SELECT hospitalisation.*,  PatientID 
FROM (pregnancy INNER JOIN hospitalisation ON
hospitalisation.PregnancyID = pregnancy.PregnancyID) 
WHERE hospitalisation.HospitalisationID = {HospitalisationID} 
">
			<Components>
				<Button id="6" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="hospitalisationButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="7" message="{res:CCS_DeleteConfirmation}" eventType="Client"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="286" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="8" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="hospitalisationButton_Cancel">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="287" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="AdmissionDate" fieldSource="AdmissionDate" required="True" caption="{res:AdmissionDate}" wizardCaption="{res:AdmissionDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="hospitalisationAdmissionDate" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" defaultValue="CurrentDate" validationRule="($this-&gt;AdmissionDate-&gt;GetValue() &gt;= $this-&gt;pregnancyDateTemp-&gt;GetValue())" validationText="{res:VerDataDel}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="11" name="DatePicker_AdmissionDate" control="AdmissionDate" wizardSatellite="True" wizardControl="AdmissionDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="hospitalisationDatePicker_AdmissionDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="12" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="FacilityID" fieldSource="FacilityID" required="True" caption="{res:FacilityID}" wizardCaption="{res:FacilityID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="hospitalisationFacilityID" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName" orderBy="FacilityName" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="352"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="32" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="33" tableName="facilities" fieldName="FacilityName"/>
						<Field id="34" tableName="facilities" fieldName="FacilityID"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="13" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="DepartmentID" fieldSource="DepartmentID" required="True" caption="{res:DepartmentID}" wizardCaption="{res:DepartmentID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="hospitalisationDepartmentID" connection="registry_db" dataSource="department" boundColumn="DeptID" textColumn="DepartmentDesc" orderBy="DepartmentDesc">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="35" tableName="department" posLeft="10" posTop="10" posWidth="108" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="36" tableName="department" fieldName="DeptID"/>
						<Field id="37" tableName="department" fieldName="DepartmentDesc"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<RadioButton id="21" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="RecomObstetricExamination" fieldSource="RecomObstetricExamination" required="False" caption="{res:RecomObstetricExamination}" wizardCaption="{res:RecomObstetricExamination}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="hospitalisationRecomObstetricExamination" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" defaultValue="1">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="252" eventType="Client"/>
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
				<RadioButton id="27" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="RecomDelivery3rdLevel" fieldSource="RecomDelivery3rdLevel" required="False" caption="{res:RecomDelivery3rdLevel}" wizardCaption="{res:RecomDelivery3rdLevel}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="hospitalisationRecomDelivery3rdLevel" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" defaultValue="0">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="254" eventType="Client"/>
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
				<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DischargeDate" fieldSource="DischargeDate" required="False" caption="{res:DischargeDate}" wizardCaption="{res:DischargeDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="hospitalisationDischargeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" validationRule="(($this-&gt;DischargeDate-&gt;GetValue() &gt;= $this-&gt;AdmissionDate-&gt;GetValue()) || ($this-&gt;DischargeDate-&gt;GetValue() == NULL))" validationText="неправильна дата">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="31" name="DatePicker_DischargeDate" control="DischargeDate" wizardSatellite="True" wizardControl="DischargeDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="hospitalisationDatePicker_DischargeDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="173" fieldSourceType="DBColumn" dataType="Text" name="PregnancyID" PathID="hospitalisationPregnancyID" fieldSource="PregnancyID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="181" urlType="Relative" enableValidation="True" isDefault="False" name="Button_UpdateAddAdministeredMedication" operation="Update" wizardCaption="{res:CCS_Insert}" PathID="hospitalisationButton_UpdateAddAdministeredMedication">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="184" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="186" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="182" urlType="Relative" enableValidation="True" isDefault="False" name="Button_UpdateAddRecommendedFollowUpMedication" operation="Update" wizardCaption="{res:CCS_Insert}" PathID="hospitalisationButton_UpdateAddRecommendedFollowUpMedication">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="185" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="187" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="216" urlType="Relative" enableValidation="True" isDefault="False" name="LeftButtonHospDiag" PathID="hospitalisationLeftButtonHospDiag">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="217" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="220" urlType="Relative" enableValidation="True" isDefault="False" name="RightButtonHospDiag" PathID="hospitalisationRightButtonHospDiag">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="221" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="222" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="hosppossibdiag" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="hospitalisationhosppossibdiag" connection="registry_db" dataSource="icd10_all" boundColumn="ICD10ID" textColumn="codeName" orderBy="ICD10ID" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="240" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="341" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="ICD10_class = 'other' OR ICD10_class = 'O'"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="223" tableName="icd10_all" posLeft="10" posTop="10" posWidth="142" posHeight="120"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="224" fieldName="CONCAT(ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="codeName"/>
						<Field id="248" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="225" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="hospselectdiag" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="hospitalisationhospselectdiag" connection="registry_db" dataSource="hospitalisationdischargediagnosis, icd10_all" activeCollection="TableParameters" boundColumn="ICD10ID" textColumn="DiseaseIDName">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="304" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="234" conditionType="Parameter" useIsNull="False" field="hospitalisationdischargediagnosis.HospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="HospitalisationID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="231" tableName="hospitalisationdischargediagnosis" posLeft="10" posTop="10" posWidth="160" posHeight="104"/>
						<JoinTable id="275" tableName="icd10_all" posLeft="191" posTop="10" posWidth="142" posHeight="120"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="276" tableLeft="hospitalisationdischargediagnosis" tableRight="icd10_all" fieldLeft="hospitalisationdischargediagnosis.ICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="235" fieldName="CONCAT(icd10_all.ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="278" tableName="hospitalisationdischargediagnosis" fieldName="hospitalisationdischargediagnosis.*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="245" fieldSourceType="DBColumn" dataType="Text" name="LinkedDD_Hospitalisation" PathID="hospitalisationLinkedDD_Hospitalisation">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="RecomObstetricExaminationDate" fieldSource="RecomObstetricExaminationDate" required="False" caption="{res:RecomObstetricExaminationDate}" wizardCaption="{res:RecomObstetricExaminationDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="hospitalisationRecomObstetricExaminationDate" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="23" name="DatePicker_RecomObstetricExaminationDate" control="RecomObstetricExaminationDate" wizardSatellite="True" wizardControl="RecomObstetricExaminationDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="hospitalisationDatePicker_RecomObstetricExaminationDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<RadioButton id="24" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="RecomRepeatedHospitalisation" caption="{res:RecomRepeatedHospitalisation}" fieldSource="RecomRepeatedHospitalisation" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" required="False" PathID="hospitalisationRecomRepeatedHospitalisation" defaultValue="0">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="253" eventType="Client"/>
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
				<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="RecomRepeatedHospitalisationDate" fieldSource="RecomRepeatedHospitalisationDate" required="False" caption="{res:RecomRepeatedHospitalisationDate}" wizardCaption="{res:RecomRepeatedHospitalisationDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="hospitalisationRecomRepeatedHospitalisationDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="26" name="DatePicker_RecomRepeatedHospitalisationDate" control="RecomRepeatedHospitalisationDate" wizardSatellite="True" wizardControl="RecomRepeatedHospitalisationDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="hospitalisationDatePicker_RecomRepeatedHospitalisationDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Button id="271" urlType="Relative" enableValidation="True" isDefault="False" name="Button_UpdateAddDelivery" PathID="hospitalisationButton_UpdateAddDelivery" returnPage="delivery_maint.ccp" operation="Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="272" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="273" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="280" urlType="Relative" enableValidation="True" isDefault="False" name="Button_UpdateAddTest" operation="Update" wizardCaption="{res:CCS_Insert}" PathID="hospitalisationButton_UpdateAddTest">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="281" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="282" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="hospitalisationButton_Insert" returnPage="pregnancy_maint.ccp">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="True" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="hospitalisationButton_Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="285" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="303" fieldSourceType="DBColumn" dataType="Boolean" name="Reloaded" PathID="hospitalisationReloaded" defaultValue="false">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="342" fieldSourceType="DBColumn" dataType="Date" html="False" name="lastmodified" PathID="hospitalisationlastmodified" fieldSource="created" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="344" fieldSourceType="DBColumn" dataType="Text" html="False" name="user" PathID="hospitalisationuser" fieldSource="by_user" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="346" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CurrentUser" PathID="hospitalisationCurrentUser" fieldSource="by_user" html="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="347"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="357" urlType="Relative" enableValidation="False" isDefault="False" name="RightButtonReasonHospitalisation">
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
				<Button id="360" urlType="Relative" enableValidation="False" isDefault="False" name="LeftButtonReasonHospitalisation">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="361"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="262" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="SelectedReasonHospitalisation" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="hospitalisationSelectedReasonHospitalisation" connection="registry_db" boundColumn="ICD10ID" textColumn="DiseaseIDName" activeCollection="TableParameters" dataSource="reasonhospitalisation, icd10_all">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="362"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="368" conditionType="Parameter" useIsNull="False" field="reasonhospitalisation.HospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="HospitalisationID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="363" tableName="reasonhospitalisation" posLeft="10" posTop="10" posWidth="160" posHeight="104"/>
						<JoinTable id="364" tableName="icd10_all" posLeft="191" posTop="10" posWidth="160" posHeight="152"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="365" tableLeft="reasonhospitalisation" tableRight="icd10_all" fieldLeft="reasonhospitalisation.ICD10ID" fieldRight="icd10_all.ICD10ID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="366" fieldName="CONCAT(icd10_all.ICD10ID, &quot; - &quot;, DiseaseName)" isExpression="True" alias="DiseaseIDName"/>
						<Field id="367" tableName="reasonhospitalisation" fieldName="reasonhospitalisation.*" isExpression="False"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="369" fieldSourceType="DBColumn" dataType="Text" name="LinkedDD_ReasonHospitalisation" PathID="hospitalisationLinkedDD_ReasonHospitalisation">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<ListBox id="228" visible="Yes" fieldSourceType="CodeExpression" sourceType="Table" dataType="Text" returnValueType="Number" name="ReasonHospitalisation" connection="registry_db" dataSource="icd10_all" boundColumn="ICD10ID" textColumn="codeName" orderBy="ICD10ID" PathID="hospitalisationReasonHospitalisation">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="370" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="246" conditionType="Expression" useIsNull="False" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="ICD10_class = 'other' OR ICD10_class = 'O'"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="230" tableName="icd10_all" posWidth="95" posHeight="104" posLeft="10" posTop="10"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="355" fieldName="CONCAT(ICD10ID, ' - ' ,DiseaseName)" alias="codeName" isExpression="True"/>
						<Field id="356" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="371" visible="Dynamic" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="IndicationID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="hospitalisationIndicationID" connection="registry_db" dataSource="refindication" boundColumn="IndicationID" textColumn="RefIndicationName" required="True" caption="{res:IndicationID}" defaultValue="1">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="372" tableName="refindication" posLeft="10" posTop="10" posWidth="123" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="373" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="ReferralFacilityID" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="hospitalisationReferralFacilityID" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName" required="True" orderBy="FacilityName" caption="{res:ReferralFacilityID}" validationRule="($this-&gt;ReferralFacilityID-&gt;GetValue() != $this-&gt;FacilityID-&gt;GetValue())" validationText="{res:Referral1}">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="374" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="375" visible="Dynamic" fieldSourceType="DBColumn" dataType="Integer" name="DeptID" PathID="hospitalisationDeptID" sourceType="Table" connection="registry_db" dataSource="department" boundColumn="DeptID" textColumn="DepartmentDesc" required="True" orderBy="DepartmentDesc" caption="{res:ReferralDeptID}" defaultValue="1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="376" tableName="department" posLeft="10" posTop="10" posWidth="108" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="RecomDelivery3rdLevelDate" fieldSource="RecomDelivery3rdLevelDate" required="False" caption="{res:RecomDelivery3rdLevelDate}" wizardCaption="{res:RecomDelivery3rdLevelDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="hospitalisationRecomDelivery3rdLevelDate" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="29" name="DatePicker_RecomDelivery3rdLevelDate" control="RecomDelivery3rdLevelDate" wizardSatellite="True" wizardControl="RecomDelivery3rdLevelDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css" PathID="hospitalisationDatePicker_RecomDelivery3rdLevelDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Button id="378" urlType="Relative" enableValidation="True" isDefault="False" name="Button_UpdateAddTests" operation="Update" wizardCaption="{res:CCS_Insert}" PathID="hospitalisationButton_UpdateAddTests" returnPage="testhosplist_maint.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="379"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="380"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="264" fieldSourceType="DBColumn" dataType="Date" name="pregnancyDateTemp" PathID="hospitalisationpregnancyDateTemp" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="383"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="241" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="242" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="243" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="OnSubmit" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="244" eventType="Client"/>
					</Actions>
				</Event>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="249" eventType="Client"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="377"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="176" conditionType="Parameter" useIsNull="False" field="hospitalisation.HospitalisationID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="HospitalisationID" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="274" parameterType="URL" variable="HospitalisationID" dataType="Integer" parameterSource="HospitalisationID" defaultValue="0" designDefaultValue="48"/>
			</SQLParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="156" variable="AdmissionDate" dataType="Date" parameterType="Control" parameterSource="AdmissionDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="157" variable="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID"/>
				<SQLParameter id="158" variable="DepartmentID" dataType="Integer" parameterType="Control" parameterSource="DepartmentID"/>
				<SQLParameter id="159" variable="ReasonHospitalisationICD10ID" dataType="Text" parameterType="Control" parameterSource="ReasonHospitalisationICD10ID"/>
				<SQLParameter id="160" variable="DeliveryDuringHospitalisation" dataType="Integer" parameterType="Control" parameterSource="DeliveryDuringHospitalisation"/>
				<SQLParameter id="161" variable="DateDeliveryDuringHospitalisation" dataType="Date" parameterType="Control" parameterSource="DateDeliveryDuringHospitalisation" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="164" variable="RecomObstetricExamination" dataType="Integer" parameterType="Control" parameterSource="RecomObstetricExamination"/>
				<SQLParameter id="165" variable="RecomObstetricExaminationDate" dataType="Date" parameterType="Control" parameterSource="RecomObstetricExaminationDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="166" variable="RecomRepeatedHospitalisation" dataType="Integer" parameterType="Control" parameterSource="RecomRepeatedHospitalisation"/>
				<SQLParameter id="167" variable="RecomRepeatedHospitalisationDate" dataType="Date" parameterType="Control" parameterSource="RecomRepeatedHospitalisationDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="168" variable="RecomDelivery3rdLevel" dataType="Integer" parameterType="Control" parameterSource="RecomDelivery3rdLevel"/>
				<SQLParameter id="169" variable="RecomDelivery3rdLevelDate" dataType="Date" parameterType="Control" parameterSource="RecomDelivery3rdLevelDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
				<SQLParameter id="170" variable="DischargeDate" dataType="Date" parameterType="Control" parameterSource="DischargeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="119" field="AdmissionDate" dataType="Date" parameterType="Control" parameterSource="AdmissionDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="120" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID" omitIfEmpty="True"/>
				<CustomParameter id="121" field="DepartmentID" dataType="Integer" parameterType="Control" parameterSource="DepartmentID" omitIfEmpty="True"/>
				<CustomParameter id="127" field="RecomObstetricExamination" dataType="Integer" parameterType="Control" parameterSource="RecomObstetricExamination" omitIfEmpty="True"/>
				<CustomParameter id="128" field="RecomObstetricExaminationDate" dataType="Date" parameterType="Control" parameterSource="RecomObstetricExaminationDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="129" field="RecomRepeatedHospitalisation" dataType="Integer" parameterType="Control" parameterSource="RecomRepeatedHospitalisation" omitIfEmpty="True"/>
				<CustomParameter id="130" field="RecomRepeatedHospitalisationDate" dataType="Date" parameterType="Control" parameterSource="RecomRepeatedHospitalisationDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="131" field="RecomDelivery3rdLevel" dataType="Integer" parameterType="Control" parameterSource="RecomDelivery3rdLevel" omitIfEmpty="True"/>
				<CustomParameter id="132" field="RecomDelivery3rdLevelDate" dataType="Date" parameterType="Control" parameterSource="RecomDelivery3rdLevelDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="133" field="DischargeDate" dataType="Date" parameterType="Control" parameterSource="DischargeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="174" field="PregnancyID" dataType="Text" parameterType="Control" parameterSource="PregnancyID" omitIfEmpty="True"/>
				<CustomParameter id="348" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="134" conditionType="Parameter" useIsNull="False" field="hospitalisation.HospitalisationID" dataType="Integer" parameterType="URL" parameterSource="HospitalisationID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="135" field="AdmissionDate" dataType="Date" parameterType="Control" parameterSource="AdmissionDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="136" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="FacilityID" omitIfEmpty="True"/>
				<CustomParameter id="137" field="DepartmentID" dataType="Integer" parameterType="Control" parameterSource="DepartmentID" omitIfEmpty="True"/>
				<CustomParameter id="143" field="RecomObstetricExamination" dataType="Integer" parameterType="Control" parameterSource="RecomObstetricExamination" omitIfEmpty="True"/>
				<CustomParameter id="144" field="RecomObstetricExaminationDate" dataType="Date" parameterType="Control" parameterSource="RecomObstetricExaminationDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="False" defaultValue="NULL"/>
				<CustomParameter id="145" field="RecomRepeatedHospitalisation" dataType="Integer" parameterType="Control" parameterSource="RecomRepeatedHospitalisation" omitIfEmpty="True"/>
				<CustomParameter id="146" field="RecomRepeatedHospitalisationDate" dataType="Date" parameterType="Control" parameterSource="RecomRepeatedHospitalisationDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="False" defaultValue="NULL"/>
				<CustomParameter id="147" field="RecomDelivery3rdLevel" dataType="Integer" parameterType="Control" parameterSource="RecomDelivery3rdLevel" omitIfEmpty="True"/>
				<CustomParameter id="149" field="DischargeDate" dataType="Date" parameterType="Control" parameterSource="DischargeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="175" field="PregnancyID" dataType="Text" parameterType="Control" parameterSource="PregnancyID" omitIfEmpty="True"/>
				<CustomParameter id="349" field="by_user" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="CurrentUser"/>
				<CustomParameter id="382" field="RecomDelivery3rdLevelDate" dataType="Date" parameterType="Control" DBFormat="yyyy-mm-dd HH:nn:ss" format="ShortDate" omitIfEmpty="True" parameterSource="RecomDelivery3rdLevelDate"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="150" conditionType="Parameter" useIsNull="False" field="hospitalisation.HospitalisationID" dataType="Integer" parameterType="URL" parameterSource="HospitalisationID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups>
				<Group id="321" groupID="1" read="True"/>
				<Group id="322" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="323" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="307" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy_header1" dataSource="pregnancy, patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy_header1" activeCollection="TableParameters">
			<Components>
				<Label id="308" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancy_header1PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="339" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="pregnancy_header1PatientID" fieldSource="patient.PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_district.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="312" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="313" tableName="pregnancy" posLeft="287" posTop="30" posWidth="141" posHeight="285"/>
				<JoinTable id="314" tableName="patient" posLeft="91" posTop="16" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="315" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="316" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PregnancyID"/>
			</UConditions>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="317" conditionType="Parameter" useIsNull="False" field="DeliveryID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="DeliveryID"/>
			</DConditions>
			<SecurityGroups>
				<Group id="319" groupID="1" read="True"/>
				<Group id="320" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="hospitalisation_maint.php" forShow="True" url="hospitalisation_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="hospitalisation_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="324" groupID="1"/>
		<Group id="325" groupID="3"/>
		<Group id="326" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="381"/>
			</Actions>
		</Event>
	</Events>
</Page>
