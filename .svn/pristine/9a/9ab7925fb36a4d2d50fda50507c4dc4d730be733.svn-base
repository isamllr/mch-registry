<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="SSL" isIncluded="False" SSLAccess="True" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="noaccess.ccp">
	<Components>
		<IncludePage id="2" name="topmenu" PathID="topmenu" page="topmenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="True" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="pregnancy" dataSource="pregnancy" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="pregnancy" returnPage="patient_maint_fac.ccp" pasteActions="pasteActions" customInsert="pregnancy" customInsertType="Table" customUpdate="pregnancy" customUpdateType="Table" activeCollection="UConditions" activeTableType="customUpdate" customDelete="pregnancy" customDeleteType="Table" removeParameters="PregnancyID;VisitsPage" pasteAsReplace="pasteAsReplace" visible="Dynamic">
			<Components>
				<Button id="6" urlType="Relative" enableValidation="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="pregnancyButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="7" message="{res:CCS_DeleteConfirmation}" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="8" urlType="Relative" enableValidation="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="pregnancyButton_Cancel">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="379" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PregnancyRecNr" fieldSource="PregnancyRecNr" required="True" caption="{res:PregnancyRecNr}" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancyPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="PregRegDate" fieldSource="PregRegDate" required="True" caption="{res:PregRegDate}" wizardCaption="{res:PregRegDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancyPregRegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="190" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="GestationAge" fieldSource="GestationAge" required="True" caption="{res:GestationAge}" wizardCaption="{res:GestationDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancyGestationAge" validationRule="($this-&gt;GestationAge-&gt;GetValue() &gt; 0 &amp;&amp; $this-&gt;GestationAge-&gt;GetValue() &lt; 46)" validationText="{res:Gestational_Limit}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="Calc_DeliveryDate" fieldSource="Calc_DeliveryDate" required="True" caption="{res:Calc_DeliveryDate}" wizardCaption="{res:Calc_DeliveryDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancyCalc_DeliveryDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="17" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="PregnancyTypeID" fieldSource="PregnancyTypeID" required="True" caption="{res:PregnancyTypeName}" wizardCaption="{res:PregnancyTypeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="pregnancyPregnancyTypeID" connection="registry_db" dataSource="pregnancytype" boundColumn="PregnancyTypeID" textColumn="PregnancyTypeName" defaultValue="1">
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
				</ListBox>
				<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="LastMensesDate" fieldSource="LastMensesDate" required="False" caption="{res:LastMensesDate}" wizardCaption="{res:PregRegDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancyLastMensesDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="22" name="DatePicker_PregnancyRecNr1" PathID="pregnancyDatePicker_PregnancyRecNr1" control="PregRegDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<DatePicker id="23" name="DatePicker_LastMensesDate1" PathID="pregnancyDatePicker_LastMensesDate1" control="LastMensesDate" wizardDatePickerType="Image" wizardPicture="Styles/{CCS_Style}/Images/DatePicker.gif" style="Styles/{CCS_Style}/Style.css">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Button id="51" urlType="Relative" enableValidation="True" name="Button_UpdateAddVisit" operation="Update" wizardCaption="{res:CCS_Insert}" PathID="pregnancyButton_UpdateAddVisit" returnPage="visit_maint.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="133" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="134" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="54" urlType="Relative" enableValidation="True" isDefault="False" name="UpdateDelDate" PathID="pregnancyUpdateDelDate">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="55" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CurrentUser" PathID="pregnancyCurrentUser" fieldSource="by_user">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="84" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="87" fieldSourceType="DBColumn" dataType="Date" html="False" name="lastmodified" PathID="pregnancylastmodified" fieldSource="created" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss" defaultValue="CurrentDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="89" fieldSourceType="DBColumn" dataType="Text" html="False" name="user" PathID="pregnancyuser" fieldSource="by_user" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ListBox id="120" visible="Dynamic" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="EmployeeID" fieldSource="EmployeeID" required="True" caption="{res:Doctor}" wizardCaption="{res:EmployeeID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="pregnancyEmployeeID" connection="registry_db" dataSource="employees, position" boundColumn="EmployeeID" textColumn="FirstAndLastNameAndPosition" activeCollection="TableParameters" orderBy="FirstName, LastName" features="(assigned)">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="130" conditionType="Expression" useIsNull="False" field="employees.PositionID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="employees.PositionID = 1" parameterSource="employees_PositionID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="121" tableName="employees" posLeft="10" posTop="10" posWidth="115" posHeight="260"/>
						<JoinTable id="128" tableName="position" posLeft="146" posTop="10" posWidth="95" posHeight="88"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="129" tableLeft="employees" tableRight="position" fieldLeft="employees.PositionID" fieldRight="position.PositionID" joinType="inner" conditionType="Equal"/>
					</JoinLinks>
					<Fields>
						<Field id="88" fieldName="CONCAT(FirstName, &quot; &quot;, LastName, &quot; (&quot;,PositionName, &quot;)&quot; )" isExpression="True" alias="FirstAndLastNameAndPosition"/>
						<Field id="122" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features>
						<PTDependentListBox id="356" enabled="True" name="PTDependentListBox1" servicePage="services/pregnancy_maint_pregnancy_EmployeeID_PTDependentListBox1.ccp" masterListbox="Facility" category="Prototype" featureNameChanged="No">
							<Components/>
							<Events/>
							<Features/>
						</PTDependentListBox>
					</Features>
				</ListBox>
				<Button id="148" urlType="Relative" enableValidation="True" name="Button_UpdateAddDelivery" PathID="pregnancyButton_UpdateAddDelivery" returnPage="delivery_maint.ccp" operation="Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="149" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="150" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<RadioButton id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Ultrasound20weeks" fieldSource="Ultrasound20weeks" required="True" caption="{res:Ultrasound20weeks}" wizardCaption="{res:Rhesus}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancyUltrasound20weeks" sourceType="ListOfValues" html="True" connection="registry_db" _valueOfList="1" _nameOfList="{res:RYes}" dataSource="1;{res:RYes};0;{res:RNo}">
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
				<ListBox id="193" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="MethodFertilization" fieldSource="MethodFertilizationID" required="True" caption="{res:MethodFertilization}" wizardCaption="{res:GestationDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancyMethodFertilization" sourceType="Table" connection="registry_db" dataSource="method_fertilization" boundColumn="MethodFertilizationID" textColumn="MethodFertilizationName" defaultValue="1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="194" tableName="method_fertilization" posLeft="10" posTop="10" posWidth="160" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<ListBox id="197" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="Facility" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="pregnancyFacility" fieldSource="FacilityID" connection="registry_db" dataSource="facilities" boundColumn="FacilityID" textColumn="FacilityName" caption="{res:FacilityID}" required="True" orderBy="FacilityName" activeCollection="TableParameters">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="358" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="198" tableName="facilities" posLeft="10" posTop="10" posWidth="95" posHeight="104"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="251" urlType="Relative" enableValidation="True" name="Button_UpdateAddHospitalisation" PathID="pregnancyButton_UpdateAddHospitalisation" returnPage="hospitalisation_maint.ccp" operation="Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="252" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="253" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="pregnancyButton_Insert" isDefault="False">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="202" message="{res: AutomAddVisitIfAddPreg}" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="True" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="pregnancyButton_Update" isDefault="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="18" fieldSourceType="DBColumn" dataType="Integer" name="PatientID" fieldSource="PatientID" required="True" caption="{res:PatientID}" wizardCaption="{res:PatientID}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="pregnancyPatientID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<RadioButton id="396" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="RecommendationNotifications" PathID="pregnancyRecommendationNotifications" caption="{res:RecommendationNot}" connection="registry_db" _valueOfList="0" _nameOfList="{res:RNo}" dataSource="1;{res:RYes};0;{res:RNo}" required="True" fieldSource="RecommendationNotifications">
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
				<RadioButton id="397" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" html="True" returnValueType="Number" name="ReminderNotifications" PathID="pregnancyReminderNotifications" required="True" caption="{res:ReminderNot}" connection="registry_db" dataSource="1;{res:RYes};0;{res:RNo}" fieldSource="ReminderNotifications" _valueOfList="0" _nameOfList="{res:RNo}">
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
			</Components>
			<Events>
				<Event name="AfterInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="201" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="343" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="OnLoad" type="Client">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="412"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="PregnancyID" parameterSource="PregnancyID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="25" tableName="pregnancy" posLeft="10" posTop="10" posWidth="141" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="127" fieldName="*"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="90" field="PregnancyRecNr" dataType="Text" parameterType="Control" parameterSource="PregnancyRecNr" omitIfEmpty="True"/>
				<CustomParameter id="91" field="PregRegDate" dataType="Date" parameterType="Control" parameterSource="PregRegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="92" field="GestationAge" dataType="Integer" parameterType="Control" parameterSource="GestationAge" omitIfEmpty="True"/>
				<CustomParameter id="93" field="Calc_DeliveryDate" dataType="Date" parameterType="Control" parameterSource="Calc_DeliveryDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="94" field="PregnancyTypeID" dataType="Integer" parameterType="Control" parameterSource="PregnancyTypeID" omitIfEmpty="True"/>
				<CustomParameter id="95" field="PatientID" dataType="Integer" parameterType="Control" parameterSource="PatientID" omitIfEmpty="True"/>
				<CustomParameter id="96" field="LastMensesDate" dataType="Date" parameterType="Control" parameterSource="LastMensesDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="97" field="by_user" dataType="Text" parameterType="Control" parameterSource="CurrentUser" omitIfEmpty="True"/>
				<CustomParameter id="131" field="EmployeeID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="EmployeeID"/>
				<CustomParameter id="191" field="Ultrasound20weeks" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Ultrasound20weeks"/>
				<CustomParameter id="195" field="MethodFertilizationID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="MethodFertilization"/>
				<CustomParameter id="199" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="Facility" omitIfEmpty="True"/>
				<CustomParameter id="398" field="RecommendationNotifications" dataType="Integer" parameterType="Control" parameterSource="RecommendationNotifications" omitIfEmpty="True"/>
				<CustomParameter id="399" field="ReminderNotifications" dataType="Integer" parameterType="Control" parameterSource="ReminderNotifications" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="98" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" parameterType="URL" parameterSource="PregnancyID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
				<TableParameter id="152" conditionType="Parameter" useIsNull="False" field="PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PatientID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="99" field="PregnancyRecNr" dataType="Text" parameterType="Control" parameterSource="PregnancyRecNr" omitIfEmpty="True"/>
				<CustomParameter id="100" field="PregRegDate" dataType="Date" parameterType="Control" parameterSource="PregRegDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="101" field="GestationAge" dataType="Integer" parameterType="Control" parameterSource="GestationAge" omitIfEmpty="True"/>
				<CustomParameter id="102" field="Calc_DeliveryDate" dataType="Date" parameterType="Control" parameterSource="Calc_DeliveryDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="True"/>
				<CustomParameter id="103" field="PregnancyTypeID" dataType="Integer" parameterType="Control" parameterSource="PregnancyTypeID" omitIfEmpty="True"/>
				<CustomParameter id="104" field="PatientID" dataType="Integer" parameterType="Control" parameterSource="PatientID" omitIfEmpty="True"/>
				<CustomParameter id="105" field="LastMensesDate" dataType="Date" parameterType="Control" parameterSource="LastMensesDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss" omitIfEmpty="False"/>
				<CustomParameter id="106" field="by_user" dataType="Text" parameterType="Control" parameterSource="CurrentUser" omitIfEmpty="True"/>
				<CustomParameter id="132" field="EmployeeID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="EmployeeID"/>
				<CustomParameter id="192" field="Ultrasound20weeks" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Ultrasound20weeks"/>
				<CustomParameter id="196" field="MethodFertilizationID" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="MethodFertilization"/>
				<CustomParameter id="200" field="FacilityID" dataType="Integer" parameterType="Control" parameterSource="Facility" omitIfEmpty="True"/>
				<CustomParameter id="400" field="RecommendationNotifications" dataType="Integer" parameterType="Control" parameterSource="RecommendationNotifications" omitIfEmpty="True"/>
				<CustomParameter id="401" field="ReminderNotifications" dataType="Integer" parameterType="Control" parameterSource="ReminderNotifications" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions>
				<TableParameter id="151" conditionType="Parameter" useIsNull="False" field="PregnancyID" dataType="Integer" parameterType="URL" parameterSource="PregnancyID" searchConditionType="Equal" logicOperator="And" orderNumber="1" leftBrackets="0" rightBrackets="0"/>
			</DConditions>
			<SecurityGroups>
				<Group id="323" groupID="1" read="True"/>
				<Group id="324" groupID="3" read="True" insert="True" update="True" delete="True"/>
				<Group id="325" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="56" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="25" connection="registry_db" dataSource="visit, facilities, visitoutcome" activeCollection="TableParameters" name="Visits" orderBy="visit.VisitDate desc" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:facilitiesvisitvisitoutcome} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteActions="pasteActions">
			<Components>
				<Label id="69" fieldSourceType="DBColumn" dataType="Text" html="False" name="facilities_visit_visitout_TotalRecords" wizardUseTemplateBlock="False" PathID="Visitsfacilities_visit_visitout_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="70" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="71" visible="True" name="Sorter_VisitDate" column="VisitDate" wizardCaption="{res:VisitDate}" wizardSortingType="SimpleDir" wizardControl="VisitDate" wizardAddNbsp="False" PathID="VisitsSorter_VisitDate" columnReverse="VisitDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="72" visible="True" name="Sorter_FacilityName" column="FacilityName" wizardCaption="{res:FacilityName}" wizardSortingType="SimpleDir" wizardControl="FacilityName" wizardAddNbsp="False" PathID="VisitsSorter_FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="73" visible="True" name="Sorter_VisitOutcomeName" column="VisitOutcomeName" wizardCaption="{res:VisitOutcomeName}" wizardSortingType="SimpleDir" wizardControl="VisitOutcomeName" wizardAddNbsp="False" PathID="VisitsSorter_VisitOutcomeName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="74" visible="True" name="Sorter_NextVisit" column="NextVisit" wizardCaption="{res:NextVisit}" wizardSortingType="SimpleDir" wizardControl="NextVisit" wizardAddNbsp="False" PathID="VisitsSorter_NextVisit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="76" fieldSourceType="DBColumn" dataType="Date" html="False" name="VisitDate" fieldSource="VisitDate" wizardCaption="{res:VisitDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="VisitsVisitDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="77" fieldSourceType="DBColumn" dataType="Text" html="False" name="FacilityName" fieldSource="FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="VisitsFacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="78" fieldSourceType="DBColumn" dataType="Text" html="False" name="VisitOutcomeName" fieldSource="VisitOutcomeName" wizardCaption="{res:VisitOutcomeName}" wizardSize="50" wizardMaxLength="200" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="VisitsVisitOutcomeName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="79" fieldSourceType="DBColumn" dataType="Date" html="False" name="NextVisit" fieldSource="NextVisit" wizardCaption="{res:NextVisit}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="VisitsNextVisit" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="80" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="VisitsImageLink1" hrefSource="visit_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="82" sourceType="DataField" name="VisitID" source="VisitID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="75" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="156" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="68" conditionType="Parameter" useIsNull="False" field="visit.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" leftBrackets="0" rightBrackets="0" defaultValue="0" parameterSource="PregnancyID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="57" tableName="visit" posLeft="10" posTop="10" posWidth="119" posHeight="234"/>
				<JoinTable id="58" tableName="facilities" posLeft="150" posTop="10" posWidth="95" posHeight="120"/>
				<JoinTable id="62" tableName="visitoutcome" posLeft="166" posTop="149" posWidth="123" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="359" tableLeft="visit" tableRight="facilities" fieldLeft="visit.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="360" tableLeft="visit" tableRight="visitoutcome" fieldLeft="visit.VisitOutcomeID" fieldRight="visitoutcome.VisitOutcomeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="60" tableName="visit" fieldName="visit.*"/>
				<Field id="61" tableName="facilities" fieldName="FacilityName"/>
				<Field id="65" tableName="visitoutcome" fieldName="VisitOutcomeName"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
				<Group id="381" groupID="1" read="True"/>
				<Group id="382" groupID="3" read="True"/>
				<Group id="383" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="16" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="patient_header" dataSource="patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="patient_header" activeCollection="TableParameters">
			<Components>
				<Label id="136" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" PathID="patient_headerFirstName" fieldSource="GivenName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="137" fieldSourceType="DBColumn" dataType="Text" html="False" name="FamiliyName" PathID="patient_headerFamiliyName" fieldSource="FamilyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="138" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDate" PathID="patient_headerBirthDate" fieldSource="BirthDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="326" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="patient_headerPatientID" fieldSource="PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="158" conditionType="Parameter" useIsNull="False" field="PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PatientID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="141" tableName="patient" posLeft="274" posTop="10" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
				<Field id="157" fieldName="*"/>
			</Fields>
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
			<SecurityGroups>
				<Group id="316" groupID="3" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="159" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="pregnancy, delivery, facilities, deliverymethod, patient" activeCollection="TableParameters" name="delivery" orderBy="DataDelivery desc" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:complicationsdeliverydeliverymethodfacilitiesicd10_allpregnancypregnancytype} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}">
			<Components>
				<Sorter id="162" visible="True" name="Sorter_PregnancyRecNr" column="PregnancyRecNr" wizardCaption="{res:PregnancyRecNr}" wizardSortingType="SimpleDir" wizardControl="PregnancyRecNr" wizardAddNbsp="False" PathID="deliverySorter_PregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="163" visible="True" name="Sorter_DataDelivery" column="DataDelivery" wizardCaption="{res:DataDelivery}" wizardSortingType="SimpleDir" wizardControl="DataDelivery" wizardAddNbsp="False" PathID="deliverySorter_DataDelivery">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="164" visible="True" name="Sorter_FacilityName" column="FacilityName" wizardCaption="{res:FacilityName}" wizardSortingType="SimpleDir" wizardControl="FacilityName" wizardAddNbsp="False" PathID="deliverySorter_FacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="165" visible="True" name="Sorter_DeliveryMethodName" column="DeliveryMethodName" wizardCaption="{res:DeliveryMethodName}" wizardSortingType="SimpleDir" wizardControl="DeliveryMethodName" wizardAddNbsp="False" PathID="deliverySorter_DeliveryMethodName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="167" fieldSourceType="DBColumn" dataType="Text" html="False" name="PregnancyRecNr" fieldSource="NumberOfDelivery" wizardCaption="{res:PregnancyRecNr}" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="deliveryPregnancyRecNr">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="168" fieldSourceType="DBColumn" dataType="Date" html="False" name="DataDelivery" fieldSource="DataDelivery" wizardCaption="{res:DataDelivery}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="deliveryDataDelivery" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="169" fieldSourceType="DBColumn" dataType="Text" html="False" name="FacilityName" fieldSource="FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="deliveryFacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="170" fieldSourceType="DBColumn" dataType="Text" html="False" name="DeliveryMethodName" fieldSource="DeliveryMethodName" wizardCaption="{res:DeliveryMethodName}" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="deliveryDeliveryMethodName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="172" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="173" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="deliveryImageLink1" hrefSource="delivery_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="174" sourceType="DataField" name="DeliveryID" source="DeliveryID"/>
						<LinkParameter id="175" sourceType="DataField" name="PatientID" source="PatientID"/>
						<LinkParameter id="176" sourceType="DataField" name="PregnancyID" source="PregnancyID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="177" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="178" conditionType="Parameter" useIsNull="False" field="delivery.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" leftBrackets="0" rightBrackets="0" defaultValue="0" parameterSource="PregnancyID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="179" tableName="pregnancy" posLeft="10" posTop="10" posWidth="141" posHeight="180"/>
				<JoinTable id="180" tableName="delivery" posLeft="172" posTop="10" posWidth="141" posHeight="424"/>
				<JoinTable id="181" tableName="facilities" posLeft="534" posTop="181" posWidth="95" posHeight="104"/>
				<JoinTable id="182" tableName="deliverymethod" posLeft="360" posTop="223" posWidth="141" posHeight="88"/>
				<JoinTable id="183" tableName="patient" posLeft="16" posTop="262" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="339" tableLeft="delivery" tableRight="pregnancy" fieldLeft="delivery.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="340" tableLeft="delivery" tableRight="facilities" fieldLeft="delivery.FacilityID" fieldRight="facilities.FacilityID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="341" tableLeft="delivery" tableRight="deliverymethod" fieldLeft="delivery.DeliveryMethodID" fieldRight="deliverymethod.DeliveryMethodID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="342" tableLeft="pregnancy" tableRight="patient" fieldLeft="pregnancy.PatientID" fieldRight="patient.PatientID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
				<Group id="387" groupID="1" read="True"/>
				<Group id="388" groupID="3" read="True"/>
				<Group id="389" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="203" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="registry_db" dataSource="newborn, delivery, pregnancy" name="newborn" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:newborn} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" activeCollection="TableParameters" orderBy="newborn.BirthDate desc">
			<Components>
				<Label id="204" fieldSourceType="DBColumn" dataType="Text" html="False" name="newborn_TotalRecords" wizardUseTemplateBlock="False" PathID="newbornnewborn_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="205" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="206" visible="True" name="Sorter_NewBornN" column="NewBornN" wizardCaption="{res:NewBornN}" wizardSortingType="SimpleDir" wizardControl="NewBornN" wizardAddNbsp="False" PathID="newbornSorter_NewBornN" columnReverse="BirthDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="207" visible="True" name="Sorter_Sex" column="Sex" wizardCaption="{res:Sex}" wizardSortingType="SimpleDir" wizardControl="Sex" wizardAddNbsp="False" PathID="newbornSorter_Sex">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="208" visible="True" name="Sorter_BirthDateTime" column="BirthDateTime" wizardCaption="{res:BirthDateTime}" wizardSortingType="SimpleDir" wizardControl="BirthDateTime" wizardAddNbsp="False" PathID="newbornSorter_BirthDateTime">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="209" fieldSourceType="DBColumn" dataType="Text" html="False" name="NewBornN" fieldSource="NewBornN" wizardCaption="{res:NewBornN}" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="newbornNewBornN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="211" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDateTime" fieldSource="BirthDate" wizardCaption="{res:BirthDateTime}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="newbornBirthDateTime" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="212" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="213" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="newbornImageLink1" hrefSource="newborn_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="214" sourceType="DataField" format="yyyy-mm-dd" name="NewBornID" source="NewBornID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Label id="215" fieldSourceType="DBColumn" dataType="Date" html="False" name="BirthDateTime1" fieldSource="BirthTime" wizardCaption="{res:BirthDateTime}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="newbornBirthDateTime1" format="ShortTime" DBFormat="HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="337" fieldSourceType="DBColumn" dataType="Integer" html="False" name="Sex" PathID="newbornSex" fieldSource="Sex">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="338" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="250" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="221" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="PregnancyID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="217" tableName="newborn" posLeft="10" posTop="10" posWidth="150" posHeight="180"/>
				<JoinTable id="219" tableName="delivery" posLeft="174" posTop="24" posWidth="160" posHeight="180"/>
				<JoinTable id="248" tableName="pregnancy" posLeft="367" posTop="67" posWidth="159" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="220" tableLeft="newborn" tableRight="delivery" fieldLeft="newborn.DeliveryID" fieldRight="delivery.DeliveryID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="249" tableLeft="delivery" tableRight="pregnancy" fieldLeft="delivery.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="292" tableName="newborn" fieldName="newborn.*"/>
				<Field id="294" tableName="pregnancy" fieldName="pregnancy.*"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
				<Group id="390" groupID="1" read="True"/>
				<Group id="391" groupID="3" read="True"/>
				<Group id="392" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="254" secured="True" sourceType="Table" returnValueType="Number" defaultPageSize="100" connection="registry_db" dataSource="hospitalisation, facilities, department, pregnancy" activeCollection="TableParameters" name="department_facilities_hos" pageSizeLimit="100" wizardCaption="{res:CCS_GridFormPrefix} {res:departmentfacilitieshospitalisationicd10_all} {res:CCS_GridFormSuffix}" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" pasteActions="pasteActions" orderBy="hospitalisation.AdmissionDate desc">
			<Components>
				<Label id="272" fieldSourceType="DBColumn" dataType="Text" html="False" name="department_facilities_hos_TotalRecords" wizardUseTemplateBlock="False" PathID="department_facilities_hosdepartment_facilities_hos_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="273" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="274" visible="True" name="Sorter_DepartmentDesc" column="DepartmentDesc" wizardCaption="{res:DepartmentDesc}" wizardSortingType="SimpleDir" wizardControl="DepartmentDesc" wizardAddNbsp="False" PathID="department_facilities_hosSorter_DepartmentDesc">
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
				<Sorter id="277" visible="True" name="Sorter_AdmissionDate" column="AdmissionDate" wizardCaption="{res:AdmissionDate}" wizardSortingType="SimpleDir" wizardControl="AdmissionDate" wizardAddNbsp="False" PathID="department_facilities_hosSorter_AdmissionDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="278" visible="True" name="Sorter_DischargeDate" column="DischargeDate" wizardCaption="{res:DischargeDate}" wizardSortingType="SimpleDir" wizardControl="DischargeDate" wizardAddNbsp="False" PathID="department_facilities_hosSorter_DischargeDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="279" fieldSourceType="DBColumn" dataType="Text" html="False" name="DepartmentDesc" fieldSource="DepartmentDesc" wizardCaption="{res:DepartmentDesc}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department_facilities_hosDepartmentDesc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="280" fieldSourceType="DBColumn" dataType="Text" html="False" name="FacilityName" fieldSource="FacilityName" wizardCaption="{res:FacilityName}" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department_facilities_hosFacilityName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="282" fieldSourceType="DBColumn" dataType="Date" html="False" name="AdmissionDate" fieldSource="AdmissionDate" wizardCaption="{res:AdmissionDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department_facilities_hosAdmissionDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="283" fieldSourceType="DBColumn" dataType="Date" html="False" name="DischargeDate" fieldSource="DischargeDate" wizardCaption="{res:DischargeDate}" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="department_facilities_hosDischargeDate" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="284" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="department_facilities_hosImageLink1" hrefSource="hospitalisation_maint.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="287" sourceType="DataField" name="HospitalisationID" source="HospitalisationID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="288" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="308" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" defaultValue="0" parameterSource="PregnancyID" leftBrackets="0" rightBrackets="0"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="255" tableName="hospitalisation" posLeft="198" posTop="162" posWidth="253" posHeight="288"/>
				<JoinTable id="256" tableName="facilities" posLeft="535" posTop="43" posWidth="95" posHeight="104"/>
				<JoinTable id="258" tableName="department" posLeft="591" posTop="223" posWidth="108" posHeight="88"/>
				<JoinTable id="295" tableName="pregnancy" posLeft="21" posTop="313" posWidth="159" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="376" tableLeft="hospitalisation" tableRight="pregnancy" fieldLeft="hospitalisation.PregnancyID" fieldRight="pregnancy.PregnancyID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="377" tableLeft="department" tableRight="hospitalisation" fieldLeft="department.DeptID" fieldRight="hospitalisation.DepartmentID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="378" tableLeft="facilities" tableRight="hospitalisation" fieldLeft="facilities.FacilityID" fieldRight="hospitalisation.FacilityID" joinType="inner"/>
			</JoinLinks>
			<Fields>
				<Field id="375" fieldName="*"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups>
				<Group id="384" groupID="1" read="True"/>
				<Group id="385" groupID="3" read="True"/>
				<Group id="386" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="327" sourceType="Table" urlType="Relative" secured="True" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="patient_header1" dataSource="patient" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="patient_header1" activeCollection="TableParameters">
			<Components>
				<Link id="331" fieldSourceType="DBColumn" dataType="Integer" html="False" name="PatientID" PathID="patient_header1PatientID" fieldSource="PatientID" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="patient_maint_fac.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="332" conditionType="Parameter" useIsNull="False" field="PatientID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PatientID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="333" tableName="patient" posLeft="274" posTop="10" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
				<Field id="334" fieldName="*"/>
			</Fields>
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
			<SecurityGroups>
				<Group id="335" groupID="1" read="True"/>
				<Group id="336" groupID="2" read="True"/>
			</SecurityGroups>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="405" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="HiddenSettings" dataSource="pregnancy, notificationconfiguration" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="HiddenSettings" activeCollection="TableParameters" pasteActions="pasteActions">
			<Components>
				<Label id="407" fieldSourceType="DBColumn" dataType="Integer" html="False" name="ReminderNotifications" fieldSource="Enabled" required="False" caption="{res:ReminderNotifications}" wizardCaption="{res:ReminderNotifications}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="HiddenSettingsReminderNotifications">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="406" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" parameterSource="PregnancyID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="418" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" searchConditionType="Equal" parameterType="Expression" logicOperator="And" expression="(notificationconfiguration.NotificationTypeID=1)" parameterSource="NotificationTypeID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="409" tableName="pregnancy" posLeft="10" posTop="10" posWidth="216" posHeight="325"/>
				<JoinTable id="413" tableName="notificationconfiguration" posLeft="341" posTop="26" posWidth="269" posHeight="238"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="417" tableLeft="pregnancy" tableRight="notificationconfiguration" fieldLeft="pregnancy.FacilityID" fieldRight="notificationconfiguration.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="416" tableName="notificationconfiguration" fieldName="Enabled"/>
			</Fields>
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
		<Record id="420" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="registry_db" name="HiddenSettings2" dataSource="pregnancy, notificationconfiguration" errorSummator="Error" wizardCaption="{res:CCS_RecordFormPrefix2} {res:pregnancy} {res:CCS_RecordFormSuffix}" wizardFormMethod="post" PathID="HiddenSettings2" activeCollection="TableParameters">
			<Components>
				<Label id="422" fieldSourceType="DBColumn" dataType="Integer" html="False" name="RecommendationNotifications" fieldSource="Enabled" required="False" caption="{res:RecommendationNotifications}" wizardCaption="{res:RecommendationNotifications}" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="HiddenSettings2RecommendationNotifications">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="421" conditionType="Parameter" useIsNull="False" field="pregnancy.PregnancyID" parameterSource="PregnancyID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="428" conditionType="Expression" useIsNull="False" field="notificationconfiguration.NotificationTypeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" expression="notificationconfiguration.NotificationTypeID=2" parameterSource="Enabled"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="423" tableName="pregnancy" posLeft="10" posTop="10" posWidth="160" posHeight="329"/>
				<JoinTable id="424" tableName="notificationconfiguration" posLeft="191" posTop="10" posWidth="160" posHeight="152"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="425" tableLeft="pregnancy" tableRight="notificationconfiguration" fieldLeft="pregnancy.FacilityID" fieldRight="notificationconfiguration.FacilityID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="426" tableName="pregnancy" fieldName="pregnancy.*"/>
				<Field id="427" tableName="notificationconfiguration" fieldName="Enabled"/>
			</Fields>
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
		<CodeFile id="Code" language="PHPTemplates" name="pregnancy_maint.php" forShow="True" url="pregnancy_maint.php" comment="//" codePage="utf-8"/>
		<CodeFile id="Events" language="PHPTemplates" name="pregnancy_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="402" groupID="1"/>
		<Group id="403" groupID="3"/>
		<Group id="404" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="380"/>
			</Actions>
		</Event>
	</Events>
</Page>
